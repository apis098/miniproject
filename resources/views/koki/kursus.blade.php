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
            width: 90px;
            box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
            border-radius: 15px;
        }

        @media (max-width:800px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>

    <div class="">
        <div class="my-4 ml-5">
            <ul class="nav mb-2" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Kursus Dibuat</h5>
                        <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Disukai</h5>
                        <div id="b" class="ms-" style="width: 100%; height: 100%; border: 1px #F7941E solid;"
                            hidden>
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="a-tab" class="nav-link mr-5" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Disimpan</h5>
                        <div id="pp" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="fer" class="nav-link mr-5" id="pills-kita-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-kita" type="button" role="tab" aria-controls="pills-kita"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Dipesan</h5>
                        <div id="border5" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>
            </ul>

            {{-- <div class="container my-3">
                <div class="row mr-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="search mx-2" style="border-radius: 15px; border: 0.50px black solid;">
                            <div class="col-lg-12">
                                <div class="search-2"><i class='bx bxs-map'></i>
                                    <form action="#" method="GET">
                                        <input type="text" name="profil" placeholder="Search For Something">
                                        <button type="submit" class="zoom-effects"
                                            style="border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-right: -17px">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <button
                            style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                            class="btn">
                            <span style="font-weight: 600">
                                <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat Kursus</a>
                            </span>
                        </button>
                    </div>
                </div>
            </div> --}}

            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                        <div class="d-flex">
                            <div class="search">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="search-2"> <i class='bx bxs-map'></i>
                                            <form action="" method="GET">
                                                <input type="text" id="search-resep-sendiri" name="resep" autofocus
                                                    placeholder="Cari Kursusmu">
                                                <button type="submit" class=" zoom-effects cari2"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        viewBox="0 0 256 256">
                                                        <path fill="currentColor"
                                                            d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                                    </svg></button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <button
                                style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                class="btn ml-4">
                                <span style="font-weight: 600">
                                    <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                        Kursus</a>
                                </span>
                            </button>
                        </div>
                    </div>


                        {{-- start tab 1 --}}
                        <div class="d-flex" id="myCourse">
                            @foreach ($kursus_sendiri as $mycourse)
                                <div class="card my-3 ml-3 myCourse" style="width: 30%; border-radius:15px">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}" class="card-img-top"
                                                style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                               <strong>
                                                    @foreach ($mycourse->jenis_kursus as $item)
                                                        {{ $item->jenis_kursus }}
                                                    @endforeach
                                                </strong>
                                                    @if($mycourse->status  === 'ditunggu')
                                                    <div class="float-end">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="M12 22q-1.875 0-3.513-.713t-2.85-1.924q-1.212-1.213-1.924-2.85T3 13q0-1.875.713-3.513t1.924-2.85q1.213-1.212 2.85-1.924T12 4q1.875 0 3.513.713t2.85 1.925q1.212 1.212 1.925 2.85T21 13q0 1.875-.713 3.513t-1.924 2.85q-1.213 1.212-2.85 1.925T12 22Zm2.8-4.8l1.4-1.4l-3.2-3.2V8h-2v5.4l3.8 3.8ZM5.6 2.35L7 3.75L2.75 8l-1.4-1.4L5.6 2.35Zm12.8 0l4.25 4.25l-1.4 1.4L17 3.75l1.4-1.4Z"/></svg>
                                                </div>
                                                    @elseif ($mycourse->status === 'diterima')
                                                    <div class="float-end">
                                                        <div class="float-end">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="currentColor" d="m9.55 18l-5.7-5.7l1.425-1.425L9.55 15.15l9.175-9.175L20.15 7.4L9.55 18Z"/></svg>
                                                        </div>
                                                    </div>
                                                    @endif
                                                <br>
                                                @if ($mycourse->status === 'diterima')
                                                <a href="{{ route('detail.kursus', $mycourse->id) }}" class="btn text-break mt-1 text-start fst-normal"
                                                    style="font-family: poppins;border:none;">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                                @else
                                                <a href="#" class="btn text-break mt-1 text-start fst-normal"
                                                    style="font-family: poppins;border:none;">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                                @endif
                                                <div class="d-flex" style="float: right">
                                                @if ($mycourse->status === "diterima")
                                                <a href="{{route('koki.user', $mycourse->id)}}" class="btn mt-2 mr-2"
                                                style=" background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="currentColor" d="M11 12q-1.65 0-2.825-1.175T7 8q0-1.65 1.175-2.825T11 4q1.65 0 2.825 1.175T15 8q0 1.65-1.175 2.825T11 12Zm10.4 10.8l-2.5-2.5q-.525.3-1.125.5T16.5 21q-1.875 0-3.187-1.313T12 16.5q0-1.875 1.313-3.188T16.5 12q1.875 0 3.188 1.313T21 16.5q0 .675-.2 1.275t-.5 1.125l2.5 2.5q.275.275.275.7t-.275.7q-.275.275-.7.275t-.7-.275ZM16.5 19q1.05 0 1.775-.725T19 16.5q0-1.05-.725-1.775T16.5 14q-1.05 0-1.775.725T14 16.5q0 1.05.725 1.775T16.5 19ZM5 20q-.825 0-1.413-.588T3 18v-.775q0-.85.425-1.575t1.175-1.1q1.275-.65 2.875-1.1t3.55-.45q-.5.775-.763 1.663T10 16.5q0 .925.263 1.813T11.024 20H5Z"/></svg>
                                            </a>
                                                <a href="{{route('koki.content', $mycourse->id)}}" class="btn mt-2"
                                                style=" background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                                Tambah Konten
                                            </a>
                                            @endif
                                        </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <script>
                        $(document).ready(function(){
                            $('#search-resep-sendiri').on("input", function(){
                                let value = $(this).val().toLowerCase();
                                $(".myCourse").filter(function(){
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                                });
                            });
                        });
                    </script>
                    {{-- end --}}
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        {{-- start tab 2 --}}
                        <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                            <div class="d-flex">
                                <div class="search">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="/admin/laporan-pengguna" method="GET">
                                                    <input type="text" id="search-resep" name="resep" autofocus
                                                        placeholder="Cari Kursusmu">
                                                    <button type="submit" class=" zoom-effects cari2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                                        </svg></button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <button
                                    style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    class="btn ml-4">
                                    <span style="font-weight: 600">
                                        <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                            Kursus</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        {{-- start tab 1 --}}
                        <div class="d-flex">
                            @foreach ($kursus_sendiri as $mycourse)
                                <div class="card my-3 ml-3" style="width: 30%; border-radius:15px">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}"
                                                class="card-img-top"
                                                style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <strong>
                                                    @foreach ($mycourse->jenis_kursus as $item)
                                                        {{ $item->jenis_kursus }}
                                                    @endforeach
                                                </strong>
                                                <br>
                                                <a href="{{ route('detail.kursus', $mycourse->id) }}" class="btn text-start fst-normal"
                                                    style="font-family: poppins;border:none;">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                    {{-- end --}}
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        {{-- start tab 3 --}}
                        <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                            <div class="d-flex">
                                <div class="search">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="/admin/laporan-pengguna" method="GET">
                                                    <input type="text" id="search-resep" name="resep" autofocus
                                                        placeholder="Cari Kursusmu">
                                                    <button type="submit" class=" zoom-effects cari2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                                        </svg></button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <button
                                    style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    class="btn ml-4">
                                    <span style="font-weight: 600">
                                        <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                            Kursus</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        {{-- start tab 1 --}}
                        <div class="d-flex">
                            @foreach ($kursus_disimpan as $mycourse)
                                <div class="card my-3 ml-3" style="width: 30%; border-radius:15px">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}"
                                                class="card-img-top"
                                                style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <strong>
                                                    @foreach ($mycourse->jenis_kursus as $item)
                                                        {{ $item->jenis_kursus }}
                                                    @endforeach
                                                </strong> <br>
                                                <a href="{{ route('detail.kursus', $mycourse->id) }}" class="btn text-start fst-normal"
                                                    style="font-family: poppins;border:none;">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="tab-pane fade" id="pills-kita" role="tabpanel" aria-labelledby="pills-kita-tab"
                        tabindex="0">
                        {{-- start tab 3 --}}
                        <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                            <div class="d-flex">
                                <div class="search">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="/admin/laporan-pengguna" method="GET">
                                                    <input type="text" id="search-resep" name="resep" autofocus
                                                        placeholder="Cari Kursusmu">
                                                    <button type="submit" class=" zoom-effects cari2"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="32"
                                                            height="32" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                                        </svg></button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <button
                                    style="border-radius: 15px; width: 20%; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    class="btn ml-4">
                                    <span style="font-weight: 600">
                                        <a href="{{ route('kursus.create') }}" style="color: rgb(255, 255, 255);">Buat
                                            Kursus</a>
                                    </span>
                                </button>
                            </div>
                        </div>
                        {{-- start tab 1 --}}
                        <div class="d-flex">
                            @foreach ($kursus_dipesan as $mycourse)
                                <div class="card my-3 ml-3" style="width: 30%; border-radius:15px">
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="{{ asset('storage/' . $mycourse->foto_kursus) }}"
                                                class="card-img-top"
                                                style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <strong>
                                                    @foreach ($mycourse->jenis_kursus as $item)
                                                        {{ $item->jenis_kursus }}
                                                    @endforeach
                                                </strong> <br>
                                                <div class="d-flex justify-content-between">
                                                <a href="{{ route('detail.kursus', $mycourse->id) }}" class="btn text-start fst-normal"
                                                    style="font-family: poppins;border:none;">
                                                    {{ $mycourse->nama_kursus }}
                                                </a>
                                                <a href="/invoice-kursus/{{ $mycourse->id }}">
                                                <i class="fa-solid fa-file-invoice"></i>
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

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
