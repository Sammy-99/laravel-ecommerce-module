<?php

use Modules\Product\Http\Controllers\Frontend;
// use Modules\Product\Http\Controllers\AuthController;
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

Route::prefix('product')->group(function() {
  
    Route::get('/add-product', function(){
        return view('product::admin.import.add-product');
    })->name('add-product');
    Route::get('/', [Frontend\HomeController::class,'getProduct'])->name('/');
    Route::get('/view-cart', [Frontend\CartController::class,'getCartProductList'])->name('view-cart');

    Route::get('/checkout', [Frontend\CheckoutController::class,'index'])->name('checkout');
    Route::post('/stripe-payment', [Frontend\CheckoutController::class,'customerPayment'])->name('stripe-payment');

    /** Ajax Call */
    Route::post('/add-to-cart', [Frontend\CartController::class,'addToCartProduct']);
    Route::post('/cart-item-remove', [Frontend\CartController::class,'removeCartItem']);
    



    
    /** Admin Route */
    Route::get('/product-list', 'ProductController@getProductList')->name('product-list');
    Route::post('/insert-product', 'ProductController@fileImport')->name('insert-product');
});
