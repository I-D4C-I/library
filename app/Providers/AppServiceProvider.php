<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        define("RECORD_LIMIT", 24);
        define("BOOKS_LIMIT", 6);
        define("ADMIN_LIMIT", 12);
        define("SINGLE_UNIT", 1);

        Paginator::useBootstrapFive();
    }
}
