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

        <h3 class="fw-bold mb-3">konten kursus</h3>
        <div class="card">
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
