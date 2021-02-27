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
use Illuminate\Support\Facades\Input;
Auth::routes();
Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout', 'LoginController@logout')->name('logout');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'HomeController@logout')->name('home');

//---------------------------------- route who are we ----------------------------------//
route::get('/who_are_we','HomeController@who_are_we')->name('front.who_are_we');
//---------------------------------- end who are we ----------------------------------//

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
Route::get('/category_shop/{id}','HomeController@shop_by_category')->name('front.category_shop');
Route::get('/favorite','FavoriteController@show_favorite_product')->name('front.favorite');
Route::post('/favorite/addfovorite','FavoriteController@store_favorite_product')->name('addfavorite');
//Route::get('/order/{id}', 'HomeController@order')->name('front.Order');
Route::get('/orders', 'Admin\OrderController@index')->name('front.order');
// Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('front.add');
// Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');




Route::post('/charge', 'Admin\ProductController@charge')->name('cart.charge');

Route::get('/shop', 'HomeController@shop_product')->name('shop');

//---------------------------------- route search product  ----------------------------------//
Route::any('/search',function(){
    $categories  = \App\Models\MainCategory::where('translation_of',0)->active()->get();
    $products   = \App\Models\Product::all();
    $q = Input::get ( 'q' );
    $product = \App\Models\Product::where('name','LIKE','%'.$q.'%')
    ->orWhere('price','LIKE','%'.$q.'%')->get();
    if(count($product) > 0)
        return view('front.search_result',compact('categories','products'))->withDetails($product)->withQuery ( $q );

       else

       return view ('errors.404',compact('categories','products'))->with('msg','يبدو انه لم يتم العثور على نتائج حاول البحث مرة أخرى ');
});
//---------------------------------- route search product  ----------------------------------//

//---------------------------------- route send email ----------------------------------//
route::get('/sendemail','SendEmailController@index');
route::post('/sendemail/send','SendEmailController@send');
//---------------------------------- end send email ----------------------------------//

