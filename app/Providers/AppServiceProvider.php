<?php

namespace App\Providers;

use App\Repositories\Impl\PostRepositoryImpl;
use App\Repositories\Impl\ProfileRepositoryImpl;
use App\Repositories\PostRepository;
use App\Repositories\ProfileRepositoryInterface;
use App\Services\Impl\PostServiceImpl;
use App\Services\Impl\ProfileServiceImpl;
use App\Services\PostService;
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
        $this->app->singleton(
            PostRepository::class,
            PostRepositoryImpl::class
        );
        $this->app->singleton(
            PostService::class,
            PostServiceImpl::class
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
