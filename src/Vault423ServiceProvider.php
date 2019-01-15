<?php

namespace SebastianJung\Vault423;

use Illuminate\Support\ServiceProvider;

class Vault423ServiceProvider extends ServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__ . '/config/vault-423.php', 'vault-423'
        );
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'vault-423');

        if (!$this->app->routesAreCached()) {
            require __DIR__ . '/routes.php';
        }

        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ], 'config');
    }
}
