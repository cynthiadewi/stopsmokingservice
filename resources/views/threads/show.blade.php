<!--
    Home view
    @author Cynthia Dewi 
    @version 02/08/2018
    @library https://medium.com/employbl/test-driven-development-tdd-in-laravel-b5a2bf9ab65b
 -->

@extends('layout.master')
@section('js')
<script type="text/javascript" src="{{ URL::asset('js/clickshow.js') }}"></script>
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <br/>
                <div class="panel-heading"><h3>{{ $thread->title }}</h3>
                </div>
                <div class="panel-body">
                    {{ $thread->body }}
                    <hr/>
                </div>
                <form method='POST' action='{{ $thread->path() . '/member' }}'>
                    {{ csrf_field() }}
                    <?php
                        $group = $thread->group_id;
                        $groupusers = \DB::table('members')->select('*')->where([['group_id', '=', $group],['user_id', '=', auth()->id()]])->get();
                        if($groupusers->count() == !0){
                            echo "<button type='button' class='btn btn-success' onclick='showemail()'>Add Member</button>
                            <div id='showclick' style='display: none;'>
                                <div class='form-group'>
                                <br/><textarea name='newmember' id='newmember' class='form-control' placeholder='Enter Email...' rows='1'></textarea>
                                    <br/><button type='submit' class='btn btn-success'>Add</button>
                                </div>
                            </div>";
                        };
                    ?>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
         @foreach($thread->replies as $reply)
            <br/>
            @include('threads.reply')
        @endforeach
         </div>
    </div>


    <div class='row'>
        <div class="col-md-8 col-md-offset-2">
        <br/>
        @if(auth()->check())
            <form method='POST' action='{{ $thread->path() . "/replies" }}'>
                {{ csrf_field() }}

                <div class='form-group'>
                    <textarea name='body' id='body' class='form-control' placeholder='Write your reply here' rows='5'></textarea>
                </div>

                <button type='submit' class='btn btn-success'>Post</button>
            </form>
        @else
            <p>Please <a href='{{ route("login") }}'>log in</a> to post a reply to this thread.
        @endif
        </div>
    </div>
</div>
@endsection