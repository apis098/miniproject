@extends('layouts.nav_koki')
@section('konten')
    <style>
        .pricing .pricing-item {
            border: 1px solid #0a0a0a;
            border-radius: 15px;
        }

        @media (max-width: 991px) {
            .pricing .pricing-item {
                margin-bottom: 30px;
            }
        }

        /* Animasi untuk kartu yang bergetar */
        .animated-card {
            transition: transform 0.2s;
            /* Efek transisi untuk perubahan transformasi */
        }

        .animated-card:hover {
            transform: translateY(-5px);
            /* Kartu akan bergerak ke atas saat di-hover */
        }

        .pricing .pricing-item .pricing-heading {
            padding: 20px 40px 30px 40px;
            background: #fafafa;
            border-bottom: 1px solid #a8a8a8;
            border-radius: 15px;
        }

        /* CSS untuk perubahan warna latar belakang saat card di-hover */
        .animated-card .pricing-heading {
            background-color: #ffffff;
            /* Warna latar belakang awal (putih) */
            transition: background-color 0.2s;
            /* Efek transisi untuk perubahan warna */
        }

        .animated-card:hover .pricing-heading {
            background-color: #f7941e;
            /* Warna latar belakang saat di-hover */
        }

        /* CSS untuk perubahan warna teks saat card di-hover */
        .animated-card .change-color {
            color: #000000;
            /* Warna teks awal (hitam) */
            transition: color 0.2s;
            /* Efek transisi untuk perubahan warna */
        }

        .animated-card:hover .change-color {
            color: #ffffff;
            /* Warna teks saat di-hover (putih) */
        }

        .pricing .pricing-item .pricing-heading .title h6 {
            text-transform: uppercase;
            font-weight: 400;
            line-height: 50px;
            border-bottom: 1px solid #050505;
        }

        .pricing .pricing-item .pricing-heading .price {
            margin-top: 28px;
        }

        .pricing .pricing-item .pricing-heading .price h2 {
            font-size: 3.625rem;
            font-weight: 400;
            margin-bottom: 0px;
        }

        .pricing .pricing-item .pricing-heading .price h2 span {
            font-size: 1.5625rem;
        }

        .pricing .pricing-item .pricing-body {
            padding: 45px 40px;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li {
            list-style: none;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li p span {
            margin-right: 15px;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li p span.available {
            color: #f7941e;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li p span.unavailable {
            color: #100f0f;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li:not(:last-child) {
            margin-bottom: 15px;
        }

        .pricing .pricing-item .pricing-footer {
            padding-bottom: 40px;
        }

        .pricing .pricing-item.featured {
            border: none;
            box-shadow: 0px 0px 30px 0px rgba(11, 29, 66, 0.15);
        }

        .pricing .pricing-item.featured .pricing-heading {
            background: #f7941e;
            border-bottom: 1px solid #f7941e;
        }

        .pricing .pricing-item.featured .pricing-heading .title h6 {
            color: #fff;
            border-bottom: 1px solid #f7941e;
        }

        .pricing .pricing-item.featured .pricing-heading .price {
            margin-top: 28px;
        }

        .pricing .pricing-item.featured .pricing-heading .price h2 {
            color: #fff;
            font-size: 3.625rem;
            margin-bottom: 0px;
        }

        .pricing .pricing-item.featured .pricing-heading .price h2 span {
            font-size: 1.5625rem;
        }

        .pricing .pricing-item.featured .pricing-heading .price p {
            color: #fff;
        }

        .pricing.two .pricing-item {
            border: 1px solid #e5e5e5;
            overflow: hidden;
        }

        @media (max-width: 991px) {
            .pricing.two .pricing-item {
                margin-bottom: 30px;
            }
        }

        .pricing.two .pricing-item .pricing-heading {
            position: relative;
            margin-bottom: 10px;
        }

        .pricing.two .pricing-item .pricing-heading .title h6 {
            position: relative;
        }

        .pricing.two .pricing-item .pricing-heading .price {
            position: relative;
        }

        .pricing.two .pricing-item .pricing-heading:before {
            content: "";
            position: absolute;
            bottom: -25%;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 64px 500px 0 0;
            border-color: #fafafa transparent transparent transparent;
        }

        @media (max-width: 991px) {
            .pricing.two .pricing-item .pricing-heading:before {
                content: none;
            }
        }

        .pricing.two .pricing-item .pricing-body {
            padding: 70px 40px 45px;
        }

        .pricing.two .pricing-item .pricing-body ul.feature-list li p span.available {
            color: #f7941e;
        }

        .pricing.two .pricing-item.featured .pricing-heading:before {
            border-color: #f7941e transparent transparent transparent;
        }

        .beli {
            border: 1px solid #000000;
            margin-bottom: 40px;
            border-radius: 10px;
            text-align: center;
            width: 120px;

            /* Tambahkan properti berikut */
            margin-left: auto;
            margin-right: auto;
            display: block;
        }


        .beli:hover {
            background-color: #f7941e;
            color: #fff;
            border: 1px solid #f7941e;
        }

        @media(max-width: 522px) {
            .informasiCard1 {
                display: none;
            }

            .informasiCard2 {
                display: block;
            }

            .informasicard1 {
                display: none;
            }

            .informasicard2 {
                display: block;
            }
        }

        @media(min-width: 523px) {
            .informasiCard1 {
                display: block;
            }

            .informasiCard2 {
                display: none;
            }

            .informasicard1 {
                display: block;
            }

            .informasicard2 {
                display: none;
            }
        }
    </style>
    <div class="">
        <div class="my-4 ml-5">

            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#judul"
                style="background-color: white; border: 0.50px black solid; border-radius: 10px; width: 95%">
                <div style="font-weight: 600; color: black;"> Tambahkan Judul Sesi</div>
            </a>

            {{-- modal Tambah Judul Sesi --}}
            <div class="modal fade" id="judul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title ml-2" id="exampleModalLabel"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Tambah Sesi Kursus
                                </h5>
                                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close"
                                    id="closeModalEdit">
                                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                                </button>
                            </div>
                            <form action="{{ route('tambah.sesi.kursus') }}" method="POST" id="formTambahSesiKursus">
                                @csrf
                                <input type="hidden" name="course_id" value="{{ $kursus_sendiri->id }}" hidden>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" id="tambahJudulSesi" name="judul_sesi" class="form-control"
                                            placeholder="Masukkan Nama Yang Sesuai...">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 fw-bold">Waktu </label>
                                    <div class="col-sm-10">
                                        <div class="row mx-auto">
                                            <input type="number" min="0" id="tambahLamaSesi" name="lama_sesi"
                                                class="form-control col-9" placeholder="Masukkan Jumlah Waktu...">
                                            <select class="form-select col-3" name="informasi_lama_sesi" id="">
                                                <option value="menit">Menit</option>
                                                <option value="jam">Jam</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label fw-bold">Harga </label>
                                    <div class="col-sm-10">
                                        <input type="number" id="tambahHargaSesi" name="harga_sesi" class="form-control "
                                            placeholder="Masukkan Harga...">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label fw-bold">Tanggal dimulai: </label>
                                    <div class="col-sm-10">
                                        <select name="tanggal" id="tanggal" class="form-control">
                                            @while ($startdate <= $enddate)
                                                <option value="{{ $startdate->format('d-m-Y') }}">
                                                    {{ $startdate->format('d-m-Y') }}</option>
                                                @php
                                                    $startdate = $startdate->addDay();
                                                @endphp
                                            @endwhile
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label fw-bold">Waktu dimulai: </label>
                                    <div class="col-sm-10">
                                        <input type="time" id="waktu" name="waktu" class="form-control "
                                            placeholder="Masukkan Waktu Sesi Dimulai...">
                                    </div>
                                </div>
                                <br>
                                <button type="submit" onclick="buttonTambahSesiKursus()"
                                    class="btn btn-sm d-flex justify-content-end text-white float-end"
                                    style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal Tambah Judul Sesi --}}

            @foreach ($sesi_kursus as $number => $sesi)
                <section id="cardSesiKursus{{ $sesi->id }}">
                    <div class="card mt-2" style="width: 95%; border-radius: 10px;  border: 1px solid #777">
                        <div class="card-header d-flex justify-content-between"
                            style="border-radius: 10px; border: 1px solid #777">
                            <div class="" style="font-size: 20px; margin-top: 1%">
                                <strong id="judul_sesi{{ $sesi->id }}">{{ $sesi->judul_sesi }}</strong>
                                <br> <small
                                    id="tanggal_waktu_sesi{{ $sesi->id }}">{{ $sesi->tanggal . ' ' . $sesi->waktu }}</small>
                                <span class="informasiCard2">
                                    <div id="lama_sesi{{ $sesi->id }}" class="me-2">
                                        @if ($sesi->lama_sesi >= 60 && $sesi->informasi_lama_sesi != 'menit')
                                            {{ number_format($sesi->lama_sesi / 60, 1) . ' jam' }}
                                        @elseif($sesi->lama_sesi >= 60 && $sesi->informasi_lama_sesi != 'jam')
                                            {{ number_format($sesi->lama_sesi / 60, 1) . ' menit' }}
                                        @else
                                            {{ $sesi->lama_sesi . ' ' . $sesi->informasi_lama_sesi }}
                                        @endif
                                    </div>
                                    <div id="harga_sesi{{ $sesi->id }}">Rp.
                                        {{ number_format($sesi->harga_sesi, 2, ',', '.') }}</div>
                                </span>
                            </div>
                            <div class="ml-auto">
                                <div class="">
                                    <span class="informasiCard1">
                                        <div id="lama_sesi{{ $sesi->id }}" class="me-2">
                                            @if ($sesi->lama_sesi >= 60)
                                                {{ number_format($sesi->lama_sesi / 60, 1) . ' jam' }}
                                            @else
                                                {{ $sesi->lama_sesi . ' ' . $sesi->informasi_lama_sesi }}
                                            @endif
                                        </div>
                                        <div id="harga_sesi{{ $sesi->id }}">Rp.
                                            {{ number_format($sesi->harga_sesi, 2, ',', '.') }}</div>
                                    </span>
                                    <div class="d-flex justify-content-start">
                                        <!-- button edit sesi kursus -->
                                        <button data-toggle="modal" data-target="#editSesiKursus{{ $number }}"
                                            class="" style="border: none; top: 10%; background-color: transparent;">
                                            <svg width="25" height="40" viewBox="0 0 28 27" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                    fill="#F7941E" />
                                                <path
                                                    d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                    fill="white" />
                                            </svg>

                                        </button>
                                        <!-- button hapus sesi kursus -->
                                        <button type="button" style="border: none;"
                                            onclick="confirmation_hapus_sesi_kursus({{ $sesi->id }})"
                                            class="btn btn-md text-light rounded-circle p-1" data-bs-toggle="modal"
                                            data-bs-target="#mymodal">
                                            <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="border-radius: 10px; ">
                            @foreach ($sesi->detail_sesi as $angka => $detail_sesi)
                                <section id="cardDetailSesiKursus{{ $detail_sesi->id }}">
                                    <div class="mb-2">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <span id="nomer_urut{{ $angka }}">{{ $angka += 1 }}.</span>
                                                <span id="detail_Sesi{{ $angka }}"
                                                    class="ml-4">{{ $detail_sesi->detail_sesi }}</span>
                                                <div class="informasicard2">
                                                    <div class="d-flex justify-content-start">
                                                        <span class=""
                                                            id="detail_Sesi_lama_sesi{{ $angka }}">
                                                            @if ($detail_sesi->lama_sesi >= 60)
                                                                {{ number_format($detail_sesi->lama_sesi / 60, 1) . ' jam' }}
                                                            @else
                                                                {{ $detail_sesi->lama_sesi . ' ' . $detail_sesi->informasi_lama_sesi }}
                                                            @endif
                                                        </span>
                                                        <a href="#" data-toggle="modal"
                                                            data-target="#editSesi{{ $angka }}" class="p-1 mr-1"
                                                            style="border: none; margin-top: -4%">
                                                            <svg width="25" height="33" viewBox="0 0 28 26"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                                    fill="#F7941E" />
                                                                <path
                                                                    d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                                    fill="white" />
                                                            </svg>
                                                        </a>
                                                        <button type="button"
                                                            onclick="konfirmasi_hapus_detail_kursus({{ $angka }}, {{ $detail_sesi->id }})"
                                                            style="border: none; margin-top: -3%"
                                                            class="btn btn-md text-light rounded-circle p-1"
                                                            data-bs-toggle="modal" data-bs-target="#mymodal">
                                                            <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="informasicard1">
                                                <div class="d-flex justify-content-start">
                                                    <span class="" id="detail_Sesi_lama_sesi{{ $angka }}">
                                                        @if ($detail_sesi->lama_sesi >= 60 && $detail_sesi->informasi_lama_sesi == 'menit')
                                                            {{ number_format($detail_sesi->lama_sesi / 60, 1) . ' jam' }}
                                                        @elseif($detail_sesi->lama_sesi >= 60 && $detail_sesi->informasi_lama_sesi == 'jam')
                                                            {{ number_format($detail_sesi->lama_sesi / 60, 1) . ' menit' }}
                                                        @else
                                                            {{ $detail_sesi->lama_sesi . ' ' . $detail_sesi->informasi_lama_sesi }}
                                                        @endif

                                                    </span>
                                                    <a href="#" data-toggle="modal"
                                                        data-target="#editSesi{{ $angka }}" class="p-1 mr-1"
                                                        style="border: none; margin-top: -4%">
                                                        <svg width="25" height="33" viewBox="0 0 28 26"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path
                                                                d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                                fill="#F7941E" />
                                                            <path
                                                                d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                                fill="white" />
                                                        </svg>
                                                    </a>
                                                    <button type="button"
                                                        onclick="konfirmasi_hapus_detail_kursus({{ $angka }}, {{ $detail_sesi->id }})"
                                                        style="border: none; margin-top: -3%"
                                                        class="btn btn-md text-light rounded-circle p-1"
                                                        data-bs-toggle="modal" data-bs-target="#mymodal">
                                                        <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- modal Edit Detail Sesi --}}
                                    <div class="modal fade" id="editSesi{{ $angka }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content" style="border-radius: 15px">
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h5 class="modal-title ml-2" id="exampleModalLabel"
                                                            style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                                            Edit
                                                        </h5>
                                                        <button type="button" class="close mr-2" data-dismiss="modal"
                                                            aria-label="Close" id="closeModalEdit">
                                                            <i class="fa-regular text-dark fa-circle-xmark"></i>
                                                        </button>
                                                    </div>
                                                    <form id="formUpdateDetailSesiKursus{{ $angka }}"
                                                        action="{{ route('update.detail.sesi.kursus', $detail_sesi->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-2 col-form-label fw-bold">Detail
                                                                Sesi</label>

                                                            <div class="col-sm-10">
                                                                <input type="text" id="nama{{ $angka }}"
                                                                    name="detail_sesi" class="form-control"
                                                                    value="{{ $detail_sesi->detail_sesi }}"
                                                                    placeholder="Masukkan Nama Yang Sesuai...">
                                                            </div>
                                                        </div>
                                                        <div class="mb-3 row">
                                                            <label class="col-sm-2 col-form-label fw-bold">Lama
                                                                Sesi
                                                            </label>
                                                            <div class="col-sm-10">
                                                                <div class="row mx-auto">
                                                                    <input type="number" id="waktu{{ $angka }}"
                                                                        name="lama_sesi" class="form-control col-8"
                                                                        value="{{ $detail_sesi->lama_sesi }}"
                                                                        placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                                    <select name="informasi_lama_sesi"
                                                                        class="form-select col-4" id="">
                                                                        <option value="menit">menit</option>
                                                                        <option value="jam">jam</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <button type="submit"
                                                            onclick="buttonUpdateDetailSesiKursus({{ $angka }})"
                                                            class="btn btn-sm d-flex justify-content-end text-white float-end"
                                                            style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    {{-- end modal Edit Detail Sesi --}}
                                </section>
                            @endforeach
                            <div id="listDetailSesi{{ $sesi->id }}">

                            </div>
                            <div class="col-12">
                                <a href="#" class="btn btn-light" data-toggle="modal"
                                    data-target="#modalTambahDetailSesi{{ $sesi->id }}"
                                    style="background-color: #F7941E; border-radius: 10px; width: 100%">
                                    <div style="font-weight: 600; color: white;"> Tambahkan Detail Sesi</div>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- modal Edit Judul Sesi --}}
                    <div class="modal fade" id="editSesiKursus{{ $number }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" style="border-radius: 15px">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="modal-title ml-2" id="exampleModalLabel"
                                            style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                            Edit Sesi Kursus
                                        </h5>
                                        <button type="button" class="close mr-2" data-dismiss="modal"
                                            aria-label="Close" id="closeModalEdit">
                                            <i class="fa-regular text-dark fa-circle-xmark"></i>
                                        </button>
                                    </div>
                                    <form id="formUpdateSesiKursus{{ $sesi->id }}"
                                        action="{{ route('update.sesi.kursus', $sesi->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="updateJudulSesi{{ $sesi->id }}"
                                                    name="judul_sesi" class="form-control"
                                                    value="{{ $sesi->judul_sesi }}"
                                                    placeholder="Masukkan Nama Yang Sesuai...">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Waktu </label>
                                            <div class="col-sm-10">
                                                <div class="row mx-auto">
                                                    <input type="number" value="{{ $sesi->lama_sesi }}"
                                                        id="updateLamaSesi{{ $sesi->id }}" name="lama_sesi"
                                                        class="form-control col-9"
                                                        placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                    <select name="informasi_lama_sesi" class="form-select col-3"
                                                        id="">
                                                        <option value="menit"
                                                            {{ $sesi->informasi_lama_sesi === 'menit' ? 'selected' : '' }}>
                                                            Menit</option>
                                                        <option value="jam"
                                                            {{ $sesi->informasi_lama_sesi === 'jam' ? 'selected' : '' }}>
                                                            Jam</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Harga </label>
                                            <div class="col-sm-10">
                                                <input type="number" id="updateHargaSesi{{ $sesi->id }}"
                                                    name="harga_sesi" class="form-control"
                                                    value="{{ $sesi->harga_sesi }}" placeholder="Masukkan Harga...">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Tanggal dimulai
                                            </label>
                                            <div class="col-sm-10">
                                                <select name="tanggal" id="tanggal" class="form-select">
                                                    @while ($start_date <= $end_date)
                                                        <option value="{{ $start_date->format('d-m-Y') }}">
                                                            {{ $start_date->format('d-m-Y') }}</option>
                                                        @php
                                                            $start_date = $start_date->addDay();
                                                        @endphp
                                                    @endwhile
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Waktu dimulai
                                            </label>
                                            <div class="col-sm-10">
                                                <input type="time" id="updateWaktuSesi{{ $sesi->id }}"
                                                    name="waktu" class="form-control" value="{{ $sesi->waktu }}"
                                                    placeholder="Masukkan Harga...">
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit" onclick="buttonUpdateSesiKursus({{ $sesi->id }})"
                                            class="btn btn-sm d-flex justify-content-end text-white float-end"
                                            style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal Edit Judul Sesi --}}
                    {{-- modal Tambah Detail Sesi --}}
                    <div class="modal fade" id="modalTambahDetailSesi{{ $sesi->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content" style="border-radius: 15px">
                                <div class="modal-header">
                                    <h5 class="modal-title"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Tambah Detail Sesi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closeModalEdit">
                                        <i class="fa-regular text-dark fa-circle-xmark"></i>
                                    </button>
                                  </div>
                                <div class="modal-body">
                                    <form id="formTambahDetailSesiKursus{{ $sesi->id }}"
                                        action="{{ route('tambah.detail.sesi.kursus', $sesi->id) }}" method="POST">
                                        @csrf
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Detail</label>
                                            <div class="col-sm-10">
                                                <input type="text" id="detail_sesi{{ $sesi->id }}"
                                                    name="detail_sesi" class="form-control"
                                                    placeholder="Masukkan Nama Yang Sesuai...">
                                            </div>
                                        </div>
                                        <div class="mb-3 row">
                                            <label class="col-sm-2 col-form-label fw-bold">Waktu </label>
                                            <div class="col-sm-10">
                                                <div class="row mx-auto">
                                                    <input type="number" id="detail_lama_sesi{{ $sesi->id }}"
                                                        name="lama_sesi" class="form-control col-9"
                                                        placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                    <select name="informasi_lama_sesi" class="form-select col-3"
                                                        id="">
                                                        <option value="menit">menit</option>
                                                        <option value="jam">jam</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit"
                                            onclick="buttonTambahDetailSesiKursus({{ $sesi->id }})"
                                            class="btn btn-sm d-flex justify-content-end text-white float-end"
                                            style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end modal Tambah Detail Sesi --}}
                </section>
            @endforeach
        </div>
    </div>
    <script>
        // function hapus detail sesi kursus
        function konfirmasi_hapus_detail_kursus(num, id) {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus detail sesi ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $.ajax({
                                    url: "/koki/hapus-detail-sesi-kursus/" + id,
                                    method: "DELETE",
                                    headers: {
                                        "X-CSRF-Token": "{{ csrf_token() }}",
                                    },
                                    success: function success(response) {
                                        iziToast.destroy();
                                        iziToast.success({
                                            title: 'Sukses',
                                            message: response.message,
                                            position: 'topCenter'
                                        });
                                        location.reload();
                                    },
                                    error: function error(xhr, error, status) {
                                        iziToast.destroy();
                                        iziToast.success({
                                            title: 'Sukses',
                                            message: xhr.responseText,
                                            position: 'topCenter'
                                        });
                                    }
                                })
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
        // function update detail sesi kursus
        function buttonUpdateDetailSesiKursus(num) {
            $("#formUpdateDetailSesiKursus" + num).off("submit");
            $("#formUpdateDetailSesiKursus" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        iziToast.destroy();
                        iziToast.success({
                            title: 'Sukses',
                            message: response.message,
                            position: 'topCenter'
                        });
                        $("#nama" + num).val('');
                        $("#waktu" + num).val('');

                            location.reload();

                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            title: 'Error',
                            message: xhr.responseText,
                            position: 'topCenter'
                        });
                    }
                });
            })
        }
        // function tambah detail sesi kursus
        function buttonTambahDetailSesiKursus(num) {
            $("#formTambahDetailSesiKursus" + num).off('submit');
            $("#formTambahDetailSesiKursus" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        if (response.success === false) {
                            iziToast.destroy();
                            iziToast.error({
                                title: 'Error',
                                message: response.message,
                                position: 'topCenter'
                            });
                        }
                        iziToast.destroy();
                        iziToast.success({
                            title: 'Sukses',
                            message: response.message,
                            position: 'topCenter'
                        });
                       location.reload();

                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            title: 'Error',
                            message: xhr.responseText,
                            position: 'topCenter'
                        });
                    }
                });
            });
        }
        // function hapus sesi kursus
        function confirmation_hapus_sesi_kursus(num) {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus sesi ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $.ajax({
                                    url: "/koki/hapus-sesi-kursus/" + num,
                                    method: "DELETE",
                                    headers: {
                                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                                    },
                                    success: function success(response) {
                                        iziToast.destroy();
                                        iziToast.success({
                                            title: 'Sukses',
                                            message: response.message,
                                            position: 'topCenter'
                                        });
                                        location.reload();

                                    },
                                    error: function error(xhr, error, status) {
                                        iziToast.destroy();
                                        iziToast.error({
                                            title: 'Error',
                                            message: xhr.responseText,
                                            position: 'topCenter'
                                        });
                                    }
                                });
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
        // function update sesi kursus
        function buttonUpdateSesiKursus(num) {
            $("#formUpdateSesiKursus" + num).off("submit");
            $("#formUpdateSesiKursus" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let up = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: up,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        iziToast.destroy();
                        iziToast.success({
                            title: 'Sukses',
                            message: response.message,
                            position: 'topCenter'
                        });

                        console.log(response.harga_sesi_baru);
                        location.reload();

                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            title: 'Gagal',
                            message: xhr.responseText,
                            position: 'topCenter'
                        });
                    }
                });
            });
        }
        // function tambah sesi kursus
        function buttonTambahSesiKursus() {
            $("#formTambahSesiKursus").off("submit");
            $("#formTambahSesiKursus").submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        $("#tambahJudulSesi").val('');
                        $("#tambahLamaSesi").val('');
                        $("#tambahHargaSesi").val('');
                        iziToast.destroy();
                        iziToast.success({
                            title: 'Sukses',
                            message: response.message,
                            position: 'topCenter'
                        });

                        location.reload();

                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            title: 'Gagal',
                            message: xhr.responseText,
                            position: 'topCenter'
                        });
                    }
                });
            });
        }
        window.onload = function() {
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    this.classList.toggle("active");
                    var panel = this.nextElementSibling;

                    if (panel.style.maxHeight) {
                        panel.style.maxHeight = null;
                    } else {
                        panel.style.maxHeight = panel.scrollHeight + "px";
                    }
                });
            }
        };
    </script>
@endsection
