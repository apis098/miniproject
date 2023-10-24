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
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card my-5 border border-dark" style="border-radius: 25px;">
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
                            <span style="background-color:rgb(58, 123, 243);border-radius:50%;">
                                    <i class="fa-solid fa-check p-2 text-white"></i>
                            </span>
                            @endif
                            <br>
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{ $user->email }}</span>
                        </p>
                        <form action="{{ route('Followers.store', $user->id) }}" method="POST">
                            @csrf
                            <div class="me-1">
                                @if (Auth::check() &&
                                        $user->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                    <button type="submit" class="btn  text-light float-center mb-4 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3">Diikuti</b></button>
                                @elseif(Auth::check() &&
                                        $userLogin->followers()->where('follower_id', $user->id)->exists())
                                    <button type="submit" class="btn  text-light float-center mb-4 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3">Ikuti balik</b></button>
                                @else
                                    <button type="submit" class="btn text-light float-center mb-4 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3">Ikuti</b></button>
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
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7 ">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $user->like }}
                                    </span> <br>
                                    <p class="ms-3">Suka</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $user->resep->count() }}
                                    </span> <br>
                                    <p class="ms-3">Resep</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $user->followers }}
                                    </span> <br>
                                    <p class="ms-3">Pengikut</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-user-plus fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class=" d-flex " style="margin-right: -10%;">
                        <ul class="nav mb-3" style="margin-left: -17px;" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a id="click1" class="nav-link mr-4 active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab"
                                    aria-controls="pills-home" aria-selected="true">
                                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Resep
                                        Dibuat</h5>
                                    <div id="border1" class="ms-1"
                                        style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                                    </div>
                                </a>
                            </li>

                            <li class="nav-item" role="presentation" style="margin-left: 70px;">
                                <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">
                                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Video
                                        Dibuat </h5>
                                    <div id="b" class="ms-0"
                                        style="width:120%; height: 100%; border: 1px #F7941E solid;" hidden>
                                    </div>
                                </a>
                            </li>
                            @if ($user->isSuperUser === 'yes')
                                <li class="nav-item" role="presentation" style="margin-left: 60px;">
                                    <button id="a-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-contact" type="button"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">
                                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Kursus
                                            Dibuat</h5>
                                        <div id="pp" class="ms-1"
                                            style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                        </div>
                                    </button>
                                </li>
                            @else
                                <li class="nav-item" hidden role="presentation" style="margin-left: 60px;">
                                    <button id="a-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab"
                                        data-bs-toggle="pill" data-bs-target="#pills-contact" type="button"
                                        role="tab" aria-controls="pills-contact" aria-selected="false">
                                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Kursus
                                            Dibuat</h5>
                                        <div id="pp" class="ms-1"
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
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab" tabindex="0">
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
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                            aria-labelledby="pills-profile-tab" tabindex="0">
                            {{-- @if ($recipes->count() == 0)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: -3em">
                                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif --}}
                            <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                @foreach ($upload_video as $video)
                                    <div class="col-lg-4 my-1">
                                        <div class="card"
                                            style="width: 225px; height: 153px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                            <div class="row">
                                                <div class="col-12">
                                                    {{-- <div class="col-3"> --}}
                                                    <a href="/veed/{{ $video->uuid }}">
                                                        <img src="{{ asset('img/download.jpg') }}"
                                                            class="img-fluid shadow-1-strong rounded"
                                                            style="margin-top: 0px; height: 65%; width: 100%"
                                                            alt="Hollywood Sign on The Hill" /></a>
                                                    {{-- </div> --}}
                                                    <div class="d-flex mt-1 ml-3">
                                                        <a type="button" class="mr-1 text-dark" onclick="openModel()"
                                                            id="button-modal-komentar-feed" href="#"
                                                            data-bs-toggle="modal"data-bs-target="#exampleModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                height="24" viewBox="0 0 512 512">
                                                                <path fill="currentColor"
                                                                    d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                                                            </svg>
                                                            &nbsp; <span
                                                                class="my-auto">{{ $video->countLikeFeed() }}</span>
                                                        </a>
                                                        <a type="button" class="ms-3 text-dark" onclick="openModel()"
                                                            id="button-modal-komentar-feed" href="#"
                                                            data-bs-toggle="modal"data-bs-target="#exampleModal">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="26"
                                                                height="26" viewBox="0 0 16 16">
                                                                <path fill="currentColor"
                                                                    d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                                            </svg>
                                                            &nbsp; <span
                                                                class="my-auto">{{ $video->countCommentFeed() }}</span>
                                                        </a>
                                                        <a class="ml-3 mr-1 my-auto text-dark" href="#"
                                                            data-bs-toggle="modal" data-bs-target="#bagikan">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="27"
                                                                height="25" viewBox="0 0 512 512">
                                                                <path fill="none" stroke="currentColor"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    stroke-width="32"
                                                                    d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                                            </svg>
                                                            &nbsp; <span
                                                                class="my-auto">{{ $video->countShareFeed() }}</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            {{-- {{$recipes->links('vendor.pagination.default')}} --}}
                        </div>
                        {{-- end tab 2 --}}

                        {{-- start tab 3 --}}
                        <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                            aria-labelledby="pills-contact-tab" tabindex="0">
                            {{-- @if ($recipes->count() == 0)
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: -3em">
                                <img src="{{asset('images/data.png')}}" style="width: 15em">
                                <p><b>Tidak ada data</b></p>
                            </div>
                        @endif --}}\
                            @if ($user->isSuperUser == 'yes')
                                <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                    {{-- @foreach ($recipes as $r) --}}
                                    <div class="col-lg-4 my-1">
                                        <div class="card p-3"
                                            style="width: 360px; height: 70%; border-radius: 15px; border: 0.50px black solid">
                                            <div class="row my-1 mb-5" style="">
                                                <div class="col-2">
                                                    <img class="rounded-circle mt-1 "
                                                        style="max-width:55px; margin-left: 10px;"
                                                        src="{{ asset('img/3.jpg') }}" width="55px" height="55px"
                                                        alt="dsdaa">
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class=" col-9" style="margin-top: -8px;">
                                                    <a type="button" class="as" href="">
                                                        <strong style="font-size: 17px;"> cara mengocok bumbu dengan baik
                                                            dan
                                                            benar</strong>
                                                    </a> <br>
                                                    <!-- Modal -->

                                                    <span class="ai">
                                                        Oleh drs moh hatta.gmail.com
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- @endforeach --}}
                                </div>
                            @endif

                            {{-- {{$recipes->links('vendor.pagination.default')}} --}}
                        </div>
                        {{-- end tab 3 --}}


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
@endsection
