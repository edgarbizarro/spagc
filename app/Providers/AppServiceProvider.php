<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Dedoc\Scramble\Scramble;
use Dedoc\Scramble\Support\Generator\OpenApi;
use Dedoc\Scramble\Support\Generator\SecurityScheme;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            \App\Domains\Repositories\StateRepositoryInterface::class,
            \App\Infrastructure\Repositories\StateRepository::class
        );

        $this->app->bind(
            \App\Domains\Repositories\CityRepositoryInterface::class,
            \App\Infrastructure\Repositories\CityRepository::class
        );

        $this->app->bind(
            \App\Domains\Repositories\ClusterRepositoryInterface::class,
            \App\Infrastructure\Repositories\ClusterRepository::class
        );

        $this->app->bind(
            \App\Domains\Repositories\CampaignRepositoryInterface::class,
            \App\Infrastructure\Repositories\CampaignRepository::class
        );

        $this->app->bind(
            \App\Domains\Repositories\DiscountRepositoryInterface::class,
            \App\Infrastructure\Repositories\DiscountRepository::class
        );

        $this->app->bind(
            \App\Domains\Repositories\ProductRepositoryInterface::class,
            \App\Infrastructure\Repositories\ProductRepository::class
        );
    }


    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Scramble::configure()
            ->withDocumentTransformers(function (OpenApi $openApi) {
                $openApi->secure(
                    SecurityScheme::http('bearer')
                );
            });
    }
}
