@extends('layouts.navbar')
@section('konten')
    <div class="card container my-5">
        <div class="card-header">
            <h4 class="text-center">Edit Informasi Web</h4>
        </div>
        <div class="card-body">
            @foreach ($edit_tentang as $edit)
                <form action="/admin/edit-tentang/{{ $edit->id }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" name="judul" id="judul" class="form-control" value="{{ $edit->judul }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="isi" class="form-label">Isi</label>
                        <textarea name="isi" id="textarea" cols="30" rows="10" class="form-control" required>
                            {{ $edit->isi }}
                        </textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            @endforeach
        </div>
    </div>
    <!-- include libraries(jQuery, bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('textarea').summernote();
        });
    </script>
@endsection
