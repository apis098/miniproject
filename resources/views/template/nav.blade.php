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
    <style>
        .nav-link.active {
            background-color: #f39c12;
            color: #fff;

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
            color: #f39c12;
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
                                <li class="nav-item active" style=" font-size: 15px">
                                    <a class=" login" href="{{ route('home') }}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link  dropbtn" href="{{ route('menu') }}">Resep</a>

                                </li>
                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('hari') }}">Hari Khusus </a>

                                </li>
                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ url('/search-account') }}">Cari Akun</a>

                                </li>

                                <li class="nav-item dropdown me-2" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('about') }}">Tentang</a>
                                </li>
                                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                      </li> --}}
                            </ul>
                            <div class="user_option" style="margin-left: 180px;">


                                @if (Auth::check())
                                    <a href="{{ route('actionlogout') }}" class="btn btn-outline-light rounded-5"
                                        style="border-radius: 12px;">Logout</a>
                                @else
                                    <a href="{{ route('login') }}" class="btn btn-outline-light rounded-5"
                                        style="border-radius: 12px;">Login</a>
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
                    <div class="footer_contact">
                        <h4>
                            Contact
                        </h4>
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
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            HummaCook
                        </a>
                        <p>
                            Tempat Dimana Anda Bisa Menemukan Resep-Resep Populer dan Mudah untuk Dimengerti
                        </p>
                        <div class="footer_social">
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
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Opening Hours
                    </h4>
                    <p>
                        Setiap Hari
                    </p>
                    <p>
                        24 Jam
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
