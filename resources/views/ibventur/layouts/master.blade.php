<!DOCTYPE html>
<html>

<head>
  <title> Sell Your Business </title>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <link rel="icon" type="image/x-icon" href="https://www.ibventur.es/img/favicon.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="fontawesome/css/all.min.css">
  <link rel="stylesheet" href="aos/aos.css">
  <link rel="stylesheet" href="css/custom.css">

</head>

<body data-aos-easing="ease-in-out" data-aos-duration="1000" data-aos-delay="0">
  <section id="header" class="container">
    <nav id="topnav" class="navbar navbar-expand-lg navbar-light p-0">
      <a class="navbar-brand" href="/ibventur"><img src="https://www.ibventur.es/img/ibv.png" alt="IBV"></a>
      <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbar-01">
        <ul class="navbar-nav mx-auto px-2 dl-menu">
          <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="#" class="nav-link">We</a></li>
          <li class="nav-item"><a href="#" class="nav-link">What we are looking for</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Sell your Business</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Hunters</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>
        </ul>

      </div>
    </nav>

  </section>
  <section id="content">
    @yield('content')
  </section>
  <section id="footer" class="padding">
    <div class="container">
      <div class="row">
        <div class="col-md-3 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
            <div class="col-sm-12">
              <img src="https://www.ibventur.es/img/ibv.png" alt="IBV" />
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <p>We invest to generate long-term value, with no intention of selling.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-12">
              <div class="widgets-social">
                <a href="https://www.linkedin.com/company/iberian-ventures" target="_blank"><i class="fab fa-linkedin-in"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-2 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
          <div class="row">
            <div class="col-sm-12">
              <h4 class="foot-title">About Us</h4>
              <ul class="foot_nav">
                <li><a href="#">Home</a></li>
                <li><a href="#">We</a></li>
                <li><a href="#">What we are looking for</a></li>
                <li><a href="#">Sell your Business</a></li>
                <li><a href="#">Hunters</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-md-7 aos-init aos-animate" data-aos="fade-up" data-aos-delay="600">
          <div class="row">
            <div class="col-sm-12">
              <h4 class="foot-title">Contact us</h4>
              <ul class="foot_nav">
                <li><i class="fa fa-map-marker" aria-hidden="true"></i> Downtown Madrid, Spain</li>
                <li><a href="mailto:hello@ibventur.es"><i class="fa fa-envelope" aria-hidden="true"></i> hello@ibventur.es</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <footer class="footer-section align-center">
      <div class="container">
         <p>Copyright ©
            <script>
               var d = new Date();
               document.write(d.getFullYear());
            </script>
            2022 By Iberian Ventures.</p>
      </div>
    </footer>
  </section>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="fontawesome/js/all.min.js"></script>
  <script src="aos/aos.js"></script>
</body>

</html>