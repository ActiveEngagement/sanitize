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
        //
    }

    /**
     * Boot any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind('sanitize', fn () => new Sanitize());
    }
}
