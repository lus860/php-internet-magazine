<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Models\Product;


class DashboardController extends Controller
{

    public function index()
    {
        $title = 'Dashboard';
        $users = User::count();
        $products = Product::count();
        $newProducts = Product::where('status', 0)->count();
        return view('admin.dashboard', [
            'title' => $title,
            'usersCount' => $users,
            'productsCount' => $products,
            'newProductsCount' => $newProducts
        ]);
    }
}
