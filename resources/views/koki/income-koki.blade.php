@extends('layouts.nav_koki')
@section('konten')
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

</style>
    <div class=" container-fluid pt-4 px-4 su">
        <div class="row">
            <div class="col-sm-3 col-lg-3"style="margin-left: 17em;">
                <h3 style="font-family:poppins ">Jumlah Pendapatan</h3>
            </div>
        </div>

            <div class="row mb-3">
                <div class="col-sm-3 col-lg-3" style="margin-left: 17em;">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Belum diambil</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">28 agustus - 12 september</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">200K</span>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3" style="margin-left: 1em;">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Sudah diambil</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">31 agustus - 12 oktober</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">200K</span>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3" style="margin-left: 1em;">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Jumlah pendapatan</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">28 agustus - 12 desember</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">400K</span>
                    </div>
                </div>

            </div>

            <div class="row mb-1">
                <div class="col-sm-3 col-lg-3"style="margin-left: 17em;">
                    <h3 style="font-family:poppins ">Penarikan</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 17em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/bri.png') }}" alt="" width="30%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                BRIVA</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 1em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/alfamart.png') }}" alt="" width="50%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                Alfamart</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 1em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/indomaret.png') }}" alt="" width="50%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                Indomaret</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 1em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/alfamidi.png') }}" alt="" width="50%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                Alfamidi</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 1em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/spay.png') }}" alt="" width="50%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                Shopeepay</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 3em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/qris.png') }}" alt="" width="50%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                QRIS</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-2 mb-3" style="margin-left: 1em;">
                    <div class="rounded-4 text-center  p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <img src="{{ asset('images/ovo.png') }}" alt="" width="50%">
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                OVO</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-1">
                <div class="col-sm-3 col-lg-3"style="margin-left: 17em;">
                    <h3 style="font-family:poppins">Riwayat</h3>
                </div>
            </div>

            <table class="table-custom" style="margin-left: 17em;" >
                <thead>
                    <tr>
                        <th scope="col">Resep</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Suka</th>
                        <th scope="col">Pendapatan</th>
                    </tr>
                </thead>
                <tbody>

                        <tr class="mt-5">
                            <td style="border-left:1px solid black;" class="">
                            nasi padang</td>
                            <td>28 juni 2022</td>
                            <td>200Rb suka</td>
                            <td style="border-right:1px solid black;">Rp.2.000.000,00</td>
                        </tr>

                </tbody>
            </table>
    </div>

@endsection