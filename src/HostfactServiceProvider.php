<?php

namespace Hyperized\Hostfact;

use Illuminate\Support\ServiceProvider;

class HostfactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Configuration file
        $configPath = __DIR__ . '/config/Hostfact.php';
        $this->mergeConfigFrom($configPath, 'Hostfact');
        $this->publishes(
            [
            $configPath => config_path('Hostfact.php'),
            ], 'config'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            HostfactAPI::class, function ($app) {
                return new HostfactAPI();
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            HostfactAPI::class
        ];
    }
}
