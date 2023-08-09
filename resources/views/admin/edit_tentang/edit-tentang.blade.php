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
    <script src="https://cdn.tiny.cloud/1/rzvl4yudi4uzx142mzepqiwplu6stooxorzg2ft7a6xyzqn7/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
          selector: '#textarea',
          plugins: 'anchor autolink charmap codesample emoticons image lists media searchreplace table visualblocks wordcount',
          toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
      </script>
@endsection
