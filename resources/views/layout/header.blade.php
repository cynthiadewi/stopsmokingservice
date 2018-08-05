<!--
    Header blade
    @author Cynthia Dewi 
    @version 26/07/2018
    @library https://getbootstrap.com/
 -->

 <nav class="container navbar navbar-expand-lg navbar-light" style="background-color: #ffffff;">
 <a class="navbar-brand" href="/">
<img src="{{ asset('images/sss_logo.png') }}" alt="Newcastle Stop Smoking Service Logo" style=" width:400px; border:0; margin: 0; padding:0;">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">How To Stop Smoking</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/booking">Book Appointment</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/threads">Forum</a>
      </li>
    </ul>
    <div class="navbar-nav nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Profile
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <?php 
                if(auth()->check())
                { 
                $name = \DB::table('users')->select('firstname')->where('id', '=', Auth::user()->id)->first();
                echo '<a class="dropdown-item" href="/profile">';
                echo $name->firstname;
                echo "'s Profile</a>";
                if(Auth::user()->isAdmin()){
                  echo '<a class="dropdown-item" href="/adminbook">Bookings</a>';
                };
                echo '<div class="dropdown-divider"></div>';
                echo '<a class="dropdown-item" href="/logout">Log out</a>';
                }
                else{
                echo '<a class="dropdown-item" href="/login">Log in</a>';
                echo '<a class="dropdown-item" href="/register">Register</a>';
                }
            ?>
          
        </div>
      </li>
  </div>
</nav>