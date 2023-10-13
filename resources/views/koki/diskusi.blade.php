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
    </style>

    <div class=" d-flex justify-content-start">
        <div class="my-5 ml-4">
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
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    {{-- start tab 1 --}}
                    <table class="table-custom ">
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
                                    <td style="border-left:1px solid black;" class="mt">{{ $complaint->subject }}</td>
                                    <td>{{ $complaint->description }}
                                    </td>
                                    <td>{{ $complaint->replies->count() }}</td>
                                    <td style="border-right:1px solid black;">
                                        <a href="/show-reply-by/{{ $complaint->id }}" type="button" class="btn btn-light btn-sm rounded-3 text-light"
                                            style="background-color: #F7941E;">
                                            <b class="ms-2 me-2">Detail</b>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>


                </div>
                {{-- end --}}
                <!--
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <table class="table-custom2">
                        <thead>
                            <tr>
                                <th scope="col">Resep</th>
                                <th scope="col">User</th>
                                <th scope="col">Komen</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                                <tr class="">
                                    <td style="border-left:1px solid black;" class="mt">
                                        <div class="card rounded-3" style="width: 10rem; margin-left:10%; margin-top:15px">
                                            <img src="{{ asset('images/dark-food.jpg') }}" class="card-img-center rounded-3" alt="...">
                                          </div>
                                    </td>
                                    <td>agglnxz</td>
                                    <td>keasinan sygg</td>
                                    <td style="border-right:1px solid black;">
                                        <a href="#" type="button" class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;">
                                            <b class="ms-2 me-2">Detail</b>
                                        </a>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}-->
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
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
