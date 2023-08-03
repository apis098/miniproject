@extends('layouts.navbar')
@section('konten')
    <div class="card container my-5">
        <div class="card-header">
            <h4 class="text-center">Edit Informasi Web</h4>
        </div>
        <div class="card-body">
            @foreach ($edit_tentang as $edit)
                <form action="/admin/edit-tentang/{{ $edit }}" method="post">
                    {{ csrf_field() }}
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ $edit->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea name="isi" id="isi" cols="30" rows="10" class="form-control" required>
                            {{ $edit->isi }}
                        </textarea>
                    </div>
                </form>
            @endforeach
        </div>
    </div>
@endsection
