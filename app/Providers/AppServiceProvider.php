<?php

namespace App\Providers;

use App\Repositories\impl\RoleRepoImpl;
use App\Repositories\impl\UserRepoImpl;
use App\Repositories\RoleRepoInterface;
use App\Repositories\UserRepoInterface;
use App\services\impl\RoleServiceImpl;
use App\services\impl\UserServiceImpl;
use App\services\RoleServiceInterface;
use App\services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UserServiceInterface::class, UserServiceImpl::class);
        $this->app->singleton(UserRepoInterface::class, UserRepoImpl::class);
        $this->app->singleton(RoleServiceInterface::class, RoleServiceImpl::class);
        $this->app->singleton(RoleRepoInterface::class, RoleRepoImpl::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
