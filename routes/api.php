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
    Route::get('/', 'ProductsController@index');
    Route::post('/', 'ProductsController@store');
    Route::put('/{product_id}', 'ProductsController@update');
      // Route::get('/:id', 'HostelController@getHostel');
      // Route::delete('/:id', 'HostelController@delete');
  });
});
