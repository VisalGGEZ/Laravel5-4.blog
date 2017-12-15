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

        Route::get('/edit/{id}', [
            'uses' => 'PostsController@edit',
            'as' => 'post.edit'
        ]);

        Route::post('/update/{id}', [
            'uses' => 'PostsController@update',
            'as' => 'post.update'
        ]);

        Route::get('/trash/{id}', [
            'uses' => 'PostsController@trash',
            'as' => 'post.trash'
        ]);

        Route::get('/trashed', [
            'uses' => 'PostsController@trashed',
            'as' => 'post.trashed'
        ]);

        Route::get('/destroy/{id}', [
            'uses' => 'PostsController@destroy',
            'as' => 'post.destroy'
        ]);

        Route::get('/restore/{id}', [
            'uses' => 'PostsController@restore',
            'as' => 'post.restore'
        ]);

    });

    Route::group(['prefix' => 'tag'], function () {
        Route::get('/create', [
            'uses' => 'TagController@create',
            'as' => 'tag.create'
        ]);

        Route::post('/store', [
            'uses' => 'TagController@store',
            'as' => 'tag.store'
        ]);

        Route::get('/index', [
            'uses' => 'TagController@index',
            'as' => 'tag.index'
        ]);

        Route::get('/delete/{id}', [
            'uses' => 'TagController@destroy',
            'as' => 'tag.delete'
        ]);

        Route::get('/edit/{id}', [
            'uses' => 'TagController@edit',
            'as' => 'tag.edit'
        ]);

        Route::post('/update/{id}', [
            'uses' => 'TagController@update',
            'as' => 'tag.update'
        ]);
    });

    Route::group(['prefix' => 'category'], function () {
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