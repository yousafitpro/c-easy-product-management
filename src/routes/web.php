<?php


// Route::group([
//     'namespace' => 'Yousafitpro\PhotoLibrary\Controllers',
//     'prefix' => 'photo-library',
// ], function () {
//     Route::get('', 'UcPhotoLibraryController@index');
// });


//adasd
//asdasd
Route::prefix('EPM')
    ->middleware('web')
    ->namespace('Yousafitpro\EPM\Controllers')
    ->group(function () {
        Route::get('/', 'EPMServiceController@index')->name('uc_epm.index');
        Route::get('/Add-Product', 'EPMServiceController@add_product')->name('uc_epm.add_product');
        Route::post('/Add-Product', 'EPMServiceController@create_product')->name('uc_epm.add_product');

    });

//asdasd
