<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('/login', function() {
	return view('login');
});

Route::group(['middleware' => 'auth'], function () {

	Route::get('/', function () {
	    return view('index_simon');
	});

	Route::get('/simon', function () {
	    return view('index_simon');
	});

	Route::get('login/role', 'HomeController@giveRole');

	Route::get('dashboard/progres', 'ProyekDashboardController@dataProgres');
	Route::get('dashboard/kontrak', 'ProyekDashboardController@dataKontrak');

	Route::get('uuk/dataTableAll', 'UUKController@dataTableAll');

	Route::get('proyek/dataTableAll', 'ProyekController@dataTableAll');
	Route::get('proyek/dataTable/{id}', 'ProyekController@dataTable');
	Route::post('proyek/import_excel', 'ProyekController@import_excel');
	Route::get('proyek/download_template', 'ProyekController@download_template');

	Route::get('user/dataTableAll', 'UserController@dataTableAll');

	Route::post('user/create', 'UserController@create');

	Route::resource('proyek', 'ProyekController');
	Route::resource('uuk', 'UUKController');
});