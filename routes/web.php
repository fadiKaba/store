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
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/shop', 'ShopController@index');

Route::group(['middleware' => ['AdminMiddleware']], function(){
    Route::get('/admin', 'AdminController@index');
    Route::post('/user/store', 'AdminController@store');
    Route::get('/user/{userName}/search', 'SearchController@searchA');
    Route::get('/user/all', 'UserController@index');
});
