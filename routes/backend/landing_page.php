<?php



Route::group(['middleware' => ['auth','role']], function () {

    #####################RUTA PARA REGISTROS PAGINAS ESTATICAS#################################################
    Route::match(['get', 'post'], '/static-pages', 'Backend\StaticPageController@index')->name('static_page.index')->defaults('route', 'static_page.index');

    Route::match(['get', 'post'], 'static-page-create', 'Backend\StaticPageController@create')->name('StaticPage.create')->defaults('route', 'static_page.index');

    Route::post('/store-static-page', 'Backend\StaticPageController@store')->name('static_page.store');

    Route::match(['get', 'post'], '/edit-static-page/{id}', 'Backend\StaticPageController@edit')->name('StaticPage.edit')->defaults('route', 'static_page.index');

    Route::post('/update-static-page', 'Backend\StaticPageController@update')->name('static_page.update');

    Route::post('/destroy-static-page', 'Backend\StaticPageController@destroy')->name('static_page.delete');

});
