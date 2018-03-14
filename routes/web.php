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

Route::resource('permissions', 'PermissionController', ['middleware' => ['auth', 'checkRole:設定^アカウント管理']]);

Route::resource('honnbus', 'HonnbuController');

Route::resource('shops', 'ShopController', ['middleware' => ['auth', 'checkRole:設定^店舗管理']]);

Route::resource('studios', 'StudioController');

Route::resource('schedules', 'ScheduleController');

Route::resource('courses', 'CourseController', ['middleware' => ['auth', 'checkRole:設定^撮影内容作成・編集']]);

Route::resource('templates', 'TemplateController');

Route::resource('occupations', 'OccupationController', ['middleware' => ['auth', 'checkRole:設定^スタッフ種別の登録・編集']]);

Route::resource('passwords', 'PasswordController');

Route::resource('products', 'ProductController');

Route::get('/studios/list/{id}', 'StudioController@list')->name('studios.list');

Route::get('/shops/list/{id}', 'ShopController@list')->name('shops.list');
