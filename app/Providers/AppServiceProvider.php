<?php

namespace App\Providers;

use App\Repositories\Impl\ProfileRepositoryImpl;
use App\Repositories\ProfileRepositoryInterface;
use App\Services\Impl\ProfileServiceImpl;
use App\Services\ProfileServicesInterface;
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
        $this->app->singleton(
            ProfileRepositoryInterface::class,
            ProfileRepositoryImpl::class
        );
        $this->app->singleton(
            ProfileServicesInterface::class,
            ProfileServiceImpl::class
        );
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
