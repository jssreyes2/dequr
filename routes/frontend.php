<?php

use App\Models\StaticPage;

Route::get('backend/login', function () {
    return view('backend.login');
});

Route::match(['get', 'post'], 'login', 'Auth\LoginController@showFrmLogin')->name('login');

Route::match(['get', 'post'], 'register', 'Auth\RegisterController@index')->name('register');

Route::match(['get', 'post'], 'register-create', 'Auth\RegisterController@create')->name('register.create');

Route::match(['get', 'post'], 'login-user', 'Auth\LoginController@login')->name('login_user');

Route::get('/home', 'Frontend\HomeController@index')->name('home');

Route::get('/', 'Frontend\HomeController@index')->name('principal');

Route::get('category', 'Frontend\CategoryController@index')->name('category');

Route::match(['get', 'post'], 'detail-category/{slug}', 'Frontend\DetailCategoryController@index')->name('detail_category');

Route::get('terms_and_conditions', 'Backend\StaticPageController@show')->name('terms_and_conditions')->defaults('page', StaticPage::TERMS_AND_CONDITIONS);

Route::get('legal', 'Backend\StaticPageController@show')->name('legal')->defaults('page', StaticPage::LEGAL);

Route::get('companies', 'Frontend\CompanyController@index')->name('company.index');

Route::get('company/{slug}', 'Frontend\CompanyController@show')->name('company.show');

Route::match(['get', 'post'], 'complaints/{slug}', 'Frontend\ComplaintController@index')->name('complaint.index');

Route::match(['get', 'post'], 'search-complaint', 'Frontend\ComplaintController@index')->name('search_complaint');

Route::get('post-complaint', 'Frontend\PostComplaintController@index')->name('post_complaint.index');

Route::match(['get', 'post'], 'post-complaint-store', 'Frontend\PostComplaintController@store')->name('post_complaint.store');

Route::match(['get', 'post'], 'register-comment', 'Backend\CommentController@store')->name('comment.store');

Route::get('download-files-complaints/{id}', 'Frontend\CompanyController@downloadFileComplaint')
    ->name('download_file_complaint');

Route::group(['middleware' => ['auth']], function () {


    Route::get('profile', 'Frontend\ProfileController@index')->name('profile.index');

    Route::match(['get', 'post'], 'update-avatar', 'Frontend\ProfileController@updateAvatar')->name('profile.updateAvatar');

    Route::match(['get', 'post'], 'update-profile', 'Frontend\ProfileController@updateProfile')->name('profile.updateProfile');

    Route::match(['get', 'post'], 'update-password', 'Frontend\ProfileController@updatePassword')->name('profile.updatePassword');

    Route::get('notifications', 'Frontend\NotificationController@index')->name('Notification.index');

    Route::get('comments', 'Frontend\CommentController@index')->name('comment.index');

});
