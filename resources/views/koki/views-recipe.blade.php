@extends('layouts.nav_koki')
@section('konten')
    <style>
       /* Gaya untuk tombol "Cari" */
            .zoom-effects {
                margin-left: 10px; /* Tambahkan jarak antara input dan tombol */
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
            padding: 0px 10px;
            border-radius: 5px;
            width: 80%;
            height: 100%;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 50px;
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

        /* ::placeholder {
            color: #eee;
            opacity: 1
        } */

        /* Gaya untuk form pencarian */
        .search-2 {
            display: flex;
            align-items: center;
        }

        .search-2 input {
            height: 45px;
            border: none;
            width: 700px;
            padding-left: 15px;
            padding-right: 100px;


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

        .search-2 button {
            position: absolute;
            right: 4px;
            top: -2px;
            border: none;
            height: 49px;
            background-color: #F7941E;
            color: #fff;
            width: 90px;
            border-radius: 4px
        }


        .intro-1 {
            font-size: 1.5rem; /* Contoh ukuran font dalam rem */
        }

        .col-6 {
            font-size: 1em; /* Contoh ukuran font dalam em */
        }



        @media (max-width: 768px) {
    /* Gaya yang akan diterapkan pada layar dengan lebar maksimum 768px */
    .card {
        width: 100%; /* Mengisi seluruh lebar kontainer */
        margin-bottom: 20px; /* Tambahkan jarak antara card */
    }
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
                top: -2px
            }
        }
    </style>
<div class="container my-3">
    <div class="row mx-3">
    <div class="d-flex justify-content-between align-items-center">
        <div class="search" style="border-radius: 15px; border: 0.50px black solid;">
            <div class="col-lg-12">
                <div class="search-2"><i class='bx bxs-map'></i>
                    <form action="#" method="GET">
                        <input type="text" name="profil" placeholder="Search For Something">
                        <button type="submit" class="zoom-effects"
                            style="border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-right: -17px">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path fill="currentColor" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <button style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
            class="btn btn-lg">
            <span style="font-weight: 600">
                <a href="/koki/resep" style="color: rgb(255, 255, 255);">Buat Resep</a>
            </span>
        </button>
    </div>
    <div class=" mx-1 my-4">
        <div class="row">
            {{-- @foreach ($recipes as $num => $item) --}}
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                        <div class=" my-3 mx-auto" style="background-color: white">

                            <img class="rounded-circle mx-4 mb-2"
                                 style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                src="{{ asset('images/dark-food.jpg') }}" />

                            <div class="row">
                                <div class="col-6">
                                    <h5>
                                        <a style="color: black; font-size: 24px; margin-left:-1px"
                                            href="#">
                                            robak
                                        </a>
                                    </h5>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                            <path id="Vector" d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z" fill="black"/>
                                            </g>
                                            </svg>
                                        50 suka
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="20" height="21" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                            <g id="Group">
                                            <path id="Vector" d="M7.22266 7.22168H22.7782" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_3" d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </g>
                                            </svg>
                                            2 Komen
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="14" height="23" viewBox="0 0 24 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                            <path id="Vector" d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </svg>
                                            6 Favorit
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                        <div class=" my-3 mx-auto" style="background-color: white">

                            <img class="rounded-circle mx-4 mb-2"
                                 style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                src="{{ asset('images/dark-food.jpg') }}" />

                            <div class="row">
                                <div class="col-6">
                                    <h5>
                                        <a style="color: black; font-size: 24px; margin-left:-1px"
                                            href="#">
                                            robak
                                        </a>
                                    </h5>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                            <path id="Vector" d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z" fill="black"/>
                                            </g>
                                            </svg>
                                        50 suka
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="20" height="21" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                            <g id="Group">
                                            <path id="Vector" d="M7.22266 7.22168H22.7782" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_3" d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </g>
                                            </svg>
                                            2 Komen
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="14" height="23" viewBox="0 0 24 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                            <path id="Vector" d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </svg>
                                            6 Favorit
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                        <div class=" my-3 mx-auto" style="background-color: white">

                            <img class="rounded-circle mx-4 mb-2"
                                 style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                src="{{ asset('images/dark-food.jpg') }}" />

                            <div class="row">
                                <div class="col-6">
                                    <h5>
                                        <a style="color: black; font-size: 24px; margin-left:-1px"
                                            href="#">
                                            robak
                                        </a>
                                    </h5>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                            <path id="Vector" d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z" fill="black"/>
                                            </g>
                                            </svg>
                                        50 suka
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="20" height="21" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                            <g id="Group">
                                            <path id="Vector" d="M7.22266 7.22168H22.7782" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_3" d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </g>
                                            </svg>
                                            2 Komen
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="14" height="23" viewBox="0 0 24 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                            <path id="Vector" d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </svg>
                                            6 Favorit
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                        <div class=" my-3 mx-auto" style="background-color: white">

                            <img class="rounded-circle mx-4 mb-2"
                                 style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                src="{{ asset('images/dark-food.jpg') }}" />

                            <div class="row">
                                <div class="col-6">
                                    <h5>
                                        <a style="color: black; font-size: 24px; margin-left:-1px"
                                            href="#">
                                            robak
                                        </a>
                                    </h5>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                            <path id="Vector" d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z" fill="black"/>
                                            </g>
                                            </svg>
                                        50 suka
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="20" height="21" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                            <g id="Group">
                                            <path id="Vector" d="M7.22266 7.22168H22.7782" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_3" d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </g>
                                            </svg>
                                            2 Komen
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="14" height="23" viewBox="0 0 24 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                            <path id="Vector" d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </svg>
                                            6 Favorit
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 mb-2">
                    <div class="card-body" style="border-radius: 15px; border: 0.50px black solid">
                        <div class=" my-3 mx-auto" style="background-color: white">

                            <img class="rounded-circle mx-4 mb-2"
                                 style="border: 0.50px black solid; max-width: 100%; height: 150px;width: 150px"
                                src="{{ asset('images/dark-food.jpg') }}" />

                            <div class="row">
                                <div class="col-6">
                                    <h5>
                                        <a style="color: black; font-size: 24px; margin-left:-1px"
                                            href="#">
                                            robak
                                        </a>
                                    </h5>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="col-6 mb-3">
                                        <svg width="20" height="20" viewBox="0 0 28 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;thumbs up&#34;">
                                            <path id="Vector" d="M1.77327 12.9898V25.1137C1.77327 25.592 2.17023 25.9797 2.65991 25.9797H6.20645C6.69613 25.9797 7.09309 25.592 7.09309 25.1137V12.9898C7.09309 12.5116 6.69613 12.1239 6.20645 12.1239H2.65991C2.17023 12.1239 1.77327 12.5116 1.77327 12.9898ZM7.97973 11.0534L9.54368 7.99834C10.2644 6.59046 10.6396 5.03802 10.6396 3.46396V3.03096C10.6396 1.35701 12.029 0 13.7429 0C15.4567 0 16.8917 1.26842 17.0622 2.93405L17.6485 8.6599H23.5668C26.0152 8.6599 28 10.5985 28 12.9898C28 13.1337 27.9927 13.2775 27.978 13.4207L26.914 23.8126C26.6874 26.0261 24.7804 27.7117 22.5029 27.7117H11.5263C10.3336 27.7117 9.251 27.2517 8.45418 26.5035C7.98253 27.2297 7.15212 27.7117 6.20645 27.7117H2.65991C1.19088 27.7117 0 26.5485 0 25.1137V12.9898C0 11.555 1.19088 10.3919 2.65991 10.3919H6.20645C6.88771 10.3919 7.50914 10.642 7.97973 11.0534ZM8.86636 13.1943V23.3817C8.86636 24.8165 10.0572 25.9797 11.5263 25.9797H22.5029C23.8694 25.9797 25.0136 24.9683 25.1496 23.6402L26.2135 13.2484C26.2223 13.1625 26.2267 13.0762 26.2267 12.9898C26.2267 11.555 25.0358 10.3919 23.5668 10.3919H16.8461C16.3906 10.3919 16.0092 10.0548 15.9638 9.61206L15.2978 3.10639C15.2179 2.32615 14.5457 1.73198 13.7429 1.73198C13.0083 1.73198 12.4129 2.31356 12.4129 3.03096V3.46396C12.4129 5.3069 11.9736 7.12453 11.1297 8.77291L8.86636 13.1943Z" fill="black"/>
                                            </g>
                                            </svg>
                                        50 suka
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="20" height="21" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;comment square chat message&#34;">
                                            <g id="Group">
                                            <path id="Vector" d="M7.22266 7.22168H22.7782" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_2" d="M7.22266 13.4443H13.4449" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path id="Vector_3" d="M1 4.11111V28.6778C1 29.3707 1.83778 29.7177 2.32774 29.2277L8.32217 23.2334C8.61388 22.9417 9.00956 22.7778 9.42211 22.7778H25.8889C27.6072 22.7778 29 21.3849 29 19.6667V4.11111C29 2.39289 27.6072 1 25.8889 1H4.11111C2.39289 1 1 2.39289 1 4.11111Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </g>
                                            </svg>
                                            2 Komen
                                    </div>
                                    <div class="col-6 mb-2">
                                        <svg width="14" height="23" viewBox="0 0 24 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g id="&#240;&#159;&#166;&#134; icon &#34;bookmark save&#34;">
                                            <path id="Vector" d="M1 32V2.55C1 1.69397 1.69397 1 2.55 1H21.15C22.0061 1 22.7 1.69397 22.7 2.55V32L11.85 22.5278L1 32Z" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </g>
                                            </svg>
                                            6 Favorit
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
        </div>
        {{-- {{ $recipes->links('vendor.pagination.default') }} --}}
    </div>
    </div>
</div>


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
