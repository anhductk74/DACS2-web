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
Route::prefix('admin')->group(function () {
    Route::get('/', 'AdminController@loginAdmin');
    Route::get('/register', 'AdminController@registerAdmin');
    Route::post('/login', 'AdminController@postloginAdmin');
    Route::post('/register', 'AdminController@postregisterAdmin');
    Route::get('/logout', 'AdminController@logOut');
    Route::get('/home', 'CategoryController@home');

    Route::prefix('/categories')->group(function () {
        Route::get('/', 'CategoryController@index');
        Route::get('/create', 'CategoryController@create');
        Route::post('/create', 'CategoryController@createCategory');
        Route::get('/edit/{idProduct}', 'CategoryController@findCategory');
        Route::get('/update/{idProduct}', 'CategoryController@updateCategory');
        Route::get('/removeCategory/{idProduct}', 'CategoryController@removeCategory');
});

    Route::prefix('order')->group(function () {
        Route::get('/', 'OrderController@indexOrder');
        Route::get('/confirm', 'OrderController@showConfirm');
        Route::get('/success', 'OrderController@shipSuccessAll');
        Route::get('/confirm/{id}', 'OrderController@orderConfirm');
        Route::get('/reconfirm/{id}', 'OrderController@reConfirm');
        Route::get('/shipSuccess/{id}', 'OrderController@shipSuccess');
        Route::get('/removeOrder/{id}', 'OrderController@removeOrderAdmin');
        Route::get('/canceled', 'OrderController@showCanceled');
        Route::get('/canceled/{id}', 'OrderController@orderCanceled');
    });
});

Route::prefix('/')->group(function () {
    Route::get('/', 'productController@productIndex')->name('/');
    Route::get('/products', 'productController@productAll')->name('/');

    Route::get('/Account', function () {
        return view('users.user.Account')->with('info', '');
    });

    Route::get('/about', function () {
        return view('users.user.About');
    });
    Route::get('/contact', function () {
        return view('users.user.contact');
    });
    Route::get('/order', 'OrderController@orderAll');
    Route::get('/order/remove/{id}', 'OrderController@removeOrder');

    Route::get('/product-detail/{idProduct}', 'productController@productDetail');
    Route::post('/product-detail/votes/{idProduct}', 'productController@productVotes');

    Route::get('/products/search', 'productController@searchProduct');

    Route::get('/cart', 'cartController@showCartAll');
    Route::get('/cart/{idProduct}', 'cartController@addProductCart');
    Route::get('/cart/update/{idProduct}', 'cartController@updateQtyCart');

    Route::get('/cart-pay', 'cartController@cartPay');
    Route::get('/cart-remove/{idCart}', 'cartController@cartRemove');
    Route::get('/cart-payment', 'cartController@order');


    Route::post('/', 'UserController@login')->name('login');
    Route::post('register', 'UserController@register')->name('register');
    Route::get('logout', 'UserController@logout')->name('logout');
});
