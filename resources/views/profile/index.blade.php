<!--
    Profile View
    @author Cynthia Dewi 
    @version 05/08/2018
    @library https://bootsnipp.com/snippets/featured/simple-user-profile
 -->

@extends('layout.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('js')
<script type="text/javascript" src="{{ URL::asset('js/clickshow.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
        <div class="panel panel-info">
            <div class="panel-body">
            <div class="row">
                <div class="col-md-3 col-lg-3 " align="center">
                    <img class="profileimg" alt="User Pic" src="{{ asset('images/profile.png') }}">
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>First Name</td>
                        <td>{{$profile->firstname}}</td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td>{{$profile->lastname}}</td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td>{{$profile->email}}</td>
                      </tr>
                        <td>Phone Number</td>
                        <td>{{$profile->phone}}</td>
                      </tr>
                     </tbody>
                  </table>
                    <div class="buttons-inline">
                        <a href="/profile/edit/{{$profile->id}}" class="btn btn-success">Edit Profile</a>
                        <br/><br/>
                        <button type='button' class='btn btn-success' onclick='showemail()'>See Booked Appointments</button>
                        <div id='showclick' style='display: none;'>
                        
                        <div class="bookingcontainer">
                        <br/><h4>Your Reservations</h4>
                        <form action="/profile/cancelbooking/{{$profile->id}}" method="post">
                        {{ csrf_field() }}
                        <?php 
                                echo '<table class="tableID"><tbody>';
                                foreach($appslots as $slots){
                                        echo    '<tr><td>'.$days[date($slots->day)].' '.$slots->date.'</td>';
                                        echo    '<td>'.$slots->address.', '.$slots->postcode.', '.$slots->start.'-'.$slots->end.'</td>';
                                        echo    '<td><button id="cancelbutton" type="submit" name="aID" value="'.$slots->id.'">CANCEL</button>';
                                        echo    '</td></tr>';
                                    }
                                echo '</tbody></table>';
                                echo '<br/><h4>Attended Appointments</h4>
                                        <form action="/profile/cancelbooking/{{$profile->id}}" method="post">';
                                echo '<table class="tableID"><tbody>';
                                foreach($attended as $slots){
                                        echo    '<tr><td>'.$days[date($slots->day)].' '.$slots->date.'</td>';
                                        echo    '<td>'.$slots->address.', '.$slots->postcode.', '.$slots->start.'-'.$slots->end.'</td>';
                                        echo    '</tr>';
                                    }
                                echo '</tbody></table>';
                                echo '<br/><h4>Missed Appointments</h4>
                                        <form action="/profile/cancelbooking/{{$profile->id}}" method="post">';
                                echo '<table class="tableID"><tbody>';
                                foreach($missed as $slots){
                                        echo    '<tr><td>'.$days[date($slots->day)].' '.$slots->date.'</td>';
                                        echo    '<td>'.$slots->address.', '.$slots->postcode.', '.$slots->start.'-'.$slots->end.'</td>';
                                        echo    '</tr>';
                                    }
                                echo '</tbody></table>';
                            ?>
                        </form>
                        </div>

                        </div>
                    </div>
                </div>
            </div>
            </div>            
        </div>
        </div>
    </div>
</div>
@endsection