<!--
    Home view
    @author Cynthia Dewi 
    @version 04/08/2018
    @library https://medium.com/employbl/test-driven-development-tdd-in-laravel-b5a2bf9ab65b
 -->

@extends('layout.master')
@section('js')
<script type="text/javascript" src="{{ URL::asset('js/clickshow.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="panel-heading"><br/><h1>Forum Threads<h1></div>
    <div class='row'>
        <div class="col-md-8 col-md-offset-2">
        <br/>
        @if(auth()->check())
        <button type='button' class='btn btn-success' onclick='showemail()'>Create New Thread</button>
            <div id='showclick' style='display: none;'>
            <form method='POST' action='/newthread'>
                {{ csrf_field() }}
                <div class='form-group'>
                    <br/><textarea name='title' id='title' class='form-control' placeholder='New Thread Title' rows='1'></textarea>
                </div>
                <div class='form-group'>
                    <textarea name='body' id='body' class='form-control' placeholder='Write Here...' rows='5'></textarea>
                </div>
                <div class="form-group">
			        <select class="custom-select" name="select" onchange="yesnoCheck(this);">
                        <option selected>Choose Group:</option>
                        <option value=''>No Group (Public)</option>
                        <?php 
                            $user = Auth::user()->id;
                            $mygroupmembership = \DB::table('members')->select('*')->where('user_id', '=', $user)->get();
                            foreach($mygroupmembership as $member){
                            $mygroups = \DB::table('groups')->select('*')->where('id', '=', $member->group_id)->get();
                            foreach($mygroups as $mygroup){
                                echo '<option value="'.$mygroup->id.'">'.$mygroup->name.'</option>';
                            };};
                            echo '<option value="other">Create New Group</option>';
                        ?>
                        </select>
                </div>
                <div id="ifYes" style="display: none;">
                    <div class='form-group'>
                        <textarea name='newgroup' id='newgroup' class='form-control' placeholder='Your New Group Name...' rows='1'></textarea>
                    </div>
                </div>
                <button type='submit' class='btn btn-success'>Post</button><br/><br/>
            </form>
            </div>
        @else
            <p>Please <a href='{{ route("login") }}'>log in</a> to create a new thread.
        @endif
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 <div class="panel-body">
                    @if(auth()->check())
                    <div class="panel-heading"><br/><h1>Your Group Threads<h1></div>
                    <?php
                        $user = Auth::user()->id;
                        $mygroups = \DB::table('members')->select('*')->where('user_id', '=', $user)->get();
                        if($mygroups->count() == 0){
                            echo '<span>You have no group threads.</span>';
                        }
                        else {
                            foreach($threads as $thread){
                                if($thread->group_id == !null){
                                    $group = $thread->group_id;
                                    $groupusers = \DB::table('members')->select('*')->where('group_id', '=', $group)->get();
                                    foreach($groupusers as $users){
                                        if($users->user_id == $user){
                                            echo "<article>
                                            <a href='/threads/".$thread->id."'><h4>". $thread->title ."</h4></a>
                                            <div class='body'>".$thread->body."</div>
                                            </article>
                                            <hr>";
                                    };
                                    };
                                };
                            };
                        };
                    ?>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                 <div class="panel-body">
                     <div class="panel-heading"><br/><h1>Public Threads<h1></div>
                    @foreach($threads as $thread)
                        @if($thread->group_id == null)
                        <article>
                        <a href='/threads/{{$thread->id}}'><h4>{{ $thread->title }}</h4></a>
                            <div class='body'>
                                {{ $thread->body }}
                            </div>
                        </article>
                        <hr>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection