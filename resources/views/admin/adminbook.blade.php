<!--
    Admin Booking blade
    @author Cynthia Dewi 
    @version 05/08/2018
 -->
 @extends('layout.master')
 @section('styles')
    <link rel="stylesheet" href="{{ asset('css/booking.css') }}">
@endsection
@section('content')
<div class="container">
<div class="booking_opening">
    <span>
    <br/><h1>Booked Appointments</h1>
    Pick a Location:
    <ul>
    <li><a href="/adminbook">Show All</a>
    <?php
    $venues = DB::table('venues')->get();
    foreach($venues as $venue){
        echo '<li><a href="/adminbook/'.$venue->id.'">';
        echo $venue->address.' '.$venue->postcode;
        echo '</a></li>';
    }
    ?>
    </ul>
    </span>
</div>
    <div class="bookingcontainer">
    <form action="/adminbook" method="post">
    {{ csrf_field() }}
        <?php 
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
                echo    '<br><br>Booked By<br>';
                echo    '<a href="/profile/'.$slots->user_id.'">'.$slots->firstname.' '.$slots->lastname.'</a>';
                echo    '<br><button id="bookbutton" type="submit" name="attend" value="';
                echo    $slots->id;
                echo    '">Attended</button>';
                echo    '<br><button id="bookbutton" type="submit" name="noshow" value="';
                echo    $slots->id;
                echo    '">No Show</button>';
                echo    '</td></tr>';
                }}
                echo '</tbody>
                </table>';
            };
        ?>
    </form>
    </div>
</div>


@endsection