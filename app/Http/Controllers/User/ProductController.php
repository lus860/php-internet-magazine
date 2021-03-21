<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProductAjax(Request $request) {
        if($request->ajax()){
            if(isset($request->name)){
                $name = $request->name;
                $products = Product::with('category', 'sub_category', 'brand')->where('name', $name)->get();
            }

            return view('user.includes.get_product_by_name',['products'=>$products])->render();
        }

        return false;
    }

    public function getProductByRangeAjax(Request $request){

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
        return view('user.product.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function categoryProduct($id){
        $title = 'products';
        $category = Category::find($id);
        $products = $category->products;
        $header = $category->name.'  Items';
        return view('user.product.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function subcategoryProduct($id){
        $title = 'products';
        $subcategory = Subcategory::find($id);
        $products = $subcategory->products;
        $header = $subcategory->name.'  Items';
        return view('user.product.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function brandProduct($id){
        $title = 'products';
        $brand = Brand::find($id);
        $products = $brand->products;
        $header = $brand->name.'  Items';
        return view('user.product.products', ['products'=> $products,'title' => $title, 'header' => $header]);

    }

    public function getProduct($id) {
        $title = 'product';
        $product = Product::find($id);
        $header = $product->name.' '.$product->brand;
        return view('user.product.product', ['product'=> $product,'title' => $title, 'header' => $header]);
    }
}
