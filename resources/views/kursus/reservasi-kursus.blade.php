@extends('template.nav')
@section('content')
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
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .selected {
            background-color: #F7941E;
            color: white
        }

        .accordion b {
            margin-left: -70%;
        }

        .accordion i {
            margin-left: 1%;
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

    <div class="container mb-5">
        <div class="my-3 mt-3">
            <h3><b>Deskripsi</b></h3>
        </div>

        <div class="w-75 mb-5"
            style=" color: black; font-size:15px; font-family: Poppins; font-weight: 400; letter-spacing: 0.50px; word-wrap: break-word">
            <p> Lorem ipsum dolor sit amet. Qui ipsum laborum ut veritatis officiis ex excepturi laborum et facere
                dolore.
                Id unde fugit aut beataenumquam et reprehenderit nobis aut eius dolores ea rerum enim quo quidem sint!
                Qui
                ratione placeat ut quibusdam soluta qui dolore dignissimos non dolores quaerat quo voluptatibus itaque.
                Sit reprehenderit quia in velit incidunt vel suscipit dignissimos a veritatis facere vel vero excepturi.
                Aut eligendi delectus ut inventore aliquid ea provident velit et debitis voluptas. Sit recusandae
                voluptas nam omnis velit sit
                exercitationem molestiae cum unde quae in placeat quisquam.</p>
        </div>

        <h3 class="fw-bold mb-4">konten kursus</h3>
        <div class="card mb-4">
            <button class="accordion" data-price="300000">
                <i class="fa-solid fa-chevron-down"></i>
                <b style="margin-left: -70%;">cara memanggang</b>
                <span>2 jam 10 menit <br> Rp.300.000</span>
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
        <div class="card mb-3" style="border-radius:10px;">
            <button class="accordion" data-price="300000">
                <i class="fa-solid fa-chevron-down"></i>
                <b>cara memanggang</b>
                <span>2 jam 10 menit <br> Rp.300.000</span>
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
        <div class="d-flex justify-content-end">
            <div class="d-flex align-items-end flex-column">
                <span class="font-size-15 fw-bold">Total harga</span>
                <p id="totalHarga">Rp.0</p>
            </div>
            <button type="submit"
                style="height: 40px; background-color: #F7941E; border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-left: 30px;"
                class="btn btn-sm text-light"><b class="me-3 ms-3">Bayar</b></button>
        </div>

    </div>
    <script>
        window.onload = function() {
            var acc = document.getElementsByClassName("accordion");
            var totalHargaElement = document.getElementById("totalHarga");
            var totalHarga = 0;

            for (var i = 0; i < acc.length; i++) {
                acc[i].addEventListener("click", function() {
                    if (this.classList.contains("selected")) {
                        // Unselect jika sudah terpilih
                        this.classList.remove("selected");
                        // Kurangi harga ketika di-unselect
                        totalHarga -= parseInt(this.getAttribute("data-price"));
                    } else {
                        // Select jika belum terpilih
                        this.classList.add("selected");
                        // Tambahkan harga ketika di-select
                        totalHarga += parseInt(this.getAttribute("data-price"));
                    }

                    // Perbarui tampilan total harga
                    totalHargaElement.textContent = "Rp." + totalHarga;
                });
            }
        };
    </script>
@endsection
