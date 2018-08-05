<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    /*
        Reply Model
        @library: https://github.com/connor11528/laravel-forum/blob/cc3d14914202428c564c6915081f985f466d4652/app/Reply.php
    */
    protected $guarded = [];

    public function owner()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
}
