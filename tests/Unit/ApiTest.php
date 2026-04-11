<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;
use GuzzleHttp\Psr7\Response;
use Hyperized\Hostfact\Api\Controllers\Product;
use Hyperized\Hostfact\Api\Response\ErrorResponse;
use Hyperized\Hostfact\Api\Response\ListResponse;
use Hyperized\Hostfact\Api\Response\Status;
use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Orchestra\Testbench\TestCase;

class ApiTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            'Hyperized\Hostfact\Providers\HostfactServiceProvider',
        ];
    }

    private function createControllerWithMockResponse(string $body): Product
    {
        $mock = new MockHandler([
            new Response(200, [], $body),
        ]);
        $stack = HandlerStack::create($mock);

        $stubClient = $this->createStub(HttpClientInterface::class);
        $stubClient->method('getHttpClient')
            ->willReturn(new GuzzleClient(['handler' => $stack]));

        return Product::fromHttpClient($stubClient);
    }

    public function testSendRequestParsesJsonResponse(): void
    {
        $responseBody = json_encode([
            'controller' => 'product',
            'action' => 'list',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'totalresults' => 1,
            'currentresults' => 1,
            'offset' => 0,
            'products' => [['name' => 'Test']],
        ]);

        $controller = $this->createControllerWithMockResponse($responseBody);
        $result = $controller->list();

        self::assertInstanceOf(ListResponse::class, $result);
        self::assertSame('product', $result->controller);
        self::assertSame('list', $result->action);
        self::assertSame(Status::Success, $result->status);
        self::assertCount(1, $result->items);
    }

    public function testSendRequestHandlesInvalidJsonResponse(): void
    {
        $controller = $this->createControllerWithMockResponse('not valid json');
        $result = $controller->list();

        self::assertInstanceOf(ErrorResponse::class, $result);
        self::assertSame('product', $result->controller);
        self::assertSame('list', $result->action);
        self::assertSame(Status::Error, $result->status);
        self::assertNotEmpty($result->errors);
        self::assertIsString($result->errors[0]);
    }

    public function testSendRequestIncludesApiKeyInFormParams(): void
    {
        $history = [];

        $mock = new MockHandler([
            new Response(200, [], json_encode(['status' => 'success'])),
        ]);
        $stack = HandlerStack::create($mock);
        $stack->push(Middleware::history($history));

        $guzzle = new GuzzleClient(['handler' => $stack]);

        $stubClient = $this->createStub(HttpClientInterface::class);
        $stubClient->method('getHttpClient')->willReturn($guzzle);

        $controller = Product::fromHttpClient($stubClient);
        $controller->show(['Identifier' => '123']);

        $body = (string) $history[0]['request']->getBody();
        parse_str($body, $captured);

        self::assertArrayHasKey('api_key', $captured);
        self::assertArrayHasKey('controller', $captured);
        self::assertArrayHasKey('action', $captured);
        self::assertSame('123', $captured['Identifier']);
    }

    public function testSendRequestWrapsGuzzleException(): void
    {
        $mock = new MockHandler([
            new \GuzzleHttp\Exception\RequestException(
                'Connection refused',
                new \GuzzleHttp\Psr7\Request('POST', 'https://example.com')
            ),
        ]);
        $stack = HandlerStack::create($mock);

        $stubClient = $this->createStub(HttpClientInterface::class);
        $stubClient->method('getHttpClient')
            ->willReturn(new GuzzleClient(['handler' => $stack]));

        $controller = Product::fromHttpClient($stubClient);

        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('API call failed');
        $controller->show(['Identifier' => '1']);
    }

    public function testGetRequestReturnsPOSTMethod(): void
    {
        $request = Product::getRequest();

        self::assertSame('POST', $request->getMethod());
    }
}
