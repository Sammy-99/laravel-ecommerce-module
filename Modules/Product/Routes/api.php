<?php

use Illuminate\Http\Request;
use Modules\Product\Http\Controllers\AuthController;
use Modules\Product\Http\Controllers\StripeApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/product', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthController::class, 'login']); 

Route::group(['middleware' => 'checkauth'], function(){

    /**Product Crud API */
    Route::post('create-product', [StripeApiController::class, 'createProduct']);
    Route::get('retrieve-product', [StripeApiController::class, 'retrieveProduct']);
    Route::post('update-product', [StripeApiController::class, 'updateProduct']);
    Route::get('list-product', [StripeApiController::class, 'listAllProduct']);
    Route::post('delete-product', [StripeApiController::class, 'deleteProduct']);

    /**Product Price Api */

    Route::post('create-price', [StripeApiController::class, 'createProductPrice']);
    Route::get('retrieve-price', [StripeApiController::class, 'retrieveProductPrice']);
    Route::get('list-price', [StripeApiController::class, 'listProductPrice']);

    /**Plan Api */

    Route::post('create-plan', [StripeApiController::class, 'createPlan']);
    Route::get('list-plan', [StripeApiController::class, 'listAllPlan']);

    /**Subscription Api */
    Route::post('create-subscription', [StripeApiController::class, 'createSubscription']);
    Route::post('update-subscription', [StripeApiController::class, 'updateSubscription']);
    Route::get('cancel-subscription', [StripeApiController::class, 'cancelSubscription']);

});
