<?php

namespace Hyperized\WeFact;

use Illuminate\Support\ServiceProvider;

class WefactServiceProvider extends ServiceProvider {

  /**
   * @var bool $defer Indicates if loading of the provider is deferred.
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
    $this->publishes([
      __DIR__.'/config/Wefact.php' => config_path('Wefact.php'),
    ]);
  }

  /**
   * Register the application services.
   *
   * @return void
   */
  public function register()
  {
    //echo 'WefactServiceProvider::register called!';
  }

}
