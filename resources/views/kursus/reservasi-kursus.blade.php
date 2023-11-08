@extends('template.nav')
@section('content')
    <style>
        .accordion {
            background-color: transparent;
            color: #444;
            cursor: pointer;
            padding: 5px;
            width: 100%;
            border: 0.01ch #777 solid;
            text-align: left;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .selected {
            background-color: #F7941E;
            color: white
        }

        .accordion b {
            margin-left: -70%;
        }

        .accordion i {
            margin-left: 1%;
        }

        .card {
            border: 1px solid #777;
            overflow: hidden;
            border-radius: 10px;
        }

        .accordion-collapse {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
            /* Animasi dengan efek slide */
        }
    </style>

    <div class="container mb-5">
        <div class="my-3 mt-3">
            <h3><b>Deskripsi</b></h3>
        </div>

        <div class="w-75 mb-5"
            style=" color: black; font-size:15px; font-family: Poppins; font-weight: 400; letter-spacing: 0.50px; word-wrap: break-word">
            <p>{{ $course->deskripsi_kursus }}</p>
        </div>

        <h3 class="fw-bold">Sesi Kursus</h3>
        <div class="mb-4">
        <small>Nb: Tekan sesi untuk memilih sesi, jika warna sesi tidak berubah berarti sesi sudah kadaluarsa.</small>
        </div>
        @foreach ($course->sesi as $sesi)
            <div class="card mb-4">
                <button @if ($sesi->selisihTanggal() != "Kadaluarsa")
                    class="accordion pilihSesi"
                    onclick="pilihSesi({{ $sesi->id }})"
                @else
                class="accordion"
                @endif
                data-price="{{ $sesi->harga_sesi }}">
                <i class="fa-regular fa-square" id="square{{$sesi->id}}"></i>
                    <b style="margin-left: -70%;">{{ $sesi->judul_sesi }} <br>
                    <small>{{ $sesi->tanggal . " " . $sesi->waktu }}</small></b>
                    <span>
                        @if ($sesi->lama_sesi >= 60)
                            {{ number_format($sesi->lama_sesi / 60, 1) }}
                            jam
                        @else
                            {{ $sesi->lama_sesi }}
                            menit
                        @endif
                        <br> Rp. {{ number_format($sesi->harga_sesi, 2, ',', '.') }}
                    </span>
                </button>
                <div class="panel">
                    <table class="table table-borderless">
                        <tbody>
                            @foreach ($sesi->detail_sesi as $index => $item_sesi)
                                <tr>
                                    <th scope="row" style="width: 5%;text-align: center;">{{ $index += 1 }}</th>
                                    <td>{{ $item_sesi->detail_sesi }}</td>
                                    <td style="width: 20%;text-align: end;">
                                        @if ($item_sesi->lama_sesi >= 60)
                                            {{ $item_sesi->lama_sesi / 60 }}
                                        @else
                                            {{ $item_sesi->lama_sesi }}
                                        @endif {{ $item_sesi->informasi_lama_sesi }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <br>
        @endforeach
        <div class="d-flex justify-content-end">
            <div class="d-flex align-items-end flex-column">
                <span class="font-size-15 fw-bold">Total harga</span>
                <span id="totalHarga">0</span>
            </div>
            <form action="{{ route('transaksi.kursus', [$course->id, Auth::user()->id, $course->users_id]) }}" method="post">
            @csrf
            <input type="hidden" name="amount" id="amount">
            <div id="inputList"></div>
            <button type="submit"
                style="height: 40px; background-color: #F7941E; border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-left: 30px;"
                class="btn btn-sm text-light"><b class="me-3 ms-3">Bayar</b></button>
            </form>
        </div>

    </div>
    <script>
        function pilihSesi(num)
        {
            let inner = `<input type="hidden" name="sesi[]" value="${num}">`;
            document.getElementById("inputList").innerHTML += inner;
            let square = document.getElementById("square"+num);
            if (square.classList.contains('fa-square')) {
                square.classList.remove('fa-square');
                square.classList.add('fa-square-check');
            } else {
                square.classList.remove('fa-square-check');
                square.classList.add('fa-square');
            }
        }
        window.onload = function() {
            var acc = document.getElementsByClassName("pilihSesi");
            var totalHargaElement = document.getElementById("totalHarga");
            var totalHarga = 0;

            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    if (this.classList.contains("selected")) {
                        // Unselect jika sudah terpilih
                        this.classList.remove("selected");
                        // Kurangi harga ketika di-unselect
                        totalHarga -= parseInt(this.getAttribute("data-price"));
                    } else {
                        // Select jika belum terpilih
                        this.classList.add("selected");
                        // Tambahkan harga ketika di-select
                        totalHarga += parseInt(this.getAttribute("data-price"));
                    }

                    // Perbarui tampilan total harga
                    totalHargaElement.textContent = "Rp." + totalHarga;
                    document.getElementById('amount').value = totalHarga;
                });
            }
        };

    </script>
@endsection
