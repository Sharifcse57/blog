<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
 */

Route::get('/', 'SitesController@index')->name('home');
Route::get('/home', 'SitesController@index');
Route::get('/loves', 'AjaxController@addLoves')->name('ajax.addLoves');
Route::get('/changeLanguage', 'AjaxController@changeLanguage')->name('ajax.changeLanguage');
Route::get('/getexcursions', 'AjaxController@getexcursions')->name('ajax.getexcursions');

// admin part start hare
Route::get('/myadmin', 'HomeController@index')->name('dashboard');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'permissions']], function () {
	Route::resource('roles', 'RolesController');
	Route::get('/users', 'Auth\RegisterController@showUserLists')->name('users.index');
	Route::get('/users/{user}', 'Auth\RegisterController@showUser')->name('users.show');
	Route::get('/users/{user}/edit', 'Auth\RegisterController@editUser')->name('users.edit');
	Route::delete('/users/{user}', 'Auth\RegisterController@destroyUser')->name('users.destroy');
	Route::resource('site_settings', 'SiteSettingsController',
		['only' => ['edit', 'update']]);

	// Route::resource('static_langs', 'StaticLangsController');
	Route::resource('questions', 'QuestionsController');
	Route::resource('comments', 'CommentsController');
	Route::resource('tags', 'TagsController');

});

Auth::routes();
