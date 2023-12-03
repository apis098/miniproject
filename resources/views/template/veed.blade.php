@extends('template.nav')
@section('content')
    @push('style')
        @powerGridStyles
    @endpush
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
    <div id="video_pembelajaran">
        <section class="text-align-center mt-5" id="all">

            <!-- rekomendasi chef start -->
            <div class="row justify-content-center">
                <div class="col-md-3 hidden-content" style="">
                    <div class="card float-right" style="width: 15rem; margin-left:50px;  border-radius: 10px">
                        <div class="card-header text-white text-center"
                            style="background-color: #F7941E;   border-top-right-radius: 10px; border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Rekomendasi Chef
                        </div>
                        <div class="card-body" style="height: 400px;">
                            @foreach ($top_users as $row)
                                <div class="d-flex mb-3">
                                    @if ($row->foto)
                                        <a href="/profile-orang-lain/{{ $row->id }}">
                                            <img src="{{ asset('storage/' . $row->foto) }}"
                                                class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                        </a>
                                    @else
                                        <a href="/profile-orang-lain/{{ $row->id }}">
                                            <img src="{{ asset('images/default.jpg') }}" class="border rounded-circle me-2"
                                                alt="Avatar" style="height: 40px" />
                                        </a>
                                    @endif
                                    <div>
                                        <div class="bg-light rounded-3 px-3 py-1">
                                            <a href="/profile-orang-lain/{{ $row->id }}" class="text-dark mb-0">
                                                <strong>{{ $row->name }}</strong>
                                                @if ($row->isSuperUser == 'yes')
                                                    <i class="fa-duotone fa-circle-check"></i>
                                                @endif
                                            </a>
                                            <a href="/profile-orang-lain/{{ $row->id }}" class="text-muted d-block">
                                                <small>{{ $row->resep->count() }} Resep dibuat</small>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    
                </div>
                <!-- rekomendasi chef end -->
                <style>
                    .video-js .vjs-big-play-button{
                        justify-content: center; /* Pusat horizontal */
                        align-items: center; /* Pusat vertikal */
                        }
                        
                    .posisi {
                        margin-top: -3%;
                    }

                    .form {
                        position: relative;
                    }

                    .form .fa-search {
                        position: absolute;
                        top: 20px;
                        left: 20px;
                        color: #9ca3af;

                    }

                    .border-orange {
                        width: 150px;
                        height: 225px;
                        border-radius: 15px;
                        border: #F7941E solid;
                        overflow: hidden;
                    }

                    .border-black {
                        width: 150px;
                        height: 225px;
                        border-radius: 15px;
                        border: black solid;
                        overflow: hidden;
                    }

                    .form span {

                        position: absolute;
                        right: 17px;
                        top: 13px;
                        padding: 2px;
                        border-left: 1px solid #d1d5db;

                    }

                    .left-pan {
                        padding-left: 7px;
                        margin-top: 20px;
                    }

                    .left-pan i {
                        padding-left: 10px;
                    }

                    .form-input {
                        /* margin-left: -3.5%; */
                        width: 100%;
                        height: 55px;
                        text-indent: 33px;
                        border-radius: 10px;
                    }

                    .form-input:focus {

                        box-shadow: none;
                        border: #F7941E solid;
                    }

                    @keyframes fadeIn {
                        0% {
                            opacity: 0;
                        }

                        100% {
                            opacity: 1;
                        }
                    }

                    .fade-in {
                        animation: fadeIn 0.5s ease-in-out;
                    }

                    .fade-out {
                        animation-name: fadeOutAnimation;
                        animation-duration: 0.5s;
                        /* Sesuaikan durasi animasi sesuai keinginan Anda */
                        animation-timing-function: ease-out;
                        animation-fill-mode: forwards;
                    }

                    @keyframes fadeOutAnimation {
                        from {
                            opacity: 1;
                        }

                        to {
                            opacity: 0;
                        }
                    }
                    @media (min-width: 425px) {
                        .col-lg-1.col-md-1.col-sm-1.pr-0 {
                            padding-right: unset !important; /* Unset the padding-right */
                        }
                    }

                        @media (max-width: 767px) {
                            .d-flex {
                                display: block; /* Ganti dengan properti display yang sesuai */
                            }
                        }

                        @media (min-width: 768px) {
                            .historyJam {
                                float: right; /* Ganti dengan properti display yang sesuai */
                            }
                        }

                        @media (max-width: 767px) {
                            .removePaddingLeft {
                                padding-left: 0; /* Ganti dengan properti display yang sesuai */
                            }
                        }

                        @media screen and (max-width: 767px) {
                        .pr-5 {
                            padding-right: 6% !important;
                        }
                        }


                </style>
                <!-- feed start -->
                <div class="col-md-12 col-lg-6">
                    <div class="card responsive-upload border-0 mb-3">
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input search-video" placeholder="Cari...">
                        </div>
                    </div>

                    <div class="card responsive-upload border-0 mb-3" hidden>
                        <div class="form">
                            <i class="fa fa-search"></i>
                            <input type="text" class="form-control form-input search-uuid" value="{{ request()->uuid }}"
                                placeholder="Cari...">
                        </div>
                    </div>
                    <script>
                        $(document).ready(function() {
                            $('.search-video').on('input', function() {
                                var value = $(this).val().toLowerCase();
                                $('.item-video').filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                        $(document).ready(function() {
                            // Ambil nilai awal dari input
                            var initialValue = $('.search-uuid').val().toLowerCase();

                            // Fungsi pencarian
                            $('.search-uuid').on('input', function() {
                                var value = $(this).val().toLowerCase();
                                $('.item-video').filter(function() {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });

                            // Jalankan fungsi pencarian dengan nilai awal
                            $('.item-video').filter(function() {
                                $(this).toggle($(this).text().toLowerCase().indexOf(initialValue) > -1)
                            });
                        });
                    </script>
                    <div class="card responsive-upload">
                        <div class="card-body">

                            @if (Auth::check())
                                <form action="{{ route('upload.video') }}" method="post" enctype="multipart/form-data"
                                    id="formUploadVideo">
                                    @csrf
                                    @if (Auth::user()->isSuperUser === 'yes')
                                        <div class="d-flex mb-2">

                                            <input type="radio" class="btn-check" name="isPremium" id="success-outlined"
                                                autocomplete="off" value="no">
                                            <label class="btn btn-select mr-3" id="free"
                                                for="success-outlined">Gratis</label>

                                            <input type="radio" class="btn-check" name="isPremium" id="danger-outlined"
                                                autocomplete="off" value="yes">
                                            <label class="btn btn-no-select" id="prem"
                                                for="danger-outlined">Premium</label>

                                            <div class="ml-auto d-flex">
                                                <div id="loading-overlay" style="display: none;"
                                                    class="spinner-border text-orange" role="status">
                                                    <span class="sr-only">Loading...</span>
                                                </div>
                                                <small id="text-loading" style="display: none"
                                                    class="ms-1 mt-2 text-orange fw-bolder font-italic fade-in shake-text">Mengunggah
                                                    postingan...</small>
                                            </div>
                                        </div>
                                    @else
                                        <div class="ml-auto d-flex mb-3">
                                            <div id="loading-overlay" style="display: none;"
                                                class="spinner-border text-orange" role="status">
                                                <span class="sr-only">Loading...</span>
                                            </div>
                                            <small id="text-loading" style="display: none"
                                                class="ms-1 mt-2 text-orange fw-bolder font-italic fade-in shake-text">Mengunggah
                                                postingan...</small>
                                        </div>
                                    @endif
                                    <textarea name="deskripsi_video" class="form-control" placeholder="Ketik apa yang anda pikirkan" id="deskripsi_video"
                                        rows="5" required>{{ old('deskripsi_video') }}</textarea>
                                    <br>
                                    <input type="file" name="upload_video" id="inputVideo" hidden>
                                    <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-12">
                                    <a href="#" class="btn btn-light" id="aVideo" onclick="openV()"
                                        style="background-color: white; border: 0.50px black solid; border-radius: 10px;">
                                        <div style="font-weight: 600; color: black;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 18q2.075 0 3.538-1.462Q17 15.075 17 13q0-2.075-1.462-3.538Q14.075 8 12 8Q9.925 8 8.463 9.462Q7 10.925 7 13q0 2.075 1.463 3.538Q9.925 18 12 18Zm0-2q-1.25 0-2.125-.875T9 13q0-1.25.875-2.125T12 10q1.25 0 2.125.875T15 13q0 1.25-.875 2.125T12 16Zm6-6q.425 0 .712-.288Q19 9.425 19 9t-.288-.713Q18.425 8 18 8t-.712.287Q17 8.575 17 9t.288.712Q17.575 10 18 10ZM4 21q-.825 0-1.412-.587Q2 19.825 2 19V7q0-.825.588-1.412Q3.175 5 4 5h3.15L8.7 3.325q.15-.15.337-.238Q9.225 3 9.425 3h5.15q.2 0 .388.087q.187.088.337.238L16.85 5H20q.825 0 1.413.588Q22 6.175 22 7v12q0 .825-.587 1.413Q20.825 21 20 21Zm16-2V7h-4.05l-1.825-2h-4.25L8.05 7H4v12Zm-8-6Z" />
                                            </svg> Tambahkan Video</div>
                                    </a>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                    <button type="submit" class="btn mt-2" id="buttonUploadVideo"
                                        style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                        <span style="font-weight: 600; color: white;">Upload</span>
                                    </button>
                                    </div>
                                    </div>

                                </form>
                            @else
                                <form>
                                    @csrf
                                    <textarea name="" class="form-control" placeholder="Ketik apa yang anda pikirkan" id="floatingTextarea"
                                        rows="5" required>{{ old('deskripsi_video') }}</textarea>
                                    <br>
                                    <div class="row">
                                    <div class="col-lg-10 col-md-10 col-sm-12">
                                    <a href="#" class="btn btn-light" onclick="harusLogin()"
                                        style="background-color: white; border: 0.50px black solid; border-radius: 10px;">
                                        <span style="font-weight: 600; color: black;"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 18q2.075 0 3.538-1.462Q17 15.075 17 13q0-2.075-1.462-3.538Q14.075 8 12 8Q9.925 8 8.463 9.462Q7 10.925 7 13q0 2.075 1.463 3.538Q9.925 18 12 18Zm0-2q-1.25 0-2.125-.875T9 13q0-1.25.875-2.125T12 10q1.25 0 2.125.875T15 13q0 1.25-.875 2.125T12 16Zm6-6q.425 0 .712-.288Q19 9.425 19 9t-.288-.713Q18.425 8 18 8t-.712.287Q17 8.575 17 9t.288.712Q17.575 10 18 10ZM4 21q-.825 0-1.412-.587Q2 19.825 2 19V7q0-.825.588-1.412Q3.175 5 4 5h3.15L8.7 3.325q.15-.15.337-.238Q9.225 3 9.425 3h5.15q.2 0 .388.087q.187.088.337.238L16.85 5H20q.825 0 1.413.588Q22 6.175 22 7v12q0 .825-.587 1.413Q20.825 21 20 21Zm16-2V7h-4.05l-1.825-2h-4.25L8.05 7H4v12Zm-8-6Z" />
                                            </svg> Tambahkan Video</span>
                                    </a>
                                    </div>

                                    <div class="col-lg-2 col-md-2 col-sm-12">
                                    <button type="button" href="#" class="btn mt-2" onclick="harusLogin()"
                                        style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                        <span style="font-weight: 600; color: white;">Upload</span>
                                    </button>
                                    </div>
                                    </div>
                                </form>
                            @endif
                        </div>
                    </div>
                    <style>
                        .btn-select {
                            background: #F7941E;
                            border-radius: 15px;
                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                            color: #EAEAEA;
                        }

                        .btn-no-select {
                            background: #EAEAEA;
                            border-radius: 15px;
                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                            color: black;
                        }
                    </style>
                    <script>
                        const free_button = document.getElementById("free");
                        const prem_button = document.getElementById("prem");
                        free_button.addEventListener("click", function() {
                            free_button.classList.remove("btn-no-select");
                            free_button.classList.add("btn-select");
                            prem_button.classList.remove("btn-select");
                            prem_button.classList.add("btn-no-select");
                        });
                        prem_button.addEventListener("click", function() {
                            prem_button.classList.remove("btn-no-select");
                            prem_button.classList.add("btn-select");
                            free_button.classList.remove("btn-select");
                            free_button.classList.add("btn-no-select");
                        });
                    </script>
                    <!-- foreach video pembelajaran start -->
                    @if ($video_pembelajaran->count() == 0)
                        <div class="d-flex flex-column justify-content-center align-items-center"
                            style="margin-top: 20%; margin-bottom: 20%;">
                            <img src="{{ asset('images/data.png') }}" style="width: 15em">
                            <p><b>Tidak ada data</b></p>
                        </div>
                    @endif
                    @foreach ($video_pembelajaran as $urut => $item_video)
                        <div class="card mt-4 mb-5 item-video">
                            <!-- Data -->
                            <div class="col-12 card-header" style="background-color: white">
                                <p id="uuid" hidden>{{ $item_video->uuid }}</p>
                                <div class="row mb-1 item" style="padding-left: 2%; padding-right: 2%;" data-id="{{ $item_video->id }}">
                                    <a href="" class="col-lg-1 col-md-1 col-2 pr-2 pl-1">
                                        @if ($item_video->user->foto)
                                            <img src="{{ asset('storage/' . $item_video->user->foto) }}"
                                                class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}"
                                                class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                        @endif
                                    </a>
                                    <!-- <div style="margin-top: 8px;"> -->
                                        <a href="{{ route('show.profile', $item_video->user->id) }}" class="col-lg-8 col-md-8 col-10 text-dark my-auto pl-0" >
                                            <strong class="text-center text-truncate">{{ $item_video->user->name }}</strong>
                                        </a>
                                        <a href="" class="col-lg-3 col-md-3 col-sm-12 text-muted d-block my-auto removePaddingLeft"
                                             >
                                            <small style="float: right;" class="historyJam">
                                                {{ \Carbon\Carbon::parse($item_video->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                        </a>
                                    <!-- </div> -->
                                </div>

                            </div>
                            <style>
                                .vjs-big-play-button {
                                    margin-left: 250px;
                                    margin-top: 120px;
                                }
                            </style>
                            <!-- Media -->
                            <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                                @if ($item_video->authenticatePrem() === 200)
                                    <!-- untuk feed tidak premium -->
                                    <video class="video-js vjs-theme-city" id="my-video" controls preload="auto"
                                        width="615" height="315" data-setup="{}">
                                        <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                            type="video/mp4" />
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5
                                                video</a>
                                        </p>
                                    </video>
                                @elseif ($item_video->authenticatePrem() === 1)
                                    <!-- untuk feed premium tapi dilihat pembuat feed dan admin -->
                                    <video class="video-js vjs-theme-city" id="my-video" controls preload="auto"
                                        width="615" height="315" data-setup="{}">
                                        <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                            type="video/mp4" />
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5
                                                video</a>
                                        </p>
                                    </video>
                                @elseif($item_video->authenticatePrem() === 2)
                                    <!-- untuk feed premium dilihat user berlangganan -->
                                    <video class="video-js vjs-theme-city"
                                        onclick="userAccessFeedPrem({{ $item_video->user->id }}, {{ $item_video->id }})"
                                        id="my-video" controls preload="auto" width="615" height="315"
                                        data-setup="{}">
                                        <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                            type="video/mp4" />
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5
                                                video</a>
                                        </p>
                                    </video>
                                @elseif ($item_video->authenticatePrem() === 0)
                                    <!-- untuk feed premium dilihat user belum berlangganan atau yang belum login -->
                                    <video class="video-js vjs-theme-city feed" id="my-video" controls preload="auto"
                                        width="615" height="315" data-setup="{}">
                                        <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                            type="video/mp4" />
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5
                                                video</a>
                                        </p>
                                    </video>
                                @endif

                                {{--
                                @if (Auth::check())
                                    @if ($item_video->isPremium === 'yes')
                                        @if ($item_video->AuthenticateFeedPremium(Auth::user()->id, $item_video->id))
                                            <video class="video-js vjs-theme-city"
                                                onclick="userAccessFeedPrem({{ $item_video->user->id }}, {{ $item_video->id }})"
                                                id="my-video" controls preload="auto" width="615" height="315"
                                                data-setup="{}">
                                                <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                                    type="video/mp4" />
                                                <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                    web browser that
                                                    <a href="https://videojs.com/html5-video-support/"
                                                        target="_blank">supports HTML5
                                                        video</a>
                                                </p>
                                            </video>
                                        @else
                                            <video
                                                @if ($item_video->isPremium === 'yes') class="video-js vjs-theme-city feed"
                                    @else
                                    class="video-js vjs-theme-city" @endif
                                                id="my-video" controls preload="auto" width="615" height="315"
                                                data-setup="{}">
                                                <source
                                                    src="{{ asset('storage/video-user-prem/' . $item_video->upload_video) }}"
                                                    type="video/mp4" />
                                                <p class="vjs-no-js">
                                                    To view this video please enable JavaScript, and consider upgrading to a
                                                    web browser that
                                                    <a href="https://videojs.com/html5-video-support/"
                                                        target="_blank">supports HTML5
                                                        video</a>
                                                </p>
                                            </video>
                                        @endif
                                    @else
                                        <video
                                            @if ($item_video->isPremium === 'yes') class="video-js vjs-theme-city feed"
                                    @else
                                    class="video-js vjs-theme-city" @endif
                                            id="my-video" controls preload="auto" width="615" height="315"
                                            data-setup="{}">
                                            @if ($item_video->isPremium === 'yes')
                                                <source
                                                    src="{{ asset('storage/video-user-prem/' . $item_video->upload_video) }}"
                                                    type="video/mp4" />
                                            @else
                                                <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                                    type="video/mp4" />
                                            @endif
                                            <p class="vjs-no-js">
                                                To view this video please enable JavaScript, and consider upgrading to a
                                                web browser that
                                                <a href="https://videojs.com/html5-video-support/"
                                                    target="_blank">supports
                                                    HTML5
                                                    video</a>
                                            </p>
                                        </video>
                                    @endif
                                @else
                                    <video
                                        @if ($item_video->isPremium === 'yes') class="video-js vjs-theme-city feed"
                                        @else
                                        class="video-js vjs-theme-city" @endif
                                        id="my-video" controls preload="auto" width="615" height="315"
                                        data-setup="{}">
                                        @if ($item_video->isPremium === 'yes')
                                            <source
                                                src="{{ asset('storage/video-user-prem/' . $item_video->upload_video) }}"
                                                type="video/mp4" />
                                        @else
                                            <source src="{{ asset('storage/' . $item_video->upload_video) }}"
                                                type="video/mp4" />
                                        @endif
                                        <p class="vjs-no-js">
                                            To view this video please enable JavaScript, and consider upgrading to a
                                            web browser that
                                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports
                                                HTML5
                                                video</a>
                                        </p>
                                    </video>
                                @endif
                                --}}
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </a>
                            </div>
                            <!-- Media -->
                            <!-- Interactions -->
                            <div class="card-body col-12">
                                <!-- Reactions -->
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="col-6 pl-0">
                                    <span class="d-flex flex-row" style="color: black;">
                                    
                                        <!-- like feed start -->
                                        @if (Auth::check())
                                            <!-- <span id="feed{{ $urut }}" class=""> -->

                                                @if ($item_video->checkLikeFeed(Auth::user()->id))
                                                    <form id="formLikeVeed{{ $urut }}"
                                                        action="/like/veed/{{ Auth::user()->id }}/{{ $item_video->id }}" class="mr-1 text-center">
                                                        <button class=""
                                                            style="border: none; background-color:white;"
                                                            onclick="likeFeed({{ $urut }})">
                                                            <i class="text-orange fa-solid fa-lg fa-thumbs-up"
                                                                id="likeB{{ $urut }}"></i>
                                                        </button>
                                                        <span class="my-auto ml-auto"
                                                    id="countLikeFeed{{ $urut }}">{{ $item_video->like_veed->count() }}</span>
                                                    </form>
                                                @else
                                                    <form id="formLikeVeed{{ $urut }}"
                                                        action="/like/veed/{{ Auth::user()->id }}/{{ $item_video->id }}" class="mr-1 text-center">
                                                        <button class="text-dark"
                                                            style="border: none; background-color:white;"
                                                            onclick="likeFeed({{ $urut }})">
                                                            <i id="likeB{{ $urut }}"
                                                                class="fa-regular fa-lg fa-thumbs-up"></i>
                                                        </button>
                                                        <span class="my-auto ml-auto"
                                                    id="countLikeFeed{{ $urut }}">{{ $item_video->like_veed->count() }}</span>
                                                    </form>
                                                @endif
                                            <!-- </span> -->
                                        @else
                                            <form>
                                                <button style="border: none; background-color:white;" id="buttonLikeVeed"
                                                    type="button" onclick="harusLogin()">
                                                    <i class="fa-regular fa-lg fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <!-- <span class="my-auto"
                                            id="countLikeFeed{{ $urut }}">{{ $item_video->like_veed->count() }}</span> -->

                                        <!-- like feed end -->
                                        <!-- komentar feed start -->
                                        <button type="button" class=" ml-2 mr-2 yuhu text-dark" {{-- onclick="openModel({{ $urut }})" --}}
                                            {{-- id="button-modal-komentar-feed{{ $urut }}" --}} data-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="collapseExample"
                                            data-target="#commentCollapse{{ $urut }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 16 16">
                                                <path fill="currentColor"
                                                    d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                            </svg>
                                            <span class="my-auto"
                                                id="jumlah_komentar_feed{{ $item_video->id }}">{{ $item_video->countCommentFeed() }}</span>
                                        </button>
                                        <!-- modal komentar feed -->
                                        <div class="modal" id="exampleModal{{ $urut }}">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"
                                                            style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                            Komentar</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body d">
                                                        <!-- form komentar feed start -->
                                                        @if (Auth::user())
                                                            <form id="formCommentVeed{{ $urut }}"
                                                                action="{{ route('komentar.veed', [Auth::user()->id, $item_video->user->id, $item_video->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="row mb-3">
                                                                    <div class="col-lg-1 col-md-1 col-2 pl-0">
                                                                    @if (Auth::user()->foto)
                                                                        <img src="{{ asset('storage' . Auth::user()->foto) }}"
                                                                            class="border rounded-circle me-5"
                                                                            alt="Avatar"
                                                                            style="height: 60px; margin-left: 20px;" />
                                                                    @else
                                                                        <img src="{{ asset('images/default.jpg') }}"
                                                                            class="border rounded-circle me-5"
                                                                            alt="Avatar"
                                                                            style="height: 60px; margin-left: 20px;" />
                                                                    @endif
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-10">
                                                                    <input type="text"
                                                                        id="input_comment_feed{{ $urut }}"
                                                                        name="commentVeed" width="100%"
                                                                        class="form-control rounded-3 me-3"
                                                                        style="margin-top: 12px"
                                                                        placeholder="Masukkan komentar...">
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-12">
                                                                    <button type="submit"
                                                                        id="buttonCommentVeed{{ $urut }}"
                                                                        onclick="komentar_feed({{ $urut }})"
                                                                        style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                        class="btn  btn-sm text-light"><b
                                                                            class="me-3 ms-3">Kirim</b></button>
                                                                    </div>

                                                                </div>
                                                            </form>
                                                        @else
                                                            <form>
                                                                <div class="row mb-3">
                                                                    <div class="col-lg-1 col-md-1 col-2 pl-0">
                                                                    <img src="{{ asset('images/default.jpg') }}"
                                                                        class="border rounded-circle me-5" alt="Avatar"
                                                                        style="height: 60px; margin-left: 20px;" />
                                                                    </div>
                                                                    <div class="col-lg-9 col-md-9 col-10">
                                                                    <input type="text" id="comment-veed1"
                                                                        name="commentVeed" width="100%"
                                                                        class="form-control rounded-3 me-3"
                                                                        style="margin-top: 12px"
                                                                        placeholder="Masukkan komentar...">
                                                                    </div>
                                                                    <div class="col-lg-2 col-md-2 col-12">
                                                                    <button type="button" onclick="harusLogin()"
                                                                        id="buttonCommentVeed" class="btn text-white"
                                                                        style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;">Kirim</button>
                                                                    </div>
                                                                </div>
                                                            </form>
                                                        @endif
                                                        <!-- form komentar feed end -->


                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- komentar feed end -->

                                        <!-- Bagikan feed start -->
                                        <a class="ml-1 mr-1 my-auto text-dark text-center" href="#" data-bs-toggle="modal"
                                            data-bs-target="#bagikan{{ $item_video->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25"
                                                viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32"
                                                    d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                            </svg>
                                            <span id="shared_count{{ $item_video->id }}"
                                                class="my-auto">{{ $item_video->share_veed->count() }}</span>
                                        </a>

                                        <!-- modal Bagikan start -->

                                        <style>
                                            /* Gaya khusus untuk checkbox */
                                            .select-checkbox {
                                                display: none;
                                                /* Sembunyikan checkbox asli */
                                            }

                                            /* Gaya label checkbox */
                                            .select-checkbox+label {
                                                display: inline-block;
                                                width: 25px;
                                                /* Sesuaikan lebar sesuai keinginan Anda */
                                                height: 25px;
                                                /* Sesuaikan tinggi sesuai keinginan Anda */
                                                border: 1px solid #000;
                                                /* Atur garis tepi */
                                                border-radius: 50%;
                                                /* Membuat checkbox bundar */
                                                cursor: pointer;
                                                /* Ganti kursor saat diarahkan ke checkbox */
                                                vertical-align: middle;
                                                /* Atur pemosisian vertikal */
                                            }

                                            /* Gaya label checkbox yang dicentang */
                                            .select-checkbox:checked+label {
                                                background-color: #F7941E;
                                                /* Warna latar belakang saat dicentang */
                                                border: none;
                                            }
                                        </style>
                                        <style>
                                            .search {
                                                background-color: #fff;
                                                padding: 4px;
                                                border-radius: 5px;
                                                width: 200%;
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
                                                outline: none;
                                                border: #F7941E solid;
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
                                                width: 280%;
                                                border-radius: 15px;
                                                color: #000;
                                                padding-left: 18px;
                                                padding-right: 100px;
                                                text-align: center
                                            }

                                            .search-2 input:focus {
                                                box-shadow: none;
                                                border: #F7941E solid;
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


                                            @media (max-width: 767px) {
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

                                                .d-flex {
                                                    flex-wrap: nowrap;
                                                }

                                                .col-1 {
                                                    white-space: nowrap;
                                                }

                                            }
                                        </style>
                                        {{-- modal bagikan --}}
                                        <div class="modal" id="bagikan{{ $item_video->id }}">
                                            <form id="share_form{{ $item_video->id }}"
                                                action="{{ route('share.feed', $item_video->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                Bagikan Kepada</h5>
                                                            <button type="button" class="close mr-2"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mb-4">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-2 mt-2 me-1"
                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                    Kepada
                                                                </div>

                                                                <div class="search" style="border-radius: 15px;">
                                                                    <div class="col-lg-11 mt-2">
                                                                        <div class="search-2"> <i class='bx bxs-map'></i>

                                                                            <input id="search" type="text"
                                                                                name="" style="text-align: left;"
                                                                                placeholder="Cari...">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <h3 class="mt-4 ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                Disarankan</h3>
                                                            @foreach ($allUser as $user)
                                                                <div class="element-pencarian">
                                                                    <div class="d-flex mt-4">
                                                                        <div
                                                                            class="col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2">
                                                                            <a class="foto" href="">
                                                                                @if ($user->foto)
                                                                                    <img src="{{ asset('storage/' . $user->foto) }}"
                                                                                        class="border rounded-circle me-2"
                                                                                        alt="Avatar"
                                                                                        style="height: 55px" />
                                                                                @else
                                                                                    <img src="{{ asset('images/default.jpg') }}"
                                                                                        class="border rounded-circle me-2"
                                                                                        alt="Avatar"
                                                                                        style="height: 55px" />
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                        <div
                                                                            class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-9">
                                                                            <div class="nama rounded-3 px-3 py-1">
                                                                                <a href="" class="text-dark mb-0">
                                                                                    <strong
                                                                                        class="input-name">{{ $user->name }}</strong>
                                                                                </a>
                                                                                <a href=""
                                                                                    class="text-muted d-block">
                                                                                    <small>{{ $user->email }}</small>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                        <div
                                                                            class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 mt-3">
                                                                            <input type="checkbox" class="select-checkbox"
                                                                                name="user_id[]"
                                                                                id="checkbox-{{ $item_video->id }}-{{ $user->id }}"
                                                                                value="{{ $user->id }}">
                                                                            <label
                                                                                for="checkbox-{{ $item_video->id }}-{{ $user->id }}"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button class="btn btn-light fw-bolder text-light col-lg-11"
                                                                type="submit"
                                                                onclick="shareButton({{ $item_video->id }})"
                                                                id="shr-btn{{ $item_video->id }}"
                                                                style="border-radius: 10px; background-color:#F7941E;">
                                                                <p class="mt-1 mb-1">Bagikan</p>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <script>
                                            $(document).ready(function() {
                                                $('#search').on('input', function() {
                                                    var value = $(this).val().toLowerCase();
                                                    $('.element-pencarian').filter(function() {
                                                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                                    });
                                                });
                                            });
                                        </script>
                                    
                                    </span>
                                    </div>
                                    <div class="col-6" >
                                    <!-- modal Bagikan end -->
                                    <span class="d-flex" style="float: right;">
                                        <!-- gift start -->
                                        @if (Auth::check() && auth()->user()->id != $item_video->users_id)
                                            <a type="button" class="text-dark me-2"><i
                                                    class="fa-solid fa-gift fa-lg ml-3 mr-1 my-auto" data-toggle="modal"
                                                    data-target="#giftModal{{ $item_video->id }}"></i>
                                            </a>
                                        @elseif(!Auth::check())
                                            <a type="button" class="text-dark me-2"><i
                                                    class="fa-solid fa-gift fa-lg ml-3 mr-1 my-auto"
                                                    onclick="harusLogin()"></i>
                                            </a>
                                        @else
                                            <a type="button" data-bs-toggle="modal"
                                                data-bs-target="#income{{ $item_video->id }}" class="text-dark me-2">
                                                <i class="fa-solid fa-coins fa-lg my-auto me-1 ms-3"></i>
                                            </a>
                                            <div class="modal fade" id="income{{ $item_video->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered" role="document">
                                                    <div class="modal-content" style="border-radius: 15px;">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title fw-bolder" id="exampleModalLongTitle"
                                                                style=" font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                Pendapatan</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex align-items-center ms-3">
                                                                <img src="{{ asset('images/income.png') }}"
                                                                    width="180px" height="180px"
                                                                    style="border-radius: 50%" alt="">
                                                                <div class="container row">
                                                                    <h3 class="ms-2">Rp.
                                                                        {{ number_format($item_video->incomes(), 2, ',', '.') }}
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="container">
                                                            <div class="row">
                                                                <div class="d-flex justify-content-end">
                                                                    <a href="koki/income-koki"
                                                                        class="btn btn-light mb-3 me-1 text-light"
                                                                        style="border-radius: 15px; background-color:#F7941E;"><b
                                                                            class="ms-2 me-2">Detail</b></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- modal Gift start -->
                                        <div class="modal" id="giftModal{{ $item_video->id }}">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{ route('donation.store', ['user_recipient' => $item_video->users_id, 'feed_id' => $item_video->id, 'resep_id' => '0']) }}"
                                                        id="gift-form{{ $item_video->id }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                Beri Donasi</h5>
                                                            <button type="button" class="close mr-2"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex ">
                                                                <label for="inputKecil{{ $item_video->id }}"
                                                                    class="col-lg-3 my-1">
                                                                    <div class="card border-2 border-black scale"
                                                                        onclick="small_gift_click({{ $item_video->id }})"
                                                                        id="smallGift{{ $item_video->id }}"
                                                                        data-card-selected="false">
                                                                        <img src="{{ asset('img/kecil.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <input hidden type="radio" value="5000"
                                                                                name="giftInput"
                                                                                id="inputKecil{{ $item_video->id }}">
                                                                            <div class="text-center">
                                                                                <p class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Kecil</p>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 5.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </label>

                                                                <label for="mediumInput{{ $item_video->id }}"
                                                                    class="col-lg-3 my-1">
                                                                    <div class="card border-2 scale border-black"
                                                                        onclick="medium_gift_click({{ $item_video->id }})"
                                                                        id="mediumGift{{ $item_video->id }}"
                                                                        data-card-selected="false">
                                                                        <img src="{{ asset('img/sedang.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <input hidden type="radio" value="10000"
                                                                                name="giftInput"
                                                                                id="mediumInput{{ $item_video->id }}">
                                                                            <div class="text-center">
                                                                                <p class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Sedang</p>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 10.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </label>

                                                                <label for="extraInput{{ $item_video->id }}"
                                                                    class="col-lg-3 my-1">
                                                                    <div class="card border-2 scale border-black"
                                                                        onclick="extra_gift_click({{ $item_video->id }})"
                                                                        id="extraGift{{ $item_video->id }}"
                                                                        data-card-selected="false">
                                                                        <img src="{{ asset('img/besar.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <input hidden type="radio" value="20000"
                                                                                name="giftInput"
                                                                                id="extraInput{{ $item_video->id }}">
                                                                            <div class="text-center">
                                                                                <p class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Besar</p>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 20.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </label>

                                                                <label for="moreInput" class="col-lg-3 my-1">
                                                                    <button type="button"
                                                                        onclick="more_gift_click({{ $item_video->id }})"
                                                                        id="moreGift{{ $item_video->id }}"
                                                                        class="card border-2 border-black scale"
                                                                        data-card-selected="false">
                                                                        <img src="{{ asset('img/lainnya.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">

                                                                            <div class="mx-4 mt-2">
                                                                                <p class="card-title "
                                                                                    style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Lainnya</p>
                                                                            </div>
                                                                            <p id="displayNumber{{ $item_video->id }}"
                                                                                class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Masukkan Nilai</p>
                                                                        </div>
                                                                    </button>
                                                                </label>

                                                            </div>
                                                            <div class="d-flex mt-4 ml-3">
                                                                <input type="number" id="moreInput{{ $item_video->id }}"
                                                                    name="moreInput" width="500px"
                                                                    class="form-control border-2 rounded-3 me-3 moreInput{{ $item_video->id }}"
                                                                    style="margin-top: 12px; border:solid black; display:none; border-radius:100px;"
                                                                    placeholder="Masukkan jumlah donasi lainya...">
                                                                <input type="text" id="message{{ $item_video->id }}"
                                                                    name="message" width="500px"
                                                                    class="form-control border-2 rounded-3 me-3 message{{ $item_video->id }}"
                                                                    style="margin-top: 12px; border:solid black; border-radius:100px;"
                                                                    placeholder="Tambahkan pesan untuk pembuat...">

                                                                <button type="submit"
                                                                    onclick="gift_submit_button({{ $item_video->id }})"
                                                                    id="gift-btn{{ $item_video->id }}"
                                                                    style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                    class="btn  btn-sm text-light">
                                                                    <b class="me-3 ms-3">Kirim</b></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- modal gift end -->
                                        <!-- gift end -->
                                        <script>
                                            function small_gift_click(num) {
                                                $('#smallGift' + num).removeClass('border-black');
                                                $('#smallGift' + num).addClass('border-orange');
                                                $('#mediumGift' + num).removeClass('border-orange');
                                                $('#mediumGift' + num).addClass('border-black');
                                                $('#extraGift' + num).removeClass('border-orange');
                                                $('#extraGift' + num).addClass('border-black');
                                                $('#moreGift' + num).removeClass('border-orange');
                                                $('#moreGift' + num).addClass('border-black');
                                                $('#message' + num).css('border-color', '#F7941E');
                                                $('#moreInput' + num).css('display', 'none');
                                                $('#moreInput' + num).val('');
                                            }

                                            function medium_gift_click(num) {
                                                $('#mediumGift' + num).removeClass('border-black');
                                                $('#mediumGift' + num).addClass('border-orange');
                                                $('#smallGift' + num).removeClass('border-orange');
                                                $('#smallGift' + num).addClass('border-black');
                                                $('#extraGift' + num).removeClass('border-orange');
                                                $('#extraGift' + num).addClass('border-black');
                                                $('#moreGift' + num).removeClass('border-orange');
                                                $('#moreGift' + num).addClass('border-black');
                                                $('#message' + num).css('border-color', '#F7941E');
                                                $('#moreInput' + num).css('display', 'none');
                                                $('#moreInput' + num).val('');
                                            }

                                            function extra_gift_click(num) {
                                                $('#extraGift' + num).removeClass('border-black');
                                                $('#extraGift' + num).addClass('border-orange');
                                                $('#mediumGift' + num).removeClass('border-orange');
                                                $('#mediumGift' + num).addClass('border-black');
                                                $('#smallGift' + num).removeClass('border-orange');
                                                $('#smallGift' + num).addClass('border-black');
                                                $('#moreGift' + num).removeClass('border-orange');
                                                $('#moreGift' + num).addClass('border-black');
                                                $('#message' + num).css('border-color', '#F7941E');
                                                $('#moreInput' + num).css('display', 'none');
                                                $('#moreInput' + num).val('');
                                            }

                                            function more_gift_click(num) {
                                                $('#moreGift' + num).removeClass('border-black');
                                                $('#moreGift' + num).addClass('border-orange');
                                                $('#extraGift' + num).removeClass('border-orange');
                                                $('#extraGift' + num).addClass('border-black');
                                                $('#mediumGift' + num).removeClass('border-orange');
                                                $('#mediumGift' + num).addClass('border-black');
                                                $('#smallGift' + num).removeClass('border-orange');
                                                $('#smallGift' + num).addClass('border-black');
                                                $('#message' + num).css('border-color', '#F7941E');
                                                $('#moreInput' + num).css('display', 'block');
                                                $('#moreInput' + num).css('border-color', '#F7941E');
                                                $('input[name="giftInput"]').prop('checked', false);
                                                const moreInput = document.getElementById('moreInput' + num);
                                                const displayNumber = document.getElementById("displayNumber" + num);
                                                moreInput.addEventListener("input", function() {
                                                    const inputValue = moreInput.value;
                                                    const formattedValue = formatNumber(inputValue);
                                                    displayNumber.textContent = formattedValue;
                                                    if (inputValue.trim() === "") {
                                                        displayNumber.textContent = "Masukkan nilai";
                                                    } else {
                                                        displayNumber.textContent = "Rp. " + formattedValue + ",00";
                                                    }

                                                });

                                                function formatNumber(number) {
                                                    // Hapus semua titik yang ada
                                                    const cleanValue = number.replace(/\./g, '');

                                                    // Ubah nilai menjadi format dengan titik sebagai pemisah ribuan
                                                    return cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
                                                }
                                            }
                                        </script>
                                        <!-- Laporkan, blokir -->
                                        <div class="mx-2">
                                            {{-- --}}
                                            @if (Auth::user())
                                                @if (Auth::user()->role != 'admin' && Auth::user()->id !== $item_video->user->id)
                                                    {{-- Laporkan Komentar --}}
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Modalsd{{ $urut }}"
                                                        class="yuhu text-dark btn-sm rounded-5 "><i
                                                            class="fa-solid fa-xl mt-1 fa-triangle-exclamation mt-1"></i>
                                                    </button>
                                                    <div class="modal fade" id="Modalsd{{ $urut }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="reportModal"
                                                                        style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                        Laporkan Postingan</h5>
                                                                    <button type="button" class="close"
                                                                        data-bs-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form
                                                                    action="{{ route('report.feed', $item_video->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="modal-body d-flex align-items-center">
                                                                        @if ($item_video->user->foto)
                                                                            <img class="me-2"
                                                                                src="{{ asset('storage/' . $item_video->user->foto) }}"
                                                                                width="106px" height="104px"
                                                                                style="border-radius: 50%" alt="">
                                                                        @else
                                                                            <img class="me-2"
                                                                                src="{{ asset('images/default.jpg') }}"
                                                                                width="106px" height="104px"
                                                                                style="border-radius: 50%" alt="">
                                                                        @endif
                                                                        <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                            placeholder="Alasan..."></textarea>
                                                                        {{-- @endif --}}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-light text-light"
                                                                            style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                class="ms-2 me-2">Laporkan</b></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @elseif(Auth::user()->id == $item_video->user->id)
                                                    <form method="POST"
                                                        action="{{ route('hapus.feed', $item_video->id) }}"
                                                        id="delete-feed-form{{ $item_video->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" hidden
                                                            id="delete-feed-button{{ $item_video->id }}"></button>
                                                        <button type="button"
                                                            onclick="confirmation_delete_feed({{ $item_video->id }})"
                                                            class="yuhu text-dark btn-sm rounded-5 ">
                                                            <i class="fa-solid fa-lg fa-trash"></i>
                                                        </button>
                                                    </form>
                                                @elseif(Auth::user()->role == 'admin')
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#blocksModal{{ $item_video->id }}"
                                                        class="yuhu text-dark btn-sm rounded-5 "><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="26"
                                                            height="26" viewBox="0 0 24 24">
                                                            <path
                                                                d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                                fill="currentColor" fill-rule="nonzero" />
                                                        </svg>
                                                    </button>
                                                    <div class="modal fade" id="blocskModal{{ $item_video->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="reportModal"
                                                                        style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                        Blokir komentar
                                                                    </h5>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form action="{{-- route('Report.comment.recipes',$row->id) --}}" method="POST">
                                                                    {{-- @csrf --}}
                                                                    <div class="modal-body d-flex align-items-center">

                                                                        <img class="me-2"
                                                                            src="{{ asset('images/default.jpg') }}"
                                                                            width="106px" height="104px"
                                                                            style="border-radius: 50%" alt="">
                                                                        <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                            placeholder="Alasan..."></textarea>
                                                                        {{-- @endif --}}
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-light text-light"
                                                                            style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                class="ms-2 me-2">Blokir</b></button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            @else
                                                {{-- Untuk user belum login --}}
                                                <button type="button" onclick="harusLogin()"
                                                    class="yuhu text-dark btn-sm rounded-5 "><i
                                                        class="fa-solid fa-xl fa-triangle-exclamation me-2"></i>
                                                </button>
                                            @endif
                                            {{-- --}}

                                        </div>
                                        <form action="{{ route('favorite.feed.store', $item_video->id) }}"
                                            method="POST" id="favorite-form{{ $item_video->id }}"
                                            class="favorite-form{{ $item_video->id }}">
                                            @csrf
                                            @if (Auth::check() &&
                                                    $item_video->favorite()->where('user_id_from', auth()->user()->id)->exists())
                                                <button type="button" id="favorite-button{{ $item_video->id }}"
                                                    onclick="toggleFavorite({{ $item_video->id }})" class="ms-1 yuhu">
                                                    <i
                                                        class="text-orange fa-solid fa-xl fa-bookmark icons{{ $item_video->id }}"></i>
                                                </button>
                                            @elseif(Auth::check() &&
                                                    !$item_video->favorite()->where('user_id_from', auth()->user()->id)->exists())
                                                <button type="button" id="favorite-button{{ $item_video->id }}"
                                                    onclick="toggleFavorite({{ $item_video->id }})" class="ms-1 yuhu ">
                                                    <i
                                                        class="fa-regular fa-xl fa-bookmark icons{{ $item_video->id }}"></i>
                                                </button>
                                            @else
                                                <button type="button" id="favorite-button{{ $item_video->id }}"
                                                    onclick="harusLogin()" class="ms-1 yuhu ">
                                                    <i
                                                        class="fa-regular fa-xl fa-bookmark icons{{ $item_video->id }}"></i>
                                                </button>
                                            @endif
                                        </form>
                                        <script>
                                            function toggleFavorite(videoId) {
                                                // Menggunakan JavaScript untuk mengirim permintaan Ajax
                                                var form = document.getElementById('favorite-form' + videoId);
                                                const button = form.querySelector("#favorite-button" + videoId);
                                                const icon = button.querySelector("i");
                                                var xhr = new XMLHttpRequest();
                                                xhr.open('POST', form.action, true);
                                                xhr.setRequestHeader('X-CSRF-TOKEN', form.querySelector('input[name="_token"]').value);
                                                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

                                                xhr.onreadystatechange = function() {
                                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                                        // Handle response (mungkin Anda ingin memperbarui ikon favorit berdasarkan respons dari server)
                                                        var response = JSON.parse(xhr.responseText);
                                                        if (response.favorited) {
                                                            // Reset button color and SVG her
                                                            icon.classList.remove('text-dark');
                                                            icon.classList.remove('fa-regular');
                                                            icon.classList.add('fa-solid');
                                                            icon.classList.add('text-orange');
                                                        } else {
                                                            icon.classList.remove('text-orange');
                                                            icon.classList.add('text-dark');
                                                            icon.classList.remove('fa-solid');
                                                            icon.classList.add('fa-regular');
                                                        }
                                                    }
                                                };

                                                xhr.send('_token=' + encodeURIComponent(form.querySelector('input[name="_token"]').value));
                                            }
                                        </script>
                                    </span>
                                    </div>

                                </div>
                                {{-- modal lainnya --}}
                                <div class="modal fade" id="nilai" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="" method="POST">
                                                @csrf
                                                @method('put')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reportModal"
                                                        style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                        Masukkan Nilai</h5>
                                                    <button type="button" class="close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex align-items-center col-12 mb-3">
                                                    <input type="number" id="comment-veed1" name="commentVeed"
                                                        width="500px" class="form-control rounded-3 me-3"
                                                        style="margin-top: 12px; border-radius:100px;"
                                                        placeholder="Masukkan Jumlah...">

                                                    <button type="submit" class="btn text-light rounded-3"
                                                        style="margin-top: 12px; background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"><b
                                                            class="ms-2 me-2">Kirim</b>
                                                    </button>

                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                <div class="d-flex mb-3">
                                    <div class="container">
                                        <div class="row">
                                            <!-- <div class="d-flex flex-row"> -->
                                                <p style="max-width: 100%;" class="p-0">{{ $item_video->deskripsi_video }}</p>
                                            <!-- </div> -->
                                            <div class="collapse" style="margin-top: -2%;"
                                                id="commentCollapse{{ $urut }}">
                                                <div class="col-12">
                                                    <!-- form komentar feed start -->
                                                    <div class="">
                                                        <div class="row">
                                                            @if (Auth::user())
                                                                <form id="formCommentFeed{{ $item_video->id }}"
                                                                    action="{{ route('komentar.veed', [Auth::user()->id, $item_video->user->id, $item_video->id]) }}"
                                                                    method="post" class="mt-2">
                                                                    @csrf
                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-1 col-md-1 col-2 pl-0"
                                                                            style="">
                                                                            @if (Auth::user()->foto)
                                                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                                                    class="border rounded-circle"
                                                                                    alt="Avatar"
                                                                                    style="height: 40px;" />
                                                                            @else
                                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                                    class="border rounded-circle"
                                                                                    alt="Avatar"
                                                                                    style="height: 40px;" />
                                                                            @endif
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-10">
                                                                            <input type="text"
                                                                                id="input_comment_veed{{ $item_video->id }}"
                                                                                name="commentVeed"
                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px; height: 30px;"
                                                                                class="form-control-sm border border-dark border-5 col-12"
                                                                                placeholder="Masukkan komentar...">
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-12">
                                                                            <button type="submit"
                                                                                id="buttonCommentVeed{{ $urut }}"
                                                                                onclick="komentar_feed({{ $item_video->id }})"
                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @else
                                                                <form class="mt-2">
                                                                    <div class="row mb-3">
                                                                        <div class="col-lg-1 col-md-1 col-2 pl-0"
                                                                            style="">
                                                                            <img src="{{ asset('images/default.jpg') }}"
                                                                                class="border rounded-circle"
                                                                                alt="Avatar" style="height: 40px;" />
                                                                        </div>
                                                                        <div class="col-lg-9 col-md-9 col-10">
                                                                            <input type="text" id="input_comment_feed"
                                                                                name="commentVeed"
                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                placeholder="Masukkan komentar...">
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-12">
                                                                            <button type="button" id="buttonCommentVeed"
                                                                                onclick="harusLogin()"
                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @endif
                                                            <div id="new_komentar_feed{{ $item_video->id }}" class="pl-0"></div>
                                                            <!-- 00000 list komentar feed start 00000 -->
                                                            <div id="komen_feed{{ $item_video->id }}" class="pl-0">
                                                                @foreach ($item_video->comment_veed->sortByDesc('created_at') as $nomer => $item_comment)
                                                                    <div class="media row mb-2"
                                                                        id="komen_veed_ini{{ $item_comment->id }}"
                                                                        style="">
                                                                        <div class="d-flex col-12">
                                                                            @if ($item_comment->user_pengirim->foto)
                                                                                <img width="38px" height="38px"
                                                                                    class="rounded-circle"
                                                                                    src="{{ asset('storage/' . $item_comment->user_pengirim->foto) }}"
                                                                                    alt="{{ $item_comment->user_pengirim->name }}">
                                                                            @else
                                                                                <img width="38px" height="38px"
                                                                                    class="rounded-circle"
                                                                                    src="{{ asset('images/default.jpg') }}"
                                                                                    alt="{{ $item_comment->user_pengirim->name }}">
                                                                            @endif
                                                                            <p class="ms-2 mt-2 fw-bolder  ">
                                                                                {{ $item_comment->user_pengirim->name }}
                                                                            </p>
                                                                            <div
                                                                                class="d-flex flex-row-reverse ml-auto mt-2">
                                                                                <small>
                                                                                    {{ \Carbon\Carbon::parse($item_comment->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div style="margin-top: -2%;">
                                                                            <div class="d-flex ms-5 pt-0">
                                                                                <p class="text-truncate">{{ $item_comment->komentar }}</p>
                                                                            </div>
                                                                            <div class="d-flex col-lg-11"
                                                                                style="margin-top:-3%;">
                                                                                @php
                                                                                    // mendapatkan jumlah like tiap komentar
                                                                                    $countLike = \App\Models\like_comment_veed::query()
                                                                                        ->where('comment_veed_id', $item_comment->id)
                                                                                        ->where('veed_id', $item_video->id)
                                                                                        ->count();
                                                                                @endphp
                                                                                <div class="d-flex ms-4">
                                                                                    @if (Auth::user())
                                                                                        @if ($item_comment->likeCommentVeed(Auth::user()->id))
                                                                                            <form
                                                                                                action="{{ route('like.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                                                id="formLikeCommentFeed{{ $item_comment->id }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                <button type="submit"
                                                                                                    class="btn"
                                                                                                    onclick="likeCommentFeed({{ $item_comment->id }})">
                                                                                                    <i class="fa-solid text-orange fa-thumbs-up"
                                                                                                        id="iLikeComment{{ $item_comment->id }}"></i>
                                                                                                </button>

                                                                                            </form>
                                                                                        @else
                                                                                            <form
                                                                                                action="{{ route('like.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                                                id="formLikeCommentFeed{{ $item_comment->id }}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                <button type="submit"
                                                                                                    class="btn"
                                                                                                    onclick="likeCommentFeed({{ $item_comment->id }})">
                                                                                                    <i class="fa-regular fa-thumbs-up"
                                                                                                        id="iLikeComment{{ $item_comment->id }}"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                        @endif
                                                                                    @else
                                                                                        <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                            onclick="harusLogin()"
                                                                                            width="15px" height="40px"
                                                                                            alt="" class="me-3">
                                                                                    @endif
                                                                                    <span class="mt-2"
                                                                                        style="margin-left: -7px;"
                                                                                        id="countLikeComment{{ $item_comment->id }}">
                                                                                        {{ $countLike }}
                                                                                    </span>
                                                                                </div>
                                                                                <div class="ms-2 mt-2 mr-auto">
                                                                                    {{-- --}}
                                                                                    @if (Auth::user())
                                                                                        @if (Auth::user()->role != 'admin' && Auth::user()->id !== $item_comment->user_pengirim->id)
                                                                                            <a data-bs-toggle="modal"
                                                                                                href="#ModalL{{ $item_comment->id }}"
                                                                                                class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                    class="fa-solid fa-triangle-exclamation"></i>
                                                                                            </a>
                                                                                            <div class="modal fade"
                                                                                                data-bs-backdrop="static"
                                                                                                id="ModalL{{ $item_comment->id }}"
                                                                                                tabindex="-1"
                                                                                                role="dialog"
                                                                                                aria-labelledby="exampleModalCenterTitle"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered"
                                                                                                    role="document">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <h5 class="modal-title"
                                                                                                                id="reportModal"
                                                                                                                style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                                                                Laporkan
                                                                                                                Komentar
                                                                                                                {{ $item_comment->user_pengirim->name }}
                                                                                                            </h5>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="close"
                                                                                                                data-bs-dismiss="modal"
                                                                                                                aria-label="Close">
                                                                                                                <span
                                                                                                                    aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <form
                                                                                                            action="{{ route('report.comment.feed', ['comment_id' => $item_comment->id, 'reply_comment_id' => 0, 'reply_replies_comment_id' => 0]) }}"
                                                                                                            method="POST">
                                                                                                            @csrf
                                                                                                            <div
                                                                                                                class="modal-body d-flex align-items-center">
                                                                                                                @if ($item_comment->user_pengirim->foto)
                                                                                                                    <img class="me-2"
                                                                                                                        src="{{ asset('storage/' . $item_comment->user_pengirim->foto) }}"
                                                                                                                        width="106px"
                                                                                                                        height="104px"
                                                                                                                        style="border-radius: 50%"
                                                                                                                        alt="">
                                                                                                                @else
                                                                                                                    <img class="me-2"
                                                                                                                        src="{{ asset('images/default.jpg') }}"
                                                                                                                        width="106px"
                                                                                                                        height="104px"
                                                                                                                        style="border-radius: 50%"
                                                                                                                        alt="">
                                                                                                                @endif
                                                                                                                <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                                                                    placeholder="Alasan..."></textarea>
                                                                                                                {{-- @endif --}}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-footer">
                                                                                                                <button
                                                                                                                    type="submit"
                                                                                                                    class="btn btn-light text-light"
                                                                                                                    style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                                                        class="ms-2 me-2">Laporkan</b></button>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @elseif(Auth::user()->id == $item_comment->user_pengirim->id)
                                                                                            {{-- Hapus Komentar --}}
                                                                                            <form method="POST"
                                                                                                action="{{ route('hapus.komentar.feed', $item_comment->id) }}"
                                                                                                id="delete-comment-form{{ $item_comment->id }}">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit"
                                                                                                    onclick="deletedCommentFeed({{ $item_comment->id }})"
                                                                                                    hidden
                                                                                                    id="delete-comment-button{{ $item_comment->id }}">Delete</button>
                                                                                                <button type="button"
                                                                                                    onclick="confirmation_delete_comment_feed({{ $item_comment->id }})"
                                                                                                    class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                    <i
                                                                                                        class="fa-solid fa-trash"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                        @elseif(Auth::user()->role == 'admin')
                                                                                            {{-- Blokir Komentar --}}
                                                                                            <button type="button"
                                                                                                data-bs-toggle="modal"
                                                                                                data-bs-target="#blockMod{{ $item_comment->id }}"
                                                                                                class="yuhu text-danger btn-sm rounded-5 "><svg
                                                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                                                    width="20"
                                                                                                    height="20"
                                                                                                    viewBox="0 0 24 24">
                                                                                                    <path
                                                                                                        d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                                                                        fill="currentColor"
                                                                                                        fill-rule="nonzero" />
                                                                                                </svg>
                                                                                            </button>
                                                                                            <div class="modal fade"
                                                                                                data-bs-backdrop="static"
                                                                                                id="blockMod{{ $item_comment->id }}"
                                                                                                tabindex="-1"
                                                                                                role="dialog"
                                                                                                aria-labelledby="exampleModalCenterTitle"
                                                                                                aria-hidden="true">
                                                                                                <div class="modal-dialog modal-dialog-centered"
                                                                                                    role="document">
                                                                                                    <div
                                                                                                        class="modal-content">
                                                                                                        <div
                                                                                                            class="modal-header">
                                                                                                            <h5 class="modal-title"
                                                                                                                id="reportModal"
                                                                                                                style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                                                                Blokir
                                                                                                                komentar
                                                                                                            </h5>
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                class="close"
                                                                                                                data-bs-dismiss="modal"
                                                                                                                data-bs-target="blockMod{{ $item_comment->id }}"
                                                                                                                aria-label="Close">
                                                                                                                <span
                                                                                                                    aria-hidden="true">&times;</span>
                                                                                                            </button>
                                                                                                        </div>
                                                                                                        <form
                                                                                                            action="{{-- route('Report.comment.recipes',$row->id) --}}"
                                                                                                            method="POST">
                                                                                                            {{-- @csrf --}}
                                                                                                            <div
                                                                                                                class="modal-body d-flex align-items-center">

                                                                                                                <img class="me-2"
                                                                                                                    src="{{ asset('images/default.jpg') }}"
                                                                                                                    width="106px"
                                                                                                                    height="104px"
                                                                                                                    style="border-radius: 50%"
                                                                                                                    alt="">
                                                                                                                <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                                                                    placeholder="Alasan..."></textarea>
                                                                                                                {{-- @endif --}}
                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="modal-footer">
                                                                                                                <button
                                                                                                                    type="submit"
                                                                                                                    class="btn btn-light text-light"
                                                                                                                    style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                                                        class="ms-2 me-2">Blokir</b></button>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @endif
                                                                                    @else
                                                                                        {{-- Untuk user belum login --}}
                                                                                        <button type="button"
                                                                                            onclick="harusLogin()"
                                                                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                                                                        </button>
                                                                                    @endif
                                                                                    {{-- --}}
                                                                                </div>
                                                                                <div style="margin-right:-2%;"
                                                                                    class="d-flex justify-content-end mt-2">
                                                                                    @if ($item_comment->count_replies() > 0)
                                                                                        <a href="#"
                                                                                            class="text-secondary"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse{{ $item_comment->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapseOne">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="22"
                                                                                                height="22"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                    d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                            </svg>
                                                                                            &nbsp; <small>Tampilkan
                                                                                                {{ $item_comment->count_replies() }}
                                                                                                balasan</small>
                                                                                        </a>
                                                                                    @else
                                                                                        <a href="#"
                                                                                            class="text-secondary my-auto ml-2"
                                                                                            data-toggle="collapse"
                                                                                            data-target="#collapse{{ $item_comment->id }}"
                                                                                            aria-expanded="true"
                                                                                            aria-controls="collapseOne">
                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                width="22"
                                                                                                height="22"
                                                                                                viewBox="0 0 24 24">
                                                                                                <path fill="currentColor"
                                                                                                    d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                            </svg>
                                                                                            &nbsp; <small>Balas</small>
                                                                                        </a>
                                                                                    @endif
                                                                                </div>
                                                                            </div>
                                                                            <!-- Komentar Balasan Collapse Start -->
                                                                            <div class="collapse"
                                                                                style="margin-right: -7%;"
                                                                                id="collapse{{ $item_comment->id }}">

                                                                                <div class="card-body pr-5">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            @if (Auth::check())
                                                                                                <form
                                                                                                    id="formReplyComment{{ $item_comment->id }}"
                                                                                                    action="{{ route('balas.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                                                    method="post">
                                                                                                    @csrf
                                                                                                    <div class="row">
                                                                                                        <div
                                                                                                            class="col-lg-1 col-md-1 col-2 pl-0"style=" margin-top:-1.1%;">
                                                                                                            @if (Auth::user()->foto)
                                                                                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                                                                                    class="border rounded-circle"
                                                                                                                    alt="Avatar"
                                                                                                                    style="height: 40px;" />
                                                                                                            @else
                                                                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                                                                    class="border rounded-circle"
                                                                                                                    alt="Avatar"
                                                                                                                    style="height: 40px;" />
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-lg-9 col-md-9 col-10">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                id="inputKomentarBalasan{{ $item_comment->id }}"
                                                                                                                name="komentarBalasan"
                                                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                                                placeholder="Masukkan komentar...">
                                                                                                        </div>
                                                                                                        <div class="col-lg-2 col-md-2 col-12 pl-0">

                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                id="buttonCommentVeed{{ $urut }}"
                                                                                                                onclick="replies_comment({{ $item_comment->id }})"
                                                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right"
                                                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            @else
                                                                                                <form>
                                                                                                    <div
                                                                                                        class="row mb-3">
                                                                                                        <div class="col-lg-1 col-md-1 col-2 pl-0"
                                                                                                            style="">
                                                                                                            <img src="{{ asset('images/default.jpg') }}"
                                                                                                                class="border rounded-circle"
                                                                                                                alt="Avatar"
                                                                                                                style="height: 40px;" />
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-lg-9 col-md-9 col-10">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                id="inputKomentarBalasan{{ $item_comment->id }}"
                                                                                                                name="commentVeed"
                                                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                                                placeholder="Masukkan komentar...">
                                                                                                        </div>
                                                                                                        <div class="col-lg-2 col-md-2 col-12">
                                                                                                            <button
                                                                                                                type="button"
                                                                                                                id="buttonCommentVeed"
                                                                                                                onclick="harusLogin()"
                                                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right"
                                                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>
                                                                                            @endif
                                                                                            <div
                                                                                                id="reply_comments{{ $item_comment->id }}" class="mt-4">
                                                                                                <div
                                                                                                    id="repliesCommentList{{ $item_comment->id }}">

                                                                                                </div>
                                                                                                @foreach ($item_comment->reply_comment_veed as $numeric => $reply_comment)
                                                                                                    @php
                                                                                                        $countLike2sd = App\Models\like_reply_comment_veed::query()
                                                                                                            ->where('reply_comment_veed_id', $reply_comment->id)
                                                                                                            ->where('veed_id', $item_video->id)
                                                                                                            ->count();
                                                                                                    @endphp

                                                                                                    <div
                                                                                                        id="balasan_komentar_ini{{ $reply_comment->id }}"class="">
                                                                                                        <div
                                                                                                            class="mb-4 mt-4 row">
                                                                                                            <div
                                                                                                                class="d-flex col-12 pl-0 pr-0">
                                                                                                                <img width="38px"
                                                                                                                    height="38px"
                                                                                                                    class="rounded-circle me-2"
                                                                                                                    src="{{ $reply_comment->user->foto ? asset('storage/' . $reply_comment->user->foto) : asset('images/default.jpg') }}"
                                                                                                                    alt="{{ $reply_comment->user->name }}">

                                                                                                                <span><p class="fw-bolder mt-2 mb-2 text-truncate">{{ $reply_comment->user->name }}</p></span>

                                                                                                                <div class="d-flex flex-row-reverse ml-auto mt-2"
                                                                                                                    style="margin-left: 50%;">
                                                                                                                    <small>{{ \Carbon\Carbon::parse($reply_comment->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div style="margin-top:-1.2%;"
                                                                                                                class="d-flex ms-5 pl-0">
                                                                                                                <p>{{ $reply_comment->komentar }}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            {{-- ini like button --}}
                                                                                                            <div
                                                                                                                class="d-flex ">
                                                                                                                <div class="d-flex col-2 ms-4 pl-0"
                                                                                                                    style="margin-top:-3%;">
                                                                                                                    @if (Auth::user())
                                                                                                                        @if ($reply_comment->checkLikedOrNo(auth()->user()->id))
                                                                                                                            <form
                                                                                                                                action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $item_video->id }}"
                                                                                                                                id="formLikeReplyComment{{ $reply_comment->id }}"
                                                                                                                                method="POST">
                                                                                                                                @csrf
                                                                                                                                <button
                                                                                                                                    type="submit"
                                                                                                                                    class="btn"
                                                                                                                                    onclick="likeReplyComment({{ $reply_comment->id }})">
                                                                                                                                    <i class="fa-solid text-orange fa-thumbs-up"
                                                                                                                                        id="iconLikeReplyComment{{ $reply_comment->id }}"></i>
                                                                                                                                </button>

                                                                                                                            </form>
                                                                                                                        @else
                                                                                                                            <form
                                                                                                                                action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $item_video->id }}"
                                                                                                                                id="formLikeReplyComment{{ $reply_comment->id }}"
                                                                                                                                method="POST">
                                                                                                                                @csrf
                                                                                                                                <button
                                                                                                                                    type="submit"
                                                                                                                                    class="btn"
                                                                                                                                    onclick="likeReplyComment({{ $reply_comment->id }})">
                                                                                                                                    <i class="fa-regular fa-thumbs-up"
                                                                                                                                        id="iconLikeReplyComment{{ $reply_comment->id }}"></i>
                                                                                                                                </button>
                                                                                                                            </form>
                                                                                                                        @endif
                                                                                                                    @else
                                                                                                                        <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                                                            onclick="harusLogin()"
                                                                                                                            width="15px"
                                                                                                                            height="40px"
                                                                                                                            alt="" class="me-3">
                                                                                                                    @endif
                                                                                                                    <span
                                                                                                                        class="mt-2"
                                                                                                                        style="margin-left: -7%;"
                                                                                                                        id="like-count{{ $reply_comment->id }}">
                                                                                                                        {{ $countLike2sd }}
                                                                                                                    </span>
                                                                                                                    <div
                                                                                                                        class="ms-2 mt-2 mr-auto">
                                                                                                                        {{-- --}}
                                                                                                                        @if (Auth::user())
                                                                                                                            @if (Auth::user()->role != 'admin' && Auth::user()->id !== $reply_comment->user->id)
                                                                                                                                <a data-bs-toggle="modal"
                                                                                                                                    data-target="#ModalLapors{{ $reply_comment->id }}"
                                                                                                                                    href="#ModalLapors{{ $reply_comment->id }}"
                                                                                                                                    class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                                                        class="fa-solid fa-triangle-exclamation"></i>
                                                                                                                                </a>
                                                                                                                                <div class="modal fade"
                                                                                                                                    data-bs-backdrop="static"
                                                                                                                                    id="ModalLapors{{ $reply_comment->id }}"
                                                                                                                                    tabindex="-1"
                                                                                                                                    role="dialog"
                                                                                                                                    aria-labelledby="exampleModalCenterTitle"
                                                                                                                                    aria-hidden="true">
                                                                                                                                    <div class="modal-dialog modal-dialog-centered"
                                                                                                                                        role="document">
                                                                                                                                        <div
                                                                                                                                            class="modal-content">
                                                                                                                                            <div
                                                                                                                                                class="modal-header">
                                                                                                                                                <h5 class="modal-title"
                                                                                                                                                    id="reportModal"
                                                                                                                                                    style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                                                                                                    Laporkan
                                                                                                                                                    Komentar
                                                                                                                                                    {{ $reply_comment->user->name }}
                                                                                                                                                </h5>
                                                                                                                                                <button
                                                                                                                                                    type="button"
                                                                                                                                                    class="close"
                                                                                                                                                    data-bs-dismiss="modal"
                                                                                                                                                    aria-label="Close">
                                                                                                                                                    <span
                                                                                                                                                        aria-hidden="true">&times;</span>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                            <form
                                                                                                                                                action="{{ route('report.comment.feed', ['comment_id' => 0, 'reply_comment_id' => $reply_comment->id, 'reply_replies_comment_id' => 0]) }}"
                                                                                                                                                method="POST">
                                                                                                                                                @csrf
                                                                                                                                                <div
                                                                                                                                                    class="modal-body d-flex align-items-center">

                                                                                                                                                    @if ($reply_comment->user->foto)
                                                                                                                                                        <img class="me-2"
                                                                                                                                                            src="{{ asset('storage/' . $reply_comment->user->foto) }}"
                                                                                                                                                            width="106px"
                                                                                                                                                            height="104px"
                                                                                                                                                            style="border-radius: 50%"
                                                                                                                                                            alt="">
                                                                                                                                                    @else
                                                                                                                                                        <img class="me-2"
                                                                                                                                                            src="{{ asset('images/default.jpg') }}"
                                                                                                                                                            width="106px"
                                                                                                                                                            height="104px"
                                                                                                                                                            style="border-radius: 50%"
                                                                                                                                                            alt="">
                                                                                                                                                    @endif
                                                                                                                                                    <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                                                                                                        placeholder="Alasan..."></textarea>
                                                                                                                                                    {{-- @endif --}}
                                                                                                                                                </div>
                                                                                                                                                <div
                                                                                                                                                    class="modal-footer">
                                                                                                                                                    <button
                                                                                                                                                        type="submit"
                                                                                                                                                        class="btn btn-light text-light"
                                                                                                                                                        style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                                                                                            class="ms-2 me-2">Laporkan</b></button>
                                                                                                                                                </div>
                                                                                                                                            </form>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            @elseif(Auth::user()->id == $reply_comment->user->id)
                                                                                                                                {{-- Hapus Komentar --}}
                                                                                                                                <form
                                                                                                                                    method="POST"
                                                                                                                                    action="{{ route('hapus.balasan.komentar.feed', $reply_comment->id) }}"
                                                                                                                                    id="delete-reply-comment-form{{ $reply_comment->id }}">
                                                                                                                                    @csrf
                                                                                                                                    @method('DELETE')
                                                                                                                                    <button
                                                                                                                                        type="submit"
                                                                                                                                        hidden
                                                                                                                                        onclick="deletedReplyCommentFeed({{ $reply_comment->id }})"
                                                                                                                                        id="delete-reply-comment-button{{ $reply_comment->id }}">Delete</button>
                                                                                                                                    <button
                                                                                                                                        type="button"
                                                                                                                                        onclick="confirmation_delete_reply_comment({{ $reply_comment->id }})"
                                                                                                                                        class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                                                        <i
                                                                                                                                            class="fa-solid fa-trash"></i>
                                                                                                                                    </button>
                                                                                                                                </form>
                                                                                                                            @elseif(Auth::user()->role == 'admin')
                                                                                                                                {{-- Blokir Komentar --}}
                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    data-bs-toggle="modal"
                                                                                                                                    data-bs-target="#blookModal{{ $reply_comment->id }}"
                                                                                                                                    class="yuhu text-danger btn-sm rounded-5 "><svg
                                                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                                                        width="20"
                                                                                                                                        height="20"
                                                                                                                                        viewBox="0 0 24 24">
                                                                                                                                        <path
                                                                                                                                            d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                                                                                                            fill="currentColor"
                                                                                                                                            fill-rule="nonzero" />
                                                                                                                                    </svg>
                                                                                                                                </button>
                                                                                                                                <div class="modal fade"
                                                                                                                                    data-bs-backdrop="static"
                                                                                                                                    id="{{ $reply_comment->id }}"
                                                                                                                                    tabindex="-1"
                                                                                                                                    role="dialog"
                                                                                                                                    aria-labelledby="exampleModalCenterTitle"
                                                                                                                                    aria-hidden="true">
                                                                                                                                    <div class="modal-dialog modal-dialog-centered"
                                                                                                                                        role="document">
                                                                                                                                        <div
                                                                                                                                            class="modal-content">
                                                                                                                                            <div
                                                                                                                                                class="modal-header">
                                                                                                                                                <h5 class="modal-title"
                                                                                                                                                    id="reportModal"
                                                                                                                                                    style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                                                                                                    Blokir
                                                                                                                                                    komentar
                                                                                                                                                </h5>
                                                                                                                                                <button
                                                                                                                                                    type="button"
                                                                                                                                                    class="close"
                                                                                                                                                    data-bs-dismiss="modal"
                                                                                                                                                    data-bs-target="blockMod{{ $item_comment->id }}"
                                                                                                                                                    aria-label="Close">
                                                                                                                                                    <span
                                                                                                                                                        aria-hidden="true">&times;</span>
                                                                                                                                                </button>
                                                                                                                                            </div>
                                                                                                                                            <form
                                                                                                                                                action="{{-- route('Report.comment.recipes',$row->id) --}}"
                                                                                                                                                method="POST">
                                                                                                                                                {{-- @csrf --}}
                                                                                                                                                <div
                                                                                                                                                    class="modal-body d-flex align-items-center">

                                                                                                                                                    <img class="me-2"
                                                                                                                                                        src="{{ asset('images/default.jpg') }}"
                                                                                                                                                        width="106px"
                                                                                                                                                        height="104px"
                                                                                                                                                        style="border-radius: 50%"
                                                                                                                                                        alt="">
                                                                                                                                                    <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                                                                                                        placeholder="Alasan..."></textarea>
                                                                                                                                                    {{-- @endif --}}
                                                                                                                                                </div>
                                                                                                                                                <div
                                                                                                                                                    class="modal-footer">
                                                                                                                                                    <button
                                                                                                                                                        type="submit"
                                                                                                                                                        class="btn btn-light text-light"
                                                                                                                                                        style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                                                                                            class="ms-2 me-2">Blokir</b></button>
                                                                                                                                                </div>
                                                                                                                                            </form>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            @endif
                                                                                                                        @else
                                                                                                                            {{-- Untuk user belum login --}}
                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                onclick="harusLogin()"
                                                                                                                                class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                                                    class="fa-solid fa-triangle-exclamation me-2"></i>
                                                                                                                            </button>
                                                                                                                        @endif
                                                                                                                        {{-- --}}
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                                <div
                                                                                                                    style="margin-top:-2.2%; margin-left:-2.5%;" class="col-9 pr-0">
                                                                                                                    <a href="#"
                                                                                                                        class="text-secondary mt-1"
                                                                                                                        data-toggle="collapse"
                                                                                                                        data-target="#collapse2{{ $reply_comment->id }}"
                                                                                                                        aria-expanded="true"
                                                                                                                        aria-controls="collapseOne" style="float: right;">
                                                                                                                        
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                            width="22"
                                                                                                                            height="22"
                                                                                                                            viewBox="0 0 24 24">
                                                                                                                            <path
                                                                                                                                fill="currentColor"
                                                                                                                                d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                                                        </svg>
                                                                                                                        &nbsp;
                                                                                                                        <small
                                                                                                                            class="me-1 ">Balas</small>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>


                                                                                                        </div>

                                                                                                    </div>
                                                                                                    <div class="collapse"
                                                                                                        id="collapse2{{ $reply_comment->id }}">
                                                                                                        <div
                                                                                                            id="replies_reply{{ $reply_comment->id }}">

                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="">
                                                                                                            @if (Auth::check())
                                                                                                                <form
                                                                                                                    id="formBalasRepliesCommentsFeeds1{{ $reply_comment->id }}"
                                                                                                                    action="{{ route('balas.replies.comments.feeds', [$reply_comment->user->id, $reply_comment->id]) }}"
                                                                                                                    method="post" class="mt-4 mb-4">
                                                                                                                    @csrf
                                                                                                                    <div
                                                                                                                        class="row">
                                                                                                                        <div style=" margin-top:-1%;"
                                                                                                                            class="col-lg-1 col-md-1 col-2 pl-0">
                                                                                                                            @if (Auth::user()->foto)
                                                                                                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                                                                                                    class="border rounded-circle mr-auto"
                                                                                                                                    alt="Avatar"
                                                                                                                                    style="height: 40px;" />
                                                                                                                            @else
                                                                                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                                                                                    class="border rounded-circle"
                                                                                                                                    alt="Avatar"
                                                                                                                                    style="height: 40px;" />
                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-lg-9 col-md-9 col-10">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                id="inputBalasRepliesCommentsFeeds1{{ $reply_comment->id }}"
                                                                                                                                name="komentar"
                                                                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                                                                placeholder="Masukkan komentar...">
                                                                                                                        </div>
                                                                                                                        <div class="col-lg-2 col-md-2 col-12 pl-0">

                                                                                                                            <button
                                                                                                                                type="submit"
                                                                                                                                id="buttonComment2Veed1{{ $reply_comment->id }}"
                                                                                                                                onclick="balas_replies_comments_feeds1({{ $reply_comment->id }})"
                                                                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right"
                                                                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            @else
                                                                                                                <form>
                                                                                                                    <div
                                                                                                                        class="row mb-3">
                                                                                                                        <div style=""
                                                                                                                            class="col-lg-1 col-md-1 col-2 pl-0">
                                                                                                                            <img src="{{ asset('images/default.jpg') }}"
                                                                                                                                class="border rounded-circle"
                                                                                                                                alt="Avatar"
                                                                                                                                style="height: 40px;" />
                                                                                                                        </div>
                                                                                                                        <div
                                                                                                                            class="col-lg-9 col-md-9 col-10">
                                                                                                                            <input
                                                                                                                                type="text"
                                                                                                                                id="inputKomentarBalasan{{ $reply_comment->id }}"
                                                                                                                                name="commentVeed"
                                                                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                                                                placeholder="Masukkan komentar...">
                                                                                                                        </div>
                                                                                                                        <div class="col-lg-2 col-md-2 col-12">

                                                                                                                            <button
                                                                                                                                type="button"
                                                                                                                                id="buttonCommentVeed"
                                                                                                                                onclick="harusLogin()"
                                                                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </form>
                                                                                                            @endif
                                                                                                        </div>

                                                                                                    </div>

                                                                                                    @foreach ($reply_comment->balasRepliesCommentsFeeds as $nomers => $reply_replyComment)
                                                                                                        <div id="balasan_komentar_ini2{{ $reply_replyComment->id }}"
                                                                                                            class="">
                                                                                                            {{-- <div style="margin-left:-0.7%;"
                                                                                                                class="mt-1 me-3">


                                                                                                            </div> --}}
                                                                                                            <div
                                                                                                                class="mb-4 mt-4 row">
                                                                                                                <div
                                                                                                                    class="d-flex col-12 pl-0 pr-0">
                                                                                                                    @if ($reply_replyComment->user_pengirim->foto)
                                                                                                                        <img width="38px"
                                                                                                                            height="38px"
                                                                                                                            class="rounded-circle me-2"
                                                                                                                            src="{{ asset('storage/' . $reply_replyComment->user_pengirim->foto) }}"
                                                                                                                            alt="{{ $reply_replyComment->user_pengirim->name }}">
                                                                                                                    @else
                                                                                                                        <img width="38px"
                                                                                                                            height="38px"
                                                                                                                            class="rounded-circle me-2"
                                                                                                                            src="{{ asset('images/default.jpg') }}"
                                                                                                                            alt="{{ $reply_replyComment->user_pengirim->name }}">
                                                                                                                    @endif
                                                                                                                    <span>
                                                                                                                        <p class="fw-bolder mt-2 mb-2 text-truncate">{{ $reply_replyComment->user_pengirim->name }}</p>
                                                                                                                    </span>

                                                                                                                    <small class="d-flex flex-row-reverse ml-auto mt-2"
                                                                                                                        style="margin-left: 50%;">{{ \Carbon\Carbon::parse($reply_replyComment->created_at)->locale('id_ID')->diffForHumans() }}
                                                                                                                    </small>

                                                                                                                </div>
                                                                                                                <div class="d-flex pl-0"
                                                                                                                    style="margin-top: -1.2%;">
                                                                                                                    <p
                                                                                                                        class="ms-5">
                                                                                                                        <a
                                                                                                                            href="">{{ '@' . $reply_replyComment->user_pemilik->name . ' ' }}</a>
                                                                                                                        {{ $reply_replyComment->komentar }}
                                                                                                                    </p>
                                                                                                                </div>
                                                                                                                <div class="d-flex ms-3"
                                                                                                                    style="margin-top: -3%;">
                                                                                                                    <div
                                                                                                                        class="d-flex col-2 ms-2 pl-0">
                                                                                                                        @if (Auth::user())
                                                                                                                            @if ($reply_replyComment->likeRepliesReply(auth()->user()->id))
                                                                                                                                <form
                                                                                                                                    action="/sukai/reply_balasan/komentar/{{ Auth::user()->id }}/{{ $reply_replyComment->id }}/{{ $item_video->id }}"
                                                                                                                                    id="form_like_replies_reply{{ $reply_replyComment->id }}"
                                                                                                                                    method="POST">
                                                                                                                                    @csrf
                                                                                                                                    <button
                                                                                                                                        type="submit"
                                                                                                                                        class="btn"
                                                                                                                                        onclick="like_replies_reply({{ $reply_replyComment->id }})">
                                                                                                                                        <i class="fa-solid text-orange fa-thumbs-up"
                                                                                                                                            id="icon_like_replies_reply{{ $reply_replyComment->id }}"></i>
                                                                                                                                    </button>

                                                                                                                                </form>
                                                                                                                            @else
                                                                                                                                <form
                                                                                                                                    action="/sukai/reply_balasan/komentar/{{ Auth::user()->id }}/{{ $reply_replyComment->id }}/{{ $item_video->id }}"
                                                                                                                                    id="form_like_replies_reply{{ $reply_replyComment->id }}"
                                                                                                                                    method="POST">
                                                                                                                                    @csrf
                                                                                                                                    <button
                                                                                                                                        type="submit"
                                                                                                                                        class="btn"
                                                                                                                                        onclick="like_replies_reply({{ $reply_replyComment->id }})">
                                                                                                                                        <i class="fa-regular fa-thumbs-up"
                                                                                                                                            id="icon_like_replies_reply{{ $reply_replyComment->id }}"></i>
                                                                                                                                    </button>
                                                                                                                                </form>
                                                                                                                            @endif
                                                                                                                        @else
                                                                                                                            <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                                                                onclick="harusLogin()"
                                                                                                                                width="15px"
                                                                                                                                height="40px"
                                                                                                                                alt="" class="me-3">
                                                                                                                        @endif
                                                                                                                        @php
                                                                                                                            $countLike3sd = App\Models\likeBalasRepliesCommentsFeeds::query()
                                                                                                                                ->where('reply_comment_feed_id', $reply_replyComment->id)
                                                                                                                                ->where('feed_id', $item_video->id)
                                                                                                                                ->count();
                                                                                                                        @endphp
                                                                                                                        <span
                                                                                                                            id="count_like_replies_reply{{ $reply_replyComment->id }}"
                                                                                                                            class="mt-2"
                                                                                                                            style="margin-left: -7%;">
                                                                                                                            {{ $countLike3sd }}
                                                                                                                        </span>

                                                                                                                        <div
                                                                                                                            class="ms-2 mt-2 mr-auto">
                                                                                                                            {{-- modal-modal --}}
                                                                                                                            @if (Auth::check())
                                                                                                                                @if (Auth::user()->role != 'admin' && Auth::user()->id !== $reply_replyComment->user_pengirim->id)
                                                                                                                                    <a data-bs-toggle="modal"
                                                                                                                                        data-target="#ModalLapors{{ $reply_replyComment->id }}"
                                                                                                                                        href="#ModalLapors{{ $reply_replyComment->id }}"
                                                                                                                                        class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                                                            class="fa-solid fa-triangle-exclamation"></i>
                                                                                                                                    </a>
                                                                                                                                    <div class="modal fade"
                                                                                                                                        data-bs-backdrop="static"
                                                                                                                                        id="ModalLapors{{ $reply_replyComment->id }}"
                                                                                                                                        tabindex="-1"
                                                                                                                                        role="dialog"
                                                                                                                                        aria-labelledby="exampleModalCenterTitle"
                                                                                                                                        aria-hidden="true">
                                                                                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                                                                                            role="document">
                                                                                                                                            <div
                                                                                                                                                class="modal-content">
                                                                                                                                                <div
                                                                                                                                                    class="modal-header">
                                                                                                                                                    <h5 class="modal-title"
                                                                                                                                                        id="reportModal"
                                                                                                                                                        style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                                                                                                        Laporkan
                                                                                                                                                        Komentar
                                                                                                                                                        {{ $reply_replyComment->user_pengirim->name }}
                                                                                                                                                    </h5>
                                                                                                                                                    <button
                                                                                                                                                        type="button"
                                                                                                                                                        class="close"
                                                                                                                                                        data-bs-dismiss="modal"
                                                                                                                                                        aria-label="Close">
                                                                                                                                                        <span
                                                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                                                    </button>
                                                                                                                                                </div>
                                                                                                                                                <form
                                                                                                                                                    action="{{ route('report.comment.feed', ['comment_id' => 0, 'reply_comment_id' => 0, 'reply_replies_comment_id' => $reply_replyComment->id]) }}"
                                                                                                                                                    method="POST">
                                                                                                                                                    @csrf
                                                                                                                                                    <div
                                                                                                                                                        class="modal-body d-flex align-items-center">

                                                                                                                                                        @if ($reply_replyComment->user_pengirim->foto)
                                                                                                                                                            <img class="me-2"
                                                                                                                                                                src="{{ asset('storage/' . $reply_replyComment->user_pengirim->foto) }}"
                                                                                                                                                                width="106px"
                                                                                                                                                                height="104px"
                                                                                                                                                                style="border-radius: 50%"
                                                                                                                                                                alt="">
                                                                                                                                                        @else
                                                                                                                                                            <img class="me-2"
                                                                                                                                                                src="{{ asset('images/default.jpg') }}"
                                                                                                                                                                width="106px"
                                                                                                                                                                height="104px"
                                                                                                                                                                style="border-radius: 50%"
                                                                                                                                                                alt="">
                                                                                                                                                        @endif
                                                                                                                                                        <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                                                                                                            placeholder="Alasan..."></textarea>
                                                                                                                                                        {{-- @endif --}}
                                                                                                                                                    </div>
                                                                                                                                                    <div
                                                                                                                                                        class="modal-footer">
                                                                                                                                                        <button
                                                                                                                                                            type="submit"
                                                                                                                                                            class="btn btn-light text-light"
                                                                                                                                                            style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                                                                                                class="ms-2 me-2">Laporkan</b></button>
                                                                                                                                                    </div>
                                                                                                                                                </form>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                @elseif(Auth::user()->id == $reply_replyComment->user_pengirim->id)
                                                                                                                                    {{-- Hapus Komentar --}}
                                                                                                                                    <form
                                                                                                                                        method="POST"
                                                                                                                                        action="{{ route('delete.replies.reply.feed', $reply_replyComment->id) }}"
                                                                                                                                        id="form-delete-replies-reply{{ $reply_replyComment->id }}">
                                                                                                                                        @csrf
                                                                                                                                        @method('DELETE')
                                                                                                                                        <button
                                                                                                                                            type="submit"
                                                                                                                                            hidden
                                                                                                                                            onclick="deleted_replies_reply_comment_feed({{ $reply_replyComment->id }})"
                                                                                                                                            id="delete-replies-reply-button{{ $reply_replyComment->id }}">Delete</button>
                                                                                                                                        <button
                                                                                                                                            type="button"
                                                                                                                                            onclick="confirmation_delete_replies_reply({{ $reply_replyComment->id }})"
                                                                                                                                            class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                                                            <i
                                                                                                                                                class="fa-solid fa-trash"></i>
                                                                                                                                        </button>
                                                                                                                                    </form>
                                                                                                                                @elseif(Auth::user()->role == 'admin')
                                                                                                                                    {{-- Blokir Komentar --}}
                                                                                                                                    <button
                                                                                                                                        type="button"
                                                                                                                                        data-bs-toggle="modal"
                                                                                                                                        data-bs-target="#blookModal{{ $reply_replyComment->id }}"
                                                                                                                                        class="yuhu text-danger btn-sm rounded-5 "><svg
                                                                                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                                                                                            width="20"
                                                                                                                                            height="20"
                                                                                                                                            viewBox="0 0 24 24">
                                                                                                                                            <path
                                                                                                                                                d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                                                                                                                fill="currentColor"
                                                                                                                                                fill-rule="nonzero" />
                                                                                                                                        </svg>
                                                                                                                                    </button>
                                                                                                                                    <div class="modal fade"
                                                                                                                                        data-bs-backdrop="static"
                                                                                                                                        id="{{ $reply_replyComment->id }}"
                                                                                                                                        tabindex="-1"
                                                                                                                                        role="dialog"
                                                                                                                                        aria-labelledby="exampleModalCenterTitle"
                                                                                                                                        aria-hidden="true">
                                                                                                                                        <div class="modal-dialog modal-dialog-centered"
                                                                                                                                            role="document">
                                                                                                                                            <div
                                                                                                                                                class="modal-content">
                                                                                                                                                <div
                                                                                                                                                    class="modal-header">
                                                                                                                                                    <h5 class="modal-title"
                                                                                                                                                        id="reportModal"
                                                                                                                                                        style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                                                                                                        Blokir
                                                                                                                                                        komentar
                                                                                                                                                    </h5>
                                                                                                                                                    <button
                                                                                                                                                        type="button"
                                                                                                                                                        class="close"
                                                                                                                                                        data-bs-dismiss="modal"
                                                                                                                                                        data-bs-target="blockMod{{ $reply_replyComment->id }}"
                                                                                                                                                        aria-label="Close">
                                                                                                                                                        <span
                                                                                                                                                            aria-hidden="true">&times;</span>
                                                                                                                                                    </button>
                                                                                                                                                </div>
                                                                                                                                                <form
                                                                                                                                                    action="{{-- route('Report.comment.recipes',$row->id) --}}"
                                                                                                                                                    method="POST">
                                                                                                                                                    {{-- @csrf --}}
                                                                                                                                                    <div
                                                                                                                                                        class="modal-body d-flex align-items-center">

                                                                                                                                                        <img class="me-2"
                                                                                                                                                            src="{{ asset('images/default.jpg') }}"
                                                                                                                                                            width="106px"
                                                                                                                                                            height="104px"
                                                                                                                                                            style="border-radius: 50%"
                                                                                                                                                            alt="">
                                                                                                                                                        <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                                                                                                            placeholder="Alasan..."></textarea>
                                                                                                                                                        {{-- @endif --}}
                                                                                                                                                    </div>
                                                                                                                                                    <div
                                                                                                                                                        class="modal-footer">
                                                                                                                                                        <button
                                                                                                                                                            type="submit"
                                                                                                                                                            class="btn btn-light text-light"
                                                                                                                                                            style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                                                                                                class="ms-2 me-2">Blokir</b></button>
                                                                                                                                                    </div>
                                                                                                                                                </form>
                                                                                                                                            </div>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                @endif
                                                                                                                            @else
                                                                                                                                {{-- Untuk user belum login --}}
                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    onclick="harusLogin()"
                                                                                                                                    class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                                                        class="fa-solid fa-triangle-exclamation me-2"></i>
                                                                                                                                </button>
                                                                                                                            @endif
                                                                                                                            {{-- --}}
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                    <div class="col-9 pr-0">
                                                                                                                        <a href="#"
                                                                                                                            class="text-secondary mt-2"
                                                                                                                            data-toggle="collapse"
                                                                                                                            data-target="#collapse3{{ $reply_replyComment->id }}"
                                                                                                                            aria-expanded="true"
                                                                                                                            aria-controls="collapseOne" 
                                                                                                                            style="float: right;">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                width="22"
                                                                                                                                height="22"
                                                                                                                                viewBox="0 0 24 24">
                                                                                                                                <path
                                                                                                                                    fill="currentColor"
                                                                                                                                    d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                                                            </svg>
                                                                                                                            &nbsp;
                                                                                                                            <small class="me-2 ">Balas</small>
                                                                                                                        </a>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <div class="collapse"
                                                                                                            id="collapse3{{ $reply_replyComment->id }}">
                                                                                                            <div
                                                                                                                id="replies_reply2{{ $reply_replyComment->id }}">

                                                                                                            </div>
                                                                                                            <div
                                                                                                                class="row mt-4 mb-4">
                                                                                                                @if (Auth::check())
                                                                                                                    <form
                                                                                                                        id="formBalasRepliesCommentsFeeds2{{ $reply_replyComment->id }}"
                                                                                                                        action="{{ route('balas.replies.comments.feeds', [$reply_replyComment->user_pengirim->id, $reply_comment->id, $reply_replyComment->id]) }}"
                                                                                                                        method="post">
                                                                                                                        @csrf
                                                                                                                        <div
                                                                                                                            class="row">
                                                                                                                            <div style="margin-top: -1%;"
                                                                                                                                class="col-lg-1 col-md-1 col-2 pl-1">
                                                                                                                                @if (Auth::user()->foto)
                                                                                                                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                                                                                                        class="border rounded-circle"
                                                                                                                                        alt="Avatar"
                                                                                                                                        style="height: 40px;" />
                                                                                                                                @else
                                                                                                                                    <img src="{{ asset('images/default.jpg') }}"
                                                                                                                                        class="border rounded-circle"
                                                                                                                                        alt="Avatar"
                                                                                                                                        style="height: 40px;" />
                                                                                                                                @endif
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-9 col-md-9 col-10">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    id="inputBalasRepliesCommentsFeeds2{{ $reply_replyComment->id }}"
                                                                                                                                    name="komentar"
                                                                                                                                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                                    class="form-control-sm border border-dark border-5 me-3"
                                                                                                                                    placeholder="Masukkan komentar...">
                                                                                                                            </div>
                                                                                                                            <div class="col-lg-2 col-md-2 col-12 pl-0">

                                                                                                                                <button
                                                                                                                                    type="submit"
                                                                                                                                    id="buttonComment2Veed2{{ $reply_replyComment->id }}"
                                                                                                                                    onclick="balas_replies_comments_feeds2({{ $reply_replyComment->id }})"
                                                                                                                                    style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                                                                                    class="btn btn-sm mb-1 text-light"><b
                                                                                                                                        class="me-3 ms-3">Kirim</b></button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                @else
                                                                                                                    <form>
                                                                                                                        <div
                                                                                                                            class="row mb-3">
                                                                                                                            <div style=""
                                                                                                                                class="col-lg-1 col-md-1 col-2 pl-0">
                                                                                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                                                                                    class="border rounded-circle"
                                                                                                                                    alt="Avatar"
                                                                                                                                    style="height: 40px;" />
                                                                                                                            </div>
                                                                                                                            <div
                                                                                                                                class="col-lg-9 col-md-9 col-10">
                                                                                                                                <input
                                                                                                                                    type="text"
                                                                                                                                    id="inputKomentarBalasan{{ $reply_comment->id }}"
                                                                                                                                    name="commentVeed"
                                                                                                                                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                                    class="form-control-sm border border-dark border-5 me-3"
                                                                                                                                    placeholder="Masukkan komentar...">
                                                                                                                            </div>
                                                                                                                            <div class="col-lg-2 col-md-2 col-12">

                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    id="buttonCommentVeed"
                                                                                                                                    onclick="harusLogin()"
                                                                                                                                    style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                                                                                    class="btn btn-sm mb-1 text-light"><b
                                                                                                                                        class="me-3 ms-3">Kirim</b></button>
                                                                                                                            </div>
                                                                                                                        </div>
                                                                                                                    </form>
                                                                                                                @endif
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endforeach
                                                                                                @endforeach

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                            <!-- list komentar feed end -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                    <!-- foreach video pembelajaran end -->
                </div>

                <!-- feed end -->

                <!-- diikuti start -->
                <div class="col-md-3 hidden-content ">
                    <div class="card" style="width: 15rem;   border-radius: 10px">
                        <div class="card-header text-white text-center"
                            style="background-color: #F7941E;   border-top-right-radius: 10px;
                        border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Resep Terbaru
                        </div>
                        <div class="card-body" style="height: 500px;">
                            @foreach ($recipes as $resep)
                                <div class="d-flex mb-3">
                                    <a href="">
                                        @if ($resep->user->foto)
                                            <img src="{{ asset('storage/' . $resep->user->foto) }}"
                                                class="border rounded-circle me-2" alt="Avatar"
                                                style="height: 40px" />
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}"
                                                class="border rounded-circle me-2" alt="Avatar"
                                                style="height: 40px" />
                                        @endif
                                    </a>
                                    <div>
                                        <div class="bg-light rounded-3 px-3 py-1">
                                            <a href="/artikel/{{ $resep->id }}/{{ $resep->nama_resep }}"
                                                class="text-dark mb-0">
                                                <strong>{{ $resep->user->name }}</strong>
                                                @if ($resep->user->isSuperUser == 'yes')
                                                    <i class="fa-regular fa-sm text-primary fa-circle-check"></i>
                                                @endif
                                                <br>
                                                <small>{{ $resep->nama_resep }}</small>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="card mt-5 mb-5" style="width: 15rem; border-radius: 10px">
                        <div class="card-header text-white text-center"
                            style="background-color: #F7941E;   border-top-right-radius: 10px;
                    border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Kursus terbaru
                        </div>
                        <div class="card-body" style="height: 500px;">
                            @foreach ($course as $kursus)
                                <div class="d-flex mb-3">
                                    <a href="/detail_kursus/{{ $kursus->id }}">
                                        @if ($kursus->user->foto)
                                            <img src="{{ asset('storage/' . $kursus->user->foto) }}"
                                                class="border rounded-circle me-2" alt="Avatar"
                                                style="height: 40px" />
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}"
                                                class="border rounded-circle me-2" alt="Avatar"
                                                style="height: 40px" />
                                        @endif
                                    </a>
                                    <div>
                                        <div class="bg-light rounded-3 px-3 py-1">
                                            <a href="/detail_kursus/{{ $kursus->id }}" class="text-dark mb-0">
                                                <strong>{{ $kursus->user->name }}</strong>
                                                @if ($kursus->user->isSuperUser == 'yes')
                                                    <i class="fa-regular text-primary fa-circle-check"></i>
                                                @endif
                                            </a>
                                            <a href="/detail_kursus/{{ $kursus->id }}" class="text-muted d-block">
                                                <small>{{ $kursus->nama_kursus }}</small>
                                            </a>
                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
            <!-- diikuti end -->

        </section>

        <button hidden id="buttonPremiums" type="button"
            style="position: absolute;  right: 70%; background-color:#F7941E; "
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
        <div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script src="https://vjs.zencdn.net/8.5.2/video.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.0/sweetalert2.min.js"
        integrity="sha512-rO18JLH5mM83ToEn/5KhZ8BpHJ4uUKrGLybcp6wK0yuRfqQCSGVbEq1yIn/9coUjRU88TA6UJDLPK9sO6DN0Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        function gift_submit_button(num) {
            $("#gift-form" + num).off("submit");
            $("#gift-form" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                var message = document.getElementById("message" + num);
                var moreInput = document.getElementById("moreInput" + num);
                $.ajax({
                    url: route,
                    type: "POST",
                    data: data,
                    processData: false,
                    contentType: false,

                    success: function success(response) {
                        if (response.success) {
                            message.value = "";
                            moreInput.value = "";
                            let timerInterval;
                            Swal.fire({
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent =
                                            `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {

                                if (result.dismiss === Swal.DismissReason.timer) {
                                    document.getElementById('gift-btn' + num).disabled = true;
                                    setTimeout(function() {
                                        document.getElementById('gift-btn' + num)
                                            .disabled = false;
                                    }, 60000);
                                    iziToast.show({
                                        backgroundColor: '#a1dfb0',
                                        title: '<i class="fa-regular fa-circle-question"></i>',
                                        titleColor: 'dark',
                                        messageColor: 'dark',
                                        message: response.message,
                                        position: 'topCenter',
                                        progressBarColor: 'dark',
                                    });
                                }
                            });

                        } else {
                            message.value = "";
                            moreInput.value = "";
                            iziToast.show({
                                backgroundColor: '#f2a5a8',
                                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
    </script>
    <script>
        // balas komentar balasan di feed
        function balas_replies_comments_feeds1(num) {
            $("#formBalasRepliesCommentsFeeds1" + num).off("submit");
            $("#formBalasRepliesCommentsFeeds1" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        $("#inputBalasRepliesCommentsFeeds1" + num).val('');
                        if (response.success) {
                            let up = response.up;
                            let random = Math.random();
                            let pengirim = response.pengirim;
                            let penerima = response.penerima;
                            let jumlah_like = response.jumlah_like_veed;
                            let time = response.time;
                            let commentId = response.commentId
                            let feed_id = response.feed_id;
                            let foto = '';
                            $("#jumlah_komentar_feed" + feed_id).html(response.comment_count);
                            if (pengirim['foto'] != null) {
                                foto = 'storage/' + pengirim['foto'];
                            } else {
                                foto = 'images/default.jpg';
                            }
                            let innerHtml = `
                            <div class="" id="balasan_komentar_ini2${up['id']}">
                                                                                                        <div
                                                                                                            class="mb-4 row">
                                                                                                            <div class="d-flex col-12 pl-0 pr-0">

                                                                                                                <img width="38px"
                                                                                                                height="38px"
                                                                                                                class="rounded-circle me-2"
                                                                                                                src="{{ asset('${foto}') }}"
                                                                                                                alt="${pengirim['name']}">

                                                                                                                <span>
                                                                                                                    <p class="fw-bolder mt-2 mb-2 text-truncate">${pengirim['name']}</p>
                                                                                                                </span>

                                                                                                                <small class="d-flex flex-row-reverse ml-auto mt-2" style="margin-left: 50%;">
                                                                                                                    ${time}
                                                                                                                </small>

                                                                                                            </div>
                                                                                                            <div class="d-flex pl-0" style="margin-top: -1.2%;">
                                                                                                                <p class="ms-5"><a class="text-primary " href="">@${penerima['name']}</a> ${up['komentar']}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            {{-- ini like button --}}
                                                                                                             <div class="d-flex"
                                                                                                                    style="margin-top: -3%;">
                                                                                                                    <div class="d-flex col-2 ms-4 pl-0">
                                                                                                                        @if (Auth::user())
                                                                                                                                <form
                                                                                                                                    action="/sukai/reply_balasan/komentar/{{ Auth::user()->id }}/${up['id']}/${feed_id}"
                                                                                                                                    id="form_like_replies_reply${up['id']}"
                                                                                                                                    method="POST">
                                                                                                                                    @csrf
                                                                                                                                    <button
                                                                                                                                        type="submit"
                                                                                                                                        class="btn"
                                                                                                                                        onclick="like_replies_reply(${up['id']})">
                                                                                                                                        <i class="fa-regular fa-thumbs-up"
                                                                                                                                        id="icon_like_replies_reply${up['id']}"></i>
                                                                                                                                    </button>

                                                                                                                                </form>


                                                                                                                        @else
                                                                                                                            <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                                                                onclick="harusLogin()"
                                                                                                                                width="15px"
                                                                                                                                height="40px"
                                                                                                                                alt="" class="me-3">
                                                                                                                        @endif
                                                                                                                        <span id="count_like_replies_reply${up['id']}" class="my-auto" style="margin-left: -7%;">
                                                                                                                            0
                                                                                                                        </span>

                                                                                                                        <div class="m-2 mr-auto">
                                                                                                                            {{-- --}}

                                                                                                                                    {{-- Hapus Komentar --}}
                                                                                                                                    <form
                                                                                                                                        method="POST"
                                                                                                                                        action="/delete-replies-comment-feed/${up['id']}"
                                                                                                                                        id="form-delete-replies-reply2${up['id']}">
                                                                                                                                        @csrf
                                                                                                                                        @method('DELETE')
                                                                                                                                        <button
                                                                                                                                            type="submit"
                                                                                                                                            hidden onclick="deleted_replies_reply_comment_feed2(${up['id']})"
                                                                                                                                            id="delete-replies-reply-button2${up['id']}">Delete</button>
                                                                                                                                        <button
                                                                                                                                            type="button"
                                                                                                                                            onclick="confirmation_delete_replies_reply2(${up['id']})"
                                                                                                                                            class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                                                            <i
                                                                                                                                                class="fa-solid fa-trash"></i>
                                                                                                                                        </button>
                                                                                                                                    </form>

                                                                                                                        </div>
                                                                                                                    </div>

                                                                                                                <div style="" class="col-9 pr-0">
                                                                                                                    <a href="#"
                                                                                                                        class="text-secondary mt-2"
                                                                                                                        data-toggle="collapse"
                                                                                                                        data-target="#collapse${up['id']}"
                                                                                                                        aria-expanded="true"
                                                                                                                        aria-controls="collapseOne"
                                                                                                                        style="float: right;">
                                                                                                                        
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                            width="22"
                                                                                                                            height="22"
                                                                                                                            viewBox="0 0 24 24">
                                                                                                                            <path
                                                                                                                                fill="currentColor"
                                                                                                                                d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                                                        </svg>
                                                                                                                        &nbsp;
                                                                                                                        <small class="me-2 ">Balas</small>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>`;
                            $("#replies_reply" + num).append(innerHtml);
                        }
                    },
                    error: function error(xhr, status, erorr) {

                    }
                });
            });
        }

        function like_replies_reply(num) {
            $("#form_like_replies_reply" + num).off("submit");
            $("#form_like_replies_reply" + num).submit(function(event) {
                event.preventDefault();
                let rutes = $(this).attr("action");
                $.ajax({
                    url: rutes,
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        if (response.success) {
                            if (response.like) {
                                $("#icon_like_replies_reply" + num).removeClass("fa-regular");
                                $("#icon_like_replies_reply" + num).addClass("fa-solid");
                                $("#icon_like_replies_reply" + num).addClass("text-orange");
                                $("#count_like_replies_reply" + num).text(response.countLike);
                            } else {
                                $("#icon_like_replies_reply" + num).removeClass("fa-solid");
                                $("#icon_like_replies_reply" + num).addClass("fa-regular");
                                $("#icon_like_replies_reply" + num).removeClass("text-orange");
                                $("#count_like_replies_reply" + num).text(response.countLike);
                            }
                        }
                    }
                });
            });
        }

        // komentar reply feed ajax
        function balas_komentar(num) {
            $("#formBalasKomentar" + num).off('submit');
            $("#formBalasKomentar" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    data: data,
                    method: "POST",
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        if (response.success) {
                            iziToast.destroy();
                            iziToast.show({
                                backgroundColor: '#a1dfb0',
                                title: '<i class="fa-solid fa-check"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                                progressBarColor: 'dark',
                            });
                            $("#reply_comments" + num).html(response.update);
                            $("#inputKomentarBalasan" + num).val('');
                        }
                    },
                });
            });
        }
        // balas komentar ajaxx
        function replies_comment(num) {
            $('#formReplyComment' + num).off('submit');
            $("#formReplyComment" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        if (response.success) {
                            $("#inputKomentarBalasan" + num).val("");
                            // $("#input_comment_veed" + num).val('');
                            let up = response.up;
                            let random = Math.random();
                            let pengirim = response.pengirim;
                            let jumlah_like = response.jumlah_like_veed;
                            let veed_id = response.veed_id;
                            let time = response.time;
                            let commentId = response.commentId
                            let foto = '';
                            $("#jumlah_komentar_feed" + veed_id).html(response.comment_count);
                            if (pengirim['foto'] != null) {
                                foto = 'storage/' + pengirim['foto'];
                            } else {
                                foto = 'images/default.jpg';
                            }
                            console.log(pengirim);
                            let innerHtml = `
                            <div class="" id="balasan_komentar_ini${up['id']}">
                                                                                                        <div class="mb-4 mt-4 row">
                                                                                                            <div class="d-flex col-12 pl-0 pr-0">
                                                                                                                <img width="38px"
                                                                                                                height="38px"
                                                                                                                class="rounded-circle me-2"
                                                                                                                src="{{ asset('${foto}') }}"
                                                                                                                alt="${pengirim['name']}">

                                                                                                                <span>
                                                                                                                    <p class=" fw-bolder mt-2 mb-2">${pengirim['name']}</p>
                                                                                                                </span>

                                                                                                                <div class="d-flex flex-row-reverse ml-auto mt-2" style="margin-left: 50%;">
                                                                                                                    <small>
                                                                                                                        ${time}
                                                                                                                    </small>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div style="margin-top:-1.2%;" class="d-flex ms-5 pl-0">
                                                                                                                <p>${up['komentar']}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            {{-- ini like button --}}
                                                                                                            <div class="d-flex">
                                                                                                                <div class="d-flex col-2 ms-4 pl-0" style="margin-top:-3%;">
                                                                                                                    @if (Auth::user())
                                                                                                                            <form
                                                                                                                                action="/sukai/balasan/komentar/{{ Auth::user()->id }}/${up['id']}/${veed_id}"
                                                                                                                                id="formLikeReplyComment${up['id']}"
                                                                                                                                method="POST">
                                                                                                                                @csrf
                                                                                                                                <button
                                                                                                                                    type="submit"
                                                                                                                                    class="btn"
                                                                                                                                    onclick="likeReplyComment(${up['id']})">
                                                                                                                                    <i class="fa-regular fa-thumbs-up"
                                                                                                                                    id="iconLikeReplyComment${up['id']}"></i>
                                                                                                                                </button>

                                                                                                                            </form>


                                                                                                                    @else
                                                                                                                        <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                                                            onclick="harusLogin()"
                                                                                                                            width="15px"
                                                                                                                            height="40px"
                                                                                                                            alt="" class="me-3">
                                                                                                                    @endif
                                                                                                                    <span id="like-count${up['id']}" class="mt-2" style="margin-left: -7%;">
                                                                                                                        0
                                                                                                                    </span>
                                                                                                                    <div
                                                                                                                        class="m-2 mr-auto">
                                                                                                                        {{-- --}}

                                                                                                                                {{-- Hapus Komentar --}}
                                                                                                                                <form
                                                                                                                                    method="POST"
                                                                                                                                    action="/hapus_balasan_komentar_feed/${up['id']}"
                                                                                                                                    id="delete-reply-comment-form${up['id']}">
                                                                                                                                    @csrf
                                                                                                                                    @method('DELETE')
                                                                                                                                    <button
                                                                                                                                        type="submit"
                                                                                                                                        hidden onclick="deletedReplyCommentFeed(${up['id']})"
                                                                                                                                        id="delete-reply-comment-button${up['id']}">Delete</button>
                                                                                                                                    <button
                                                                                                                                        type="button"
                                                                                                                                        onclick="confirmation_delete_reply_comment(${up['id']})"
                                                                                                                                        class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                                                        <i
                                                                                                                                            class="fa-solid fa-trash"></i>
                                                                                                                                    </button>
                                                                                                                                </form>

                                                                                                                    </div>
                                                                                                                </div>
                                                                                                                <div style="margin-top:-2.2%; margin-left:-2.5%;" class="col-9 pr-0">
                                                                                                                    <a href="#"
                                                                                                                        class="text-secondary mt-1"
                                                                                                                        data-toggle="collapse"
                                                                                                                        data-target="#reply_collapse${up['id']}"
                                                                                                                        aria-expanded="true"
                                                                                                                        aria-controls="collapseOne"
                                                                                                                        style="float: right;">
                                                                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                            width="22"
                                                                                                                            height="22"
                                                                                                                            viewBox="0 0 24 24">
                                                                                                                            <path
                                                                                                                                fill="currentColor"
                                                                                                                                d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                                                        </svg>
                                                                                                                        &nbsp;
                                                                                                                        <small class="me-2 ">Balas</small>
                                                                                                                    </a>
                                                                                                                </div>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <!-- Komentar Balasan Collapse Start -->
                                                                                                            <div class="collapse" style=""
                                                                                                                id="reply_collapse${up['id']}">
                                                                                                                 <div class='ms-3' id="replies_reply${up['id']}">

                                                                                                                </div>
                                                                                                                <div class="">
                                                                                                                    <div class="">
                                                                                                                        <div class="row">
                                                                                                                            @if (Auth::check())
                                                                                                                            <form
                                                                                                                                    id="formBalasRepliesCommentsFeeds1${up['id']}"
                                                                                                                                    action="/balas_komentar_balasan_feed/${up['users_id']}/${up['id']}"
                                                                                                                                    method="post">
                                                                                                                                    @csrf
                                                                                                                                    <div class="row mb-3">
                                                                                                                                        <div class="col-lg-1 col-md-1 col-2 pl-1">
                                                                                                                                            @if (Auth::user()->foto)
                                                                                                                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                                                                                                                    class="border rounded-circle"
                                                                                                                                                    alt="Avatar"
                                                                                                                                                    style="height: 40px;" />
                                                                                                                                            @else
                                                                                                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                                                                                                    class="border rounded-circle"
                                                                                                                                                    alt="Avatar"
                                                                                                                                                    style="height: 40px;" />
                                                                                                                                            @endif
                                                                                                                                        </div>
                                                                                                                                        <div
                                                                                                                                            class="col-lg-9 col-md-9 col-10">
                                                                                                                                            <input
                                                                                                                                                type="text"
                                                                                                                                                id="inputBalasRepliesCommentsFeeds1${up['id']}"
                                                                                                                                                name="komentar"
                                                                                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                                                class="form-control-sm border border-dark border-5 me-3 mt-1"
                                                                                                                                                placeholder="Masukkan komentar...">
                                                                                                                                        </div>
                                                                                                                                        <div class="col-lg-2 col-md-2 col-12 pl-0">
                                                                                                                                            <button
                                                                                                                                                type="submit"
                                                                                                                                                id="buttonComment2Veed1${up['id']}"
                                                                                                                                                onclick="balas_replies_comments_feeds1(${up['id']})"
                                                                                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right;"
                                                                                                                                                class="btn btn-sm mb-1 text-light mt-1"><b
                                                                                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                                                                                        </div>
                                                                                                                                    </div>
                                                                                                                                </form>

                                                                                                                            @endif
                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>

                                                                                                            </div>`;
                            $("#repliesCommentList" + num).append(innerHtml);
                        }
                    },
                    error: function error(xhr, status, errors) {
                        iziToast.destroy();
                        iziToast.show({
                            backgroundColor: '#f2a5a8',
                            title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: xhr.responseText,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                });
            });
        }

        function showLoadingOverlay() {
            $("#loading-overlay").show();
            $("#text-loading").show();
        }

        function hideLoadingOverlay() {
            $("#loading-overlay").hide();
            $("#text-loading").hide();
        }

        function testingButton() {
            showLoadingOverlay();
        }
        // upload video feed ajax
        $("#formUploadVideo").submit(function(e) {
            e.preventDefault();
            showLoadingOverlay();
            let data = new FormData($(this)[0]);
            $.ajax({
                url: "{{ route('upload.video') }}",
                method: "POST",
                processData: false,
                contentType: false,
                data: data,
                success: function success(response) {
                    hideLoadingOverlay();
                    if (response.success) {
                        location.reload();
                        iziToast.show({
                            backgroundColor: '#a1dfb0',
                            title: '<i class="fa-solid fa-check"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: response.message,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                },
                error: function error(xhr, status, errors) {
                    hideLoadingOverlay();
                    console.log(xhr.responseText);
                    iziToast.show({
                        backgroundColor: '#f2a5a8',
                        title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                        titleColor: 'dark',
                        messageColor: 'dark',
                        message: xhr.responseText,
                        position: 'topCenter',
                        progressBarColor: 'dark',
                    });

                }
            });
        });
        // like reply comment feed ajax
        function likeReplyComment(num) {
            $("#formLikeReplyComment" + num).off("submit");
            $("#formLikeReplyComment" + num).submit(function(event) {
                event.preventDefault();
                let rutes = $(this).attr("action");
                $.ajax({
                    url: rutes,
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        if (response.success) {
                            if (response.like) {
                                $("#iconLikeReplyComment" + num).removeClass("fa-regular");
                                $("#iconLikeReplyComment" + num).addClass("fa-solid");
                                $("#iconLikeReplyComment" + num).addClass("text-orange");
                                $("#like-count" + num).text(response.countLike);
                            } else {
                                $("#iconLikeReplyComment" + num).removeClass("fa-solid");
                                $("#iconLikeReplyComment" + num).addClass("fa-regular");
                                $("#iconLikeReplyComment" + num).removeClass("text-orange");
                                $("#like-count" + num).text(response.countLike);
                            }
                        }
                    }
                });
            });
        }

        // like comment feed ajax
        function likeCommentFeed(nums) {
            $("#formLikeCommentFeed" + nums).off('submit');
            $("#formLikeCommentFeed" + nums).submit(function(event) {
                event.preventDefault();
                let nilai = parseInt($("#jumlah_like" + nums).text());
                if (nilai == 1) {
                    $("#jumlah_like" + nums).empty().append('0');

                } else {
                    $("#jumlah_like" + nums).empty().append('1');
                }

                let rutte = $(this).attr("action");
                $.ajax({
                    url: rutte,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        if (response.success) {
                            iziToast.destroy();
                            if (response.like) {
                                $("#iLikeComment" + nums).removeClass("fa-regular");
                                $("#iLikeComment" + nums).addClass("fa-solid");
                                $("#iLikeComment" + nums).addClass("text-orange");
                                $("#countLikeComment" + nums).text(response.count);
                            } else {
                                $("#iLikeComment" + nums).removeClass("fa-solid");
                                $("#iLikeComment" + nums).addClass("fa-regular");
                                $("#iLikeComment" + nums).removeClass("text-orange");
                                $("#countLikeComment" + nums).text(response.count);
                            }
                        }
                    }
                });
            });
        }

        function shareButton(num) {
            $('#share_form' + num).off('submit');
            $('#share_form' + num).submit(function(e) {
                e.preventDefault();
                // var share_button_icon = document.getElementById('share_button_icon');
                // var share_icon = document.getElementById('share_icon');
                var shared_count = document.getElementById('shared_count' + num);
                let route = $('#share_form' + num).attr('action');
                let data = new FormData($('#share_form' + num)[0]);
                $.ajax({
                    type: "POST",
                    url: route,
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            shared_count.textContent = response.shared_count;
                            document.getElementById('shr-btn' + num).disabled = true;
                            setTimeout(function() {
                                document.getElementById('shr-btn' + num)
                                    .disabled = false;
                            }, 60000);
                            iziToast.show({
                                backgroundColor: '#a1dfb0',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                                progressBarColor: 'dark',
                            });
                        } else {
                            iziToast.show({
                                backgroundColor: '#f2a5a8',
                                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    }
                });
            });
        }
        // like feed ajax
        function likeFeed(num) {
            // sebelumnya ngebug duplikasi aksi, dengan ini akan menonaktifkan aksi yang sebelumnya.
            $("#formLikeVeed" + num).off('submit');
            $("#formLikeVeed" + num).submit(function(event) {
                event.preventDefault();
                // karena like feednya pakai foreach makanya harus diambil satu-satu nilai rutenya dari form action dengan .attr('action')
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "POST",
                    success: function success(response) {
                        if (response.success) {
                            if (response.like) {
                                $("#likeB" + num).removeClass("fa-reguler");
                                $("#likeB" + num).addClass("fa-solid");
                                $("#likeB" + num).addClass("text-orange");
                                $("#countLikeFeed" + num).html(response.count);
                            } else {
                                $("#likeB" + num).removeClass("fa-solid");
                                $("#likeB" + num).removeClass("text-orange");
                                $("#likeB" + num).addClass("fa-regular");
                                $("#countLikeFeed" + num).html(response.count);
                            }
                        }

                    },
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    error: function error(xhr, status, errors) {
                        console.log(xhr);
                    }
                });
            });
        }
        // membuka mengklik input file upload video
        function openV() {
            document.getElementById("inputVideo").click();
            document.getElementById("inputVideo").addEventListener("change", function(event) {
                const fileTarget = event.target;
                const file = fileTarget.files[0];

                document.getElementById("aVideo").textContent = file.name;
            });
        }
        // onclick alert harus login
        function harusLogin() {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Anda harus login terlebih dahulu!',
                position: 'topCenter',
                progressBarColor: 'dark',
            });
        }

        function confirmation_delete_comment_feed(num) {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-comment-button' + num).click();
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

        function confirmation_delete_feed(num) {
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus feed anda?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $("#delete-feed-button" + num).click();
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

        function confirmation_delete_reply_comment(num) {
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-reply-comment-button' + num)
                                    .click();
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

        function deletedCommentFeed(num) {
            $("#delete-comment-form" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        $("#komen_veed_ini" + num).empty();
                        iziToast.show({
                            backgroundColor: '#a1dfb0',
                            title: '<i class="fa-solid fa-check"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: response.message,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                });
            });
        }

        function deletedReplyCommentFeed(num) {
            $("#delete-reply-comment-form" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        $("#balasan_komentar_ini" + num).empty();
                        iziToast.show({
                            backgroundColor: '#a1dfb0',
                            title: '<i class="fa-regular fa-circle-question"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: "Sukses menghapus komentar",
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                });
            });
        }

        function balas_replies_comments_feeds2(num) {
            $("#formBalasRepliesCommentsFeeds2" + num).off("submit");
            $("#formBalasRepliesCommentsFeeds2" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        $("#inputBalasRepliesCommentsFeeds2" + num).val('');
                        if (response.success) {
                            let up = response.up;
                            let random = Math.random();
                            let pengirim = response.pengirim;
                            let penerima = response.penerima;
                            let jumlah_like = response.jumlah_like_veed;
                            let feed_id = response.feed_id;
                            let time = response.time;
                            let commentId = response.commentId
                            let foto = '';
                            $("#jumlah_komentar_feed" + feed_id).html(response.comment_count);
                            if (pengirim['foto'] != null) {
                                foto = 'storage/' + pengirim['foto'];
                            } else {
                                foto = 'images/default.jpg';
                            }
                            let innerHtml = `
                            <div class="" id="balasan_komentar_ini2${up['id']}">
                                                                                                        <div
                                                                                                            class="mb-4 row">
                                                                                                            <div class="d-flex col-12 pl-0 pr-0">

                                                                                                                <img width="38px"
                                                                                                                height="38px"
                                                                                                                class="rounded-circle me-2"
                                                                                                                src="{{ asset('${foto}') }}"
                                                                                                                alt="${pengirim['name']}">

                                                                                                                <span><p class="fw-bolder mt-2 mb-2 text-truncate">${pengirim['name']}</p></span>

                                                                                                                <small
                                                                                                                class="d-flex flex-row-reverse ml-auto mt-2" style="margin-left: 50%;">${time}
                                                                                                                </small>

                                                                                                            </div>
                                                                                                            <div class="d-flex ms-5 pl-0" style="margin-top:-1.2%;">
                                                                                                                <p><a class="text-primary me-2" href="">@${penerima['name']}</a>${up['komentar']}
                                                                                                                </p>
                                                                                                            </div>
                                                                                                            {{-- ini like button --}}
                                                                                                            <div class="d-flex" style="margin-top: -3%;">
                                                                                                                <div class="d-flex col-2 ms-4 pl-0">
                                                                                                                        @if (Auth::user())
                                                                                                                                <form
                                                                                                                                    action="/sukai/reply_balasan/komentar/{{ Auth::user()->id }}/${up['id']}/${feed_id}"
                                                                                                                                    id="form_like_replies_reply${up['id']}"
                                                                                                                                    method="POST">
                                                                                                                                    @csrf
                                                                                                                                    <button
                                                                                                                                        type="submit"
                                                                                                                                        class="btn"
                                                                                                                                        onclick="like_replies_reply(${up['id']})">
                                                                                                                                        <i class="fa-regular fa-thumbs-up"
                                                                                                                                        id="icon_like_replies_reply${up['id']}"></i>
                                                                                                                                    </button>

                                                                                                                                </form>


                                                                                                                        @else
                                                                                                                            <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                                                                onclick="harusLogin()"
                                                                                                                                width="15px"
                                                                                                                                height="40px"
                                                                                                                                alt="" class="me-3">
                                                                                                                        @endif
                                                                                                                        <span id="count_like_replies_reply${up['id']}" class="my-auto"  style="margin-left: -7%;">
                                                                                                                            0
                                                                                                                        </span>
                                                                                                                        <div
                                                                                                                            class="ms-2 mt-2 mr-auto">
                                                                                                                            {{-- --}}

                                                                                                                                    {{-- Hapus Komentar --}}
                                                                                                                                    <form
                                                                                                                                        method="POST"
                                                                                                                                        action="/delete-replies-comment-feed/${up['id']}"
                                                                                                                                        id="form-delete-replies-reply2${up['id']}">
                                                                                                                                        @csrf
                                                                                                                                        @method('DELETE')
                                                                                                                                        <button
                                                                                                                                            type="submit"
                                                                                                                                            hidden onclick="deleted_replies_reply_comment_feed2(${up['id']})"
                                                                                                                                            id="delete-replies-reply-button2${up['id']}">Delete</button>
                                                                                                                                        <button
                                                                                                                                            type="button"
                                                                                                                                            onclick="confirmation_delete_replies_reply2(${up['id']})"
                                                                                                                                            class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                                                            <i
                                                                                                                                                class="fa-solid fa-trash"></i>
                                                                                                                                        </button>
                                                                                                                                    </form>

                                                                                                                        </div>
                                                                                                                </div>
                                                                                                                <div 
                                                                                                                        class="col-9 pr-0">
                                                                                                                        <a href="#"
                                                                                                                            class="text-secondary mt-2"
                                                                                                                            data-toggle="collapse"
                                                                                                                            data-target="#collapse${up['id']}"
                                                                                                                            aria-expanded="true"
                                                                                                                            aria-controls="collapseOne"
                                                                                                                            style="float: right;">
                                                                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                                                                width="22"
                                                                                                                                height="22"
                                                                                                                                viewBox="0 0 24 24">
                                                                                                                                <path
                                                                                                                                    fill="currentColor"
                                                                                                                                    d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                                                            </svg>
                                                                                                                            &nbsp;
                                                                                                                            <small class="me-2 ">Balas</small>
                                                                                                                        </a>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>`;
                            $("#replies_reply2" + num).append(innerHtml);
                        }
                    },
                    error: function error(xhr, status, erorr) {

                    }
                });
            });
        }

        function confirmation_delete_replies_reply2(num) {
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $('#delete-replies-reply-button2' + num).click();
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

        function deleted_replies_reply_comment_feed2(num) {
            $("#form-delete-replies-reply2" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        $("#balasan_komentar_ini2" + num).empty();
                        iziToast.show({
                            backgroundColor: '#a1dfb0',
                            title: '<i class="fa-solid fa-check"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: response.message,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                });
            });
        }

        function confirmation_delete_replies_reply(num) {
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $('#delete-replies-reply-button' + num).click();
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

        function deleted_replies_reply_comment_feed(num) {
            $("#form-delete-replies-reply" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "DELETE",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        $("#balasan_komentar_ini2" + num).empty();
                        iziToast.show({
                            backgroundColor: '#a1dfb0',
                            title: '<i class="fa-solid fa-check"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: response.message,
                            position: 'topCenter',
                            progressBarColor: 'dark',
                        });
                    }
                });
            });
        }
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll("#like-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector("#like-button");
                    const icon = button.querySelector("i");
                    const svg = button.querySelector("svg");

                    const response = await fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData = await response.json();
                        if (responseData.liked) {
                            button.classList.remove('text-dark');
                            button.classList.add('text-orange');
                            icon.setAttribute('class', 'fa-solid fa-thumbs-up');
                            document.getElementById("like-count-balasan" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-orange');
                            button.classList.add('text-dark');
                            icon.setAttribute('class', 'fa-regular fa-thumbs-up');
                            document.getElementById("like-count-balasan" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
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
                console.log(time);
                if (video.currentTime >= time) {
                    // jika sudah lebih dari 5 detik maka video di pause
                    video.pause();
                    video.currentTime = 0;
                    // membuka modal penawaran premium
                    $("#buttonPremiums").click();
                }
            });
        });
    </script>
    <script>
        // komentar feed ajax

        function komentar_feed(num) {
            $('#formCommentFeed' + num).off('submit');
            $("#formCommentFeed" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        if (response.success) {
                            $("#input_comment_veed" + num).val('');
                            let up = response.up;
                            let pengirim = response.pengirim;
                            let jumlah_like = response.jumlah_like_veed;
                            let veed_id = num;
                            let time = response.time;
                            let commentId = response.commentId
                            let foto = '';
                            let pengirimId = response.pengirim.id;
                            $("#jumlah_komentar_feed" + num).html(response.comment_count);
                            if (pengirim['foto'] != null) {
                                foto = 'storage/' + pengirim['foto'];
                            } else {
                                foto = 'images/default.jpg';
                            }
                            console.log(pengirim);
                            if (response.active) {
                                let innerHtml = `
                            <div class="media row mb-2" id="komen_veed_ini${up['id']}"
                                                                        style="">
                                                                        <div class="d-flex col-12">

                                                                                <img width="38px" height="38px"
                                                                                    class="rounded-circle"
                                                                                    src="{{ asset('${foto}') }}"
                                                                                    alt="">

                                                                            <p class="ms-2 mt-2 fw-bolder">
                                                                                ${pengirim['name']}
                                                                            </p>
                                                                            <div
                                                                                class="d-flex flex-row-reverse ml-auto mt-2">
                                                                                <small>
                                                                                    ${time}
                                                                                    </small>
                                                                            </div>
                                                                        </div>
                                                                        <div style="margin-top:-2%;" class="">
                                                                            <div class="d-flex ms-5">
                                                                                <p>${up['komentar']}</p>
                                                                            </div>
                                                                            <div class="d-flex col-lg-11"
                                                                                style="margin-top:-3%;">
                                                                                <div class="d-flex ms-4">
                                                                                    @if (Auth::user())
                                                                                            <form
                                                                                            action="/like/${pengirim['id']}/${up['id']}/${veed_id}"

                                                                                                id="formLikeCommentFeed${up['id']}"
                                                                                                method="POST">
                                                                                                @csrf
                                                                                                <button type="submit"
                                                                                                    class="btn"
                                                                                                    onclick="likeCommentFeed(${up['id']})">
                                                                                                    <i class="fa-regular fa-thumbs-up"
                                                                                                        id="iLikeComment${up['id']}"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                    @else
                                                                                        <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                            onclick="harusLogin()"
                                                                                            width="15px" height="40px"
                                                                                            alt="" class="me-3">
                                                                                    @endif
                                                                                    <span class="my-auto" style="margin-left:-13%;"
                                                                                        id="countLikeComment${up['id']}">
                                                                                        <p class="my-auto" id="jumlah_like${up['id']}">0</p>

                                                                                    </span>
                                                                                </div>
                                                                                <div class="ms-2 mt-2 mr-auto">
                                                                                    {{-- --}}
                                                                                    {{-- Hapus Komentar --}}
                                                                                            <form method="POST"
                                                                                                action="/hapus_komentar_feed/${up['id']}"
                                                                                                id="delete-comment-form${up['id']}">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit"
                                                                                                    hidden onclick="deletedCommentFeed(${up['id']})"
                                                                                                    id="delete-comment-button${up['id']}">Delete</button>
                                                                                                <button type="button"
                                                                                                    onclick="confirmation_delete_comment_feed(${up['id']})"
                                                                                                    class="yuhu text-danger btn-sm rounded-5 float-end">
                                                                                                    <i
                                                                                                        class="fa-solid fa-trash"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                    {{-- --}}
                                                                                </div>
                                                                                <a href="#"
                                                                                    class="text-secondary mt-1"
                                                                                    data-toggle="collapse"
                                                                                    data-target="#collapse${up['id']}"
                                                                                    aria-expanded="true"
                                                                                    aria-controls="collapseOne">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                                                        width="22" height="22"
                                                                                        viewBox="0 0 24 24">
                                                                                        <path fill="currentColor"
                                                                                            d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                                    </svg>
                                                                                    &nbsp; <small>Balas</small>
                                                                                </a>
                                                                            </div>
                                                                            <!-- Komentar Balasan Collapse Start -->
                                                                            <div class="collapse"
                                                                                style="margin-right: -7%;"
                                                                                id="collapse${up['id']}">

                                                                                <div class="card-body pr-5">
                                                                                    <div class="container">
                                                                                        <div class="row">
                                                                                            @if (Auth::check())
                                                                                            <form
                                                                                                    id="formReplyComment${up['id']}"
                                                                                                    action="/balas/komentar/{{ Auth::user()->id }}/${up['id']}/${veed_id}"
                                                                                                    method="post">
                                                                                                    @csrf
                                                                                                    <div class="row">
                                                                                                        <div
                                                                                                            class="col-lg-1 col-md-1 col-2 pl-1" style="margin-left: -5px; margin-top:-1.1%;">
                                                                                                            @if (Auth::user()->foto)
                                                                                                                <img src="{{ asset('storage/' . Auth::user()->foto) }}"
                                                                                                                    class="border rounded-circle"
                                                                                                                    alt="Avatar"
                                                                                                                    style="height: 40px;" />
                                                                                                            @else
                                                                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                                                                    class="border rounded-circle"
                                                                                                                    alt="Avatar"
                                                                                                                    style="height: 40px;" />
                                                                                                            @endif
                                                                                                        </div>
                                                                                                        <div
                                                                                                            class="col-lg-9 col-md-9 col-10">
                                                                                                            <input
                                                                                                                type="text"
                                                                                                                id="inputKomentarBalasan${up['id']}"
                                                                                                                name="komentarBalasan"
                                                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%; border-radius:30px;"
                                                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                                                placeholder="Masukkan komentar...">
                                                                                                        </div>
                                                                                                        <div class="col-lg-2 col-md-2 col-12 pl-0">

                                                                                                            <button
                                                                                                                type="submit"
                                                                                                                id="buttonCommentVeed${up['id']}"
                                                                                                                onclick="replies_comment(${up['id']})"
                                                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); float: right"
                                                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </form>

                                                                                            @endif

                                                                                            <div
                                                                                                id="reply_comments${up['id']}">
                                                                                                <div
                                                                                                    id="repliesCommentList${up['id']}">

                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>
                                                                        </div>`;
                                $("#new_komentar_feed" + num).append(innerHtml);
                            }
                            balasButton.addEventListener('click', function() {

                            });
                        }
                    },
                    error: function error(xhr, status, errors) {
                        iziToast.destroy();
                        iziToast.show({
                            backgroundColor: '#f2a5a8',
                            title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                            titleColor: 'dark',
                            messageColor: 'dark',
                            message: xhr.responseText,
                            position: 'topCenter',
                        });
                    }
                });
            });
        }
    </script>
    <script>
       // Mendapatkan semua elemen dengan class "item"
    var elements = document.querySelectorAll('.item');

    // Loop melalui setiap elemen
    elements.forEach(function(element) {
        // Mendapatkan ID dari atribut data-id
        var itemId = element.getAttribute('data-id');

        // Mendapatkan lebar layar saat ini
        var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

        // Cek lebar layar dan hapus class jika sesuai
        if (screenWidth <= 768) {
            element.classList.remove('pr-0');
        } else {
            element.classList.add('pr-0');
        }
    });

    // Menambahkan event listener untuk mendeteksi perubahan ukuran layar
    window.addEventListener('resize', function() {
        elements.forEach(function(element) {
            // Mendapatkan lebar layar saat ini
            var screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

            // Cek lebar layar dan hapus class jika sesuai
            if (screenWidth <= 768) {
                element.classList.remove('pr-0');
            } else { 
                element.classList.add('pr-0');
            }
        });
    });
</script>

<!-- <script>
//    // Fungsi untuk mengatur kelas pada lebar layar tertentu
// function handleClassesOnResize() {
//     var element1 = document.querySelector('.col-lg-1.col-md-1.col-sm-1.pr-0');
//     var element2 = document.querySelector('.col-lg-8.col-md-8.col-sm-11.text-dark.my-auto.pl-0');

//     if (window.innerWidth >= 425) {
//         element1.classList.remove('pr-0');
//         element2.classList.remove('pl-0');
//     } else {
//         element1.classList.add('pr-0');
//         element2.classList.add('pl-0');
//     }
// }

// removeClassOnResize();

// // Menjalankan fungsi ketika ukuran layar berubah
// window.addEventListener('resize', handleClassesOnResize);

// Mengambil elemen dengan kelas tertentu
var element = document.querySelector('.col-lg-1.col-md-1.col-sm-1.pr-0');

// Fungsi untuk menghapus kelas pada lebar layar 425px atau lebih besar
function removeClassOnResize() {
  if (window.innerWidth >= 425) {
    element.classList.remove('pr-0');
  } else {
    element.classList.add('pr-0');
  }
}

// Menjalankan fungsi ketika halaman dimuat
removeClassOnResize();

// Menjalankan fungsi ketika ukuran layar berubah
window.addEventListener('resize', removeClassOnResize);


</script>
<script>
    // Mengambil elemen dengan kelas tertentu
var element = document.querySelector('.col-lg-8 col-md-8 col-sm-11 text-dark my-auto pl-3');

// Fungsi untuk menghapus kelas pada lebar layar 425px atau lebih besar
function removeClassOnResize() {
  if (window.innerWidth >= 425) {
    element.classList.remove('pl-0');
  } else {
    element.classList.add('pl-0');
  }
}

// Menjalankan fungsi ketika halaman dimuat
removeClassOnResize();

// Menjalankan fungsi ketika ukuran layar berubah
window.addEventListener('resize', removeClassOnResize);
</script> -->

@endsection
