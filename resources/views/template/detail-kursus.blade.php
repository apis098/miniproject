    @extends('template.nav')
    @section('content')
        <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
            integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
        <!-- Make sure you put this AFTER Leaflet's CSS -->
        <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
        <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.css" />
        <script src="https://unpkg.com/leaflet-routing-machine@3.2.12/dist/leaflet-routing-machine.js"></script>
        <style>
            h1,
            h2,
            h3 {
                font-family: "poppins", sans-serif
            }

            .rating {
                font-size: 20px;
            }

            .fas.fa-star {
                color: #ccc;
                /* Warna saat bintang belum terisi */
            }

            .fas.fa-star.actived {
                color: #fdd835;
            }

            /* Warna saat bintang sudah terisi */
            ul.list-item li p span.available {
                color: #f7941e;
            }

            ul.list-item {
                list-style: none;
                column-count: 2;
                /* Mengatur jumlah kolom menjadi 3 */
                column-gap: 20px;
                /* Jarak antara kolom */
                /* Menghilangkan marker pada elemen <ul> dengan class "list-item" */
            }

            ul.list-item li {
                list-style: none;
                margin-bottom: 10px;
                /* Menghilangkan marker pada elemen <li> yang berada dalam <ul> dengan class "list-item" */
            }
        </style>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col lg-6 mb-5 my-5">
                        <h3 class="mb-3"><b> {{ $detail_course->nama_kursus }} </b></h3>

                        <button type="button"class="btn"
                            style=" background: #F7941E;color:white;
                            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                            @foreach ($detail_course->jenis_kursus as $item)
                                {{ $item->jenis_kursus }}
                            @endforeach
                        </button>
                        <div class="my-3 mt-3">
                            <p>
                                {{ $detail_course->deskripsi_kursus }}
                            </p>
                            <div class="d-flex mb-2">
                                <div>

                                    <span style="color: blue;font-size:15px">({{ $detail_course->total_rating() }}
                                        ratings)</span>
                                    <span class="mx-3" style="font-size: 15px">{{ $detail_course->total_murid() }}
                                        siswa</span>
                                </div>
                            </div>
                            <p class="fw-bold">Dibuat oleh {{ $detail_course->user->name }}</p>
                        </div>
                        <div class="mt-3">
                            <h3><b>Lokasi kursus</b></h3>
                            <button type="button" class="btn mt-3" style=" border-radius: 15px; border: 1px black solid">
                                <i class="fas fa-regular fa-location-dot"></i> {{ $detail_course->nama_lokasi }}
                            </button>
                        </div>
                        <br>
                        <div id="map" class="mb-4" style="height: 300px;">
                        </div>
                        <script>
                            if (navigator.geolocation) {
                                navigator.geolocation.getCurrentPosition((posisi) => {
                                    var map = L.map('map');

                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                        attribution: '© OpenStreetMap contributors'
                                    }).addTo(map);

                                    let latitude = posisi.coords.latitude;
                                    let longitude = posisi.coords.longitude;

                                    let lat = {{ $detail_course->latitude }}
                                    let long = {{ $detail_course->longitude }}

                                    L.Routing.control({
                                        waypoints: [
                                            L.latLng(latitude, longitude),
                                            L.latLng(lat, long)
                                        ],
                                        routeWhileDragging: true,
                                        draggableWaypoints: false // mencegah titik tempat diubah.
                                    }).addTo(map);

                                });
                            }
                        </script>

                        <div>
                            <h3 class="fw-bold mb-3">Apa yang akan kamu pelajari</h3>
                            <div>
                                <ul class="list-item">
                                    <li>
                                        @foreach ($detail_session_course as $belajar)
                                            <p style="color:#000;"><span
                                                    class="fa fa-check-circle available mx-1"></span>{{ $belajar->judul_sesi }}
                                            </p>
                                        @endforeach
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <style>
                            .accordion {
                                background-color: transparent;
                                color: #444;
                                cursor: pointer;
                                padding: 5px;
                                width: 100%;
                                border: 0.01ch #777 solid;
                                text-align: left;
                                border-radius: 10px;
                                outline: none;
                                font-size: 15px;
                                transition: 0.4s;
                                display: flex;
                                justify-content: space-between;
                                align-items: center;
                            }

                            .active,
                            .accordion:hover {
                                background-color: transparent;
                            }

                            .accordion::before {
                                content: '\f107';
                                color: #777;
                                font-weight: bold;
                                font-family: 'FontAwesome';
                                margin-left: 10px;
                            }

                            .active::before {
                                content: '\f106';
                            }

                            .panel {
                                background-color: white;
                                max-height: 0;
                                overflow: hidden;
                                transition: max-height 0.2s ease-out;
                            }

                            .accordion b {
                                margin-left: -65%;
                            }

                            .card {
                                border: 1px solid #777;
                                overflow: hidden;
                                border-radius: 10px;
                            }

                            .accordion-collapse {
                                max-height: 0;
                                overflow: hidden;
                                transition: max-height 0.3s ease-in-out;
                                /* Animasi dengan efek slide */
                            }
                        </style>
                        <h3 class="fw-bold mb-3">Sesi Kursus</h3>
                        @foreach ($detail_session_course as $content_course)
                            <div class="card">
                                <button class="accordion active"> <b>{{ $content_course->judul_sesi }} <br> <small>{{ date('d F Y', strtotime($content_course->tanggal)) . " " . $content_course->waktu }}</small></b>
                                    @if ($content_course->lama_sesi >= 60)
                                        <span>{{ number_format($content_course->lama_sesi / 60, 1) }}
                                            jam</span>
                                    @else
                                        <span>{{ $content_course->lama_sesi }}
                                            {{ $content_course->informasi_lama_sesi }}</span>
                                    @endif
                                </button>
                                <div class="panel">
                                    <table class="table table-borderless">
                                        <tbody>
                                            @foreach ($content_course->detail_sesi as $nomer => $detail_session)
                                                <tr>
                                                    <th scope="row" style="width: 5%;text-align: center;">
                                                        {{ $nomer += 1 }}</th>
                                                    <td>{{ $detail_session->detail_sesi }}</td>
                                                    <td style="width: 20%;text-align: end;">
                                                        @if ($detail_session->lama_sesi >= 60)
                                                            <span>{{ $detail_session->lama_sesi / 60 }}
                                                                {{ $detail_session->informasi_lama_sesi }}</span>
                                                        @else
                                                            <span>{{ $detail_session->lama_sesi }}
                                                                {{ $detail_session->informasi_lama_sesi }}</span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br>
                        @endforeach
                    </div>
                    <div class="col-xl-3 col-sm-4 mb-4 my-4">
                        <div class="card" style="">
                            <div class="card-body">
                                <div class="text-center">
                                    @if ($detail_course->user->foto)
                                        <img src="{{ asset('storage/' . $detail_course->user->foto) }}" alt=""
                                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
                                            style="width: 50%; height: 50%;">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt=""
                                            class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm"
                                            style="width: 50%; height: 50%;">
                                    @endif
                                    <!-- button modal laporkan kursus -->
                                    @if(Auth::check())
                                    @if($detail_course->user->id != Auth::user()->id)
                                    <button type="button"
                                        class="btn btn-light zoom-effects text-light btn-sm rounded-circle p-2"
                                        style="position: absolute; right: 65px; background-color:#F7941E;"
                                        data-toggle="modal" data-target="#modalLaporkanKursus">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                            viewBox="0 0 20 20">
                                            <path fill="currentColor"
                                                d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                        </svg>
                                    </button>
                                    @endif
                                    @else
                                    <button type="button"
                                    class="btn btn-light zoom-effects text-light btn-sm rounded-circle p-2"
                                    style="position: absolute; right: 65px; background-color:#F7941E;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 20 20">
                                        <path fill="currentColor"
                                            d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                    </svg>
                                </button>
                                    @endif
                                    <div class="modal fade" id="modalLaporkanKursus" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    Laporkan Kursus
                                                    <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                </div>
                                                <div class="modal-body">
                                                <form action="{{route('report.course',$detail_course->id)}}" method="post">
                                                    @csrf
                                                    <label for="laporkan" class="form-label"></label>
                                                    <textarea name="laporkan" id="laporkan" class="form-control" cols="30" rows="10" required></textarea>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="submit"
                                                    style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);margin-left: 30px;"
                                                    class="btn btn-sm text-light me-5"><b class="me-3 ms-3">Kirim</b></button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <h5 class="mb-0">
                                        <a href="#" style="color: black">
                                            {{ $detail_course->user->name }}
                                        </a>
                                    </h5>
                                    <div class="d-flex justify-content-center mt-2 ">
                                        <i class="fas fa-star actived"></i>
                                        <p>{{ $detail_course->rate() }}

                                            ({{ $detail_course->total_ulasan() }} ulasan)</p>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <span class="fw-bold">Di kursus ini diajari:</span>
                                    <ul class="list-item">
                                        @foreach ($detail_course->sesi as $index => $detail)
                                            @if ($index < 3)
                                                <li style="color: #000; margin-bottom: 10px;"><span
                                                        class="fa fa-check-circle available"></span>{{ $detail->judul_sesi }}
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                    <span class="fw-bold">Waktu Kursus Dimulai:</span>
                                    <p>{{ date('d F Y', strtotime($detail_course->tanggal_dimulai_kursus)) }}</p>
                                    <span class="fw-bold">Waktu Kursus Berakhir:</span>
                                    <p>{{ date('d F Y', strtotime($detail_course->tanggal_berakhir_kursus)) }}</p>
                                    <span class="fw-bold">Harga rata-rata per sesi:</span>
                                    <p>Rp. {{ number_format($rata2_harga, 2, ',', '.') }}</p>
                                </div>
                                <div class="text-center mt-3 d-flex justify-content-center container mx-2">
                                    @if (Auth::user())
                                        {{-- untuk koki pemilik kursus --}}
                                        @if (Auth::user()->id == $detail_course->user->id)
                                            <form action="{{ route('kursus.edit', $detail_course->id) }}">
                                                <button type="submit" class="btn text-light zoom-effects"
                                                    style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                        class="ms-3 me-3">Edit</b></button>
                                            </form>
                                        @else
                                            {{-- untuk koki lain atau user lain --}}
                                            @if ($count_session >= 1)
                                                @if ($detail_course->isBuy(Auth::user()->id))
                                                    <a href="" type="button" class="btn text-light zoom-effects mx-1"
                                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                            class="ms-3 me-3">Sudah dibeli</b></a>
                                                @else
                                                    @if ($detail_course->tanggal_dimulai_kursus >= Carbon\Carbon::now())
                                                    <a href="{{ route('reservasi.kursus', $detail_course->id) }}"
                                                        type="button" class="btn text-light zoom-effects mx-1"
                                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                            class="ms-3 me-3">Pesan</a>
                                                            @else
                                                            <a href=""
                                                                type="button" class="btn text-light zoom-effects mx-1"
                                                                style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                                    class="ms-3 me-3">Kadaluarsa</a>
                                                            @endif

                                                @endif
                                            @else
                                                <a href="" type="button" class="btn text-light zoom-effects mx-1"
                                                    style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                        class="ms-3 me-3">Belum ada sesi kursus</b></a>
                                            @endif

                                        @endif
                                    @else
                                        {{-- untuk yang belum login --}}
                                        <button type="button" class="btn text-light zoom-effects mx-1"
                                            style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                class="ms-3 me-3">Pesan</b></button>
                                    @endif
                                   @if (Auth::check())
                                   {{Auth::user()->isFavoriteCourse($detail_course->id)}}
                                   @if (Auth::user()->isFavoriteCourse($detail_course->id))
                                   <button type="submit" class="btn text-dark mx-1"
                                   style="border: 1px solid #000; border-radius: 15px;"><b
                                       class="ms-3 me-3"><i id="bookmark" onclick="favoriteKursus()" class="fa-regular fa-solid fa-bookmark"></i></b></button>
                                   @else
                                   <button type="submit" class="btn text-dark mx-1"
                                   style="border: 1px solid #000; border-radius: 15px;"><b
                                       class="ms-3 me-3"><i id="bookmark" onclick="favoriteKursus()" class="fa-regular fa-bookmark"></i></b></button>
                                   @endif

                                @else
                                <button type="submit" class="btn text-dark mx-1"
                                style="border: 1px solid #000; border-radius: 15px;"><b
                                    class="ms-3 me-3"><i id="bookmark" class="fa-regular fa-bookmark"></i></b></button>
                                   @endif
                                </div>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="my-3 mt-3">
                    <h3><b>Deskripsi</b></h3>
                </div>

                <div class="w-75"
                    style=" color: black; font-size:17px; font-family: Poppins; font-weight: 400; letter-spacing: 0.50px; word-wrap: break-word">
                    <p>{{ $detail_course->deskripsi_kursus }}</p>
                </div>

                {{-- <div class="card mb-5" style="width: 77%;margin-top:-15px;border-radius:15px;">
                    <div class="card-body mx-5">
                        <div class="row">
                            <div class="col-lg-3 mx-4">
                                <h5><b>Tarif per jam</b></h5>
                                <p>Rp. {{ number_format($detail_course->tarif_per_jam, 2, ',', '.') }}</p>
                            </div>
                            <div class="col-xl-4 mx-3">
                                <h5><b>Tarif paket</b></h5>
                                @foreach ($detail_course->paket_kursus as $item)
                                    <p>
                                        @if ($item->waktu >= 60)
                                            {{ number_format($item->waktu / 60, 1) }} Jam
                                        @else
                                            {{ $item->waktu }} Menit
                                        @endif
                                        = {{ number_format($item->harga, 2, ',', '.') }}
                                    </p>
                                @endforeach
                            </div>
                            <div class="col-lg-3 mx-4">
                                <h5><b>Waktu kursus</b></h5>
                                <p>0 menit</p>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <br> <br>
                @if (Auth::check())
                    @if ($detail_course->isBuy(Auth::user()->id))
                        <div class="my-4 mt-4">
                            <h3><b>Ulasan</b></h3>
                        </div>
                        <div class="col-10 mb-5">
                            {{-- @if (Auth::check()) --}}
                            <form method="POST"
                                action="{{ route('ulasan-rating-kursus.store', [$detail_course->id, $detail_course->user->id, Auth::user()->id]) }}">
                                @csrf
                                <input type="hidden" name="rating" id="ratingKursuses">
                                <div class="input-group" style="margin-left: -15px;">
                                    <input type="text" id="reply" name="ulasan" maxlength="255"
                                        style="border-radius: 10px;width: 150px;" {{-- $userLog === 1 ? 'disabled' : '' --}}
                                        class="form-control" placeholder="{{-- $userLog === 1 ? 'Tambah Komentar' : 'Tambah Komentar' --}}">
                                    <button type="button" data-toggle="modal" data-target="#modalBeriRating"
                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);margin-left: 30px;"
                                        class="btn btn-sm text-light me-5"><b class="me-3 ms-3">Kirim</b></button>
                                </div>
                                <div class="modal fade" id="modalBeriRating" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="reportModal"
                                                    style=" font-size: 22px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                    Beri Rating</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <div class="rating text-center">
                                                <i class="fas fa-xl kejora fa-star"></i>
                                                <i class="fas fa-xl kejora fa-star"></i>
                                                <i class="fas fa-xl kejora fa-star"></i>
                                                <i class="fas fa-xl kejora fa-star"></i>
                                                <i class="fas fa-xl kejora fa-star"></i>
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                        <button type="submit"
                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);margin-left: 30px;"
                                        class="btn btn-sm text-light me-5"><b class="me-3 ms-3">Kirim</b></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                @endif

                @foreach ($ulasan_kursus as $review)
                    <div class="card mb-5" style="width: 77%;margin-top:-15px;border-radius:15px;">
                        <div class="card-body">
                            <div class="row">
                                <div class="d-flex">
                                    @if ($review->user->foto)
                                        <img src="{{ asset('storage/' . $review->user->foto) }}" alt=""
                                            width="5%" height="5%"
                                            class="img-fluid rounded-circle mb-3 shadow-sm">
                                    @else
                                        <img src="{{ asset('images/default.jpg') }}" alt="" width="5%"
                                            height="5%" class="img-fluid rounded-circle mb-3 shadow-sm">
                                    @endif
                                    <p class="text center my-1 mx-3"><b>{{ $review->user->name }}</b></p>
                                    <div class="d-flex ml-auto">
                                    @if (Auth::check())
                                    @if(Auth::user()->id === $review->user->id)

                                        {{-- untuk edit ulasan&rating --}}
                                        <svg data-toggle="modal" data-target="#modalEditUlasan{{$review->id}}" width="23" height="23" viewBox="0 0 28 27" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                            fill="#F7941E" />
                                        <path
                                            d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                            fill="white" />
                                    </svg>
                                    <div class="modal fade" id="modalEditUlasan{{$review->id}}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h2>Edit Ulasan&Rating</h2>
                                                <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('update.ulasan', $review->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="ulasan" class="form-label">Ulasan</label>
                                                        <input type="text" name="ulasan" id="ulasan" class="form-control" value="{{ $review->ulasan }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="rating" class="form-label">Rating</label>
                                                        <input type="hidden" value="{{$review->rating}}" name="rating" id="editReview{{$review->id}}">
                                                        <div class="rating text-center">
                                                            @if ($review->rating >= 1)
                                                                <i class="fas fa-xl fa-star kejora actived" onclick="editReview({{$review->id}}, 1)"></i>
                                                            @else
                                                            <i class="fas fa-xl kejora fa-star" onclick="editReview({{$review->id}}, 1)" ></i>
                                                            @endif
                                                            @if ($review->rating >= 2)
                                                            <i class="fas fa-xl fa-star kejora actived"onclick="editReview({{$review->id}}, 2)" ></i>
                                                            @else
                                                            <i class="fas fa-xl kejora fa-star"onclick="editReview({{$review->id}}, 2)"></i>
                                                            @endif
                                                            @if($review->rating >= 3)
                                                            <i class="fas fa-xl kejora fa-star actived" onclick="editReview({{$review->id}}, 3)"></i>
                                                            @else
                                                            <i class="fas fa-xl kejora fa-star"onclick="editReview({{$review->id}}, 3)" ></i>
                                                            @endif
                                                            @if($review->rating >=4)
                                                            <i class="fas fa-xl kejora fa-star actived"onclick="editReview({{$review->id}}, 4)" ></i>
                                                            @else
                                                            <i class="fas fa-xl kejora fa-star" onclick="editReview({{$review->id}}, 4)"></i>
                                                            @endif
                                                            @if($review->rating >=5)
                                                            <i class="fas fa-xl kejora fa-star actived" onclick="editReview({{$review->id}}, 5)"></i>
                                                            @else
                                                            <i class="fas fa-xl kejora fa-star"onclick="editReview({{$review->id}}, 5)"></i>
                                                            @endif
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                        <button type="submit"
                                        style="background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);margin-left: 30px;"
                                        class="btn btn-sm text-light me-5"><b class="me-3 ms-3">Kirim</b></button>
                                            </div>
                                        </form>
                                            </div>
                                        </div>
                                    </div></div>
                                    {{-- untuk hapus ulasan&rating --}}
                                    <form action="{{ route('delete.ulasan', $review->id) }}" hidden method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" id="hapusUlasan{{$review->id}}" type="submit">Hapus</button>
                                    </form>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24" onclick="konfirmasi_hapus_ulasanrating({{$review->id}})">
                                        <path fill="#B70404" d="M9.525 13.765a.5.5 0 0 0 .71.71c.59-.59 1.175-1.18 1.765-1.76l1.765 1.76a.5.5 0 0 0 .71-.71c-.59-.58-1.18-1.175-1.76-1.765c.41-.42.82-.825 1.23-1.235c.18-.18.35-.36.53-.53a.5.5 0 0 0-.71-.71L12 11.293l-1.765-1.768a.5.5 0 0 0-.71.71L11.293 12Z"/>
                                        <path fill="#B70404" d="M12 21.933A9.933 9.933 0 1 1 21.934 12A9.945 9.945 0 0 1 12 21.933Zm0-18.866A8.933 8.933 0 1 0 20.934 12A8.944 8.944 0 0 0 12 3.067Z"/></svg>
                                    @endif
                                    @endif
                                    <svg class="" width="23" height="19" viewBox="0 0 23 19"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g id="&#240;&#159;&#166;&#134; icon &#34;star full&#34;">
                                            <path id="Vector"
                                                d="M11.6663 15.3L11.458 15.2045L11.2497 15.3L5.05581 18.1388L6.2202 12.2223L6.27683 11.9346L6.05336 11.7447L1.18822 7.61106L7.98022 6.7506L8.22897 6.71908L8.35249 6.50088L11.458 1.01495L14.5636 6.50088L14.6871 6.71908L14.9358 6.7506L21.7278 7.61106L16.8627 11.7447L16.6392 11.9346L16.6958 12.2223L17.8602 18.1388L11.6663 15.3Z"
                                                fill="#F4DD0A" stroke="black" />
                                        </g>
                                        <span class="mx-1">{{ $review->rating }}</span>
                                    </svg>
                                    </div>
                                </div>
                                <p>
                                    {{ $review->ulasan }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        <script>
            function editReview(num, value) {
                document.getElementById("editReview"+num).value = value;
            }
            const stars = document.querySelectorAll('.kejora');
            let rating = 0;

            stars.forEach((star, index) => {
                star.addEventListener('click', () => {
                    if (index === 0 && rating === 1) {
                        // Jika bintang pertama sudah dinyalakan dan diklik lagi, matikan bintang tersebut.
                        rating = 0;
                    } else {
                        rating = index + 1;
                    }

                    stars.forEach((s, i) => {
                        if (i <= index) {
                            s.classList.add('actived');
                        } else {
                            s.classList.remove('actived');
                        }
                    });
                    document.getElementById("ratingKursuses").value = rating;
                    // Di sini Anda bisa mengirim nilai rating ke server atau melakukan tindakan lain sesuai dengan peringkat yang diberikan.
                    console.log(`Anda memberi peringkat: ${rating} bintang`);

                });
            });

        </script>
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
        <script>
            window.onload = function() {
                var acc = document.getElementsByClassName("accordion");
                var i;

                for (i = 0; i < acc.length; i++) {
                    acc[i].addEventListener("click", function() {
                        this.classList.toggle("active");
                        var panel = this.nextElementSibling;

                        if (panel.style.maxHeight) {
                            panel.style.maxHeight = null;
                        } else {
                            panel.style.maxHeight = panel.scrollHeight + "px";
                        }
                    });
                }
            };

            function favoriteKursus()
            {
                $.ajax({
                    url: "{{ route('favorite.kursus', [$detail_course->user->id, $detail_course->id]) }}",
                    method: "POST",
                    headers: {
                        "X-Csrf-Token": "{{ csrf_token() }}"
                    },
                    success: function success(response) {
                        if (response.favorite) {
                            $("#bookmark").removeClass("fa-reguler");
                            $("#bookmark").addClass("fa-solid");
                        } else if(response.unfavorite) {
                            $("#bookmark").removeClass("fa-solid");
                            $("#bookmark").addClass("fa-reguler");
                        }
                    },
                    error: function error(xhr, error, status) {
                        console.log(xhr.responseText);
                    }
                });
            }
            function konfirmasi_hapus_ulasanrating(num)
            {
            iziToast.destroy();
            iziToast.show({
                backgroundColor: '#eea2a6',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'dark',
                messageColor: 'dark',
                message: 'Apakah Anda yakin ingin menghapus ulasan dan rating anda pada kursus ini?',
                position: 'topCenter',
                progressBarColor: 'dark',
                close: false,
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                $("#hapusUlasan"+num).click();
                            }
                        }, toast, 'buttonName');
                    }, false], // true to focus
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function(
                        instance, toast) {
                        instance.hide({}, toast, 'buttonName');
                    }]
                ],
                onOpening: function(instance, toast) {
                    console.info('callback abriu!');
                },
                onClosing: function(instance, toast, closedBy) {
                    console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
                }
            });

            }
        </script>

    @endsection
