<?php

namespace Actengage\Sanitize;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/sanitize.php', 'sanitize'
        );
    }

    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/sanitize.php' => config_path('sanitize.php'),
        ], 'sanitize-config');

        $this->app->bind('sanitize', function () {
            return new Sanitize(config('sanitize.sanitizers', []));
        });
    }
}
