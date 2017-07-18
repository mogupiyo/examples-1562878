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
Route::get('/show/{scenario}', 'TopsController@show');
Route::get('/show/{scenario}/story/{story}', 'TopsController@showStory');

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

});

Route::group(['middleware' => 'auth', 'prefix' => 'mypage'], function () {

    Route::resource('/scenarios', 'MyPage\ScenariosController');
    Route::resource('/scenarios/{scenario}/story', 'MyPage\StoriesController');
    Route::resource('/', 'MyPage\ProfilesController');
    Route::post('/scenarios/{scenario}/edit', 'MyPage\ScenariosController@editUpload');
    Route::post('/scenarios/{scenario}/story/{story}/edit', 'MyPage\StoriesController@editUpload');
    Route::post('/upload', 'MyPage\ProfilesController@upload');

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
