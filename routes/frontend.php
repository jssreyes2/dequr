<?php

Route::get('backend/login', function () {
    return view('backend.login');
});

Route::match(['get', 'post'], 'login', 'Auth\LoginController@showFrmLogin')->name('login');

Route::match(['get', 'post'], 'register', 'Auth\RegisterController@index')->name('register');

Route::match(['get', 'post'], 'login-user', 'Auth\LoginController@login')->name('login_user');

Route::get('/home', 'Frontend\HomeController@index')->name('home');

Route::get('/', 'Frontend\HomeController@index')->name('principal');

Route::get('category', 'Frontend\CategoryController@index')->name('category');

Route::get('post-complaint', 'Frontend\PostComplaintController@index')->name('PostComplaint.index');
