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
Route::get('/booking/confirmation', 'BookingController@confirmation');
Route::post('/booking/confirmation/{appointment}', 'BookingController@addToCalendar');
Route::get('/booking/{venue}', 'BookingController@venueview');
Route::post('/booking/venue', 'BookingController@distance');

//forum
Route::get('/threads', 'ThreadController@index');
Route::post('/newthread', 'ThreadController@create');
Route::get('/threads/{thread}', 'ThreadController@show');
Route::post('/threads/{thread}/member', 'ThreadController@update');
Route::post('/threads/{thread}/replies', 'ReplyController@store');

//profile
Route::get('/profile', 'ProfileController@view')->middleware('auth');
Route::post('/profile/cancelbooking/{user}', 'ProfileController@cancelbooking');
Route::get('/profile/edit/{user}', 'ProfileController@edit');
Route::post('/profile/edit/{user}', 'ProfileController@save');

//adminview
Route::get('/profile/{user}', 'AdminbookController@viewProfile')->middleware('admin');
Route::get('/adminbook', 'AdminbookController@viewBookings')->middleware('admin');
Route::post('/adminbook', 'AdminbookController@bookingUpdate')->middleware('admin');
Route::get('/adminbook/{venue}', 'AdminbookController@venueview')->middleware('admin');