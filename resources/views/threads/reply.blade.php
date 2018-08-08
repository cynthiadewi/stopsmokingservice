<!--
        Reply view
        @library https://github.com/connor11528/laravel-forum/blob/cc3d14914202428c564c6915081f985f466d4652/resources/views/threads/reply.blade.php
     -->

<div class="panel panel-default">
    <div class="panel-heading">
        <a href='#'>{{ $reply->owner->firstname }}</a> said
        {{ $reply->created_at->diffForHumans() }}...
        
    </div>
    <div class="panel-body">
        {{ $reply->body }}
        <br/>
    </div>
</div>