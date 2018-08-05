<?php

namespace App\Http\Controllers;

use App\User;
use App\Venue;
use Illuminate\Http\Request;

class AdminbookController extends Controller
{
    /*
        Admin Booking controller
        @author Cynthia Dewi 
        @version 05/08/2018
     */
    public function viewBookings()
    {
        $appslots = \DB::table('appointments')
            ->join('venues', 'appointments.venue_id', '=', 'venues.id')
            ->join('reservations', 'appointments.id', '=', 'reservations.app_id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->selectRaw('reservations.user_id AS user_id, users.firstname AS firstname, users.lastname AS lastname,
            appointments.id AS id, venues.address AS address, venues.postcode AS postcode,
            DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end,
            DATE_FORMAT(appointments.start_time, "%d/%m") AS date, appointments.day AS day, appointments.start_time as sorttime')
            ->where([['appointments.booked','=','1'],['reservations.attend','=','0'],['reservations.noshow','=','0']])
            ->orderBy('sorttime', 'ASC')->get();
        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];
        return view('admin.adminbook', compact('appslots','days'));
    }

    public function venueview(Venue $venue)
    {
        $appslots = \DB::table('appointments')
            ->join('venues', 'appointments.venue_id', '=', 'venues.id')
            ->join('reservations', 'appointments.id', '=', 'reservations.app_id')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->selectRaw('reservations.user_id AS user_id, users.firstname AS firstname, users.lastname AS lastname,
            appointments.id AS id, venues.address AS address, venues.postcode AS postcode,
            DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end,
            DATE_FORMAT(appointments.start_time, "%d/%m") AS date, appointments.day AS day, appointments.start_time as sorttime')
            ->where([['appointments.booked','=','1'],['reservations.attend','=','0'],['reservations.noshow','=','0'],['venues.id','=',$venue->id]])
            ->orderBy('sorttime', 'ASC')->get();
        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];
        return view('admin.adminbook', compact('appslots','days'));
    }


    public function viewProfile(User $user)
    {
        $profile = \DB::table('users')->where('id','=',$user->id)->first();

        $appslots = \DB::table('appointments')
            ->join('venues', 'appointments.venue_id', '=', 'venues.id')
            ->join('reservations', 'appointments.id', '=', 'reservations.app_id')
            ->selectRaw('appointments.id AS id, venues.address AS address, venues.postcode AS postcode, DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end,DATE_FORMAT(appointments.start_time, "%d/%m") AS date, appointments.day AS day, appointments.start_time as sorttime')
            ->where([['appointments.booked','=','1'],['reservations.user_id','=',$profile->id],['reservations.attend','=','0'],['reservations.noshow','=','0']])
            ->orderBy('sorttime', 'ASC')->get();
        $attended = \DB::table('appointments')
            ->join('venues', 'appointments.venue_id', '=', 'venues.id')
            ->join('reservations', 'appointments.id', '=', 'reservations.app_id')
            ->selectRaw('appointments.id AS id, venues.address AS address, venues.postcode AS postcode, DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end,DATE_FORMAT(appointments.start_time, "%d/%m") AS date, appointments.day AS day, appointments.start_time as sorttime')
            ->where([['appointments.booked','=','1'],['reservations.user_id','=',$profile->id],['reservations.attend','=','1']])
            ->orderBy('sorttime', 'ASC')->get();
        $missed = \DB::table('appointments')
            ->join('venues', 'appointments.venue_id', '=', 'venues.id')
            ->join('reservations', 'appointments.id', '=', 'reservations.app_id')
            ->selectRaw('appointments.id AS id, venues.address AS address, venues.postcode AS postcode, DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end,DATE_FORMAT(appointments.start_time, "%d/%m") AS date, appointments.day AS day, appointments.start_time as sorttime')
            ->where([['appointments.booked','=','1'],['reservations.user_id','=',$profile->id],['reservations.noshow','=','1']])
            ->orderBy('sorttime', 'ASC')->get();
        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];
        return view('admin.profile', compact('profile','appslots','days','attended','missed'));
    }

    public function bookingUpdate()
    {
        if (isset($_POST['attend'])) {
            $id = $_POST['attend'];
            \DB::table('reservations')->where('app_id',$id)->update(['attend'=>'1']);
        } else {
            $id = $_POST['noshow'];
            \DB::table('reservations')->where('app_id',$id)->update(['noshow'=>'1']);
        }
    }
}