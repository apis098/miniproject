@extends('layouts.nav_koki')
@section('konten')

    <!-- Load Leaflet from CDN-->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>

    <!-- Load Esri Leaflet from CDN -->
    <script src="https://unpkg.com/esri-leaflet"></script>

    <!-- Esri Leaflet Geocoder -->
    <link
      rel="stylesheet"
      href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
    />
    <script src="https://unpkg.com/esri-leaflet-geocoder"></script>
    <style>
       /* Gaya untuk tombol "Cari" */
            .zoom-effects {
                margin-left: 10px; /* Tambahkan jarak antara input dan tombol */
                /* Selain itu, Anda dapat menambahkan properti lain sesuai keinginan Anda */
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

        .garis {
            border-bottom: #F7941E 2px solid;
        }


        .search {
            background-color: #fff;
            padding: 0px 10px;
            border-radius: 5px;
            width: 80%;
            height: 100%;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 50px;
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

        /* ::placeholder {
            color: #eee;
            opacity: 1
        } */

        /* Gaya untuk form pencarian */
        .search-2 {
            display: flex;
            align-items: center;
        }

        .search-2 input {
            height: 45px;
            border: none;
            width: 200%;
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
            height: 49px;
            background-color: #F7941E;
            color: #fff;
            width: 90px;
            border-radius: 4px
        }


        .intro-1 {
            font-size: 1.5rem; /* Contoh ukuran font dalam rem */
        }

        .col-6 {
            font-size: 1em; /* Contoh ukuran font dalam em */
        }



        @media (max-width: 768px) {
    /* Gaya yang akan diterapkan pada layar dengan lebar maksimum 768px */
    .card {
        width: 100%; /* Mengisi seluruh lebar kontainer */
        margin-bottom: 20px; /* Tambahkan jarak antara card */
    }
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
                top: -2px
            }
        }
    </style>

<div class=" d-flex justify-content-start">
    <div class="my-4 ml-5">
        <ul class="nav mb-2" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">
                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Kursus Dibuat</h5>
                    <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">
                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Disukai</h5>
                    <div id="b" class="ms-" style="width: 100%; height: 100%; border: 1px #F7941E solid;"
                        hidden>
                    </div>
                </a>
            </li>

            <li class="nav-item" role="presentation">
                <a id="a-tab" class="nav-link mr-5" id="pills-footer-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                    aria-selected="false">
                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kursus Disimpan</h5>
                    <div id="pp" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
        </ul>

        <div class="container my-3">
            <div class="row mr-5">
            <div class="d-flex justify-content-between align-items-center">
                <div class="search mx-2" style="border-radius: 15px; border: 0.50px black solid;">
                    <div class="col-lg-12">
                        <div class="search-2"><i class='bx bxs-map'></i>
                            <form action="#" method="GET">
                                <input type="text" name="profil" placeholder="Search For Something">
                                <button type="submit" class="zoom-effects"
                                    style="border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-right: -17px">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256"><path fill="currentColor" d="m229.66 218.34l-50.07-50.06a88.11 88.11 0 1 0-11.31 11.31l50.06 50.07a8 8 0 0 0 11.32-11.32ZM40 112a72 72 0 1 1 72 72a72.08 72.08 0 0 1-72-72Z"/></svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <button style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                    class="btn btn-lg">
                    <span style="font-weight: 600">
                        <a href="{{route('kursus.create')}}" style="color: rgb(255, 255, 255);">Buat Kursus</a>
                    </span>
                </button>
            </div>
            </div>
        </div>

        <div class="tab-content mb-5 mx-3" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                {{-- start tab 1 --}}
                <div class="d-flex">
                    <div class="card my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar sekali</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mx-4 my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mx-0 my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style=" width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                   </div>
            </div>
            {{-- end --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                {{-- start tab 2 --}}
                <div class="d-flex">
                    <div class="card my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar sekali awokwowkwowkwo</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mx-4 my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mx-0 my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style=" width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                   </div>

            </div>
            {{-- end --}}
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                tabindex="0">
                {{-- start tab 3 --}}
                   <div class="d-flex">
                    <div class="card my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar aiyaiyaaa umikumik kecau</a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="card mx-4 my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style="max-width:100%; width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mx-0 my-3" style="width: 30%; border-radius:15px">
                        <div class="row">
                            <div class="col-12">
                                <img src="{{ asset('sawi.jpg') }}" class="card-img-top"
                                    style=" width:100%; border-top-left-radius:15px;
                                               border-top-right-radius: 15px"
                                    alt="...">
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h5>Merebus</h5>
                                    <a href="/detail" class="btn"
                                        style="font-family: poppins;font-weight:bold">cara merebus dengan benar</a>
                                </div>
                            </div>

                        </div>
                    </div>
                   </div>
            </div>
        </div>
        {{-- end --}}
    </div>
</div>
<script>
    const click1 = document.getElementById("click1");
    const click2 = document.getElementById("c");
    const border1 = document.getElementById("border1");
    const border2 = document.getElementById("b");
    const o = document.getElementById("pp");
    const a_tab = document.getElementById("a-tab");

    a_tab.addEventListener('click', function(event) {
        event.preventDefault();
        o.style.display = "block";
        border1.style.display = "none";
        border2.style.display = "none";
    });

    click1.addEventListener('click', function(event) {
        event.preventDefault();
        border1.style.display = "block";
        border2.style.display = "none";
        o.style.display = "none";
    });

    click2.addEventListener("click", function(event) {
        event.preventDefault();
        border2.removeAttribute('hidden');
        border2.style.display = "block";
        border1.style.display = "none";
        o.style.display = "none";
    });
</script>




<!-- jQuery CDN -->
<script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.slim.js"
integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
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
