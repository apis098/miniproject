@extends('template.nav')
@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @push('style')
        @powerGridStyles
    @endpush
    <section class="text-align-center mt-5" id="all">

        <!-- rekomendasi chef start -->
        <div class="row justify-content-center">
            <div class="col-md-3 " style="">
                <div class="card" style="width: 15rem; margin-left:50px;  border-radius: 10px">
                    <div class="card-header text-white text-center"
                        style="background-color: #F7941E;   border-top-right-radius: 10px; border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Rekomendasi Chef
                    </div>
                    <div class="card-body" style="height: 400px;">
                        @foreach ($top_users as $row)
                            <div class="d-flex mb-3">
                                @if ($row->foto)
                                    <a href="">
                                        <img src="{{ asset('storage/' . $row->foto) }}" class="border rounded-circle me-2"
                                            alt="Avatar" style="height: 40px" />
                                    </a>
                                @else
                                    <a href="">
                                        <img src="{{ asset('images/default.jpg') }}" class="border rounded-circle me-2"
                                            alt="Avatar" style="height: 40px" />
                                    </a>
                                @endif
                                <div>
                                    <div class="bg-light rounded-3 px-3 py-1">
                                        <a href="" class="text-dark mb-0">
                                            <strong>{{ $row->name }}</strong>
                                        </a>
                                        @php
                                            $resep_count = \App\Models\reseps::where('user_id', $row->id)->count();
                                        @endphp
                                        <a href="" class="text-muted d-block">
                                            <small>{{ $resep_count }} Resep dibuat</small>
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
                .posisi {
                    margin-top: -3%;
                }

                .form {
                    position: relative;
                }

                .form .fa-search {
                    position: absolute;
                    top: 40px;
                    left: 20px;
                    color: #9ca3af;

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
                    margin-left: -3.5%;
                    width: 107%;
                    height: 55px;
                    text-indent: 33px;
                    border-radius: 10px;
                }

                .form-input:focus {

                    box-shadow: none;
                    border: solid rgb(123, 215, 232) 3px;
                }
            </style>
            <!-- feed start -->
            <div class="col-md-6">
                <div class="card border border-0 posisi">
                    <div class="card-body form">
                        <i class="fa fa-search"></i>
                        <input type="text" class="form-control form-input search-video" placeholder="Cari...">
                    </div>
                </div>
                <div class="card border border-0 posisi" hidden>
                    <div class="card-body form">
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
                <div class="card">
                    <div class="card-body">
                        @if (Auth::user())
                            @if (Auth::user()->isSuperUser === 'yes')
                                <div class="d-flex">

                                    <input type="radio" class="btn-check" name="isPremium" id="success-outlined"
                                        autocomplete="off" value="no">
                                    <label class="btn btn-select mr-3" id="free" for="success-outlined">Gratis</label>

                                    <input type="radio" class="btn-check" name="isPremium" id="danger-outlined"
                                        autocomplete="off" value="yes">
                                    <label class="btn btn-no-select" id="prem" for="danger-outlined">Premium</label>
                                </div>
                            @endif
                        @endif
                        @if (Auth::check())
                            <form action="{{ route('upload.video') }}" method="post" enctype="multipart/form-data"
                                id="formUploadVideo">
                                @csrf
                                <textarea name="deskripsi_video" class="form-control" placeholder="Ketik apa yang anda pikirkan" id="deskripsi_video"
                                    rows="5" required>{{ old('deskripsi_video') }}</textarea>
                                <br>
                                <input type="file" name="upload_video" id="inputVideo" hidden>
                                <a href="#" class="btn btn-light" id="aVideo" onclick="openV()"
                                    style="background-color: white; border: 0.50px black solid; border-radius: 10px;">
                                    <div style="font-weight: 600; color: black;"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 18q2.075 0 3.538-1.462Q17 15.075 17 13q0-2.075-1.462-3.538Q14.075 8 12 8Q9.925 8 8.463 9.462Q7 10.925 7 13q0 2.075 1.463 3.538Q9.925 18 12 18Zm0-2q-1.25 0-2.125-.875T9 13q0-1.25.875-2.125T12 10q1.25 0 2.125.875T15 13q0 1.25-.875 2.125T12 16Zm6-6q.425 0 .712-.288Q19 9.425 19 9t-.288-.713Q18.425 8 18 8t-.712.287Q17 8.575 17 9t.288.712Q17.575 10 18 10ZM4 21q-.825 0-1.412-.587Q2 19.825 2 19V7q0-.825.588-1.412Q3.175 5 4 5h3.15L8.7 3.325q.15-.15.337-.238Q9.225 3 9.425 3h5.15q.2 0 .388.087q.187.088.337.238L16.85 5H20q.825 0 1.413.588Q22 6.175 22 7v12q0 .825-.587 1.413Q20.825 21 20 21Zm16-2V7h-4.05l-1.825-2h-4.25L8.05 7H4v12Zm-8-6Z" />
                                        </svg> Tambahkan Video</div>
                                </a>
                                <button type="submit" class="btn " id="buttonUploadVideo"
                                    style="float:right; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                    <span style="font-weight: 600; color: white;">Upload</span>
                                </button>

                            </form>
                        @else
                            <form>
                                @csrf
                                <textarea name="" class="form-control" placeholder="Ketik apa yang anda pikirkan" id="floatingTextarea"
                                    rows="5" required>{{ old('deskripsi_video') }}</textarea>
                                <br>
                                <a href="#" class="btn btn-light" onclick="harusLogin()"
                                    style="background-color: white; border: 0.50px black solid; border-radius: 10px;">
                                    <span style="font-weight: 600; color: black;"><svg xmlns="http://www.w3.org/2000/svg"
                                            width="25" height="25" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                d="M12 18q2.075 0 3.538-1.462Q17 15.075 17 13q0-2.075-1.462-3.538Q14.075 8 12 8Q9.925 8 8.463 9.462Q7 10.925 7 13q0 2.075 1.463 3.538Q9.925 18 12 18Zm0-2q-1.25 0-2.125-.875T9 13q0-1.25.875-2.125T12 10q1.25 0 2.125.875T15 13q0 1.25-.875 2.125T12 16Zm6-6q.425 0 .712-.288Q19 9.425 19 9t-.288-.713Q18.425 8 18 8t-.712.287Q17 8.575 17 9t.288.712Q17.575 10 18 10ZM4 21q-.825 0-1.412-.587Q2 19.825 2 19V7q0-.825.588-1.412Q3.175 5 4 5h3.15L8.7 3.325q.15-.15.337-.238Q9.225 3 9.425 3h5.15q.2 0 .388.087q.187.088.337.238L16.85 5H20q.825 0 1.413.588Q22 6.175 22 7v12q0 .825-.587 1.413Q20.825 21 20 21Zm16-2V7h-4.05l-1.825-2h-4.25L8.05 7H4v12Zm-8-6Z" />
                                        </svg> Tambahkan Video</span>
                                </a>

                                <button type="button" href="#" class="btn " onclick="harusLogin()"
                                    style="float:right; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                    <span style="font-weight: 600; color: white;">Upload</span>
                                </button>
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
                <div id="video_pembelajaran">
                    @if ($video_pembelajaran->count() == 0)
                        <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                            style="margin-top: 7em">
                            <img src="{{ asset('images/data.png') }}" style="width: 15em">
                            <p><b>Tidak ada data</b></p>
                        </div>
                    @endif
                    @foreach ($video_pembelajaran as $urut => $item_video)
                        <div class="card mt-4 mb-5 item-video" style="max-width: 42rem;">
                            <!-- Data -->
                            <div class="card-header" style="background-color: white">
                                <p id="uuid" hidden>{{ $item_video->uuid }}</p>
                                <div class="d-flex mb-1">
                                    <a href="">
                                        @if ($item_video->user->foto)
                                            <img src="{{ asset('storage/' . $item_video->user->foto) }}"
                                                class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}"
                                                class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                        @endif
                                    </a>
                                    <div style="margin-top: 8px;">
                                        <a href="" class="text-dark ">
                                            <strong class="text-center">{{ $item_video->user->name }}</strong>
                                        </a>
                                        <a href="" class="text-muted d-block"
                                            style="float: right; margin-left: 390px">
                                            <small>
                                                {{ \Carbon\Carbon::parse($item_video->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                        </a>
                                    </div>
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
                                <video
                                    @if ($item_video->isPremium === 'yes') class="video-js vjs-theme-city feed"
                                @else
                                   class="video-js vjs-theme-city" @endif
                                    id="my-video" controls preload="auto" width="615" height="315"
                                    data-setup="{}">
                                    <source src="{{ asset('storage/' . $item_video->upload_video) }}" type="video/mp4" />
                                    <p class="vjs-no-js">
                                        To view this video please enable JavaScript, and consider upgrading to a
                                        web browser that
                                        <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                            video</a>
                                    </p>
                                </video>
                                <a href="#!">
                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                </a>
                            </div>
                            <!-- Media -->
                            <!-- Interactions -->
                            <div class="card-body">
                                <!-- Reactions -->
                                <div class="d-flex justify-content-between mb-2">

                                    <span class="d-flex flex-row" style="color: black;">
                                        <!-- like feed start -->
                                        @php
                                            // mendapatkan total like veed
                                            $countLikeVeed = \App\Models\like_veed::where('veed_id', $item_video->id)->count();
                                        @endphp
                                        @if (Auth::check())
                                            <div id="feed{{ $urut }}">
                                                @php
                                                    // mengecek apakah user sudah
                                                    $isLikeVeed = \App\Models\like_veed::query()
                                                        ->where('users_id', Auth::user()->id)
                                                        ->where('veed_id', $item_video->id)
                                                        ->count();
                                                @endphp
                                                @if ($isLikeVeed == 0)
                                                    <form id="formLikeVeed{{ $urut }}"
                                                        action="/like/veed/{{ Auth::user()->id }}/{{ $item_video->id }}">
                                                        <button class="text-dark me-1"
                                                            style="border: none; background-color:white;"
                                                            onclick="likeFeed({{ $urut }})">
                                                            <i id="likeB{{ $urut }}"
                                                                class="fa-regular fa-lg fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @elseif($isLikeVeed == 1)
                                                    <form id="formLikeVeed{{ $urut }}"
                                                        action="/like/veed/{{ Auth::user()->id }}/{{ $item_video->id }}">
                                                        <button class=" me-1"
                                                            style="border: none; background-color:white;"
                                                            onclick="likeFeed({{ $urut }})">
                                                            <i class="text-orange fa-solid fa-lg fa-thumbs-up"
                                                                id="likeB{{ $urut }}"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        @else
                                            <form>
                                                <button style="border: none; background-color:white;" id="buttonLikeVeed"
                                                    type="button" onclick="harusLogin()">
                                                    <i class="fa-regular fa-lg fa-thumbs-up"></i>
                                                </button>
                                            </form>
                                        @endif
                                        <span class="my-auto"
                                            id="countLikeFeed{{ $urut }}">{{ $countLikeVeed }}</span>
                                        <!-- like feed end -->
                                        <!-- komentar feed start -->
                                        <button type="button" class="ms-3 yuhu text-dark" {{-- onclick="openModel({{ $urut }})" --}}
                                            {{-- id="button-modal-komentar-feed{{ $urut }}" --}} data-toggle="collapse" role="button"
                                            aria-expanded="false" aria-controls="collapseExample"
                                            data-target="#commentCollapse{{ $urut }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                                viewBox="0 0 16 16">
                                                <path fill="currentColor"
                                                    d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                            </svg>
                                            <span class="my-auto">{{ $item_video->comment_veed->count() }}</span>
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
                                                                action="{{ route('komentar.veed', [Auth::user()->id, $item_video->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                <div class="d-flex mb-3">


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
                                                                    <input type="text"
                                                                        id="input_comment_feed{{ $urut }}"
                                                                        name="commentVeed" width="500px"
                                                                        class="form-control rounded-3 me-3"
                                                                        style="margin-top: 12px"
                                                                        placeholder="Masukkan komentar...">

                                                                    <button type="submit"
                                                                        id="buttonCommentVeed{{ $urut }}"
                                                                        onclick="komentar_feed({{ $urut }})"
                                                                        style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                        class="btn  btn-sm text-light"><b
                                                                            class="me-3 ms-3">Kirim</b></button>

                                                                </div>
                                                            </form>
                                                        @else
                                                            <form>
                                                                <div class="d-flex mb-3">
                                                                    <img src="{{ asset('images/default.jpg') }}"
                                                                        class="border rounded-circle me-5" alt="Avatar"
                                                                        style="height: 60px; margin-left: 20px;" />
                                                                    <input type="text" id="comment-veed1"
                                                                        name="commentVeed" width="500px"
                                                                        class="form-control rounded-3 me-3"
                                                                        style="margin-top: 12px"
                                                                        placeholder="Masukkan komentar...">
                                                                    <button type="button" onclick="harusLogin()"
                                                                        id="buttonCommentVeed" class="btn text-white"
                                                                        style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Kirim</button>
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
                                        <a class="ml-3 mr-1 my-auto text-dark" href="#" data-bs-toggle="modal"
                                            data-bs-target="#bagikan{{ $item_video->id }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25"
                                                viewBox="0 0 512 512">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="32"
                                                    d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                            </svg>
                                            <span class="my-auto">5</span>
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
                                                width: 280%;
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
                                            <form action="{{ route('share.feed', $item_video->id) }}" method="POST">
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


                                        <!-- modal Bagikan end -->
                                        <div class="d-flex" style="margin-left: 280px;">
                                            <!-- gift start -->
                                            <a type="button" class="text-dark me-2"><i
                                                    class="fa-solid fa-gift fa-lg ml-3 mr-1 my-auto"
                                                    data-bs-toggle="modal" data-bs-target="#gift"></i></a>

                                            <!-- modal Gift start -->
                                            <div class="modal" id="gift">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                Beri Donasi</h5>
                                                            <button type="button" class="close mr-2"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex ">
                                                                <div class="col-lg-3 my-1">
                                                                    <div class="card" id="card"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/kecil.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <div class="text-center">
                                                                                <a href="#"
                                                                                    class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Kecil</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 5.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 my-1">
                                                                    <div class="card " id="card"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/sedang.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <div class="text-center">
                                                                                <a href="#"
                                                                                    class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Sedang</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 10.000,00</p>
                                                                            <input type="radio" name="radio-group"
                                                                                id="radio2">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 my-1">
                                                                    <div class="card" id="card"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/besar.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <div class="text-center">
                                                                                <a href="#"
                                                                                    class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Besar</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 20.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-3 my-1">
                                                                    <button type="button" data-bs-toggle="modal"
                                                                        data-bs-target="#nilai" id="card"
                                                                        class="card" data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/lainnya.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <div class="mx-4 mt-2">
                                                                                <a href="#" data-bs-toggle="modal"
                                                                                    data-bs-target="#nilai"
                                                                                    class="card-title "
                                                                                    style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">Lainnya</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Masukkan Nilai</p>
                                                                        </div>
                                                                    </button>
                                                                </div>

                                                            </div>
                                                            <div class="d-flex mt-4 ml-3">
                                                                <input type="text" id="comment-veed1"
                                                                    name="commentVeed" width="500px"
                                                                    class="form-control rounded-3 me-3"
                                                                    style="margin-top: 12px; border-radius:100px;"
                                                                    placeholder="Tambahkan komentar...">

                                                                <button type="submit" id="buttonCommentVeed"
                                                                    style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                    class="btn  btn-sm text-light">
                                                                    <b class="me-3 ms-3">Kirim</b></button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- modal gift end -->
                                            <!-- gift end -->
                                            <script>
                                                const cardElements = document.querySelectorAll("#card");
                                                cardElements.forEach((cardElement) => {
                                                    cardElement.addEventListener("click", () => {
                                                        function toggleCardSelection(cardElement) {
                                                            const isSelected = cardElement.getAttribute("data-card-selected") === "true";

                                                            // Toggle status seleksi
                                                            cardElement.setAttribute("data-card-selected", isSelected ? "false" : "true");

                                                            // Ganti border outline sesuai status seleksi
                                                            if (isSelected) {
                                                                cardElement.style.border = "0.50px black solid";
                                                            } else {
                                                                cardElement.style.border =
                                                                    "2px solid orange";
                                                            }
                                                        }
                                                        toggleCardSelection(cardElement);

                                                    });
                                                });
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
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="reportModal"
                                                                            style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                            Laporkan
                                                                            komentar</h5>
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
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
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
                                                        onclick="toggleFavorite({{ $item_video->id }})"
                                                        class="ms-3 yuhu">
                                                        <i
                                                            class="text-orange fa-solid fa-xl fa-bookmark icons{{ $item_video->id }}"></i>
                                                    </button>
                                                @elseif(Auth::check() &&
                                                        !$item_video->favorite()->where('user_id_from', auth()->user()->id)->exists())
                                                    <button type="button" id="favorite-button{{ $item_video->id }}"
                                                        onclick="toggleFavorite({{ $item_video->id }})"
                                                        class="ms-3 yuhu ">
                                                        <i
                                                            class="fa-regular fa-xl fa-bookmark icons{{ $item_video->id }}"></i>
                                                    </button>
                                                @else
                                                    <button type="button" id="favorite-button{{ $item_video->id }}"
                                                        onclick="harusLogin()" class="ms-3 yuhu ">
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
                                        </div>
                                    </span>


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
                                                        style="margin-top: 12px; background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
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
                                            <div class="d-flex flex-row">
                                                <p>{{ $item_video->deskripsi_video }}</p>
                                            </div>
                                            <div class="collapse" style="margin-top: -2%;"
                                                id="commentCollapse{{ $urut }}">
                                                <div class="card-body">
                                                    <!-- form komentar feed start -->
                                                    <div class="container">
                                                        <div class="row">
                                                            @if (Auth::user())
                                                                <form id="formCommentVeed{{ $urut }}"
                                                                    action="{{ route('komentar.veed', [Auth::user()->id, $item_video->id]) }}"
                                                                    method="post">
                                                                    @csrf
                                                                    <div class="d-flex mb-3">
                                                                        <div class="me-3"
                                                                            style="margin-left: -40px; margin-top:-1.1%;">
                                                                            @if (Auth::user()->foto)
                                                                                <img src="{{ asset('storage' . Auth::user()->foto) }}"
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
                                                                        <div class="d-flex">
                                                                            <input type="text"
                                                                                id="input_comment_feed{{ $urut }}"
                                                                                name="commentVeed"
                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 400px; border-radius:30px;"
                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                placeholder="Masukkan komentar...">

                                                                            <button type="submit"
                                                                                id="buttonCommentVeed{{ $urut }}"
                                                                                onclick="komentar_feed({{ $urut }})"
                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @else
                                                                <form>
                                                                    <div class="d-flex mb-3">
                                                                        <div class="me-3"
                                                                            style="margin-left: -40px; margin-top:-1.1%;">
                                                                            <img src="{{ asset('images/default.jpg') }}"
                                                                                class="border rounded-circle"
                                                                                alt="Avatar" style="height: 40px;" />
                                                                        </div>
                                                                        <div class="d-flex">
                                                                            <input type="text" id="input_comment_feed"
                                                                                name="commentVeed"
                                                                                style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 400px; border-radius:30px;"
                                                                                class="form-control-sm border border-dark border-5 me-3"
                                                                                placeholder="Masukkan komentar...">
                                                                            <button type="submit" id="buttonCommentVeed"
                                                                                onclick="harusLogin()"
                                                                                style="background-color: #F7941E; border-radius:10px; height:32px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                                class="btn btn-sm mb-1 text-light"><b
                                                                                    class="me-3 ms-3">Kirim</b></button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            @endif
                                                            <!-- list komentar feed start -->
                                                            <div id="komen_feed{{ $urut }}">
                                                                @foreach ($item_video->comment_veed as $nomer => $item_comment)
                                                                    <div class="media row mb-2 d-flex" style="width: 131%; margin-left:-11%;">
                                                                        <div class="d-flex col-11">
                                                                            <img width="38px" height="38px"
                                                                                class="rounded-circle"
                                                                                src="{{ $item_comment->user->foto ? asset('storage/' . $item_comment->user->foto) : asset('images/default.jpg') }}"
                                                                                alt="{{ $item_comment->user->name }}">

                                                                            <p class="ms-2 mt-2">
                                                                                {{ $item_comment->user->name }}</p>
                                                                            <div
                                                                                class="d-flex flex-row-reverse ml-auto mt-2">
                                                                                <small>
                                                                                    {{ \Carbon\Carbon::parse($item_comment->created_at)->locale('id_ID')->diffForHumans() }}</small>
                                                                            </div>
                                                                        </div>
                                                                        <div class=" media-body ms-1 col-10 border-black rounded">
                                                                            <div class="d-flex">
                                                                                <p>{{ $item_comment->komentar }}</p>
                                                                            </div>
                                                                            <div class="d-flex flex-row " style="margin-top:-4%; width:112%; margin-left:-2%;">
                                                                                @php
                                                                                    // mendapatkan jumlah like tiap komentar
                                                                                    $countLike = \App\Models\like_comment_veed::query()
                                                                                        ->where('comment_veed_id', $item_comment->id)
                                                                                        ->where('veed_id', $item_video->id)
                                                                                        ->count();
                                                                                @endphp
                                                                                @if (Auth::user())
                                                                                    @php
                                                                                        // mengecek apakah user sudah like atau belum, kalau nilainya 1 maka sudah like kalau 0 maka belum like
                                                                                        $isLike = \App\Models\like_comment_veed::query()
                                                                                            ->where('users_id', Auth::user()->id)
                                                                                            ->where('comment_veed_id', $item_comment->id)
                                                                                            ->where('veed_id', $item_video->id)
                                                                                            ->count();
                                                                                    @endphp
                                                                                    @if ($isLike == 1)
                                                                                        <form
                                                                                            action="{{ route('like.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                                            id="formLikeCommentFeed{{ $item_comment->id }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            <button type="submit"
                                                                                                class="btn"
                                                                                                onclick="likeCommentFeed({{ $item_comment->id }})">
                                                                                                <i class="fa-solid fa-thumbs-up"
                                                                                                    id="iLikeComment{{ $item_comment->id }}"></i>
                                                                                            </button>

                                                                                        </form>
                                                                                    @elseif($isLike == 0)
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
                                                                                        alt="">
                                                                                    &nbsp; &nbsp;
                                                                                @endif
                                                                                <span class="my-auto"
                                                                                    id="countLikeComment{{ $item_comment->id }}">
                                                                                    {{ $countLike }}
                                                                                </span>
                                                                                <div class="m-2 mr-auto">
                                                                                    {{-- --}}
                                                                                    @if (Auth::user())
                                                                                        @if (Auth::user()->role != 'admin' && Auth::user()->id !== $item_comment->user->id)
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
                                                                                                                Postingan!
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
                                                                                                            action="{{ route('repeort.feed') }}"
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
                                                                                                                        class="ms-2 me-2">Laporkan</b></button>
                                                                                                            </div>
                                                                                                        </form>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        @elseif(Auth::user()->id == $item_comment->user->id)
                                                                                            {{-- Hapus Komentar --}}
                                                                                            <form method="POST"
                                                                                                action="{{ route('hapus.komentar.feed', $item_comment->id) }}"
                                                                                                id="delete-comment-form{{ $item_comment->id }}">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit"
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
                                                                                <a href="#"
                                                                                    class="text-secondary my-auto ml-2"
                                                                                    data-toggle="collapse"
                                                                                    data-target="#collapse{{ $item_comment->id }}"
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
                                                                                id="collapse{{ $item_comment->id }}">

                                                                                <div class="card card-body">
                                                                                    @if (Auth::check())
                                                                                        <form
                                                                                            id="formBalasKomentar{{ $item_comment->id }}"
                                                                                            action="{{ route('balas.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                                            method="POST">
                                                                                            @csrf
                                                                                            <div class="d-flex mb-3">
                                                                                                <input type="text"
                                                                                                    name="komentarBalasan"
                                                                                                    class="form-control me-3"
                                                                                                    id="inputKomentarBalasan{{ $item_comment->id }}"
                                                                                                    placeholder="Balas Komentar Dari"
                                                                                                    required>

                                                                                                <button type="submit"
                                                                                                    onclick="balas_komentar({{ $item_comment->id }})"
                                                                                                    class="btn text-white"
                                                                                                    style="height: 40px; margin-right: 20px;  background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Kirim</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    @else
                                                                                        <form action="">
                                                                                            @csrf
                                                                                            <div class="d-flex mb-3">
                                                                                                <input type="text"
                                                                                                    name="komentarBalasan"
                                                                                                    class="form-control me-3"
                                                                                                    id="komentarBalasan"
                                                                                                    placeholder="Balas Komentar Dari "
                                                                                                    required>
                                                                                                <button type="button"
                                                                                                    onclick="harusLogin()"
                                                                                                    class="btn text-white"
                                                                                                    style="height: 40px; margin-right: 20px;  background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Kirim</button>
                                                                                            </div>
                                                                                        </form>
                                                                                    @endif

                                                                                    <div
                                                                                        id="reply_comments{{ $item_comment->id }}">
                                                                                        @foreach ($item_comment->reply_comment_veed as $numeric => $reply_comment)
                                                                                            @php
                                                                                                if (Auth::check()) {
                                                                                                    // memeriksa apakah balasan komentar veed sudah di like atau belum
                                                                                                    $isLike2sd = App\Models\like_reply_comment_veed::query()
                                                                                                        ->where('users_id', Auth::user()->id)
                                                                                                        ->where('reply_comment_veed_id', $reply_comment->id)
                                                                                                        ->where('veed_id', $item_video->id)
                                                                                                        ->exists();
                                                                                                }
                                                                                                $countLike2sd = App\Models\like_reply_comment_veed::query()
                                                                                                    ->where('reply_comment_veed_id', $reply_comment->id)
                                                                                                    ->where('veed_id', $item_video->id)
                                                                                                    ->count();
                                                                                            @endphp
                                                                                            <div
                                                                                                class="rounded d-flex flex-row border-black ">
                                                                                                <div class="mt-1 me-3">
                                                                                                    <img width="50px"
                                                                                                        height="50px"
                                                                                                        class="rounded-circle"
                                                                                                        src="{{ $reply_comment->user->foto ? asset('storage/' . $reply_comment->user->foto) : asset('images/default.jpg') }}"
                                                                                                        alt="{{ $reply_comment->user->name }}">
                                                                                                </div>
                                                                                                <div
                                                                                                    class="media-body border-black rounded mb">
                                                                                                    <div
                                                                                                        class="d-flex mt-2">
                                                                                                        <span><strong>{{ $reply_comment->user->name }}</strong></span>

                                                                                                        <small
                                                                                                            style="margin-left: 310px;">{{ \Carbon\Carbon::parse($reply_comment->created_at)->locale('id_ID')->diffForHumans() }}</small>

                                                                                                    </div>
                                                                                                    <p>{{ $reply_comment->komentar }}
                                                                                                    </p>
                                                                                                    <div
                                                                                                        class="d-flex flex-row">
                                                                                                        @if (Auth::check())
                                                                                                            @if ($isLike2sd)
                                                                                                                <form
                                                                                                                    id="formLikeReplyComment{{ $reply_comment->id }}"
                                                                                                                    action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $item_video->id }}"
                                                                                                                    method="post">
                                                                                                                    @csrf
                                                                                                                    <button
                                                                                                                        onclick="likeReplyComment({{ $reply_comment->id }})"
                                                                                                                        type="submit"
                                                                                                                        class="btn ">
                                                                                                                        <i id="iconLikeReplyComment{{ $reply_comment->id }}"
                                                                                                                            class="fa-solid fa-thumbs-up"></i>
                                                                                                                    </button>
                                                                                                                </form>
                                                                                                            @else
                                                                                                                <form
                                                                                                                    id="formLikeReplyComment{{ $reply_comment->id }}"
                                                                                                                    action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $item_video->id }}"
                                                                                                                    method="post">
                                                                                                                    @csrf
                                                                                                                    <button
                                                                                                                        onclick="likeReplyComment({{ $reply_comment->id }})"
                                                                                                                        type="submit"
                                                                                                                        class="btn">
                                                                                                                        <i id="iconLikeReplyComment{{ $reply_comment->id }}"
                                                                                                                            class="fa-regular fa-thumbs-up"></i>
                                                                                                                    </button>
                                                                                                                </form>
                                                                                                            @endif
                                                                                                        @else
                                                                                                            <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                                                                onclick="harusLogin()"
                                                                                                                width="15px"
                                                                                                                height="40px"
                                                                                                                alt="">
                                                                                                            &nbsp; &nbsp;
                                                                                                        @endif
                                                                                                        <span
                                                                                                            id="countLikeReplyComment{{ $reply_comment->id }}"
                                                                                                            class="mx-1 my-auto">
                                                                                                            {{ $countLike2sd }}
                                                                                                        </span>
                                                                                                        {{-- --}}
                                                                                                        @if (Auth::user())
                                                                                                            @if (Auth::user()->role != 'admin' && Auth::user()->id !== $reply_comment->user->id)
                                                                                                                {{-- Laporkan Komentar --}}
                                                                                                                <button
                                                                                                                    type="button"
                                                                                                                    data-bs-toggle="modal"
                                                                                                                    data-bs-target="#ModalLapors{{ $reply_comment->id }}"
                                                                                                                    class="yuhu text-danger btn-sm rounded-5 "><i
                                                                                                                        class="fa-solid fa-triangle-exclamation me-2"></i>
                                                                                                                </button>
                                                                                                                <div class="modal fade"
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
                                                                                                                                    komentar
                                                                                                                                </h5>
                                                                                                                                <button
                                                                                                                                    type="button"
                                                                                                                                    class="close"
                                                                                                                                    data-bs-dismiss="modal"
                                                                                                                                    data-bs-target="ModalLapors{{ $reply_comment->id }}"
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
                                                                                                                        id="delete-reply-comment-button{{ $reply_comment->id }}"
                                                                                                                        hidden>Delete</button>
                                                                                                                    <button
                                                                                                                        type="button"
                                                                                                                        onclick="confirmation_delete_reply_comment({{ $reply_comment->id }})"
                                                                                                                        class="yuhu text-danger btn-sm rounded-5 ">
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
                                                                                                                    id="blookModal{{ $reply_comment->id }}"
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
                                                                                                                                    data-bs-target="blookModal{{ $reply_comment->id }}"
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
                                                                                            </div>
                                                                                        @endforeach
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
                                                    {{-- </div>
            </div> --}}
                                                    {{-- <div class="container">
                <div class="row">
                  
                </div>
            </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                </div>
                <!-- foreach video pembelajaran end -->
            </div>

            <!-- feed end -->

            <!-- diikuti start -->
            <div class="col-md-3">
                <div class="card" style="width: 15rem; margin-left: 25px;  border-radius: 10px">
                    <div class="card-header text-white text-center"
                        style="background-color: #F7941E;   border-top-right-radius: 10px;
            border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Diikuti
                    </div>
                    <div class="card-body" style="height: 500px;">
                        <div class="d-flex mb-3">
                            <a href="">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp"
                                    class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                            </a>
                            <div>
                                <div class="bg-light rounded-3 px-3 py-1">
                                    <a href="" class="text-dark mb-0">
                                        <strong>Resep baru siap di Masak</strong>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="card mt-5 mb-5" style="width: 15rem; margin-left: 25px;  border-radius: 10px">
                    <div class="card-header text-white text-center"
                        style="background-color: #F7941E;   border-top-right-radius: 10px;
            border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Belum Dibaca
                    </div>
                    <div class="card-body" style="height: 500px;">
                        <div class="d-flex mb-3">
                            <a href="">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp"
                                    class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                            </a>
                            <div>
                                <div class="bg-light rounded-3 px-3 py-1">
                                    <a href="" class="text-dark mb-0">
                                        <strong>Bunda Rahma</strong>
                                    </a>
                                    <a href="" class="text-muted d-block">
                                        <small>2 Pesan Baru</small>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- diikuti end -->

    </section>
    <button hidden id="buttonPremiums" type="button" style="position: absolute;  right: 70%; background-color:#F7941E; "
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
    <div class="modal fade" id="staticBackdrops" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
                                <a href="{{ route('penawaran.prem') }}" class="btn"
                                    style="font-family:poppins;border-radius:15px;background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color:#ffffff;">Lihat
                                    lebih lanjut</a>
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
    {{-- <script>
            // Ambil semua elemen checkbox dengan kelas select-checkbox
const checkboxes = document.querySelectorAll('.select-checkbox');

// Tambahkan event listener untuk setiap checkbox
checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            // Checkbox dicentang, lakukan aksi yang diinginkan
            // Contoh: console.log('Checkbox dicentang');
        } else {
            // Checkbox tidak dicentang, lakukan aksi yang diinginkan
            // Contoh: console.log('Checkbox tidak dicentang');
        }
    });
});

