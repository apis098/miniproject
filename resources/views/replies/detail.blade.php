@extends('layouts.navbar')
@section('konten')
{{-- 
<div class="btn-toolbar mb-2 mt-5 mb-md-0">
    <div>
        <a href="{{ route('SpecialDays.index') }}" class="btn btn-primary rounded-3 zoom-effects" data-mdb-ripple-color="dark">
            <span data-feather="arrow-left-circle" class="align-text-bottom"></span>
            Kembali
        </a>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-7">
        <form method="POST" action="{{ route('ReplyComplaint.store', ['id' => $data->id]) }}">
            @csrf
            <div class="form-group mb-3">
              <label for="name" class="mb-2">Judul keluhan:</label>
              <input type="text" readonly value="{{$data->subject}}" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
            </div>
            <div class="form-group mb-3">
              <label for="description" class="mb-2">Deskripsi keluhan:</label>
              <input type="text" readonly value="{{$data->description}}" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi...">
            </div>
            @foreach($replies as $r)
            <div class="form-group mb-3">
                <label for="description" class="mb-2">Solusi dari:{{$r->user->name}}</label>
                <input type="text" readonly  value="{{$r->reply}}" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi...">
              </div>
            @endforeach
            <div class="form-group mb-3">
              <label for="description" class="mb-2">Beri solusi keluhan ini</label>
              <input type="text" class="form-control" id="reply" name="reply" placeholder="Berikan solusi...">
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-paper-plane"></i></button>
          </form>
    </div>
</div>
@endsection