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

/**************************************************************************
* 未ログインでアクセス可能なアクション
***************************************************************************/
//ページ
Route::get('/', 'TopsController@index');
Route::get('/show/{scenario}', 'TopsController@show');
Route::get('/show/{scenario}/story/{story}', 'TopsController@showStory');
Route::resource('/tempregist', 'TempRegistController');
Route::get('/error', 'ErrorsController@index');

// Twitterログイン用
Route::get('auth/twitter', 'Auth\AuthController@redirectToProvider');
Route::get('auth/twitter/callback', 'Auth\AuthController@handleProviderCallback');

// Authログイン用
Auth::routes();

/**************************************************************************
* ログインさえしていればアクセス可能なアクション
***************************************************************************/
Route::group(['middleware' => 'auth'], function () {
    // ログアウト用
    Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');
});

/**************************************************************************
* マイページ用
***************************************************************************/
Route::group(['middleware' => 'auth', 'prefix' => 'mypage'], function () {

    Route::resource('/scenarios', 'MyPage\ScenariosController');
    Route::resource('/scenarios/{scenario}/story', 'MyPage\StoriesController');
    Route::resource('/user', 'MyPage\ProfilesController');
    Route::post('/scenarios/{scenario}/edit', 'MyPage\ScenariosController@editUpload');
    Route::post('/scenarios/{scenario}/story/{story}/edit', 'MyPage\StoriesController@editUpload');
    Route::post('/upload', 'MyPage\ProfilesController@upload');

});

/**************************************************************************
* 管理画面用
***************************************************************************/
Route::group(['middleware' => 'auth', 'prefix' => 'console'], function () {

    Route::get('/', 'Admin\DashboardsController@index');
    Route::resource('/users', 'Admin\UsersController');
    Route::resource('/categories', 'Admin\CategoriesController');
    Route::resource('/pages', 'Admin\PagesController');
    Route::resource('/mails', 'Admin\MailsController');

});
