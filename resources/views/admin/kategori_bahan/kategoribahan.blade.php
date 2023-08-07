@extends('layouts.navbar')

@section('konten')

<br>
        <div class="card">
            <div class="card-header bg-warning text-white">
                <h3 class="text-center">CRUD Kategori Bahan</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form action="/admin/kategori-bahan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">

                    <label for="kategori_bahan" class="form-label">Nama Kategori Bahan</label>
                    <input type="text" name="kategori_bahan" id="kategori_bahan" class="form-control" required>
                    @error('kategori_bahan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto" class="form-label">Foto Bahan</label>
                    <input type="file" name="foto" id="foto" class="form-control" required>
                    @error('foto')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="card-footer">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Foto Bahan</th>
                        <th scope="col">Tanggal Buat</th>
                        <th scope="col">Tanggal Update</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
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
                                    <button type="button" class="btn btn-warning mx-1" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item_bahan->id }}">
                                        Edit
                                    </button>

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
                                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="/admin/kategori-bahan/{{ $item_bahan->id }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Yakin mau menghapus data kategori bahan masakan ini?')">Hapus</button>
                                    </form>
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
