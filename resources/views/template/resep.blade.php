  @extends('template.nav')
  @section('content')
  @section('content-header')
      <style>
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

          .social-link {
              width: 30px;
              height: 30px;
              border: 1px solid #ddd;
              display: flex;
              align-items: center;
              justify-content: center;
              color: #666;
              border-radius: 50%;
              transition: all 0.3s;
              font-size: 0.9rem;
          }

          .social-link:hover,
          .social-link:focus {
              background: #ddd;
              text-decoration: none;
              color: #555;
          }

          .search {
              background-color: #fff;
              padding: 4px;
              border-radius: 5px;

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
              font-size: 24px;
              color: #eee
          }

          ::placeholder {
              color: grey;
              opacity: 1
          }

          .search-2 {
              position: relative;
              width: 100%
          }

          .search-2 input {
              height: 45px;
              border: none;
              width: 100%;
              color: #000;
              padding-left: 18px;
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
              right: 1px;
              top: 0px;
              border: none;
              height: 45px;
              background-color: #F7941E;
              color: #fff;
              width: 90px;
              border-radius: 4px
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

          .garis {
              padding: 0px;
              border: 0.5px solid grey;
              background-color: black;
          }



          .intro-1 {

              font-size: 16px;
          }

          .close {

              color: #fff;
          }
      </style>
      <style>
          @media only screen and (max-width: 1200px) {
              #filter-name {
                  display: none;
              }
          }

          @media (min-width:800px) and (max-width:1300px) {}

          /* @media (min-width: 320px) {
                                img.widt {
                                   max-width: 100%;
                                  height: 100%;
                                }
                              } */

          @media (min-width:290px) and (max-width: 450px) {
              img.besar {
                  max-width: 160px;
                  height: 160px;
              }

              span.tesk {
                  /* white-space: pre-line; */
                  display: flex;
                  flex-direction: column;
              }

              svg.kanan {
                  margin-left: -7px;
              }

              div.search {
                  width: 75%;
              }

              div.kanan {
                  margin-left: -12px;
              }

              h1.kanan {
                  margin-left: 20px;
              }

          }

          @media (min-width:450px) and (max-width: 765px) {
              div.search {
                  width: 80%;
              }

          }





          @media (min-width: 375px) {
              svg.kanan {
                  margin-left: -2px;
              }
          }





          @media (min-width: 350px) and (max-width: 860px) {
              div.kanan {
                  margin-left: -12px;
              }

              h1.kanan {
                  margin-left: 20px;
              }

              img.besar {
                  max-width: 222px;
                  height: 200px;
              }

              button.high {
                  padding: 0px 2px;
                  height: 26%;
              }

          }

          @media (min-width: 390px) {
              button.besar {
                  height: 36%;
              }

              div.kanan {
                  /* margin-right: 32px; */
              }

          }

          @media (min-width: 411px) {
              button.besar {
                  height: 36%;
              }

              div.kanan {
                  /* margin-right: 32px; */
              }

          }

          @media(max-width: 475px) {
              .foto_kursus {
                  width: 260px;
              }
          }

          @media(max-width: 320px) {
              .foto_kursus {
                  width: 180px;
                  height: 100px;
              }
          }

          @media (min-width: 425px) {
              button.high {
                  height: 36%;
              }

              span.tesks {
                  display: flex;
                  flex-direction: column;
              }
          }

          /* untuk tampilan ipad */
          @media (min-width: 760px) and (max-width: 1092px) {
              div.kiri {
                  margin-left: 75px;
              }

              div.search {
                  width: 85%;
              }



              div.card {
                  width: 100%;
              }

              span.tesk {
                  display: flex;
                  flex-direction: column;
              }

          }

          */ @media (max-width: 1104px) {
              img.besar {
                  max-width: 230px;
                  height: 230px;
              }
          }

          @media (min-width: 1024px) {
              div.search {
                  width: 100%;
              }

              div.kiri {
                  margin-right: 65px;
              }

              button.high {
                  width: 9%;
              }

              img.besar {
                  max-width: 230px;
                  height: 230px;
              }

              span.tesk {
                  display: flex;
                  flex-direction: column;
              }

          }

          /* untuk tampilan laptop */
          @media (min-width: 1210px) and (max-width: 4000px) {

              div.kiri {
                  margin-left: 55px;
              }

              img.besar {
                  max-width: 260px;
                  height: 260px;
              }

              button.high {
                  height: 35%;
                  width: 15%;
              }

              div.search {
                  width: 85%;
              }

          }

          .judul-resep {
              white-space: nowrap;
              text-overflow: ellipsis;
              overflow: hidden;


              @supports (-webkit-line-clamp: 1) {
                  overflow: hidden;
                  text-overflow: ellipsis;
                  white-space: initial;
                  display: -webkit-box;
                  -webkit-line-clamp: 1;
                  -webkit-box-orient: vertical;
              }
          }

          .btn-fil {
              width: auto;
              background: white;
              border-radius: 15px;
              color: black;
              font-size: 18px;
              font-family: Poppins;
              font-weight: 600;
              letter-spacing: 0.48px;
              bottom: 10%;
          }

          @media (min-width:1400px) {
              .gambar-resep {
                  min-width: 250px;
              }
          }

          @media (min-width:1200px) {
              .gambar-resep {
                  min-width: 180px;
              }
          }

          .scrollbar::-webkit-scrollbar-track {
              border-radius: 10px;
              background-color: #F5F5F5;
          }

          .scrollbar::-webkit-scrollbar {
              width: 4px;
              background-color: #F5F5F5;
              height: 5px;
          }

          .scrollbar::-webkit-scrollbar-thumb {
              border-radius: 10px;
              background-color: #F7941E;
          }
      </style>

      <div class="container-fluid py-5">
          <div class="row text-center text-white ">
              <div style="" class="col-lg-9 row  mx-auto ">
                  <h1 class="mb-5 col-12 header-text">
                      Cari Resep Masakan <br />
                  </h1>
                  <div class="gap-2 justify-content-between" style="display:flex">
                      <div class="search " style="border-radius: 15px;">
                          <div class="row">
                              <div class="col-md-12">
                                  <div class="search-2"> <i class='bx bxs-map'></i>
                                      <form action="{{ route('resep.home') }}" method="GET">
                                          <input type="text" name="nama_resep" placeholder="Masukkan nama resep..."
                                              value="{{ request()->nama_resep }}">
                                          <button type="submit" class="zoom-effects"
                                              style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Cari</button>
                                      </form>
                                  </div>
                              </div>

                          </div>
                      </div>
                      <button class="btn btn-fil " data-bs-toggle="modal" data-bs-target="#filter">
                          <svg class="" xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                              viewBox="0 0 24 24">
                              <path fill="currentColor"
                                  d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75v9.13M7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5H7.04Z" />
                          </svg>
                          <span id="filter-name">filter</span>
                      </button>
                  </div>
                  <!-- Button Modal -->

              </div>
          </div>
      </div>
      <!-- End -->
  @endsection

  @if ($errors->any())
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif

  <!-- Modal -->
  <div class="modal" id="filter" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" style="font-weight: 700;">Filter Lanjutan</h5>
                  <button type="button" style="border: none;background:none" data-bs-dismiss="modal"
                      aria-label="Close">
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
                  <form action="{{ route('resep.home') }}" method="GET">
                      @if (request()->nama_resep)
                          <input type="text" hidden name="nama_resep" value="{{ request()->nama_resep }}">
                      @endif
                      <div class="mb-3">
                          <label for="ingredients" class="form-label">Nama Bahan</label>
                          <select style="border: 1px solid black;width:100%;" name="ingredients[]"
                              aria-placeholder="Masukkan nama bahan" multiple="multiple" id="ingredients"
                              class="cari-bahan form-select">
                              <option value="" disabled>Masukkan Nama Bahan</option>
                              @foreach ($categories_ingredients as $f)
                                  <option value="{{ $f }}">{{ $f }}</option>
                              @endforeach
                          </select>
                      </div>
                      <style>
                          #pbb {
                              background-color: white;
                          }
                      </style>
                      <div class="mb-3">
                          <label for="harga" class="form-label">Rentang Harga</label>
                          <div class="row">
                              <div class="col-5">
                                  <input type="text" name="min_price" id="minHargaInput" placeholder="Minimal"
                                      class="form-control "
                                      style="border-radius: 10px;font-size: 13px;border: 1px solid black;">
                              </div>
                              <div class="col-2 my-auto">
                                  <div class="garis"></div>
                              </div>
                              <div class="col-5">
                                  <input type="text" name="max_price" class="form-control" id="maxHargaInput"
                                      placeholder="Maksimal"
                                      style="border-radius:10px; font-size:13px;border:1px solid black;">
                              </div>
                          </div>
                      </div>
                      <div class="mb-3">
                          <label for="waktu" class="form-label">Waktu</label>
                          <div class="row">
                              <div class="col-5">
                                  <div class="row mx-auto">
                                      <input type="text" name="min_time" class="col-6 form-control mr-1"
                                          placeholder="Minimal"
                                          style="border-radius: 10px; font-size:13px;border: 1px solid black;">
                                      <select name="min_timer" id="" class="col-5"
                                          style="background-color: white;border-radius: 10px; border: 1px solid; font-size: 13px;">
                                          <option value="menit">menit</option>
                                          <option value="jam">jam</option>
                                      </select>
                                  </div>
                              </div>
                              <div class="col-2 my-3">
                                  <div class="garis"></div>
                              </div>
                              <div class="col-5">
                                  <div class="row mx-auto">
                                      <input type="text" name="max_time" class="col-6 form-control mr-1"
                                          placeholder="Maksimal"
                                          style="border-radius: 10px;font-size:13px;border: 1px solid black;">
                                      <select name="max_timer" class="col-5"
                                          style="background-color: white;;border-radius: 10px; border: 1px solid;font-size:13px;"
                                          id="">
                                          <option value="menit">menit</option>
                                          <option value="jam">jam</option>
                                      </select>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="mb-3">
                          <label for="alat" class="form-label">Alat alat</label>
                          <select style="width: 100%;" name="alat[]" multiple="multiple" id="alat"
                              class="form-select cari-alat js-states">
                              <option value="" disabled>Masukkan Nama Alat-Alat</option>
                              @foreach ($toolsCooks as $itemtool)
                                  <option value="{{ $itemtool->nama_alat }}">{{ $itemtool->nama_alat }}</option>
                              @endforeach
                          </select>
                      </div>
                      <div class="mb-3">
                          <label for="hari" class="form-label">Hari spesial</label>
                          <div class="scrollbar" style="overflow-x:scroll;">
                              <div class="d-flex" style="min-width:400px;">
                                  @foreach ($special_day as $nums => $d)
                                      <div class="mr-4 mb-3" style="width:100%;">
                                          <input type="hidden" id="input_pilih_hari{{ $nums }}"
                                              value="{{ $d->nama }}">
                                          <button id="pilih_hari{{ $nums }}"
                                              onclick="pilih_hari({{ $nums }})" class="btn btn-light"
                                              type="button" class="p-2"
                                              style="border: 1px solid black; border-radius: 10px;font-size: 16px;">{{ $d->nama }}</button>
                                      </div>
                                  @endforeach
                              </div>
                          </div>
                      </div>
                      <div class="mb-3">
                          <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                          <div class="scrollbar" style="overflow-x:scroll;">
                              <div class="d-flex" style="min-width: 400px;">
                                  @foreach ($categories_foods_all as $num => $f)
                                      <div class="mr-4 mb-3" style="width: 100%;">
                                          <input id="input_jenis_makanan{{ $num }}" type="hidden"
                                              value="{{ $f->nama_makanan }}">
                                          <button id="pilih_jenis_makanan{{ $num }}"
                                              onclick="pilih_jenis_makanan({{ $num }})"
                                              class="btn btn-light" type="button" class="p-2"
                                              style="border: 1px solid black; border-radius: 10px;font-size: 16px;">{{ $f->nama_makanan }}</button>
                                      </div>
                                  @endforeach
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
                  <style>
                      .btn-filter {
                          background-color: #F7941E;
                          color: white;
                          font-weight: 400;
                      }
                  </style>
                  <script>
                      function pilih_hari(num) {
                          const pilih_hari = document.getElementById("pilih_hari" + num);
                          const input_pilih_hari = document.getElementById("input_pilih_hari" + num);
                          if (pilih_hari.classList.contains("btn-light")) {
                              pilih_hari.classList.remove("btn-light");
                              pilih_hari.classList.add("btn-filter");
                              input_pilih_hari.setAttribute("name", "hari_khusus[]");
                          } else if (pilih_hari.classList.contains("btn-filter")) {
                              pilih_hari.classList.remove("btn-filter");
                              pilih_hari.classList.add("btn-light");
                              input_pilih_hari.removeAttribute("name");
                          }
                      }

                      function pilih_jenis_makanan(num) {
                          const pilih_jenis_makanan = document.getElementById("pilih_jenis_makanan" + num);
                          const input_jenis_makanan = document.getElementById("input_jenis_makanan" + num);
                          if (pilih_jenis_makanan.classList.contains("btn-light")) {
                              pilih_jenis_makanan.classList.remove("btn-light");
                              pilih_jenis_makanan.classList.add("btn-filter");
                              input_jenis_makanan.setAttribute("name", "jenis_makanan[]");
                          } else if (pilih_jenis_makanan.classList.contains("btn-filter")) {
                              pilih_jenis_makanan.classList.remove("btn-filter");
                              pilih_jenis_makanan.classList.add("btn-light");
                              input_jenis_makanan.removeAttribute("name");
                          }
                      }
                      document.addEventListener('DOMContentLoaded', function() {
                          const minHargaInput = document.getElementById('minHargaInput');
                          const maxHargaInput = document.getElementById('maxHargaInput');

                          const formatNumber = (input) => {
                              const rawValue = input.value.replace(/\D/g, '');
                              const formattedValue = new Intl.NumberFormat('id-ID').format(rawValue);
                              input.value = formattedValue;
                          };

                          minHargaInput.addEventListener('input', function() {
                              formatNumber(this);
                          });

                          maxHargaInput.addEventListener('input', function() {
                              formatNumber(this);
                          });
                      });
                  </script>
              </div>
          </div>
      </div>
  </div>
  <div class=" mt-5  px-5 input-group">
      <div class="ms-1">
          <h3 class="fw-bold">Hasil Pencarian</h3>
      </div>
  </div>
  @if ($recipes->count() == 0)
      <div class="d-flex flex-column justify-content-center align-items-center">
          <img src="{{ asset('images/data.png') }}" style="width: 15em">
          <p><b>Tidak ada resep</b></p>
      </div>
  @endif
  <div class="my-5 mx-5">

      <div class="row d-flex justify-content-start">
          @foreach ($recipes as $num => $item)
              <div class="col-xl-3 col-lg-4 mb-5 col-sm-8 col-12 col-md-6">
                  <a href="/artikel/{{ $item->id }}/{{ $item->nama_resep }}">
                      <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                          <div class="mx-1 card-body">
                              <div class="mb-2" style="background-color: white">
                                  <div class="d-flex justify-content-center">
                                      <img class="img-fluid gambar resep gambar-resep"
                                          style="border: 0.50px black solid;object-fit: cover; height:250px;border-radius:15px;"
                                          src="{{ asset('storage/' . $item->foto_resep) }}" />
                                  </div>
                                  @if ($item->isPremium === 'yes')
                                      <button id="buttonPremium" type="button"
                                          style="position: absolute;  left: -6%;top:-4%; background-color:#F7941E; "
                                          class="btn btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
                                          data-bs-target="#staticBackdrop{{ $num }}">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                              viewBox="0 0 20 20">
                                              <g fill="currentColor">
                                                  <path fill-rule="evenodd"
                                                      d="m14.896 13.818l1.515-5.766l-2.214 1.41a2 2 0 0 1-2.74-.578L10 6.695l-1.458 2.19a2 2 0 0 1-2.74.577L3.59 8.052l1.515 5.766h9.792Zm-10.77-6.61c-.767-.489-1.736.218-1.505 1.098l1.516 5.766a1 1 0 0 0 .967.746h9.792a1 1 0 0 0 .967-.746l1.516-5.766c.23-.88-.738-1.586-1.505-1.098l-2.214 1.41a1 1 0 0 1-1.37-.288l-1.458-2.19a1 1 0 0 0-1.664 0L7.71 8.33a1 1 0 0 1-1.37.289l-2.214-1.41Z"
                                                      clip-rule="evenodd" />
                                                  <path
                                                      d="M10.944 3.945a.945.945 0 1 1-1.89.002a.945.945 0 0 1 1.89-.002ZM18.5 5.836a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Zm-15.111 0a.945.945 0 1 1-1.89.001a.945.945 0 0 1 1.89 0Z" />
                                                  <path fill-rule="evenodd"
                                                      d="M5.25 16a.5.5 0 0 1 .5-.5h8.737a.5.5 0 1 1 0 1H5.75a.5.5 0 0 1-.5-.5Z"
                                                      clip-rule="evenodd" />
                                              </g>
                                          </svg>
                                      </button>
                                  @endif

                                  <!-- Modal -->
                                  <div class="modal fade" id="staticBackdrop{{ $num }}"
                                      data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                      aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content" style="border-radius: 15px">
                                              <div class="modal-body" style="border-radius: 15px;">
                                                  <button type="button" style="margin-left: 96%;" class="btn-close"
                                                      data-bs-dismiss="modal" aria-label="Close">
                                                  </button>

                                                  <div class="row">
                                                      <div class="text-center">
                                                          <img src="{{ asset('images/crown-prem.png') }}"
                                                              style="height: 100%; width: 100%; {{-- position: absolute; left: -15%; top: -11%;  --}}">

                                                      </div>
                                                      <div class="text-black text-center">
                                                          <h2 class="mb-3 text-bold" style="font-family:poppins">
                                                              Upgrade
                                                              ke
                                                              premium</h2>

                                                          <span class="intro-2">
                                                              Upgrade ke premium sekarang juga untuk membuka akses ke
                                                              resep
                                                              resep
                                                              premium kami.</span>

                                                          <div class="mt-4 mb-5">
                                                              <a href="{{ route('penawaran.premium') }}"
                                                                  class="btn"
                                                                  style="font-family:poppins;border-radius:15px;background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color:#ffffff;">Lihat
                                                                  lebih lanjut</a>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <!--  End Modal-->

                              </div>
                              <div class="p-0" style="color:#000">
                                  <div class="row">
                                      <div class="col-12 mb-3">
                                          <!-- untuk koki lain -->
                                          <h5>
                                              <p style="color: black; font-weight: bold; font-size: 25px; margin-left:-1px"
                                                  class="judul-resep" href="">
                                                  {{ $item->nama_resep }}</p>
                                          </h5>
                                          <strong>
                                            Oleh :
                                            </strong>
                                            <span class="ellipsis-name">{{ $item->User->name }} </span>
                                            @if ($item->user->isSuperUser == 'yes')
                                                <i class="fa-regular text-primary fa-circle-check mt-1"></i>
                                            @endif
                                             <br>

                                      </div>
                                      <div class="col-12 row d-flex justify-content-between">
                                          <div class="col-6 d-flex align-items-center pr-0">
                                              <span class="text-nowrap">
                                                  <img class="mb-1" width="17px" height="17px"
                                                      src="{{ asset('images/icon _thumbs up_.svg') }}"
                                                      alt="">

                                                  {{ $item->likes }} </span>
                                              <span class="text-nowrap tesk ml-2" style="font-size: 15px"> Suka
                                              </span>
                                          </div>
                                          <div class="col-6 pr-0">
                                              <span class="text-nowrap d-flex gap-2 align-items-center"
                                                  style="font-size: 15px">
                                                  <img width="17px" height="17px"
                                                      src="{{ asset('images/icon _time_.svg') }}" alt="">

                                                  @if ($item->lama_memasak >= 60)
                                                      {{ number_format($item->lama_memasak / 60, 1) }} <span
                                                          class="tesk">
                                                          Jam </span>
                                                  @else
                                                      {{ $item->lama_memasak }} <span class="tesk"> Menit </span>
                                                  @endif
                                              </span>
                                          </div>
                                          <div class="col-6 my-3 d-flex gap-2 align-items-center pr-0">
                                              <span class="text-nowrap">
                                                  <img width="16px" height="16px"
                                                      src="{{ asset('images/icon _comment square chat message_.svg') }}"
                                                      alt="">
                                                  {{ $item->comment_recipes->count() }}
                                              </span>
                                              <span class="tesk " style="font-size: 15px">
                                                  Komen
                                              </span>
                                          </div>
                                          <div class="col-6 my-3 pr-0">

                                              <span class="text-nowrap  d-flex gap-2 align-items-center">
                                                  <img width="17px" height="17px"
                                                      src="{{ asset('images/icon _bookmark save_.svg') }}"
                                                      alt="">
                                                  {{ $item->favorite_count }}
                                                  <span class="tesk " style="font-size: 15px"> Favorit </span>
                                              </span>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </a>
              </div>
          @endforeach
      </div>
      {{ $recipes->links('vendor.pagination.default') }}
  </div>
  <script>
      const url = new URLSearchParams(window.location.search);
      if (url.get("premium") == "yes") {
          document.getElementById("buttonPremium").click();
      }

      function openButtonPremium() {
          document.getElementById("buttonPremium").click();
      }
  </script>
   <script>
    function limitName() {
      let elements = document.querySelectorAll('.ellipsis-name');

      elements.forEach(element => {
        let text = element.textContent.trim(); // Mengambil teks asli dari elemen
        let screenWidth = window.innerWidth;
        let maxLength;

        if (screenWidth <= 425) {
          maxLength = 5;
        } else if (screenWidth <= 767 && screenWidth >= 426) {
          maxLength = 10;
        } else {
          maxLength = 10;
        }

        let shortenedText = text.length > maxLength ? text.substr(0, maxLength) + '...' : text;
        element.textContent = shortenedText;
      });
    }

    document.addEventListener('readystatechange', () => {
      if (document.readyState === 'interactive') {
        limitName();
        window.addEventListener('resize', limitName);
      }
    });
  </script>
