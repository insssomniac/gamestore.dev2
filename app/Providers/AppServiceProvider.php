<?php

namespace App\Providers;

use App\Category;
use App\News;
use App\Product;
use App\User;
use Auth;
use Illuminate\Support\ServiceProvider;
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
        View::share('categories', Category::all());
        View::share('newsMain', News::query()->orderBy('created_at', 'desc')->take(3)->get());
        View::share('randomProduct', Product::all()->random());
    }
}
