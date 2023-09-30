@extends('layouts.nav_koki')
@section('konten')
    <div class=" container-fluid pt-4 px-4 su">
        <div class="row">
            <div class="col-sm-3 col-lg-3"style="margin-left: 17em;">
                <h3 style="font-family:poppins ">Jumlah Pendapatan</h3>
            </div>
        </div>

            <div class="row">
                <div class="col-sm-3 col-lg-3" style="margin-left: 17em;">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Belum diambil</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">28 agustus - 12 september</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">200K</span>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3" style="margin-left: 1em;">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Sudah diambil</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">31 agustus - 12 oktober</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">200K</span>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3" style="margin-left: 1em;">
                    <div class="rounded-4  p-3 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1" style="margin-top: -3%">
                            <h6 class="mb-0" style="font-size: 20px; font-weight: bold;">Jumlah pendapatan</h6>
                            <p class="mb-1 " style="font-size: 14px; font-weight: bold;">28 agustus - 12 desember</p>
                        </div>
                        <span class="d-flex justify-content-end " style="color: black;
                         font-size: 40px; font-weight: 275;">400K</span>
                    </div>
                </div>

            </div>

        </div>
    </div>

@endsection
