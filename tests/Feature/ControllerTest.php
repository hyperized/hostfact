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
use Orchestra\Testbench\TestCase;

class ControllerTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            'Hyperized\Hostfact\Providers\HostfactServiceProvider',
        ];
    }

    public function testInstantiation(): void
    {
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(Creditor::new());
        self::assertIsObject(Debtor::new());
        self::assertIsObject(Domain::new());
        self::assertIsObject(Group::new());
        self::assertIsObject(Handle::new());
        self::assertIsObject(Hosting::new());
        self::assertIsObject(Invoice::new());
        self::assertIsObject(Order::new());
        self::assertIsObject(PriceQuote::new());
        self::assertIsObject(Product::new());
        self::assertIsObject(Service::new());
        self::assertIsObject(Ssl::new());
        self::assertIsObject(Ticket::new());
        self::assertIsObject(Vps::new());
    }
}
