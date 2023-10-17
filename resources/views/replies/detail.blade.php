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
    </style>
    <section class="py-5" style="margin-top: -6%;">
        <div class="container px-5 px-lg-5 my-5">
            <div class="row gx-4 md-8 gx-lg-5 align-items-center">
                <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0 " src="{{ asset('images/complaint.png') }}"
                        alt="..." /></div>
                <div class="col-md-8">
                    <h3 class=" fw-bolder mb-3" style="font-family: poppins; margin-top:55px;"><b>{{ $data->subject }}</b>
                    </h3>
                    <div class="input-group">
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
                        <div class="" style="margin-top: -60px">
                            <button type="submit" class="btn zoom-effects text-light btn-sm rounded-circle p-2"
                                style="background-color:#F7941E; margin-top: -px ;  margin-left: 640px;" data-toggle="modal"
                                data-target="#exampleModalCenter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 20 20">
                                    <path fill="currentColor"
                                        d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <p>{{ $data->description }}</p>


                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container mb-5" style="margin-top:-5%;">
            <div class="row  d-flex justify-content-center">
                <div class="col-md-12">
                    <div class="headings d-flex justify-content-between align-items-center mb-3">
                        <h5 class="" style="margin-left: 12px;"><b>Komentar ({{ $repliesCount }})</b></h5>
                        <div class="col-10">
                            <form method="POST" action="{{ route('ReplyComplaint.store', ['id' => $data->id]) }}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" id="reply" name="reply" width="500px"
                                        class="form-control rounded-3 me-5" placeholder="Tambah komentar...">
                                    {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                                    <button type="submit" style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                        class="btn  btn-sm text-light"><b class="me-3 ms-3">Kirim</b></button>
                                </div>

                            </form>
                        </div>
                        <div class="buttons">

                        </div>

                    </div>
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
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
                                                <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                                    style="border-radius: 50%; " alt="">
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



                @foreach ($replies as $row)
                    <div class="card p-3">
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
                                            <small class="font-weight-bolder me-2">{{ $row->user->name }}</small>
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
                                                <small class="font-weight-bolder me-2">{{ $row->user->name }}</small>
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

                            <div class="reply px-7 me-2">
                                <small id="like-count-{{ $row->id }}"> {{ $row->likes }}</small>
                            </div>

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
                                @if (Auth::check() && $userLogin->id != $row->user_id && $userLogin->role != 'admin')
                                    <button type="button" data-toggle="modal" data-target="#Modal{{ $row->id }}"
                                        class="yuhu text-danger btn-sm rounded-5 "><i
                                            class="fa-solid fa-triangle-exclamation me-2"></i>
                                    </button>
                                @elseif(Auth::check() && auth()->user()->role == 'admin')
                                    <button type="button" data-toggle="modal"
                                        data-target="#blockModal{{ $row->id }}"
                                        class="yuhu text-danger btn-sm rounded-5 "><svg xmlns="http://www.w3.org/2000/svg"
                                            width="20" height="20" viewBox="0 0 24 24">
                                            <path
                                                d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                fill="currentColor" fill-rule="nonzero" />
                                        </svg>
                                    </button>
                                @else
                                    <form action="{{ route('ReplyDestroy.destroy', $row->id) }}" method="POST"
                                        id="formDelete{{ $row->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="confirmation({{ $row->id }})"
                                            class="yuhu text-danger btn-sm rounded-5 "><i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>
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
                                <form action="{{ route('ReplyComment.store', $row->id) }}" method="POST">
                                    <div class="input-group mb-3">
                                        @csrf
                                        <input type="text" id="reply_comment" name="reply_comment" width="500px"
                                            class="form-control form-control-sm rounded-3 me-5"
                                            placeholder="Balas komentar dari {{ $row->user->name }}....">

                                        <button type="submit" style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                            class="btn btn-sm text-light ms-3"><b
                                                class="me-3 ms-3">Kirim</b></button>
                                    </div>
                                </form>
                                @foreach ($row->replies as $item)
                                    <div class="user d-flex flex-row mb-2">
                                        @if ($item->userSender->foto)
                                            <img src="{{ asset('storage/' . $item->userSenderfoto) }}" width="30"
                                                height="30" class="user-img rounded-circle mr-2">
                                        @else
                                            <img src="{{ asset('images/default.jpg') }}" width="30" height="30"
                                                class="user-img rounded-circle mr-2">
                                        @endif
                                        <span>
                                            <small
                                                class="font-weight-semibold ms-1 me-2"><b>{{ $item->userSender->name }}</b>
                                                <svg class="text-primary" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                                </svg>
                                            </small>
                                            @if ($item->count() > 0)
                                                <div class="text-black" style="font-size: 13px">
                                                    <small
                                                        class="float-start">{{ \Carbon\Carbon::parse($item->created_at)->locale('id_ID')->diffForHumans(['short' => false]) }}</small>
                                                </div>
                                            @endif
                                            <div class="">
                                                <small class="font-weight">{{ $item->reply }}</small>
                                            </div>
                                        </span>
                                    </div>
                                    {{-- llike --}}
                                    <div class="action d-flex mt-2 align-items-center">

                                        <div class="reply px-7 me-2">
                                            <small id="like-count-balasan{{ $item->id }}">
                                                {{ $item->likes }}</small>
                                        </div>

                                        <div class="icons align-items-center input-group">

                                            <form action="{{ route('Replies.like.balasan', $item->id) }}" method="POST"
                                                id="like-form">
                                                @csrf
                                                @if (
                                                    $userLogin &&
                                                        $item->likes_reply()->where('user_id', $userLogin->id)->exists())
                                                    <button type="submit" class="yuhu me-2 text-warning btn-sm rounded-5"
                                                        id="like-button">
                                                        <i class="fa-solid fa-thumbs-up"></i>
                                                    </button>
                                                @else
                                                    <button type="submit" class="yuhu me-2 text-dark btn-sm rounded-5"
                                                        id="like-button">
                                                        <i class="fa-regular fa-thumbs-up"></i>
                                                    </button>
                                                @endif
                                            </form>
                                            {{-- @if (auth()->check()) --}}
                                            @if ($userLogin->id != $item->user_id_sender && $userLogin->role != 'admin')
                                                <button type="button" data-toggle="modal"
                                                    data-target="#modalBalasan{{ $item->id }}"
                                                    class="yuhu text-danger btn-sm rounded-5 "><i
                                                        class="fa-solid fa-triangle-exclamation me-2"></i>
                                                </button>
                                            @elseif(auth()->user()->role == 'admin')
                                                <button type="button" data-toggle="modal"
                                                    data-target="#blockModalReply{{ $item->id }}"
                                                    class="yuhu text-danger btn-sm rounded-5 "><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M12.022 3a6.47 6.47 0 0 0-.709 1.5H5.25A1.75 1.75 0 0 0 3.5 6.25v8.5c0 .966.784 1.75 1.75 1.75h2.249v3.75l5.015-3.75h6.236a1.75 1.75 0 0 0 1.75-1.75l.001-2.483a6.518 6.518 0 0 0 1.5-1.077L22 14.75A3.25 3.25 0 0 1 18.75 18h-5.738L8 21.75a1.25 1.25 0 0 1-1.999-1V18h-.75A3.25 3.25 0 0 1 2 14.75v-8.5A3.25 3.25 0 0 1 5.25 3h6.772zM17.5 1a5.5 5.5 0 1 1 0 11a5.5 5.5 0 0 1 0-11zm-2.784 2.589l-.07.057l-.057.07a.5.5 0 0 0 0 .568l.057.07L16.793 6.5l-2.147 2.146l-.057.07a.5.5 0 0 0 0 .568l.057.07l.07.057a.5.5 0 0 0 .568 0l.07-.057L17.5 7.207l2.146 2.147l.07.057a.5.5 0 0 0 .568 0l.07-.057l.057-.07a.5.5 0 0 0 0-.568l-.057-.07L18.207 6.5l2.147-2.146l.057-.07a.5.5 0 0 0 0-.568l-.057-.07l-.07-.057a.5.5 0 0 0-.568 0l-.07.057L17.5 5.793l-2.146-2.147l-.07-.057a.5.5 0 0 0-.492-.044l-.076.044z"
                                                            fill="currentColor" fill-rule="nonzero" />
                                                    </svg>
                                                </button>
                                            @else
                                                <form action="{{ route('replyComment.destroy', $item->id) }}"
                                                    method="POST" id="replyDelete{{ $item->id }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button"
                                                        onclick="confirmationReply({{ $item->id }})"
                                                        class="yuhu text-danger btn-sm rounded-5 "><i
                                                            class="fa-solid fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                                            {{-- @else

                @endif --}}
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
                            <form action="{{ route('report.reply', $row->id) }}" method="POST">
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
                                        <textarea class="form-control rounded-5" style="margin-left: 1em; border-radius: 15px;" name="description"
                                            rows="5" placeholder="Alasan..."></textarea>
                                    @endif
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn text-light"
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
                                <form action="{{ route('ReplyDestroy.destroy', $row->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModal"
                                            style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                            Kirim Peringatan</h5>
                                        <button type="button" class="close text-black" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex align-items-center col-12">
                                        <!-- Tambahkan kelas "align-items-center" -->
                                        <div class="col-4">
                                            <img style="margin-left: -50%;" class="rounded-circle mb-1"
                                                src="{{ asset('images/alasan.png') }}" width="250px" height="180px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="widget-49-meeting-info">

                                            </div>
                                            <textarea class="form-control" style="border-radius: 15px" name="alasan" rows="5" placeholder="Alasan"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light text-light"
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
                    <div class="modal fade" id="blockModalReply{{ $item->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <form action="{{ route('replyComment.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="reportModal"
                                            style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                            Kirim Peringatan</h5>
                                        <button type="button" class="close text-black" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body d-flex align-items-center col-12">
                                        <!-- Tambahkan kelas "align-items-center" -->
                                        <div class="col-4">
                                            <img style="margin-left: -50%;" class="rounded-circle mb-1"
                                                src="{{ asset('images/alasan.png') }}" width="250px" height="180px">
                                        </div>
                                        <div class="col-md-8">
                                            <div class="widget-49-meeting-info">

                                            </div>
                                            <textarea class="form-control" style="border-radius: 15px" name="alasan" rows="5" placeholder="Alasan"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light text-light"
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
                                <form action="{{ route('report.reply.comment', $item->id) }}" method="POST">
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
                                            <textarea class="form-control rounded-5" style="margin-left: 1em; border-radius: 15px;" name="description"
                                                rows="5" placeholder="Alasan..."></textarea>
                                        @endif
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-light text-light"
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
                close:false,
                progressBarColor: 'white',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('formDelete' + num).submit();
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

        function confirmationReply(num) {
            iziToast.show({
                backgroundColor: 'red',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin mengahpus komentar?',
                position: 'topCenter',
                close:false,
                progressBarColor: 'white',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('replyDelete' + num).submit();
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
