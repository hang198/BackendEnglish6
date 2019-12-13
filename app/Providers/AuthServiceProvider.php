<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('create', function ($user) {
            if ($user->hasPermission('create')) {
                return true;
            }
            return false;
        });
        Gate::define('read', function ($user) {
            if ($user->hasPermission('read')) {
                return true;
            }
            return false;
        });
        Gate::define('delete', function ($user) {
            if ($user->hasPermission('delete')) {
                return true;
            }
            return false;
        });
        Gate::define('editor', function ($user) {
            if ($user->hasPermission('editor')) {
                return true;
            }
            return false;
        });
    }
}
