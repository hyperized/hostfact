<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Feature;

use Hyperized\Hostfact\Api\Controllers\Vps;
use Orchestra\Testbench\TestCase;

class VpsTest extends TestCase
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

    public function testInstantiate(): void
    {
        $list = Vps::new()->list();

        self::assertIsString(
            $list
        );

        print_r(json_decode($list));
    }
}

