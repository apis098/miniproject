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
    <div class="wrapper">

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
                            <a href="{{ route('admin.index') }}"
                                class="nav-link mx-4  {{ request()->routeIs('admin.index') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 36 36"><path fill="currentColor" d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z" class="clr-i-outline clr-i-outline-path-1"/><path fill="currentColor" d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z" class="clr-i-outline clr-i-outline-path-2"/><path fill="none" d="M0 0h36v36H0z"/></svg>
                                <p  style="margin-left: 10px;   font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('Report.index') }}"
                                class="nav-link mx-4 {{ request()->is('admin/laporan-pengguna') ? 'activet text-orange' : 'text-white' }} {{ request()->is('admin/keluhan') ? 'activet text-orange' : 'text-white' }} {{ request()->is('admin/komentar') ? 'activet text-orange' : 'text-white' }} {{ request()->is('admin/profil') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg  style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M20.565 3.18a.809.809 0 0 0-.81-.02l-1.13.56c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.41v-.96a.5.5 0 0 0-1 0v16.88a.5.5 0 0 0 1 0V15.9a.836.836 0 0 0 .2-.08l1.03-.55a8.163 8.163 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.3.07l1.44-.72a.759.759 0 0 0 .4-.66V3.82a.751.751 0 0 0-.37-.64Zm-.63 10.16l-1.31.66c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.4V5.65L5.3 4.99a8.122 8.122 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.29.08l.85-.43Z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Laporan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('special-days.index')}}"
                                class="nav-link  mx-4 {{ request()->is('admin/special-days') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V3q0-.425.288-.713T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.713T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Zm7 6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                               Hari Khusus
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('kategori-makanan.index')}}"
                                class="nav-link mx-4 {{ request()->is('admin/kategori-makanan') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg  style="vertical-align: top;"  xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="M12.5 9.75v-.5a5.5 5.5 0 0 0-11 0v.5m12 0H.5l.32 1.07a2 2 0 0 0 1.92 1.43h8.52a2 2 0 0 0 1.92-1.43Zm-6.5-6v-2"/></svg>
                                <p  style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                               Kategori
                                </p>
                            </a>
                        </li>
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em"">
                            <a href="{{ route('footer.index') }}"
                                class="nav-link mx-4 {{ request()->is('admin/footer') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M5 18.08V19h.92l9.06-9.06l-.92-.92z" opacity=".3"/><path fill="currentColor" d="M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83zM3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06l.92.92L5.92 19z"/></svg>
                                <p style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                    footer
                                </p>
                            </a>
                        </li>


                    <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                    <a href="{{ route('verifed') }}"
                        class="nav-link mx-4 {{ request()->is('admin/verifed') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2 20v-1a7 7 0 0 1 7-7v0"/><path d="M15.804 12.313a1.618 1.618 0 0 1 2.392 0c.325.357.79.55 1.272.527a1.618 1.618 0 0 1 1.692 1.692c-.023.481.17.947.526 1.272c.705.642.705 1.75 0 2.392c-.356.325-.549.79-.526 1.272a1.618 1.618 0 0 1-1.692 1.692a1.618 1.618 0 0 0-1.272.526a1.618 1.618 0 0 1-2.392 0a1.618 1.618 0 0 0-1.272-.526a1.618 1.618 0 0 1-1.692-1.692a1.618 1.618 0 0 0-.527-1.272a1.618 1.618 0 0 1 0-2.392c.357-.325.55-.79.527-1.272a1.618 1.618 0 0 1 1.692-1.692c.481.023.947-.17 1.272-.527Z"/><path stroke-linecap="round" stroke-linejoin="round" d="m15.364 17l1.09 1.09l2.182-2.18M9 12a4 4 0 1 0 0-8a4 4 0 0 0 0 8Z"/></g></svg>
                        <p style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                          Verified
                        </p>
                    </a>
                </li>
                <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                    <a href="{{ route('blocked.user.status') }}"
                        class="nav-link mx-4 {{ request()->is('admin/blocked-user') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20"><path fill="currentColor" d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z"/></svg>
                        <p style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                          Kursus
                        </p>
                    </a>
                </li>
                    <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                    <a href="{{ route('blocked.user.status') }}"
                        class="nav-link mx-4 {{ request()->is('admin/blocked-user') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                        <svg xmlns="http://www.w3.org/2000/svg"
                        width="25" height="25" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M14.005 2.003a8 8 0 0 1 3.292 15.293A8 8 0 1 1 6.711 6.71a8.003 8.003 0 0 1 7.294-4.707Zm-4 6a6 6 0 1 0 0 12a6 6 0 0 0 0-12Zm1 1v1h2v2h-4a.5.5 0 0 0-.09.992l.09.008h2a2.5 2.5 0 0 1 0 5v1h-2v-1h-2v-2h4a.5.5 0 0 0 .09-.992l-.09-.008h-2a2.5 2.5 0 0 1 0-5v-1h2Zm3-5A5.985 5.985 0 0 0 9.52 6.016a8 8 0 0 1 8.47 8.471a6 6 0 0 0-3.986-10.484Z" />
                    </svg>
                        <p style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                          Premium
                        </p>
                    </a>
                </li>
                    <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                    <a href="{{ route('blocked.user.status') }}"
                        class="nav-link mx-4 {{ request()->is('admin/blocked-user') ? 'activet text-orange' : 'text-white' }}" style="width: 12em">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M13.45 10.55ZM10.6 13.4ZM12 20q1.275 0 2.45-.388t2.2-1.112q-1.025-.725-2.2-1.113T12 17q-1.275 0-2.45.388T7.35 18.5q1.025.725 2.2 1.113T12 20Zm2.65-8.2l-1.425-1.425q.125-.2.2-.425t.075-.45q0-.625-.438-1.063T12 8q-.225 0-.45.075t-.425.2L9.7 6.85q.475-.425 1.063-.638T12 6q1.45 0 2.475 1.025T15.5 9.5q0 .65-.213 1.238T14.65 11.8Zm5.7 5.7l-1.45-1.45q.55-.925.825-1.95T20 12q0-3.35-2.325-5.675T12 4q-1.075 0-2.1.275T7.95 5.1L6.5 3.65q1.225-.8 2.625-1.225T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 1.475-.425 2.875T20.35 17.5ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-1.475.413-2.875t1.212-2.65L.675 3.5L2.1 2.075l19.8 19.8l-1.425 1.425L5.1 7.95q-.55.925-.825 1.95T4 12q0 1.425.475 2.725T5.85 17.1q1.35-1.025 2.912-1.563T12 15q.95 0 1.9.2t1.85.55l3.325 3.325q-1.425 1.425-3.25 2.175T12 22Z"/></svg>
                        <p style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                          Diblokir
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

        <!-- Content Wrapper. Contains page content -->
        <div class="">

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
