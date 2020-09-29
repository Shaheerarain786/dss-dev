<?php

namespace App\Providers;

use App\City;
use App\Observers\CitiesExcelFileImportObserver;
use App\Observers\OrganizationObserver;
use App\Organization;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Organization::observe(OrganizationObserver::class);
    }
}
