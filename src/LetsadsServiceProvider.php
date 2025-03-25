<?php

namespace Nekkoy\GatewayLetsads;

use Illuminate\Support\ServiceProvider;

/**
 *
 */
class LetsadsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(\Nekkoy\GatewayLetsads\Services\GatewayService::class, function ($app) {
            return new \Nekkoy\GatewayLetsads\Services\GatewayService();
        });

        $this->app->singleton('gateway-letsads', function ($app) {
            return new \Nekkoy\GatewayLetsads\Services\GatewayLetsadsService();
        });
    }

    public function boot()
    {
        $this->publishes([__DIR__ . '/../config/config.php' => config_path('gateway-letsads.php')], 'config');
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'gateway-letsads');
    }
}
