<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Venue;
use Spatie\GoogleCalendar\Event;
use Carbon\Carbon;

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

    public function venueview(Venue $venue)
    {
        return view('/bookvenue', compact('venue'));
    }

    public function book()
    {
        $loggedInID = Auth::user()->id;
        $id = $_POST['aID'];
        \DB::table('appointments')
        ->where('id',$id)
        ->update(['booked'=> '1']);
        \DB::table('reservations')->insert(['user_id'=>$loggedInID, 'app_id'=>$id]);
        $start_time=\DB::table('appointments')->select('start_time')->where('id',$id)->first();
        $start_time=$start_time->start_time;
        $end_time=\DB::table('appointments')->select('end_time')->where('id',$id)->first();
        $end_time=$end_time->end_time;
        $user_email=\DB::table('users')->select('email')->where('id',auth()->id())->first();
        echo "<script type='text/javascript'>alert('Booking Booked!');</script>";

        $event = new Event;
        $event->name = 'Stop Smoking Service Appointment';
        $event->endDateTime = new Carbon($end_time, 'Europe/London');
        $event->startDateTime = (new Carbon($end_time, 'Europe/London'))->subMinutes(15);
        $event->addAttendee(['email' => $user_email]);

        $event->save('insertEvent');

        return back();
    }

    public function distance(Venue $venue)
    {
        $postcode1=$_POST['postcode'];
        $distancesbetween=[];
        $venues = \DB::table('venues')->select('id','postcode')->get();
        foreach($venues as $venue){
            $postcode2=$venue->postcode;

            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".$postcode1."&destinations=".$postcode2."&key=AIzaSyCU6RUvnDLH7M4BV0lglkRb9PbvamFPrgM";
 
            $data = @file_get_contents($url);
 
            $result = json_decode($data, true);
 
            $distancesbetween[$postcode2] = $result["rows"][0]['elements'][0]['distance']['value'];
        }
        foreach($distancesbetween as $distance){
        echo "<script type='text/javascript'>alert('$distance');</script>";
        }
        $minpostcode = array_search(min($distancesbetween), $distancesbetween);
        echo "<script type='text/javascript'>alert('$minpostcode');</script>";
        //$nearestvenue = \DB::table('venues')->where('postcode','=',$minpostcode)->first();
        //$venue = $nearestvenue;
        
        //return view('/bookvenue', compact('venue'));
    }
}
