<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update'); 

Route::get('/overview', 'UserController@index')->name('admin.overview');
Route::get('/add-user', 'UserController@create')->name('user.create');
Route::post('/store-user', 'UserController@store')->name('user.store');
Route::get('/detail-user/{user}', 'UserController@show')->name('user.show');
Route::post('/user-update', 'UserController@update')->name('user.update');
Route::get('/user-del/{user}', 'UserController@destroy')->name('user.destroy');

Route::get('/getAllUsers','UserController@getAllUsers')->name('getAllUsers');
