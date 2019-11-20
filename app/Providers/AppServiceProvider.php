<?php

namespace App\Providers;

use App\House;
use App\Http\Repositories\CustomerRepositoryInterface;
use App\Http\Repositories\HouseRepositoryInterface;
use App\Http\Repositories\IMPL\CustomerRepository;
use App\Http\Repositories\IMPL\HouseRepository;
use App\Http\Repositories\IMPL\UserRepository;
use App\Http\Repositories\UserRepositoryInterface;
use App\Http\Services\HouseServiceInterface;
use App\Http\Services\HouseService;
use App\Http\Services\UserService;
use App\Http\Services\UserServiceInterface;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
            UserRepository::class);
        $this->app->singleton(UserServiceInterface::class,
            UserService::class);

        $this->app->singleton(HouseRepositoryInterface::class,
            HouseRepository::class);
        $this->app->singleton(HouseServiceInterface::class,
            HouseService::class);

        $this->app->singleton(CustomerRepositoryInterface::class,
            CustomerRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
}
