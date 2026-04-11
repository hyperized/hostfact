<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Tests\Feature;

use Hyperized\Hostfact\Exceptions\InvalidArgumentException;
use Hyperized\Hostfact\Providers\HostfactServiceProvider;
use Illuminate\Support\ServiceProvider;
use Orchestra\Testbench\TestCase;

class ServiceProviderTest extends TestCase
{
    protected function getPackageProviders($app): array
    {
        return [
            HostfactServiceProvider::class,
        ];
    }

    public function testConfigIsMerged(): void
    {
        self::assertNotNull(config('Hostfact'));
        self::assertIsArray(config('Hostfact'));
    }

    public function testConfigHasExpectedKeys(): void
    {
        self::assertArrayHasKey('api_v2_url', config('Hostfact'));
        self::assertArrayHasKey('api_v2_key', config('Hostfact'));
        self::assertArrayHasKey('api_v2_timeout', config('Hostfact'));
    }

    public function testDefaultTimeout(): void
    {
        self::assertSame(20, config('Hostfact.api_v2_timeout'));
    }

    public function testGetUrlFromConfigThrowsWhenNotString(): void
    {
        config(['Hostfact.api_v2_url' => null]);

        $this->expectException(InvalidArgumentException::class);

        \Hyperized\Hostfact\Api\Controllers\Product::getUrlFromConfig();
    }

    public function testGetUrlFromConfigReturnsString(): void
    {
        config(['Hostfact.api_v2_url' => 'https://example.com/api.php']);

        $url = \Hyperized\Hostfact\Api\Controllers\Product::getUrlFromConfig();

        self::assertSame('https://example.com/api.php', $url);
    }

    public function testPublishesConfigFile(): void
    {
        $publishes = ServiceProvider::$publishes[HostfactServiceProvider::class] ?? [];

        self::assertNotEmpty($publishes, 'ServiceProvider should publish config files');

        $sourceFile = array_key_first($publishes);
        self::assertIsString($sourceFile);
        self::assertFileExists($sourceFile, 'Published config source file must exist');
        self::assertStringEndsWith('Hostfact.php', $sourceFile);
    }

    public function testPublishedConfigSourceContainsExpectedKeys(): void
    {
        $publishes = ServiceProvider::$publishes[HostfactServiceProvider::class] ?? [];
        $sourceFile = array_key_first($publishes);

        self::assertIsString($sourceFile);

        $config = require $sourceFile;

        self::assertIsArray($config);
        self::assertArrayHasKey('api_v2_url', $config);
        self::assertArrayHasKey('api_v2_key', $config);
        self::assertArrayHasKey('api_v2_timeout', $config);
    }

    public function testPublishesUnderConfigTag(): void
    {
        $groups = ServiceProvider::$publishGroups ?? [];

        self::assertArrayHasKey('config', $groups, 'Config should be publishable under "config" tag');
        self::assertNotEmpty($groups['config']);
    }

    public function testPublishTargetIsConfigPath(): void
    {
        $publishes = ServiceProvider::$publishes[HostfactServiceProvider::class] ?? [];

        $target = array_values($publishes)[0] ?? null;
        self::assertIsString($target);
        self::assertStringEndsWith('Hostfact.php', $target);
    }
}
