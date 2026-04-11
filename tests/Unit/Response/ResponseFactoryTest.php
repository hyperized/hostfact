<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Unit\Response;

use Hyperized\Hostfact\Api\Entity\Debtor;
use Hyperized\Hostfact\Api\Entity\Product;
use Hyperized\Hostfact\Api\Response\ActionResponse;
use Hyperized\Hostfact\Api\Response\ErrorResponse;
use Hyperized\Hostfact\Api\Response\ListResponse;
use Hyperized\Hostfact\Api\Response\ResponseFactory;
use Hyperized\Hostfact\Api\Response\ShowResponse;
use Hyperized\Hostfact\Api\Response\Status;
use PHPUnit\Framework\TestCase;

class ResponseFactoryTest extends TestCase
{
    public function testErrorResponseIsCreatedForErrorStatus(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
            'errors' => ['Product not found'],
        ]);

        self::assertInstanceOf(ErrorResponse::class, $response);
        self::assertTrue($response->isError());
        self::assertFalse($response->isSuccess());
        self::assertSame(Status::Error, $response->status);
        self::assertSame('product', $response->controller);
        self::assertSame('show', $response->action);
        self::assertSame(['Product not found'], $response->errors);
    }

    public function testShowResponseIsCreatedForSingularEntityKey(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'product' => [
                'Identifier' => 1,
                'ProductCode' => 'P001',
                'ProductName' => 'Hosting Basic',
            ],
        ]);

        self::assertInstanceOf(ShowResponse::class, $response);
        self::assertTrue($response->isSuccess());
        self::assertSame('P001', $response->data->string('ProductCode'));
        self::assertSame(1, $response->data->int('Identifier'));
        self::assertInstanceOf(Product::class, $response->entity);
        self::assertSame('P001', $response->entity->ProductCode);
    }

    public function testListResponseIsCreatedForPluralEntityKey(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'list',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'totalresults' => 2,
            'currentresults' => 2,
            'offset' => 0,
            'products' => [
                ['Identifier' => 1, 'ProductName' => 'Basic'],
                ['Identifier' => 2, 'ProductName' => 'Pro'],
            ],
        ]);

        self::assertInstanceOf(ListResponse::class, $response);
        self::assertTrue($response->isSuccess());
        self::assertSame(2, $response->pagination->totalResults);
        self::assertSame(2, $response->pagination->currentResults);
        self::assertSame(0, $response->pagination->offset);
        self::assertCount(2, $response->items);
        self::assertSame('Basic', $response->items[0]->string('ProductName'));
        self::assertSame('Pro', $response->items[1]->string('ProductName'));
        self::assertCount(2, $response->entities);
        self::assertInstanceOf(Product::class, $response->entities[0]);
        self::assertSame('Basic', $response->entities[0]->ProductName);
    }

    public function testActionResponseIsCreatedWhenNoEntityData(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'invoice',
            'action' => 'markaspaid',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        self::assertInstanceOf(ActionResponse::class, $response);
        self::assertTrue($response->isSuccess());
        self::assertSame('invoice', $response->controller);
        self::assertSame('markaspaid', $response->action);
    }

    public function testShowResponseForAddAction(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'debtor',
            'action' => 'add',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'debtor' => [
                'Identifier' => 42,
                'DebtorCode' => 'DB0001',
                'CompanyName' => 'Acme',
            ],
        ]);

        self::assertInstanceOf(ShowResponse::class, $response);
        self::assertSame('Acme', $response->data->string('CompanyName'));
        self::assertInstanceOf(Debtor::class, $response->entity);
        self::assertSame('Acme', $response->entity->CompanyName);
    }

    public function testDateIsParsedAsDateTimeImmutable(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'success',
            'date' => '2024-06-15T14:30:00+02:00',
            'product' => ['Identifier' => 1],
        ]);

        self::assertSame('2024-06-15', $response->date->format('Y-m-d'));
    }

    public function testToArrayReturnsRawData(): void
    {
        $raw = [
            'controller' => 'product',
            'action' => 'list',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'products' => [],
            'totalresults' => 0,
            'currentresults' => 0,
            'offset' => 0,
        ];

        $response = ResponseFactory::fromArray($raw);
        self::assertSame($raw, $response->toArray());
    }

    public function testUnknownControllerReturnsActionResponse(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'unknown',
            'action' => 'test',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        self::assertInstanceOf(ActionResponse::class, $response);
    }

    public function testAllControllersProduceShowResponse(): void
    {
        $controllers = [
            'product', 'invoice', 'debtor', 'domain', 'hosting',
            'service', 'ssl', 'vps', 'ticket', 'order',
            'pricequote', 'creditor', 'creditinvoice', 'group', 'handle',
        ];

        foreach ($controllers as $name) {
            $response = ResponseFactory::fromArray([
                'controller' => $name,
                'action' => 'show',
                'status' => 'success',
                'date' => '2024-01-01T00:00:00+00:00',
                $name => ['Identifier' => 1],
            ]);

            self::assertInstanceOf(ShowResponse::class, $response, "Failed for controller: {$name}");
        }
    }

    public function testAllControllersProduceListResponse(): void
    {
        $mapping = [
            'product' => 'products',
            'invoice' => 'invoices',
            'debtor' => 'debtors',
            'domain' => 'domains',
            'hosting' => 'hostings',
            'service' => 'services',
            'ssl' => 'ssls',
            'vps' => 'vpses',
            'ticket' => 'tickets',
            'order' => 'orders',
            'pricequote' => 'pricequotes',
            'creditor' => 'creditors',
            'creditinvoice' => 'creditinvoices',
            'group' => 'groups',
            'handle' => 'handles',
        ];

        foreach ($mapping as $controller => $pluralKey) {
            $response = ResponseFactory::fromArray([
                'controller' => $controller,
                'action' => 'list',
                'status' => 'success',
                'date' => '2024-01-01T00:00:00+00:00',
                'totalresults' => 1,
                'currentresults' => 1,
                'offset' => 0,
                $pluralKey => [['Identifier' => 1]],
            ]);

            self::assertInstanceOf(ListResponse::class, $response, "Failed for controller: {$controller}");
            self::assertCount(1, $response->items);
        }
    }

    public function testErrorResponseWithMultipleErrors(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'debtor',
            'action' => 'add',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
            'errors' => ['Field required: SurName', 'Field required: EmailAddress'],
        ]);

        self::assertInstanceOf(ErrorResponse::class, $response);
        self::assertCount(2, $response->errors);
        self::assertSame('Field required: SurName', $response->errors[0]);
    }

    public function testInvalidJsonFallbackResponse(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'invalid',
            'action' => 'invalid',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
            'errors' => ['Syntax error'],
        ]);

        self::assertInstanceOf(ErrorResponse::class, $response);
        self::assertSame('invalid', $response->controller);
    }

    public function testErrorResponseWithNonStringStatus(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 123,
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        self::assertInstanceOf(ErrorResponse::class, $response);
        self::assertSame(Status::Error, $response->status);
    }

    public function testErrorResponseWithNonArrayErrors(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
            'errors' => 'not an array',
        ]);

        self::assertInstanceOf(ErrorResponse::class, $response);
        self::assertEmpty($response->errors);
    }

    public function testErrorResponseCastsNonStringErrors(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
            'errors' => [42, 'string error'],
        ]);

        self::assertInstanceOf(ErrorResponse::class, $response);
        self::assertSame('42', $response->errors[0]);
        self::assertSame('string error', $response->errors[1]);
    }

    public function testMissingControllerDefaultsToUnknown(): void
    {
        $response = ResponseFactory::fromArray([
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        self::assertSame('unknown', $response->controller);
        self::assertSame('unknown', $response->action);
    }

    public function testMissingDateDefaultsToNow(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'success',
        ]);

        self::assertSame(date('Y-m-d'), $response->date->format('Y-m-d'));
    }

    public function testNonStringControllerDefaultsToUnknown(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 123,
            'action' => 'show',
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        self::assertSame('unknown', $response->controller);
    }

    public function testNonStringActionDefaultsToUnknown(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => ['invalid'],
            'status' => 'error',
            'date' => '2024-01-01T00:00:00+00:00',
        ]);

        self::assertSame('unknown', $response->action);
    }

    public function testNonStringDateDefaultsToNow(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'success',
            'date' => 12345,
            'product' => ['Identifier' => '1'],
        ]);

        self::assertSame(date('Y-m-d'), $response->date->format('Y-m-d'));
    }

    public function testPluralKeyAsNonArrayFallsThrough(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'list',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'products' => 'not-an-array',
        ]);

        self::assertInstanceOf(ActionResponse::class, $response);
    }

    public function testSingularKeyAsNonArrayFallsThrough(): void
    {
        $response = ResponseFactory::fromArray([
            'controller' => 'product',
            'action' => 'show',
            'status' => 'success',
            'date' => '2024-01-01T00:00:00+00:00',
            'product' => 'not-an-array',
        ]);

        self::assertInstanceOf(ActionResponse::class, $response);
    }
}
