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
//     return view('front.home');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'HomeController@index')->name('front.home');

Route::get('/Product-details/{id}', 'HomeController@Productdetails')->name('front.details_product');

Route::get('/order/{id}', 'HomeController@order')->name('front.Order');
// Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('front.add');
// Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');




