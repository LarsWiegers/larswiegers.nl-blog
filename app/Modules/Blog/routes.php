<?php

Route::group(['namespace' => 'App\Modules\Blog\Application\Controllers'], function () {
	Route::resource('blog', 'WebPostController')->only([
		'index', 'show'
	]);
	Route::resource('blog/categories', 'WebCategoriesController')->only([
		'index', 'show'
	]);
	Route::apiResource('api/blog', 'ApiCategoryController')->names([
		'create' => 'blog.api.create',
		'edit' => 'blog.api.edit',
		'destroy' => 'blog.api.destroy',
		'store' => 'blog.api.store',
		'update' => 'blog.api.update',
		'index' => 'blog.api.index',
		'show' => 'blog.api.show',
	])->parameters([
		'blog' => "id"
	]);
});
