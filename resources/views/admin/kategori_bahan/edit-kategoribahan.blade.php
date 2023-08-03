@extends('layouts.navbar')
@section('konten')
    <form action="{{ route('kategori-bahan.update', $edit->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="kategori_bahan" class="form-label">Nama Kategori Bahan</label>
            <input type="text" name="kategori_bahan" value="{{ $edit->kategori_bahan }}" id="kategori_bahan"
                class="form-control" required>
            @error('kategori_bahan')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto Bahan</label>
            <input type="file" class="form-control" name="foto" id="foto">
            <img src="{{ asset('storage/'.$edit->foto) }}" width="50px" height="50px" alt="">
            @error('foto')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
