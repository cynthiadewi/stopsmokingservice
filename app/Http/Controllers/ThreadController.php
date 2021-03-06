<?php

namespace App\Http\Controllers;

use App\Thread;
use App\Group;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    /*
        Thread controller
        @author Cynthia Dewi 
        @version 02/08/2018
        @library https://medium.com/employbl/build-an-online-forum-with-laravel-initial-setup-and-seeding-part-1-a53138d1fffc
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $threads = Thread::latest()->get();
        return view('threads.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Thread $thread)
    {
        $validator = $this->validate(request(), [
            'title' => 'required',
            'body' => 'required',
         ]);
         if ($_POST['select'] === '') {
            $_POST['select'] = null;
        }
         $user = auth()->id();
        $groupid = $_POST['select'];
        if($_POST['select'] == "other"){
           $groupname = $_POST['newgroup'];
           $group = \DB::table('groups')->where('name', '=', $groupname)->first();
           if($group == null){
           \DB::table('groups')->insert(['name' => $groupname]);
           $group = \DB::table('groups')->where('name', '=', $groupname)->first();
           $groupid = $group->id;
           \DB::table('members')->insert(['user_id'=> auth()->id(), 'group_id' => $groupid]);
           }
           else {
               echo "<script type='text/javascript'>alert('Group name already exist, please choose another name.');</script>";
               return back();
           };
        }
        else{
            $groupid = $_POST['select'];
        };
        $data = new Thread;
        $data->user_id = $user;
        $data->group_id = $groupid;
        $data->title = $_POST['title'];
        $data->body = $_POST['body'];

        if($data->save()){
        return redirect()->to($thread->path() . $data->id);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function show(Thread $thread)
    {
        $group = \DB::table('groups')->select('*')->where('id', '=', $thread->group_id)->first();
        $groupusers = \DB::table('members')->select('*')->where([['group_id', '=', $thread->group_id],['user_id', '=', auth()->id()]])->get();
        return view('threads.show', compact('thread','group','groupusers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Thread $thread)
    {
        if (isset($_POST['addmember'])) {
            $newmemberemail = $_POST['newmember'];
            $newmember = \DB::table('users')->where('email', '=',$newmemberemail)->first();
            \DB::table('members')->insert(['user_id' => $newmember->id, 'group_id' => $thread->group_id]);
            echo "<script type='text/javascript'>alert('Member added!');</script>";
        } elseif(isset($_POST['removeme'])) {
            \DB::table('members')->where([['user_id','=',auth()->id()],['group_id','=',$thread->group_id]])->delete();
            $members = \DB::table('members')->where('group_id','=',$thread->group_id)->get();
            if($thread->group_id == !null && count($members)==0){
                $thread->delete();
                $group = \DB::table('groups')->where('id','=',$thread->group_id)->delete();
                return redirect()->to('/threads');;
            };
            echo "<script type='text/javascript'>alert('You left the group');</script>";
        } elseif(isset($_POST['deleteThread'])) {
            \DB::table('threads')->where([['user_id','=',auth()->id()],['id','=',$thread->id]])->delete();
            echo "<script type='text/javascript'>confirm('You deleted the thread');</script>";
            return redirect()->to('/threads');;
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function destroy(Thread $thread)
    {
        //
    }
}
