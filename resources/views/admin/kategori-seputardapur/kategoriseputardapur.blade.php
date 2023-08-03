@extends('layouts.navbar')
@section('konten')

  <!-- As a heading -->
     <!-- as a heading -->
     <div class="container mt-3">
<nav class="navbar bg-secondary text-white">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1">Form Tambah Data</span>
    </div>
  </nav>
  <!--tabel tambah data  -->

    <div class="card">
    <div class="card-body">
    <form method="POST" action="{{route('kategori_seputardapur.store')}}">
        @csrf
      <div class="mb-3 row">
        <label for="nama_kategori" class="col-sm-2 col-form-label">Kategori</label>
        <div class="col-sm-10">
          <input  type="text" class="form-control" @error('nama_kategori')
          @enderror name="nama_kategori" value="{{old('nama_kategori')}}" id="nama_kategori" placeholder="Inputkan Kategori....">
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
              tambahkan
            </button>
        </div>
      </div>
    </form>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
              Featured
            </div>
            <div class="card-body">
                <h2>Kategori Seputar Dapur </h2>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                  <table class="table">
                    <thead>
                      <tr>
                        <th scope="col">no</th>
                        <th scope="col">kategori</th>
                        <th scope="col">tanggal buat</th>
                        <th scope="col">tangal update</th>
                        <th scope="col">aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori_seputardapur as $seputardapur )
                      <tr>
                        <th scope="row"></th>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $seputardapur->nama_kategori }}</td>
                        <td>{{ $seputardapur->created_at }}</td>
                        <td>{{ $seputardapur->updated_at }}</td>
                        <td>
                            <form action="{{ route('kategori_seputardapur.destroy', $seputardapur->id) }}"
                                method="post">
                                @method('DELETE')
                                @csrf
                                <a href="{{ route('kategori_seputardapur.edit', $seputardapur->id) }}"
                                    class="btn btn-warning">Edit</a>
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Apakah Anda Yakin?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
            </div>
            <footer>
                <p>Hak Cipta © 2023 Humma Cook. All rights reserved.</p>
            </footer>
          </div>
        </div>
  </div>
</div>
     </div>
     @endsection
