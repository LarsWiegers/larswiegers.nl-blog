<?php

Route::group(['namespace' => '\App\Modules\WhoIsHome\Application\Controllers'], function () {
	Route::post('/who-is-home', 'WhoIsHomeController@index')->name('who-is-home');
});
