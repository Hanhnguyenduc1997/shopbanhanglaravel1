<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\CategoryProducts;

use Illuminate\Support\Facades\View;

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
        $categoryProducts = CategoryProducts::all();
        View::share('categoryProducts', $categoryProducts);
    }
}
