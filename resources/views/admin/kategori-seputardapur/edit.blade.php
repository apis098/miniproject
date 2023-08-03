@extends('layouts.navbar')
@section('konten')

  <!-- As a heading -->
     <!-- as a heading -->
     <div class="container mt-3">
<nav class="navbar bg-secondary text-white">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Form edit Data</span>
    </div>
  </nav>
  <!--tabel tambah data  -->

    <div class="card">
    <div class="card-body">
    <form method="POST" action="{{route('kategori_seputardapur.update',$kategori_seputardapur->id)}}">
        @csrf
        @method('PUT')
      <div class="mb-3 row">
        <label for="nama_kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <input  type="text" class="form-control" @error('nama_kategori')
          @enderror name="nama_kategori" value="{{ $kategori_seputardapur->nama_kategori }}" id="nama_kategori" placeholder="Inputkan Kategori....">
          @error('nama_kategori')
              <div class="alert alert-danger mt-2">
                {{ $message }}
              </div>
              @enderror
        </div>
      </div>

      <div class="mb-3 row mt-4">
        <div class="col">
            <button type="submit" class="btn btn-secondary">
              edit
            </button>
          <a href="{{route('kategori_seputardapur.index')}}" type="button" class="btn btn-danger">
            Batal
          </a>
        </div>
      </div>
    </form>
  </div>
</div>
     </div>

@endsection
