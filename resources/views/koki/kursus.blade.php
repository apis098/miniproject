@extends('layouts.nav_koki')
@section('konten')
    <!-- Load Leaflet from CDN-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet"></script>

    <!-- Esri Leaflet Geocoder -->
    <link rel="stylesheet" href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css" />
    <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <style>
        /* Gaya untuk tombol "Cari" */
        .zoom-effects {
            margin-left: 10px;
            /* Tambahkan jarak antara input dan tombol */
            /* Selain itu, Anda dapat menambahkan properti lain sesuai keinginan Anda */
        }

        .intro-1 {
            font-size: 20px
        }

        .close {
            color: #fff
        }

        .close:hover {
            color: #fff
        }

        .intro-2 {
            font-size: 13px
        }

        .ah {
            background-color: #fff;
        }

        .garis {
            border-bottom: #F7941E 2px solid;
        }


        .search {
            background-color: #fff;
            padding: 0px 15px;
            border-radius: 5px;
            width: 76%;
            height: 10%;
            border-radius: 15px;
            border: 0.50px black solid;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 25px;
            padding-right: 10px;
            border-right: 2px solid #eee
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-1 i {
            position: absolute;
            top: 12px;
            left: 5px;
            font-size: 24px;
            color: #eee
        }

        ::placeholder {
            color: #eee;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 100%;
        }

        .search-2 input {
            height: 35px;
            border: none;
            border-radius: 15px;
            width: 100%;



        }

        .search-2 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        /* button{
                                                            background-color: #F7941E;
                                                            border: none;
                                                            height: 45px;
                                                            width: 90px;
                                                            color: #ffffff;
                                                            position: absolute;
                                                            right: 1px;
                                                            top: 0px;
                                                            border-radius: 15px
                                                        } */
        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 24px;
            color: #eee
        }

        .cari {
            position: absolute;
            top: -2px;
            border: none;
            height: 38px;
            background-color: #F7941E;
            color: #fff;
            margin-left: -6%;
            width: 90px;
            box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
            border-radius: 15px;
        }

        .cari2 {
            position: absolute;
            top: -2px;
            right: -20px;
            border: none;
            height: 38px;
            background-color: #F7941E;
            color: #fff;
            width: 60px;
            box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
            border-radius: 15px;
        }

        @media (min-width:320) (max-width:768px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 1px
            }

            .search-2 button {
                height: 37px;
                left: 57%;
                width: 20px;
            }

            .cari2 {
                right: 16px;
            }
        }

        @media(max-width: 578px) {
            .tab {
                width: 50%;
                text-align: center;
            }
        }

        @media(max-width: 375px) {
            .btn-search {
                font-size: 10px;
            }
        }

        @media(max-width: 320px) {
            .tab a h5 {
                font-size: 16px;
            }

            .btn-search {
                font-size: 8px;
            }
        }

        .judul-kursus {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;


            @supports (-webkit-line-clamp: 2) {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: initial;
                display: -webkit-box;
                -webkit-line-clamp: 2;
                -webkit-box-orient: vertical;
            }
        }

        @media(max-width: 578px) {
            .ul_kursus li a h5 {
                text-align: center;
            }

            .tab {
                width: 30%;
            }

            .ul_kursus {
                display: flex;
                justify-content: center;
            }

            .searchkursus {
                margin-left: 20px;
                margin-right: 20px;
            }

            .daftarkursus {
                margin-left: 20px;
                margin-right: 20px;
            }
        }

        @media(min-width: 579px) {
            .ul_kursus {
                margin-left: 50px;
                margin-right: 50px;
            }

            .tab-content {
                margin-left: 50px;
                margin-right: 50px;
            }

            .searchkursus {
                margin-left: 50px;
                margin-right: 50px;
            }

            .daftarkursus {
                margin-left: 50px;
                margin-right: 50px;
            }
        }
    </style>

    <div class="">
        <div class="my-4">
            <ul class="nav mb-2 ul_kursus" id="pills-tab" role="tablist">
                <li class="tab" role="presentation">
                    <a id="click1" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Dibuat</h5>
                        <div id="border1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="tab" role="presentation" hidden>
                    <a id="c" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Disukai</h5>
                        <div id="b" style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
                        </div>
                    </a>
                </li>

                <li class="tab" role="presentation">
                    <a id="a-tab" class="nav-link" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Favorit</h5>
                        <div id="pp" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="tab" role="presentation">
                    <a id="fer" class="nav-link" id="pills-kita-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-kita" type="button" role="tab" aria-controls="pills-kita"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Dipesan</h5>
                        <div id="border5" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>
            </ul>

            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="mt-1">
                        <div class="d-flex justify-content-center searchkursus">
                            <div class="search-1" style="border: 1px solid black;border-radius: 15px;height:50px">
                                <div class="search-2" style="height: 100%"> <i class='bx bxs-map'></i>
                                    <form action="" method="GET" style="height: 100%">
                                        <input type="text" id="search-resep-sendiri" name="resep" autofocus
                                            style="height: 100%" placeholder="Cari Kursusmu">
                                        <button type="submit" class=" zoom-effects cari2" style="height: 53px;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg></button>
                                    </form>
                                </div>
                            </div>
                            <button
                                style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                class="btn btn-sm btn-search ml-4">
                                <span style="font-weight: 600">
                                    <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                        Kursus</a>
                                </span>
                            </button>
                        </div>
                    </div>
                    {{-- start tab 1 --}}
                    @if ($kursus_sendiri->count() < 1)
                        <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
                            <img src="{{ asset('images/data.png') }}" style="width: 15em">
                            <p><b>Tidak ada kursus</b></p>
                        </div>
                    @endif
                    <div class="row daftarkursus" id="myCourse">
                        @foreach ($kursus_sendiri as $mycourse)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="my-3 myCourse" style="border-radius:15px">
                                    <div class="card">
                                        <div class=" " style="max-height:120px; min-height:120px;">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}"
                                                class="card-img-top"
                                                style="max-width:100%; object-fit: cover; max-height:120px; min-height:120px;  width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body"
                                            style="padding: 0.7rem 0.7rem 0 0.7rem;  min-height:125px; max-height:125px">
                                            <div class="mx-1 ">
                                                <span class="d-flex justify-content-between">
                                                    <span>
                                                        @foreach ($mycourse->jenis_kursus as $item)
                                                            {{ $item->jenis_kursus }}
                                                        @endforeach
                                                    </span>
                                                    @if ($mycourse->status === 'ditunggu')
                                                        <div class="d-flex gap-1 px-1 "
                                                            style="border:1px solid gray; align-items: center; border-radius:15px; color: white; background-color:gray; opacity: 50%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 48 48">
                                                                <defs>
                                                                    <mask id="ipSAlarmClock0">
                                                                        <g fill="none" stroke-linejoin="round"
                                                                            stroke-width="4">
                                                                            <path fill="#fff" stroke="#fff"
                                                                                d="M24 44.333c10.125 0 18.333-8.208 18.333-18.333c0-10.125-8.208-18.333-18.333-18.333C13.875 7.667 5.667 15.875 5.667 26c0 10.125 8.208 18.333 18.333 18.333Z" />
                                                                            <path stroke="#000" stroke-linecap="round"
                                                                                d="m23.76 15.354l-.002 11.008l7.773 7.773" />
                                                                            <path stroke="#fff" stroke-linecap="round"
                                                                                d="m4 9l7-5m33 5l-7-5" />
                                                                        </g>
                                                                    </mask>
                                                                </defs>
                                                                <path fill="currentColor" d="M0 0h48v48H0z"
                                                                    mask="url(#ipSAlarmClock0)" />
                                                            </svg>
                                                            <span class="fw-bold" style="font-size: 12px">Menunggu</span>
                                                        </div>
                                                    @elseif ($mycourse->status === 'diterima')
                                                        <div class="d-flex gap-1 px-1 "
                                                            style="border:1px solid #21BE8D; align-items: center; border-radius:15px; color: white; background-color:#21BE8D; opacity: 100%;">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 48 48">
                                                                <mask id="ipSCheckCorrect0">
                                                                    <g fill="none">
                                                                        <g stroke="#fff" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-width="4"
                                                                            clip-path="url(#ipSCheckCorrect1)">
                                                                            <path
                                                                                d="M42 20v19a3 3 0 0 1-3 3H9a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3h21" />
                                                                            <path d="m16 20l10 8L41 7" />
                                                                        </g>
                                                                        <defs>
                                                                            <clipPath id="ipSCheckCorrect1">
                                                                                <path fill="#000" d="M0 0h48v48H0z" />
                                                                            </clipPath>
                                                                        </defs>
                                                                    </g>
                                                                </mask>
                                                                <path fill="currentColor" d="M0 0h48v48H0z"
                                                                    mask="url(#ipSCheckCorrect0)" />
                                                            </svg>
                                                            <span class="fw-bold" style="font-size: 12px">Diterima</span>
                                                        </div>
                                                    @endif
                                                </span>
                                                @if ($mycourse->status === 'diterima')
                                                    <a href="{{ route('detail.kursus', $mycourse->id) }}"
                                                        class="btn judul-kursus text-break pt-0 pb-0 pl-0 text-start fw-bold"
                                                        style="font-family: poppins;border:none; min-height:53px; max-height:53px">
                                                        {{ $mycourse->nama_kursus }}
                                                    </a>
                                                @else
                                                    <a href="#"
                                                        class="btn judul-kursus text-break pl-0  text-start fw-bold"
                                                        style="font-family: poppins;border:none;">
                                                        {{ $mycourse->nama_kursus }}
                                                    </a>
                                                @endif
                                                <div class="d-flex justify-content-between" style="float: right;">
                                                    @if ($mycourse->status === 'diterima')
                                                        <a href="{{ route('koki.user', $mycourse->id) }}"
                                                            class="btn  mr-2"
                                                            style="display: flex; background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;height:30px; align-items: center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="25" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M11 12q-1.65 0-2.825-1.175T7 8q0-1.65 1.175-2.825T11 4q1.65 0 2.825 1.175T15 8q0 1.65-1.175 2.825T11 12Zm10.4 10.8l-2.5-2.5q-.525.3-1.125.5T16.5 21q-1.875 0-3.187-1.313T12 16.5q0-1.875 1.313-3.188T16.5 12q1.875 0 3.188 1.313T21 16.5q0 .675-.2 1.275t-.5 1.125l2.5 2.5q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275ZM16.5 19q1.05 0 1.775-.725T19 16.5q0-1.05-.725-1.775T16.5 14q-1.05 0-1.775.725T14 16.5q0 1.05.725 1.775T16.5 19ZM5 20q-.825 0-1.413-.588T3 18v-.775q0-.85.425-1.575t1.175-1.1q1.275-.65 2.875-1.1t3.55-.45q-.5.775-.763 1.663T10 16.5q0 .925.263 1.813T11.024 20H5Z" />
                                                            </svg>
                                                        </a>
                                                        <a href="{{ route('koki.content', $mycourse->id) }}"
                                                            class="btn "
                                                            style="display: flex; background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; height:30px; align-items: center">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2v-6Z" />
                                                            </svg>
                                                            <span>Konten</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#search-resep-sendiri').on("input", function() {
                            let value = $(this).val().toLowerCase();
                            $(".myCourse").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                            });
                        });
                    });
                </script>
                {{--
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
          tabindex="0">
          <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
            <div class="d-flex">
              <div class="search-1" style="border: 1px solid black;border-radius:15px;height:50px">

                <div class="search-2"> <i class='bx bxs-map'></i>
                  <form action="/admin/laporan-pengguna" method="GET">
                    <input type="text" id="search-resep" name="resep" autofocus placeholder="Cari Kursusmu">
                    <button type="submit" class=" zoom-effects cari2" style="height: 53px;"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                        <path fill="currentColor"
                          d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                      </svg></button>
                  </form>
                </div>
              </div>
              <button
                style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                class="btn btn-sm btn-search ml-4">
                <span style="font-weight: 600">
                  <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                    Kursus</a>
                </span>
              </button>
            </div>
          </div>
          @if ($kursus_sendiri->count() < 1)
            <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif

          <div class="row" id="myCourse">
            @foreach ($kursus_disukai as $mycourse)
              <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                <div class="my-3 myCourse" style="border-radius:15px">
                  <div class="card">
                    <div class=" " style="max-height:120px; min-height:120px;">
                      <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}" class="card-img-top"
                        style="max-width:100%; object-fit: cover; max-height:120px; min-height:120px;  width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                        alt="...">
                    </div>
                    <div class="card-body" style="padding: 0.7rem 0.7rem 0 0.7rem;  min-height:125px; max-height:125px">
                      <div class="mx-1 ">
                        <span class="d-flex justify-content-between">
                          <span>
                            @foreach ($mycourse->jenis_kursus as $item)
                              {{ $item->jenis_kursus }}
                            @endforeach
                          </span>
                          @if ($mycourse->status === 'ditunggu')
                            <div class="d-flex gap-1 px-1 "
                              style="border:1px solid gray; align-items: center; border-radius:15px; color: white; background-color:gray; opacity: 50%;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 48 48">
                                <defs>
                                  <mask id="ipSAlarmClock0">
                                    <g fill="none" stroke-linejoin="round" stroke-width="4">
                                      <path fill="#fff" stroke="#fff"
                                        d="M24 44.333c10.125 0 18.333-8.208 18.333-18.333c0-10.125-8.208-18.333-18.333-18.333C13.875 7.667 5.667 15.875 5.667 26c0 10.125 8.208 18.333 18.333 18.333Z" />
                                      <path stroke="#000" stroke-linecap="round"
                                        d="m23.76 15.354l-.002 11.008l7.773 7.773" />
                                      <path stroke="#fff" stroke-linecap="round" d="m4 9l7-5m33 5l-7-5" />
                                    </g>
                                  </mask>
                                </defs>
                                <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSAlarmClock0)" />
                              </svg>
                              <span class="fw-bold" style="font-size: 12px">Menunggu</span>
                            </div>
                          @elseif ($mycourse->status === 'diterima')
                            <div class="d-flex gap-1 px-1 "
                              style="border:1px solid #21BE8D; align-items: center; border-radius:15px; color: white; background-color:#21BE8D; opacity: 100%;">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 48 48">
                                <mask id="ipSCheckCorrect0">
                                  <g fill="none">
                                    <g stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="4"
                                      clip-path="url(#ipSCheckCorrect1)">
                                      <path d="M42 20v19a3 3 0 0 1-3 3H9a3 3 0 0 1-3-3V9a3 3 0 0 1 3-3h21" />
                                      <path d="m16 20l10 8L41 7" />
                                    </g>
                                    <defs>
                                      <clipPath id="ipSCheckCorrect1">
                                        <path fill="#000" d="M0 0h48v48H0z" />
                                      </clipPath>
                                    </defs>
                                  </g>
                                </mask>
                                <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSCheckCorrect0)" />
                              </svg>
                              <span class="fw-bold" style="font-size: 12px">Diterima</span>
                            </div>
                          @endif
                        </span>
                        @if ($mycourse->status === 'diterima')
                          <a href="{{ route('detail.kursus', $mycourse->id) }}"
                            class="btn judul-kursus text-break pt-0 pb-0 pl-0 text-start fw-bold"
                            style="font-family: poppins;border:none; min-height:53px; max-height:53px">
                            {{ $mycourse->nama_kursus }}
                          </a>
                        @else
                          <a href="#" class="btn judul-kursus text-break pl-0  text-start fw-bold"
                            style="font-family: poppins;border:none;">
                            {{ $mycourse->nama_kursus }}
                          </a>
                        @endif
                        <div class="d-flex justify-content-between" style="float: right;">
                          @if ($mycourse->status === 'diterima')
                            <a href="{{ route('koki.user', $mycourse->id) }}" class="btn  mr-2"
                              style="display: flex; background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;height:30px; align-items: center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25"
                                viewBox="0 0 24 24">
                                <path fill="currentColor"
                                  d="M11 12q-1.65 0-2.825-1.175T7 8q0-1.65 1.175-2.825T11 4q1.65 0 2.825 1.175T15 8q0 1.65-1.175 2.825T11 12Zm10.4 10.8l-2.5-2.5q-.525.3-1.125.5T16.5 21q-1.875 0-3.187-1.313T12 16.5q0-1.875 1.313-3.188T16.5 12q1.875 0 3.188 1.313T21 16.5q0 .675-.2 1.275t-.5 1.125l2.5 2.5q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275ZM16.5 19q1.05 0 1.775-.725T19 16.5q0-1.05-.725-1.775T16.5 14q-1.05 0-1.775.725T14 16.5q0 1.05.725 1.775T16.5 19ZM5 20q-.825 0-1.413-.588T3 18v-.775q0-.85.425-1.575t1.175-1.1q1.275-.65 2.875-1.1t3.55-.45q-.5.775-.763 1.663T10 16.5q0 .925.263 1.813T11.024 20H5Z" />
                              </svg>
                            </a>
                            <a href="{{ route('koki.content', $mycourse->id) }}" class="btn "
                              style="display: flex; background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; height:30px; align-items: center">
                              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" d="M11 13H5v-2h6V5h2v6h6v2h-6v6h-2v-6Z" />
                              </svg>
                              <span>Konten</span>
                            </a>
                          @endif
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>
        --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    {{-- start tab 3 --}}
                    <div class="mt-1">
                        <div class="d-flex justify-content-center searchkursus">
                            <div class="search-1" style="border: 1px solid black;border-radius:15px;height:50px;">
                                <div class="search-2"> <i class='bx bxs-map'></i>
                                    <form action="/admin/laporan-pengguna" method="GET">
                                        <input type="text" id="search-resep-favorit" name="resep" autofocus
                                            placeholder="Cari Kursusmu">
                                        <button type="submit" class=" zoom-effects cari2" style="height: 53px;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg></button>
                                    </form>
                                </div>
                            </div>
                            <button
                                style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                class="btn btn-sm btn-search ml-4">
                                <span style="font-weight: 600">
                                    <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                        Kursus</a>
                                </span>
                            </button>
                        </div>
                    </div>
                    @if ($kursus_disimpan->count() < 1)
                        <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
                            <img src="{{ asset('images/data.png') }}" style="width: 15em">
                            <p><b>Tidak ada data</b></p>
                        </div>
                    @endif
                    {{-- start tab 1 --}}
                    <div class="row daftarkursus">
                        @foreach ($kursus_disimpan as $mycourse)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="my-3 favoritCourse" style="border-radius:15px">
                                    <div class="card">
                                        <div class=" " style="max-height:120px; min-height:120px;">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}"
                                                class="card-img-top"
                                                style="max-width:100%; object-fit: cover; max-height:120px; min-height:120px;  width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body"
                                            style="padding: 0.7rem 0.7rem 0 0.7rem;  min-height:125px; max-height:125px">
                                            <div class="mx-1 ">
                                                <span class="d-flex justify-content-between">
                                                    <span>
                                                        @foreach ($mycourse->jenis_kursus as $item)
                                                            {{ $item->jenis_kursus }}
                                                        @endforeach
                                                    </span>
                                                </span>
                                                <a href="{{ route('detail.kursus', $mycourse->id) }}"
                                                    class="btn judul-kursus text-break pt-0 pb-0 pl-0 text-start fw-bold"
                                                    style="font-family: poppins;border:none; min-height:53px; max-height:53px">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#search-resep-favorit').on("input", function() {
                            let value = $(this).val().toLowerCase();
                            $(".favoritCourse").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                            });
                        });
                    });
                </script>

                <div class="tab-pane fade" id="pills-kita" role="tabpanel" aria-labelledby="pills-kita-tab"
                    tabindex="0">
                    {{-- start tab 3 --}}
                    <div class="mt-1">
                        <div class="d-flex justify-content-center searchkursus">
                            <div class="search-1" style="border-radius:15px; border:1px solid black;height:50px;">

                                <div class="search-2"> <i class='bx bxs-map'></i>
                                    <form action="/admin/laporan-pengguna" method="GET">
                                        <input type="text" id="search-resep-dipesan" name="resep" autofocus
                                            placeholder="Cari Kursusmu">
                                        <button type="submit" class=" zoom-effects cari2" style="height: 53px;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg></button>
                                    </form>
                                </div>

                            </div>
                            <button
                                style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                class="btn btn-sm btn-search ml-4">
                                <span style="font-weight: 600">
                                    <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                        Kursus</a>
                                </span>
                            </button>
                        </div>
                    </div>
                    {{-- start tab 1 --}}
                    @if ($kursus_dipesan->count() < 1)
                        <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
                            <img src="{{ asset('images/data.png') }}" style="width: 15em">
                            <p><b>Tidak ada data</b></p>
                        </div>
                    @endif
                    <div class="row daftarkursus">
                        @foreach ($kursus_dipesan as $mycourse)
                            <div class="col-sm-12 col-md-6 col-lg-4 col-xl-3">
                                <div class="my-3 kursusdipesan" style="border-radius:15px">
                                    <div class="card">
                                        <div class=" " style="max-height:120px; min-height:120px;">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}"
                                                class="card-img-top"
                                                style="max-width:100%; object-fit: cover; max-height:120px; min-height:120px;  width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body"
                                            style="padding: 0.7rem 0.7rem 0 0.7rem;  min-height:125px; max-height:125px">
                                            <div class="mx-1 ">
                                                <span class="d-flex justify-content-between">
                                                    <span>
                                                        @foreach ($mycourse->jenis_kursus as $item)
                                                            {{ $item->jenis_kursus }}
                                                        @endforeach
                                                    </span>
                                                    <button type="button" style="background-color:#F7941E;border:none;border-radius:15px;width:30px;">
                                                        <a href="/invoice-kursus/{{ $mycourse->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="15"
                                                            height="22" viewBox="0 0 384 512">
                                                            <path fill="#eee"
                                                                d="M64 0C28.7 0 0 28.7 0 64v384c0 35.3 28.7 64 64 64h256c35.3 0 64-28.7 64-64V160H256c-17.7 0-32-14.3-32-32V0H64zm192 0v128h128L256 0zM64 80c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm0 64c0-8.8 7.2-16 16-16h64c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm128 72c8.8 0 16 7.2 16 16v17.3c8.5 1.2 16.7 3.1 24.1 5.1c8.5 2.3 13.6 11 11.3 19.6s-11 13.6-19.6 11.3c-11.1-3-22-5.2-32.1-5.3c-8.4-.1-17.4 1.8-23.6 5.5c-5.7 3.4-8.1 7.3-8.1 12.8c0 3.7 1.3 6.5 7.3 10.1c6.9 4.1 16.6 7.1 29.2 10.9l.5.1c11.3 3.4 25.3 7.6 36.3 14.6c12.1 7.6 22.4 19.7 22.7 38.2c.3 19.3-9.6 33.3-22.9 41.6c-7.7 4.8-16.4 7.6-25.1 9.1V440c0 8.8-7.2 16-16 16s-16-7.2-16-16v-17.8c-11.2-2.1-21.7-5.7-30.9-8.9c-2.1-.7-4.2-1.4-6.2-2.1c-8.4-2.8-12.9-11.9-10.1-20.2s11.9-12.9 20.2-10.1c2.5.8 4.8 1.6 7.1 2.4c13.6 4.6 24.6 8.4 36.3 8.7c9.1.3 17.9-1.7 23.7-5.3c5.1-3.2 7.9-7.3 7.8-14c-.1-4.6-1.8-7.8-7.7-11.6c-6.8-4.3-16.5-7.4-29-11.2l-1.6-.5c-11-3.3-24.3-7.3-34.8-13.7c-12-7.2-22.6-18.9-22.7-37.3c-.1-19.4 10.8-32.8 23.8-40.5c7.5-4.4 15.8-7.2 24.1-8.7V232c0-8.8 7.2-16 16-16z" />
                                                        </svg>
                                                        </a>
                                                    </button>
                                                </span>
                                                <a href="{{ route('detail.kursus', $mycourse->id) }}"
                                                    class="btn judul-kursus text-break pt-0 pb-0 pl-0 text-start fw-bold"
                                                    style="font-family: poppins;border:none; min-height:53px; max-height:53px">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $('#search-resep-dipesan').on("input", function() {
                            let value = $(this).val().toLowerCase();
                            $(".kursusdipesan").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                            });
                        });
                    });
                </script>
            </div>
            {{-- end --}}
        </div>
    </div>
    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("c");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("b");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");
        const fer = document.getElementById("fer");
        const border5 = document.getElementById("border5");

        a_tab.addEventListener('click', function(event) {
            event.preventDefault();
            o.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
            border5.style.display = "none";
        });

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            o.style.display = "none";
            border5.style.display = "none";
        });

        click2.addEventListener("click", function(event) {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            o.style.display = "none";
            border5.style.display = "none";
        });

        fer.addEventListener("click", function(event) {
            event.preventDefault();
            border5.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
            o.style.display = "none";
        });
    </script>





    <!-- jQuery CDN -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>


    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        // $(document).ready(function() {
        //     $('#buttonModal').on('click', function() {
        //         var complaintId = $(this).data('complaint-id');

        //         $.ajax({
        //             url: '/show-reply-by/' + complaintId,
        //             type: 'GET',
        //             dataType: 'html',
        //             success: function(data) {
        //                 $('#replyData').html(data); // Memasukkan data balasan ke dalam modal
        //                 $('#repliesModal').modal('show'); // Menampilkan modal
        //             },
        //             error: function() {
        //                 // Tampilkan pesan error jika data balasan tidak berhasil dimuat
        //                 $('#replyData').html('<p>Failed to load replies.</p>');
        //                 $('#repliesModal').modal('show');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
