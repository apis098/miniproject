@extends('layouts.nav_koki')

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


        .modal-body {
            background-color: #F8DE22;
            border-color: #F8DE22;
        }

        .intro-1 {
            font-size: 20px
        }

        .close {
            color: #fff
        }

        .close:hover {
            color: #fff
        }

        .intro-2 {
            font-size: 13px
        }

    </style>
    <div class="card bg-white mt-3 ml-3">
        <h2 class="text-dark"><b>{{ $title }}</b></h2>
        <div class="container mb-2 mt-1 mb-md-1">
        <div class="col mt-5">
            <div class="mb-3 row">
    </div>
    {{-- <div class=" mb-2 mt-1 mb-md-1">
        <label for="name" class="mb-1 ms-2 text-secondary">Tambah Data:</label>
        <div>
            <form method="POST" action="{{ route('ComplaintUser.store') }}" class="d-flex align-items-center">
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
    </div> --}}
    <div class="table-responsive">
    <table class="table table-striped table-rounded" id="table">
        <thead class="bg-dark text-wgite">
            <tr>
                <th>NO</th>
                <th>Username</th>
                <th>Subjek</th>
                <th>Deskripsi</th>
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
                    <td>
                        <div class="ms-1">
                            <button type="button" class="btn btn-outline-primary btn-sm rounded-5 edit-btn"
                                data-toggle="modal" data-target="#complaintModal{{ $row->id }}">Beri solusi</button>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($data as $row)
        @if ($row->id != '')
        <div class="modal fade" id="complaintModal{{ $row->id }}" data-backdrop="static" data-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content rounded-5">
                    <div class="modal-body rounded-4">
                        <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="text-center mt-2"> <img src="{{ asset('images/modal.png') }}"
                                        width="320"> </div>
                            </div>
                            <div class="col-md-6">
                                <div class="text-white fw-semibold mt-4">
                                    <div class="mt-2"> <span class="intro-2">Judul keluhan:</span> </div>
                                    <span class="intro-1">{{ $row->subject }}</span>
                                    {{-- <div class="mt-2"> <span class="intro-2">Balasan yang anda kirim:</span> </div>
                                    <span class="intro-1">test</span> --}}
                                    <form action="{{ route('ReplyComplaint.store', $row->id) }}" method="POST">
                                        @csrf
                                        <div class="mt-2"> <span class="intro-2">Beri solusi:</span> </div>
                                        <input type="text" class="form-control rounded-3 mt-2" name="reply" id="reply">

                                        <div class="mt-4 mb-3">
                                            <button type="submit" class="btn btn-primary btn-sm rounded-5">Kirim <i class="fa-solid fa-paper-plane"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
