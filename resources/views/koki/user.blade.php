@extends('layouts.nav_koki')
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
        }

        .table-custom {
            text-align: center;
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

        .search-2 input {
            height: 45px;
            border: 0.50px black solid;
            width: 100%;
            border-radius: 15px;
            color: #000;

            text-align: center;
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

        .search-2 button {
            position: absolute;
            top: 0px;
            right:0px;
            border: none;
            height: 45px;
            background-color: #F7941E;
            color: #fff;
            width: 90px;
        }
        @media(min-width:0px) and (max-width:328px){
            .search-2 button {
                position: absolute;
                top: 0px;
                right: -17.5px;
                border: none;
                height: 45px;
                background-color: #F7941E;
                color: #fff;
                width: 90px;
            }

        }

    </style>

    <div class="my-4 mx-5">
        <p class="text-center" style="color: black; font-size: 34px; font-family: Poppins;">User Terdaftar</p>
        <div class="">
            <script>
                $(document).ready(function() {
                    $("#search-user").on("input", function() {
                        let value = $(this).val().toLowerCase();
                        $("#search-results").filter(function() {
                            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
                        });
                    });
                });
            </script>
            <table id="table-resep" class="table-custom ml-auto">
                <div class="search-1 ml-auto" style="border-radius: 15px;">
                    <div class="mt-2">
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
                <thead>
                    <tr>
                        <th scope="col">Gambar</th>
                        <th scope="col">User</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody id="search-results">
                    @foreach ($students as $student)
                        <tr class="mt-5">
                            <td style="border-left:1px solid black;">
                                <a href="">
                                    @if ($student->foto === null)
                                        <img src="{{ asset('images/default.jpg') }}" class="border rounded-circle me-2"
                                            alt="images/default.jpg" style="height: 60px" />
                                    @else
                                        <img src="{{ asset('storage/' . $student->foto) }}"
                                            class="border rounded-circle me-2" alt="{{ $student->foto }}"
                                            style="height: 60px" />
                                    @endif
                                </a>
                            </td>
                            <td>{{ $student->name }}</td>
                            @foreach ($student->user_transaksi_kursus as $item)
                                <td>{{ $item->created_at }}</td>
                            @endforeach
                            <td style="border-right:1px solid black;">
                                <button type="button" data-toggle="modal" data-target="#modalDetail{{ $student->id }}"
                                    class="btn btn-light rounded-3 text-light" style="background-color: #F7941E;"><b
                                        class="ms-2 me-2">Detail</b></button>
                            </td>
                        </tr>
                        <div class="modal fade" id="modalDetail{{ $student->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-md" role="document">
                                <div class="modal-content" style="border-radius: 15px">
                                    <div class="modal-body container">
                                        <div class="d-flex justify-content-between">
                                            <h5 class="modal-title ml-2" id="exampleModalLabel"
                                                style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                                Detail Murid
                                            </h5>
                                            <button type="button" class="close mr-2" data-dismiss="modal"
                                                aria-label="Close" id="closeModalEdit">
                                                <i class="fa-regular text-dark fa-circle-xmark"></i>
                                            </button>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p style="font-size: 21px;font-weight:700;">Pengguna</p>
                                            <p style="font-size: 21px;font-weight:700;">{{ $student->name }}</p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p style="font-size: 21px;font-weight:700;">Waktu</p>
                                            <p style="font-size: 21px;font-weight:700;">
                                                @foreach ($student->user_transaksi_kursus as $item)
                                                    {{ $item->created_at }}
                                                @endforeach
                                            </p>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <p style="font-size: 21px;font-weight:700;">Sesi Dibeli</p>
                                            <div class="" style="text-align: right;">
                                                @foreach ($student->user_transaksi_kursus as $item)
                                                    @foreach ($item->course->sesi as $item)
                                                        <p style="font-size: 21px;font-weight:700;">
                                                            {{ $item->judul_sesi }}
                                                        </p>
                                                    @endforeach
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
