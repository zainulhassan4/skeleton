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

// Common Routes
Route::get('/', function () {
    return view('welcome');
});

// Admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

// Auth routes
Auth::routes();
Route::get('password/set/{token}', 'Auth\ResetPasswordController@showSetForm')->name('password.set');
Route::get('register/verify', 'Auth\RegisterController@setUserAsVerified')->name('register.verify');

// Open routes
Route::group(['as' => 'voyager.'], function () {
    Route::get('page/{page_id}', 'PageController@show')->name('page');
});

// User routes
Route::get('home', 'HomeController@index');
