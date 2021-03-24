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

class CartController extends Controller
{
    public function cartProduct($id, $qty)
    {
        $product = Product::where('id', $id)->first();
        if (!session('cart_id')) {
            session(['cart_id' => uniqid()]);
        }
        $cart_id = session('cart_id');
        \Cart::session($cart_id);

        if ($product->mainImg()) {

            $img = $product->mainImg();

        } elseif ($product->images()->first()->img) {

            $img = $product->images()->first()->img;

        } else {
            $img = '/admin/dist/img/product/no-image.png';
        };

        \Cart::add([
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->new_price !== 0 ? $product->new_price : $product->price,
            'quantity' => $qty,
            'attributes' => [
                'img' => $img,
            ]
        ]);
    }

    public function addProductCartAjax(Request $request)
    {
        $this->cartProduct($request->id, $request->qty);

        return response()->json(\Cart::getContent());

    }


    public function addProductCart($id)
    {
        $this->cartProduct($id, 1);

        return redirect()->back();

    }

    public function updateUpProductCart($id)
    {
        $title = 'cart';
        \Cart::session(session('cart_id'));

        \Cart::update($id, array(
            'quantity' => 1,
        ));

        return view('user.cart.cart', ['title' => $title]);

    }

    public function updateDownProductCart($id)
    {
        $title = 'cart';
        \Cart::session(session('cart_id'));

        \Cart::update($id, array(
            'quantity' => -1,
        ));

        return view('user.cart.cart', ['title' => $title]);

    }

    public function updateProductCart(Request $request)
    {
        \Cart::session(session('cart_id'));

        \Cart::update($request->id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $request->quantity
            ),
        ));

        return response()->json(\Cart::getContent());

    }

    public function removeProductCart($id)
    {
        $title = 'cart';
        \Cart::session(session('cart_id'));

        \Cart::remove($id);

        return view('user.cart.cart', ['title' => $title]);

    }

    public function cart(Request $request)
    {

        $title = 'cart';
        return view('user.cart.cart', ['title' => $title]);
    }

}
