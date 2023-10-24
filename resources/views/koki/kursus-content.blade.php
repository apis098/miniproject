@extends('layouts.nav_koki')
@section('konten')

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

<div class="">
    <div class="my-4 ml-5">

<form action="{{ route('upload.tawaran') }}" method="post" id="form-upload-tawaran">
    @csrf
    <div class=" d-flex justify-content-start ms-3" style="overflow-x:hidden;">
        <div class="mt-4">
            <div class="mb-3 row">
                <label class="col-sm-1 col-form-label fw-bold">Nama</label> &nbsp; &nbsp;
                <div class="col-sm-10">
                    <input type="text" id="nama" name="nama_paket" class="form-control "
                        style="  width: 49rem; margin-left:-15px " placeholder="Masukkan Nama Kontenn...">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-1 col-form-label fw-bold">Waktu </label> &nbsp; &nbsp;
                <div class="col-sm-10">
                    <input type="time" id="harga" name="harga_paket" class="form-control "
                        style="  width: 49rem; margin-left:-15px " placeholder="Masukkan Waktu Konten...">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-1 col-form-label fw-bold">Harga </label> &nbsp; &nbsp;
                <div class="col-sm-10">
                    <input type="number" id="durasi" name="durasi_paket" class="form-control "
                        style="  width: 49rem; margin-left:-15px " placeholder="Masukkan Harga Konten...">
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-1 col-form-label fw-bold">Tanggal </label> &nbsp; &nbsp;
                <div class="col-sm-10">
                    <input type="date" id="durasi" name="durasi_paket" class="form-control "
                        style="  width: 49rem; margin-left:-15px " placeholder="Masukkan Tanggal Konten...">
                </div>
            </div>
            <div class="d-flex">
                <label class="col-form-label fw-bold me-2">Sesi </label> &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                <input type="text" id="comment-veed1" name="detail_paket[]" class="form-control me-2"
                    style="width: 44rem;" placeholder="Masukkan Sesi Konten...">
            </div>
            <div id="details"></div>
            <button type="button" id="button-add-detail" class="btn text-light rounded-3 mt-4 mb-3 float-start"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                    class="ms-2 me-2">Tambah
                    Sesi</b>
            </button> <br>
            <button type="submit" class="btn text-light rounded-3 float-end"
                style=" background-color:#F7941E; margin-right:-1%; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                    class="ms-2 me-2">Tambahkan
                    </b>
            </button>
        </div>
    </div>
</form>

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
                                        <label class="col-sm-1 col-form-label fw-bold">Nama</label>  &nbsp; &nbsp; &nbsp;  &nbsp;  &nbsp;
                                        <div class="col-sm-10">
                                            <input type="text" id="nama" name="nama_paket" class="form-control"
                                                style="  width: 37rem; margin-left:-15px " placeholder="Masukkan Nama Konten...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1 ">
                                        <label class="col-sm-1 col-form-label fw-bold">Waktu </label>  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;
                                        <div class="col-sm-10">
                                            <input type="time" id="harga" name="harga_paket" class="form-control "
                                                style="  width: 37rem; margin-left:-15px " placeholder="Masukkan Waktu Konten...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1">
                                        <label class="col-sm-1 col-form-label fw-bold">Harga </label>  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;
                                        <div class="col-sm-10">
                                            <input type="number" id="durasi" name="durasi_paket" class="form-control "
                                                style="  width: 37rem; margin-left:-15px " placeholder="Masukkan Harga Konten...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1">
                                        <label class="col-sm-1 col-form-label fw-bold">Tanggal </label>  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;
                                        <div class="col-sm-10">
                                            <input type="date" id="durasi" name="durasi_paket" class="form-control "
                                                style="  width: 37rem; margin-left:-15px " placeholder="Masukkan Tanggal Konten...">
                                        </div>
                                    </div>
                                    <div class="mb-3 row ml-1">
                                        <label class="col-sm-1 col-form-label fw-bold">Sesi </label>  &nbsp;  &nbsp; &nbsp;  &nbsp;  &nbsp;
                                        <div class="col-sm-10">
                                            <input type="text" id="durasi" name="durasi_paket" class="form-control "
                                                style="  width: 37rem; margin-left:-15px " placeholder="Masukkan Sesi Konten...">
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

<section class="section pricing mx-5 mb-3">
    <div class="container">
        <div class="row">
                <div class="col-lg-4 col-md-6 mb-1">
                    <div class="pricing-item animated-card">
                        <div class="pricing-heading">
                            <button type="submit "
                            style=" right: 10%; top: -2%; position: absolute; background-color:#F7941E; border: none; width: 11%; height: 8%;"
                            class="btn btn-warning btn-sm text-light rounded-circle d-flex"  data-toggle="modal" data-target="#edit">
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
                                <h6>Konten Kursus</h6>
                            </div>
                        </div>
                        <div class="pricing-body animated-card">
                            <!-- Feature List -->
                            <ul class="feature-list m-0 p-0">
                                <li>
                                    <p style="color: black;"><span class="fa fa-check-circle available"></span>kasdjdkdkajd</p>
                                    <p style="color: black;"><span class="fa fa-check-circle available"></span>kdadjajdakdjsadk</p>
                                    <p style="color: black;"><span class="fa fa-check-circle available"></span>Belajar memasak kangkung bersama kami dengan benar</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>


    </div>
</div>

@endsection