function toggleCheckbox(checkbox) {
        checkbox.checked = !checkbox.checked;
    }

        </script> --}}
    <script>
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
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
                                message: response.message,
                                position: 'topCenter',
                            });
                            $("#reply_comments" + num).html(response.update);
                            $("#inputKomentarBalasan" + num).val('');
                        }
                    },
                });
            });
        }
        // komentar feed ajax

        function komentar_feed(num) {
            $("#formCommentVeed" + num).submit(function(event) {
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
                            iziToast.destroy();
                            iziToast.show({
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
                                message: response.message,
                                position: 'topCenter',
                            });
                            $("#input_comment_feed" + num).val('');
                            $("#komen_feed" + num).html(response.update);
                        }
                    },
                    error: function error(xhr, status, errors) {
                        iziToast.destroy();
                        iziToast.show({
                            backgroundColor: '#F7941E',
                            title: '<i class="fa-regular fa-circle-question"></i>',
                            titleColor: 'white',
                            messageColor: 'white',
                            message: xhr.responseText,
                            position: 'topCenter',
                        });
                    }
                });
            });
        }

        // upload video feed ajax
        $("#formUploadVideo").submit(function(e) {
            e.preventDefault();
            let data = new FormData($(this)[0]);
            $.ajax({
                url: "{{ route('upload.video') }}",
                method: "POST",
                processData: false,
                contentType: false,
                data: data,
                success: function success(response) {
                    if (response.success) {
                        $("#inputVideo").val('');
                        $("#deskripsi_video").val('');
                        $("body").load('/veed');
                        document.getElementById("aVideo").textContent = "Tambahkan Video";
                        document.getElementById("video_pembelajaran").html(response.update);
                        iziToast.show({
                            backgroundColor: '#F7941E',
                            title: '<i class="fa-regular fa-circle-question"></i>',
                            titleColor: 'white',
                            messageColor: 'white',
                            message: response.message,
                            position: 'topCenter',
                        });
                    }
                },
                error: function error(xhr, status, errors) {
                    iziToast.show({
                        backgroundColor: '#F7941E',
                        title: '<i class="fa-regular fa-circle-question"></i>',
                        titleColor: 'white',
                        messageColor: 'white',
                        message: xhr.responseText,
                        position: 'topCenter',
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
                                $("#iconLikeReplyComment" + num).addClass("text-warning");
                                $("#countLikeReplyComment" + num).text(response.countLike);
                            } else {
                                $("#iconLikeReplyComment" + num).removeClass("fa-solid");
                                $("#iconLikeReplyComment" + num).addClass("fa-regular");
                                $("#iconLikeReplyComment" + num).removeClass("text-warning");
                                $("#countLikeReplyComment" + num).text(response.countLike);
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
                                $("#iLikeComment" + nums).addClass("text-warning");
                                $("#countLikeComment" + nums).text(response.count);
                            } else {
                                $("#iLikeComment" + nums).removeClass("fa-solid");
                                $("#iLikeComment" + nums).addClass("fa-regular");
                                $("#iLikeComment" + nums).removeClass("text-warning");
                                $("#countLikeComment" + nums).text(response.count);
                            }
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
                backgroundColor: '#F7941E',
                title: '<i class="fa-solid fa-exclamation"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda harus login terlebih dahulu!',
                position: 'topCenter',
                progressBarColor: 'white',
            });
        }

        function confirmation_delete_comment_feed(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'white',
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
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus feed anda?',
                position: 'topCenter',
                progressBarColor: 'white',
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
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'white',
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
                            button.classList.add('text-warning');
                            icon.setAttribute('class', 'fa-solid fa-thumbs-up');
                            document.getElementById("like-count-balasan" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-warning');
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
                if (video.currentTime > time) {
                    // jika sudah lebih dari 5 detik maka video di pause
                    video.pause();
                    // membuka modal penawaran premium
                    $("#buttonPremiums").click();
                }
            });
        });
    </script>
@endsection
