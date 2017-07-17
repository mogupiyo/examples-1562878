<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

// Route::get('/', function () {
//     // return view('welcome');
// });

Route::get('/', 'TopsController@index');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::resource('/profile', 'ProfilesController');
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

//Route::get('/home', 'HomeController@index');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
// Route::get('about', 'PagesController@about');
//
//Auth::routes();
//
//Route::get('/home', 'HomeController@index');
