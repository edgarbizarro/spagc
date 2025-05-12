<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domain\Repositories\StateRepositoryInterface::class,
            \App\Infrastructure\Repositories\StateRepository::class,

            \App\Domain\Repositories\CityRepositoryInterface::class,
            \App\Infrastructure\Repositories\CityRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
