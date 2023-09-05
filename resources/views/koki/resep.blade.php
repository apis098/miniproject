@extends('template.nav')
@section('content')
    <style>
        .custom-input-file {
            border: 1px solid black;
        }

        .cif1 {
            background-color: #F7941E;
            width: 100%;
        }

        .btn-outline-warning {}
    </style>
    <form id="form-add-recipe" action="/koki/resep" method="post" enctype="multipart/form-data">
        @csrf
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5">
                    <div id="div" class="card mt-5 mb-5 border border-dark" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img id="profile-image" src="{{ asset('images/default.jpg') }}"
                                style="max-width: 250px; display:none; margin-left:-15px;" alt="" id="uploadedImage"
                                class="">
                            <svg id="svg" xmlns="http://www.w3.org/2000/svg" class="mt-5 mb-5" width="100"
                                height="100" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M5 21q-.825 0-1.413-.588T3 19v-6h2v6h6v2H5Zm8 0v-2h6v-6h2v6q0 .825-.588 1.413T19 21h-6Zm-7-4l3-4l2.25 3l3-4L18 17H6Zm-3-6V5q0-.825.588-1.413T5 3h6v2H5v6H3Zm16 0V5h-6V3h6q.825 0 1.413.588T21 5v6h-2Zm-3.5-1q-.65 0-1.075-.425T14 8.5q0-.65.425-1.075T15.5 7q.65 0 1.075.425T17 8.5q0 .65-.425 1.075T15.5 10Z" />
                            </svg>
                        </div>
                    </div>
                    <div class="row" 
                        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid; height: 40px;">
                        <button type="button" onclick="klik()" class="col-4"
                            style="border: 0.50px rgb(255, 148, 47) solid;background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; padding: 9px 12px; right: 2px; width: 100px;height: 39px;">
                            <p
                                style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word;">
                                Pilih File</p>
                            <input name="foto_resep" class="form-control my-auto mx-1" style="display: none;" type="file"
                                id="formFile">
                        </button>
                        <div class="col-8 my-auto text-truncate" id="infos" 
                            style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Tidak ada file terpilih</div>
                    </div>
                    @error('foto_resep')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                    <div id="foto_resep_error" style="display: none;" class="alert alert-danger"></div>
                </div>
                <div class="col-lg-9">
                    <div class="mt-5">
                        <label for="exampleFormControlInput1" class="form-label text-poppins"
                            style="font: Poppins"><b>Nama</b></label>
                        <input type="nama_resep" name="nama_resep" class="form-control" id="nama_resep_baru"
                            placeholder="Masukkan nama masakkan" value="{{ old('nama_resep') }}" required>
                        @error('nama_resep')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="nama_resep_error" style="display: none;" class="alert alert-danger"></div>
                    </div>
                    <div class="mt-2">
                        <label for="floatingTextarea"><b>Deskripsi</b></label>
                        <textarea name="deskripsi_resep" class="form-control" placeholder="Masukkan deskripsi makanan" id="floatingTextarea"
                            required>{{ old('deskripsi_resep') }}</textarea>
                        @error('deskripsi_resep')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="deskripsi_resep_error" class="alert alert-danger" style="display: none;">
                        </div>
                    </div>
                    <div>
                        <div class="mt-2">
                            <label for="exampleFormControlInput1" class="form-label"><b>Bahan-bahan</b></label>
                            <input type="text" name="bahan_resep[]" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan bahan makanan" value="{{ old('bahan_resep.0') }}" required>
                            @error('bahan_resep.0')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="bahan_resep.0_error" class="alert alert-danger" style="display: none;"></div>
                        </div>
                        <div class="mt-2">
                            <label for="exampleFormControlInput1" class="form-label"><b>Takaran</b></label>
                            <input type="text" name="takaran_resep[]" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan takaran" value="{{ old('takaran_resep.0') }}" required>
                            @error('takaran_resep.0')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="takaran_resep.0_error" style="display: none;" class="alert alert-danger">

                            </div>
                        </div>
                    </div>
                    <div id="new-input1"></div>
                    <br>
                    <button type="button" id="button-new-input1" class="btn btn-warning text-white"
                        style="float: right;background: #F7941E; border-radius:15px ;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                        Tambahkan Bahan & Takaran
                    </button>
                    <br>
                    <div>
                        <div class="mt-2">
                            <label for="nama_alat" class="form-label" style="font-weight: 700;">Nama Alat</label>
                            <input type="text" name="nama_alat[]" id="nama_alat"
                                placeholder="tambahkan alat yang anda gunakan..." class="form-control">
                        </div>
                    </div>
                    <div id="new-input-alat"></div>
                    <br>
                    <button type="button" id="button-new-alat" class="btn btn-warning text-white"
                        style="float: right;background:#F7941E;border-radius:15px;box-shadow:0px 4px 4px rgb(0, 0, 0, 0.25)">
                        Tambahkan Alat - Alat
                    </button>
                    <script>
                        numsq = 0;
                        document.getElementById("button-new-alat").addEventListener("click", function() {
                            numsq++;
                            div = document.createElement("div");
                            div.innerHTML = `
                            <div class="mt-2" id="close3${numsq}">
                            <button class="btn btn-danger fa-solid fa-x mb-2" type="button" onclick="close3(${numsq})"></button>
                            <label for="nama_alat" class="form-label" style="font-weight: 700;">Nama Alat</label>
                            <input type="text" name="nama_alat[]" id="nama_alat"
                                placeholder="tambahkan alat yang anda gunakan..." class="form-control">
                        </div>
                            `;
                            document.getElementById("new-input-alat").appendChild(div);
                        });

                        function close3(num) {
                            const close3 = document.getElementById("close3" + num);
                            close3.remove();
                        }
                    </script>
                    <br>
                    <div class="mt-2">
                        <label for="exampleFormControlInput1" class="form-label"><b>Porsi Orang</b></label>
                        <input type="number" name="porsi_orang" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan porsi orang" value="{{ old('porsi_orang') }}" required>
                        @error('porsi_orang')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="porsi_orang_error" style="display: none;" class="alert alert-danger"></div>
                    </div>
                    <div class="mt-2 row mx-auto">
                        <label for="exampleFormControlInput1" class="form-label"><b>Lama Memasak</b></label>
                        <input type="text" name="lama_memasak" class="form-control col-10"
                            id="exampleFormControlInput1" placeholder="Masukkan waktu memasak"
                            value="{{ old('lama_memasak') }}" required>
                        <select name="lama_memasak2" id="lama_memasak2" class="form-control col-2">
                            <option value="menit" {{ old('lama_memasak2') == 'menit' ? 'selected' : '' }}>menit</option>
                            <option value="jam" {{ old('lama_memasak2') == 'jam' ? 'selected' : '' }}>jam</option>
                        </select>
                        @error('lama_memasak')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="lama_memasak_error" style="display: none;" class="alert alert-danger"></div>
                    </div>
                    <div class="mt-2">
                        <label for="PengeluaranMemasak" class="form-label"><b>Pengeluaran Memasak</b></label>
                        <input type="text" name="pengeluaran_memasak" class="form-control" id="PengeluaranMemasak"
                            placeholder="Masukkan jumlah pengeluaran" value="{{ old('pengeluaran_memasak') }}" required>
                        @error('pengeluaran_memasak')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="pengeluaran_memasak_error" style="display: none;" class="alert alert-danger"></div>
                    </div>
                    <br>
                    <div class="mb-4">
                        <div class="row">
                            <label for="formFile" class="form-label"><b>Langkah-langkah</b></label>
                            <div id="div2" class="card my-5 col-lg-4 border border-dark"
                                style="border-radius: 15px;">
                                <div class="card-body text-center">
                                    <img id="gambar" src="{{ asset('images/default.jpg') }}"
                                        style="max-width: 250px; display:none; margin-left:-15px;" alt=""
                                        id="uploadedImage" class="">
                                    <svg id="svg2" xmlns="http://www.w3.org/2000/svg" class="mt-5 mb-5"
                                        width="100" height="100" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M5 21q-.825 0-1.413-.588T3 19v-6h2v6h6v2H5Zm8 0v-2h6v-6h2v6q0 .825-.588 1.413T19 21h-6Zm-7-4l3-4l2.25 3l3-4L18 17H6Zm-3-6V5q0-.825.588-1.413T5 3h6v2H5v6H3Zm16 0V5h-6V3h6q.825 0 1.413.588T21 5v6h-2Zm-3.5-1q-.65 0-1.075-.425T14 8.5q0-.65.425-1.075T15.5 7q.65 0 1.075.425T17 8.5q0 .65-.425 1.075T15.5 10Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-lg-7 my-auto mx-1">

                                {{-- <input name="foto_langkah_resep[]" class="form-control form-control-sm my-auto mx-1"  type="file"
                                    class="formFile"> --}}
                                <div class="row ms-3"
                                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid; height: 40px;">
                                    <button type="button" id="inputanfile" onclick="inputfilee()" class="col-4"
                                        style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px;">
                                        <div
                                            style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                            Pilih File</div>
                                        <input name="foto_langkah_resep[]" class="form-control my-auto mx-1"
                                            style="display: none;" type="file" id="inputan" required>
                                    </button>
                                    <div class="col-8 my-auto" id="fileinfo"
                                        style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        Tidak ada file terpilih</div>
                                </div>
                                @error('foto_langkah_resep.*')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div id="foto_langkah_resep.0_error" style="display: none;" class="alert alert-danger">
                                </div>
                            </div>
                            <input type="text" class="form-control mb-2" name="judul_langkah[]"
                                placeholder="Masukkan judul langkah..." required>
                            <textarea maxlength="255" class="form-control" name="langkah_resep[]" cols="30" rows="5"
                                placeholder="Masukkan langkah langkah" id="floatingTextarea">{{ old('langkah_resep.0') }}</textarea>

                            @error('langkah_resep.*')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="langkah_resep.0_error" style="display: none;" class="alert alert-danger"></div>
                        </div>
                    </div>
                    <div id="new-input2">

                    </div>
                    <br>
                    <button type="button" id="button-new-input2" class="btn btn-warning text-white"
                        style="float: right;background: #F7941E; border-radius: 15px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Tambahkan
                        Langkah - Langkah</button>
                    <br>
                    <div class="mt-2">
                        <label for="jenis_makanan" class="form-label" style="font-weight: 600;">
                            <b> Jenis Makanan </b>
                        </label>
                        <div class="row">
                            @foreach ($categories_food as $num => $f)
                                <div class="col-lg-3 mb-4">
                                    <input type="text" id="jenis_makanan{{ $num }}"
                                        value="{{ $f->id }}" style="display: none;">
                                    <button id="pilih_jenis_makanan{{ $num }}"
                                        onclick="pilih_jenis_makanan({{ $num }})" class="btn btn-light"
                                        type="button"
                                        style="width: 100%;border-radius: 15px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                        <span style="font-size: 15px;">{{ $f->nama_makanan }}</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <div class="mt-2">
                        <label for="hari_khusus" class="form-label" style="font-weight: 600;">
                            <b> Hari Khusus </b>
                        </label>
                        <div class="row">
                            @foreach ($special_days as $int => $d)
                                <div class="col-lg-3 mb-4">
                                    <input type="text" id="hari_khusus{{ $int }}"
                                        value="{{ $d->id }}" style="display: none;">
                                    <button id="pilih_hari_khusus{{ $int }}"
                                        onclick="pilih_hari_khusus({{ $int }})" class="btn btn-light"
                                        type="button"
                                        style="width: 100%;border-radius: 15px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                        <span style="font-size: 15px;">{{ $d->nama }}</span>
                                    </button>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <br>
                    <style>
                        .btn-filter {
                            background-color: #F7941E;
                            color: white;
                            font-weight: 400;
                        }
                    </style>
                    <script>
                        function pilih_jenis_makanan(num) {
                            const pilih_jenis_makanan = document.getElementById("pilih_jenis_makanan" + num);
                            const jenis_makanan = document.getElementById("jenis_makanan" + num)
                            if (pilih_jenis_makanan.classList.contains("btn-light")) {
                                pilih_jenis_makanan.classList.remove("btn-light");
                                pilih_jenis_makanan.classList.add("btn-filter");
                                jenis_makanan.setAttribute("name", "jenis_makanan[]");
                            } else if (pilih_jenis_makanan.classList.contains("btn-filter")) {
                                pilih_jenis_makanan.classList.remove("btn-filter");
                                pilih_jenis_makanan.classList.add("btn-light");
                                jenis_makanan.removeAttribute("name");
                            }
                        }

                        function pilih_hari_khusus(num) {
                            const pilih_hari_khusus = document.getElementById("pilih_hari_khusus" + num);
                            const hari_khusus = document.getElementById("hari_khusus" + num)
                            if (pilih_hari_khusus.classList.contains("btn-light")) {
                                pilih_hari_khusus.classList.remove("btn-light");
                                pilih_hari_khusus.classList.add("btn-filter");
                                hari_khusus.setAttribute("name", "hari_khusus[]");
                            } else if (pilih_hari_khusus.classList.contains("btn-filter")) {
                                pilih_hari_khusus.classList.remove("btn-filter");
                                pilih_hari_khusus.classList.add("btn-light");
                                hari_khusus.removeAttribute("name");
                            }
                        }
                        document.addEventListener('DOMContentLoaded', function() {
                            const PengeluaranMemasak = document.getElementById('PengeluaranMemasak');

                            PengeluaranMemasak.addEventListener('input', function() {
                                const rawValue = this.value.replace(/\D/g, '');
                                const formattedValue = new Intl.NumberFormat('id-ID').format(rawValue);
                                this.value = formattedValue;
                            });
                        });
                    </script>
                    <button type="submit" class="btn btn-warning text-white mb-4"
                        style="float: right;background: #F7941E; border-radius: 15px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                        id="button-add-recipe">Tambah
                        Resep</button>
                </div>
            </div>
        </div>
    </form>
    <div id="erroro"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $("document").ready(function() {
            $("#button-add-recipe").click(function(event) {
                event.preventDefault();
                const data = $("#form-add-recipe").serialize();
                const formData = new FormData($("#form-add-recipe")[0]);
                $($(this)).prop('disabled', true);
                $.ajax({
                    url: "{{ route('resep.store') }}",
                    method: "POST",
                    contentType: false,
                    processData: false,
                    data: formData,
                    success: function success(response) {
                        $("#button-add-recipe").prop('disabled', false);

                        window.location.href = "/koki/index"; 
                    },
                    error: function error(xhr, status, errors) {
                        $("#button-add-recipe").prop('disabled', false);

                        //alert(xhr.responseText);
                        iziToast.show({
                            backgroundColor: '#F7941E',
                            title: '<i class="fa-regular fa-circle-question"></i>',
                            titleColor: 'white',
                            messageColor: 'white',
                            message: xhr.responseText,
                            position: 'topCenter',
                        });
                    }
                });
            });
        });

        num = 0;

        function klik() {
            num++;
            document.getElementById("formFile").click();
            document.getElementById('formFile').addEventListener('change', function(event) {
                selectFile = event.target.files[0];
                document.getElementById('infos').textContent = selectFile.name;
                var input = event.target;
                if (input.files && input.files[0]) {
                    var read = new FileReader();
                    read.onload = function(event) {
                        document.getElementById('changePhotoResep').setAttribute("src", event.target.result);
                    };
                    read.readAsDataURL(input.files[0]);
                }
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById("formFile").addEventListener("change", function(event) {
            const svgElement = document.getElementById("svg");
            const divElement = document.getElementById("div");
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("profile-image").style.display = "block";
                    svgElement.style.display = "none";
                    divElement.classList.remove('border-dark');
                    divElement.classList.remove('mb-5');
                    divElement.classList.add('border-light');
                    document.getElementById("profile-image").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
        });
       
        document.getElementById("inputan").addEventListener("change", function(event) {
            const svgElement = document.getElementById("svg2");
            const divElement = document.getElementById("div2");
            var input = event.target;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById("gambar").style.display = "block";
                    svgElement.style.display = "none";
                    divElement.classList.remove('border-dark');
                    divElement.classList.remove('mb-5');
                    divElement.classList.add('border-light');
                    document.getElementById("gambar").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        });
    </script>
    <script>
        function klik() {
            document.getElementById("formFile").click();
            document.getElementById('formFile').addEventListener('change', function() {
                var selectedFile = event.target.files[0];
                document.getElementById('infos').textContent = selectedFile.name;

            });
        }

        function inputfilee() {
            document.getElementById("inputan").click();
            document.getElementById('inputan').addEventListener('change', function() {
                var selectedFile = event.target.files[0];
                document.getElementById('fileinfo').textContent = selectedFile.name;

            });
        }

        const addInput1 = document.getElementById("button-new-input1");
        const addInput2 = document.getElementById("button-new-input2");
        const place1 = document.getElementById("new-input1");
        const place2 = document.getElementById("new-input2");

        num2 = 1;
        addInput2.addEventListener('click', function() {
            num2++;
            const input2 = document.createElement("div");
            input2.classList.add("mb-4");
            input2.innerHTML = `
                        <div class="row" id="close2_${num2}">
                            <button type="button" style="width: 50px;" class="btn btn-danger fa-solid fa-x" onclick="close2(${num2})"></button>
                            <label for="formFile" class="form-label"><b>Langkah-langkah</b></label>
                            <div id="div3${num2}" class="card my-5 col-lg-4 border border-dark"
                                style="border-radius: 15px;">
                                <div class="card-body text-center">
                                    <img id="gambar3${num2}" src="{{ asset('images/default.jpg') }}"
                                        style="max-width: 250px; display:none; margin-left:-15px;" alt=""
                                        id="uploadedImage" class="">
                                    <svg id="svg3${num2}" xmlns="http://www.w3.org/2000/svg" class="mt-5 mb-5"
                                        width="100" height="100" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M5 21q-.825 0-1.413-.588T3 19v-6h2v6h6v2H5Zm8 0v-2h6v-6h2v6q0 .825-.588 1.413T19 21h-6Zm-7-4l3-4l2.25 3l3-4L18 17H6Zm-3-6V5q0-.825.588-1.413T5 3h6v2H5v6H3Zm16 0V5h-6V3h6q.825 0 1.413.588T21 5v6h-2Zm-3.5-1q-.65 0-1.075-.425T14 8.5q0-.65.425-1.075T15.5 7q.65 0 1.075.425T17 8.5q0 .65-.425 1.075T15.5 10Z" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-lg-7 my-auto mx-1">

                                {{-- <input name="foto_langkah_resep[]" class="form-control form-control-sm my-auto mx-1"  type="file"
                                    class="formFile"> --}}
                                <div class="row ms-3"
                                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid;height:40px">
                                    <button type="button" onclick="inputfile(${num2})" class="col-4"
                                        style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px;">
                                        <div
                                            style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                            Pilih File</div>
                                        <input name="foto_langkah_resep[]" class="form-control my-auto mx-1" style="display: none;"
                                            type="file" id="inputann${num2}">
                                    </button>
                                    <div class="col-8 my-auto" id="fileinfo${num2}"
                                        style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        Tidak ada file terpilih</div>
                                </div>
                            </div>
                            <input type="text" class="form-control mb-2" name="judul_langkah[]" placeholder="Masukkan judul langkah...">
                            <textarea maxlength="255"  class="form-control" name="langkah_resep[]" cols="30" rows="5" placeholder="Masukkan langkah langkah" id="floatingTextarea">{{ old('langkah_resep.${num2}') }}</textarea>
                        </div>
            `;
            place2.appendChild(input2);
        });
        num = 1;
        addInput1.addEventListener('click', function() {
            num++;
            const input1 = document.createElement("div");
            input1.classList.add("mt-2");
            input1.innerHTML = `
            <div id="close1_${num}">
                    <div class="">
                        <button type="button" class="btn btn-danger my-2 fa-solid fa-x" onclick="close1(${num})"></button>
                        <label for="exampleFormControlInput1" class="form-label"><b>Bahan-bahan</b></label>
                        <input type="text" name="bahan_resep[]" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan bahan makanan">
                        @error('bahan_resep.*')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="exampleFormControlInput1" class="form-label"><b>Takaran</b></label>
                        <input type="text" name="takaran_resep[]" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan takaran">
                        @error('takaran_resep.*')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    </div>
            `;
            place1.appendChild(input1);
        });

        function close1(num) {
            const close = document.getElementById("close1_" + num);
            close.remove();
        }

        function close2(num) {
            const close = document.getElementById("close2_" + num);
            close.remove();
        }

        function inputfile(num) {
            document.getElementById("inputann" + num).click();
            document.getElementById('inputann' + num).addEventListener('change', function(event) {
                var selectedFile = event.target.files[0];
                document.getElementById('fileinfo' + num).textContent = selectedFile.name;
                const svgElement = document.getElementById("svg3" + num);
                const divElement = document.getElementById("div3" + num);
                var input = event.target;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("gambar3" + num).style.display = "block";
                        svgElement.style.display = "none";
                        divElement.classList.remove('border-dark');
                        divElement.classList.remove('mb-5');
                        divElement.classList.add('border-light');
                        document.getElementById("gambar3" + num).setAttribute("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        }
    </script>
@endsection
