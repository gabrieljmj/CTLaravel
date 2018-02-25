<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\PersonRequestValidatorService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\PersonRequestValidatorService', function () {
            return new PersonRequestValidatorService();
        });
    }
}
