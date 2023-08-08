<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>HummaCook</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous" <!--
        Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
    </style>
     <script src="https://cdn.jsdelivr.net/npm/whatwg-fetch@4.0.1/dist/fetch.umd.js"></script>
</head>

<body>
    <!-- Navigation-->
     <!-- header section strats -->
     {{--  --}}
    <!-- end header section -->
    <!-- Product section-->
    <section class="py-5" style="margin-top: -6%;">
        <div class="container px-5 px-lg-5 my-5">
            <div class="row gx-4 md-8 gx-lg-5 align-items-center">
                <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/replies2.png') }}"
                        alt="..." /></div>
                <div class="col-md-8">
                    {{-- <div class="small mb-1">SKU: BST-498</div> --}}
                    <h2 class="display-5 fw-bolder">{{$data->subject}}</h2>
                    <div class="fs-5 mb-5">
                        {{-- <span class="text-decoration-line-through">$45.00</span> --}}
                        {{-- <span>$40.00</span> --}}
                    </div>
                    <p class="lead">{{$data->description}}</p>
                </div>
                
            </div>
        </div>
    </section>
    <section>
    <div class="container mb-5" style="margin-top:-5%;">
        <div class="row  d-flex justify-content-center">
            <div class="col-md-11">
                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5 class="me-3"> Komentar ({{$repliesCount}})</h5>
                    <div class="col-10">
                        <form method="POST" action="{{ route('ReplyComplaint.store', ['id' => $data->id]) }}">
                        @csrf
                        <div class="input-group">
                        <input type="text" id="reply" name="reply" class="form-control rounded-3 me-3" placeholder="Tambah komentar...">
                        {{-- <button class="btn btn-primary rounded-2 me-2"><i class="fa-solid fa-face-laugh-beam"></i></button> --}}
                        <button type="submit" class="btn btn-warning text-light rounded-5 ms-1"><i class="fa-solid fa-paper-plane"></i></button>
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
                @foreach($replies as $row)
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <img src="{{ asset('images/default-profile2.png') }}" width="30"
                                class="user-img rounded-circle mr-2">
                             @if($row->user->role == 'admin')
                            <span><small class="font-weight-bold text-primary ms-2 me-2"><b>{{$row->user->name}}</b><svg class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z"/></svg></small><small
                                    class="font-weight-bold">{{$row->reply}}</small></span>
                             @else
                             <span><small class="font-weight-bold text-primary ms-2 me-2"><b>{{$row->user->name}}</b></small><small
                              class="font-weight-bold">{{$row->reply}}</small></span>
                             @endif
                        </div>
                        @if($repliesCount > 0)
                        <small>{{ $row->created_at->diffForHumans(['short' => false]) }}</small>
                        @endif
                      </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                          <span class="dots"></span>
                            <small>Like : {{$row->likes}}</small>
                        </div>

                        <div class="icons align-items-center">
                          <form action="{{route('Replies.like',$row->id)}}" method="POST">
                            @csrf
                            <input hidden id="reply_id" name="reply_id" value ="{{$row->id}}" type="text">
                            <input hidden id="complaint_id" name="complaint_id" value ="{{$data->id}}" type="text">
                            <button type="submit" class="btn btn-light text-warning btn-sm rounded-5 "><i class="fa-solid fa-thumbs-up me-2"></i></button>
                          </form>
                            <i class="fa fa-check-circle-o check-icon"></i>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>

    </div>
    </section>
    </div>
</body>

</html>
