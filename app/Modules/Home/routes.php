<?php

Route::group(['namespace' => 'App\Modules\StaticPages\Application\Controllers'], function () {
	Route::get('/', 'HomeController@index')->name("home");
});
