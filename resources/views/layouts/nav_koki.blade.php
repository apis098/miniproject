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
    <!-- overlay scrollbar -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <style>
        .nav-link.activet {
            background-color: white;
            /* Warna latar belakang saat aktif */
            color: orange !important;
            /* Warna teks saat aktif */
        }
        .btn-orange{
            background-color:#F7941E;
            color: #ffffff;
            border-radius:15px ;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        }
        .nav-link.activet:hover {
            background-color: white;
            /* Warna latar belakang saat dihover */
            color: white !important;
            /* Warna teks saat dihover */
        }

        .form-control:focus {
            border: #F7941E solid;
            box-shadow: none;
        }

        .asy {

            background-image: url("/dist/img/ttpe.jpg");
            background-size: cover;
        }

        .ellipsis {
        white-space: nowrap; /* Prevents text from wrapping */
        overflow: hidden; /* Hides the overflowing content */
        text-overflow: ellipsis; /* Shows an ellipsis (...) to indicate truncated text */
        width: 100px; /* Adjust this width to fit your layout */
        }

        h1,
        h2 {
            font-family: 'Dancing Script', cursive;
        }

        .scale {
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
            width: 100%;
        }

        .scale:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
        }

        .cascading-right {
            margin-right: -50px;
        }

        @media (min-width: 992px) {
            .cardTopup {
                width: 450px;
            }
        }

        @media (max-width: 991.98px) {

            .cascading-right {
                margin-right: 0;
            }

            #btnSidebar {
                display: block;
                /* Atur elemen menjadi block (muncul) */

            }
        }

        /* tampilan untuk laptop */
        @media (min-width: 1024px) and (max-width: 1366px) {

            #btnSidebar {
                display: none;
                /* Atur elemen menjadi block (muncul) */
            }
        }


        /* tampilan untuk PC yang lebih besar */
        @media (min-width: 1367px) {
            #btnSidebar {
                display: none;
                /* Atur elemen menjadi block (muncul) */
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

        .yuhu {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }

        .dropdown-item:active,
        .dropdown-item:focus {
            background: white;
        }
        .main-sidebar {
            height: 100%;
            overflow-y: hidden;
            z-index: 1038;
        }
        @media (min-width: 1000px) {
            .padding {
                padding-left: 2%;
                padding-right: 2%;
            }
        }
    </style>

    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>

</head>

<body class=" sidebar-mini layout-fixed">

    <script>
        @if (session('error'))
            iziToast.error({
                title: 'Gagal',
                message: '{{ session('error') }}',
                position: 'topCenter'
            });
            @endif
    </script>
    <script>
        @if (session('success'))
            iziToast.success({
                title: 'Sukses',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @endif
    </script>
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            {{-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="/dist/img/AdminLTELogo.png" alt="HummacookLogo" height="60"
                width="60">
        </div> --}}

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item mx-3">
                        <a id="btnSidebar" onclick="ManageSidebar()" class="nav-link" data-widget="pushmenu"
                            href="#" role="button"><i class="fas fa-xl fa-bars"></i></a>
                    </li>
                </ul>
                <div class="">
                 <h4>Selamat datang kembali {{Auth()->User()->name }}</h4>
                 <span>Saldo anda Rp {{ number_format(Auth()->User()->saldo, 2, ',', '.') }}</span>
                </div>
                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <li class="d-flex">

                        <div class="p-1 rounded-circle" style="border:1px solid white;background-color:orange;color:white;position:absolute;right:24%;">
                         <svg xmlns="http://www.w3.org/2000/svg" class="my-auto" width="28" height="28"
                                              viewBox="0 0 20 20">
                                              <g fill="currentColor">
                                                  <path fill-rule="evenodd"
                                                      d="m14.896 13.818l1.515-5.766l-2.214 1.41a2 2 0 0 1-2.74-.578L10 6.695l-1.458 2.19a2 2 0 0 1-2.74.577L3.59 8.052l1.515 5.766h9.792Zm-10.77-6.61c-.767-.489-1.736.218-1.505 1.098l1.516 5.766a1 1 0 0 0 .967.746h9.792a1 1 0 0 0 .967-.746l1.516-5.766c.23-.88-.738-1.586-1.505-1.098l-2.214 1.41a1 1 0 0 1-1.37-.288l-1.458-2.19a1 1 0 0 0-1.664 0L7.71 8.33a1 1 0 0 1-1.37.289l-2.214-1.41Z"
                                                      clip-rule="evenodd" />
                                                  <path
                                                      d="M10.944 3.945a.945.945 0 1 1-1.89.002a.945.945 0 0 1 1.89-.002ZM18.5 5.836a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Zm-15.111 0a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Z" />
                                                  <path fill-rule="evenodd"
                                                      d="M5.25 16a.5.5 0 0 1 .5-.5h8.737a.5.5 0 1 1 0 1H5.75a.5.5 0 0 1-.5-.5Z"
                                                      clip-rule="evenodd" />
                                              </g>
                                          </svg>
                        </div>
                        <div class="d-flex p-1 pl-4 pr-3 text-center" style="border:1px solid black; border-radius: 15px;border-left:none;">
                            <span class="pl-1 pr-1">{{ \Carbon\Carbon::now()->diffInDays(\Carbon\Carbon::parse(Auth()->User()->akhir_langganan)) }}</span> <span>Hari</span>
                        </div>
                    </li>
                    <!-- Messages Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link " href="/roomchat">
                            <i class="far fa-solid fa-xl fa-comment-dots"></i>
                            @if ($messageCount > 0)
                                <span style="margin-top: -10%;"
                                    class="badge badge-pill badge-danger text-light navbar-badge fw-bolder">{{ $messageCount }}</span>
                            @endif
                        </a>
                    </li>
                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <form action="{{ route('all.notifications') }}" id="notification-form" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="button" id="notification-button" class="nav-link yuhu">
                                <i class="far fa-solid fa-xl fa-bell"></i>
                                @if ($unreadNotificationCount > 0)
                                    <span id="badge" style="margin-top: -10%;"
                                        class="badge badge-danger badge-pill text-light navbar-badge fw-bolder">
                                        {{ $unreadNotificationCount }}</span>
                                @endif
                            </button>
                        </form>
                        <button hidden type="button" id="notification-button-real" class="nav-link yuhu"
                            data-toggle="dropdown">
                            <i class="far fa-solid fa-xl fa-bell"></i>
                            @if ($unreadNotificationCount > 0)
                                <span id="badge" class="badge badge-danger text-light navbar-badge fw-bolder">
                                    {{ $unreadNotificationCount }}</span>
                            @endif
                        </button>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                            <span class="dropdown-item dropdown-header">
                                {{ $unreadNotificationCount }} Notifikasi
                            </span>

                            <div class="dropdown-divider"></div>

                            <div class="row pl-4 pr-4 pb-3">
                                @foreach ($notification as $row)

                                    @if ($row->sender->id != auth()->user()->id && $row->status == 'belum')
                                        <div class="input-group mb-2 pt-2 pb-1">
                                            @if ($row->sender->foto)
                                                <a href="#">
                                                    <img class="ms-2 mt-1 me-2 rounded-circle"
                                                        src="{{ asset('storage/' . $row->sender->foto) }}"
                                                        alt="profile image" style="max-width:35px">
                                                </a>
                                            @else
                                                <a href="#">
                                                    <img class="ms-2 mt-1 me-2 rounded-circle"
                                                        src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                        style="max-width:35px">
                                                </a>
                                            @endif
                                            <span class="d-flex">
                                            <p class="text-orange ellipsis-name" style="margin-top: 7px;">
                                                {{ $row->sender->name }}</p>
                                                @if ($row->sender->isSuperUser == 'yes')
                                                    <i class="fa-regular text-primary fa-circle-check ms-2" style="margin-top: 12px;"></i>
                                                @endif
                                            </span>
                                            @if ($row->reply_id != null && $row->complaint_id != null && $row->like_id == null)
                                                <form action="{{ route('replies.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Membalas
                                                            keluhan anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->reply_id != null && $row->like_id != null)
                                                <form action="{{ route('replies.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menyukai
                                                            komentar anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->veed_id != null && $row->categories == 'like')
                                                <form action="{{ route('replies.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menyukai
                                                            postingan anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->report_kursus_id != null)
                                                <form action="{{ route('blockedKursus.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small class=" ms-1 text-secondary">Kursus
                                                            anda telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    <input type="text" hidden name="follower_id" id="follower_id"
                                                        value="{{ $row->follower_id }}" class="form-control">
                                                </form>
                                            @elseif($row->top_up_id != null)
                                                <form action="{{ route('topUp.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small
                                                            class="mt-1 ms-1 text-secondary">{{ $row->message }}</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->gift_id != null)
                                                <form action="/koki/income-koki" method="GET">
                                                    {{-- @method('PUT')
                                    @csrf --}}
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Memberi
                                                            donasi
                                                            kepada anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->reply_id_comment != null)
                                                <form action="{{ route('replies.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Membalas
                                                            komentar anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->like_comment_recipes_id != null && $row->resep_id != null)
                                                <form action="{{ route('resep.read.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menyukai
                                                            komentar anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->veed_id != null && $row->share_id != null)
                                                <form action="{{ route('share.veed.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Membagikan
                                                            video kepada anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                </form>
                                            @elseif($row->like_reply_comment_recipes_id != null && $row->resep_id != null)
                                                <form action="{{ route('resep.read.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menyukai
                                                            komentar anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->reply_comment_id != null && $row->resep_id != null)
                                                <form action="{{ route('resep.read.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Membalas
                                                            komentar anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->comment_id != null && $row->resep_id != null)
                                                <form action="{{ route('resep.read.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Mengomentari
                                                            resep anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->like_reply_id != null && $row->complaint_id != null)
                                                <form action="{{ route('replies.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menyukai
                                                            komentar anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->like_id != null && $row->resep_id != null)
                                                <form action="{{ route('resep.like.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menyukai
                                                            resep anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->follower_id == auth()->user()->id && $row->complaint_id != null)
                                                <form action="{{ route('replies.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Memiliki
                                                            kesulitan memasak</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->follower_id == auth()->user()->id && $row->resep_id != null)
                                                <form action="{{ route('resep.read.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menambahkan
                                                            resep baru</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->follower_id != null && $row->veed_Id != null && $row->categories == 'followers_shared')
                                                <form action="/status-baca/shared-feed/{{ $row->id }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Menambahkan
                                                            postingan baru</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->profile_id != null)
                                                <form action="{{ route('profile.blocked.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class="mt-1 ms-1 text-secondary">Foto
                                                            profil
                                                            kamu telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->reply_id_report != null)
                                                <form action="{{ route('blockedComent.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small class="mt-1 ms-1 text-secondary">Komentar
                                                            kamu telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->categories == 'block_comment' && $row->alasan != null)
                                                <form action="{{ route('blockedComent.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small class="mt-1 ms-1 text-secondary">Komentar
                                                            kamu telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                        <input hidden type="text" value="{{ $row->complaint_id }}"
                                                            name="replies_id" id="replies_id" class="form-control">
                                                    </button>
                                                </form>
                                            @elseif($row->veed_id_report != null)
                                                <form action="{{ route('blockedFeed.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small class="mt-1 ms-1 text-secondary">Postingan
                                                            kamu telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 mb-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                </form>
                                            @elseif($row->follower_id != null && $row->complaint_id == null && $row->resep_id == null && $row->veed_id == null)
                                                <form action="{{ route('follow.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class=" ms-1 text-secondary">Mengikuti
                                                            anda</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    <input type="text" hidden name="follower_id" id="follower_id"
                                                        value="{{ $row->follower_id }}" class="form-control">
                                                </form>
                                            @elseif($row->complaint_id_report != null)
                                                <form action="{{ route('blockedComplaint.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small class=" ms-1 text-secondary">Keluhan
                                                            anda telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    <input type="text" hidden name="follower_id" id="follower_id"
                                                        value="{{ $row->follower_id }}" class="form-control">
                                                </form>
                                            @elseif($row->resep_id_report != null)
                                                <form action="{{ route('blockedRecipes.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small class=" ms-1 text-secondary">Resep
                                                            anda telah diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    <input type="text" hidden name="follower_id" id="follower_id"
                                                        value="{{ $row->follower_id }}" class="form-control">
                                                </form>
                                            @elseif($row->random_name != null)
                                                <form action="{{ route('profile.blocked.notification', $row->id) }}"
                                                    method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small class=" ms-2 text-secondary">Username
                                                            kamu
                                                            diblokir</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    <input type="text" hidden name="follower_id" id="follower_id"
                                                        value="{{ $row->follower_id }}" class="form-control">
                                                </form>
                                            @elseif($row->categories == 'others')
                                                <form action="{{ $row->route }}" method="GET">
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small
                                                            class=" ms-2 text-secondary">{{ $row->message }}</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    <input type="text" hidden name="follower_id" id="follower_id"
                                                        value="{{ $row->follower_id }}" class="form-control">
                                                </form>
                                            @elseif($row->categories == 'kursus' && $row->alasan != null)
                                                <form action="{{ $row->route }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small
                                                            class=" ms-2 text-secondary">{{ $row->message }}</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    {{-- <input type="text" hidden
                                                name="follower_id"
                                                id="follower_id"
                                                value="{{ $row->follower_id }}"
                                                class="form-control"> --}}
                                                </form>
                                            @elseif($row->categories == 'penarikan' && $row->alasan != null)
                                                <form action="{{ $row->route }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small
                                                            class=" ms-2 text-secondary">{{ $row->message }}</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    {{-- <input type="text" hidden
                                                name="follower_id"
                                                id="follower_id"
                                                value="{{ $row->follower_id }}"
                                                class="form-control"> --}}
                                                </form>
                                            @elseif($row->categories == 'data-koki' && $row->alasan != null)
                                                <form action="{{ $row->route }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                        data-target="#modalAlasan{{ $row->id }}">
                                                        <small
                                                            class=" ms-2 text-secondary">{{ $row->message }}</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                    {{-- <input type="text" hidden
                                                name="follower_id"
                                                id="follower_id"
                                                value="{{ $row->follower_id }}"
                                                class="form-control"> --}}
                                                </form>
                                            @else
                                                <form action="{{ $row->route }}" method="POST">
                                                    @method('PUT')
                                                    @csrf
                                                    <button class="yuhu mt-2" type="submit">
                                                        <small
                                                            class=" ms-2 text-secondary">{{ $row->message }}</small>
                                                        @if ($row->status == 'belum')
                                                            <img class="ms-2 rounded-circle"
                                                                src="{{ asset('images/badge.png') }}"
                                                                alt="profile image" style="max-width:10px">
                                                        @endif
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                        <div class="dropdown-divider"></div>
                                    @endif

                                @endforeach
                                @forelse ($notification as $row)
                                @empty
                                    <div class="text-center">
                                        <img src="{{ asset('images/data.png') }}" class="col-sm-6 mt-4 mb-2"
                                            alt="...">
                                        <p><b>Tidak ada notifikasi</b></p>
                                    </div>
                                @endforelse

                            </div>
                        </div>

                    </li>


                    {{-- expand fullscreen --}}
                    <li class="nav-item">
                        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-xl fa-expand-arrows-alt"></i>
                        </a>
                    </li>

                    {{-- dropdown profile & logout --}}
                    <div class="input-group dropdown">
                        <a data-toggle="dropdown" class="" href="#">
                            @if ($userLogin->foto)
                                <img loading="lazy" class="mr-3 rounded-circle"
                                    src="{{ asset('storage/' . $userLogin->foto) }}" alt="profile image"
                                    width="40px" height="40px">
                            @else
                                <img loading="lazy" class="mr-3 rounded-circle"
                                    src="{{ asset('images/default.jpg') }}" alt="profile image"
                                    style="max-width:40px">
                            @endif
                        </a>
                        @if (auth()->user()->role === 'koki')
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3 me-5 ms-auto"
                                style="width: 255px; border-radius:13px;">
                                <div class="input-group">
                                    <a href="/koki/beranda">
                                        @if ($userLogin->foto)
                                            <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                src="{{ asset('storage/' . $userLogin->foto) }}" alt="profile image"
                                                width="40px" height="40px">
                                        @else
                                            <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                style="max-width:40px">
                                        @endif
                                    </a>
                                    <span class="d-flex">
                                    <p class="text-orange ellipsis-name" style="margin-top: 7px;"><b>{{ auth()->user()->name }}</b></p>
                                    @if ($userLogin->isSuperUser == 'yes')
                                        <i class="fa-regular text-primary fa-circle-check ms-2" style="margin-top: 12px;"></i>
                                    @endif
                                    </span>

                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="/koki/index" class="dropdown-item text-orange itemdropdown" style="width: 230px">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z" />
                                    </svg>
                                    Profil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" data-toggle="modal" data-target="#favoriteModal"
                                    style="width: 230px;" class="dropdown-item text-orange">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="21" class="me-1"
                                        height="21" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M19 3H5v18l7-3l7 3V3zm-2 15l-5-2.18L7 18V5h10v13z" />
                                    </svg>
                                    Favorite
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('penawaran.premium') }}" style="width: 230px;"
                                    class="dropdown-item text-orange">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M14.005 2.003a8 8 0 0 1 3.292 15.293A8 8 0 1 1 6.711 6.71a8.003 8.003 0 0 1 7.294-4.707Zm-4 6a6 6 0 1 0 0 12a6 6 0 0 0 0-12Zm1 1v1h2v2h-4a.5.5 0 0 0-.09.992l.09.008h2a2.5 2.5 0 0 1 0 5v1h-2v-1h-2v-2h4a.5.5 0 0 0 .09-.992l-.09-.008h-2a2.5 2.5 0 0 1 0-5v-1h2Zm3-5A5.985 5.985 0 0 0 9.52 6.016a8 8 0 0 1 8.47 8.471a6 6 0 0 0-3.986-10.484Z" />
                                    </svg>
                                    Upgrade
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" style="width: 230px;" data-bs-toggle="modal"
                                    data-bs-target="#topup" class="dropdown-item text-orange">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M196 140a16 16 0 1 1-16-16a16 16 0 0 1 16 16Zm40-32v80a32 32 0 0 1-32 32H60a32 32 0 0 1-32-32V68.92A32 32 0 0 1 60 36h132a12 12 0 0 1 0 24H60a8 8 0 0 0-8 8.26v.08A8.32 8.32 0 0 0 60.48 76H204a32 32 0 0 1 32 32Zm-24 0a8 8 0 0 0-8-8H60.48A33.72 33.72 0 0 1 52 98.92V188a8 8 0 0 0 8 8h144a8 8 0 0 0 8-8Z" />
                                    </svg>
                                    Top up
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="#" style="width: 230px;" class="dropdown-item text-orange">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8s-3.58 8-8 8zm-.22-13h-.06c-.4 0-.72.32-.72.72v4.72c0 .35.18.68.49.86l4.15 2.49c.34.2.78.1.98-.24a.71.71 0 0 0-.25-.99l-3.87-2.3V7.72c0-.4-.32-.72-.72-.72z" />
                                    </svg>
                                    Riwayat Top up
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('actionlogout') }}" style="width: 230px;"
                                    class="dropdown-item text-orange">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                        height="20" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                        <path fill="currentColor"
                                            d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z" />
                                    </svg>
                                    Keluar
                                </a>
                            </div>
                    </div>
                    {{-- admin profile --}}
                @elseif (auth()->user()->role === 'admin')
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3 me-5 ms-auto"
                        style="width: 255px; border-radius:13px;">
                        <div class="input-group">
                            <a href="#">
                                @if ($userLogin->foto)
                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                        src="{{ asset('storage/' . $userLogin->foto) }}" alt="profile image"
                                        width="40px" height="40px">
                                @else
                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                        src="{{ asset('images/default.jpg') }}" alt="profile image"
                                        style="max-width:40px">
                                @endif
                            </a>
                            <span class="d-flex">
                            <p class="text-orange ellipsis-name" style="margin-top: 7px;"><b>{{ auth()->user()->name }}</b></p>
                            @if ($userLogin->isSuperUser == 'yes')
                                <i class="fa-regular text-primary fa-circle-check ms-2" style="margin-top: 12px;"></i>
                            @endif
                            </span>

                        </div>
                        <div class="dropdown-divider">
                            <a href="/admin/dashboard" class="dropdown-item text-orange" style="width: 230px">
                                <svg style="vertical-align: top; margin-left: -5px" xmlns="http://www.w3.org/2000/svg"
                                    width="25" height="25" viewBox="0 0 36 36">
                                    <path fill="currentColor"
                                        d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z"
                                        class="clr-i-outline clr-i-outline-path-1" />
                                    <path fill="currentColor"
                                        d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z"
                                        class="clr-i-outline clr-i-outline-path-2" />
                                    <path fill="none" d="M0 0h36v36H0z" />
                                </svg>
                                &nbsp; Dashboard
                            </a>
                        </div>
                        <div class="dropdown-divider"></div>
                        <a href="{{ route('actionlogout') }}" style="width: 230px;"
                            class="dropdown-item text-orange">
                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                <path fill="currentColor"
                                    d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z" />
                            </svg>
                            Keluar
                        </a>
                        <div class="dropdown-divider"></div>
                    </div>
        </div>
    @else
        <div class="ms-5">
            <a href="{{ route('login') }}" class="btn rounded-5 text-white zoom-effects ms-5"
                style=" border-radius: 15px; border: 0.50px white solid; font-family: Poppins;"><b
                    class="me-2 ms-2">Masuk</b></a>

        </div>
        @endif

        </div>

        </div>

        </div>

        </div>

        </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->

        <aside id="sidebarContent" class="main-sidebar sidebar-dark-primary elevation-4"
            style="width: 260px; background-color: #F7941E; border-bottom-right-radius: 30px; border-top-right-radius: 30px; height: 100%;">
            <!-- Brand Logo -->
            <div class="mt-3">
                <a class=" t" href="{{ route('home') }}" style="font-size: 40px;">Hummacook</a>
            </div>
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-1">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.beranda') }}"
                                class="nav-link mx-3  {{ request()->routeIs('koki.beranda') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="m221.56 100.85l-79.95-75.47l-.16-.15a19.93 19.93 0 0 0-26.91 0l-.17.15l-79.93 75.47a20.07 20.07 0 0 0-6.44 14.7V208a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-44h24v44a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-92.45a20.07 20.07 0 0 0-6.44-14.7ZM204 204h-40v-44a20 20 0 0 0-20-20h-32a20 20 0 0 0-20 20v44H52v-86.72l76-71.75l76 71.75Z" />
                                </svg>
                                <p
                                    style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Beranda
                                </p>
                            </a>
                        </li> -->

                         <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.feed') }}"
                                class="nav-link mx-3 {{ request()->is('koki/feed') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm6 0v12h8V4H6zM2 5v2h2V5H2zm0 4v2h2V9H2zm0 4v2h2v-2H2zm14-8v2h2V5h-2zm0 4v2h2V9h-2zm0 4v2h2v-2h-2zM8 7l5 3l-5 3V7z" />
                                </svg>
                                <p style="margin-left: 15px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Feed
                                </p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.recipe') }}"
                                class="nav-link mx-3 {{ request()->is('koki/views-recipe') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 14 14">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7 3h0a6.5 6.5 0 0 1 6.5 6.5v0a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1v0A6.5 6.5 0 0 1 7 3Zm0 0V1.5m-6.5 11h13" />
                                </svg>
                                <p style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Resep
                                </p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.kursus') }}"
                                class="nav-link mx-3 {{ request()->is('koki/kursus') ? 'activet text-orange' : 'text-white' }} {{ request()->is('koki/kursus-content') ? 'activet text-orange' : 'text-white' }} {{ request()->is('koki/user') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z" />
                                </svg>
                                <p style="margin-left: 18px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Kursus
                                </p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.profilage') }}"
                                class="nav-link mx-3 {{ request()->is('koki/profilage') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z" />
                                </svg>
                                <p style="margin-left: 12px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Profil
                                </p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.income') }}"
                                class="nav-link mx-3 {{ request()->is('koki/income-koki') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 14 14">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M7 10.02v1.01m0-6.02v.94m0 7.54c3.5 0 6-1.24 6-4c0-3-1.5-5-4.5-6.5l1.18-1.52a.66.66 0 0 0-.56-1H4.88a.66.66 0 0 0-.56 1L5.5 3C2.5 4.51 1 6.51 1 9.51c0 2.74 2.5 3.98 6 3.98Z" />
                                        <path
                                            d="M6 9.56A1.24 1.24 0 0 0 7 10a1.12 1.12 0 0 0 1.19-1A1.12 1.12 0 0 0 7 8a1.12 1.12 0 0 1-1.19-1A1.11 1.11 0 0 1 7 6a1.26 1.26 0 0 1 1 .4" />
                                    </g>
                                </svg>
                                <p style="margin-left: 12px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Penghasilan
                                </p>
                            </a>
                        </li> -->

                        <!-- <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.diskusi') }}"
                                class="nav-link mx-3 {{ request()->is('koki/diskusi') ? 'activet text-orange' : 'text-white' }}"
                                style="width:13em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="m10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z" />
                                </svg>
                                <p style="margin-left: 12px; font-size: 20px; font-family: Poppins; font-weight: 500;">
                                    Diskusi
                                </p>
                            </a>
                        </li> -->

                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.beranda') }}"
                                class="nav-link mx-3 {{ request()->routeIs('koki.beranda') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="m221.56 100.85l-79.95-75.47l-.16-.15a19.93 19.93 0 0 0-26.91 0l-.17.15l-79.93 75.47a20.07 20.07 0 0 0-6.44 14.7V208a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-44h24v44a20 20 0 0 0 20 20h48a20 20 0 0 0 20-20v-92.45a20.07 20.07 0 0 0-6.44-14.7ZM204 204h-40v-44a20 20 0 0 0-20-20h-32a20 20 0 0 0-20 20v44H52v-86.72l76-71.75l76 71.75Z" />
                            </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Beranda
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.feed') }}"
                                class="nav-link mx-3 {{ request()->is('koki/feed') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M0 4c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm6 0v12h8V4H6zM2 5v2h2V5H2zm0 4v2h2V9H2zm0 4v2h2v-2H2zm14-8v2h2V5h-2zm0 4v2h2V9h-2zm0 4v2h2v-2h-2zM8 7l5 3l-5 3V7z" />
                                </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Feed
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.recipe') }}"
                                class="nav-link mx-3 {{ request()->is('koki/views-recipe') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 14 14">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M7 3h0a6.5 6.5 0 0 1 6.5 6.5v0a1 1 0 0 1-1 1h-11a1 1 0 0 1-1-1v0A6.5 6.5 0 0 1 7 3Zm0 0V1.5m-6.5 11h13" />
                                </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Resep
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.kursus') }}"
                                class="nav-link mx-3 {{ request()->is('koki/kursus') ? 'activet text-orange' : 'text-white' }} {{ request()->is('koki/kursus-content') ? 'activet text-orange' : 'text-white' }} {{ request()->is('koki/user') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M7 17H2a2 2 0 0 1-2-2V2C0 .9.9 0 2 0h16a2 2 0 0 1 2 2v13a2 2 0 0 1-2 2h-5l4 2v1H3v-1l4-2zM2 2v11h16V2H2z" />
                                </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Kursus
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.profilage') }}"
                                class="nav-link mx-3 {{ request()->is('koki/profilage') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg style="vertical-align: top;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z" />
                                </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Profil
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em">
                            <a href="{{ route('koki.income') }}"
                                class="nav-link mx-3 pr-1 {{ request()->is('koki/income-koki') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 14 14">
                                    <g fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="M7 10.02v1.01m0-6.02v.94m0 7.54c3.5 0 6-1.24 6-4c0-3-1.5-5-4.5-6.5l1.18-1.52a.66.66 0 0 0-.56-1H4.88a.66.66 0 0 0-.56 1L5.5 3C2.5 4.51 1 6.51 1 9.51c0 2.74 2.5 3.98 6 3.98Z" />
                                        <path
                                            d="M6 9.56A1.24 1.24 0 0 0 7 10a1.12 1.12 0 0 0 1.19-1A1.12 1.12 0 0 0 7 8a1.12 1.12 0 0 1-1.19-1A1.11 1.11 0 0 1 7 6a1.26 1.26 0 0 1 1 .4" />
                                    </g>
                                </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Penghasilan
                                </p>
                            </a>
                        </li>
                        <li class="nav-item" style="margin-bottom: -30px; margin-top: 2em; margin-bottom: 2em">
                            <a href="{{ route('koki.diskusi') }}"
                                class="nav-link mx-3 {{ request()->is('koki/diskusi') ? 'activet text-orange' : 'text-white' }}"
                                style="width: 12em">
                                <svg style="text-align: center;" xmlns="http://www.w3.org/2000/svg" width="32"
                                    height="32" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="m10 15l-4 4v-4H2a2 2 0 0 1-2-2V3c0-1.1.9-2 2-2h16a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-8zM5 7v2h2V7H5zm4 0v2h2V7H9zm4 0v2h2V7h-2z" />
                                </svg>
                                <p
                                style="margin-left: 10px; font-size: 20px; font-family: Poppins; font-weight: 500; ">
                                    Diskusi
                                </p>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <div class="modal" id="topup">
            <div class="modal-dialog">
                <div class="modal-content text-center">
                    <div class="d-flex">
                        <div class="col-11">
                            <h5 class="modal-title ml-1 mt-3"
                                style="color: black; margin-right: -25px; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                Top Up</h5>
                        </div>
                        <div class="col-1">
                            <button type="button" class="close mr-1 mt-3" data-bs-dismiss="modal"
                                aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('payments.method.get') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                        @foreach ($categorytopup as $topup)
                            <center>
                            <label for="inputanKecil{{ $loop->iteration }}"
                                id="topUp{{ $loop->iteration }}" class="card border-2 scale cardTopup"
                                data-card-selected="false"
                                style="height: 85px; border-radius: 15px; border: 1.5px black solid; overflow: hidden;">
                                <input type="radio" id="inputanKecil{{ $loop->iteration }}"
                                    style="display:none ;" name="inputanTopUp" value="{{ $topup->price }}">
                                <div class="d-flex flex-row">
                                    <a href="#" class="text-start pl-2 pt-2"
                                    style="color: black; font-size: 20px; font-family: Poppins;"
                                    id="textOrange{{ $loop->iteration }}">
                                        {{ $topup->name }} <br>
                                        <small id="textOrangePrice{{ $loop->iteration }}">
                                            Rp. {{ number_format($topup->price, 2, ',', '.') }}
                                        </small>
                                    </a>
                                    <img src="{{ asset('images/' . $topup->foto) }}" class="ml-auto"
                                        width="100px" height="92px;" alt="">
                                </div>
                            </label>
                            </center>
                        @endforeach


                            <center>
                                <div id="topUpLainya" class="card border-2 scale cardTopup" id="card"
                                    data-card-selected="false"
                                    style="height: 85px; border-radius: 15px; border: 1.50px black solid; overflow: hidden;">
                                    <div class="d-flex flex-row">
                                        <a href="#" class="text-start pl-2 pt-2"
                                            style="color: black; font-size:10px; font-family:Poppins;">
                                            <p id="anotherText"
                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                Lainya <br>

                                            </p>
                                            <p id="displayInput"
                                                style="color: black; font-size:15px; margin-top:-10%; font-family: Poppins; font-weight: 400; word-wrap: break-word;">
                                                Masukkan nilai....
                                            </p>
                                        </a>
                                        <img src="{{ asset('img/2.png') }}" class="ml-auto" width="100px"
                                            height="92px;" alt="">
                                    </div>
                                </div>
                            </center>

                            <center>
                            <div id="inputanLainya" style="display: none;" class="padding mb-3">
                                <input type="number" id="inputan" name="inputanLainya"
                                    class="form-control border-2" style="border-radius: 10px; border:solid #F7941E;"
                                    placeholder="Masukkan nominal lainya...">
                            </div>
                            </center>
                        </div>
                        <script>
                            const textOrange1 = document.getElementById('textOrange1');
                            const textOrange2 = document.getElementById('textOrange2');
                            const textOrange3 = document.getElementById('textOrange3');
                            const textOrangePrice1 = document.getElementById('textOrangePrice1');
                            const textOrangePrice2 = document.getElementById('textOrangePrice2');
                            const textOrangePrice3 = document.getElementById('textOrangePrice3');
                            const topUpKecil = document.getElementById('topUp1');
                            const topUpSedang = document.getElementById('topUp2');
                            const topUpBesar = document.getElementById('topUp3');
                            const topUpLainya = document.getElementById('topUpLainya');
                            const inputanLainya = document.getElementById('inputanLainya');
                            const inputElement = document.getElementById("inputan");
                            const displayElement = document.getElementById("displayInput");
                            const anotherText = document.getElementById("anotherText");

                            topUpKecil.addEventListener('click', function() {
                                topUpKecil.style.borderColor = "#F7941E";
                                textOrange1.style.color = "#F7941E";
                                textOrangePrice1.style.color = "#F7941E";
                                textOrange2.style.color = "black";
                                textOrangePrice2.style.color = "black";
                                textOrange3.style.color = "black";
                                textOrangePrice3.style.color = "black";
                                topUpBesar.style.borderColor = "black";
                                topUpSedang.style.borderColor = "black";
                                topUpLainya.style.borderColor = "black";
                                inputanLainya.style.display = "none";
                                topUpSedang.style.color = "black";
                                topUpBesar.style.color = "black";
                                topUpLainya.style.color = "black";
                                anotherText.style.color = "black";
                                displayElement.style.color = "black";
                            });

                            topUpSedang.addEventListener("click", function() {
                                topUpSedang.style.borderColor = "#F7941E";
                                textOrange1.style.color = "black";
                                textOrangePrice1.style.color = "black";
                                textOrange2.style.color = "#F7941E";
                                textOrangePrice2.style.color = "#F7941E";
                                textOrange3.style.color = "black";
                                textOrangePrice3.style.color = "black";
                                topUpKecil.style.borderColor = "black";
                                topUpBesar.style.borderColor = "black";
                                topUpLainya.style.borderColor = "black";
                                inputanLainya.style.display = "none";
                                topUpKecil.style.color = "black";
                                topUpBesar.style.color = "black";
                                topUpLainya.style.color = "black";
                                anotherText.style.color = "black";
                                displayElement.style.color = "black";
                            });

                            topUpBesar.addEventListener("click", function() {
                                topUpBesar.style.borderColor = "#F7941E";
                                textOrange1.style.color = "black";
                                textOrangePrice1.style.color = "black";
                                textOrange2.style.color = "black";
                                textOrangePrice2.style.color = "black";
                                textOrange3.style.color = "#F7941E";
                                textOrangePrice3.style.color = "#F7941E";
                                topUpKecil.style.borderColor = "black";
                                topUpSedang.style.borderColor = "black";
                                topUpLainya.style.borderColor = "black";
                                inputanLainya.style.display = "none";
                                topUpKecil.style.color = "black";
                                topUpSedang.style.color = "black";
                                topUpLainya.style.color = "black";
                                anotherText.style.color = "black";
                                displayElement.style.color = "black";
                            });

                            topUpLainya.addEventListener('click', function() {
                                topUpLainya.style.borderColor = "#F7941E";
                                textOrange1.style.color = "black";
                                textOrangePrice1.style.color = "black";
                                textOrange2.style.color = "black";
                                textOrangePrice2.style.color = "black";
                                textOrange3.style.color = "black";
                                textOrangePrice3.style.color = "black";
                                displayElement.style.color = "#F7941E";
                                topUpKecil.style.borderColor = "black";
                                topUpSedang.style.borderColor = "black";
                                topUpBesar.style.borderColor = "black";
                                inputanLainya.style.display = "block";
                                topUpKecil.style.color = "black";
                                topUpBesar.style.color = "black";
                                topUpSedang.style.color = "black";
                                anotherText.style.color = "#F7941E";
                            });


                            function formatNumber(number) {
                                // Hapus semua titik yang ada
                                const cleanValue = number.replace(/\./g, '');

                                // Ubah nilai menjadi format dengan titik sebagai pemisah ribuan
                                return cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                            }
                        </script>
                        <center>
                        <button type="submit" id="buttonCommentVeed"
                            style="height: 40px; width: 90%; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                            class="btn btn-sm text-light mb-3">
                            <b class="me-3 ms-3">Bayar <i class="fa-regular mt-1 fa-credit-card"></i></i></b></button>
                        </center>
                    </form>
                </div>
            </div>
        </div>

        <!-- Main content -->
        <div class="content-wrapper" style="background-color: white">
            @yield('konten')
        </div>
        <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        {{-- Modal alasan --}}
        @foreach ($notification as $row)
            <div class="modal" id="modalAlasan{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <form action="{{ $row->route }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle"
                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                    Alasan diblokir</h5>
                                <button type="submit" class="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="d-flex align-items-center">

                                    <img src="{{ asset('images/peringatan.png') }}" width="145px" height="140px"
                                        style="border-radius: 50%; " alt="">
                                    <textarea readonly class="form-control" style="margin-left: 1em; border-radius: 15px;" name="description"
                                        rows="5" placeholder="Alasan">{{ $row->alasan }}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-light text-light"
                                    style="border-radius: 15px; background-color:#F7941E;"><b
                                        class="ms-2 me-2">Oke</b></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach

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
            let startCond = true;

            document.addEventListener('calendar', function() {
                var calendarEl = document.getElementById('calendar'); // ID kalender
                var calendar = new FullCalendar.Calendar(calendarEl, {
                    // Konfigurasi kalender
                    // ...
                });
                calendar.render();
            });

            function ManageSidebar(e) {
                let sidebar = document.getElementById('sidebarContent')

                if (startCond) {
                    sidebar.style.display = ''
                    startCond = false
                } else {
                    sidebar.style.display = 'block'
                    startCond = true
                }

            }
            $(document).ready(function() {
                $("#notification-button").click(function() {
                    $('#notification-button-real').click();
                    const badge = document.getElementById('badge');
                    $.ajax({
                        type: "PATCH",
                        url: "{{ route('all.notifications') }}",
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(response) {
                            if (response.success) {
                                badge.style.display = "none";
                            }
                        },
                        error: function(xhr, status, error) {
                            badge.style.display = "block";
                        }
                    });
                });
            });
        </script>
        <script>
            function limitName() {
            let elements = document.querySelectorAll('.ellipsis-name');

            elements.forEach(element => {
                let text = element.textContent.trim(); // Mengambil teks asli dari elemen
                let screenWidth = window.innerWidth;
                let maxLength;

                if (screenWidth <= 425) {
                maxLength = 5;
                } else if (screenWidth <= 767 && screenWidth >= 426) {
                maxLength = 10;
                } else {
                maxLength = 10;
                }

                let shortenedText = text.length > maxLength ? text.substr(0, maxLength) + '...' : text;
                element.textContent = shortenedText;
            });
            }

            document.addEventListener('readystatechange', () => {
            if (document.readyState === 'interactive') {
                limitName();
                window.addEventListener('resize', limitName);
            }
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
