<?php
use Illuminate\Support\Facades\Route;

//Category
Route::prefix('users')->group(function () {
    Route::get('/indexUser', [
        'as' => 'users.indexUser',
        'uses' => 'AdminUserController@indexUser',
        'middleware' => 'can:user-list'
    ]);
    Route::get('/indexAdmin', [
        'as' => 'users.indexAdmin',
        'uses' => 'AdminUserController@indexAdmin',
        'middleware' => 'can:user-list'
    ]);
    Route::get('/update/{id}', [
        'as' => 'users.update',
        'uses' => 'AdminUserController@update',
        'middleware' => 'can:user-list'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'users.delete',
        'uses' => 'AdminUserController@delete',
        'middleware' => 'can:user-list'
    ]);
    Route::get('/indexUserDelete', [
        'as' => 'users.indexUserDelete',
        'uses' => 'AdminUserController@indexUserDelete',
        'middleware' => 'can:user-list'
    ]);
    Route::get('/updateDelete/{id}', [
        'as' => 'users.updateDelete',
        'uses' => 'AdminUserController@updateDelete',
        'middleware' => 'can:user-list'
    ]);
    Route::get('/showDetail/{id}', [
        'as' => 'user.showDetail',
        'uses' => 'AdminUserController@showDetail',
    ]);
});
