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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">

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
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <style>
        .custom_nav-container .navbar-nav .nav-item.active .nav-link {
            color: #F7941E;
            background: white;
        }

        .custom_nav-container .navbar-nav .nav-item.active .nav-link:hover {
            color: #F7941E;
            background: white;
        }

        .nav-link:hover {}

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

        .text-orange:hover {
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
                        <div style="margin-left: -80px;">
                            @if (Auth::check())
                                @if (Auth::user()->role == 'Admin')
                                    <a class="navbar-brand ms-3" href="{{ url('admin/index') }}">
                                        <span class="t">
                                            HummaCook
                                        </span>
                                    </a>
                                @else
                                    <a class="navbar-brand ms-3" href="#">
                                        <span class="t">
                                            HummaCook
                                        </span>
                                    </a>
                                @endif
                            @else
                                <a class="navbar-brand ms-3" href="#">
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

                        <div class="collapse navbar-collapse" class="ms-4" id="navbarSupportedContent">
                            <ul class="navbar-nav mt-3 me-2 justify-content-center " style="margin-left: 70px">
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}" style="font-size: 15px;">
                                    <a class="nav-link" id="navbar" href="{{ route('home') }}"><b>Home</b></a>
                                </li>
                                <li class="nav-item {{ request()->is('resep') ? 'active' : '' }}"
                                    style="font-size: 15px">
                                    <a class="nav-link" id="navbar"
                                        href="{{ route('resep.home') }}"><b>Resep</b></a>
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

                            <div class="user_option" style="margin-left: 230px;">


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
                                                                    <small class="mt-1 ms-1 text-secondary">8
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
                                                        @elseif($row->reply_id_comment != null )
                                                            <form
                                                                action="{{ route('replies.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class="mt-1 ms-1 text-secondary">Membalas 
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
                                                        @elseif($row->like_reply_id != null && $row->complaint_id != null)
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
                                                                action="{{ route('resep.read.notification', $row->id) }}"
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
                                                                action="{{ route('blockedComent.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="button" data-toggle="modal" data-target="#modalAlasan{{$row->id}}">
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
                                                                    <small class=" ms-1 text-secondary">K mengikuti
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
                                                        @elseif($row->complaint_id_report != null)
                                                            <form
                                                                action="{{ route('blockedComplaint.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="button" data-toggle="modal" data-target="#modalAlasan{{$row->id}}">
                                                                    <small class=" ms-1 text-secondary">Keluhan
                                                                        anda telah diblokir</small>
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
                                                        @elseif($row->resep_id_report != null)
                                                            <form
                                                                action="{{ route('blockedRecipes.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="button" data-toggle="modal" data-target="#modalAlasan{{$row->id}}">
                                                                    <small class=" ms-1 text-secondary">Resep
                                                                        anda telah diblokir</small>
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
                                                        @elseif($row->random_name != null)
                                                            <form
                                                                action="{{ route('profile.blocked.notification', $row->id) }}"
                                                                method="POST">
                                                                @method('PUT')
                                                                @csrf
                                                                <button class="yuhu mt-2" type="submit">
                                                                    <small class=" ms-2 text-secondary">Username kamu
                                                                        diblokir</small>
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
                                        @if (auth()->user()->role === 'koki')
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
                                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z" />
                                                    </svg>
                                                    Profil
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="#" data-toggle="modal" data-target="#favoriteModal"
                                                    style="width: 230px;" class="dropdown-item text-orange">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="21"
                                                        class="me-1" height="21" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M19 3H5v18l7-3l7 3V3zm-2 15l-5-2.18L7 18V5h10v13z" />
                                                    </svg>
                                                    favorite
                                                </a>
                                                <div class="dropdown-divider"></div>
                                                <a href="{{ route('actionlogout') }}" style="width: 230px;"
                                                    class="dropdown-item text-orange">
                                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg"
                                                        width="20" height="20" viewBox="0 0 24 24">
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
                                @elseif (auth()->user()->role === 'admin')
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
                                                        src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                        style="max-width:40px">
                                                @endif
                                            </a>
                                            <p class="mt-2 text-orange"><b>{{ auth()->user()->name }}</b></p>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a href="/koki/index" class="dropdown-item text-orange" style="width: 230px">
                                            <svg style="vertical-align: top; margin-left: -5px"
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 36 36">
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
                            @endif
                        @else
                            <a href="{{ route('login') }}" class="btn rounded-5 text-white zoom-effects"
                                style=" border-radius: 15px; border: 0.50px white solid; font-family: Poppins;"><b class="me-2 ms-2">Masuk</b></a>
                            @endif
                        </div>
                </div>
                </nav>
            </div>
            @yield('content-header')
    </div>
        {{-- Modal alasan --}}
    @foreach($notification as $row)
    <div class="modal fade" id="modalAlasan{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form action="{{route('blockedComplaint.notification',$row->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle"
                            style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                            Alasan diblokir</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="d-flex align-items-center">

                            <img src="{{ asset('images/peringatan.png') }}" width="145px" height="140px"
                                    style="border-radius: 50%; " alt="">
                            <textarea readonly class="form-control" style="margin-left: 1em; border-radius: 15px;" name="description" rows="5"
                                placeholder="Alasan">{{$row->alasan}}</textarea>
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
    </header>
    <!-- end header section -->
    </div>
    @yield('content')

    <!-- footer section -->
    <footer class="footer_section"
        style="background-color: #F7941E; border-top-left-radius: 35px; border-top-right-radius: 35px;">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-6 footer-col">
                    <div class="footer_detail ">
                        <h1>HummaCook</h1>
                        <p class="mt-3 text-start text-white">Tempat Dimana Anda Bisa Menemukan Resep-Resep Populer dan
                            Mudah untuk Dimengerti, Menyajikan Resep-Resep rumahan yang mudah dibuat oleh semua orang,
                            dan bahan-bahan masakannya yang mudah untuk didapatkan. </p>
                        <div class="footer_social mt-4"> <!-- Increase the margin-top value as needed -->
                            <a href="{{$footer->facebook}}" target="_blank">
                                <i class="fa-brands fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="{{$footer->youtube}}" target="_blank">
                                <i class="fa-brands fa-youtube" aria-hidden="true"></i>
                            </a>
                            <a href="{{$footer->twitter}}" target="_blank">
                                <i class="fa-brands fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="{{$footer->instagram}}" target="_blank">
                                <i class="fa-brands fa-instagram" aria-hidden="true"></i>
                            </a>

                        </div>


                    </div>
                </div>
                <div class="col-md-4 col-sm-6 mt-2 footer-col" style="text-align: center;">
                    <div class="footer_contact mt-2">
                        <h5 class="fw-bold">Kontak</h5>
                        <div class="contact_link_box mt-4">

                            <a href="{{$footer->kontak}}" target="_blank">
                                <i class="fa fa-phone" aria-hidden="true" style="margin-left: -2em"></i>
                                <span>{{$footer->kontak}}</span>
                            </a>
                            <a href="{{$footer->telegram}}" target="_blank">
                                <i class="fa-brands fa-telegram" aria-hidden="true" style="margin-left: -2em"></i>
                                <span>{{$footer->telegram}}</span>
                            </a>
                            <a href="{{$footer->email}}" target="_blank">
                                <i class="fas fa-envelope" aria-hidden="true" style="margin-left:-1em"></i>
                                <span>{{$footer->email}}</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 footer-col">
                    <h1 class="footer-title mt-4">
                        {{-- <i class="fa fa-map-marker" aria-hidden="true" style="margin-right:25%;"></i> --}}
                        <h5 class="fw-bold" style="margin-top: -0.5em;">Maps</h5>
                    </h1>
                    <iframe
                        src="{{$footer->lokasi}}"
                        height="200" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
            
            <!-- Modal -->
            <div class="modal fade" id="favoriteModal" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-dark fw-bolder ms-3 me-5" id="exampleModalLongTitle">Resep
                                favorite</h5>
                            {{-- <p class="text-dark ms-5 mt-1 fw-bolder">pilih semua</p> --}}
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>

                        </div>
                        @foreach ($favorite as $row)
                            <form action="{{ route('favorite.delete.multiple') }}" method="POST">
                                @csrf
                                <div class="modal-body d-flex align-items-center">
                                    <input type="checkbox" name="selected_ids[]"
                                        class="form-check-input ms-3 data-checkbox" data-id="{{ $row->id }}">
                                    <img src="{{ asset('storage/' . $row->resep->foto_resep) }}" class=" ms-5 me-2"
                                        style="border-radius: 10px;max-width:106px" alt="">
                                    <a href="/artikel/{{ $row->resep->id }}/{{ $row->resep->nama_resep }}">
                                        <div style="justify-content: space-between;" class="mb-1">
                                            <h6 class="fw-bolder modal-title mt-2 me-5 text-orange">
                                                {{ $row->resep->nama_resep }}</h6>

                                            <small
                                                class="text-secondary  me-3">{{ strlen($row->resep->deskripsi_resep) > 80 ? substr($row->resep->deskripsi_resep, 0, 80) . '...' : $row->resep->deskripsi_resep }}</small>

                                        </div>
                                    </a>
                                </div>
                        @endforeach
                        @forelse ($favorite as $row)
                        @empty
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                style="margin-top: 2em">
                                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                <p style="color: #1d1919"><b>Tidak ada data</b></p>
                            </div>
                        @endforelse
                        <div class="modal-footer">
                            <div class="me-4">
                                <input name="select-all" style="margin-left: -25%;" type="checkbox"
                                    class="form-check-input" id="select-all">
                                <div class="me-5">
                                    <label for="select-all" class="text-dark me-5">Pilih semua</label>
                                </div>
                            </div>
                            <button onclick="deleteSelected()" class="btn btn-light btn-sm text-light ms-5"
                                style="border-radius: 15px; background-color:#F7941E;"><b class="ms-2 me-2">Hapus
                                    dari favorit</b></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end Modal --}}
        </div>
    </footer>
    <!-- footer section -->
    <!-- jQery -->
    <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#buttonaddrecipe").click(function(event) {
                event.preventDefault();

                var data = $("#form-add-recipe").serialize();
                $.ajax({
                    url: "{{ route('resep.store') }}",
                    type: "POST",
                    data: data,
                    error: function(data) {
                        console.log(data.error);
                    }
                });
            });
        });

        $('#select-all').on('change', function() {
            $('.data-checkbox').prop('checked', this.checked);
        });

        $('.data-checkbox').on('change', function() {
            const totalData = $('.data-checkbox').length;
            const totalChecked = $('.data-checkbox:checked').length;

            $('#select-all').prop('checked', totalChecked === totalData);
        });

        function deleteSelected() {
            event.preventDefault();
            const selectedIds = $('.data-checkbox:checked')
                .map(function() {
                    return this.getAttribute('data-id');
                })
                .get();

            if ($('#select-all').prop('checked')) {
                $('.data-checkbox').prop('checked', true);
            } else {
                $('.data-checkbox').prop('checked', false);
            }

            if (selectedIds.length === 0) {
                iziToast.show({
                    backgroundColor: '#F7941E',
                    title: '<i class="fa-solid fa-triangle-exclamation"></i> Peringatan',
                    titleColor: 'white',
                    messageColor: 'white',
                    message: 'Pilih setidaknya satu data yang akan dihapus.',
                    position: 'topCenter',
                });
                return;
            }

            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin menghapus data terpilih?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        const deleteUrl = "{{ route('favorite.delete.multiple') }}";
                        const csrfToken = "{{ csrf_token() }}";

                        $.ajax({
                            type: 'POST',
                            url: deleteUrl,
                            data: {
                                _token: csrfToken,
                                ids: selectedIds
                            },
                            success: function(response) {
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                iziToast.show({
                                    backgroundColor: '#F7941E',
                                    title: '<i class="fa-regular fa-circle-xmark"></i> Error',
                                    titleColor: 'white',
                                    messageColor: 'white',
                                    message: 'Terjadi kesalahan saat menghapus data',
                                    position: 'topCenter',
                                });
                                console.log(xhr.responseText);
                            }
                        });
                    }],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                        }, toast);
                    }],
                ],
            });
        }
    </script>

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
            $('#filter').on('shown.bs.modal', function () {
                $('.cari').select2({
                closeOnSelect: false,
                placeholder: {
                    id: '-1',
                    text: 'Masukkan Nama Bahan'
                },
                dropdownParent: $('#filter')

            });
            $('.cari23').select2({
                closeOnSelect: false,
                placeholder: {
                    id: '-1', // the value of the option
                    text: 'Masukkan Nama Alat Alat'
                },
                dropdownParent: $('#filter')
            });
});


        });
    </script>
</body>

</html>
