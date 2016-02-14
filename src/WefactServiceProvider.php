<?php

namespace Hyperized\Wefact;

use Illuminate\Support\ServiceProvider;

class WefactServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool $defer
     */
    protected $defer = false;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Configuration file
        $configPath = __DIR__ . '/config/Wefact.php';
        $this->mergeConfigFrom($configPath, 'Wefact');
        $this->publishes([
            $configPath => config_path('Wefact.php'),
        ]);
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['Hyperized\Wefact'];
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('Wefact', function ($app) {
            return new Hyperized\Wefact;
        });
    }

}
