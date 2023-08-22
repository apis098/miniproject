@extends('template.nav')
@section('content')
<section class="container">
    <div class="row my-5-3">
        <div class="col-lg-2 mt-3">
            <img src="{{ asset('storage/' . $show_resep->foto_resep) }}" alt="{{ $show_resep->foto_resep }}" width="197px"
                height="187px" style="border-radius: 50%;">
        </div>
        <div class="col-lg-4 mt-5 ml-3">
            <h3 style="font-weight: 600; word-warp: break-word;">{{ $show_resep->nama_resep }}</h3>
            <span>{{ $show_resep->User->name }}</span>
        </div>
        <div class="col-lg-6">

        </div>
    </div>
    <div class="row mx-auto my-5">
        <div class="col-lg-4">
            <h4 style="font-weight: 600; word-warp: break-word;">Durasi</h4>
            <div class="card p-4" style="border-radius: 10px; border: 0.50px black solid">
                <div class="row my-1">
                    <div class="col-7">
                        <span class="ms-3"
                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            {{ $show_resep->lama_memasak }}
                        </span> <br>
                    </div>
                    <div class="col-5 d-flex my-auto flex-row-reverse">
                        <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4 style="font-weight: 600; word-warp:break-word;">Pengeluaran</h4>
            <div class="card p-4" style="border-radius: 10px; border: 0.50px black solid">
                <div class="row my-1">
                    <div class="col-7">
                        <span class="ms-3"
                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            RP{{ number_format($show_resep->pengeluaran_memasak, 2, ',', '.') }}
                        </span> <br>
                    </div>
                    <div class="col-5 d-flex my-auto flex-row-reverse">
                        <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4 style="font-weight: 600; word-warp: break-word;">Porsi</h4>
            <div class="card p-4" style="border-radius: 10px; border: 0.50px black solid">
                <div class="row my-1">
                    <div class="col-7">
                        <span class="ms-3"
                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            {{ $show_resep->porsi_orang }} Orang
                        </span> <br>
                    </div>
                    <div class="col-5 d-flex my-auto flex-row-reverse">
                        <i class="fa-solid fa-thumbs-up fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
    </style>
    <div class="my-5">
        <ul class="nav mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
                <a class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
                    type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                    <h6 style="font-weight: 600; word-warp: break-word;">Deskripsi</h6>
            </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
                    type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
                    <h6 style="font-weight: 600; word-warp: break-word;">Bahan</h6>
            </a>
            </li>
            <li class="nav-item" role="presentation">
                <a class="nav-link mr-5" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
                    type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
                    <h6 style="font-weight: 600; word-warp:break-word;">Langkah - Langkah</h6>
            </a>
            </li>
        </ul>
        <div class="tab-content mb-5" id="pills-tabContent">
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
                                style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
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
                <div class="card-body d-flex flex-row">
                    <div>
                        <img src="{{ asset('storage/'.$item_langkah->foto_langkah) }}" alt="{{ $item_langkah->foto_langkah }}" style="border-radius: 10px;" width="160px" height="160px">
                        <button type="button" style="position: absolute;  left: 260px; bottom: -15px; background-color:#F7941E;"
                        class="btn btn-warning btn-sm text-light rounded-circle p-2">
                        <span class="p-2">{{ $num+=1 }}</span>
                    </button>
                    </div>
                    <div class="my-auto mx-2">
                        {{ $item_langkah->deskripsi_langkah }}
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
