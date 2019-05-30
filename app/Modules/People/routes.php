<?php

Route::group(['namespace' => '\App\Modules\People\Application\Controllers',
				'prefix' => 'backend/people',
				'middleware' => ['web', 'auth']], function () {
	Route::get('/', 'PeopleController@index')->name('backend.people.home');
	Route::post('/', 'PeopleController@save')->name('backend.people.save');
});
