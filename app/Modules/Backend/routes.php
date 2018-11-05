<?php

Route::group(['namespace' => '\App\Modules\Backend\Application\Controllers',
				'prefix' => 'backend',
				'middleware' => ['web', 'auth']], function () {
	Route::get('/', function() {
		return redirect(route('login'));
	});
	Route::get('dashboard', 'HomeController@index')->name('backend-home');
});