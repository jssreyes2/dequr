<?php



Route::group(['middleware' => ['auth','role']], function () {

    #####################RUTA PARA CATEGORIAS####################################
    Route::get('categories', 'Backend\CategoryController@index')
        ->name('categories')
        ->defaults('route', 'categories');

    Route::get('category/edit/{id}', 'Backend\CategoryController@edit')
        ->name('category.edit')
        ->defaults('route', 'categories');

    Route::get('category/create/new', 'Backend\CategoryController@create')
        ->name('category.create')
        ->defaults('route', 'categories');

    Route::post('category/store', 'Backend\CategoryController@store')
        ->name('category.store');

    Route::post('category/update', 'Backend\CategoryController@update')
        ->name('category.update');

    Route::post('category/destroy', 'Backend\CategoryController@destroy')
        ->name('category.destroy');



    #####################RUTA PARA EMPRESAS####################################
    Route::get('business', 'Backend\BusinesController@index')
        ->name('business')
        ->defaults('route', 'business');

    Route::get('busines/edit/{id}', 'Backend\BusinesController@edit')
        ->name('busines.edit')
        ->defaults('route', 'business');

    Route::get('busines/create/new', 'Backend\BusinesController@create')
        ->name('busines.create')
        ->defaults('route', 'business');

    Route::post('busines/store', 'Backend\BusinesController@store')
        ->name('busines.store');

    Route::post('busines/update', 'Backend\BusinesController@update')
        ->name('busines.update');

    Route::post('busines/destroy', 'Backend\BusinesController@destroy')
        ->name('busines.destroy');
});
