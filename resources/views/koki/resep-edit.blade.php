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
    </style>
    <h3 class="text-center my-3" style="font-family:'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">Edit
        Data Resep {{ $edit_resep->nama_resep }}</h3>
    <form action="/koki/resep/{{ $edit_resep->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="container">
            <div class="row">
                <div class="col-lg-3 mb-5">
                    <div class="card my-5">
                        <div class="card-body text-center">
                            <img src="{{ asset('storage/' . $edit_resep->foto_resep) }}" width="100%"
                                alt="{{ $edit_resep->foto_resep }}" class="" id="changePhotoResep">
                        </div>
                    </div>
                    <div class="row"
                        style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0.50px black solid">
                        <button type="button" onclick="klik()" class="col-4"
                            style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px;">
                            <div
                                style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                Pilih File</div>
                            <input name="foto_resep" class="form-control my-auto mx-1" style="display: none;" type="file"
                                id="formFile">
                        </button>
                        <div class="col-8" id="infos"
                            style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Tidak ada file terpilih</div>
                    </div>
                    @error('foto_resep')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-lg-9">
                    <div class="mt-5">
                        <label for="exampleFormControlInput1" class="form-label text-poppins"
                            style="font: Poppins"><b>Nama</b></label>
                        <input type="nama_resep" name="nama_resep" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan nama masakkan" value="{{ $edit_resep->nama_resep }}">
                        @error('nama_resep')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="floatingTextarea"><b>Deskripsi</b></label>
                        <textarea name="deskripsi_resep" class="form-control" style="white-space: nowrap;"
                            placeholder="Masukkan deskripsi makanan" id="floatingTextarea">
                            {{ trim($edit_resep->deskripsi_resep) }}
                        </textarea>
                        @error('deskripsi_resep')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    @foreach ($edit_resep->bahan as $num => $item_bahan)
                        <div id="close1_{{ $item_bahan->id }}">
                            @if ($num >= 1)
                                <button type="button" class="btn btn-danger my-2 fa-solid fa-x"
                                    onclick="close1({{ $item_bahan->id }})"></button>
                            @endif
                            <input type="hidden" name="id_bahan_resep[]" value="{{ $item_bahan->id }}">
                            <input type="hidden" id="hapus_bahan{{ $num }}" value="{{ $item_bahan->id }}">
                            <div class="mt-2">
                                <label for="exampleFormControlInput1" class="form-label"><b>Bahan-bahan
                                        {{ $num += 1 }}</b></label>
                                <input type="text" name="bahan_resep[]" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Masukkan bahan makanan"
                                    value="{{ $item_bahan->nama_bahan }}">
                                @error('bahan_resep.*')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mt-2">
                                <label for="exampleFormControlInput1" class="form-label"><b>Takaran</b></label>
                                <input type="text" name="takaran_resep[]" class="form-control"
                                    id="exampleFormControlInput1" placeholder="Masukkan takaran"
                                    value="{{ $item_bahan->takaran_bahan }}">
                                @error('takaran_resep.*')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    @endforeach

                    <div id="new-input1"></div>
                    <br>
                    <button type="button" id="button-new-input1" class="btn btn-warning text-white"
                        style="float: right;background: #F7941E;">
                        Tambahkan
                    </button>
                    <br>
                    <div class="mt-2">
                        <label for="exampleFormControlInput1" class="form-label"><b>Porsi Orang</b></label>
                        <input type="number" name="porsi_orang" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan porsi orang" value="{{ $edit_resep->porsi_orang }}">
                        @error('porsi_orang')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2 row mx-auto">
                        <label for="exampleFormControlInput1" class="form-label"><b>Lama Memasak</b></label>
                        <input type="text" name="lama_memasak" class="form-control col-12"
                            id="exampleFormControlInput1" value="{{$edit_resep->lama_memasak}}">
                        @error('lama_memasak')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="exampleFormControlInput1" class="form-label"><b>Pengeluaran Memasak</b></label>
                        <input type="number" name="pengeluaran_memasak" class="form-control"
                            id="exampleFormControlInput1" placeholder="Masukkan jumlah pengeluaran"
                            value="{{ $edit_resep->pengeluaran_memasak }}">
                        @error('pengeluaran_memasak')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="mt-2">
                        <label for="exampleFormControlInput1" class="form-label"><b>Hari Khusus</b></label>
                        <select name="hari_khusus" id="exampleFormControlInput1" class="form-control">
                            <option value="{{ $edit_resep->hari_khusus }}">tidak diganti</option>
                            @if ($special_days)
                                @foreach ($special_days as $d)
                                    <option value="{{ $d->name }}">{{ $d->name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('hari_khusus')
                            <div class="alert alert-danger">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <br>
                    @foreach ($edit_resep->langkah as $int => $item_langkah)
                        <div id="close2_{{ $item_langkah->id }}">
                            @if ($int > 1)
                                <button type="button" class="btn btn-danger fa-solid fa-x"
                                    onclick="close2({{ $item_langkah->id }})"></button>
                            @endif
                            <input type="hidden" name="id_langkah_resep[]" value="{{ $item_langkah->id }}">
                            <div class="mb-4">
                                <div class="row">
                                    <label for="formFile" class="form-label"><b>Langkah-langkah
                                            {{ $int += 1 }}</b></label>
                                    <div class="card my-5 col-lg-4">
                                        <div class="card-body text-center div3">
                                            <img src="{{ asset('storage/' . $item_langkah->foto_langkah) }}"
                                                width="100%" class="" id="IMAGE{{ $int }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 my-auto mx-1">
                                        <div class="row" style="border-radius: 25px; border: 1px solid black;">
                                            <button type="button" onclick="input_file_langkah({{ $int }})"
                                                class="col-4"
                                                style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px;">
                                                <div
                                                    style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                    Pilih File</div>
                                                <input name="foto_langkah_resep[]" class="form-control my-auto mx-1"
                                                    style="display: none;" type="file"
                                                    id="inputan_foto_langkah{{ $int }}">
                                            </button>
                                            <div class="col-8" id="foto_langkah_info{{ $int }}"
                                                style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                Tidak ada file terpilih</div>
                                        </div>
                                        @error('foto_langkah_resep.*')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <textarea class="form-control" name="langkah_resep[]" style="white-space: nowrap;"
                                        placeholder="Masukkan langkah langkah" id="floatingTextarea">
                                {{ trim($item_langkah->deskripsi_langkah) }}
                            </textarea>
                                    @error('langkah_resep.*')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <div id="new-input2">

                    </div>
                    <br>
                    <button type="button" id="button-new-input2" class="btn btn-warning text-white"
                        style="float: right;background: #F7941E; border-radius: 15px;">Tambahkan</button>
                    <br> <br>
                    <button type="submit" class="btn btn-warning text-white mb-4"
                        style="float: right;background: #F7941E; border-radius: 15px;">Edit
                        Resep {{ $edit_resep->nama_resep }}</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function input_file_langkah(num) {
            const inputan_foto_langkah = document.getElementById('inputan_foto_langkah' + num);
            inputan_foto_langkah.click();
            document.getElementById("inputan_foto_langkah" + num).addEventListener("change", function(event) {
                selectedFile = event.target.files[0];
                document.getElementById("foto_langkah_info" + num).textContent = selectedFile.name;
                i = event.target;
                if (i.files && i.files[0]) {
                    reading = new FileReader();
                    reading.onload = function(event) {
                        document.getElementById('IMAGE' + num).setAttribute("src", event.target.result);
                        document.getElementById('IMAGE' + num).style.width = "100%";
                    }
                    reading.readAsDataURL(i.files[0]);
                }
            });
        }

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

        const addInput1 = document.getElementById("button-new-input1");
        const addInput2 = document.getElementById("button-new-input2");
        const place1 = document.getElementById("new-input1");
        const place2 = document.getElementById("new-input2");

        num = 1000;
        num2 = 1000;

        addInput2.addEventListener('click', function() {
            num2++;
            const input2 = document.createElement("div");
            input2.classList.add("mb-4");
            input2.innerHTML = `
            <div id="close2_${num2}">
                <button type="button" class="btn btn-danger my-2 fa-solid fa-x" onclick="close2(${num2})"></button>
                            <input type="hidden" name="id_langkah_resep[]" value="{{ $item_langkah->id }}">
                            <div class="mb-4">
                                <div class="row">
                                    <label for="formFile" class="form-label"><b>Langkah-langkah
                                            {{ $int += 1 }}</b></label>
                                    <div class="card my-5 col-lg-4">
                                        <div class="card-body text-center div3">
                                            <img src=" class="" id="IMAGE{{ $int }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 my-auto mx-1">
                                        <div class="row" style="border-radius: 25px; border: 1px solid black;">
                                            <button type="button" onclick="input_file_langkah({{ $int }})"
                                                class="col-4"
                                                style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px;">
                                                <div
                                                    style="color: #EAEAEA; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                    Pilih File</div>
                                                <input name="foto_langkah_resep_tambahan[]" class="form-control my-auto mx-1"
                                                    style="display: none;" type="file"
                                                    id="inputan_foto_langkah{{ $int }}">
                                            </button>
                                            <div class="col-8" id="foto_langkah_info{{ $int }}"
                                                style="color: black; font-size: 14px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                Tidak ada file terpilih</div>
                                        </div>
                                        @error('foto_langkah_resep.*')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <textarea class="form-control" name="langkah_resep_tambahan[]" style="white-space: nowrap;"
                                        placeholder="Masukkan langkah langkah" id="floatingTextarea">
                            </textarea>
                                    @error('langkah_resep.*')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
            
            `;
            place2.appendChild(input2);
        });

        addInput1.addEventListener('click', function() {
            num++;
            const input1 = document.createElement("div");
            input1.classList.add("mt-2");
            input1.innerHTML = `
            <div id="close1_${num}">
            <button type="button" class="btn btn-danger my-2 fa-solid fa-x" onclick="close1(${num})"></button>
                <label for="exampleFormControlInput1" class="form-label"><b>Bahan-bahan</b></label>
                <input type="text" name="bahan_resep_tambahan[]" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan bahan makanan" required>
                <br>
                <label for="exampleFormControlInput1" class="form-label"><b>Takaran</b></label>
                <input type="text" name="takaran_resep_tambahan[]" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan takaran" required>
                <br>
            </div>
            `;
            place1.appendChild(input1);
        });

        function close1(num) {
            const close = document.getElementById("close1_" + num);
            close.style.display = "none";
            const hapus_bahan = document.getElementById("hapus_bahan" + num);
            hapus_bahan.setAttribute("name", "hapus_bahan[]");
        }

        function close2(num) {
            const close = document.getElementById("close2_" + num);
            close.style.display = "none";
        }

        function inputfile(num) {
            document.getElementById("inputann" + num).click();
            document.getElementById('inputann' + num).addEventListener('change', function(event) {
                var selectedFile = event.target.files[0];
                document.getElementById('fileinfo' + num).textContent = selectedFile.name;
                document.getElementById("IMAGE" + num).setAttribute('src', event.target.result);
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
                        document.getElementById("inputann" + num).setAttribute("src", e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
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
