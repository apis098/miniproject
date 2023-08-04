@extends('layouts.navbar')
@section('konten')
<div class="container">
    <div class="col mt-5">
        <div class="mb-3 row">
            <form action="{{route('seputar_dapur.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3 row">
                    <label for="foto" class="col-sm-2 col-form-label">input foto</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" @error('foto')
                        @enderror
                            name="foto" value="{{ old('foto') }}" id="foto"
                            placeholder="Inputkan Foto Produk....">
                        @error('foto')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="judul" class="col-sm-2 col-form-label">input judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="judul" id="judul">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="kategori_produk" class="col-sm-2 col-form-label">input kategori</label>
                    <div class="col-sm-10">
                        <select name="kategori_id" @error('kategori_id')
                        @enderror id="kategori_produk" class="form-control">
                            <option value="{{ old('kategori_id') }}">-----</option>
                            @foreach ($kategori_seputardapur as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_kategori }}</option>
                            @endforeach
                        </select>
                        @error('kategori_id')
          <div class="alert alert-danger mt-2">
            {{ $message }}
          </div>
          @enderror
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="isi" class="col-sm-2 col-form-label">input isi </label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="isi" @error('isi')
                            @enderror id="tiny"></textarea>
                        @error('isi')
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
        </div>
    </div>
</div>

<table class="table table-striped table-rounded" id="table">
    <thead class="bg-secondary text-light">
        <tr>
            <th>NO</th>
            <th>Foto</th>
            <th>Judul</th>
            <th>kategori</th>
            <th>isi</th>
            <th>Dibuat Pada:</th>
            <th>Terakhir Diupdate Pada:</th>
            <th>action</th>
        </tr>
    </thead>
    <tbody class="table-active border-light">
        @foreach ($seputar_dapur as $data)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    <img src="{{asset('storage/seputardapur/'.$data->foto) }}" class="card-img-top" alt="" style="width:90px">
                </td>
                <td>{{ $data->judul }}</td>
                <td>{{ $data->kategori_seputardapur->nama_kategori }}</td>
                <td>{{ $data->isi }}</td>
                <td>{{ $data->created_at }}</td>
                <td>{{ $data->updated_at }}</td>
                <td>
                    <button type="button" class="btn btn-outline-success btn-sm rounded-5 edit-btn" data-toggle="modal"
                        data-target="#exampleModal{{ $data->id }}"><i class="fa-solid fa-pen-clip"></i></button>
                    <form action="{{ route('seputar_dapur.destroy', $data->id) }}" method="POST" class="d-inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-5"
                            data-mdb-ripple-color="dark"
                            onclick="return confirm('Are you sure you want to delete this data?')"><i
                                class="fa-solid fa-trash-can"></i></button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection

