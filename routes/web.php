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

Route::get('login/{provider}', 'Auth\LoginController@redirectToProvider');
Route::get('login/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'users', 'middleware' => ['role:superadmin|supervisor|junior']], function() {
    Route::get('/create', function () {
        return view('users');
    })->name('users.create');
    Route::get('/update', function () {
        return view('users');
    })->name('users.update');
    Route::get('/delete', function () {
        return view('users');
    })->name('users.delete');
    Route::get('/publish', function () {
        return view('users');
    })->name('users.publish');
});


