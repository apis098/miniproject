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
    <div class="mt-3 ml-3">
        <h2 class="text-dark"><b>{{ $title }}</b></h2>
        <hr />
    </div>
    <div class=" mb-2 mt-1 mb-md-1">
        <label for="name" class="mb-1 ms-2 text-secondary">Tambah Data:</label>
        <div>
            <form method="POST" action="{{ route('BasicTips.store') }}" class="d-flex align-items-center">
                @csrf
                <input type="text" class="form-control ms-1 mb-1 me-2 rounded-3" id="name" name="name"
                    aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
                <input type="hidden" value="-" class="form-control" id="description" name="description"
                    placeholder="Masukkan Deskripsi...">
                <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center"
                    data-mdb-ripple-color="dark">
                    <i class="fa-regular fa-floppy-disk me-1"></i>
                    Submit
                </button>
            </form>
        </div>
    </div>
    <table class="table table-striped table-rounded" id="table">
        <thead class="bg-secondary text-light">
            <tr>
                <th>NO</th>
                <th>Nama user   </th>
                <th>Subjek</th>
                <th>Deskripsi</th>
                <th>Balasan</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody class="table-active border-light">
            @foreach ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->user->name}}</td>
                    <td>{{ $row->subject }}</td>
                    <td>{{ $row->description }}</td>
                    <td>{{ $row->balasan }}</td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm rounded-5 edit-btn" data-toggle="modal"
                            data-target="#exampleModal{{ $row->id }}"><i class="fa-regular fa-comment-dots"></i> Balas Pesan</button>
                        {{-- <form action="{{ route('BasicTips.destroy', $row->id) }}" method="POST" class="d-inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-5"
                                data-mdb-ripple-color="dark"
                                onclick="return confirm('Are you sure you want to delete this data?')"><i
                                    class="fa-solid fa-trash-can"></i></button>
                        </form> --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($data as $row)
        @if ($row->id != '')
            {{-- modal edit --}}
            <div class="modal fade" id="exampleModal{{ $row->id }}" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Form Balasan Pesan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('ComplaintUser.update', $row->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name" class="col-form-label">Pesan Balasan:</label>
                                    <input type="text"  class="form-control" name="balasan"
                                        id="balasan">
                                </div>
                                <div class="form-group">
                                    <input type="text" hidden  value="{{ $row->description }}" class="form-control" name="description"
                                        id="description">
                                </div>
                                <div class="form-group">
                                    <input type="text" hidden value="sudah" class="form-control" name="status"
                                        id="status">
                                </div>
                                <div class="form-group">
                                    <input type="text" hidden value="{{ $row->subject }}" class="form-control" name="subject"
                                        id="subject">
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit"
                                class="btn btn-primary  rounded-5 mb-1 zoom-effects d-flex align-items-center"
                                data-mdb-ripple-color="dark">
                                Kirim <i class="fa-solid fa-paper-plane"></i>
                            </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- end modal edit --}}
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
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
@endsection
