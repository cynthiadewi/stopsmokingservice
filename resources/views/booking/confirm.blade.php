<!--
    Booking Confirmation View
    @author Cynthia Dewi 
    @version 05/08/2018
 -->

@extends('layout.master')



@section('content')
    <div class="contentall">
        <div class="container">
        <span>
        <h1>Your appointment has been booked</h1><br/>
            Booking Details:<br/>
            {{$days[date($booked->day)]}} {{date_format(date_create($booked->start_time), 'm/d')}}<br/>
            {{$venue->address}} {{$venue->postcode}} {{date_format(date_create($booked->start_time), 'g:i A')}}-{{date_format(date_create($booked->end_time), 'g:i A')}}<br/><br/>
            <h4>Do you want to add this appointment to google calendar?</h4>
        </span>
        <form method='POST' action='/booking/confirmation/{{$booked->id}}'>
            {{ csrf_field() }}
            <button type="submit" class="btn btn-success" name="confirm" value="{{$booked->id}}">Add to Calendar</button>
            <a href="/home" class="btn btn-success"> No Thanks </a>
        </form>
        </div>
    </div>
@endsection