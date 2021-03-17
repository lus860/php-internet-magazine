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
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

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
        return view('user.home', ['title' => $title,'productSale'=>$productSale, 'products'=> $products, 'names'=> $names]);
    }

    public function getProduct(Request $request) {
        if($request->ajax()){
            if(isset($request->name)){
                $name = $request->name;
                $pruducts = Product::with('category', 'sub_category', 'brand')->where('name', $name)->get();
            }

            return view('user.includes.get_product_by_name',['pruducts'=>$pruducts])->render();
        }

        return false;
    }


    public function getProductRange(Request $request){

        if($request->ajax()){
            if(isset($request->range)){
                $range = $request->range;
                $range = explode(" :", $range);
                $title = 'products';
                $header = 'Price'.' '.$range[0]. '-'. $range[1];
                $products = Product::with('category', 'sub_category', 'brand')
                    ->whereBetween('price', [ $range[0],  $range[1]])
                    ->get();
            }

            return view('user.includes.products',['products'=>$products,'title' => $title, 'header' => $header])->render();
        }

        return false;
    }

    public function allProduct(){
        $title = 'products';
        $header = 'Features Items';
        $products = Product::with('category', 'sub_category', 'brand')->get();
        return view('user.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function CategoryProduct($id){
        $title = 'products';
        $category = Category::find($id);
        $products = $category->products;
        $header = $category->name.'  Items';
        return view('user.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function subcategoryProduct($id){
        $title = 'products';
        $subcategory = Subcategory::find($id);
        $products = $subcategory->products;
        $header = $subcategory->name.'  Items';
        return view('user.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function brandProduct($id){
        $title = 'products';
        $brand = Brand::find($id);
        $products = $brand->products;
        $header = $brand->name.'  Items';
        return view('user.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function product($id) {
        $title = 'product';
        $product = Product::find($id);
        $header = $product->name.' '.$product->brand;
        return view('user.product', ['product'=> $product,'title' => $title, 'header' => $header]);
    }


    public function cart() {
        $title = 'product';

        return view('user.cart', ['title' => $title]);
    }


}
