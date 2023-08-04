@extends('layouts.navbar')
@section('konten')
<script src="https://cdn.tiny.cloud/1/6sspi2ldznrch56a9xp1iqm46ftkai99rr2g0rm424yq2k4m/tinymce/6/tinymce.min.js"
referrerpolicy="origin"></script>
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
<script>
    tinymce.init({
        selector: 'textarea',
        plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Author name',
        mergetags_list: [{
                value: 'First.Name',
                title: 'First Name'
            },
            {
                value: 'Email',
                title: 'Email'
            },
        ],
        ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
            "See docs to implement AI Assistant"))
    });
</script>

<div class="container">
    @foreach ($seputar_dapur as $item )
    <div class="card" style="width: 18rem;">
        <img src="{{asset('storage/seputardapur/'.$item->foto) }}" class="card-img-top" alt="">
        <div class="card-body">
          <h5 class="card-title">{{ $item->judul }}</h5>
          <p class="card-text"> {!! $item->isi !!} </p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item">{{ $item->kategori_seputardapur->nama_kategori }}</li>

        </ul>
        <div class="card-body">
            <form action="{{ route('seputar_dapur.destroy', $item->id) }}"
                method="post">
                @method('DELETE')
                @csrf
                <a href="{{ route('seputar_dapur.edit', $item->id) }}"
                    class="btn btn-warning">Edit</a>
                <button type="submit" class="btn btn-danger"
                    onclick="return confirm('Apakah Anda Yakin Menghapus Data Ini?')">Hapus</button>
            </form>
        </div>
      </div>
    </div>
      @endforeach
@endsection
