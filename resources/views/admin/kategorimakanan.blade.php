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
    </style>
    <div class="card bg-white mt-3 ml-3">
        <h2 class="text-black text-center">Kategori makanan</h2>
    </div>
    <div class="container mb-3 mt-1 mb-md-1" style="margin-left:20%">
        <div class="col mt-5">
            <div class="mb-3 row">
                <form method="POST" action="{{ route('kategori-makanan.store') }}">
                    @csrf
                    <div class="mb-3 row mt-3 ml-3">
                        <label for="nama_makanan" class="form-label">input Kategori Makanan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="nama_makanan" id="nama">
                            <br>
                            <button type="submit" class="btn btn-warning btn-sm rounded-5 ">
                                <i class="fa-regular fa-floppy-disk me-1"></i>
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-striped table-rounded" id="table">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th>no</th>
                        <th>nama kategori makanan</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody class="table-active border-light">
                    @foreach ($kategori_makanans as $data)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $data->nama_makanan }}</td>
                            <td>
                                <div class="d-flex">
                                <button type="button" class="btn btn-outline-success btn-sm rounded-5 edit-btn"
                                    data-toggle="modal" data-target="#exampleModal{{ $data->id }}"><i
                                        class="fa-solid fa-pen-clip"></i></button>
                                <form action="{{ route('kategori-makanan.destroy', $data->id) }}" method="POST"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-5" style="margin-left: 5%"
                                        data-mdb-ripple-color="dark"
                                        onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                                 </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @foreach ($kategori_makanans as $row)
        @if ($row->id != '')
            {{-- modal edit --}}
            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('kategori-makanan.update', $row->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="mb-3 row">
                                    <label for="nama" class="col-sm-2 col-form-label"></label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $row->nama_makanan }}"
                                            name="nama_makanan" id="nama">
                                    </div>
                                </div>

                        <div class="modal-footer">
                            <button type="submit"
                                class="btn btn-danger  rounded-5 mb-1 zoom-effects d-flex align-items-center"
                                data-mdb-ripple-color="dark">
                                Simpan
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- end modal edit --}}

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
