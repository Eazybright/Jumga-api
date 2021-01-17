<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});

Route::group(['prefix' => '/auth', 'namespace' => 'Auth'], function(){
  Route::post('/register', 'RegisterController@register');
  Route::post('/login', 'LoginController@login');// UserController
});

Route::group(['middleware' => 'auth:api'], function(){
  Route::get('/user', 'UserController@get_user_details');

  Route::group(['prefix' => 'products'], function(){
    Route::get('/', 'ProductsController@index')->withoutMiddleware('auth:api');
    Route::get('/{product_id}', 'ProductsController@get_by_id')->withoutMiddleware('auth:api');
    Route::post('/', 'ProductsController@store');
    Route::put('/{product_id}', 'ProductsController@update');
  });

  Route::group(['prefix' => 'stores'], function(){
    Route::get('/', 'StoreController@index')->withoutMiddleware('auth:api');
    Route::get('/{store_id}', 'StoreController@show')->withoutMiddleware('auth:api');
  });
});

Route::post('checkout/order', 'CheckoutController@place_order');
Route::post('checkout/order/confirm', 'CheckoutController@confirm_order');























