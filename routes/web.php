<?php

/**
 * Routes for verifying User with 2FA
 * */

Route::get('verify/resend', 'Auth\TwoFactorController@resend')->name('verify.resend');
Route::resource('verify', 'Auth\TwoFactorController')->only(['index', 'store']);
Auth::routes();

Route::get('/', function () {
        return view('welcome');
    });
Route::group(['middleware' => ['auth', 'twofactor']], function()
{
    
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/user', 'HomeController@getuser')->name('get.user');/**Route for yajra database table */
    
    
    
    
    
});

