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
                                <div class="rating">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <span style="color: blue;font-size:15px">(100 ratings)</span>
                                    <span class="mx-3" style="font-size: 15px">200 siswa</span>
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
                        <script>
                            const stars = document.querySelectorAll('.fas.fa-star');
                            let rating = 0;

                            stars.forEach((star, index) => {
                                star.addEventListener('click', () => {
                                    if (index === rating) {
                                        // Jika bintang yang sudah diberi peringkat diklik lagi, batalkan peringkat.
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

                                    // Di sini Anda bisa mengirim nilai rating ke server atau melakukan tindakan lain sesuai dengan peringkat yang diberikan.
                                    console.log(`Anda memberi peringkat: ${rating} bintang`);
                                });

                                star.addEventListener('mouseover', () => {
                                    stars.forEach((s, i) => {
                                        if (i <= index) {
                                            s.classList.add('actived');
                                        } else {
                                            s.classList.remove('actived');
                                        }
                                    });
                                });

                                star.addEventListener('mouseout', () => {
                                    stars.forEach((s, i) => {
                                        if (i >= rating) {
                                            s.classList.remove('actived');
                                        }
                                    });
                                });
                            });
                        </script>
                        <div>
                            <h3 class="fw-bold mb-3">Apa yang akan kamu pelajari</h3>
                            <div>
                                <ul class="list-item">
                                    <li>
                                        <p style="color:#000;"><span class="fa fa-check-circle available mx-1"></span>lorem
                                            ipsum von lenong</p>
                                        <p style="color:#000;"><span class="fa fa-check-circle available mx-1"></span>lorem
                                            ipsum von lenong</p>
                                        <p style="color:#000;"><span class="fa fa-check-circle available mx-1"></span>lorem
                                            ipsum von lenong</p>
                                        <p style="color:#000;"><span class="fa fa-check-circle available mx-1"></span>lorem
                                            ipsum von lenong</p>
                                        <p style="color:#000;"><span class="fa fa-check-circle available mx-1"></span>lorem
                                            ipsum von lenong</p>
                                        <p style="color:#000;"><span class="fa fa-check-circle available mx-1"></span>lorem
                                            ipsum von lenong</p>
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

                            }

                            .accordion-collapse {
                                max-height: 0;
                                overflow: hidden;
                                transition: max-height 0.3s ease-in-out;
                                /* Animasi dengan efek slide */
                            }
                        </style>
                        <h3 class="fw-bold mb-3">konten kursus</h3>
                        <div class="card" style="border-radius:10px;">
                            <button class="accordion active"> <b>cara memanggang</b> <span>2 jam 10 menit</span>
                            </button>
                            <div class="panel">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 5%;text-align: center;">1.1</th>
                                            <td>waduh</td>
                                            <td style="width: 20%;text-align: end;">30 menit</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width: 5%;text-align: center;">1.2</th>
                                            <td>ayaiya</td>
                                            <td style="width: 20%;text-align: end;">30 menit</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                        <br>

                        <div class="card" style="border-radius:10px;">
                            <button class="accordion active"> <b>memanggang bebek</b> <span>2 jam 10 menit</span>
                            </button>
                            <div class="panel">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="width: 5%;text-align: center;">1.1</th>
                                            <td>waduh</td>
                                            <td style="width: 20%;text-align: end;">30 menit</td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="width: 5%;text-align: center;">1.2</th>
                                            <td>ayaiya</td>
                                            <td style="width: 20%;text-align: end;">30 menit</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-4 mb-4 my-4">
                        <div class="bg-white shadow-sm py-5 border border-secondary"
                            style="border-radius: 20px; height:40rem;width:20rem">
                            <div class="text-center">
                                @if ($detail_course->user->foto)
                                    <img src="{{ asset('images/' . $detail_course->user->foto) }}" alt=""
                                        width="50%" height="50%"
                                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                @else
                                    <img src="{{ asset('images/default.jpg') }}" alt="" width="50%"
                                        height="50%" class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                                @endif

                                <button type="submit"
                                    class="btn btn-light zoom-effects text-light btn-sm rounded-circle p-2"
                                    style="position: absolute;  right: 55px; background-color:#F7941E;" data-toggle="modal"
                                    data-target="#exampleModalCenter">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22"
                                        viewBox="0 0 20 20">
                                        <path fill="currentColor"
                                            d="M3.5 2.75a.75.75 0 0 0-1.5 0v14.5a.75.75 0 0 0 1.5 0v-4.392l1.657-.348a6.449 6.449 0 0 1 4.271.572a7.948 7.948 0 0 0 5.965.524l2.078-.64A.75.75 0 0 0 18 12.25v-8.5a.75.75 0 0 0-.904-.734l-2.38.501a7.25 7.25 0 0 1-4.186-.363l-.502-.2a8.75 8.75 0 0 0-5.053-.439l-1.475.31V2.75Z" />
                                    </svg>
                                </button>
                                <h5 class="mb-0">
                                    <a href="#" style="color: black">
                                        {{ $detail_course->user->name }}
                                    </a>
                                </h5>
                                <div class="d-flex justify-content-center mt-2 ">
                                    <svg width="23" height="19" viewBox="0 0 23 19" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <g id="&#240;&#159;&#166;&#134; icon &#34;star full&#34;">
                                            <path id="Vector"
                                                d="M11.6663 15.3L11.458 15.2045L11.2497 15.3L5.05581 18.1388L6.2202 12.2223L6.27683 11.9346L6.05336 11.7447L1.18822 7.61106L7.98022 6.7506L8.22897 6.71908L8.35249 6.50088L11.458 1.01495L14.5636 6.50088L14.6871 6.71908L14.9358 6.7506L21.7278 7.61106L16.8627 11.7447L16.6392 11.9346L16.6958 12.2223L17.8602 18.1388L11.6663 15.3Z"
                                                fill="#F4DD0A" stroke="black" />
                                        </g>
                                    </svg>
                                    <p>0 (0 ulasan)</p>
                                </div>
                            </div>

                            <div class="">
                                <div class="col">
                                    <span class="fw-bold ">Di kursus ini:</span>
                                    <ul class="list-item"
                                        style="display: flex; flex-direction: column;margin-bottom:5px;margin-top:15px">
                                        <li>
                                            <p style="color:#000;margin-bottom:10px;margin-left:-30px"><span
                                                    class="fa fa-check-circle available"></span>lorem
                                                ipsum von lenong</p>
                                            <p style="color:#000;margin-bottom:10px;margin-left:-30px"><span
                                                    class="fa fa-check-circle available"></span>lorem
                                                ipsum von lenong</p>
                                        </li>
                                    </ul>
                                    <span class="fw-bold">Harga per sesi:</span>
                                    <p>Rp. {{ number_format($detail_course->tarif_per_jam, 2, ',', '.') }}</p>
                                </div>
                            </div>
                            <div class="text-center">
                                @if (Auth::user())
                                    {{-- untuk koki pemilik kursus --}}
                                    @if (Auth::user()->id == $detail_course->user->id)
                                        <form action="{{ route('kursus.edit', $detail_course->id) }}">
                                            <button type="submit"
                                                class="btn text-light float-center mt-5 mb-3 zoom-effects"
                                                style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                    class="ms-3 me-3">Edit Kursus</b></button>
                                        </form>
                                    @else
                                        {{-- untuk koki lain atau user lain --}}
                                        <button type="submit" class="btn text-light float-center mt-1 mb-3 zoom-effects"
                                            style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                                class="ms-3 me-3">Reservasi kursus</b></button>

                                        <button type="submit" class="btn text-dark float-center mt-1 mb-3 zoom-effects"
                                            style="border:1px solid #000; border-radius: 15px;"><b
                                                class="ms-3 me-3">Tambah favorit</b></button>
                                    @endif
                                @else
                                    {{-- untuk yang belum login --}}
                                    <button type="button" class="btn text-light float-center mt-5 mb-3 zoom-effects"
                                        style="background-color: #F7941E; border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                                            class="ms-3 me-3">Reservasi kursus</b></button>
                                @endif
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle"
                                                style=" font-size: 20px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                                                Laporkan pengguna</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="#" method="POST">
                                            {{-- @csrf --}}
                                            <div class="modal-body d-flex align-items-center">
                                                <!-- Tambahkan kelas "align-items-center" -->
                                                <img src="{{ asset('images/default.jpg') }}" width="20%"
                                                    height="20%" style="border-radius: 50%" alt="">
                                                <textarea class="form-control rounded-5" style="border-radius: 15px" name="description" rows="5"
                                                    placeholder="Alasan..."></textarea>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-light text-light"
                                                    style="border-radius: 15px; background-color:#F7941E;"><b
                                                        class="ms-2 me-2">Laporkan</b></button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            {{-- end modal --}}

                        </div>
                    </div>
                </div>

                <div class="my-3 mt-3">
                    <h3><b>Deskripsi</b></h3>
                </div>

                <div
                    style=" color: black; font-size:17px; font-family: Poppins; font-weight: 400; letter-spacing: 0.20px; word-wrap: break-word">
                    Lorem ipsum dolor sit amet. Qui ipsum laborum ut veritatis officiis ex excepturi laborum et facere
                    dolore.
                    Id unde fugit aut beataenumquam et reprehenderit nobis aut eius dolores ea rerum enim quo quidem sint!
                    Qui
                    ratione placeat ut quibusdam soluta qui dolore dignissimos non dolores quaerat quo voluptatibus itaque.
                    Sit reprehenderit quia in velit incidunt vel suscipit dignissimos a veritatis facere vel vero excepturi.
                    Aut eligendi delectus ut inventore aliquid ea provident velit et debitis voluptas. Sit recusandae
                    voluptas nam omnis velit sit
                    exercitationem molestiae cum unde quae in placeat quisquam.<br />
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

                <div class="my-5 mt-4">
                    <h3><b>Ulasan</b></h3>
                </div>

                <div class="card mb-5" style="width: 77%;margin-top:-15px;border-radius:15px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex">
                                <img src="{{ asset('images/default.jpg') }}" alt="" width="5%"
                                    height="5%" class="img-fluid rounded-circle mb-3 shadow-sm">
                                <p class="text center my-1 mx-3"><b>Kadehara kazuha</b></p>

                                <svg class="ml-auto" width="23" height="19" viewBox="0 0 23 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="&#240;&#159;&#166;&#134; icon &#34;star full&#34;">
                                        <path id="Vector"
                                            d="M11.6663 15.3L11.458 15.2045L11.2497 15.3L5.05581 18.1388L6.2202 12.2223L6.27683 11.9346L6.05336 11.7447L1.18822 7.61106L7.98022 6.7506L8.22897 6.71908L8.35249 6.50088L11.458 1.01495L14.5636 6.50088L14.6871 6.71908L14.9358 6.7506L21.7278 7.61106L16.8627 11.7447L16.6392 11.9346L16.6958 12.2223L17.8602 18.1388L11.6663 15.3Z"
                                            fill="#F4DD0A" stroke="black" />
                                    </g>
                                    <span class="mx-1">5</span>
                                </svg>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet. Qui ipsum laborum ut veritatis officiis ex excepturi laborum et
                                facere dolore. Id unde fugit aut beataenumquam et reprehenderit nobis aut eius dolores ea
                                rerum
                                enim quo quidem sint! Qui ratione placeat ut quibusdam soluta qui dolore dignissimos non
                                dolores
                                quaerat quo voluptatibus itaque. Sit reprehenderit quia in velit incidunt vel suscipit
                                dignissimos a veritatis facere vel vero excepturi. Aut eligendi delectus ut inventore
                                aliquid ea
                                provident velit et debitis voluptas. Sit recusandae voluptas nam omnis velit sit
                                exercitationem
                                molestiae cum unde quae in placeat quisquam.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5" style="width: 77%;margin-top:-15px;border-radius:15px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex">
                                <img src="{{ asset('images/default.jpg') }}" alt="" width="5%"
                                    height="5%" class="img-fluid rounded-circle mb-3 shadow-sm">
                                <p class="text center my-1 mx-3"><b>Raiden Ei</b></p>

                                <svg class="ml-auto" width="23" height="19" viewBox="0 0 23 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="&#240;&#159;&#166;&#134; icon &#34;star full&#34;">
                                        <path id="Vector"
                                            d="M11.6663 15.3L11.458 15.2045L11.2497 15.3L5.05581 18.1388L6.2202 12.2223L6.27683 11.9346L6.05336 11.7447L1.18822 7.61106L7.98022 6.7506L8.22897 6.71908L8.35249 6.50088L11.458 1.01495L14.5636 6.50088L14.6871 6.71908L14.9358 6.7506L21.7278 7.61106L16.8627 11.7447L16.6392 11.9346L16.6958 12.2223L17.8602 18.1388L11.6663 15.3Z"
                                            fill="#F4DD0A" stroke="black" />
                                    </g>
                                    <span class="mx-1">5</span>
                                </svg>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet. Qui ipsum laborum ut veritatis officiis ex excepturi laborum et
                                facere dolore. Id unde fugit aut beataenumquam et reprehenderit nobis aut eius dolores ea
                                rerum
                                enim quo quidem sint! Qui ratione placeat ut quibusdam soluta qui dolore dignissimos non
                                dolores
                                quaerat quo voluptatibus itaque. Sit reprehenderit quia in velit incidunt vel suscipit
                                dignissimos a veritatis facere vel vero excepturi. Aut eligendi delectus ut inventore
                                aliquid ea
                                provident velit et debitis voluptas. Sit recusandae voluptas nam omnis velit sit
                                exercitationem
                                molestiae cum unde quae in placeat quisquam.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5" style="width: 77%;margin-top:-15px;border-radius:15px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex">
                                <img src="{{ asset('images/default.jpg') }}" alt="" width="5%"
                                    height="5%" class="img-fluid rounded-circle mb-3 shadow-sm">
                                <p class="text center my-1 mx-3"><b>Kokomi</b></p>

                                <svg class="ml-auto" width="23" height="19" viewBox="0 0 23 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="&#240;&#159;&#166;&#134; icon &#34;star full&#34;">
                                        <path id="Vector"
                                            d="M11.6663 15.3L11.458 15.2045L11.2497 15.3L5.05581 18.1388L6.2202 12.2223L6.27683 11.9346L6.05336 11.7447L1.18822 7.61106L7.98022 6.7506L8.22897 6.71908L8.35249 6.50088L11.458 1.01495L14.5636 6.50088L14.6871 6.71908L14.9358 6.7506L21.7278 7.61106L16.8627 11.7447L16.6392 11.9346L16.6958 12.2223L17.8602 18.1388L11.6663 15.3Z"
                                            fill="#F4DD0A" stroke="black" />
                                    </g>
                                    <span class="mx-1">4</span>
                                </svg>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet. Qui ipsum laborum ut veritatis officiis ex excepturi laborum et
                                facere dolore. Id unde fugit aut beataenumquam et reprehenderit nobis aut eius dolores ea
                                rerum
                                enim quo quidem sint! Qui ratione placeat ut quibusdam soluta qui dolore dignissimos non
                                dolores
                                quaerat quo voluptatibus itaque. Sit reprehenderit quia in velit incidunt vel suscipit
                                dignissimos a veritatis facere vel vero excepturi. Aut eligendi delectus ut inventore
                                aliquid ea
                                provident velit et debitis voluptas. Sit recusandae voluptas nam omnis velit sit
                                exercitationem
                                molestiae cum unde quae in placeat quisquam.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="card mb-5" style="width: 77%;margin-top:-15px;border-radius:15px;">
                    <div class="card-body">
                        <div class="row">
                            <div class="d-flex">
                                <img src="{{ asset('images/default.jpg') }}" alt="" width="5%"
                                    height="5%" class="img-fluid rounded-circle mb-3 shadow-sm">
                                <p class="text center my-1 mx-3"><b>childe</b></p>

                                <svg class="ml-auto" width="23" height="19" viewBox="0 0 23 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <g id="&#240;&#159;&#166;&#134; icon &#34;star full&#34;">
                                        <path id="Vector"
                                            d="M11.6663 15.3L11.458 15.2045L11.2497 15.3L5.05581 18.1388L6.2202 12.2223L6.27683 11.9346L6.05336 11.7447L1.18822 7.61106L7.98022 6.7506L8.22897 6.71908L8.35249 6.50088L11.458 1.01495L14.5636 6.50088L14.6871 6.71908L14.9358 6.7506L21.7278 7.61106L16.8627 11.7447L16.6392 11.9346L16.6958 12.2223L17.8602 18.1388L11.6663 15.3Z"
                                            fill="#F4DD0A" stroke="black" />
                                    </g>
                                    <span class="mx-1">5</span>
                                </svg>
                            </div>
                            <p>
                                Lorem ipsum dolor sit amet. Qui ipsum laborum ut veritatis officiis ex excepturi laborum et
                                facere dolore. Id unde fugit aut beataenumquam et reprehenderit nobis aut eius dolores ea
                                rerum
                                enim quo quidem sint! Qui ratione placeat ut quibusdam soluta qui dolore dignissimos non
                                dolores
                                quaerat quo voluptatibus itaque. Sit reprehenderit quia in velit incidunt vel suscipit
                                dignissimos a veritatis facere vel vero excepturi. Aut eligendi delectus ut inventore
                                aliquid ea
                                provident velit et debitis voluptas. Sit recusandae voluptas nam omnis velit sit
                                exercitationem
                                molestiae cum unde quae in placeat quisquam.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
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
        </script>

    @endsection
