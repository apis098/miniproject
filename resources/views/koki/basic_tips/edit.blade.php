@extends('layouts.navbar')
@section('konten')

<div class="btn-toolbar mb-2 mt-5 mb-md-0">
    <div>
        <a href="{{ route('BasicTips.index') }}" class="btn btn-primary rounded-3 zoom-effects" data-mdb-ripple-color="dark">
            <span data-feather="arrow-left-circle" class="align-text-bottom"></span>
            Kembali
        </a>
    </div>
</div>

<div class="row">
    <div class="col-md-7">
        <form method="POST" action="{{ route('BasicTips.update', ['id' => $data->id]) }}">
            @csrf
            @method('put')
            <div class="form-group mb-3">
              <label for="name" class="mb-2">Nama Tips Dasar</label>
              <input type="text" value="{{$data->name}}" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
            </div>
            <div class="form-group mb-3">
              <label for="description" class="mb-2">Deskripsi</label>
              <input type="text" value="{{$data->description}}" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi...">
            </div>

            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div>
@endsection
