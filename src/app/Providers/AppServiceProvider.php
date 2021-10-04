<?php

namespace App\Providers;

use App\Repositories\Client\ClientRepository;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Services\Client\ClientService;
use App\Services\Client\ClientServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
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
        $this->app->singleton(ClientServiceInterface::class, ClientService::class);
        $this->app->singleton(UserServiceInterface::class, UserService::class);
        $this->app->singleton(ClientRepositoryInterface::class, ClientRepository::class);
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
