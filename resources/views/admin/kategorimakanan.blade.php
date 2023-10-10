@extends('layouts.navbar')
@section('konten')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">

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
            text-align: center;
            width: 100%
        }

        .table-custom {
            width: 210%;
            text-align: center;
            border-collapse: separate;
            border-spacing: 0px 15px;
            margin-left: -40%;
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

        /* .table-custom thead {
                                background: #F7941E;
                                margin-bottom: 10%;
                                color: white;
                            } */

        /* .table-custom tr:not(.thead) {
                            margin-top: 10px;
                            margin-bottom: 10px;
                            border: 2px solid black;
                        } */

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
            width: 100%
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

        /* button{
                        background-color: #F7941E;
                        border: none;
                        height: 45px;
                        width: 90px;
                        color: #ffffff;
                        position: absolute;
                        right: 1px;
                        top: 0px;
                        border-radius: 15px
                    } */
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
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>
    <div class=""  style="overflow-x:hidden">
    <div class=" d-flex" style="margin-left: 20%;">
        <div class="tab-content mb-5 mx-3" id="pills-tabContent">
            <div class="my-5" style="margin-right:%; ">
                <button type="button" class="btn btn-sm" data-toggle="modal"
                    style=" border-radius: 10px; border: 0.50px black solid; font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word; margin-left: -40%;"
                    data-target="#exampleModal">Tambah</button>
                <form action="">
                    <div class="container" style="margin-top: -35px; margin-right: -107%; ">
                        <div class="search" style="border-radius: 15px; border: 0.50px black solid;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <div class="search-2"> <i class='bx bxs-map'></i>
                                            <form action="/admin/kategori-makanan" method="GET">
                                                <input type="text" id="" name="m"
                                                    placeholder="Cari Kategori">
                                                <button type="submit" class="zoom-effects"
                                                    style="border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-right: -17px">Cari</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                {{-- modal tambah --}}
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content" style="border-radius: 15px">
                            <div class="modal-body">
                                <div class="d-flex justify-content-between">
                                    <h5 class="modal-title" id="exampleModalLabel"
                                        style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                        Tambah</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <br>
                                <form method="POST" action="{{ route('kategori-makanan.store') }}">
                                    @csrf
                                    <div class="">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_makanan"
                                                style="border-radius:10px; width:120%;">
                                            <br>
                                            <button type="submit"
                                                class="btn btn-sm text-white d-flex justify-content-xxl-end"
                                                style="  margin-left: 350px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end modal tambah --}}
                {{-- start tab 2 --}}

                <table class="table-custom">
                    <thead>
                        <tr>
                            <th scope="col"
                                style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                Kategori</th>
                            <th scope="col"
                                style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kategori_makanans as $data)
                            <tr>
                                <td
                                    style="border-left:1px solid black; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                                    {{ Str::limit($data->nama_makanan, 15, '...') }}</td>
                                <td style="border-right:1px solid black;">
                                    <div>
                                        <button type="button" class="btn text-white"
                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;  font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word; padding: 4px 22px;"
                                            data-toggle="modal" data-target="#exampleModal{{ $data->id }}">Edit</button>
                                        {{-- modal edit --}}
                                        <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content" style="border-radius: 15px">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between">
                                                            <h5 class="modal-title" id="exampleModalLabel"
                                                                style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                                                Edit Data</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <br>
                                                        <form action="{{ route('kategori-makanan.update', $data->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('PUT')

                                                            <div class="">
                                                                <div class="col-sm-10">
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $data->nama_makanan }}"
                                                                        name="nama_makanan" id="nama"
                                                                        style="border-radius:10px; width:120%;">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <button type="submit"
                                                                class="btn btn-sm d-flex justify-content-end text-white"
                                                                style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal edit --}}
                                        <form action="{{ route('kategori-makanan.destroy', $data->id) }}" method="POST"
                                            id="delete-form" class="d-inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm"
                                                style="margin-left: 5%;  border-radius: 10px; border: 0.50px black solid; font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word"
                                                data-mdb-ripple-color="dark" onclick="DeleteData()">
                                                Hapus</button>
                                        </form>
                                </td>
                            </tr>
                        @endforeach
                        </tr>
                    </tbody>
                </table>
            </div>
            <div style="margin-top: -2em; margin-left: 10em;">
                {{ $kategori_makanans->links('vendor.pagination.default') }}
            </div>
            @forelse ($kategori_makanans as $data)
            @empty
                <div class="d-flex flex-column h-100 justify-content-center text-center align-items-center mx-5"
                    style="margin-top: -50px;">
                    <img src="{{ asset('images/data.png') }}" style="width: 20em; margin-right: -140px;">
                    <p style="color: #1d1919; margin-right: -120px;"><b>Tidak ada data</b></p>
                </div>
            @endforelse
        </div>
    </div>
</div>
    {{-- end --}}
    </div>
    </div>
    </div>

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
    </script>
@endsection
