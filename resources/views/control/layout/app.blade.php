<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Alpha Construction</title>

  <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/fontawesome-free/css/all.min.css') }}">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/jqvmap/jqvmap.min.css') }}">
      {{-- Favicon --}}
   <link rel="icon" type="image/x-icon" href="{{ asset('controlpanel/dist/img/featherlogo.png') }}">
  <link rel="stylesheet" href="{{ asset('controlpanel/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/daterangepicker/daterangepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('controlpanel/plugins/summernote/summernote-bs4.min.css') }}">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $("body").tooltip({
        selector: '[data-bs-toggle=tooltip]'
      });
    });
  </script>
  <style>
    a {
      text-decoration: none;
    }
    .navhover:hover{
      color:black !important;
    }
    input::placeholder {
      text-align: center !important;
    }
    .spacing {
    margin-top: 1rem; /* Adjust the value as needed */
  }
  .active{
    background-color: #59a8c0;;
    color: #fff;
  }
   .back-color{
        background-color: #54acc9;
    }
  </style>
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light back-color">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a id="menu-toggle" class="nav-link navhover" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="btn nav-link show_update navhover" 
          >Logout</a>
        </li>
      </ul>
</nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 back-color">
       <a href="" class="brand-link">
        <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Feather Softwares</span>
      </a>
                      
      <div class="sidebar">
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <li class="nav-header">Menus</li>
               
             <li class="nav-item">
              <a href="{{ route('dashboard') }}" class="nav-link @if ($active == 'dashboard') active @endif">
                <i class="nav-icon fas fa-house-user"></i>
                <p>Dashboard</p>
              </a>
             </li>
               @if (Auth::check() && Auth::user()->role == 'admin') 
             <li class="nav-item">    
              <a href="{{ route('all_user') }}" class="nav-link @if ($active == 'list_user') active @endif">
                <i class="nav-icon fas fa-users"></i>
                <p>Users</p>
              </a>
             </li>
             @endif
             <li class="nav-item">
              <a href="{{ route('index_college') }}" class="nav-link @if ($active == 'college') active @endif">
                <i class="nav-icon fas fa-award"></i>
                <p>
                College Details
                <span class="badge badge-info right"></span>
                 </p>
              </a>
             </li>

             <li class="nav-item">
              <a href="{{ route('departments') }}" class="nav-link @if ($active == 'department') active @endif">
              <i class="nav-icon fas fa-graduation-cap"></i>
                <p>
                Department Details
                <span class="badge badge-info right"></span>
                 </p>
              </a>
            </li>
                <li class="nav-item">
              <a href="{{ route('index_registration') }}" class="nav-link @if ($active == 'registration') active @endif">
                <i class="nav-icon fas fa-registered"></i>
                <p>
               Registration
                <span class="badge badge-info right"></span>
                 </p>
              </a>
              <a href="{{ route('index_faculity') }}" class="nav-link @if ($active == 'faculity') active @endif">
                <i class="nav-icon fas fa-registered"></i>
                <p>
              Faculity Details
                <span class="badge badge-info right"></span>
                 </p>
              </a>
            </li>
          </ul>
        </nav>
      </div>

    </aside>
  
    
    @yield('content')

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark"></aside>
  </div>

  <script src="{{ asset('controlpanel/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script>
    $.widget.bridge('uibutton', $.ui.button)
  </script>
  <script src="{{ asset('controlpanel/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/chart.js/Chart.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/sparklines/sparkline.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/jqvmap/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/jquery-knob/jquery.knob.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/moment/moment.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/daterangepicker/daterangepicker.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <script src="{{ asset('controlpanel/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <script src="{{ asset('controlpanel/dist/js/adminlte.js') }}"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
  <script>
    @if (Session::has('successmessage'))
      toastr.options = {
        "closeButton": true,
      }
      toastr.success("{{ Session::get('successmessage') }}");
    @endif
    @if (Session::has('errormessage'))
      toastr.options = {
        "closeButton": true,
      }
      toastr.error("{{ Session::get('errormessage') }}");
    @endif
    @if (Session::has('infomessage'))
      toastr.options = {
        "closeButton": true,
      }
      toastr.info("{{ Session::get('infomessage') }}");
    @endif
  </script>
  @yield('script')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
  
  
 
</body>

</html>
