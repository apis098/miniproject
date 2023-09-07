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
                                                <img src="{{ asset('storage/' . $item->foto_resep) }}" alt=""
                                                    class="rounded-circle" width="50px" height="50px"
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
                                                {{ floor($jumlah_resep / 10) * 10 }}+
                                            @endif
                                            resep
                                        </p>
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
            <h3 class="fw-bold ml-3">Resep populer minggu ini</h3>
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
                                    Top {{ $num + 1 }}
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

<section class="container mt-5 mb-5">

    <div class=" input-group">
        <div class="">
            <h3 class="fw-bold ml-3">Resep terfavorite minggu ini</h3>
        </div>
    </div>
    @if ($favorite_resep->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row container mt-4">
        @foreach ($favorite_resep as $num => $item)
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
                                    Top {{ $num + 1 }}
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


{{-- start koki terpopuler --}}
<section class="container mt-5 mb-5 mx-auto">
    <div class=" input-group">
        <div class="">
            <h3 class="fw-bold ml-3">Koki terpopuler</h3>
        </div>
    </div>
    @if ($top_users->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row text-center">
        @foreach ($top_users as $iu)
            <div class="col-xl-3 col-sm-4 mb-4 my-4">
                <div class="bg-white shadow-sm py-4 px-4 border border-secondary"
                    style="border-radius: 20px; height:25rem;">
                    @if ($iu->foto)
                    <img src="{{ asset('storage/'.$iu->foto) }}" alt="" width="50%" height="50%"
                    class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">  
                    @else
                    <img src="{{ asset('images/default.jpg') }}" alt="" width="50%" height="50%"
                    class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    @endif
                    <h5 class="mb-0">
                        @if (Auth::check())
                            @if (Auth::user()->id == $iu->id)
                            <a href="/koki/index" style="color: black">
                                {{ $iu->name }}
                                </a>    
                            @else
                            <a href="/profile-orang-lain/{{ $iu->id }}" style="color: black">
                                {{ $iu->name }}
                                </a>    
                            @endif
                        @else
                        <a href="/profile-orang-lain/{{ $iu->id }}" style="color: black">
                            {{ $iu->name }}
                            </a>   
                        @endif
                    </h5>
                    <span class="small text-muted">{{ $iu->email }}</span>
                    <div class="d-flex justify-content-center mt-3 me-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 256 256">
                            <path fill="currentColor"
                                d="M208 26H72a30 30 0 0 0-30 30v168a6 6 0 0 0 6 6h144a6 6 0 0 0 0-12H54v-2a18 18 0 0 1 18-18h136a6 6 0 0 0 6-6V32a6 6 0 0 0-6-6Zm-6 160H72a29.87 29.87 0 0 0-18 6V56a18 18 0 0 1 18-18h130Z" />
                        </svg>
                        <p class="mt-2 ms-1">
                            {{ $iu->resep->count() }} Resep</p>
                    </div>
                    <div class="d-flex justify-content-center mt-1 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13 14.062V22H4a8 8 0 0 1 9-7.938ZM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6s6 2.685 6 6s-2.685 6-6 6Zm5.793 6.914l3.535-3.535l1.415 1.414l-4.95 4.95l-3.536-3.536l1.415-1.414l2.12 2.121Z" />
                        </svg>
                        <p class="mt-2 ms-1">
                            {{ $iu->followers }} pengikut</p>
                    </div>
                    <div class="justify-content-center">
                        @if (Auth::check())
                        <form action="{{ route('Followers.store', $iu->id) }}" method="POST">
                            @csrf
                            @if (Auth::check() &&
                                    $iu->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                <button type="submit"
                                    class="btn text-light float-center mt-3 mb-3 zoom-effects"
                                    style="background-color: #F7941E; border-radius: 15px;"><b
                                        class="ms-3 me-3">Diikuti</b></button>
                            @elseif(Auth::check() &&
                                    $userLogin->followers()->where('follower_id', $iu->id)->exists())
                                <button type="submit"
                                    class="btn text-light float-center mt-3 mb-3 zoom-effects"
                                    style="background-color: #F7941E; border-radius: 15px;"><b
                                        class="ms-3 me-3">Ikuti balik</b></button>
                            @else
                                <button type="submit"
                                    class="btn text-light float-center mt-3 mb-3 zoom-effects"
                                    style="background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"><b
                                        class="ms-3 me-3">Ikuti</b></button>
                            @endif

                        </form>   
                        @else
                        <button type="button" onclick="harusLogin()"
                        class="btn text-light float-center mt-3 mb-3 zoom-effects"
                        style="background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"><b
                            class="ms-3 me-3">Ikuti</b></button>   
                        @endif
                    </div>
                </div>
                </a>
            </div>
        @endforeach
    </div>
</section>
{{-- end koki terpopuler --}}

<div class="container-fluid py-5 mb-5" style="width: 100%; height: 100%; background: #F7941E; border-radius: 25px">
    <div class=" input-group" style="margin-left:7rem">
        <h3 class="fw-bold ml-3" style="color:white;font-family:poppins">Kategori makanan</h3>
    </div>
    <div style="margin-left:8rem">
        <p style="color:white;font-family:poppins">Berikut beberapa kategori makanan kami yang mungkin menarik bagi
            anda.</p>
    </div>
    @if ($categories_foods->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row">
        <div style="margin-left: 8rem;">
            @foreach ($categories_foods as $cf)
                <button class="btn btn-lg col-lg-2 mb-3"
                    style="background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;color:#F7941E;">
                    <a href="/resep?jenis_makanan[]={{ $cf->nama_makanan }}" class="text-dark">
                        {{ $cf->nama_makanan }}
                    </a>
                </button>
            @endforeach
        </div>
    </div>
</div>

{{-- start resep terbaru --}}
<section class="container mt-5 mb-5">
    <div class=" input-group">
        <div class="">
            <h3 class="fw-bold ml-3 mb-5">Resep resep Terbaru</h3>
        </div>
    </div>
    @if ($recipes->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    @if ($recipes->count() >= 3)
        <div class="row">
            @foreach ($recipes as $num => $item)
                <div class="col-lg-4 mb-3 col-sm-12 col-md-6">
                    <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                        <div class="card-header my-3 mx-auto" style="background-color: white">
                            <img width="260px" class="rounded-circle" height="260px"
                                style="border: 0.50px black solid; max-width:260px;"
                                src="{{ asset('storage/' . $item->foto_resep) }}" />
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 mx-4" style="text-align: left;">
                                    <h5>
                                        <a style="color: black; font-size: 24px;"
                                            href="/artikel/{{ $item->id }}/{{ $item->nama_resep }}">
                                            {{ $item->nama_resep }}
                                        </a>
                                    </h5>
                                    <span>Oleh {{ $item->User->name }}</span> <br> <br>
                                    <span>RP.
                                        {{ number_format($item->pengeluaran_memasak, 2, ',', '.') }}</span>
                                </div>
                                <div class="col-12 row mx-2 my-3">
                                    <div class="col-6 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26.31"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-dasharray="80"
                                                stroke-dashoffset="80" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="M7 11L12 3L15 4L14 10H21V13L18 20H7H3V11H7V20">
                                                <animate fill="freeze" attributeName="stroke-dashoffset"
                                                    dur="0.8s" values="80;0" />
                                            </path>
                                        </svg>
                                        {{ $item->likes }} suka
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27.7"
                                            viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M15 1H9v2h6V1zm-4 13h2V8h-2v6zm8.03-6.61l1.42-1.42c-.43-.51-.9-.99-1.41-1.41l-1.42 1.42A8.962 8.962 0 0 0 12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9a8.994 8.994 0 0 0 7.03-14.61zM12 20c-3.87 0-7-3.13-7-7s3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7z" />
                                        </svg>
                                        @if ($item->lama_memasak >= 60)
                                            {{ $item->lama_memasak / 60 }} jam
                                        @else
                                            {{ $item->lama_memasak }} menit
                                        @endif
                                    </div>
                                    <div class="d-flex">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27.7"
                                            viewBox="0 0 24 24">
                                            <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                stroke-linejoin="round" stroke-width="2"
                                                d="M12 19c5.523 0 10-3.582 10-8s-4.477-8-10-8S2 6.582 2 11c0 2.157 1.067 4.114 2.801 5.553C4.271 18.65 3 20 2 21c3 0 4.527-.979 6.32-2.559c1.14.36 2.38.559 3.68.559z" />
                                        </svg>
                                        <span class="mx-2">
                                            {{ $item->comment_recipes->count() + $item->reply_comment_recipe->count() }}
                                            Komentar
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        @foreach ($recipes as $item)
            <div class="col-lg-4 mb-3 col-sm-12 col-md-6">
                <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                    <div class="card-header my-3 mx-auto" style="background-color: white">
                        <img width="260px" class="rounded-circle" height="260px"
                            style="border: 0.50px black solid; max-width:260px;"
                            src="{{ asset('storage/' . $item->foto_resep) }}" /> 
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 mx-4" style="text-align: left;">
                                <h5>
                                    <a style="color: black; font-size: 24px;"
                                        href="/artikel/{{ $item->id }}/{{ $item->nama_resep }}">
                                        {{ $item->nama_resep }}
                                    </a>
                                </h5>
                                <span>Oleh {{ $item->User->name }}</span> <br> <br>
                                <span>RP.
                                    {{ number_format($item->pengeluaran_memasak, 2, ',', '.') }}</span>
                            </div>
                            <div class="col-12 row  my-3">
                                <div class="col-6 mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="26.31"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-dasharray="80"
                                            stroke-dashoffset="80" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M7 11L12 3L15 4L14 10H21V13L18 20H7H3V11H7V20">
                                            <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.8s"
                                                values="80;0" />
                                        </path>
                                    </svg>
                                    {{ $item->likes }} suka
                                </div>
                                <div class="col-6 mx-auto">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27.7"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M15 1H9v2h6V1zm-4 13h2V8h-2v6zm8.03-6.61l1.42-1.42c-.43-.51-.9-.99-1.41-1.41l-1.42 1.42A8.962 8.962 0 0 0 12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9a8.994 8.994 0 0 0 7.03-14.61zM12 20c-3.87 0-7-3.13-7-7s3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7z" />
                                    </svg>
                                    @if ($item->lama_memasak >= 60)
                                        {{ $item->lama_memasak / 60 }} jam
                                    @else
                                        {{ $item->lama_memasak }} menit
                                    @endif
                                </div>
                                <div class="d-flex mx-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27.7"
                                        viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="2"
                                            d="M12 19c5.523 0 10-3.582 10-8s-4.477-8-10-8S2 6.582 2 11c0 2.157 1.067 4.114 2.801 5.553C4.271 18.65 3 20 2 21c3 0 4.527-.979 6.32-2.559c1.14.36 2.38.559 3.68.559z" />
                                    </svg>
                                    <span class="mx-2">
                                        {{ $item->comment_recipes->count() + $item->reply_comment_recipe->count() }}
                                        Komentar
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
</section>

<!-- book section -->
{{-- <section class="book_section layout_padding">
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
</section> --}}
<!-- end book section -->
{{-- <div class="row ms-1 mb-4 me-1" style="margin-top: -4%;">
    <div class="ms-5 input-group">
        <div class="ms-1">
            <h3 class="fw-bold">Keluhan Pengguna</h3>
        </div>
        <div class="ms-auto me-5">
            {{$complaints->links('vendor.pagination.simple-default')}}
        </div>
    </div>
</div> --}}
{{-- @if ($complaints->count() == 0)
    <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
        <img src="images/data.png" style="width: 15em">
        <p><b>Tidak ada data</b></p>
    </div>
@endif --}}

{{-- <div class="container mb-5">
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

    </div>
</div> --}}

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
    <script>
        function harusLogin() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda Harus Login Dulu!',
                position: 'topCenter',
            });
        }
    </script>
@endsection
