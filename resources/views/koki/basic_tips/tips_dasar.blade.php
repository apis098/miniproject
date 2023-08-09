@extends('layouts.nav_koki')
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
    <div class="card bg-dark mt-3 ml-3">
        <h2 class="text-white"> Crud tips dasar</h2>
    </div>
    <div class="container mb-2 mt-1 mb-md-1">
        <div class="col mt-5">
            <div class="mb-3 row">
                <form method="POST" action="{{ route('basic_tips.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 row">
                        <label for="foto" class="col-sm-2 col-form-label">input foto</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" @error('foto')
                        @enderror
                                name="foto" value="{{ old('foto') }}" id="foto"
                                placeholder="Inputkan Foto Produk....">
                            @error('foto')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="judul" class="col-sm-2 col-form-label">input judul</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="judul" id="judul">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="kategori_produk" class="col-sm-2 col-form-label">input kategori</label>
                        <div class="col-sm-10">
                            <select name="kategori_id" @error('kategori_id')
                        @enderror
                                id="kategori_produk" class="form-control">
                                <option value="{{ old('kategori_id') }}">-----</option>
                                @foreach ($kategori_tipsdasar as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="deskripsi" class="col-sm-2 col-form-label">input deskripsi </label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="deskripsi" @error('deskripsi')
                            @enderror id="deskripsi"
                                rows="5"></textarea>
                            @error('deskripsi')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit"
                        class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center"
                        data-mdb-ripple-color="dark">
                        <i class="fa-regular fa-floppy-disk me-1"></i>
                        Submit
                    </button>

                </form>
            </div>
        </div>
        <table class="table table-striped table-rounded" id="table">
            <thead class="bg-dark text-wgite">
                <tr>
                    <th>NO</th>
                    <th>Judul</th>
                    <th>Nama Kategori</th>
                    <th>Foto</th>
                    <th>Deskripsi</th>
                    <th>Dibuat Pada</th>
                    <th>Terakhir Diupdate Pada</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody class="table-active border-light">
                @foreach ($basic_tips as $data)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ $data->kategori_tipsdasar->nama_kategori }}</td>
                        <td>
                            <img src="{{ asset('storage/public/tipsdasar/' . $data->foto) }}" class="card-img-top" alt=""
                                style="width:90px">
                        </td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->created_at }}</td>
                        <td>{{ $data->updated_at }}</td>
                        <td>
                            <button type="button" class="btn btn-outline-success btn-sm rounded-5 edit-btn"
                                data-toggle="modal" data-target="#exampleModal{{ $data->id }}"><i
                                    class="fa-solid fa-pen-clip"></i></button>
                            <form action="{{ route('basic_tips.destroy', $data->id) }}" method="POST"
                                class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-5"
                                    data-mdb-ripple-color="dark"
                                    onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Ini?')"><i
                                        class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @foreach ($basic_tips as $row)
            @if ($row->id != '')
                {{-- modal edit --}}
                <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('basic_tips.update', $row->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3 row">
                                        <label for="foto" class="col-sm-2 col-form-label">Input Foto</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control"
                                                @error('foto')
                                        @enderror
                                                name="foto" id="foto" accept="image/*">
                                            <img src="{{ asset('storage/tipsdasar/' .$row->foto) }}" class="rounded"
                                                style="width: 150px">
                                            @error('foto')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="judul" class="col-sm-2 col-form-label">input judul</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" value="{{ $row->judul }}"
                                                name="judul" id="judul">
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="kategori" class="col-sm-2 col-form-label">input kategori</label>
                                        <div class="col-sm-10">
                                            <select name="kategori_id"
                                                @error('kategori_id')
                                        @enderror
                                                id="kategori" class="form-control">
                                                <option value="">-- Pilih Kategori --</option>
                                                @foreach ($kategori_tipsdasar as $data)
                                                    <option {{ $data->id ? 'selected' : '' }}
                                                        value="{{ $data->id }}">{{ $data->nama_kategori }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('kategori_id')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3 row">
                                        <label for="deskripsi" class="col-sm-2 col-form-label">Input Deskripsi </label>
                                        <div class="col-sm-10">
                                            <textarea class="form-control" rows="5" name="deskripsi"
                                                @error('deskripsi')
                                            @enderror id="deskripsi">{{ $row->deskripsi }}</textarea>
                                            @error('deskripsi')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit"
                                    class="btn btn-primary  rounded-5 mb-1 zoom-effects d-flex align-items-center"
                                    data-mdb-ripple-color="dark">
                                    <i class="fa-regular fa-floppy-disk me-1"></i>
                                    Submit
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
        {{-- end modal edit --}}
        {{-- <div class="d-flex justify-content-center" style="margin-top: -2%;">
            {!! $holidays->links('modern-pagination') !!}
        </div> --}}
        @endsection
        <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
            integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
        <script>
            $(document).ready(function() {
                $('#search').on('input', function() {
                    var value = $(this).val().toLowerCase();
                    $('#table tbody tr').filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
