<?php

namespace App\Providers;

use App\Services\Interfaces\IDBInterface;
use Illuminate\Support\ServiceProvider;
use App\Services\Repositories\IntegrationRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IDBInterface::class, IntegrationRepository::class);

    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
