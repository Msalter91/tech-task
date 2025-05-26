<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\LookupInterface;
use App\Services\Lookup\LookupService;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Client;

class LookupServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
          LookupInterface::class,
          LookupService::class
        );
    }
}
