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
            width: 250px;
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

        .table-custom2 {
            text-align: center;
        }

        .table-custom2 {
            text-align: center;
            border-collapse: separate;
            border-spacing: 0px 15px;
        }

        .table-custom2 td {
            width: 250px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        .table-custom2 th {
            padding: 10px;
            width: 195px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom2 thead {
            margin-bottom: 50px;
        }

        .table-custom2 td:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom2 td:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .table-custom2 th:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom2 th:last-child {
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
        .scrollbar::-webkit-scrollbar-track
        {
            border-radius: 10px;
            background-color: #ffffff;
        }

        .scrollbar::-webkit-scrollbar
        {
            height: 5px;
            background-color: transparent;
            /* background-color: #ffffff; */
        }

        .scrollbar::-webkit-scrollbar-thumb
        {
            border-radius: 10px;
            background-color: #f7941f;
        }
        @media(min-width:0px) and (max-width:340px){
            .app  {
            height: 18px;
            width: 100px;
            padding: 0;
            overflow: hidden;
            position: relative;
            display: inline-block;
            margin: 0 5px 0 5px;
            text-align: center;
            text-decoration: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            }
            .btn-detail{
                padding: 2px;
                font-size: 12px
            }

        }
        @media(min-width:0px) and (max-width:330px){

            .table-custom {
                margin-right: 5px;
                margin-left: 124px;
                text-align: center;
                border-collapse: separate;
                border-spacing: 0px 15px;
            }
        }
        @media(min-width:330px) and (max-width:337px){

            .table-custom {
                margin-right: 5px;
                margin-left: 120px;
                text-align: center;
                border-collapse: separate;
                border-spacing: 0px 15px;
            }
        }
        @media(min-width:337px) and (max-width:350px){

            .table-custom {
                margin-right: 5px;
                margin-left: 90px;
                text-align: center;
                border-collapse: separate;
                border-spacing: 0px 15px;
            }
            .btn-detail{
                padding: 1px;
            }
        }
        @media(min-width:350px) and (max-width:380px){

            .table-custom {
                margin-right: 5px;
                margin-left: 50px;
                text-align: center;
                border-collapse: separate;
                border-spacing: 0px 15px;
            }
            .btn-detail{
                padding: 2px;
            }
        }
        @media(min-width:380px) and (max-width:430px){

            .table-custom {
                margin-right: 5px;
                margin-left: 17px;
                text-align: center;
                border-collapse: separate;
                border-spacing: 0px 15px;
            }
            .btn-detail{
                padding: 3px;
            }
        }
        @media(min-width:340px) and (max-width:740px){
            .app  {
            height: 18px;
            width: 90px;
            padding: 0;
            overflow: hidden;
            position: relative;
            display: inline-block;
            margin: 0 5px 0 5px;
            text-align: center;
            text-decoration: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            }
            .btn-detail{
                padding: 3px;
            }
        }
        @media(min-width:740px) and (max-width:960px){
            .app  {
            height: 18px;
            width: 150px;
            padding: 0;
            overflow: hidden;
            position: relative;
            display: inline-block;
            margin: 0 5px 0 5px;
            text-align: center;
            text-decoration: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            }
        }
        @media(min-width:960px) and (max-width:4000px){
            .app  {
            height: 18px;
            width: 200px;
            padding: 0;
            overflow: hidden;
            position: relative;
            display: inline-block;
            margin: 0 5px 0 5px;
            text-align: center;
            text-decoration: none;
            text-overflow: ellipsis;
            white-space: nowrap;
            color: #000;
            }
        }

    </style>
    <div class=" scrollbar" style="max-width:100%; overflow-x:auto; overflow-y:hidden ">
    <div class=" d-flex justify-content-center">
        <div class="my-3 mt-5 mx-5">
            <!--
        <ul class="nav mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">
                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Komentar Resep</h5>
                    <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a id="click2" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">
                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Komentar Feed</h5>
                    <div id="border2" class="1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
        </ul> -->
            <div class="tab-content " id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0" style="min-width:180px">

                    <table class="table-custom" style=" ">
                        <thead>
                            <tr>
                                <th scope="col">Judul</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Jumlah Komentar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($complaints as $complaint)
                            <tr class="mt-5">
                                    <td style="border-left:1px solid black;" class="mt"> <p class="app">{{ $complaint->subject }}</p></td>
                                    <td> <p class="app">{{ $complaint->description }}</p>
                                    </td>
                                    <td><p class="app m-0">{{ $complaint->replies->count() }}</p></td>
                                    <td style="border-right:1px solid black;" >
                                        <a href="/show-reply-by/{{ $complaint->id }}" type="button" class="btn btn-light btn-detail rounded-3 text-light me-sm-4"
                                            style="background-color: #F7941E;">
                                            <b class="ms-2 me-2 me-sm-4 ms-sm-0 mx-auto"  >Detail</b>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    @if ($complaints->count() == 0)
                    <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                        style="margin-top: 5em; margin-left:-5%;">
                        <img src="{{ asset('images/data.png') }}" style="width: 15em">
                        <p><b>Tidak ada keluhan</b></p>
                    </div>
                @endif

                </div>
                {{-- end --}}
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
   </div>

    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Tambahkan script Anda di sini -->
    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("click2");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("border2");
        // Sembunyikan elemen 'border2' secara manual saat halaman dimuat
        border2.style.display = "none";

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
        });
        click2.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "none";
            border2.style.display = "block";
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi tab dengan Bootstrap
            $('#pills-tab a').on('click', function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    </script>
@endsection
