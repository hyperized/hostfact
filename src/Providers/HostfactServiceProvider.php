<?php declare(strict_types=1);

namespace Hyperized\Hostfact\Providers;

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
        $this->publishes([
            __DIR__.'/../config/hostfact.php' => config_path('hostfact.php'),
        ], 'config');

        $this->mergeConfigFrom(__DIR__.'/../config/hostfact.php', 'hostfact');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        //
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
