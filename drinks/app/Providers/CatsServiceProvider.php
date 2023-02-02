<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\CatsService;

class CatsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(CatsService::class, function ($app) {
            return new CatsService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
