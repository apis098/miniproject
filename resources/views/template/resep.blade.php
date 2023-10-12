<div style="background-color: #F7941E" class="radius-bawah">
    @extends('template.nav')
    @section('content')
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
                width: 85%;
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
                padding-right: 100px
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

            .btn-fil {
                width: 15%;
                height: 35%;
                position: absolute;
                background: white;
                border-radius: 15px;
                color: black;
                font-size: 18px;
                font-family: Poppins;
                font-weight: 600;
                letter-spacing: 0.48px;
                margin-left: 33%;
                bottom: 10%
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
        </style>
        <div class="container py-5">
            <div class="row text-center text-white">
                <div class="col-lg-8 mx-auto">
                    <h1 class="mb-5"
                        style="text-align: center; color: white; font-size: 30px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                        Cari resep masakan <br />
                    </h1>
                    <form action="">
                        <div class="container">
                            <div class="search" style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="{{ route('resep.home') }}" method="GET">
                                                    <input type="text" name="nama_resep"
                                                        placeholder="Masukkan nama resep..."
                                                        value="{{ request()->nama_resep }}">
                                                    <button type="submit" class="zoom-effects"
                                                        style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)">Cari</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <!-- Button Modal -->
                    <div>
                        <button class="btn btn-fil" data-bs-toggle="modal" data-bs-target="#filter">
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15 19.88c.04.3-.06.62-.29.83a.996.996 0 0 1-1.41 0L9.29 16.7a.989.989 0 0 1-.29-.83v-5.12L4.21 4.62a1 1 0 0 1 .17-1.4c.19-.14.4-.22.62-.22h14c.22 0 .43.08.62.22a1 1 0 0 1 .17 1.4L15 10.75v9.13M7.04 5L11 10.06v5.52l2 2v-7.53L16.96 5H7.04Z" />
                            </svg>
                            <span id="filter-name">filter</span>
                        </button>
                    </div>
                </div>
            </div>
        </div><!-- End -->
    </div>
    <div class="ms-5 mt-5 input-group">
        <div class="ms-1">
            <h3 class="fw-bold">Hasil Pencarian</h3>
        </div>
        <div class="ms-auto me-5">
        </div>
    </div>
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
                    <form action="{{ route('resep.home') }}" method="GET">
                        @if (request()->nama_resep)
                            <input type="text" hidden name="nama_resep" value="{{ request()->nama_resep }}">
                        @endif
                        <div class="mb-3">
                            <label for="ingredients" class="form-label">Nama Bahan</label>
                            <select style="border: 1px solid black" name="ingredients[]"
                                aria-placeholder="Masukkan nama bahan" multiple="multiple" id="ingredients"
                                class="cari form-control">
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
                                class="form-control cari23 js-states">
                                <option value="" disabled>Masukkan Nama Alat-Alat</option>
                                @foreach ($toolsCooks as $itemtool)
                                    <option value="{{ $itemtool->nama_alat }}">{{ $itemtool->nama_alat }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="hari" class="form-label">Hari spesial</label>
                            <div class="row" style="width: 100%;">
                                @foreach ($special_day as $nums => $d)
                                    <div class="col-lg-3 mb-3" style="width:100%;">
                                        <input type="hidden" id="input_pilih_hari{{ $nums }}"
                                            value="{{ $d->nama }}">
                                        <button id="pilih_hari{{ $nums }}"
                                            onclick="pilih_hari({{ $nums }})" class="btn btn-light"
                                            type="button"
                                            style="border: 1px solid black; border-radius: 10px;font-size: 10px;">{{ $d->nama }}</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="jenis_makanan" class="form-label">Jenis Makanan</label>
                            <div class="row">
                                @foreach ($categories_foods_all as $num => $f)
                                    <div class="col-lg-3 mb-3" style="width: 100px;">
                                        <input id="input_jenis_makanan{{ $num }}" type="hidden"
                                            value="{{ $f->nama_makanan }}">
                                        <button id="pilih_jenis_makanan{{ $num }}"
                                            onclick="pilih_jenis_makanan({{ $num }})" class="btn btn-light"
                                            type="button"
                                            style="width: 100%;border: 1px solid black; border-radius: 10px;font-size: 10px;">{{ $f->nama_makanan }}</button>
                                    </div>
                                @endforeach
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
    @if ($recipes->count() == 0)
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('images/data.png') }}" style="width: 15em">
            <p><b>Tidak ada data</b></p>
        </div>
    @endif
    <div class="mx-5 my-5">
        <div class="row">
            @foreach ($recipes as $num => $item)
                <div class="col-lg-4 mb-2 col-sm-12 col-md-6">
                    <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                        <div class="card-header my-3 mx-auto" style="background-color: white">
                            <img width="260px" class="rounded-circle" height="260px"
                                style="border: 0.50px black solid; max-width:260px;"
                                src="{{ asset('storage/' . $item->foto_resep) }}" />
                            @if ($item->isPremium === 'yes')
                                <button id="buttonPremium" type="button"
                                    style="position: absolute;  right: 70%; background-color:#F7941E; "
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
                            <div class="modal fade" id="staticBackdrop{{ $num }}" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
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
                                                    <h2 class="mb-3 text-bold" style="font-family:poppins">Upgrade ke
                                                        premium</h2>

                                                    <span class="intro-2">
                                                        Upgrade ke premium sekarang juga untuk membuka akses ke resep resep
                                                        premium kami.</span>

                                                    <div class="mt-4 mb-5">
                                                        <a href="{{ route('penawaran.prem') }}" class="btn"
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
                        <div class="card-body mx-4">
                            <div class="row">
                                <div class="col-12 mx-3 mb-3">
                                    <!-- untuk koki lain -->
                                    <h5>
                                        <a style="color: black; font-size: 24px; margin-left:-1px"
                                            href="/artikel/{{ $item->id }}/{{ $item->nama_resep }}">
                                            {{ $item->nama_resep }}</a>
                                    </h5>
                                    <span>Oleh {{ $item->User->name }}</span> <br>
                                    <p class="mt-2 my-2">RP. {{ number_format($item->pengeluaran_memasak, 2, ',', '.') }}
                                    </p>
                                </div>
                                <div class="col-12 row  mb-3 mx-1 ">
                                    <div class="col-6">
                                        <img class="mb-1" width="20px" height="20px"
                                            src="{{ asset('images/🦆 icon _thumbs up_.svg') }}" alt="">
                                        {{ $item->likes }} suka
                                    </div>
                                    <div class="col-6 mx-auto">
                                        <img width="20px" height="20px"
                                            src="{{ asset('images/🦆 icon _time_.svg') }}" alt="">
                                        @if ($item->lama_memasak >= 60)
                                            {{ number_format($item->lama_memasak / 60, 1) }} jam
                                        @else
                                            {{ $item->lama_memasak }} menit
                                        @endif
                                    </div>
                                    <div class="col-6 my-3">
                                        <img width="20px" height="20px"
                                            src="{{ asset('images/🦆 icon _comment square chat message_.svg') }}"
                                            alt="">
                                        {{ $item->comment_recipes->count() }} Komen
                                    </div>
                                    <div class="col-6 my-3 mx-auto">
                                        <img width="20px" height="20px"
                                            src="{{ asset('images/🦆 icon _bookmark save_.svg') }}" alt="">
                                        {{ $item->favorite_count }} Favorit
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
