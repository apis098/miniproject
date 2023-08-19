@extends('template.nav')
@section('content')
<style>
     .as {
            color: black;
            font-size: 20px;
            font-family: Poppins;
            font-weight: 500;
        }

        .ai {
            color: black;
            font-size: 13px;
            font-family: Poppins;
            font-weight: 400;
            word-wrap: break-word;
            padding-top: 5px
        }
</style>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card my-5 border border-dark" style="border-radius:25px;">
                    <div class="text-center mt-5">
                        <div style="position: relative; display: inline-block;">
                            @if($userLogin->foto)
                            <img src="{{ asset('storage/'. $userLogin->foto) }}" width="146px" height="144px" style="border-radius: 50%"
                                alt="">
                            @else
                            <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px" style="border-radius: 50%"
                                alt="">
                            @endif
                            <button type="submit" style="position: absolute;  right: -2px; background-color:#F7941E;" class="btn btn-warning btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
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
                        <p class="mt-2"
                            style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            {{$userLogin->name}}<br>
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{$userLogin->email}}</span>
                        </p>
                        <button style="border-radius: 15px;background-color:#F7941E;" class="btn btn-light text-light mb-3">
                            <span style="font-weight: 600">
                                <a href="/koki/resep" style="color: rgb(255, 255, 255);">Buat Resep</a>
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
                            <h1 class="modal-title fs-5" style="font-family: Poppins;" id="exampleModalLabel">Edit Gambar</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{route('update.profile')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('put') --}}
                                <div class="profile d-flex justify-content-center">

                                    <label for="fileInputA"
                                        class="btn btn-warning rounded-5 text-light"
                                        style="position: absolute; top: 40%; right: 33%;background-color: #F7941E; border-radius: 15px;" id="chooseFileButtonA">
                                        <b class="ms-3 me-3">Pilih file</b>
                                    </label>

                                    <button class="btn btn-warning rounded-5 text-light" style="position: absolute; top: 40%; right: 7%;background-color: #F7941E; border-radius: 15px;" type="submit" id="saveProfileButton"><b class="ms-3 me-3">Simpan</b></button>
                                    
                                    <input type="file" id="fileInputA" name="profile_picture" style="display:none">
                                    @if($userLogin->foto)
                                    <img src="{{ asset('storage/'.$userLogin->foto) }}" width="106px" height="104px"
                                    style="border-radius: 50%; margin-right:60%;" id="profile-image">
                                    @else
                                    <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px"
                                    style="border-radius: 50%; margin-right:60%;" id="profile-image">
                                    @endif
                                </div>
                        </div>

                        <div class="modal-footer">
                          
                        </div>
                        </form>
                    </div>
                    <script>
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
            <div class="col-lg-8">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7 ">
                                    <span class="ms-3" style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{$userLogin->like}}
                                    </span> <br>
                                    <p class="ms-3">Suka</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7">
                                    <span class="ms-3" style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{$resep_sendiri->count()}}
                                    </span> <br>
                                    <p class="ms-3">Resep</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7">
                                    <span class="ms-3" style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{$userLogin->followers }}
                                    </span> <br>
                                    <p class="ms-3">Pengikut</p>
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-user-plus fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 class="mt-1 mb-4" style="font-weight: 600; margin-top:-15px"><b>Resep anda</b></h4>
                <div class="row mb-5">
                    <div class="col-lg-4 my-1">
                        <div class="card p-3"
                            style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-4">
                                    <img class="rounded-circle" src="{{ asset('images/client1.jpg') }}" width="55px" alt="dsdaa">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-1">
                        <div class="card p-3"
                            style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-4">
                                    <img class="rounded-circle" src="{{ asset('images/client1.jpg') }}" width="55px" alt="dsdaa">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-1">
                        <div class="card p-3"
                            style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-4">
                                    <img class="rounded-circle" src="{{ asset('images/client1.jpg') }}" width="55px" alt="">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-1">
                        <div class="card p-3"
                            style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-4">
                                    <img class="rounded-circle" src="{{ asset('images/client1.jpg') }}" width="55px" alt="dsdaa">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-1">
                        <div class="card p-3"
                            style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-4">
                                    <img class="rounded-circle" src="{{ asset('images/client1.jpg') }}" width="55px" alt="dsdaa">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
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
