<?php

    Route::group(['middleware' => ['api'],
        'namespace' => 'SebastianJung\Vault423\Http\Controllers',
        'prefix' => 'vault-423'
    ],
    function () {
        Route::post('/check-password','Vault423Controller@checkPassword');
        Route::get('js', 'AssetController@js');
        Route::get('css', 'AssetController@css');
        Route::get('fonts/{fontname}', 'AssetController@fonts');
        Route::get('logo', 'AssetController@logo');
    });
