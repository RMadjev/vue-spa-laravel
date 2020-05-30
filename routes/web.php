<?php

use Illuminate\Support\Facades\Route;

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
    return view('main');
});

Route::get('/products', 'ProductController@index');
Route::post('/products', 'ProductController@store');
Route::put('/products/{id}', 'ProductController@update')->where('id', '[0-9]+');
Route::delete('/products/{id}', 'ProductController@destroy')->where('id', '[0-9]+');


Route::get('/orders/{id?}', 'ProductController@index')->where('id', '[0-9]+');
Route::post('/orders', 'OrderController@store');
Route::put('/orders/{id}/product/{id}', 'OrderController@addProduct')->where('id', '[0-9]+');
