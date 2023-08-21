@extends('template.nav')
@section('content')
@section('content-header')
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

    <section class="slider_section">
        <div class="row container mx-auto">
            <div class="col-sm-12"
                style="width: 100%;height: 100%; text-align: center; color: white; font-size: 30px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                Cari resep masakan <br />berdasarkan hari
            </div>
            <div class="col-sm-8 container mx-auto">
                <!--
                    <div class="container-fluid">
                        <form class="d-flex" role="search">
                            <input class="form-control p-2" style="margin: 8px;" type="search"
                                placeholder="Cari resep yang kamu mau" aria-label="Search">
                            <button class="btn btn-warning my-2"
                                style="position: absolute; right: 50px; border-radius: 10px; background: #F7941E;"
                                type="submit">
                                <div
                                    style="width: 100%; color: white; font-size: 16px; font-family: Poppins; font-weight: 600; letter-spacing: 0.48px; word-wrap: break-word">
                                    Cari</div>
                            </button>
                        </form>
                    </div>
                -->
                <form action="" class="my-3">
                    <div class="container">
                        <div class="search" style="border-radius: 15px;">
                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <div class="search-2"> <i class='bx bxs-map'></i>
                                            <form action="{{ route('user.koki') }}" method="GET">
                                                <input type="text" id="username" name="username"
                                                    placeholder="Masukan resep yang kamu mau">
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
            </div>
            <div class="col-sm-12 text-center">
                @foreach ($hari as $h)                    
                <button type="button" class="col-1 border p-2"
                    style="background: white; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px">
                    <div
                        style="color: #F7941E; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                        {{ $h }}</div>
                </button>
                @endforeach
            </div>
        </div>
    </section>
@endsection
<div class="container my-5">
    <div class="row">
        <div class="col">
            <h3
                style="color: black; font-size: 24px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word; margin-top: 12px; margin-bottom: 12px;">
                Hasil pencarian</h3>
        </div>
        <div class="col" style="text-align: right;">
            {{ $recipes->links('vendor.pagination.simple-default') }}
        </div>
    </div>
    <div class="row">
        @foreach ($recipes as $item)
            <div class="col-lg-4 mb-3 col-sm-12 col-md-6">
                <div class="card" style="border-radius: 15px; border: 0.50px black solid">
                    <div class="card-header">
                        <img width="100%" height="100%" style="border-radius: 9999px; border: 0.50px black solid"
                            src="{{ asset('storage/' . $item->foto_resep) }}" />
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <h5>{{ $item->nama_resep }}</h5>
                                <span>Oleh {{ $item->User->name }}</span>
                            </div>
                            <div class="col-12  my-3">
                                <button type="button" class="border p-2"
                                    style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px">
                                    <div
                                        style="color: white; font-size: 15px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        {{ $item->hari_khusus }}</div>
                                </button>
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
