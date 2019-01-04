<?php

    Route::group(['middleware' => ['api'],
        'namespace' => 'SebastianJung\Vault423\Http\Controllers',
        'prefix' => 'vault-423'
    ],
    function () {
        Route::post('/check-password','Vault423Controller@checkPassword')->name('check-password');
        Route::get('js', 'AssetController@js')->name('get-js');
        Route::get('css', 'AssetController@css')->name('get-css');
        Route::get('fonts/{fontname}', 'AssetController@fonts')->name('get-fonts');
        Route::get('img/{imgname}', 'AssetController@img')->name('get-img');
    });
