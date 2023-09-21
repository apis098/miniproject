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
    <form  id="#" action="#" method="post" enctype="multipart/form-data">
        {{-- @csrf --}}
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
                        style=" border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid; height: 40px;">
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
                    @error('#')
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
                        <input type="#" name="#" class="form-control" id="#"
                            placeholder="Masukkan nama kursus" value="{{ old('#') }}" required>
                        @error('#')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="#_error" style="display: none;" class="alert alert-danger"></div>
                    </div>
                    <div class="mt-2" style="margin-bottom: 20px">
                        <label for="floatingTextarea"><b>Deskripsi</b></label>
                        <textarea name="#" class="form-control" placeholder="Masukkan deskripsi kursus" id="floatingTextarea"
                            required>{{ old('#') }}</textarea>
                        @error('#')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="#" class="alert alert-danger" style="display: none;">
                        </div>
                    </div>
                    <div>
                        <div class="mt-2" style="margin-bottom: 20px">
                            <label for="exampleFormControlInput1" class="form-label"><b>Lokasi</b></label>
                            <input type="text" name="#" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan lokasi kursus" value="{{ old('#') }}" required>
                            @error('#')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        <div id="#" class="alert alert-danger" style="display: none;"></div>
                    </div>
                    <div>
                        <div class="mt-2" style="margin-bottom: 20px">
                            <label for="exampleFormControlInput1" class="form-label"><b>Tarif perjam</b></label>
                            <input type="number" name="#" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan tarif per jam" value="{{ old('#') }}" required>
                            @error('#')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        <div id="#" class="alert alert-danger" style="display: none;"></div>
                    </div>
                    <div>
                        <div class="mt-2" style="margin-bottom: 20px">
                            <label for="exampleFormControlInput1" class="form-label"><b>Jumlah pelajaran</b></label>
                            <input type="number" name="#" class="form-control" id="exampleFormControlInput1"
                                placeholder="Masukkan jumlah pelajaran" value="{{ old('#') }}" required>
                            @error('#')
                                <div class="alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror
                        <div id="#" class="alert alert-danger" style="display: none;"></div>
                    </div>
                

                    <div class="mt-2 row mx-auto" style="margin-bottom: 20px">
                        <label for="exampleFormControlInput1" class="form-label" style="margin-left: -10px;"><b>
                         Tipe Kursus</b></label>
                        <input type="text" name="#" class="form-control col-10"
                            id="exampleFormControlInput1" placeholder="Masukkan waktu memasak"
                            value="{{ old('#') }}" required>
                        <select name="#" id="#" class="form-control col-2">
                            <option value="grup" {{ old('#') == 'grup' ? 'selected' : '' }}>grup</option>
                            <option value="perorangan" {{ old('#') == 'perorangan' ? 'selected' : '' }}>perorangan</option>
                        </select>
                        @error('#')
                            <div class="alert alert-danger">
                                {{-- {{ $message }} --}}
                            </div>
                        @enderror
                        <div id="#_error" style="display: none;" class="alert alert-danger"></div>
                    </div>

                    <div class="mt-2 row mx-auto" style="margin-bottom: 20px">
                        <label for="exampleFormControlInput1" class="form-label" style="margin-left: -10px;"><b>
                                Lama kursus</b></label>
                        <input type="text" name="#" class="form-control col-10"
                            id="exampleFormControlInput1" placeholder="Masukkan waktu memasak"
                            value="{{ old('#') }}" required>
                        <select name="#" id="#" class="form-control col-2">
                            <option value="menit" {{ old('#') == 'menit' ? 'selected' : '' }}>menit</option>
                            <option value="jam" {{ old('#') == 'jam' ? 'selected' : '' }}>jam</option>
                        </select>
                        @error('#')
                            <div class="alert alert-danger">
                                {{-- {{ $message }} --}}
                            </div>
                        @enderror
                        <div id="#_error" style="display: none;" class="alert alert-danger"></div>
                    </div>

                    <br>
                    <label for="#" class="form-label" style="font-weight: 600;">
                        <b> Jenis Kursus </b>
                    </label>
                    <div class="row">
                        <div class="col-lg-3 mb-4">
                            <input type="text" id="jenis_kursus" value="jenis_kursus" style="display: none;">
                            <button id="pilih_jenis_kursus" onclick="pilih_jenis_kursus(1)" class="btn btn-light" type="button" style="width: 100%; border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                <span style="font-size: 15px;">Memanggang</span>
                            </button>
                        </div>
                    </div>
                    </div>
                    <br>
                        </div>
                    </div>
                    <style>
                        .btn-filter {
                            background-color: #F7941E;
                            color: white;
                            font-weight: 400;
                        }
                    </style>
                   <script>
                    function pilih_jenis_kursus(num) {
                        const pilih_jenis_kursus = document.getElementById("pilih_jenis_kursus");
                        const jenis_kursus = document.getElementById("jenis_kursus");

                        if (pilih_jenis_kursus.classList.contains("btn-light")) {
                            pilih_jenis_kursus.classList.remove("btn-light");
                            pilih_jenis_kursus.classList.add("btn-filter");
                            jenis_kursus.setAttribute("name", "jenis_kursus[]");
                        } else if (pilih_jenis_kursus.classList.contains("btn-filter")) {
                            pilih_jenis_kursus.classList.remove("btn-filter");
                            pilih_jenis_kursus.classList.add("btn-light");
                            jenis_kursus.removeAttribute("name");
                        }
                    }
                </script>

                    <button type="submit" class="btn btn-warning text-white mb-4"
                        style="float: right;background: #F7941E; border-radius: 15px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                        id="button-add-recipe">Buat kursus
                        </button>
                </div>
            </div>
        </div>
    </form>
    <div id="erroro"></div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>

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
    </script>
@endsection
