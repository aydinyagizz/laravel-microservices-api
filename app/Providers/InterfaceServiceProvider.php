<?php

namespace App\Providers;

use App\Interfaces\Eloquent\IBlogService;
use App\Interfaces\Eloquent\IProductService;
use App\Interfaces\Eloquent\IUserService;
use App\Services\Eloquent\BlogService;
use App\Services\Eloquent\ProductService;
use App\Services\Eloquent\UserService;
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
        $this->app->bind(IBlogService::class, BlogService::class);
        $this->app->bind(IUserService::class, UserService::class);
    }


    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
