<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HummaCook</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        .nav-link.activet {
          background-color: #f39c12;
            color: #fff;
        }

        .nav-link.hover {
            background-color: #f0f0f0;
            color: #333;
        }

        .asy{

            background-image: url("/dist/img/ttpe.jpg");
          background-size: cover;
          }

h1,
h2
 {
  font-family: 'Dancing Script', cursive;
}

</style>
<style>
      .cascading-right {
        margin-right: -50px;
      }

      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
      .font-a{
        font-family:'Dancing Script', cursive;
      }
    </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand bg-dark">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars" style="color: #f0f0f0"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown" >
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user " style="color: #f0f0f0"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user mr-2"></i>admin
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('actionlogout')}}" class="dropdown-item">
                            <i class="fas fa-arrow-left mr-2"></i>Log Out
                        </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt" style="color: #f0f0f0"></i>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{route('admin.index')}}" class="brand-link">
                <img src="/dist/img/admin4.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-light text-white fw-bold font-a " >HummaCook</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/dist/img/admin.jpg" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block text-yellow">Admin</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link {{ request()->routeIs('dashboard') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-tachometer-alt"></i>
                                <p>
                                    Dashboard
                                </p>
                            </a>
                        </li>

                        </li>
                        <li class="nav-item">
                            <a href="{{route('kategori_seputardapur.index')}}" class="nav-link {{ request()->is('admin/kategori_seputardapur') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                            Kategori Seputar Dapur

                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/kategori-bahan" class="nav-link {{ request()->is('admin/kategori-bahan') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                            Kategori Bahan

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/kategori-tipsdasar" class="nav-link {{ request()->is('admin/kategori-tipsdasar') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                            Kategori Tips Dasar

                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('SpecialDays.index')}}" class="nav-link {{ request()->is('specialday') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                   Hari Khusus
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('BasicTips.index')}}" class="nav-link {{ request()->is('specialday') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                    Tips Dasar
                                </p>
                            </a>
                            
                        </li>
                        <li class="nav-item">
                            <a href="{{route('seputar_dapur.index')}}" class="nav-link {{ request()->is('seputar_dapur') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                   Seputar Dapur
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="/admin/edit-tentang" class="nav-link {{ request()->is('admin/edit-tentang') ? 'activet' : '' }}">
                                <i class="nav-icon fas fa-address-book"></i>
                                <p>
                                   Edit About
                                </p>
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
                @yield('konten')
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="/plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="/plugins/moment/moment.min.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/dist/js/pages/dashboard.js"></script>
    <script src="/https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
     <script src="path_to_jquery.min.js"></script>
     <script src="path_to_moment.min.js"></script>
     <script src="path_to_fullcalendar.min.js"></script>

    <script>
    document.addEventListener('calendar', function() {
      var calendarEl = document.getElementById('calendar'); // ID kalender
      var calendar = new FullCalendar.Calendar(calendarEl, {
        // Konfigurasi kalender
        // ...
      });
      calendar.render();
    });
    </script>
</body>

</html>
