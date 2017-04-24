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

// Only allow home access if user is logged in
Route::get('/home', function() {
	if (!Auth::check())
		return redirect('/');
	if (Auth::user()->type == 'patient')
		return redirect()->action('PatientController@index');
	else
		return redirect()->action('DoctorController@index');
})->name('home');

// User routes
Route::group(['middleware' => 'auth'], function() {
	Route::get('/', function() {
		return back();
	});
	Route::resource('patient', 'PatientController');
	Route::resource('patient.sugars', 'BloodSugarController');
	Route::resource('doctor', 'DoctorController');
});

// Guests cannot access patient/doctor functionality
Route::group(['middleware' => 'guest'], function() {
	Route::get('/', function() {
		return view('welcome');
	});
});
