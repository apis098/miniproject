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
            width: 245px;
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
            width: 210%;
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
            font-size: 10px;
            color: #eee
        }

        ::placeholder {
            color: grey;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 35%;
            margin-left: -5%
        }

        .search-2 input {
            height: 45px;
            border: 0.50px black solid;
            width: 137%;
            border-radius: 15px;
            margin-left: 80px;
            color: #000;
            padding-left: 18px;
            padding-right: 100px;
            text-align: center
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
            margin-left: 136%;
            top: 0px;
            border: none;
            height: 45px;
            background-color: #F7941E;
            color: #fff;
            width: 90px;
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
    <div style="overflow-x:hidden">
        <div class=" d-flex justify-content-start ms-3">
            <div class="my-5 ml-3">
                <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="search" style="border-radius: 15px;">
                            <div class="col-lg-12 mt-2">
                                <div class="search-2"> <i class='bx bxs-map'></i>
                                    <form action="#" method="GET">
                                        <input type="text" name="" style="text-align: left;" placeholder="Cari..."
                                            value="{{ request()->nama_kursus }}">
                                        <button type="submit" class="zoom-effects"
                                            style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                                            Cari
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- start tab 1 --}}
                        <table class="table-custom">
                            <thead>
                                <tr>
                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        Gambar</th>
                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        Nama Kursus</th>
                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        Nama Pengguna</th>
                                    <th scope="col"
                                        style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_course as $item)
                                    <div id="search-results">
                                        <tr class="mt-5">
                                            <td style="border-left:1px solid black;  font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word""
                                                class="mt">
                                                <a href="#" data-toggle="modal"
                                                    data-target="#modalKursus{{ $item->id }}" class="">
                                                    <img src="{{ asset('storage/' . $item->foto_kursus) }}"
                                                        class="img-fluid shadow-1-strong rounded"
                                                        style=" width: 150px;
                                        height: 80px;"
                                                        alt="Hollywood Sign on The Hill" />
                                                </a>
                                                {{-- modal kursus --}}
                                                <div class="modal fade bd-example-modal-xl rounded-5"
                                                    id="modalKursus{{ $item->id }}" tabindex="-1" role="dialog"
                                                    aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"
                                                    style="text-align: left;">
                                                    <div class="modal-dialog modal-xl">
                                                        <div class="modal-content">
                                                            <div class="modal-body">
                                                                <section>
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <i class="fa-regular text-dark fa-circle-xmark"></i>
                                                                    </button>
                                                                    <div class="container">
                                                                        <div class="row">
                                                                            <div class="col lg-6 my-3">
                                                                                <button type="button"class="btn"
                                                                                    style=" background: #F7941E;color:white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;  color: white; font-size: 16px; font-family: Poppins; font-weight: 400; letter-spacing: 0.36px; word-wrap: break-word">
                                                                                    @foreach ($item->jenis_kursus as $jenis_kursus)
                                                                                        {{ $jenis_kursus->jenis_kursus }}
                                                                                    @endforeach
                                                                                </button>
                                                                                <br>
                                                                                <br>
                                                                                <p
                                                                                    style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                                                                                    <b> {{ $item->nama_kursus }} </b>
                                                                                </p>
                                                                                <div class="my-3 mt-5">
                                                                                    <h3 class="mb-3"
                                                                                        style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                                        <b>Tentang kursus</b>
                                                                                    </h3>

                                                                                    <p>{{ $item->deskripsi_kursus }}</p>

                                                                                </div>
                                                                                <div class=" mt-3">
                                                                                    <h3
                                                                                        style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                                        <b>Lokasi kursus</b>
                                                                                    </h3>
                                                                                    <button type="button" class="btn mt-3"
                                                                                        style=" border-radius: 12px; border: 1px black solid">
                                                                                        <i
                                                                                            class="fas fa-regular fa-location-dot"></i>
                                                                                        {{ $item->nama_lokasi }}
                                                                                    </button>
                                                                                </div>

                                                                            </div>
                                                                            <div class="col-xl-3 col-sm-4 mb-4 my-5">
                                                                                <div class="bg-white shadow-sm py-5 border border-secondary text-center"
                                                                                    style="border-radius: 20px; height:16rem;">
                                                                                    <img src="{{ asset('storage/' . $item->foto_kursus) }}"
                                                                                        alt="" width="70%"
                                                                                        height="70%"
                                                                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                                                                    <h5 class="mb-0">
                                                                                        <a href="#"
                                                                                            style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                                            {{ $item->user->name }}
                                                                                        </a>
                                                                                    </h5>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                </section>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                                {{-- end modal --}}
                                            </td>
                                            <td
                                                style=" font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                                                <a href="#" class="text-black" data-toggle="modal"
                                                    data-target="#modalKursus{{ $item->id }}">{{ Str::limit($item->nama_kursus, 30, '...') }}</a>
                                            </td>
                                            <td
                                                style=" font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                                                {{ $item->user->name }}
                                            </td>
                                            <td style="border-right:1px solid black;" class="">
                                                <div class="d-flex">
                                                    <form id="form_terima_eksekusi_kursus{{ $item->id }}"
                                                        action="{{ route('eksekusi.kursus', ['diterima', $item->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="button" class="btn btn-sm rounded-3 text-light me-2"
                                                            onclick="confirmation_accept_course({{ $item->id }})"
                                                            style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b
                                                                class="ms-2 me-2"
                                                                style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Terima</b></button>
                                                    </form>
                                                    <button data-toggle="modal"
                                                        data-target="#modalAlasan{{ $item->id }}" type="button"
                                                        class="btn btn-sm rounded-3 text-light mx-auto"
                                                        style=" border-radius: 15px; border: 1px black solid"><b
                                                            class="ms-2 me-2"
                                                            style="color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">
                                                            Tolak
                                                        </b></button>
                                                    <div class="modal" tabindex="-1" id="modalAlasan{{$item->id}}">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Detail</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal"
                                                                        aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form h
                                                                        id="form_tolak_eksekusi_kursus{{ $item->id }}"
                                                                        action="{{ route('eksekusi.kursus', ['ditolak', $item->id]) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PATCH')
                                                                        <div class="row">
                                                                            <div class="col-4">
                                                                                <img src="{{asset('images/alasan.png')}}" width="100%" height="100%" alt="">
                                                                            </div>
                                                                            <div class="col-8">
                                                                                <textarea name="alasan" id="alasan" class="form-control" placeholder="alasan..." cols="5" rows="5"></textarea>
                                                                            </div>
                                                                        </div>

                                                                        <button type="submit"
                                                                            class="btn btn-sm rounded-3 text-light mx-auto"
                                                                            style=" border-radius: 15px; border: 1px black solid"><b
                                                                                class="ms-2 me-2"
                                                                                style="color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Tolak</b></a>
                                                                    </form>

                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save
                                                                        changes</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function confirmation_accept_course(num) {
            iziToast.show({
                backgroundColor: 'a1dfb0',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menerima kursus ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('form_terima_eksekusi_kursus' + num)
                                    .submit();
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

        function confirmation_tolak_course(num) {
            iziToast.show({
                backgroundColor: '#f2a5a8',
                title: '<i class="fa-solid fa-exclamation"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Anda yakin menolak kursus ini',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('form_tolak_eksekusi_kursus' + num)
                                    .submit();
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

        let debounceTimer;

        $(document).ready(function() {
            $('#search-input').keyup(function() {
                var query = $(this).val(); // Ambil nilai dari input pencarian
                clearTimeout(debounceTimer);

                debounceTimer = setTimeout(function() {
                    get(1)
                }, 500);

                // Lakukan permintaan Ajax ke titik akhir pencarian hanya jika panjang query lebih dari 2 karakter
                if (query.length > 2) {
                    $.ajax({
                        url: '/admin/laporan-pengguna', // Ganti URL sesuai dengan titik akhir pencarian Anda
                        type: 'GET',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            // Tampilkan hasil pencarian di dalam div #search-results
                            $('#search-results').html(response);
                        },
                        beforeSend: function() {
                            $('#loading').html(showLoading())
                        }
                    });
                } else {
                    // Kosongkan hasil pencarian jika panjang query kurang dari 3 karakter
                    $('#search-results').empty();
                }
            });
        });


        function showLoading() {
            return `<div class="d-flex justify-content-center" style="">
        <div class="spinner-border my-auto" role="status">
            <span class="visually-hidden">Loading...</span>
            </div></div>`

        }
    </script>
    </div>

    <!-- jQuery CDN -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
