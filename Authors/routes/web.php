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
        'uses' => 'Album@getIndex',
        'as' => 'blog.index'
    ]);
    
    Route::get('post/{id}', [
        'uses' => 'Album@getPost',
        'as' => 'blog.post'
    ]);
    
    Route::get('about', function () {
        return view('other.about');
    })->name('other.about');
    
    Route::group(['prefix' => 'admin'], function() {
        Route::get('', [
            'uses' => 'Album@getAdminIndex',
            'as' => 'admin.index'
        ]);
    
        Route::get('create', [
            'uses' => 'Album@getAdminCreate',
            'as' => 'admin.create'
        ]);
    
        Route::post('create', [
            'uses' => 'Album@postAdminCreate',
            'as' => 'admin.create'
        ]);
    
        Route::get('edit/{id}', [
            'uses' => 'Album@getAdminEdit',
            'as' => 'admin.edit'
        ]);
    
        Route::get('delete/{id}', [
            'uses' => 'Album@getAdminDelete',
            'as' => 'admin.delete'
        ]);
    
        Route::post('edit', [
            'uses' => 'Album@postAdminUpdate',
            'as' => 'admin.update'
        ]);

});
