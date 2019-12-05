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
Route::get('/fetch_data', 'HomeStayController@fetch_data');
Route::get('/coming-soon', 'HomeStayController@comingSoon')->name('web.comingSoon');
Route::get('', 'HomeStayController@index')->name('web.index');

Route::post('/{id}/order', 'OrderController@order')->name('customer.order');
Route::get('{id}/detail/{category_id}', "HouseController@getHouseById")->name('web.detail')->middleware('auth');

Route::prefix('/user')->middleware('auth')->group(function () {

    Route::post('show_more/{id}', 'ShowMoreController@load_data')->name('user.load_data');
    Route::get('/profile', 'UserController@getById')->name('user.profile');
    Route::post('/changePassword', 'UserController@changePassword')->name('user.changePassword');
    Route::get('/updateProfile', 'UserController@edit')->name('user.edit');
    Route::post('/{id}/update', 'UserController@update')->name('user.update');
    Route::post('/{id}/destroy/order', 'CustomerController@destroyOrder')->name('user.destroyOrder');
    Route::get('/historyRentHouse', 'UserController@historyRentHouse')->name('user.historyRentHouse');
    Route::get('/historyRentedHouse','UserController@getRentedHouse')->name('user.historyRentedHouse');
    Route::get('/orderHadCancel','OrderController@getOrderHadCancel')->name('user.orderHadCancel');
    Route::get('/historyOrder','UserController@getHistoryOrderForAjax')->name('user.historyOrder');
    Route::post('/monthlyIncome', 'UserController@getMonthlyIncome')->name('user.monthlyIncome');
    Route::get('/personalIncome', 'UserController@showPersonalIncome')->name('user.personalIncome');
    Route::prefix('/houses')->group(function () {

        Route::get('/create', 'HouseController@create')->name('house.create');
        Route::post('/create', 'HouseController@store')->name('house.store');
        Route::get('/list', 'HouseController@housesManager')->name('house.list');
        Route::post('/{id}/update', 'HouseController@update')->name('house.update');

        Route::get('detailCustomer/{id}', 'HouseController@detailCustomer')->name('house.detailCustomer');
        Route::post('review', 'PostController@create')->name('house.review');
        Route::post('/comment', 'CommentController@create')->name('post.comment');

        Route::prefix('customer')->group(function () {
            Route::get('{id}/checkApprove', 'OrderController@checkApprove')->name('houses.customer.checkApprove');
            Route::get('detail/approve/{id}', 'OrderController@approve')->name('houses.customer.approve');
            Route::post('{id}/delete', 'OrderController@delete')->name('houses.customer.delete');
        });

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

Route::get('auth/{provider}', 'Auth\LoginController@redirectToGoogle');
Route::get('auth/google/callback', 'Auth\LoginController@handleGoogleCallback');

Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/auth/{provider}/callback', 'SocialController@callback');


Route::post('/search', 'HouseController@search')->name('search');
Route::post('/index', 'HomeStayController@display')->name('display');

Route::post('/changeStatus/{id}', 'HouseController@changeStatus')->name('changeStatus');

Route::post('display/{id}', 'PostController@display')->name('getAll');
Route::post('post', 'PostController@post')->name('post');
Route::post('comment', 'PostController@comment')->name('comment');
