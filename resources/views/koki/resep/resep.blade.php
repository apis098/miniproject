@extends('layouts.nav_koki')
@section('konten')
    <div class="card">
        <div class="card-header">
            <h3 class="text-center">CRUD Resep</h3>
        </div>
        <div class="card-body">
            <form action="/admin/resep" method="post" enctype="multipart/form-data">
                @csrf
                <div class="mb-3">
                    <label for="nama_masakan" class="form-label">Nama Masakan</label>
                    <input type="text" name="nama_masakan" id="nama_masakan" class="form-control" required>
                    @error('nama_masakan')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="foto_masakan" class="form-label">Foto Masakan</label>
                    <input type="file" name="foto_masakan" id="foto_masakan" class="form-control" required>
                    @error('foto_masakan')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tipsdasar_id" class="form-label">Kategori Tips Dasar*</label>
                    <select name="tipsdasar_id" id="tipsdasar_id" class="form-control">
                        <option value=""></option>
                        @foreach ($tips as $t)
                            <option value="{{ $t->id }}">{{ $t->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('tipsdasar_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="seputardapur_id" class="form-label">Kategori Seputar Dapur*</label>
                    <select name="seputardapur_id" id="seputardapur_id" class="form-control">
                        <option value=""></option>
                        @foreach ($dapur as $d)
                            <option value="{{ $d->id }}">{{ $d->nama_kategori }}</option>
                        @endforeach
                    </select>
                    @error('seputardapur_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="specialday_id" class="form-label">Hari Khusus*</label>
                    <select name="specialday_id" id="specialday_id" class="form-control">
                        <option value=""></option>
                        @foreach ($hari as $h)
                            <option value="{{ $h->id }}">{{ $h->name }}</option>
                        @endforeach
                    </select>
                    @error('specialday_id')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="deskripsi_masakan" class="form-label">Deskripsi Masakan</label>
                    <textarea name="deskripsi_masakan" id="deskripsi_masakan" cols="15" rows="5" class="form-control" required></textarea>
                    @error('deksripsi_masakan')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="bahan_masakan" class="form-label">Bahan Masakan</label> <br>
                    @foreach ($bahan as $b)
                        <input type="checkbox" class="form-checkbox" name="bahan_masakan[]" id="bahan_masakan"
                            value="{{ $b->id }}"> {{ $b->kategori_bahan }}
                    @endforeach
                </div>
                <div class="mb-3">
                    <label for="langkah2_memasak" class="form-label">Langkah-Langkah Memasak</label>
                    <textarea name="langkah2_memasak" id="editor" class="form-control" cols="30" rows="10" required></textarea>
                    @error('langkah2_memasak')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
        <div class="card-footer">
            <div class="row">
                @foreach ($resep as $r)
                    <div class="col-sm-12 col-md-6 col-lg-4">
                        <div class="card">
                            <div class="card-header">
                                <img width="100%" src="{{ asset('storage/' . $r->foto_masakan) }}" alt="">
                                <h3>
                                    {{ $r->nama_masakan }}
                                </h3>
                            </div>
                            <div class="card-body">
                                {{ $r->deskripsi_masakan }}
                                <br>

                                <button type="button"
                                    class="btn btn-light m-1 border">{{ $r->tipsdasar->nama_kategori }}</button>
                                @if ($r->seputardapur)
                                    <button type="button"
                                        class="btn btn-light m-1 border">{{ $r->seputardapur->nama_kategori }}</button>
                                @endif
                                @foreach ($r->kategori_bahan as $i)
                                    <button type="button" class="btn btn-light border m-1">
                                        {{ $i->kategori_bahan }}
                                    </button>
                                @endforeach
                                @if ($r->specialday)
                                    <button type="button"
                                        class="btn btn-light border m-1">{{ $r->specialday->name }}</button>
                                @endif
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-warning" style="width: 100%"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal{{ $r->id }}">
                                            Edit
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $r->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            Resep
                                                        </h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="/admin/resep/{{ $r->id }}" method="post"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="mb-3">
                                                                <label for="nama_masakan" class="form-label">Nama
                                                                    Masakan</label>
                                                                <input type="text" name="nama_masakan"
                                                                    id="nama_masakan" class="form-control"
                                                                    value="{{ $r->nama_masakan }}" required>
                                                                @error('nama_masakan')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="foto_masakan" class="form-label">Foto
                                                                    Masakan</label>
                                                                <input type="file" name="foto_masakan"
                                                                    id="foto_masakan" class="form-control"
                                                                    value="">
                                                                <img src="{{ asset('storage/' . $r->foto_masakan) }}"
                                                                    alt="" srcset="">
                                                                @error('foto_masakan')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="tipsdasar_id" class="form-label">Kategori Tips
                                                                    Dasar*</label>
                                                                <select name="tipsdasar_id" id="tipsdasar_id"
                                                                    class="form-control">

                                                                    <option value="{{ $r->tipsdasar_id }}">
                                                                        {{ $r->tipsdasar->nama_kategori }}</option>
                                                                    @foreach ($tips as $t)
                                                                        <option value="{{ $t->id }}">
                                                                            {{ $t->nama_kategori }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('tipsdasar_id')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="seputardapur_id" class="form-label">Kategori
                                                                    Seputar Dapur*</label>
                                                                <select name="seputardapur_id" id="seputardapur_id"
                                                                    class="form-control">
                                                                    @if ($r->seputardapur)
                                                                    <option value="{{ $r->seputardapur_id }}">
                                                                        {{ $r->seputardapur->nama_kategori }}</option>
                                                                    @else
                                                                        <option value=""></option>
                                                                    @endif

                                                                    @foreach ($dapur as $d)
                                                                        <option value="{{ $d->id }}">
                                                                            {{ $d->nama_kategori }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('seputardapur_id')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="specialday_id" class="form-label">Hari
                                                                    Khusus*</label>
                                                                <select name="specialday_id" id="specialday_id"
                                                                    class="form-control">
                                                                    @if ($r->specialday)
                                                                        <option value="{{ $r->specialday_id }}">{{ $r->specialday->name }}</option>
                                                                    @else
                                                                        <option value=""></option>
                                                                    @endif
                                                                    @foreach ($hari as $h)
                                                                        <option value="{{ $h->id }}">
                                                                            {{ $h->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('specialday_id')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="deskripsi_masakan"
                                                                    class="form-label">Deskripsi Masakan</label>
                                                                <textarea name="deskripsi_masakan" id="deskripsi_masakan" cols="15" rows="5" class="form-control">{{ $r->deskripsi_masakan }}</textarea>
                                                                @error('deksripsi_masakan')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="bahan_masakan" class="form-label">Bahan
                                                                    Masakan</label> <br>
                                                                <?php $arr = explode(',', $r->bahan_masakan); ?>
                                                                @foreach ($bahan as $i)
                                                                    <input type="checkbox" name="bahan_masakan[]"
                                                                        value="{{ $i->id }}"
                                                                        @if (in_array($i->id, $arr)) @checked(true) @endif>
                                                                    {{ $i->kategori_bahan }}
                                                                @endforeach
                                                            </div>
                                                            <div class="mb-3">
                                                                <label for="langkah2_memasak"
                                                                    class="form-label">Langkah-Langkah Memasak</label>
                                                                <textarea name="langkah2_memasak" id="editor" class="form-control" cols="30" rows="10" required>
                                                                    {{ $r->langkah2_memasak }}
                                                                </textarea>
                                                                @error('langkah2_memasak')
                                                                    <div class="alert alert-danger">
                                                                        {{ $message }}
                                                                    </div>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <form action="/admin/resep/{{ $r->id }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button style="width: 100%" type="submit" class="btn btn-danger"
                                                onclick="return confirm('Yakin mau menghapus data resep ini?')">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
