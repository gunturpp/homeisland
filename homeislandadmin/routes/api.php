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
Route::post('post-bookings', 'Auth\PassportController@postBookings');

Route::get('get-users', 'Auth\PassportController@getUsers');
Route::get('get-banks', 'Auth\PassportController@getBanks');
Route::get('get-news', 'Auth\PassportController@getNews');
Route::get('get-homestays', 'Auth\PassportController@getHomestays');
Route::get('get-events', 'Auth\PassportController@getEvents');
Route::get('get-souvenirs', 'Auth\PassportController@getSouvenirs');
Route::get('get-reviews', 'Auth\PassportController@getReviews');
Route::get('get-explores', 'Auth\PassportController@getExplores');
Route::get('get-bookings', 'Auth\PassportController@getBookings');
Route::get('get-ratings', 'Auth\PassportController@getRatings');

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::post('get-details', 'Auth\PassportController@getDetails');
// });
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/home', 'HomeController@index')->name('home');

