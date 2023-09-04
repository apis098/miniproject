@extends('template.nav')
@section('content')
@section('content-header')
    <!-- slider section -->
    <section class="slider_section">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6">
                                <div class="detail-box mt-5">
                                    <h3 class="text-poppins"><b>
                                            Resep - Resep Terpopuler</b>
                                    </h3>
                                    <p>
                                        HummaCook adalah online media portal
                                        yang menyajikan kumpulan aneka resep masakan
                                        untuk menginspirasi para pehobi masak.
                                        Menyajikan resep-resep rumahan yang mudah
                                        dibuat oleh semua orang, dan bahan-bahan
                                        masakan yang mudah didapatkan.
                                    </p>
                                    <a href="{{ route('resep.home') }}"
                                        class="zoom-effects btn btn-light mt-2 rounded-5 btn-lg"
                                        style="padding: 6px 22px;
                                        background-color: #ffff;
                                        color: #f39c12;
                                        border-radius: 12px;
                                        border: none; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Lihat
                                        Resep</a>

                                    <div class="col-md-10" style="margin-left: -20px">
                                        <div
                                            style="display: flex; align-items: center; justify-content: flex-start; margin-top: 25px;">
                                           @foreach ($foto_resep as $item)

                                           <img src="{{ asset('storage/'.$item->foto_resep) }}" alt="" class="rounded-circle" width="50px" height="50px"
                                               style="margin-right: -14px;">
                                           @endforeach

                                        </div>
                                    </div>

                                  <div class="ms-1" style="display: flex; align-items: center;">
                                      <p class="fw-bold"
                                          style="margin-left: em; margin-bottom: 0.5em; color: white; font-size: 16px; font-family: Poppins; font-weight: 400; letter-spacing: 0.48px; word-wrap: break-word">
                                          @if ($jumlah_resep <= 10)
                                          {{ $jumlah_resep }}
                                          @elseif($jumlah_resep > 10)
                                          {{ floor($jumlah_resep/10)*10  }}+
                                          @endif
                                          resep</p>
                                  </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div style="text-align: right;">
                                    <img src="{{ asset('images/landingpage.png') }}" alt="Gambar Contoh"
                                        style="width: 90%; max-width: 500px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </section>
    <!-- end slider section -->
@endsection

<!-- offer section -->

<section class="container mt-5 mb-5">

    <div class=" input-group">
        <div class="">
            <h3 class="fw-bold ml-3">Resep populer</h3>
        </div>
        <div class="ms-auto me-5">
            {{ $real_reseps->links('vendor.pagination.simple-default') }}
        </div>
    </div>
    @if ($real_reseps->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row container mt-4">
        @foreach ($real_reseps as $num => $item)
            <div class="col-lg-4 mb-3">
                <div class="p-3" style="border-radius: 12px; border: 1px solid grey;">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('storage/' . $item->foto_resep) }}" class="rounded-circle" width="100%"
                                height="100%" alt="">
                        </div>
                        <div class="col-7">
                            <span style="font-weight: 600;" class="my-1">{{ $item->nama_resep }}</span> <br>
                            <div class="d-flex flex-row my-2">
                                <div class="">
                                    @if ($item->User->foto)
                                        <img src="{{ asset('storage/' . $item->User->foto) }}" width="30px"
                                            height="30px" style="border-radius: 50%;" alt="">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="" width="30px"
                                            height="30px" style="border-radius: 50%">
                                    @endif
                                </div> &nbsp;
                                <div class="mt-1">
                                    <span>{{ $item->User->name }}</span>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-6 my-2">
                                    <img src="{{ asset('images/🦆 icon _trophy_.svg') }}" style="" width="15px"
                                        alt="">
                                    Top {{ $num + 1 + ($real_reseps->currentPage() - 1)  * $real_reseps->perPage() }}
                                </div>
                                <div class="col-6">
                                    <form action="/artikel/{{ $item->id }}/{{ $item->nama_resep }}"
                                        method="get">
                                        <button type="submit" class="btn btn-light"
                                            style="background-color: #f39c12; border-radius: 12px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                            <span style="font-weight: 600; color: white;">Lihat</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<!-- end offer section -->

