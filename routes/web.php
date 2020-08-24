<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('change-password','Auth\ChangePasswordController@index');
Route::post('change-password','Auth\ChangePasswordController@store')->name('change.password');

