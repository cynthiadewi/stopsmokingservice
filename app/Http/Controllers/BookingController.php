<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;
use App\Venue;
use App\Appointment;
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
        $appslots = \DB::table('appointments')
            ->join('venues', 'appointments.venue_id', '=', 'venues.id')
            ->selectRaw('appointments.id AS id, venues.address AS address, venues.postcode AS postcode, DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end,DATE_FORMAT(appointments.start_time, "%d/%m") AS date, appointments.day AS day, appointments.start_time as sorttime')
            ->where('appointments.booked','=','0')
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
        return view('booking.booking', compact('appslots','days'));
    }

    public function venueview(Venue $venue)
    {
        $appslots = \DB::table('venues')
                ->join('appointments', 'venues.id', '=', 'appointments.venue_id')
                ->selectRaw('appointments.id AS id, venues.address AS address, venues.postcode AS postcode, DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end, appointments.day AS day, appointments.start_time as sorttime')
                ->where([
                    ['appointments.booked', '=', '0'],
                    ['appointments.venue_id', '=', $venue->id],
                ])
                ->orderBy('sorttime', 'ASC')
                ->get();
            $days = [
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday'
              ];

        return view('booking.venue', compact('venue','days','appslots'));
    }

    public function book()
    {
        $loggedInID = Auth::user()->id;

        $myreservations = \DB::table('reservations')->where([['user_id','=',$loggedInID],['attend','=','0'],['noshow','=','0']])->get();

        if(count($myreservations)==0){

        $id = $_POST['aID'];
        \DB::table('appointments')
        ->where('id',$id)
        ->update(['booked'=> '1']);
        \DB::table('reservations')->insert(['user_id'=>$loggedInID, 'app_id'=>$id]);
        $booked = \DB::table('appointments')->where('id',$id)->first();
        $venue = \DB::table('venues')->where('id',$booked->venue_id)->first();

        $days = [
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thursday',
            5 => 'Friday',
            6 => 'Saturday',
            7 => 'Sunday'
        ];

        return view('booking.confirm', compact('booked','days','venue'));
        }
        else{
            echo "<script type='text/javascript'>alert('You have already booked an appointment'+'\\n'+
            'Please cancel your booking from your profile to book another appointment');</script>";
            return back();
        };
    }

    public function addToCalendar()
    {
        $id = $_POST['confirm'];
        $user=\DB::table('users')->select('email')->where('id',auth()->id())->first();
        $user_email=$user->email;
        $booked=\DB::table('appointments')->where('id',$id)->first();
        $start_time=$booked->start_time;
        $end_time=$booked->end_time;
        $venue = \DB::table('venues')->where('id',$booked->venue_id)->first();
        $address = $venue->address.' '.$venue->postcode;

        $event = new Event;
        $event->name = 'Stop Smoking Service Appointment '.$address;
        $event->startDateTime = new Carbon($start_time, 'Europe/London');
        $event->endDateTime = new Carbon($end_time, 'Europe/London');
        $event->addAttendee(['email' => $user_email]);

        $event->save('insertEvent');

        echo "<script type='text/javascript'>confirm('Appointment added to your calendar!');</script>";

        return redirect()->to('/home');
    }

    public function distance()
    {
        $postcode1=$_POST['postcode'];
        $distancesbetween=[];
        $venues = \DB::table('venues')->select('id','postcode')->get();
        foreach($venues as $venue){
            $postcode2=$venue->postcode;

            $url = "https://maps.googleapis.com/maps/api/distancematrix/json?units=imperial&origins=".urlencode($postcode1)."&destinations=".urlencode($postcode2)."&key=AIzaSyCU6RUvnDLH7M4BV0lglkRb9PbvamFPrgM";
            ini_set("allow_url_fopen", 1);
            $data = file_get_contents($url);
 
            $result = json_decode($data, true);
 
            $distancesbetween[$postcode2] = $result["rows"][0]['elements'][0]['distance']['value'];

        }
        $minpostcode = array_search(min($distancesbetween), $distancesbetween);
        $nearestvenue = \DB::table('venues')->where('postcode','=',$minpostcode)->first();
        $venue = $nearestvenue;
        
        $appslots = \DB::table('venues')
                ->join('appointments', 'venues.id', '=', 'appointments.venue_id')
                ->selectRaw('appointments.id AS id, venues.address AS address, venues.postcode AS postcode, DATE_FORMAT(appointments.start_time, "%h:%i%p") AS start, DATE_FORMAT(appointments.end_time, "%h:%i%p") AS end, appointments.day AS day, appointments.start_time as sorttime')
                ->where([
                    ['appointments.booked', '=', '0'],
                    ['appointments.venue_id', '=', $venue->id],
                ])
                ->orderBy('sorttime', 'ASC')
                ->get();
            $days = [
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday'
              ];

        return view('booking.venue', compact('venue','days','appslots'));
    }
}
