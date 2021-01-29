<?php
use Illuminate\Support\Facades\Route;

define('PAGINATION_COUNT',10);

Route::group(['namespace'=>'Admin' ,  'middleware' => 'auth:admin'], function () {

    Route::get('/', 'DashboardController@index')  ->name('admin.dashboard');


// ************************************ languages ************************************

    Route::group(['prefix' => 'languages'], function () {

        Route::get('/', 'languagesController@index')->name('admin.languages');
        Route::get('create', 'languagesController@create')->name('admin.languages.create');
        //حفظ اللعة واضافتها
        Route::post('store', 'languagesController@store')->name('admin.languages.store');
        Route::get('edit/{id}', 'languagesController@edit')->name('admin.languages.edit');
        Route::post('update/{id}', 'languagesController@update')->name('admin.languages.update');
        Route::get('delete/{id}', 'languagesController@destroy')->name('admin.languages.delete');

    });
// ************************************ languages ************************************



// ************************************ main categories ************************************
    Route::group(['prefix' => 'main_categories'], function () {


        Route::get('/', 'MainCategoriesController@index')->name('admin.maincategories');
        Route::get('create', 'MainCategoriesController@create')->name('admin.maincategories.create');
        //حفظ اللعة واضافتها
        Route::post('store', 'MainCategoriesController@store')->name('admin.maincategories.store');
        Route::get('edit/{id}', 'MainCategoriesController@edit')->name('admin.maincategories.edit');
        Route::post('update/{id}', 'MainCategoriesController@update')->name('admin.maincategories.update');
        Route::get('delete/{id}', 'MainCategoriesController@destroy')->name('admin.maincategories.delete');
        Route::get('changeStatus/{id}', 'MainCategoriesController@changeStatus')->name('admin.maincategories.status');


    });

// ************************************ end  main categories ************************************


// ************************************  Sub_categories ************************************
Route::group(['prefix' => 'Sub_categories'], function () {


    Route::get('/', 'SectionController@index')->name('admin.subcategories');
    Route::get('create', 'SectionController@create')->name('admin.subcategories.create');
    Route::post('store', 'SectionController@store')->name('admin.subcategories.store');
    // Route::get('edit/{id}', 'SectionController@edit')->name('admin.subCategoriesController.edit');
    // Route::post('update/{id}', 'SectionController@update')->name('admin.subCategoriesController.update');
    // Route::get('delete/{id}', 'SectionController@destroy')->name('admin.subCategoriesController.delete');
    // Route::get('changeStatus/{id}', 'SectionController@changeStatus')->name('admin.subCategoriesController.status');


});

// ************************************ end  Sub_categories ************************************

// ************************************ product  ************************************
Route::group(['prefix' => 'product'], function () {


    Route::get('/', 'ProductController@index')->name('admin.product');
    Route::get('create', 'ProductController@create')->name('admin.product.create');
    // // //حفظ اللعة واضافتها
    Route::post('store', 'ProductController@store')->name('admin.product.store');
    // Route::get('edit/{id}', 'ProductController@edit')->name('admin.product.edit');
    // Route::post('update/{id}', 'ProductController@update')->name('admin.subCategoriesController.update');
    Route::get('delete/{id}', 'ProductController@destroy')->name('admin.product.delete');
    // Route::get('changeStatus/{id}', 'ProductController@changeStatus')->name('admin.subCategoriesController.status');

    Route::get('/addToCart/{product}', 'ProductController@addToCart')->name('cart.add');
    Route::get('/shopping-cart', 'ProductController@showCart')->name('cart.show');
    Route::get('/checkout/{amount}', 'ProductController@checkout')->name('cart.checkout');

    Route::post('/charge', 'ProductController@charge')->name('cart.charge');

});

// ************************************ end  product  ************************************

// ************************************ permission  ************************************




Route::group(['prefix' => 'permission'], function () {

    Route::get('/', 'PermissionController@index')->name('admin.permission');
    Route::get('create', 'PermissionController@create')->name('admin.permission.create');


});




// ************************************ vendors ************************************
Route::group(['prefix' => 'vendors'], function () {


    Route::get('/', 'VendorsController@index')->name('admin.vendors');
    Route::get('create', 'VendorsController@create')->name('admin.vendors.create');
    //حفظ اللعة واضافتها
    Route::post('store', 'VendorsController@store')->name('admin.vendors.store');
    Route::get('edit/{id}', 'VendorsController@edit')->name('admin.vendors.edit');
    Route::post('update/{id}', 'VendorsController@update')->name('admin.vendors.update');
    Route::get('delete/{id}', 'VendorsController@destroy')->name('admin.vendors.delete');
    Route::get('changeStatus/{id}', 'VendorsController@changeStatus')->name('admin.vendors.status');

});

// ************************************ end  vendors ************************************

});


// *********

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {

    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::POST('login', 'LoginController@login')->name('admin.login');

});


// Route::get('tester', function () {

//     return feras();

// });
