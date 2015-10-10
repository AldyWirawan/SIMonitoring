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

Route::get('/login', function() {
	return view('login');
});

Route::post('login','HomeController@doLogin');

Route::get('/', function () {
    return view('index_simon');
});

Route::get('/simon', function () {
    return view('index_simon');
});

Route::get('proyek/dataTableAll', 'ProyekController@dataTableAll');
Route::post('proyek/import_excel', 'ProyekController@import_excel');
Route::get('proyek/download_template', 'ProyekController@download_template');

Route::get('uuk/dataTableAll', 'UUKController@dataTableAll');

Route::get('dashboard/progres', 'ProyekDashboardController@dataProgres');
Route::get('dashboard/kontrak', 'ProyekDashboardController@dataKontrak');

Route::resource('proyekDashboard', 'ProyekDashboardController');
Route::resource('proyek', 'ProyekController');
Route::resource('uuk', 'UUKController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);