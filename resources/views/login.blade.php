<!--
    Login blade
    @author Cynthia Dewi 
    @version 26/07/2018
    @library https://www.tutorialrepublic.com
 -->
 @extends('layout.master')

@section('content')
<div class="login-register-form">
    <form action="/login" method="post">
    {{ csrf_field() }}
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="required">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Log in</button>
        </div>
        <?php echo $errors->first('message'); ?>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="/register">Create an Account</a></p>
</div>
@endsection




