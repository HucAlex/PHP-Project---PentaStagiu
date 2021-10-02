<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/', [
        'uses' => 'FirstIndexController@index',
        'as' => 'blog.index'
    ]);
    
    Route::get('post/{id}', [
        'uses' => 'BookController@store',
        'as' => 'blog.post'
    ]);
    
    Route::get('about', function () {
        return view('other.about');
    })->name('other.about');
    
    Route::group(['prefix' => 'admin'], function() {
        Route::get('', [
            'uses' => 'BookController@index',
            'as' => 'admin.index'
        ]);
    
        Route::get('create', [
            'uses' => 'BookController@show',
            'as' => 'admin.create'
        ]);
    
        Route::post('create', [
            'uses' => 'BookController@create',
            'as' => 'admin.create'
        ]);
    
        Route::get('edit/{id}', [
            'uses' => 'BookController@edit',
            'as' => 'admin.edit'
        ]);
    
        Route::get('delete/{id}', [
            'uses' => 'BookController@delete',
            'as' => 'admin.delete'
        ]);
    
        Route::post('edit', [
            'uses' => 'BookController@update',
            'as' => 'admin.update'
        ]);
});
