<?php

namespace Pixcafe\Starter;


use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class StarterServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        /*
         * Optional methods to load your package assets
         */
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'starter');
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'starter');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        $this->loadRoutesFrom(__DIR__ . '/routes/web.php');

        if ($this->app->runningInConsole()) {
            // Config
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('starter.php'),
            ], 'pixcafe-starter');

            // Publishing the views.
            $this->publishes([
                __DIR__ . '/resources/views' => resource_path('views'),
            ], 'pixcafe-starter');

            // Publishing assets.
            $this->publishes([
                __DIR__ . '/resources/assets' => public_path('/'),
            ], 'pixcafe-starter');


            // Publishing routes.
            $this->publishes([
                __DIR__ . '/routes' => base_path('routes'),
            ], 'pixcafe-starter');


            // Publishing providers.
            $this->publishes([
                __DIR__ . '/Providers' => app_path('Providers'),
            ], 'pixcafe-starter');

            // Publishing controllers.
            $this->publishes([
                __DIR__ . '/Http/Controllers' => app_path('Http/Controllers'),
                __DIR__ . '/Http/Requests' => app_path('Http/Requests'),
                __DIR__ . '/Helper' => app_path('Helper/'),
            ], 'pixcafe-starter');

            
            // Registering package commands.
            // $this->commands([]);
        }
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        // exec('composer dump-autoload');

        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'starter');

        // Register the main class to use with the facade
        $this->app->singleton('starter', function () {
            return new Starter;
        });
    }
}
