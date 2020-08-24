<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Backend\Category;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // $pCategories = Category::orderBy('id', 'asc')->where('parent_id',0)->get();
        View::share('pCategories', Category::orderBy('id', 'asc')->where('parent_id',0)->get());
    }
}
