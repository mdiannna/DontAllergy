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
              <a class="nav-link js-scroll-trigger" href="/admin/dashboard">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/my-allergies">My allergies</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/my-statistics">My statistics</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/all-statistics">All statistics</a>
            </li>
            @endif

          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <!-- <div class="intro-lead-in">Welcome To Our World!</div> -->
          <div class="intro-heading text-uppercase">Don't Allergy Me! </div>
          <div class="intro-lead-in">"Alone we can do so little - together we can do so much!"
          </div>
          <a id="tellMeMore" class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#about">Tell Me More</a>
        </div>
      </div>
    </header>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About</h2>
            <h3 class="section-subheading text-muted">We keep you up to date with everything about allergies.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/images3.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">We will notify you about seasonal allergies</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">It is so important to be informed, especially when it comes to your health. That's why we thought it would be a great help if we notified you about the allergy from certain time periods.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/images5.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">We will advise you on preventing allergies</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">We know how important your health is to you and your family and that's why we thought you might be helpful, giving you some information about the allergies!</p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/images8.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">We will advise you on the treatment and/or medication for certain allergies</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Along the way, when it comes to health, we need to call a specialist, but sometimes it may be difficult to find one at any time. The solutions we offer will probably help you, but do not hesitate to ask for a specialist's advice when you have the opportunity!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/images7.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">You can add allergies and share them at the level of a social network or group level</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Allergies are very common in the world, so you will be a great help to us, as well as those around you, if you introduce into our database allergies that are not yet found here. By sharing information with others we can find faster remedies for allergies!</p>
                  </div>
                </div>
              </li>
			  <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="img/about/images9.jpg" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4 class="subheading">You can view certain statistics of interest</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Our statistics will help you form an overview of allergies, especially of the regions and the times they are more prevalent!</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Don't
                    <br>Allergy
                    <br>Me!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Team -->
    <section class="bg-light" id="team">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Our Amazing Team</h2>
            <h3 class="section-subheading text-muted">All things are possible when you have wonderful people with you!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/gabi.jpg" alt="">
              <h4>Robert Gabriel Stanciu</h4>
			  <p class="text-muted">Back-end</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/irina.jpg" alt="">
              <h4>Irina Gutanu</h4>
			  <p class="text-muted">Front-end</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/diana.jpg" alt="">
              <h4>Diana Marusic</h4>
			  <p class="text-muted">Back-end</p>
            </div>
          </div>
		   <div class="col-sm-3">
            <div class="team-member">
              <img class="mx-auto rounded-circle" src="img/team/naomi.jpg" alt="">
              <h4>Naomi Alexandra Halip</h4>
			  <p class="text-muted">Front-end</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 mx-auto text-center">
            <p class="large text-muted">We are the <b>Codeleign</b> team and we are eager to help you!</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Contact Us</h2>
            <h3 class="section-subheading text-muted">We are always ready to answer your questions!</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" id="name" type="text" placeholder="Your Name *" required data-validation-required-message="Please enter your name.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="email" type="email" placeholder="Your Email *" required data-validation-required-message="Please enter your email address.">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required data-validation-required-message="Please enter your phone number.">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <textarea class="form-control" id="message" placeholder="Your Message *" required data-validation-required-message="Please enter a message."></textarea>
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                  <button id="sendMessageButton" class="btn btn-primary btn-xl text-uppercase" type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div>
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

  </body>

</html>
