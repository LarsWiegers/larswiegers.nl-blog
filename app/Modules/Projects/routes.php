<?php

Route::group(['namespace' => 'App\Modules\Projects\Application\Controllers', 'middleware' => ['web']], function () {
    Route::get('/projects/', 'WebProjectsController@index')->name('projects.index');
});
