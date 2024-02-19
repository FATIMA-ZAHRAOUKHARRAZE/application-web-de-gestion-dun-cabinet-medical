<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Cabinet Docteur CHATTI KAWTAR</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
 <!-- Font Awesome Icons -->
 <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
      <!-- bootstrap -->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- animate.css -->
    <link rel="stylesheet" href="{{asset('plugins/animation/animate.min.css')}}">
    <!-- Slick Carousel -->
    <link rel="stylesheet" href="{{asset('plugins/slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('plugins/slick/slick-theme.css')}}">
    <!-- Google fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:700,800&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400&amp;display=swap">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('css/welcome.css')}}" id="theme-stylesheet">
    <link rel="shortcut icon" href="img/master.png">
  </head>
  <body>
    <!-- navbar-->
    <header class="header">
      <!-- Primary Navbar-->
      <nav class="navbar navbar-expand-lg navbar-light py-3 border-bottom border-gray bg-white">
        <div class="container d-flex align-items-center justify-content-between">
          <h5 class="text-uppercase lined lined-center">Docteur
             <span class="text-primary"> KAWTAR CHATTI </span></h5>  
          <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
          <ul class="list-inline mb-0 d-none d-lg-block">
            <li class="list-inline-item me-3">
              <div class="d-flex"><i class="far fa-clock text-muted"></i>
                <div class="ms-2">
                  <h6 class="text-muted text-uppercase mb-0 text-sm">Lundi - Vendredi: 9:00 - 18:00  </h6>
                  <p class="small text-gray mb-0">Samedi-Dimanche - FERMER</p>
                </div>
              </div>
            </li>
            <li class="list-inline-item">
              <div class="d-flex"><i class="fas fa-phone text-muted"></i>
                <div class="ms-2">
                  <h6 class="text-muted text-uppercase mb-0 text-sm">05-37-52-08-67</h6>
                  <p class="small text-gray mb-0">Telephone</p>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </nav>
      <!-- Secondary Navbar                -->
      <nav class="navbar navbar-expand-lg navbar-light py-0 shadow-sm bg-white">
        <div class="container">
          <div class="collapse navbar-collapse py-2 py-lg-0" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <!-- Link--><a class="nav-link text-uppercase letter-spacing-0" href="#service">Les Services</a>
              </li>
             <li class="nav-item">
              <!-- Link--><a class="nav-link text-uppercase letter-spacing-0" href="#horaires">Les Horaires</a>
               </li>
               <li class="nav-item">
                <!-- Link--><a class="nav-link text-uppercase letter-spacing-0" href="#contact">Contact</a>
                 </li>
            </ul>
          </div>
        </div>
      </nav>
    <!-- Hero Banner-->
      <div class="hero-slider bg-cover bg-center">
        <!-- Slider Item -->
        <div class="slider-item slide1" style="background-image:url(img/slide1.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-12">
              </div>
            </div>
          </div>
        </div>
        <!-- Slider Item -->
        <div class="slider-item" style="background-image:url(img/slide2.jpg);">
          <div class="container">
            <div class="row">
              <div class="col-12">
              </div>
            </div>
          </div>
        </div>
        <!-- Slider Item -->
        <div class="slider-item" style="background-image:url(img/slide3.jpg)">
          <div class="container">
            <div class="row">
              <div class="col-12">

              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
      <section class="about bg-wight pt-0">
        <div class="container text-center">
          <h2 class="text-uppercase lined lined-center"><span class="text-primary">BONJOUR ET BIENVENUE SUR NOTRE SITE INTERNET </span></h2>
          <p class="text-muted">Médecine Généraliste - Echographie </p>
        </div>
      </section>
    <!-- Service Section-->
    <section class="services" id="service">
      <div class="container  text-center" >
        <h2 class="text-uppercase lined lined-center">Les <span class="text-primary">Services</span></h2>
        <p class="text-muted mb-5"></p>
        <div class="row gy-4">
          <div class="col-xl-3 col-md-6 mx-auto">
            <!-- Services Item-->
                <!-- Services Item-->
                <div class="card services-item border-0">
                  <div class="card-body border-top border-2 border-primary py-4 px-4 shadow-sm">
                    <h2 class="h6 mb-0 services-item-heading">Consultation médicale</h2>
                    <div class="services-icon my-4"><i class="fa-solid fa-stethoscope fa-2x"></i></div>
                    <p class="services-item-text text-sm mb-0">est un examen d'un patient réalisé dans le cabinet d'un médecin généraliste .</p>
                    </div>
                  </div>
                </div>
          <div class="col-xl-3 col-md-6 mx-auto">
                <!-- Services Item-->
                <div class="card services-item border-0">
                  <div class="card-body border-top border-2 border-primary py-4 px-4 shadow-sm">
                    <h2 class="h6 mb-0 services-item-heading">Prise en charge des pathologies chronique</h2>
                    <div class="services-icon my-4"><i class="fas fa-user-md fa-2x"></i></div>
                    <p class="services-item-text text-sm mb-0">les maladies comme le diabète,Hypertension.</p>
                  </div>
                </div>
          </div>
          <div class="col-xl-3 col-md-6 mx-auto">
                <!-- Services Item-->
                <div class="card services-item border-0">
                  <div class="card-body border-top border-2 border-primary py-4 px-4 shadow-sm">
                    <h2 class="h6 mb-0 services-item-heading">Bilan de santé</h2>
                    <div class="services-icon my-4"><i class="fas fa-notes-medical fa-2x"></i></div>
                    
                    <p class="services-item-text text-sm mb-0">il consiste à réaliser une série d'examens afin de dépister la présence d'une affection.</p>
                  </div>
                </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Opening Hours-->
    <section class="overflow-hidden" id="horaires">
      <div class="container text-center">
        <h2 class="text-uppercase lined lined-center">Horaires <span class="text-primary">de Travail</span></h2>
        <p class="text-muted mb-5"></p>
        <div class="row align-items-center gy-5">
          <div class="col-lg-12">
            <div class="card shadow-sm border-0">
              <div class="card-body border-top border-2 border-primary py-4 px-lg-5">
                <ul class="list-unstyled mb-0">
                  <li class="d-flex align-items-center justify-content-between py-6 px-4"><strong class="h6 mb-0">Lundi </strong><span class="mb-0">9:00 am - 06:00 pm</span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4 bg-light"><strong class="h6 mb-0">Mardi </strong><span class="mb-0">9:00 am - 06:00 pm</span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4"><strong class="h6 mb-0">Mercredi </strong><span class="mb-0">9:00 am - 06:00 pm</span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4 bg-light"><strong class="h6 mb-0">Jeudi </strong><span class="mb-0">9:00 am - 06:00 pm</span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4 "><strong class="h6 mb-0">Vendredi </strong><span class="mb-0">9:00 am - 06:00 pm</span>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4 bg-light"><strong class="h6 mb-0">Samedi </strong><strong class="h6 mb-0 text-uppercase text-primary">Fermer</strong>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4 "><strong class="h6 mb-0">Dimanche </strong><strong class="h6 mb-0 text-uppercase text-primary">Fermer</strong>
                  </li>
                  <li class="d-flex align-items-center justify-content-between py-6 px-4"><strong class="h6 mb-0"> </strong><span class="mb-0"></span>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Contact Section-->
    <section class="contact py-5 bg-primary text-white" id="contact">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="d-flex align-items-center">
              <div class="contact-icon"><i class="fas fa-phone"></i></div>
              <div class="ms-3">       
                <h3 class="h5 mb-0">05-37-52-08-67</h3>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex align-items-center">
              <div class="contact-icon"><i class="far fa-envelope"></i></div>
              <div class="ms-3">       
                 <a href="mailto:dr.chattikawtar@gmail.com"><h3 class="h5 mb-0" style="color: white">dr.chattikawtar@gmail.com</h3></a>
              </div>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex align-items-center">
              <div class="contact-icon"><i class="fas fa-map-marker-alt"></i></div>
              <div class="ms-3">       
                <h3 class="h5 mb-0">Hay Nahda N114 SIDI ALLAL BAHRAOUI</h3></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <footer class="footer pt-5">
      <div class="container pt-5">
        <div class="row gy-4">
          <div class="col-lg-5">
            <h2 class="h5 text-white lined mb-4">Les Services</h2>
            <div class="d-flex">
              <ul class="list-unstyled d-inline-block me-4 mb-0">
                <li class="mb-2"><a class="footer-link" href="#!">Consultation médicale</a></li>
                <li class="mb-2"><a class="footer-link" href="#!">Prise en charge des pathologies chronique</a></li>
                <li class="mb-2"><a class="footer-link" href="#!">Bilan de santé</a></li>
                
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <h2 class="h5 text-white lined mb-4">Contact</h2>
            <p class="text-muted text-sm"><i class="fas fa-phone" aria-hidden="true"></i><span class="text-primary"> 05-37-52-08-67</span></p>
            <p class="text-muted text-sm"><i class="fas fa-map-marker-alt"></i><span class="text-primary"> Hay Nahda N114 SIDI ALLAL BAHRAOUI</span></p>
            <p class="text-muted text-sm"><i class="far fa-envelope" aria-hidden="true"></i><a href="mailto:dr.chattikawtar@gmail.com"><span class="text-primary"> dr.chattikawtar@gmail.com</span></a></p>
          </div>
        </div>
      </div>
      <div class="copyrights">       
        <div class="container text-center py-4">
          <p class="mb-0 text-muted text-sm">Copyright&copy; 2023.Cabinet Docteur CHATTI KAWTAR</p>
          <!-- If you want to remove the backlink, please purchase the Attribution-Free License. See details in readme.txt or license.txt. Thanks!-->
        </div>
      </div>
     <!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target=".header-top">
  <span class="icon fa fa-angle-up"></span>
</div>
    </footer>
    <!-- jquery -->
<script src="{{asset('plugins/jquery.min.js')}}"></script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<!-- bootstrap -->
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- Slick Slider -->
<script src="{{asset('plugins/slick/slick.min.js')}}"></script>
<script src="{{asset('plugins/slick/slick-animation.min.js')}}"></script>
    <script src="{{asset('js/front.js')}}"></script>
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  </body>
</html>