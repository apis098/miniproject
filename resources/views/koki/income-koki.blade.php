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

{{-- Modal Tarik Tunai --}}
<div class="modal" id="tarik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="d-flex">
                <div class="col-6">
                    <h5 class="modal-title ml-3 mt-3"
                        style="color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                        Pilih Metode</h5>
                </div>
                <div class="col-6 mt-4">
                    <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close">
                        <i class="fa-regular text-dark fa-circle-xmark"></i>
                    </button>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-4 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-1" style="margin-top: -3%">
                                <img src="{{ asset('images/bri.png') }}" alt="" width="30%" height="50%">
                                <p class="my-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    BRIVA</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-4 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-1" style="margin-top: -3%">
                                <img src="{{ asset('images/alfamart.png') }}" alt="" width="50%" height="50%">
                                <p class="my-1" style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    Alfamart</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-3 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-1" style="margin-top: -3%">
                                <img src="{{ asset('images/indomaret.png') }}" alt="" width="50%" height="50%">
                                <p class="" style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    Indomaret</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-4 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-2" style="margin-top: -3%">
                                <img src="{{ asset('images/alfamidi.png') }}" alt="" width="60%" height="100%">
                                <p class="my-1" style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    Alfamidi</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-4 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-1" style="margin-top: -3%">
                                <img src="{{ asset('images/spay.png') }}" alt="" width="50%">
                                <p class="my-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    Shopeepay</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-4 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-2" style="margin-top: -3%">
                                <img src="{{ asset('images/qris.png') }}" alt="" width="50%">
                                <p class="my-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    QRIS</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 mb-3">
                        <div class="rounded-4 text-center  p-4 counter-card"
                            style="border: 1px solid #333;">
                            <div class="ms-2" style="margin-top: -3%">
                                <img src="{{ asset('images/ovo.png') }}" alt="" width="50%">
                                <p class="my-1 " style="font-size: 14px; font-weight: bold;">Bayar dengan akun virtual
                                    OVO</p>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="col-12">
            <button
            style="width: 15%; border-radius: 10px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
            class="btn float-end mb-3 mr-2">
            <span style="font-weight: 600">
                <a href="#" style="color: rgb(255, 255, 255);">Konfirmasi</a>
            </span>
            </button>
        </div>
        </div>
    </div>
</div>

<div class="container pt-4 px-5">
<button
style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
class="btn">
<span style="font-weight: 600">
    <a href="#" data-toggle="modal"
    data-target="#tarik" style="color: rgb(255, 255, 255);">Tarik Tunai</a>
</span>
</button>

        <div class="row">
            <div class="col-sm-3 col-lg-6 mb-2 mt-3">
                <h3 style="font-family:poppins ">Jumlah Pendapatan</h3>
            </div>
        </div>

            <div class="row mb-3">
                <div class="col-sm-3 col-lg-4">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Belum diambil</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">28 agustus - 12 september</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">RP {{ number_format($saldo_belumDiambil, 2, ",", ".") }}</span>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-4">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Sudah diambil</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">31 agustus - 12 oktober</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">RP {{ number_format($saldo_sudahDiambil, 2, ",", ".") }}</span>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-4">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Jumlah pendapatan</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">28 agustus - 12 desember</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">RP {{ number_format($saldo_total, 2, ",", ".") }}</span>
                    </div>
                </div>

            </div>

            {{-- <div class="row mb-1">
                <div class="col-sm-3 col-lg-4">
                    <h3 style="font-family:poppins ">Penarikan</h3>
                </div>
            </div> --}}



            <div class="row mb-1">
                <div class="col-sm-3 col-lg-4">
                    <h3 style="font-family:poppins">Riwayat</h3>
                </div>
            </div>

            <table class="table-custom"" >
                <thead>
                    <tr>
                        <th scope="col">Jenis Konten</th>
                        <th scope="col">Konten</th>
                        <th scope="col">Tanggal</th>
                        <th scope="col">Pendapatan</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($income_koki as $income)
                    <tr class="mt-5">
                        <td style="border-left:1px solid black;" class="">
                            {{ $income->status }}
                        </td>
                        <td>
                            @if ($income->status === "resep")
                             {{ $income->resep->nama_resep }}
                            @elseif ($income->status === "feed")
                            <video style="width: 100px;border-radius:10%;" src="{{ asset('storage/'.$income->feed->upload_video) }}"></video>
                            @elseif($income->status === "sawer" && $income->feed_id != null)
                            <video style="width: 100px;border-radius:10%;" src="{{ asset('storage/'.$income->feed->upload_video) }}"></video>
                            @endif
                        </td>
                        <td>
                            {{ $income->created_at }}
                        </td>
                        <td>
                            RP {{ number_format($income->pemasukan, 2, ',', '.') }}
                        </td>
                        <td style="border-right:1px solid black;">
                            {{ $income->status_penarikan }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>

@endsection
