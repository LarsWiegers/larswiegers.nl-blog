<?php

Route::group(['namespace' => '\App\Modules\SocialMedia\Application\Controllers',
				'prefix' => 'backend/social-media/',
				'middleware' => ['web', 'auth']], function () {
	Route::get('/', 'DashboardController@index')->name('social-index');
});