@extends('template.nav')
@section('content')
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
                        <div class="d-flex mb-3">
                            <a href="">
                                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp"
                                    class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                            </a>
                            <div>
                                <div class="bg-light rounded-3 px-3 py-1">
                                    <a href="" class="text-dark mb-0">
                                        <strong>Malcolm Dosh</strong>
                                    </a>
                                    <a href="" class="text-muted d-block">
                                        <small>20 Resep</small>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- rekomendasi chef end -->

            <!-- feed start -->
            <div class="col-md-6">

                <div class="card">
                    <div class="card-body">
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
                                    <div style="font-weight: 600; color: black;">Tambahkan Video</div>
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
                                    <span style="font-weight: 600; color: black;">Tambahkan Video</span>
                                </a>

                                <button type="button" href="#" class="btn " onclick="harusLogin()"
                                    style="float:right; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                    <span style="font-weight: 600; color: white;">Upload</span>
                                </button>
                            </form>
                        @endif
                    </div>
                </div>
                <!-- foreach video pembelajaran start -->
                @foreach ($video_pembelajaran as $urut => $item_video)
                    <div class="card mt-4 mb-5" style="max-width: 42rem;">
                        <!-- Data -->
                        <div class="card-header" style="background-color: white">

                            <div class="d-flex mb-1">
                                <a href="">
                                    @if ($item_video->user->foto)
                                        <img src="{{ asset('storage/' . $item_vide->user->foto) }}"
                                            class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" class="border rounded-circle me-2"
                                            alt="Avatar" style="height: 40px" />
                                    @endif
                                </a>
                                <div style="margin-top: 8px;">
                                    <a href="" class="text-dark ">
                                        <strong class="text-center">{{ $item_video->user->name }}</strong>
                                    </a>
                                    <a href="" class="text-muted d-block" style="float: right; margin-left: 390px">
                                        <small>{{ $item_video->created_at->diffForHumans() }}</small>
                                    </a>
                                </div>
                            </div>

                        </div>

                        <!-- Media -->
                        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
                            <video width="100%" height="100%" autoplay>
                                <source src="{{ asset('storage/' . $item_video->upload_video) }}" type="video/mp4">
                                Your browser does not support the video tag.
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
                                <div>
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
                                                        <button style="border: none; background-color:white;"
                                                            onclick="likeFeed({{ $urut }})">
                                                            <i id="likeB{{ $urut }}"
                                                                class="fa-regular fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @elseif($isLikeVeed == 1)
                                                    <form id="formLikeVeed{{ $urut }}"
                                                        action="/like/veed/{{ Auth::user()->id }}/{{ $item_video->id }}">
                                                        <button style="border: none; background-color:white;"
                                                            onclick="likeFeed({{ $urut }})">
                                                            <i class="fa-solid fa-thumbs-up"
                                                                id="likeB{{ $urut }}"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <form>
                                                    <button style="border: none; background-color:white;"
                                                        id="buttonLikeVeed" type="button" onclick="harusLogin()">
                                                        <i class="fa-regular fa-thumbs-up"></i>
                                                    </button>
                                                </form>
                                        @endif
                                </div>
                                <span class="my-auto" id="countLikeFeed{{ $urut }}">{{ $countLikeVeed }}</span>
                                <!-- like feed end -->
                                <!-- komentar feed start -->
                                <i class="fa-regular fa-comment ml-3 mr-1 my-auto" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal{{ $urut }}"></i>
                                <span class="my-auto">{{ $item_video->comment_veed->count() }}</span>
                                <!-- modal komentar feed -->
                                <div class="modal" id="exampleModal{{ $urut }}" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
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
                                                    <form id="formCommentVeed"
                                                        action="{{ route('komentar.veed', [Auth::user()->id, $item_video->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <div class="d-flex mb-3">


                                                            @if (Auth::user()->foto)
                                                                <img src="{{ asset('storage' . Auth::user()->foto) }}"
                                                                    class="border rounded-circle me-5" alt="Avatar"
                                                                    style="height: 60px; margin-left: 20px;" />
                                                            @else
                                                                <img src="{{ asset('images/default.jpg') }}"
                                                                    class="border rounded-circle me-5" alt="Avatar"
                                                                    style="height: 60px; margin-left: 20px;" />
                                                            @endif
                                                            <input type="text" id="comment-veed1" name="commentVeed"
                                                                width="500px" class="form-control rounded-3 me-3"
                                                                style="margin-top: 12px"
                                                                placeholder="Masukkan komentar...">

                                                            <button type="submit" id="buttonCommentVeed"
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
                                                            <input type="text" id="comment-veed1" name="commentVeed"
                                                                width="500px" class="form-control rounded-3 me-3"
                                                                style="margin-top: 12px"
                                                                placeholder="Masukkan komentar...">
                                                            <button type="button" onclick="harusLogin()"
                                                                id="buttonCommentVeed" class="btn text-white"
                                                                style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Kirim</button>
                                                        </div>
                                                    </form>
                                                @endif
                                                <!-- form komentar feed end -->
                                                <!-- list komentar feed start -->
                                                @php
                                                    $komen_veed = \App\Models\comment_veed::query()
                                                        ->where('veed_id', $item_video->id)
                                                        ->get();
                                                @endphp
                                                @foreach ($komen_veed as $nomer => $item_comment)
                                                    <div class="media row mb-2 mx-auto d-flex mt-5">
                                                        <div class="col-1" style="margin-left: 20px;">
                                                            <img width="50px" height="50px" class="rounded-circle"
                                                                src="{{ $item_comment->user->foto ? asset('storage/' . $item_comment->user->foto) : asset('images/default.jpg') }}"
                                                                alt="{{ $item_comment->user->name }}">
                                                        </div>
                                                        <div class=" media-body ml-3 col-10 border-black rounded">
                                                            <div class="d-flex">
                                                                <h5 class="">
                                                                    <strong>{{ $item_comment->user->name }}</strong>
                                                                </h5>
                                                                <small class=""
                                                                    style="margin-left: 440px;">{{ $item_comment->created_at->diffForHumans() }}</small>
                                                            </div>
                                                            <p>{{ $item_comment->komentar }}</p>

                                                            <div class="d-flex flex-row">
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
                                                                            id="formLikeCommentFeed{{ $nomer }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn"
                                                                                onclick="likeCFeed({{ $nomer }})">
                                                                                <i class="fa-solid fa-thumbs-up"></i>
                                                                            </button>

                                                                        </form>
                                                                    @elseif($isLike == 0)
                                                                        <form
                                                                            action="{{ route('like.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                            id="formLikeCommentFeed{{ $nomer }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <button type="submit" class="btn"
                                                                                onclick="likeCFeed({{ $nomer }})">
                                                                                <i class="fa-regular fa-thumbs-up"></i>
                                                                            </button>
                                                                        </form>
                                                                    @endif
                                                                @else
                                                                    <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                        onclick="harusLogin()" width="15px"
                                                                        height="40px" alt="">
                                                                    &nbsp; &nbsp;
                                                                @endif
                                                                <span class=" my-auto">
                                                                    {{ $countLike }}
                                                                </span>

                                                                <a href="#" class="text-secondary my-auto ml-2"
                                                                    data-toggle="collapse"
                                                                    data-target="#collapse{{ $item_comment->id }}"
                                                                    aria-expanded="true" aria-controls="collapseOne">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="22"
                                                                        height="22" viewBox="0 0 24 24">
                                                                        <path fill="currentColor"
                                                                            d="M11 7.05V4a1 1 0 0 0-1-1a1 1 0 0 0-.7.29l-7 7a1 1 0 0 0 0 1.42l7 7A1 1 0 0 0 11 18v-3.1h.85a10.89 10.89 0 0 1 8.36 3.72a1 1 0 0 0 1.11.35A1 1 0 0 0 22 18c0-9.12-8.08-10.68-11-10.95zm.85 5.83a14.74 14.74 0 0 0-2 .13A1 1 0 0 0 9 14v1.59L4.42 11L9 6.41V8a1 1 0 0 0 1 1c.91 0 8.11.2 9.67 6.43a13.07 13.07 0 0 0-7.82-2.55z" />
                                                                    </svg>
                                                                    &nbsp; <small>Balas</small>
                                                                </a>
                                                            </div>
                                                            <!-- Komentar Balasan Collapse Start -->
                                                            <div class="collapse" id="collapse{{ $item_comment->id }}">

                                                                <div class="card card-body">
                                                                    @if (Auth::check())
                                                                        <form id="formBalasKomentar{{ $nomer++ }}"
                                                                            action="{{ route('balas.komentar.veed', [Auth::user()->id, $item_comment->id, $item_video->id]) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            <div class="d-flex mb-3">
                                                                                <input type="text"
                                                                                    name="komentarBalasan"
                                                                                    class="form-control me-3"
                                                                                    id="komentarBalasan"
                                                                                    placeholder="Balas Komentar Dari"
                                                                                    required>

                                                                                <button type="submit"
                                                                                    onclick="balas_komentar({{ $nomer++ }})"
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
                                                                    @php
                                                                        // mengambil data balasan komentar veed
                                                                        $reply_comments = App\Models\reply_comment_veed::query()
                                                                            ->where('comment_id', $item_comment->id)
                                                                            ->get();
                                                                        
                                                                    @endphp
                                                                    @foreach ($reply_comments as $numeric => $reply_comment)
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
                                                                        <div class="rounded  border-black row">
                                                                            <div class="col-1 mt-2">
                                                                                <img width="50px" height="50px"
                                                                                    class="rounded-circle"
                                                                                    src="{{ $reply_comment->user->foto ? asset('storage/' . $reply_comment->user->foto) : asset('images/default.jpg') }}"
                                                                                    alt="{{ $reply_comment->user->name }}">
                                                                            </div>
                                                                            <div class=" media-body col-10 border-black rounded"
                                                                                style="margin-left: 20px; margin-top: -50px;">
                                                                                <div class="d-flex "
                                                                                    style="margin-top: 60px; ">
                                                                                    <span><strong>{{ $reply_comment->user->name }}</strong></span>

                                                                                    <small
                                                                                        style="margin-left: 310px;">{{ $reply_comment->created_at->diffForHumans() }}</small>

                                                                                </div>
                                                                                <p>{{ $reply_comment->komentar }}
                                                                                </p>
                                                                                <div class="d-flex flex-row">
                                                                                    @if (Auth::check())
                                                                                        @if ($isLike2sd)
                                                                                            <form
                                                                                                id="formLikeReplyComment{{ $numeric }}"
                                                                                                action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $item_video->id }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                <button
                                                                                                    onclick="likeReplyComment({{ $numeric }})"
                                                                                                    type="submit"
                                                                                                    class="btn ">
                                                                                                    <i
                                                                                                        class="fa-solid fa-thumbs-up"></i>
                                                                                                </button>
                                                                                            </form>
                                                                                        @else
                                                                                            <form
                                                                                                id="formLikeReplyComment{{ $numeric }}"
                                                                                                action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $item_video->id }}"
                                                                                                method="post">
                                                                                                @csrf
                                                                                                <button
                                                                                                    onclick="likeReplyComment({{ $numeric }})"
                                                                                                    type="submit"
                                                                                                    class="btn ">
                                                                                                    <i
                                                                                                        class="fa-regular fa-thumbs-up"></i>
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
                                                                                    <span class="mx-1 my-auto">
                                                                                        {{ $countLike2sd }}
                                                                                    </span>
                                                                                    <!--
                                                                                                                <a href=""
                                                                                                                    type="button"
                                                                                                                    class="btn"><svg
                                                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                                                        width="22"
                                                                                                                        height="22"
                                                                                                                        viewBox="0 0 24 24">
                                                                                                                        <path
                                                                                                                            fill="currentColor"
                                                                                                                            d="M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                                                                                                    </svg></a>-->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <!-- list komentar feed end -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- komentar feed end -->
                                <!-- reply feed start -->
                                <i class="fa-solid fa-reply fa-flip-horizontal ml-3 mr-1 my-auto"></i>
                                <span class="my-auto">0</span>
                                <!-- reply feed end -->
                                <!-- gift start -->
                                <i class="fa-solid fa-gift ml-3 mr-1 my-auto"></i>
                                <!-- gift end -->
                                </span>
                            </div>

                        </div>

                        <div class="d-flex mb-3">

                            <div>
                                <div class="rounded-3 py-1">
                                    <a href="" class="text-dark mb-0">
                                        <strong>{{ $item_video->deskripsi_video }}.</strong>
                                    </a>

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
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                                alt="Avatar" style="height: 40px" />
                        </a>
                        <div>
                            <div class="bg-light rounded-3 px-3 py-1">
                                <a href="" class="text-dark mb-0">
                                    <strong>Resep baru siap di jiltod</strong>
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
                            <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                                alt="Avatar" style="height: 40px" />
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

    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

    <script>
        // komentar reply feed ajax
        function balas_komentar(num) {
            $("#formBalasKomentar" + num).off('submit');
            $("#formBalasKomentar").submit(function(e) {
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
                });
            });
        }
        // komentar feed ajax
        $("#buttonCommentVeed").click(function(event) {
            event.preventDefault();
            let route = $("#formCommentVeed").attr("action");
            let data = new FormData($("#formCommentVeed")[0]);
            $.ajax({
                url: route,
                method: "POST",
                data: data,
                processData: false,
                contentType: false,
                success: function success(response) {
                    if (response.success) {
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
                            iziToast.show({
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    }
                });
            });
        }
        // like comment feed ajax
        function likeCFeed(nums) {
            $("#formLikeCommentFeed" + nums).off('submit');
            $("#formLikeCommentFeed" + nums).submit(function(event) {
                event.preventDefault();
                let rute = $(this).attr("action");
                $.ajax({
                    url: rute,
                    method: "POST",
                    headers: {
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        if (response.success) {
                            iziToast.show({
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
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
                            iziToast.show({
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
                                message: response.message,
                                position: 'topCenter',
                            });
                            if (response.like) {
                                $("#likeB" + num).removeClass("fa-reguler");
                                $("#likeB" + num).addClass("fa-solid");
                                $("#countLikeFeed" + num).html(response.count);
                            } else {
                                $("#likeB" + num).removeClass("fa-solid");
                                $("#likeB" + num).addClass("fa-reguler");
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
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda harus login terlebih dahulu!',
                position: 'topCenter',
            });
        }
    </script>
@endsection
