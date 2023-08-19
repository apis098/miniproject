@extends('template.nav')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-5">
                <div class="card my-5">
                    <div class="text-center mt-5">
                        <div style="position: relative; display: inline-block;">
                            <img src="{{ asset('sawi.jpg') }}" width="106px" height="104px" style="border-radius: 50%"
                                alt="">
                            <button type="submit" class="btn btn-warning btn-sm  rounded-circle p-2"
                                style="position: absolute; top: -10px; right: -10px;" data-bs-toggle="modal"
                                data-bs-target="#mymodal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                    <mask id="ipSEdit0">
                                        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                                            <path stroke-linecap="round" d="M7 42h36" />
                                            <path fill="#fff" d="M11 26.72V34h7.317L39 13.308L31.695 6L11 26.72Z" />
                                        </g>
                                    </mask>
                                    <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSEdit0)" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class="mt-4"
                            style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Boerak smith
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Burakcook@gmail.com</span>
                        </p>
                        <button style="border-radius: 15px;" class="btn btn-light border border-dark mb-3">
                            <span style="font-weight: 600">
                                <a href="/koki/resep" style="color: black;">Buat Resep</a>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            {{-- awal modal --}}
            <div class="modal fade" data-bs-backdrop="static" id="mymodal" aria-hidden="true" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered profile-modal">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Gambar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="profile d-flex justify-content-center">

                                    <label for="fileInputA"
                                        class="change-profile-button d-flex justify-content-center rounded-circle p-2 bg-warning"
                                        style="position: absolute; top: 5%; right: 37%;" id="chooseFileButtonA">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                            viewBox="0 0 48 48">
                                            <mask id="ipSEdit0">
                                                <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                                                    <path stroke-linecap="round" d="M7 42h36" />
                                                    <path fill="#ffff"
                                                        d="M11 26.72V34h7.317L39 13.308L31.695 6L11 26.72Z" />
                                                </g>
                                            </mask>
                                            <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSEdit0)" />
                                        </svg>
                                    </label>
                                    <input type="file" id="fileInputA" name="fileInputA" style="display:none"
                                        accept=".jpg,.png,.pdf">
                                    <img src="{{ asset('sawi.jpg') }}" width="106px" height="104px"
                                        style="border-radius: 50%" id="profile-image">
                                </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit" id="saveProfileButton">Simpan</button>
                        </div>
                        </form>
                    </div>
                    <script>
                        document.getElementById('chooseFileButtonA').addEventListener('click', function() {
                            document.getElementById('fileInputA').click();
                        });

                        document.getElementById('fileInputA').addEventListener('change', function() {
                            var selectedFile = this.files[0];
                            console.log('Selected file:', selectedFile);
                        });

                        document.getElementById("fileInputA").addEventListener("change", function(event) {
                            var input = event.target;
                            if (input.files && input.files[0]) {
                                var reader = new FileReader();
                                reader.onload = function(e) {
                                    document.getElementById("profile-image").setAttribute("src", e.target.result);
                                };
                                reader.readAsDataURL(input.files[0]);
                            }
                        });
                    </script>
                </div>
            </div>
            {{-- akhir modal --}}
            <div class="col-lg-8 mt-5">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        392
                                    </span> <br>
                                    Suka
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        5
                                    </span> <br>
                                    Resep
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        392
                                    </span> <br>
                                    Pengikut
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-user-plus fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-lg-6">
                        <h5
                            style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Nama pengguna</h5>
                        <input type="text" class="form-control" value="Victor sinclair"
                            style="background-color: white;" readonly>
                    </div>
                    <div class="col-lg-6">
                        <h5
                            style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            E mail</h5>
                        <input type="text" class="form-control" value="victor98@gmail.com"
                            style="background-color: white;" readonly>
                    </div>
                </div>
                <div>
                    <p class="mt-2"
                        style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        Deskripsi</p>
                    <div class="p-3"
                        style="width: 100%; height: 100%; border-radius: 10px; border: 0.50px black solid">
                        Halo! Saya victor, jiwa petualang yang penuh rasa ingin tahu dan selalu dalam pencarian ilmu dan
                        penemuan diri. <br>
                        Minat:🚀 Teknologi, ilmu pengetahuan, dan inovasi📚 Membaca, menulis, dan puisi🌳 Alam, mendaki,
                        berkemah, dan fotografi <br>
                        Filosofi:🌱 Terimalah tantangan dan kegagalan untuk pertumbuhan pribadi💪 Ketangguhan dan
                        adaptabilitas adalah kunci <br>
                        Saya sangat menyukai percakapan bermakna dan kolaborasi! Hubungi saya, dan mari kita berdampak
                        positif
                        bersama. 🤝
                    </div>
                    <button class="btn btn-light text-white my-3" style="border-radius: 14px;background-color: #F7941E;">
                        <span
                            style="font-size: 18px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Perbarui</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- -->
    <hr>
    <h3 class="text-center">Daftar Resep Anda</h3>
    <hr>
    <div class="row my-5">
        @foreach ($resep_sendiri as $resep)
            <div class="col-lg-4 col-md-6 col-sm-12 mx-3">
                <div class="card">
                    <div class="card-header text-center">
                        <img src="{{ asset('storage/' . $resep->foto_resep) }}" alt="{{ $resep->foto_resep }}"> <br>
                        <span style="font-weight: 600;">{{ $resep->nama_resep }}</span>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 col-sm-12">
                                Waktu : {{ $resep->lama_memasak }} Menit
                            </div>
                            <div class="col-md-4 col-sm-12">
                                Porsi : {{ $resep->porsi_orang }} Orang
                            </div>
                            <div class="col-md-4 col-sm-12">
                                Harga : RP{{ number_format($resep->pengeluaran_memasak, 2, ',', '.') }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-12 text-center col-md-6">
                                <form action="/koki/resep/{{ $resep->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Yakin mau menghapus resep?')"
                                        class="btn btn-danger">Hapus</button>
                                </form>
                            </div>
                            <div class="col-sm-12 text-center col-md-6">
                                <form action="/koki/resep/{{ $resep->id }}/edit" method="get">
                                    <button type="submit" class="btn btn-warning">Edit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- -->

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
