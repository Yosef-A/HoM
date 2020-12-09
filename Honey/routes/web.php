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
Route::prefix('auth')->group(function (){
  
    Route::post('register', 'AppController@register');
    Route::get('init', 'AppController@init');
    Route::post('login', 'AppController@login');
    Route::post('logout', 'AppController@logout');
});


Route::get('/', function () {
    return view('welcome');
});
Route::get('/user', function () {
    return view('user');
});
Route::get('/inv', function () {
    return view('inv');
});
Route::resource('beekeeper', 'BeekeeperController')->only([
    'index', 'show',  'store'
]);;
Route::resource('product', 'ProductController')->only([
    'index', 'show',  'store'
]);;
Route::resource('hive', 'HiveController')->only([
    'index', 'show',  'store'
]);;
Route::resource('contact', 'ContactController')->only([
     'store'
]);;
//Route::resource('users','UserController');
