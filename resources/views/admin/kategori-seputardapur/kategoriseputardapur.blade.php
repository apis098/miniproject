@extends('layouts.navbar')
@section('konten')
@push('style')
@powerGridstyles
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

<div class="mt-3 ml-3">
    <h2 class="text-dark"><b>{{ $title }}</b></h2>
    <hr />
</div>
    <div class="mb-2 mt-1 mb-md-1">
        <label for="name" class="mb-1 ms-2 text-secondary">Tambah Data:</label>
        <div>
            <form action="{{ route('kategori_seputardapur.store') }}" method="POST" class="d-flex align-items-center">
                @csrf
                <input type="text" name="nama_kategori" class="form-control ms-1 mb-1 me-2 rounded-3" id="nama_kategori" aria-describedby="emailHelp" placeholder="Inputkan Kategori....">
                <input type="hidden" value="-" class="form-control" id="description" name="description" placeholder="masukkan Deskripsi...">
                <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center" data-mdb-ripple-color="dark">
                    <i class="fa-regular fa-floppy-disk me-1"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>
    <table class="table table-striped table-rounded" id="table">
        <thead class="bg-secondary text-light">
            <tr>
                <th>no</th>
                <th>kategori</th>
                <th>tanggal buat</th>
                <th>tangal update</th>
                <th>aksi</th>
            </tr>
        </thead>
        <tbody class="table-active border-light">
            @foreach ($kategori_seputardapur as $item )
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $item->nama_kategori }}</td>
                <td>{{ $item->created_at }}</td>
                <td>{{ $item->updated_at }}</td>
                  <td>
                                {{-- <div class="d-flex">
                                <!-- Button trigger modal --> --}}
                                <button type="button" class="btn btn-outline-success btn-sm rounded-5 edit-btn" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal{{ $item->id }}">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </button>
                                <form action="{{ route('kategori_seputardapur.destroy', $item->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-5" data-mdb-ripple-color="dark" onclick="return confirm('Apakah Anda Yakin Menghapus Kategori Seputar Dapur? Ini?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                                <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Seputar Dapur</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('kategori_seputardapur.update', $item->id) }}" method="post">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="mb-3">
                                                            <label for="nama_kategori" class="form-label">Kategori Sputar Dapur </label>
                                                            <div class="col-sm-10">
                                                                <input type="text" class="form-control"
                                                                    @error('nama_kategori')
                                                      @enderror
                                                                    name="nama_kategori" value="{{ $item->nama_kategori }}"
                                                                    id="nama_kategori" placeholder="Inputkan Kategori....">
                                                                @error('nama_kategori')
                                                                    <div class="alert alert-danger mt-2">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary  rounded-5 mb-1 zoom-effects d-flex align-items-center" data-mdb-ripple-color="dark"> <i class="fa-regular fa-floppy-disk me-1"></i>Save</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection





{{--
    <div class="card container my-5">
        <div class="card-header bg-dark text-white">
            <h4 class="text-center">Kategori Seputar dapur</h4>
        </div>


        <div class="card-body">
            <form method="POST" action="{{ route('kategori_seputardapur.store') }}">
                @csrf

                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori Seputar Dapur</label>
                    <input type="text" class="form-control" @error('nama_kategori') @enderror name="nama_kategori"
                        id="nama_kategori" placeholder="Inputkan Kategori....">
                    @error('nama_kategori')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-secondary">Simpan </button>
            </form>
        </div> --}}
