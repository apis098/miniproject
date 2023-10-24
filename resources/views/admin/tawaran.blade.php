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
    <div style="overflow-x: hidden">
    <div class="d-flex mt-3 ms-5  justify-content-start" >
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
                <a href="#" class="nav-link mr-5" id="button-topUp" data-bs-toggle="tab" data-bs-target="#topUp"
                    type="button" role="tab" aria-controls="keluhan" aria-selected="false">
                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                        Top up Saldo
                    </h5>
                    <div id="border2" class="ms-3"
                        style="width: 70%; height: 80%; border: 1px #F7941E solid; display:none;">
                    </div>
                </a>
            </li>
        </ul>
    </div>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="berlangganan" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">
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
                        <button type="button" id="button-add-detail" class="btn text-light rounded-3 mt-4 mb-3 float-start"
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

            <style>

.pricing .pricing-item {
  border: 1px solid #0a0a0a;
  border-radius: 15px;
}
@media (max-width: 991px) {
  .pricing .pricing-item {
    margin-bottom: 30px;
  }
}
/* Animasi untuk kartu yang bergetar */
.animated-card {
    transition: transform 0.2s; /* Efek transisi untuk perubahan transformasi */
 }

 .animated-card:hover {
    transform: translateY(-5px); /* Kartu akan bergerak ke atas saat di-hover */
 }

.pricing .pricing-item .pricing-heading {
  padding: 20px 40px 30px 40px;
  background: #fafafa;
  border-bottom: 1px solid #a8a8a8;
  border-radius: 15px;
}

/* CSS untuk perubahan warna latar belakang saat card di-hover */
.animated-card .pricing-heading {
    background-color: #ffffff; /* Warna latar belakang awal (putih) */
    transition: background-color 0.2s; /* Efek transisi untuk perubahan warna */
 }

 .animated-card:hover .pricing-heading {
    background-color: #f7941e; /* Warna latar belakang saat di-hover */
 }
 /* CSS untuk perubahan warna teks saat card di-hover */
.animated-card .change-color {
    color: #000000; /* Warna teks awal (hitam) */
    transition: color 0.2s; /* Efek transisi untuk perubahan warna */
 }

 .animated-card:hover .change-color {
    color: #ffffff; /* Warna teks saat di-hover (putih) */
 }

.pricing .pricing-item .pricing-heading .title h6 {
  text-transform: uppercase;
  font-weight: 400;
  line-height: 50px;
  border-bottom: 1px solid #050505;
}
.pricing .pricing-item .pricing-heading .price {
  margin-top: 28px;
}
.pricing .pricing-item .pricing-heading .price h2 {
  font-size: 3.625rem;
  font-weight: 400;
  margin-bottom: 0px;
}
.pricing .pricing-item .pricing-heading .price h2 span {
  font-size: 1.5625rem;
}
.pricing .pricing-item .pricing-body {
  padding: 45px 40px;
}
.pricing .pricing-item .pricing-body ul.feature-list li {
  list-style: none;
}
.pricing .pricing-item .pricing-body ul.feature-list li p span {
  margin-right: 15px;
}
.pricing .pricing-item .pricing-body ul.feature-list li p span.available {
  color: #f7941e;
}
.pricing .pricing-item .pricing-body ul.feature-list li p span.unavailable {
  color: #100f0f;
}
.pricing .pricing-item .pricing-body ul.feature-list li:not(:last-child) {
  margin-bottom: 15px;
}
.pricing .pricing-item .pricing-footer {
  padding-bottom: 40px;
}
.pricing .pricing-item.featured {
  border: none;
  box-shadow: 0px 0px 30px 0px rgba(11, 29, 66, 0.15);
}
.pricing .pricing-item.featured .pricing-heading {
  background: #f7941e;
  border-bottom: 1px solid #f7941e;
}
.pricing .pricing-item.featured .pricing-heading .title h6 {
  color: #fff;
  border-bottom: 1px solid #f7941e;
}
.pricing .pricing-item.featured .pricing-heading .price {
  margin-top: 28px;
}
.pricing .pricing-item.featured .pricing-heading .price h2 {
  color: #fff;
  font-size: 3.625rem;
  margin-bottom: 0px;
}
.pricing .pricing-item.featured .pricing-heading .price h2 span {
  font-size: 1.5625rem;
}
.pricing .pricing-item.featured .pricing-heading .price p {
  color: #fff;
}
.pricing.two .pricing-item {
  border: 1px solid #e5e5e5;
  overflow: hidden;
}
@media (max-width: 991px) {
  .pricing.two .pricing-item {
    margin-bottom: 30px;
  }
}
.pricing.two .pricing-item .pricing-heading {
  position: relative;
  margin-bottom: 10px;
}
.pricing.two .pricing-item .pricing-heading .title h6 {
  position: relative;
}
.pricing.two .pricing-item .pricing-heading .price {
  position: relative;
}
.pricing.two .pricing-item .pricing-heading:before {
  content: "";
  position: absolute;
  bottom: -25%;
  left: 0;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 64px 500px 0 0;
  border-color: #fafafa transparent transparent transparent;
}
@media (max-width: 991px) {
  .pricing.two .pricing-item .pricing-heading:before {
    content: none;
  }
}
.pricing.two .pricing-item .pricing-body {
  padding: 70px 40px 45px;
}
.pricing.two .pricing-item .pricing-body ul.feature-list li p span.available {
  color: #f7941e;
}
.pricing.two .pricing-item.featured .pricing-heading:before {
  border-color: #f7941e transparent transparent transparent;
}

