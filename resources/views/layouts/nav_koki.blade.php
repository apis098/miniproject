<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HummaCook</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        {{-- izitoast css --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
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
<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

</head>

<body class="hold-transition sidebar-mini layout-fixed">

    <script>
        @if(session('error'))
            iziToast.error({
                title: 'Gagal',
                message: '{{ session('error') }}',
                position: 'topCenter'
            });
        @endif
    </script>
    <script>
        @if(session('success'))
            iziToast.success({
                title: 'Sukses',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @endif
    </script>
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
                                class="nav-link mx-3  {{ request()->routeIs('koki.beranda') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path fill="currentColor" d="m221.56 100.85l-79.95-75.47l-.16-.15a19.93 19.93 0 0 0-26.91 0l-.17.15l-79.93 75.47a20.07 20.07 0 0 0-6.44 14.7V208a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-44h24v44a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-92.45a20.07 20.07 0 0 0-6.44-14.7ZM204 204h-40v-44a20 20 0 0 0-20-20h-32a20 20 0 0 0-20 20v44H52v-86.72l76-71.75l76 71.75Z"/></svg>
                                <p  style="margin-left: 10px;   font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.feed')}}"
                                class="nav-link mx-3 {{ request()->is('koki/feed') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                <svg  style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 20 20"><path fill="currentColor" d="M0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm6 0v12h8V4H6zM2 5v2h2V5H2zm0 4v2h2V9H2zm0 4v2h2v-2H2zm14-8v2h2V5h-2zm0 4v2h2V9h-2zm0 4v2h2v-2h-2zM8 7l5 3l-5 3V7z"/></svg>
                                <p  style="margin-left: 15px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                 Feed
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.recipe')}}"
                                class="nav-link mx-3 {{ request()->is('koki/views-recipe') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M7 3h0a6.5 6.5 0 0 1 6.5 6.5v0a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1v0A6.5 6.5 0 0 1 7 3Zm0 0V1.5m-6.5 11h13"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Resep
                                </p>
                            </a>
                        </li>


                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.kursus')}}"
                                class="nav-link mx-3 {{ request()->is('koki/kursus') ? 'activet text-orange' : 'text-white' }} {{ request()->is('koki/kursus-content') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                 <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20"><path fill="currentColor" d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z"/></svg>
                                <p  style="margin-left: 18px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Kursus
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.profilage')}}"
                                class="nav-link mx-3 {{ request()->is('koki/profilage') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                               <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z"/></svg>
                                <p  style="margin-left: 12px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Profil
                                </p>
                            </a>
                        </li>

                        {{-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.favorite')}}"
                                class="nav-link mx-3 {{ request()->is('koki/favorite') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m11 13.5l-4-4l-4 4v-12a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1Z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Favorit
                                </p>
                            </a>
                        </li> --}}

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.income')}}"
                                class="nav-link mx-3 {{ request()->is('koki/income-koki') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10.02v1.01m0-6.02v.94m0 7.54c3.5 0 6-1.24 6-4c0-3-1.5-5-4.5-6.5l1.18-1.52a.66.66 0 0 0-.56-1H4.88a.66.66 0 0 0-.56 1L5.5 3C2.5 4.51 1 6.51 1 9.51c0 2.74 2.5 3.98 6 3.98Z"/><path d="M6 9.56A1.24 1.24 0 0 0 7 10a1.12 1.12 0 0 0 1.19-1A1.12 1.12 0 0 0 7 8a1.12 1.12 0 0 1-1.19-1A1.11 1.11 0 0 1 7 6a1.26 1.26 0 0 1 1 .4"/></g></svg>
                                <p  style="margin-left: 12px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Penghasilan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.diskusi')}}"
                                class="nav-link mx-3 {{ request()->is('koki/diskusi') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20"><path fill="currentColor" d="m10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z"/></svg>
                                <p  style="margin-left: 12px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Diskusi
                                </p >
                            </a>
                        </li>

                    {{--
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em"">
                            <a href="{{ route('ReplyUser.index') }}"
                                class="nav-link mx-4 {{ request()->is('admin/reply-complaint') ? 'activet text-orange' : 'text-white' }}" style="width:13em">
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
    {{-- izitoast script --}}
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
    integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

