<?php
use Illuminate\Support\Facades\Route;

//Category
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

    ]);
    Route::get('/edit/{id}', [
        'as' => 'categories.edit',
        'uses' => 'CategoryController@edit',
        'middleware' => 'can:category-edit'
    ]);
    Route::post('/update/{id}', [
        'as' => 'categories.update',
        'uses' => 'CategoryController@update',
    ]);
    Route::get('/delete/{id}', [
        'as' => 'categories.delete',
        'uses' => 'CategoryController@delete',
        'middleware' => 'can:category-delete'
    ]);
    Route::post('/search', [
        'as' => 'categories.search',
        'uses' => 'CategoryController@search',

    ]);
});
