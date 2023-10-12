@extends('layouts.nav_koki')
@section('konten')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @push('style')
        @powerGridStyles
    @endpush

        <div class="my-3 ml-4">
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
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Ganti password</h5>
                        <div id="b" class="ms-" style="width: 100%; height: 100%; border: 1px #F7941E solid;"
                            hidden>
                        </div>
                    </a>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                {{-- start tab 1 --}}
                <div class="text-center mt-5" style="overflow-x:hidden">
                    <div style="position: relative; display: inline-block;">
                        @if ($userLogin->foto)
                            <img src="{{ asset('storage/' . $userLogin->foto) }}" width="146px" height="144px" style="border-radius: 50%"
                                alt="">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px" style="border-radius: 50%"
                                alt="">
                        @endif
                        <button type="submit"
                            style="position: absolute;  right: 10px; top: 70%; background-color:#F7941E; border: none"
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
                    <form action="{{ route('update.profile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3 row mt-5">
                            <label class="col-sm-1 col-form-label fw-bold mx-4">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="name" value="{{ $userLogin->name }}" class="form-control "
                                    style=" width: 101%;  " placeholder="Masukkan Nama...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label fw-bold mx-4">Email </label>
                            <div class="col-sm-10">
                                <input type="email" id="harga" name="email" value="{{ $userLogin->email }}"
                                    class="form-control " style=" width: 101%;  " placeholder="Masukkan Email...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-1 col-form-label mx-4"> <strong style="margin-left: 13px;">Biodata</strong></label>
                            <div class="col-sm-10">
                                <textarea id="durasi" name="biodata" value="{{-- $userLogin->password --}}"
                                    class="form-control " style=" width: 101%;  " placeholder="Masukkan Biodata..." rows="3"></textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm d-flex float-end text-white mr-4"
                            style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                    </form>
                </div>

                  </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <div class="mb-3 row mt-5">
                        <label class="col-sm-1 col-form-label fw-bold mx-4">password lama</label>
                        <div class="col-sm-10">
                            <input type="password" id="oldpass" name="password" value="{{-- $userLogin->name --}}" class="form-control "
                                style=" width: 101%;  " placeholder="Masukkan password...">
                        </div>
                    </div>
                    <div class="mb-3 row mt-5">
                        <label class="col-sm-1 col-form-label fw-bold mx-4">password baru</label>
                        <div class="col-sm-10">
                            <input type="password" id="newpass" name="newpass" value="{{-- $userLogin->name --}}" class="form-control "
                                style=" width: 101%;  " placeholder="Masukkan password baru...">
                        </div>
                    </div>
                    <div class="mb-3 row mt-5">
                        <label class="col-sm-1 col-form-label fw-bold mx-4">konfirmasi password</label>
                        <div class="col-sm-10">
                            <input type="password" id="copassword" name="copassword" value="{{-- $userLogin->name --}}" class="form-control "
                                style=" width: 101%;  " placeholder="konfirmasi password...">
                        </div>
                    </div>

                  </div>
                {{-- end --}}
        </div>
    </div>

      <script>
        
      </script>

    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("c");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("b");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");

        a_tab.addEventListener('click', function(event) {
            event.preventDefault();
            o.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
        });

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            o.style.display = "none";
        });

        click2.addEventListener("click", function(event) {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            o.style.display = "none";
        });
    </script>
@endsection
