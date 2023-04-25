<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::resource('products', 'ProductController');

Route::get('search', 'ProductController@search')->name('search');

// Route::group(['middleware' => 'auth', 'can:admin_only'], function () {
//     Route::get('account', 'AccountController@index')->name('account.index');
// });

Route::get('/', 'HomeController@index')->name('home');
Route::resource('guests', 'GuestController');

Route::post('/like', 'GuestController@like')->name('like');

Route::resource('details', 'DetailController');

Route::resource('carts', 'CartController');

Route::get('/likis_list','GuestController@likes_list')->name('likesList');
Route::get('/order_history_list','GuestController@order_history_list')->name('order_history_list');
