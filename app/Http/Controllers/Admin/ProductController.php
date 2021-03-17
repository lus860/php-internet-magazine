<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
        $this->middleware('IsAdmin');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Product';
        $products = Product::all();
        return view('admin.product.index', ['title' => $title, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Create Product';

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        return view('admin.product.create', ['title' => $title, 'categories' => $categories, 'subcategories' => $subcategories,  'brands' => $brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'image' => ['required', 'max:10000', 'mimes:jpeg,png,jpg'],
        ]);

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['quantity'] = $request->quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['status'] =  $request->status ? 1:0;
        $data['sale'] =  $request->sale ? 1:0;

        if($request->image) {
            $image = ImageController::imageUpload($request->image);
            $data['img'] = $image;
        }

        $product = Product::create($data);

        if ($product) {
            return redirect('/admin/product')->with('success', __('product.product_create'));
        }
        return redirect()->back()->with('error', __('message.error.some_mistake_went'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Product';

        $categories = Category::all();
        $subcategories = SubCategory::all();
        $brands = Brand::all();
        $product = Product::find($id);
        return view('admin.product.edit', ['title' => $title,
            'categories' => $categories,
            'subcategories' => $subcategories,
            'brands' => $brands,
            'product' => $product
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate( [
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric'],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
            'image' => ['mimes:jpeg,png,jpg'],
        ]);

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['quantity'] = $request->quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['status'] =  $request->status ? 1:0;
        $data['sale'] =  $request->sale ? 1:0;

        $product = Product::find($id);
        if($request->image) {
            if($product->img) {
                ImageController::imageDelete($product->img);
            }
            $image = ImageController::imageUpload($request->image);
            $data['img'] = $image;
        }

        if($product){
            if(Product::where('id',  $id)->update($data)){
                return redirect('/admin/product')->with('success',  __('product.product_update'));
            }

            return redirect()->back()->with('error', __('message.error.some_mistake_went'));
        }
        return redirect()->back()->with('error', __('message.error.some_mistake_went'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if($product){
            if($product->img) {
                ImageController::imageDelete($product->img);
            }
            if( $product->delete()){
                return redirect('/admin/product')->with('success', __('product.product_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }
}
