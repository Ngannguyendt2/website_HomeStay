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

Route::get('/coming-soon', 'HomeStayController@comingSoon')->name('web.comingSoon');
Route::get('/', 'HomeStayController@index')->name('web.index');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::prefix('/user')->group(function (){
    Route::get('/{id}/profile', 'UserController@index')->name('user.profile');
    Route::post('/{id}/update', 'UserController@update')->name('user.update');
});
