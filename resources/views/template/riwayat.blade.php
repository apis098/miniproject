@extends('template.nav')
@section('content')
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
        }

        .table-custom {
            text-align: center;
            border-collapse: separate;
            border-spacing: 0px 15px;
        }

        .table-custom td {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 500px;
            height: 40px;
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
            width: 500px;
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

</style>
    <div class="container pt-4 px-5">


            <div class="row mb-1 justify-content-center mx-5 ml-5">
                <div class="col-sm-3 col-lg-4">
                    <h3 style=" color: black; font-size: 30px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Riwayat Top Up</h3>
                </div>
            </div>

            <table class="table-custom"" >
                <thead>
                    <tr>
                        <th scope="col">Nama</th>
                        <th scope="col">Pembelian</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>

                        <tr class="mt-5">
                            <td style="border-left:1px solid black;" class="">
                                <div class="d-flex mx-5">
                                    <a href="">
                                        <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp"
                                            class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                                    </a>
                                    <div class="mt-2">

                                                <strong>Bunda Rahma</strong>


                                    </div>
                                </div></td>
                            <td>Pembelian 1 Bulan</td>
                            <td>Rp. 40.000,00</td>
                            <td style="border-right:1px solid black;">   <button type="submit" class="btn ml-2" id="buttonUploadVideo"
                                style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                                <span style="font-weight: 600; color: white;">Belum Dibayar</span>
                            </button></td>
                        </tr>

                </tbody>
            </table>
    </div>

@endsection
