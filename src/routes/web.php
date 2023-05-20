<?php


// Route::group([
//     'namespace' => 'Yousafitpro\PhotoLibrary\Controllers',
//     'prefix' => 'photo-library',
// ], function () {
//     Route::get('', 'UcPhotoLibraryController@index');
// });


//adasd
//asdasd
Route::prefix('Gallery')
    ->namespace('Yousafitpro\PhotoLibrary\Controllers')
    ->group(function () {
        Route::get('/', 'UcPhotoLibraryController@index')->name('uc_gallery.index');
        Route::post('/upload_file', 'UcPhotoLibraryController@upload_file')->name('uc_gallery.upload_file');
        Route::get('/gallery-widget', 'UcPhotoLibraryController@gallery_widget')->name('uc_gallery.gallery_widget');
        Route::get('/gallery-delete-file/{id}',  'UcPhotoLibraryController@gallery_delete_file')->name('uc_gallery.gallery_delete_file');
        Route::get('/gallery-widget-search', 'UcPhotoLibraryController@gallery_widget_search')->name('uc_gallery.gallery_widget_search');
///adasd
    });

//asdasd
