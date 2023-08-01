@extends('layouts.app')

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
    .zoom-effects:hover{
        transform: scale(0.97); 
    }
</style>

    <div class="btn-toolbar mb-2 mb-md-0">
        <div>
            <button class="btn btn-dark mb-3 zoom-effects" data-mdb-ripple-color="dark" onclick="deleteSelected()">
                <span data-feather="trash-2" class="align-text-bottom me-1"></span>
                Hapus Data
            </button>
        </div>  
        <div style="margin-left: 1%">
            <a href="{{ route('special_days.create') }}" class="btn btn-primary mb-3 zoom-effects" data-mdb-ripple-color="dark" >
                <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
                Tambah Data 
            </a>
        </div>

       
    </div>
    <table class="table table-striped table-rounded" id="table">
        <thead class="bg-secondary text-light">
            <tr>
                <th><input type="checkbox" id="select-all"></th>
                <th>NO</th>
                <th>Nama Hari Special</th>
                <th>description</th>
                <th>action</th>
                </tr>
        </thead>
        <tbody class="table-active">
            @foreach ($data as $row)
                <tr>
                    <td>
                        <input type="checkbox" name="selected_ids[]" class="data-checkbox" data-id="{{ $row->id }}">
                    </td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->description }}</td>
                    <td>
                        <div class="btn-group-vertical">
                            <form action="{{ route('special_days.edit', ['id' => $row->id]) }}">
                                <button type="submit" class="btn btn-outline-success btn-sm rounded-5" data-mdb-ripple-color="dark"><span data-feather="edit-3"
                                        class="align-text-bottom me-1"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
    {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>


@push('script')
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    @powerGridScripts
    <script>
        $('#select-all').on('change', function() {
            $('.data-checkbox').prop('checked', this.checked);
        });

        $('.data-checkbox').on('change', function() {
            const totalData = $('.data-checkbox').length;
            const totalChecked = $('.data-checkbox:checked').length;

            $('#select-all').prop('checked', totalChecked === totalData);
        });

        function deleteSelected() {
            const selectedIds = $('.data-checkbox:checked')
                .map(function() {
                    return this.getAttribute('data-id');
                })
                .get();

            if ($('#select-all').prop('checked')) {
                $('.data-checkbox').prop('checked', true);
            } else {
                $('.data-checkbox').prop('checked', false);
            }


            if (selectedIds.length === 0) {
                alert("Pilih setidaknya satu data yang akan dihapus.");
                return;
            }

            if (confirm("Anda yakin ingin menghapus data terpilih?")) {
                const deleteUrl = "{{ route('special_days.delete.multiple') }}";
                const csrfToken = "{{ csrf_token() }}";

                $.ajax({
                    type: 'POST',
                    url: deleteUrl,
                    data: {
                        _token: csrfToken,
                        ids: selectedIds
                    },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        alert("Terjadi kesalahan saat menghapus data.");
                        console.log(xhr.responseText);
                    }
                });
            }
        }
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endpush

{{-- @extends('layouts.app')

@push('style')
@powerGridStyles
@endpush

@section('buttons')
<div class="btn-toolbar mb-2 mb-md-0">
    <div>
        <a href="{{ route('holidays.create') }}" class="btn btn-sm btn-primary">
            <span data-feather="plus-circle" class="align-text-bottom me-1"></span>
            Tambah Data Hari Libur
        </a>
    </div>
</div>
@endsection

@section('content')
@include('partials.alerts')
<livewire:holiday-table />
@endsection

@push('script')
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
@powerGridScripts
@endpush --}}       