<!-- about section -->


<!-- end about section -->

<!-- book section -->
<section class="book_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-6 ms-3">
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
                            <h1
                                style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #333;">
                                Apa keluhanmu saat memasak?
                            </h1>

                            <p class="text-secondary">kami akan berusaha mencarikan solusi.</p>
                        </div>
                        <div>
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Keluhan" />
                        </div>
                        <div>
                            <textarea class="form-control" id="description" name="description" placeholder="Deskripsi"></textarea>
                        </div>
                        <div>
                            <button
                            style="background-color: #f39c12; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                type="submit">
                                <b>Kirim</b>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col ms-5">
                <div>
                    <img src="{{ asset('images/home.png') }}" alt="Gambar Contoh"
                        style="width: 110%; margin-top: -20%;">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end book section -->
<div class="row ms-1 mb-4 me-1" style="margin-top: -4%;">
    <div class="ms-5 input-group">
        <div class="ms-1">
            <h3 class="fw-bold">Keluhan Pengguna</h3>
        </div>
        <div class="ms-auto me-5">
            {{$complaints->links('vendor.pagination.simple-default')}}
        </div>
    </div>
</div>
@if ($complaints->count() == 0)
    <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
        <img src="images/data.png" style="width: 15em">
        <p><b>Tidak ada data</b></p>
    </div>
@endif

<div class="container mb-5">
    <div class="row mb-5">
        @foreach ($complaints as $item)
            <div class="col-lg-4">
                <div class="card p-0" style=" border-radius: 15px; border: 1px black solid">
                    <div class="card-body ">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-primary">
                                    <img class="widget-49-date-primary" style="border:1.5px black solid"
                                        src="{{ asset('images/default.jpg') }}"alt="">
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title fw-bolder">{{ $item->user->name }}</span>
                                    <small class="text-secondary"><i>{{ $item->user->email }}</i></small>
                                </div>
                            </div>
                            <div class="mt-3 ms-1">
                                <p>
                                    <b>
                                        <a style="color: black;" href="/show-reply-by/{{ $item->id }}">
                                            {{ $item->subject }}
                                        </a>
                                    </b><br>

                                    <small>
                                        {{ Str::limit($item->description, 100, '...') }}
                                    </small>

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--  --}}
    </div>
</div>

<style>
    .text-poppins {
        font-family: 'Poppins';
    }

    .card-margin {
        margin-bottom: 1.875rem;
        height: ;
    }

    .card {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e6e4e9;
        border-radius: 8px;
    }

    .card .card-header.no-border {
        border: 0;
    }

    .card .card-header {
        background: none;
        padding: 0 0.9375rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        min-height: 50px;
    }

    .card-header:first-child {
        border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
    }

    .widget-49 .widget-49-title-wrapper {
        display: flex;
        align-items: center;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #edf1fc;
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fcfcfd;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
        color: #dde1e9;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
        color: #dde1e9;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #e8faf8;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
        color: #17d1bd;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
        color: #17d1bd;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebf7ff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
        color: #36afff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
        color: #36afff;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: floralwhite;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
        color: #FFC868;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
        color: #FFC868;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #feeeef;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
        color: #F95062;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
        color: #F95062;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fefeff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
        color: #f7f9fa;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
        color: #f7f9fa;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebedee;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
        color: #394856;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
        color: #394856;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #f0fafb;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
        color: #68CBD7;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
        color: #68CBD7;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
        display: flex;
        flex-direction: column;
        margin-left: 1rem;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
        color: #3c4142;
        font-size: 14px;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
        color: #B1BAC5;
        font-size: 13px;
    }

    .widget-49 .widget-49-meeting-points {
        font-weight: 400;
        font-size: 13px;
        margin-top: .5rem;
        margin-left: -10%;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item {
        display: list-item;
        color: #727686;
    }
</style>
{{-- <section class="content mt-5">
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
    </section> --}}
@endsection
