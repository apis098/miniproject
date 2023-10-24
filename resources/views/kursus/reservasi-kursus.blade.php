@extends('template.nav')
@section('content')

 <link rel="stylesheet" href="{{ asset('css/premium/style.css') }}">

 <section class="section pricing" style="padding: 10px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Pilih konten <span class="alternate" style="font-style:normal">kursus anda</span></h3>
                    <p>Anda bisa belajar dengan guru yang berpengalaman </p>
                </div>
            </div>
        </div>
        <div class="row">
            {{-- @if ($penawaran_premium->count() == 0)
            <div class="d-flex flex-column justify-content-center align-items-center">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada data</b></p>
            </div>
        @endif --}}
            {{-- @foreach ($penawaran_premium as $item_prem) --}}
                <div class="col-lg-4 col-md-6" style="padding-right: 35px; padding-left: 35px;">
                    <div class="pricing-item animated-card">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title change-color">
                                <h6> tentang nasi{{-- $item_prem->nama_paket --}}</h6>
                            </div>
                            <!-- Price -->
                            <div class="price change-color">
                                <h4><span>Rp</span>20.000 {{-- number_format($item_prem->harga_paket, 2, ',', '.') --}}</h4>
                                <p class="change-color">/Jam</p>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <!-- Feature List -->
                            <ul class="feature-list m-0 p-0">
                                <li>
                                    <p style="color: black;"><span class="">1.1</span>menanak nasi{{-- $item_fiturPrem->detail --}}</p>
                                    <p style="color: black;"><span class="">1.2</span>menggoreng nasi{{-- $item_fiturPrem->detail --}}</p>
                                    <p style="color: black;"><span class="">1.3</span>mengukus nasi{{-- $item_fiturPrem->detail --}}</p>
                                    <p style="color: black;"><span class="">1.4</span>membakar nasi{{-- $item_fiturPrem->detail --}}</p>
                                </li>
                            </ul>
                        </div>
                        <div class="pricing-footer text-center">
                            <a href="#" class="btn btn-transparent-md">pilih</a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

@endsection
