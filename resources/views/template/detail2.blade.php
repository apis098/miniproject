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
</head>

<body>
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        </div>
        </div>
    </nav>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-4"><img class="card-img-top mb-5 mb-md-0" src="{{ asset('images/message.jpg') }}"
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
            <div class="col-md-8">
                <div class="headings d-flex justify-content-between align-items-center mb-3">
                    <h5>Unread comments(6)</h5>

                    <div class="buttons">

                        {{-- <span class="badge bg-white d-flex flex-row align-items-center">
                            <span class="text-primary">Comments "ON"</span>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>

                            </div>
                        </span> --}}

                    </div>

                </div>
                @foreach($replies as $row)
                <div class="card p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="user d-flex flex-row align-items-center">
                            <img src="{{ asset('images/default-profile2.png') }}" width="30"
                                class="user-img rounded-circle mr-2">
                            <span><small class="font-weight-bold text-primary ms-2 me-2">{{$row->user->name}}</small><small
                                    class="font-weight-bold">{{$row->reply}}</small></span>
                        </div>
                        <small>2 days ago</small>
                    </div>
                    <div class="action d-flex justify-content-between mt-2 align-items-center">

                        <div class="reply px-4">
                            <small>Remove</small>
                            <span class="dots"></span>
                            <small>Reply</small>
                            <span class="dots"></span>
                            <small>Translate</small>

                        </div>

                        <div class="icons align-items-center">

                            <i class="fa fa-star text-warning"></i>
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
