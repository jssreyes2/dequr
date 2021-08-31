<?php


Route::group(['prefix' => 'utilities', 'middleware' => ['auth', 'role']], function () {

    #####################RUTA PARA QUEJAS####################################
    Route::get('bd-utilities', 'Backend\UtilitiesController@index')
        ->name('utilities.index')
        ->defaults('route', 'utilities.index');



});
