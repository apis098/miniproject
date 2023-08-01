@extends('layouts.app2')

<div class="btn-toolbar mb-2 mb-md-0">
    <div>
        <a href="{{ route('special_days.index') }}" class="btn btn-primary rounded-3 zoom-effects" data-mdb-ripple-color="dark">
            <span data-feather="arrow-left-circle" class="align-text-bottom"></span>
            Kembali
        </a>
    </div>
</div>


@section('content')
<div class="row">
    <div class="col-md-7">
        <form method="POST" action="{{ route('special_days.store') }}">
            @csrf
            <div class="form-group mb-3">
              <label for="name" class="mb-2">Nama Hari Spesial</label>
              <input type="text" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
            </div>
            <div class="form-group mb-3">
              <label for="description" class="mb-2">Deskripsi</label>
              <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi...">
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
          </form>
    </div>
</div>
@endsection