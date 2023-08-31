<div style="background-color: #F7941E" class="radius-bawah">
    @extends('template.nav')
    @section('content')
        <style>
            .radius-bawah {
                border-bottom-left-radius: 30px;
                border-bottom-right-radius: 30px;
            }

            body {
                background: #f7f7f7;
                background: -webkit-linear-gradient(to right, #ffffff, #ffffff);
                background: linear-gradient(to right, #ffffff, #ffffff);
                min-height: 100vh;
                font-family: 'Poppins';
            }

            .font-poppins {
                font-family: 'Poppins';
            }

            .social-link {
                width: 30px;
                height: 30px;
                border: 1px solid #ddd;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #666;
                border-radius: 50%;
                transition: all 0.3s;
                font-size: 0.9rem;
            }

            .social-link:hover,
            .social-link:focus {
                background: #ddd;
                text-decoration: none;
                color: #555;
            }

            .search {
                background-color: #fff;
                padding: 4px;
                border-radius: 5px
            }

            .search-1 {
                position: relative;
                width: 100%
            }

            .search-1 input {
                height: 45px;
                border: none;
                width: 100%;
                padding-left: 34px;
                padding-right: 10px;
                border-right: 2px solid #eee
            }

            .search-1 input:focus {
                border-color: none;
                box-shadow: none;
                outline: none
            }

            .search-1 i {
                position: absolute;
                top: 12px;
                left: 5px;
                font-size: 24px;
                color: #eee
            }

            ::placeholder {
                color: #eee;
                opacity: 1
            }

            .search-2 {
                position: relative;
                width: 100%
            }

            .search-2 input {
                height: 45px;
                border: none;
                width: 100%;
                padding-left: 18px;
                padding-right: 100px
            }

            .search-2 input:focus {
                border-color: none;
                box-shadow: none;
                outline: none
            }

            /* button{
                        background-color: #F7941E;
                        border: none;
                        height: 45px;
                        width: 90px;
                        color: #ffffff;
                        position: absolute;
                        right: 1px;
                        top: 0px;
                        border-radius: 15px
                    } */
            .search-2 i {
                position: absolute;
                top: 12px;
                left: -10px;
                font-size: 24px;
                color: #eee
            }

            .search-2 button {
                position: absolute;
                right: 1px;
                top: 0px;
                border: none;
                height: 45px;
                background-color: #F7941E;
                color: #fff;
                width: 90px;
                border-radius: 4px
            }


            @media (max-width:800px) {
                .search-1 input {
                    border-right: none;
                    border-bottom: 1px solid #eee
                }

                .search-2 i {
                    left: 4px
                }

                .search-2 input {
                    padding-left: 34px
                }

                .search-2 button {
                    height: 37px;
                    top: 5px
                }
            }
        </style>

        <div class="container py-5">
            <div class="row text-center text-white">
                <div class="col-lg-8 mx-auto">
                    <h1 class=" font-poppins mb-5"><b>Temukan teman <br> memasak</b></h1>
                    <form action="">
                        <div class="container">
                            <div class="search" style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="{{ route('user.koki') }}" method="GET">
                                                    <input type="text" id="username" name="username"
                                                        placeholder="Cari Username">
                                                    <button type="submit" class="zoom-effects"
                                                        style="border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">Cari</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </p>
                </div>
            </div>
        </div><!-- End -->
    </div>

    <div class="ms-5 mt-5 input-group">
        <div class="ms-3">
            <h3 class="fw-bold">Hasil Pencarian</h3>
        </div>
    </div>
    @if ($user->count() == 0)
    <div class="d-flex flex-column justify-content-center align-items-center">
        <img src="{{asset('images/data.png')}}" style="width: 15em">
        <p><b>Tidak ada data</b></p>
    </div>
    @endif
    <div class="container mt-4">
        <div class="row text-center">

            <!-- Team item -->
            @foreach ($user as $row)
                @if (Auth::check() && $row->role != 'admin' && $row->id != auth()->user()->id)
                    <div class="col-xl-3 col-sm-4 mb-5">
                        <a class="text-dark" href="{{ route('show.profile', $row->id) }}">
                            <div class="bg-white shadow-sm py-4 px-4 border border-secondary"
                                style="border-radius: 20px; height:22rem;">
                                @if ($row->foto)
                                    <img src="{{ asset('storage/' . $row->foto) }}" alt="" width="50%" height="50%"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                @else
                                    <img src="{{ asset('images/default.jpg  ') }}" alt="" width="50%" height="50%"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                @endif

                                <h5 class="mb-0">{{ strlen($row->name) > 10 ? substr($row->name, 0, 10) . '...' : $row->name }}</h5> <span
                                    class="small text-muted">{{ $row->email }}</span>
                                <div class="d-flex justify-content-center mt-3 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M208 26H72a30 30 0 0 0-30 30v168a6 6 0 0 0 6 6h144a6 6 0 0 0 0-12H54v-2a18 18 0 0 1 18-18h136a6 6 0 0 0 6-6V32a6 6 0 0 0-6-6Zm-6 160H72a29.87 29.87 0 0 0-18 6V56a18 18 0 0 1 18-18h130Z" />
                                    </svg>
                                    <p class="mt-2 ms-1">{{ $row->resep->count() }} Resep</p>
                                </div>
                                <div class="justify-content-center">
                                    <form action="{{ route('Followers.store', $row->id) }}" method="POST">
                                        @csrf
                                        @if (Auth::check() &&
                                                $row->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                            <button type="submit"
                                                class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects"
                                                style="background-color: #F7941E; border-radius: 15px;"><b
                                                    class="ms-3 me-3">Diikuti</b></button>
                                        @elseif(Auth::check() &&
                                                $userLogin->followers()->where('follower_id', $row->id)->exists())
                                            <button type="submit"
                                                class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects"
                                                style="background-color: #F7941E; border-radius: 15px;"><b
                                                    class="ms-3 me-3">Ikuti balik</b></button>
                                        @else
                                            <button type="submit"
                                                class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects"
                                                style="background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"><b
                                                    class="ms-3 me-3">Ikuti</b></button>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </a>
                    </div>
                    {{-- belum login --}}
                @elseif(!Auth::check() && $row->role != 'admin')
                    <div class="col-xl-3 col-sm-6 mb-5">
                        <a class="text-dark" href="{{ route('show.profile', $row->id) }}">
                            <div class="bg-white shadow-sm py-4 px-4 border border-secondary"
                                style="border-radius: 20px;  height:22rem;">
                                @if ($row->foto)
                                    <img src="{{ asset('storage/' . $row->foto) }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                @else
                                    <img src="{{ asset('images/default.jpg  ') }}" alt="" width="100"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                @endif
                                <h5 class="mb-0">{{ strlen($row->name) > 15 ? substr($row->name, 0, 15) . '...' : $row->name }}</h5> <span
                                    class="small text-muted">{{ strlen($row->email) > 25 ? substr($row->email, 0, 25) . '...' : $row->email }}</span>
                                <div class="d-flex justify-content-center mt-3 me-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42"
                                        viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                            d="M208 26H72a30 30 0 0 0-30 30v168a6 6 0 0 0 6 6h144a6 6 0 0 0 0-12H54v-2a18 18 0 0 1 18-18h136a6 6 0 0 0 6-6V32a6 6 0 0 0-6-6Zm-6 160H72a29.87 29.87 0 0 0-18 6V56a18 18 0 0 1 18-18h130Z" />
                                    </svg>
                                    <p class="mt-2 ms-1">{{ $row->resep->count() }} Resep</p>
                                </div>
                                <div class="justify-content-center">
                                    <form action="{{ route('Followers.store', $row->id) }}" method="POST">
                                        @csrf
                                        @if (Auth::check() &&
                                                $row->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                            <button type="submit"
                                                class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects"
                                                style="background-color: #F7941E; border-radius: 15px;"><b
                                                    class="ms-3 me-3">Diikuti</b></button>
                                        @elseif(Auth::check() &&
                                                $userLogin->followers()->where('follower_id', $row->id)->exists())
                                            <button type="submit"
                                                class="btn btn-light text-light float-center mb-5 zoom-effects"
                                                style="background-color: #F7941E; border-radius: 15px;"><b
                                                    class="ms-3 me-3">Ikuti balik</b></button>
                                        @else
                                            <button type="submit"
                                                class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects"
                                                style="background-color: #F7941E; border-radius: 15px;"><b
                                                    class="ms-3 me-3">Ikuti</b></button>
                                        @endif

                                    </form>
                                </div>
                            </div>
                        </a>
                    </div><!-- End -->
                @endif
            @endforeach

        </div>
    </div>

    <!-- end food section -->
@endsection
