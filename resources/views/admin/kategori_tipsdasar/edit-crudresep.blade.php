@extends('layouts.navbar')
@section('konten')
    <div class="card container my-5">
        <div class="card-header">
            <h3 class="text-center">Edit Kategori Tips Dasar</h3>
        </div>
        <div class="card-body">
            <form action="/admin/kategori-tipsdasar/{{ $edit->id }}" method="post">
                {{ csrf_field() }}
                @method('PUT')
                <div class="mb-3">
                    <label for="nama_kategori" class="form-label">Kategori Tips Dasar</label>
                    <input type="text" value="{{ $edit->nama_kategori }}" class="form-control" id="nama_kategori" name="nama_kategori" required>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
@endsection