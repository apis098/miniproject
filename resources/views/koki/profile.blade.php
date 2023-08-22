@extends('template.nav')
@section('content')
    <style>
        .as {
            color: black;
            font-size: 15px;
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
                            @if ($userLogin->foto)
                                <img src="{{ asset('storage/' . $userLogin->foto) }}" width="146px" height="144px"
                                    style="border-radius: 50%" alt="">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px"
                                    style="border-radius: 50%" alt="">
                            @endif
                            <button type="submit" style="position: absolute;  right: -2px; background-color:#F7941E;"
                                class="btn btn-warning btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
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
                            {{ $userLogin->name }}<br>
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{ $userLogin->email }}</span>
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
                            <h1 class="modal-title fs-5" style="font-family: Poppins;" id="exampleModalLabel"><b
                                    class="ms-2">Edit Profile</b></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('put') --}}
                                <div class="profile d-flex justify-content-center">

                                    <label for="fileInputA" class="btn btn-warning btn-sm rounded-5 text-light"
                                        style="position: absolute; top: 80%; right: 46%;background-color: #F7941E; border-radius: 9px;"
                                        id="chooseFileButtonA">
                                        <b class="ms-2 me-2">Pilih file</b>
                                    </label>

                                    <a href="{{ route('delete.profile') }}" class="btn btn-warning btn-sm rounded-5"
                                        style="position: absolute; top: 80%; right: 24.7%;border-radius: 9px; background-color: #F7941E; "><b
                                            class="ms-1 me-1 text-light">Hapus foto</b></a>

                                    <button class="btn btn-warning btn-sm rounded-5 text-light me-3"
                                        style="position: absolute; top: 80%; right: 5%;border-radius: 9px; background-color: #F7941E; "
                                        type="submit" id="saveProfileButton"><b class="ms-1 me-1">Simpan</b></button>

                                    <input type="file" id="fileInputA" name="profile_picture" style="display:none">

                                    @if ($userLogin->foto)
                                        <img src="{{ asset('storage/' . $userLogin->foto) }}" width="106px" height="104px"
                                            style="border-radius: 50%; margin-right:-28%;" id="profile-image">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                            style="border-radius: 50%; margin-right:-28%;" id="profile-image">
                                    @endif

                                    <div class="col-8" style="margin-left:35%;">
                                        <input type="text" value="{{ $userLogin->name }}" name="name"
                                            class="form-control form-control-sm">
                                        <input type="text" name="email" value="{{ $userLogin->email }}"
                                            class="form-control form-control-sm mt-3">
                                    </div>

                                </div>
                        </div>

                        <div class="modal-footer mt-3 mb-4">

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
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $userLogin->like }}
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
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $resep_sendiri->count() }}
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
                                    <span class="ms-3"
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{ $userLogin->followers }}
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
                @if ($recipes->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                    <p>Tidak ada data</p>
                </div>
                @endif
                <div class="row mb-5">
                    @foreach ($recipes as $r)
                        <div class="col-lg-4 my-1">
                            <div class="card p-3"
                                style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                                <div class="row my-1">
                                    <div class="col-4">
                                        <img class="rounded-circle" src="{{ asset('storage/' . $r->foto_resep) }}"
                                            width="55px" alt="dsdaa">
                                    </div>
                                    <div class=" col-8">
                                        <a type="button"  class="as" href="/artikel/{{$r->User->id}}/{{$r->nama_resep}}">
                                            {{ $r->nama_resep }}
                                        </a> <br>
                                        <!-- Modal -->
                                    
                                        <span class="ai">
                                            Oleh {{ $r->User->name }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{$recipes->links()}}
            </div>

        </div>
    </div>



    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
