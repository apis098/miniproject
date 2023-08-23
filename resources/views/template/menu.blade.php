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

            .search-1 select {
                height: 45px;
                border: none;
                width: 100%;
                padding-left: 34px;
                padding-right: 10px;
                border-right: 2px solid #eee
            }

            .search-1 select:focus {
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

            .search-2 select {
                height: 45px;
                border: none;
                width: 100%;
                color: #000;
                padding-left: 18px;
                padding-right: 100px
            }

            .search-2 select:focus {
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
                top: -1px;
                border: none;
                height: 35px;
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
                    <h1 class="mb-5"
                        style="text-align: center; color: white; font-size: 30px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                        Cari resep masakan <br />berdasarkan bahan
                    </h1>
                    <form action="">
                        <div class="container">
                            <div class="search" style="border-radius: 15px;">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div>
                                            <div class="search-2"> <i class='bx bxs-map'></i>
                                                <form action="{{ url('/menu') }}" method="get">
                                                    <select name="bahan[]" class="search-bahan" id="search-bahan"
                                                        multiple="multiple">
                                                        @foreach ($ingredients as $n => $i)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endforeach
                                                    </select>
                                                    <button type="submit" class="zoom-effects"
                                                        style="border-radius: 15px;">Cari</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-12 text-center mt-5">
                        @if (count($bahan) >= 5)
                            <div
                                style="background-color: #F7941E; width: 100%; height: 65px; border: 1px solid black; overflow-y: scroll; border: none;">
                                @foreach ($bahan as $b)
                                    <button class="btn btn-white mx-2 my-2"
                                        style=" background: white; border-radius: 10px; padding: 6px 35px;">
                                        <div class="Ayam"
                                            style="color: #F7941E; font-size: 18px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                            {{ $b }}</div>
                                    </button>
                                @endforeach
                            </div>
                        @else
                            @foreach ($bahan as $b)
                                <button class="btn btn-white mx-2 my-2"
                                    style=" background: white; border-radius: 10px; padding: 6px 35px;">
                                    <div class="Ayam"
                                        style="color: #F7941E; font-size: 18px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        {{ $b }}</div>
                                </button>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div><!-- End -->
    </div>
    <div class="ms-5 mt-5 input-group">
        <div class="ms-1">
            <h3 class="fw-bold">Hasil Pencarian</h3>
        </div>
        <div class="ms-auto me-5">
            {{ $recipes->links('vendor.pagination.simple-default') }}
        </div>
    </div>
    @if ($recipes->count() == 0)
        <div class="d-flex flex-column justify-content-center align-items-center">
            <img src="{{ asset('images/data.png') }}" style="width: 15em">
            <p>Tidak ada data</p>
        </div>
    @endif
    <div class="mx-5 my-5">
        <div class="row">
            @foreach ($recipes as $item)
                <div class="col-lg-4 mb-3 col-sm-12 col-md-6">
                    <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                        <div class="card-header my-3 mx-auto" style="background-color: white">
                            <img width="250px" class="" height="230px"
                                style="border-radius: 9999px; border: 0.50px black solid"
                                src="{{ asset('storage/' . $item->foto_resep) }}" />
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <h5>
                                        <a style="color: black;"
                                            href="/artikel/{{ $item->id }}/{{ $item->nama_resep }}">
                                            {{ $item->nama_resep }}
                                        </a>
                                    </h5>
                                    <span>Oleh {{ $item->User->name }}</span>
                                </div>
                                <div class="col-12  my-3">
                                    @foreach ($item->bahan as $b)
                                        <button type="button" class="border p-2"
                                            style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; padding: 6px 35px;">
                                            <div
                                                style="color: white; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                {{ $b->nama_bahan }}</div>
                                        </button>
                                    @endforeach
                                    @if ($item->hari_khusus)
                                        <button type="button" class="border p-2"
                                            style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; padding: 6px 35px;">
                                            <div
                                                style="color: white; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                {{ $item->hari_khusus }}</div>
                                        </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $recipes->links() }}
    </div>
@endsection
