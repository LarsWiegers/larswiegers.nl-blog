<?php

use Illuminate\Support\Facades\Route;

// Authentication Routes...
Route::group([
	'namespace' => '\App\Modules\Auth\Application\Controllers',
	'prefix' => 'auth',
	'middleware' => 'web'], function (){
	Route::get('login', 'LoginController@showLoginForm')->name('login');
	Route::post('login', 'LoginController@login');
	Route::get('logout', 'LoginController@logout')->name('logout');
	Route::post('logout', 'LoginController@logout')->name('logout');

// Registration Routes...
	Route::get('register', 'RegisterController@showRegistrationForm')->name('register');
	Route::post('register', 'RegisterController@register');


// Password Reset Routes...
	Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('password.reset');
	Route::post('password/reset', 'ResetPasswordController@reset')->name('password.update');


	Route::get('email/verify', 'VerificationController@show')->name('verification.notice');
	Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
	Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
});

