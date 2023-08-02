@extends('admin.navbar')
@section('konten')
<form action="/admin/kategori-bahan/{{ $edit->id }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="kategori_bahan" class="form-label">Nama Kategori Bahan</label>
        <input type="text" name="kategori_bahan" value="{{ $edit->kategori_bahan }}" id="kategori_bahan" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
</form>
@endsection