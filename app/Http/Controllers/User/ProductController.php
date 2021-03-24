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
    public function getProductByNameAjax(Request $request)
    {
        if ($request->ajax()) {
            if (isset($request->name)) {
                $name = $request->name;
                $products = Product::with('category', 'sub_category', 'brand')->where([
                    'name' => $name,
                    'active' => 1
                ])->get();
            }

            return view('user.includes.get_product_by_name', ['products' => $products, 'name' => $name])->render();
        }

        return false;
    }

    public function getProductByRangeAjax(Request $request)
    {
        if ($request->ajax()) {
            if (isset($request->range)) {
                $range = $request->range;
                $range = explode(" :", $range);
                $title = 'products';
                $header = 'Price' . ' ' . $range[0] . '-' . $range[1];
                $products = Product::with('category', 'sub_category', 'brand')
                    ->whereBetween('price', [$range[0], $range[1]])
                    ->where('active', 1)
                    ->paginate(2);
                $products->appends(['from' => $range[0]]);
                $products->appends(['to' => $range[1]]);
                $products->withPath('/product/price_range/' . $range[0] . '/' . $range[1]);
            }

            return view('user.includes.products',
                ['products' => $products, 'title' => $title, 'header' => $header])->render();
        }

        return false;
    }


    public function getProductByRange($to, $from)
    {
        $title = 'products';
        $header = 'Price' . ' ' . $to . '-' . $from;

        $products = Product::with('category', 'sub_category', 'brand')
            ->whereBetween('price', [$to, $from])
            ->where('active', 1)
            ->paginate(2);

        return view('user.product.products', ['products' => $products, 'title' => $title, 'header' => $header]);
    }

    public function getProductByName($name)
    {
        $title = 'products';

        $header = ucfirst($name);

        if (isset($name)) {
            $products = Product::with('category', 'sub_category', 'brand')->where([
                'name' => $name,
                'active' => 1
            ])->paginate(5);
        }
        return view('user.product.products', ['products' => $products, 'title' => $title, 'header' => $header]);

    }

    public function allProduct()
    {
        $title = 'products';
        $header = 'Features Items';
        $products = Product::with('category', 'sub_category', 'brand')->where('active', 1)->paginate(5);
        return view('user.product.products', ['products' => $products, 'title' => $title, 'header' => $header]);

    }

    public function categoryProduct($id)
    {
        $title = 'products';
        $category = Category::find($id);
        $products = $category->products()->paginate(5);
        $header = $category->name . '  Items';
        return view('user.product.products', ['products' => $products, 'title' => $title, 'header' => $header]);

    }

    public function subcategoryProduct($subcategory_id, $category_id)
    {
        $title = 'products';
        $category = Category::find($category_id);
        $subcategory = $category->sub_categories()->find($subcategory_id);
        $products = Product::where([
            'category_id' => $category_id,
            'subcategory_id' => $subcategory_id,
            'active' => 1
        ])->paginate(5);
        $header = $category->name . 's' . ' ' . $subcategory->name . '  Items';
        return view('user.product.products', ['products' => $products, 'title' => $title, 'header' => $header]);

    }

    public function brandProduct($id)
    {
        $title = 'products';
        $brand = Brand::find($id);
        $products = $brand->products()->paginate(5);
        $header = $brand->name . '  Items';
        return view('user.product.products', ['products' => $products, 'title' => $title, 'header' => $header]);

    }

    public function getProduct($id)
    {
        $title = 'product';
        $product = Product::find($id);
        $header = $product->name . ' ' . $product->brand;
        return view('user.product.product', ['product' => $product, 'title' => $title, 'header' => $header]);
    }
}
