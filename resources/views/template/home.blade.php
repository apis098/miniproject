@extends('template.nav')
@section('content')
@section('content-header')
    @if (Auth::check())
        <script>
            function userAccessFeedPrem(num, num2) {
                $.ajax({
                    url: "/pemasukan-koki/" + num + "/{{ Auth::user()->id }}/" + num2 + "/feed",
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                });
            }
        </script>
    @endif
    <!-- slider section -->
    <section class="slider_section" style="padding:1%">
        <div id="customCarousel1" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7 col-lg-6 mt-5">
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
                                <div style="text-align: right; margin-top:-16%;">
                                    <img src="{{ asset('images/group 161.png') }}" alt="Gambar Contoh"
                                        style="width: 100%; height:100%">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </section>
    <!-- end slider section -->
@endsection

<section class="m-5">

    <div class=" input-group">
        <div class="">
            <h3 class="fw-bold ml-3">Resep Premium Terfavorit</h3>
        </div>
    </div>
    @if ($resep_premium_favorite->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row mt-4">
        @foreach ($resep_premium_favorite as $num => $resep)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="p-3" style="border-radius: 12px; border: 1px solid grey;">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('storage/' . $resep->foto_resep) }}" class="rounded-circle" width="100px"
                                Favorit height="100px" alt="">
                                <button id="buttonPremium" type="button"
                                style="position: absolute;  right: 75%; background-color:#F7941E; "
                                class="btn btn-sm text-light rounded-circle p-1" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop{{ $num }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                    viewBox="0 0 20 20">
                                    <g fill="currentColor">
                                        <path fill-rule="evenodd"
                                            d="m14.896 13.818l1.515-5.766l-2.214 1.41a2 2 0 0 1-2.74-.578L10 6.695l-1.458 2.19a2 2 0 0 1-2.74.577L3.59 8.052l1.515 5.766h9.792Zm-10.77-6.61c-.767-.489-1.736.218-1.505 1.098l1.516 5.766a1 1 0 0 0 .967.746h9.792a1 1 0 0 0 .967-.746l1.516-5.766c.23-.88-.738-1.586-1.505-1.098l-2.214 1.41a1 1 0 0 1-1.37-.288l-1.458-2.19a1 1 0 0 0-1.664 0L7.71 8.33a1 1 0 0 1-1.37.289l-2.214-1.41Z"
                                            clip-rule="evenodd" />
                                        <path
                                            d="M10.944 3.945a.945.945 0 1 1-1.89.002a.945.945 0 0 1 1.89-.002ZM18.5 5.836a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Zm-15.111 0a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Z" />
                                        <path fill-rule="evenodd"
                                            d="M5.25 16a.5.5 0 0 1 .5-.5h8.737a.5.5 0 1 1 0 1H5.75a.5.5 0 0 1-.5-.5Z"
                                            clip-rule="evenodd" />
                                    </g>
                                </svg>
                            </button>
                        </div>
                        <div class="col-7">
                            <span style="font-weight: 600;" class="my-1">{{ $resep->nama_resep }}</span> <br>
                            <div class="d-flex flex-row my-2">
                                <div class="">
                                    @if ($resep->User->foto)
                                        <img src="{{ asset('storage/' . $resep->User->foto) }}" width="30px"
                                            height="30px" style="border-radius: 50%;" alt="">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="" width="30px"
                                            height="30px" style="border-radius: 50%">
                                    @endif
                                </div> &nbsp;
                                <div class="mt-1">
                                    <span>{{ $resep->User->name }}</span>
                                </div>
                            </div>
                            <div class="row my-1">
                                <div class="col-6 my-2">
                                    <img src="{{ asset('images/🦆 icon _trophy_.svg') }}" style="" width="15px"
                                        alt="">
                                    Top {{ $num += 1 }}
                                </div>
                                <div class="col-6">
                                    <form action="" method="get">
                                        <a href="/artikel/{{ $resep->id }}/{{ $resep->nama_resep }}"
                                            class="btn btn-light"
                                            style="background-color: #f39c12; border-radius: 12px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border:none;">
                                            <span style="font-weight: 600; color: white;">Lihat</span>
                                        </a>
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

<section class="m-5">
    <div class=" input-group">
        <h3 class="fw-bold ml-3 mb-3 mx-3">Feed Premium Terfavorit</h3>
    </div>
    @if ($feed_premium_favorite->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row">
        @foreach ($feed_premium_favorite as $num => $feed)
            <div class="col-md-4 mb-3">
                <div class="card" style="border-radius: 15px;">
                    <div class="" style="border-radius: 15px 15px 0 0;">
                        @if (Auth::check())
                            @if ($feed->AuthenticateFeedPremium(Auth::user()->id, $feed->id))
                                <video class="video-js vjs-theme-city" style="border-radius: 15px 15px 0 0;"
                                    onclick="userAccessFeedPrem({{ $feed->user->id }}, {{ $feed->id }})"
                                    id="my-video" controls preload="auto" width="100%" height="100%"
                                    data-setup="{}">
                                    <source src="{{ asset('storage/' . $feed->upload_video) }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                            HTML5
                                            video</a>
                                    </p>
                                </video>
                            @else
                                <video style="border-radius: 15px 15px 0 0;"
                                    @if ($feed->isPremium === 'yes') class="video-js vjs-theme-city feed"
                                @else class="video-js vjs-theme-city" @endif
                                    id="my-video" controls preload="auto" width="100%" height="100%"
                                    data-setup="{}">
                                    <source src="{{ asset('storage/' . $feed->upload_video) }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                            HTML5
                                            video</a>
                                    </p>
                                </video>
                            @endif
                        @else
                            <video style="border-radius: 15px 15px 0 0"
                                @if ($feed->isPremium === 'yes') class="video-js vjs-theme-city feed"
                            @else class="video-js vjs-theme-city" @endif
                                id="my-video" controls preload="auto" width="100%" height="100%"
                                data-setup="{}">
                                <source src="{{ asset('storage/' . $feed->upload_video) }}" type="video/mp4" />
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        @endif
                        <!-- Ikon "Top 1" di belakang -->
                        <div class="card-body"
                            style="border-bottom: 1px solid #000 ;border-left:1px solid #000; border-right:1px solid #000; border-radius: 0 0 15px 15px;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex justify-content-start">
                                        @if ($feed->User->foto)
                                            <img src="{{ asset('storage/' . $feed->User->foto) }}" width="30px"
                                                height="30px" style="border-radius: 50%;" alt="">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" alt=""
                                                width="30px" height="30px" style="border-radius: 50%">
                                        @endif
                                        &nbsp;
                                        <div class="text-center">
                                            <span>{{ $feed->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end">
                                        <svg width="23" height="20" viewBox="0 0 29 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;trophy&#34;">
                                                <path id="Vector"
                                                    d="M23.0625 3.6444V4.1444H23.5625H28.5V7.28879C28.5 10.0346 26.2872 12.2554 23.5625 12.2554C23.0478 12.2554 22.5492 12.1744 22.0815 12.027L21.731 11.9166L21.521 12.2181C20.2832 13.9951 18.3989 15.2804 16.2127 15.7258L15.8125 15.8073V16.2157V21.8646V22.3646H16.3125H18.125C19.6805 22.3646 20.9728 23.5077 21.2108 25.009H7.78921C8.02718 23.5077 9.31951 22.3646 10.875 22.3646H12.6875H13.1875V21.8646V16.2157V15.8073L12.7873 15.7258C10.6009 15.2803 8.71496 13.9949 7.47921 12.2184L7.26852 11.9155L6.91697 12.0275C6.45122 12.1759 5.95504 12.2554 5.4375 12.2554C2.71284 12.2554 0.5 10.0346 0.5 7.28879V4.1444H5.4375H5.9375V3.6444V0.5H23.0625V3.6444ZM5.4375 11.0924H5.9375V11.0565C5.9987 11.0483 6.0592 11.0388 6.11886 11.028L6.71123 10.9213L6.49765 10.3585C6.13637 9.4066 5.9375 8.37151 5.9375 7.28879V5.46659V4.96659H5.4375H2.15144H1.65144V5.46659V7.28879C1.65144 9.38479 3.34834 11.0924 5.4375 11.0924ZM22.5022 10.3606L22.2891 10.9232L22.8811 11.0298C23.0991 11.0691 23.3264 11.0924 23.5625 11.0924C25.6538 11.0924 27.3486 9.38261 27.3486 7.28879V5.46842V4.96842H26.8486H23.5625H23.0625V5.46842V7.29061C23.0625 8.37319 22.8637 9.40655 22.5022 10.3606Z"
                                                    stroke="black" />
                                            </g>
                                        </svg>
                                        &nbsp;
                                        Top {{ $num += 1 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>

<br><br>
<!-- offer section -->

<section class="m-5">

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
    <div class="row mt-4">
        @foreach ($real_reseps as $num => $item)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="p-3" style="border-radius: 12px; border: 1px solid grey;">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('storage/' . $item->foto_resep) }}" class="rounded-circle"
                                width="100px" Favorit height="100px" alt="">
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
                                    <img src="{{ asset('images/🦆 icon _trophy_.svg') }}" style=""
                                        width="15px" alt="">
                                    Top {{ $num + 1 }}
                                </div>
                                <div class="col-6">
                                    <form action="/artikel/{{ $item->id }}/{{ $item->nama_resep }}"
                                        method="get">
                                        <button type="submit" class="btn btn-light"
                                            style="background-color: #f39c12; border-radius: 12px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border:none;">
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

<section class="m-5">

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
    <div class="row  mt-4">
        @foreach ($favorite_resep as $num => $item)
            <div class="col-lg-4 col-md-6 col-sm-6 mb-3">
                <div class="p-3" style="border-radius: 12px; border: 1px solid grey;">
                    <div class="row">
                        <div class="col-5">
                            <img src="{{ asset('storage/' . $item->foto_resep) }}" class="rounded-circle"
                                width="100px" height="100px" alt="">
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
                                    <img src="{{ asset('images/🦆 icon _trophy_.svg') }}" style=""
                                        width="15px" alt="">
                                    Top {{ $num + 1 }}
                                </div>
                                <div class="col-6">
                                    <form action="/artikel/{{ $item->id }}/{{ $item->nama_resep }}"
                                        method="get">
                                        <button type="submit" class="btn btn-light"
                                            style="background-color: #f39c12; border-radius: 12px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border:none;">
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
<section class="m-5">
    <div class="input-group">
        <div class="mx-3">
            <h3 class="fw-bold">Koki terpopuler</h3>
        </div>
    </div>
    @if ($top_users->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row text-center mx-1">
        @foreach ($top_users as $iu)
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="bg-white shadow-sm py-4 px-4 border border-secondary"
                    style="border-radius: 20px; height:25rem;">
                    @if ($iu->foto)
                        <img src="{{ asset('storage/' . $iu->foto) }}" alt="" width="50%" height="50%"
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
                            {{ $iu->resep->count() }} Resep
                        </p>
                    </div>
                    <div class="d-flex justify-content-center mt-1 me-3">
                        <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M13 14.062V22H4a8 8 0 0 1 9-7.938ZM12 13c-3.315 0-6-2.685-6-6s2.685-6 6-6s6 2.685 6 6s-2.685 6-6 6Zm5.793 6.914l3.535-3.535l1.415 1.414l-4.95 4.95l-3.536-3.536l1.415-1.414l2.12 2.121Z" />
                        </svg>
                        <p class="mt-2 ms-1">
                            {{ $iu->followers }} pengikut
                        </p>
                    </div>
                    <div class="justify-content-center">
                        @if (Auth::check())
                            <form id="followForm" action="{{ route('Followers.store', $iu->id) }}" method="POST">
                                @csrf
                                @if (Auth::check() &&
                                        $iu->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                    <button type="submit" id="follow-button"
                                        class="btn follow-btn text-light float-center mt-3 mb-3 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 text-status me-3">Batal ikuti</b></button>
                                @elseif(Auth::check() &&
                                        $userLogin->followers()->where('follower_id', $iu->id)->exists())
                                    <button type="submit" id="follow-button"
                                        class="btn follow-btn text-light float-center mt-3 mb-3 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 text-status me-3">Ikuti balik</b></button>
                                @else
                                    <button type="submit" id="follow-button"
                                        class="btn follow-btn text-light float-center mt-3 mb-3 zoom-effects"
                                        style="background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"><b
                                            class="ms-3 text-status me-3">Ikuti</b></button>
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
            </div>
        @endforeach
    </div>
</section>

{{-- end koki terpopuler --}}

<style>
    .btn-custom {
        width: 100%;
        /* Atur lebar tetap untuk tombol */
        padding: 20px;
        /* Atur padding agar tombol terlihat bagus */
        text-align: center;
        /* Pusatkan teks di dalam tombol */
        border: none;
        background: white;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 15px;
        color: #F7941E;
        font-size: 18px;
        font-family: Poppins;
        font-weight: 500;
        word-wrap: break-word;

    }


    @media (min-width: 319px) and (max-width:896px) {
        .marginku {
            margin-left: 2rem;
            margin-right: 2rem;
        }

        .container-fluid {
            padding: 10% 2%;
        }

        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
        }

    }


    /* tampilan untuk iPad */
    @media (min-width: 768px) and (max-width: 1024px) {

        .marginku {
            margin-left: 3rem;
        }

        .container-fluid {
            padding: 10% 2%;
        }

        .btn-custom {
            width: 100%;
            margin-bottom: 10px;
        }

    }



    /* tampilan untuk laptop */
    @media (min-width: 1025px) and (max-width: 1440px) {
        .marginku {
            margin-left: 4rem;
        }

    }


    /* tampilan untuk PC yang lebih besar */
    @media (min-width: 1441px) {
        .marginku {
            margin-left: 12rem;
        }
    }
</style>
<div class="container-fluid" style="background: #F7941E; border-radius: 15px">
    <div class="mx-5 py-5">
        <div class="input-group">
            <h3 class="fw-bold" style="color: white; font-family: poppins">Kategori makanan</h3>
        </div>
        <div class="">
            <p style="color: white; font-family: poppins">Berikut beberapa kategori makanan kami yang mungkin menarik
                bagi anda.</p>
        </div>

        @if ($categories_foods->count() == 0)
            <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
                <img src="images/data.png" style="width: 15em">
                <p style="color: white"><b>Tidak ada data</b></p>
            </div>
        @endif
        <div class="row">
            @foreach ($categories_foods as $cf)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-3">
                    <!-- Each button takes up 1/3 of the container width on larger screens -->
                    <button class="btn-custom btn-lg w-100"
                        style="background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; color: #F7941E;">
                        <a href="/resep?jenis_makanan[]={{ $cf->nama_makanan }}" class="text-dark">
                            {{ $cf->nama_makanan }}
                        </a>
                    </button>
                </div>
            @endforeach
        </div>
    </div>
</div>


{{-- start resep terbaru --}}
<section class="m-5">
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
    <div class="row mx-1">
        @foreach ($recipes as $num => $item)
            <div class="col-lg-4 mb-3 col-sm-12 col-md-6">
                <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                    <div class="card-header my-3 mx-auto" style="background-color: white">
                        <img width="220px" class="rounded-circle" height="260px"
                            style="border: 0.50px black solid; max-width:260px;"
                            src="{{ asset('storage/' . $item->foto_resep) }}" />
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5>
                                    <a style="color: black; font-size: 24px;"
                                        href="/artikel/{{ $item->id }}/{{ $item->nama_resep }}">
                                        {{ $item->nama_resep }}
                                    </a>
                                </h5>
                                <span>Oleh {{ $item->User->name }}</span> <br>
                                <p class="mt-3">RP. {{ number_format($item->pengeluaran_memasak, 2, ',', '.') }}</p>
                            </div>
                            <div class="col-12 row mb-3">
                                <div class="col-6 mx-auto">
                                    <img width="20px" height="20px"
                                        src="{{ asset('images/🦆 icon _thumbs up_.svg') }}" alt="">
                                    {{ $item->likes }} suka
                                </div>
                                <div class="col-6 mx-auto">
                                    <img width="20px" height="20px"
                                        src="{{ asset('images/🦆 icon _time_.svg') }}" alt="">
                                    @if ($item->lama_memasak >= 60)
                                        {{ number_format($item->lama_memasak / 60, 1) }} jam
                                    @else
                                        {{ $item->lama_memasak }} menit
                                    @endif
                                </div>
                                <div class="col-6 my-2">
                                    <img width="20px" height="20px"
                                        src="{{ asset('images/🦆 icon _comment square chat message_.svg') }}"
                                        alt="">
                                    {{ $item->comment_recipes->count() }} Komentar
                                </div>
                                <div class="col-6 my-2">
                                    <img width="20px" height="20px"
                                        src="{{ asset('images/🦆 icon _bookmark save_.svg') }}" alt="">
                                    {{ $item->favorite_count }} Favorit
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</section>


{{-- start feed populer  --}}
<section class="m-5">
    <div class=" input-group">
        <h3 class="fw-bold ml-3 mb-3 mx-3">Feed Populer Minggu ini</h3>
    </div>
    @if ($feed_populer->count() == 0)
        <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
            <img src="images/data.png" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="row">
        @foreach ($feed_populer as $num => $feed)
            <div class="col-md-4 mb-3">
                <div class="card" style="border-radius: 15px;">
                    <div class="" style="border-radius: 15px 15px 0 0;">
                        @if (Auth::check())
                            @if ($feed->AuthenticateFeedPremium(Auth::user()->id, $feed->id))
                                <video class="video-js vjs-theme-city" style="border-radius: 15px 15px 0 0;"
                                    onclick="userAccessFeedPrem({{ $feed->user->id }}, {{ $feed->id }})"
                                    id="my-video" controls preload="auto" width="100%" height="100%"
                                    data-setup="{}">
                                    <source src="{{ asset('storage/' . $feed->upload_video) }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                            HTML5
                                            video</a>
                                    </p>
                                </video>
                            @else
                                <video style="border-radius: 15px 15px 0 0;"
                                    @if ($feed->isPremium === 'yes') class="video-js vjs-theme-city feed"
                                @else class="video-js vjs-theme-city" @endif
                                    id="my-video" controls preload="auto" width="100%" height="100%"
                                    data-setup="{}">
                                    <source src="{{ asset('storage/' . $feed->upload_video) }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                            HTML5
                                            video</a>
                                    </p>
                                </video>
                            @endif
                        @else
                            <video style="border-radius: 15px 15px 0 0"
                                @if ($feed->isPremium === 'yes') class="video-js vjs-theme-city feed"
                            @else class="video-js vjs-theme-city" @endif
                                id="my-video" controls preload="auto" width="100%" height="100%"
                                data-setup="{}">
                                <source src="{{ asset('storage/' . $feed->upload_video) }}" type="video/mp4" />
                                <p class="vjs-no-js">
                                    To view this video please enable JavaScript, and consider upgrading to a
                                    web browser that
                                    <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                        video</a>
                                </p>
                            </video>
                        @endif
                        <!-- Ikon "Top 1" di belakang -->
                        <div class="card-body"
                            style="border-bottom: 1px solid #000 ;border-left:1px solid #000; border-right:1px solid #000; border-radius: 0 0 15px 15px;">
                            <div class="row">
                                <div class="col-6">
                                    <div class="d-flex justify-content-start">
                                        @if ($feed->User->foto)
                                            <img src="{{ asset('storage/' . $feed->User->foto) }}" width="30px"
                                                height="30px" style="border-radius: 50%;" alt="">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" alt=""
                                                width="30px" height="30px" style="border-radius: 50%">
                                        @endif
                                        &nbsp;
                                        <div class="text-center">
                                            <span>{{ $feed->user->name }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="d-flex justify-content-end">
                                        <svg width="23" height="20" viewBox="0 0 29 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;trophy&#34;">
                                                <path id="Vector"
                                                    d="M23.0625 3.6444V4.1444H23.5625H28.5V7.28879C28.5 10.0346 26.2872 12.2554 23.5625 12.2554C23.0478 12.2554 22.5492 12.1744 22.0815 12.027L21.731 11.9166L21.521 12.2181C20.2832 13.9951 18.3989 15.2804 16.2127 15.7258L15.8125 15.8073V16.2157V21.8646V22.3646H16.3125H18.125C19.6805 22.3646 20.9728 23.5077 21.2108 25.009H7.78921C8.02718 23.5077 9.31951 22.3646 10.875 22.3646H12.6875H13.1875V21.8646V16.2157V15.8073L12.7873 15.7258C10.6009 15.2803 8.71496 13.9949 7.47921 12.2184L7.26852 11.9155L6.91697 12.0275C6.45122 12.1759 5.95504 12.2554 5.4375 12.2554C2.71284 12.2554 0.5 10.0346 0.5 7.28879V4.1444H5.4375H5.9375V3.6444V0.5H23.0625V3.6444ZM5.4375 11.0924H5.9375V11.0565C5.9987 11.0483 6.0592 11.0388 6.11886 11.028L6.71123 10.9213L6.49765 10.3585C6.13637 9.4066 5.9375 8.37151 5.9375 7.28879V5.46659V4.96659H5.4375H2.15144H1.65144V5.46659V7.28879C1.65144 9.38479 3.34834 11.0924 5.4375 11.0924ZM22.5022 10.3606L22.2891 10.9232L22.8811 11.0298C23.0991 11.0691 23.3264 11.0924 23.5625 11.0924C25.6538 11.0924 27.3486 9.38261 27.3486 7.28879V5.46842V4.96842H26.8486H23.5625H23.0625V5.46842V7.29061C23.0625 8.37319 22.8637 9.40655 22.5022 10.3606Z"
                                                    stroke="black" />
                                            </g>
                                        </svg>
                                        &nbsp;
                                        Top {{ $num += 1 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
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
<!-- about section -->
<section class="m-5">
    <div class="row">
        <div class="col-md-6 my-5">
            <div class="detail-box mx-3">
                <div class="heading_container">
                    <h2 style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;">
                        Tentang Kami
                    </h2>
                </div>
                <p class="mt-4">
                    Selamat Datang di HummaCook! HummaCook adalah online
                    media portal yang menyajikan kumpulan aneka resep masakan
                    untuk menginspirasi para pehobi masak. Menyajikan resep-resep
                    rumahan yang mudah dibuat oleh semua orang, dan
                    bahan-bahan masakan yang mudah didapatkan. Resep-resep
                    ditulis oleh teman-teman food blogger seantero Nusantara yang
                    sudah berpengalaman di bidang masak memasak. Harapan
                    kami semua orang bisa memasak dengan mudah dan berhasil,
                    supaya dapat disajikan dengan sempurna untuk keluarga
                    tercinta. Semua resep di sini telah teruji dapur dan foto yang
                    ditampilkan adalah original/hasil aslinya. Terima Kasih.
                </p>
                {{-- <a href="">
                            Baca Selengkapnya
                        </a> --}}
            </div>
        </div>
        <div class="col-md-6">
            <div class="img-box">
                <img src="{{ asset('images/tentang.png') }}" alt=""
                    style="max-width: 100%; margin-top: -10%">
            </div>
        </div>
    </div>
</section>
<!-- end about section -->
<script>
    function harusLogin() {
        iziToast.show({
            backgroundColor: 'red',
            title: '<i class="fa-solid fa-triangle-exclamation"></i>',
            titleColor: 'white',
            messageColor: 'white',
            message: 'Anda Harus Login Dulu!',
            position: 'topCenter',
            close: false
        });
    }
    document.addEventListener("DOMContentLoaded", function() {
        const followForm = document.querySelectorAll("#followForm");

        followForm.forEach(form => {
            form.addEventListener("submit", async function(event) {
                event.preventDefault();

                const button = form.querySelector(".text-status");

                const response = await fetch(form.action, {
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                });

                if (response.ok) {
                    const responseData = await response.json();
                    if (responseData.followed) {
                        // Reset button color and SVG here
                        button.textContent = "Batal ikuti";
                        // document.getElementById("like-count-" + responseData.resep_id)
                        //     .textContent = responseData.likes;
                        // Modify SVG appearance if needed
                    } else {
                        // Update button color and SVG here
                        if (responseData.hisFollowing) {
                            button.textContent = "Ikuti balik";
                        } else {
                            button.textContent = "Ikuti";
                        }
                    }
                }
            });
        });
    });
</script>
<button hidden id="buttonPremiums" type="button" style="position: absolute;  right: 70%; background-color:#F7941E; "
    class="btn btn-sm text-light rounded-circle p-2" data-bs-toggle="modal" data-bs-target="#staticBackdrops">
    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 20 20">
        <g fill="currentColor">
            <path fill-rule="evenodd"
                d="m14.896 13.818l1.515-5.766l-2.214 1.41a2 2 0 0 1-2.74-.578L10 6.695l-1.458 2.19a2 2 0 0 1-2.74.577L3.59 8.052l1.515 5.766h9.792Zm-10.77-6.61c-.767-.489-1.736.218-1.505 1.098l1.516 5.766a1 1 0 0 0 .967.746h9.792a1 1 0 0 0 .967-.746l1.516-5.766c.23-.88-.738-1.586-1.505-1.098l-2.214 1.41a1 1 0 0 1-1.37-.288l-1.458-2.19a1 1 0 0 0-1.664 0L7.71 8.33a1 1 0 0 1-1.37.289l-2.214-1.41Z"
                clip-rule="evenodd" />
            <path
                d="M10.944 3.945a.945.945 0 1 1-1.89.002a.945.945 0 0 1 1.89-.002ZM18.5 5.836a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Zm-15.111 0a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Z" />
            <path fill-rule="evenodd" d="M5.25 16a.5.5 0 0 1 .5-.5h8.737a.5.5 0 1 1 0 1H5.75a.5.5 0 0 1-.5-.5Z"
                clip-rule="evenodd" />
        </g>
    </svg>
</button>
<!-- Modal untuk penawaran premium -->
<div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px">
            <div class="modal-body" style="border-radius: 15px;">
                <button type="button" style="margin-left: 96%;" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close">
                </button>

                <div class="row">
                    <div class="text-center">
                        <img src="{{ asset('images/crown-prem.png') }}"
                            style="height: 100%; width: 100%; {{-- position: absolute; left: -15%; top: -11%;  --}}">

                    </div>
                    <div class="text-black text-center">
                        <h2 class="mb-3 text-bold" style="font-family:poppins">Upgrade ke premium</h2>

                        <span class="intro-2">
                            Upgrade ke premium sekarang juga untuk membuka akses ke resep resep premium kami.</span>

                        <div class="mt-4 mb-5">
                            <a href="{{ route('penawaran.premium') }}" class="btn"
                                style="font-family:poppins;border-radius:15px;background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color:#ffffff;">Lihat
                                lebih lanjut</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // mengambil semua class pada video dengan nilai feed yang hanya ada di video premium
    let videoPremium = document.querySelectorAll(".feed");
    // dilakukan forEach karena untuk mengatasi ada banyak video dengan class feed
    videoPremium.forEach(video => {
        // addEventListener timeupdate ini untuk memberikan event setiap detiknya video berputar
        video.addEventListener("timeupdate", function() {
            // video.currentTime ini untuk mengambil data sudah berapa lama video berputar
            // video.duration untuk mendapatkan total waktu video.
            let time = video.duration * 0.1;
            if (video.currentTime > time) {
                // jika sudah lebih dari 5 detik maka video di pause
                video.pause();
                video.currentTime = 0;
                // membuka modal penawaran premium
                $("#buttonPremiums").click();
            }
        });
    });
</script>
@endsection
