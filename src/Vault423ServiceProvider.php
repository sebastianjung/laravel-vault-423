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

        $this->loadRoutesFrom(__DIR__ . '/routes.php');

        // $this->publishes([
        //     __DIR__ . '/resources/views' => resource_path('views/vendor/vault-423'),
        // ], 'views');

        // $this->publishes([
        //     __DIR__ . '/resources/js' => public_path('js'),
        // ], 'js');

        $this->publishes([
            __DIR__ . '/resources/img' => public_path('img/vault-423/'),
        ], 'img');

        $this->publishes([
            __DIR__ . '/config' => config_path(),
        ], 'config');
    }
}
