<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Feature;

use Hyperized\Hostfact\Api\Controllers\CreditInvoice;
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
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
        self::assertIsObject(CreditInvoice::new());
    }
}
