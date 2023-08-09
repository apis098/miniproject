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
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title> HummaCook </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <style>
        .nav-link.active {
            background-color: #f39c12;
            color: #fff;
        }

        .nav-link {
            white-space: nowrap;
        }

        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropbtn {

            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1d1919;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
        }

        .dropdown-content a {
            padding: 12px 16px;
            text-decoration: none;
            display: block;
            color: black;
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
            background-color: #ffbe33;
            color: #ffffff;
            border-radius: 45px;
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
    </style>


</head>

<body class="sub_page">

    <div class="hero_area">
        <div class="bg-box">
            <img src="images/hero-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <div class="col-6">
                    <nav class="navbar navbar-expand-lg custom_nav-container ">
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

                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class=""> </span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav  mx-auto ">
                                <li class="nav-item " style="margin-left: -100px; font-size:15px">
                                    <a class="nav-link" href="{{ route('home') }}">Home <span
                                            class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link  dropbtn" href="{{ route('menu') }}">Resep</a>

                                </li>
                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('hari') }}">Hari Khusus </a>

                                </li>
                                <li class="nav-item active dropdown" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('tips_dsr') }}">Tips Dasar</a>

                                </li>

                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('seputar_dpr') }}">Seputar Dapur</a>

                                </li>
                                <li class="nav-item" style="font-size: 15px">
                                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                                </li>
                                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                      </li> --}}
                            </ul>
                            <div class="user_option" style="margin-left: 20px;">


                                @if (Auth::check())
                                    <a href="{{ route('actionlogout') }}" class="login">Logout</a>
                                @else
                                    <a href="{{ route('login') }}" class="login">Login</a>
                                @endif
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- end header section -->
    </div>

    <!-- food section -->

    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Search Basic Tips
                </h2>
            </div>

            <form action="/tips_dsr" method="post">
                @csrf
                <select name="tips" id="searchtips" class="form-control">
                    <option value=""></option>
                    @foreach ($kategori_td as $item_tips)
                        <option value="{{ $item_tips->id }}">{{ $item_tips->nama_kategori }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary my-2">Search</button>
            </form>


            @foreach ($kategori_tipsdasar as $ktd)
                <button class="btn btn-light p-2 border ">{{ $ktd->nama_kategori }}</button>
            @endforeach
            <div class="filters-content">
                <div class="row grid">
                    @foreach ($kategori_tipsdasar as $k_td)
                        @foreach ($k_td->tips_dasar()->get() as $td)
                            <div class="col-sm-6 col-lg-4 all pizza">
                                <div class="box">
                                    <div>
                                        <div class="">
                                            <img src="{{ asset('storage/public/tipsdasar' . $td->foto) }}" width="100%"
                                                height="50%" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <a href="{{ route('artikel') }} " class="text-white">
                                                <h4>
                                                    {{ $td->judul }}
                                                </h4>
                                            </a>
                                            <br>
                                            <div class="dotted">
                                                <div class="options">
                                                    <h6>
                                                        <button
                                                            class="black-border-button  ">{{ $td->kategori_tipsdasar->nama_kategori }}</button>
                                                    </h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach

                </div>
            </div>

        </div>
    </section>

    <!-- end food section -->

    <!-- footer section -->
    <footer class="footer_section">
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
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- popper js -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <!-- isotope js -->
    <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
    </script>
    <!-- End Google Map -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#searchtips').select2();
        });
    </script>
</body>

</html>
