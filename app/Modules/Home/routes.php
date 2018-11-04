<?php

Route::group(['namespace' => 'App\Modules\Home\Application\Controllers'], function () {
	Route::get('/', 'HomeController@index')->name("home");
});
