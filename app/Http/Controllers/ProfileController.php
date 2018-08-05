<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /*
        Profile controller
        @author Cynthia Dewi 
        @version 05/08/2018
        @library https://vegibit.com/how-to-create-user-registration-in-laravel/
     */
    public function view()
    {
        $profile = \DB::table('users')->where('id','=',auth()->id())->first();

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
        return view('profile.index', compact('profile','appslots','days','attended','missed'));
    }

    public function edit(User $user)
    {
        return view('profile.edit', compact('user'));
    }

    public function save(User $user)
    {
        $newfirstname = $_POST['firstname'];
        if($newfirstname == null){$newfirstname = $user->firstname;};
        $newlastname = $_POST['lastname'];
        if($newlastname == null){$newlastname = $user->lastname;};
        $newemail = $_POST['email'];
        if($newemail == null){$newemail = $user->email;};
        $newphone = $_POST['phone'];
        if($newphone == null){$newphone = $user->phone;};
        \DB::table('users')->where('id','=',$user->id)->update(['firstname'=>$newfirstname, 'lastname'=>$newlastname, 'email'=>$newemail, 'phone'=>$newphone]);
        return redirect()->to('/profile');
    }
    
    public function cancelbooking(User $user)
    {
        $loggedInID = $user->id;
        $id = $_POST['aID'];
        \DB::table('appointments')
        ->where('id',$id)
        ->update(['booked'=> '0']);
        \DB::table('reservations')->where(['user_id'=>$loggedInID, 'app_id'=>$id])->delete();
        echo "<script type='text/javascript'>alert('Booking Cancelled!');</script>";
        
        /*
        $event = Event::find($eventId);
        $event->delete();
        */

        return back();
    }
}
