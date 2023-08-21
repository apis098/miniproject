@extends('template.nav')
@section('content')
    <style>
        body {
            background-color: #f7f6f6
        }

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

        .badge {

            padding: 7px;
            padding-right: 9px;
            padding-left: 16px;
            box-shadow: 5px 6px 6px 2px #e9ecef;
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

        .form-check-input {
            margin-top: 6px;
            margin-left: -24px !important;
            cursor: pointer;
        }


        .form-check-input:focus {
            box-shadow: none;
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

        .modal-body {
            background-color: #F8DE22;
            border-color: #F8DE22;
        }

        .intro-1 {
            font-size: 20px
        }

        .close {
            color: #fff
        }

        .close:hover {
            color: #fff
        }

        .intro-2 {
            font-size: 13px
        }
        .modal-body {
            padding: 20px;
            /* Tambahkan padding untuk menciptakan jarak di sekitar elemen */
        }

        .modal-body img {
            margin-right: 20px;
            /* Tambahkan margin di sebelah kanan gambar untuk menciptakan jarak */
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
                    <h3 class=" fw-bolder" style="font-family: poppins; margin-top:55px;"><b>{{ $data->subject }}</b></h3>
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
                        <h5 class="me-5  ms-2"><b>Komentar ({{ $repliesCount }})</b></h5>
                        <div class="col-10">
                            <form method="POST" action="{{ route('ReplyComplaint.store', ['id' => $data->id]) }}">
                                @csrf
                                <div class="input-group">
                                    <input type="text" id="reply" name="reply" width="500px"
                                        class="form-control rounded-3 me-5" placeholder="Tambah komentar...">
                                    {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                                    <button type="submit" style="background-color: #F7941E; border-radius:10px;"
                                        class="btn btn-light btn-sm text-light ms-3"><b class="me-3 ms-3">Kirim</b></button>
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
                    @foreach ($replies as $row)
                        <div class="card p-3">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="user d-flex flex-row align-items-center">
                                    @if ($row->user->foto)
                                        <img src="{{ asset('storage/' . $row->user->foto) }}" width="30"
                                            class="user-img rounded-circle mr-2">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" width="30"
                                            class="user-img rounded-circle mr-2">
                                    @endif
                                    @if ($row->user->role == 'admin')
                                        <span><small
                                                class="font-weight-semibold text-primary ms-2 me-2"><b>{{ $row->user->name }}</b><svg
                                                    class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg"
                                                    width="15" height="15" viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z" />
                                                </svg></small><small
                                                class="font-weight-bold">{{ $row->reply }}</small></span>
                                    @else
                                        <span><small
                                                class="font-weight-semibold text-primary ms-2 me-2"><b>{{ $row->user->name }}</b></small><small
                                                class="font-weight-bold">{{ $row->reply }}</small></span>
                                    @endif
                                </div>
                                @if ($repliesCount > 0)
                                    <small>{{ $row->created_at->diffForHumans(['short' => false]) }}</small>
                                @endif
                            </div>
                            <div class="action d-flex justify-content-between mt-2 align-items-center">

                                <div class="reply px-7 me-2">
                                    <small> {{ $row->likes }}</small>
                                </div>

                                <div class="icons align-items-center input-group">

                                    <form action="{{ route('Replies.like', $row->id) }}" method="POST">
                                        @csrf
                                        <input hidden id="reply_id" name="reply_id" value="{{ $row->id }}"
                                            type="text">
                                        <input hidden id="complaint_id" name="complaint_id" value="{{ $data->id }}"
                                            type="text">
                                        @if (
                                            $userLogin &&
                                                $row->likes()->where('user_id', $userLogin->id)->exists())
                                            <button type="submit" class="btn btn-light text-warning btn-sm rounded-5 "><i
                                                    class="fa-solid fa-thumbs-up me-2"></i></button>
                                        @else
                                            <button type="submit" class="btn btn-light text-dark btn-sm rounded-5 "><i
                                                    class="fa-solid fa-thumbs-up me-2"></i></button>
                                        @endif
                                    </form>
                                    <button type="button" data-toggle="modal" data-target="#Modal{{ $row->id }}"
                                        class="btn btn-light text-danger btn-sm rounded-5 "><i
                                            class="fa-solid fa-triangle-exclamation me-2"></i></button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @foreach($replies as $row)
                    @if($row->id != null)
                <!-- Modal -->
                <div class="modal fade" id="Modal{{ $row->id }}"  tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Laporkan foto pengguna</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{ route('Report.store') }}" method="POST">
                                @csrf
                                <div class="modal-body d-flex align-items-center" style="background-color: #ffffff;">
                                    <!-- Tambahkan kelas "align-items-center" -->
                                    @if ($row->user->foto)
                                        <img src="{{ asset('storage/' . $row->user->foto) }}" width="106px" height="104px"
                                            style="border-radius: 50%; border:0.05rem solid rgb(185, 180, 180);" alt="">
                                        <textarea class="form-control" name="description" rows="5" placeholder="Alasan"></textarea>
                                        <input hidden type="text" name="reply_id" value="{{ $row->id }}">
                                        <input hidden type="text" name="user_id" value="{{ $row->user->id }}">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                                            style="border-radius: 50%  border:0.05rem solid rgb(185, 180, 180);" alt="">
                                        <textarea class="form-control rounded-5" name="description" rows="5" placeholder="Alasan..."></textarea>
                                        <input hidden type="text" name="reply_id" value="{{ $row->id }}">
                                        <input hidden type="text" name="user_id" value="{{ $row->user->id }}">
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
                {{-- end modal --}}
                {{-- @foreach ($replies as $row)
                    @if ($row->id != '')
                        <div class="modal fade" id="Modal{{ $row->id }}" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg ">
                                <div class="modal-content rounded-5">
                                    <div class="modal-body rounded-4">
                                        <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-5">
                                                <div class="text-center mt-1"> <img src="{{ asset('images/allert2.png') }}"
                                                        width="220"> </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="text-white fw-semibold mt-4">
                                                    <div class="mt-2"> <span class="intro-2 text-danger">Form Report
                                                            Pelanggaran Pedoman Komunitas </span> </div>
                                                    <span class="intro-1">{{ $row->subject }}</span>
                                             
                                                    <form action="{{ route('Report.store') }}" method="POST">
                                                        @csrf
                                                        <div class="mt-2"> <span class="intro-2">Alasan Report:</span>
                                                        </div>
                                                        <input type="text" class="form-control rounded-3 mt-2"
                                                            name="description" id="description">
                                                        <input type="text" hidden value="{{ $row->user->id }}"
                                                            class="form-control rounded-3 mt-2" name="user_id"
                                                            id="user_id">
                                                        <input type="text" hidden value="{{ $row->id }}"
                                                            class="form-control rounded-3 mt-2" name="reply_id"
                                                            id="reply_id">
                                                        <div class="mt-4 mb-3">
                                                            <button type="submit"
                                                                class="btn btn-danger btn-sm rounded-5">Report <i
                                                                    class="fa-solid fa-triangle-exclamation"></i></button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach --}}

            </div>
        </div>
    </section>
    </div>
    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
