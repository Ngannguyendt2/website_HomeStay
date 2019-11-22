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


Route::get('/category', 'HomeStayController@category')->name('web.category');
Route::get('/about_us', 'HomeStayController@aboutUs')->name('web.about_us');
Route::get('/contact', 'HomeStayController@contact')->name('web.contact');
Route::get('/coming-soon', 'HomeStayController@comingSoon')->name('web.comingSoon');
Route::get('', 'HomeStayController@index')->name('web.index');

Route::post('/{id}/order', 'OrderController@order')->name('customer.order');
Route::get('{id}/detail', "HouseController@getHouseById")->name('web.detail')->middleware('auth');
Route::prefix('/user')->middleware('auth')->group(function () {

    Route::get('/{id}/profile', 'UserController@getById')->name('user.profile');
    Route::post('/{id}/changePassword', 'UserController@changePassword')->name('user.changePassword');
    Route::get('/{id}/update', 'UserController@edit')->name('user.edit');
    Route::post('/{id}/update', 'UserController@update')->name('user.update');
    Route::prefix('/houses')->group(function () {
        Route::get('/create', 'HouseController@create')->name('house.create');
        Route::post('/create', 'HouseController@store')->name('house.store');
        Route::get('/list/{id}', 'HouseController@housesManager')->name('house.list');
        Route::get('detailCustomer/{id}', 'HouseController@detailCustomer')->name('house.detailCustomer');
    });
    Route::prefix('/admin')->middleware('admin')->group(function () {
        Route::get('', 'UserController@admin')->name('admin.index');
        Route::get('/users', 'UserController@index')->name('admin.users.list');
        Route::get('/{id}/destroy', 'UserController@destroy')->name('admin.users.destroy');

        Route::prefix('houses')->group(function () {
            Route::get('', 'HouseController@index')->name('admin.houses.list');
            Route::get('/{id}/approve', 'HouseController@checkApprove')->name('admin.houses.checkApprove');
            Route::get('/approve', 'HouseController@approve')->name('admin.houses.approve');
            Route::get('{id}/destroy', 'HouseController@destroy')->name('admin.houses.destroy');
        });
    });
});

Route::get('auth/google', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/auth/{provider}/callback', 'SocialController@callback');
