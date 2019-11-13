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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

//Route::get('', 'HomeController@index')->name('home');

Route::get('/category', 'HomeStayController@category')->name('web.category');
Route::get('/about_us', 'HomeStayController@aboutUs')->name('web.about_us');
Route::get('/contact', 'HomeStayController@contact')->name('web.contact');
Route::get('/coming-soon', 'HomeStayController@comingSoon')->name('web.comingSoon');
Route::get('/', 'HomeStayController@index')->name('web.index');
Route::get('/detail', "HomeStayController@detail")->name('web.detail');

Route::prefix('/user')->middleware('auth')->group(function () {

    Route::get('/{id}/profile', 'UserController@index')->name('user.profile');
    Route::get('/{id}/update','UserController@edit')->name('user.edit');
    Route::post('/{id}/update', 'UserController@update')->name('user.update');
    Route::prefix('/houses')->group(function () {
        Route::get('/create', 'HouseController@create')->name('house.create');
        Route::post('/create', 'HouseController@store')->name('house.store');
    });
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');


