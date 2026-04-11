<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Feature;

use Hyperized\Hostfact\HostfactFacade;
use Hyperized\Hostfact\Providers\HostfactServiceProvider;
use Orchestra\Testbench\TestCase;

class HostfactFacadeTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            HostfactServiceProvider::class,
        ];
    }

    public function testFacadeAccessorReturnsHostfact(): void
    {
        $accessor = (new \ReflectionMethod(HostfactFacade::class, 'getFacadeAccessor'))->invoke(null);
        self::assertSame('Hostfact', $accessor);
    }
}
