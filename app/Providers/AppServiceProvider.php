<?php

namespace App\Providers;

use App\Http\Repositories\IMPL\UserProfileRepositoryRepository;
use App\Http\Repositories\UserProfileRepositoryInterface;
use App\Http\Services\UserProfileService;
use App\Http\Services\UserProfileServiceInterface;
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
        $this->app->singleton(UserProfileRepositoryInterface::class,
            UserProfileRepositoryRepository::class);
        $this->app->singleton(UserProfileServiceInterface::class,
            UserProfileService::class);
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
