<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title> HummaCook </title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" />
    <!-- responsive style -->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" />

    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.css') }}">
    <style>
        .custom_nav-container .navbar-nav .nav-item.active .nav-link {
            color: #F7941E;
            background: white;
        }
        .custom_nav-container .navbar-nav .nav-item.active .nav-link:hover {
            color: #F7941E;
            background: white;
        }
        .nav-link:hover {

        }

        .nav-link {
            white-space: nowrap;

        }

        .radius-bawah {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        .radius-atas {
            border-top-right-radius: 30px;
            border-top-left-radius: 30px;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown .dropbtn {

            border: none;
            outline: none;
            color: white;
            background-color: inherit;
            margin: 0;
            padding: 14px 16px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1d1919;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {

            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background-color: #f1f1f146;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .login {
            display: inline-block;
            padding: 6px 22px;
            background-color: #ffff;
            color: #F7941E;
            border-radius: 12px;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            border: none;
        }


        .dotted {
            border: 2px dotted #aaa;
            text-align: center;
            padding: 10px;
            width: 300px;
            height: auto;
            border-radius: 20px;
        }

        .black-border-button {


            border: 1px solid black;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .t {
            margin-left: 45px;
        }


        .ah {
            display: inline-block;
            padding: 10px 55px;
            background-color: #ffffff;
            color: #F7941E;
            border-radius: 100px;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            border: none;
        }

        .text-orange {
            color: #F7941E;
        }

        .slider_section .detail-box a {
            background-color: #ffffff;
            color: #ffffff;
            border-radius: 12px;

        }

        .zoom-effects:hover {
            transform: scale(0.95);
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
    </style>


</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box radius-bawah" style="background-color: #F7941E; ">

        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <div class="col-6">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
                        <div style="margin-left: -100px;">
                            @if (Auth::check())
                                @if (Auth::user()->role == 'Admin')
                                    <a class="navbar-brand ms-2" href="{{ url('admin/index') }}">
                                        <span class="t">
                                            HummaCook
                                        </span>
                                    </a>
                                @else
                                    <a class="navbar-brand ms-2" href="#">
                                        <span class="t">
                                            HummaCook
                                        </span>
                                    </a>
                                @endif
                            @else
                                <a class="navbar-brand ms-2" href="#">
                                    <span class="t">
                                        HummaCook
                                    </span>
                                </a>
                            @endif
                        </div>

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" class="ms-4" style="margin-left: 60px;;"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav mt-3 me-2 justify-content-center mx-auto ">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}" style="font-size: 15px;">
                                    <a class="nav-link" id="navbar" href="{{ route('home') }}"><b>Home</b></a>
                                </li>
                                <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}"
                                    style="font-size: 15px">
                                    <a class="nav-link" id="navbar" href="{{ route('menu') }}"><b>Resep</b></a>
                                </li>
                                <li class="nav-item {{ request()->is('hari') ? 'active' : '' }}"
                                    style="font-size: 15px">
                                    <a class="nav-link" id="navbar" href="{{ route('hari') }}"><b>Hari
                                            Khusus</b></a>

                                </li>
                                <li class="nav-item {{ request()->is('search-account') ? 'active' : '' }}"
                                    style="font-size: 15px">
                                    <a class="nav-link" id="navbar" href="{{ url('/search-account') }}"><b>Cari
                                            Akun</b></a>
                                </li>

                                <li class="nav-item {{ request()->is('about') ? 'active' : '' }} me-2"
                                    style="font-size: 15px">
                                    <a class="nav-link" id="navbar" href="{{ route('about') }}"><b>Tentang</b></a>
                                </li>
                                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                      </li> --}}
                            </ul>
                            <div class="user_option" style="margin-left: 180px;">


                                @if (Auth::check() && $notification != null)
                                    {{-- dropdown notifikasi --}}
                                    <div class="text-light me-2">
                                        <a data-toggle="dropdown" class="text-light" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M4 19v-2h2v-7q0-2.075 1.25-3.688T10.5 4.2v-.7q0-.625.438-1.063T12 2q.625 0 1.063.438T13.5 3.5v.7q2 .5 3.25 2.113T18 10v7h2v2H4Zm8-7.5ZM12 22q-.825 0-1.413-.588T10 20h4q0 .825-.588 1.413T12 22Zm-4-5h8v-7q0-1.65-1.175-2.825T12 6q-1.65 0-2.825 1.175T8 10v7Z" />
                                            </svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-1"
                                            style="width: 350px; border-radius:13px; margin-right:-105%;">
                                            @foreach ($notification as $row)
                                                @if ($row->sender->id != auth()->user()->id)
                                                    <div class="dropdown-divider"></div>
                                                    <div class="input-group">
                                                        @if ($row->sender->foto)
                                                            <a href="#">
                                                                <img class="ms-2 mt-1 rounded-circle"
                                                                    src="{{ asset('storage/' . $row->sender->foto) }}"
                                                                    alt="profile image" style="max-width:35px">
                                                            </a>
                                                        @else
                                                            <a href="#">
                                                                <img class="ms-2 mt-1 rounded-circle"
                                                                    src="{{ asset('images/default.jpg') }}"
                                                                    alt="profile image" style="max-width:35px">
                                                            </a>
                                                        @endif
                                                        <p class="mt-2 text-orange">{{ $row->sender->name }}</p>
                                                        @if ($row->reply_id != null && $row->complaint_id != null && $row->like_id == null)
                                                            <form
                                                                action="{{ route('replies.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Membalas
                                                                        keluhan anda</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                        @elseif($row->reply_id != null && $row->like_id != null)
                                                            <form
                                                                action="{{ route('replies.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                        komentar anda</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                            @elseif($row->like_id != null && $row->resep_id != null)
                                                            <form
                                                                action="{{ route('resep.like.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                        resep anda</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                        @elseif($row->follower_id == auth()->user()->id && $row->complaint_id != null)
                                                            <form
                                                                action="{{ route('replies.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Memiliki
                                                                        kesulitan memasak</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                        @elseif($row->follower_id == auth()->user()->id && $row->resep_id != null)
                                                            <form
                                                                action="{{ route('replies.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Menambahkan
                                                                        resep baru</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                        @elseif($row->profile_id != null)
                                                            <form
                                                                action="{{ route('profile.blocked.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Foto profil
                                                                        kamu telah diblokir</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                        @elseif($row->reply_id_report != null)
                                                            <form
                                                                action="{{ route('replies.blocked.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Komentar
                                                                        kamu telah diblokir</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 mb-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                    <input hidden type="text"
                                                                        value="{{ $row->complaint_id }}"
                                                                        name="replies_id" id="replies_id"
                                                                        class="form-control">
                                                                </button>
                                                            </form>
                                                        @elseif($row->follower_id != null && $row->complaint_id == null)
                                                            <form
                                                                action="{{ route('follow.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class=" ms-1 text-secondary">Mulai mengikuti
                                                                        anda</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                </button>
                                                                <input type="text" hidden name="follower_id"
                                                                    id="follower_id" value="{{ $row->follower_id }}"
                                                                    class="form-control">
                                                            </form>
                                                        @elseif($row->follower_id != null && $row->complaint_id == null)
                                                            <form
                                                                action="{{ route('follow.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class=" ms-1 text-secondary">Mulai mengikuti
                                                                        anda</small>
                                                                    @if ($row->status == 'belum')
                                                                        <img class="ms-2 rounded-circle"
                                                                            src="{{ asset('images/badge.png') }}"
                                                                            alt="profile image"
                                                                            style="max-width:10px">
                                                                    @endif
                                                                </button>
                                                                <input type="text" hidden name="follower_id"
                                                                    id="follower_id" value="{{ $row->follower_id }}"
                                                                    class="form-control">
                                                            </form>
                                                        @endif
                                                    </div>
                                                @endif
                                            @endforeach
                                            @forelse ($notification as $row)
                                                <!-- Konten notifikasi -->
                                            @empty
                                                <div class="dropdown-divider"></div>
                                                <div class="text-center mt-2">
                                                    <img src="{{ asset('images/nodata.png') }}" class="col-sm-6"
                                                        alt="...">
                                                </div>
                                            @endforelse
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                    @if ($unreadNotificationCount > 0)
                                        <span class="badge badge-danger rounded-pill mb-4 me-2"
                                            style="margin-left: -33px;">{{ $unreadNotificationCount }}</span>
                                    @endif
                                    {{-- dropdown profile & logout --}}
                                    <div class="input-group dropdown">
                                        <a data-toggle="dropdown" class="me-4" href="#">
                                            @if ($userLogin->foto)
                                                <img loading="lazy" class="mr-3 rounded-circle"
                                                    src="{{ asset('storage/' . $userLogin->foto) }}"
                                                    alt="profile image" width="50px" height="50px">
                                            @else
                                                <img loading="lazy" class="mr-3 rounded-circle"
                                                    src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                    style="max-width:40px">
                                            @endif
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3 me-5 ms-auto"
                                            style="width: 255px; border-radius:13px;">
                                            <div class="input-group">
                                                <a href="#">
                                                    @if ($userLogin->foto)
                                                        <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                            src="{{ asset('storage/' . $userLogin->foto) }}"
                                                            alt="profile image" width="50px" height="50px">
                                                    @else
                                                        <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                            src="{{ asset('images/default.jpg') }}"
                                                            alt="profile image" style="max-width:40px">
                                                    @endif
                                                </a>
                                                <p class="mt-2 text-orange"><b>{{ auth()->user()->name }}</b></p>
                                            </div>
                                            <div class="dropdown-divider"></div>
                                            <a href="/koki/index" class="dropdown-item text-orange"
                                                style="width: 230px">
                                                <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                    height="20" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z" />
                                                </svg>
                                                Profil
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#"  data-toggle="modal" data-target="#favoriteModal" style="width: 230px;"
                                                class="dropdown-item text-orange">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="21" class="me-1" height="21" viewBox="0 0 24 24"><path fill="currentColor" d="M19 3H5v18l7-3l7 3V3zm-2 15l-5-2.18L7 18V5h10v13z"/></svg>
                                                favorite
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
                                            <div class="dropdown-divider"></div>
                                        </div>
                                    </div>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-light rounded-5"
                                        style="border-radius: 12px;"><b class="me-2 ms-2">Login</b></a>
                                @endif
                            </div>
                        </div>
                    </nav>
                </div>
                @yield('content-header')
            </div>
        </header>
        <!-- end header section -->
    </div>
    @yield('content')
    <!-- footer section -->
    <footer class="footer_section" style="background-color: #F7941E; border-top-left-radius: 35px; border-top-right-radius: 35px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <h1 style="margin-right: 10em">
                            HummaCook
                        </h1>
                        <p class="mt-3" style="margin-right: 3em; text-align: left;">
                            Tempat Dimana Anda Bisa Menemukan Resep-Resep Populer dan Mudah untuk
                            Dimengerti
                        </p>

                        {{-- <div class="footer_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        </div> --}}
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h1
                            style="font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold; margin-right: 5em">
                            Kontak
                        </h1>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span style="margin-right: 6em">
                                    Lokasi
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true" style="margin-left: 1em"></i>
                                <span>
                                    Call +62 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true" style="margin-left: 3em"></i>
                                <span>
                                    hummacook@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 footer-col">
                    <h1 style="font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold;">
                        Jam Buka
                    </h1>
                    <p>
                        Setiap Hari 24 Jam
                    </p>

                </div>
            </div>
        <!-- Modal -->
        <div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark fw-bolder ms-3" id="exampleModalLongTitle">Resep favorite</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                @foreach($favorite as $row)
                <form action="{{route('Report.store')}}" method="POST">
                    @csrf
                <div class="modal-body d-flex align-items-center">
                    <input type="checkbox" class="form-check-input ms-3">
                    <img src="{{ asset('storage/'.$row->resep->foto_resep) }}" class=" ms-5 me-2" style="border-radius: 10px;max-width:106px"
                    alt="">
                    <div style="justify-content: space-between;" class="mb-1">
                    <h6 class="fw-bolder modal-title mt-2 me-5 text-orange">{{$row->resep->nama_resep}}</h6>

                                <small class="text-secondary  me-3">{{$row->resep->deskripsi_resep}}</small>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-light btn-sm text-light" style="border-radius: 15px; background-color:#F7941E;"><b class="ms-2 me-2">Hapus dari favorit</b></button>
                </div>
                </form>
                @endforeach

            </div>
        </div>
    </div>
        {{-- end Modal --}}
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="{{ asset('js/custom.js') }}"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
    <script src="{{ asset('plugins/select2/js/select2.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.search-bahan').select2({
                closeOnSelect: false
            });
        });
    </script>
</body>

</html>
