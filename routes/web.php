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

use Illuminate\Support\Facades\Route;

Auth::routes();

//Frontend routes
Route::get('/', 'IndexController@index')->name('main');
Route::get('/about', 'AboutController@index')->name('about');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/cart/submit', 'CartController@submit')->name('cart.submit');
Route::get('/category/{category}', 'CategoryController@index')->name('category');
Route::get('/product/{product}', 'ProductsController@productView')->name('product');
Route::get('/news', 'NewsController@index')->name('news');
Route::get('/newsview/{news}', 'NewsController@newsView')->name('newsview');
Route::get('/orders', 'OrdersController@index')->name('orders');
Route::get('/buy/{product}', 'OrdersController@buy')->name('buy');


//Admin routes
Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {

    //Dashboard
    Route::group(['prefix' => '/admin'], function (){
        Route::get('/', 'DashboardController@index')->name('admin.dashboard');
        Route::get('/process/{order}', 'DashboardController@processOrder')->name('admin.processOrder');
        Route::get('/cancel/{order}', 'DashboardController@cancelOrder')->name('admin.cancelOrder');
    });

    //Categories
    Route::group(['prefix' => '/admin/categories'], function (){
        Route::get('/', 'CategoriesController@index')->name('admin.categories');
        Route::get('/create', 'CategoriesController@create')->name('admin.categories.create');
        Route::post('/add', 'CategoriesController@add')->name('admin.categories.add');
        Route::get('/edit/{category}', 'CategoriesController@edit')->name('admin.categories.edit');
        Route::post('/update/{category}', 'CategoriesController@update')->name('admin.categories.update');
        Route::get('/delete/{category}', 'CategoriesController@delete')->name('admin.categories.delete');
    });

    //Products
    Route::group(['prefix' => '/admin/products'], function (){
        Route::get('/', 'ProductsController@index')->name('admin.products');
        Route::get('/create', 'ProductsController@create')->name('admin.products.create');
        Route::post('/add', 'ProductsController@add')->name('admin.products.add');
        Route::get('/edit/{product}', 'ProductsController@edit')->name('admin.products.edit');
        Route::post('/update/{product}', 'ProductsController@update')->name('admin.products.update');
        Route::get('/delete/{product}', 'ProductsController@delete')->name('admin.products.delete');
    });

    //News
    Route::group(['prefix' => '/admin/news'], function (){
        Route::get('/', 'NewsController@index')->name('admin.news');
        Route::get('/create', 'NewsController@create')->name('admin.news.create');
        Route::post('/add', 'NewsController@add')->name('admin.news.add');
        Route::get('/edit/{news}', 'NewsController@edit')->name('admin.news.edit');
        Route::post('/update/{news}', 'NewsController@update')->name('admin.news.update');
        Route::get('/delete/{news}', 'NewsController@delete')->name('admin.news.delete');
    });

    //Emails
    Route::group(['prefix' => '/admin/emails'], function (){
        Route::get('/', 'EmailsController@index')->name('admin.emails');
        Route::post('/add', 'EmailsController@add')->name('admin.emails.add');
        Route::get('/delete/{email}', 'EmailsController@delete')->name('admin.emails.delete');
    });


});


