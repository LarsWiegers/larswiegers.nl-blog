<?php

Route::group(['namespace' => 'App\Modules\Home\Application\Controllers',
			'middleware' => ['web']], function () {
	Route::get('/', 'HomeController@index')->name("home");
});
