@extends('layouts.navbar')
@section('konten')
    <!-- as a heading -->
    <div class="card container my-5">
        <div class="card-header bg-dark text-white">
            <h4 class="text-center">Kategori Seputar dapur</h4>
        </div>

        <!-- tambah data  -->
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
        </div>

            <div class="card-footer">
                <table class="table table-striped table_bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">no</th>
                            <th scope="col">kategori</th>
                            <th scope="col">tanggal buat</th>
                            <th scope="col">tangal update</th>
                            <th scope="col">aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori_seputardapur as $item)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $item->nama_kategori }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td>
                                  <div class="d-flex">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal{{ $item->id }}">
                                        Edit
                                    </button>

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
                                                        <button type="submit" class="btn btn-dark-disable">Simpan</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="{{ route('kategori_seputardapur.destroy', $item->id) }}" method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger"
                                            onclick="return confirm('Apakah Anda Yakin Menghapus Kategori Seputar Dapur? Ini?')">Hapus</button>
                                    </form>
                                </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection
