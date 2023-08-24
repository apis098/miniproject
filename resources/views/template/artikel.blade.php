@extends('template.nav')
@section('content')
    <section class="container">
        <div class="row mt-5">
            <div class="col-lg-2 mt-3">
                <img src="{{ asset('storage/' . $show_resep->foto_resep) }}" alt="{{ $show_resep->foto_resep }}" width="197px"
                    height="187px" style="border-radius: 50%; border: 1px solid black;" class="p-2">
            </div>
            <div class="col-lg-4 mt-5 ml-3">
                <h3 style="font-weight: 600; word-warp: break-word;">{{ $show_resep->nama_resep }}</h3>
                <span>{{ $show_resep->User->name }}</span>
            </div>
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
        </div> <br>
        <div class="row mx-auto mb-5">
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
                            <i class="fa-solid fa-thumbs-up fa-2xl"></i>
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
                            <i class="fa-solid fa-thumbs-up fa-2xl"></i>
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
                            <i class="fa-solid fa-thumbs-up fa-2xl"></i>
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
                                <button type="button" style="background-color:#F7941E;width: 45px;height: 45px; position: absolute; left: 270px;"
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