@endsection

<!-- Modal -->
{{-- <div class="modal fade" id="staticBackdrop{{$num}}" data-bs-backdrop="static"
  data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-xl">
      <div class="modal-content">
          <div class="modal-header">
              <h1 class="modal-title fs-5" style="font-family:poppins"
                  id="staticBackdropLabel">Beli premium dulu ya!!!</h1>
              <button type="button" style="border:none; background:none " data-bs-dismiss="modal"
                  aria-label="Close">
                  <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                      <g clip-path="url(#clip0_1816_441)">
                      <path d="M14.1386 13.9456L19.516 19.6906M13.907 19.5516L19.7476 14.0847M9.52654 23.6518C13.2235 27.6015 19.5337 27.7579 23.5491 23.9994C27.5645 20.2408 27.825 13.9341 24.128 9.98446C20.4311 6.03478 14.1209 5.87837 10.1055 9.63689C6.09008 13.3954 5.82955 19.7021 9.52654 23.6518Z" stroke="black" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
                      </g>
                      <defs>
                      <clipPath id="clip0_1816_441">
                      <rect width="23.6071" height="24" fill="black" transform="translate(17.5215) rotate(46.8927)"/>
                      </clipPath>
                      </defs>
                      </svg>
              </button>
          </div>
          <div class="modal-body">
              <div class="row">
                  <div class="col-lg-4 mb-3">
                      <div class="card" style="width: 18rem;border-radius:15px">
                          <img src="{{ asset('images/pemula.png') }}" class="card-img-top"
                              alt="">
                          <div class=card-body">
                              <h5 class="card-title text-center">pemula</h5>
                              <p class="text-center">1 bulan</p>
                          </div>
                          <ul class="list-group list-group-flush">
                              <div class="card-body">
                                  <p class="text-center" style="font-family:poppins"><b>Rp.40.000,00</b></p>
                                  <br>
                                  <a href=""  class="btn btn-lg" style=" color:white; background: #F7941E;
                                   box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; margin-left:35px">
                                   Beli Sekarang</a>
                              </div>
                          </ul>
                      </div>
                  </div>

                  <div class="col-lg-4 mb-3">
                      <div class="card" style="width: 18rem;border-radius:15px">
                          <img src="{{ asset('images/reguler.png') }}" class="card-img-top"
                              alt="">
                          <div class=card-body">
                              <h5 class="card-title text-center" style="margin-top: 27%;">reguler</h5>
                              <p class="text-center">1 bulan</p>
                          </div>
                          <ul class="list-group list-group-flush">
                              <div class="card-body">
                                  <p class="text-center" style="font-family:poppins"><b>Rp.120.000,00</b></p>
                                  <br>
                                  <a href="#"  class="btn btn-lg" style=" color:white; background: #F7941E;
                                   box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; margin-left:35px">
                                   Beli Sekarang</a>
                              </div>
                          </ul>
                      </div>
                  </div>

                  <div class="col-lg-4 mb-3">
                      <div class="card" style="width: 18rem;border-radius:15px">
                          <img src="{{ asset('images/langganan2.png') }}" class="card-img-top"
                              alt="">
                          <div class=card-body">
                              <h5 class="card-title text-center" style="margin-top: 28%;">langganan</h5>
                              <p class="text-center">1 bulan</p>
                          </div>
                          <ul class="list-group list-group-flush">
                              <div class="card-body">
                                  <p class="text-center" style="font-family:poppins"><b>Rp.240.000,00</b></p>
                                  <br>
                                  <a href="#"  class="btn btn-lg" style=" color:white; background: #F7941E;
                                   box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; margin-left:35px">
                                   Beli Sekarang</a>
                              </div>
                          </ul>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
</div> --}}
<!--  End Modal-->
