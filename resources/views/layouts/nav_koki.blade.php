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
                                <svg  style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20"><path fill="currentColor" d="M0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm6 0v12h8V4H6zM2 5v2h2V5H2zm0 4v2h2V9H2zm0 4v2h2v-2H2zm14-8v2h2V5h-2zm0 4v2h2V9h-2zm0 4v2h2v-2h-2zM8 7l5 3l-5 3V7z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Feed
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.recipe')}}"
                                class="nav-link mx-4 {{ request()->is('koki/views-recipe') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="text-align: center;" width="28" height="28" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M18.7096 19.7673L19.3475 20.3037L19.99 19.7729L20.9756 18.9587L26.3434 23.3733C26.3441 23.3738 26.3448 23.3744 26.3455 23.375C26.7284 23.692 27.199 23.8261 27.6316 23.8261C28.0679 23.8261 28.54 23.6901 28.9234 23.3717C29.314 23.0474 29.5545 22.5771 29.553 22.0606C29.5514 21.5444 29.3086 21.076 28.9178 20.754L28.917 20.7534L21.1921 14.4009L20.8033 14.0812L21.1717 13.7985C22.7062 14.0927 24.6891 13.9887 26.2877 12.6828C27.3635 11.8045 28.1687 10.6174 28.4997 9.41915C28.8293 8.22594 28.7182 6.82997 27.6308 5.88974L27.6201 5.88056L27.6093 5.87169C26.5741 5.02624 25.0583 4.9676 23.7508 5.21533C22.3966 5.47192 20.9705 6.10641 19.8906 7.02338C18.3892 8.25467 18.197 9.94651 18.4963 11.2879L17.8908 11.7881L17.2357 11.2436L10.1132 5.32326L9.48768 4.80334L8.85125 5.30982C7.85676 6.10125 7.30292 7.1995 7.28977 8.35168C7.27662 9.50299 7.80456 10.6111 8.78186 11.4201L13.149 15.0939L13.5157 15.4024L7.03457 20.7563C6.64391 21.079 6.40135 21.5481 6.40135 22.0652C6.40135 22.5823 6.64391 23.0514 7.03457 23.3741C7.41629 23.6894 7.88591 23.8261 8.32263 23.8261C8.34555 23.8261 8.38508 23.8258 8.42929 23.8226C8.4506 23.821 8.49131 23.8175 8.54077 23.8088C8.56603 23.8043 8.60454 23.7965 8.65029 23.7831C8.69138 23.7711 8.76904 23.7458 8.85813 23.6961C8.93657 23.6524 9.11168 23.5419 9.23914 23.3205C9.30763 23.2015 9.3573 23.0582 9.36964 22.8979C9.37085 22.8822 9.37168 22.8667 9.37214 22.8513L16.1725 17.634L17.0093 18.3377L18.7096 19.7673ZM34 1V27.1522H5.52632C4.31824 27.1522 3.18835 27.4847 2.33291 28.0884C1.73076 28.5133 1.23941 29.0966 1 29.7979V4.56522C1 2.77006 2.84357 1 5.52632 1H34Z" stroke="white" stroke-width="2"/>
                                    </svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Resep
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.profilage')}}"
                                class="nav-link mx-4 {{ request()->is('koki/profilage') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                               <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Profil
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.income')}}"
                                class="nav-link mx-4 {{ request()->is('koki/income-koki') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><path d="M7 10.02v1.01m0-6.02v.94m0 7.54c3.5 0 6-1.24 6-4c0-3-1.5-5-4.5-6.5l1.18-1.52a.66.66 0 0 0-.56-1H4.88a.66.66 0 0 0-.56 1L5.5 3C2.5 4.51 1 6.51 1 9.51c0 2.74 2.5 3.98 6 3.98Z"/><path d="M6 9.56A1.24 1.24 0 0 0 7 10a1.12 1.12 0 0 0 1.19-1A1.12 1.12 0 0 0 7 8a1.12 1.12 0 0 1-1.19-1A1.11 1.11 0 0 1 7 6a1.26 1.26 0 0 1 1 .4"/></g></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Penghasilan
                                </p>
                            </a>
                        </li>

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{route('koki.komentar')}}"
                                class="nav-link mx-4 {{ request()->is('koki/komentar') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20"><path fill="currentColor" d="m10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                Komentar
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

