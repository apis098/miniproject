@extends('template.nav')
@section('content')
    <style>
        .as {
            color: black;
            font-size: 20px;
            font-family: Poppins;
            font-weight: 500;
        }

        .ai {
            color: black;
            font-size: 13px;
            font-family: Poppins;
            font-weight: 400;
            word-wrap: break-word;
            padding-top: 5px
        }

        .modal-body {
            padding: 20px;
            /* Tambahkan padding untuk menciptakan jarak di sekitar elemen */
        }

        .modal-body img {
            margin-right: 20px;
            /* Tambahkan margin di sebelah kanan gambar untuk menciptakan jarak */
        }



        /* Tampilan mobile Kecil Sekali */
        @media (min-width:290px) and (max-width: 340px) {
            i.kiri {
                margin-left: 40px;
            }

            /* li.kiri {
                margin-right: -80px;
            } */

            /* li.li {
                padding-right: -190px;
            } */

            li.knanst {
                padding-right: -150px;
                /* margin-top: -48px; */
            }

            div.wid {
                width: 100%;
                height: 95%;
            }

            div.widt {
                margin-left: 80px;
                margin-top: -65px;
            }

            div.ara {
                margin-left: -0px;
            }

            li.try {
                padding-left: 185px;
                margin-top: -48px;
            }

            li.trys {
                margin-right: 0px;
                /* margin-top: -48px; */
            }
        }

        /* untuk tampilan mobile */
        @media (min-width: 350px) and (max-width: 860px) {
            i.kiri {
                margin-left: 60px;
            }

            li.kiri {
                margin-right: -80px;
            }

            li.knan {
                margin-left: -40px;
            }

            li.rigt {
                margin-left: 10px;
            }

            div.wid {
                width: 100%;
                height: 95%;
            }

            div.widt {
                margin-left: 80px;
                margin-top: -65px;
            }


            div.ara {
                margin-left: -0px;
            }

        }




        /* untuk tampilan ipad */
        @media (min-width: 760px) and (max-width: 1000px) {
            div.widt {
                width: 325%;
            }

            i.knn {
                margin-left: 200px;
            }

            li.li {
                margin-left: -5px;
            }

            /*
            div.knns {
                margin-right: -80px;
            } */

        }

        @media (max-width: 884px) {
            li.li {
                margin-left: -20px;
            }
        }

        @media (min-width: 1024px) {
            li.try {
                padding-left: 495px;
                margin-top: -50px;
            }

            li.shu {
                margin-left: -30px;
            }

            /* li.shuh {
            margin-left: -40px;
           } */
        }

        @media (min-width: 1210px) and (max-width: 4000px) {
            div.wid {
                width: 360px;
                height: 95%;
            }

            div.widt {
                width: 100%;
                /* margin-left: 58px; */
            }

            div.rig {
                margin-left: -28px;
            }
        }
    </style>
    @if ($user->isSuperUser === 'yes')
    <style>
         @media (max-width:578px) {
            ul .nav-item {
                width: 24%;
                text-align: center;
            }

            ul .nav-item a h5 {
                font-size: 12px;
            }

            ul .nav-item button h5 {
                font-size: 12px;
            }
        }

        @media(max-width: 390px) {
            ul .nav-item {
                width: 50%;
                text-align: center;
            }

            ul .nav-item a h5 {
                font-size: 12px;
            }

            ul .nav-item button h5 {
                font-size: 12px;
            }

            .nav-item button {
                margin-left: 50px;
            }
        }

        @media(max-width: 330px) {
            .nav-item button {
                margin-left: 35px;
            }
        }
    </style>
    @else
    <style>
         @media (max-width:578px) {
            ul .nav-item {
                width: 30%;
                text-align: center;
            }

            ul .nav-item a h5 {
                font-size: 12px;
            }

            ul .nav-item button h5 {
                font-size: 12px;
            }
        }

        @media(max-width: 390px) {
            ul .nav-item {
                text-align: center;
            }

            ul .nav-item a h5 {
                font-size: 12px;
            }

            ul .nav-item button h5 {
                font-size: 12px;
            }

            .nav-item button {
                margin-left: 30px;
            }
        }

        @media(max-width: 330px) {
            .nav-item button {
                margin-left: 18px;
            }
        }
    </style>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card my-5 border border-dark widt ara" style="border-radius: 25px;">
                    <div class="text-center mt-5">
                        <div style="position: relative; display: inline-block;">
                            @if ($user->foto)
                                <img src="{{ asset('storage/' . $user->foto) }}" width="146px" height="144px"
                                    style="border-radius: 50%" alt="">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px"
                                    style="border-radius: 50%" alt="">
                            @endif
                            <button type="submit" class="btn btn-light zoom-effects text-light btn-sm rounded-circle p-2"
                                style="position: absolute;  right: -2px; background-color:#F7941E;" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class=""
                            style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            {{ $user->name }}
                            @if ($user->isSuperUser === 'yes')
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <rect width="22" height="22" fill="url(#pattern0)" />
                                    <defs>
                                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1"
                                            height="1">
                                            <use xlink:href="#image0_2208_250"
                                                transform="translate(-0.388) scale(0.00266667)" />
                                        </pattern>
                                        <image id="image0_2208_250" width="666" height="375"
                                            xlink:href="data:image/png;base64,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" />
                                    </defs>
                                </svg>
                            @endif
                            <br>
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{ $user->email }}</span>
                        </p>
                        <form action="{{ route('Followers.store', $user->id) }}" id="followForm" method="POST">
                            @csrf
                            <div class="me-1">
                                @if (Auth::check() &&
                                        $user->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                    <button type="submit" class="btn  text-light float-center mb-4 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3 text-status">Diikuti</b></button>
                                @elseif(Auth::check() &&
                                        $userLogin->followers()->where('follower_id', $user->id)->exists())
                                    <button type="submit" class="btn  text-light float-center mb-4 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3 text-status">Ikuti balik</b></button>
                                @else
                                    <button type="submit" class="btn text-light float-center mb-4 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3 text-status">Ikuti</b></button>
                                @endif
                                <a class="btn btn-outline-dark mb-4 zoom-effects" style="border-radius: 10px;"
                                    href="/roomchat/{{ $user->id }}"><i class="fa-regular fa-comment-dots"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle"
                                style=" font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                Laporkan foto pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('Report.store') }}" method="POST">
                            @csrf
                            <div class="modal-body d-flex align-items-center"> <!-- Tambahkan kelas "align-items-center" -->
                                @if ($user->foto)
                                    <img src="{{ asset('storage/' . $user->foto) }}" width="106px" height="104px"
                                        style="border-radius: 50%" alt="">
                                    <textarea class="form-control" style="border-radius: 15px" name="description" rows="5" placeholder="Alasan"></textarea>
                                    <input hidden type="text" name="profile_id" value="{{ $user->id }}">
                                    <input hidden type="text" name="user_id" value="{{ $user->id }}">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                        style="border-radius: 50%" alt="">
                                    <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                        placeholder="Alasan..."></textarea>
                                    <input hidden type="text" name="profile_id" value="{{ $user->id }}">
                                    <input hidden type="text" name="user_id" value="{{ $user->id }}">
                                @endif
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-light text-light"
                                    style="border-radius: 15px; background-color:#F7941E;"><b
                                        class="ms-2 me-2">Laporkan</b></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            {{-- akhir modal --}}
            <div class="col-lg-8">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 18px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7  knns">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $user->like }}
                                    </span> <br>
                                    <p class="ms-3">Suka</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl kiri knn"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 18px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7 knns">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $user->resep->count() }}
                                    </span> <br>
                                    <p class="ms-3">Resep</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl kiri knn"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 18px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7 knns">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $user->followers }}
                                    </span> <br>
                                    <p class="ms-3 text-nowrap">Pengikut</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-user-plus fa-2xl kiri knn"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" d-flex ">
                        <ul class="nav mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a id="button-biografi" class="nav-link active" data-bs-toggle="tab"
                                    data-bs-target="#resep" type="button" role="tab" aria-controls="resep"
                                    aria-selected="false">
                                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Bio
                                    </h5>
                                    <div id="border1" class=""
                                        style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                                    </div>
                                </a>
                            </li>


                            <li class="nav-item tabs" role="presentation">
                                <a id="button-resep-dibuat" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#keluhan" type="button" role="tab" aria-controls="keluhan"
                                    aria-selected="false">
                                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Resep
                                        Dibuat</h5>
                                    <div id="border2" class=""
                                        style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item tabs" role="presentation">
                                <a id="button-video-dibuat" class="nav-link" data-bs-toggle="tab"
                                    data-bs-target="#komentar" type="button" role="tab" aria-controls="komentar"
                                    aria-selected="false">
                                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Video
                                        Dibuat </h5>
                                    <div id="border3" class=""
                                        style="width:120%; height: 100%; border: 1px #F7941E solid;" hidden>
                                    </div>
                                </a>
                            </li>

                            @if ($user->isSuperUser === 'yes')
                                <li class="nav-item tabs" role="presentation">
                                    <button id="button-kursus-dibuat" class="nav-link yuhu mt-2" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        <h5 class="text-dark"
                                            style="font-weight: 600; word-wrap: break-word;">Kursus
                                            Dibuat</h5>
                                        <div id="border4" class="ms-1"
                                            style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                        </div>
                                    </button>
                                </li>
                            @else
                                <li style="display: none;" class="nav-item tabs" role="presentation">
                                    <button id="button-kursus-dibuat" class="nav-link yuhu mt-2" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        <h5 class="text-dark"
                                            style="font-weight: 600; word-wrap: break-word;">Kursus
                                            Dibuat</h5>
                                        <div id="border4" class="ms-1"
                                            style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                        </div>
                                    </button>
                                </li>
                            @endif
                        </ul>

                    </div>
                </div>


                <div class="mx-1">
                    <div class="tab-content mb-5 mx-1 my-5" id="pills-tabContent">
                        {{-- start tab 1 --}}
                        <div class="tab-pane fade" id="keluhan" role="tabpanel" aria-labelledby="pills-home-tab"
                            tabindex="0">
                            @if ($recipes->count() == 0)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                @foreach ($recipes as $r)
                                    <div class="col-lg-4 my-1">
                                        <div class="card p-3"
                                            style="width: 100%; height: 95%; border-radius: 15px; border: 0.50px black solid">
                                            <div class="row my-1">
                                                <div class="col-4">
                                                    <img class="rounded-circle mb-1" style="max-width:55px;"
                                                        src="{{ asset('storage/' . $r->foto_resep) }}" width="55px"
                                                        height="55px" alt="dsdaa">
                                                </div>
                                                <div class=" col-8">
                                                    <a type="button" class="as"
                                                        href="/artikel/{{ $r->id }}/{{ $r->nama_resep }}">
                                                        <strong> {{ $r->nama_resep }} </strong>
                                                    </a> <br>
                                                    <!-- Modal -->

                                                    <span class="ai">
                                                        Oleh {{ $r->User->name }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- end tab 1 --}}

                        {{-- start tab 2 --}}
                        <div class="tab-pane fade" id="komentar" role="tabpanel" aria-labelledby="pills-home-tab"
                            tabindex="0">
                            @if ($upload_video->count() < 1)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                @foreach ($upload_video as $video)
                                    <div class="col-lg-4 col-md-6 my-1">
                                        <div class="card"
                                            style="width: 100%;  border-radius: 15px; border: 0.50px black solid;">
                                            <a href="/veed/{{ $video->uuid }}">
                                                <video width="100%" height="55%"
                                                    style="border-radius: 15px 15px 0px 0px;"
                                                    src="{{ asset('storage/' . $video->upload_video) }}"></video>
                                                {{--
                                                    <img src="{{ asset('storage/'.$video->upload_video) }}"
                                                        class="img-fluid shadow-1-strong rounded"
                                                        style="margin-top: 0px; height: 65%; width: 100%"
                                                        alt="Hollywood Sign on The Hill" /> --}}
                                            </a>
                                            <div class="d-flex justify-content-between ash my-2 mx-2">
                                                <div>
                                                    <a type="button" class="text-dark hu my-auto" onclick="openModel()"
                                                        id="button-modal-komentar-feed" href="#"
                                                        data-bs-toggle="modal"data-bs-target="#exampleModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                                                        </svg>
                                                    </a> &nbsp;
                                                    <span class="my-auto">{{ $video->countLikeFeed() }}</span>
                                                </div>
                                                <div>
                                                    <a type="button" class="hu text-dark my-auto" onclick="openModel()"
                                                        id="button-modal-komentar-feed" href="#"
                                                        data-bs-toggle="modal"data-bs-target="#exampleModal">
                                                        <svg class="rigt" xmlns="http://www.w3.org/2000/svg"
                                                            width="26" height="26" viewBox="0 0 16 16">
                                                            <path fill="currentColor"
                                                                d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                                        </svg>
                                                    </a> &nbsp;
                                                    <span class="my-auto">{{ $video->countCommentFeed() }}</span>
                                                </div>
                                                <div>
                                                    <a type="button" class="my-auto hu text-dark " href="#"
                                                        data-bs-toggle="modal" data-bs-target="#bagikan">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27"
                                                            height="25" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="32"
                                                                d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                                        </svg>
                                                    </a>
                                                    <span class="my-auto">{{ $video->countShareFeed() }}</span>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        {{-- end tab 2 --}}

                        {{-- start tab 3 --}}
                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                            tabindex="0">
                            @if ($courses->count() == 0)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                @foreach ($courses as $course)
                                    <div class="col-lg-4 my-1">
                                        <div class="card p-3 wid" style="border-radius: 15px; border: 0.50px black solid">
                                            <div class="row my-1 ">
                                                <div class="col-2">
                                                    <img class="rounded-circle mt-1"
                                                        style="max-width:55px; margin-left: 10px;"
                                                        src="{{ asset('storage/' . $course->foto_kursus) }}"
                                                        width="55px" height="55px" alt="dsdaa">
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class=" col-9 widt">
                                                    <a type="button" class="as" href="">
                                                        <strong> {{ $course->nama_kursus }} </strong>
                                                    </a> <br>
                                                    <!-- Modal -->

                                                    <span class="ai">
                                                        Oleh {{ $course->user->name }}
                                                    </span>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- {{$recipes->links('vendor.pagination.default')}} --}}
                        </div>
                        {{-- end tab 3 --}}
                        {{-- start tab 4 --}}
                        <div class="tab-pane fade show active" id="resep" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            <div class="card mb-5"
                                style="margin-top: -50px; border-radius: 10px; margin-left: -5px; border: 1px solid #777">
                                <p class="text-start ml-3 mt-2 me-3" readonly>
                                    {{ trim($userLogin->biodata) }}
                                </p>
                            </div>
                        </div>
                        {{-- end tab 4 --}}
                    </div>

                </div>

                <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
                <!-- jQuery CDN -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
                <script>
                    const biografi = document.getElementById("button-biografi");
                    const resepDibuat = document.getElementById("button-resep-dibuat");
                    const border1 = document.getElementById("border1");
                    const border2 = document.getElementById("border2");
                    const videoDibuat = document.getElementById("button-video-dibuat");
                    const border3 = document.getElementById("border3");
                    const kursusDibuat = document.getElementById("button-kursus-dibuat");
                    const border4 = document.getElementById("border4");

                    biografi.addEventListener('click', function() {
                        border1.style.display = "block";
                        border2.style.display = "none";
                        border3.style.display = "none";
                        border4.style.display = "none";
                    });

                    resepDibuat.addEventListener("click", function() {
                        border2.removeAttribute('hidden');
                        border2.style.display = "block";
                        border1.style.display = "none";
                        border3.style.display = "none";
                        border4.style.display = "none";
                    });

                    videoDibuat.addEventListener("click", function() {
                        border3.removeAttribute('hidden');
                        border3.style.display = "block";
                        border1.style.display = "none";
                        border2.style.display = "none";
                        border4.style.display = "none";
                    });

                    kursusDibuat.addEventListener("click", function() {
                        border4.style.display = "block";
                        border1.style.display = "none";
                        border2.style.display = "none";
                        border3.style.display = "none";
                    });
                </script>
                {{-- @if ($recipes->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                    <p><b>Tidak ada data</b></p>
                </div>
                @endif --}}

            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
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
@endsection
