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

//->middleware('verified')

Auth::routes();
Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout')->name('home');


//Route::group(['middleware' => 'auth'], function () {
//    if (Auth::check()) {
//        if(Auth::user()){
//            Route::get('/home','HomeController@index');
//        }
//        else if(Auth::user()){
//            Route::get('/','HomeController@authroute');
//        }
//    }
//});

//Route::get('/home', 'HomeController@index')->name('front.home');



Route::get('/Product-details/{id}', 'HomeController@Productdetails')->name('front.details_product');

Route::get('/order/{id}', 'HomeController@order')->name('front.Order');
// Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('front.add');
// Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');




Route::post('/charge', 'Admin\ProductController@charge')->name('cart.charge');
