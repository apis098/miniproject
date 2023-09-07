@extends('template.nav')
@section('content')
    <style>
        .btn-edit {
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-family: 'poppins';
            font-weight: 500;
            word-wrap: break-word;
            border: none;
            letter-spacing: 0.20px;
        }

        .btn-hapus {
            width: 100%;
            height: 100%;
            background-color: white;
            font-size: 17px;
            font-family: 'Poppins';
            font-weight: 500;
            letter-spacing: 0.20px;
            word-wrap: break-word;
            color: black;
            border-radius: 10px;
            margin-left: 10px;
            border: 0.50px black solid
        }
    </style>
    <section class="container">
        <div class="row mt-5">
            <div class="col-lg-2 mt-3">
                @if ($userLog == 2)
                    @if ($show_resep->User->id != Auth::user()->id)
                        <button type="submit" style="position: absolute;  right: -2px; background-color:#F7941E; "
                            class="btn btn-orange btn-sm text-light mt-2 me-2 rounded-circle p-2" data-toggle="modal"
                            data-target="#reportModal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0v9a5 5 0 0 1-7 0a5 5 0 0 0-7 0V5zm0 16v-7" />
                            </svg>
                        </button>
                    @endif
                @endif
                <img src="{{ asset('storage/' . $show_resep->foto_resep) }}" alt="{{ $show_resep->foto_resep }}"
                    width="197px" height="187px" style="border-radius: 50%; border:none;" class="p-2">
            </div>
            <div class="col-lg-8 mt-4 ms-3">
                <div class="col-lg-4 mt-5 ml-3">
                    <h3 class="fw-bolder" style="font-weight: 600; word-warp: break-word;">{{ $show_resep->nama_resep }}
                    </h3>
                    <span>Oleh {{ $show_resep->User->name }}</span>
                </div>
                <div class="ms-4">
                    @if ($show_resep->kategori_resep)
                        @foreach ($show_resep->kategori_resep()->get() as $nk)
                            <button type="button" class="btn-edit p-2 mx-1 mt-2">{{ $nk->nama_makanan }}</button>
                        @endforeach
                    @endif
                    @if ($show_resep->hari_resep)
                        @foreach ($show_resep->hari_resep()->get() as $hr)
                            <button type="button" class="btn-edit mx-1 p-2">{{ $hr->nama }}</button>
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="mt-4 ml-3">
                <div class="col-lg-6 mt-5 ml-5">
                    <div style="position: absolute; right: -500px; top: -200px;" class="d-flex">
                        @if ($userLog === 2)
                            @if ($show_resep->User->id === Auth::user()->id)
                                <form action="/koki/resep/{{ $show_resep->id }}/edit" method="get">
                                    <button type="submit" class="btn btn-edit ">Edit</button>
                                </form>
                                <form action="/koki/resep/{{ $show_resep->id }}" method="post" id="delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" onclick="DeleteData()" class="btn btn-hapus">Hapus</button>
                                </form>
                            @else
                                <form action="{{ route('Resep.like', $show_resep->id) }}" method="POST" class="like-form">
                                    @csrf
                                    @if (
                                        $userLogin &&
                                            !$show_resep->likes()->where('user_id', auth()->user()->id)->exists())
                                        <button type="submit"
                                            class="btn btn-light btn-sm text-light rounded-circle p-2 mr-2 like-button"
                                            style="border-color: #F7941E;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color: #F7941E" width="21"
                                                height="21" viewBox="0 0 16 16">
                                                <g fill="none">
                                                    <path
                                                        d="M9.582 1.052c-.75-.209-1.337.35-1.546.872c-.24.6-.452 1.02-.705 1.523c-.157.312-.33.654-.534 1.09c-.474 1.01-.948 1.657-1.292 2.045a4.064 4.064 0 0 1-.405.403c-.047.039-.081.065-.102.08l-.016.012L3.11 8.182a2 2 0 0 0-.856 2.425l.52 1.385a2 2 0 0 0 1.273 1.204l5.356 1.682a2.5 2.5 0 0 0 3.148-1.68l1.364-4.646a2 2 0 0 0-1.919-2.564h-1.385c.066-.227.134-.479.195-.74c.131-.561.243-1.203.233-1.738c-.01-.497-.06-1.018-.264-1.462c-.22-.475-.603-.832-1.193-.996z"
                                                        fill="currentColor" />
                                                </g>
                                            </svg>
                                        </button><br>
                                        <div class="d-flex justify-content-center">
                                            <small class="me-1 like-count"
                                                id="like-count-{{ $show_resep->id }}">{{ $show_resep->likes }}</small>
                                        </div>
                                    @else
                                        <button type="submit"
                                            class="btn btn-light btn-sm text-light rounded-circle p-2 mr-2 like-button"
                                            style="background-color: #F7941E;">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="color: #ffffff" width="21"
                                                height="21" viewBox="0 0 16 16">
                                                <g fill="none">
                                                    <path
                                                        d="M9.582 1.052c-.75-.209-1.337.35-1.546.872c-.24.6-.452 1.02-.705 1.523c-.157.312-.33.654-.534 1.09c-.474 1.01-.948 1.657-1.292 2.045a4.064 4.064 0 0 1-.405.403c-.047.039-.081.065-.102.08l-.016.012L3.11 8.182a2 2 0 0 0-.856 2.425l.52 1.385a2 2 0 0 0 1.273 1.204l5.356 1.682a2.5 2.5 0 0 0 3.148-1.68l1.364-4.646a2 2 0 0 0-1.919-2.564h-1.385c.066-.227.134-.479.195-.74c.131-.561.243-1.203.233-1.738c-.01-.497-.06-1.018-.264-1.462c-.22-.475-.603-.832-1.193-.996z"
                                                        fill="currentColor" />
                                                </g>
                                            </svg>
                                        </button><br>
                                        <div class="d-flex justify-content-center">
                                            <small class="me-1 like-count"
                                                id="like-count-{{ $show_resep->id }}">{{ $show_resep->likes }}</small>
                                        </div>
                                    @endif
                                </form>
                                {{-- favorite --}}
                                <form action="{{ route('favorite.store', $show_resep->id) }}"
                                    method="POST"class="favorite-form">
                                    @csrf
                                    @if (
                                        $userLogin &&
                                            !$show_resep->favorite()->where('user_id_from', auth()->user()->id)->exists())
                                        <button type="submit"
                                            class="btn btn-light btn-sm text-light rounded-circle p-2 mr-2 favorite-button"
                                            style="border-color: #F7941E;"><svg style="color: #F7941E"
                                                xmlns="http://www.w3.org/2000/svg" width="22" height="21"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5 21V5q0-.825.588-1.413T7 3h10q.825 0 1.413.588T19 5v16l-7-3l-7 3Z" />
                                            </svg>
                                        </button><br>
                                        <div class="d-flex justify-content-center">
                                            <small class="me-1 fav-count"
                                                id="fav-count-{{ $show_resep->id }}">{{ $show_resep->favorite_count }}</small>
                                        </div>
                                    @else
                                        <button type="submit"
                                            class="btn btn-light btn-sm text-light rounded-circle p-2 mr-2 favorite-button"
                                            style="background-color: #F7941E;"><svg style="color: #ffffff"
                                                xmlns="http://www.w3.org/2000/svg" width="22" height="21"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5 21V5q0-.825.588-1.413T7 3h10q.825 0 1.413.588T19 5v16l-7-3l-7 3Z" />
                                            </svg>
                                        </button><br>
                                        <div class="d-flex justify-content-center">
                                            <small class="me-1 fav-count"
                                                id="fav-count-{{ $show_resep->id }}">{{ $show_resep->favorite_count }}</small>
                                        </div>
                                    @endif
                                </form>
                                {{-- end favorite --}}
                                {{-- modal --}}
                                <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="reportModal"
                                                    style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                    Laporkan resep</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <form action="{{ route('report.resep', $show_resep->id) }}" method="POST">
                                                @csrf
                                                <div class="modal-body d-flex align-items-center">
                                                    <!-- Tambahkan kelas "align-items-center" -->
                                                    @if ($show_resep->foto_resep)
                                                        <img class="me-2"
                                                            src="{{ asset('storage/' . $show_resep->foto_resep) }}"
                                                            width="106px" height="104px" style="border-radius: 50%"
                                                            alt="">
                                                        <textarea class="form-control" style="border-radius: 15px" name="description" rows="5" placeholder="Alasan"></textarea>
                                                    @else
                                                        <img class="me-2" src="{{ asset('images/default.jpg') }}"
                                                            width="106px" height="104px" style="border-radius: 50%"
                                                            alt="">
                                                        <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                            placeholder="Alasan..."></textarea>
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
                                {{-- end Modal --}}
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto mb-5" style="margin-top: -20px;">
            <div class="col-lg-4">
                <h4 style="font-weight: 600; word-warp: break-word;">Durasi</h4>
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid;box-shadow:none;">
                    <div class="row my-1">
                        <div class="col-7 mt-1">
                            <span class=""
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                @if ($show_resep->lama_memasak > 60)
                                    {{ number_format($show_resep->lama_memasak / 60, 1) }} jam
                                @elseif($show_resep->lama_memasak <= 60)
                                    {{ $show_resep->lama_memasak }} menit
                                @endif
                            </span> <br>
                        </div>
                        <div class="col-5 d-flex my-auto flex-row-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15 1H9v2h6V1zm-4 13h2V8h-2v6zm8.03-6.61l1.42-1.42c-.43-.51-.9-.99-1.41-1.41l-1.42 1.42A8.962 8.962 0 0 0 12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9a8.994 8.994 0 0 0 7.03-14.61zM12 20c-3.87 0-7-3.13-7-7s3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 style="font-weight: 600; word-warp:break-word;">Pengeluaran</h4>
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid;box-shadow: none;">
                    <div class="row my-1">
                        <div class="col-7 mt-1">
                            <span class=""
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                RP{{ number_format($show_resep->pengeluaran_memasak, 2, ',', '.') }}
                            </span> <br>
                        </div>
                        <div class="col-5 d-flex my-auto flex-row-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M128 88a40 40 0 1 0 40 40a40 40 0 0 0-40-40Zm0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24Zm112-96H16a8 8 0 0 0-8 8v128a8 8 0 0 0 8 8h224a8 8 0 0 0 8-8V64a8 8 0 0 0-8-8Zm-46.35 128H62.35A56.78 56.78 0 0 0 24 145.65v-35.3A56.78 56.78 0 0 0 62.35 72h131.3A56.78 56.78 0 0 0 232 110.35v35.3A56.78 56.78 0 0 0 193.65 184ZM232 93.37A40.81 40.81 0 0 1 210.63 72H232ZM45.37 72A40.81 40.81 0 0 1 24 93.37V72ZM24 162.63A40.81 40.81 0 0 1 45.37 184H24ZM210.63 184A40.81 40.81 0 0 1 232 162.63V184Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <h4 style="font-weight: 600; word-warp: break-word;">Porsi</h4>
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid; box-shadow: none;">
                    <div class="row my-1">
                        <div class="col-7 mt-1">
                            <span class="]"
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                {{ $show_resep->porsi_orang }} Orang
                            </span> <br>
                        </div>
                        <div class="col-5 d-flex my-auto flex-row-reverse">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 32 32">
                                <g fill="currentColor">
                                    <path
                                        d="M6.82 20.575v3.834A12.475 12.475 0 0 0 16.5 29c4.324 0 8.136-2.196 10.38-5.533v-5.374C26.112 23.136 21.757 27 16.5 27c-4.354 0-8.089-2.65-9.68-6.425Zm18.21-10.199V8.654a3.32 3.32 0 0 1 .184-1.116A12.459 12.459 0 0 0 16.5 4a12.45 12.45 0 0 0-7.976 2.875l.005.061l.001.027v2.7A10.476 10.476 0 0 1 16.5 6c3.514 0 6.624 1.726 8.53 4.376Z" />
                                    <path
                                        d="M24.5 16.5a8 8 0 1 1-16 0a8 8 0 0 1 16 0Zm-8 7a7 7 0 1 0 0-14a7 7 0 0 0 0 14ZM29.99 7.94c0-.9-.73-1.63-1.63-1.63c-1.3 0-2.34 1.05-2.33 2.34v5.55c0 1.253.726 2.375 1.85 2.883V25.7c0 .52.42.94.94.94h.23c.52 0 .94-.42.94-.94V7.94ZM6.82 6.31a.68.68 0 0 0-.68.68v2.69c0 .2-.16.35-.35.35c-.2 0-.35-.16-.35-.35V7.02c0-.37-.29-.7-.66-.71c-.39-.01-.71.3-.71.68v2.69c0 .2-.16.35-.35.35c-.2 0-.35-.16-.35-.35V7.02c0-.37-.29-.7-.66-.71c-.39-.01-.71.3-.71.68v4.58c0 .902.437 1.707 1.109 2.209c.601.339.601 1.891.601 1.891v10.02c0 .52.42.94.94.94h.23c.52 0 .94-.42.94-.94V15.67s0-1.491.601-1.891A2.757 2.757 0 0 0 7.53 11.57V6.99a.72.72 0 0 0-.71-.68Z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
        </style>
        <div class="my-5">
            <ul class="nav mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 style="font-weight: 600; word-warp: break-word;">Deskripsi</h5>
                        <div id="border1" style="width: 100%; height: 100%; border: 1px #F7941E solid;"></div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 style="font-weight: 600; word-warp: break-word;">Bahan</h5>
                        <div id="b" style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="click4" class="nav-link mr-5" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-footer" type="button" role="tab" aria-controls="pills-footer"
                        aria-selected="false">
                        <h5 style="font-weight: 600; word-wrap:break-word;">Alat</h5>
                        <div id="border4" style="width: 90%; height:100%;border:1px #F7941E solid; display:none;"
                            class="mx-auto"></div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="click3" class="nav-link mr-5" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 style="font-weight: 600; word-warp:break-word;">Langkah - Langkah</h5>
                        <div id="border3" style="width: 90%; height: 100%; border: 1px #F7941E solid; display: none;"
                            class="mx-auto"></div>
                    </a>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    {{ $show_resep->deskripsi_resep }}
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row mt-5">
                        @foreach ($show_resep->bahan as $item_bahan)
                            <div class="col-lg-4">
                                <div class="card p-3"
                                    style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid;">
                                    <div class="row my-1">
                                        <div class="col-12 ">
                                            <span class="ms-3"
                                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                {{ $item_bahan->nama_bahan }}
                                            </span> <br>
                                            <p class="ms-3">{{ $item_bahan->takaran_bahan }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    @foreach ($show_resep->langkah as $num => $item_langkah)
                        <div class="card-body d-flex flex-row">
                            <div class="d-flex flex-column" style="position: relative;">
                                <img src="{{ asset('storage/' . $item_langkah->foto_langkah) }}" class="mt-3"
                                    alt="{{ $item_langkah->foto_langkah }}"
                                    style="border-radius: 10px; border: 1px solid black;" width="160px" height="160px">
                                <button type="button"
                                    style="background-color:#F7941E; width: 45px; height: 45px; position: absolute; top: 0; left: -30px;"
                                    class="btn btn-light btn-sm text-light rounded-circle p-2 ml-2">
                                    <span class="p-2 fw-bolder">{{ $num += 1 }}</span>
                                </button>
                            </div>
                            <div class="my-auto mx-4">
                                <p style="font-weight: 900;font-size:18px;">{{ $item_langkah->judul_langkah }}</p>
                                {{ $item_langkah->deskripsi_langkah }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-footer" role="tabpanel" aria-labelledby="pills-footer-tab"
                    tabindex="0">
                    <div class="row mt-5">
                        @foreach ($show_resep->alat as $num => $item_langkah)
                            <div class="col-lg-4">
                                <div class="card p-3"
                                    style="width: 100%; height: 100%; border-radius: 15px; border: 0.50px black solid">
                                    <div class="row my-1">
                                        <div class="col-12 ">
                                            <span class="ms-3" class=""
                                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word;">
                                                {{ $item_langkah->nama_alat }}
                                            </span> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .post-content {
            max-height: 100px;
            /* Atur tinggi maksimum konten yang ditampilkan */
            overflow: hidden;
            /* Sembunyikan teks yang berlebihan */
        }

        .read-more-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            /* Sembunyikan tombol secara default */
        }

        .post.open .post-content {
            max-height: none;
            /* Tampilkan seluruh teks saat tombol ditekan */
        }

        .post.open .read-more-button {
            /* Sembunyikan tombol saat teks ditampilkan secara penuh */
        }

        .card {

            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
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
    <section class="container mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-12">
                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5 class=""><b>Komentar
                            ({{ $show_resep->comment_recipes->count() }})
                        </b></h5>
                    <div class="col-10">
                @if (Auth::check())
                            <form method="POST" action="/komentar-resep/{{ Auth::user()->id }}/{{ $show_resep->id }}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" id="reply" name="komentar" width="500px" maxlength="255"
                                        {{ $userLog === 1 ? 'disabled' : '' }} class="form-control rounded-3 me-5"
                                        placeholder="{{ $userLog === 1 ? 'Tambah Komentar' : 'Tambah Komentar' }}">
                                    {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                                    <button type="submit" style="background-color: #F7941E; border-radius:10px;"
                                        class="btn btn-light btn-sm text-light ms-3"><b
                                            class="me-3 ms-3">Kirim</b></button>
                                </div>
                            </form>
                    </div>
                @else
                    <form action="{{route('login')}}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="reply" name="komentar" width="500px" maxlength="255"
                                class="form-control rounded-3 me-5"
                                placeholder="{{ $userLog === 1 ? 'Tambah Komentar' : 'Tambah Komentar' }}">
                            {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                            <button type="button" onclick="harusLogin()"
                                style="background-color: #F7941E; border-radius:10px;"
                                class="btn btn-light btn-sm text-light ms-3"><b class="me-3 ms-3">Kirim</b></button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>

        @foreach ($comment as $row)
        <div class="card p-3">
            <div class="d-flex justify-content-between">
                <div class="user d-flex flex-row">
                    @if ($row->foto)
                        <img src="{{ asset('storage/' . $row->user->foto) }}" width="30" height="30"
                            class="user-img rounded-circle mr-2">
                    @else
                        <img src="{{ asset('images/default.jpg') }}" width="30" height="30"
                            class="user-img rounded-circle mr-2">
                    @endif
                    @if (Auth::check() && Auth::user()->role == 'admin')
                        <span>
                            <div class="font-weight-semibold ms-1 me-2">
                                <small class="font-weight-bolder me-2">{{ $row->user->name }}</small>
                                <svg class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg" width="15"
                                    height="15" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                </svg>
                                @if ($comment_count > 0)
                                    <div class="text-black" style="font-size: 13px">
                                        <small>{{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                    </div>
                                @endif
                            </div>

                            <small class="font-weight text-break">{{ $row->comment }}</small>
                        </span>
                    @else
                        <div class="d-flex">
                            <span>
                                <div class="font-weight-semibold ms-1 me-2">
                                    <small class="font-weight-bolder me-2">{{ $row->user->name }}</small>
                                    @if ($row->count() > 0)
                                        <div class="text-black" style="font-size: 13px">
                                            <small>{{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <small>{{ $row->comment }}</small>
                                </div>

                            </span>
                        </div>
                    @endif
                </div>
            </div>
            <div class="action d-flex mt-2 align-items-center">
                <div class="reply px-7 me-2">
                    <small id="like-count-comment{{ $row->id }}"> {{ $row->likes }}</small>
                </div>
                <div class="icons align-items-center input-group">
                    <form action="{{ route('like.comment.recipe', $row->id) }}" method="POST"
                        id="like-form-comment">
                        @csrf
                        @if (
                            $userLogin &&
                                $row->like()->where('users_id', auth()->user()->id)->exists())
                            <button type="submit" class="yuhu me-2 text-warning btn-sm rounded-5"
                                id="like-button-comment">
                                <i class="fa-solid fa-thumbs-up"></i>
                            </button>
                        @else
                            <button type="submit" class="yuhu me-2 text-dark btn-sm rounded-5"
                                id="like-button-comment">
                                <i class="fa-regular fa-thumbs-up"></i>
                            </button>
                        @endif
                    </form>
                    @if (Auth::check() && auth()->user()->id != $row->users_id && auth()->user()->role != 'admin')
                        <button type="button" data-toggle="modal" data-target="#Modald{{ $row->id }}"
                            class="yuhu text-danger btn-sm rounded-5 "><i
                                class="fa-solid fa-triangle-exclamation me-2"></i>
                        </button>
                        {{-- modal --}}
                        <div class="modal fade" id="Modald{{ $row->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModal"
                                            style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                            Laporkan komentar</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="" method="POST">
                                    <form action="{{route('Report.comment.recipes',$row->id)}}\" method="POST">
                                        @csrf
                                        <div class="modal-body d-flex align-items-center">
                                            <!-- Tambahkan kelas "align-items-center" -->
                                            @if ($row->foto)
                                                <img class="me-2" src="{{ asset('storage/' . $row->foto) }}"
                                                    width="106px" height="104px" style="border-radius: 50%"
                                                    alt="">
                                                <textarea class="form-control" style="border-radius: 15px" name="description" rows="5" placeholder="Alasan"></textarea>
                                            @else
                                                <img class="me-2" src="{{ asset('images/default.jpg') }}"
                                                    width="106px" height="104px" style="border-radius: 50%"
                                                    alt="">
                                                <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                    placeholder="Alasan..."></textarea>
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
                        {{-- end Modal --}}
                    @elseif(Auth::check() && auth()->user()->role == 'admin')
                        <button type="button" data-toggle="modal" data-target="#blockModal{{ $row->id }}"
                            class="yuhu text-danger btn-sm rounded-5 "><svg xmlns="http://www.w3.org/2000/svg"
                                width="20" height="20" viewBox="0 0 24 24">
                                <path
                                    d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                    fill="currentColor" fill-rule="nonzero" />
                            </svg>
                        </button>
                    @elseif(Auth::check() && auth()->user()->id == $row->users_id)
                        <form method="POST" action="{{ route('delete.comment', $row->id) }}"
                            id="delete-comment-form{{ $row->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmation({{ $row->id }})"
                                class="yuhu text-danger btn-sm rounded-5 ">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    @elseif(empty(auth()->user()->id))
                        <button type="button" onclick="harusLogin()"
                            class="yuhu text-danger btn-sm rounded-5 "><i
                                class="fa-solid fa-triangle-exclamation me-2"></i>
                        </button>
                    @endif
                </div>
                <div class="d-flex justify-content-end input-group">
                    <a href="#" class="text-secondary " data-toggle="collapse"
                        data-target="#collapse{{ $row->id }}" aria-expanded="true" aria-controls="collapseOne">
                        <small>Balasan <i class="fa-solid fa-chevron-down"></i></small>
                    </a>
                </div>
            </div>
            {{-- collapse --}}
            <div class="collapse" id="collapse{{ $row->id }}">
                <div class="card card-body mx-3">
                    @if (Auth::check())
                        <form action="{{ route('balasan.komentar.resep', $row->id) }}" method="POST">
                            @csrf
                            <div class="input-group mb-3">
                                <input type="text" id="reply_comment" name="reply_comment" width="500px"
                                    class="form-control form-control-sm rounded-3 me-5"
                                    placeholder="Balas komentar dari {{ $row->user->name }}....">

                                <button type="submit" style="background-color: #F7941E; border-radius:10px;"
                                    class="btn btn-light btn-sm text-light ms-3"><b
                                        class="me-3 ms-3">Kirim</b></button>
                            </div>
                        </form>
                    @else
                        <form>
                            <div class="input-group mb-3">
                                <input type="text" id="reply_comment" name="reply_comment" width="500px"
                                    class="form-control form-control-sm rounded-3 me-5"
                                    placeholder="Balas komentar dari {{ $row->user->name }}....">

                                <button type="button" onclick="harusLogin()"
                                    style="background-color: #F7941E; border-radius:10px;"
                                    class="btn btn-light btn-sm text-light ms-3"><b
                                        class="me-3 ms-3">Kirim</b></button>
                            </div>
                        </form>
                    @endif
                    @foreach ($row->reply_comment_recipe as $item)
                        <div class="user d-flex flex-row mb-2">
                            @if ($item->user->foto)
                                <img src="{{ asset('storage/' . $item->user->foto) }}" width="30" height="30"
                                    class="user-img rounded-circle mr-2">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" width="30" height="30"
                                    class="user-img rounded-circle mr-2">
                            @endif
                            <span>
                                <small class="font-weight-semibold ms-1 me-2"><b>{{ $item->user->name }}</b></small>
                                @if ($item->count() > 0)
                                    <div class="text-black" style="font-size: 13px">
                                        <small
                                            class="float-start">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                    </div>
                                @endif
                                <br>
                                <div class="">
                                    <small class="font-weight">{{ $item->komentar }}</small>
                                </div>
                            </span>
                        </div>
                        {{-- llike --}}
                        <div class="action d-flex mt-2 align-items-center">

                            <div class="reply px-7 me-2">
                                <small id="like-count-reply-comment{{ $item->id }}">
                                    {{ $item->likes }}</small>
                            </div>

                            <div class="icons align-items-center input-group">

                                <form action="{{ route('likeReply.comment.recipe', $item->id) }}" method="POST"
                                    id="like-reply-comment-form">
                                    @csrf
                                    @if (
                                        $userLogin &&
                                            $item->like()->where('users_id', $userLogin->id)->exists())
                                        <button type="submit" class="yuhu me-2 text-warning btn-sm rounded-5"
                                            id="like-reply-comment-button">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="yuhu me-2 text-dark btn-sm rounded-5"
                                            id="like-reply-comment-button">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                        </button>
                                    @endif
                                </form>
                                @if (Auth::check() && $userLogin->id != $item->users_id && $userLogin->role != 'admin')
                                    <button type="button" data-toggle="modal"
                                        data-target="#modalR{{ $item->id }}"
                                        class="yuhu text-danger btn-sm rounded-5 "><i
                                            class="fa-solid fa-triangle-exclamation me-2"></i>
                                    </button>
                                    {{-- modal --}}
                                    <div class="modal fade" id="modalR{{ $item->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reportModal"
                                                        style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                        Laporkan komentar</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <form action="" method="POST">
                                                    @csrf
                                                    <div class="modal-body d-flex align-items-center">
                                                        <!-- Tambahkan kelas "align-items-center" -->
                                                        @if ($item->user->foto)
                                                            <img class="me-2"
                                                                src="{{ asset('storage/' . $item->user->foto) }}"
                                                                width="106px" height="104px"
                                                                style="border-radius: 50%" alt="">
                                                            <textarea class="form-control" style="border-radius: 15px" name="description" rows="5" placeholder="Alasan"></textarea>
                                                        @else
                                                            <img class="me-2"
                                                                src="{{ asset('images/default.jpg') }}"
                                                                width="106px" height="104px"
                                                                style="border-radius: 50%" alt="">
                                                            <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                placeholder="Alasan..."></textarea>
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
                                    {{-- end Modal --}}
                                @elseif(Auth::check() && auth()->user()->role == 'admin')
                                    <button type="button" data-toggle="modal"
                                        data-target="#blockModalReply{{ $item->id }}"
                                        class="yuhu text-danger btn-sm rounded-5 "><svg
                                            xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                fill="currentColor" fill-rule="nonzero" />
                                        </svg>
                                    </button>
                                @elseif(Auth::check() && auth()->user()->id == $item->users_id)
                                    <form method="POST" action="{{ route('delete.reply.comment', $row->id) }}"
                                        id="delete-reply-comment-form{{ $row->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmationReply({{ $row->id }})"
                                            class="yuhu text-danger btn-sm rounded-5 ">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
                                @elseif(empty(auth()->user()->id))
                                    <button type="button" onclick="harusLogin()"
                                        class="yuhu text-danger btn-sm rounded-5 "><i
                                            class="fa-solid fa-triangle-exclamation me-2"></i>
                                    </button>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    {{-- end like --}}
                </div>
            </div>
            {{-- end collapse --}}
        </div>
    @endforeach
    </section>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll("#like-reply-comment-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector("#like-reply-comment-button");
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
                            document.getElementById("like-count-reply-comment" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-warning');
                            button.classList.add('text-dark');
                            icon.setAttribute('class', 'fa-regular fa-thumbs-up');
                            document.getElementById("like-count-reply-comment" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function confirmationReply(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-reply-comment-form' + num).submit();
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

        function confirmation(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-comment-form' + num).submit();
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
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll("#like-form-comment");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector("#like-button-comment");
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
                            document.getElementById("like-count-comment" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-warning');
                            button.classList.add('text-dark');
                            icon.setAttribute('class', 'fa-regular fa-thumbs-up');
                            document.getElementById("like-count-comment" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function harusLogin() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Silahkan Login Terlebih Dahulu!',
                position: 'topCenter',
            });
        }

        function DeleteData() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus data ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-form').submit();
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
            const likeForms = document.querySelectorAll(".like-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector(".like-button");
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
                            // Reset button color and SVG here
                            button.style.backgroundColor = "#F7941E";
                            svg.style.color = "white";
                            document.getElementById("like-count-" + responseData.resep_id)
                                .textContent = responseData.likes;
                            // Modify SVG appearance if needed
                        } else {
                            // Update button color and SVG here
                            button.style.backgroundColor = "white";
                            svg.style.color = "#F7941E";
                            button.style.borderColor = "#F7941E";
                            document.getElementById("like-count-" + responseData.resep_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const favoriteForm = document.querySelectorAll(".favorite-form");

            favoriteForm.forEach(form1 => {
                form1.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button1 = form1.querySelector(
                        ".favorite-button"); // Menggunakan form1
                    const svg1 = button1.querySelector("svg"); // Menggunakan button1

                    const response = await fetch(form1.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData1 = await response.json();
                        if (responseData1.favorited) {
                            // Reset button color and SVG here
                            button1.style.backgroundColor = "#F7941E";
                            svg1.style.color = "white";
                            // Modify SVG appearance if needed
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        } else {
                            // Update button color and SVG here
                            button1.style.backgroundColor = "white";
                            svg1.style.color = "#F7941E";
                            button1.style.borderColor = "#F7941E";
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        const click4 = document.getElementById("click4");
        const border4 = document.getElementById("border4");
        const click409 = document.getElementById("click409");
        const border409 = document.getElementById("border409");
        click1.addEventListener('click', function() {
            border1.style.display = "block";
            border2.style.display = "none";
            border3.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "none";
        });
        click2.addEventListener("click", function() {
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            border3.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "none";
        });

        click3.addEventListener("click", function() {
            border3.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "none";
        });
        click4.addEventListener("click", function() {
            border3.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
            border4.style.display = "block";
            border409.style.display = "none";
        });
        click409.addEventListener("click", function() {
            border3.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "block";
        });
    </script>
@endsection
