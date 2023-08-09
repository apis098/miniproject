@extends('layouts.navbar')
@section('konten')
            @push('style')
            @powerGridStyles
            @endpush
<style>
    .table-rounded {
        border-collapse: separate;
        border-radius: 10px;
        border-color: black;

    }

    .table-rounded thead th:first-child {
        border-top-left-radius: 10px;
    }

    .table-rounded thead th:last-child {
        border-top-right-radius: 10px;
    }

    .table-rounded tbody tr:last-child td:first-child {
        border-bottom-left-radius: 10px;
    }

    .table-rounded tbody tr:last-child td:last-child {
        border-bottom-right-radius: 10px;
    }

    .btn-group-vertical {
        display: flex;
        flex-direction: column;
    }

    .zoom-effects:hover {
        transform: scale(0.97);
    }
</style>
        {{-- heading --}}
        <div class="mt-3 ml-3">
            <h2 class="text-dark"><b>{{ $title }}</b></h2>
            <hr />
        </div>
     <div class="mb-2 mt-1 mb-md-1">
        <label for="name" class="mb-1 ms-2 text-secondary">Tambah Data:</label>
        <div>
            <form action="{{ route('kategori-tipsdasar.store') }}" method="POST" class="d-flex align-items-center">
                @csrf
                <input type="text" name="nama_kategori" class="form-control ms-1 mb-1 me-2 rounded-3" id="nama_kategori" aria-describedby="emailHelp" placeholder="Inputkan Kategori....">
                <input type="hidden" value="-" class="form-control" id="description" name="description" placeholder="masukkan Deskripsi...">
                <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center" data-mdb-ripple-color="dark">
                    <i class="fa-regular fa-floppy-disk me-1"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>
    <table class="table table-striped table-rounded" id="table">
        <thead class="bg-secondary text-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Tanggal Dibuat</th>
                        <th scope="col">Tanggal Update Terakhir</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-active border-light">
                    @foreach ($kategori as $num => $item)
                        <tr>
                            <th scope="row">{{ $num += 1 }}</th>
                            <td>{{ $item->nama_kategori }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->updated_at }}</td>
                            <td>
                                {{-- <div class="d-flex"> --}}
                                <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-outline-success btn-sm rounded-5 edit-btn" data-bs-toggle="modal"
                                       data-bs-target="#exampleModal{{ $item->id }}">
                                    <i class="fa-solid fa-pen-clip"></i>
                                </button>
                                <form action="{{ route('kategori-tipsdasar.destroy', $item->id) }}" method="post" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-5" data-mdb-ripple-color="dark" onclick="return confirm('Apakah Anda Yakin Menghapus Kategori Seputar Dapur? Ini?')"><i class="fa-solid fa-trash-can"></i></button>
                                </form>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{ $item->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Kategori Tips Dasar</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="/admin/kategori-tipsdasar/{{ $item->id }}" method="post">
                                                    {{ csrf_field() }}
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="nama_kategori" class="form-label">Kategori Tips
                                                            Dasar</label>
                                                        <input type="text" value="{{ $item->nama_kategori }}"
                                                            class="form-control" id="nama_kategori" name="nama_kategori"
                                                            required>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary  rounded-5 mb-1 zoom-effects d-flex align-items-center" data-mdb-ripple-color="dark"> <i class="fa-regular fa-floppy-disk me-1"></i>Save</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
