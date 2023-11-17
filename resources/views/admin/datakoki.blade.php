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
            width: 210%;
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
        <div class="d-flex justify-content-start">
            <div class="my-5 mx-auto">
                <div class="tab-content mb-5" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="search" style="border-radius: 15px;">
                            <div class="col-lg-12 mt-2">
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

                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#Modal{{ $data_verified->id }}"
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
                                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                        Detail Data Pribadi</h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body" style="text-align: left;">
                                                                    <div class="mb-3">
                                                                        Nama : {{ $data_verified->name }}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        E-mail : {{ $data_verified->email }}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        Nomer Handphone :
                                                                        {{ $data_verified->number_handphone }}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        Alamat : {{ $data_verified->alamat }}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        Foto KTP <br>
                                                                        <img width="100px" style="border-radius: 10px;"
                                                                            src="{{ asset('storage/' . $data_verified->foto_ktp) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        Foto Diri Dengan KTP <br>
                                                                        <img width="100px" style="border-radius: 10px;"
                                                                            src="{{ asset('storage/' . $data_verified->foto_ktp) }}"
                                                                            alt="">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        Pilihan Bank : {{ $data_verified->pilihan_bank }}
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        Nomer Rekening :
                                                                        {{ $data_verified->nomer_rekening }}
                                                                    </div>
                                                                    <div class="mb-3 d-flex justify-content-start">
                                                                        <form
                                                                            action="{{ route('proses.data.koki', $data_verified->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <button type="submit"
                                                                                class="btn btn-sm rounded-3 text-light me-2"
                                                                                style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                                                    class="ms-2 me-2"
                                                                                    style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Terima</b>
                                                                            </button>
                                                                        </form>
                                                                        <button type="button"
                                                                            class="btn btn-sm rounded-3 text-light me-2"
                                                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                                                class="ms-2 me-2"
                                                                                style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Tolak</b>
                                                                        </button>
                                                                    </div>
                                                                </div>
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
