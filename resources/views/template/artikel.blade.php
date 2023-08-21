@extends('template.nav')
@section('content')
    <div class="row">
        <div class="col-lg-10">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-3">
                        <img style="border-radius: 9999px; border: 0.50px black solid"
                            src="{{ asset('storage/' . $show_resep->foto_resep) }}" />
                    </div>
                    <div class="col-lg-9 my-5">
                        <div>
                            <h4>{{ $show_resep->nama_resep }}</h4>
                            <span>Oleh {{ $show_resep->User->name }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-2">
            <button type="submit" class="btn btn-light my-5" style="border: 1px solid black">Sukai</button>
        </div>
    </div>
    <div class="row mt-2 container mx-5">
        <div class="col-lg-4">
            <h4>Durasi</h4>
            <div class="card p-3" style="border-radius: 30px; border: 0.50px black solid">
                <div class="row my-1 container">
                    <div class="col-10 ">
                        <span class="ms-3 my-auto"
                            style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            {{ $show_resep->lama_memasak }}
                        </span> <br>
                    </div>
                    <div class="col-2 my-3">
                        <i class="fa-regular fa-clock fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4>Pengeluaran</h4>
            <div class="card p-3" style="border-radius: 30px; border: 0.50px black solid">
                <div class="row my-1 container">
                    <div class="col-10">
                        <span class="ms-3"
                            style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            RP{{ number_format($show_resep->pengeluaran_memasak, 2, ',', '.') }}
                        </span> <br>
                    </div>
                    <div class="col-2 my-3">
                        <i class="fa-solid fa-money-bill fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <h4>Porsi</h4>
            <div class="card p-3" style="border-radius: 30px; border: 0.50px black solid">
                <div class="row my-1 container">
                    <div class="col-10">
                        <span class="ms-3"
                            style="color: black; font-size: 28px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            {{ $show_resep->porsi_orang }} Orang
                        </span> <br>
                    </div>
                    <div class="col-2 my-3">
                        <i class="fa-solid fa-plate-wheat fa-2xl"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs container mt-5" id="myTab" role="tablist">
        <li class="nav-item mr-5" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                <h5>Home</h5>
            </button>
        </li>
        <li class="nav-item mr-5" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button"
                role="tab" aria-controls="profile-tab-pane" aria-selected="false">
                <h5>Bahan - Bahan</h5>
            </button>
        </li>
        <li class="nav-item mr-5" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button"
                role="tab" aria-controls="contact-tab-pane" aria-selected="false">
                <h5>Langkah - Langkah</h5>
            </button>
        </li>
    </ul>
    <div class="tab-content container" id="myTabContent">
        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
            <div class="card-body mb-5">
                {{ $show_resep->deskripsi_resep }}
            </div>
        </div>
        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <h4 class="mt-2">Bahan</h4>
            <div class="row">
                @foreach ($show_resep->bahan as $b)
                    <div class="col-lg-4 mx-1 rounded p-2" style="border: 1px solid black;">
                        <h6>{{ $b->nama_bahan }}</h6> 
                        <span>{{ $b->takaran_bahan }}</span>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
            @foreach ($show_resep->langkah as $n => $l)
                <div class="card-body">
                    {{$n+=1}}
                    <img class="mr-4" src="{{ asset('storage/' . $l->foto_langkah) }}" alt="{{ $l->foto_langkah }}" style="border-radius: 15px;">
                    {{ $l->deskripsi_langkah }}
                </div>
            @endforeach
        </div>
    </div>
@endsection
