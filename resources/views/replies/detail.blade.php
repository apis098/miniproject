@extends('template.nav')
@section('content')
    <style>
        .card {

            border: none;
            box-shadow: 5px 6px 6px 2px #e9ecef;
            border-radius: 4px;
        }


        .dots {

            height: 4px;
            width: 4px;
            margin-bottom: 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
        }

        .user-img {

            margin-top: 4px;
        }

        .check-icon {

            font-size: 17px;
            color: #c3bfbf;
            top: 1px;
            position: relative;
            margin-left: 3px;
        }


        .icons i {

            margin-left: 8px;
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

        .gambar-koki {
            display: none;
        }

        @media(min-width:767px) {
            .gambar-koki {
                display: block;
            }
        }

        .subject {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;


            @supports (-webkit-line-clamp: 1) {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: initial;
                display: -webkit-box;
                -webkit-line-clamp: 1;
                -webkit-box-orient: vertical;
            }
        }

        .description {
            white-space: nowrap;
            text-overflow: ellipsis;
            overflow: hidden;


            @supports (-webkit-line-clamp: 3) {
                overflow: hidden;
                text-overflow: ellipsis;
                white-space: initial;
                display: -webkit-box;
                -webkit-line-clamp: 3;
                -webkit-box-orient: vertical;
            }
        }

        @media (min-width: 768px) {
            .ellipsis-name {
                display: block;
                width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media (max-width: 425px) {
            .ellipsis-name {
                display: block;
                width: 155px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media (max-width: 373px) {
            .ellipsis-name {
                display: block;
                width: 125px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media (min-width:426px) and (max-width: 767px) {
            .ellipsis-name {
                display: block;
                width: 200px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }

        @media (min-width:374px) and (max-width: 400px) {
            .ellipsis-name {
                display: block;
                width: 155px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }
        }
    </style>
    <section class="py-1 py-md-3 py-lg-4" style="margin-top: -6%;">
        <div class="container px-3 px-lg-5 my-5">
            <div class="row gx-4 md-8 gx-lg-5 align-items-center">
                <div class="col-md-4 gambar-koki"><img class="card-img-top mb-2 mb-md-0 "
                        src="{{ asset('images/complaint.png') }}" alt="..." /></div>
                <div class="col-md-8">
                    <h3 class=" fw-bolder mb-3" style="font-family: poppins; margin-top:55px;">
                        <div class="card subject" style="box-shadow: none">
                            <div>
                                <p>{{ $data->subject }}</p>
                            </div>
                        </div>
                    </h3>
                    <div class="w-full d-flex justify-content-between ">
                        <div class="d-flex">
                            @if ($data->user->foto)
                                <img src="{{ asset('storage/' . $data->user->foto) }}" width="52px" height="52px"
                                    style="border-radius: 50%" alt="">
                            @else
                                <img src="{{ asset('images/default.jpg') }}" width="52px" height="52px"
                                    style="border-radius: 50%" alt="">
                            @endif
                            <div>
                                <p class="ms-3 fw-bolder">{{ $data->user->name }}<br><small
                                        class=""><i>{{ $data->user->email }}</i></small></p>
                            </div>
                        </div>
                        <div class="" style="">
                            @if (Auth::check())
                                @if (Auth::user()->role == 'koki' && Auth::user()->id != $data->user->id)
                                    <button type="submit" class="btn zoom-effects text-light btn-sm rounded-circle p-2"
                                        style="background-color:#F7941E ;" data-toggle="modal"
                                        data-target="#exampleModalCenter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 20 20">
                                            <path fill="currentColor"
                                                d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                        </svg>
                                    </button>
                                @elseif(Auth::user()->role == 'koki' && Auth::user()->id == $data->user->id)
                                    <button type="submit" class="btn zoom-effects text-light btn-sm rounded-circle p-2"
                                        style="background-color:#F7941E ;" data-toggle="modal" data-target="#modalHapus">
                                        <i class="fa-solid fa-trash fa-xl"></i>
                                    </button>
                                    <div class="modal fade" id="modalHapus" tabindex="-1" role="dialog"
                                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="reportModal"
                                                        style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                        Peringatan</h5>
                                                    <button type="button" class="close text-black" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body d-flex justify-content- align-items-center col-12">
                                                    <!-- Tambahkan kelas "align-items-center" -->
                                                    <div class="mt-2">
                                                        <img class="mr-3" src="{{ asset('image 94.png') }}" width="100px"
                                                            height="100px" style="border-radius: 50%" alt="">
                                                    </div>
                                                    <div class="">
                                                        <div class="widget-49-meeting-info">

                                                        </div>
                                                        <p class="ml-4">
                                                            Apakah anda yakin ingin menghapus pertanyaan ini?
                                                        </p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('complaint.destroy', $data->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-light text-light rounded-3"
                                                            style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                                class="ms-2 me-2">Ya</b>
                                                        </button>
                                                    </form>
                                                    <button type="button" data-dismiss="modal"
                                                        class="btn btn-light text-light rounded-3"
                                                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                            class="ms-2 me-2">Tidak</b>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @elseif(Auth::user()->role == 'admin' && $data->user->role  != 'admin')
                                    <button type="submit" class="btn zoom-effects text-light btn-sm rounded-circle p-2"
                                        style="background-color:#F7941E ;" data-toggle="modal" data-target="#ModalBlokir">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 16 16">
                                            <path fill="currentColor"
                                                d="M8 0a8 8 0 1 1 0 16A8 8 0 0 1 8 0ZM3.965 13.096a6.5 6.5 0 0 0 9.131-9.131ZM1.5 8a6.474 6.474 0 0 0 1.404 4.035l9.131-9.131A6.499 6.499 0 0 0 1.5 8Z" />
                                        </svg>
                                    </button>
                                    <div class="modal" id="ModalBlokir">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content" style="width: 100%;">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Kirim alasan</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body" style="text-align: right;">
                                                    <form action="{{ route('block.complaint', $data->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="block_complaint" value="yes">
                                                        <div class="row mb-3">
                                                            <div class="col-lg-5 col-md-12">
                                                                <img class="my-auto"
                                                                    src="{{ asset('images/alasan.png') }}" width="100%"
                                                                    height="100%" alt="">
                                                            </div>
                                                            <div class="col-lg-7 col-md-12">
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
                                @endif
                            @endif
                        </div>
                    </div>
                    <div class="card description" style="box-shadow: none">
                        <div>
                            <p class="">{{ $data->description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mb-5" style="margin-top:-5%;">
            <div class="row  d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="headings row mb-3  mx-auto">
                        <h5 class="col-12 col-md-3 col-lg-2 my-auto " style="font-size: 18px ; padding:0px;"><b
                                class="">Komentar ({{ $repliesCount }})</b></h5>
                        <div class="col-12 col-md-9 col-lg-10 p-0 mt-2">
                            <form method="POST" id="formReplyComplaintStore"
                                action="{{ route('ReplyComplaint.store', ['id' => $data->id]) }}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" id="reply" name="reply" width="500px"
                                        class="form-control rounded-3 me-3" placeholder="Tambah komentar...">
                                    {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                                    <button type="submit"
                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                        class="btn  btn-sm text-light"><b class="me-3 ms-3">Kirim</b></button>
                                </div>

                            </form>
                        </div>


                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('report.complaint', $data->id) }}" method="POST">
                                    @csrf
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalCenterTitle"
                                            style="color: black; font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                            Laporkan Keluhan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="d-flex align-items-center">
                                            @if ($data->user->foto)
                                                <img src="{{ asset('storage/' . $data->user->foto) }}" width="106px"
                                                    height="104px" style="border-radius: 50%; " alt="">
                                            @else
                                                <img src="{{ asset('images/default.jpg') }}" width="106px"
                                                    height="104px" style="border-radius: 50%; " alt="">
                                            @endif
                                            <textarea class="form-control" style="margin-left: 1em; border-radius: 15px;" name="description" rows="5"
                                                placeholder="Alasan">{{ old('description') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn  text-light"
                                            style="border-radius: 15px; background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                class="ms-2 me-2">Laporkan</b></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="new-replies"></div>
                @foreach ($replies as $row)
                    <div class="card p-3" id="replies{{ $row->id }}">
                        <div class="d-flex justify-content-between">
                            <div class="user d-flex flex-row">
                                @if ($row->user->foto)
                                    <img src="{{ asset('storage/' . $row->user->foto) }}" width="30" height="30"
                                        class="user-img rounded-circle mr-2">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" width="30" height="30"
                                        class="user-img rounded-circle mr-2">
                                @endif
                                @if ($row->user->role == 'admin')
                                    <span>
                                        <div class="font-weight-semibold ms-1 me-2">
                                            <small class="font-weight-bolder">{{ $row->user->name }}</small>
                                            <svg class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg"
                                                width="15" height="15" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                            </svg>
                                            @if ($repliesCount > 0)
                                                <div class="text-black" style="font-size: 13px">
                                                    <small>{{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                </div>
                                            @endif
                                        </div>

                                        <small class="font-weight text-break">{{ $row->reply }}</small>
                                    </span>
                                @else
                                    <div class="d-flex">
                                        <span>
                                            <div class="font-weight-semibold ms-1 me-2">
                                                <small
                                                    class="font-weight-bolder font-weight-bolder">{{ $row->user->name }}</small>
                                                @if ($repliesCount > 0)
                                                    <div class="text-black" style="font-size: 13px">
                                                        <small>{{ \Carbon\Carbon::parse($row->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                    </div>
                                                @endif
                                            </div>
                                            <div>
                                                <small>{{ $row->reply }}</small>
                                            </div>

                                        </span>
                                    </div>
                                @endif
                            </div>

                        </div>
                        <div class="action d-flex mt-2 align-items-center">
                            <div class="icons align-items-center input-group">
                                <form action="{{ route('Replies.like', $row->id) }}" method="POST" class="like-form">
                                    @csrf
                                    @if (
                                        $userLogin &&
                                            $row->likes()->where('user_id', $userLogin->id)->exists())
                                        <button type="submit"
                                            class="yuhu me-2 text-warning btn-sm rounded-5 like-button ">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </button>
                                    @else
                                        <button type="submit" class="yuhu me-2 text-dark btn-sm rounded-5 like-button">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                        </button>
                                    @endif
                                </form>
                                <div class="reply px-7 me-2">
                                    <small id="like-count-{{ $row->id }}"> {{ $row->likes }}</small>
                                </div>
                                @if (Auth::check())
                                    @if (Auth::check() && $userLogin->id != $row->user_id && $row->user->role != "admin" && $userLogin->role != 'admin')
                                        <button type="button" data-toggle="modal"
                                            data-target="#Modal{{ $row->id }}"
                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                        </button>
                                    @elseif(Auth::check() && auth()->user()->role == 'admin' && $row->user->role != "admin")
                                        <button type="button" data-toggle="modal"
                                            data-target="#blockModal{{ $row->id }}"
                                            class="yuhu text-danger btn-sm rounded-5 "><svg
                                                xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24">
                                                <path
                                                    d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                    fill="currentColor" fill-rule="nonzero" />
                                            </svg>
                                        </button>
                                    @elseif($row->user->role == "admin")
                                    @else
                                        <form action="{{ route('ReplyDestroy.destroy', $row->id) }}" method="POST"
                                            id="formDelete{{ $row->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="hapus_komentar({{ $row->id }})"
                                                id="buttonDelete{{ $row->id }}" hidden>Hapus</button>
                                            <button type="button" onclick="confirmation({{ $row->id }})"
                                                class="yuhu text-danger btn-sm rounded-5 "><i class="fa-solid fa-trash"
                                                    style="font-size: 11pt;"></i>
                                            </button>
                                        </form>
                                    @endif
                                @else
                                    @if ($row->user->role != 'admin')
                                        <button type="button" class="yuhu text-danger btn-sm rounded-5 "><i
                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                        </button>
                                    @endif
                                @endif
                            </div>
                            <div class="d-flex justify-content-end input-group">
                                <a href="#" class="text-secondary " data-toggle="collapse"
                                    data-target="#collapse{{ $row->id }}" aria-expanded="true"
                                    aria-controls="collapseOne">
                                    <small>Balasan <i class="fa-solid fa-chevron-down"></i></small>
                                </a>
                            </div>

                        </div>
                        {{-- collapse --}}
                        <div class="collapse" id="collapse{{ $row->id }}">
                            <div class="card card-body mx-3">
                                <form action="{{ route('ReplyComment.store', $row->id) }}"
                                    id="formBalasKomentar{{ $row->id }}" method="POST">
                                    <div class="input-group mb-3">
                                        @csrf
                                        <input type="text" id="reply_comment{{ $row->id }}" name="reply_comment"
                                            width="500px" class="form-control form-control-sm rounded-3 me-1"
                                            placeholder="Balas komentar dari {{ $row->user->name }}....">

                                        <button type="submit" onclick="clickBalasKomentar({{ $row->id }})"
                                            style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                            class="btn btn-sm text-light ms-1"><b class="me-1 ms-1">Kirim</b></button>
                                    </div>
                                </form>
                                <div id="new-replies2{{ $row->id }}"></div>
                                @foreach ($row->replies as $item)
                                    <div id="cardReplyComment{{ $item->id }}">
                                        <div class="user d-flex flex-row mb-2">
                                            @if ($item->userSender->foto)
                                                <img src="{{ asset('storage/' . $item->userSender->foto) }}"
                                                    width="30" height="30" class="user-img rounded-circle mr-2">
                                            @else
                                                <img src="{{ asset('images/default.jpg') }}" width="30"
                                                    height="30" class="user-img rounded-circle mr-2">
                                            @endif
                                            <span>
                                                <div class="font-weight-semibold ms-1 me-2">
                                                    <div class="d-flex">
                                                        <small class="font-weight-bolder">{{ $item->userSender->name }}</small>
                                                        @if ($item->userSender->role == 'admin')
                                                        <svg class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg"
                                                            width="15" height="15" viewBox="0 0 24 24">
                                                            <path fill="currentColor"
                                                                d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                                        </svg>
                                                        @endif
                                                    </div>
                                                    @if ($item->count() > 0)
                                                        <div class="text-black" style="font-size: 13px">
                                                            <small
                                                                class="float-start">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                        </div>
                                                    @endif
                                                </div>

                                                <div class="pt-3" style="max-width: 90%;">
                                                    <small class="font-weight">
                                                        @if ($item->parent_id != null)
                                                            <a href="">
                                                                {{ '@' . $item->user->name }}
                                                            </a>
                                                        @endif
                                                        {{ $item->reply }}
                                                    </small>
                                                </div>
                                            </span>
                                        </div>
                                        {{-- llike --}}
                                        <div class="action d-flex mt-2 align-items-center">
                                            <div class="icons align-items-center input-group">
                                                <form action="{{ route('Replies.like.balasan', $item->id) }}"
                                                    method="POST" id="like-form">
                                                    @csrf
                                                    @if (
                                                        $userLogin &&
                                                            $item->likes_reply()->where('user_id', $userLogin->id)->exists())
                                                        <button type="submit"
                                                            class="yuhu me-2 text-warning btn-sm rounded-5"
                                                            id="like-button">
                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                        </button>
                                                    @else
                                                        <button type="submit"
                                                            class="yuhu me-2 text-dark btn-sm rounded-5" id="like-button">
                                                            <i class="fa-regular fa-thumbs-up"></i>
                                                        </button>
                                                    @endif
                                                </form>
                                                <div class="reply px-7 me-2">
                                                    <small id="like-count-balasan{{ $item->id }}">
                                                        {{ $item->likes }}</small>
                                                </div>
                                                @if (auth()->check())
                                                    @if (auth()->user()->id != $item->user_id_sender && $item->userSender->role != "admin" && $userLogin->role != 'admin')
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#ModalLaporkanKomentar{{ $item->id }}"
                                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                                class="fa-solid fa-triangle-exclamation me-2"></i>
                                                        </button>
                                                        <div class="modal fade" id="ModalLaporkanKomentar{{ $item->id }}" tabindex="-1" role="dialog"
                                                            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLongTitle">Laporkan komentar dari
                                                                            {{ $item->userSender->name }}</h5>
                                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="{{route('report.reply.comment', $item->id)}}" id="FormLaporkanKomentar{{ $item->id }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        <div class="modal-body d-flex align-items-center" style="background-color: #ffffff;">
                                                                            <!-- Tambahkan kelas "align-items-center" -->
                                                                            @if ($item->userSender->foto)
                                                                                <img class="rounded-circle" src="{{ asset('storage/' . $item->userSender->foto) }}"
                                                                                    width="106px" height="104px"
                                                                                    style="border-radius: 50%; max-width:110px; border:0.05rem solid rgb(185, 180, 180);"
                                                                                    alt="">
                                                                                <textarea class="form-control" name="description" style="margin-left: 1em; border-radius: 15px;" rows="5" id="InputLaporkanKomentar{{ $item->id }}"
                                                                                    placeholder="Alasan"></textarea>
                                                                            @else
                                                                                <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                                                                    style="border-radius: 50%; max-width:110px; border:0.05rem solid rgb(185, 180, 180);"
                                                                                    alt="">
                                                                                <textarea class="form-control rounded-5" id="InputLaporkanKomentar{{ $item->id }}"
                                                                                    style="margin-left: 1em; border-radius: 15px;" name="description" rows="5" placeholder="Alasan..."></textarea>
                                                                            @endif
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit" class="btn text-light" id="ButtonLaporkanKomentar{{ $item->id }}"
                                                                                onclick="ProcessLaporkanKomentar({{ $item->id }})"
                                                                                style="border-radius: 15px; background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                                                    class="ms-2 me-2">Laporkan</b></button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @elseif(auth()->user()->role == 'admin' && $item->userSender->role != "admin")
                                                        <button type="button" data-toggle="modal"
                                                            data-target="#blockModal2{{ $item->id }}"
                                                            class="yuhu text-danger btn-sm rounded-5 "><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="20"
                                                                height="20" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                                    fill="currentColor" fill-rule="nonzero" />
                                                            </svg>
                                                        </button>
                                                    @elseif($item->userSender->role == "admin")
                                                    @else
                                                        <form action="{{ route('replyComment.destroy', $item->id) }}"
                                                            method="POST" id="replyDelete{{ $item->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                onclick="destroyReplyComment({{ $item->id }})"
                                                                id="buttonReplyDelete{{ $item->id }}" hidden></button>
                                                            <button type="button"
                                                                onclick="confirmationReply({{ $item->id }})"
                                                                class="yuhu text-danger btn-sm rounded-5 "><i
                                                                    class="fa-solid fa-trash"
                                                                    style="font-size: 11pt;"></i>
                                                            </button>
                                                        </form>
                                                    @endif
                                                @else
                                                 @if ($item->userSender->role != "admin")
                                                 <button type="button"
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
                                                    <small>Balasan <i class="fa-solid fa-chevron-down"></i></small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapses{{ $item->id }}">
                                            <br>
                                            <form action="{{ route('ReplyReplyComment.store', [$item->id, $row->id]) }}"
                                                method="POST" id="formBalasBalasKomentar{{ $item->id }}">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="{{ $item->id }}">

                                                <div class="input-group mb-3">
                                                    @csrf
                                                    <input type="text" id="reply_comment2{{ $item->id }}"
                                                        name="reply_comment" width="500px"
                                                        class="form-control form-control-sm rounded-3 me-5"
                                                        placeholder="Balas balasan komentar dari {{ $item->userSender->name }}....">

                                                    <button type="submit"
                                                        onclick="clickBalasBalasKomentar({{ $item->id }}, {{ $row->id }})"
                                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                        class="btn btn-sm text-light ms-3"><b
                                                            class="me-3 ms-3">Kirim</b></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- end like --}}
                            </div>
                        </div>
                        {{-- end collapse --}}
                    </div>
                @endforeach
            </div>
        </div>
        @foreach ($replies as $row)
            @if ($row->id != null)
                <!-- Modal -->
                <div class="modal fade" id="Modal{{ $row->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Laporkan komentar dari
                                    {{ $row->user->name }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('report.reply', $row->id) }}" id="FormReportReply{{ $row->id }}"
                                method="POST">
                                @csrf
                                <div class="modal-body d-flex align-items-center" style="background-color: #ffffff;">
                                    <!-- Tambahkan kelas "align-items-center" -->
                                    @if ($row->user->foto)
                                        <img class="rounded-circle" src="{{ asset('storage/' . $row->user->foto) }}"
                                            width="106px" height="104px"
                                            style="border-radius: 50%; max-width:110px; border:0.05rem solid rgb(185, 180, 180);"
                                            alt="">
                                        <textarea class="form-control" name="description" style="margin-left: 1em; border-radius: 15px;" rows="5"
                                            placeholder="Alasan"></textarea>
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                            style="border-radius: 50%; max-width:110px; border:0.05rem solid rgb(185, 180, 180);"
                                            alt="">
                                        <textarea class="form-control rounded-5" id="InputReportReply{{ $row->id }}"
                                            style="margin-left: 1em; border-radius: 15px;" name="description" rows="5" placeholder="Alasan..."></textarea>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn text-light"
                                        onclick="ButtonReportReply({{ $row->id }})"
                                        style="border-radius: 15px; background-color:#F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-2 me-2">Laporkan</b></button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endif
            @foreach ($replies as $row)
                @if (!empty($row->id))
                    <div class="modal fade" id="blockModal{{ $row->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('block.komen.replies', $row->id) }}"
                                    id="FormBlockKomenReplies{{ $row->id }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModal"
                                            style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                            Kirim Peringatan</h5>
                                        <button type="button" class="close text-black" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex align-items-center row">
                                        <!-- Tambahkan kelas "align-items-center" -->
                                        <div class="col-md-4">
                                            <img style="" class="rounded-circle mb-1"
                                                src="{{ asset('images/alasan.png') }}" width="150px" height="180px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="widget-49-meeting-info">

                                            </div>
                                            <textarea class="form-control" id="InputBlockKomenReplies{{ $row->id }}" style="border-radius: 15px" name="alasan"
                                                rows="5" placeholder="Alasan"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light text-light" id="ButtonBlockKomenReplies{{ $row->id }}"
                                            onclick="ProcessBlockKomenReplies({{ $row->id }})"
                                            style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius:15px;"><b
                                                class="ms-2 me-2">Kirim</b>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach

            @foreach ($row->replies as $item)
                @if (!empty($item->id))
                <div class="modal fade" id="blockModal2{{ $item->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <form action="{{ route('block.reply.comment.replies', $item->id) }}"
                                id="FormBlockKomenReplies2{{ $item->id }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportModal"
                                        style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                        Kirim Peringatan</h5>
                                    <button type="button" class="close text-black" data-dismiss="modal"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body d-flex align-items-center row">
                                    <!-- Tambahkan kelas "align-items-center" -->
                                    <div class="col-md-4">
                                        <img style="" class="rounded-circle mb-1"
                                            src="{{ asset('images/alasan.png') }}" width="150px" height="180px">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="widget-49-meeting-info">

                                        </div>
                                    <textarea class="form-control" id="InputBlockKomenReplies2{{ $item->id }}" style="border-radius: 15px" name="alasan"
                                            rows="5" placeholder="Alasan"></textarea>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-light text-light" id="ButtonBlockKomenReplies2{{ $item->id }}"
                                        onclick="ProcessBlockKomenReplies2({{ $item->id }})"
                                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius:15px;"><b
                                            class="ms-2 me-2">Kirim</b>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
            {{-- modal report balasan komentar --}}
            @foreach ($row->replies as $item)
                @if ($item->id != null)
                    <div class="modal fade" id="modalBalasan{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Laporkan komentar dari
                                        {{ $item->userSender->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="{{ route('report.reply.comment', $item->id) }}" method="POST"
                                    id="FormReportReplyComment{{ $item->id }}">
                                    @csrf
                                    <div class="modal-body d-flex align-items-center" style="background-color: #ffffff;">
                                        <!-- Tambahkan kelas "align-items-center" -->
                                        @if ($item->user->foto)
                                            <img class="rounded-circle" src="{{ asset('storage/' . $item->user->foto) }}"
                                                width="106px" height="104px"
                                                style="border-radius: 50%; max-width:110px; border:0.05rem solid rgb(185, 180, 180);"
                                                alt="">
                                            <textarea class="form-control" name="description" style="margin-left: 1em; border-radius: 15px;" rows="5"
                                                placeholder="Alasan"></textarea>
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                                style="border-radius: 50%; max-width:110px; border:0.05rem solid rgb(185, 180, 180);"
                                                alt="">
                                            <textarea class="form-control rounded-5" id="InputReportReplyComment{{ $item->id }}"
                                                style="margin-left: 1em; border-radius: 15px;" name="description" rows="5" placeholder="Alasan..."></textarea>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light text-light"
                                            onclick="ButtonReportReplyComment({{ $item->id }})"
                                            style="border-radius: 15px; background-color:#F7941E;"><b
                                                class="ms-2 me-2">Laporkan</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @endforeach

        </div>
        </div>
        {{-- collapse --}}
    </section>
    </div>
    <script>
        function ProcessBlockKomenReplies(num) {
            $("#FormBlockKomenReplies" +num).off("submit");
            $("#FormBlockKomenReplies" +num).submit(function (event) {
                event.preventDefault();
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
                        $("#ButtonBlockKomenReplies"+num).prop("disabled", true);
                        $("#InputBlockKomenReplies"+num).val("");
                        $("#replies"+num).empty();
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
        function ProcessLaporkanKomentar(num) {
            $("#FormLaporkanKomentar" + num).off("submit");
            $("#FormLaporkanKomentar" + num).submit(function (event) {
                event.preventDefault();
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
                        $("#ButtonLaporkanKomentar" + num).prop("disabled", true);
                        $("#InputLaporkanKomentar" + num).val("");
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
        function errorComment() {
            iziToast.error({
                'title': 'Error',
                'message': "komentar tidak boleh lebih dari 1000 karakter",
                'position': 'topCenter'
            });
        }

        function ButtonReportReplyComment(num) {
            $("#FormReportReplyComment" + num).off('submit');
            $("#FormReportReplyComment" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#InputReportReplyComment" + num).val('');
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

        function ButtonReplyCommentDestroy(num) {
            $("#FormReplyCommentDestroy" + num).off('submit');
            $("#FormReplyCommentDestroy" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#InputReplyCommentDestroy" + num).val('');
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

        function ButtonReplyDestroy(num) {
            $("#FormReplyDestroy" + num).off("submit");
            $("#FormReplyDestroy" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                $.ajax({
                    url: route,
                    method: "POST",
                    data: data,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        iziToast.destroy();
                        iziToast.success({
                            'title': 'Success',
                            'message': response.message,
                            'position': 'topCenter'
                        });
                        $("#InputReplyDestroy" + num).val('');
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

        function ButtonReportReply(num) {
            $("#FormReportReply" + num).off("submit");
            $("#FormReportReply" + num).submit(function(e) {
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
                        if (response.success) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#InputReportReply" + num).val('');
                        } else {
                            iziToast.error({
                                'title': 'Error',
                                'message': response.message,
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
        $(document).ready(function() {
            $("#formReplyComplaintStore").off("submit");
            $("#formReplyComplaintStore").submit(function(event) {
                event.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                let value = $('#reply').val();
                if (value.length > 1000) {
                    errorComment();
                } else {
                    $.ajax({
                        url: route,
                        method: "POST",
                        data: data,
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
                                let inner =
                                    `
                                <div class="card p-3" id="replies${response.id}">
                            <div class="d-flex justify-content-between">
                                <div class="user d-flex flex-row">
                                        <img src="{{ asset('${response.foto}') }}" width="30" height="30"
                                            class="user-img rounded-circle mr-2">

                                        <div class="d-flex">
                                            <span>
                                                <div class="font-weight-semibold ms-1 me-2">
                                                    <small class="font-weight-bolder font-weight-bolder">${response.name}</small>
                                                        <div class="text-black" style="font-size: 13px">
                                                            <small>1 detik yang lalu</small>
                                                        </div>
                                                </div>
                                                <div>
                                                    <small>${response.reply}</small>
                                                </div>

                                            </span>
                                        </div>

                                </div>

                            </div>
                            <div class="action d-flex mt-2 align-items-center">



                                <div class="icons align-items-center input-group">

                                    <form action="/comments/${response.id}/like" method="POST" id="likeForm${response.id}" class="like-form">
                                        @csrf

                                            <button type="submit" onclick="likeButton(${response.id})" class="yuhu me-2 text-dark btn-sm rounded-5 like-button">
                                                <i class="fa-regular fa-thumbs-up" id="iconLike${response.id}"></i>
                                            </button>

                                    </form>
                                    <div class="reply px-7 me-2">
                                        <small id="like-count-${response.id}">0</small>
                                    </div>

                                        <form action="/reply-destroy/${response.id}" method="POST"
                                            id="formDelete${response.id}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="hapus_komentar(${response.id})" id="buttonDelete${response.id}" hidden>Hapus</button>
                                            <button type="button" onclick="confirmation(${response.id})"
                                                class="yuhu text-danger btn-sm rounded-5 "><i class="fa-solid fa-trash" style="font-size: 11pt;"></i>
                                            </button>
                                        </form>

                                </div>
                                <div class="d-flex justify-content-end input-group">
                                    <a href="#" class="text-secondary " data-toggle="collapse"
                                        data-target="#collapse${response.id}" aria-expanded="true"
                                        aria-controls="collapseOne">
                                        <small>Balasan <i class="fa-solid fa-chevron-down"></i></small>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse" id="collapse${response.id}">
                                <div class="card card-body mx-3">
                                    <form action="/replies-store/${response.id}" method="POST" id="formBalasKomentar${response.id}">
                                        <div class="input-group mb-3">
                                            @csrf
                                            <input type="text" id="reply_comment${response.id}" name="reply_comment" width="500px"
                                                class="form-control form-control-sm rounded-3 me-1"
                                                placeholder="Balas komentar dari ${response.name}....">

                                            <button type="submit" onclick="clickBalasKomentar(${response.id})"
                                                style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                class="btn btn-sm text-light ms-1"><b class="me-1 ms-1">Kirim</b></button>
                                        </div>
                                    </form>

                                    <div id="new-replies2${response.id}"></div>
                                    </div>
                                </div>
                            </div>
                                `;
                                $("#reply").val('');
                                $("#new-replies").append(inner);
                            } else {
                                iziToast.error({
                                    'title': 'Error',
                                    'message': response.message,
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
                }
            });
        });

        function likeButton(num) {
            $("#likeForm" + num).off("submit");
            $("#likeForm" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "POST",
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        if (response.liked) {
                            $("#iconLike" + num).removeClass("fa-regular");
                            $("#iconLike" + num).addClass("fa-solid");
                            $("#iconLike" + num).removeClass("text-dark");
                            $("#iconLike" + num).addClass("text-warning");
                            $("#like-count-" + num).text('1');
                        } else {
                            $("#iconLike" + num).removeClass("fa-solid");
                            $("#iconLike" + num).addClass("fa-regular");
                            $("#iconLike" + num).removeClass("text-warning");
                            $("#iconLike" + num).addClass("text-dark");
                            $("#like-count-" + num).text('0');
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.error({
                            "title": "Error",
                            "message": xhr.responseText,
                            "position": "topCenter"
                        });
                    }
                });
            });
        }
        document.addEventListener("DOMContentLoaded", function() {
            const readMoreButtons = document.querySelectorAll(".read-more-button");

            readMoreButtons.forEach((readMoreButton) => {
                readMoreButton.addEventListener("click", function() {
                    const post = this.closest(".post"); // Temukan kontainer komentar terdekat
                    const postContent = post.querySelector(".post-content");

                    post.classList.toggle("open");

                    if (post.classList.contains("open")) {
                        this.textContent = "Sembunyikan";
                        postContent.style.maxHeight =
                            "none"; // Tampilkan seluruh teks saat tombol ditekan
                    } else {
                        this.textContent = "Baca Selengkapnya";
                        postContent.style.maxHeight =
                            "100px"; // Ganti dengan tinggi maksimum yang Anda inginkan
                    }
                });
            });

            const posts = document.querySelectorAll(".post");

            posts.forEach((post) => {
                const postContent = post.querySelector(".post-content");
                const readMoreButton = post.querySelector(".read-more-button");
                const maxLength = 500; // Atur panjang maksimum yang Anda inginkan

                // Periksa panjang teks komentar dan tambahkan tombol "Baca Selengkapnya" hanya jika melebihi panjang maksimum
                if (postContent.textContent.length <= maxLength) {
                    readMoreButton.style.display = "none";
                } else {
                    postContent.style.maxHeight =
                        "100px"; // Sembunyikan teks yang berlebihan secara default
                }
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll("#like-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector("#like-button");
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
                            button.classList.add('text-warning');
                            icon.setAttribute('class', 'fa-solid fa-thumbs-up');
                            document.getElementById("like-count-balasan" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-warning');
                            button.classList.add('text-dark');
                            icon.setAttribute('class', 'fa-regular fa-thumbs-up');
                            document.getElementById("like-count-balasan" + responseData
                                    .reply_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll(".like-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector(".like-button");
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
                            button.classList.add('text-warning');
                            icon.setAttribute('class', 'fa-solid fa-thumbs-up');
                            document.getElementById("like-count-" + responseData.reply_id)
                                .textContent = responseData.likes;
                        } else {
                            button.classList.remove('text-warning');
                            button.classList.add('text-dark');
                            icon.setAttribute('class', 'fa-regular fa-thumbs-up');
                            document.getElementById("like-count-" + responseData.reply_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });

        function confirmation(num) {
            iziToast.show({
                backgroundColor: 'red',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin mengahpus komentar?',
                position: 'topCenter',
                close: false,
                progressBarColor: 'white',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            $("#buttonDelete" + num).click();

                        }
                    ],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
                        function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }
                    ],
                ],
            });

        }

        function hapus_komentar(num) {
            $("#formDelete" + num).off("submit");
            $("#formDelete" + num).submit(function(e) {
                e.preventDefault();
                $.ajax({
                    url: $(this).attr('action'),
                    method: 'DELETE',
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        if (response.success) {
                            iziToast.error({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                            $("#replies" + num).empty();
                        }
                    }
                });
            });
        }

        function clickBalasKomentar(num) {
            $("#formBalasKomentar" + num).off("submit");
            $("#formBalasKomentar" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                let value = $("#reply_comment" + num).val();
                console.log(value.length);
                if (value.length > 1000) {
                    errorComment()
                } else {
                    $.ajax({
                        url: route,
                        method: "POST",
                        data: data,
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
                            $("#reply_comment" + num).val('');
                            let inner =
                                `
                            <div id="cardReplyComment${response.id}">
                            <div class="user d-flex flex-row mb-2" >

                                                <img src="{{ asset('${response.foto}') }}" width="30"
                                                    height="30" class="user-img rounded-circle mr-2">

                                            <span>
                                            <div class="font-weight-semibold ms-1 me-2">
                                            <div class="d-flex">
                                                <small
                                                    class="font-weight-bolder font-weight-bolder ellipsis-name"><b>${response.name}</b>
                                                    </small>

                                            </div>
                                                    <div class="text-black" style="font-size: 13px">
                                                        <small
                                                            class="float-start">1 detik yang lalu</small>
                                                    </div>
                                                </div>
                                                <div class="">
                                                    <small class="font-weight">
                                                        <br>
                                                            <a href="">
                                                               ${response.at}
                                                            </a>
                                                        ${response.reply}
                                                    </small>
                                                </div>
                                            </span>
                                        </div>
                                        {{-- llike --}}
                                        <div class="action d-flex mt-2 align-items-center">



                                            <div class="icons align-items-center input-group">

                                                <form action="/comments/reply/${response.id}/like" method="POST"
                                                    id="like-form${response.id}">
                                                    @csrf

                                                        <button type="submit" onclick="like_button_balasan(${response.id})" class="yuhu me-2 text-dark btn-sm rounded-5"
                                                            id="like-button">
                                                            <i id="iconLikeBalasan${response.id}" class="fa-regular fa-thumbs-up"></i>
                                                        </button>

                                                </form>
                                                <div class="reply px-7 me-2">
                                                    <small id="like-count-balasan${response.id}">
                                                        0</small>
                                                </div>
                                                {{-- @if (auth()->check()) --}}

                                                    <form action="/reply-comment-destroy/${response.id}"
                                                        method="POST" id="replyDelete${response.id}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="destroyReplyComment(${response.id})" id="buttonReplyDelete${response.id}" hidden></button>
                                                        <button type="button"
                                                            onclick="confirmationReply(${response.id})"
                                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                                class="fa-solid fa-trash" style="font-size: 11pt;"></i>
                                                        </button>
                                                    </form>

                                            </div>

                                            <div class="d-flex justify-content-end input-group">
                                                <a href="#" class="text-secondary " data-toggle="collapse"
                                                    data-target="#collapses${response.id}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <small>Balasan <i class="fa-solid fa-chevron-down"></i></small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapses${response.id}">
                                            <br>
                                            <form action="/reply-replies-store/${response.id}/${response.id2}" method="POST" id="formBalasBalasKomentar${response.id}">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="${response.id}">
                                                <div class="input-group mb-3">
                                                    @csrf
                                                    <input type="text" id="reply_comment2${response.id}" name="reply_comment"
                                                        width="500px" class="form-control form-control-sm rounded-3 me-1"
                                                        placeholder="Balas komentar dari ${response.name}....">

                                                    <button type="submit" onclick="clickBalasBalasKomentar(${response.id}, ${response.id2})"
                                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                        class="btn btn-sm text-light ms-1"><b
                                                            class="me-1 ms-1">Kirim</b></button>
                                                </div>
                                            </form>
                                        </div>
                             </div>`;
                            $("#reply_comment2" + num).val('');
                            $("#new-replies2" + num).append(inner);
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
                }
            });
        }

        function like_button_balasan(num) {
            $("#like-form" + num).off('submit');
            $("#like-form" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "POST",
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        if (response.liked) {
                            $("#iconLikeBalasan" + num).removeClass('fa-regular');
                            $("#iconLikeBalasan" + num).addClass('fa-solid');
                            $("#iconLikeBalasan" + num).removeClass('text-dark');
                            $("#iconLikeBalasan" + num).addClass('text-warning');
                            $("#like-count-balasan" + num).text('1');
                        } else {
                            $("#iconLikeBalasan" + num).addClass('fa-regular');
                            $("#iconLikeBalasan" + num).removeClass('fa-solid');
                            $("#iconLikeBalasan" + num).addClass('text-dark');
                            $("#iconLikeBalasan" + num).removeClass('text-warning');
                            $("#like-count-balasan" + num).text('0');
                        }
                    },
                    error: function error(xhr, error, status) {

                    }
                });
            });
        }

        function clickBalasBalasKomentar(num, num2) {
            $("#formBalasBalasKomentar" + num).off("submit");
            $("#formBalasBalasKomentar" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                let data = new FormData($(this)[0]);
                let value = $("#reply_comment2" + num).val();
                if (value.length > 1000) {
                    errorComment();
                } else {
                    $.ajax({
                        url: route,
                        method: "POST",
                        data: data,
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
                            $("#reply_comment" + num).val('');
                            let inner =
                                `
                            <div id="cardReplyComment${response.id}">
                            <div class="user d-flex flex-row mb-2" >

                                                <img src="{{ asset('${response.foto}') }}" width="30"
                                                    height="30" class="user-img rounded-circle mr-2">

                                            <span>
                                                <div class="font-weight-semibold ms-1 me-2">
                                                <div class="d-flex">
                                                <small
                                                    class="font-weight-bolder font-weight-bolder ellipsis-name"><b>${response.name}</b>
                                                    </small>

                                                </div>
                                                    <div class="text-black" style="font-size: 13px">
                                                        <small
                                                            class="float-start">1 detik yang lalu</small>
                                                    </div>
                                                </div>
                                                    <div class="">
                                                    <small class="font-weight">
                                                        <br>
                                                            <a href="">
                                                                @${response.at}
                                                            </a>
                                                        ${response.reply}
                                                    </small>
                                                </div>
                                            </span>
                                        </div>
                                        {{-- llike --}}
                                        <div class="action d-flex mt-2 align-items-center">



                                            <div class="icons align-items-center input-group">

                                                <form action="/comments/reply/${response.id}/like" method="POST"
                                                    id="like-balasan-form${response.id}">
                                                    @csrf

                                                        <button type="submit" onclick="like_button_balasan_balasan(${response.id})" class="yuhu me-2 text-dark btn-sm rounded-5"
                                                            id="like-button">
                                                            <i class="fa-regular fa-thumbs-up" id="iconLikeBalasanBalasan${response.id}"></i>
                                                        </button>

                                                </form>
                                                <div class="reply px-7 me-2">
                                                    <small id="like-count-balasan-balasan${response.id}">
                                                        0</small>
                                                </div>
                                                {{-- @if (auth()->check()) --}}

                                                    <form action="/reply-comment-destroy/${response.id}"
                                                        method="POST" id="replyDelete${response.id}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" onclick="destroyReplyComment(${response.id})" id="buttonReplyDelete${response.id}" hidden></button>
                                                        <button type="button"
                                                            onclick="confirmationReply(${response.id})"
                                                            class="yuhu text-danger btn-sm rounded-5 "><i
                                                                class="fa-solid fa-trash" style="font-size: 11pt;"></i>
                                                        </button>
                                                    </form>

                                            </div>

                                            <div class="d-flex justify-content-end input-group">
                                                <a href="#" class="text-secondary " data-toggle="collapse"
                                                    data-target="#collapses${response.id}" aria-expanded="true"
                                                    aria-controls="collapseOne">
                                                    <small>Balasan <i class="fa-solid fa-chevron-down"></i></small>
                                                </a>
                                            </div>
                                        </div>
                                        <div class="collapse" id="collapses${response.id}">
                                            <br>
                                            <form action="/reply-replies-store/${response.id}/${response.id2}" method="POST" id="formBalasBalasKomentar${response.id}">
                                                @csrf
                                                <input type="hidden" name="parent_id" value="${response.id}">
                                                <div class="input-group mb-3">
                                                    @csrf
                                                    <input type="text" id="reply_comment2${response.id}" name="reply_comment"
                                                        width="500px" class="form-control form-control-sm rounded-3 me-1"
                                                        placeholder="Balas s komentar dari ${response.name}....">

                                                    <button type="submit" onclick="clickBalasBalasKomentar(${response.id}, ${response.id2})"
                                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                                        class="btn btn-sm text-light ms-1"><b
                                                            class="me-1 ms-1">Kirim</b></button>
                                                </div>
                                            </form>
                                        </div>

                            </div>            `;
                            $("#reply_comment2" + num).val('');
                            $("#new-replies2" + num2).append(inner);
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
                }
            });
        }

        function like_button_balasan_balasan(num) {
            $("#like-balasan-form" + num).off('submit');
            $("#like-balasan-form" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr("action");
                $.ajax({
                    url: route,
                    method: "POST",
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        if (response.liked) {
                            $("#iconLikeBalasanBalasan" + num).removeClass('fa-regular');
                            $("#iconLikeBalasanBalasan" + num).addClass('fa-solid');
                            $("#iconLikeBalasanBalasan" + num).removeClass('text-dark');
                            $("#iconLikeBalasanBalasan" + num).addClass('text-warning');
                            $("#like-count-balasan-balasan" + num).text('1');
                        } else {
                            $("#iconLikeBalasanBalasan" + num).addClass('fa-regular');
                            $("#iconLikeBalasanBalasan" + num).removeClass('fa-solid');
                            $("#iconLikeBalasanBalasan" + num).addClass('text-dark');
                            $("#iconLikeBalasanBalasan" + num).removeClass('text-warning');
                            $("#like-count-balasan-balasan" + num).text('0');
                        }
                    },
                    error: function error(xhr, error, status) {
                        iziToast.error({
                            'title': 'Error',
                            'message': xhr.responseText,
                            'position': 'topCenter',
                        });
                    }
                });
            });
        }

        function destroyReplyComment(num) {
            $("#replyDelete" + num).off('submit');
            $("#replyDelete" + num).submit(function(e) {
                e.preventDefault();
                let route = $(this).attr('action');
                $.ajax({
                    url: route,
                    method: "DELETE",
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        iziToast.destroy();
                        if (response.success) {
                            iziToast.success({
                                'title': 'Success',
                                'message': response.message,
                                'position': 'topCenter'
                            });
                        }
                        $("#cardReplyComment" + num).empty();
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

        function confirmationReply(num) {
            iziToast.show({
                backgroundColor: 'red',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin mengahpus komentar?',
                position: 'topCenter',
                close: false,
                progressBarColor: 'white',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('buttonReplyDelete' + num).click();
                        }
                    ],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
                        function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }
                    ],
                ],
            });
        }
    </script>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
