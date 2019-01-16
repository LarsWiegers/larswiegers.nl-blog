<?php

Route::group(['namespace' => 'App\Modules\Contact\Application\Controllers', 'middleware' => ['web']], function () {
	Route::get('/contact/', 'WebContactController@index')->name('contact.index');
	Route::post('/contact/', 'WebContactController@save')->name('contact.save');
});
Route::group(['namespace' => 'App\Modules\Contact\Application\Controllers\Backend', 'middleware' => ['web', 'auth']], function () {
    Route::get('backend/contact', 'BackendContactController@index')->name('backend.contact.index');
    Route::get('backend/contact/{message}', 'BackendContactController@show')->name('backend.contact.show');
});
