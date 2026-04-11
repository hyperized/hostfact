<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Providers;

use Illuminate\Support\ServiceProvider;

class HostfactServiceProvider extends ServiceProvider
{
    private static string $configPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' .
    DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

    public function boot(): void
    {
        $this->publishes(
            [
                self::$configPath . 'Hostfact.php' => config_path('Hostfact.php'),
            ],
            'config'
        );
    }

    public function register(): void
    {
        $this->mergeConfigFrom(self::$configPath . 'Hostfact.php', 'Hostfact');
    }

    /**
     * @return array<string>
     */
    public function provides(): array
    {
        return [];
    }
}
