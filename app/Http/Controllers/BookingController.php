<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class BookingController extends Controller
{
    /*
        Booking controller
        @author Cynthia Dewi 
        @version 31/07/2018
     */
    public function view()
    {
        return view('/booking');
    }
    public function book()
    {
        $loggedInID = Auth::user()->id;
        $id = $_POST['aID'];
        \DB::table('appointments')
        ->where('id',$id)
        ->update(['booked'=> '1']);
        \DB::table('reservations')->insert(['user_id'=>$loggedInID, 'app_id'=>$id]);
        return view('/home');


    }
}
