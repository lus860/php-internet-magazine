<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\ImageController;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;
use App\Models\ProductImage;

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
        $title = 'Products';
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
            'new_price' => ['numeric'],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
        ]);

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['new_price'] = $request->new_price;
        $data['quantity'] = $request->quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['status'] =  $request->status ? 1:0;
        $data['sale'] =  $request->sale ? 1:0;

        $product = Product::create($data);

        if($request->image) {
            $images = $request->image;
            foreach ($images as $img) {
                $image = ImageController::imageUpload($img, null, $product->id);
                if($image) {
                    $dataImg[] = $image;
                }
            }
        }

        if($request->main_image) {
            $main_image = $request->main_image;
            $image = ImageController::imageUpload($main_image, null, $product->id);
            ProductImage::create(['product_id' => $product->id, 'img' => $image, 'status'=>1]);
        }

        if( count($dataImg)>0 ){
            foreach ($dataImg as $item) {
                ProductImage::create(['product_id' => $product->id, 'img' => $item]);
            }
        }

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
            'new_price' => ['numeric'],
            'quantity' => ['required', 'numeric'],
            'category_id' => ['required'],
            'brand_id' => ['required'],
//            'image' => ['mimes:jpeg,png,jpg'],
        ]);

        $data['name'] = $request->name;
        $data['price'] = $request->price;
        $data['new_price'] = $request->new_price;
        $data['quantity'] = $request->quantity;
        $data['category_id'] = $request->category_id;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['brand_id'] = $request->brand_id;
        $data['status'] = isset($request->status) ? 1:0;
        $data['sale'] =  isset($request->sale) ? 1:0;

        $product = Product::find($id);
        if($request->image) {
            $images = $request->image;
            foreach ($images as $img) {
                $image = ImageController::imageUpload($img, null, $product->id);
                if($image) {
                    $dataImg[] = $image;
                }
            }
        }
        if( isset($dataImg) && count($dataImg)>0 ){
            foreach ($dataImg as $item) {
                ProductImage::create(['product_id' => $product->id, 'img' => $item]);
            }
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
            if($product->images) {
                foreach ($product->images as $item) {
                    ImageController::imageDelete($item->img, null, $id);
                }
                ImageController::pathDelete(null, $id);
            }
            if( $product->delete()){
                return redirect('/admin/product')->with('success', __('product.product_destroy'));
            }
        } else {
            return redirect()->back()->with('error', 'Some mistake went !!');
        }
    }


    public function imgUpdate(Request $request, $prod_id, $img_id)
    {
        $main_img = ProductImage::find($img_id);
        if($request->hasFile('main_img')) {
            if($main_img->img) {
                ImageController::imageDelete($main_img->img, null, $prod_id);
            }
            $image = ImageController::imageUpload($request->main_img , null, $prod_id);
            if(ProductImage::where('id',  $img_id)->update(['img' => $image])){
              return redirect('/admin/product/edit/'.$prod_id);
            }

        }
    }


    public function imgDestroy($prod_id, $img_id)
    {
        $image = ProductImage::find($img_id);
        if ($image) {
            if ($image->img) {
                ImageController::imageDelete($image->img, null,$prod_id );
            }
            $image->delete();
            return redirect('/admin/product/edit/' . $prod_id);

        }
    }

}
