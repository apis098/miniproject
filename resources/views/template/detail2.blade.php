<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HummaCook</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" <!--
        Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            background-color: #f7f6f6
        }

        .card {

            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
        }


        .dots {

            height: 4px;
            width: 4px;
            margin-bottom: 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .badge {

            padding: 7px;
            padding-right: 9px;
            padding-left: 16px;
            box-shadow: 5px 6px 6px 2px #e9ecef;
        }

        .user-img {

            margin-top: 4px;
        }

        .check-icon {

            font-size: 17px;
            color: #c3bfbf;
            top: 1px;
            position: relative;
            margin-left: 3px;
        }

        .form-check-input {
            margin-top: 6px;
            margin-left: -24px !important;
            cursor: pointer;
        }


        .form-check-input:focus {
            box-shadow: none;
        }


        .icons i {

            margin-left: 8px;
        }

        .reply {

            margin-left: 12px;
        }

        .reply small {

            color: #b7b4b4;

        }


        .reply small:hover {

            color: green;
            cursor: pointer;

        }
    </style>
</head>

<body>
    <!-- Navigation-->
     <!-- header section strats -->
     <header class="header_section">
        <div class="container">
            <div class="col-6">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="{{ url('admin/index') }}">
                        <span style="margin-left: -70px;">
                            HummaCook
                        </span>
                    </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mx-auto ">
                            <li class="nav-item " style="margin-left: -140px; font-size:15px">
                                <a class="nav-link" href="{{ route('home') }}">Home <span
                                        class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item active dropdown" style="font-size: 15px">
                                <a class="nav-link  dropbtn" href="{{ route('menu') }}">Resep <i
                                        class="fa-solid fa-chevron-down"> </i></a>
                                <div class="dropdown-content" style="font-size: 15px;">
                                    @foreach ($bahan_masakan as $bm)
                                        <a href=""
                                            class="dropdown-item text-white">{{ $bm->kategori_bahan }}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item  dropdown" style="font-size: 15px">
                                <a class="nav-link dropbtn" href="#">Hari Khusus <i
                                        class="fa-solid fa-chevron-down"> </i></a>
                                <div class="dropdown-content" style="font-size: 15px;">
                                    @foreach ($hari_khusus as $bm)
                                        <a href="" class="dropdown-item text-white">{{ $bm->name }}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item dropdown" style="font-size: 15px">
                                <a class="nav-link dropbtn" href="#">Tips Dasar <i
                                        class="fa-solid fa-chevron-down"> </i></a>
                                <div class="dropdown-content" style="font-size: 15px;">
                                    @foreach ($tips_dasar as $bm)
                                        <a href="" class="dropdown-item text-white">{{ $bm->name }}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item dropdown" style="font-size: 15px">
                                <a class="nav-link dropbtn" href="#">Pengetahuan Dapur <i
                                        class="fa-solid fa-chevron-down"> </i></a>
                                <div class="dropdown-content" style="font-size: 15px">
                                    <a href="#" class="dropdown-item text-white">Bahan Masak</a>
                                    <a href="#" class="dropdown-item text-white">Bumbu Dapur</a>
                                    <a href="#" class="dropdown-item text-white">Peralaan Dapur</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown" style="font-size: 15px">
                                <a class="nav-link dropbtn" href="#">Seputar Dapur <i
                                        class="fa-solid fa-chevron-down"> </i></a>
                                <div class="dropdown-content" style="font-size: 15px">
                                    <a href="#" class="dropdown-item text-white">Bahan Unik & Eksotis</a>
                                    <a href="#" class="dropdown-item text-white">Serba - Serbi</a>
                                    <a href="#" class="dropdown-item text-white">Tren Masakan</a>
                                </div>
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
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/message.jpg') }}"
                        alt="..." /></div>
                <div class="col-md-8">
                    {{-- <div class="small mb-1">SKU: BST-498</div> --}}
                    <h2 class="display-5 fw-bolder">{{$data->subject}}</h2>
                    <div class="fs-5 mb-5">
                        {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                        {{-- <span>$40.00</span> --}}
                    </div>
                    <p class="lead">{{$data->description}}</p>
                </div>
                
            </div>
        </div>
    </section>
    <section>
    <div class="container mb-5" style="margin-top:-5%;">
        <div class="row  d-flex justify-content-center">
            <div class="col-md-11">
                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5 class="me-5">Total komentar(6)</h5>
                    <div class="col-9">
                        <form method="POST" action="{{ route('ReplyComplaint.store', ['id' => $data->id]) }}">
                        @csrf
                        <div class="input-group">
                        <input type="text" id="reply" name="reply" class="form-control" placeholder="Tambah komentar...">
                        <button type="submit" class="btn btn-warning text-light"><i class="fa-solid fa-paper-plane"></i></button>
                        </div>
                        </form>
                    </div>
                    <div class="buttons">

                        {{-- <span class="badge bg-white d-flex flex-row align-items-center">
                            <span class="text-primary">Comments "ON"</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>

                            </div>
                        </span> --}}

                    </div>

                </div>
                @foreach($replies as $row)
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <img src="{{ asset('images/default-profile2.png') }}" width="30"
                                class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-primary ms-2 me-2">{{$row->user->name}}</small><small
                                    class="font-weight-bold">{{$row->reply}}</small></span>
                        </div>
                        <small>2 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <small>Remove</small>
                            <span class="dots"></span>
                            <small>Reply</small>
                            <span class="dots"></span>
                            <small>Translate</small>

                        </div>

                        <div class="icons align-items-center">

                            <i class="fa fa-star text-warning"></i>
                            <i class="fa fa-check-circle-o check-icon"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>
    </section>
    </div>
</body>

</html>
