<?php

namespace App\Providers;

use App\Services\IntegrationService;
use IDBInterface;
use Illuminate\Support\ServiceProvider;
use IntegrationRepository;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        Passport::ignoreRoutes();
        $this->app->bind(IDBInterface::class, IntegrationRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
