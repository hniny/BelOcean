<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'FrontendController@index');
Route::resource('personal', 'FrontendController');

Auth::routes();

Route::get('/login', function(){
    return view('vendor.adminlte.auth.login');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function() {
    Route::resource('roles','RoleController');
    Route::resource('users','UserController');
    Route::resource('certificates','CertificateController');
    Route::resource('vessels','VesselController');
    Route::resource('categories','AppliedCategoryController');
    Route::resource('backgroundinfos','BackgroundInfoController');
    Route::resource('personalinfos','PersonalinfoController');

    Route::get('/home','HomeController@index')->name('home');
   Route::post('/deleteSeaService','PersonalinfoController@deleteSeaService');
   Route::get('/dropzone', 'DrozoneController@dropzone');
   Route::post('dropzone/store', 'DrozoneController@dropzoneStore')->name('dropzone.store');

   Route::get('personalinfos/{id}/delete/{field}/pdf/{pdf}','PersonalinfoController@delete_pdf');
   Route::get('personalinfos/{id}/delete/{field}/image/{image}','PersonalinfoController@delete_image');
   Route::get('/downloadPDF/{id}','PersonalinfoController@downloadPDF');
   //Report
   Route::get('yearly', 'PersonalinfoController@yearly')->name('yearly');
   Route::post('yearly', 'PersonalinfoController@yearly')->name('yearly');
});

Route::get('/clear', function () {
    Artisan::call('config:cache');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    Artisan::call('cache:clear');
    Artisan::call('view:clear');
    return '<h3>Cleared Cache Data!</h3>';
});

