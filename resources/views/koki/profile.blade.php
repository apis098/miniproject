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
                            <button type="submit" style="position: absolute;  right: -2px; background-color:#F7941E; "
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
                            @if ($userLogin->isSuperUser === "yes")
                                <a style="font-size: 18px;" href=""><img src="{{ asset('img/r.png') }}" width="20px;" height="20px;" alt=""></a>
                            @endif
                        </p>
                        <button style="border-radius: 15px;background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" class="btn text-light mb-3">
                            <span style="font-weight: 600">
                                <a href="/koki/resep" style="color: rgb(255, 255, 255);">Buat Resep</a>
                            </span>
                        </button>
                        {{-- <button style="border-radius: 15px;background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);" class="btn text-light mb-3">
                            <span style="font-weight: 600">
                                <a href="/roomchat/roomchat" style="color: rgb(255, 255, 255);"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 14 14"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"><circle cx="3.5" cy="7" r=".5"/><circle cx="6.75" cy="7" r=".5"/><circle cx="10" cy="7" r=".5"/><path d="M7 .5a6.5 6.5 0 0 0-5.41 10.1L.5 13.5l3.65-.66A6.5 6.5 0 1 0 7 .5Z"/></g></svg></a>
                            </span> 
                        </button> --}}
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
                                        style="position: absolute; top: 80%; right: 46%;background-color: #F7941E; border-radius: 9px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                        id="chooseFileButtonA">
                                        <b class="ms-2 me-2">Pilih file</b>
                                    </label>

                                    <a href="{{ route('delete.profile') }}" id="deleteProfile" hidden>Hapus</a>
                                    <a onclick="DeleteData()" class="btn btn-warning btn-sm rounded-5"
                                        style="position: absolute; top: 80%; right: 24.7%;border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-1 me-1 text-light">Hapus foto</b></a>

                                    <button class="btn btn-warning btn-sm rounded-5 text-light me-3"
                                        style="position: absolute; top: 80%; right: 5%;border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
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
                            style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
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
                            style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
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
                            style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
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
               
                <div class=" d-flex " style="margin-right: -10%;">
                    <ul class="nav mb-3" style="margin-left: -17px;" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a id="click1" class="nav-link mr-4 active" id="pills-home-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                role="tab" aria-controls="pills-home" aria-selected="true">
                                <h5 class="text-dark ms-2"
                                    style="font-weight: 600; word-wrap: break-word;">Resep Dibuat</h5>
                                <div id="border1" class="ms-1"
                                    style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation" style="margin-left: 70px;">
                            <a id="c" class="nav-link mr-5" id="pills-profile-tab"
                                data-bs-toggle="pill" data-bs-target="#pills-profile" type="button"
                                role="tab" aria-controls="pills-profile" aria-selected="false">
                                <h5 class="text-dark ms-2"
                                    style="font-weight: 600; word-wrap: break-word;">Video Dibuat </h5>
                                <div id="b" class="ms-0"
                                    style="width:120%; height: 100%; border: 1px #F7941E solid;"
                                    hidden>
                                </div>
                            </a>
                        </li>

                        <li class="nav-item" role="presentation" style="margin-left: 60px;">
                            <button id="a-tab" class="nav-link mr-5 yuhu mt-2"
                                id="pills-footer-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab"
                                aria-controls="pills-contact" aria-selected="false">
                                <h5 class="text-dark ms-2"
                                    style="font-weight: 600; word-wrap: break-word;">Kursus Dibuat</h5>
                                <div id="pp" class="ms-1"
                                    style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
                                </div>
                            </button>
                        </li>
                    </ul>

                </div>
            </div>


            <div class="mx-1">
                <div class="tab-content mb-5 mx-1 my-5" id="pills-tabContent">
                    {{-- start tab 1 --}}
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                            @foreach ($recipes as $r)
                                <div class="col-lg-4 my-1">
                                    <div class="card p-3"
                                        style="width: 100%; height: 95%; border-radius: 15px; border: 0.50px black solid">
                                        <div class="row my-1">
                                            <div class="col-4">
                                                <img class="rounded-circle mb-1" style="max-width:55px;" src="{{ asset('storage/' . $r->foto_resep) }}"
                                                    width="55px" height="55px" alt="dsdaa">
                                            </div>
                                            <div class=" col-8">
                                                <a type="button"  class="as" href="/artikel/{{$r->id}}/{{$r->nama_resep}}">
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
                        {{$recipes->links('vendor.pagination.default')}}
                    </div>
                    {{-- end tab 1 --}}
    
                    {{-- start tab 2 --}}
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                            tabindex="0">
                            <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                {{-- @foreach ($recipes as $r) --}}
                                    <div class="col-lg-4 my-1">
                                        <div class="card"
                                            style="width: 225px; height: 100px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                            <div class="row my-1">
                                                {{-- <div class="col-3"> --}}
                                                    <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp"
            class="img-fluid shadow-1-strong rounded" style="margin-top: -10px;" alt="Hollywood Sign on The Hill" />
                                                  {{-- </div> --}}

                                            </div>
                                        </div>
                                    </div>
                                {{-- @endforeach --}}
                            </div>
                            {{-- {{$recipes->links('vendor.pagination.default')}} --}}
                    </div>
                    {{-- end tab 2 --}}
    
                    {{-- start tab 3 --}}
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                            tabindex="0">
                            <div class="row mb-5" style="margin-top: -50px; margin-left: -25px;">
                                {{-- @foreach ($recipes as $r) --}}
                                    <div class="col-lg-4 my-1">
                                        <div class="card p-3"
                                            style="width: 360px; height: 95%; border-radius: 15px; border: 0.50px black solid">
                                            <div class="row my-1">
                                                <div class="col-4">
                                                    <img class="rounded-circle mb-1" style="max-width:55px;" src="img/3.jpg"
                                                        width="55px" height="55px" alt="dsdaa">
                                                </div>
                                                <div class=" col-8">
                                                    <a type="button"  class="as" href="">
                                                       cara mengocok bumbu dengan baik dan benar
                                                    </a> <br>
                                                    <!-- Modal -->
            
                                                    <span class="ai">
                                                        Oleh drs moh hatta.gmail.com
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {{-- @endforeach --}}
                            </div>
                            {{-- {{$recipes->links('vendor.pagination.default')}} --}}
                    </div>
                    {{-- end tab 3 --}}
    
                   
                </div>
            </div>
    
       
        <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
        <!-- jQuery CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            const click1 = document.getElementById("click1");
            const click2 = document.getElementById("c");
            const border1 = document.getElementById("border1");
            const border2 = document.getElementById("b");
            const o = document.getElementById("pp");
            const a_tab = document.getElementById("a-tab");
            const ab = document.getElementById("pp2");
            const a_tab2 = document.getElementById("a-tab2");
    
            a_tab.addEventListener('click', function(event) {
                event.preventDefault();
                o.style.display = "block";
                border1.style.display = "none";
                border2.style.display = "none";
                ab.style.display = "none";
            });
    
    
            click1.addEventListener('click', function(event) {
                event.preventDefault();
                border1.style.display = "block";
                border2.style.display = "none";
                o.style.display = "none";
                ab.style.display = "none";
            });
    
            click2.addEventListener("click", function(event) {
                event.preventDefault();
                border2.removeAttribute('hidden');
                border2.style.display = "block";
                border1.style.display = "none";
                o.style.display = "none";
                ab.style.display = "none";
            });
    
            a_tab2.addEventListener('click', function(event) {
                event.preventDefault();
                ab.removeAttribute('hidden');
                ab.style.display = "block";
                border2.style.display = "none";
                border1.style.display = "none";
                o.style.display = "none";
    
            });
        </script>
                {{-- <h4 class="mt-1 mb-4" style="font-weight: 600; margin-top:-15px"><b>Resep anda</b></h4>
                @if ($recipes->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                    <p><b>Tidak ada data</b></p>
                </div>
                @endif --}}
               
            </div>

        </div>
    </div>

    <script>
        function DeleteData() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus data ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('deleteProfile').click();
                            }
                        }, toast, 'buttonName');
                    }, false], // true to focus
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function(
                        instance, toast) {
                        instance.hide({}, toast, 'buttonName');
                    }]
                ],
                onOpening: function(instance, toast) {
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy) {
                    console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });
        }
    </script>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
