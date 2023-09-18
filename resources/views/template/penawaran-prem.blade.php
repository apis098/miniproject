@extends('template.nav')
@section('content')
    <link rel="stylesheet" href="{{ asset('css/premium/style.css') }}">


    <!--===================================
        =            Pricing Table            =
        ====================================-->

    <section class="section pricing">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-item animated-card">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title change-color">
                                <h6>Mengapa bergabung premium?</h6>
                            </div>
                        </div>
                        <div class="pricing-body animated-card">
                            <!-- Feature List -->
                            <ul class="feature-list m-0 p-0">
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Membuka resep premium</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Akses untuk video feed premium </p>
                                </li>
                                <li>
                                    <p><span class="fa fa-times-circle unavailable"></span>Certificate</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-times-circle unavailable"></span>Easy Access</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h3>Dapatkan <span class="alternate">premium anda</span></h3>
                        <p>dibawah ini adalah beberapa pilihan premium untuk anda</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="pricing-item animated-card">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title change-color">
                                <h6>pemula</h6>
                            </div>
                            <!-- Price -->
                            <div class="price change-color">
                                <h2><span>Rp</span>14.900</h2>
                                <p class="change-color">/1 bulan</p>
                            </div>
                        </div>
                        <div class="pricing-body animated-card">
                            <!-- Feature List -->
                            <ul class="feature-list m-0 p-0">
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Membuka resep premium</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Akses untuk video feed premium </p>
                                </li>
                                <li>
                                    <p><span class="fa fa-times-circle unavailable"></span>Certificate</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-times-circle unavailable"></span>Easy Access</p>
                                </li>
                            </ul>
                        </div>
                        <div class="pricing-footer text-center">
                            <a href="#" class="btn btn-transparent-md">Beli Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <!-- Pricing Item -->
                    <div class="pricing-item animated-card">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title  change-color">
                                <h6>Standar</h6>
                            </div>
                            <!-- Price -->
                            <div class="price change-color">
                                <h2><span>Rp</span>59.900</h2>
                                <p class="change-color">/3 bulan</p>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <!-- Feature List -->
                            <ul class="feature-list m-0 p-0">
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Membuka resep premium</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Akses untuk video feed premium </p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Certificate</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-times-circle unavailable"></span>Easy Access</p>
                                </li>
                            </ul>
                        </div>
                        <div class="pricing-footer text-center">
                            <a href="#" class="btn btn-transparent-md">Beli sekarang!</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 m-auto">
                    <!-- Pricing Item -->
                    <div class="pricing-item animated-card">
                        <div class="pricing-heading">
                            <!-- Title -->
                            <div class="title change-color">
                                <h6>platinum</h6>
                            </div>
                            <!-- Price -->
                            <div class="price change-color">
                                <h2><span>Rp</span>169.900</h2>
                                <p class="change-color">/1 tahun</p>
                            </div>
                        </div>
                        <div class="pricing-body">
                            <!-- Feature List -->
                            <ul class="feature-list m-0 p-0">
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Membuka resep premium</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Akses untuk video feed premium </p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Certificate</p>
                                </li>
                                <li>
                                    <p><span class="fa fa-check-circle available"></span>Easy Access</p>
                                </li>
                            </ul>
                        </div>
                        <div class="pricing-footer text-center">
                            <a href="#" class="btn btn-transparent-md">Beli sekarang!</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--====  End of Pricing Table  ====-->
@endsection
