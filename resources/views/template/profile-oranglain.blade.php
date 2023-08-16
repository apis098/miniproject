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
    .modal-body {
        padding: 20px; /* Tambahkan padding untuk menciptakan jarak di sekitar elemen */
    }

    .modal-body img {
        margin-right: 20px; /* Tambahkan margin di sebelah kanan gambar untuk menciptakan jarak */
    }
  </style>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card my-5">
                    <div class="text-center mt-5">
                        <div style="position: relative; display: inline-block;">
                            <img src="{{ asset('sawi.jpg') }}" width="106px" height="104px" style="border-radius: 50%" alt="">
                            <button type="submit" class="btn btn-warning btn-sm  rounded-circle p-2"
                                style="position: absolute; top: -10px; right: -10px;"  data-toggle="modal" data-target="#exampleModalCenter">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                                    <mask id="ipSEdit0">
                                        <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                                            <path stroke-linecap="round" d="M7 42h36" />
                                            <path fill="#fff" d="M11 26.72V34h7.317L39 13.308L31.695 6L11 26.72Z" />
                                        </g>
                                    </mask>
                                    <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSEdit0)" />
                                </svg>
                            </button>
                        </div>
                    </div>
                    <div class="card-body text-center">
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
  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Laporkan Pengguna</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body d-flex align-items-center"> <!-- Tambahkan kelas "align-items-center" -->
            <img src="{{ asset('sawi.jpg') }}" width="106px" height="104px" style="border-radius: 50%" alt="">
            <textarea class="form-control" name="" rows="5" placeholder="Alasan"></textarea>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning">Laporkan</button>
        </div>
      </div>
    </div>
  </div>
  {{-- end modal --}}
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
     <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Include Bootstrap JS (make sure the path is correct) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
