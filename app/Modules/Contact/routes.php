<?php

Route::group(['namespace' => 'App\Modules\Contact\Application\Controllers'], function () {
	Route::get('/contact/', 'WebContactController@index')->name('contact.index');
	Route::post('/contact/', 'WebContactController@save')->name('contact.save');
});

