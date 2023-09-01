@extends('layouts.navbar')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
        .table-rounded thead th:first-child {
            border-top-left-radius: 10px;
        }

        .table-rounded thead th:last-child {
            border-top-right-radius: 10px;
        }

        .table-rounded tbody tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        .table-rounded tbody tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        .btn-group-vertical {
            display: flex;
            flex-direction: column;
        }

        .zoom-effects:hover {
            transform: scale(0.97);
        }

        .intro-1 {
            font-size: 20px
        }

        .close {
            color: #fff
        }

        .close:hover {
            color: #fff
        }

        .intro-2 {
            font-size: 13px
        }

        .ah {
            background-color: #fff;
        }

        .table-custom {
            text-align: center;
        }

        .table-custom {
            text-align: center;
            border-collapse: separate;
            border-spacing: 0px 15px;
        }

        .table-custom td {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 195px;
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        .table-custom th {
            padding: 10px;
            width: 195px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom thead {
            margin-bottom: 50px;
        }

        .table-custom td:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom td:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .table-custom th:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom th:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        tr {
            padding: 30px;
        }

        .yuhu {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }

        .btn-edit {
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-family: 'poppins';
            font-weight: 500;
            word-wrap: break-word;
            border: none;
            letter-spacing: 0.20px;
            margin-left: 210%;
        }

        .btn-hapus {
            width: 100%;
            height: 100%;
            background-color: white;
            font-size: 17px;
            font-family: 'Poppins';
            font-weight: 500;
            letter-spacing: 0.20px;
            word-wrap: break-word;
            color: black;
            border-radius: 10px;
            margin-left: 10px;
            border: 0.50px black solid;
            
        }

        .garis {
            border-bottom: #F7941E 2px solid;
        }
        
    </style>

    <div class=" d-flex justify-content-center" style="margin-left:-60px">
        <div class="my-5 ml-5" style="margin-right: 20%;">
            <ul class="nav mb-3" id="pills-tab" role="tablist">

                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Sosial Media</h5>
                        <div id="border1" class="ms-4" style="width: 70%; height: 100%; border: 1px #F7941E solid;">
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Kontak</h5>
                        <div id="b" class="ms-2" style="width: 75%; height: 80%; border: 1px #F7941E solid;"
                            hidden>
                        </div>
                    </a>
                </li>

                <li class="nav-item" role="presentation">
                    <button id="a-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">lokasi</h5>
                        <div id="pp" class="ms-3"
                            style="width: 70%; height: 100%; display:none; border: 1px #F7941E solid;"></div>
                    </button>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                @foreach ($footer as $item)
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                        tabindex="0">
                        {{-- start tab 1 --}}
                        <form action="{{ route('footer.update', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="input" class="col-sm-2 col-form-label fw-bold">Facebook</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input" name="facebook" style="width: 250%;font-family:poppins; "
                                        value="{{ $item->facebook }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input1" class="col-sm-2 col-form-label fw-bold">Youtube</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input1" name="youtube" style="width: 250%;font-family:poppins"
                                        value="{{ $item->youtube }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input2" class="col-sm-2 col-form-label fw-bold">Twitter</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input2" name="twitter" style="width: 250%;font-family:poppins"
                                        value="{{ $item->twitter }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input3" class="col-sm-2 col-form-label fw-bold">Instagram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input3" name="instagram" style="width: 250%;font-family:poppins"
                                        value="{{ $item->instagram }}">
                                </div>
                            </div>
                            <input type="text" class="form-control" id="input7" name="lokasi"
                            value="{{ $item->lokasi }}" hidden>
                            <input type="text" class="form-control" id="input4" name="kontak"
                            value="{{ $item->kontak }}" hidden>
                            <input type="text" class="form-control" id="input5" name="telegram"
                            value="{{ $item->telegram }}" hidden>
                            <input type="text" class="form-control" id="input6" name="email"
                            value="{{ $item->email }}" hidden>
                            <button type="submit" class="btn text-white" style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); 
                            border-radius: 15px;margin-left: 210%;font-family:poppins">Edit</button>
                        </form>
                    </div>
                    {{-- end --}}
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                        tabindex="0">
                        {{-- start tab 2 --}}
                        <form action="{{ route('footer.update', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="input4" class="col-sm-2 col-form-label fw-bold">Telfon</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input4" name="kontak" style="width: 250%;font-family:poppins"
                                        value="{{ $item->kontak }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input5" class="col-sm-2 col-form-label fw-bold">Telegram</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input5" name="telegram" style="width: 250%;font-family:poppins"
                                        value="{{ $item->telegram }}">

                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="input6" class="col-sm-2 col-form-label fw-bold">E-mail</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input6" name="email" style="width: 250%;font-family:poppins"
                                        value="{{ $item->email }}">
                                </div>
                            </div>
                            <input type="text" class="form-control" id="input7" name="lokasi"
                            value="{{ $item->lokasi }}" hidden>
                            <input type="text" class="form-control" id="input3" name="instagram"
                            value="{{ $item->instagram }}" hidden>
                            <input type="text" class="form-control" id="input2" name="twitter"
                            value="{{ $item->twitter }}" hidden>
                            <input type="text" class="form-control" id="input1" name="youtube"
                            value="{{ $item->youtube }}" hidden>
                            <input type="text" class="form-control" id="input" name="facebook"
                            value="{{ $item->facebook }}" hidden>
                            <button type="submit" class="btn text-white" style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); 
                            border-radius: 15px;margin-left: 210%;font-family:poppins">Edit</button>
                        </form>
                    </div>
                    {{-- end --}}
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                        tabindex="0">
                        {{-- start tab 3 --}}
                        <form action="{{ route('footer.update', $item->id) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="input7" class="col-sm-2 col-form-label fw-bold">Lokasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="input7" name="lokasi" style="width: 250%;font-family:poppins;"
                                        value="{{ $item->lokasi }}">
                                </div>
                            </div>
                            <input type="text" class="form-control" id="input3" name="instagram"
                            value="{{ $item->instagram }}" hidden>
                            <input type="text" class="form-control" id="input2" name="twitter"
                            value="{{ $item->twitter }}" hidden>
                            <input type="text" class="form-control" id="input1" name="youtube"
                            value="{{ $item->youtube }}" hidden>
                            <input type="text" class="form-control" id="input" name="facebook"
                            value="{{ $item->facebook }}" hidden>
                            <input type="text" class="form-control" id="input5" name="telegram"
                            value="{{ $item->telegram }}" hidden>
                            <input type="text" class="form-control" id="input4" name="kontak"
                            value="{{ $item->kontak }}" hidden>
                            <input type="text" class="form-control" id="input6" name="email"
                            value="{{ $item->email }}" hidden>
                            <button type="submit" class="btn text-white " style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); 
                            border-radius: 15px;margin-left: 210%;font-family:poppins">Edit</button>
                        </form>
                    </div>
                @endforeach

            </div>

        </div>
    </div>
    <script>
        const click1 = document.getElementById("click1");
        const click2 = document.getElementById("c");
        const border1 = document.getElementById("border1");
        const border2 = document.getElementById("b");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");

        a_tab.addEventListener('click', function(event) {
            event.preventDefault();
            o.style.display = "block";
            border1.style.display = "none";
            border2.style.display = "none";
        });

        click1.addEventListener('click', function(event) {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            o.style.display = "none";
        });

        click2.addEventListener("click", function(event) {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            o.style.display = "none";
        });
    </script>
    </div>
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function DeleteData() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menghapus data ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('delete-form').submit();
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
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const likeForms = document.querySelectorAll(".like-form");

            likeForms.forEach(form => {
                form.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button = form.querySelector(".like-button");
                    const svg = button.querySelector("svg");

                    const response = await fetch(form.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData = await response.json();
                        if (responseData.liked) {
                            // Reset button color and SVG here
                            button.style.backgroundColor = "#F7941E";
                            svg.style.color = "white";
                            document.getElementById("like-count-" + responseData.resep_id)
                                .textContent = responseData.likes;
                            // Modify SVG appearance if needed
                        } else {
                            // Update button color and SVG here
                            button.style.backgroundColor = "white";
                            svg.style.color = "#F7941E";
                            button.style.borderColor = "#F7941E";
                            document.getElementById("like-count-" + responseData.resep_id)
                                .textContent = responseData.likes;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const favoriteForm = document.querySelectorAll(".favorite-form");

            favoriteForm.forEach(form1 => {
                form1.addEventListener("submit", async function(event) {
                    event.preventDefault();

                    const button1 = form1.querySelector(
                        ".favorite-button"); // Menggunakan form1
                    const svg1 = button1.querySelector("svg"); // Menggunakan button1

                    const response = await fetch(form1.action, {
                        method: "POST",
                        headers: {
                            "X-CSRF-Token": "{{ csrf_token() }}",
                        },
                    });

                    if (response.ok) {
                        const responseData1 = await response.json();
                        if (responseData1.favorited) {
                            // Reset button color and SVG here
                            button1.style.backgroundColor = "#F7941E";
                            svg1.style.color = "white";
                            // Modify SVG appearance if needed
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        } else {
                            // Update button color and SVG here
                            button1.style.backgroundColor = "white";
                            svg1.style.color = "#F7941E";
                            button1.style.borderColor = "#F7941E";
                            document.getElementById("fav-count-" + responseData1.resep_id)
                                .textContent = responseData1.favorite_count;
                        }
                    }
                });
            });
        });
    </script>
    <script>
        const deskripsi = document.getElementById("deskripsi");
        const langkah = document.getElementById("langkah");
        const borderDeskripsi = document.getElementById("borderDeskripsi");
        const borderLangkah = document.getElementById("borderLangkah");
        const bahan = document.getElementById("bahan");
        const borderBahan = document.getElementById("borderBahan");
        const alat = document.getElementById("alat");
        const borderAlat = document.getElementById("borderAlat");
        deskripsi.addEventListener('click', function() {
            borderDeskripsi.style.display = "block";
            borderLangkah.style.display = "none";
            borderBahan.style.display = "none";
            borderAlat.style.display = "none";
        });
        bahan.addEventListener("click", function() {
            borderBahan.removeAttribute('hidden');
            borderBahan.style.display = "block";
            borderDeskripsi.style.display = "none";
            borderLangkah.style.display = "none";
            borderAlat.style.display = "none";
        });

        langkah.addEventListener("click", function() {
            borderLangkah.style.display = "block";
            borderDeskripsi.style.display = "none";
            borderBahan.style.display = "none";
            borderAlat.style.display = "none";
        });
        alat.addEventListener("click", function() {
            borderAlat.style.display = "block";
            borderLangkah.style.display = "none";
            borderDeskripsi.style.display = "none";
            borderBahan.style.display = "none";
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
@endsection
