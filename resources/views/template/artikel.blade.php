@extends('template.nav')
@section('content')
    <style>
        .btn-edit {
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-family: 'poppins';
            font-weight: 500;
            word-wrap: break-word;
            border: none;
            letter-spacing: 0.20px;
        }

        .text-orange {
            color: #F7941E;
        }

        .btn-hapus {
            width: 100%;
            height: 100%;
            background-color: white;
            font-size: 17px;
            font-family: 'Poppins';
            font-weight: 500;
            letter-spacing: 0.20px;
            word-wrap: break-word;
            color: black;
            border-radius: 10px;
            margin-left: 10px;
            border: 0.50px black solid
        }


        @media (max-width: 884px) {
            div.rigt {
                margin-left: 400px;
                margin-top: -30px;
            }

            img.besar {
                width: 150px;
                height: 150px;
            }

            h5.knn {
                margin-left: 130px;
                margin-top: -48px;
            }

        }

        /* Tampilan mobile Kecil Sekali */
        @media (min-width:290px) and (max-width: 340px) {

            button.knn {
                margin-left: 140px;
            }

            h5.widt {
                margin-top: -75px;
            }

            h5.rigth {
                margin-left: 70px;
                margin-top: -48px;
            }

            h5.rigt {
                margin-left: -50px;
            }

            div.rigt {
                margin-left: -100px;
                margin-top: 40px;
            }

            div.wid {
                margin-left: -3000px;
            }

            input.bsar {
                max-width: 900px;
                margin-left: -60px;
            }

            img.besar {
                width: 83px;
                height: 83px;
            }

            div.knan {
                margin-left: -16px;
            }


        }

        /* untuk tampilan mobile */
        @media (min-width: 350px) and (max-width: 860px) {
            h5.widt {
                margin-top: -75px;
            }

            div.rigt {
                margin-left: -209px;
                margin-top: 40px;
            }

            button.knn {
                margin-right: 0px;
            }

            h5.widt {
                margin-top: -75px;
            }

            div.wid {
                margin-left: -3000px;
            }

            input.bsar {
                max-width: 900px;
                margin-left: -60px;
            }

            img.besar {
                width: 83px;
                height: 83px;
            }

            div.knan {
                margin-left: -16px;
            }

            h5.knn {
                margin-left: 130px;
                margin-top: -48px;
            }

        }

        @media(min-width:860px) {
            img.besar {
                width: 83px;
                height: 83px;
            }
        }

        /* untuk tampilan ipad */
        @media (min-width: 760px) and (max-width: 1000px) {
            li.knan {
                margin-left: 280px;
            }

            input.bsar {
                max-width: 400px;
                margin-left: 40px;
                margin-top: -10px;
            }

            button.bsar {
                margin-top: -10px;
            }

            h5.widt {
                margin-top: -5px;
            }

            div.kiri {
                margin-left: 100px;
            }


        }



        @media (min-width: 1024px) {
            div.rigt {
                margin-left: 470px;
                margin-top: -30px;
            }

            button.knn {
                margin-left: 140px;
            }

            img.besar {
                width: 150px;
                height: 150px;
            }

        }


        /* untuk tampilan laptop */
        @media (min-width: 1210px) and (max-width: 4000px) {

            div.pl {
                margin-left: 600px;
                margin-top: -30px;
            }

            div.right {
                margin-left: 50px;
            }

            button.knn {
                right: -2px;
            }

            input.wid {
                width: 500px;
            }

            input.bsar {
                max-width: 900px;
            }

            img.besar {
                width: 160px;
                height: 160px;
            }
        }

        @media(min-width:740px) and (max-width:770px) {
            .judul {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }
        }

        @media(min-width:750px) {
            .judul {
                display: flex;
                justify-content: space-between;
            }
        }

        @media(min-width:0px) and (max-width:393px) {
            .kategori {
                margin-left: 7px;
            }

            div.rigt {
                margin-left: 0px;
                margin-top: 0px;
            }

            .CardComponen {
                flex-wrap: nowrap;
            }
        }

        @media(min-width:424px) and (max-width:990px) {
            .CardComponen {
                flex-wrap: wrap;
            }
        }

        @media(min-width:990px) {
            .CardComponen {
                flex-wrap: nowrap;
            }
        }

        @media(min-width:393px) and (max-width:749px) {
            div.rigt {
                margin-left: 0px;
                margin-top: 40px;
            }
        }

        .container-section {
            margin-left: 6.5%;
            margin-right: 0.4%
        }

        .container-komentar {
            margin-left: 6.2%;
            margin-right: 0.4%
        }

        ::-webkit-scrollbar-track {
            border-radius: 10px;
            display: none;
            background-color: #ffffff;
        }

        .row {
            --bs-gutter-x: 0;
            --bs-gutter-y: 0;
            display: flex;
            flex-wrap: wrap;
            margin-top: calc(var(--bs-gutter-y) * -1);
            margin-right: calc(var(--bs-gutter-x) * -.0);
            margin-left: calc(var(--bs-gutter-x) * -.0);
        }

        ::-webkit-scrollbar {
            height: 5px;
            display: none;
            background-color: transparent;
            /* background-color: #ffffff; */
        }

        ::-webkit-scrollbar-thumb {
            border-radius: 10px;
            display: none;
            background-color: transparent;
        }
    </style>
    <section class="mx-4">
        <div class="row mt-4  align-item-center">
            <div class="col-md-3 col-lg-2 mt-3" style="max-width: 197px">
                @if ($userLog == 2)
                    @if ($show_resep->User->id != Auth::user()->id)
                        @if (Auth::user()->role === 'admin')
                            <button type="submit" style="position: absolute;  background-color:#F7941E; "
                                class="btn btn-orange btn-sm text-light mt-2 me-2 rounded-circle p-2 knn" data-toggle="modal"
                                data-target="#blockedModal">
                                <i class="fa-solid fa-ban fa-lg"></i>
                            </button>
                            <div class="modal" id="blockedModal">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="width: 100%;">
                                        <div class="modal-header">
                                            <h5 class="modal-title fw-bolder">Kirim alasan</h5>
                                            <button type="button" class="btn-close" data-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body" style="text-align: right;">
                                            <form action="{{ route('block.resep', $show_resep->id) }}" method="post">
                                                @csrf
                                                @method('PUT')
                                                <input type="hidden" name="block_resep" value="yes">
                                                <div class="row mb-3">
                                                    <div class="col-lg-4 col-md-12 align-items-ceneter text-center">
                                                        <img class="img-fluid" src="{{ asset('images/alasan.png') }}"
                                                            width="100%" alt="">
                                                    </div>
                                                    <div class="col-lg-8 col-md-12 align-items-center">
                                                        <textarea name="alasan" id="alasan" class="form-control" style="border-radius: 15px;" placeholder="Alasan..."
                                                            cols="5" rows="5"></textarea>
                                                    </div>
                                                </div>
                                                <button type="submit"
                                                    style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                    class="btn  btn-sm text-light">
                                                    <b class="me-3 ms-3">Kirim</b></button>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @else
                            <button type="submit" style="position: absolute;  background-color:#F7941E; "
                                class="btn btn-orange btn-sm text-light mt-2 me-2 rounded-circle p-2 knn"
                                data-toggle="modal" data-target="#reportModal">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="2"
                                        d="M5 5a5 5 0 0 1 7 0a5 5 0 0 0 7 0v9a5 5 0 0 1-7 0a5 5 0 0 0-7 0V5zm0 16v-7" />
                                </svg>
                            </button>
                        @endif
                    @else
                        <button type="submit" style="position: absolute;  background-color:#F7941E; "
                            class="btn btn-orange btn-sm text-light mt-2 me-2 rounded-circle p-2 knn" data-toggle="modal"
                            data-target="#incomeModal{{ $show_resep->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M512 80c0 18-14.3 34.6-38.4 48c-29.1 16.1-72.5 27.5-122.3 30.9c-3.7-1.8-7.4-3.5-11.3-5c-39.4-16.5-91.8-25.9-148-25.9c-8.3 0-16.4.2-24.5.6l-1.1-.6C142.3 114.6 128 98 128 80c0-44.2 86-80 192-80s192 35.8 192 80zm-351.3 81.1c10.2-.7 20.7-1.1 31.3-1.1c62.2 0 117.4 12.3 152.5 31.4c24.8 13.5 39.5 30.3 39.5 48.6c0 4-.7 7.9-2.1 11.7c-4.6 13.2-17 25.3-35 35.5c-.1.1-.3.1-.4.2c-.3.2-.6.3-.9.5c-35 19.4-90.8 32-153.6 32c-59.6 0-112.9-11.3-148.2-29.1c-1.9-.9-3.7-1.9-5.5-2.9C14.3 274.6 0 258 0 240c0-34.8 53.4-64.5 128-75.4c10.5-1.5 21.4-2.7 32.7-3.5zM416 240c0-21.9-10.6-39.9-24.1-53.4c28.3-4.4 54.2-11.4 76.2-20.5c16.3-6.8 31.5-15.2 43.9-25.5V176c0 19.3-16.5 37.1-43.8 50.9c-14.6 7.4-32.4 13.7-52.4 18.5c.1-1.8.2-3.5.2-5.3zm-32 96c0 18-14.3 34.6-38.4 48c-1.8 1-3.6 1.9-5.5 2.9C304.9 404.7 251.6 416 192 416c-62.8 0-118.6-12.6-153.6-32C14.3 370.6 0 354 0 336v-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 342.6 135.8 352 192 352s108.6-9.4 148.1-25.9c7.8-3.2 15.3-6.9 22.4-10.9c6.1-3.4 11.8-7.2 17.2-11.2c1.5-1.1 2.9-2.3 4.3-3.4V336zm32 0v-57.9c19-4.2 36.5-9.5 52.1-16c16.3-6.8 31.5-15.2 43.9-25.5V272c0 10.5-5 21-14.9 30.9c-16.3 16.3-45 29.7-81.3 38.4c.1-1.7.2-3.5.2-5.3zM192 448c56.2 0 108.6-9.4 148.1-25.9c16.3-6.8 31.5-15.2 43.9-25.5V432c0 44.2-86 80-192 80S0 476.2 0 432v-35.4c12.5 10.3 27.6 18.7 43.9 25.5C83.4 438.6 135.8 448 192 448z" />
                            </svg>
                        </button>
                        <div class="modal fade" id="incomeModal{{ $show_resep->id }}" tabindex="-1" role="dialog"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content" style="border-radius: 15px;">
                                    <div class="modal-header">
                                        <h5 class="modal-title fw-bolder" id="exampleModalLongTitle"
                                            style=" font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                            Pendapatan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center ms-3">
                                            <img src="{{ asset('images/income.png') }}" width="180px" height="180px"
                                                style="border-radius: 50%" alt="">
                                            <div class="container row">
                                                <h3 class="ms-2">Rp.
                                                    {{ number_format($show_resep->incomes(), 2, ',', '.') }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="container">
                                        <div class="row">
                                            <div class="d-flex justify-content-end">
                                                <a href="/koki/income-koki" class="btn btn-light mb-3 me-1 text-light"
                                                    style="border-radius: 15px; background-color:#F7941E;"><b
                                                        class="ms-2 me-2">Detail</b></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endif
                <img src="{{ asset('storage/' . $show_resep->foto_resep) }}" alt="{{ $show_resep->foto_resep }}"
                    width="197px" height="187px" style="border-radius: 50%; border:none;" class="p-2">
            </div>
            <div class="col-lg-9 col-md-8 col-6">
                <div class="col-12 mt-2 ml-md-3 ml-xl-3 ml-lg-5 p-2">
                    <h3 class="fw-bolder" style="font-weight: 600; word-warp: break-word;">{{ $show_resep->nama_resep }}
                    </h3>
                    <div class="judul">
                        <span class="text-nowrap"><strong>Oleh :</strong> <span class="ellipsis-name">{{ $show_resep->User->name }}</span>
                        @if ($show_resep->User->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check mt-1 ms-2"></i>
                        @endif
                        </span>
                        <div class="pl mt-3 mt-md-0">
                            <div class="d-flex">
                                @if ($userLog === 2)
                                    @if ($show_resep->User->id === Auth::user()->id)
                                        <div class="d-flex right rigt ml-sm-3 ml-md-4">
                                            <form action="/koki/resep/{{ $show_resep->id }}/edit" method="get">
                                                <button type="submit" class="btn btn-edit ">Edit</button>
                                            </form>
                                            <form action="/koki/resep/{{ $show_resep->id }}" method="post"
                                                id="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="DeleteData()"
                                                    class="btn btn-hapus">Hapus</button>
                                            </form>
                                        </div>
                                    @else
                                        <div class="card cardComponen "
                                            style="display: flex; box-shadow: none; border:none; flex-direction: row; ">
                                            <form action="{{ route('Resep.like', $show_resep->id) }}" method="POST"
                                                class="like-form">
                                                @csrf
                                                @if (
                                                    $userLogin &&
                                                        !$show_resep->likes()->where('user_id', auth()->user()->id)->exists())
                                                    <button type="submit"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3 like-button"
                                                        style="border-color: #F7941E;">
                                                        <svg style="color: #F7941E" xmlns="http://www.w3.org/2000/svg"
                                                            width="21" height="21" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M234 80.12A24 24 0 0 0 216 72h-56V56a40 40 0 0 0-40-40a8 8 0 0 0-7.16 4.42L75.06 96H32a16 16 0 0 0-16 16v88a16 16 0 0 0 16 16h172a24 24 0 0 0 23.82-21l12-96A24 24 0 0 0 234 80.12ZM32 112h40v88H32Zm191.94-15l-12 96a8 8 0 0 1-7.94 7H88v-94.11l36.71-73.43A24 24 0 0 1 144 56v24a8 8 0 0 0 8 8h64a8 8 0 0 1 7.94 9Z" />
                                                        </svg>
                                                    </button><br>
                                                    <div class="d-flex justify-content-center">
                                                        <small class="me-3 like-count"
                                                            id="like-count-{{ $show_resep->id }}">{{ $show_resep->likes }}</small>
                                                    </div>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3 like-button"
                                                        style="background-color: #F7941E;">
                                                        <svg style="color: #ffffff" xmlns="http://www.w3.org/2000/svg"
                                                            width="21" height="21" viewBox="0 0 256 256">
                                                            <path fill="currentColor"
                                                                d="M234 80.12A24 24 0 0 0 216 72h-56V56a40 40 0 0 0-40-40a8 8 0 0 0-7.16 4.42L75.06 96H32a16 16 0 0 0-16 16v88a16 16 0 0 0 16 16h172a24 24 0 0 0 23.82-21l12-96A24 24 0 0 0 234 80.12ZM32 112h40v88H32Zm191.94-15l-12 96a8 8 0 0 1-7.94 7H88v-94.11l36.71-73.43A24 24 0 0 1 144 56v24a8 8 0 0 0 8 8h64a8 8 0 0 1 7.94 9Z" />
                                                        </svg>
                                                    </button><br>
                                                    <div class="d-flex justify-content-center">
                                                        <small class="me-3 like-count"
                                                            id="like-count-{{ $show_resep->id }}">{{ $show_resep->likes }}</small>
                                                    </div>
                                                @endif
                                            </form>
                                            {{-- favorite --}}
                                            <form action="{{ route('favorite.store', $show_resep->id) }}"
                                                method="POST"class="favorite-form">
                                                @csrf
                                                @if (
                                                    $userLogin &&
                                                        !$show_resep->favorite()->where('user_id_from', auth()->user()->id)->exists())
                                                    <button type="submit"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3 favorite-button"
                                                        style="border-color: #F7941E;">
                                                        <svg style="color: #F7941E;" xmlns="http://www.w3.org/2000/svg"
                                                            width="22" height="21" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M5 21V5q0-.825.588-1.413T7 3h10q.825 0 1.413.588T19 5v16l-7-3l-7 3Zm2-3.05l5-2.15l5 2.15V5H7v12.95ZM7 5h10H7Z" />
                                                        </svg>
                                                    </button><br>
                                                    <div class="d-flex justify-content-center">
                                                        <small class="me-3 fav-count"
                                                            id="fav-count-{{ $show_resep->id }}">{{ $show_resep->favorite_count }}</small>
                                                    </div>
                                                @else
                                                    <button type="submit"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3 favorite-button"
                                                        style="background-color: #F7941E;">
                                                        <svg style="color: #ffffff" xmlns="http://www.w3.org/2000/svg"
                                                            width="22" height="21" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M5 21V5q0-.825.588-1.413T7 3h10q.825 0 1.413.588T19 5v16l-7-3l-7 3Zm2-3.05l5-2.15l5 2.15V5H7v12.95ZM7 5h10H7Z" />
                                                        </svg>
                                                    </button><br>
                                                    <div class="d-flex justify-content-center">
                                                        <small class="me-3 fav-count"
                                                            id="fav-count-{{ $show_resep->id }}">{{ $show_resep->favorite_count }}</small>
                                                    </div>
                                                @endif
                                            </form>
                                            <form action="#">
                                                @if ($gift_check > 0)
                                                    <button type="button" id="gift_icon_btn{{ $show_resep->id }}"
                                                        data-toggle="modal" data-target="#gift"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3"
                                                        style="background-color: #F7941E;"><svg
                                                            id="gift_icon{{ $show_resep->id }}" style="color:#ffffff;"
                                                            xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="21" viewBox="0 0 24 24">
                                                            <g fill="none" stroke="currentColor"
                                                                stroke-linejoin="round" stroke-width="2">
                                                                <path stroke-linecap="round"
                                                                    d="M4 11v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                                                                <path
                                                                    d="M6 4.5A2.5 2.5 0 0 1 8.5 2A3.5 3.5 0 0 1 12 5.5V7H8.5A2.5 2.5 0 0 1 6 4.5Zm12 0A2.5 2.5 0 0 0 15.5 2A3.5 3.5 0 0 0 12 5.5V7h3.5A2.5 2.5 0 0 0 18 4.5Z" />
                                                                <path stroke-linecap="round" d="M3 7h18v4H3V7Zm9 4v10" />
                                                            </g>
                                                        </svg>
                                                    </button><br>
                                                @else
                                                    <button type="button" id="gift_icon_btn{{ $show_resep->id }}"
                                                        data-toggle="modal" data-target="#gift"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3"
                                                        style="border-color: #F7941E;"><svg
                                                            id="gift_icon{{ $show_resep->id }}" style="color:#F7941E;"
                                                            xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="21" viewBox="0 0 24 24">
                                                            <g fill="none" stroke="currentColor"
                                                                stroke-linejoin="round" stroke-width="2">
                                                                <path stroke-linecap="round"
                                                                    d="M4 11v8a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-8" />
                                                                <path
                                                                    d="M6 4.5A2.5 2.5 0 0 1 8.5 2A3.5 3.5 0 0 1 12 5.5V7H8.5A2.5 2.5 0 0 1 6 4.5Zm12 0A2.5 2.5 0 0 0 15.5 2A3.5 3.5 0 0 0 12 5.5V7h3.5A2.5 2.5 0 0 0 18 4.5Z" />
                                                                <path stroke-linecap="round" d="M3 7h18v4H3V7Zm9 4v10" />
                                                            </g>
                                                        </svg>
                                                    </button><br>
                                                @endif
                                                <div class="d-flex justify-content-center">
                                                    <small id="gift-count{{ $show_resep->id }}"
                                                        class="me-3">{{ $gift_count }}</small>
                                                </div>
                                            </form>
                                            <form action="#">
                                                @if ($share_check > 0)
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#shareModal{{ $show_resep->id }}"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3"
                                                        id="share_button_icon" style="background-color: #F7941E;"><svg
                                                            id="share_icon" style="color: #ffffff;"
                                                            xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="21" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M20.56 3.34a1 1 0 0 0-1-.08l-17 8a1 1 0 0 0-.57.92a1 1 0 0 0 .6.9L8 15.45v6.72L13.84 18l4.76 2.08a.93.93 0 0 0 .4.09a1 1 0 0 0 .52-.15a1 1 0 0 0 .48-.79l1-15a1 1 0 0 0-.44-.89ZM18.1 17.68l-5.27-2.31L16 9.17l-7.65 4.25l-2.93-1.29l13.47-6.34Z" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <button type="button" data-toggle="modal"
                                                        data-target="#shareModal{{ $show_resep->id }}"
                                                        class="btn btn-light btn-sm text-light rounded-circle p-2 mr-3"
                                                        id="share_button_icon" style="border-color: #F7941E;"><svg
                                                            id="share_icon" style="color: #F7941E;"
                                                            xmlns="http://www.w3.org/2000/svg" width="22"
                                                            height="21" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="M20.56 3.34a1 1 0 0 0-1-.08l-17 8a1 1 0 0 0-.57.92a1 1 0 0 0 .6.9L8 15.45v6.72L13.84 18l4.76 2.08a.93.93 0 0 0 .4.09a1 1 0 0 0 .52-.15a1 1 0 0 0 .48-.79l1-15a1 1 0 0 0-.44-.89ZM18.1 17.68l-5.27-2.31L16 9.17l-7.65 4.25l-2.93-1.29l13.47-6.34Z" />
                                                        </svg>
                                                    </button>
                                                @endif
                                                <br>
                                                <div class="d-flex justify-content-center">
                                                    <small id="shared_count{{ $show_resep->id }}"
                                                        class="me-3"">{{ $show_resep->share_count() }}</small>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- share modal --}}
                                        <style>
                                            /* Gaya khusus untuk checkbox */
                                            .select-checkbox {
                                                display: none;
                                                /* Sembunyikan checkbox asli */
                                            }

                                            /* Gaya label checkbox */
                                            .select-checkbox+label {
                                                display: inline-block;
                                                width: 25px;
                                                /* Sesuaikan lebar sesuai keinginan Anda */
                                                height: 25px;
                                                /* Sesuaikan tinggi sesuai keinginan Anda */
                                                border: 1px solid #000;
                                                /* Atur garis tepi */
                                                border-radius: 50%;
                                                /* Membuat checkbox bundar */
                                                cursor: pointer;
                                                /* Ganti kursor saat diarahkan ke checkbox */
                                                vertical-align: middle;
                                                /* Atur pemosisian vertikal */
                                            }

                                            /* Gaya label checkbox yang dicentang */
                                            .select-checkbox:checked+label {
                                                background-color: #F7941E;
                                                /* Warna latar belakang saat dicentang */
                                                border: none;
                                            }
                                        </style>
                                        <style>
                                            .search {
                                                background-color: #fff;
                                                padding: 4px;
                                                border-radius: 5px;
                                                width: 200%;
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
                                                font-size: 10px;
                                                color: #eee
                                            }

                                            ::placeholder {
                                                color: grey;
                                                opacity: 1
                                            }

                                            .search-2 {
                                                position: relative;
                                                width: 40%;
                                                margin-left: -5%
                                            }

                                            .search-2 input {
                                                height: 45px;
                                                border: 0.50px black solid;
                                                width: 280%;
                                                border-radius: 15px;
                                                color: #000;
                                                padding-left: 18px;
                                                padding-right: 100px;
                                                text-align: center
                                            }

                                            .search-2 input:focus {
                                                box-shadow: none;
                                            }


                                            .search-2 i {
                                                position: absolute;
                                                top: 12px;
                                                left: -10px;
                                                font-size: 14px;
                                                color: #eee
                                            }

                                            .search-2 button {
                                                position: absolute;
                                                right: 0px;
                                                top: 0px;
                                                border: none;
                                                height: 45px;
                                                background-color: #F7941E;
                                                color: #fff;
                                                width: 60px;
                                            }


                                            @media (max-width: 767px) {
                                                .search-1 input {

                                                    border-bottom: 1px solid #0000
                                                }

                                                .search-2 i {
                                                    left: 4px
                                                }

                                                .search-2 input {
                                                    padding-left: 34px
                                                }

                                                .search-2 button {
                                                    height: 30px;
                                                    top: 4px
                                                }

                                                .d-flex {
                                                    flex-wrap: nowrap;
                                                }

                                                .col-1 {
                                                    white-space: nowrap;
                                                }

                                            }
                                        </style>
                                        {{-- modal bagikan --}}
                                        <div class="modal" id="shareModal{{ $show_resep->id }}">
                                            <form id="share_form{{ $show_resep->id }}"
                                                action="{{ route('share.recipe', ['recipe_id' => $show_resep->id]) }}"
                                                method="POST">
                                                @csrf
                                                <div class="modal-dialog modal-dialog-scrollable modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                Bagikan Kepada</h5>
                                                            <button type="button" class="close mr-2"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body mb-4">
                                                            <div class="d-flex align-items-center">
                                                                <div class="col-2 mt-2 me-1"
                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                    Kepada
                                                                </div>

                                                                <div class="search" style="border-radius: 15px;">
                                                                    <div class="col-lg-11 mt-2">
                                                                        <div class="search-2"> <i class='bx bxs-map'></i>

                                                                            <input id="search" type="text"
                                                                                name="" style="text-align: left;"
                                                                                placeholder="Cari...">

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <h3 class="mt-4 ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                                Disarankan</h3>
                                                            @foreach ($allUser as $user)
                                                                <div class="element-pencarian">
                                                                    <div class="d-flex mt-4">
                                                                        <div
                                                                            class="col-xl-1 col-lg-1 col-md-2 col-sm-2 col-2">
                                                                            <a class="foto" href="">
                                                                                @if ($user->foto)
                                                                                    <img src="{{ asset('storage/' . $user->foto) }}"
                                                                                        class="border rounded-circle me-2"
                                                                                        alt="Avatar"
                                                                                        style="height: 55px" />
                                                                                @else
                                                                                    <img src="{{ asset('images/default.jpg') }}"
                                                                                        class="border rounded-circle me-2"
                                                                                        alt="Avatar"
                                                                                        style="height: 55px" />
                                                                                @endif
                                                                            </a>
                                                                        </div>
                                                                        <div
                                                                            class="col-xl-10 col-lg-10 col-md-9 col-sm-9 col-9">
                                                                            <div class="nama rounded-3 px-3 py-1">
                                                                                <a href="" class="text-dark mb-0">
                                                                                    <strong
                                                                                        class="input-name">{{ $user->name }}</strong>
                                                                                </a>
                                                                                <a href=""
                                                                                    class="text-muted d-block">
                                                                                    <small>{{ $user->email }}</small>
                                                                                </a>
                                                                            </div>

                                                                        </div>
                                                                        <div
                                                                            class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 mt-3">
                                                                            <input type="checkbox" class="select-checkbox"
                                                                                name="user_id[]"
                                                                                id="checkbox-{{ $show_resep->id }}-{{ $user->id }}"
                                                                                value="{{ $user->id }}">
                                                                            <label
                                                                                for="checkbox-{{ $show_resep->id }}-{{ $user->id }}"></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach

                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <button onclick="shareButton({{ $show_resep->id }})"
                                                                id="shr-btn{{ $show_resep->id }}"
                                                                class="btn btn-light fw-bolder text-light col-lg-11"
                                                                type="submit"
                                                                style="border-radius: 10px; background-color:#F7941E;">
                                                                <p class="mt-1 mb-1">Bagikan</p>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        {{-- end share modal --}}
                                        {{-- gift modal --}}
                                        <div class="modal" id="gift">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <form
                                                        action="{{ route('donation.store', ['user_recipient' => $show_resep->user_id, 'resep_id' => $show_resep->id, 'feed_id' => '0']) }}"
                                                        id="gift-form{{ $show_resep->id }}" method="POST">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title ml-3"
                                                                style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                Beri Donasi</h5>
                                                            <button type="button" class="close mr-2"
                                                                data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="d-flex ">
                                                                <label for="inputKecil" class="col-lg-3 my-1">
                                                                    <div class="card border-2 scale" id="smallGift"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/kecil.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <input hidden type="radio" value="5000"
                                                                                name="giftInput" id="inputKecil">
                                                                            <div class="text-center">
                                                                                <a href="#"
                                                                                    class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Kecil</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 5.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </label>

                                                                <label for="mediumInput" class="col-lg-3 my-1">
                                                                    <div class="card border-2 scale" id="mediumGift"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/sedang.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <input hidden type="radio" value="10000"
                                                                                name="giftInput" id="mediumInput">
                                                                            <div class="text-center">
                                                                                <a href="#"
                                                                                    class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Sedang</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 10.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </label>

                                                                <label for="extraInput" class="col-lg-3 my-1">
                                                                    <div class="card border-2 scale" id="extraGift"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/besar.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">
                                                                            <input hidden type="radio" value="20000"
                                                                                name="giftInput" id="extraInput">
                                                                            <div class="text-center">
                                                                                <a href="#"
                                                                                    class="card-title text-center"
                                                                                    style="color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">
                                                                                    Besar</a>
                                                                            </div>
                                                                            <p class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Rp. 20.000,00</p>
                                                                        </div>
                                                                    </div>
                                                                </label>

                                                                <label for="moreInput" class="col-lg-3 my-1">
                                                                    <button type="button" id="moreGift"
                                                                        class="card border-2 scale"
                                                                        data-card-selected="false"
                                                                        style="width: 150px; height: 225px; border-radius: 15px; border: 0.50px black solid; overflow: hidden;">
                                                                        <img src="{{ asset('img/lainnya.png') }}"
                                                                            class="card-img-top" alt="">
                                                                        <div class=card-body">

                                                                            <div class="mx-4 mt-2">
                                                                                <a href="#" class="card-title "
                                                                                    style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 600; letter-spacing: 0.64px; word-wrap: break-word">Lainnya</a>
                                                                            </div>
                                                                            <p id="displayNumber" class="text-center"
                                                                                style="color: black; font-size: 15px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                                                                Masukkan Nilai</p>
                                                                        </div>
                                                                    </button>
                                                                </label>

                                                            </div>
                                                            <div class="d-flex mt-4 ml-3">
                                                                <input type="number" id="moreInput" name="moreInput"
                                                                    width="500px"
                                                                    class="form-control border-2 rounded-3 me-3 moreInput{{ $show_resep->id }}"
                                                                    style="margin-top: 12px; border:solid black; display:none; border-radius:100px;"
                                                                    placeholder="Masukkan jumlah donasi lainya...">
                                                                <input type="text" id="message" name="message"
                                                                    width="500px"
                                                                    class="form-control border-2 rounded-3 me-3 message{{ $show_resep->id }}"
                                                                    style="margin-top: 12px; border:solid black; border-radius:100px;"
                                                                    placeholder="Tambahkan pesan untuk pembuat...">

                                                                <button type="submit"
                                                                    onclick="giftButton({{ $show_resep->id }})"
                                                                    id="gift-btn{{ $show_resep->id }}"
                                                                    style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                    class="btn  btn-sm text-light">
                                                                    <b class="me-3 ms-3">Kirim</b></button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end gift modal --}}
                                        {{-- end favorite --}}
                                        {{-- modal --}}
                                        <div class="modal fade" id="reportModal" tabindex="-1" role="dialog"
                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="reportModal"
                                                            style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                            Laporkan resep</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form id="FormReportResep"
                                                        action="{{ route('report.resep', $show_resep->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body d-flex align-items-center">
                                                            <!-- Tambahkan kelas "align-items-center" -->
                                                            @if ($show_resep->foto_resep)
                                                                <img class="me-2"
                                                                    src="{{ asset('storage/' . $show_resep->foto_resep) }}"
                                                                    width="106px" height="104px"
                                                                    style="border-radius: 50%" alt="">
                                                            @else
                                                                <img class="me-2"
                                                                    src="{{ asset('images/default.jpg') }}"
                                                                    width="106px" height="104px"
                                                                    style="border-radius: 50%" alt="">
                                                            @endif
                                                            <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                                placeholder="Alasan..." id="AlasanReportResep"></textarea>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-light text-light"
                                                                onclick="ButtonReportResep()"
                                                                style="border-radius: 15px; background-color:#F7941E;"><b
                                                                    class="ms-2 me-2">Laporkan</b></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end Modal --}}
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="kategori mt-2 ml-0 ml-md-1">
                @if ($show_resep->kategori_resep)
                    @foreach ($show_resep->kategori_resep()->get() as $nk)
                        <button type="button" class="btn-edit p-2 mx-1 mt-2">#{{ $nk->nama_makanan }}</button>
                    @endforeach
                @endif
                @if ($show_resep->hari_resep)
                    @foreach ($show_resep->hari_resep()->get() as $hr)
                        <button type="button" class="btn-edit mx-1 mt-2 p-2">#{{ $hr->nama }}</button>
                    @endforeach
                @endif
            </div>

        </div>
        <div class="row mx-auto mb-5 mt-2" style="">
            <div class="col-lg-4 col-sm-12">
                <h4 style="font-weight: 600; word-warp: break-word;">Durasi</h4>
                <div class="card p-4 mb-2" style="border-radius: 15px; border: 0.50px black solid;box-shadow:none;">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <span class=""
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                @if ($show_resep->lama_memasak > 60)
                                    {{ number_format($show_resep->lama_memasak / 60, 1) }} jam
                                @elseif($show_resep->lama_memasak <= 60)
                                    {{ $show_resep->lama_memasak }} menit
                                @endif
                            </span> <br>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                    d="M15 1H9v2h6V1zm-4 13h2V8h-2v6zm8.03-6.61l1.42-1.42c-.43-.51-.9-.99-1.41-1.41l-1.42 1.42A8.962 8.962 0 0 0 12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9a8.994 8.994 0 0 0 7.03-14.61zM12 20c-3.87 0-7-3.13-7-7s3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <h4 style="font-weight: 600; word-warp:break-word;">Pengeluaran</h4>
                <div class="card p-4 mb-2" style="border-radius: 15px; border: 0.50px black solid;box-shadow: none;">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <span class="text-nowrap"
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                RP {{ number_format($show_resep->pengeluaran_memasak, 2, ',', '.') }}
                            </span> <br>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 256 256">
                                <path fill="currentColor"
                                    d="M128 88a40 40 0 1 0 40 40a40 40 0 0 0-40-40Zm0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24Zm112-96H16a8 8 0 0 0-8 8v128a8 8 0 0 0 8 8h224a8 8 0 0 0 8-8V64a8 8 0 0 0-8-8Zm-46.35 128H62.35A56.78 56.78 0 0 0 24 145.65v-35.3A56.78 56.78 0 0 0 62.35 72h131.3A56.78 56.78 0 0 0 232 110.35v35.3A56.78 56.78 0 0 0 193.65 184ZM232 93.37A40.81 40.81 0 0 1 210.63 72H232ZM45.37 72A40.81 40.81 0 0 1 24 93.37V72ZM24 162.63A40.81 40.81 0 0 1 45.37 184H24ZM210.63 184A40.81 40.81 0 0 1 232 162.63V184Z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <h4 style="font-weight: 600; word-warp: break-word;">Porsi</h4>
                <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid; box-shadow: none;">
                    <div class="d-flex justify-content-between">
                        <div class="">
                            <span class="]"
                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                {{ $show_resep->porsi_orang }} Orang
                            </span> <br>
                        </div>
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 32 32">
                                <g fill="currentColor">
                                    <path
                                        d="M6.82 20.575v3.834A12.475 12.475 0 0 0 16.5 29c4.324 0 8.136-2.196 10.38-5.533v-5.374C26.112 23.136 21.757 27 16.5 27c-4.354 0-8.089-2.65-9.68-6.425Zm18.21-10.199V8.654a3.32 3.32 0 0 1 .184-1.116A12.459 12.459 0 0 0 16.5 4a12.45 12.45 0 0 0-7.976 2.875l.005.061l.001.027v2.7A10.476 10.476 0 0 1 16.5 6c3.514 0 6.624 1.726 8.53 4.376Z" />
                                    <path
                                        d="M24.5 16.5a8 8 0 1 1-16 0a8 8 0 0 1 16 0Zm-8 7a7 7 0 1 0 0-14a7 7 0 0 0 0 14ZM29.99 7.94c0-.9-.73-1.63-1.63-1.63c-1.3 0-2.34 1.05-2.33 2.34v5.55c0 1.253.726 2.375 1.85 2.883V25.7c0 .52.42.94.94.94h.23c.52 0 .94-.42.94-.94V7.94ZM6.82 6.31a.68.68 0 0 0-.68.68v2.69c0 .2-.16.35-.35.35c-.2 0-.35-.16-.35-.35V7.02c0-.37-.29-.7-.66-.71c-.39-.01-.71.3-.71.68v2.69c0 .2-.16.35-.35.35c-.2 0-.35-.16-.35-.35V7.02c0-.37-.29-.7-.66-.71c-.39-.01-.71.3-.71.68v4.58c0 .902.437 1.707 1.109 2.209c.601.339.601 1.891.601 1.891v10.02c0 .52.42.94.94.94h.23c.52 0 .94-.42.94-.94V15.67s0-1.491.601-1.891A2.757 2.757 0 0 0 7.53 11.57V6.99a.72.72 0 0 0-.71-.68Z" />
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media(max-width:578px) {
                .nav-item a h5 {
                    font-size: 16px;
                    text-align: center;
                }

            }
        </style>
        <div class="my-5">
            <ul class="nav nassv" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 style="font-weight: 600; word-warp: break-word;">Deskripsi</h5>
                        <div id="border1" style="width: 100%; height: 100%; border: 1px #F7941E solid;"></div>
                    </a>
                </li>
                <li class="nav-item itemnav" role="presentation">
                    <a id="c" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 style="font-weight: 600; word-warp: break-word;">Bahan</h5>
                        <div id="b" style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="click4" class="nav-link" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-footer" type="button" role="tab" aria-controls="pills-footer"
                        aria-selected="false">
                        <h5 class="" style="font-weight: 600; word-wrap:break-word;">Alat</h5>
                        <div id="border4" style="width: 90%; height:100%;border:1px #F7941E solid; display:none;"
                            class="mx-auto"></div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="click3" class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 style="font-weight: 600; word-warp:break-word;">Tutorial</h5>
                        <div id="border3" style="width: 90%; height: 100%; border: 1px #F7941E solid; display: none;"
                            class=""></div>
                    </a>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    {{ $show_resep->deskripsi_resep }}
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <div class="row mt-5">
                        @foreach ($show_resep->bahan as $item_bahan)
                            <div class="col-lg-4">
                                <div class="card p-3"
                                    style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid;box-shadow: none">
                                    <div class="row my-1">
                                        <div class="col-12 ">
                                            <span class="ms-3"
                                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                                {{ $item_bahan->nama_bahan }}
                                            </span> <br>
                                            <p class="ms-3">{{ $item_bahan->takaran_bahan }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    @foreach ($show_resep->langkah as $num => $item_langkah)
                        <div class="">
                            <div class="col-12 card-body d-flex flex-row">
                                <div class=" d-flex flex-column knan" style="position: relative;">
                                    <img src="{{ asset('storage/' . $item_langkah->foto_langkah) }}" class="mt-3 besar"
                                        alt="{{ $item_langkah->foto_langkah }}"
                                        style="max-width:100%; min-width:100%; min-height: 150px; max-height:150px;  border-radius:15px; object-fit: cover;border-radius: 10px; border: 1px solid black;">
                                    <button type="button"
                                        style="background-color:#F7941E; width: 45px; height: 45px; position: absolute; top: 0; left: -30px;"
                                        class="btn btn-light btn-sm text-light rounded-circle p-2 ml-2">
                                        <span class="p-2 fw-bolder">{{ $num += 1 }}</span>
                                    </button>
                                </div>
                                <div class="my-auto mx-4">
                                    <p style="font-weight: 900;font-size:18px;">{{ $item_langkah->judul_langkah }}</p>
                                    {{ $item_langkah->deskripsi_langkah }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-footer" role="tabpanel" aria-labelledby="pills-footer-tab"
                    tabindex="0">
                    <div class="row mt-5">
                        @foreach ($show_resep->alat as $num => $item_langkah)
                            <div class="col-lg-4 mb-3">
                                <div class="card p-3"
                                    style="width: 100%; height: 100%; border-radius: 15px; border: 0.50px black solid;box-shadow: none">
                                    <div class="row my-1">
                                        <div class="col-12 ">
                                            <span class="ms-3" class=""
                                                style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word;">
                                                {{ $item_langkah->nama_alat }}
                                            </span> <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        .post-content {
            max-height: 100px;
            /* Atur tinggi maksimum konten yang ditampilkan */
            overflow: hidden;
            /* Sembunyikan teks yang berlebihan */
        }

        .read-more-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            /* Sembunyikan tombol secara default */
        }

        .post.open .post-content {
            max-height: none;
            /* Tampilkan seluruh teks saat tombol ditekan */
        }

        .post.open .read-more-button {
            /* Sembunyikan tombol saat teks ditampilkan secara penuh */
        }

        .card {

            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
        }

        .reply {

            margin-left: 12px;
        }

        .reply small {

            color: #b7b4b4;

        }


        .reply small:hover {

            color: green;
            cursor: pointer;

        }
    </style>
    <section class="mb-5 mx-4">
        <div class="row mb-3 ">
            <h5 class="text-nowrap col-lg-2 col-md-4 col-sm-12" style=""><b>Komentar
                    ({{ $show_resep->comment_count() }})
                </b></h5>
            <div class="col-lg-10 col-md-8 col-sm-12">
                @if (Auth::check())
                    <form method="POST" id="FormTambahKomentarResep{{ Auth::user()->id }}"
                        action="/komentar-resep/{{ Auth::user()->id }}/{{ $show_resep->user_id }}/{{ $show_resep->id }}">
                        @csrf
                        <div class="input-group ">
                            <input type="text" id="comment_recipe{{ Auth::user()->id }}" name="komentar"
                                maxlength="255" {{ $userLog === 1 ? 'disabled' : '' }} class="form-control rounded-3"
                                placeholder="{{ $userLog === 1 ? 'Tambah Komentar' : 'Tambah Komentar' }}">
                            {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                            <button type="submit" onclick="ButtonTambahKomentarResep({{ Auth::user()->id }})"
                                style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                class="btn btn-sm text-light ms-3 bsar"><b class="me-3 ms-3">Kirim</b></button>
                        </div>
                    </form>
                @else
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="input-group">
                            <input type="text" id="reply" name="komentar" maxlength="255"
                                class="form-control rounded-3"
                                placeholder="{{ $userLog === 1 ? 'Tambah Komentar' : 'Tambah Komentar' }}">
                            {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                            <button type="button" onclick="harusLogin()"
                                style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                class="btn btn-sm text-light ms-3"><b class="me-3 ms-3">Kirim</b></button>
                        </div>
                    </form>
                @endif
            </div>
            <div id="new-comment"></div>
            @foreach ($comment as $row)
                <div id="cardKomentarResep{{ $row->id }}">
                    <div class="card p-3">
                        <div class="d-flex justify-content-between">
                            <div class="user d-flex flex-row">
                                @if ($row->foto)
                                    <img src="{{ asset('storage/' . $row->user_pengirim->foto) }}" width="30"
                                        height="30" class="user-img rounded-circle mr-2">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" width="30" height="30"
                                        class="user-img rounded-circle mr-2">
                                @endif
                                @if (Auth::check() && Auth::user()->role == 'admin')
                                    <span>
                                        <div class="font-weight-semibold ms-1 me-2">
                                            <small class="font-weight-bolder me-2">{{ $row->user_pengirim->name }}</small>
                                            <svg class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                            </svg>
                                            @if ($comment_count > 0)
                                                <div class="text-black" style="font-size: 13px">
                                                    <small>{{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                </div>
                                            @endif
                                        </div>

                                        <small class="font-weight text-break">{{ $row->comment }}</small>
                                    </span>
                                @else
                                    <div class="d-flex">
                                        <span>
                                            <div class="font-weight-semibold ms-1 me-2">
                                                <small
                                                    class="font-weight-bolder me-2">{{ $row->user_pengirim->name }}</small>
                                                @if ($row->count() > 0)
                                                    <div class="text-black" style="font-size: 13px">
                                                        <small>{{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <small>{{ $row->comment }}</small>
                                            </div>

                                        </span>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="action d-flex mt-2 align-items-center">
                            <div class="reply px-7 me-2">
                                <small id="like-count-comment{{ $row->id }}"> {{ $row->likes }}</small>
                            </div>
                            <div class="icons align-items-center input-group">
                                <form action="{{ route('like.comment.recipe', $row->id) }}" method="POST"
                                    id="like-form-comment">
                                    @csrf
                                    @if (
                                        $userLogin &&
                                            $row->like()->where('users_id', auth()->user()->id)->exists())
                                        <button type="submit" class="yuhu me-2 text-orange btn-sm rounded-5"
                                            id="like-button-comment">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="yuhu me-2 text-dark btn-sm rounded-5"
                                            id="like-button-comment">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                        </button>
                                    @endif
                                </form>
                                @if (Auth::check())
                                    @if (Auth::check() &&
                                            $row->user_pengirim->role != 'admin' &&
                                            auth()->user()->id != $row->users_id &&
                                            auth()->user()->role != 'admin' &&
                                            $row->pengirim_id != auth()->user()->id)
                                        <button type="button" data-toggle="modal"
                                            data-target="#Modald{{ $row->id }}"
                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                        </button>
                                        {{-- modal --}}
                                        <div class="modal fade" id="Modald{{ $row->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="reportModal"
                                                            style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                            Laporkan komentar</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="{{ route('Report.comment.recipes', $row->id) }}"
                                                        id="FormReportKomentar{{ $row->id }}" method="POST">
                                                        @csrf
                                                        <div class="modal-body d-flex align-items-center">
                                                            <!-- Tambahkan kelas "align-items-center" -->
                                                            @if ($row->foto)
                                                                <img class="me-2"
                                                                    src="{{ asset('storage/' . $row->foto) }}"
                                                                    width="106px" height="104px"
                                                                    style="border-radius: 50%" alt="">
                                                                <textarea class="form-control" style="border-radius: 15px" name="alasan"
                                                                    id="AlasanReportKomentar{{ $row->id }}" rows="5" placeholder="Alasan"></textarea>
                                                            @else
                                                                <img class="me-2"
                                                                    src="{{ asset('images/default.jpg') }}"
                                                                    width="106px" height="104px"
                                                                    style="border-radius: 50%" alt="">
                                                                <textarea class="form-control rounded-5" style="border-radius: 15px" name="alasan"
                                                                    id="AlasanReportKomentar{{ $row->id }}" rows="5" placeholder="Alasan..."></textarea>
                                                            @endif
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="submit" class="btn btn-light text-light"
                                                                id="ButtonReportKomentar{{ $row->id }}"
                                                                onclick="ReportKomentar({{ $row->id }})"
                                                                style="border-radius: 15px; background-color:#F7941E;"><b
                                                                    class="ms-2 me-2">Laporkan</b></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end Modal --}}
                                    @elseif(Auth::check() && $row->user_pengirim->role != "admin" && auth()->user()->role == 'admin')
                                        <button type="button" data-toggle="modal"
                                            data-target="#blockComment{{ $row->id }}"
                                            class="yuhu text-danger btn-sm rounded-5 "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                    fill="currentColor" fill-rule="nonzero" />
                                            </svg>
                                        </button>
                                        <div class="modal" id="blockComment{{ $row->id }}">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content" style="width: 100%;">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title fw-bolder">Kirim alasan</h5>
                                                        <button type="button" class="btn-close" data-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body" style="text-align: right;">
                                                        <form action="{{ route('block.comment.recipe', $row->id) }}" id="FormBlockCommentRecipe{{$row->id}}"
                                                            method="post">
                                                            @csrf
                                                            @method('PUT')
                                                            <input type="hidden" name="block_resep" value="yes">
                                                            <div class="row mb-3">
                                                                <div
                                                                    class="col-lg-4 col-md-12 align-items-ceneter text-center">
                                                                    <img class="img-fluid"
                                                                        src="{{ asset('images/alasan.png') }}"
                                                                        width="100%" alt="">
                                                                </div>
                                                                <div class="col-lg-8 col-md-12 align-items-center">
                                                                    <textarea name="alasan" id="AlasanBlockCommentRecipe{{$row->id}}" class="form-control" style="border-radius: 15px;" placeholder="Alasan..."
                                                                        cols="5" rows="5"></textarea>
                                                                </div>
                                                            </div>
                                                            <button type="submit" id="ButtonBlockCommentRecipe{{$row->id}}" onclick="BlockCommentRecipe({{$row->id}})"
                                                                style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                class="btn  btn-sm text-light">
                                                                <b class="me-3 ms-3">Kirim</b></button>
                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @elseif(Auth::check() && auth()->user()->id == $row->pengirim_id)
                                        <form method="POST" action="{{ route('delete.comment', $row->id) }}"
                                            id="delete-comment-form{{ $row->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="ButtonHapusKomentarResep{{ $row->id }}"
                                                onclick="ClickHapusKomentarResep({{ $row->id }})" hidden></button>
                                            <button type="button" onclick="confirmation({{ $row->id }})"
                                                class="yuhu text-danger btn-sm rounded-5 ">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @elseif($row->user_pengirim->role === 'admin' && auth()->user()->role === 'admin')
                                        <form method="POST" action="{{ route('delete.comment', $row->id) }}"
                                            id="delete-comment-form{{ $row->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="ButtonHapusKomentarResep{{ $row->id }}"
                                                onclick="ClickHapusKomentarResep({{ $row->id }})" hidden></button>
                                            <button type="button" onclick="confirmation({{ $row->id }})"
                                                class="yuhu text-danger btn-sm rounded-5 ">
                                                <i class="fa-solid fa-trash"></i>
                                            </button>
                                        </form>
                                    @elseif(empty(auth()->user()->id))
                                        @if ($row->user_pengirim->role != 'admin')
                                            <button type="button" onclick="harusLogin()"
                                                class="yuhu text-danger btn-sm rounded-5 "><i
                                                    class="fa-solid fa-triangle-exclamation me-2"></i>
                                            </button>
                                        @endif
                                    @endif
                                @else
                                    @if ($row->user_pengirim->role != 'admin')
                                        <button type="button" onclick="harusLogin()"
                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                        </button>
                                    @endif
                                @endif
                            </div>
                            <div class="d-flex justify-content-end input-group">
                                <a href="#" class="text-secondary " data-toggle="collapse"
                                    data-target="#collapse{{ $row->id }}" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    @if ($row->replies_count() > 0)
                                        <small>Tampilkan {{ $row->replies_count() }} balasan <i
                                                class="fa-solid fa-chevron-down"></i></small>
                                    @else
                                        <small>Balas <i class="fa-solid fa-chevron-down"></i></small>
                                    @endif
                                </a>
                            </div>
                        </div>
                        {{-- collapse --}}
                        <div class="collapse" id="collapse{{ $row->id }}">
                            <div class="card card-body mx-3">
                                @if (Auth::check())
                                    <form
                                        action="{{ route('balasan.komentar.resep', [$row->id, $row->user_penerima->id]) }}"
                                        method="POST" id="FormBalasanKomentarResep{{ $row->id }}">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="text" id="reply_comment{{ $row->id }}"
                                                name="reply_comment" width=""
                                                class="form-control form-control-sm rounded-3 me-lg-5"
                                                placeholder="Balas komentar dari {{ $row->user_pengirim->name }}....">

                                            <button type="submit"
                                                onclick="ButtonBalasanKomentarResep({{ $row->id }})"
                                                style="background-color: #F7941E;border-radius:10px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                                class="btn btn-sm text-light ms-3"><b class="me-3 ms-3">Kirim</b></button>
                                        </div>
                                    </form>
                                @else
                                    <form>
                                        <div class="input-group mb-3">
                                            <input type="text" id="reply_comment"
                                                name="reply_comment{{ $row->id }}" width="500px"
                                                class="form-control form-control-sm rounded-3 me-lg-5"
                                                placeholder="Balas komentar dari {{ $row->user_pengirim->name }}....">

                                            <button type="button" onclick="harusLogin()"
                                                style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                class="btn btn-sm text-light ms-3"><b class="me-3 ms-3">Kirim</b></button>
                                        </div>
                                    </form>
                                @endif
                                <div id="new-komentar-balasan{{ $row->id }}"></div>
                                @foreach ($row->reply_comment_recipe as $item)
                                    <div id="CardBalasanKomentarResep{{ $item->id }}">
                                        <div class="user d-flex flex-row mb-2">
                                            @if ($item->user->foto)
                                                <img src="{{ asset('storage/' . $item->user->foto) }}" width="30"
                                                    height="30" class="user-img rounded-circle mr-2">
                                            @else
                                                <img src="{{ asset('images/default.jpg') }}" width="30"
                                                    height="30" class="user-img rounded-circle mr-2">
                                            @endif
                                            <span>
                                                <small
                                                    class="font-weight-semibold ms-1 me-2"><b>{{ $item->user->name }}</b></small>
                                                @if ($item->count() > 0)
                                                    <div class="text-black" style="font-size: 13px">
                                                        <small
                                                            class="float-start">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                    </div>
                                                @endif
                                                <br>
                                                <div class="">
                                                    <small class="font-weight">
                                                        @if ($item->parent_id != null)
                                                            <a href="">{{ '@' . $item->recipient->name }}</a>
                                                        @endif
                                                        {{ $item->komentar }}
                                                    </small>
                                                </div>
                                            </span>
                                        </div>
                                        {{-- llike --}}
                                        <div class="action d-flex mt-2 align-items-center">

                                            <div class="reply px-7 me-2">
                                                <small id="like_reply_comment_count{{ $item->id }}">
                                                    {{ $item->likes }}</small>
                                            </div>

                                            <div class="icons align-items-center input-group">

                                                <form action="{{ route('likeReply.comment.recipe', $item->id) }}"
                                                    method="POST" id="like_reply_comment_form{{ $item->id }}">
                                                    @csrf
                                                    @if (
                                                        $userLogin &&
                                                            $item->like()->where('users_id', $userLogin->id)->exists())
                                                        <button type="submit" class="yuhu me-2 btn-sm rounded-5"
                                                            id="like_reply_comment_button{{ $item->id }}"
                                                            onclick="like_reply_comment({{ $item->id }})">
                                                            <i id="like_reply_comment_icon{{ $item->id }}"
                                                                class="fa-solid text-orange fa-thumbs-up"></i>
                                                        </button>
                                                    @else
                                                        <button type="submit" class="yuhu me-2 btn-sm rounded-5"
                                                            id= "like_reply_comment_button{{ $item->id }}"
                                                            onclick="like_reply_comment({{ $item->id }})">
                                                            <i id="like_reply_comment_icon{{ $item->id }}"
                                                                class="fa-regular   fa-thumbs-up"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                                @if (Auth::check())
                                                    @if (Auth::check() && $userLogin->id != $item->users_id && $item->user->role != 'admin' && $userLogin->role != 'admin')
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#modalRpl{{ $item->id }}"
                                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                                        </button>
                                                        {{-- modal --}}
                                                        <div class="modal fade" id="modalRpl{{ $item->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered"
                                                                role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="reportModal"
                                                                            style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                                            Laporkan komentar</h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form id="FormReportReplyComment{{ $item->id }}"
                                                                        action="{{ route('Report.reply.comment.recipes', $item->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body d-flex align-items-center">
                                                                            <!-- Tambahkan kelas "align-items-center" -->
                                                                            @if ($item->user->foto)
                                                                                <img class="me-2"
                                                                                    src="{{ asset('storage/' . $item->user->foto) }}"
                                                                                    width="106px" height="104px"
                                                                                    style="border-radius: 50%"
                                                                                    alt="">
                                                                                <textarea class="form-control" id="AlasanReportReplyComment{{ $item->id }}" style="border-radius: 15px"
                                                                                    name="description" rows="5" placeholder="Alasan"></textarea>
                                                                            @else
                                                                                <img class="me-2"
                                                                                    src="{{ asset('images/default.jpg') }}"
                                                                                    width="106px" height="104px"
                                                                                    style="border-radius: 50%"
                                                                                    alt="">
                                                                                <textarea class="form-control rounded-5" id="AlasanReportReplyComment{{ $item->id }}"
                                                                                    style="border-radius: 15px" name="description" rows="5" placeholder="Alasan..."></textarea>
                                                                            @endif
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                onclick="ReportReplyComment({{ $item->id }})"
                                                                                id="ButtonReportReplyComment{{ $item->id }}"
                                                                                class="btn btn-light text-light"
                                                                                style="border-radius: 15px; background-color:#F7941E;"><b
                                                                                    class="ms-2 me-2">Laporkan</b></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        {{-- end Modal --}}
                                                    @elseif(Auth::check() && $item->user->role != "admin" && auth()->user()->role == 'admin')
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#blockModalReply{{ $item->id }}"
                                                            class="yuhu text-danger btn-sm rounded-5 "><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                                    fill="currentColor" fill-rule="nonzero" />
                                                            </svg>
                                                        </button>
                                                        <div class="modal" id="blockModalReply{{ $item->id }}">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content" style="width: 100%;">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title fw-bolder">Kirim alasan
                                                                        </h5>
                                                                        <button type="button" class="btn-close"
                                                                            data-dismiss="modal"
                                                                            aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: right;">
                                                                        <form
                                                                            action="{{ route('block.reply.comment.recipe', $item->id) }}" id="FormBlockReplyCommentRecipe{{$item->id}}"
                                                                            method="post">
                                                                            @csrf
                                                                            @method('PUT')
                                                                            {{$item->id}}
                                                                            <input type="hidden" name="block_resep"
                                                                                value="yes">
                                                                            <div class="row mb-3">
                                                                                <div
                                                                                    class="col-lg-4 col-md-12 align-items-ceneter text-center">
                                                                                    <img class="img-fluid"
                                                                                        src="{{ asset('images/alasan.png') }}"
                                                                                        width="100%" alt="">
                                                                                </div>
                                                                                <div
                                                                                    class="col-lg-8 col-md-12 align-items-center">
                                                                                    <textarea name="alasan" class="form-control" style="border-radius: 15px;" id="AlasanBlockReplyCommentRecipe{{$item->id}}"
                                                                                        placeholder="Alasan..." cols="5" rows="5"></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <button type="submit" id="ButtonBlockReplyCommentRecipe{{$item->id}}" onclick="BlockReplyCommentRecipe({{$item->id}})"
                                                                                style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                                                class="btn  btn-sm text-light">
                                                                                <b class="me-3 ms-3">Kirim</b></button>
                                                                        </form>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif(Auth::check() && auth()->user()->id == $item->users_id)
                                                        <form method="POST"
                                                            action="{{ route('delete.reply.comment', $item->id) }}"
                                                            id="delete-reply-comment-form{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                id="buttonreplycomment{{ $item->id }}"
                                                                onclick="ClickDeleteReplyComment({{ $item->id }})"
                                                                hidden></button>
                                                            <button type="button"
                                                                onclick="confirmationReply({{ $item->id }})"
                                                                class="yuhu text-danger btn-sm rounded-5 ">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @elseif(Auth::check() && auth()->user()->role === 'admin' && $item->user->role === 'admin')
                                                        <form method="POST"
                                                            action="{{ route('delete.reply.comment', $item->id) }}"
                                                            id="delete-reply-comment-form{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                id="buttonreplycomment{{ $item->id }}"
                                                                onclick="ClickDeleteReplyComment({{ $item->id }})"
                                                                hidden></button>
                                                            <button type="button"
                                                                onclick="confirmationReply({{ $item->id }})"
                                                                class="yuhu text-danger btn-sm rounded-5 ">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    @elseif(empty(auth()->user()->id))
                                                        @if ($item->user->role != 'admin')
                                                            <button type="button" onclick="harusLogin()"
                                                                class="yuhu text-danger btn-sm rounded-5 "><i
                                                                    class="fa-solid fa-triangle-exclamation me-2"></i>
                                                            </button>
                                                        @endif
                                                    @endif
                                                @else
                                                    @if ($item->user->role != 'admin')
                                                        <button type="button" onclick="harusLogin()"
                                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                                        </button>
                                                    @endif
                                                @endif
                                            </div>

                                            <div class="d-flex justify-content-end input-group">
                                                <a href="#" class="text-secondary " data-toggle="collapse"
                                                    data-target="#collapses{{ $item->id }}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <small>Balas <i class="fa-solid fa-chevron-down"></i></small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapses{{ $item->id }}">
                                            <br>
                                            @if (Auth::check())
                                                <form
                                                    action="{{ route('balasan.balasan.komentar.resep', [$row->id, $item->user->id]) }}"
                                                    method="post"
                                                    id="FormBalasanBalasanKomentarResep{{ $item->id }}">
                                                    <input type="hidden" name="parent_id"
                                                        value="{{ $item->user->id }}">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <input type="text"
                                                            id="reply_reply_comment{{ $item->id }}"
                                                            name="reply_comment" width="500px"
                                                            class="form-control form-control-sm rounded-3 me-lg-5"
                                                            placeholder="Balas komentar dari {{ $item->user->name }}....">

                                                        <button type="submit"
                                                            onclick="ButtonBalasanBalasanKomentarResep({{ $item->id }})"
                                                            style="background-color: #F7941E;border-radius:10px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                                            class="btn btn-sm text-light ms-3"><b
                                                                class="me-3 ms-3">Kirim</b></button>
                                                    </div>
                                                </form>
                                            @else
                                                <form>
                                                    <div class="input-group mb-3">
                                                        <input type="text" id="reply_comment" name="reply_comment"
                                                            width="500px"
                                                            class="form-control form-control-sm rounded-3 me-lg-5"
                                                            placeholder="Balas komentar dari {{ $item->user->name }}....">

                                                        <button type="button" onclick="harusLogin()"
                                                            style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                            class="btn btn-sm text-light ms-3"><b
                                                                class="me-3 ms-3">Kirim</b></button>
                                                    </div>
                                                </form>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                                {{-- end like --}}
                            </div>
                        </div>
                        {{-- end collapse --}}
                    </div>
                </div>
            @endforeach
    </section>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.10.0/sweetalert2.min.js"
        integrity="sha512-rO18JLH5mM83ToEn/5KhZ8BpHJ4uUKrGLybcp6wK0yuRfqQCSGVbEq1yIn/9coUjRU88TA6UJDLPK9sO6DN0Iw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
         // function block reply comment recipe
         function BlockReplyCommentRecipe(num) {
            $("#FormBlockReplyCommentRecipe" + num).off("submit");
            $("#FormBlockReplyCommentRecipe" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function success(response) {
                        iziToast.destroy();
                        if (response.success === true) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#AlasanBlockReplyCommentRecipe" + num).val("");
                            $("#ButtonBlockReplyCommentRecipe" + num).prop("disabled", true);
                            $("#CardBalasanKomentarResep" + num).css("display", "none");
                            $("#blockModalReply"+num).click();
                        } else {
                            iziToast.error({
                                'title': 'Error',
                                'message': xhr.responseText,
                                'position': 'topCenter'
                            });
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
        // function block comment recipe
        function BlockCommentRecipe(num) {
            $("#FormBlockCommentRecipe" + num).off("submit");
            $("#FormBlockCommentRecipe" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function success(response) {
                        iziToast.destroy();
                        if (response.success === true) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#AlasanBlockCommentRecipe" + num).val("");
                            $("#ButtonBlockCommentRecipe" + num).prop("disabled", true);
                            $("#cardKomentarResep"+num).css('display', 'none');
                            $("#blockComment"+num).click();
                        } else {
                            iziToast.error({
                                'title': 'Error',
                                'message': xhr.responseText,
                                'position': 'topCenter'
                            });
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
        // function report balas komentar resep
        function ReportReplyComment(num) {
            $("#FormReportReplyComment" + num).off("submit");
            $("#FormReportReplyComment" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function success(response) {
                        iziToast.destroy();
                        if (response.success === true) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#AlasanReportReplyComment" + num).val("");
                            $("#ButtonReportReplyComment" + num).prop("disabled", true);
                        } else {
                            iziToast.error({
                                'title': 'Error',
                                'message': xhr.responseText,
                                'position': 'topCenter'
                            });
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
        // function report komentar resep
        function ReportKomentar(num) {
            $("#FormReportKomentar" + num).off("submit");
            $("#FormReportKomentar" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function success(response) {
                        iziToast.destroy();
                        if (response.success === true) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#AlasanReportKomentar" + num).val("");
                            $("#ButtonReportKomentar" + num).prop("disabled", true);
                        } else {
                            iziToast.error({
                                'title': 'Error',
                                'message': xhr.responseText,
                                'position': 'topCenter'
                            });
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
        // function report resep
        function ButtonReportResep() {
            $("#FormReportResep").off("submit");
            $("#FormReportResep").submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    data: data,
                    method: "POST",
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        iziToast.destroy();
                        if (response.success) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                        } else {
                            iziToast.error({
                                'title': 'Error',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                        }
                        $("#AlasanReportResep").val('');
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
        // function untuk tambah komentar resep
        function ButtonTambahKomentarResep(num) {
            $("#FormTambahKomentarResep" + num).off("submit");
            $("#FormTambahKomentarResep" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    contentType: false,
                    processData: false,
                    success: function success(response) {
                        if (response.success) {
                            iziToast.destroy();
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#comment_recipe" + num).val('');
                            let inner = `
                            <div id="cardKomentarResep${response.id}">
                            <div class="card p-3">
                <div class="d-flex justify-content-between">
                    <div class="user d-flex flex-row">
                            <img src="{{ asset('${response.foto}') }}" width="30" height="30"
                                class="user-img rounded-circle mr-2">

                            <div class="d-flex">
                                <span>
                                    <div class="font-weight-semibold ms-1 me-2">
                                        <small class="font-weight-bolder me-2">${response.name}</small>
                                            <div class="text-black" style="font-size: 13px">
                                                <small>1 detik yang lalu</small>
                                            </div>
                                    </div>
                                    <div>
                                        <small>${response.komentar}</small>
                                    </div>

                                </span>
                            </div>
                    </div>
                </div>
                <div class="action d-flex mt-2 align-items-center">
                    <div class="reply px-7 me-2">
                        <small id="like-count-comment${response.id}">0</small>
                    </div>
                    <div class="icons align-items-center input-group">
                        <form action="/koki/sukai/${response.id}" method="POST"
                            id="like-form-comment">
                            @csrf

                                <button type="submit" class="yuhu me-2 text-dark btn-sm rounded-5"
                                    id="like-button-comment">
                                    <i class="fa-regular fa-thumbs-up"></i>
                                </button>
                        </form>

                            <form method="POST" action="/hapus/komentar-resep/${response.id}"
                                id="delete-comment-form${response.id}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="ButtonHapusKomentarResep${response.id}" onclick="ClickHapusKomentarResep(${response.id})" hidden>Hapus</button>
                                <button type="button" onclick="confirmation(${response.id})"
                                    class="yuhu text-danger btn-sm rounded-5 ">
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                    </div>
                    <div class="d-flex justify-content-end input-group">
                        <a href="#" class="text-secondary " data-toggle="collapse"
                            data-target="#collapse${response.id}" aria-expanded="true" aria-controls="collapseOne">

                                <small>Balas <i class="fa-solid fa-chevron-down"></i></small>

                        </a>
                    </div>
                </div>
                {{-- collapse --}}
                <div class="collapse" id="collapse${response.id}">
                    <div class="card card-body mx-3">

                            <form action="/balasan-komentar-resep/${response.id}/${response.user}" method="POST" id="FormBalasanKomentarResep${response.id}">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="text" id="reply_comment${response.id}" name="reply_comment" width="500px"
                                        class="form-control form-control-sm rounded-3 me-lg-5"
                                        placeholder="Balas komentar dari ${response.pengirim}....">

                                    <button type="submit" onclick="ButtonBalasanKomentarResep(${response.id})"
                                        style="background-color: #F7941E;border-radius:10px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                        class="btn btn-sm text-light ms-3"><b class="me-3 ms-3">Kirim</b></button>
                                </div>
                            </form>
                            <div id="new-komentar-balasan${response.id}"></div>
                    </div>
                </div>
                </div>

                </div>
                            `;
                            $("#new-comment").append(inner);
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }
        // function membalas komentar resep
        function ButtonBalasanKomentarResep(num) {
            $("#FormBalasanKomentarResep" + num).off("submit");
            $("#FormBalasanKomentarResep" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        let inner = `
                        <div id="CardBalasanKomentarResep${response.id}">
                                <div class="user d-flex flex-row mb-2">

                                        <img src="{{ asset('${response.foto}') }}" width="30" height="30"
                                            class="user-img rounded-circle mr-2">

                                    <span>
                                        <small
                                            class="font-weight-semibold ms-1 me-2"><b>${response.name}</b></small>
                                            <div class="text-black" style="font-size: 13px">
                                                <small
                                                    class="float-start">1 detik yang lalu</small>
                                            </div>
                                        <br>
                                        <div class="">
                                            <small class="font-weight">

                                                ${response.komentar}
                                            </small>
                                        </div>
                                    </span>
                                </div>
                                {{-- llike --}}
                                <div class="action d-flex mt-2 align-items-center">

                                    <div class="reply px-7 me-2">
                                        <small id="like_reply_comment_count${response.id}">
                                            0</small>
                                    </div>

                                    <div class="icons align-items-center input-group">

                                        <form action="/koki/sukai/balasan/${response.id}" method="POST"
                                            id="like_reply_comment_form${response.id}">
                                            @csrf

                                                <button type="submit" class="yuhu me-2 btn-sm rounded-5"
                                                    id= "like_reply_comment_button${response.id}"
                                                    onclick="like_reply_comment(${response.id})">
                                                    <i id="like_reply_comment_icon${response.id}"
                                                        class="fa-regular   fa-thumbs-up"></i>
                                                </button>

                                        </form>

                                            <form method="POST" action='/hapus/komentar-resep-reply/${response.id}'
                                                id="delete-reply-comment-form${response.id}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" id="buttonreplycomment${response.id}" onclick="ClickDeleteReplyComment(${response.id})" hidden></button>
                                                <button type="button" onclick="confirmationReply(${response.id})"
                                                    class="yuhu text-danger btn-sm rounded-5 ">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                    </div>

                                    <div class="d-flex justify-content-end input-group">
                                        <a href="#" class="text-secondary " data-toggle="collapse"
                                            data-target="#collapses${response.id}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <small>Balas <i class="fa-solid fa-chevron-down"></i></small>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse" id="collapses${response.id}">
                                    <br>

                                        <form
                                            action="/balasan-balasan-komentar-resep/${response.id2}/${response.user}"
                                            method="post" id="FormBalasanBalasanKomentarResep${response.id}">
                                            <input type="hidden" name="parent_id" value="${response.user_id}">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="text" id="reply_reply_comment${response.id}" name="reply_comment"
                                                    width="500px" class="form-control form-control-sm rounded-3 me-lg-5"
                                                    placeholder="Balas komentar dari ${response.user_name}....">

                                                <button type="submit" onclick="ButtonBalasanBalasanKomentarResep(${response.id})"
                                                    style="background-color: #F7941E;border-radius:10px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                                    class="btn btn-sm text-light ms-3"><b
                                                        class="me-3 ms-3">Kirim</b></button>
                                            </div>
                                        </form>

                                </div>
                            </div>
                        `;
                        $("#new-komentar-balasan" + num).append(inner);
                        $("#reply_comment" + num).val('');
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        } // function membalas balasan komentar resep
        function ButtonBalasanBalasanKomentarResep(num) {
            $("#FormBalasanBalasanKomentarResep" + num).off("submit");
            $("#FormBalasanBalasanKomentarResep" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function success(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        let inner = `
                        <div id="CardBalasanKomentarResep${response.id}">
                                <div class="user d-flex flex-row mb-2">

                                        <img src="{{ asset('${response.foto}') }}" width="30" height="30"
                                            class="user-img rounded-circle mr-2">

                                    <span>
                                        <small
                                            class="font-weight-semibold ms-1 me-2"><b>${response.name}</b></small>
                                            <div class="text-black" style="font-size: 13px">
                                                <small
                                                    class="float-start">1 detik yang lalu</small>
                                            </div>
                                        <br>
                                        <div class="">
                                            <small class="font-weight">
                                                <a href="#">@${response.recipient}</a> ${response.komentar}
                                            </small>
                                        </div>
                                    </span>
                                </div>
                                {{-- llike --}}
                                <div class="action d-flex mt-2 align-items-center">

                                    <div class="reply px-7 me-2">
                                        <small id="like_reply_comment_count${response.id}">
                                            0</small>
                                    </div>

                                    <div class="icons align-items-center input-group">

                                        <form action="/koki/sukai/balasan/${response.id}" method="POST"
                                            id="like_reply_comment_form${response.id}">
                                            @csrf

                                                <button type="submit" class="yuhu me-2 btn-sm rounded-5"
                                                    id= "like_reply_comment_button${response.id}"
                                                    onclick="like_reply_comment(${response.id})">
                                                    <i id="like_reply_comment_icon${response.id}"
                                                        class="fa-regular   fa-thumbs-up"></i>
                                                </button>

                                        </form>

                                            <form method="POST" action='/hapus/komentar-resep-reply/${response.id}'
                                                id="delete-reply-comment-form${response.id}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmationReply(${response.id})"
                                                    class="yuhu text-danger btn-sm rounded-5 ">
                                                    <i class="fa-solid fa-trash"></i>
                                                </button>
                                            </form>

                                    </div>

                                    <div class="d-flex justify-content-end input-group">
                                        <a href="#" class="text-secondary " data-toggle="collapse"
                                            data-target="#collapses${response.id}" aria-expanded="true"
                                            aria-controls="collapseOne">
                                            <small>Balas <i class="fa-solid fa-chevron-down"></i></small>
                                        </a>
                                    </div>
                                </div>
                                <div class="collapse" id="collapses${response.id}">
                                    <br>

                                        <form
                                            action="/balasan-balasan-komentar-resep/${response.id2}/${response.user}"
                                            method="post" id="FormBalasanBalasanKomentarResep${response.id}">
                                            <input type="hidden" name="parent_id" value="${response.user_id}">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <input type="text" id="reply_reply_comment${response.id}" name="reply_comment"
                                                    width="500px" class="form-control form-control-sm rounded-3 me-lg-5"
                                                    placeholder="Balas komentar dari ${response.user_name}....">

                                                <button type="submit" onclick="ButtonBalasanBalasanKomentarResep(${response.id})"
                                                    style="background-color: #F7941E;border-radius:10px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"
                                                    class="btn btn-sm text-light ms-3"><b
                                                        class="me-3 ms-3">Kirim</b></button>
                                            </div>
                                        </form>

                                </div>
                            </div>
                        `;
                        $("#new-komentar-balasan" + response.id2).append(inner);
                        $("#reply_reply_comment" + num).val('');
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }

        document.addEventListener("DOMContentLoaded", function() {
            const url = new URLSearchParams(window.location.search);
            const message = url.get('message');

            if (message) {
                iziToast.show({
                    backgroundColor: '#a1dfb0',
                    title: '<i class="fa-solid fa-check"></i>',
                    titleColor: 'dark',
                    messageColor: 'dark',
                    message: message,
                    position: 'topRight',
                    progressBarColor: 'dark',
                });
                setTimeout(() => {
                    window.location.href = window.location.origin + window.location.pathname;
                }, 2000);
            }
        });
        // document.addEventListener("DOMContentLoaded", function() {

        //     const likeForms = document.querySelectorAll("#like-reply-comment-form");
        //     likeForms.forEach(form => {
        //         form.addEventListener("submit", async function(event) {
        //             event.preventDefault();

        //             const button = form.querySelector("#like-reply-comment-button");
        //             const icon = button.querySelector("i");
        //             const svg = button.querySelector("svg");

        //             const response = await fetch(form.action, {
        //                 method: "POST",
        //                 headers: {
        //                     "X-CSRF-Token": "{{ csrf_token() }}",
        //                 },
        //             });

        //             if (response.ok) {
        //                 const responseData = await response.json();
        //                 if (responseData.liked) {
        //                     button.classList.remove('text-dark');
        //                     button.classList.add('text-orange');
        //                     icon.setAttribute('class', 'fa-solid fa-thumbs-up');
        //                     document.getElementById("like-count-reply-comment" + responseData
        //                             .reply_id)
        //                         .textContent = responseData.likes;
        //                 } else {
        //                     button.classList.remove('text-orange');
        //                     button.classList.add('text-dark');
        //                     icon.setAttribute('class', 'fa-regular fa-thumbs-up');
        //                     document.getElementById("like-count-reply-comment" + responseData
        //                             .reply_id)
        //                         .textContent = responseData.likes;
        //                 }
        //             }
        //         });
        //     });
        // });
    </script>
    <script>
        function confirmationReply(num) {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $('#buttonreplycomment' + num).click();
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

        function ClickDeleteReplyComment(num) {
            $("#delete-reply-comment-form" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: 'DELETE',
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#CardBalasanKomentarResep" + num).empty();
                    },
                    error: function error(xhr, status, error) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });
        }

        function like_reply_comment(num) {
            $("#like_reply_comment_form" + num).off("submit");
            $("#like_reply_comment_form" + num).submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "POST",
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function success(response) {
                        if (response.liked) {
                            $("#like_reply_comment_icon" + num).removeClass("fa-regular");
                            $("#like_reply_comment_icon" + num).addClass("fa-solid");
                            $("#like_reply_comment_icon" + num).addClass("text-orange");
                            $("#like_reply_comment_count" + num).text(response.like_count);
                        } else {
                            $("#like_reply_comment_icon" + num).removeClass("fa-solid");
                            $("#like_reply_comment_icon" + num).addClass("fa-regular");
                            $("#like_reply_comment_icon" + num).removeClass("text-orange");
                            $("#like_reply_comment_count" + num).text(response.like_count);
                        }
                    }
                });
            });
        }

        function confirmation(num) {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $('#ButtonHapusKomentarResep' + num).click();
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

        function ClickHapusKomentarResep(num) {
            $("#delete-comment-form" + num).off("submit");
            $("#delete-comment-form" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr('action');
                $.ajax({
                    url: route,
                    method: "DELETE",
                    headers: {
                        'X-Csrf-Token': "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#cardKomentarResep" + num).empty();
                    },
                    error: function error(xhr, error, status) {
                        iziToast.destroy();
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter'
                        });
                    }
                });
            });

        }

        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll("#like-form-comment");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector("#like-button-comment");
                    const icon = button.querySelector("i");
                    const svg = button.querySelector("svg");

                    const response = await fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData = await response.json();
                        if (responseData.liked) {
                            button.classList.remove('text-dark');
                            button.classList.add('text-orange');
                            icon.setAttribute('class', 'fa-solid fa-thumbs-up');
                            document.getElementById("like-count-comment" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-orange');
                            button.classList.add('text-dark');
                            icon.setAttribute('class', 'fa-regular fa-thumbs-up');
                            document.getElementById("like-count-comment" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        function harusLogin() {
            iziToast.show({
                backgroundColor: 'red',
                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Silahkan Login Terlebih Dahulu!',
                position: 'topCenter',
                progressBarColor: 'dark',
            });
        }

        function shareButton(num) {
            $('#share_form' + num).off('submit');
            $('#share_form' + num).submit(function(e) {
                e.preventDefault();
                var share_button_icon = document.getElementById('share_button_icon');
                var share_icon = document.getElementById('share_icon');
                var shared_count = document.getElementById('shared_count' + num);
                let route = $('#share_form' + num).attr('action');
                let data = new FormData($('#share_form' + num)[0]);
                $.ajax({
                    type: "POST",
                    url: route,
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        iziToast.destroy();
                        if (response.success) {
                            if (response.isShared == 1) {
                                share_button_icon.style.backgroundColor = "#F7941E";
                                share_icon.style.color = "#ffffff";
                            }
                            document.getElementById('shr-btn' + num).disabled = true;
                            setTimeout(function() {
                                document.getElementById('shr-btn' + num)
                                    .disabled = false;
                            }, 60000);
                            shared_count.textContent = response.shared_count;
                            iziToast.show({
                                backgroundColor: '#a1dfb0',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                                progressBarColor: 'dark',
                            });
                        } else {
                            iziToast.show({
                                backgroundColor: '#f2a5a8',
                                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    }
                });
            });
        }

        function giftButton(num) {
            $("#gift-form" + num).off("submit");
            $("#gift-form" + num).submit(function(event) {
                event.preventDefault();
                var message = document.getElementById("message");
                var moreInput = document.getElementById("moreInput");
                var gift_btn = document.getElementById('gift_icon_btn' + num);
                var gift_icon = document.getElementById('gift_icon' + num);
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    type: "POST",
                    url: route,
                    data: data,
                    processData: false,
                    contentType: false,
                    headers: {
                        "X-CSRF-Token": "{{ csrf_token() }}",
                    },
                    success: function(response) {
                        if (response.success) {
                            message.value = "";
                            moreInput.value = "";
                            let timerInterval;
                            Swal.fire({
                                timer: 2000,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading();
                                    const timer = Swal.getPopup().querySelector("b");
                                    timerInterval = setInterval(() => {
                                        timer.textContent =
                                            `${Swal.getTimerLeft()}`;
                                    }, 100);
                                },
                                willClose: () => {
                                    clearInterval(timerInterval);
                                }
                            }).then((result) => {

                                if (result.dismiss === Swal.DismissReason.timer) {
                                    document.getElementById('gift-btn' + num).disabled = true;
                                    setTimeout(function() {
                                        document.getElementById('gift-btn' + num)
                                            .disabled = false;
                                    }, 60000);
                                    if (response.check_count = 1) {
                                        gift_btn.style.backgroundColor = "#F7941E";
                                        gift_icon.style.color = "#ffffff";
                                    }
                                    $('#gift-count' + num).html(response.gift_count);
                                    iziToast.show({
                                        backgroundColor: '#a1dfb0',
                                        title: '<i class="fa-regular fa-circle-question"></i>',
                                        titleColor: 'dark',
                                        messageColor: 'dark',
                                        message: response.message,
                                        position: 'topCenter',
                                        progressBarColor: 'dark',
                                    });
                                }
                            });

                        } else {
                            message.value = "";
                            moreInput.value = "";
                            iziToast.show({
                                backgroundColor: '#f2a5a8',
                                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    }
                });
            });
        }

        function DeleteData() {
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus komentar ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-form').submit();
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll(".like-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector(".like-button");
                    const svg = button.querySelector("svg");

                    const response = await fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData = await response.json();
                        if (responseData.liked) {
                            // Reset button color and SVG here
                            button.style.backgroundColor = "#F7941E";
                            svg.style.color = "white";
                            document.getElementById("like-count-" + responseData.resep_id)
                                .textContent = responseData.likes;
                            // Modify SVG appearance if needed
                        } else {
                            // Update button color and SVG here
                            button.style.backgroundColor = "white";
                            svg.style.color = "#F7941E";
                            button.style.borderColor = "#F7941E";
                            document.getElementById("like-count-" + responseData.resep_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const favoriteForm = document.querySelectorAll(".favorite-form");

            favoriteForm.forEach(form1 => {
                form1.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button1 = form1.querySelector(
                        ".favorite-button"); // Menggunakan form1
                    const svg1 = button1.querySelector("svg"); // Menggunakan button1

                    const response = await fetch(form1.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData1 = await response.json();
                        if (responseData1.favorited) {
                            // Reset button color and SVG here
                            button1.style.backgroundColor = "#F7941E";
                            svg1.style.color = "white";
                            // Modify SVG appearance if needed
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        } else {
                            // Update button color and SVG here
                            button1.style.backgroundColor = "white";
                            svg1.style.color = "#F7941E";
                            button1.style.borderColor = "#F7941E";
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        const click4 = document.getElementById("click4");
        const border4 = document.getElementById("border4");
        const click409 = document.getElementById("click409");
        const border409 = document.getElementById("border409");
        click1.addEventListener('click', function() {
            border1.style.display = "block";
            border2.style.display = "none";
            border3.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "none";
        });
        click2.addEventListener("click", function() {
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            border3.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "none";
        });

        click3.addEventListener("click", function() {
            border3.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "none";
        });
        click4.addEventListener("click", function() {
            border3.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
            border4.style.display = "block";
            border409.style.display = "none";
        });
        click409.addEventListener("click", function() {
            border3.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
            border4.style.display = "none";
            border409.style.display = "block";
        });
    </script>
    <script>
        const smallGift = document.getElementById('smallGift');
        const mediumGift = document.getElementById('mediumGift');
        const extraGift = document.getElementById('extraGift');
        const moreGift = document.getElementById('moreGift');
        const moreInput = document.getElementById('moreInput');
        const displayNumber = document.getElementById("displayNumber");
        const message = document.getElementById("message");
        // const anotherText = document.getElementById("anotherText");
        smallGift.addEventListener('click', function() {
            smallGift.style.borderColor = "#F7941E";
            message.style.borderColor = "#F7941E";
            mediumGift.style.borderColor = "black";
            extraGift.style.borderColor = "black";
            moreGift.style.borderColor = "black";
            inputanLainya.style.display = "none";
            moreInput.value = "";
            displayNumber.textContent = "Masukkan nilai";
        });
        mediumGift.addEventListener("click", function() {
            mediumGift.style.borderColor = "#F7941E";
            message.style.borderColor = "#F7941E";
            smallGift.style.borderColor = "black";
            extraGift.style.borderColor = "black";
            moreGift.style.borderColor = "black";
            moreInput.style.display = "none";
            moreInput.value = "";
            displayNumber.textContent = "Masukkan nilai";
        });
        extraGift.addEventListener("click", function() {
            extraGift.style.borderColor = "#F7941E";
            message.style.borderColor = "#F7941E";
            smallGift.style.borderColor = "black";
            mediumGift.style.borderColor = "black";
            moreGift.style.borderColor = "black";
            moreInput.style.display = "none";
            moreInput.val = "";
            displayNumber.textContent = "Masukkan nilai";
        });
        moreGift.addEventListener('click', function() {
            moreGift.style.borderColor = "#F7941E";
            message.style.borderColor = "#F7941E";
            smallGift.style.borderColor = "black";
            mediumGift.style.borderColor = "black";
            extraGift.style.borderColor = "black";
            moreInput.style.display = "block";
            moreInput.style.borderColor = "#F7941E";
        });
        moreInput.addEventListener("input", function() {
            const inputValue = moreInput.value;
            const formattedValue = formatNumber(inputValue);
            displayNumber.textContent = formattedValue;
            if (inputValue.trim() === "") {
                displayNumber.textContent = "Masukkan nilai";
            } else {
                displayNumber.textContent = "Rp. " + formattedValue + ",00";
            }

        });

        function formatNumber(number) {
            // Hapus semua titik yang ada
            const cleanValue = number.replace(/\./g, '');

            // Ubah nilai menjadi format dengan titik sebagai pemisah ribuan
            return cleanValue.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
        }
    </script>
    <script>
    function limitName() {
      let elements = document.querySelectorAll('.ellipsis-name');

      elements.forEach(element => {
        let text = element.textContent.trim(); // Mengambil teks asli dari elemen
        let screenWidth = window.innerWidth;
        let maxLength;

        if (screenWidth <= 425) {
          maxLength = 5;
        } else if (screenWidth <= 767 && screenWidth >= 426) {
          maxLength = 10;
        } else {
          maxLength = 50;
        }

        let shortenedText = text.length > maxLength ? text.substr(0, maxLength) + '...' : text;
        element.textContent = shortenedText;
      });
    }

    document.addEventListener('readystatechange', () => {
      if (document.readyState === 'interactive') {
        limitName();
        window.addEventListener('resize', limitName);
      }
    });
  </script>
@endsection
 