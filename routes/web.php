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


Route::get('/test', function () {
    return App\User::find(1)->profile;
});

Route::get('/', [
    'uses' => 'FrontEndController@index'
]);

Route::post('subscribe', [
    'uses' => 'FrontEndController@subscribe',
    'as' => 'subscribe'
]);

Route::get('/post/{slug}', [
    'uses' => 'FrontEndController@singlePost',
    'as' => 'post.single'
]);

Route::get('/category/{id}', [
    'uses' => 'FrontEndController@category',
    'as' => 'category'
]);

Route::get('/tag/{id}', [
    'uses' => 'FrontEndController@tag',
    'as' => 'tag'
]);

Route::get('/results', [
    'uses' => 'FrontEndController@querySearch',
    'as' => 'query.search'
]);

Auth::routes();


Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {

    Route::get('/home', [
        'uses' => 'HomeController@index',
        'as' => 'home'
    ]);

    Route::group(['prefix' => 'user'], function () {

        Route::post('/profile/update/{id}', [
            'uses' => 'ProfileController@update',
            'as' => 'user.profile.update'
        ]);

        Route::get('profile/index', [
            'uses' => 'ProfileController@index',
            'as' => 'user.profile.index'
        ]);

        Route::get('index', [
            'uses' => 'UserController@index',
            'as' => 'user.index'
        ]);
        Route::get('create', [
            'uses' => 'UserController@create',
            'as' => 'user.create'
        ]);

        Route::post('store', [
            'uses' => 'UserController@store',
            'as' => 'user.store'
        ]);

        Route::get('up/{id}', [
            'uses' => 'UserController@beAdmin',
            'as' => 'user.up'
        ])->middleware('admin');

        Route::get('down/{id}', [
            'uses' => 'UserController@beUser',
            'as' => 'user.down'
        ]);

        Route::get('delete/{id}', [
            'uses' => 'UserController@delete',
            'as' => 'user.delete'
        ]);
    });

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


    Route::group(['prefix' => 'settings'], function () {
        Route::get('/index', [
            'uses' => 'SettingController@index',
            'as' => 'settings.index'
        ]);

        Route::post('/update/{id}', [
            'uses' => 'SettingController@update',
            'as' => 'settings.update'
        ]);
    });


});