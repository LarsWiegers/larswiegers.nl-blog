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

use Illuminate\Support\Facades\Route;

Route::get('/projects/', function () {
	return view('welcome');
})->name('projects.index');

Route::get('/contact/', function () {
	return view('welcome');
})->name('contact.index');
