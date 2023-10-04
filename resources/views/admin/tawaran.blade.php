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
    <form action="{{ route('upload.tawaran') }}" method="post" id="form-upload-tawaran">
        @csrf
        <div class=" d-flex justify-content-center ms-3" style="overflow-x:hidden;">
            <div class="my-5" style="margin-left: 15rem;">
                <div class="mb-3 row">
                    <label class="col-sm-1 col-form-label fw-bold">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" id="nama" name="nama_paket" class="form-control "
                            style="  width: 61rem; margin-left: -30px" placeholder="Masukkan Nama Paket...">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-1 col-form-label fw-bold">Harga </label>
                    <div class="col-sm-10">
                        <input type="text" id="harga" name="harga_paket" class="form-control "
                            style="  width: 61rem; margin-left: -30px" placeholder="Masukkan Harga Paket...">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-1 col-form-label fw-bold">Durasi </label>
                    <div class="col-sm-10">
                        <input type="text" id="durasi" name="durasi_paket" class="form-control "
                            style="  width: 61rem; margin-left: -30px" placeholder="Masukkan Durasi Aktif Paket...">
                    </div>
                </div>
                <div class="d-flex">
                    <label class="col-form-label fw-bold ">Detail </label> &nbsp; &nbsp; &nbsp;
                    <input type="text" id="comment-veed1" name="detail_paket[]" class="form-control me-2"
                        style="width: 55rem;" placeholder="Masukkan Detail Paket...">
                </div>
                <div id="details"></div>
                <button type="button" id="button-add-detail" class="btn text-light rounded-3 mt-3 float-start"
                    style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                        class="ms-2 me-2">Tambah
                        Detail</b>
                </button> <br>
                <button type="submit" class="btn text-light rounded-3 mt-3 float-end"
                    style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                        class="ms-2 me-2">Tambah
                        Paket</b>
                </button>
            </div>
        </div>
    </form>
    <!-- jQuery CDN -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
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
                    style="width: 55rem;" placeholder="Masukkan Detail Paket...">

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
                        backgroundColor: '#F7941E',
                        title: '<i class="fa-regular fa-circle-question"></i>',
                        titleColor: 'white',
                        messageColor: 'white',
                        message: response.message,
                        position: 'topCenter',

                    });
                    setTimeout(() => {
                        window.location.reload();
                    }, 2000);
                    console.log(response.message);

                },
                error: function error(xhr, status, errors) {
                    iziToast.destroy();
                    iziToast.show({
                        backgroundColor: '#F7941E',
                        title: '<i class="fa-regular fa-circle-question"></i>',
                        titleColor: 'white',
                        messageColor: 'white',
                        message: xhr.responseText,
                        position: 'topCenter',
                    });
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
