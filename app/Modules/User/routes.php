<?php

Route::group(['namespace' => '\App\Modules\User\Application\Controllers',
				'prefix' => 'backend',
				'middleware' => ['web', 'auth']], function () {
	Route::get('/profile', 'ProfileController@index')->name('profile');
	Route::put('/profile', 'ProfileController@save')->name('profile-save');
});
Route::group(['namespace' => 'App\Modules\User\Application\Controllers\Backend',
              'prefix' => 'backend/users',
              'middleware' => ['web', 'auth']], function () {
	Route::resource('users', 'BackendUserController', ['as' => 'backend']);
});
