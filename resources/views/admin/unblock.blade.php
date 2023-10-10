@extends('layouts.navbar')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
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

    .table-custom th:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .table-custom {
        width: 150%;
        text-align: center;
        border-collapse: separate;
        border-spacing: 0px 15px;
        margin-left: -8%;
    }

    .table-custom td {
        padding-top: 30px;
        padding-bottom: 30px;
        width: 210px;
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        border-left: none;
        border-right: none;
        top: 10px;
        overflow: hidden;
    }

    .table-custom th {
        padding: 10px;
        width: 210px;
        background-color: #F7941E;
        margin-bottom: 50px;
        color: #fff;
    }

    .table-custom thead {
        margin-bottom: 50px;
    }

    .table-custom td:first-child {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .table-custom td:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    .table-custom th:first-child {
        border-top-left-radius: 15px;
        border-bottom-left-radius: 15px;
    }

    .table-custom th:last-child {
        border-top-right-radius: 15px;
        border-bottom-right-radius: 15px;
    }

    tr {
        padding: 30px;
    }

    .yuhu {
        background: none;
        color: inherit;
        border: none;
        padding: 0;
        font: inherit;
        cursor: pointer;
        outline: inherit;
    }

    .btn-buat {
        border-radius: 10px;
        border: 0.50px black solid;
        position: relative;
        color: black;
        font-size: 15px;
        font-family: Poppins;
        font-weight: 500;
        letter-spacing: 0.40px;
        word-wrap: break-word;
        margin-left: -40%;
    }

    .btn-tambah {
        background: #F7941E;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 10px;
        color: #fff;
        font-size: 15px;
        font-family: Poppins;
        font-weight: 500;
        letter-spacing: 0.40px;
        word-wrap: break-word
    }




    .search {
        background-color: #fff;
        padding: 0px 10px;
        border-radius: 5px;
        width: 250px;
    }

    .search-1 {
        position: relative;
        width: 100%
    }

    .search-1 input {
        height: 45px;
        border: none;
        width: 100%;
        padding-left: 25px;
        padding-right: 10px;
        border-right: 2px solid #eee
    }

    .search-1 input:focus {
        border-color: none;
        box-shadow: none;
        outline: none
    }

    .search-1 i {
        position: absolute;
        top: 12px;
        left: 5px;
        font-size: 24px;
        color: #eee
    }

    ::placeholder {
        color: #eee;
        opacity: 1
    }

    .search-2 {
        position: relative;
        width: 100%;
        right: -18%;
    }

    .search-2 input {
        height: 35px;
        border: none;
        width: 100%;
        padding-left: 15px;
        padding-right: 100px;
    }

    .search-2 input:focus {
        border-color: none;
        box-shadow: none;
        outline: none
    }

    .search-2 i {
        position: absolute;
        top: 12px;
        left: -10px;
        font-size: 24px;
        color: #eee
    }

    .search-2 button {
        position: absolute;
        right: 4px;
        top: -2px;
        border: none;
        height: 38px;
        background-color: #F7941E;
        color: #fff;
        width: 70px;
        border-radius: 4px

    }


    @media (max-width:800px) {
        .search-1 input {
            border-right: none;
            border-bottom: 1px solid #eee
        }

        .search-2 i {
            left: 4px
        }

        .search-2 input {
        right: -20%;
        }

        .search-2 button {
            height: 37px;
            top: 5px
        }
    }

</style>
    <div class=" d-flex justify-content-start ms-3 ml-5" style="overflow-x:hidden">
        <div class="my-4 ml-5">
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
             <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                <table class="table-custom">
                    <thead>
                        <tr>
                            <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Nama pengguna</th>
                            <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Repitisi melanggar</th>
                            <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $data)
                            <tr>
                                <td style="border-left:1px solid black; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                                    {{ $data->name }}</td>
                                 <td style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                                        {{ $data->jumlah_pelanggaran }} kali</td>
                                <td style="border-right:1px solid black;">
                                    <div>
                                        <form action="{{ route('unblock.user.store', $data->id) }}" method="POST" id="unblock-form{{$data->id}}">
                                            @csrf
                                            @method('PUT')
                                            <button type="button" onclick="konfirmasi({{$data->id}})" id="unblock-button{{$data->id}}" class="btn text-white"
                                                    style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word; padding: 4px 22px;">
                                                Unblock
                                            </button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
                @forelse ($user as $data)
                @empty
                <div class="d-flex flex-column h-100 justify-content-center align-items-center mx-5">
                    <img src="{{ asset('images/data.png') }}" style="width: 20em;  margin-right: -250px;">
                    <p style="color: #1d1919; margin-right: -215px;"><b>Tidak ada data</b></p>
                </div>
                @endforelse
            </div>
        </div>
    </div>
  </div>
    {{-- end modal edit --}}

    {{-- <div style="margin-top: -5em;  margin-left: 10em;">
        {{$special_days->links('vendor.pagination.default')}}
        </div> --}}

    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    <script>
        function DeleteData() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus data ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-form').submit();
                            }
                        }, toast, 'buttonName');
                    }, false], // true to focus
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function(
                        instance, toast) {
                        instance.hide({}, toast, 'buttonName');
                    }]
                ],
                onOpening: function(instance, toast) {
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy) {
                    console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });
        }
        function konfirmasi(num){
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin melakukan unblock?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function (instance, toast) {
                        // Jika pengguna menekan tombol "Ya", kirim form
                        document.getElementById('unblock-form'+num).submit();
                    }],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function (instance, toast) {
                        instance.hide({ transitionOut: 'fadeOut' }, toast, 'button');
                    }],
                ],
            });
        }
    </script>
@endsection
