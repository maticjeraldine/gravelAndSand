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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/products','ProductsController');
Route::resource('/product/name','ProductCategoryController');
Route::get('/add/quantity/{id}','ProductsController@addQuantity');
// Route::get('/store/quantity/{}','ProductsController@StoreQuantity');

Route::get('add/cart/{id}','ProductCategoryController@add_to_cart');
Route::get('my/cart','ProductCategoryController@view_cart');
Route::get('orders','ProductCategoryController@orders');


