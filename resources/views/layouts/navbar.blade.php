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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    {{-- izitoast --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <style>
        .nav-link.activet {
            background-color: white;
            /* Warna latar belakang saat aktif */
            color: orange !important;
            /* Warna teks saat aktif */
        }

        .nav-link.activet:hover {
            background-color: white;
            /* Warna latar belakang saat dihover */
            color: white !important;
            /* Warna teks saat dihover */
        }


        .asy {

            background-image: url("/dist/img/ttpe.jpg");
            background-size: cover;
        }

        h1,
        h2 {
            font-family: 'Dancing Script', cursive;
        }
    </style>
    <style>
        .text-orange {
        color: #F7941E;
        }
        .offcanvas {
            max-width: 300px;
        }
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

        .t {
            font-family: 'Dancing Script';
            color: white;
            margin-bottom: 80px;
            margin-left: 40px;
        }

        .t:hover {
            color: white
        }

        @media(max-width:992px) {
            aside {
                display: none;
            }
        }
    </style>
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
</head>
<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="HummacookLogo" height="60"
                width="60">
        </div>

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4"
            style="width: 260px; background-color: #F7941E; border-bottom-right-radius: 30px; border-top-right-radius: 30px;">
            <!-- Brand Logo -->
            <div class="mt-3">
                <a class=" t" href="{{ route('home') }}" style="font-size: 40px;">Hummacook</a>
            </div>
            {{-- <h3 class="text-white text-center my-2 mt-4 t" style="font-size: 40px; ">Hummacook</h3> --}}
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        {{-- style="overflow-y: auto; overflow-x: hidden" --}} data-accordion="false">
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('admin.index') }}"
                                class="nav-link mx-4  {{ request()->routeIs('admin.index') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="25" viewBox="0 0 36 36">
                                    <path fill="currentColor"
                                        d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z"
                                        class="clr-i-outline clr-i-outline-path-1" />
                                    <path fill="currentColor"
                                        d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z"
                                        class="clr-i-outline clr-i-outline-path-2" />
                                    <path fill="none" d="M0 0h36v36H0z" />
                                </svg>
                                <p
                                    style="margin-left: 10px;   font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Dashboard
                                </p>
                            </a>
                        </li>
                        @if (Auth::user()->isSuperUser === 'admin_laporan')
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('Report.index') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/laporan-pengguna') ? 'activet text-orange' : 'text-white' }} {{ request()->is('admin/keluhan') ? 'activet text-orange' : 'text-white' }} {{ request()->is('admin/komentar') ? 'activet text-orange' : 'text-white' }} {{ request()->is('admin/profil') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25"
                                        height="25" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M20.565 3.18a.809.809 0 0 0-.81-.02l-1.13.56c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.41v-.96a.5.5 0 0 0-1 0v16.88a.5.5 0 0 0 1 0V15.9a.836.836 0 0 0 .2-.08l1.03-.55a8.163 8.163 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.3.07l1.44-.72a.759.759 0 0 0 .4-.66V3.82a.751.751 0 0 0-.37-.64Zm-.63 10.16l-1.31.66c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.4V5.65L5.3 4.99a8.122 8.122 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.29.08l.85-.43Z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                        Laporan
                                        @if (\App\Models\Report::all()->isNotEmpty())
                                            <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif

                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isSuperUser === 'admin_informasi_web')
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('special-days.index') }}"
                                    class="nav-link  mx-4 {{ request()->is('admin/special-days') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="25" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V3q0-.425.288-.713T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.713T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Zm7 6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                        Hari Khusus
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('kategori-makanan.index') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/kategori-makanan') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="25" viewBox="0 0 14 14">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M12.5 9.75v-.5a5.5 5.5 0 0 0-11 0v.5m12 0H.5l.32 1.07a2 2 0 0 0 1.92 1.43h8.52a2 2 0 0 0 1.92-1.43Zm-6.5-6v-2" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                        Kategori
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em"">
                                <a href="{{ route('footer.index') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/footer') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M5 18.08V19h.92l9.06-9.06l-.92-.92z"
                                            opacity=".3" />
                                        <path fill="currentColor"
                                            d="M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83zM3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06l.92.92L5.92 19z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Footer
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isSuperUser === 'admin_keuangan')
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('admin.tawaran') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/tawaran') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M14.005 2.003a8 8 0 0 1 3.292 15.293A8 8 0 1 1 6.711 6.71a8.003 8.003 0 0 1 7.294-4.707Zm-4 6a6 6 0 1 0 0 12a6 6 0 0 0 0-12Zm1 1v1h2v2h-4a.5.5 0 0 0-.09.992l.09.008h2a2.5 2.5 0 0 1 0 5v1h-2v-1h-2v-2h4a.5.5 0 0 0 .09-.992l-.09-.008h-2a2.5 2.5 0 0 1 0-5v-1h2Zm3-5A5.985 5.985 0 0 0 9.52 6.016a8 8 0 0 1 8.47 8.471a6 6 0 0 0-3.986-10.484Z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Tawaran
                                    </p>
                                </a>
                            </li>
                        @endif

                        @if (Auth::user()->isSuperUser === 'admin_laporan')
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('blocked.user.status') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/blocked-user') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M13.45 10.55ZM10.6 13.4ZM12 20q1.275 0 2.45-.388t2.2-1.112q-1.025-.725-2.2-1.113T12 17q-1.275 0-2.45.388T7.35 18.5q1.025.725 2.2 1.113T12 20Zm2.65-8.2l-1.425-1.425q.125-.2.2-.425t.075-.45q0-.625-.438-1.063T12 8q-.225 0-.45.075t-.425.2L9.7 6.85q.475-.425 1.063-.638T12 6q1.45 0 2.475 1.025T15.5 9.5q0 .65-.213 1.238T14.65 11.8Zm5.7 5.7l-1.45-1.45q.55-.925.825-1.95T20 12q0-3.35-2.325-5.675T12 4q-1.075 0-2.1.275T7.95 5.1L6.5 3.65q1.225-.8 2.625-1.225T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 1.475-.425 2.875T20.35 17.5ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-1.475.413-2.875t1.212-2.65L.675 3.5L2.1 2.075l19.8 19.8l-1.425 1.425L5.1 7.95q-.55.925-.825 1.95T4 12q0 1.425.475 2.725T5.85 17.1q1.35-1.025 2.912-1.563T12 15q.95 0 1.9.2t1.85.55l3.325 3.325q-1.425 1.425-3.25 2.175T12 22Z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Diblokir
                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isSuperUser === 'admin_approval')
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('admin.verifed') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/verifed') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="27"
                                        height="27" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="m21.1 12.5l1.4 1.41l-6.53 6.59L12.5 17l1.4-1.41l2.07 2.08l5.13-5.17M10 17l3 3H3v-2c0-2.21 3.58-4 8-4l1.89.11L10 17m1-13a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4Z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Verifed
                                        @if ($verifed_count > 0)
                                            <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="12"height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('admin.kursus') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/kursus') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                        viewBox="0 0 20 20">
                                        <path fill="currentColor"
                                            d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z" />
                                    </svg>
                                    <p
                                        style="margin-left: 15px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Kursus
                                        @if (\App\Models\kursus::where('status', 'ditunggu')->count() > 0)
                                            <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="12"height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('admin.datakoki') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/data-koki') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="ml-auto" width="29"
                                        height="29" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2s-2 .849-2 2s.848 2 2 2z" />
                                        <path fill="currentColor"
                                            d="M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14l-16-.011V6l16 .011V18z" />
                                        <path fill="currentColor"
                                            d="M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z" />
                                    </svg>
                                    <p
                                        style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Data Koki
                                        @if (\App\Models\dataPribadiKoki::where('status', 'diproses')->count() > 0)
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif

                                    </p>
                                </a>
                            </li>
                        @endif
                        @if (Auth::user()->isSuperUser === 'admin_keuangan')
                            <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                                <a href="{{ route('admin.ajuanpenarikan') }}"
                                    class="nav-link mx-4 {{ request()->is('admin/ajuan-penarikan') ? 'activet text-orange' : 'text-white' }}"
                                    style="width: 12em">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                        viewBox="0 0 34 34">
                                        <path fill="currentColor"
                                            d="M17 4v1.19a3.076 3.076 0 0 0-1.674 1.464a2.925 2.925 0 0 0-.264 1.946a3.061 3.061 0 0 0 1.268 1.883c.48.325 1.055.517 1.67.517c.142 0 .276.027.396.076a.961.961 0 0 1 .528.528c.049.12.076.254.076.396a.976.976 0 0 1-.604.924c-.12.049-.254.076-.396.076c-.142 0-.276-.027-.396-.076a.961.961 0 0 1-.528-.528A1.044 1.044 0 0 1 17 12h-2a2.944 2.944 0 0 0 .857 2.076a3.062 3.062 0 0 0 1.143.735V16h2v-1.19c1.16-.42 2-1.52 2-2.81c0-1.435-1.041-2.655-2.4-2.938A2.94 2.94 0 0 0 18 9c-.142 0-.276-.027-.396-.076a.96.96 0 0 1-.528-.528A1.044 1.044 0 0 1 17 8c0-.143.027-.276.076-.396a.961.961 0 0 1 .211-.317A.996.996 0 0 1 18 7c.57 0 1 .43 1 1h2a2.944 2.944 0 0 0-.148-.924A3.046 3.046 0 0 0 19 5.19V4h-2zm-6.484 14a6.428 6.428 0 0 0-1.817.266l-.02.007l-5.671 2.176l1.984 5.57l4.93-1.89l7.137 3.93l12.324-5.106l-.766-1.844l-11.437 4.735l-7.102-3.91l-3.89 1.488l-.641-1.805l3.797-1.457c.009-.004.476-.16 1.172-.16c.703 0 1.522.156 2.222.79l.014.007l.004.004c1.03.895 1.808 1.52 2.89 1.86c1.082.34 2.31.378 4.36.37l-.01-2c-2.012.008-3.063-.063-3.75-.281c-.688-.211-1.176-.59-2.168-1.45l-.012-.007c-1.157-1.039-2.531-1.297-3.55-1.293z" />
                                    </svg>
                                    <p
                                        style="margin-left: 5px; font-size: 20px; font-family: Poppins; font-weight: 500; margin-bottom: -50px;">
                                        Penarikan
                                        @if (\App\Models\penarikans::where('status', 'diproses')->count() > 0)
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg"
                                                width="10" height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </p>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <nav class="navbar navbar-dark" style="background-color:white;box-shadow:0px 0px 3px black">
            <div class="container-fluid d-flex justify-between">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                    data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar"
                    aria-label="Toggle navigation">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 2048 2048">
                        <path fill="#888888"
                            d="M512 1536v-128h1536v128H512zm0-1152h1536v128H512V384zm0 640V896h1536v128H512z" />
                    </svg>
                </button>
                <div class="offcanvas offcanvas-start"
                    style="background-color: #F7941E;border-top-right-radius:15px;border-bottom-right-radius:15px;"
                    tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                    <div class="offcanvas-header d-flex justify-content-between">
                        <a class="offcanvas-title" style="color: white;" href="{{ route('home') }}">
                            <h1>Hummacook</h1>
                        </a>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                            aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                            <li class="nav-item {{ request()->is('admin/dashboard') ? 'bg-white' : '' }}"
                                style="border-radius:5px;">
                                <a class="nav-link {{ request()->is('admin/dashboard') ? 'active' : 'text-white' }} p-3"
                                    aria-current="page" href="{{ route('admin.index') }}">
                                    <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="25" viewBox="0 0 36 36" class="{{ request()->is('admin/dashboard') ? 'text-orange' : 'text-white' }}">
                                        <path fill="currentColor"
                                            d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z"
                                            class="clr-i-outline clr-i-outline-path-1" />
                                        <path fill="currentColor"
                                            d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z"
                                            class="clr-i-outline clr-i-outline-path-2" />
                                        <path fill="none" d="M0 0h36v36H0z" />
                                    </svg>
                                    <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/dashboard') ? 'text-orange' : 'text-white' }}">Dashboard</span>
                                </a>
                            </li>
                            @if (Auth::user()->isSuperUser === 'admin_laporan')
                                <li class="nav-item {{ request()->is('admin/laporan-pengguna') ? 'bg-white' : '' }}"
                                    style="border-radius:5px;">
                                    <a href="{{ route('Report.index') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/laporan-pengguna') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('admin/laporan-pengguna') ? 'text-orange' : 'text-white' }}"
                                            width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M20.565 3.18a.809.809 0 0 0-.81-.02l-1.13.56c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.41v-.96a.5.5 0 0 0-1 0v16.88a.5.5 0 0 0 1 0V15.9a.836.836 0 0 0 .2-.08l1.03-.55a8.163 8.163 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.3.07l1.44-.72a.759.759 0 0 0 .4-.66V3.82a.751.751 0 0 0-.37-.64Zm-.63 10.16l-1.31.66c-1.63.87-3.82.83-6.5-.13a9.141 9.141 0 0 0-7.3.52l-.76.4V5.65L5.3 4.99a8.122 8.122 0 0 1 6.5-.46c2.95 1.06 5.41 1.08 7.29.08l.85-.43Z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/laporan-pengguna') ? 'text-orange' : 'text-white' }}">Laporan</span>
                                        @if (\App\Models\Report::all()->isNotEmpty())
                                            <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('admin/blocked-user') ? 'bg-white' : '' }}"
                                    style="border-radius:5px">
                                    <a href="{{ route('blocked.user.status') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/blocked-user') ? 'activ text-orange' : 'text-white' }} p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="{{ request()->is('admin/blocked-user') ? 'text-orange' : 'text-white' }}"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M13.45 10.55ZM10.6 13.4ZM12 20q1.275 0 2.45-.388t2.2-1.112q-1.025-.725-2.2-1.113T12 17q-1.275 0-2.45.388T7.35 18.5q1.025.725 2.2 1.113T12 20Zm2.65-8.2l-1.425-1.425q.125-.2.2-.425t.075-.45q0-.625-.438-1.063T12 8q-.225 0-.45.075t-.425.2L9.7 6.85q.475-.425 1.063-.638T12 6q1.45 0 2.475 1.025T15.5 9.5q0 .65-.213 1.238T14.65 11.8Zm5.7 5.7l-1.45-1.45q.55-.925.825-1.95T20 12q0-3.35-2.325-5.675T12 4q-1.075 0-2.1.275T7.95 5.1L6.5 3.65q1.225-.8 2.625-1.225T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 1.475-.425 2.875T20.35 17.5ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-1.475.413-2.875t1.212-2.65L.675 3.5L2.1 2.075l19.8 19.8l-1.425 1.425L5.1 7.95q-.55.925-.825 1.95T4 12q0 1.425.475 2.725T5.85 17.1q1.35-1.025 2.912-1.563T12 15q.95 0 1.9.2t1.85.55l3.325 3.325q-1.425 1.425-3.25 2.175T12 22Z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/blocked-user') ? 'text-orange' : 'text-white' }}">Diblokir</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->isSuperUser === 'admin_informasi_web')
                                <li class="nav-item {{ request()->is('admin/special-days') ? 'bg-white' : '' }}"
                                    style="border-radius:5px;">
                                    <a href="{{ route('special-days.index') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/special-days') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('admin/special-days') ? 'text-orange' : 'text-white' }}"
                                            width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M5 22q-.825 0-1.413-.588T3 20V6q0-.825.588-1.413T5 4h1V3q0-.425.288-.713T7 2q.425 0 .713.288T8 3v1h8V3q0-.425.288-.713T17 2q.425 0 .713.288T18 3v1h1q.825 0 1.413.588T21 6v14q0 .825-.588 1.413T19 22H5Zm0-2h14V10H5v10ZM5 8h14V6H5v2Zm0 0V6v2Zm7 6q-.425 0-.713-.288T11 13q0-.425.288-.713T12 12q.425 0 .713.288T13 13q0 .425-.288.713T12 14Zm-4 0q-.425 0-.713-.288T7 13q0-.425.288-.713T8 12q.425 0 .713.288T9 13q0 .425-.288.713T8 14Zm8 0q-.425 0-.713-.288T15 13q0-.425.288-.713T16 12q.425 0 .713.288T17 13q0 .425-.288.713T16 14Zm-4 4q-.425 0-.713-.288T11 17q0-.425.288-.713T12 16q.425 0 .713.288T13 17q0 .425-.288.713T12 18Zm-4 0q-.425 0-.713-.288T7 17q0-.425.288-.713T8 16q.425 0 .713.288T9 17q0 .425-.288.713T8 18Zm8 0q-.425 0-.713-.288T15 17q0-.425.288-.713T16 16q.425 0 .713.288T17 17q0 .425-.288.713T16 18Z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/special-days') ? 'text-orange' : 'text-white' }}" >Hari Khusus</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('admin/kategori-makanan') ? 'bg-white' : '' }}"
                                    style="border-radius:5px;">
                                    <a href="{{ route('kategori-makanan.index') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/kategori-makanan') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" class="{{ request()->is('admin/kategori-makanan') ? 'text-orange' : 'text-white' }}"
                                            width="25" height="25" viewBox="0 0 14 14">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M12.5 9.75v-.5a5.5 5.5 0 0 0-11 0v.5m12 0H.5l.32 1.07a2 2 0 0 0 1.92 1.43h8.52a2 2 0 0 0 1.92-1.43Zm-6.5-6v-2" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/kategori-makanan') ? 'text-orange' : 'text-white' }}">Kategori</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('admin/footer') ? 'bg-white' : '' }} "
                                    style="border-radius:5px">
                                    <a href="{{ route('footer.index') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/footer') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="{{ request()->is('admin/footer') ? 'text-orange' : 'text-white' }}"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M5 18.08V19h.92l9.06-9.06l-.92-.92z"
                                                opacity=".3" />
                                            <path fill="currentColor"
                                                d="M20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83l3.75 3.75l1.83-1.83zM3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06l.92.92L5.92 19z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/footer') ? 'text-orange' : 'text-white' }}" >Footer</span>
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->isSuperUser === 'admin_keuangan')
                                <li class="nav-item {{ request()->is('admin/tawaran') ? 'bg-white' : '' }}"
                                    style="border-radius:5px;">
                                    <a href="{{ route('admin.tawaran') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/tawaran') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="{{ request()->is('admin/tawaran') ? 'text-orange' : 'text-white' }}"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M14.005 2.003a8 8 0 0 1 3.292 15.293A8 8 0 1 1 6.711 6.71a8.003 8.003 0 0 1 7.294-4.707Zm-4 6a6 6 0 1 0 0 12a6 6 0 0 0 0-12Zm1 1v1h2v2h-4a.5.5 0 0 0-.09.992l.09.008h2a2.5 2.5 0 0 1 0 5v1h-2v-1h-2v-2h4a.5.5 0 0 0 .09-.992l-.09-.008h-2a2.5 2.5 0 0 1 0-5v-1h2Zm3-5A5.985 5.985 0 0 0 9.52 6.016a8 8 0 0 1 8.47 8.471a6 6 0 0 0-3.986-10.484Z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/tawaran') ? 'text-orange' : 'text-white' }}">Tawaran</span>
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('admin/ajuan-penarikan') ? 'bg-white' : '' }}"
                                    style="border-radius:5px">
                                    <a href="{{ route('admin.ajuanpenarikan') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/ajuan-penarikan') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" class="{{ request()->is('admin/ajuan-penarikan') ? 'text-orange' : 'text-white' }}"
                                            viewBox="0 0 34 34">
                                            <path fill="currentColor"
                                                d="M17 4v1.19a3.076 3.076 0 0 0-1.674 1.464a2.925 2.925 0 0 0-.264 1.946a3.061 3.061 0 0 0 1.268 1.883c.48.325 1.055.517 1.67.517c.142 0 .276.027.396.076a.961.961 0 0 1 .528.528c.049.12.076.254.076.396a.976.976 0 0 1-.604.924c-.12.049-.254.076-.396.076c-.142 0-.276-.027-.396-.076a.961.961 0 0 1-.528-.528A1.044 1.044 0 0 1 17 12h-2a2.944 2.944 0 0 0 .857 2.076a3.062 3.062 0 0 0 1.143.735V16h2v-1.19c1.16-.42 2-1.52 2-2.81c0-1.435-1.041-2.655-2.4-2.938A2.94 2.94 0 0 0 18 9c-.142 0-.276-.027-.396-.076a.96.96 0 0 1-.528-.528A1.044 1.044 0 0 1 17 8c0-.143.027-.276.076-.396a.961.961 0 0 1 .211-.317A.996.996 0 0 1 18 7c.57 0 1 .43 1 1h2a2.944 2.944 0 0 0-.148-.924A3.046 3.046 0 0 0 19 5.19V4h-2zm-6.484 14a6.428 6.428 0 0 0-1.817.266l-.02.007l-5.671 2.176l1.984 5.57l4.93-1.89l7.137 3.93l12.324-5.106l-.766-1.844l-11.437 4.735l-7.102-3.91l-3.89 1.488l-.641-1.805l3.797-1.457c.009-.004.476-.16 1.172-.16c.703 0 1.522.156 2.222.79l.014.007l.004.004c1.03.895 1.808 1.52 2.89 1.86c1.082.34 2.31.378 4.36.37l-.01-2c-2.012.008-3.063-.063-3.75-.281c-.688-.211-1.176-.59-2.168-1.45l-.012-.007c-1.157-1.039-2.531-1.297-3.55-1.293z" />
                                        </svg>

                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/ajuan-penarikan') ? 'text-orange' : 'text-white' }}" >Penarikan</span>
                                        @if (\App\Models\penarikans::where('status', 'diproses')->count() > 0)
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg"
                                                width="10" height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                            @endif
                            @if (Auth::user()->isSuperUser === 'admin_approval')
                                <li class="nav-item {{ request()->is('admin/verifed') ? 'bg-white' : '' }}"
                                    style="border-radius:5px;">
                                    <a class="nav-link  {{ request()->is('admin/verifed') ? 'active text-orange' : 'text-white' }} p-3"
                                        aria-current="page" href="{{ route('admin.verifed') }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" class="mb-1 {{ request()->is('admin/verifed') ? 'text-orange' : 'text-white' }}"
                                            height="27" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="m21.1 12.5l1.4 1.41l-6.53 6.59L12.5 17l1.4-1.41l2.07 2.08l5.13-5.17M10 17l3 3H3v-2c0-2.21 3.58-4 8-4l1.89.11L10 17m1-13a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4Z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/verifed') ? 'text-orange' : 'text-white' }}">Verifed</span>
                                        @if ($verifed_count > 0)
                                            <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="12"height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('admin/kursus') ? 'bg-white' : '' }}"
                                    style="border-radius:5px">
                                    <a href="{{ route('admin.kursus') }}" aria-current="page"
                                        class="nav-link {{ request()->is('admin/kursus') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" class="{{ request()->is('admin/kursus') ? 'text-orange' : 'text-white' }}"
                                            viewBox="0 0 20 20">
                                            <path fill="currentColor"
                                                d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/kursus') ? 'text-orange' : 'text-white' }}">Kursus</span>
                                        @if (\App\Models\kursus::where('status', 'ditunggu')->count() > 0)
                                            <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="12"height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif
                                    </a>
                                </li>
                                <li class="nav-item {{ request()->is('admin/data-koki') ? 'bg-white' : '' }}"
                                    style="border-radius:5px;">
                                    <a href="{{ route('admin.datakoki') }}"
                                        class="nav-link {{ request()->is('admin/data-koki') ? 'active text-orange' : 'text-white' }} p-3">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="29" class="ml-auto {{ request()->is('admin/data-koki') ? 'text-orange' : 'text-white' }}"
                                            height="29" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M9.715 12c1.151 0 2-.849 2-2s-.849-2-2-2s-2 .849-2 2s.848 2 2 2z" />
                                            <path fill="currentColor"
                                                d="M20 4H4c-1.103 0-2 .841-2 1.875v12.25C2 19.159 2.897 20 4 20h16c1.103 0 2-.841 2-1.875V5.875C22 4.841 21.103 4 20 4zm0 14l-16-.011V6l16 .011V18z" />
                                            <path fill="currentColor"
                                                d="M14 9h4v2h-4zm1 4h3v2h-3zm-1.57 2.536c0-1.374-1.676-2.786-3.715-2.786S6 14.162 6 15.536V16h7.43v-.464z" />
                                        </svg>
                                        <span style="font-family: Poppins; font-weight: 500;" class="{{ request()->is('admin/data-koki') ? 'text-orange' : 'text-white' }}">Data koki</span>
                                        @if (\App\Models\dataPribadiKoki::where('status', 'diproses')->count() > 0)
                                            <svg class="text-danger" xmlns="http://www.w3.org/2000/svg"
                                                width="12" height="12" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                                            </svg>
                                        @endif

                                    </a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="btn-group dropstart">
                    <i class="fa-solid fa-circle-user fa-3x" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false"></i>
                    <ul class="dropdown-menu mt-5" style="margin-right: -30px;width:255px;">
                        <li>
                            <a href="#" style="color: black;">
                                @if (Auth::user()->foto)
                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                        src="{{ asset('storage/' . Auth::user()->foto) }}" alt="profile image"
                                        width="40px" height="40px">
                                @else
                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                        src="{{ asset('images/default.jpg') }}" alt="profile image"
                                        style="max-width:40px">
                                @endif
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a class=" mx-3" href="/admin/dashboard" style="color: black;">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="25"
                                    height="25" viewBox="0 0 36 36" class="me-2">
                                    <path fill="currentColor"
                                        d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z"
                                        class="clr-i-outline clr-i-outline-path-1" />
                                    <path fill="currentColor"
                                        d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z"
                                        class="clr-i-outline clr-i-outline-path-2" />
                                    <path fill="none" d="M0 0h36v36H0z" />
                                </svg>
                                Dashboard
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li><a class=" mx-3" href="{{ route('actionlogout') }}" style="color: black;">
                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                    <path fill="currentColor"
                                        d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z" />
                                </svg> Keluar
                            </a>
                        </li>
                        <div class="dropdown-divider"></div>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="content-wrapper" style="background-color:white;">
            <div class="container">
                <div class="">
                    @yield('konten')
                </div>
            </div>
        </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous">
    </script>
</body>
</html>
