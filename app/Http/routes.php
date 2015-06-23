<?php

Route::get('/', [
    'as' => 'home',
    'uses' => 'WelcomeController@welcome'
]);

Route::controller('auth', 'Auth\AuthController');

Route::group(['middleware' => 'auth'], function() {

    Route::get('dialogs', [
        'as'   => 'dialogs.index',
        'uses' => 'DialogsController@index'
    ]);

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
