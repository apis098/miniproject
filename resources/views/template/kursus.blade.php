@extends('template.nav')
@section('content')
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
  <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
  <style>
    ::placeholder {
      text-align: center;
    }

    .radius-bawah {
      border-bottom-left-radius: 30px;
      border-bottom-right-radius: 30px;
    }

    body {
      background: #f7f7f7;
      background: -webkit-linear-gradient(to right, #ffffff, #ffffff);
      background: linear-gradient(to right, #ffffff, #ffffff);
      min-height: 100vh;
      font-family: 'Poppins';
    }

    .font-poppins {
      font-family: 'Poppins';
    }

    @media(min-width: 1200px) {
      .search {
        background-color: #fff;
        padding: 0px 4px;
        border-radius: 5px;
        width: 50%;
        height: 10%;
        border-radius: 15px;
        border: 0.50px black solid;
      }
    }

    @media(min-width: 1300px) {
      .search {
        background-color: #fff;
        padding: 0px 4px;
        border-radius: 5px;
        width: 54%;
        height: 10%;
        border-radius: 15px;
        border: 0.50px black solid;
      }
    }

    @media(min-width: 1400px) {
      .search {
        background-color: #fff;
        padding: 0px 4px;
        border-radius: 5px;
        width: 58%;
        height: 10%;
        border-radius: 15px;
        border: 0.50px black solid;
      }
    }

    @media(max-width:768px) {

      .search {
        background-color: #fff;
        padding: 0px 4px;
        border-radius: 5px;
        width: 100%;
        height: 10%;
        border-radius: 15px;
        border: 0.50px black solid;
      }
    }

    @media(max-width: 1199px) and (min-width:767px) {
      .search {
        background-color: #fff;
        padding: 0px 4px;
        border-radius: 5px;
        width: 40%;
        height: 10%;
        border-radius: 15px;
        border: 0.50px black solid;
      }
    }

    .search-1 {
      position: relative;
      width: 100%
    }

    .search-1 input {
      height: 65px;
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
      font-size: 10px;
      color: #eee
    }

    ::placeholder {
      color: #eee;
      opacity: 1
    }

    .search-2 {
      position: relative;
      width: 100%;
    }

    .search-2 input {
      height: 35px;
      border: none;
      border-radius: 15px;
      width: 100%;
    }

    .search-2 input:focus {
      box-shadow: none;
      border-color: none;
      outline: none
    }

    .garis {
      padding: 0px;
      border: 0.5px solid grey;
      background-color: black;
    }


    .cari {
      position: absolute;
      top: -2px;
      border: none;
      height: 38px;
      background-color: #F7941E;
      color: #fff;
      margin-left: -6%;
      width: 90%;
      box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
      border-radius: 15px;
    }


    @media(min-width:729px) {
      .cari2 {
        position: absolute;
        top: -3px;
        right: -20px;
        border: none;
        height: 48px;
        background-color: #F7941E;
        color: #fff;
        width: 60px;
        box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
        border-radius: 15px;
      }
    }

    @media(max-width:728px) {
      .cari2 {
        position: absolute;
        top: 0px;
        bottom: 0px;
        right: -20px;
        border: none;
        height: 48px;
        background-color: #F7941E;
        color: #fff;
        width: 60px;
        box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
        border-radius: 15px;
      }

    }


    .btn-filter {
      position: relative;
      background: #F7941E;
      border-radius: 15px;
      color: white;
      border: none;
      font-size: 22px;
      font-family: Poppins;
      letter-spacing: 0.48px;
      margin-right: 0%;
      bottom: 15%;
      text-align: center;
    }

    .imgku {
      width: 100%;
      border-top-left-radius: calc(0.5rem - 1px);
      border-top-right-radius: calc(0.5rem - 1px);
    }


    @media(min-width:320px) and (max-width:768px) {
      .search-1 input {
        border-right: none;
        border-bottom: 1px solid #eee
      }

      .search-2 i {
        left: 4px
      }

      .search-2 input {
        padding-left: 1px
      }

      .search-2 button {
        height: 39px;
        top: 1px;
      }

      .btn-filter {
        height: fit-content;
        bottom: 1%;
      }

    }

    @media(min-width:769px) and (max-width: 853px) {
      .ulLaptop {
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        display: flex;
        justify-content: center;
      }

    }

    @media (min-width:768px) and (max-width:1024px) {
      .btn-filter {
        height: fit-content;
        bottom: 1%;
      }

    }


    @media (min-width: 992px) {
      .ulLaptop {
        display: flex;
        justify-content: center;
      }

      .ulTabletMobile {
        visibility: hidden;
        display: none;
      }

    }

    @media (min-width: 992px) and (max-width: 1200px) {
      .ulLaptop {
        display: relative;
        width: 80%;
        margin-left: 50px;
      }

      .ulTabletMobile {
        visibility: hidden;
        display: none;
      }



    }

    @media(min-width:769px) {
      .ulTabletMobile {
        visibility: hidden;
        display: none;
      }

      .ulLaptop {
        margin-left: 30px;
      }
    }

    @media(min-width:769px) and (max-width:990px) {
      .ulLaptop {
        display: flex;
        justify-content: space-around;
      }

      .search {
        background-color: #fff;
        padding: 0px 4px;
        border-radius: 5px;
        width: 30%;
        height: 10%;
        border-radius: 15px;
        border: 0.50px black solid;
      }
    }

    @media (max-width: 768px) {
      .ulLaptop {
        visibility: hidden;
        display: none;
      }


      .word {
        visibility: hidden;
        display: none;
      }

      .cari2 {
        top: 0px;
        bottom: 0px;
        right: -5px;
      }

      .search {
        width: 70%;

      }

      .cari2 {
        margin-left: -5px;
        border: none;
        height: 100%;
        background-color: #F7941E;
        color: #fff;
        width: 60px;
        box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
        border-radius: 15px;
      }

      .ulTabletMobile {
        display: relative;
      }

      .btn-filter {
        height: 40px;
      }
    }

    .text-kursus {
      white-space: nowrap;
      text-overflow: ellipsis;
      overflow: hidden;
      color: black;

      @supports (-webkit-line-clamp: 2) {
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: initial;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
      }
    }

    :hover.text-kursus {
      color: #F7941E;
    }
  </style>

  <div class="container-fluid py-5">
    <div class="text-center">
      <div class="mx-1">
        <h1 class="mb-5"
          style="text-align: center; color: black; font-size: 30px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
          Temukan kursus <br> terbaik
        </h1>
        <div>
          <div class="d-flex justify-content-between">
            <div class="search">
              <div class="search-2" style="height: 43px;"> <i class='bx bxs-map'></i>
                <form action="{{ route('kursus') }}" method="GET">
                  <input type="text" id="cari_nama_kursus" name="cari_nama_kursus" style="text-align: left;"
                    placeholder="Cari nama kursus ..." value="{{ request()->cari_nama_kursus }}">
                  <button type="submit" class="zoom-effects cari2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                      <path fill="currentColor"
                        d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                    </svg>
                  </button>
                </form>
              </div>
            </div>
            <!-- ul untuk laptop -->
            <ul class="nav text-sm ulLaptop" id="pills-tab" role="tablist">
              <li class="nav-item" role="presentation">
                <a id="click1" class="nav-link mr-4 active" id="pills-home-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                  aria-selected="true">
                  <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">
                    Semua</h5>
                  <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                  </div>
                </a>
              </li>

              <li class="nav-item" role="presentation">
                <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                  aria-selected="false">
                  <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">
                    Terbaru</h5>
                  <div id="b" class="ms-0" style="width:120%; height: 100%; border: 1px #F7941E solid;" hidden>
                  </div>
                </a>
              </li>

              <li class="nav-item" role="presentation">
                <button id="a-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                  aria-selected="false">
                  <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">
                    Favorit</h5>
                  <div id="pp" class="ms-1"
                    style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                  </div>
                </button>
              </li>

              <li class="nav-item" role="presentation" hidden>
                <button id="a-tab2" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-terbaik" type="button" role="tab" aria-controls="pills-terbaik"
                  aria-selected="false">
                  <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">
                    Terbaik</h5>
                  <div id="pp2" class="ms-2"
                    style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                  </div>
                </button>
              </li>
            </ul>
            <!-- Button Modal -->
            <div class="">
              <button class="btn btn-filter " data-bs-toggle="modal" data-bs-target="#formfilter">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                  <path fill="currentColor"
                    d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75v9.13M7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5H7.04Z" />
                </svg>
                <span class="word">Filter</span>
              </button>
            </div>
            <!-- End button modal -->
          </div>

        </div>
        <div class="row">
          <div class="col-12">
            <!-- ul untuk tablet&mobile -->
            <ul class="nav nav-stacked mx-auto text-sm ulTabletMobile overflow-x-auto" id="pills-tab" role="tablist">
              <li class="nav-item mx-auto me-5" role="presentation">
                <a id="click1s" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                  aria-selected="true">
                  <h6 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                    Semua</h6>
                  <div id="border1s" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                  </div>
                </a>
              </li>

              <li class="nav-item mx-auto" role="presentation">
                <a id="cs" class="nav-link " id="pills-profile-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                  aria-selected="false">
                  <h6 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                    Baru</h6>
                  <div id="bs" class="ms-0" style="width:120%; height: 100%; border: 1px #F7941E solid;"
                    hidden>
                  </div>
                </a>
              </li>

              <li class="nav-item mx-auto" role="presentation">
                <button id="a-tabs" class="nav-link yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                  aria-selected="false">
                  <h6 class="text-dark ms-1" style="font-weight: 600; word-wrap: break-word;">
                    Favorit</h6>
                  <div id="pps" class="ms-1"
                    style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                  </div>
                </button>
              </li>

              <li class="nav-item mx-auto" role="presentation" hidden>
                <button id="a-tab2s" class="nav-link yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                  data-bs-target="#pills-terbaik" type="button" role="tab" aria-controls="pills-terbaik"
                  aria-selected="false">
                  <h6 class="text-dark ms-1" style="font-weight: 600; word-wrap: break-word;">
                    Terbaik</h6>
                  <div id="pp2s" class="ms-2"
                    style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                  </div>
                </button>
              </li>
            </ul>
          </div>
        </div>

        <!-- Modal -->
        <div class="modal" id="formfilter" aria-labelledby="modalLabel" aria-hidden="true">
          <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" style="font-weight: 700;">Filter Lanjutan</h5>
                <button type="button" style="border: none;background:none" data-bs-dismiss="modal" aria-label="Close">
                  <svg width="34" height="34" viewBox="0 0 34 34" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1816_441)">
                      <path
                        d="M14.1386 13.9456L19.516 19.6906M13.907 19.5516L19.7476 14.0847M9.52654 23.6518C13.2235 27.6015 19.5337 27.7579 23.5491 23.9994C27.5645 20.2408 27.825 13.9341 24.128 9.98446C20.4311 6.03478 14.1209 5.87837 10.1055 9.63689C6.09008 13.3954 5.82955 19.7021 9.52654 23.6518Z"
                        stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" />
                    </g>
                    <defs>
                      <clipPath id="clip0_1816_441">
                        <rect width="23.6071" height="24" fill="white"
                          transform="translate(17.5215) rotate(46.8927)" />
                      </clipPath>
                    </defs>
                  </svg>
                </button>
              </div>
              <div class="modal-body">
                <form action="{{ route('kursus') }}" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="kursus" class="form-label">Jenis kursus</label> <br>
                    <select style="border: 1px solid black" name="jenis_kursus[]"
                      aria-placeholder="Masukkan jenis kursus" multiple="multiple" id="jeniscourses"
                      class="cari form-control">
                      <option value="" disabled>Masukkan Jenis kursus</option>
                      @foreach ($jenis_kursus as $item_jenis)
                        <option value="{{ $item_jenis }}">{{ $item_jenis }}</option>
                      @endforeach
                    </select>
                  </div>

                  <style>
                    #pbb {
                      background-color: white;
                    }
                  </style>
                  <div class="mb-3 mx-2">
                    <label for="harga" class="form-label">Rentang Tarif Per Sesi</label>
                    <div class="row">
                      <div class="col-5">
                        <input type="text" name="min_price" id="minHargaInput" placeholder="Minimal"
                          class="form-control " style="border-radius: 5px;font-size: 13px;border: 1px solid black;">
                      </div>
                      <div class="col-2 my-auto">
                        <div class="garis"></div>
                      </div>
                      <div class="col-5">
                        <input type="text" name="max_price" class="form-control" id="maxHargaInput"
                          placeholder="Maksimal" style="border-radius:5px; font-size:13px;border:1px solid black;">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 mx-2">
                    <label for="waktu" class="form-label">Rentang Lama Sesi</label>
                    <div class="row">
                      <div class="col-5">
                        <div class="d-flex justify-content-center mx-auto">
                          <input type="text" name="min_time" class="form-control mr-1" placeholder="Minimal"
                            style="border-radius: 5px; font-size:13px;border: 1px solid black;">
                          <select name="min_timer" id="" class=""
                            style="background-color: white;border-radius: 5px; border: 1px solid; font-size: 13px;">
                            <option value="menit">menit</option>
                            <option value="jam">jam</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-2 my-3">
                        <div class="garis"></div>
                      </div>
                      <div class="col-5">
                        <div class="d-flex justify-content-center mx-auto">
                          <input type="text" name="max_time" class="form-control mr-1" placeholder="Maksimal"
                            style="border-radius: 5px;font-size:13px;border: 1px solid black;">
                          <select name="max_timer" class=""
                            style="background-color: white;;border-radius: 5px; border: 1px solid;font-size:13px;"
                            id="">
                            <option value="menit">menit</option>
                            <option value="jam">jam</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 mx-2">
                    <label for="jumlah_pelajaran">Rating</label>
                    <input type="hidden" id="valueRating" name="rating">
                    <div class="row d-flex justify-content-center">
                      <div class="rate col-lg-3 col-md-4 col-sm-6 m-1" id="rating1"
                        style="border: 1px solid black; border-radius: 5px;padding: 5px;">
                        <a href="#" id="rate1" style="color: black;">Rating 1</a>
                      </div>
                      <div class="rate col-lg-3 col-md-4 col-sm-6 m-1" id="rating2"
                        style="border: 1px solid black; border-radius: 5px;padding: 5px;">
                        <a href="#" id="rate2" style="color: black;">Rating 2</a>

                      </div>
                      <div class="rate col-lg-3 col-md-4 col-sm-6 m-1" id="rating3"
                        style="border: 1px solid black; border-radius: 5px;padding: 5px;">
                        <a href="#" id="rate3" style="color: black;">Rating 3</a>

                      </div>
                      <div class="rate col-lg-3 col-md-4 col-sm-6 m-1" id="rating4"
                        style="border: 1px solid black; border-radius: 5px;padding: 5px;">
                        <a href="#" id="rate4" style="color: black;">Rating 4</a>

                      </div>
                      <div class="rate col-lg-3 col-md-4 col-sm-6 m-1" id="rating5"
                        style="border: 1px solid black; border-radius: 5px;padding: 5px;">
                        <a href="#" id="rate5" style="color: black;">Rating 5</a>

                      </div>
                    </div>
                  </div>

                  <div class="mb-3 d-flex flex-row-reverse">
                    <button type="submit" class="btn btn-light"
                      style="background-color: #F7941E; border-radius: 15px;">
                      <span style="font-weight: 600;color: white;">Cari</span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="leaflet" style="height: 180px"></div>

    <a href=""></a>
    <div class="mx-4">
      <div class="tab-content mb-5 mx-1 my-5" id="pills-tabContent">
        {{-- start tab 1 --}}
        <div class="tab-pane courses fade show active" id="pills-home" role="tabpanel"
          aria-labelledby="pills-home-tab" tabindex="0">
          @if ($semua_kursus->count() == 0)
            <div class="d-flex flex-column justify-content-center align-items-center">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif
          <div class="row">
            @foreach ($semua_kursus as $semua)
              <div class=" col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card " style="border-radius:15px">
                  <img src="{{ asset('storage/' . $semua->foto_kursus) }}" class="imgku" alt="..."
                    style="max-height: 200px; object-fit: cover">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <button type="button"class="btn"
                          style=" background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                          @foreach ($semua->jenis_kursus as $item)
                            {{ $item->jenis_kursus }}
                          @endforeach
                        </button> <br>
                        <a href="{{ route('detail.kursus', $semua->id) }}" class="text-kursus "
                          style="font-family: poppins;font-weight:bold">
                          {{ $semua->nama_kursus }}
                        </a>
                      </div>
                      <div class="col-12 mt-3 d-flex justify-content-between mx-1">
                        <div class=" d-flex pr-0 text-center" style="width: 50%">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 256 256">
                            <path fill="currentColor"
                              d="M208 28H72a28 28 0 0 0-28 28v168a4 4 0 0 0 4 4h144a4 4 0 0 0 0-8H52v-4a20 20 0 0 1 20-20h136a4 4 0 0 0 4-4V32a4 4 0 0 0-4-4Zm-4 160H72a27.94 27.94 0 0 0-20 8.42V56a20 20 0 0 1 20-20h132Z" />
                          </svg>
                          <p class="mt-1 ml-1" style="font-size:13px;"> {{ $semua->jumlah_sesi() }} Sesi</p>
                        </div>
                        <div class="d-flex pl-0 justify-content-end mr-2" style="width: 50%">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 15 15">
                            <path fill="none" stroke="currentColor"
                              d="M7.5 5v3.5H10m-4-8h3m-1.5 2a6 6 0 1 0 0 12a6 6 0 0 0 0-12Z" />
                            <p class="mt-1 ml-1" style="font-size: 13px">{{ $semua->total_waktu_sesi() }}</p>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $semua_kursus->links() }}
        </div>
        {{-- end tab 1 --}}

        {{-- start tab 2 --}}
        <div class="tab-pane courses fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
          tabindex="0">
          @if ($kursus_terbaru->count() == 0)
            <div class="d-flex flex-column justify-content-center align-items-center">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif
          <div class="row">
            @foreach ($kursus_terbaru as $baru)
              <div class=" col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card " style="border-radius:15px">
                  <img src="{{ asset('storage/' . $baru->foto_kursus) }}" class="imgku" alt="..."
                    style="max-height: 200px; object-fit: cover">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <button type="button"class="btn"
                          style=" background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                          @foreach ($baru->jenis_kursus as $item)
                            {{ $item->jenis_kursus }}
                          @endforeach
                        </button> <br>
                        <a href="{{ route('detail.kursus', $baru->id) }}" class="text-kursus "
                          style="font-family: poppins;font-weight:bold">
                          {{ $baru->nama_kursus }}
                        </a>
                      </div>
                      <div class="col-12 mt-3 d-flex justify-content-between mx-1">
                        <div class=" d-flex pr-0 text-center" style="width: 50%">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 256 256">
                            <path fill="currentColor"
                              d="M208 28H72a28 28 0 0 0-28 28v168a4 4 0 0 0 4 4h144a4 4 0 0 0 0-8H52v-4a20 20 0 0 1 20-20h136a4 4 0 0 0 4-4V32a4 4 0 0 0-4-4Zm-4 160H72a27.94 27.94 0 0 0-20 8.42V56a20 20 0 0 1 20-20h132Z" />
                          </svg>
                          <p class="mt-1 ml-1" style="font-size:13px;"> {{ $baru->jumlah_sesi() }} Sesi</p>
                        </div>
                        <div class="d-flex pl-0 justify-content-end mr-2" style="width: 50%">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 15 15">
                            <path fill="none" stroke="currentColor"
                              d="M7.5 5v3.5H10m-4-8h3m-1.5 2a6 6 0 1 0 0 12a6 6 0 0 0 0-12Z" />
                            <p class="mt-1 ml-1" style="font-size: 13px">{{ $baru->total_waktu_sesi() }}</p>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $kursus_terbaru->links() }}
        </div>
        {{-- end tab 2 --}}

        {{-- start tab 3 --}}
        <div class="tab-pane courses fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
          tabindex="0">
          @if ($kursus_terfavorite->count() == 0)
            <div class="d-flex flex-column justify-content-center align-items-center">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif
          <div class="row">
            @foreach ($kursus_terfavorite as $terfavorite)
              <div class=" col-lg-4 col-md-6 col-sm-6 col-12 mb-4">
                <div class="card " style="border-radius:15px">
                  <img src="{{ asset('storage/' . $terfavorite->foto_kursus) }}" class="imgku" alt="..."
                    style="max-height: 200px; object-fit: cover">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-12">
                        <button type="button"class="btn"
                          style=" background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                          @foreach ($terfavorite->jenis_kursus as $item)
                            {{ $item->jenis_kursus }}
                          @endforeach
                        </button> <br>
                        <a href="{{ route('detail.kursus', $terfavorite->id) }}" class="text-kursus "
                          style="font-family: poppins;font-weight:bold">
                          {{ $terfavorite->nama_kursus }}
                        </a>
                      </div>
                      <div class="col-12 mt-3 d-flex justify-content-between mx-1">
                        <div class=" d-flex pr-0 text-center" style="width: 50%">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 256 256">
                            <path fill="currentColor"
                              d="M208 28H72a28 28 0 0 0-28 28v168a4 4 0 0 0 4 4h144a4 4 0 0 0 0-8H52v-4a20 20 0 0 1 20-20h136a4 4 0 0 0 4-4V32a4 4 0 0 0-4-4Zm-4 160H72a27.94 27.94 0 0 0-20 8.42V56a20 20 0 0 1 20-20h132Z" />
                          </svg>
                          <p class="mt-1 ml-1" style="font-size:13px;"> {{ $terfavorite->jumlah_sesi() }} Sesi</p>
                        </div>
                        <div class="d-flex pl-0 justify-content-end mr-2" style="width: 50%">
                          <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 15 15">
                            <path fill="none" stroke="currentColor"
                              d="M7.5 5v3.5H10m-4-8h3m-1.5 2a6 6 0 1 0 0 12a6 6 0 0 0 0-12Z" />
                            <p class="mt-1 ml-1" style="font-size: 13px">{{ $terfavorite->total_waktu_sesi() }}</p>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $kursus_terfavorite->links() }}

        </div>
        {{-- end tab 3 --}}

        {{-- start tab 4 --}}
        <div class="tab-pane courses fade" id="pills-terbaik" role="tabpanel" aria-labelledby="pills-terbaik-tab"
          tabindex="0">
          @if ($kursus_terbaik->count() == 0)
            <div class="d-flex flex-column justify-content-center align-items-center">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif
          <div class="row mx-1" style="margin-left: -50px">
            @foreach ($kursus_terbaik as $terbaik)
              <div class="card mx-3 mb-5" style="width: 30%; border-radius:15px">
                <img src="{{ asset('storage/' . $terbaik->foto_kursus) }}" class="card-img-top"
                  style="margin-left:-13px; width:107.5%; border-top-left-radius: calc(0.5rem - 1px);
                               border-top-right-radius: calc(0.5rem - 1px);"
                  alt="...">
                <div class="card-body">
                  <div class="row">
                    <div class="col-12">
                      <button type="button"class="btn"
                        style=" background: #F7941E;color:white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                        @foreach ($terbaik->jenis_kursus as $item)
                          {{ $item->jenis_kursus }}
                        @endforeach
                      </button> <br>
                      <a href="{{ route('detail.kursus', $terbaik->id) }}" class="btn"
                        style="font-family: poppins;font-weight:bold">{{ $terbaik->nama_kursus }}</a>
                    </div>
                    <div class="col-12 mt-3 row">
                      <div class="col-6 d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 256 256">
                          <path fill="currentColor"
                            d="M208 28H72a28 28 0 0 0-28 28v168a4 4 0 0 0 4 4h144a4 4 0 0 0 0-8H52v-4a20 20 0 0 1 20-20h136a4 4 0 0 0 4-4V32a4 4 0 0 0-4-4Zm-4 160H72a27.94 27.94 0 0 0-20 8.42V56a20 20 0 0 1 20-20h132Z" />
                        </svg>
                        <p class="mt-1 mx-1"> {{ $terbaik->jumlah_sesi() }} Sesi</p>
                      </div>
                      <div class="col-6 d-flex">
                        <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 15 15">
                          <path fill="none" stroke="currentColor"
                            d="M7.5 5v3.5H10m-4-8h3m-1.5 2a6 6 0 1 0 0 12a6 6 0 0 0 0-12Z" />
                          <p class="mt-1 mx-1">{{ $terbaik->total_waktu_sesi() }}</p>
                        </svg>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
          {{ $kursus_terbaik->links() }}
        </div>
        {{-- end tab 4 --}}
      </div>
    </div>

  </div>
  <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
  <!-- jQuery CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    const click1 = document.getElementById("click1");
    const click2 = document.getElementById("c");
    const border1 = document.getElementById("border1");
    const border2 = document.getElementById("b");
    const o = document.getElementById("pp");
    const a_tab = document.getElementById("a-tab");
    const ab = document.getElementById("pp2");
    const a_tab2 = document.getElementById("a-tab2");

    a_tab.addEventListener('click', function(event) {
      event.preventDefault();
      o.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      ab.style.display = "none";
    });


    click1.addEventListener('click', function(event) {
      event.preventDefault();
      border1.style.display = "block";
      border2.style.display = "none";
      o.style.display = "none";
      ab.style.display = "none";
    });

    click2.addEventListener("click", function(event) {
      event.preventDefault();
      border2.removeAttribute('hidden');
      border2.style.display = "block";
      border1.style.display = "none";
      o.style.display = "none";
      ab.style.display = "none";
    });

    a_tab2.addEventListener('click', function(event) {
      event.preventDefault();
      ab.removeAttribute('hidden');
      ab.style.display = "block";
      border2.style.display = "none";
      border1.style.display = "none";
      o.style.display = "none";

    });

    //
    const click1s = document.getElementById("click1s");
    const click2s = document.getElementById("cs");
    const border1s = document.getElementById("border1s");
    const border2s = document.getElementById("bs");
    const os = document.getElementById("pps");
    const a_tabs = document.getElementById("a-tabs");
    const abs = document.getElementById("pp2s");
    const a_tab2s = document.getElementById("a-tab2s");

    a_tabs.addEventListener('click', function(event) {
      event.preventDefault();
      os.style.display = "block";
      border1s.style.display = "none";
      border2s.style.display = "none";
      abs.style.display = "none";
    });


    click1s.addEventListener('click', function(event) {
      event.preventDefault();
      border1s.style.display = "block";
      border2s.style.display = "none";
      os.style.display = "none";
      abs.style.display = "none";
    });

    click2s.addEventListener("click", function(event) {
      event.preventDefault();
      border2s.removeAttribute('hidden');
      border2s.style.display = "block";
      border1s.style.display = "none";
      os.style.display = "none";
      abs.style.display = "none";
    });

    a_tab2s.addEventListener('click', function(event) {
      event.preventDefault();
      abs.removeAttribute('hidden');
      abs.style.display = "block";
      border2s.style.display = "none";
      border1s.style.display = "none";
      os.style.display = "none";

    });

    $(document).ready(function() {
      $("#cari_nama_kursus").on("input", function() {
        let value = $(this).val().toLowerCase();
        $(".courses").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
    });

    // untuk bagian filter rating kursus
    let rating1 = document.getElementById("rating1");
    let rating2 = document.getElementById("rating2");
    let rating3 = document.getElementById("rating3");
    let rating4 = document.getElementById("rating4");
    let rating5 = document.getElementById("rating5");
    let valueRating = document.getElementById("valueRating");
    rating1.addEventListener("click", function() {
      rating1.style.backgroundColor = "orange";
      rating2.style.backgroundColor = "white";
      rating3.style.backgroundColor = "white";
      rating4.style.backgroundColor = "white";
      rating5.style.backgroundColor = "white";
      valueRating.value = 1;
    });
    rating2.addEventListener("click", function() {
      rating1.style.backgroundColor = "white";
      rating2.style.backgroundColor = "orange";
      rating3.style.backgroundColor = "white";
      rating4.style.backgroundColor = "white";
      rating5.style.backgroundColor = "white";
      valueRating.value = 2;
    });
    rating3.addEventListener("click", function() {
      rating1.style.backgroundColor = "white";
      rating2.style.backgroundColor = "white";
      rating3.style.backgroundColor = "orange";
      rating4.style.backgroundColor = "white";
      rating5.style.backgroundColor = "white";
      valueRating.value = 3;
    });
    rating4.addEventListener("click", function() {
      rating1.style.backgroundColor = "white";
      rating2.style.backgroundColor = "white";
      rating3.style.backgroundColor = "white";
      rating4.style.backgroundColor = "orange";
      rating5.style.backgroundColor = "white";
      valueRating.value = 4;
    });
    rating5.addEventListener("click", function() {
      rating1.style.backgroundColor = "white";
      rating2.style.backgroundColor = "white";
      rating3.style.backgroundColor = "white";
      rating4.style.backgroundColor = "white";
      rating5.style.backgroundColor = "orange";
      valueRating.value = 5;
    });
  </script>
  <script>
    //
    let rate1 = document.getElementById("rate1");
    let rate2 = document.getElementById("rate2");
    let rate3 = document.getElementById("rate3");
    let rate4 = document.getElementById("rate4");
    let rate5 = document.getElementById("rate5");
    rate1.addEventListener('click', function() {
      rate1.style.color = "white";
      rate2.style.color = "black";
      rate3.style.color = "black";
      rate4.style.color = "black";
      rate5.style.color = "black";
    });
    rate2.addEventListener('click', function() {
      rate2.style.color = "white";
      rate1.style.color = "black";
      rate3.style.color = "black";
      rate4.style.color = "black";
      rate5.style.color = "black";
    });
    rate3.addEventListener('click', function() {
      rate3.style.color = "white";
      rate2.style.color = "black";
      rate1.style.color = "black";
      rate4.style.color = "black";
      rate5.style.color = "black";
    });
    rate4.addEventListener('click', function() {
      rate4.style.color = "white";
      rate2.style.color = "black";
      rate3.style.color = "black";
      rate1.style.color = "black";
      rate5.style.color = "black";
    });
    rate5.addEventListener('click', function() {
      rate5.style.color = "white";
      rate2.style.color = "black";
      rate3.style.color = "black";
      rate4.style.color = "black";
      rate1.style.color = "black";
    });
    //
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(function(posisi) {
        let lat = posisi.coords.latitude;
        let lng = posisi.coords.longitude;
        var map = L.map('leaflet').setView([lat, lng], 18);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
          attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        var array = {!! json_encode($lokasi_kursus) !!};
        L.circle([lat, lng], {
          color: 'red',
          fillColor: '#f03',
          fillOpacity: 0.5,
          radius: 100
        }).bindPopup('Lokasi anda!').addTo(map);
        array.forEach(element => {
          L.marker([element.latitude, element.longitude]).addTo(map)
            .bindPopup("<a href='/detail_kursus/" + element.id_kursus + "'>" + element
              .nama_kursus + "</a>")
            .openPopup();
        });
      });
    }
  </script>
@endsection
