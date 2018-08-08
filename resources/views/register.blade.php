<!--
    Register blade
    @author Cynthia Dewi 
    @version 26/07/2018
    @library https://www.tutorialrepublic.com
 -->
 @extends('layout.master')
 @section('styles')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection
@section('content')

<div class="login-register-form">
    <form action="/register" method="post">
    {{ csrf_field() }}
		<h2>Register</h2>
        <p class="hint-text">Create your account. It's free and only takes a minute.</p>
        <div class="form-group">
            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First Name" required="required">
            <?php echo $errors->first('firstname'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last Name" required="required">
            <?php echo $errors->first('lastname'); ?>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required="required">
            <?php echo $errors->first('email'); ?>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" name="phone" id="phone" placeholder="Phone Number" required="required">
            <?php echo $errors->first('phone'); ?>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required="required">
            <?php echo $errors->first('password'); ?>
        </div>
		<div class="form-group">
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Confirm Password" required="required">
            <?php echo $errors->first('password_confirmation'); ?>
        </div>        
        <div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" required="required"> I accept the <a href="#">Terms of Use</a> &amp; <a href="#">Privacy Policy</a></label>
		</div>
		<div class="form-group">
            <button type="submit" class="btn btn-success btn-lg btn-block">Register Now</button>
        </div>
    </form>
	<div class="text-center">Already have an account? <a href="/login">Log in</a></div>
</div>


@endsection

