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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::group(['prefix' => 'post'], function () {

        Route::get('/create', [
            'uses' => 'PostsController@create',
            'as' => 'post.create'
        ]);

        Route::get('/index', [
            'uses' => 'PostsController@index',
            'as' => 'post.index'
        ]);

        Route::post('/store', [
            'uses' => 'PostsController@store',
            'as' => 'post.store'
        ]);

    });

    Route::group(['prefix' => 'category'], function (){
        Route::get('/create', [
            'uses' => 'CategoryController@create',
            'as' => 'category.create'
        ]);

        Route::post('/store', [
            'uses' => 'CategoryController@store',
            'as' => 'category.store'
        ]);

        Route::get('/index', [
            'uses' => 'CategoryController@index',
            'as' => 'category.index'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'CategoryController@destroy',
            'as' => 'category.delete'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'CategoryController@edit',
            'as' => 'category.edit'
        ]);

        Route::post('/update/{id}', [
            'uses' => 'CategoryController@update',
            'as' => 'category.update'
        ]);
    });


});