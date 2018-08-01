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

//home
Route::get('/', function () {
    return view('home');
});
Route::get('/home', function () {
    return view('home');
})->name('home');

//login
Route::get('/login', 'LoginController@view')->name('login');
Route::post('/login', 'LoginController@login');
Route::get('/logout', 'LoginController@log_out');

//register
Route::get('/register', 'RegistrationController@view')->name('register');
Route::post('/register', 'RegistrationController@register');

//booking
Route::get('/booking', 'BookingController@view')->middleware('auth');
Route::post('/booking', 'BookingController@book');