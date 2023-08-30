    @extends('layouts.navbar')

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
                            <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_user }}</h6>
                            <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                        </div>
                        <i class="fas fa-user-circle fa-3x"></i>
                    </div>
                </div>

                <div class="col-sm-3 col-lg-3" style="margin-left: 1em">
                    <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1">
                            <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_resep }}</h6>
                            <p class="mb-2" style="font-size: 14px; font-weight: bold;">Resep</p>
                        </div>
                        <i class="fas fa-book fa-3x"></i>
                    </div>
                </div>
                <div class="col-sm-3 col-lg-3" style="margin-left: 1em">
                    <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card"
                        style="border: 1px solid #333;">
                        <div class="ms-1">
                            <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_report }}</h6>
                            <p class="mb-2" style="font-size: 14px; font-weight: bold;">Laporan</p>
                        </div>
                        <i class="fas fa-flag-o fa-3x"></i>
                    </div>
                </div>
            </div>
            <div class="row mt-3 me-2">
                <!-- Example single danger button -->
                <div class="col-lg-10" style="margin-left: 15em">
                    <div class="btn-group">
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
                    </div>
                    <div style="max-width:940px; margin: 0 auto;">
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
                            label: 'Total',
                            data: @json($month),
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
                    <h5 class="fw-bold" style="margin-left: 11.5em; margin-bottom: 1;">Resep Baru Dari Koki</h5>
                    <h5 class="fw-bold" style="margin-left: 16.2em; margin-bottom: 1;">Laporan Pengguna</h5>
                </div>

                <div class="row g-4 mb-5 ml-5" style="margin-left: 3em; ">
                    <div class="col-12 col-md-6 col-xl-5 ms-auto ms-5" style="mar">
                        <div class="h-100 rounded-4 p-4 border border-dark border-2 ">
                            <div class="d-flex align-items-center justify-content-start mb-2">
                            </div>
                            <div class="overflow-auto" style="height: 250px;">
                            @foreach ($reseps as $rsp)
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

                            @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-xl-5 ms-3">
                        <div class="h-100 rounded-4 p-4 border border-dark border-2" style="background-color: white">
                            <div class="d-flex align-items-center justify-content-start mb-2">
                            </div>
                            <div class="overflow-auto" style="height: 250px">
                            @foreach ($reports as $r)
                                <!-- Konten laporan terbaru -->
                                <div class="border-bottom py-3">
                                    <a href="#" class="text-decoration-none d-flex text-dark">
                                        @if ($r->user->foto)
                                            <img class="rounded-circle flex-shrink-0"
                                                src="{{ asset('storage/' . $r->user->foto) }}" alt="{{ $r->user->foto }}"
                                                style="width: 40px; height: 40px;"> \
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
                            @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <!-- Widgets End -->
    @endsection
