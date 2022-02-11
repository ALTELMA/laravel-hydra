<?php

namespace Altelma\LaravelHydra;

use Illuminate\Support\ServiceProvider;

class LaravelHydraServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/hydra.php', 'hydra');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/hydra.php' => config_path('hydra.php'),
            ], 'config');
        }
    }
}
