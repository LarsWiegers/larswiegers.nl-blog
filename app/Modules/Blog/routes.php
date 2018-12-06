<?php

Route::group(['namespace' => 'App\Modules\Blog\Application\Controllers'], function () {
	Route::get('blog', 'WebCategoriesController@index')->name('blog.index');

	Route::get('blog/categories/all', function () {
		return redirect(route('categories.index'));
	});

	Route::resource('blog/categories', 'WebCategoriesController')->only([
		'index', 'show'
	]);



	Route::resource('blog/posts', 'WebPostController')->only([
		'index', 'show'
	]);

	Route::apiResource('api/categories', 'ApiCategoryController')->names([
		'index' => 'blog.api.categories.index',
		'show' => 'blog.api.categories.show'
	])->only(['index', 'show']);

	Route::apiResource('api/posts', 'ApiPostController')->names([
		'index' => 'blog.api.posts.index',
		'show' => 'blog.api.posts.show'
	])->only(['index', 'show']);

});

Route::group(['namespace' => 'App\Modules\Blog\Application\Controllers\Backend',
	'prefix' => 'backend/blog',
	'middleware' => ['web', 'auth']], function () {
	Route::get('/', 'BackendDashboardController@index')->name('backend.blog.index');
	Route::resource('posts', 'BackendPostController', ['as' => 'backend'])
	     ->only(["index","edit", "store", "update","create","destroy"]);
	Route::resource('categories', 'BackendCategoriesController', ['as' => 'backend'])
	     ->only(["index","edit", "store", "update","create","destroy"]);
	Route::resource('templates', 'BackendTemplatesController', ['as' => 'backend'])
	     ->only(["index","edit", "store", "update","create","destroy"]);
});
