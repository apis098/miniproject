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

    @media(max-width:475px) {
      ul li {
        text-align: center;
      }
    }
  </style>
  <div>
    <div class="d-flex mt-3 justify-content-start">
      <ul class="nav mb-3" id="pills-tab" role="tablist">
        <li class="nav-item tabs" role="presentation">
          <a href="#" class="nav-link active" id="button-berlangganan" data-bs-toggle="tab"
            data-bs-target="#berlangganan" type="button" role="tab" aria-controls="profile" aria-selected="false">
            <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
              Langganan
            </h5>
            <div id="border1" class="ms-3" style="width: 80%; height: 100%; border: 1px #F7941E solid;">
            </div>
          </a>
        </li>
        <li class="nav-item tabs" role="presentation">
          <a href="#" class="nav-link" id="button-topUp" data-bs-toggle="tab" data-bs-target="#topUp" type="button"
            role="tab" aria-controls="keluhan" aria-selected="false">
            <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
              Top up Saldo
            </h5>
            <div id="border2" class="ms-3" style="width: 80%; height: 100%; border: 1px #F7941E solid; display:none;">
            </div>
          </a>
        </li>
      </ul>
    </div>
    <div class="tab-content ms-3 me-3" id="pills-tabContent">
      <div class="tab-pane fade show active" id="berlangganan" role="tabpanel" aria-labelledby="pills-home-tab"
        tabindex="0">
        <div>
          <div>
            <form action="{{ route('upload.tawaran') }}" method="post" id="form-upload-tawaran">
              @csrf

              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fw-bold">Nama</label>
                <div class="col-sm-10">
                  <input type="text" id="nama" name="nama_paket" class="form-control "
                    placeholder="Masukkan Nama Paket...">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fw-bold">Harga </label>
                <div class="col-sm-10">
                  <input type="text" id="harga" name="harga_paket" class="form-control "
                    placeholder="Masukkan Harga Paket...">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-sm-2 col-form-label fw-bold">Durasi </label>
                <div class="col-sm-10">
                  <input type="text" id="durasi" name="durasi_paket" class="form-control "
                    placeholder="Masukkan Durasi Aktif Paket...">
                </div>
              </div>
              <div class="mb-3 row">
                <label class="col-form-label col-sm-2 fw-bold ">Detail </label>
                <div class="col-sm-10">
                  <input type="text" id="comment-veed1" name="detail_paket[]" class="form-control"
                    placeholder="Masukkan Detail Paket...">
                </div>
              </div>
              <div id="details"></div>
              <div class="d-flex justify-content-between">
              <button type="button" id="button-add-detail" class="btn text-light rounded-3 mt-4 mb-3"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b>Tambah
                  Detail</b>
              </button> <br>
              <button type="button" class="btn text-light rounded-3 mt-4 mb-3" onclick="buttonuploadtawaran()"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                  >Tambah
                  Paket</b>
              </button>
              </div>
            </form>
          </div>
        </div>
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
            transition: transform 0.2s;
            /* Efek transisi untuk perubahan transformasi */
          }

          .animated-card:hover {
            transform: translateY(-5px);
            /* Kartu akan bergerak ke atas saat di-hover */
          }

          .pricing .pricing-item .pricing-heading {
            padding: 20px 40px 30px 40px;
            background: #fafafa;
            border-bottom: 1px solid #a8a8a8;
            border-radius: 15px;
          }

          /* CSS untuk perubahan warna latar belakang saat card di-hover */
          .animated-card .pricing-heading {
            background-color: #ffffff;
            /* Warna latar belakang awal (putih) */
            transition: background-color 0.2s;
            /* Efek transisi untuk perubahan warna */
          }

          .animated-card:hover .pricing-heading {
            background-color: #f7941e;
            /* Warna latar belakang saat di-hover */
          }

          /* CSS untuk perubahan warna teks saat card di-hover */
          .animated-card .change-color {
            color: #000000;
            /* Warna teks awal (hitam) */
            transition: color 0.2s;
            /* Efek transisi untuk perubahan warna */
          }

          .animated-card:hover .change-color {
            color: #ffffff;
            /* Warna teks saat di-hover (putih) */
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

        <section class="section pricing ms-1 me-3 mt-5 mb-3">
            <div class="row">
              @if ($penawaran_premium->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center">
                  <img src="{{ asset('images/data.png') }}" style="width: 15em">
                  <p><b>Tidak ada data</b></p>
                </div>
              @endif
              @foreach ($penawaran_premium as $item_prem)
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="pricing-item animated-card">
                    <div class="pricing-heading">
                      <button type="button " style=" right: 5%; top: -5%; position: absolute;  border: none;"
                        class="btn btn-lg text-light rounded-circle " data-bs-toggle="modal"
                        data-bs-target="#edit{{ $item_prem->id }}">
                        <svg width="31" height="44" viewBox="0 0 28 27" fill="none"
                          xmlns="http://www.w3.org/2000/svg">
                          <path
                            d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                            fill="#F7941E" />
                          <path
                            d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                            fill="white" />
                        </svg>

                      </button>

                      <button type="button" style=" right: -4%; top: -3%; position: absolute; border: none;"
                        class="btn  btn-sm text-light rounded-circle p-2 "
                        onclick="confirmationToDeletePenawaran({{ $item_prem->id }})">
                        <i class="fa-regular text-danger fa-circle-xmark fa-2xl"></i>
                      </button>

                      <!-- Title -->
                      <div class="title change-color">
                        <h6>{{ $item_prem->nama_paket }}</h6>
                      </div>
                      <!-- Price -->
                      <div class="price change-color">
                        <h4><span>Rp</span>{{ number_format($item_prem->harga_paket, 2, ',', '.') }}
                        </h4>
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
                            <p style="color: black;"><span
                                class="fa fa-check-circle available"></span>{{ $item_fiturPrem->detail }}
                            </p>
                          </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                {{-- modal edit --}}
                <div class="modal" id="edit{{ $item_prem->id }}">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px">
                      <div class="modal-body">
                        <div class="d-flex justify-content-between">
                          <h5 class="modal-title ml-2" id="exampleModalLabel"
                            style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                            Edit
                          </h5>
                          <button type="button" class="close mr-2" data-bs-dismiss="modal" aria-label="Close"
                            id="closeModalEdit">
                            <i class="fa-regular text-dark fa-circle-xmark"></i>
                          </button>
                        </div>
                        <form id="formUpdateTawaran{{ $item_prem->id }}"
                          action="{{ route('update.tawaran', $item_prem->id) }}" method="POST">
                          @csrf
                          <div class="mt-4">
                            <div class="col-sm-12">
                              <div class=" d-flex mr-5" style="overflow-x:hidden;">
                                <div class="ml-4">
                                  <div class="mb-3 row ml-1">
                                    <label class="col-sm-1 col-form-label fw-bold">Nama</label> &nbsp; &nbsp;
                                    &nbsp;
                                    <div class="col-sm-10">
                                      <input type="text" id="nama" name="nama_paket"
                                        value="{{ $item_prem->nama_paket }}" class="form-control"
                                        style="  width: 38rem; margin-left:-15px " placeholder="Masukkan Nama Paket...">
                                    </div>
                                  </div>
                                  <div class="mb-3 row ml-1 ">
                                    <label class="col-sm-1 col-form-label fw-bold">Harga </label> &nbsp; &nbsp;
                                    &nbsp;
                                    <div class="col-sm-10">
                                      <input type="text" id="harga" name="harga_paket"
                                        value="{{ $item_prem->harga_paket }}" class="form-control "
                                        style="  width: 38rem; margin-left:-15px "
                                        placeholder="Masukkan Harga Paket...">
                                    </div>
                                  </div>
                                  <div class="mb-3 row ml-1">
                                    <label class="col-sm-1 col-form-label fw-bold">Durasi </label> &nbsp;
                                    &nbsp; &nbsp;
                                    <div class="col-sm-10">
                                      <input type="text" id="durasi" name="durasi_paket"
                                        value="{{ $item_prem->durasi_paket }}" class="form-control "
                                        style="  width: 38rem; margin-left:-15px "
                                        placeholder="Masukkan Durasi Aktif Paket...">
                                    </div>
                                  </div>
                                  @foreach ($item_prem->detail_premium as $item)
                                    <div class="mb-3 row ml-1">
                                      <label class="col-sm-1 col-form-label fw-bold">Detail </label> &nbsp;
                                      &nbsp; &nbsp;
                                      <div class="col-sm-10">
                                        <input type="hidden" name="id_detail_paket[]" value="{{ $item->id }}">
                                        <input type="text" id="detail" name="detail_paket[]"
                                          value="{{ $item->detail }}" class="form-control "
                                          style="  width: 38rem; margin-left:-15px "
                                          placeholder="Masukkan Detail Paket...">
                                      </div>
                                    </div>
                                  @endforeach

                                </div>
                              </div>
                            </div>
                          </div>
                          <br>
                          <button type="submit" onclick="buttonUpdateTawaran({{ $item_prem->id }})"
                            class="btn btn-sm d-flex justify-content-end text-white float-end"
                            style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- end modal edit --}}
              @endforeach
            </div>
        </section>

      </div>
      <div class="tab-pane fade show" id="topUp" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">

        <div class="">
          <div class="row ">
            <div class="d-flex justify-content-start">
              <h5 class="fw-bolder">
                Penawaran kategori topup
              </h5>
            </div>
          </div>
          <div class="row">
            <div class="d-flex justify-content-start">
              <table id="table-resep" class="table-custom" style="width: 100%;">
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
                            <button type="button" data-toggle="modal"
                              data-target="#modalEditPenawaran{{ $topup->id }}"
                              class="btn btn-light btn-sm rounded-3 text-light me-2"
                              style="background-color: #F7941E;"><b class="ms-2 me-2 mb-2 mt-2">
                                <i class="fa-solid fa-pencil"></i></b>
                            </button>
                            <button type="button" onclick="buttonhapus({{ $topup->id }})"
                              class="btn btn-outline-dark btn-sm rounded-3">
                              <b class="ms-2 me-2 mb-2 mt-2">
                                <i class="fa-solid fa-trash"></i></b>
                            </button>
                          </div>
                        </td>
                      </tr>
                    </div>
                    <div class="modal fade" id="modalEditPenawaran{{ $topup->id }}" tabindex="-1" role="dialog"
                      aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered " role="document">
                        <div class="modal-content" style="border-radius: 15px">
                          <div class="modal-body">
                            <div class="d-flex justify-content-between">
                              <h5 class="modal-title" id="exampleModalLabel"
                                style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                Edit {{ $topup->name }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <br>
                            <form action="{{ route('update.categories', $topup->id) }}" method="POST">
                              @method('PUT')
                              @csrf
                              <div class="">
                                <div class="">
                                  <label for="name">
                                    Nama kategori
                                  </label>
                                  <input type="text" id="name" class="form-control mb-3" name="name"
                                    value="{{ $topup->name }}" style="border-radius:10px;">
                                  <label for="price">
                                    Harga
                                  </label>
                                  <input type="text" id="price" class="form-control" name="price"
                                    value="{{ $topup->price }}" style="border-radius:10px;">
                                  <br>
                                  <button type="submit" class="btn btn-sm text-white float-end"
                                    style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">
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
            <div class="">
              <button type="button" data-bs-toggle="modal" data-bs-target="#modalTambah"
                class="btn rounded-3 text-dark" style="border: 1px solid #000; width:100%"><b class="">
                  Tambah
              </button>
            </div>
          </div>
        </div>

        {{-- modal tambah --}}
        <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" style="border-radius: 15px">
              <div class="modal-body">
                <div class="d-flex justify-content-between mb-4">
                  <h5 class="modal-title ml-2" id="exampleModalLabel"
                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                    Tambah
                  </h5>
                  <button type="button" class="close mr-2" data-bs-dismiss="modal" aria-label="Close"
                    id="closeModalTambah">
                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                  </button>
                </div>

                <form action="{{ route('categories.topup.store') }}" method="post">
                  @csrf
                  <div class="">
                    <div class="row mb-3">
                        <label class="col-sm-2 fw-bolder col-form-label">Nama</label>
                        <div class="col-sm-10">
                          <input type="text" id="nama_topup" name="name" class="form-control"
                            style="border-radius: 10px" placeholder="Masukkan Nama Kategori...">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 fw-bolder col-form-label">Harga</label>
                        <div class="col-sm-10">
                          <input type="text" id="harga_topup" name="price" class="form-control"
                            style="border-radius: 10px" placeholder="Masukkan Harga default...">
                        </div>
                    </div>
                  </div>
                  <button type="submit" class="btn text-light rounded-3 float-end"
                    style="background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                      class="">Simpan</b></button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>



  <script>
    function buttonhapus(num) {
      iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        message: 'Apakah anda yakin mau menghapus penawaran premium?',
        position: 'topCenter',
        buttons: [
          ['<button><b>YES</b></button>', function(instance, toast) {

            $.ajax({
              url: "/admin/delete-topup-categories/" + num,
              method: "DELETE",
              headers: {
                "X-Csrf-Token": "{{ csrf_token() }}"
              },
              success: function success(response) {
                iziToast.destroy();
                if (response.success) {
                  iziToast.success({
                    'title': 'Success',
                    'message': response.message,
                    'position': 'topCenter'
                  });
                  setTimeout(() => {
                    location.reload();
                  }, 1000);
                }
              },
              error: function error(xhr, error, status) {
                iziToast.destroy();
                iziToast.error({
                  'title': 'Error',
                  'message': xhr.responseText,
                  'position': 'topCenter'
                });
              }
            });

          }, true],
          ['<button>NO</button>', function(instance, toast) {

            instance.hide({
              transitionOut: 'fadeOut'
            }, toast, 'button');

          }],
        ],
        onClosing: function(instance, toast, closedBy) {
          console.info('Closing | closedBy: ' + closedBy);
        },
        onClosed: function(instance, toast, closedBy) {
          console.info('Closed | closedBy: ' + closedBy);
        }
      });
    }

    function confirmationToDeletePenawaran(num) {
      iziToast.question({
        timeout: 20000,
        close: false,
        overlay: true,
        displayMode: 'once',
        id: 'question',
        zindex: 999,
        message: 'Apakah anda yakin mau menghapus penawaran premium?',
        position: 'topCenter',
        buttons: [
          ['<button><b>YES</b></button>', function(instance, toast) {

            $.ajax({
              url: "/admin/delete_penawaran/" + num,
              method: "DELETE",
              headers: {
                "X-Csrf-Token": "{{ csrf_token() }}"
              },
              success: function success(response) {
                iziToast.destroy();
                if (response.success) {
                  iziToast.success({
                    'title': 'Success',
                    'message': response.message,
                    'position': 'topCenter'
                  });
                  location.reload();
                }
              },
              error: function error(xhr, error, status) {
                iziToast.destroy();
                iziToast.error({
                  'title': 'Error',
                  'message': xhr.responseText,
                  'position': 'topCenter'
                });
              }
            });

          }, true],
          ['<button>NO</button>', function(instance, toast) {

            instance.hide({
              transitionOut: 'fadeOut'
            }, toast, 'button');

          }],
        ],
        onClosing: function(instance, toast, closedBy) {
          console.info('Closing | closedBy: ' + closedBy);
        },
        onClosed: function(instance, toast, closedBy) {
          console.info('Closed | closedBy: ' + closedBy);
        }
      });
    }
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
  <script>
    function buttonUpdateTawaran(num) {
      $("#formUpdateTawaran" + num).submit(function(event) {
        event.preventDefault();
        let data = new FormData($(this)[0]);
        let route = $(this).attr('action');
        $.ajax({
          url: route,
          method: "POST",
          data: data,
          processData: false,
          contentType: false,
          success: function success(response) {
            iziToast.destroy();
            if (response.success) {
              iziToast.success({
                'title': 'Success',
                'message': response.message,
                'position': 'topCenter'
              });
              location.reload();
            }
          },
          error: function error(xhr, error, status) {
            iziToast.destroy();
            iziToast.error({
              'title': 'Error',
              'message': xhr.responseText,
              'position': 'topCenter'
            });
          }
        });
      });
    }
    let num = 1;
    document.getElementById("button-add-detail").addEventListener("click", function(e) {
      num++;
      let div = document.createElement('div');
      div.innerHTML = `
            <div class="row mb-3" id="detail${num}">
                <label class="col-form-label col-sm-2 fw-bold ">Detail </label>
                <div class="col-sm-10">
                  <input type="text" id="comment-veed1" name="detail_paket[]" class="form-control"
                    placeholder="Masukkan Detail Paket...">
                </div>
                <div class="col-sm-12">
              <button type="button" onclick="hapus_details(${num})" class="btn btn-sm text-light my-2 rounded-3 float-end"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                    class="ms-2 me-2">Hapus</b>
            </button>
            </div>
        </div>
            `;
      document.getElementById("details").appendChild(div);
    });

    function hapus_details(num) {
      document.getElementById("detail" + num).remove();
    }

    function buttonuploadtawaran() {
      const route = $("#form-upload-tawaran").attr("action");
      const data = new FormData($("#form-upload-tawaran")[0]);
      $.ajax({
        url: route,
        method: "POST",
        contentType: false,
        processData: false,
        data: data,
        headers: {
          "X-Csrf-Token": "{{ csrf_token() }}"
        },
        success: function success(response) {
          iziToast.destroy();
          iziToast.success({
            'title': 'Success',
            'message': response.message,
            'position': 'topCenter'
          });
          location.reload();

        },
        error: function error(xhr, status, errors) {
          iziToast.destroy();
          iziToast.error({
            'title': 'Error',
            'message': xhr.responseText,
            'position': 'topCenter'
          });
        }
      });
    }
  </script>
@endsection
