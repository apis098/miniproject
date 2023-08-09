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
      <div class="mt-3 ml-3">
        <h2 class="text-dark"><b>{{ $title }}</b></h2>

    </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <div class=" mb-2 mt-1 mb-md-1">
                <form action="/admin/kategori-bahan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">

                    <label for="kategori_bahan" class="form-label">Nama Kategori Bahan :</label>
                    <input type="text" name="kategori_bahan" id="kategori_bahan" class="form-control ms-1 mb-1 me-2 rounded-3" required>
                    @error('kategori_bahan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Bahan :</label>
                    <input type="file" name="foto" id="foto" class="form-control ms-1 mb-1 me-2 rounded-3" required>
                    @error('foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center"><i class="fa-regular fa-floppy-disk me-1" data-mdb-ripple-color="dark"></i>Submit</button>
            </form>
                </div>
        </div>
        <div class="card-footer">
            <table class="table table-striped table-rounded" id="table">
                <thead class="bg-secondary text-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Foto Bahan</th>
                        <th scope="col">Tanggal Buat</th>
                        <th scope="col">Tanggal Update</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-active border-light">
                    @foreach ($kategori_bahans as $num => $item_bahan)
                        <tr>
                            <th scope="row">{{ $num + 1 }}</th>
                            <td>{{ $item_bahan->kategori_bahan }}</td>
                            <td>
                                <img src="{{ asset('storage/'.$item_bahan->foto) }}" alt="{{ $item_bahan->foto }}" width="50px" height="50px">
                            </td>
                            <td>{{ $item_bahan->created_at }}</td>
                            <td>{{ $item_bahan->updated_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-success btn-sm rounded-5 edit-btn" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item_bahan->id }}">
                                        <i
                                        class="fa-solid fa-pen-clip"></i>
                                    </button>
                                    <form action="/admin/kategori-bahan/{{ $item_bahan->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-5" style="margin-left: 2px" data-mdb-ripple-color="dark"
                                            onclick="return confirm('Yakin mau menghapus data kategori bahan masakan ini?')"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                    </form>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{ $item_bahan->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Bahan</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('kategori-bahan.update', $item_bahan->id) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="mb-3">
                                                            <label for="kategori_bahan" class="form-label">Nama Kategori
                                                                Bahan</label>
                                                            <input type="text" name="kategori_bahan"
                                                                value="{{ $item_bahan->kategori_bahan }}" id="kategori_bahan"
                                                                class="form-control" required>
                                                            @error('kategori_bahan')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="foto" class="form-label">Foto Bahan</label>
                                                            <input type="file" class="form-control" name="foto"
                                                                id="foto">
                                                            <img src="{{ asset('storage/' . $item_bahan->foto) }}" width="50px"
                                                                height="50px" alt="">
                                                            @error('foto')
                                                                <div class="alert alert-danger">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <button type="submit" class="btn btn-primary  rounded-5 mb-1 zoom-effects d-flex align-items-center" data-mdb-ripple-color="dark"><i class="fa-regular fa-floppy-disk me-1"></i>Save</button>
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
    </div>
@endsection
