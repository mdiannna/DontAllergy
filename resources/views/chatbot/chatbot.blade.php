
<?php  
  $month = \Carbon\Carbon::now()->month;
  if($month == 1 || $month == 2 || $month == 12) {
    $currentSeason = 'Winter';
  }
  if($month == 3 || $month == 4 || $month == 5) {
    $currentSeason = 'Spring';
  }
  if($month == 6 || $month == 7 || $month == 8) {
    $currentSeason = 'Summer';
  }
  if($month == 9 || $month == 10 || $month == 11) {
    $currentSeason = 'Fall';
  }
  $currentSeasonId = 'App\Models\Season'::where('name', $currentSeason)->first()->id; 
?>

<!DOCTYPE html>
<html lang="en">


  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name') }} - Welcome</title>
	  <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('source/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="{{ asset('source/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

  </head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Don't allergy me!</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            @if(!Auth::check())
              
            
            <li class="nav-item">

              <a class="nav-link js-scroll-trigger" href="#about">
                <i class="fa fa-check"></i>
              About</a>
            </li>
            <li class="nav-item">

              <a class="nav-link js-scroll-trigger" href="#team">
                <i class="fa fa-users"></i>

              Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">
                <i class="fa fa-envelope"></i>
              Contact</a>
            </li>

            <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/register">
                <i class="fa fa-user"></i>
                Register</a>
              </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/login">
                <i class="fa fa-sign-in"></i>

              Log in</a>
            </li>
            @endif

            @if(Auth::check())
            <li class="nav-item">
              <a class="nav-link" href="/admin/dashboard">
              <i class="fa fa-list"></i>
              Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/forum">
              <i class="fa fa-edit"></i>
              Forum</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/my-allergies">
              @if(Auth::user()->allergies->pluck('season_id')->unique()->contains($currentSeasonId))
                <i class="fa fa-exclamation-triangle" style="color:red"></i>
              @else 
                <i class="fa fa-question"></i>
              @endif
              My allergies

              </a>

            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/all-statistics">
              <i class="fa fa-bar-chart"></i>
              All statistics</a>
            </li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('backpack.auth.logout') }}"><i class="fa fa-btn fa-sign-out"></i> {{ trans('backpack::base.logout') }}</a></li>
            @endif

          </ul>
        </div>
      </div>
    </nav>


    <section class="container">
      <h1>Chatbot</h1>


<div id="chatContainer">

    <div id="chatTopBar" class="rounded"></div>
    <div id="chatLineHolder"></div>

    <div id="chatUsers" class="rounded"></div>
    <div id="chatBottomBar" class="rounded">
        <div class="tip"></div>
<!-- 
        <form id="loginForm" method="post" action="">
            <input id="name" name="name" class="rounded" maxlength="16" />
            <input id="email" name="email" class="rounded" />
            <input type="submit" class="blueButton" value="Login" />
        </form> -->

        <form id="submitForm" method="post" action="">
            <input id="chatText" name="chatText" class="rounded" maxlength="255" />
            <input type="submit" class="blueButton" value="Submit" />
        </form>

    </div>

</div>

    </section>


    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <span class="copyright">Copyright &copy; Don't allergy me! 2018</span>
          </div>
          <div class="col-md-6">
                <a href="https://github.com/mdiannna/DontAllergy" style="color:black; ">

                  <i class="fa fa-github" style="font-size: 2rem;"></i>
            
            <span style="color:black; font-size: 1rem;"> 
&nbsp;
                  Our github link

            </span>

            </ul>
                </a>

          </div>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="{{asset('js/jqBootstrapValidation.js')}}"></script>
    <script src="{{asset('js/contact_me.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{asset('js/agency.min.js')}}"></script>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
<script src="js/jScrollPane/jquery.mousewheel.js"></script>
<script src="js/jScrollPane/jScrollPane.min.js"></script>
<script src="js/script.js"></script>
  </body>

</html>
