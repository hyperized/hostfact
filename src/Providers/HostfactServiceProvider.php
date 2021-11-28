<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Providers;

use Illuminate\Support\ServiceProvider;

class HostfactServiceProvider extends ServiceProvider
{
    private static string $configPath = __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . '..' .
    DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Configuration file
        $this->publishes(
            [
                self::$configPath . 'config.php' => config_path('Hostfact.php'),
            ],
            'config'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(self::$configPath . 'Hostfact.php', 'Hostfact');
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array<string>
     */
    public function provides(): array
    {
        return [];
    }
}
