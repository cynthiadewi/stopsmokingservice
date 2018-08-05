<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;
use App\Thread;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    /*
        Reply controller
        @author Cynthia Dewi 
        @version 02/08/2018
        @library https://github.com/connor11528/laravel-forum/blob/cc3d14914202428c564c6915081f985f466d4652/app/Http/Controllers/ReplyController.php
     */
	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function store(Thread $thread)
    {
        $thread->addReply([
        	'body' => request('body'),
        	'user_id' => auth()->id()
        ]);
        return back();
    }
}
