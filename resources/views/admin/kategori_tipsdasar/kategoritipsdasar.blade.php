@extends('layouts.navbar')
@section('konten')
        {{-- heading --}}
    <div class="card container my-5">
        <div class="card-header bg-dark text-white">
            <h4 class="text-center"> Kategori Tips Dasar</h4>
        </div>
        {{--  tanbah data --}}
        <div class="card-body">
            <form action="/admin/kategori-tipsdasar" method="post">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori Tips Dasar</label>
                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                </div>
                <button type="submit" class="btn btn-secondary">Simpan</button>
            </form>
        </div>
        <div class="card-footer">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
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
                            <th scope="row">{{ $num += 1 }}</th>
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
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Tips Dasar</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kategori-tipsdasar/{{ $item->id }}" method="post">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="nama_kategori" class="form-label">Kategori Tips
                                                            Dasar</label>
                                                        <input type="text" value="{{ $item->nama_kategori }}"
                                                            class="form-control" id="nama_kategori" name="nama_kategori"
                                                            required>
                                                    </div>
                                                    <button type="submit" class="btn btn-dark-disable">Simpan</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <form action="/admin/kategori-tipsdasar/{{ $item->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin mau menghapus data kategori tips dasar?')">Hapus</button>
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
