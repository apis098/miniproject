@extends('layouts.nav_koki')
@section('konten')
    
    @push('style')
        @powerGridStyles
    @endpush
    <style>
        .left-pan {
            padding-left: 7px;
        }

        .left-pan i {

            padding-left: 10px;
        }
    </style>

    <div class="my-3 ml-4" style="overflow-x:hidden">
        <ul class="nav mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">
                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Edit Profile</h5>
                    <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a id="click2" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                    aria-selected="false">
                    <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Edit Password</h5>
                    <div id="border2" class="1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
        </ul>
        <div class="tab-content mb-5 mx-" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                tabindex="0">
                {{-- start tab 1 --}}
                <div class="text-center mt-4">
                    <div style="position: relative; display: inline-block;">
                        @if ($userLogin->foto)
                            <img src="{{ asset('storage/' . $userLogin->foto) }}" width="200px" height="200px"
                                style="border-radius: 50%" alt="">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" width="200px" height="200px"
                                style="border-radius: 50%" alt="">
                        @endif
                        <button type="submit"
                            style="position: absolute;  right: 5px; top: 70%; background-color:#F7941E; border: none"
                            class="btn btn-warning btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
                            data-bs-target="#mymodal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48">
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
                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row mt-5">
                            <label class="col-sm-1 col-form-label fw-bold mx-4">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="name" value="{{ $userLogin->name }}"
                                    class="form-control rounded-2 " style=" width: 100%;  " placeholder="Masukkan Nama...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold mx-4">Email </label>
                            <div class="col-sm-10">
                                <input type="email" id="harga" name="email" value="{{ $userLogin->email }}"
                                    class="form-control rounded-2 " style=" width: 100%;  " placeholder="Masukkan Email...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label mx-4"> <strong
                                    style="margin-left: 13px;">Biodata </strong></label>
                            <div class="col-sm-10">
                                <textarea id="durasi" name="biodata" value="{{-- $userLogin->password --}}" class="form-control rounded-2"
                                    style=" width: 100%;  " placeholder="Masukkan Biodata..." rows="3">
                                {!! $userLogin->biodata !!}
                                </textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm d-flex float-end text-white mr-5"
                            style=" margin-left: ; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                             border-radius: 10px; padding: 5px 25px; font-size: 15px; font-family: Poppins; font-weight: 500;
                              letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                    </form>
                </div>

            </div>
            {{-- end --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <form action="{{ route('update.password') }}" method="post">
                    {{-- start tab 2 --}}
                    @csrf
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-2 col-form-label fw-bold mx-3">Password Lama :</label>
                        <div class="col-sm-9">
                            <input type="password" id="oldpass" name="oldPass" value="{{-- $userLogin->name --}}"
                                class="form-control rounded-2 " style=" width: 100%; "
                                placeholder="Masukkan password...">
                            {{-- <a id="mybutton" onclick="change('oldpass','mybutton')"><span id="mybutton" class="left-pan"><i
                                    class="fa-solid fa-eye"></i></span></a> --}}
                        </div>
                    </div>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-2 col-form-label fw-bold mx-3">Password Baru :</label>
                        <div class="col-sm-9">
                            <input type="password" id="newpass" name="password" value="{{-- $userLogin->name --}}"
                                class="form-control rounded-2" style=" width: 100%;  "
                                placeholder="Masukkan password baru...">
                        </div>
                    </div>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-2 col-form-label fw-bold mx-3">Konfirmasi : </label>
                        <div class="col-sm-9">
                            <input type="password" id="copassword" name="password_confirmation"
                                value="{{-- $userLogin->name --}}" class="form-control rounded-2" style=" width: 100%;  "
                                placeholder="konfirmasi password...">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm d-flex float-end text-white mr-5"
                    style=" margin-left: ; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                     border-radius: 10px; padding: 5px 25px; font-size: 15px; font-family: Poppins; font-weight: 500;
                      letter-spacing: 0.13px; word-wrap: break-word">Ganti</button>
                </form>
            </div>
            {{-- end --}}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



    <!-- Tambahkan script Anda di sini -->
    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("click2");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("border2");
        // Sembunyikan elemen 'border2' secara manual saat halaman dimuat
        border2.style.display = "none";

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
        });
        click2.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "none";
            border2.style.display = "block";
        });
    </script>

    <script>
        $(document).ready(function() {
            // Inisialisasi tab dengan Bootstrap
            $('#pills-tab a').on('click', function(e) {
                e.preventDefault();
                $(this).tab('show');
            });
        });
    </script>

    <script>
        function change(inputId, buttonId) {
            var input = document.getElementById(inputId);
            var button = document.getElementById(buttonId);

            if (input.type === "password") {
                input.type = "text";
                button.innerHTML = '<span class="left-pan"><i class="fa-solid fa-eye-slash"></i></span>';
            } else {
                input.type = "password";
                button.innerHTML = '<span class="left-pan"><i class="fa-solid fa-eye"></i></span>';
            }
        }
    </script>
@endsection