.beli {
    border: 1px solid #000000;
    margin-bottom: 40px;
    border-radius: 10px;
    text-align: center;
    width: 120px;

    /* Tambahkan properti berikut */
    margin-left: auto;
    margin-right: auto;
    display: block;
}


.beli:hover {
    background-color: #f7941e;
    color: #fff;
    border: 1px solid #f7941e;
}



            </style>

            <section class="section pricing mx-5 mb-3">
                <div class="container">
                    <div class="row">
                        @if ($penawaran_premium->count() == 0)
                        <div class="d-flex flex-column justify-content-center align-items-center">
                            <img src="{{ asset('images/data.png') }}" style="width: 15em">
                            <p><b>Tidak ada data</b></p>
                        </div>
                    @endif
                        @foreach ($penawaran_premium as $item_prem)
                            <div class="col-lg-4 col-md-6">
                                <div class="pricing-item animated-card">
                                    <div class="pricing-heading">
                                        <button type="button "
                                        style=" right: 10%; top: -2%; position: absolute; background-color:#F7941E; border: none; width: 10%; height: 7%;"
                                        class="btn btn-warning btn-sm text-light rounded-circle d-flex" data-toggle="modal" data-target="#edit">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-width="3.5"
                                                    d="m14.36 4.079l.927-.927a3.932 3.932 0 0 1 5.561 5.561l-.927.927m-5.56-5.561s.115 1.97 1.853 3.707C17.952 9.524 19.92 9.64 19.92 9.64m-5.56-5.561l-8.522 8.52c-.577.578-.866.867-1.114 1.185a6.556 6.556 0 0 0-.749 1.211c-.173.364-.302.752-.56 1.526l-1.094 3.281m17.6-10.162L11.4 18.16c-.577.577-.866.866-1.184 1.114a6.554 6.554 0 0 1-1.211.749c-.364.173-.751.302-1.526.56l-3.281 1.094m0 0l-.802.268a1.06 1.06 0 0 1-1.342-1.342l.268-.802m1.876 1.876l-1.876-1.876" />
                                            </svg>
                                    </button>
                                        <button type="button "
                                        style=" right: -4%; top: -3%; position: absolute; border: none;"
                                        class="btn  btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
                                        data-bs-target="#mymodal">
                                        <i class="fa-regular text-danger fa-circle-xmark fa-2xl" ></i>
                                    </button>

                                        <!-- Title -->
                                        <div class="title change-color">
                                            <h6>{{ $item_prem->nama_paket }}</h6>
                                        </div>
                                        <!-- Price -->
                                        <div class="price change-color">
                                            <h4><span>Rp</span>{{ number_format($item_prem->harga_paket, 2, ',', '.') }}</h4>
                                            @if ($item_prem->durasi_paket % 30 === 0)
                                            <p class="change-color">/{{ $item_prem->durasi_paket / 30 }} Bulan</p>
                                            @else
                                            <p class="change-color">/{{ $item_prem->durasi_paket }} Hari</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="pricing-body animated-card">
                                        <!-- Feature List -->
                                        <ul class="feature-list m-0 p-0">
                                            @foreach ($item_prem->detail_premium as $item_fiturPrem)
                                            <li>
                                                <p style="color: black;"><span class="fa fa-check-circle available"></span>{{ $item_fiturPrem->detail }}</p>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>

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
                            <div class="col-sm-10 d-flex">
                                <input type="text" id="harga_topup" name="price" class="form-control me-3"
                                    style="  width: 52rem; margin-left:-15px " placeholder="Masukkan Harga default...">
                                <button type="submit" class="btn text-light rounded-3 float-end"
                                    style=" background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);margin-right:-2%;"><b
                                        class="ms-2 me-2">Simpan</b>
                                </button>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </form>
            <div class="container">
                <div class="row ">
                    <div class="d-flex justify-content-start ms-5">
                        <h5 class="fw-bolder ms-1">
                            Penawaran kategori topup
                        </h5>
                    </div>
                </div>
                <div class="row">
                    <div class="d-flex justify-content-center">
                        <table id="table-resep" class="table-custom" style="width: 90%;">
                            <thead>
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categoryTopUp as $topup)
                                    <div id="search-results">
                                        <tr class="mt-5">
                                            <td style="border-left:1px solid black;" class="mt">
                                                {{ $topup->name }}
                                            </td>
                                            <td>Rp. {{ number_format($topup->price, 2, ',', '.') }}</td>
                                            <td style="border-right:1px solid black;">
                                                <div class="d-flex justify-content-center">
                                                    <button type="button" data-bs-toggle="modal"
                                                        data-bs-target="#modalEdit{{ $topup->id }}"
                                                        class="btn btn-light btn-sm rounded-3 text-light me-2"
                                                        style="background-color: #F7941E;"><b class="ms-2 me-2 mb-2 mt-2">
                                                            <i class="fa-solid fa-pencil"></i></b>
                                                    </button>
                                                    <button type="button" class="btn btn-outline-dark btn-sm rounded-3">
                                                        <b class="ms-2 me-2 mb-2 mt-2">
                                                            <i class="fa-solid fa-trash"></i></b>
                                                    </button>
                                                </div>
                                            </td>
                                        </tr>
                                    </div>
                                    <div class="modal fade" id="modalEdit{{ $topup->id }}" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered " role="document">
                                            <div class="modal-content" style="border-radius: 15px">
                                                <div class="modal-body">
                                                    <div class="d-flex justify-content-between">
                                                        <h5 class="modal-title" id="exampleModalLabel"
                                                            style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                                            Edit</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <br>
                                                    <form action="{{ route('update.categories',$topup->id) }}" method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <div class="">
                                                            <div class="col-sm-10">
                                                                <label for="name">
                                                                    Nama kategori
                                                                </label>
                                                                <input type="text" id="name" class="form-control mb-3"
                                                                    name="name" value="{{$topup->name}}"
                                                                    style="border-radius:10px; width:120%;">
                                                                <label for="price">
                                                                    Harga
                                                                </label>
                                                                <input type="text" id="price" class="form-control"
                                                                    name="price" value="{{$topup->price}}"
                                                                    style="border-radius:10px; width:120%;">
                                                                <br>
                                                                <button type="submit"
                                                                    class="btn btn-sm text-white d-flex justify-content-xxl-end"
                                                                    style="  margin-left: 350px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">
                                                                    Simpan
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  {{-- modal edit --}}
  <div class="modal fade" id="edit" tabindex="-1" role="dialog"
  aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content" style="border-radius: 15px">
          <div class="modal-body">
              <div class="d-flex justify-content-between">
                  <h5 class="modal-title ml-2" id="exampleModalLabel"
                      style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                      Edit
                  </h5>
                  <button type="button" class="close mr-2" data-dismiss="modal"
                      aria-label="Close" id="closeModalEdit">
                      <i class="fa-regular text-dark fa-circle-xmark"></i>
                  </button>
              </div>
              <form id="formUpdateFeed()" action="" method="POST">
                  @csrf
                  @method("PUT")
                  <div class="mt-4">
                      <div class="col-sm-12">
                        <form action="{{ route('upload.tawaran') }}" method="post" id="form-upload-tawaran">
                            @csrf
                            <div class=" d-flex mr-5" style="overflow-x:hidden;">
                                <div class="ml-4">
                                    <div class="mb-3 row ml-1">
                                        <label class="col-sm-1 col-form-label fw-bold">Nama</label>  &nbsp; &nbsp; &nbsp;
                                        <div class="col-sm-10">
                                            <input type="text" id="nama" name="nama_paket" class="form-control"
                                                style="  width: 38rem; margin-left:-15px " placeholder="Masukkan Nama Paket...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1 ">
                                        <label class="col-sm-1 col-form-label fw-bold">Harga </label>  &nbsp;  &nbsp; &nbsp;
                                        <div class="col-sm-10">
                                            <input type="text" id="harga" name="harga_paket" class="form-control "
                                                style="  width: 38rem; margin-left:-15px " placeholder="Masukkan Harga Paket...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1">
                                        <label class="col-sm-1 col-form-label fw-bold">Durasi </label>  &nbsp;  &nbsp; &nbsp;
                                        <div class="col-sm-10">
                                            <input type="text" id="durasi" name="durasi_paket" class="form-control "
                                                style="  width: 38rem; margin-left:-15px " placeholder="Masukkan Durasi Aktif Paket...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1">
                                        <label class="col-sm-1 col-form-label fw-bold">Detail </label>  &nbsp;  &nbsp; &nbsp;
                                        <div class="col-sm-10">
                                            <input type="text" id="durasi" name="durasi_paket" class="form-control "
                                                style="  width: 38rem; margin-left:-15px " placeholder="Masukkan Detail Paket...">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                      </div>
                  </div>
                  <br>
                  <button type="submit" onclick="buttonUpdateFeed"
                      class="btn btn-sm d-flex justify-content-end text-white float-end"
                      style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
              </form>
          </div>
      </div>
  </div>
</div>
{{-- end modal edit --}}

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

            <button type="button" onclick="hapus_details(${num})" class="btn btn-sm text-light rounded-3"
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
