<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/new', 'App\Http\Controllers\TestController@controllerMethod');

//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('auth')->group(function () {
   
   Route::get('init', 'App\Http\Controllers\AppController@init');
    Route::post('login', 'App\Http\Controllers\AppController@login');
    Route::post('register', 'App\Http\Controllers\AppController@register');
    Route::post('logout', 'App\Http\Controllers\AppController@logout');
   
    
});
Route::get('get_BK', 'App\Http\Controllers\BeekeeperController@getBK');
Route::get('get_HiveBk', 'App\Http\Controllers\InvesterController@get_Hives');



/*Auth::routes();
Route::get('/admin', 'App\Http\Controllers\AdminController@index')->name('admin')->middleware('admin');
Route::get('/beekeeper', 'App\Http\Controllers\BeekeeperController@index')->name('beekeeper')->middleware('beekeeper');
Route::get('/investor', 'App\Http\Controllers\InvestorController@index')->name('investor')->middleware('investor');*/
 