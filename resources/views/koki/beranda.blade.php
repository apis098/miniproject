@extends('layouts.nav_koki')
@section('konten')
    <style>
        .counter-card {
            border: 1px solid #ddd;
        }

        /* Custom CSS to make the chart fill the screen */
        .su {
            border-radius: 30px;
        }
    </style>

    <!-- Sale & Revenue Start -->
    <div class=" container-fluid pt-4 px-4 su">
        <div class="row g-2 su">
            <div class="col-sm-3 col-lg-3" style="margin-left: 17em; ">
                <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card"
                    style="border: 1px solid #333;">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">1000</h6>
                        <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengikut</p>
                    </div>
                    <i class="fas fa-user-circle fa-3x"></i>
                </div>
            </div>

            <div class="col-sm-3 col-lg-3" style="margin-left: 1em">
                <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card"
                    style="border: 1px solid #333;">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">100</h6>
                        <p class="mb-2" style="font-size: 14px; font-weight: bold;">Resep</p>
                    </div>
                    <i class="fas fa-book fa-3x"></i>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3" style="margin-left: 1em">
                <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card"
                    style="border: 1px solid #333;">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">2000</h6>
                        <p class="mb-2" style="font-size: 14px; font-weight: bold;">Suka</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 20 20"><path fill="currentColor" d="M1.36 9.495v7.157h3.03l.153.018c2.813.656 4.677 1.129 5.606 1.422c1.234.389 1.694.484 2.531.54c.626.043 1.337-.198 1.661-.528c.179-.182.313-.556.366-1.136a.681.681 0 0 1 .406-.563c.249-.108.456-.284.629-.54c.16-.234.264-.67.283-1.301a.682.682 0 0 1 .339-.57c.582-.337.87-.717.93-1.163c.066-.493-.094-1.048-.513-1.68a.683.683 0 0 1 .176-.936c.401-.282.621-.674.676-1.23c.088-.886-.477-1.541-1.756-1.672a9.42 9.42 0 0 0-3.394.283a.68.68 0 0 1-.786-.95c.5-1.058.778-1.931.843-2.607c.085-.897-.122-1.547-.606-2.083c-.367-.406-.954-.638-1.174-.59c-.29.062-.479.23-.725.818c-.145.348-.215.644-.335 1.335c-.115.656-.178.952-.309 1.34c-.395 1.176-1.364 2.395-2.665 3.236a11.877 11.877 0 0 1-2.937 1.37a.676.676 0 0 1-.2.03H1.36Zm-.042 8.52c-.323.009-.613-.063-.856-.233c-.31-.217-.456-.559-.459-.953l.003-7.323c-.034-.39.081-.748.353-1.014c.255-.25.588-.368.94-.36h2.185A10.505 10.505 0 0 0 5.99 6.95c1.048-.678 1.82-1.65 2.115-2.526c.101-.302.155-.552.257-1.14c.138-.789.224-1.156.422-1.628c.41-.982.948-1.462 1.69-1.623c.73-.158 1.793.263 2.465 1.007c.745.824 1.074 1.855.952 3.129c-.052.548-.204 1.161-.454 1.844a10.509 10.509 0 0 1 2.578-.056c2.007.205 3.134 1.512 2.97 3.164c-.072.712-.33 1.317-.769 1.792c.369.711.516 1.414.424 2.1c-.106.79-.546 1.448-1.278 1.959c-.057.693-.216 1.246-.498 1.66a2.87 2.87 0 0 1-.851.834c-.108.684-.335 1.219-.706 1.595c-.615.626-1.714.999-2.718.931c-.953-.064-1.517-.18-2.847-.6c-.877-.277-2.693-.737-5.43-1.377H1.317Zm1.701-8.831a.68.68 0 0 1 .68-.682a.68.68 0 0 1 .678.682v7.678a.68.68 0 0 1-.679.681a.68.68 0 0 1-.679-.681V9.184Z"/></svg>
                </div>
            </div>
        </div>
        <div class="row mt-3 me-2">
            <!-- Example single danger button -->
            <div class="col-lg-10" style="margin-left: 15em">
                {{-- <div class="btn-group ">
                    <button type="button" style="width: 10%; margin-left: 34px;border-radius: 15px;background-color: #F7941E; border: none;color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                        class="btn btn-warning dropdown-toggle mb-3" data-bs-toggle="dropdown" aria-expanded="false">
                        @if (request()->has("tahun"))
                            {{ request()->tahun }}
                        @else
                            {{ date('Y') }}
                        @endif
                    </button>
                    <ul class="dropdown-menu">
                        @foreach ($years as $y)
                            <li>
                                <a class="dropdown-item"
                                    href="/admin/dashboard?tahun={{ $y }}">{{ $y }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div> --}}
                <div style="max-width:1000px; margin: 0 auto; margin-top: -5px">
                    <div class="panel h-full xl:col-span-2 w-full">
                        <div class="mb-3 flex items-center dark:text-white-light">
                            <h5 class="text-lg fw-bold">Diagram Pendapatan</h5>
                        </div>
                    </div>
                    <canvas id="myBarChart" style="border: 1px solid black; border-radius: 15px"></canvas>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                        'Oktober', 'November', 'Desember'
                    ],
                    datasets: [{
                        label: 'Total Pendapatan',
                        data: 10,
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

        <div class="container-fluid pt-4 px-4 ms-3">
            <div class="ms-1 " style="display: flex; align-items: center;">
                <h5 class="fw-bold" style="margin-left: 11.5em; margin-bottom: 1;">Komentar Feed Terbaru</h5>
                <h5 class="fw-bold" style="margin-left: 16.2em; margin-bottom: 1;">Komentar Resep Terbaru</h5>
            </div>

            <div class="row g-4 mb-5 ml-5" style="margin-left: 3em; ">
                <div class="col-12 col-md-6 col-xl-5 ms-auto ms-5" style="mar">
                    <div class="h-100 rounded-4 p-4 border border-dark border-2 ">
                        <div class="d-flex align-items-center justify-content-start mb-2">
                        </div>
                        <div class="overflow-auto" style="height: 250px;">
                            {{-- @foreach ($reseps as $rsp)
                            <div class="border-bottom py-3">
                                <a href="#" class="text-decoration-none d-flex text-dark">
                                    <img class="rounded-circle flex-shrink-0" src="{{ asset('storage/'.$rsp->foto_resep) }}"
                                        alt="" style="width: 40px; height: 40px;">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">{{ $rsp->nama_resep }}</h6>
                                            <small>{{ \Carbon\Carbon::parse($rsp->created_at)->locale('id_ID')->diffForHumans() }}</small>

                                        </div>
                                        <span>
                                            Oleh {{ $rsp->user->name }}
                                        </span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                            @forelse ($reseps as $rsp)

                            @empty

                            <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: 2em">
                                    <img src="{{asset('images/data.png')}}" style="width: 15em">
                                    <p style="color: #1d1919"><b>Tidak ada data</b></p>
                                </div>

                            @endforelse --}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-xl-5 ms-3">
                    <div class="h-100 rounded-4 p-4 border border-dark border-2" style="background-color: white">
                        <div class="d-flex align-items-center justify-content-start mb-2">
                        </div>
                        <div class="overflow-auto" style="height: 250px">
                        {{-- @foreach ($reports as $r)
                            <!-- Konten laporan terbaru -->
                            <div class="border-bottom py-3">
                                <a href="#" class="text-decoration-none d-flex text-dark">
                                    @if ($r->user->foto)
                                        <img class="rounded-circle flex-shrink-0"
                                            src="{{ asset('storage/' . $r->user->foto) }}" alt="{{ $r->user->foto }}"
                                            style="width: 40px; height: 40px;">
                                    @else
                                        <img class="rounded-circle flex-shrink-0"
                                            src="{{ asset('images/default.jpg') }}" alt="{{ $r->user->foto }}"
                                            style="width: 40px; height: 40px;">
                                    @endif
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">{{ $r->user->name }}</h6>
                                            <small>{{\Carbon\Carbon::parse($r->created_at)->locale('id_ID')->diffForHumans()}}</small>
                                        </div>
                                        <span>{{ $r->description }}</span>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                        @forelse ($reports as $r)
                        @empty
                            <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                style="margin-top: 2em">
                                <img src="{{asset('images/data.png')}}" style="width: 15em">
                                <p style="color: #1d1919"><b>Tidak ada data</b></p>
                            </div>
                        @endforelse --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
