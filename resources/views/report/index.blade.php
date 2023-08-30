@extends('layouts.navbar')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
        .table-rounded thead th:first-child {
            border-top-left-radius: 10px;
        }

        .table-rounded thead th:last-child {
            border-top-right-radius: 10px;
        }

        .table-rounded tbody tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        .table-rounded tbody tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        .btn-group-vertical {
            display: flex;
            flex-direction: column;
        }

        .zoom-effects:hover {
            transform: scale(0.97);
        }

        .intro-1 {
            font-size: 20px
        }

        .close {
            color: #fff
        }

        .close:hover {
            color: #fff
        }

        .intro-2 {
            font-size: 13px
        }

        .ah {
            background-color: #fff;
        }

        .table-custom {
            text-align: center;
        }

        .table-custom {
            text-align: center;
            border-collapse: separate;
            border-spacing: 0px 15px;
        }

        .table-custom td {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 195px;
            border-top: solid black;
            border-bottom: solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        .table-custom th {
            padding: 10px;
            width: 195px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom thead {
            margin-bottom: 50px;
        }

        .table-custom td:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom td:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .table-custom th:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom th:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        tr {
            padding: 30px;
        }

        .yuhu {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
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

    <div class=" d-flex justify-content-center ms-3">
        <div class="my-5 ml-5" style="margin-right: -15%;">
            <ul class="nav mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Laporan Resep</h5>
                        <div id="border1" class="ms-4" style="width: 70%; height: 100%; border: 1px #F7941E solid;"></div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Laporan keluhan</h5>
                        <div id="b" class="ms-3" style="width: 78%; height: 80%; border: 1px #F7941E solid;" hidden>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="button-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Laporan komentar </h5>
                        <div id="f" class="ms-3" style="width: 80%; height: 100%; border: 1px #F7941E solid;" hidden></div>
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="a-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-user" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Laporan profile</h5>
                        <div id="pp" class="ms-3" style="width: 80%; height: 100%; display:none; border: 1px #F7941E solid;"></div>
                    </button>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    {{-- start tab 1 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            @if($row->resep_id != null)
                                <tr class="mt-5">
                                    <td style="border-left:solid black;" class="mt">{{$row->userSender->name}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->user->jumlah_pelanggaran}} Kali</td>
                                    <td style="border-right: solid black;">
                                        <button type="button" data-toggle="modal" data-target="#modalResep{{ $row->id }}" class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            @if($row->complaint_id !=  null)
                                <tr class="mt-5">
                                    <td style="border-left:solid black;" class="mt">Dummy</td>
                                    <td>Koki</td>
                                    <td>Berkata kasar</td>
                                    <td>1 Kali</td>
                                    <button type="button" data-toggle="modal" data-target="#replyModal{{ $row->id }}" class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            @if($row->reply_id != null)
                                <tr class="mt-5">
                                    <td style="border-left:solid black;" class="mt">{{$row->userSender->name}}</td>
                                    <td>{{$row->user->name}}</td>
                                    <td>{{$row->description}}</td>
                                    <td>{{$row->user->jumlah_pelanggaran}} Kali</td>
                                    <td  style="border-right:solid black;">
                                        <button type="button" data-toggle="modal" data-target="#replyModal{{ $row->id }}" class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                    </td>
                                </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-user" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $row)
                            @if($row->profile_id != null)
                            <tr class="mt-5">
                                <td style="border-left:solid black;" class="mt">{{$row->userSender->name}}</td>
                                <td>{{$row->user->name}}</td>
                                <td>{{$row->description}}</td>
                                <td>{{$row->user->jumlah_pelanggaran}} Kali</td>
                                <td style="border-right: solid black;">
                                    <button type="button" data-toggle="modal" data-target="#replyModal{{ $row->id }}" class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        const underline = document.getElementById("f");
        const buttonTab = document.getElementById("button-tab");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");
        buttonTab.addEventListener("click", function() {
            tab3();
        });
        function tab3() {
            event.preventDefault();
            border1.style.display = "none";
            border2.style.display = "none";
            underline.style.display = "block";
            underline.removeAttribute('hidden');
            o.style.display = "none";
        }
        a_tab.addEventListener('click',function() {
            event.preventDefault();
            o.style.display = "block";
            underline.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
        });
        click1.addEventListener('click', function() {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            underline.style.display = "none";
            o.style.display = "none";
        });
        click2.addEventListener("click", function() {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            underline.style.display = "none";
            o.style.display = "none";
        });
    </script>
    </div>
    {{-- Modal resep --}}
    @foreach($data as $row)
    @if($row->id != null)
    <div class="modal fade bd-example-modal-xl rounded-5" id="modalResep{{$row->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bolder">Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                </button>
            </div>
            <div class="modal-body">
                <section class="container">
                    <div class="row mt-5">
                        <div class="col-lg-2 mt-3">
                            @if ($userLog == 2)
                                @if ($show_resep->User->id != Auth::user()->id)
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
                            @if ($show_resep->kategori_resep)
                                @foreach ($show_resep->kategori_resep()->get() as $nk)
                                    <button type="button" class="btn-edit p-2 ml-4 mr-2 mt-2">{{ $nk->nama_makanan }}</button>
                                @endforeach
                            @endif
                            @if ($show_resep->hari_resep)
                                @foreach ($show_resep->hari_resep()->get() as $hr)
                                    <button type="button" class="btn-edit p-2">{{ $hr->nama }}</button>
                                @endforeach
                            @endif
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
                                    <div class="col-7 mt-1">
                                        <span class=""
                                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                            @if ($show_resep->lama_memasak > 60)
                                                {{ $show_resep->lama_memasak / 60 }} jam
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
                            <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
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
                            <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
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
                                <a id="deskripsi" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-desc" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">
                                    <h5 class="text-dark" style="font-weight: 600; word-warp: break-word;">Deskripsi</h5>
                                    <div id="borderDeskripsi" style="width: 100%; height: 100%; border: 1px #F7941E solid;"></div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="bahan" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-bahan" type="button" role="tab" aria-controls="pills-profile"
                                    aria-selected="false">
                                    <h5 class="text-dark" style="font-weight: 600; word-warp: break-word;">Bahan</h5>
                                    <div id="borderBahan" style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="alat" class="nav-link mr-5" id="pills-footer-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-alat" type="button" role="tab" aria-controls="pills-footer"
                                    aria-selected="false">
                                    <h5 class="text-dark" style="font-weight: 600; word-wrap:break-word;">Alat - Alat</h5>
                                    <div id="borderAlat" style="width: 90%; height:100%;border:1px #F7941E solid; display:none;"
                                        class="mx-auto"></div>
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a id="langkah" class="nav-link mr-5" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-langkah" type="button" role="tab" aria-controls="pills-contact"
                                    aria-selected="false">
                                    <h5 class="text-dark" style="font-weight: 600; word-warp:break-word;">Langkah - Langkah</h5>
                                    <div id="borderLangkah" style="width: 90%; height: 100%; border: 1px #F7941E solid; display: none;"
                                        class="mx-auto"></div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-desc" role="tabpanel" aria-labelledby="pills-home-tab"
                                tabindex="0">
                                {{ $show_resep->deskripsi_resep }}
                            </div>
                            <div class="tab-pane fade" id="pills-bahan" role="tabpanel" aria-labelledby="pills-profile-tab"
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
                            <div class="tab-pane fade" id="pills-langkah" role="tabpanel" aria-labelledby="pills-contact-tab"
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
                            <div class="tab-pane fade" id="pills-alat" role="tabpanel" aria-labelledby="pills-footer-tab"
                                tabindex="0">
                                <div class="row mt-5">
                                    @foreach ($show_resep->alat as $num => $item_langkah)
                                        <div class="col-lg-4">
                                            <div class="card p-3"
                                                style="width: 100%; height: 100%; border-radius: 15px; border: 0.50px black solid">
                                                <div class="row my-1">
                                                    <div class="col-12 ">
                                                        <span class="ms-3" class=""
                                                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>
      @endif
      @endforeach
    {{-- end modal --}}



    {{-- <div class=" mb-2 mt-1 mb-md-1">
        <label for="name" class="mb-1 ms-2 text-secondary">Tambah Data:</label>
        <div>
            <form method="POST" action="" class="d-flex align-items-center">
                @csrf
                <input type="text" class="form-control ms-1 mb-1 me-2 rounded-3" id="name" name="name"
                    aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
                <input type="hidden" value="-" class="form-control" id="description" name="description"
                    placeholder="Masukkan Deskripsi...">
                <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center"
                    data-mdb-ripple-color="dark">
                    <i class="fa-regular fa-floppy-disk me-1"></i>
                    Submit
                </button>
            </form>
        </div>
    </div> --}}
    {{-- <table class="table table-striped table-rounded mx-auto mt-4" id="table">
        <thead class="bg-secondary text-light">
            <tr>

                <th>Pelapor:</th>
                <th>User</th>
                <th>Subjek</th>
                <th>Repetisi</th>
                <th>Konfirmasi</th>
            </tr>
        </thead>
        <tbody class="table-active border-light">
            @foreach ($data as $row)
                <tr>

                    <td>{{$row->userSender->name}}</td>
                    <td>{{$row->user->name}}</td>
                    @if ($row->reply_id)
                    <td>{{$row->replies->reply}}</td>
                    @elseif($row->profile_id)
                        @if ($row->user->foto)
                            <td>
                                <img src="{{asset('storage/'.$row->user->foto)}}" class="img-thumbnail" width="106px" height="104px" alt="halo">
                            </td>
                        @else
                            <td>
                                <img src="{{asset('images/default.jpg')}}" class="img-thumbnail" width="106px" height="104px" alt="halo">
                            </td>
                        @endif
                    @endif
                    <td>{{$row->user->jumlah_pelanggaran}} kali</td>
                    <td>
                        <div class="form-group">

                            <form action="{{ route('ReplyBlocked.destroy', $row->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <div class="ms-1">
                                    <button type="submit" class="btn btn-outline-primary btn-sm rounded-5 edit-btn">Terima laporan <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48"><g fill="currentColor"><path fill-rule="evenodd" d="M16 5h13l9 9v23a2 2 0 0 1-2 2H16a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm19 9l-6-6v5a1 1 0 0 0 1 1h5Zm-2.293 7.293a1 1 0 0 1 0 1.414L24 31.414l-4.707-4.707a1 1 0 0 1 1.414-1.414L24 28.586l7.293-7.293a1 1 0 0 1 1.414 0Z" clip-rule="evenodd"/><path d="M12 11h-2v27a5 5 0 0 0 5 5h19v-2H15a3 3 0 0 1-3-3V11Z"/></g></svg></button>
                                </div>
                            </form>
                            <form action="{{ route('Report.destroy', $row->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <div class="ms-1">
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-5 edit-btn">Tolak laporan <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M15 3v4a1 1 0 0 0 1 1h4"/><path d="M17 17h-6a2 2 0 0 1-2-2V9m0-4a2 2 0 0 1 2-2h4l5 5v7c0 .294-.063.572-.177.823"/><path d="M16 17v2a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2M3 3l18 18"/></g></svg></button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="ms-1">
                            <button type="submit" class="btn btn-outline-primary btn-sm rounded-5 edit-btn"
                                data-toggle="modal" data-target="#replyModal{{ $row->replies->id }}">Terima laporan <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48"><g fill="currentColor"><path fill-rule="evenodd" d="M16 5h13l9 9v23a2 2 0 0 1-2 2H16a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm19 9l-6-6v5a1 1 0 0 0 1 1h5Zm-2.293 7.293a1 1 0 0 1 0 1.414L24 31.414l-4.707-4.707a1 1 0 0 1 1.414-1.414L24 28.586l7.293-7.293a1 1 0 0 1 1.414 0Z" clip-rule="evenodd"/><path d="M12 11h-2v27a5 5 0 0 0 5 5h19v-2H15a3 3 0 0 1-3-3V11Z"/></g></svg></button>
                        </div> --}}
    {{--    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    @foreach ($data as $row)
        @if ($row->id != '')
            <div class="modal fade" id="replyModal{{ $row->id }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content rounded-5">
                        <div class="modal-body rounded-4">
                            <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center mt-4"> <img src="{{ asset('images/modal.png') }}"
                                            width="320"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-white fw-semibold mt-4">
                                        <div class="mt-2"> <span class="intro-2">Judul keluhan:</span> </div>
                                        <span class="intro-1">d</span>
                                        <div class="mt-2"> <span class="intro-2">Balasan yang anda kirim:</span> </div>
                                        <span class="intro-1">p</span>
                                        <div class="mt-2"> <span class="intro-2">Jumlah like:</span> </div>
                                        <span class="intro-1">p<i class="fa-solid fa-thumbs-up"></i></span>
                                        <form action="{{ route('ReplyDestroy.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mt-4 mb-3"> <button
                                                    class="btn btn-outline-dark btn-sm rounded-5">delete <i
                                                        class="fa-solid fa-trash-can"></i></button> </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- end modal edit --}}
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function DeleteData() {
           iziToast.show({
               backgroundColor: '#F7941E',
               title: '<i class="fa-regular fa-circle-question"></i>',
               titleColor: 'white',
               messageColor: 'white',
               message: 'Apakah Anda yakin ingin menghapus data ini?',
               position: 'topCenter',
               buttons: [
                   ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function (instance, toast) {
                       instance.hide({
                           transitionOut: 'fadeOutUp',
                           onClosing: function (instance, toast, closedBy) {
                               document.getElementById('delete-form').submit();
                           }
                       }, toast, 'buttonName');
                   }, false], // true to focus
                   ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function (instance, toast) {
                       instance.hide({}, toast, 'buttonName');
                   }]
               ],
               onOpening: function (instance, toast) {
                   console.info('callback abriu!');
               },
               onClosing: function (instance, toast, closedBy) {
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
        const deskripsi = document.getElementById("deskripsi");
        const langkah = document.getElementById("langkah");
        const borderDeskripsi = document.getElementById("borderDeskripsi");
        const borderLangkah = document.getElementById("borderLangkah");
        const bahan = document.getElementById("bahan");
        const borderBahan = document.getElementById("borderBahan");
        const alat = document.getElementById("alat");
        const borderAlat = document.getElementById("borderAlat");
        deskripsi.addEventListener('click', function() {
            borderDeskripsi.style.display = "block";
            borderLangkah.style.display = "none";
            borderBahan.style.display = "none";
            borderAlat.style.display = "none";
        });
        bahan.addEventListener("click", function() {
            borderBahan.removeAttribute('hidden');
            borderBahan.style.display = "block";
            borderDeskripsi.style.display = "none";
            borderLangkah.style.display = "none";
            borderAlat.style.display = "none";
        });

        langkah.addEventListener("click", function() {
            borderLangkah.style.display = "block";
            borderDeskripsi.style.display = "none";
            borderBahan.style.display = "none";
            borderAlat.style.display = "none";
        });
        alat.addEventListener("click", function() {
            borderAlat.style.display = "block";
            borderLangkah.style.display = "none";
            borderDeskripsi.style.display = "none";
            borderBahan.style.display = "none";
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        // $(document).ready(function() {
        //     $('#buttonModal').on('click', function() {
        //         var complaintId = $(this).data('complaint-id');

        //         $.ajax({
        //             url: '/show-reply-by/' + complaintId,
        //             type: 'GET',
        //             dataType: 'html',
        //             success: function(data) {
        //                 $('#replyData').html(data); // Memasukkan data balasan ke dalam modal
        //                 $('#repliesModal').modal('show'); // Menampilkan modal
        //             },
        //             error: function() {
        //                 // Tampilkan pesan error jika data balasan tidak berhasil dimuat
        //                 $('#replyData').html('<p>Failed to load replies.</p>');
        //                 $('#repliesModal').modal('show');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
