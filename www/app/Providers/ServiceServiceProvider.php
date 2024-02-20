<?php

declare(strict_types=1);

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\Location\LocationServiceInterface;
use App\Services\Location\Ip2LocationService;
use App\Services\Type\TypeServiceInterface;
use App\Services\Type\ProxyCheckService;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(
            LocationServiceInterface::class,
            Ip2LocationService::class
        );

        $this->app->bind(
            TypeServiceInterface::class,
            ProxyCheckService::class
        );
    }
}