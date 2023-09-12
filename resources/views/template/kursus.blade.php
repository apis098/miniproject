@extends('template.nav')
@section('content')
    <style>
        .radius-bawah {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        body {
            background: #f7f7f7;
            background: -webkit-linear-gradient(to right, #ffffff, #ffffff);
            background: linear-gradient(to right, #ffffff, #ffffff);
            min-height: 100vh;
            font-family: 'Poppins';
        }

        .font-poppins {
            font-family: 'Poppins';
        }

        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }

        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px;
            width: 85%;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 34px;
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
            font-size: 10px;
            color: #eee
        }

        ::placeholder {
            color: grey;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 40%;
            margin-left: -5%
        }

        .search-2 input {
            height: 45px;
            border: 0.50px black solid;
            width: 100%;
            border-radius: 15px;
            color: #000;
            padding-left: 18px;
            padding-right: 100px;
            text-align: center
        }

        .search-2 input:focus {
            box-shadow: none;
        }


        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 14px;
            color: #eee
        }

        .search-2 button {
            position: absolute;
            right: 0px;
            top: 0px;
            border: none;
            height: 45px;
            background-color: #F7941E;
            color: #fff;
            width: 60px;
        }


        @media (max-width:800px) {
            .search-1 input {

                border-bottom: 1px solid #0000
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 30px;
                top: 4px
            }
        }

        .garis {
            padding: 0px;
            border: 0.5px solid grey;
            background-color: black;
        }

        .btn-fil {
            position: absolute;
            background: #F7941E;
            border-radius: 15px;
            color: white;
            border: none;
            font-size: 20px;
            font-family: Poppins;
            letter-spacing: 0.48px;
            margin-left: 40%;
            bottom: 15%;
            text-align: center;
        }
    </style>

    <div class="container py-5">
        <div class="row text-center">
            <div class="col-lg-12">
                <h1 class="mb-5"
                    style="text-align: center; color: black; font-size: 30px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                    Temukan kursus <br> terbaik
                </h1>
                <form action="">
                    <div class="container">
                        <div class="search" style="border-radius: 15px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="d-flex">
                                        <div class="search-2"> <i class='bx bxs-map'></i>
                                            <form action="#" method="GET">
                                                <input type="text" name="" placeholder="Search for something ..."
                                                    value="{{-- {{ request()->nama_resep }} --}}">
                                                <button type="submit" class="zoom-effects"
                                                    style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                                        viewBox="0 0 24 24">
                                                        <path fill="currentColor"
                                                            d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                                                    </svg>
                                                </button>
                                            </form>
                                        </div>
                                        <div class=" d-flex ml-5" style="margin-right: -20%;">
                                            <ul class="nav mb-3 mx-5" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <a id="click1" class="nav-link mr-4 active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                        role="tab" aria-controls="pills-home" aria-selected="true">
                                                        <h5 class="text-dark ms-2"
                                                            style="font-weight: 600; word-wrap: break-word;">Semua</h5>
                                                        <div id="border1" class="ms-1"
                                                            style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                                                        </div>
                                                    </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <a id="c" class="nav-link mr-5" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                                        role="tab" aria-controls="pills-profile" aria-selected="false">
                                                        <h5 class="text-dark ms-2"
                                                            style="font-weight: 600; word-wrap: break-word;">Baru</h5>
                                                        <div id="b" class="ms-0"
                                                            style="width:120%; height: 100%; border: 1px #F7941E solid;"
                                                            hidden>
                                                        </div>
                                                    </a>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button id="a-tab" class="nav-link mr-5 yuhu mt-2"
                                                        id="pills-footer-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-contact" type="button" role="tab"
                                                        aria-controls="pills-contact" aria-selected="false">
                                                        <h5 class="text-dark ms-2"
                                                            style="font-weight: 600; word-wrap: break-word;">Arsip</h5>
                                                        <div id="pp" class="ms-1"
                                                            style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                                        </div>
                                                    </button>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button id="a-tab2" class="nav-link mr-5 yuhu mt-2"
                                                        id="pills-footer-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-contact" type="button" role="tab"
                                                        aria-controls="pills-contact" aria-selected="false">
                                                        <h5 class="text-dark ms-2"
                                                            style="font-weight: 600; word-wrap: break-word;">Terbaik</h5>
                                                        <div id="pp2" class="ms-2"
                                                            style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                                        </div>
                                                    </button>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

                <!-- Button Modal -->
                <div>
                    <button class="btn btn-fil" data-bs-toggle="modal" data-bs-target="#filter">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75v9.13M7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5H7.04Z" />
                        </svg>
                        filter
                    </button>
                </div>
                <!-- End button modal -->
            </div>
            <div class="tab-content mb-5 mx-3 my-5" id="pills-tabContent">
                <div class="row">
                    <div class="card mx-5" style="width: 18rem;">
                        <img src="{{ asset('sawi.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>

                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('sawi.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                      </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("c");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("b");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");
        const ab = document.getElementById("pp2");
        const a_tab2 = document.getElementById("a-tab2");

        a_tab.addEventListener('click', function(event) {
            event.preventDefault();
            o.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
            ab.style.display = "none";
        });


        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            o.style.display = "none";
            ab.style.display = "none";
        });

        click2.addEventListener("click", function(event) {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            o.style.display = "none";
            ab.style.display = "none";
        });

        a_tab2.addEventListener('click', function(event) {
            event.preventDefault();
            ab.removeAttribute('hidden');
            ab.style.display = "block";
            border2.style.display = "none";
            border1.style.display = "none";
            o.style.display = "none";

        });
    </script>
@endsection
