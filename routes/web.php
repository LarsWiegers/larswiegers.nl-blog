<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('home.index');

Route::get('/projects/', function () {
	return view('welcome');
})->name('projects.index');

Route::get('/contact/', function () {
	return view('welcome');
})->name('contact.index');

Route::get('/home', 'HomeController@index')->name('home');
