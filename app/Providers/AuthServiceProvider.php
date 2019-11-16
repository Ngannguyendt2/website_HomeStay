<?php

namespace App\Providers;

use App\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    const ADMIN = '1';
    const REGISTER = '0';
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

        //
        Gate::define('admin', function ($user) {
            if ($user->admin == self::ADMIN) {
                return true;
            }
            return false;
        });
        Gate::define('register', function ($user) {
            if ($user->admin == self::REGISTER) {
                return true;
            }
            return false;
        });

    }
}
