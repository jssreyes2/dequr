<?php


Route::group(['prefix' => 'reports', 'middleware' => ['auth', 'role']], function () {

    #####################RUTA PARA QUEJAS####################################
    Route::get('complaints', 'Backend\ReportComplaintController@index')
        ->name('reports_complaint.index')
        ->defaults('route', 'reports_complaint.index');

    Route::get('complaints/edit/{id}', 'Frontend\ComplaintController@edit')
        ->name('reports_complaint.edit')
        ->defaults('route', 'reports_complaint.index');

    Route::match(['get', 'post'], 'complaints/update', 'Frontend\ComplaintController@update')
        ->name('reports_complaint.update');

    Route::get('view-modal-complaint/{id}', 'Backend\ReportComplaintController@viewModalComplaint')
        ->name('reports_complaint.viewModalComplaint');

    Route::get('download-file-complaint/{id}', 'Backend\ReportComplaintController@downloadFileComplaint')
        ->name('reports_complaint.downloadFileComplaint');
});
