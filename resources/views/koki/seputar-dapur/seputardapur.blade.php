@extends('layouts.nav_koki')
@section('konten')





<div class="card bg-white mt-3 ml-3">
    <h2 class="text-black text-center"> Seputar Dapur</h2>
</div>

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
                            @enderror id="isi" rows="5"></textarea>
                        @error('isi')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3 row mt-4">
                    <div class="col">
                        <button type="submit" class="btn btn-secondary rounded-5 mb-1 zoom-effects d-flex align-items-center"
                            data-mdb-ripple-color="dark">
                            <i class="fa-regular fa-floppy-disk me-1"></i>   Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="table-responsive">
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
                    <img src="{{asset('storage/public/seputardapur/'.$data->foto) }}" class="card-img-top" alt="" style="width:90px">
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
</div>


@foreach ($seputar_dapur as $item)
@if ($item->id != '')
    {{-- modal edit --}}
    <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Form Edit Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('seputar_dapur.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3 row">
                            <label for="foto" class="col-sm-2 col-form-label">Input Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" @error('foto')
                                @enderror name="foto" id="foto" accept="image/*">
                                <img src="{{ asset('storage/public/seputardapur/'.$item->foto) }}" class="rounded" style="width: 150px">
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
                                <input type="text" class="form-control" value="{{ $item->judul }}" name="judul" id="judul">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="kategori" class="col-sm-2 col-form-label">input kategori</label>
                            <div class="col-sm-10">
                                <select name="kategori_id" @error('kategori_id')
                                @enderror id="kategori" class="form-control">
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($kategori_seputardapur as $data)
                                    <option
                                    {{ $data->id ? 'selected' : ''}} value="{{ $data->id }}">{{ $data->nama_kategori }}
                                     </option>

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
                                <textarea class="form-control" rows="5" name="isi" @error('isi')
                                    @enderror id="isi">{{ $item->isi }}</textarea>
                                @error('isi')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"
                        class="btn btn-primary  rounded-5 mb-1 zoom-effects d-flex align-items-center"
                        data-mdb-ripple-color="dark">
                        <i class="fa-regular fa-floppy-disk me-1"></i>
                        Save
                    </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endif
@endforeach
{{-- end modal edit --}}
@endsection
<script>
    $(document).ready(function() {
        $('#search').on('input', function() {
            var value = $(this).val().toLowerCase();
            $('#table tbody tr').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
