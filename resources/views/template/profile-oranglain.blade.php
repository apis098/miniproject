@extends('template.nav')
@section('content')
  <style>
    .as{ 
        color: black;
        font-size: 20px;
        font-family: Poppins;
        font-weight: 500;
    }

    .ai{
        color: black;
font-size: 13px;
font-family: Poppins;
font-weight: 400;
word-wrap: break-word;
padding-top:5px
    }
  </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card my-5">
                    <div class="card-body text-center">
                        <img src="{{ asset('Vector.jpg') }}" width="50%" alt="">
                        <p class="mt-4"
                            style="width: 100%; height: 100%; color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                            Boerak smith
                            <span
                                style="width: 100%; height: 100%; color: rgba(0, 0, 0, 0.50); font-size: 16px; font-family: Poppins; font-weight: 400; word-wrap: break-word">Burakcook@gmail.com</span>
                        </p>
                        <button style="border-radius: 15px;" class="btn btn-light border border-dark mb-3">
                            <span style="font-weight: 600">Sukai</span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row mt-5">
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        392
                                    </span> <br>
                                    Suka
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        5
                                    </span> <br>
                                    Resep
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-book fa-flip-horizontal fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-7">
                                    <span
                                        style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                                        392
                                    </span> <br>
                                    Pengikut
                                </div>
                                <div class="col-5 my-3">
                                    <i class="fa-solid fa-user-plus fa-2xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h4 style="font-weight: 600;" class="my-3">Resep dibuat</h4>
                <div class="row mt-5">
                    <div class="col-lg-4 my-2">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-4">
                                    <img src="{{ asset('images/f1.png') }}" width="70px" alt="">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-4">
                                    <img src="{{ asset('images/f1.png') }}" width="70px" alt="">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-4">
                                    <img src="{{ asset('images/f1.png') }}" width="70px" alt="">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-4">
                                    <img src="{{ asset('images/f1.png') }}" width="70px" alt="">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 my-2">
                        <div class="card p-3"
                            style="width: 100%; height: 100%; border-radius: 30px; border: 0.50px black solid">
                            <div class="row my-3">
                                <div class="col-4">
                                    <img src="{{ asset('images/f1.png') }}" width="70px" alt="">
                                </div>
                                <div class=" col-8">
                                    <h3 class="as">
                                        Pizza Italia
                                    </h3>
                                    <span class="ai">
                                        OLeh Boerak Smith
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
