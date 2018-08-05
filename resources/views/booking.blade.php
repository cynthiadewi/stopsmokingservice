<!--
    Booking blade
    @author Cynthia Dewi 
    @version 31/07/2018
 -->
 @extends('layout.master')
 @section('styles')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection
@section('content')
<div class="container">
<div class="booking_opening">
    <span>
    <br/><h1>Book Your Appointment</h1>
    You have <b>12</b> Appointments left.
    <br/><br/>
    Pick a Location:
    <ul>
    <?php
    $venues = DB::table('venues')->get();
    foreach($venues as $venue){
        echo '<li><a href="/booking/'.$venue->id.'">';
        echo $venue->address.' '.$venue->postcode;
        echo '</a></li>';
    }
    ?>
    </ul>
    Search the consultation location nearest to you:
    </span>
    <form action="/booking/venue" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <input type="text" name="postcode" id='postcode' placeholder='Your Location' style='width:30%'></input>
    </div>
    <div class="form-group">
        <button type='submit' class='btn btn-success' class="form-control">Search</button>
    </div>
    </form>
</div>
    <div class="bookingcontainer">
    <form action="/booking" method="post">
    {{ csrf_field() }}
        <?php 
            $appslots = DB::select(
                'SELECT a.id AS id, v.address AS address, v.postcode AS postcode, DATE_FORMAT(a.start_time, "%h:%i%p") AS start, DATE_FORMAT(a.end_time, "%h:%i%p") AS end, a.day AS day, a.start_time as sorttime
                FROM appointments AS a
                JOIN venues AS v
                ON a.venue_id = v.id
                WHERE a.booked = "0"
                ORDER BY sorttime ASC;'
            );
            $days = [
                1 => 'Monday',
                2 => 'Tuesday',
                3 => 'Wednesday',
                4 => 'Thursday',
                5 => 'Friday',
                6 => 'Saturday',
                7 => 'Sunday'
              ];
            for($i=1; $i<6; $i++){
                echo '<table class="tableID"><thead><tr><th>';
                echo $days[date($i)];
                echo '</th></tr></thead><tbody>';
                foreach($appslots as $slots){
                    if($slots->day == $i){
                echo    '<tr><td name="aID" value="';
                echo    $slots->id;
                echo    '">';
                echo    $slots->address;
                echo    '<br>';
                echo    $slots->postcode;
                echo    '<br>';
                echo    $slots->start;
                echo    '-';
                echo    $slots->end;
                echo    '<br><button id="bookbutton" type="submit" name="aID" value="';
                echo    $slots->id;
                echo    '">BOOK</button>';
                echo    '</td></tr>';
                }}
                echo '</tbody>
                </table>';
            }
        ?>
    </form>
    </div>
</div>


@endsection