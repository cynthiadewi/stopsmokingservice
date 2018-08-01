<?php

namespace App\Http\Controllers;
  
 use Illuminate\Http\Request;
 use App\User;
  
 class RegistrationController extends Controller
 {
     /*
        Registration controller
        @author Cynthia Dewi 
        @version 26/07/2018
        @library https://vegibit.com/how-to-create-user-registration-in-laravel/
     */
     public function view()
     {
         return view('/register');
     }
     
     public function register()
     {
         $validator = $this->validate(request(), [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'phone' => 'required',
            'password' => 'required|confirmed',
         ]);
        
         $user = User::create(request(['firstname', 'lastname', 'email', 'phone', 'password']));
         
         auth()->login($user);
         
         return redirect()->to('/login');
         
     }
 }
