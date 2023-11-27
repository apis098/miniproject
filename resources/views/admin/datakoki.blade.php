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
            width: 100%;
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
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        input:disabled {
            background-color: white;
        }

        .table-custom th {
            padding: 10px;
            width: 245px;
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

        .garis {
            border-bottom: #F7941E 2px solid;
        }

        .fa-circle {}


        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px;
            width: 205%;
            margin-left: 20px;
            margin-right;
            30x;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 34px;
            padding-right: 10px;
            border-right: 2px solid #eee
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-1 i {
            position: absolute;
            top: 12px;
            left: 5px;
            font-size: 10px;
            color: #eee
        }

        ::placeholder {
            color: grey;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 35%;
            margin-left: -5%
        }

        .search-2 input {
            height: 45px;
            border: 0.50px black solid;
            width: 137%;
            border-radius: 15px;
            margin-left: 80px;
            color: #000;
            padding-left: 18px;
            padding-right: 100px;
            text-align: center
        }

        .search-2 input:focus {
            box-shadow: none;
        }


        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 14px;
            color: #eee
        }

        .search-2 button {
            position: absolute;
            margin-left: 136%;
            top: 0px;
            border: none;
            height: 45px;
            background-color: #F7941E;
            color: #fff;
            width: 90px;
        }

        @media (max-width:800px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>
    <div style="overflow-x:hidden;">
        <div class="mx-5">
            <div class="my-5">
                <div class="tab-content mb-3 mr-5" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="search" style="border-radius: 15px;">
                            <div class="mt-2">
                                <div class="search-2"> <i class='bx bxs-map'></i>
                                    <form action="#" method="GET">
                                        <input type="text" name="" style="text-align: left;" placeholder="Cari..."
                                            value="" id="cari-data-koki">
                                        <button type="submit" class="zoom-effects"
                                            style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                                            Cari
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- start tab 1 --}}
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">
                                        Nama Pengguna</th>
                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">
                                        E-mail Pengguna</th>

                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <div class="">
                                    @foreach ($data as $num => $data_verified)
                                        <tr class="mt-5 data-koki" id="datakoki{{ $data_verified->id }}">
                                            <td style="border-left:1px solid black;  font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word""
                                                class="mt">{{ $data_verified->name }}
                                            </td>
                                            <td
                                                style=" font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word"">
                                                {{ $data_verified->email }}</td>

                                            <td style="border-right:1px solid black;">
                                                <div class="mx-auto">

                                                    <button type="button" data-toggle="modal"
                                                        data-target="#Modal{{ $data_verified->id }}"
                                                        class="btn btn-sm rounded-3 text-light me-2"
                                                        style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                            class="ms-2 me-2"
                                                            style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</b>
                                                    </button>

                                                    <div class="modal fade" id="Modal{{ $data_verified->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h2 class="fs-5" id="exampleModalLabel">
                                                                        Detail</h2>
                                                                    <button type="button" class="btn-close"
                                                                        data-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: left;">
                                                                    <div class="row text-center">
                                                                        <div class="col-6">
                                                                            <img width="150px" height="100px"
                                                                                style="border-radius: 10px;"
                                                                                src="{{ asset('storage/' . $data_verified->foto_ktp) }}"
                                                                                alt="">
                                                                            <br>
                                                                            Foto KTP
                                                                        </div>
                                                                        <div class="col-6">
                                                                            <img width="150px" height="100px"
                                                                                style="border-radius: 10px;"
                                                                                src="{{ asset('storage/' . $data_verified->foto_ktp) }}"
                                                                                alt="">
                                                                            <br>
                                                                            Foto Diri Dengan KTP
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3 mt-3">
                                                                        <div class="col-4">
                                                                            Nama
                                                                        </div>
                                                                        <div class="col-8">

                                                                            <input type="text"
                                                                                value="{{ $data_verified->name }}"
                                                                                class="form-control" disabled>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-4">
                                                                            E-mail
                                                                        </div>
                                                                        <div class="col-8">

                                                                            <input type="text" class="form-control"
                                                                                value="{{ $data_verified->email }}"
                                                                                disabled>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-4">
                                                                            Telefon
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $data_verified->number_handphone }}"
                                                                                disabled>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-4">
                                                                            Alamat
                                                                        </div>
                                                                        <div class="col-8">

                                                                            <textarea name="" class="form-control" disabled id="" cols="30" rows="10">
                                                                                {{ $data_verified->alamat }}
                                                                            </textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-4">
                                                                            Pilihan Bank
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $data_verified->pilihan_bank }}"
                                                                                disabled>

                                                                        </div>
                                                                    </div>
                                                                    <div class="row mb-3">
                                                                        <div class="col-4">
                                                                            Nomer rekening
                                                                        </div>
                                                                        <div class="col-8">
                                                                            <input type="text" class="form-control"
                                                                                value="{{ $data_verified->nomer_rekening }}"
                                                                                disabled>

                                                                        </div>

                                                                    </div>
                                                                    <div class="collapse mb-3"
                                                                        id="collapseTolak{{ $data_verified->id }}">
                                                                        <button type="button" class="btn btn-danger mb-2"
                                                                            onclick="batal({{ $data_verified->id }})"
                                                                            id="buttonBatal{{ $data_verified->id }}">Batal</button>
                                                                        <form method="post"
                                                                            action="{{ route('proses.data.koki', ['id' => $data_verified->id, 'status' => 'ditolak']) }}">
                                                                            @csrf
                                                                            <textarea name="alasan" id="alasan" cols="15" rows="5" class="form-control"
                                                                                placeholder="Alasan..." required></textarea>
                                                                            <button type="submit"
                                                                                id="tolakdata{{ $data_verified->id }}"
                                                                                hidden></button>
                                                                        </form>
                                                                    </div>
                                                                    <div class="mb-3 d-flex justify-content-end">

                                                                        <button type="button" data-dismiss="modal"
                                                                            data-toggle="modal"
                                                                            data-target="#YakinTerimaData{{ $data_verified->id }}"
                                                                            class="btn btn-sm rounded-3 text-light me-2"
                                                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                                                class="ms-2 me-2"
                                                                                style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Terima</b>
                                                                        </button>
                                                                        <button type="button"
                                                                            id="buttonTolak{{ $data_verified->id }}"
                                                                            data-toggle="collapse"
                                                                            onclick="tolakData({{ $data_verified->id }})"
                                                                            data-target="#collapseTolak{{ $data_verified->id }}"
                                                                            class="btn btn-sm rounded-3 text-light me-2"
                                                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                                                class="ms-2 me-2"
                                                                                style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Tolak</b>
                                                                        </button>
                                                                        <button type="button"
                                                                            id="submitTolak{{ $data_verified->id }}"
                                                                             onclick="tolakdata({{ $data_verified->id }})"
                                                                            class="btn btn-sm rounded-3 text-light me-2"
                                                                            hidden
                                                                            style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                                                class="ms-2 me-2"
                                                                                style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Selesai</b>
                                                                        </button>
                                                                        <script>
                                                                            function tolakData(num) {
                                                                                $('#buttonTolak' + num).attr('hidden', true);
                                                                                $('#submitTolak' + num).attr('hidden', false);
                                                                                // document.getElementById('buttonTolak'+num).style.display = "none";
                                                                                // document.getElementById('submitTolak'+num).style.display = "block";

                                                                            }

                                                                            function tolakdata(num) {
                                                                                document.getElementById('tolakdata' + num).click();
                                                                            }

                                                                            function batal(num) {
                                                                                document.getElementById('buttonTolak' + num).click();
                                                                                $('#buttonTolak' + num).attr('hidden', false);
                                                                                $('#submitTolak' + num).attr('hidden', true);
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="modal fade" id="YakinTerimaData{{ $data_verified->id }}"
                                                        tabindex="-1" role="dialog"
                                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <form
                                                                    action="{{ route('proses.data.koki', ['id' => $data_verified->id, 'status' => 'diterima']) }}"
                                                                    method="post">
                                                                    @csrf

                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="reportModal"
                                                                            style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                            Peringatan</h5>
                                                                        <button type="button" class="close text-black"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div
                                                                        class="modal-body row d-flex align-items-center col-12">
                                                                        <!-- Tambahkan kelas "align-items-center" -->
                                                                        <div class="col-2 mt-2">
                                                                            <img class="mr-3"
                                                                                src="{{ asset('image 94.png') }}"
                                                                                width="100px" height="100px"
                                                                                style="border-radius: 50%" alt="">
                                                                        </div>
                                                                        <div class="col-10">
                                                                            <div class="widget-49-meeting-info">

                                                                            </div>
                                                                            <p class="ml-4">
                                                                                Apakah anda yakin telah memeriksa data koki dengan benar?
                                                                            </p>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="submit"
                                                                            class="btn btn-light text-light rounded-3"
                                                                            style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                                                class="ms-2 me-2">Ya</b>
                                                                        </button>
                                                                        <button type="button" data-dismiss="modal"
                                                                        class="btn btn-light text-light rounded-3"
                                                                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                                            class="ms-2 me-2">Tidak</b>
                                                                    </button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </div>
                            </tbody>
                        </table>
                        @if ($data->count() == 0)
                            <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                <p><b>Tidak ada data</b></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#cari-data-koki").on("input", function() {
                let value = $(this).val().toLowerCase();
                console.log(value);
                $(".data-koki").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });

        function Terima(num) {
            $.ajax({
                url: "/admin/data-koki/" + num;
                method: "POST",
                headers: {
                    "X-Csrf-Token": "{{ csrf_token() }}"
                },
                success: function success(response) {
                    $("#datakoki" + num).empty();
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
        }
    </script>
@endsection
