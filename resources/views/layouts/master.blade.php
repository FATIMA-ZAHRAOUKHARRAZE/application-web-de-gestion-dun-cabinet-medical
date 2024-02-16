<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!---calendrier--->
  <link rel="stylesheet" href="{{asset('plugins/fullcalendar/main.css')}}">
  <!---boostrapt--->
  <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
  <!---loader--->
  <link rel="stylesheet" href="{{asset('css/loader.css')}}">
  <!---boostrapt pour les tableaux--->
  <link rel="stylesheet" href="{{asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- IonIcons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('css/master.css')}}">
</head>
<body class="hold-transition sidebar-mini">
  <div class="loader">
    <img src="{{asset('img/loader-bleu.gif')}}" alt="Loading..." />
  </div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button">
          <i class="fas fa-bars"></i></a>
    </ul>
    <ul class="navbar-nav ml-auto">
      <div class="nav-item">
        <a  class="nav-link">
            <img class="rounded-circle me-lg-2" src="{{url('img/avatar.jpeg')}}" alt="" style="width: 40px; height: 40px;">
            <span class="d-none d-lg-inline-flex">{{Auth::user()->nom}}</span>
        </a>
    </div>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4"style="height: 950px">
    <a  class="brand-link">
      <img src="{{url('img/master.png')}}"  class="brand-image img-circle" style="opacity: .8">
      <p style="text-align: center"> CABINET DOCTEUR<br>CHATTI KAWTAR</p>
    </a>
    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="{{url('/dashboard')}}" class="nav-link">
                <i class="fa-solid fa-chart-line"></i>
                <p>Dashboard</p>
              </a>
            </li>
            @if (Auth()->check() && Auth()->user()->role->nom_role==='secretaire')
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa-solid fa-calendar-days"></i>
                    <p>
                      Rendez-Vous
                    </p>
                </a>
                <ul class="nav nav-treeview">
                 
                  <li class="nav-item">
                    <a href="{{url('rendezvous')}}" class="nav-link">
                      <i class="fa-solid fa-list"></i>
                      <p>Tous</p>
                    </a>
                  </li>
                  
                  <li class="nav-item">
                    <a href="{{url('rendezvous/aujourdhui')}}" class="nav-link">
                      <i class="fa-solid fa-list"></i>
                      <p>Aujourd'hui</p>
                    </a>
                  </li>
                  
                </ul>
                @endif
            </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fa-solid fa-person"></i>
                    <p>
                      Patient  
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('patient')}}" class="nav-link">
                        <i class="fa-solid fa-list"></i>
                        <p>Liste</p>
                      </a>
                    </li>
                    @if (Auth()->check() && Auth()->user()->role->nom_role==='secretaire')
                    <li class="nav-item">
                      <a href="{{url('patient/ajouter')}}" class="nav-link">
                        <i class="fa-solid fa-user-plus"></i>
                        <p>Ajouter</p>
                      </a>
                    </li>
                    @endif
                  </ul>
                </li>  
              @if (Auth()->check() && Auth()->user()->role->nom_role==='medecin')
              <li class="nav-item">
                  <a href="#" class="nav-link">
                      <i class="fa-solid fa-person"></i>
                    <p>
                      Utilisateur  
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="{{url('user')}}" class="nav-link">
                        <i class="fa-solid fa-list"></i>
                        <p>Liste</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="{{url('register')}}" class="nav-link">
                        <i class="fa-solid fa-user-plus"></i>
                        <p>Ajouter Utilisateur</p>
                      </a>
                    </li>
                  </ul>
              </li>
              @endif
              @if (Auth()->check() && Auth()->user()->role->nom_role==='secretaire')
              <li class="nav-item">
                <a href="{{url('calendrier')}}" class="nav-link">
                  <i class="fa-sharp fa-solid fa-calendar"></i>
                  <p>Planning</p>
                </a>
              </li>
              @endif
              <li class="nav-item">
                <a href="{{url('password/reset')}}" class="nav-link">
                  <i class="fa-solid fa-key"></i>
                  <p>Modifier Mot De Passe</p>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"
                         onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();" data-target="#logoutModal">
                          <i class="fa-solid fa-right-from-bracket"></i>
                          <p>Deconnecter</p>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                          @csrf
                      </form>
                </a>
              </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
<!-- Main content -->
<section class="content">
<main class="py-4">
    @yield('content')
</main>
</section>
                <!-- /.d-flex -->
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
  <footer class="main-footer">
    <strong> Copyright&copy; 2023.Cabinet Docteur CHATTI KAWTAR</strong>
  </footer>
</div>
<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<script> 
$(document).ready(function() {
   $(".loader").fadeOut(200);
});
</script>
<script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
<!---datatable-->
<script src="{{asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!---chartJs-->
<script src="{{asset('/plugins/chart.js/Chart.min.js')}}"></script>
<!---javascript--->
<script src="{{asset('js/demo.js')}}"></script>
<script src="{{asset('js/master.js')}}"></script>
<!---fullcalendar--->
<script src="{{asset('plugins/fullcalendar/main.js')}}"></script>
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
</body>
</html>