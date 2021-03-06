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

// Voyager User routes TODO: needs fascade and service provider
App\Http\Controllers\VoyagerUser::routes();

// Auth routes
Auth::routes();
Route::get('password/set/{token}', 'Auth\ResetPasswordController@showSetForm')->name('password.set');
Route::get('register/verify', 'Auth\RegisterController@setUserAsVerified')->name('register.verify');

// Open routes
Route::get('page/{page}', 'PageController@show')->name('page');
Route::get('page/{page}/post/{post}', 'PostController@show')->name('post');

// User routes
Route::get('home', 'HomeController@index');
