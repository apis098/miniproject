@extends('layouts.navbar')

@section('konten')

<style>
    .counter-card {
        border: 1px solid #ddd;
    }

    /* Custom CSS to make the chart fill the screen */

</style>

<!-- Sale & Revenue Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-2">
        <div class="col-sm-4 col-lg-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 counter-card" style="border: 1px solid #333;">
                <div class="ms-1">
                    <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">4997</h6>
                    <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                </div>
                <i class="fas fa-user-circle fa-3x"></i>
            </div>
        </div>

        <div class="col-sm-4 col-lg-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 counter-card" style="border: 1px solid #333;">
                <div class="ms-1">
                    <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">4997</h6>
                    <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                </div>
                <i class="fas fa-book fa-3x"></i>
            </div>
        </div>
        <div class="col-sm-4 col-lg-4">
            <div class="bg-light rounded d-flex align-items-center justify-content-between p-4 counter-card" style="border: 1px solid #333;">
                <div class="ms-1">
                    <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">4997</h6>
                    <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                </div>
                <i class="fas fa-flag-o fa-3x"></i>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div style="max-width: 800px; margin: 0 auto;">
                <canvas id="myBarChart" style="border: 2px solid black;"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('myBarChart').getContext('2d');
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12'],
                datasets: [{
                    label: 'Revenue',
                    data: [4, 4, 1, 5, 1, 2, 1, 2, 3, 4, 4, 2],
                    backgroundColor: 'orange',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    </script>


<!-- Widgets Start -->

<div class="container-fluid pt-4 px-4">
    <div class="row g-4 mb-5">
        <div class="col-sm-12 col-md-6 col-xl-4" style="margin-left: 5em">
            <div class="h-100 bg-light rounded p-4 border border-dark border-2">
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <h6 class="mb-0">keluhan Terbaru</h6>
                </div>
                <div class="border-bottom py-3">
                    <a href="#" class="text-decoration-none d-flex text-dark">
                        <img class="rounded-circle flex-shrink-0" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Nama Saya</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <span>Saya ingin mengajukan sesuatu</span>
                        </div>
                    </a>
                </div>
                <div class="border-bottom py-3">
                    <a href="#" class="text-decoration-none d-flex text-dark">
                        <img class="rounded-circle flex-shrink-0" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Nama Saya</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <span>Saya ingin mengajukan sesuatu</span>
                        </div>
                    </a>
                </div>
                <div class="border-bottom py-3">
                    <a href="#" class="text-decoration-none d-flex text-dark">
                        <img class="rounded-circle flex-shrink-0" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Nama Saya</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <span>Saya ingin mengajukan sesuatu</span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-xl-4" style="margin-left: 10em">
            <div class="h-100 bg-light rounded p-4 border border-dark border-2">
                <div class="d-flex align-items-center justify-content-start mb-2">
                    <h6 class="mb-0">Laporan Terbaru</h6>
                </div>

                <div class="border-bottom py-3">
                    <a href="#" class="text-decoration-none d-flex text-dark">
                        <img class="rounded-circle flex-shrink-0" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Andryansyah</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <span>Saya ingin mengajukan </span>
                        </div>
                    </a>
                </div>

                <div class="border-bottom py-3">
                    <a href="#" class="text-decoration-none d-flex text-dark">
                        <img class="rounded-circle flex-shrink-0" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Andryansyah</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <span>Saya ingin mengajukan</span>
                        </div>
                    </a>
                </div>

                <div class="border-bottom py-3">
                    <a href="#" class="text-decoration-none d-flex text-dark">
                        <img class="rounded-circle flex-shrink-0" src="{{ asset('images/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                        <div class="w-100 ms-3">
                            <div class="d-flex w-100 justify-content-between">
                                <h6 class="mb-0">Andryansyah</h6>
                                <small>1 hari lalu</small>
                            </div>
                            <span>Saya ingin mengajukan </span>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Widgets End -->

@endsection
