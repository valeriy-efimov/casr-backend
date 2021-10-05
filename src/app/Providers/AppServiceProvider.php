<?php

namespace App\Providers;

use App\Repositories\Client\ClientRepository;
use App\Repositories\Client\ClientRepositoryInterface;
use App\Services\Client\ClientService;
use App\Services\Client\ClientServiceInterface;
use App\Services\GeoCoordinate\GeoCoordinatesService;
use App\Services\GeoCoordinate\GeoCoordinatesServiceInterface;
use App\Services\User\UserService;
use App\Services\User\UserServiceInterface;
use GuzzleHttp\Client;
use Illuminate\Contracts\Cache\Repository;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Spatie\Geocoder\Geocoder;

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

        $this->app->singleton(GeoCoordinatesServiceInterface::class, static function (Application $application) {
            $geo = new Geocoder($application->make(Client::class));
            $geo->setApiKey(config('geocoder.key'));

            return new GeoCoordinatesService(
                $application->make(Repository::class),
                $geo,
                1800
            );
        });
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
