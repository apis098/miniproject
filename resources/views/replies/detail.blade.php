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
    <link href="{{ asset('css/style.css') }} " rel="stylesheet">
    <link href="{{ asset('style.css') }} " rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive/responsive.css')}}" rel="stylesheet">
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
    </style>
     <script src="https://cdn.jsdelivr.net/npm/whatwg-fetch@4.0.1/dist/fetch.umd.js"></script>
</head>

<body>

    <div class="top_header_area">
        <div class="container">
            <div class="row">

                <!--  Login Register Area -->
                <div class="col-7 col-sm-6 " style="margin-left: 550px;">
                    <div class="signup-search-area d-flex align-items-center justify-content-end">
                        <div class="login_register_area d-flex">
                            <div class="login text-warning">
                                <a class="text-warning" href="{{route('home')}}">Home</a>
                            </div>
                            <div class="register text-warning">
                             
                                @if (Auth::check())
                                @if (Auth::user()->role == 'Admin')
                                <a class="text-warning" href="{{url('admin/index')}}">Dashboard</a>
                                @else
                                <a class="text-warning" href="{{url('koki/index')}}">Dashboard</a>
                            @endif
                        @else
                        <a class="text-warning" href="{{route('login')}}">Login</a>
                        @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
                            <span><small class="font-weight-semibold text-primary ms-2 me-2"><b>{{$row->user->name}}</b><svg class="text-primary ms-1" xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="currentColor" d="m10.6 16.6l7.05-7.05l-1.4-1.4l-5.65 5.65l-2.85-2.85l-1.4 1.4l4.25 4.25ZM12 22q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-2q3.35 0 5.675-2.325T20 12q0-3.35-2.325-5.675T12 4Q8.65 4 6.325 6.325T4 12q0 3.35 2.325 5.675T12 20Zm0-8Z"/></svg></small><small
                                    class="font-weight-bold">{{$row->reply}}</small></span>
                             @else
                             <span><small class="font-weight-semibold text-primary ms-2 me-2"><b>{{$row->user->name}}</b></small><small
                              class="font-weight-bold">{{$row->reply}}</small></span>
                             @endif
                        </div>
                        @if($repliesCount > 0)
                        <small>{{ $row->created_at->diffForHumans(['short' => false]) }}</small>
                        @endif
                      </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-7 me-2">
                            <small> {{$row->likes}}</small>
                        </div>

                        <div class="icons align-items-center input-group">

                          <form action="{{route('Replies.like',$row->id)}}" method="POST">
                            @csrf
                            <input hidden id="reply_id" name="reply_id" value ="{{$row->id}}" type="text">
                            <input hidden id="complaint_id" name="complaint_id" value ="{{$data->id}}" type="text">
                            <button type="submit" class="btn btn-light text-warning btn-sm rounded-5 "><i class="fa-solid fa-thumbs-up me-2"></i></button>
                          </form>
                          <button type="button" data-toggle="modal" data-target="#Modal{{ $row->id }}" class="btn btn-light text-danger btn-sm rounded-5 "><i class="fa-solid fa-triangle-exclamation me-2"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @foreach ($replies as $row)
            @if ($row->id != '')
            <div class="modal fade" id="Modal{{ $row->id }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content rounded-5">
                        <div class="modal-body rounded-4">
                            <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="text-center mt-1"> <img src="{{ asset('images/allert2.png') }}"
                                            width="220"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-white fw-semibold mt-4">
                                            <div class="mt-2"> <span class="intro-2 text-danger">Form Report Pelanggaran Pedoman Komunitas  </span> </div>
                                            <span class="intro-1">{{ $row->subject }}</span>
                                            {{-- <div class="mt-2"> <span class="intro-2">Balasan yang anda kirim:</span> </div>
                                            <span class="intro-1">test</span> --}}
                                            <form action="{{ route('Report.store') }}" method="POST">
                                                @csrf
                                            <div class="mt-2"> <span class="intro-2">Alasan Report:</span> </div>
                                            <input type="text" class="form-control rounded-3 mt-2" name="description" id="description">
                                            <input type="text" hidden value="{{$row->user->id}}" class="form-control rounded-3 mt-2" name="user_id" id="user_id">
                                            <input type="text" hidden value="{{ $row->id }}" class="form-control rounded-3 mt-2" name="reply_id" id="reply_id">
                                            <div class="mt-4 mb-3"> 
                                                <button type="submit" class="btn btn-danger btn-sm rounded-5">Report <i class="fa-solid fa-triangle-exclamation"></i></button>
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
        @endforeach
        </div>

    </div>
    </section>
    </div>
</body>
<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
 <script src="path_to_jquery.min.js"></script>
 <script src="path_to_moment.min.js"></script>
 <script src="path_to_fullcalendar.min.js"></script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</html>
