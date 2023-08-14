@extends('template.nav')
@section('content')
    @section('content-header')
    <!-- slider section -->
    <section class="slider_section ">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container ">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 ">
                                <div class="detail-box mt-5">
                                    <h3 class="text-poppins"><b>
                                        Resep - Resep Terpopuler</b>
                                    </h3>
                                    <p>
                                        HummaCook adalah online media portal 
                                        yang menyajikan kumpulan aneka resep masakan
                                        untuk menginspirasi para pehobi masak.
                                        Menyajikan resep-resep  rumahan yang mudah 
                                        dibuat oleh semua orang, dan bahan-bahan 
                                        masakan yang mudah didapatkan.
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
    @endsection

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

    <!-- book section -->
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
                                <h1 style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #333;">
                                    Ajukan keluhanmu saat memasak
                                </h1>

                                <p class="text-secondary">kami akan berusaha mencarikan solusi.</p>
                            </div>
                            <div>
                                <input type="text" class="form-control" id="subject" name="subject"
                                    placeholder="Keluhan"/>
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
                <div class="col-md-6">
                    <div>
                        <img src="{{ asset('images/home.jpg') }}" alt="Gambar Contoh" style="width: 100%; margin-top: -15%">
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end book section -->

    <style>
        .text-poppins{
            font-family: 'Poppins';
        }
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
                                                <small class="card-meta mb-2 text-dark">{{ $row->description }}</small><br>
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
@endsection
