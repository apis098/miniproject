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
                                alt="{{ $edit_resep->foto_resep }}" class="">
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
                            @if ($num > 1)
                                <button type="button" class="fa-solid fa-x"
                                    onclick="close1({{ $item_bahan->id }})"></button>
                            @endif
                            <input type="hidden" name="id_bahan_resep[]" value="{{ $item_bahan->id }}">
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
                    <div class="mt-2">
                        <label for="exampleFormControlInput1" class="form-label"><b>Lama Memasak</b></label>
                        <input type="text" name="lama_memasak" class="form-control" id="exampleFormControlInput1"
                            placeholder="Masukkan waktu memasak" value="{{ $edit_resep->lama_memasak }}">
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
                                <button type="button" class="fa-solid fa-x"
                                    onclick="close2({{ $item_langkah->id }})"></button>
                            @endif
                            <input type="hidden" name="id_langkah_resep[]" value="{{ $item_langkah->id }}">
                            <div class="mb-4">
                                <div class="row">
                                    <label for="formFile" class="form-label"><b>Langkah-langkah
                                            {{ $int += 1 }}</b></label>
                                    <div class="card my-5 col-lg-4">
                                        <div class="card-body text-center">
                                            <img src="{{ asset('storage/' . $item_langkah->foto_langkah) }}"
                                                width="100%" alt="{{ $item_langkah->foto_langkah }}" class="">
                                        </div>
                                    </div>
                                    <div class="col-lg-7 my-auto mx-1">
                                        <input name="foto_langkah_resep[]" class="form-control my-auto mx-1"
                                            type="file" class="formFile">
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
                        style="float: right;background: #F7941E;">Tambahkan</button>
                    <br> <br>
                    <button type="submit" class="btn btn-warning text-white mb-4"
                        style="float: right;background: #F7941E;">Edit
                        Resep {{ $edit_resep->nama_resep }}</button>
                </div>
            </div>
        </div>
    </form>
    <script>
        function klik() {
            num++;
            document.getElementById("formFile").click();
            document.getElementById('formFile').addEventListener('change', function() {
                document.getElementById('infos').innerHTML = "file sudah terpilih.";

            });
        }

        const addInput1 = document.getElementById("button-new-input1");
        const addInput2 = document.getElementById("button-new-input2");
        const place1 = document.getElementById("new-input1");
        const place2 = document.getElementById("new-input2");

        num = 1;
        num2 = 1;

        addInput2.addEventListener('click', function() {
            num2++;
            const input2 = document.createElement("div");
            input2.classList.add("mb-4");
            input2.innerHTML = `
                        <div class="row">
                            <label for="formFile" class="form-label"><b>Langkah-langkah</b></label>
                            <div class="card my-5 col-lg-4">
                                <div class="card-body text-center">
                                    <img src="" width="" alt="" class=""><svg
                                        width="102" height="137" viewBox="0 0 102 137" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M56.6484 122.704H16.9945C15.4921 122.704 14.0512 121.986 12.9889 120.708C11.9265 119.429 11.3297 117.695 11.3297 115.887V20.4507C11.3297 18.6428 11.9265 16.9089 12.9889 15.6304C14.0512 14.352 15.4921 13.6338 16.9945 13.6338H45.3187V34.0845C45.3187 39.5084 47.1092 44.7101 50.2963 48.5454C53.4834 52.3806 57.806 54.5353 62.3133 54.5353H79.3078V68.1691C79.3078 69.977 79.9046 71.7109 80.967 72.9893C82.0293 74.2678 83.4702 74.986 84.9726 74.986C86.475 74.986 87.9159 74.2678 88.9783 72.9893C90.0406 71.7109 90.6375 69.977 90.6375 68.1691V47.7183C90.6375 47.7183 90.6375 47.7183 90.6375 47.3093C90.5785 46.6831 90.4645 46.0661 90.2976 45.4688V44.8552C90.0252 44.1543 89.6619 43.51 89.2213 42.9465L55.2322 2.04507C54.7639 1.51483 54.2285 1.07762 53.6461 0.749859C53.477 0.720957 53.3053 0.720957 53.1362 0.749859C52.5608 0.352715 51.9252 0.0977831 51.2668 0H16.9945C12.4873 0 8.16467 2.15462 4.97758 5.98988C1.79049 9.82513 0 15.0269 0 20.4507V115.887C0 121.311 1.79049 126.513 4.97758 130.348C8.16467 134.184 12.4873 136.338 16.9945 136.338H56.6484C58.1508 136.338 59.5917 135.62 60.6541 134.342C61.7164 133.063 62.3133 131.329 62.3133 129.521C62.3133 127.713 61.7164 125.979 60.6541 124.701C59.5917 123.423 58.1508 122.704 56.6484 122.704ZM56.6484 23.2457L71.3204 40.9014H62.3133C60.8108 40.9014 59.37 40.1832 58.3076 38.9048C57.2452 37.6264 56.6484 35.8925 56.6484 34.0845V23.2457ZM28.3242 40.9014C26.8218 40.9014 25.3809 41.6196 24.3186 42.8981C23.2562 44.1765 22.6594 45.9104 22.6594 47.7183C22.6594 49.5263 23.2562 51.2602 24.3186 52.5386C25.3809 53.817 26.8218 54.5353 28.3242 54.5353H33.9891C35.4915 54.5353 36.9323 53.817 37.9947 52.5386C39.0571 51.2602 39.6539 49.5263 39.6539 47.7183C39.6539 45.9104 39.0571 44.1765 37.9947 42.8981C36.9323 41.6196 35.4915 40.9014 33.9891 40.9014H28.3242ZM62.3133 68.1691H28.3242C26.8218 68.1691 25.3809 68.8873 24.3186 70.1657C23.2562 71.4441 22.6594 73.178 22.6594 74.986C22.6594 76.7939 23.2562 78.5278 24.3186 79.8063C25.3809 81.0847 26.8218 81.8029 28.3242 81.8029H62.3133C63.8157 81.8029 65.2565 81.0847 66.3189 79.8063C67.3813 78.5278 67.9781 76.7939 67.9781 74.986C67.9781 73.178 67.3813 71.4441 66.3189 70.1657C65.2565 68.8873 63.8157 68.1691 62.3133 68.1691ZM100.324 104.231L88.9947 90.5967C88.4559 89.9761 87.8206 89.4896 87.1253 89.1651C85.7461 88.4833 84.1992 88.4833 82.82 89.1651C82.1246 89.4896 81.4893 89.9761 80.9506 90.5967L69.6209 104.231C68.5542 105.514 67.9549 107.255 67.9549 109.071C67.9549 110.886 68.5542 112.627 69.6209 113.911C70.6876 115.194 72.1344 115.915 73.6429 115.915C75.1515 115.915 76.5983 115.194 77.665 113.911L79.3078 111.865V129.521C79.3078 131.329 79.9046 133.063 80.967 134.342C82.0293 135.62 83.4702 136.338 84.9726 136.338C86.475 136.338 87.9159 135.62 88.9783 134.342C90.0406 133.063 90.6375 131.329 90.6375 129.521V111.865L92.2803 113.911C92.8069 114.549 93.4334 115.057 94.1237 115.403C94.8141 115.749 95.5545 115.927 96.3023 115.927C97.0501 115.927 97.7906 115.749 98.4809 115.403C99.1712 115.057 99.7977 114.549 100.324 113.911C100.855 113.277 101.277 112.523 101.564 111.692C101.852 110.861 102 109.97 102 109.071C102 108.171 101.852 107.28 101.564 106.449C101.277 105.618 100.855 104.864 100.324 104.231ZM50.9836 109.071C52.486 109.071 53.9269 108.352 54.9892 107.074C56.0516 105.795 56.6484 104.062 56.6484 102.254C56.6484 100.446 56.0516 98.7117 54.9892 97.4333C53.9269 96.1549 52.486 95.4367 50.9836 95.4367H28.3242C26.8218 95.4367 25.3809 96.1549 24.3186 97.4333C23.2562 98.7117 22.6594 100.446 22.6594 102.254C22.6594 104.062 23.2562 105.795 24.3186 107.074C25.3809 108.352 26.8218 109.071 28.3242 109.071H50.9836Z"
                                            fill="black" />
                                    </svg>
                                </div>
                            </div>
                            <div class="col-lg-7 my-auto mx-1">
                                <input name="foto_langkah_resep_tambahan[]" class="form-control my-auto mx-1"
                                             type="file" class="formFile" required>
                            </div>
                            <textarea class="form-control" name="langkah_resep_tambahan[]" placeholder="Masukkan langkah langkah" id="floatingTextarea" required></textarea>
                            </div>
            `;
            place2.appendChild(input2);
        });

        addInput1.addEventListener('click', function() {
            num++;
            const input1 = document.createElement("div");
            input1.classList.add("mt-2");
            input1.innerHTML = `
                <label for="exampleFormControlInput1" class="form-label"><b>Bahan-bahan</b></label>
                <input type="text" name="bahan_resep_tambahan[]" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan bahan makanan" required>
                <br>
                <label for="exampleFormControlInput1" class="form-label"><b>Takaran</b></label>
                <input type="text" name="takaran_resep_tambahan[]" class="form-control" id="exampleFormControlInput1"
                    placeholder="Masukkan takaran" required>
                <br>
            `;
            place1.appendChild(input1);
        });

        function close1(num) {
            const close = document.getElementById("close1_" + num);
            close.innerHTML = `
                            <input type="hidden" name="hapus_bahan[]" value="${num}">
                            `;
            close.style.display = "none";
        }

        function close2(num) {
            const close2 = document.getElementById("close2_" + num);
            close2.innerHTML = `
                            <input type="hidden" name="hapus_langkah[]" value="${num}">
                            `;
            close2.style.display = "none";
        }
    </script>
@endsection
