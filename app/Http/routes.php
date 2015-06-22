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

});
