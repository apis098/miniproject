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
                <form action="/admin/kategori-bahan" method="post">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="card-footer">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kategori</th>
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
                                <td>{{ $item_bahan->created_at }}</td>
                                <td>{{ $item_bahan->updated_at }}</td>
                                <td>
                                    <div class="d-flex">
                                        <form action="/admin/kategori-bahan/{{ $item_bahan->id }}/edit" method="get">
                                            <button type="submit" class="btn btn-warning me-2">Edit</button>
                                        </form>
                                        <form action="/admin/kategori-bahan/{{ $item_bahan->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data kategori bahan masakan ini?')">Hapus</button>
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
