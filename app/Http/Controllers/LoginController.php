<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
        Login controller
        @author Cynthia Dewi 
        @version 26/07/2018
        @library https://vegibit.com/how-to-create-user-registration-in-laravel/
     */
    public function view()
    {
        return view('/login');
    }
    
    public function login()
    {
        if (auth()->attempt(request(['email', 'password'])) == false) {
            return back()->withErrors([
                'message' => 'The email or password is incorrect, please try again'
            ]);
        }
        
        return redirect()->to('/home');
    }
    
    public function log_out()
    {
        auth()->logout();
        
        return redirect()->to('/login');
    }
}
