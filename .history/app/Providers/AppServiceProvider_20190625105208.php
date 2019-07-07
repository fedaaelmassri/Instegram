<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Paginate\Paginator;

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
        Paginator:defultView('vendor.pagination.bootstr');

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}