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
                                <span style="margin-left: -70px;">
                                    HummaCook
                                </span>
                            </a>
                            @else
                            <a class="navbar-brand" href="{{ url('koki/index') }}">
                                <span style="margin-left: -70px;">
                                    HummaCook
                                </span>
                            </a>
                            @endif
                        @else
                        <a class="navbar-brand" href="#">
                            <span style="margin-left: -70px;">
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
                                <li class="nav-item active" style="margin-left: -140px; font-size: 15px;">
                                    <a class="nav-link" href="{{ route('home') }}">Home <span
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
                                <li class="nav-item" style="font-size: 15px">
                                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                                </li>
                                {{-- <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">Login</a>
                      </li> --}}
                            </ul>
                            <div class="user_option">


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
        <!-- slider section -->
        <section class="slider_section ">
            <div id="customCarousel1" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Resep - Resep Terpopuler
                                        </h1>
                                        <p>
                                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                            mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                            labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Lihat Resep
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Resep - Resep Terpopuler
                                        </h1>
                                        <p>
                                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                            mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                            labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Lihat Resep
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="container ">
                            <div class="row">
                                <div class="col-md-7 col-lg-6 ">
                                    <div class="detail-box">
                                        <h1>
                                            Resep - Resep Terpopuler
                                        </h1>
                                        <p>
                                            Doloremque, itaque aperiam facilis rerum, commodi, temporibus sapiente ad
                                            mollitia laborum quam quisquam esse error unde. Tempora ex doloremque,
                                            labore, sunt repellat dolore, iste magni quos nihil ducimus libero ipsam.
                                        </p>
                                        <div class="btn-box">
                                            <a href="" class="btn1">
                                                Lihat Resep
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <ol class="carousel-indicators">
                        <li data-target="#customCarousel1" data-slide-to="0" class="active"></li>
                        <li data-target="#customCarousel1" data-slide-to="1"></li>
                        <li data-target="#customCarousel1" data-slide-to="2"></li>
                    </ol>
                </div>
            </div>

        </section>
        <!-- end slider section -->
    </div>


    <!-- offer section -->

    <section class="offer_section layout_padding-bottom">
        <div class="offer_container">
            <div class="container ">
                <div class="row">
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="images/o1.jpg" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Tasty Thursdays
                                </h5>
                                <h6>
                                    <span>20%</span> Off
                                </h6>
                                <a href="">
                                    Lihat Resep
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6  ">
                        <div class="box ">
                            <div class="img-box">
                                <img src="images/o2.jpg" alt="">
                            </div>
                            <div class="detail-box">
                                <h5>
                                    Pizza Days
                                </h5>
                                <h6>
                                    <span>15%</span> Off
                                </h6>
                                <a href="">
                                    Lihat Resep
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- end offer section -->

    <!-- food section -->


    <!-- food section -->

    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Search Resep By Ingredients
                </h2>
            </div>

            <form action="/" method="post">
                @csrf
                <select name="bahan" id="searchbahan" class="form-control">
                    <option value=""></option>
                    @foreach ($bahan_masakan as $item_bahan)
                        <option value="{{ $item_bahan->id }}">{{ $item_bahan->kategori_bahan }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary my-2">Search</button>
            </form>

            <div class="filters-content">
                <div class="row grid">
                    @foreach ($reseps as $resep)
                        @foreach ($resep->resep as $r)
                            <div class="col-sm-6 col-lg-4 all pizza">
                                <div class="box">
                                    <div>
                                        <div class="">
                                            <img src="{{ asset('storage/' . $r->foto_masakan) }}" width="100%"
                                                height="50%" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <a href="{{ route('artikel') }} " class="text-white">
                                                <h4>
                                                    {{ $r->nama_masakan }}
                                                </h4>
                                            </a>
                                            <br>
                                            <div class="dotted">
                                                <div class="options">
                                                    <h6>
                                                        @foreach ($r->kategori_bahan as $kb)
                                                            <button
                                                                class="black-border-button btn-sm">{{ $kb->kategori_bahan }}</button>
                                                        @endforeach
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
            <div class="btn-box">
                <a href="">
                    View More
                </a>
            </div>
        </div>
    </section>

    <!-- end food section -->


    <!-- end food section -->

    <!-- about section -->

    @foreach ($about as $a)
        <section class="about_section layout_padding">
            <div class="container  ">
                <div class="row">
                    <div class="col-md-6 ">
                        <div class="img-box">
                            <img src="images/about-img.png" alt="">
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
                                {{ $a->isi }}
                            </p>
                            <a href="">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
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
        <div class="heading_container heading_center psudo_white_primary mb_45">
            <h2>
                Keluhan Pengguna lain
            </h2>
        </div>
        <section class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col text-center mb-5">
                    </div>
                </div>
                <div class="row">

                    @foreach ($complaints as $row)
                        <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                            <div class="card text-dark card-has-bg click-col"
                                style="background-image:url('https://source.unsplash.com/600x900/?food');">
                                <img class="card-img d-none" src="https://source.unsplash.com/600x900/?food"
                                    alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                                <div class="card-img-overlay d-flex flex-column">
                                    <div class="card-body">
                                        <small class="card-meta mb-2 text-dark"><b>{{ $row->subject }}</b></small>
                                        <h4 class="card-title mt-0 "><a class="text-dark"
                                                href="https://creativemanner.com">{{ $row->description }}</a></h4>
                                        <small><i class="far fa-clock"></i> October 15, 2020</small>
                                    </div>
                                    <div class="card-footer">
                                        <div class="media">
                                            <img class="mr-3 rounded-circle"
                                                src="{{ asset('images/default-profile2.png') }}" alt="profile image"
                                                style="max-width:50px">
                                            <div class="media-body">
                                                <h6 class="my-0 text-dark d-block">{{ $row->user->name }}</h6>
                                                <small>Director of UI/UX</small>
                                            </div>
                                            <div>
                                                <a href="{{route('ShowReplies.show',$row->id)}}"
                                                    class="btn btn-warning btn-sm text-light rounded-3"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="32"
                                                        height="32" viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z" />
                                                    </svg></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
        </section>
        <!-- client section -->
        <section class="client_section layout_padding-bottom">
            <div class="container">
                <div class="heading_container heading_center psudo_white_primary mb_45">
                    <h2>
                        Testimoni
                    </h2>
                </div>
                <div class="carousel-wrap row ">
                    <div class="owl-carousel client_owl-carousel">
                        <div class="item">
                            <div class="box">
                                <div class="detail-box">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                    </p>
                                    <h6>
                                        Moana Michell
                                    </h6>
                                    <p>
                                        magna aliqua
                                    </p>
                                </div>
                                <div class="img-box">
                                    <img src="images/client1.jpg" alt="" class="box-img">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="box">
                                <div class="detail-box">
                                    <p>
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam
                                    </p>
                                    <h6>
                                        Mike Hamell
                                    </h6>
                                    <p>
                                        magna aliqua
                                    </p>
                                </div>
                                <div class="img-box">
                                    <img src="images/client2.jpg" alt="" class="box-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

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
