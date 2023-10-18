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

        @media (max-width: 768px) {

            /* Aturan CSS untuk layar dengan lebar maksimum 768px */
            .my-5 {
                margin: 0;
            }

            .ml-5 {
                margin-left: 0;
            }

            .mr-3 {
                margin-right: 0;
            }

            /* ... (aturan CSS lainnya) ... */

            /* Mengubah lebar input pada formulir */
            .form-control {
                width: 100%;
            }

            /* Mengatur margin pada tombol Hapus dan Tambah Paket */
            .btn-delete,
            .btn-add {
                margin-left: 0;
            }
        }
    </style>
    <div class="d-flex mt-3 ms-5  justify-content-start">
        <ul class="nav mb-3 mr-5" id="pills-tab" role="tablist">
            <li class="nav-item tabs" role="presentation">
                <a href="#" class="nav-link mr-5 active" id="button-berlangganan" data-bs-toggle="tab"
                    data-bs-target="#berlangganan" type="button" role="tab" aria-controls="profile"
                    aria-selected="false">
                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">
                        Berlangganan
                    </h5>
                    <div id="border1" class="ms-3" style="width: 80%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
            <li class="nav-item tabs" role="presentation">
                <a href="#" class="nav-link mr-5" id="button-topUp" data-bs-toggle="tab"
                    data-bs-target="#topUp" type="button" role="tab" aria-controls="keluhan"
                    aria-selected="false">
                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                        Top up Saldo
                    </h5>
                    <div id="border2" class="ms-3" style="width: 70%; height: 80%; border: 1px #F7941E solid; display:none;">
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="berlangganan" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form action="{{ route('upload.tawaran') }}" method="post" id="form-upload-tawaran">
                @csrf
                <div class=" d-flex justify-content-start ms-3" style="overflow-x:hidden;">
                    <div class=" ml-5">
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="nama_paket" class="form-control "
                                    style="  width: 50rem; margin-left:-15px " placeholder="Masukkan Nama Paket...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold">Harga </label>
                            <div class="col-sm-10">
                                <input type="text" id="harga" name="harga_paket" class="form-control "
                                    style="  width: 50rem; margin-left:-15px " placeholder="Masukkan Harga Paket...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold">Durasi </label>
                            <div class="col-sm-10">
                                <input type="text" id="durasi" name="durasi_paket" class="form-control "
                                    style="  width: 50rem; margin-left:-15px " placeholder="Masukkan Durasi Aktif Paket...">
                            </div>
                        </div>
                        <div class="d-flex">
                            <label class="col-form-label fw-bold ">Detail </label> &nbsp; &nbsp; &nbsp;
                            <input type="text" id="comment-veed1" name="detail_paket[]" class="form-control me-2"
                                style="width: 45rem;" placeholder="Masukkan Detail Paket...">
                        </div>
                        <div id="details"></div>
                        <button type="button" id="button-add-detail" class="btn text-light rounded-3 mt-4 float-start"
                            style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                class="ms-2 me-2">Tambah
                                Detail</b>
                        </button> <br>
                        <button type="submit" class="btn text-light rounded-3 float-end"
                            style=" background-color:#F7941E; margin-right:-1%; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                class="ms-2 me-2">Tambah
                                Paket</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="tab-pane fade show" id="topUp" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <form action="{{ route('categories.topup.store') }}" method="post">
                @csrf
                <div class=" d-flex justify-content-start ms-3" style="overflow-x:hidden;">
                    <div class=" ml-5">
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama_topup" name="name" class="form-control "
                                    style="  width: 50rem; margin-left:-15px " placeholder="Masukkan Nama Kategori...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold">Harga </label>
                            <div class="col-sm-10">
                                <input type="text" id="harga_topup" name="price" class="form-control "
                                    style="  width: 50rem; margin-left:-15px " placeholder="Masukkan Harga default...">
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn text-light rounded-3 float-end"
                            style=" background-color:#F7941E; margin-right:-1%; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                class="ms-2 me-2">Tambah</b>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        const btnTopUp = document.getElementById("button-topUp");
        const btnBerlangganan = document.getElementById("button-berlangganan");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("border2");
        btnTopUp.addEventListener('click', function() {
            border2.style.display = "block";
            border1.style.display = "none";
        });
        btnBerlangganan.addEventListener("click", function() {
            border1.style.display = "block";
            border2.style.display = "none";
        });
    </script>
    <!-- jQuery CDN -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>
    <!-- jQuery CDN -->
    <script>
        let num = 1;
        document.getElementById("button-add-detail").addEventListener("click", function(e) {
            num++;
            let div = document.createElement('div');
            div.innerHTML = `
            <div class="d-flex my-2" id="detail${num}">
            <label class="col-form-label fw-bold ">Detail </label> &nbsp; &nbsp; &nbsp;
                <input type="text" id="comment-veed1" name="detail_paket[]" class="form-control me-2"
                    style="width: 45rem;" placeholder="Masukkan Detail Paket...">

            <button type="button" onclick="hapus_details(${num})" class="btn text-light rounded-3"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                    class="ms-2 me-2">Hapus</b>
            </button>
            </div>
            `;
            document.getElementById("details").appendChild(div);
        });

        function hapus_details(num) {
            document.getElementById("detail" + num).remove();
        }
        $("#form-upload-tawaran").submit(function(event) {
            event.preventDefault();
            const route = $(this).attr("action");
            const data = new FormData($(this)[0]);
            $.ajax({
                url: route,
                method: "POST",
                contentType: false,
                processData: false,
                data: data,
                success: function success(response) {
                    iziToast.destroy();
                    iziToast.show({
                        backgroundColor: 'green',
                        title: '<i class="fa-regular fa-circle-question"></i>',
                        titleColor: 'white',
                        messageColor: 'white',
                        message: response.message,
                        position: 'topCenter',
                        progressBarColor: 'white',

                    });
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                    console.log(response.message);

                },
                error: function error(xhr, status, errors) {
                    iziToast.destroy();
                    iziToast.show({
                        backgroundColor: 'red',
                        title: '<i class="fa-solid fa-exclamation"></i>',
                        titleColor: 'white',
                        messageColor: 'white',
                        message: xhr.responseText,
                        position: 'topCenter',
                        progressBarColor: 'white',

                    });
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
