<?php namespace RainLab\Api;

use Route;

Route::group([
    'prefix' => '/api/auth',
    'namespace' => 'Api\Http\Controllers',
], function () {

    Route::post('login', 'AuthController@login');

    Route::get('/', 'AuthController@index')
        ->middleware('auth:api');

});

Route::group([
    'prefix' => '/api/{version}',
    'namespace' => 'Api\Http\Controllers',
], function () {

    Route::get('meta', function ($version) {
        return [
            'version' => $version,
        ];
    });

    Route::group([
        'middleware' => 'auth:api',
    ], function () {
        Route::get('resources/{resource}', 'ResourcesController@index');

        Route::get('resources/{resource}/{id}', 'ResourcesController@show');
    });

});