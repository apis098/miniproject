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

    <style>
        .custom_nav-container .navbar-nav .nav-item.active .nav-link {
            color: #F7941E;
            background: white;
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
            border-radius: 10px;
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
        .text-orange{
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
                                    <a class="navbar-brand" href="{{ url('admin/index') }}">
                                        <span class="t">
                                            HummaCook
                                        </span>
                                    </a>
                                @else
                                    <a class="navbar-brand" href="{{ url('koki/index') }}">
                                        <span class="t">
                                            HummaCook
                                        </span>
                                    </a>
                                @endif
                            @else
                                <a class="navbar-brand" href="#">
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
                                <li class="nav-item {{ request()->is('/') ? 'active' : '' }}" style="font-size: 15px">
                                    <a class="nav-link" href="{{ route('home') }}"><b>Home</b></a>
                                </li>
                                <li class="nav-item {{ request()->is('menu') ? 'active' : '' }}" style="font-size: 15px">
                                    <a class="nav-link" href="{{ route('menu') }}"><b>Resep</b></a>
                                </li>
                                <li class="nav-item {{ request()->is('hari') ? 'active' : '' }}" style="font-size: 15px">
                                    <a class="nav-link" href="{{ route('hari') }}"><b>Hari Khusus</b></a>

                                </li>
                                <li class="nav-item {{ request()->is('search-account') ? 'active' : '' }}" style="font-size: 15px">
                                    <a class="nav-link" href="{{ url('/search-account') }}"><b>Cari Akun</b></a>
                                </li>

                                <li class="nav-item {{ request()->is('about') ? 'active' : '' }} me-2" style="font-size: 15px">
                                    <a class="nav-link" href="{{ route('about') }}"><b>Tentang</b></a>
                                </li>
                                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                      </li> --}}
                            </ul>
                            <div class="user_option" style="margin-left: 180px;">


                                @if (Auth::check())
                                    {{-- dropdown notifikasi --}}
                                        <div class="text-light me-2">
                                            <a data-toggle="dropdown" class="text-light" href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24"><path fill="currentColor" d="M4 19v-2h2v-7q0-2.075 1.25-3.688T10.5 4.2v-.7q0-.625.438-1.063T12 2q.625 0 1.063.438T13.5 3.5v.7q2 .5 3.25 2.113T18 10v7h2v2H4Zm8-7.5ZM12 22q-.825 0-1.413-.588T10 20h4q0 .825-.588 1.413T12 22Zm-4-5h8v-7q0-1.65-1.175-2.825T12 6q-1.65 0-2.825 1.175T8 10v7Z"/></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-1" style="width: 350px; border-radius:13px; margin-right:-105%;" >
                                                @foreach($notification as $row)
                                                @if($row->sender->id != auth()->user()->id)

                                                    <div class="dropdown-divider"></div>
                                                            <div class="input-group">

                                                                <a href="#">
                                                                    <img class="ms-2 mb-1 rounded-circle"
                                                                    src="{{ asset('images/client1.jpg') }}"
                                                                    alt="profile image" style="max-width:25px">
                                                                </a>
                                                                <p class="mb-2 text-orange">{{$row->sender->name}}</p>
                                                                @if($row->reply_id != null && $row->complaint_id != null)
                                                                <small class="mt-1 ms-1 text-secondary">telah membalas keluhan anda</small><a href="" class=" ms-1 text-orange">
                                                                    <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px"></a>
                                                                @elseif($row->reply_id != null && $row->like_id != null)
                                                                <small class="mt-1 ms-1 text-secondary">Menyukai komentar anda</small><a href="" class=" ms-1 text-orange">
                                                                    <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px"></a>
                                                                @elseif($row->follower_id != null)
                                                                <small class="mt-1 ms-1 text-secondary">Mulai mengikuti anda</small><a href="" class=" ms-1 text-orange">
                                                                    <img class="ms-2 mb-2 rounded-circle"
                                                                        src="{{ asset('images/badge.png') }}"
                                                                        alt="profile image" style="max-width:10px"></a>
                                                                @endif
                                                            </div>

                                                @endif
                                                @endforeach
                                                <div class="dropdown-divider"></div>
                                            </div>

                                        </div>

                                        {{-- dropdown profile & logout --}}
                                        <div class="input-group dropdown">
                                            <a data-toggle="dropdown" href="#">
                                                <img loading="lazy" class="mr-3 rounded-circle"
                                                src="{{ asset('images/client1.jpg') }}"
                                                alt="profile image" style="max-width:40px">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3 me-5 ms-auto" style="width: 255px; border-radius:13px;" >
                                                <div class="input-group">
                                                <a href="#">
                                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                    src="{{ asset('images/client1.jpg') }}"
                                                    alt="profile image" style="max-width:40px">
                                                </a>
                                                <p class="mt-2 text-orange"><b>{{auth()->user()->name}}</b></p>
                                                </div>
                                                <div class="dropdown-divider"></div>
                                                    <a href="/koki/index" class="dropdown-item text-orange" style="width: 230px">
                                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z"/></svg>
                                                        Profil
                                                    </a>
                                                <div class="dropdown-divider"></div>
                                                    <a href="{{route('actionlogout')}}" style="width: 230px;" class="dropdown-item text-orange">
                                                        <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="currentColor" d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z"/><path fill="currentColor" d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z"/></svg>
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
    <footer class="footer_section" style="background-color: #F7941E; ">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                    <h1 style="font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold;">
                        HummaCook
                    </h1>
                    <p>
                        Tempat Dimana Anda Bisa Menemukan Resep-Resep Populer dan Mudah untuk Dimengerti
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
                        <h1 style="font-family: 'Arial', sans-serif; font-size: 20px; font-weight: bold;">
                            Kontak
                        </h1>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Lokasi
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +62 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
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
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchbahan').select2();
        });
    </script>
</body>

</html>
