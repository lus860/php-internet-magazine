<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/hello', function () {
    return view('admin.product.imades');
});

Auth::routes(['verify' => true]);

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => config('admin.prefix')], function () {

    Route::get('/login', 'Admin\AuthController@showLoginForm')->name('admin_login');
    Route::get('/dashboard', 'Admin\DashboardController@index')->middleware('IsAdmin')->name('admin_dashboard');
    Route::get('/profile', 'Admin\ProfileController@index')->name('profile');
    Route::post('/profile/update', 'Admin\ProfileController@update')->name('profile_update');

    Route::prefix('/menu')->group(function () {
        Route::get('/', 'Admin\MenuController@index')->name('menu');
        Route::get('/create', 'Admin\MenuController@create')->name('menu_create');
        Route::post('/sorting', 'Admin\MenuController@sorting')->name('menu_sorting');
        Route::post('/store', 'Admin\MenuController@store')->name('menu_store');
        Route::get('/edit/{id}', 'Admin\MenuController@edit')->name('menu_edit');
        Route::post('/update/{id}', 'Admin\MenuController@update')->name('menu_update');
        Route::delete('/destroy/{id}', 'Admin\MenuController@destroy')->name('menu_destroy');
    });

    Route::prefix('/category')->group(function () {
        Route::get('/', 'Admin\CategoryController@index')->name('categories');
        Route::get('/create', 'Admin\CategoryController@create')->name('category_create');
        Route::post('/store', 'Admin\CategoryController@store')->name('category_store');
        Route::get('/edit/{id}', 'Admin\CategoryController@edit')->name('category_edit');
        Route::post('/update/{id}', 'Admin\CategoryController@update')->name('category_update');
        Route::delete('/destroy/{id}', 'Admin\CategoryController@destroy')->name('category_destroy');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/', 'Admin\UserController@index')->name('users');
        Route::get('/create', 'Admin\UserController@create')->name('user_create');
        Route::post('/store', 'Admin\UserController@store')->name('user_store');
        Route::get('/edit/{id}', 'Admin\UserController@edit')->name('user_edit');
        Route::post('/update/{id}', 'Admin\UserController@update')->name('user_update');
        Route::delete('/destroy/{id}', 'Admin\UserController@destroy')->name('user_destroy');
    });

    Route::prefix('/subcategory')->group(function () {
        Route::get('/', 'Admin\SubCategoryController@index')->name('subcategories');
        Route::get('/create', 'Admin\SubCategoryController@create')->name('subcategory_create');
        Route::post('/store', 'Admin\SubCategoryController@store')->name('subcategory_store');
        Route::get('/edit/{id}', 'Admin\SubCategoryController@edit')->name('subcategory_edit');
        Route::post('/update/{id}', 'Admin\SubCategoryController@update')->name('subcategory_update');
        Route::delete('/destroy/{id}', 'Admin\SubCategoryController@destroy')->name('subcategory_destroy');
    });

    Route::prefix('/product')->group(function () {
        Route::get('/', 'Admin\ProductController@index')->name('products');
        Route::get('/create', 'Admin\ProductController@create')->name('product_create');
        Route::post('/store', 'Admin\ProductController@store')->name('product_store');
        Route::get('/edit/{id}', 'Admin\ProductController@edit')->name('product_edit');
        Route::post('/update/{id}', 'Admin\ProductController@update')->name('product_update');
        Route::delete('/destroy/{id}', 'Admin\ProductController@destroy')->name('product_destroy');

        Route::post('/img/update/{prod_id}/{img_id}', 'Admin\ProductController@imgUpdate')->name('image_update');
        Route::delete('/img/destroy/{prod_id}/{img_id}', 'Admin\ProductController@imgDestroy')->name('image_destroy');
    });

    Route::prefix('/brand')->group(function () {
        Route::get('/', 'Admin\BrandController@index')->name('brands');
        Route::get('/create', 'Admin\BrandController@create')->name('brand_create');
        Route::post('/store', 'Admin\BrandController@store')->name('brand_store');
        Route::get('/edit/{id}', 'Admin\BrandController@edit')->name('brand_edit');
        Route::post('/update/{id}', 'Admin\BrandController@update')->name('brand_update');
        Route::delete('/destroy/{id}', 'Admin\BrandController@destroy')->name('brand_destroy');
    });


});


Route::group(['prefix' => Localization::getPrefix(), 'middleware' => 'languageManager'], function () {

    Route::get('/', 'User\HomeController@index')->name('index');
    Route::prefix('/ajax')->group(function () {
        Route::post('/name', 'User\ProductController@getProductAjax')->name('product_by_name');
        Route::post('/range', 'User\ProductController@getProductByRangeAjax')->name('product_by_range');
        Route::post('/cart', 'User\CartController@setProductCart')->name('product_to_cart');

    });

    Route::prefix('/cart')->group(function () {
        Route::get('/', 'User\CartController@cart')->name('cart_product');
        Route::get('/updateUp/{id}', 'User\CartController@updateUpProductCart')->name('update_up_cart');
        Route::get('/updateDown/{id}', 'User\CartController@updateDownProductCart')->name('update_down_cart');
        Route::get('/remove/{id}', 'User\CartController@removeProductCart')->name('remove_cart');
        Route::post('/update', 'User\CartController@updateProductCart')->name('update_cart');
    });

    Route::prefix('/user')->group(function () {
        Route::get('/login', 'User\AuthController@showSignInForm')->name('user_login');
        Route::get('/signup', 'User\AuthController@showSignUpForm')->name('user_signup');
        Route::post('order/signup', 'User\AuthController@register')->name('order_signup');
        Route::post('order/logged', 'User\AuthController@logged')->name('order_logged');
    });

    //ProductController
    Route::get('/product/{id}', 'User\ProductController@getProduct')->name('product');
    Route::get('/category/{id}', 'User\ProductController@categoryProduct')->name('category_product');
    Route::get('/subcategory/{id}', 'User\ProductController@subcategoryProduct')->name('subcategory_product');
    Route::get('/brand/{id}', 'User\ProductController@brandProduct')->name('brand_product');
    Route::get('/products', 'User\ProductController@allProduct')->name('all_product');

//    Route::get('/cart/updateUp/{id}', 'User\HomeController@updateUpProductCart')->name('update_up_cart');
//    Route::get('/cart/updateDown/{id}', 'User\HomeController@updateDownProductCart')->name('update_down_cart');
//    Route::get('/cart/remove/{id}', 'User\HomeController@removeProductCart')->name('remove_cart');
//    Route::post('/cart/update', 'User\HomeController@updateProductCart')->name('update_cart');
    //Route::get('/cart', 'User\HomeController@cart')->name('cart_product');

//    Route::get('/user/login', 'User\AuthController@showSignInForm')->name('user_login');
//    Route::get('/user/signup', 'User\AuthController@showSignUpForm')->name('user_signup');
});
