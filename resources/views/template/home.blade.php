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
        <div class="bg-box" style="background-color: #F7941E">

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

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
                                    <a class="nav-link dropbtn" href="{{ route('tips_dsr') }}">Tips Dasar</a>

                                </li>

                                <li class="nav-item dropdown" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('seputar_dpr') }}">Seputar Dapur</a>

                                </li>
                                <li class="nav-item dropdown me-2" style="font-size: 15px">
                                    <a class="nav-link dropbtn" href="{{ route('about') }}">Tentang</a>
                                </li>
                                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                      </li> --}}
                            </ul>
                            <div class="user_option" style="margin-left: 110px;">


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
            </div>
        </header>
        <!-- end header section -->
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box mt-4">
                                        <h1>
                                            Resep - Resep Terpopuler
                                        </h1>
                                        <p>
                                            HummaCook adalah online media portal yang menyajikan kumpulan aneka resep
                                            masakan untuk menginspirasi para pehobi masak. Menyajikan resep-resep
                                            rumahan yang mudah dibuat oleh semua orang, dan bahan-bahan masakan yang
                                            mudah didapatkan.
                                        </p>
                                        <div class="btn-box ">
                                            <br>
                                            {{-- <a href="{{ route('menu') }}" class="login" >Lihat Resep</a> --}}
                                        </div>
                                    
                                        <a href="{{ route('menu') }}" class="zoom-effects btn btn-light mt-2 rounded-5 btn-lg"
                                            style="padding: 6px 22px;
                                        background-color: #ffff;
                                        color: #f39c12;
                                        border-radius: 12px; border:none;">Lihat
                                            Resep</a>
                                        

                                        {{-- <a href="{{ route('menu') }}" style="" class="btn btn-light rounded-5 text-warning">
                                            Lihat Resep
                                        </a> --}}

                                        {{-- <div class="user_option" style="margin-top: 0px;">





                                    </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Resep - Resep Terpopuler
                                        </h1>
                                        <p>
                                            HummaCook adalah online media portal yang menyajikan kumpulan aneka resep
                                            masakan untuk menginspirasi para pehobi masak. Menyajikan resep-resep
                                            rumahan yang mudah dibuat oleh semua orang, dan bahan-bahan masakan yang
                                            mudah didapatkan.
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('menu') }}" class="btn1">
                                                Lihat Resep
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                        {{-- <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Resep - Resep Terpopuler
                                        </h1>
                                        <p>
                                            HummaCook adalah online media portal yang menyajikan kumpulan aneka resep
                                            masakan untuk menginspirasi para pehobi masak. Menyajikan resep-resep
                                            rumahan yang mudah dibuat oleh semua orang, dan bahan-bahan masakan yang
                                            mudah didapatkan.
                                        </p>
                                        <div class="btn-box">
                                            <a href="{{ route('menu') }}" class="btn1">
                                                Lihat Resep
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    </div>
                    {{-- <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div> --}}
                </div>

        </section>
        <!-- end slider section -->
    </div>


    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">

        <h2 class="text-center">Our Reseps For You!</h2>

        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    @foreach ($real_reseps as $r)
                        <div class="col-md-6  ">
                            <div class="box ">
                                <div class="img-box">
                                    <img src="{{ asset('storage/' . $r->foto_masakan) }}" alt="">
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        {{ $r->nama_masakan }}
                                    </h6>
                                    <h5>
                                        <span>Lihat Resep - Resep Lainnya</span>
                                    </h5>
                                    <br>
                                    <a href="{{ route('menu') }}">
                                        Lihat Resep
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    {{ $real_reseps->links() }}
                </div>
            </div>
        </div>
    </section>

    <!-- end offer section -->

    <!-- about section -->


    <!-- end about section -->

    <<!-- book section -->
        <section class="book_section layout_padding">
            <div class="container">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form_container">
                            @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                            @endif
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <form action="{{ route('ComplaintUser.store') }}" method="POST">
                                @csrf
                                <div class="heading_container">
                                    <h2>
                                        Ajukan keluhanmu saat memasak
                                    </h2>
                                    <p class="text-secondary">kami akan berusaha mencarikan solusi.</p>
                                </div>
                                <div>
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="Subject/Judul..." />
                                </div>
                                <div>
                                    <textarea class="form-control" id="description" name="description" placeholder="Deskripsi"></textarea>
                                </div>
                                <div>
                                    <button type="submit">
                                        Kirim <i class="fa-solid fa-paper-plane"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6" style="margin-top: -5%">
                        <div class="map_container ">
                            <img src="{{ asset('images/anoying2.jpg') }}" class="img-fluid" alt="Gambar Contoh">
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end book section -->

        <style>
            h1 {
                color: #fff;
            }

            .lead {
                color: #aaa;
            }

            .wrapper {
                margin: 10vh
            }


            .card {
                border: none;
                transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
                overflow: hidden;
                border-radius: 20px;
                min-height: 450px;
                box-shadow: 0 0 12px 0 rgba(0, 0, 0, 0.2);

                @media (max-width: 768px) {
                    min-height: 350px;
                }

                @media (max-width: 420px) {
                    min-height: 300px;
                }

                &.card-has-bg {
                    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
                    background-size: 120%;
                    background-repeat: no-repeat;
                    background-position: center center;

                    &:before {
                        content: '';
                        position: absolute;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        background: inherit;
                        -webkit-filter: grayscale(1);
                        -moz-filter: grayscale(100%);
                        -ms-filter: grayscale(100%);
                        -o-filter: grayscale(100%);
                        filter: grayscale(100%);
                    }

                    &:hover {
                        transform: scale(0.98);
                        box-shadow: 0 0 5px -2px rgba(0, 0, 0, 0.3);
                        background-size: 130%;
                        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

                        .card-img-overlay {
                            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                            background: rgb(255, 186, 33);
                            background: linear-gradient(0deg, rgba(255, 186, 33, 0.5) 0%, rgba(255, 186, 33, 1) 100%);
                        }
                    }
                }

                .card-footer {
                    background: none;
                    border-top: none;

                    .media {
                        img {
                            border: solid 3px rgba(255, 255, 255, 0.3);
                        }
                    }
                }

                .card-title {
                    font-weight: 800
                }

                .card-meta {
                    color: rgba(0, 0, 0, 0.3);
                    text-transform: uppercase;
                    font-weight: 500;
                    letter-spacing: 2px;
                }

                .card-body {
                    transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);


                }

                &:hover {
                    .card-body {
                        margin-top: 30px;
                        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                    }

                    cursor: pointer;
                    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                }

                .card-img-overlay {
                    transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
                    background: rgb(255, 186, 33);
                    background: linear-gradient(0deg, rgba(255, 186, 33, 0.3785889355742297) 0%, rgba(255, 186, 33, 1) 100%);
                }
            }

            @media (max-width: 767px) {}
        </style>

        <div class="heading_container heading_center psudo_white_primary mb_45 mb-5">
            <h2>
                Keluhan Pengguna
            </h2>
        </div>

        <section class="content mt-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-4 mb2">
                            </div>
                        </div>
                        <div class="row">

                            @foreach ($complaints as $row)
                                <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                    <div class="card text-dark card-has-bg click-col"
                                        style="background-image:url('https://source.unsplash.com/600x900/?food');">
                                        <img class="card-img d-none" src="https://source.unsplash.com/600x900/?food"
                                            alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                                        <table>
                                            <div class="card-img-overlay d-flex flex-column">
                                                <div class="card-body">
                                                    <small class="card-meta mb-2 text-dark"><b></b></small>
                                                    <h4 class="card-title mt-0 "><a class="text-dark"
                                                            href="{{ route('ShowReplies.show', $row->id) }}"><b>{{ $row->subject }}</b></a>
                                                    </h4>
                                                    <small
                                                        class="card-meta mb-2 text-dark">{{ $row->description }}</small><br>
                                                    <small><i class="far fa-clock"></i>
                                                        {{ $row->created_at->diffForHumans(['short' => false]) }}</small>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="media">
                                                        <img class="mr-3 rounded-circle"
                                                            src="{{ asset('images/default-profile2.png') }}"
                                                            alt="profile image" style="max-width:50px">
                                                        <div class="media-body">
                                                            <h6 class="my-0 text-dark d-block">{{ $row->user->name }}
                                                            </h6>
                                                            <small>{{ $row->user->email }}</small>
                                                        </div>
                                                        <div>
                                                            <a href="{{ route('ShowReplies.show', $row->id) }}"
                                                                class="btn btn-warning btn-sm text-light rounded-3"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="32"
                                                                    height="32" viewBox="0 0 24 24">
                                                                    <path fill="currentColor"
                                                                        d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z" />
                                                                </svg>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                </table>
                        </div>
                    </div>
                    @endforeach
        </section>
        <!-- client section -->

        @foreach ($about as $a)
            <section class="about_section layout_padding">
                <div class="container  ">
                    <div class="row">
                        <div class="col-md-6 ">
                            <div class="img-box">
                                <img src="images/koki.png" alt="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="detail-box">
                                <div class="heading_container">
                                    <h2>
                                        {{ $a->judul }}
                                    </h2>
                                </div>
                                <p>
                                    {!! $a->isi !!}
                                </p>
                                <a href="{{ route('about') }}">
                                    Baca Selengkapnya
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endforeach

        <!-- end client section -->

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
                $('#searchbahan').select2();
            });
        </script>
</body>

</html>
