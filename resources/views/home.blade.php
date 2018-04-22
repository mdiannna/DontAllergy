
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
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Welcome</title>
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="{{ asset('source/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('source/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="{{ asset('css/agency.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>

    <style type="text/css">
        body {
            margin-top: 80px;
        }
    </style>
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

<div class="container">
    <h1>Forum</h1>
    <div class="section">
    <div class="card mb-4">
        <form id="post-form" action="{{ route('user.post.save') }}" method="post">
            @csrf
            <div class="card-header">
                <input type="text" name="title" class="form-control" placeholder="Post title">
                <span class="invalid-feedback">
                    <strong></strong>
                </span>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <textarea name="description" id="" class="form-control" rows="3" placeholder="Post description"></textarea>
                    <span class="invalid-feedback">
                        <strong></strong>
                    </span>
                </div>
                <div class="row">
                    <div class="col text-right">
                        <button type="submit" id="post-something" class="btn btn-primary">Post something</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    @foreach ($posts as $post)
        <div class="card mb-4">
            <div class="card-header">
                <div class="row justify-content-between">
                    <div class="col">Title: {{ $post->title }}</div>
                    <div class="col-auto text-secondary text-right">
                        {{ $post->user->full_name }} |
                        {{ $post->updated_at }}
                        @if (auth()->user()->id == $post->user->id)
                           | <i data-post="{{ $post->id }}" class="fa fa-times delete-post"></i>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                {{ $post->description }}
            </div>
        </div>
    @endforeach
    </div>
</div>
</body>