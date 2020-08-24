<?php
use Illuminate\Support\Facades\Route;

Route::prefix('categories')->group(function () {
    Route::get('/', [
        'as' => 'categories.index',
        'uses' => 'CategoryController@index',
        'middleware' => 'can:category-list'
    ]);
    Route::get('/create', [
        'as' => 'categories.create',
        'uses' => 'CategoryController@create',
        'middleware' => 'can:category-create'
    ]);
    Route::post('/store', [
        'as' => 'categories.store',
        'uses' => 'CategoryController@store',
        'middleware' => 'can:category-create'
    ]);
    Route::get('/edit/{id}', [
        'as' => 'categories.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:category-edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'CategoryController@update',
        'middleware' => 'can:category-edit'
    ]);
    Route::get('/delete/{id}', [
        'as' => 'categories.delete',
        'uses' => 'CategoryController@delete',
        'middleware' => 'can:category-delete'
    ]);
    Route::get('/deleteView', [
        'as' => 'categories.deleteView',
        'uses' => 'CategoryController@deleteView',
        'middleware' => 'can:category-deleteView'
    ]);
    Route::get('/deleteUpdate/{id}/{parent_id}', [
        'as' => 'categories.deleteUpdate',
        'uses' => 'CategoryController@deleteUpdate',
        'middleware' => 'can:category-deleteView'
    ]);
});
