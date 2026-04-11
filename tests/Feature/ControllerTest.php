<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Feature;

use Hyperized\Hostfact\Api\Controllers\CreditInvoice;
use Hyperized\Hostfact\Api\Controllers\Creditor;
use Hyperized\Hostfact\Api\Controllers\Debtor;
use Hyperized\Hostfact\Api\Controllers\Domain;
use Hyperized\Hostfact\Api\Controllers\Group;
use Hyperized\Hostfact\Api\Controllers\Handle;
use Hyperized\Hostfact\Api\Controllers\Hosting;
use Hyperized\Hostfact\Api\Controllers\Invoice;
use Hyperized\Hostfact\Api\Controllers\Order;
use Hyperized\Hostfact\Api\Controllers\PriceQuote;
use Hyperized\Hostfact\Api\Controllers\Product;
use Hyperized\Hostfact\Api\Controllers\Service;
use Hyperized\Hostfact\Api\Controllers\Ssl;
use Hyperized\Hostfact\Api\Controllers\Ticket;
use Hyperized\Hostfact\Api\Controllers\Vps;
use Hyperized\Hostfact\Interfaces\HttpClientInterface;
use Orchestra\Testbench\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ControllerTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            'Hyperized\Hostfact\Providers\HostfactServiceProvider',
        ];
    }

    /**
     * @return array<string, array{0: class-string}>
     */
    public static function controllerProvider(): array
    {
        return [
            'CreditInvoice' => [CreditInvoice::class],
            'Creditor' => [Creditor::class],
            'Debtor' => [Debtor::class],
            'Domain' => [Domain::class],
            'Group' => [Group::class],
            'Handle' => [Handle::class],
            'Hosting' => [Hosting::class],
            'Invoice' => [Invoice::class],
            'Order' => [Order::class],
            'PriceQuote' => [PriceQuote::class],
            'Product' => [Product::class],
            'Service' => [Service::class],
            'Ssl' => [Ssl::class],
            'Ticket' => [Ticket::class],
            'Vps' => [Vps::class],
        ];
    }

    /**
     * @param class-string $controllerClass
     */
    #[DataProvider('controllerProvider')]
    public function testControllerInstantiationViaNew(string $controllerClass): void
    {
        self::assertIsObject($controllerClass::new());
    }

    /**
     * @param class-string $controllerClass
     */
    #[DataProvider('controllerProvider')]
    public function testControllerInstantiationViaFromHttpClient(string $controllerClass): void
    {
        $mockClient = $this->createStub(HttpClientInterface::class);
        self::assertIsObject($controllerClass::fromHttpClient($mockClient));
    }
}
