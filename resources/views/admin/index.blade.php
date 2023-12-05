    @extends('layouts.navbar')

    @section('konten')
      <div class="mx-auto my-3">
        <div class="row">
          <div class="col-md-4 col-sm-12">
            <div class="card p-3"style="border: 1px solid #333;border-radius:15px;">
              <div class="d-flex justify-content-between">
                <div class="">
                  <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_user }}</h6>
                  <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                </div>
                <div class="">
                  <i class="fas fa-user-circle fa-3x"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card p-3"style="border: 1px solid #333;border-radius:15px;">
              <div class="d-flex justify-content-between">
                <div class="">
                  <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_user }}</h6>
                  <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                </div>
                <div class="">
                  <i class="fas fa-user-circle fa-3x"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-12">
            <div class="card p-3"style="border: 1px solid #333;border-radius:15px;">
              <div class="d-flex justify-content-between">
                <div class="">
                  <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_user }}</h6>
                  <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengguna</p>
                </div>
                <div class="">
                  <i class="fas fa-user-circle fa-3x"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="d-flex justify-content-between">
          <div class="">
            <select name="" id="" class="form-select"
              style="background-color: #F7941E;border-radius:15px;border: none;color: white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
              <option style="background-color:white;color:black;" value="">
                @if (request()->has('tahun'))
                  {{ request()->tahun }}
                @else
                  {{ date('Y') }}
                @endif
              </option>
              @foreach ($years as $y)
                <option value="" style="background-color:white;color:black;">
                  <a class="dropdown-item" href="/admin/dashboard?tahun={{ $y }}">{{ $y }}</a>
                </option>
              @endforeach
            </select>
          </div>
          <div class="">
            <h5 class="fw-bold">Data Jumlah Pengguna</h5>
          </div>
        </div>
        <canvas class="my-3" id="myBarChart" style="border: 1px solid black; border-radius: 15px;"></canvas>
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h5 class="fw-bold">Resep baru dari koki</h5> <br>
            <div class="card p-3" style="border:1px solid #333;border-radius:15px;height:400px;">
            @foreach ($reseps as $rsp)
              <div class="border-bottom py-3">
                <a href="#" class="text-decoration-none d-flex text-dark">
                  <img class="rounded-circle flex-shrink-0" src="{{ asset('storage/' . $rsp->foto_resep) }}"
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

              <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 2em">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p style="color: #1d1919"><b>Tidak ada data</b></p>
              </div>
            @endforelse
            </div>
          </div>
          <div class="col-sm-12 col-md-6">
            <h5 class="fw-bold">Laporan pengguna</h5> <br>
            <div class="card p-3" style="border: 1px solid #333;border-radius:15px;height:400px;">
                @foreach ($reports as $r)
                <!-- Konten laporan terbaru -->
                <div class="border-bottom py-3">
                  <a href="#" class="text-decoration-none d-flex text-dark">
                    @if ($r->user->foto)
                      <img class="rounded-circle flex-shrink-0" src="{{ asset('storage/' . $r->user->foto) }}"
                        alt="{{ $r->user->foto }}" style="width: 40px; height: 40px;">
                    @else
                      <img class="rounded-circle flex-shrink-0" src="{{ asset('images/default.jpg') }}"
                        alt="{{ $r->user->foto }}" style="width: 40px; height: 40px;">
                    @endif
                    <div class="w-100 ms-3">
                      <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-0">{{ $r->user->name }}</h6>
                        <small>{{ \Carbon\Carbon::parse($r->created_at)->locale('id_ID')->diffForHumans() }}</small>
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
                  <img src="{{ asset('images/data.png') }}" style="width: 15em">
                  <p style="color: #1d1919"><b>Tidak ada data</b></p>
                </div>
              @endforelse
            </div>
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
              label: 'Total Pengguna',
              data: @json($month),
              backgroundColor: 'grey',
            }, {
              label: 'Pengguna Premium',
              data: @json($monthPrem),
              backgroundColor: 'orange',
            }, {
              label: 'Koki Terverifikasi',
              data: @json($monthSuper),
              backgroundColor: 'blue',
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
    @endsection
