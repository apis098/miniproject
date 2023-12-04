@extends('layouts.nav_koki')
@section('konten')
    <!--
        <style>
            @media(max-width: 578px) {
                html {
                    width: fit-content;
                }
            }
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

            img {
                max-width: 100%;
                height: auto;
            }


            .btn-tambah {
                border-radius: 15px;
                font-family: poppins;
                background-color: #F7941E;
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                margin-left: 5%;
                color: #ffff;
            }

            /* tampilan untuk device */
            @media (min-width: 389px) and (max-width:896px) {

                /* Gaya yang akan diterapkan pada layar dengan lebar maksimum 768px */
                .search-1 input {
                    border-right: none;
                    border-bottom: 1px solid #eee
                }

                .search-2 i {
                    left: 4px
                }



                .search-2 button {
                    height: 40px;

                }

                .btn-tambah {
                    width: 20%
                }

                .card {
                    width: 100%
                }

                .main {
                    margin-left: 20px;
                }

            }


            /* tampilan untuk iPad */
            @media (min-width: 897px) and (max-width: 1024px) {
                .main {
                    margin-left: 30px;
                }
            }



            /* tampilan untuk laptop */
            @media (min-width: 1025px) and (max-width: 1366px) {
                .main {
                    margin-left: 50px;
                }
            }


            /* tampilan untuk PC yang lebih besar */
            @media (min-width: 1367px) {
                .main {
                    margin-left: 50px;
                }
            }

            @media(min-width:992px) {
                .nav-item a h6 {
                    font-size: 20px;
                }
            }

            @media (max-width: 578px) {
                .nav-item {
                    width: 130px;
                    text-align: center;
                }
            }

            @media (max-width: 375px) {
                .nav-item {
                    width: 120px;
                    text-align: center;
                }
            }

            @media (max-width: 320px) {
                .nav-item {
                    width: 100px;
                    font-size: 12px;
                    text-align: center;
                }
            }
        </style> -->
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

        @media(min-width: 600px) {
            br {
                display: none;
            }
        }

        @media(max-width: 578px) {
            .nav-item {
                width: 33%;
                text-align: center;
                justify-content: center;
            }

            br {
                display: block;
            }
        }

        @media(max-width: 375px) {
            .btn-search {
                font-size: 10px;
            }
        }

        @media(max-width: 320px) {
            .nav-item a h5 {
                font-size: 16px;
            }


            .btn-search {
                font-size: 8px;
            }
        }
        .btn-buat-resep{
                width: 30%;
            }
        @media(min-width: 820px){
            .btn-buat-resep{
                width: 20%;
            }
        }
        @media(max-width: 578px) {
        .ul_resep li a h5{
            text-align: center;
        }
        .nav-item {
            width: 30%;
        }
        .ul_feed {
            display: flex;
            justify-content:end;
        }
    }
    @media(min-width: 579px) {
        .ul_resep {
            margin-left: 50px;
            margin-right: 50px;
        }
        .tab-content {
            margin-left: 50px;
            margin-right: 50px;
        }
    }
    </style>



    <div>
        <div class="my-4 mr-4 ml-1 main">
            <ul class="nav mb-2 mt-3 ul_resep" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark text-li" style="font-weight: bold; word-wrap: break-word;">Resep <br> Dibuat
                            </h5>
                            <div id="border1" class="ms-1"
                                style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                            </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark text-li" style="font-weight: bold; word-wrap: break-word;">Resep <br> Disukai
                            </h5>
                            <div id="b" class="ms-" style="width: 100%; height: 100%; border: 1px #F7941E solid;"
                                hidden></div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="a-tab" class="nav-link" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark text-li" style="font-weight: bold; word-wrap: break-word;">Resep <br> Favorit</h5>
                            <div id="pp" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                            </div>
                    </a>
                </li>
            </ul>



            <div class="tab-content mb-5" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="mt-1">
                        <div class="d-flex mx-3 justify-content-center">
                            <div class="search-1" style="border:1px solid black;height:50px;border-radius:15px;">
                                <div class="search-2"><i class='bx bxs-map'></i>
                                    <form action="#" method="GET">
                                        <input type="text" id="nama_resep_dibuat" class="search-resep-sendiri"
                                            placeholder="Search For Something">
                                        <button type="button" class="zoom-effects cari2" style="height: 53px;"
                                            onclick="cariResepDibuat()">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <button
                                style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                class="btn btn-sm ml-4 btn-buat-resep">
                                <span style="font-weight: 600">
                                    <a href="/koki/resep" type="button" style="text-decoration: none; color: white;">
                                        Buat Resep
                                    </a>
                                </span>
                            </button>
                        </div>
                    </div>
                    {{-- start tab 1 --}}
                        @if ($resep_dibuat->count() < 1)
                            <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
                                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                <p><b>Tidak ada data</b></p>
                            </div>
                        @endif
                        <div class="d-flex justify-content-evenly my-4  gap-1 " style="flex-wrap: wrap;" id="resepDibuat">
                            @foreach ($resep_dibuat as $num => $my_recipe)
                                <div class=" card col-lg-4  col-xl-3  border-black col-md-4 col-12 "
                                    style="border-radius:15px; width: 100%; border: 1px solid black; max-width:250px">
                                    <div class="mx-auto">
                                        <div class="col-12 card-header mx-auto  text-center" style="border: none; max-height:120px; padding:10px 0px;">
                                            <img src="{{ asset('storage/' . $my_recipe->foto_resep) }}" class="card-img-top"
                                                style="min-width:auto; max-height: 120px; border-radius:15px; object-fit: cover"
                                                alt="...">
                                        </div>
                                        <div class="mx-auto col-12">
                                            <div class="col-12 p-0">
                                                <a style="color: black; font-size: 24px; margin-left:-1px;text-align:left;"
                                                    href="/artikel/{{ $my_recipe->id }}/{{ $my_recipe->nama_resep }}">
                                                    <p class="fw-bold mb-0">{{ $my_recipe->nama_resep }}</p>
                                                </a>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 col-md-12 col-lg-5 d-flex">
                                                    <svg width="17" height="23" viewBox="0 0 28 28"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                            <path id="Vector"
                                                                d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                                fill="black" />
                                                        </g>
                                                    </svg>
                                                    <span class="ml-1">{{ $my_recipe->likes()->count() }} suka</span>
                                                </div>
                                                <div class="col-12 col-md-12 col-lg-7 ">
                                                    <svg width="15" height="16" viewBox="0 0 30 31"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g
                                                            id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                            <g id="Group">
                                                                <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_3"
                                                                    d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span
                                                        class="text-center ml-1">{{ $my_recipe->comment_recipes()->count() }} komen</span>
                                                </div>
                                                <div class=" col-12 mt-1 mb-3">
                                                    <svg width="16" height="20" viewBox="0 0 24 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                            <path id="Vector"
                                                                d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </svg>
                                                    <span class="text-center ml-1">{{ $my_recipe->favorite()->count() }} favorit </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="resep-sendiri card col-lg-4 ml-3 col-xl-3 border border-black col-md-4 col-sm-12 my-3"
                                    style="border-radius:15px; border: 1px solid black;">
                                    <div class="row mx-auto">
                                        <div class="col-12 card-header mx-auto text-center">
                                            <img src="{{ asset('storage/' . $my_recipe->foto_resep) }}" class="card-img-top"
                                                style="max-width:200px; max-height: 200px; border-radius:15px;"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px;text-align:left;"
                                                        href="/artikel/{{ $my_recipe->id }}/{{ $my_recipe->nama_resep }}">
                                                        {{ $my_recipe->nama_resep }}
                                                    </a>
                                                </h5>
                                                <br>

                                            </div>
                                            <div class="row">
                                                <div class="col-4 mb-3">
                                                    <svg width="23" height="29" viewBox="0 0 28 28"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                            <path id="Vector"
                                                                d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                                fill="black" />
                                                        </g>
                                                    </svg>
                                                    {{ $my_recipe->likes()->count() }}
                                                </div>
                                                <div class="col-4 mb-3">
                                                    <svg width="20" height="21" viewBox="0 0 30 31"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g
                                                            id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                            <g id="Group">
                                                                <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_3"
                                                                    d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span
                                                        class="text-center">{{ $my_recipe->comment_recipes()->count() }}</span>
                                                </div>
                                                <div class=" col-4 mb-3">
                                                    <svg width="21" height="25" viewBox="0 0 24 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                            <path id="Vector"
                                                                d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </svg>
                                                    <span class="text-center">{{ $my_recipe->favorite()->count() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        </div>

                </div>
                <script>
                    $(document).ready(function() {
                        $('.search-resep-sendiri').on('input', function() {
                            var value = $(this).val().toLowerCase();
                            $('.resep-sendiri').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="mt-1">
                        <div class="d-flex mx-3 justify-content-center">
                            <div class="search-1" style="border: 1px solid black; border-radius:15px; height:50px;">

                                <div class="search-2"><i class='bx bxs-map'></i>
                                    <form action="#" method="GET">
                                        <input type="text" id="nama_resep_disukai" name="profil"
                                            class="search-resep-disukai" placeholder="Search For Something">
                                        <button type="submit" class="zoom-effects cari2" style="height: 53px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                            </div>
                            <button
                            style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                            class="btn btn-sm ml-4 btn-buat-resep">
                            <span style="font-weight: 600">
                                <a href="/koki/resep" type="button" style="text-decoration: none; color: white;">
                                    Buat Resep
                                </a>
                            </span>
                        </button>
                        </div>
                    </div>

                    {{-- start tab 2 --}}
                    <div class=" my-4">
                        @if ($resep_disukai->count() < 1)
                            <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
                                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                <p><b>Tidak ada data</b></p>
                            </div>
                        @endif
                        <div class="row my-4 gap-1">
                            @foreach ($resep_disukai as $num => $suka)
                            <div class=" card col-lg-4 mx-auto  col-xl-3  border-black col-md-4 col-12 "
                            style="border-radius:15px; width: 100%; border: 1px solid black; max-width:250px">
                                <div class="mx-auto">
                                    <div class="col-12 card-header mx-auto  text-center" style="border: none; max-height:200px; padding:10px 0px;">
                                        <img src="{{ asset('storage/' . $suka->foto_resep) }}" class="card-img-top"
                                            style="max-width:auto; max-height: 200px; border-radius:15px; object-fit: cover"
                                            alt="...">
                                    </div>
                                    <div class="mx-auto col-12">
                                        <div class="col-12 p-0">
                                            <a style="color: black; font-size: 24px; margin-left:-1px;text-align:left;"
                                                href="/artikel/{{ $suka->id }}/{{ $suka->nama_resep }}">
                                                <p class="fw-bold mb-0">{{ $suka->nama_resep }}</p>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-5 d-flex">
                                                <svg width="17" height="23" viewBox="0 0 28 28"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                <span class="ml-1">{{ $suka->likes()->count() }} suka</span>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-7 ">
                                                <svg width="15" height="16" viewBox="0 0 30 31"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                stroke="black" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span
                                                    class="text-center ml-1">{{ $suka->comment_recipes()->count() }} komen</span>
                                            </div>
                                            <div class=" col-12 mt-1 mb-3">
                                                <svg width="16" height="20" viewBox="0 0 24 33"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                <span class="text-center ml-1">{{ $suka->favorite()->count() }} favorit </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{-- <div class="resep-disukai card col-lg-4 col-xl-3 col-md-4 col-sm-12 my-3 ml-3 resepDisukai"
                                    style="border-radius:15px">
                                    <div class="row mx-auto">
                                        <div class="col-12 card-header mx-auto text-center">
                                            <img src="{{ asset('storage/' . $suka->foto_resep) }}" class="card-img-top"
                                                style="max-width:200px; max-height: 200px; border-radius:15px;"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px;text-align:left;"
                                                        href="/artikel/{{ $suka->id }}/{{ $suka->nama_resep }}">
                                                        {{ $suka->nama_resep }}
                                                    </a>
                                                </h5>
                                                <br>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-3">
                                                    <svg width="23" height="29" viewBox="0 0 28 28"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                            <path id="Vector"
                                                                d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                                fill="black" />
                                                        </g>
                                                    </svg>
                                                    {{ $suka->likes()->count() }}
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <svg width="20" height="21" viewBox="0 0 30 31"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g
                                                            id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                            <g id="Group">
                                                                <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_3"
                                                                    d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span
                                                        class="text-center">{{ $suka->comment_recipes()->count() }}</span>
                                                </div>
                                                <div class=" col-lg-4 mb-3">
                                                    <svg width="21" height="25" viewBox="0 0 24 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                            <path id="Vector"
                                                                d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </svg>
                                                    <span class="text-center">{{ $suka->favorite()->count() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        </div>

                        {{-- {{ $recipes->links('vendor.pagination.default') }} --}}
                    </div>
                </div>
                {{-- end --}}
                <script>
                    $(document).ready(function() {
                        $('.search-resep-disukai').on('input', function() {
                            var value = $(this).val().toLowerCase();
                            $('.resep-disukai').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <div class="mt-1">
                        <div class="d-flex justify-content-center mx-3">
                            <div class="search-1" style="border: 1px solid black; border-radius: 15px; height:50px;">

                                <div class="search-2"><i class='bx bxs-map'></i>
                                    <form action="#" method="GET">
                                        <input type="text" id="nama_resep_favorite" name="profil"
                                            class="search-resep-favorite" placeholder="Search For Something">
                                        <button type="submit" class="zoom-effects cari2" style="height: 53px;">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z" />
                                            </svg>
                                        </button>
                                    </form>
                                </div>

                            </div>
                            <button
                            style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                            class="btn btn-sm ml-4 btn-buat-resep">
                            <span style="font-weight: 600">
                                <a href="/koki/resep" type="button" style="text-decoration: none; color: white;">
                                    Buat Resep
                                </a>
                            </span>
                        </button>
                        </div>
                    </div>

                    {{-- start tab 3 --}}
                    <div class=" my-4">
                        @if ($resep_favorite->count() < 1)
                            <div class="d-flex mt-5 mr-5 flex-column h-100 justify-content-center align-items-center">
                                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                <p><b>Tidak ada data</b></p>
                            </div>
                        @endif
                        <div class="row my-4 gap-1">
                            @foreach ($resep_favorite as $num => $favorite)
                            <div class=" card col-lg-4 mx-auto  col-xl-3  border-black col-md-4 col-12 "
                            style="border-radius:15px; width: 100%; border: 1px solid black; max-width:250px">
                                <div class="mx-auto">
                                    <div class="col-12 card-header mx-auto  text-center" style="border: none; max-height:200px; padding:10px 0px;">
                                        <img src="{{ asset('storage/' . $favorite->foto_resep) }}" class="card-img-top"
                                            style="max-width:auto; max-height: 200px; border-radius:15px; object-fit: cover"
                                            alt="...">
                                    </div>
                                    <div class="mx-auto col-12">
                                        <div class="col-12 p-0">
                                            <a style="color: black; font-size: 24px; margin-left:-1px;text-align:left;"
                                                href="/artikel/{{ $favorite->id }}/{{ $favorite->nama_resep }}">
                                                <p class="fw-bold mb-0">{{ $favorite->nama_resep }}</p>
                                            </a>
                                        </div>
                                        <div class="row">
                                            <div class="col-12 col-md-12 col-lg-5 d-flex">
                                                <svg width="17" height="23" viewBox="0 0 28 28"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                        <path id="Vector"
                                                            d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                            fill="black" />
                                                    </g>
                                                </svg>
                                                <span class="ml-1">{{ $favorite->likes()->count() }} suka</span>
                                            </div>
                                            <div class="col-12 col-md-12 col-lg-7 ">
                                                <svg width="15" height="16" viewBox="0 0 30 31"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g
                                                        id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                        <g id="Group">
                                                            <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                stroke="black" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                stroke="black" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                            <path id="Vector_3"
                                                                d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                stroke="black" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round" />
                                                        </g>
                                                    </g>
                                                </svg>
                                                <span
                                                    class="text-center ml-1">{{ $favorite->comment_recipes()->count() }} komen</span>
                                            </div>
                                            <div class=" col-12 mt-1 mb-3">
                                                <svg width="16" height="20" viewBox="0 0 24 33"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                        <path id="Vector"
                                                            d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                            stroke="black" stroke-width="2" stroke-linecap="round"
                                                            stroke-linejoin="round" />
                                                    </g>
                                                </svg>
                                                <span class="text-center ml-1">{{ $favorite->favorite()->count() }} favorit </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                {{-- <div class="card col-lg-4 col-xl-3 col-md-4 col-sm-12 my-3 ml-3 resep-favorite"
                                    style="border-radius:15px">
                                    <div class="row mx-auto">
                                        <div class="col-12 card-header mx-auto text-center">
                                            <img src="{{ asset('storage/' . $favorite->foto_resep) }}"
                                                class="card-img-top"
                                                style="max-width:200px; max-height: 200px; border-radius:15px;"
                                                alt="...">
                                        </div>
                                        <div class="card-body">
                                            <div class="col-12">
                                                <h5>
                                                    <a style="color: black; font-size: 24px; margin-left:-1px;text-align:left;"
                                                        href="/artikel/{{ $favorite->id }}/{{ $favorite->nama_resep }}">
                                                        {{ $favorite->nama_resep }}
                                                    </a>
                                                </h5>
                                                <br>

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-4 mb-3">
                                                    <svg width="23" height="29" viewBox="0 0 28 28"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                                            <path id="Vector"
                                                                d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z"
                                                                fill="black" />
                                                        </g>
                                                    </svg>
                                                    {{ $favorite->likes()->count() }}
                                                </div>
                                                <div class="col-lg-4 mb-3">
                                                    <svg width="20" height="21" viewBox="0 0 30 31"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g
                                                            id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                                            <g id="Group">
                                                                <path id="Vector" d="M7.22266 7.22168H22.7782"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_2" d="M7.22266 13.4443H13.4449"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                                <path id="Vector_3"
                                                                    d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z"
                                                                    stroke="black" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round" />
                                                            </g>
                                                        </g>
                                                    </svg>
                                                    <span
                                                        class="text-center">{{ $favorite->comment_recipes()->count() }}</span>
                                                </div>
                                                <div class=" col-lg-4 mb-3">
                                                    <svg width="21" height="25" viewBox="0 0 24 33"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                                            <path id="Vector"
                                                                d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z"
                                                                stroke="black" stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" />
                                                        </g>
                                                    </svg>
                                                    <span class="text-center">{{ $favorite->favorite()->count() }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            @endforeach
                        </div>
                        {{-- {{ $recipes->links('vendor.pagination.default') }} --}}
                    </div>
                </div>
                {{-- end --}}
                <script>
                    $(document).ready(function() {
                        $('.search-resep-favorite').on('input', function() {
                            var value = $(this).val().toLowerCase();
                            $('.resep-favorite').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
                <script>
                    const click1 = document.getElementById("click1");
                    const click2 = document.getElementById("c");
                    const border1 = document.getElementById("border1");
                    const border2 = document.getElementById("b");
                    const o = document.getElementById("pp");
                    const a_tab = document.getElementById("a-tab");

                    a_tab.addEventListener('click', function(event) {
                        event.preventDefault();
                        o.style.display = "block";
                        border1.style.display = "none";
                        border2.style.display = "none";
                    });

                    click1.addEventListener('click', function(event) {
                        event.preventDefault();
                        border1.style.display = "block";
                        border2.style.display = "none";
                        o.style.display = "none";
                    });

                    click2.addEventListener("click", function(event) {
                        event.preventDefault();
                        border2.removeAttribute('hidden');
                        border2.style.display = "block";
                        border1.style.display = "none";
                        o.style.display = "none";
                    });
                </script>

                <!-- jQuery CDN -->
                <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
                <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
                    integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

                <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $('#search').on('input', function() {
                            var value = $(this).val().toLowerCase();
                            $('#table tbody tr').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                            });
                        });
                    });
                </script>
                <script>
                    $(document).ready(function() {
                        $("#nama_resep_dibuat").on("input", function() {
                            let value_search = $(this).val().toLowerCase();
                            $(".resepDibuat").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value_search) > -1);
                            });
                        });
                    });
                    $(document).ready(function() {
                        $("#nama_resep_disukai").on("input", function() {
                            let value = $(this).val().toLowerCase();
                            $(".resepDisukai").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                            });
                        });
                    });
                    $(document).ready(function() {
                        $("#nama_resep_favorite").on("input", function() {
                            let nilai = $(this).val().toLowerCase();
                            $(".resepFavorite").filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(nilai) > -1);
                            });
                        });
                    });
                </script>
            @endsection
