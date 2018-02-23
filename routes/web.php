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

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/setting', function () {
    return view('setting\setting');
})->name('setting')->middleware('auth');

Route::resource('users', 'UserController');

//Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController', ['middleware' => ['auth', 'checkRole:設定^アカウント管理']]);

//Route::resource('posts', 'PostController');

Route::resource('honnbus', 'HonnbuController');

Route::resource('shops', 'ShopController', ['middleware' => ['auth', 'checkRole:設定^店舗管理']]);

Route::resource('studios', 'StudioController', ['middleware' => ['auth', 'checkRole:設定^スタジオ管理']]);
