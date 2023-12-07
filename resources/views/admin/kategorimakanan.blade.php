@extends('layouts.navbar')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
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
            transform: scale(1);
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

        .ah {
            background-color: #fff;
        }

        .table-custom {
            text-align: center;
            width: 100%;
            border-collapse: separate;
            border-spacing: 0px 15px;
        }

        .table-custom td {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 195px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        .table-custom th {
            padding: 10px;
            width: 245px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom thead {
            margin-bottom: 50px;
            width: fit-content;
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

        .btn-edit {
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-family: 'poppins';
            font-weight: 500;
            word-wrap: break-word;
            border: none;
            letter-spacing: 0.20px;
        }

        .btn-hapus {
            width: 100%;
            height: 100%;
            background-color: white;
            font-size: 17px;
            font-family: 'Poppins';
            font-weight: 500;
            letter-spacing: 0.20px;
            word-wrap: break-word;
            color: black;
            border-radius: 10px;
            margin-left: 10px;
            border: 0.50px black solid
        }

        .garis {
            border-bottom: #F7941E 2px solid;
        }

        .fa-circle {}


        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px;
            width: 100%;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 34px;
            padding-right: 10px;
            border-right: 2px solid #eee;
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
            font-size: 10px;
            color: #eee
        }

        ::placeholder {
            color: grey;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 100%;
        }

        .search-2 input:focus {
            box-shadow: none;
        }


        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 14px;
            color: #eee
        }

        @media(min-width:992px) {
            .search-2 button {
                position: absolute;
                top: 0px;
                right: 0px;
                border: none;
                height: 45px;
                background-color: #F7941E;
                color: #fff;
                width: 90px;
            }

            .search-2 input {
                height: 45px;
                border: 0.50px black solid;
                width: 100%;
                border-radius: 15px;
                color: #000;

                text-align: center;
            }
        }

        @media(max-width:991px) {
            .search-2 button {
                position: absolute;
                top: 0px;
                right: 0px;
                border: none;
                height: 35px;
                background-color: #F7941E;
                color: #fff;
                width: 70px;
            }

            .search-2 input {
                height: 35px;
                border: 0.50px black solid;
                width: 100%;
                border-radius: 15px;
                color: #000;

                text-align: center;
            }
        }

        .scrollbar::-webkit-scrollbar-track {
            border-radius: 10px;
            background-color: #F5F5F5;
        }

        .scrollbar::-webkit-scrollbar {
            width: 8px;
            background-color: #F5F5F5;
            height: 5px;
        }

        .scrollbar::-webkit-scrollbar-thumb {
            border-radius: 10px;
            background-color: #F7941E;
        }

        @media(max-width:992px) {
            .modalfooterterima {
                display: flex;
                justify-content: center;
            }
        }
        @media(max-width:576px) {
            .navLaptops {
                display: none;
            }
        }
        @media(min-width:578px) {
            .navHandphones {
                display: none;
            }
        }
    </style>
    <script>
        $(document).ready(function() {
            $("#search-user").on("input", function() {
                let value = $(this).val().toLowerCase();
                $("#search-results").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
        $(document).ready(function() {
            $("#search-user2").on("input", function() {
                let value = $(this).val().toLowerCase();
                $("#search-results").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                });
            });
        });
    </script>
    <div class="mx-3">
        <div class="navHandphones mt-3">
            <div class="d-grid gap-2">
                <button class="btn btn-white" style="border: 1px solid black;border-radius:10px;" data-target="#exampleModal2" data-toggle="modal" type="button">Tambah</button>
                <div class="search-1" style="border-radius: 15px;">
                    <div class="">
                      <div class="search-2"> <i class='bx bxs-map'></i>
                        <form action="#" method="GET">
                          <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                            id="search-user2">
                          <button type="submit" class="zoom-effects cari2"
                            style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                            Cari
                          </button>
                        </form>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
              aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered " role="document">
                  <div class="modal-content" style="border-radius: 15px">
                      <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"
                              style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                              Tambah</h5>
                          <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                          <br>
                          <form method="POST" action="{{ route('special-days.store') }}">
                              @csrf
                              <div class="">
                                  <div class="col-sm-10">
                                      <input type="text" class="form-control" name="nama" id="nama"
                                          style="border-radius:10px;">
                                      <br>
                                      <button type="submit"
                                          class="btn  btn-sm text-white d-flex justify-content-xxl-end"
                                          style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">
                                          Tambah
                                      </button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
        </div>
        <nav class="navbar bg-body-tertiary navLaptops">
            <div class="container-fluid">
                <a class="navbar-brand">
                    <button type="button" class="btn btn-buat " data-toggle="modal"
                        style=" border-radius: 10px; border: 0.50px black solid; font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word;"
                        data-target="#exampleModal">
                        <span>Tambah</span>
                    </button>
                </a>
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content" style="border-radius: 15px">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Tambah</h5>
                                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <br>
                                <form method="POST" action="{{ route('kategori-makanan.store') }}">
                                    @csrf
                                    <div class="">
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="nama_makanan" id="nama"
                                                style="border-radius:10px;">
                                            <br>
                                            <button type="submit"
                                                class="btn  btn-sm text-white d-flex justify-content-xxl-end"
                                                style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">
                                                Tambah
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <form class="d-flex" role="search">
                    <div class="search-1" style="border-radius: 15px;">
                        <div class="">
                            <div class="search-2"> <i class='bx bxs-map'></i>
                                <form action="#" method="GET">
                                    <input type="text" name="" style="text-align: left;" placeholder="Cari..."
                                        value="" id="search-user">
                                    <button type="submit" class="zoom-effects cari2"
                                        style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                                        Cari
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </nav>
        <div class="scrollbar" style="overflow-x:scroll;">
            <table id="table-resep" class="table-custom ml-auto" style="min-width: 400px;">
                <thead>
                    <tr>
                        <th scope="col">Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="search-results">
                    @foreach ($kategori_makanans as $num => $data)
                        <tr class="mt-5">
                            <td style="border-left:1px solid black;">
                                {{ Str::limit($data->nama_makanan, 17, '...') }}
                            </td>
                            <td style="border-right:1px solid black;">
                                <button type="button" class="btn text-white" data-toggle="modal"
                                    style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;  font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word; padding: 4px 22px;"
                                    data-target="#exampleModal{{ $data->id }}">Edit</button>
                                <div class="modal fade" id="exampleModal{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <form action="{{ route('kategori-makanan.update', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="">
                                                        <div class="">
                                                            <input type="text" class="form-control"
                                                                value="{{ $data->nama_makanan }}" name="nama_makanan" id="nama"
                                                                style="border-radius:10px;">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <button type="submit"
                                                        class="btn btn-sm text-white d-flex justify-content-xxl-end"
                                                        style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" class="btn text-black" data-toggle="modal"
                                    style=" background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;  font-size: 18px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word; padding: 4px 22px;border:1px solid black;"
                                    data-target="#YakinHapus{{ $data->id }}">Hapus</button>
                                <div class="modal fade" id="YakinHapus{{ $data->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <form action="{{ route('kategori-makanan.destroy', $data->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reportModal"
                                                        style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                        Peringatan</h5>
                                                    <button type="button" class="close text-black" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body row d-flex align-items-center col-12">
                                                    <!-- Tambahkan kelas "align-items-center" -->
                                                    <div class="col-2 mt-2">
                                                        <img class="mr-3" src="{{ asset('image 94.png') }}"
                                                            width="100px" height="100px" style="border-radius: 50%"
                                                            alt="">
                                                    </div>
                                                    <div class="col-10">
                                                        <div class="widget-49-meeting-info">

                                                        </div>
                                                        <p class="ml-4">
                                                            Apakah anda yakin mau menghapus hari kategori makanan ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-light text-light rounded-3"
                                                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                            class="ms-2 me-2">Ya</b>
                                                    </button>
                                                    <button type="button" data-dismiss="modal"
                                                        class="btn btn-light text-light rounded-3"
                                                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                            class="ms-2 me-2">Tidak</b>
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @if ($kategori_makanans->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center mt-5">
                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                    <p><b>Tidak ada data</b></p>
                </div>
            @endif
        </div>
    </div>
@endsection
{{--
<div class="" style="overflow-x:hidden">
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
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                            data-toggle="modal"
                                            data-target="#exampleModal{{ $data->id }}">Edit</button>
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
                                        <form action="{{ route('kategori-makanan.destroy', $data->id) }}"
                                            method="POST" id="delete-form" class="d-inline-block">
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
--}}
