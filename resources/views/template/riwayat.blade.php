@extends('template.nav')
@section('content')
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
    <div class="container pt-4 px-5">

        <div class="my-4 justify-content-center">
            <ul class="nav mb-2 d-flex justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark ms-2"
                            style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Riwayat Top Up</h5>
                        <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark"
                            style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Riwayat Penarikan</h5>
                        <div id="b" class="ms-" style="width: 100%; height: 100%; border: 1px #F7941E solid;"
                            hidden>
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="a-tab" class="nav-link mr-5" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark"
                            style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Riwayat Transaksi</h5>
                        <div id="pp" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>
            </ul>

            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Nominal</th>
                                <th scope="col">Status</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history_top_up as $history)
                                <tr class="mt-5">
                                    <td style="border-left:1px solid black;" class="">
                                        Rp. {{ number_format($history->price, 2, ',', '.') }}
                                    </td>
                                    <td>
                                        @if ($history->status == 'PAID')
                                            <span class="badge" style="background-color: #F7941E;">Sudah Dibayar</span>
                                        @elseif($history->status == 'UNPAID')
                                            <span class="badge badge-dark text-light">Belum Dibayar</span>
                                        @elseif($history->status == 'EXPIRED')
                                            <span class="badge bg-dark">Hangus</span>
                                        @elseif($history->status == 'REFUND')
                                            <span class="badge bg-dark text-light">Dikembalikan</span>
                                        @else
                                            <span class="badge bg-dark text-light">Gagal</span>
                                        @endif
                                    </td>
                                    {{-- <td>{{ $history->created_at->format('j F Y') }}</td> --}}
                                    <td style="border-right:1px solid black;">
                                        <a href="koki/detail-transaction/{{$history->reference}}" class="btn ml-2 text-light"
                                            id="buttonUploadVideo"
                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                            Lihat detail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">

                    {{-- start tab 2 --}}

                    <table class="table-custom"">
                        <thead>
                            <tr>

                                <th scope="col">Jumlah</th>
                                <th scope="col">Waktu</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mt-5">
                                <td style="border-left:1px solid black;" class="">
                                    Rp. 40.000,00
                                </td>
                                <td>20 November 2023</td>
                                <td style="border-right:1px solid black;"><button type="submit" class="btn ml-2"
                                        id="buttonUploadVideo"
                                        style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                        <span style="font-weight: 600; color: white;">Menunggu</span>
                                    </button></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">

                    <table class="table-custom"">
                        <thead>
                            <tr>
                                <th scope="col">Nama Paket</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col">Detail</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history_transaksi as $transaksi)
                                <tr class="mt-5">
                                    <td style="border-left:1px solid black;" class="">
                                        {{ $transaksi->premium->nama_paket }}
                                    </td>
                                    <td>Rp. {{ number_format($transaksi->premium->harga_paket, 2, '.', ',') }}</td>
                                    <td>
                                        <button type="button" class="btn ml-2 text-light" id="buttonUploadVideo"
                                            style="background: #F7941E;color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                            <a href="/detail-pembayaran/{{ $transaksi->reference }}" style="font-weight: 600;color:#fff;">
                                                Lihat Detail
                                            </a>
                                        </button>
                                    </td>
                                    <td style="border-right:1px solid black;"><button type="submit" class="btn ml-2"
                                            id="buttonUploadVideo"
                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                            <span style="font-weight: 600; color: white;">
                                                @if ($transaksi->status == 'paid')
                                                    <b class="text-light">Sudah dibayar</b>
                                                @elseif($transaksi->status == 'unpaid')
                                                    <b class="text-light">Belum dibayar</b>
                                                @elseif($transaksi->status == 'refund')
                                                    <b class="text-light">Dikembalikan</b>
                                                @elseif($transaksi->status == 'expired')
                                                    <b class="text-light">Terlambat</b>
                                                @else
                                                    <b class="text-light">Gagal</b>
                                                @endif
                                            </span>
                                        </button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- end --}}
        </div>


    </div>

    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("c");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("b");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");

        a_tab.addEventListener('click', function(event) {
            event.preventDefault();
            o.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
        });

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            o.style.display = "none";
        });

        click2.addEventListener("click", function(event) {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            o.style.display = "none";
        });
    </script>
@endsection
