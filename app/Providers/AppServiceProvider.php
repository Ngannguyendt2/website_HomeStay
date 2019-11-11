<?php

namespace App\Providers;

use App\Http\Repositories\IMPL\UserRepositoryRepository;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Services\UserService;
use App\Http\Services\UserServiceInterface;
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
        //
        $this->app->singleton(UserRepositoryInterface::class,
            UserRepositoryRepository::class);
        $this->app->singleton(UserServiceInterface::class,
            UserService::class);
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
