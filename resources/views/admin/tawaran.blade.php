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
            width: 195px;
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
            margin-left: 210%;
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
            border: 0.50px black solid;

        }

        .garis {
            border-bottom: #F7941E 2px solid;
        }

    </style>

    <div class=" d-flex justify-content-center" style="margin-left:-130px">
        <div class="my-5 ml-5" style="margin-right: 20%;">
                        <form action="" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 form-group d-flex">
                                <label for="input" class="col-sm-2  me-3 col-form-label fw-bold">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Paket" id="input" name="facebook" style="width: 285%;font-family:poppins; "
                                        value="">
                                </div>
                            </div>
                            <div class="mb-3 form-group d-flex">
                                <label for="input1" class="col-sm-2 me-3  col-form-label fw-bold">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Harga Paket" id="input1" name="youtube" style="width: 285%;font-family:poppins"
                                        value="">
                                </div>
                            </div>
                            <div class="mb-3 form-group d-flex">
                                <label for="input2" class="col-sm-2 me-3  col-form-label fw-bold">Durasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Durasi Aktif Paket" id="input2" name="twitter" style="width: 285%;font-family:poppins"
                                        value="">
                                </div>
                            </div>
                            <div class="mb-3 form-group d-flex">
                                <label for="input3" class="col-sm-2 me-3  col-form-label fw-bold">Detail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Masukkan Detail Paket" id="input3" name="instagram" style="width: 252%;font-family:poppins"
                                        value="">
                                </div>
                            <button type="submit" class="btn text-white" style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                            border-radius: 10px; margin-left: 123%;font-family:poppins; padding: 5px 20px;  font-size: 17px; font-weight: 600; word-wrap: break-word">Hapus</button>
                            </div>
                        </form>
                        <div class="float-end text-nowrap" >
                            <button type="submit" class="btn text-white" style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                            border-radius: 10px;font-family:poppins; margin-left: 370%; padding: 5px 20px;  font-size: 17px; font-weight: 600; word-wrap: break-word">Tambah Paket</button>
                        </div>
        </div>
    </div>

    </div>

    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
