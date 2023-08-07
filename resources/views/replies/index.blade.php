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
                        <form action="{{route('ShowReplies.show', $row->id)}}" method="get">
                            @csrf
                        <button type="submit" class="btn btn-outline-primary btn-sm rounded-5 edit-btn" data-complaint-id="{{ $row->id }}" data-toggle="modal"
                           ><i class="fa-regular fa-comment-dots"></i> Tampilkan Pesan Balasan</button>
                        </form>    
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @foreach ($data as $row)
        @if ($row->id != '')
            {{-- modal edit --}}
            <div class="modal fade" id="repliesModal" tabindex="-1" role="dialog" aria-labelledby="repliesModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="repliesModalLabel">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="replyData">
                
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
    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        $(document).ready(function() {
            $('#buttonModal').on('click', function() {
                var complaintId = $(this).data('complaint-id');

                $.ajax({
                    url: '/show-reply-by/' + complaintId,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        $('#replyData').html(data); // Memasukkan data balasan ke dalam modal
                        $('#repliesModal').modal('show'); // Menampilkan modal
                    },
                    error: function() {
                        // Tampilkan pesan error jika data balasan tidak berhasil dimuat
                        $('#replyData').html('<p>Failed to load replies.</p>');
                        $('#repliesModal').modal('show');
                    }
                });
            });
        });
    </script>
@endsection
