<?php

namespace App\Http\Controllers\User;

use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Language;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Product;
use App\Models\SubCategory;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'home';
        $productSale = Product::with('category', 'sub_category', 'brand')->where('sale', 1)->get();
//        $pruductNew = Product::with('category', 'sub_category', 'brand')->where('status', 1)->get();
        $products = Product::with('category', 'sub_category', 'brand')->get();
        $names = Product::select('name')->distinct()->get();
        return view('user.home',
            ['title' => $title, 'productSale' => $productSale, 'products' => $products, 'names' => $names]);
    }

}
