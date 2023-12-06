@extends('layouts.nav_koki')
@section('konten')
    <style>
        .border-orange {
            /* width: 150px;
            height: 225px; */
            border-radius: 15px;
            border: #F7941E solid;
            overflow: hidden;
        }

        .border-black {
            /* width: 150px;
            height: 225px; */
            border-radius: 15px;
            border: black solid;
            overflow: hidden;
        }

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
            width: 500px;
            height: 40px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        .table-custom th {
            padding: 10px;
            width: 500px;
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



        .b-b {
            border: black solid;
        }

        .b-o {
            border: #F7941E solid;
        }

        .text-orange {
            color: #F7941E;
        }
    </style>

    {{-- Modal Tarik Tunai --}}
    <div class="modal" id="tarik">
        <div class="modal-dialog {{ $check ? 'modal-lg' : 'modal-md' }}">
            <div class="modal-content">
                <div class="d-flex">
                    @if ($check)
                        <div class="col-10">
                            <h5 class="modal-title ml-3 mt-3"
                                style="color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                Masukkan nilai</h5>
                        </div>
                    @else
                        <div class="col-10">
                            <h5 class="modal-title ml-3 mt-3"
                                style="color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                Data pribadi</h5>
                        </div>
                    @endif
                    <div class="col-2 mt-3">
                        <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                            <i class="fa-regular text-dark fa-circle-xmark"></i>
                        </button>
                    </div>
                </div>
                <div class="modal-body col-12">
                    @if ($check)
                        <form action="{{ route('ajukan.penarikan') }}" id="FormAjukanPenarikan" method="post">
                            @csrf
                            <div class="row justify-content-center p-2">
                                <!-- <label class="col-lg-3 col-md-6 col-12 card border-black rounded-4 p-2  scale" id="small_option"
                                    onclick="small_option()" style="width: 90%;">
                                    <input hidden id="50k" type="radio" value="50000" name="select_input">
                                    <img src="{{ asset('img/2.png') }}" class="card-img-top" alt="" width="50">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bolder mt-1" id="text-small">Rp. 50.000,00</h6>
                                    </div>
                                </label>
                                <label class="col-lg-3 col-md-6 col-12 card border-black rounded-4 p-2  scale" id="medium_option"
                                    onclick="medium_option()" style="width: 90%;">
                                    <input hidden id="100k" type="radio" value="100000" name="select_input">
                                    <img src="{{ asset('img/4.png') }}" class="card-img-top ms-2 " alt="" width="50">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bolder mt-1" id="text-medium">Rp. 100.000,00</h6>
                                    </div>
                                </label>
                                <label class="col-lg-3 col-md-6 col-12 card border-black rounded-4 p-2  scale" id="large_option"
                                    onclick="large_option()" style="width: 90%;">
                                    <input hidden id="150k" type="radio" value="150000" name="select_input">
                                    <img src="{{ asset('img/5.png') }}" class="card-img-top" alt="" width="50">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bolder mt-1" id="text-large">Rp. 150.000,00</h6>
                                    </div>
                                </label>
                                <label class="col-lg-3 col-md-6 col-12 card border-black rounded-4 p-2 scale" id="more_option"
                                    onclick="more_option()" style="width: 90%;">
                                    <input hidden id="0k" type="radio" value="null" name="select_input">
                                    <img src="{{ asset('img/money.png') }}" class="card-img-top" alt="" width="50">
                                    <div class="card-body text-center">
                                        <h6 class="fw-bolder mt-1" id="more-text">Lainya</h6>
                                    </div>
                                </label> -->
                                <label
                                    class="col-lg-3 col-md-6 col-12 my-1 mb-3">
                                    <div class="card border-2 border-black scale"
                                        onclick="small_option()"
                                        id="small_option"
                                        style="width: auto; height: auto;"
                                        data-card-selected="false">
                                        <input hidden id="50k" type="radio" value="50000" name="select_input">
                                        <img src="{{ asset('img/2.png') }}"
                                            class="card-img-top" alt="">
                                        <div class="card-body">
                                        <div class="text-center">
                                        <h6 class="fw-bolder mt-1" id="text-small">Rp. 50.000,00</h6>
                                    </div>
                                        </div>
                                    </div>
                                </label>
                                <label
                                    class="col-lg-3 col-md-6 col-12 my-1 mb-3">
                                    <div class="card border-2 border-black scale"
                                        onclick="medium_option()"
                                        id="medium_option"
                                        style="width: auto; height: auto;"
                                        data-card-selected="false">
                                        <input hidden id="100k" type="radio" value="100000" name="select_input">
                                        <img src="{{ asset('img/4.png') }}"
                                             class="card-img-top">
                                        <div class="card-body">
                                        <div class="text-center">
                                        <h6 class="fw-bolder mt-1" id="text-medium">Rp. 100.000,00</h6>
                                    </div>
                                        </div>
                                    </div>
                                </label>
                                <label
                                    class="col-lg-3 col-md-6 col-12 my-1 mb-3">
                                    <div class="card border-2 border-black scale"
                                        onclick="large_option()"
                                        id="large_option"
                                        style="width: auto; height: auto;"
                                        data-card-selected="false">
                                        <input hidden id="150k" type="radio" value="150000" name="select_input">
                                        <img src="{{ asset('img/5.png') }}"
                                            class="card-img-top" alt="">
                                        <div class="card-body">
                                        <div class="text-center">
                                        <h6 class="fw-bolder mt-1" id="text-large">Rp. 150.000,00</h6>
                                    </div>
                                        </div>
                                    </div>
                                </label>
                                <label
                                    class="col-lg-3 col-md-6 col-12 my-1 mb-3">
                                    <div class="card border-2 border-black scale tinggi"
                                        onclick="more_option()"
                                        id="more_option"
                                        style="width: auto;"
                                        data-card-selected="false">
                                        <input hidden id="0k" type="radio" value="null" name="select_input">
                                        <img src="{{ asset('img/money.png') }}"
                                            class="card-img-top" alt="">
                                        <div class="card-body">
                                        <div class="text-center">
                                        <h6 class="fw-bolder mt-1" id="more-text">Lainya</h6>
                                    </div>
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <style>
                                @media (max-width: 1000px) {
                                            /* Menyembunyikan gambar dengan class card-img-top pada elemen dengan ID yang memiliki pola id yang di-generate */
                                            [id^="small_option"] .card-img-top,
                                            [id^="medium_option"] .card-img-top,
                                            [id^="large_option"] .card-img-top,
                                            [id^="more_option"] .card-img-top {
                                                display: none;
                                            }
                                        }
                                @media (min-width: 1001px) {
                                    .tinggi {
                                        height: 94%;
                                    }
                                    .removePadding {
                                        padding: 0;
                                    }
                                }
                                @media (max-width: 1000px) {
                                    .tinggi {
                                        height: auto;
                                    }
                                }   
                            </style>
                            <script>
                                function small_option() {
                                    $('#small_option').removeClass('border-black');
                                    $('#small_option').addClass('border-orange');
                                    $('#medium_option').removeClass('border-orange');
                                    $('#medium_option').addClass('border-black');
                                    $('#large_option').removeClass('border-orange');
                                    $('#large_option').addClass('border-black');
                                    $('#more_option').removeClass('border-orange');
                                    $('#more_option').addClass('border-black');
                                    $('#text-small').addClass('text-orange');
                                    $("#text-medium").removeClass('text-orange');
                                    $("#text-large").removeClass('text-orange');
                                    $("#more-text").removeClass('text-orange');
                                    $('#nilai').css('display', 'none');
                                    $('#nilai').val('');
                                    $('#nilai').removeClass('b-o');
                                    $('#nilai').addClass('b-b');
                                }

                                function medium_option() {
                                    $('#small_option').removeClass('border-orange');
                                    $('#small_option').addClass('border-black');
                                    $('#medium_option').removeClass('border-black');
                                    $('#medium_option').addClass('border-orange');
                                    $('#large_option').removeClass('border-orange');
                                    $('#large_option').addClass('border-black');
                                    $('#more_option').removeClass('border-orange');
                                    $('#more_option').addClass('border-black');
                                    $('#text-small').removeClass('text-orange');
                                    $("#text-medium").addClass('text-orange');
                                    $("#text-large").removeClass('text-orange');
                                    $("#more-text").removeClass('text-orange');
                                    $('#nilai').css('display', 'none');
                                    $('#nilai').val('');
                                    $('#nilai').removeClass('b-o');
                                    $('#nilai').addClass('b-b');
                                }

                                function large_option() {
                                    $('#small_option').removeClass('border-orange');
                                    $('#small_option').addClass('border-black');
                                    $('#medium_option').removeClass('border-orange');
                                    $('#medium_option').addClass('border-black');
                                    $('#large_option').removeClass('border-black');
                                    $('#large_option').addClass('border-orange');
                                    $('#more_option').removeClass('border-orange');
                                    $('#more_option').addClass('border-black');
                                    $('#text-small').removeClass('text-orange');
                                    $("#text-medium").removeClass('text-orange');
                                    $("#text-large").addClass('text-orange');
                                    $("#more-text").removeClass('text-orange');
                                    $('#nilai').css('display', 'none');
                                    $('#nilai').val('');
                                    $('#nilai').removeClass('b-o');
                                    $('#nilai').addClass('b-b');
                                }

                                function more_option() {
                                    $('#small_option').removeClass('border-orange');
                                    $('#small_option').addClass('border-black');
                                    $('#medium_option').removeClass('border-orange');
                                    $('#medium_option').addClass('border-black');
                                    $('#large_option').removeClass('border-orange');
                                    $('#large_option').addClass('border-black');
                                    $('#more_option').removeClass('border-black');
                                    $('#more_option').addClass('border-orange');
                                    $('#text-small').removeClass('text-orange');
                                    $("#text-medium").removeClass('text-orange');
                                    $("#text-large").removeClass('text-orange');
                                    $("#more-text").addClass('text-orange');
                                    $('#nilai').css('display', 'block');
                                    $('#nilai').val('');
                                    $('#nilai').removeClass('b-b');
                                    $('#nilai').addClass('b-o');
                                }
                            </script>
                            <div class="mb-3 d-flex justify-content-center col-lg-12 removePadding">
                                <input type="text" name="display_nilai" placeholder="Masukkan jumlah" id="nilai"
                                    oninput="formatNumber()" class="form-control  rounded-4 mr-2  b-b"
                                    style="display: none; width:86%;">
                                <input type="text" hidden name="nilai" placeholder="Masukkan jumlah" id="real_number"
                                    oninput="formatNumber()" class="form-control  rounded-4 mr-2  b-b"
                                    style=" width:86%;">
                                <button type="submit"
                                    style="color: white; border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    class="btn">
                                    <b class="ms-2 me-2">Tarik</b>
                                </button>
                            </div>
                            
                        </form>
                    @else
                        <form action="{{ route('kirim.dataPribadiChef') }}" method="post" id="FormKirimDataPribadiChef">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" name="name" id="name" style="border-radius: 5px;"
                                    placeholder="Masukkan nama" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" name="email" id="email" style="border-radius: 5px;"
                                    placeholder="Masukkan e-mail" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="number_handphone" class="form-label">Nomer telefon</label>
                                <input type="number" name="number_handphone" id="number_handphone"
                                    style="border-radius: 5px;" placeholder="Masukkan nomer telefon"
                                    class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control"
                                    style="border-radius: 5px;" placeholder="Masukkan alamat">
                            </div>
                            <div class="mb-3">
                                <label for="foto_ktp" class="form-label">Foto ktp</label>
                                <input type="file" name="foto_ktp" id="foto_ktp" class="form-control"
                                    style="border-radius: 5px;">
                            </div>
                            <div class="mb-3">
                                <label for="foto_diri_ktp" class="form-label">Foto diri dengan ktp</label>
                                <input type="file" name="foto_diri_ktp" id="foto_diri_ktp" class="form-control"
                                    style="border-radius: 5px;">
                            </div>
                            <div class="mb-3">
                                <label for="pilihan_bank" class="form-label">Pilihan bank</label>
                                <select name="pilihan_bank" id="pilihan_bank" class="form-control">
                                    <option value="">Pilih bank</option>
                                    <option value="bri">BRI</option>
                                    <option value="bca">BCA</option>
                                    <option value="bni">BNI</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nomer_rekening" class="form-label">Masukkan nomer rekening</label>
                                <input type="number" name="nomer_rekening" id="nomer_rekening" class="form-control"
                                    placeholder="Masukkan nomer rekening" style="border-radius: 5px;">
                            </div>
                            <div class="mb-3" style="text-align: right;">
                                <button type="submit"
                                    style="color: white; border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    class="btn">
                                    Kirim
                                </button>
                            </div>
                        </form>
                    @endif
                </div>

            </div>
        </div>
    </div>

    <div class="containe pt-4 px-5">
        @if ($check2)
            <button style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                class="btn" onclick="Peringatan1()">
                <span style="font-weight: 600">
                    <a href="#" style="color: rgb(255, 255, 255);">Tarik
                        Tunai</a>
                </span>
            </button>
        @else
            <button style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                class="btn">
                <span style="font-weight: 600">
                    <a href="#" data-toggle="modal" data-target="#tarik" style="color: rgb(255, 255, 255);">Tarik
                        Tunai</a>
                </span>
            </button>
        @endif

        <div class="row">
            <div class="col-sm-3 col-lg-6 mb-2 mt-3">
                <h3 style="font-family:poppins ">Jumlah Pendapatan</h3>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-4 mb-3 col-lg-4">
                <div class="rounded-4  p-3 counter-card" style="border: 1px solid #333;">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-weight: bold;">Belum diambil</h6>
                    </div>
                    <br>
                    <h4 class=""
                        style="color: black;text-align:right;
                         font-weight: 275;">RP
                        {{ number_format(Auth::user()->saldo_pemasukan, 2, ',', '.') }}</h4>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 mb-3 col-lg-4">
                <div class="rounded-4  p-3 counter-card" style="border: 1px solid #333;">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-weight: bold;">Sudah diambil</h6>
                    </div>
                    <br>
                    <h4 class=""
                        style="color: black;text-align:right;
                         font-weight: 275;">RP
                        {{ number_format($saldo_sudahDiambil, 2, ',', '.') }}</span>
                </div>
            </div>

            <div class="col-sm-12 col-md-4 mb-3 col-lg-4">
                <div class="rounded-4  p-3 counter-card" style="border: 1px solid #333;">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-weight: bold;">Jumlah pendapatan</h6>
                    </div>
                    <br>
                    <h4 class=""
                        style="color: black;text-align:right;
                         font-weight: 275;">RP
                        {{ number_format($saldo_total, 2, ',', '.') }}</span>
                </div>
            </div>

        </div>

        <style>
            @media(min-width:1145px) {
                .text-riwayat11 {
                    display: none;
                }
                .text-riwayat21 {
                    display: block;
                }
                .form1 {
                    display: block;
                }
                .form2 {
                    display: none;
                }
            }
            @media(max-width:1144px) {
                .text-riwayat12 {
                    display: block;
                }
                .text-riwayat22 {
                    display: none;
                }
                .form1 {
                    display: none;
                }
                .form2 {
                    display: block;
                }
            }



            @media (max-width: 375px) and (min-width: 320px) {
                .table-custom {
                    margin-left: -25px;
                }
            }

            @media (max-width: 320px) {
                .table-custom {
                    margin-left: -35px;
                }
            }
            @media(max-width:992px) {
                .riwayats {
                    display: flex;
                    justify-content: center;
                }
            }
            @media(min-width:993px) {
                .riwayats {
                    display: flex;
                    justify-content: space-between;
                }
            }
        </style>
        <form action="{{ route('koki.income') }}" method="POST" class="form1">
            @csrf
            <div class="text-center text-riwayat11">
                <h3 style="font-family: Poppins">Riwayat</h3>
            </div>
            <div class="riwayats">
                <div class="text-riwayat21">
                    <h3 style="font-family:poppins">Riwayat</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="mx-1">
                        <select name="jenis_penghasilan" class="form-select" id="jenis_penghasilan">
                            <option value="">Pilih Jenis Penghasilan</option>
                            <option value="sawer">Sawer</option>
                            <option value="feed">Feed Premium</option>
                            <option value="resep">Resep Premium</option>
                            <option value="kursus">Kursus</option>
                        </select>
                    </div>
                    <div class="mx-1">
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                    </div>
                    <div class="mx-1">
                        <input type="date" class="form-control" id="tanggal_batas" name="tanggal_batas">
                    </div>
                    <div class="mx-1">
                        <button type="submit"
                            style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                            class="btn my-auto">
                            <span class="btn-filter" style="color: rgb(255, 255, 255);">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75v9.13M7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5H7.04Z" />
                                </svg></span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
        <form action="{{ route('koki.income') }}" method="POST" class="form2">
            @csrf
            <div class="text-center text-riwayat22">
                <h3 style="font-family: Poppins">Riwayat</h3>
            </div>
            <div class="d-flex justify-content-between">
                <div class="text-riwayat12">
                    <h3 style="font-family:poppins">Riwayat</h3>
                </div>

                <button type="button" data-toggle="modal" data-target="#modalFormFilter"
                    style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                    class="btn my-auto ml-auto">
                    <span class="btn-filter" style="color: rgb(255, 255, 255);">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27"
                                    viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75v9.13M7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5H7.04Z" />
                                </svg></span>
                </button>
                <div class="modal" id="modalFormFilter">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Filter Penghasilan</h5>
                                <button type="button" class="btn-close" data-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="" class="form-label">Jenis penghasilan</label>
                                    <select name="jenis_penghasilan" class="form-control" id="jenis_penghasilan">
                                        <option value="">Pilih Jenis Penghasilan</option>
                                        <option value="sawer">Sawer</option>
                                        <option value="feed">Feed Premium</option>
                                        <option value="resep">Resep Premium</option>
                                        <option value="kursus">Kursus</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal awal</label>
                                    <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Tanggal batas</label>
                                    <input type="date" class="form-control" id="tanggal_batas" name="tanggal_batas">
                                </div>
                                <div class="mb-3 d-flex justify-content-end">
                                    <button type="submit"
                                        style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                        class="btn my-auto">
                                        <span class="btn-filter" style="color: rgb(255, 255, 255);">
                                            Filter Sekarang</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <table class="table-custom">
            <thead>
                <tr>
                    <th scope="col">Konten</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Pendapatan</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($income_koki as $income)
                    <tr class="mt-5">
                        {{-- <td style="border-left:1px solid black;" class="">
                            {{ $income->status }}
                        </td> --}}
                        <td class="ms-3" style="border-left: 1px solid black;">
                            @if ($income->status === 'sawer' && $income->feed_id != null || $income->feed_id != null)
                                {{ strlen($income->feed->deskripsi_video) > 40 ? substr($income->feed->deskripsi_video, 0, 40) . '....' : $income->feed->deskripsi_video }}
                            @elseif($income->status === 'sawer' && $income->resep_id != null ||$income->resep != null)
                                {{ $income->resep->nama_resep }}
                            @elseif($income->status === 'kursus')
                                {{ $income->course->nama_kursus }}
                            @endif
                        </td>
                        <td>
                            {{ $income->created_at->format('d F Y') }}
                        </td>
                        <td>
                            RP {{ number_format($income->pemasukan, 2, ',', '.') }}
                        </td>
                        <td style="border-right:1px solid black;">
                            <button
                                style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                class="btn">
                                <span style="font-weight: 600">
                                    <a href="#" data-toggle="modal" data-target="#detail{{ $income->id }}"
                                        style="color: rgb(255, 255, 255);">Detail</a>
                                </span>
                            </button>
                            <div class="modal" id="detail{{ $income->id }}">
                                <div class="modal-dialog modal-md">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Detail</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close" data-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: left;">
                                            <div class="mb-3">
                                                <span style="font-weight: 400;" class="mb-2">Pengirim</span>
                                                <div
                                                    style="border-radius: 5px; border: 1px solid black;padding: 5px;font-weight:400;">
                                                    {{ $income->user->name }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <span style="font-weight: 400;" class="mb-2">Pendapatan</span>
                                                <div
                                                    style="border-radius: 5px; border: 1px solid black;padding: 5px;font-weight:400;">
                                                   RP {{ number_format($income->pemasukan, 2, ',', '.') }}
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <span style="font-weight: 400;" class="mb-2">Jenis Konten</span>
                                                <div
                                                    style="border-radius: 5px; border: 1px solid black;padding: 5px;font-weight:400;">
                                                    {{ $income->status }}
                                                </div>
                                            </div>
                                            @if ($income->status === 'sawer')
                                                <div class="mb-3">
                                                    <span style="font-weight: 400;" class="mb-2">Pesan</span>
                                                    <div
                                                        style="border-radius: 5px; border: 1px solid black;padding: 5px;font-weight:400;">
                                                        @if ($income->messageGift() == null)
                                                         -
                                                        @else
                                                        {{ $income->messageGift() }}
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>

        </table>
        @if ($income_koki->count() <= 0)
            <div class="d-flex mt-5 flex-column h-100 justify-content-center align-items-center"
                style="margin-top: -3em;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada data</b></p>
            </div>
        @endif
        {{ $income_koki->links('pagination::default') }}

    </div>

    <script>
        $("#FormKirimDataPribadiChef").submit(function(event) {
            event.preventDefault();
            let route = $(this).attr("action");
            let data = new FormData($(this)[0]);
            $.ajax({
                url: route,
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function success(response) {
                    iziToast.destroy();
                    if (response.success) {
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#tarik").empty();

                    } else {
                        iziToast.error({
                            'title': 'Error',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                    }
                },
                error: function error(xhr, error, status) {
                    iziToast.destroy();
                    iziToast.error({
                        'title': 'Error',
                        'message': xhr.responseText,
                        'position': 'topCenter'
                    });
                }
            });
        });
        $("#FormAjukanPenarikan").submit(function(event) {
            event.preventDefault();
            let route = $(this).attr("action");
            let data = new FormData($(this)[0]);
            $.ajax({
                url: route,
                method: 'POST',
                data: data,
                processData: false,
                contentType: false,
                success: function success(response) {
                    iziToast.destroy();
                    if (response.success) {
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#tarik").empty();

                    } else {
                        iziToast.error({
                            'title': 'Error',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                    }
                },
                error: function error(xhr, error, status) {
                    iziToast.destroy();
                    iziToast.error({
                        'title': 'Error',
                        'message': xhr.responseText,
                        'position': 'topCenter'
                    });
                }
            });
        });

        function Peringatan1() {
            iziToast.destroy();
            iziToast.error({
                'title': 'Peringatan',
                'message': 'Data anda sedang diproses!',
                'position': 'topCenter'
            });
        }

        function formatNumber() {
            var inputan = document.getElementById('nilai');
            var input_value = inputan.value;
            var number_format = input_value.replace(/\D/g, '');
            var formated_value =new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                maximumFractionDigits: 0
            }).format(number_format);
            inputan.value = formated_value;

            document.getElementById("real_number").value = number_format;
        }
    </script>
@endsection
