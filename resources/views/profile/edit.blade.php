<!--
    Edit Profile View
    @author Cynthia Dewi 
    @version 05/08/2018
    @library https://bootsnipp.com/snippets/featured/simple-user-profile
 -->

@extends('layout.master')
@section('styles')
<link rel="stylesheet" href="{{ asset('css/profile.css') }}">
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
                <form method='POST' action='/profile/edit/{{$user->id}}'>
                {{ csrf_field() }}
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>First Name</td>
                        <td><div class="form-group">
                            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="New First Name">
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Last Name</td>
                        <td><div class="form-group">
                            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="New Last Name">
                            </div>
                        </td>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="New Email">
                            </div>
                        </td>
                      </tr>
                        <td>Phone Number</td>
                        <td><div class="form-group">
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="New Phone Number">
                            </div>
                        </td>
                      </tr>
                     </tbody>
                  </table>
                    <div class="buttons-inline">
                        <button type="submit" class="btn btn-success">Save Changes</button>
                        <br/><br/>
                        <a href="/profile" class="btn btn-success"> Back </a>
                    </div>
                </div>
            </div>
            </div>            
        </div>
        </div>
    </div>
</div>
@endsection