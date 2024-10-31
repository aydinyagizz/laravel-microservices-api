<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class InterfaceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Interfaces\Eloquent\IAuthService::class,
            \App\Services\Eloquent\AuthService::class
        );

        $this->app->bind(\App\Interfaces\Eloquent\IProductService::class, \App\Services\Eloquent\ProductService::class);
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
