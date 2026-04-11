<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Feature;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Hyperized\Hostfact\Api\Controllers\Debtor;
use Hyperized\Hostfact\Api\Controllers\Invoice;
use Hyperized\Hostfact\Api\Controllers\Product;
use Hyperized\Hostfact\Api\Response\ActionResponse;
use Hyperized\Hostfact\Api\Response\ErrorResponse;
use Hyperized\Hostfact\Api\Response\ListResponse;
use Hyperized\Hostfact\Api\Response\ShowResponse;
use Hyperized\Hostfact\Api\Response\Status;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Orchestra\Testbench\TestCase;

class ApiIntegrationTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            'Hyperized\Hostfact\Providers\HostfactServiceProvider',
        ];
    }

    protected function defineEnvironment($app): void
    {
        $app['config']->set('Hostfact.api_v2_url', 'https://test.hostfact.tld/Pro/apiv2/api.php');
        $app['config']->set('Hostfact.api_v2_key', 'test-api-key-12345');
        $app['config']->set('Hostfact.api_v2_timeout', 10);
    }

    private function createController(string $controllerClass, string $responseBody, array &$history): object
    {
        $mock = new MockHandler([
            new Response(200, [], $responseBody),
        ]);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($history));

        $guzzle = new GuzzleClient(['handler' => $stack]);

        $stubClient = $this->createStub(HttpClientInterface::class);
        $stubClient->method('getHttpClient')->willReturn($guzzle);

        return $controllerClass::fromHttpClient($stubClient);
    }

    /**
     * @return array<string, string>
     */
    private function capturedFormParams(array $history): array
    {
        $body = (string) $history[0]['request']->getBody();
        parse_str($body, $params);

        return $params;
    }

    public function testProductListReturnsListResponse(): void
    {
        $history = [];
        $responseBody = json_encode([
            'controller' => 'product',
            'action' => 'list',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'totalresults' => 2,
            'currentresults' => 2,
            'offset' => 0,
            'products' => [
                ['Identifier' => '1', 'ProductCode' => 'P0001', 'ProductName' => 'Hosting Basic'],
                ['Identifier' => '2', 'ProductCode' => 'P0002', 'ProductName' => 'Hosting Pro'],
            ],
        ]);

        $product = $this->createController(Product::class, $responseBody, $history);
        $result = $product->list(['searchfor' => 'Hosting']);

        self::assertInstanceOf(ListResponse::class, $result);
        self::assertTrue($result->isSuccess());
        self::assertSame('product', $result->controller);
        self::assertSame('list', $result->action);
        self::assertCount(2, $result->items);
        self::assertSame('Hosting Basic', $result->items[0]->string('ProductName'));

        $params = $this->capturedFormParams($history);
        self::assertSame('test-api-key-12345', $params['api_key']);
        self::assertSame('product', $params['controller']);
        self::assertSame('list', $params['action']);
        self::assertSame('Hosting', $params['searchfor']);
    }

    public function testDebtorShowReturnsShowResponse(): void
    {
        $history = [];
        $responseBody = json_encode([
            'controller' => 'debtor',
            'action' => 'show',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'debtor' => [
                'Identifier' => '42',
                'DebtorCode' => 'DB0001',
                'CompanyName' => 'Acme Corp',
            ],
        ]);

        $debtor = $this->createController(Debtor::class, $responseBody, $history);
        $result = $debtor->show(['DebtorCode' => 'DB0001']);

        self::assertInstanceOf(ShowResponse::class, $result);
        self::assertTrue($result->isSuccess());
        self::assertSame('Acme Corp', $result->data->string('CompanyName'));

        $params = $this->capturedFormParams($history);
        self::assertSame('debtor', $params['controller']);
        self::assertSame('show', $params['action']);
        self::assertSame('DB0001', $params['DebtorCode']);
    }

    public function testInvoiceAddLineSendsCorrectController(): void
    {
        $history = [];
        $responseBody = json_encode([
            'controller' => 'invoiceline',
            'action' => 'add',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        $invoice = $this->createController(Invoice::class, $responseBody, $history);
        $result = $invoice->lineAdd([
            'InvoiceCode' => 'F0001',
            'Description' => 'Web hosting',
            'PriceExcl' => '49.99',
        ]);

        self::assertInstanceOf(ActionResponse::class, $result);
        self::assertTrue($result->isSuccess());

        $params = $this->capturedFormParams($history);
        self::assertSame('invoiceline', $params['controller']);
        self::assertSame('add', $params['action']);
        self::assertSame('F0001', $params['InvoiceCode']);
        self::assertSame('49.99', $params['PriceExcl']);
    }

    public function testApiKeyFromConfigIsIncludedInEveryRequest(): void
    {
        $history = [];
        $product = $this->createController(Product::class, json_encode(['status' => 'success']), $history);

        $product->list([]);

        $params = $this->capturedFormParams($history);
        self::assertSame('test-api-key-12345', $params['api_key']);
    }

    public function testUserInputIsPassedThroughAsFormParams(): void
    {
        $history = [];
        $product = $this->createController(Product::class, json_encode(['status' => 'success']), $history);

        $product->add([
            'ProductName' => 'New Product',
            'ProductCode' => 'NP001',
            'TaxPercentage' => '21',
        ]);

        $params = $this->capturedFormParams($history);
        self::assertSame('New Product', $params['ProductName']);
        self::assertSame('NP001', $params['ProductCode']);
        self::assertSame('21', $params['TaxPercentage']);
        self::assertSame('product', $params['controller']);
        self::assertSame('add', $params['action']);
    }

    public function testErrorResponseIsReturned(): void
    {
        $history = [];
        $responseBody = json_encode([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
            'errors' => ['Product not found'],
        ]);

        $product = $this->createController(Product::class, $responseBody, $history);
        $result = $product->show(['Identifier' => '999']);

        self::assertInstanceOf(ErrorResponse::class, $result);
        self::assertTrue($result->isError());
        self::assertSame(Status::Error, $result->status);
        self::assertSame('Product not found', $result->errors[0]);
    }

    public function testInvalidJsonResponseReturnsErrorResponse(): void
    {
        $history = [];
        $product = $this->createController(Product::class, '<html>Server Error</html>', $history);

        $result = $product->list([]);

        self::assertInstanceOf(ErrorResponse::class, $result);
        self::assertTrue($result->isError());
        self::assertSame('invalid', $result->controller);
        self::assertSame('invalid', $result->action);
        self::assertNotEmpty($result->errors);
    }

    public function testConnectionFailureThrowsException(): void
    {
        $mock = new MockHandler([
            new \GuzzleHttp\Exception\ConnectException(
                'cURL error 7: Failed to connect',
                new \GuzzleHttp\Psr7\Request('POST', 'https://test.hostfact.tld')
            ),
        ]);
        $stack = HandlerStack::create($mock);

        $stubClient = $this->createStub(HttpClientInterface::class);
        $stubClient->method('getHttpClient')
            ->willReturn(new GuzzleClient(['handler' => $stack]));

        $product = Product::fromHttpClient($stubClient);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('cURL error 7');
        $product->list([]);
    }

    public function testControllerNewUsesLaravelConfig(): void
    {
        $product = Product::new();

        $baseUri = (string) $product->getHttpClient()->getHttpClient()->getConfig('base_uri');
        self::assertSame('https://test.hostfact.tld/Pro/apiv2/api.php', $baseUri);
    }

    public function testRequestMethodIsPost(): void
    {
        $history = [];
        $product = $this->createController(Product::class, json_encode(['status' => 'success']), $history);

        $product->list([]);

        self::assertSame('POST', $history[0]['request']->getMethod());
    }
}
