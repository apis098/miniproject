@extends('template.nav')
@section('content')
    <style>
        .as {
            color: black;
            font-size: 15px;
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
    </style>
    <div class="ms-5 me-5">
        <div class="row">
            <div class="col-sm-4">
                <div class="card my-5 border border-dark sus susi" style="border-radius:25px;">
                    <div class="text-center mt-5">
                        <div style="position: relative; display: inline-block;">
                            @if ($userLogin->foto)
                                <img src="{{ asset('storage/' . $userLogin->foto) }}" width="146px" height="144px"
                                    style="border-radius: 50%" alt="">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px"
                                    style="border-radius: 50%" alt="">
                            @endif
                            <button type="submit"
                                style="position: absolute;  right: -2px; background-color:#F7941E; border: none"
                                class="btn btn-warning btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
                                data-bs-target="#mymodal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                    <mask id="ipSEdit0">
                                        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                                            <path stroke-linecap="round" d="M7 42h36" />
                                            <path fill="#fff" d="M11 26.72V34h7.317L39 13.308L31.695 6L11 26.72Z" />
                                        </g>
                                    </mask>
                                    <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSEdit0)" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class="mt-2"
                            style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            {{ $userLogin->name }}
                            @if ($userLogin->isSuperUser === 'yes')
                                <i class="fa-regular text-primary  fa-circle-check"></i>
                            @endif
                            <br>

                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{ $userLogin->email }}</span>

                        </p>
                        {{-- <button
                            style="border-radius: 15px;background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                            class="btn text-light mb-3">
                            <span style="font-weight: 600">
                                <a href="/koki/resep" style="color: rgb(255, 255, 255);">Buat Resep</a>
                            </span>
                        </button> --}}
                        {{-- @if (Auth::check())
                            @if (Auth::user()->isSuperUser == 'yes') --}}
                        {{-- <br> --}}
                        <button style="border-radius: 10px;background-color:white; border: 1px solid black;"
                            class="btn text-light mb-3">
                            <span style="font-weight: 600">
                                <a href="/koki/beranda" style="color: black;">Dashboard</a>
                            </span>
                        </button>
                        {{-- @endif
                        @endif --}}
                        {{-- <button style="border-radius: 15px;background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" class="btn text-light mb-3">
                            <span style="font-weight: 600">
                                <a href="/roomchat/roomchat" style="color: rgb(255, 255, 255);"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="3.5" cy="7" r=".5"/><circle cx="6.75" cy="7" r=".5"/><circle cx="10" cy="7" r=".5"/><path d="M7 .5a6.5 6.5 0 0 0-5.41 10.1L.5 13.5l3.65-.66A6.5 6.5 0 1 0 7 .5Z"/></g></svg></a>
                            </span>
                        </button> --}}
                    </div>
                </div>
            </div>
            {{-- awal modal --}}
            <div class="modal fade" data-bs-backdrop="static" id="mymodal" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered profile-modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" style="font-family: Poppins;" id="exampleModalLabel"><b
                                    class="ms-2">Edit Profile</b></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-3 col-sm-12 mb-3" style="text-align: center;">
                                    @if ($userLogin->foto)
                                        <img src="{{ asset('storage/' . $userLogin->foto) }}" width="106px"
                                            height="104px" style="border-radius: 50%;" id="profile-image">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                            style="border-radius: 50%;" id="profile-image">
                                    @endif
                                    <br>
                                    <label for="fileInputA" class="btn btn-warning btn-sm mt-2 rounded-5 text-light"
                                    style="background-color: #F7941E; border-radius: 9px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    id="chooseFileButtonA">
                                    <b class="ms-3 me-3">Pilih file</b>
                                </label>

                                <a href="{{ route('delete.profile') }}" id="deleteProfile" hidden>Hapus</a>
                                <a onclick="DeleteData()" class="btn btn-warning btn-sm rounded-5"
                                    style="border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                        class="ms-1 me-2 text-light">Hapus foto</b></a>

                                </div>
                                <div class="col-md-9 col-sm-12">
                                    <form action="{{ route('update.profile') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <input type="file" id="fileInputA" name="profile_picture"
                                            style="display:none">
                                        <div class="mb-3">
                                            <input type="text" value="{{ $userLogin->name }}" name="name"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <input type="email" name="email" value="{{ $userLogin->email }}"
                                                class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="biodata" id="biodata" class="form-control" cols="30" rows="10">{{ $userLogin->biodata }}</textarea>
                                        </div>
                                        <div class="mb-3" style="text-align: end;">
                                            <button class="btn btn-warning btn-sm rounded-5 text-light"
                                                style="border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                type="submit" id="saveProfileButton"><b
                                                    class="ms-1 me-1">Simpan</b></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer mt-3 mb-4">

                        </div>
                        </form>
                    </div>
                    <script>
                        document.getElementById("fileInputA").addEventListener("change", function(event) {
                            var input = event.target;
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById("profile-image").setAttribute("src", e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        });
                    </script>
                </div>
            </div>
            {{-- akhir modal --}}
            <style>
                @media (min-width:290px) and (max-width: 340px) {

                    /* a.gser {
                                                    margin-right: 50px;
                                                } */
                    i.kiri {
                        margin-left: 40px;
                    }

                    div.ash {
                        padding-right: 95px;
                    }

                    a.knan {
                        margin-left: -12px;
                    }

                    /* span.hi {
                                                                    padding-top: -30px;
                                                                } */


                }

                /* untuk tampilan mobile */
                @media (min-width: 350px) and (max-width: 860px) {
                    i.uhuy {
                        margin-left: 75px;
                    }

                    h5.mas {
                        margin-left: 35px;
                    }

                    div.besar {
                        width: 100%;
                    }


                }

                /* untuk tampilan ipad */
                @media (min-width: 760px) and (max-width: 1000px) {
                    div.sus {
                        width: 330%;
                    }

                    div.besar {
                        width: 50%;
                    }

                    div.high {
                        height: 82%;
                    }

                    i.uuy {
                        margin-left: 200px;
                    }

                    button.rigt {
                        margin-left: 45px;
                    }

                    a.knan {
                        margin-left: -8px;
                    }

                    /* a.icons {
                                                    padding-left: 50px;
                                                } */
                    /*

                                                svg.rigt {
                                                    margin-right: 50px;
                                                } */
                }

                /* untuk tampilan laptop */
                @media (min-width: 1210px) and (max-width: 4000px) {
                    div.meta {
                        margin-top: 50px;
                    }

                    a.knan {
                        margin-right: 5px;
                    }

                    div.besar {
                        width: 100%;
                    }

                    button.rigt {
                        margin-left: 45px;
                    }

                    a.rigt {
                        margin-left: 45px;
                    }
                }

                @media (min-width:992px) and (max-width:1200px) {
                    .card2 {
                        margin-top: 50px;
                    }
                }

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
                        margin-left: 30px;
                    }
                }

                @media(max-width: 330px) {
                    .nav-item button {
                        margin-left: 18px;
                    }
                }
            </style>
            <div class="col-lg-8 card2">
                <div class="row meta">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
                            <div class="d-flex justify-content-between my-1">
                                <div class="">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $userLogin->like }}
                                    </span> <br>
                                    <p class="ms-3">Suka</p>
                                </div>
                                <div class="mt-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl uhuy uuy kiri"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
                            <div class="d-flex justify-content-between my-1">
                                <div class="">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $resep_sendiri->count() }}
                                    </span> <br>
                                    <p class="ms-3">Resep</p>
                                </div>
                                <div class="mt-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl uhuy uuy kiri"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
                            <div class="d-flex justify-content-between my-1">
                                <div class="">
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $userLogin->followers }}
                                    </span> <br>
                                    <p class="ms-3">Pengikut</p>
                                </div>
                                <div class="mt-3">
                                    <i class="fa-solid fa-user-plus fa-2xl uhuy uuy kiri"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class=" d-flex " style="">
                            <ul class="nav mb-3" style="" id="pills-tab" role="tablist">
                                <li class="nav-item tabs" role="presentation">
                                    <a id="button-biografi" class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#resep" type="button" role="tab" aria-controls="resep"
                                        aria-selected="false">
                                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                                            Biografi
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

                                <li class="nav-item tabs" role="presentation" style="">
                                    <a id="button-video-dibuat" class="nav-link" data-bs-toggle="tab"
                                        data-bs-target="#komentar" type="button" role="tab"
                                        aria-controls="komentar" aria-selected="false">
                                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Video
                                            Dibuat </h5>
                                        <div id="border3" class=""
                                            style="width:100%; height: 100%; border: 1px #F7941E solid;" hidden>
                                        </div>
                                    </a>
                                </li>

                                @if ($userLogin->isSuperUser === 'yes')
                                    <li class="nav-item tabs" role="presentation" style="">
                                        <button id="button-kursus-dibuat" class="nav-link yuhu mt-2" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">
                                            <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus
                                                Dibuat</h5>
                                            <div id="border4" class=""
                                                style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                            </div>
                                        </button>
                                    </li>
                                @else
                                    <li hidden class="nav-item tabs" role="presentation" style="">
                                        <button id="button-kursus-dibuat" class="nav-link yuhu mt-2" data-bs-toggle="tab"
                                            data-bs-target="#profile" type="button" role="tab"
                                            aria-controls="profile" aria-selected="false">
                                            <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus
                                                Dibuat</h5>
                                            <div id="border4" class=""
                                                style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                            </div>
                                        </button>
                                    </li>
                                @endif
                            </ul>
                        </div>

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
                            <div class="row mb-5" style="margin-top:-50px;">
                                @foreach ($recipes as $r)
                                    <div class="col-lg-4 col-md-6 my-1">
                                        <div class="card p-3"
                                            style="height: 95%; border-radius: 15px; border: 0.50px black solid">
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
                            @if ($videos->count() < 1)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            <div class="row mb-5" style="margin-top: -50px; ">
                                {{-- @foreach ($recipes as $r) --}}
                                <style>
                                    @media (min-width: 1150px) and (max-width: 4000px) {
                                        div.vid {
                                            height: 86%;
                                        }
                                    }

                                    @media (min-width: 601px) and (max-width: 1024px) {

                                        /* Atur gaya CSS khusus untuk perangkat tablet di sini */
                                        div.vid {
                                            height: 80%;
                                        }

                                        div.ash {
                                            padding-left: 15px;
                                        }

                                        a.hu {
                                            padding-left: 40px;
                                        }

                                        span.hi {
                                            padding-top: -30px;
                                        }
                                    }

                                    @media (max-width: 768px) {
                                        div.vid {
                                            height: 80%;
                                        }

                                        div.ash {
                                            padding-left: 15px;
                                        }

                                        a.hu {
                                            padding-left: 12%;
                                        }

                                        span.hi {
                                            padding-top: -30px;
                                        }
                                    }
                                </style>
                                @foreach ($videos as $video)
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
                                            <div class="d-flex justify-content-between ms-2 me-2">
                                                <div>
                                                    <a type="button" class="text-dark my-auto" onclick="openModel()"
                                                        id="button-modal-komentar-feed" href="#"
                                                        data-bs-toggle="modal"data-bs-target="#exampleModal">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" viewBox="0 0 512 512">
                                                            <path fill="currentColor"
                                                                d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                                                        </svg>
                                                        &nbsp;
                                                        <span class="my-auto">{{ $video->countLikeFeed() }}</span>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a type="button" class="text-dark my-auto" onclick="openModel()"
                                                        id="button-modal-komentar-feed" href="#"
                                                        data-bs-toggle="modal"data-bs-target="#exampleModal">
                                                        <svg class="rigt" xmlns="http://www.w3.org/2000/svg"
                                                            width="26" height="26" viewBox="0 0 16 16">
                                                            <path fill="currentColor"
                                                                d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                                        </svg>
                                                        &nbsp;
                                                        <span class="my-auto">{{ $video->countCommentFeed() }}</span>
                                                    </a>
                                                </div>
                                                <div>
                                                    <a type="button" class="my-auto text-dark " href="#"
                                                        data-bs-toggle="modal" data-bs-target="#bagikan">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="27"
                                                            height="25" viewBox="0 0 512 512">
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="32"
                                                                d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                                        </svg>

                                                        <span class="my-auto">{{ $video->countShareFeed() }}</span>
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                @endforeach
                                {{-- @endforeach --}}
                            </div>
                            {{-- {{$recipes->links('vendor.pagination.default')}} --}}
                        </div>
                        {{-- end tab 2 --}}

                        {{-- start tab 3 --}}
                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                            tabindex="0">
                            @if ($kursus->count() == 0)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            <div class="row mb-5" style="margin-top: -50px; ">
                                @foreach ($kursus as $course)
                                    <div class="col-lg-6 col-md-6 my-1">
                                        <div class="card p-2"
                                            style="width: 100%; height: 95%; border-radius: 15px; border: 0.50px black solid">
                                            <div class="d-flex my-1">
                                                <div class="col-2">
                                                    <img class="rounded-circle mt-1" style="max-width:55px;"
                                                        src="{{ asset('storage/' . $course->foto_kursus) }}"
                                                        width="55px" height="55px" alt="dsdaa">
                                                </div>
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                <div class="col-10">
                                                    <a type="button" class="text-dark knan"
                                                        href="/detail_kursus/{{ $course->id }}">
                                                        <strong>{{ $course->nama_kursus }}</strong>
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
                {{-- <h4 class="mt-1 mb-4" style="font-weight: 600; margin-top:-15px"><b>Resep anda</b></h4>
                @if ($recipes->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                    <p><b>Tidak ada data</b></p>
                </div>
                @endif --}}

            </div>

        </div>
    </div>

    <script>
        function DeleteData() {
            iziToast.show({
                backgroundColor: '#f2a5a8',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus data ini?',
                position: 'topCenter',
                close: false,
                progressBarColor: 'dark',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('deleteProfile').click();
                            }
                        }, toast, 'buttonName');
                    }, false], // true to focus
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function(
                        instance, toast) {
                        instance.hide({}, toast, 'buttonName');
                    }]
                ],
                onOpening: function(instance, toast) {
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy) {
                    console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });
        }
    </script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
