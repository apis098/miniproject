@extends('layouts.navbar')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
        .table-rounded {
            border-collapse: separate;
            border-radius: 10px;
            border-color: black;

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

        .table-custom th:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .table-custom {
            text-align: center;
            width: 100%
        }

        .table-custom {
            width: 200%;
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
        }

        .table-custom th {
            padding: 10px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom thead {
            margin-bottom: 50px;
        }

        /* .table-custom thead {
                            background: #F7941E;
                            margin-bottom: 10%;
                            color: white;
                        } */

        /* .table-custom tr:not(.thead) {
                        margin-top: 10px;
                        margin-bottom: 10px;
                        border: 2px solid black;
                    } */

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

        .btn-buat {
            border-radius: 10px;
            border: 0.50px black solid;
            position: relative;
            color: black;
            font-size: 15px;
            font-family: Poppins;
            font-weight: 500;
            letter-spacing: 0.40px;
            word-wrap: break-word
        }

        .btn-tambah {
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: #fff;
            font-size: 15px;
            font-family: Poppins;
            font-weight: 500;
            letter-spacing: 0.40px;
            word-wrap: break-word
        }
    </style>
    <div class=" d-flex justify-content-center ms-3">
        <div class="tab-content mb-5 mx-3" id="pills-tabContent">
            <div class="my-5 ml-5" style="margin-right:%;">
                <button type="button" class="btn btn-buat btn-sm" data-toggle="modal"
                    data-target="#exampleModal">Tambah</button>
                {{-- modal tambah --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content" style="border-radius: 15px">
                            <div class="modal-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <br>
                                <form method="POST" action="{{ route('kategori-makanan.store') }}">
                                    @csrf
                                    <div class="">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_makanan"
                                                style="border-radius:10px; width:120%;">
                                            <br>
                                            <button type="submit"
                                                class="btn btn-tambah btn-sm d-flex justify-content-xxl-end">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal tambah --}}
                {{-- start tab 2 --}}

                <table class="table-custom">
                    <thead>
                        <tr>
                            <th scope="col">Kategori</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori_makanans as $data)
                            <tr>
                                <td style="border-left:solid black; font-size:15px;font-family:poppins">
                                    {{ $data->nama_makanan }}</td>
                                <td style="border-right: solid black;">
                                    <div>
                                        <button type="button" class="btn btn-tambah" data-toggle="modal"
                                            data-target="#exampleModal{{ $data->id }}">Edit</button>
                                        {{-- modal edit --}}
                                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="border-radius: 15px">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title" id="exampleModalLabel"> Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <br>
                                                        <form action="{{ route('kategori-makanan.update', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="">
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $data->nama_makanan }}"
                                                                        name="nama_makanan" id="nama"
                                                                        style="border-radius:10px; width:120%;">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-tambah btn-sm d-flex justify-content-xxl-end">Edit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal edit --}}
                                        <form action="{{ route('kategori-makanan.destroy', $data->id) }}" method="POST"
                                            class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-buat btn-sm" style="margin-left: 5%"
                                                data-mdb-ripple-color="dark"
                                                onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')">
                                                Hapus</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- end --}}
    </div>
    </div>
    </div>

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('textarea').summernote();
        });
    </script>
@endsection
