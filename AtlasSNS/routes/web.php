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

 //Route::get('/', function () {
    // return view('welcome');
 //});
 Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();
//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

Route::group(['middleware' => 'auth'], function() {
//ログアウト用のルーティング
Route::get('/logout', 'Auth\LoginController@logout');
//ログイン中のページ
Route::get('/top','PostsController@index');
//投稿機能
Route::post('posts', 'PostsController@store');
//投稿の削除
Route::delete('/posts/{posts}', 'PostsController@destory')->name('posts.destroy');

Route::get('/profile','UsersController@profile');

Route::get('/search','UsersController@search');

Route::get('/follow-list','PostsController@index');
Route::get('/follower-list','PostsController@index');
});
