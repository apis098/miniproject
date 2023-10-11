@extends('template.nav')
@section('content')
<!-- Load Leaflet from CDN-->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet-src.js"></script>

<!-- Load Esri Leaflet from CDN -->
<script src="https://unpkg.com/esri-leaflet"></script>

<!-- Esri Leaflet Geocoder -->
<link
  rel="stylesheet"
  href="https://unpkg.com/esri-leaflet-geocoder/dist/esri-leaflet-geocoder.css"
/>
<script src="https://unpkg.com/esri-leaflet-geocoder"></script>
    <style>
        #map {
            height: 180px;
        }
    </style>
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
    <form id="formTambahKursus" action="{{ route('kursus.update', $kursus->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5">
                    <div id="div" class="card mt-5 mb-5 border border-dark" style="border-radius: 15px;">
                        <div class="card-body text-center">
                            <img id="image-course" src="{{ asset('storage/' . $kursus->foto_kursus) }}"
                                style="max-width: 250px; margin-left:-15px;" alt="{{ $kursus->foto_kursus }}"
                                id="uploadedImage" class="">
                        </div>
                    </div>
                    <div class="row"
                        style=" border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid; height: 40px;">
                        <button type="button" onclick="klik()" class="col-4"
                            style="border: 0.50px rgb(255, 148, 47) solid;background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; padding: 9px 12px; right: 2px; width: 100px;height: 39px;">
                            <p
                                style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word;">
                                Pilih File</p>
                            <input name="foto_kursus" class="form-control my-auto mx-1" style="display: none;"
                                type="file" id="formFile">
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
                        <input type="text" name="nama_kursus" class="form-control" id="#"
                            placeholder="Masukkan nama kursus" value="{{ $kursus->nama_kursus }}">
                        @error('#')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <div id="#_error" style="display: none;" class="alert alert-danger"></div>
                    </div>
                    <div class="mt-2" style="margin-bottom: 20px">
                        <label for="floatingTextarea"><b>Deskripsi</b></label>
                        <textarea name="deskripsi_kursus" class="form-control" placeholder="Masukkan deskripsi kursus" id="floatingTextarea">{{ $kursus->deskripsi_kursus }}</textarea>
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
                            <div id="map"></div>
                            <input type="text" name="nama_lokasi" value="{{ $kursus->nama_lokasi }}" id="address"
                                hidden>
                            <input type="text" name="latitude" value="{{ $kursus->latitude }}" id="latitude" hidden>
                            <input type="text" name="longitude" value="{{ $kursus->longitude }}" id="longitude" hidden>
                        </div>
                        <div>
                            <div class="mt-2" style="margin-bottom: 20px">
                                <label for="exampleFormControlInput1" class="form-label"><b>Tarif perjam</b></label>
                                <input type="number" name="tarif_per_jam" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Masukkan tarif per jam"
                                    value="{{ $kursus->tarif_per_jam }}">
                                @error('#')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <div id="#" class="alert alert-danger" style="display: none;"></div>
                            </div>
                            @foreach ($kursus->paket_kursus as $item)
                                <div class="mt-2" style="margin-bottom: 20px;">
                                    <label for="paket_kursus" class="form-label"><b>Paket Kursus</b></label>
                                    <div class="row" id="row1">
                                        <div class="col-6">
                                            <div class="row ml-1">
                                                <input type="text" name="paket_kursus_waktu[]"
                                                    value="{{ $item->waktu }}" id="paket_kursus"
                                                    placeholder="masukkan waktu kursus" class="form-control col-8">
                                                <select class="form-control col-4" name="informasi_paket_kursus_waktu[]"
                                                    id="paket_kursus">
                                                    <option value="menit">menit</option>
                                                    <option value="jam">jam</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <input type="text" name="paket_kursus_harga[]" id="paket_kursus"
                                                placeholder="masukkan harganya" class="form-control"
                                                value="{{ $item->harga }}">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            <div id="dynamic-input-paket-kursus"></div>
                            <button class="btn btn-primary my-2" type="button" id="button_tambah_paket_kursus">Tambah
                                Paket Kursus</button>
                            <script>
                                let num = 2;
                                document.getElementById("button_tambah_paket_kursus").addEventListener("click", function() {
                                    num++;
                                    const createElement = document.createElement("div");
                                    createElement.innerHTML = `
                             <div class="row my-3" id="row${num}">
                             <div class="col-6">
                                 <div class="row ml-1">
                                     <input type="text" name="tambahan_paket_kursus_waktu[]" id="paket_kursus"
                                         placeholder="masukkan waktu kursus" class="form-control col-8">
                                     <select class="form-control col-4" name="tambahan_informasi_paket_kursus_waktu[]"
                                         id="paket_kursus">
                                         <option value="menit">menit</option>
                                         <option value="jam">jam</option>
                                     </select>
                                 </div>
                             </div>
                             <div class="col-6">
                                 <div class="row">
                                 <input type="text" name="tambahan_paket_kursus_harga[]" id="paket_kursus"
                                     placeholder="masukkan harganya" class="form-control col-9">
                                 <button class="btn btn-danger col-3" onclick="tutup_paket_kursus(${num})">Tutup</button>
                                 </div>
                             </div>
                             </div>`;
                                    document.getElementById("dynamic-input-paket-kursus").appendChild(createElement);
                                });

                                function tutup_paket_kursus(num) {
                                    document.getElementById("row" + num).remove();
                                }
                            </script>
                            <div>

                                <div class="mt-2 row mx-auto" style="margin-bottom: 20px">
                                    <label for="tipe_kursus" class="form-label" style="margin-left: -10px;"><b>
                                            Tipe Kursus</b></label>
                                    <input type="text" name="jumlah_siswa" class="form-control col-10"
                                        id="tipe_kursus90" placeholder="Masukkan jumlah siswa dalam grup..."
                                        value="{{ $kursus->jumlah_siswa }}">
                                    <select name="tipe_kursus" id="informasi_tipe_kursus90" class="form-control col-2">
                                        <option value="grup" {{ $kursus->tipe_kursus == 'grup' ? 'selected' : '' }}>grup
                                        </option>
                                        <option value="perorangan"
                                            {{ $kursus->tipe_kursus == 'perorangan' ? 'selected' : '' }}>
                                            perorangan</option>
                                    </select>
                                </div>
                                <script>
                                    let informasi_tipe_kursus = document.getElementById("informasi_tipe_kursus90");
                                    let tipe_kursus = document.getElementById("tipe_kursus90");
                                    informasi_tipe_kursus.addEventListener("click", function() {
                                        if (informasi_tipe_kursus.value === "perorangan") {
                                            tipe_kursus.disabled = true;
                                            tipe_kursus.value = '1';
                                        } else {
                                            tipe_kursus.disabled = false;
                                            tipe_kursus.value = '';
                                        }
                                    });
                                </script>
                                <br>
                                <label for="#" class="form-label" style="font-weight: 600;">
                                    <b> Jenis Kursus </b>
                                </label>
                                <div>
                                    <div class="mb-4">
                                        <input type="text" id="jenis_kursus" name="jenis_kursus"
                                            value="{{ $kursus->jenis_kursus }}" placeholder="Masukkan jenis kursus..."
                                            class="form-control">
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
                        id="buttonTambahKursus">Edit kursus
                    </button>
                </div>
            </div>
        </div>
    </form>
    <div id="erroro"></div>
    <script>
        var map = L.map("map").setView(['{{ $kursus->latitude }}', '{{ $kursus->longitude }}'], 13);
        var markers = L.marker(['{{ $kursus->latitude }}', '{{ $kursus->longitude }}']).addTo(map);
        markers.bindPopup("Ini lokasi kursus anda.").openPopup();
        var tiles = L.esri.basemapLayer("Streets").addTo(map);

        // create the geocoding control and add it to the map
        var searchControl = L.esri.Geocoding.geosearch({
            providers: [
                L.esri.Geocoding.arcgisOnlineProvider({
                    // API Key to be passed to the ArcGIS Online Geocoding Service
                    apikey: 'AAPK63e9bf53d41f4a8d97159a1225654603jx2fDa28RyvdpARWl6kkFnnDWAGyGfoyDHC5EC7PihxInfSJdLsZ4-omoCOlU0aa'
                })
            ]
        }).addTo(map);

        // create an empty layer group to store the results and add it to the map
        var results = L.layerGroup().addTo(map);

        // listen for the results event and add every result to the map
        searchControl.on("results", function(data) {
            results.clearLayers();
            results.addLayer(L.marker(data.results[0].latlng));
            console.log(data.results[0]);
            // memasukkan nilai pada inputan hidden mengenai lokasi kursus.
            document.getElementById("address").value = data.results[0].properties.LongLabel;
            document.getElementById("latitude").value = data.results[0].properties.Y;
            document.getElementById("longitude").value = data.results[0].properties.X;
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
        crossorigin="anonymous"></script>
    <script>
        $("document").ready(function() {
            $("#formTambahKursus").submit(function(event) {
                event.preventDefault();
                let route = $(this).attr('action');
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function success(response) {
                        if (response.success) {
                            iziToast.show({
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
                                message: response.message,
                                position: 'topCenter',
                            });
                            setTimeout(() => {
                                window.location.href = "/koki/index";
                            }, 5000);
                        }
                    },
                    error: function error(xhr, status, errors) {
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

        function klik() {
            document.getElementById("formFile").click();
            document.getElementById('formFile').addEventListener('change', function() {
                var selectedFile = event.target.files[0];
                document.getElementById('infos').textContent = selectedFile.name;
                if (selectedFile) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        document.getElementById("image-course").src = e.target.result;
                        document.getElementById("svg-course").style.display = "none";
                        document.getElementById("image-course").style.display = "block";
                    }
                    reader.readAsDataURL(selectedFile);
                }
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
