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


//https://appdividend.com/2018/02/23/laravel-5-6-crud-tutorial/



Route::get('/', 'HomeController@index')->name('home');


Route::resource('urunler_amazon','ProductsController')->middleware('is_admin');

Route::resource('urunler_bgg','ProductsBggController')->middleware('is_admin');

Route::resource('urunler_funagain','ProductsFAController')->middleware('is_admin');

Route::get('posts/getdata', 'HomeController@getPosts')->name('posts/getdata')->middleware('is_admin');;//bunu datatable ajax kullanıyor

Route::get('posts/getbbproduct', 'HomeController@getBBProduct')->name('posts/getbbproduct')->middleware('is_admin');;//bunu datatable ajax kullanıyor

Route::get('posts/getfaproduct', 'HomeController@getFAProduct')->name('posts/getfaproduct')->middleware('is_admin');;//bunu datatable ajax kullanıyor


/*
//https://www.devproblems.com/laravel-5-admin-middleware-is_admin-user-check/  admin middware
Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    //Route::resource('auth', 'AuthController');
    //  Route::auth();
    Route::resource('posts','PostsController');
});

*/

Auth::routes();
Route::get('logout', 'Auth\LoginController@logout');


