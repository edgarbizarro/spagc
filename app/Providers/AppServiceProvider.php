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

            \App\Domain\Repositories\ClusterRepositoryInterface::class,
            \App\Infrastructure\Repositories\ClusterRepository::class,

            \App\Domain\Repositories\CampaignRepositoryInterface::class,
            \App\Infrastructure\Repositories\CampaignRepository::class,

            \App\Domain\Repositories\DiscountRepositoryInterface::class,
            \App\Infrastructure\Repositories\DiscountRepository::class,
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
