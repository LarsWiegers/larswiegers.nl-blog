<?php

Route::group(['namespace' => 'App\Modules\Blog\Application\Controllers'], function () {
	Route::resource('blog', 'WebPostController')->only([
		'index', 'show'
	]);
	Route::resource('blog/categories', 'WebCategoriesController')->only([
		'index', 'show'
	]);
});

Route::group(['namespace' => 'App\Modules\Blog\Application\Controllers\Backend',
	'prefix' => 'backend/blog',
	'middleware' => ['web', 'auth']], function () {
	Route::get('/', 'BackendDashboardController@index')->name('backend.blog.index');
	Route::resource('posts', 'BackendWebPostController', ['as' => 'backend']);
	Route::resource('categories', 'BackendCategoriesController', ['as' => 'backend']);
});
