@extends('layouts.navbar')
@section('konten')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
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
            width: 200%;
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
            width: 40%;
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

    <div class=" d-flex justify-content-center ms-3">
        <div class="my-5 ml-5" style="margin-right: -15%;">




            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    <div class="search" style="border-radius: 15px;">
                        <div class="col-lg-11 mt-2">
                            <div class="search-2"> <i class='bx bxs-map'></i>
                                <form action="#" method="GET">
                                    <input type="text" name="" style="text-align: left;" placeholder="Cari..."
                                        value="{{-- {{ request()->nama_resep }} --}}">
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
                                <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">Nama Penguuna</th>
                                <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">Jumlah Suka</th>
                                <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">Jumlah Pengikut</th>
                                <th scope="col" style=" color: #F5F5F5; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word"">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>


                            <div id="search-results">
                                <tr class="mt-5">
                                    <td style="border-left:1px solid black;  font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word"" class="mt">Glsg
                                    </td>
                                    <td style=" font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word"">100.000</td>
                                    <td style=" font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word"">100.000</td>
                                    <td style="border-right:1px solid black;">
                                        <a href="#" type="button"
                                            class="btn btn-sm rounded-3 text-light me-2"
                                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"><b class="ms-2 me-2" style="color: white; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Terima</b></a>
                                            <a href="#" type="button"
                                            class="btn btn-sm rounded-3 text-light"
                                            style=" border-radius: 15px; border: 1px black solid"><b class="ms-2 me-2" style="color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Tolak</b></a>
                                        </td>
                                </tr>
                            </div>
                        </tbody>
                    </table>
                    {{-- @if ($reportResep->count() == 0)
                    <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
                        <img src="{{asset('images/data.png')}}" style="width: 15em">
                        <p><b>Tidak ada data</b></p>
                    </div>
                @endif

                    {{ $reportResep->links('vendor.pagination.defaultReportResep') }} --}}
                </div>
                {{-- end --}}
                {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <form action="">
                        <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                            <div class="search" style="border-radius: 15px; border: 0.50px black solid; ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="/admin/special-days" method="GET">
                                                    <input type="text" id="" name="d"
                                                        placeholder="Cari Laporan Resep">
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

                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Melanggar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportComplaint as $row)
                                <tr class="mt-5">
                                    <td style="border-left:1px solid black;" class="mt">
                                        {{ $row->userSender->name }}
                                    </td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                                    <td style="border-right:1px solid black;">
                                        <button type="button" data-toggle="modal"
                                            data-target="#modalComplaint{{ $row->complaint_id }}"
                                            class="btn btn-light btn-sm rounded-3 text-light"
                                            style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reportComplaint->links('vendor.pagination.defaultReportComplaint') }}
                </div> --}}
                {{-- end --}}
                {{-- <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <form action="">
                        <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                            <div class="search" style="border-radius: 15px; border: 0.50px black solid; ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="/admin/special-days" method="GET">
                                                    <input type="text" id="" name="d"
                                                        placeholder="Cari Laporan Resep">
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

                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Melanggar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($allComments as $row)
                                <tr class="mt-5">
                                    <td style="border-left:1px solid black;" class="mt">
                                        {{ $row->userSender->name }}
                                    </td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                                    <td style="border-right:1px solid black;">
                                        <button type="button" data-toggle="modal"
                                            data-target="#modalKomentar{{ $row->id }}"
                                            class="btn btn-light btn-sm rounded-3 text-light"
                                            style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reportReply->links('vendor.pagination.defaultReportReply') }}
                </div> --}}
                {{-- end --}}
                {{-- <div class="tab-pane fade" id="pills-user" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    <form action="">
                        <div class="container mt-1" style="margin-top: -35px; margin-left: -5px; ">
                            <div class="search" style="border-radius: 15px; border: 0.50px black solid; ">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="/admin/special-days" method="GET">
                                                    <input type="text" id="" name="d"
                                                        placeholder="Cari Laporan Resep">
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

                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Melanggar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($reportProfile as $row)
                                <tr class="mt-5">
                                    <td style="border-left:1px solid black;" class="mt">
                                        {{ $row->userSender->name }}
                                    </td>
                                    <td>{{ $row->user->name }}</td>
                                    <td>{{ $row->description }}</td>
                                    <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                                    <td style="border-right:1px solid black;">
                                        <button type="button" data-toggle="modal"
                                            data-target="#modalProfile{{ $row->profile_id }}"
                                            class="btn btn-light btn-sm rounded-3 text-light"
                                            style="background-color: #F7941E;"><b class="ms-2 me-2">Detail</b></button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $reportProfile->links('vendor.pagination.defaultReportProfile') }}
                </div> --}}
            </div>

        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        let debounceTimer;

    $(document).ready(function() {
    $('#search-input').keyup(function() {
        var query = $(this).val(); // Ambil nilai dari input pencarian
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(function(){
            get(1)
        }, 500);

        // Lakukan permintaan Ajax ke titik akhir pencarian hanya jika panjang query lebih dari 2 karakter
        if (query.length > 2) {
            $.ajax({
                url: '/admin/laporan-pengguna', // Ganti URL sesuai dengan titik akhir pencarian Anda
                type: 'GET',
                data: { query: query },
                success: function(response) {
                    // Tampilkan hasil pencarian di dalam div #search-results
                    $('#search-results').html(response);
                },
                beforeSend: function() {
                    $('#loading'). html(showLoading())
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

    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        const underline = document.getElementById("f");
        const buttonTab = document.getElementById("button-tab");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");
        buttonTab.addEventListener("click", function() {
            tab3();
        });

        function tab3() {
            event.preventDefault();
            border1.style.display = "none";
            border2.style.display = "none";
            underline.style.display = "block";
            underline.removeAttribute('hidden');
            o.style.display = "none";
        }
        a_tab.addEventListener('click', function() {
            event.preventDefault();
            o.style.display = "block";
            underline.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
        });
        click1.addEventListener('click', function() {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            underline.style.display = "none";
            o.style.display = "none";
        });
        click2.addEventListener("click", function() {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            underline.style.display = "none";
            o.style.display = "none";
        });
    </script>
    </div>




    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>

    <!-- jQuery CDN -->
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

        function buttonAllert(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin memblookir pengguna tersebut?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('formBlokir' + num).submit();
                        }
                    ],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
                        function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }
                    ],
                ],
            });
        }

        function confirmation(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin mengahpus laporan?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('deleteLaporan' + num).submit();
                        }
                    ],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
                        function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }
                    ],
                ],
            });
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const favoriteForm = document.querySelectorAll(".favorite-form");

            favoriteForm.forEach(form1 => {
                form1.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button1 = form1.querySelector(
                        ".favorite-button"); // Menggunakan form1
                    const svg1 = button1.querySelector("svg"); // Menggunakan button1

                    const response = await fetch(form1.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData1 = await response.json();
                        if (responseData1.favorited) {
                            // Reset button color and SVG here
                            button1.style.backgroundColor = "#F7941E";
                            svg1.style.color = "white";
                            // Modify SVG appearance if needed
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        } else {
                            // Update button color and SVG here
                            button1.style.backgroundColor = "white";
                            svg1.style.color = "#F7941E";
                            button1.style.borderColor = "#F7941E";
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        const deskripsi = document.getElementById("deskripsi");
        const langkah = document.getElementById("langkah");
        const borderDeskripsi = document.getElementById("borderDeskripsi");
        const borderLangkah = document.getElementById("borderLangkah");
        const bahan = document.getElementById("bahan");
        const borderBahan = document.getElementById("borderBahan");
        const alat = document.getElementById("alat");
        const borderAlat = document.getElementById("borderAlat");
        deskripsi.addEventListener('click', function() {
            borderDeskripsi.style.display = "block";
            borderLangkah.style.display = "none";
            borderBahan.style.display = "none";
            borderAlat.style.display = "none";
        });
        bahan.addEventListener("click", function() {
            borderBahan.removeAttribute('hidden');
            borderBahan.style.display = "block";
            borderDeskripsi.style.display = "none";
            borderLangkah.style.display = "none";
            borderAlat.style.display = "none";
        });

        langkah.addEventListener("click", function() {
            borderLangkah.style.display = "block";
            borderDeskripsi.style.display = "none";
            borderBahan.style.display = "none";
            borderAlat.style.display = "none";
        });
        alat.addEventListener("click", function() {
            borderAlat.style.display = "block";
            borderLangkah.style.display = "none";
            borderDeskripsi.style.display = "none";
            borderBahan.style.display = "none";
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        // $(document).ready(function() {
        //     $('#buttonModal').on('click', function() {
        //         var complaintId = $(this).data('complaint-id');

        //         $.ajax({
        //             url: '/show-reply-by/' + complaintId,
        //             type: 'GET',
        //             dataType: 'html',
        //             success: function(data) {
        //                 $('#replyData').html(data); // Memasukkan data balasan ke dalam modal
        //                 $('#repliesModal').modal('show'); // Menampilkan modal
        //             },
        //             error: function() {
        //                 // Tampilkan pesan error jika data balasan tidak berhasil dimuat
        //                 $('#replyData').html('<p>Failed to load replies.</p>');
        //                 $('#repliesModal').modal('show');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
