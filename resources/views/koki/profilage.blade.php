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

                /* Tampilan mobile Kecil Sekali */
                @media (min-width:290px) and (max-width: 340px) {
                    a.kiri {
                        margin-left: -18px;
                    }

                    input.widt {
                        width: 85%;
                    }

                    input.besar {
                        width: 95%;
                    }

                    textarea.besar {
                        width: 95%;
                    }

                    button.rigt {
                        margin-right: 18px;
                    }

                    button.kiri {
                        margin-right: 14px;
                    }

                }

                /* untuk tampilan mobile */
                @media (min-width: 350px) and (max-width: 860px) {
                    a.kiri {
                        margin-left: 15px;
                    }

                    input.widt {
                        width: 85%;
                    }

                    input.besar {
                        width: 95%;
                    }

                    textarea.besar {
                        width: 95%;
                    }

                    button.rigt {
                        margin-right: 18px;
                    }

                    button.kiri {
                        margin-right: 44px;
                    }

                }

                @media (max-width: 1368px) {
                    button.kiri {
                        margin-right: 65px;
                    }
                }

                @media (min-width: 320px) {
                    button.kiri {
                        margin-right: 45px;
                    }
                }

                @media (min-width: 375px) {
                    button.kiri {
                        margin-right: 50px;
                    }
                }

                @media (min-width: 414px) {
                    button.kiri {
                        margin-right: 58px;
                    }
                }

                @media (min-width: 425px) {
                    button.kiri {
                        margin-right: 58px;
                    }
                }
                @media (min-width: 540px) {
                    button.kiri {
                        margin-right: 75px;
                    }
                    button.rigt {
                        margin-right: 28px;
                    }
                }

                @media (min-width: 1024px) {
                    button.rigt {
                        margin-right: 0px;
                    }
                }

                @media (min-width: 1024px) {

                    div.kanan {
                        margin-left: -28px;

                    }

                    input.rigt {
                        margin-left: -15px;
                    }

                    input.widt {
                        width: 94%;
                    }

                    input.besar {
                        width: 100%;
                    }

                    textarea.besar {
                        width: 100%;
                    }
                    button.kiri {
                        margin-right: 50px;
                    }

                }


                /* untuk tampilan ipad */
                @media (min-width: 760px) and (max-width: 1000px) {
                    input.widt {
                        width: 90%;
                        margin-left: 10px;

                    }
                    label.kanan{
                        margin-left: -20px;
                    }

                    input.besar {
                        width: 98%;
                    }

                    textarea.besar {
                        width: 98%;
                    }
                    button.rigt {
                        margin-right: 32px;
                    }

                    button.kiri {
                        margin-right: 50px;
                    }
                }

                /* untuk tampilan laptop */
                @media (min-width: 1210px) and (max-width: 4000px) {

                    div.kanan {
                        margin-left: -35px;

                    }

                    input.rigt {
                        margin-left: -30px;
                    }

                    input.widt {
                        width: 98%;
                    }

                    input.besar {
                        width: 100%;
                    }

                    textarea.besar {
                        width: 100%;
                    }
                    button.kiri {
                        margin-right: 50px;
                    }
                }
    </style>

    <div class="my-3 ml-4" style="overflow-x:hidden">
        <ul class="nav mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a id="click1" class="nav-link active " id="pills-home-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                    aria-selected="true">
                    <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Edit Profile</h5>
                    <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                    </div>
                </a>
            </li>
            <li class="nav-item" role="presentation">
                <a id="click2" class="nav-link kiri" id="pills-profile-tab" data-bs-toggle="pill"
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
                        <div class="col-12 kanan">
                        <div class="mb-3 row mt-5">
                            <label class="col-sm-2 col-form-label fw-bold kanan">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" id="nama" name="name" value="{{ $userLogin->name }}"
                                    class="form-control rounded-2 besar"  placeholder="Masukkan Nama...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label fw-bold kanan">Email </label>
                            <div class="col-sm-10">
                                <input type="email" id="harga" name="email" value="{{ $userLogin->email }}"
                                    class="form-control rounded-2 besar"  placeholder="Masukkan Email...">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label kanan"> <strong
                                    style="margin-left: 13px;">Biodata </strong></label>
                            <div class="col-sm-10">
                                <textarea id="durasi" name="biodata" rows="4" value="{{-- $userLogin->password --}}" class="form-control rounded-2 besar"
                                     placeholder="Masukkan Biodata..." >
                                {!! $userLogin->biodata !!}
                                </textarea>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-sm d-flex float-end text-white mb-3 rigt"
                            style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                             border-radius: 10px; padding: 5px 25px; font-size: 15px; font-family: Poppins;">Edit</button>
                             </div>
                    </form>
                </div>

            </div>
            {{-- end --}}
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                tabindex="0">
                <form action="{{ route('update.password') }}" method="post">
                    {{-- start tab 2 --}}
                    @csrf
                    <div class="col-12 mx-3">
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-2 col-form-label fw-bold ">Password lama</label>
                        <div class="col-sm-10">
                            <input type="password" id="oldpass" name="oldPass" value="{{-- $userLogin->name --}}"
                                class="form-control rounded-2 rigt widt"   placeholder="Masukkan password...">
                            {{-- <a id="mybutton" onclick="change('oldpass','mybutton')"><span id="mybutton" class="left-pan"><i
                                    class="fa-solid fa-eye"></i></span></a> --}}
                        </div>
                    </div>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-2 col-form-label fw-bold ">Password baru </label>
                        <div class="col-sm-10">
                            <input type="password" id="newpass" name="password" value="{{-- $userLogin->name --}}"
                                class="form-control rounded-2 rigt widt"
                                placeholder="Masukkan password baru...">
                        </div>
                    </div>
                    <div class="mb-3 row mt-2">
                        <label class="col-sm-2 col-form-label fw-bold ">Konfirmasi  </label>
                        <div class="col-sm-10">
                            <input type="password" id="copassword" name="password_confirmation"
                                value="{{-- $userLogin->name --}}" class="form-control rounded-2 rigt widt"
                                placeholder="konfirmasi password...">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm d-flex float-end text-white mb-3 kiri"
                    style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                     border-radius: 10px; padding: 5px 25px; font-size: 15px; font-family: Poppins;">Ganti</button>
                     </div>
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
