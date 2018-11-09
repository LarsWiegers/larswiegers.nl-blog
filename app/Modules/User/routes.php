<?php

Route::group(['namespace' => '\App\Modules\User\Application\Controllers',
				'prefix' => 'backend',
				'middleware' => ['web', 'auth']], function () {
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile', 'ProfileController@save')->name('profile-save');
});