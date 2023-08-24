@extends('template.nav')
@section('content')
    <section class="container">
        <div class="row mt-5">
            <div class="col-lg-2 mt-3">
                <img src="{{ asset('storage/' . $show_resep->foto_resep) }}" alt="{{ $show_resep->foto_resep }}" width="197px"
                    height="187px" style="border-radius: 50%; border:none;" class="p-2">
            </div>
            <div class="col-lg-8 mt-4 ms-3">
                <div class="col-lg-4 mt-5 ml-3">
                    <h3 class="fw-bolder" style="font-weight: 600; word-warp: break-word;">{{ $show_resep->nama_resep }}</h3>
                    <span>Oleh {{ $show_resep->User->name }}</span>
                </div>
            </div>
            <div class="mt-4">
                <div class="col-lg-6 mt-5 ml-3">
                    <div style="position: absolute; right: -500px; top: -200px;" class="d-flex">
                        @if ($userLog === 2)
                            @if ($show_resep->User->id === Auth::user()->id)
                                <form action="/koki/resep/{{ $show_resep->id }}/edit" method="get">
                                    <button type="submit" class="btn btn-warning mr-2">Edit</button>
                                </form>
                                <form action="/koki/resep/{{ $show_resep->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin mau menghapus data resep')">Hapus</button>
                                </form>
                            @else
                            <form action="{{ route('Resep.like', $show_resep->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm text-light rounded-circle p-2 mr-2" style="background-color: #F7941E;"><svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 16 16"><g fill="none"><path d="M9.582 1.052c-.75-.209-1.337.35-1.546.872c-.24.6-.452 1.02-.705 1.523c-.157.312-.33.654-.534 1.09c-.474 1.01-.948 1.657-1.292 2.045a4.064 4.064 0 0 1-.405.403c-.047.039-.081.065-.102.08l-.016.012L3.11 8.182a2 2 0 0 0-.856 2.425l.52 1.385a2 2 0 0 0 1.273 1.204l5.356 1.682a2.5 2.5 0 0 0 3.148-1.68l1.364-4.646a2 2 0 0 0-1.919-2.564h-1.385c.066-.227.134-.479.195-.74c.131-.561.243-1.203.233-1.738c-.01-.497-.06-1.018-.264-1.462c-.22-.475-.603-.832-1.193-.996z" fill="currentColor"/></g></svg></button>
                            </form>
                            <form action="{{ route('favorite.store', $show_resep->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm text-light rounded-circle p-2 mr-2" style="background-color: #F7941E;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="21" viewBox="0 0 24 24"><path fill="currentColor" d="M5 21V5q0-.825.588-1.413T7 3h10q.825 0 1.413.588T19 5v16l-7-3l-7 3Z"/></svg></button>
                            </form>
                            <form action="/koki/resep/{{ $show_resep->id }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-warning btn-sm text-light rounded-circle p-2 mr-2" style="background-color: #F7941E;"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><path fill="currentColor" d="M6 21q-.425 0-.713-.288T5 20V5q0-.425.288-.713T6 4h7.175q.35 0 .625.225t.35.575L14.4 6H19q.425 0 .713.288T20 7v8q0 .425-.288.713T19 16h-5.175q-.35 0-.625-.225t-.35-.575L12.6 14H7v6q0 .425-.288.713T6 21Z"/></svg></button>
                            </form>
                            @endif
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="row mx-auto mb-5" style="margin-top: -20px;">
            <div class="col-lg-4">
                <h4 style="font-weight: 600; word-warp: break-word;">Durasi</h4>
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
                    <div class="row my-1">
                        <div class="col-7">
                            <span class="ms-3"
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                {{ $show_resep->lama_memasak }} {{$show_resep->lama_memasak2}}
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
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
                    <div class="row my-1">
                        <div class="col-7">
                            <span class="ms-3"
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
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
                    <div class="row my-1">
                        <div class="col-7">
                            <span class="ms-3"
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
                                    style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
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
                            <div class="d-flex flex-column">
                                <button type="button" style="background-color:#F7941E;width: 45px;height: 45px; position: absolute; left: 95px;"
                                class="btn btn-warning btn-sm text-light rounded-circle p-2 ml-2">
                                <span class="p-2">{{ $num += 1 }}</span>
                            </button>
                                <img src="{{ asset('storage/' . $item_langkah->foto_langkah) }}" class="mt-3"
                                    alt="{{ $item_langkah->foto_langkah }}" style="border-radius: 10px;border: 1px solid black;" width="160px"
                                    height="160px">
                            </div>
                            <div class="my-auto mx-4">
                                {{ $item_langkah->deskripsi_langkah }}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        click1.addEventListener('click', function() {
            border1.style.display = "block";
            border2.style.display = "none";
            border3.style.display = "none";
        });
        click2.addEventListener("click", function() {
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            border3.style.display = "none";
        });

        click3.addEventListener("click", function() {
            border3.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
        });
    </script>
@endsection
