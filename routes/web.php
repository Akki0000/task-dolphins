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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/product','ProductController@index')->name('product');
Route::get('/product-add','ProductController@create')->name('product.create');
Route::post('/product-save','ProductController@save')->name('product.save');
Route::get('/product/{id}','ProductController@edit')->name('product.edit');
Route::post('/product/{id}','ProductController@update')->name('product.update');
Route::get('/products/{id}','ProductController@show')->name('productshow');
Route::delete('/product/{id}','ProductController@delete')->name('product.delete');