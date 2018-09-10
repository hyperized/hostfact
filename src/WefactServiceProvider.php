<?php

namespace Hyperized\Wefact;

use Illuminate\Support\ServiceProvider;

class WefactServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        // Configuration file
        $configPath = __DIR__ . '/config/Wefact.php';
        $this->mergeConfigFrom($configPath, 'Wefact');
        $this->publishes([
            $configPath => config_path('Wefact.php'),
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(WefactAPI::class, function ($app) {
            return new WefactAPI();
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return [
            WefactAPI::class
        ];
    }
}
