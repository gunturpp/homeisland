<?php

use Illuminate\Http\Request;

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

Route::post('login', 'Auth\PassportController@login');
Route::post('register', 'Auth\PassportController@register');

Route::group(['middleware' => 'auth:api'], function(){
    Route::post('get-details', 'Auth\PassportController@getDetails');
});
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/home', 'HomeController@index')->name('home');

