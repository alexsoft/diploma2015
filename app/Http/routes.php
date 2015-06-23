<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'WelcomeController@welcome'
]);

Route::controller('auth', 'Auth\AuthController');

Route::group(['middleware' => 'auth'], function() {

    Route::group(['prefix' => 'dialogs'], function() {

        Route::get('/', [
            'as'   => 'dialogs.index',
            'uses' => 'DialogsController@index'
        ]);

        Route::get('{nickname}', [
            'as'   => 'dialogs.show',
            'uses' => 'DialogsController@show'
        ]);

        Route::put('{nickname}', [
            'as'   => 'dialogs.create',
            'uses' => 'DialogsController@store'
        ]);

    });


    Route::group(['prefix' => 'users'], function() {

        Route::get('/', [
            'as'   => 'users.index',
            'uses' => "UsersController@index"
        ]);

        Route::get('@{nickname}', [
            'as'   => 'users.show',
            'uses' => 'UsersController@show'
        ]);

        Route::get('@{nickname}/edit', [
            'as'   => 'users.edit',
            'uses' => 'UsersController@edit'
        ]);

        Route::put('@{nickname}', [
            'as'   => 'users.update',
            'uses' => 'UsersController@update'
        ]);

    });


});
