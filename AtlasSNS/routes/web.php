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
//投稿の編集・更新
Route::get('/posts/edit/{posts}', 'PostsController@edit')->name('posts.edit');
Route::patch('/posts/{posts}', 'PostsController@update')->name('posts.update');
//投稿の削除
Route::delete('/posts/{posts}', 'PostsController@destory')->name('posts.destroy');
//プローフィールの更新
Route::get('/profile','UsersController@profile')->name('profile');
Route::patch('/profile', 'UsersController@update')->name('profile.update');
//検索機能
Route::get('/search','UsersController@search')->name('users.search');
//フォロ機能
Route::post('/users{user}follows', 'UsersController@follow')->name('follow');
//フォロー解除機能
Route::post('/users/{user}unfollows', 'UsersController@unfollow')->name('unfollow');


Route::get('/follow-list','FollowsController@followList');

Route::get('/follower-list','FollowsController@followerList');
Route::get('/profile/{id}', 'PostsController@profile')->name('users.profile');
});
