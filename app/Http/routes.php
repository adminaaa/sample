<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/','StaticPagesController@home');
Route::get('/help','StaticPagesController@help')->name('help');
Route::get('/about','StaticPagesController@about')->name('about');
Route::get('/signup','UserController@create')->name('signup');
Route::resource('users','UserController');
Route::get('/login', 'SessionController@create')->name('login');
Route::post('/login', 'SessionController@store')->name('login');
Route::delete('/logout', 'SessionController@destroy')->name('logout');
Route::get('signup/confirm/{token}', 'UsersController@confirmEmail')->name('confirm_email');
