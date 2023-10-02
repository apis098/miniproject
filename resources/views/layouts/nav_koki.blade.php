<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HummaCook</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
         <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <style>
         .nav-link.activet {
        background-color: white; /* Warna latar belakang saat aktif */
        color: orange !important; /* Warna teks saat aktif */
    }

    .nav-link.activet:hover {
        background-color: white; /* Warna latar belakang saat dihover */
        color: white !important; /* Warna teks saat dihover */
    }


        .asy {

            background-image: url("/dist/img/ttpe.jpg");
            background-size: cover;
        }

        h1,
        h2{
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

        .font-a {
            font-family: 'Dancing Script', cursive;
        }

        .t{
            font-family: 'Dancing Script';
            color: white;
            margin-bottom: 80px;
            margin-left: 40px;
        }

        .t:hover{
            color: white
        }
    </style>


</head>

<body class="hold-transition sidebar-mini layout-fixed">
  

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60">
        </div>



        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4" style="width: 260px; background-color: #F7941E; border-bottom-right-radius: 30px; border-top-right-radius: 30px">
            <!-- Brand Logo -->
            <div class="mt-3">
            <a class=" t" href="{{route('home')}}" style="font-size: 40px;">Hummacook</a>
        </div>
            {{-- <h3 class="text-white text-center my-2 mt-4 t" style="font-size: 40px; ">Hummacook</h3> --}}
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em"  >
                            <a href="{{ route('koki.beranda') }}"
                                class="nav-link mx-4  {{ request()->routeIs('koki.beranda') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 36"><path fill="currentColor" d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                <p  style="margin-left: 10px;   font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.feed')}}"
                                class="nav-link mx-4 {{ request()->is('koki/feed') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg  style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M20.565 3.18a.809.809 0 0 0-.81-.02l-1.13.56c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.41v-.96a.5.5 0 0 0-1 0v16.88a.5.5 0 0 0 1 0V15.9a.836.836 0 0 0 .2-.08l1.03-.55a8.163 8.163 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.3.07l1.44-.72a.759.759 0 0 0 .4-.66V3.82a.751.751 0 0 0-.37-.64Zm-.63 10.16l-1.31.66c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.4V5.65L5.3 4.99a8.122 8.122 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.29.08l.85-.43Z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Feed
                                </p>
                            </a>
                        </li>

                    {{--
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em"">
                            <a href="{{ route('ReplyUser.index') }}"
                                class="nav-link mx-4 {{ request()->is('admin/reply-complaint') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1zm12 12a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v4a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm6-5V8a2 2 0 0 0-2-2h-6l3 3m0-6l-3 3M3 13v3a2 2 0 0 0 2 2h6l-3-3m0 6l3-3"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Balasan
                                </p>
                            </a>
                        </li> --}}
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        {{-- <div class="content-"> --}}
        <!-- Content Wrapper. Contains page content -->
            <!-- Main content -->
            <div class="content-wrapper" style="background-color: white">
                @yield('konten')
            </div>
            <!-- /.content -->
        
        <!-- /.content-wrapper -->

        <!-- /.control-sidebar -->
    {{-- </div> --}}
    <!-- ./wrapper -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>

</html>

