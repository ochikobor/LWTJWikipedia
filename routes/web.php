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

Route::get('/','ArticlesController@index');
Route::resource('articles','ArticlesController');

// ユーザ登録
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');

// 認証
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('articles', 'ArticlesController', ['only' => ['store', 'destroy']]);
});

//検索
Route::get('search', 'SearchController@index')->name('search.index');

//各カテゴリー
Route::get('guidelines', 'SelectController@guidelines')->name('select.guidelines');
Route::get('tutorials', 'SelectController@tutorials')->name('select.tutorials');
