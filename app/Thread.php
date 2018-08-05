<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    /*
        Thread Model
        @library: https://github.com/connor11528/laravel-forum/commit/b8da096bf2bab0fbbcd18324044d104c4fcd0233
     */
    protected $guarded = [];

    public function path()
    {
    	return '/threads/' . $this->id;
    }
    public function replies()
    {
    	return $this->hasMany(Reply::class);
    }
    public function creator()
    {
    	return $this->belongsTo(User::class, 'user_id');
    }
    public function threadgroup()
    {
    	return $this->belongsTo(Group::class, 'group_id');
    }
    public function addReply($reply)
    {
        $this->replies()->create($reply); 
    }
}
