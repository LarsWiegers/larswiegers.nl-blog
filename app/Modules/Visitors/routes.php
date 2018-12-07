<?php

Route::group(['namespace' => '\App\Modules\Visitors\Application\Controllers',
				'prefix' => 'backend/visitors',
				'middleware' => ['web', 'auth']], function () {
	Route::get('dashboard', 'HomeController@index')->name('backend.visitors.home');
});