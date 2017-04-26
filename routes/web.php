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



Auth::routes();

// Doctor login routes
Route::get('/doctor/login', 'Auth\DoctorLoginController@showLoginForm')->name('doctor.login');
Route::post('/doctor/login', 'Auth\DoctorLoginController@login')->name('doctor.login.submit');
Route::get('/doctor', 'DoctorController@index')->name('doctor.index');

// User routes
Route::group(['middleware' => 'auth'], function() {
	Route::resource('patient', 'PatientController');
	Route::resource('patient.sugars', 'BloodSugarController');
});

// Doctor routes
Route::group(['middleware' => 'auth:doctor'], function() {
	//Route::resource('doctor', 'DoctorController');
	Route::get('/doctor', 'DoctorController@index')->name('doctor.index');
});

// Only allow home access if user is logged in
Route::get('/home', function() {
	if (Auth::guard('web')->check())
		return redirect()->action('PatientController@index');
	else if (Auth::guard('doctor')->check())
		return redirect()->route('doctor.index');
	else {
		return view('welcome');
	}
})->name('home');

// Guests will be redirected to home page
Route::group(['middleware' => 'guest'], function() {
	Route::get('/', function() {
		return view('welcome');
	});
});
