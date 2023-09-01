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

        .modal-body {
            padding: 20px;
            /* Tambahkan padding untuk menciptakan jarak di sekitar elemen */
        }

        .modal-body img {
            margin-right: 20px;
            /* Tambahkan margin di sebelah kanan gambar untuk menciptakan jarak */
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="card my-5 border border-dark" style="border-radius: 25px;">
                    <div class="text-center mt-5">
                        <div style="position: relative; display: inline-block;">
                            @if($user->foto)
                            <img src="{{ asset('storage/'. $user->foto) }}" width="146px" height="144px" style="border-radius: 50%"
                                alt="">
                            @else
                            <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px" style="border-radius: 50%"
                                alt="">
                            @endif
                            <button type="submit" class="btn btn-warning zoom-effects text-light btn-sm rounded-circle p-2"
                                style="position: absolute;  right: -2px; background-color:#F7941E;" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
                        <p class=""
                            style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            {{$user->name}}
                            <br>
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">{{$user->email}}</span>
                        </p>
                        <form action="{{route('Followers.store',$user->id)}}" method="POST">
                            @csrf
                                @if(Auth::check() && $user->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                <button type="submit" class="btn btn-light text-light float-center mb-4 zoom-effects" style="background-color: #F7941E; border-radius: 15px;"><b class="ms-3 me-3">Diikuti</b></button>
                                @elseif(Auth::check() && $userLogin->followers()->where('follower_id', $user->id)->exists())
                                <button type="submit" class="btn btn-light text-light float-center mb-4 zoom-effects" style="background-color: #F7941E; border-radius: 15px;"><b class="ms-3 me-3">Ikuti balik</b></button>
                                @else
                                <button type="submit" class="btn btn-light text-light float-center mb-4 zoom-effects" style="background-color: #F7941E; border-radius: 15px;"><b class="ms-3 me-3">Ikuti</b></button>
                                @endif

                            </form>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Laporkan foto pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{route('Report.store')}}" method="POST">
                            @csrf
                        <div class="modal-body d-flex align-items-center"> <!-- Tambahkan kelas "align-items-center" -->
                            @if($user->foto)
                            <img src="{{ asset('storage/'.$user->foto) }}" width="106px" height="104px" style="border-radius: 50%"
                                alt="">
                            <textarea class="form-control" name="description" rows="5" placeholder="Alasan"></textarea>
                            <input hidden type="text" name="profile_id" value="{{$user->id}}">
                            <input hidden type="text" name="user_id" value="{{$user->id}}">
                            @else
                            <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px" style="border-radius: 50%"
                                alt="">
                            <textarea class="form-control rounded-5" name="description" rows="5" placeholder="Alasan..."></textarea>
                            <input hidden type="text" name="profile_id" value="{{$user->id}}">
                            <input hidden type="text" name="user_id" value="{{$user->id}}">
                            @endif
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-light text-light" style="border-radius: 15px; background-color:#F7941E;"><b class="ms-2 me-2">Laporkan</b></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
            {{-- end modal --}}
            {{-- akhir modal --}}
            <div class="col-lg-8">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 80%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-7 ">
                                    <span class="ms-3" style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        {{$user->like}}
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
                                        {{$user->resep->count()}}
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
                                        {{$user->followers }}
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
                <h4 class="mt-1 mb-4" style="font-weight: 600; margin-top:-15px"><b>Resep dibuat</b></h4>
                @if ($recipes->count() == 0)
                <div class="d-flex flex-column justify-content-center align-items-center">
                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                    <p><b>Tidak ada data</b></p>
                </div>
                @endif
                <div class="row mb-5">
                    @foreach ($recipes as $item_recipe)
                    <div class="col-lg-4 my-1">
                        <div class="card p-3"
                            style="width: 100%; height: 95%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-1">
                                <div class="col-4">
                                    <img class="rounded-circle" src="{{ asset('storage/'.$item_recipe->foto_resep) }}" width="55px" alt="dsdaa">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        <a style="color: black;" href="/artikel/{{$item_recipe->id}}/{{$item_recipe->nama_resep}}">
                                        {{ $item_recipe->nama_resep }}
                                        </a>
                                    </h3>
                                    <span class="ai">
                                        Oleh {{ $item_recipe->User->name }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $recipes->links('vendor.pagination.default') }}
            </div>
        </div>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
