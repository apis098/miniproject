@extends('template.nav')
@section('content')
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
            transform: scale(0.97);
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
            width: 100em;
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
            padding: 15px;
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
            padding: 0px 10px;
            border-radius: 5px;
            width: 968px;
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
            width: 90px;
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

        .text-header {
            color: #000;
            font-family: Poppins;
            font-size: 36px;
            font-style: normal;
            font-weight: 600;
            line-height: normal;
            text-align: center;
        }
    </style>
    <div class="mx-5 my-5">
        <h1 class="text-header">Riwayat Top up</h1>
        <table class="table-custom">
            <thead>
                <tr>
                    <th scope="col-3"
                        style=" color: #F5F5F5; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Nama</th>
                    <th scope="col-3"
                        style=" color: #F5F5F5; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Pembelian</th>
                    <th scope="col-3"
                        style=" color: #F5F5F5; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Jumlah</th>
                    <th scope="col-3"
                        style=" color: #F5F5F5; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($daftar_transaksi as $data)
                    <tr>
                        <td style="border-left:1px solid black; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                            {{ $data->user->name }}</td>
                        <td style="border-right:1px solid black;">
                            
                        </td>
                        <td style="border-right: 1px solid black;">
                            {{ $data->total_amount }}
                        </td>
                        <td style="border-right: 1px solid black;">
                            {{ $data->status }}
                        </td>
                    </tr>
                @endforeach
                </tr>
            </tbody>
        </table>
    </div>
@endsection
