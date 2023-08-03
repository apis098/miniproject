@extends('layouts.navbar')
@section('konten')
    <div class="card container my-5">
        <div class="card-header">
            <h4 class="text-center">CRUD Kategori Tips Dasar</h4>
        </div>
        <div class="card-body">
            <form action="/admin/kategori-tipsdasar" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori Tips Dasar</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="card-footer">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Tanggal Update Terakhir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $num => $item)
                        <tr>
                            <th scope="row">{{ $num+=1 }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                <form action="/admin/kategori-tipsdasar/{{ $item->id }}/edit" method="get">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                            </td>
                            <td>
                                <form action="/admin/kategori-tipsdasar/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin mau menghapus data kategori tips dasar?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
