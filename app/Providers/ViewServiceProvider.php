<?php

namespace App\Providers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\ServiceProvider;
use App\Models\Menu;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('active_menu', Menu::with('childrens')->orderBy('sort_order')->where('status', 1)->get());

        view()->share('categories', Category::with('products', 'sub_categories')->get());
        view()->share('subcategories', SubCategory::with('categories', 'products')->get());
        view()->share('brands', Brand::with('products')->get());
    }
}
