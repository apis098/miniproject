@extends('layouts.nav_koki')
@section('konten')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
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
            width: 245px;
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
            border: 0.50px black solid
        }

        .garis {
            border-bottom: #F7941E 2px solid;
        }

        .fa-circle {}


        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px;
            width: 200%;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 34px;
            padding-right: 10px;
            border-right: 2px solid #eee
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-1 i {
            position: absolute;
            top: 12px;
            left: 5px;
            font-size: 10px;
            color: #eee
        }

        ::placeholder {
            color: grey;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 40%;
            margin-left: -5%
        }

        .search-2 input {
            height: 45px;
            border: 0.50px black solid;
            width: 128%;
            border-radius: 15px;
            margin-left: 60px;
            color: #000;
            padding-left: 18px;
            padding-right: 100px;
            text-align: center
        }

        .search-2 input:focus {
            box-shadow: none;
        }


        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 14px;
            color: #eee
        }

        .search-2 button {
            position: absolute;
            margin-left: 127%;
            top: 0px;
            border: none;
            height: 45px;
            background-color: #F7941E;
            color: #fff;
            width: 70px;
        }

        .placeholder-centered::placeholder {
            text-align: center;
        }


        @media (max-width:800px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>

    <div class="d-flex justify-content-center ms-3" style="overflow-x:hidden">
        <div class="my-1 ml-5" style="">
            <div class="search mx-4" style="border-radius: 15px;">
                <div class="col-lg-11 mt-2">
                    <div class="search-2"> <i class='bx bxs-map'></i>
                        <form action="#" method="GET">
                            <input class="placeholder-centered" type="text" name="" style="text-align: left;"
                                placeholder="Search for something ..." value=" {{ request()->nama_feed }} ">
                            <button type="submit" class="zoom-effects"
                                style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            {{-- <img src="" alt="" width="150%" height="85%"> --}}
            <div class="d-flex mt-4">
                <div class="row">
                    <div class="col-3 mx-2">
                    <img src="{{ asset('img/3.jpg') }}" style="width: 100%; height: 100%; margin-left: -25px;"
                    class="rounded float-end " alt="...">
                    </div>
                    <div class="col-8">
                        <strong class="me-5 w-75" >Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            printer took a galley of type and scrambled it to make a type specimen book. It has survived not
                            only five centuries, but also the leap into electronic typesetting, remaining essentially
                            unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem
                            Ipsum passages, and more recently with desktop publishing software like Aldus.</strong>
                            <p>
                                <a type="button" class="mr-1 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                                    href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                            d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                                    </svg>
                                    &nbsp; <span class="my-auto">10</span>
                                </a>
                                <a type="button" class="ms-3 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                                    href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 16 16">
                                        <path fill="currentColor"
                                            d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                                    </svg>
                                    &nbsp; <span class="my-auto">50</span>
                                </a>
                                <a class="ml-3 mr-1 my-auto text-dark" href="#" data-bs-toggle="modal"
                                    data-bs-target="#bagikan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" viewBox="0 0 512 512">
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" stroke-width="32"
                                            d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                                    </svg>
                                    &nbsp; <span class="my-auto">5</span>
                                </a>


                                <button type="button" onclick="confirmation_delete_comment_feed()"
                                    class="yuhu text-danger rounded-5 float-end mx-5">
                                    <i class="fa-solid fa-trash"></i>
                                </button>

                                <a class="my-auto text-dark float-end" style="margin-right: -35px;" href="#"
                                data-toggle="modal" data-target="#edit">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                        <path fill="none" stroke="currentColor" stroke-width="1.5"
                                            d="m14.36 4.079l.927-.927a3.932 3.932 0 0 1 5.561 5.561l-.927.927m-5.56-5.561s.115 1.97 1.853 3.707C17.952 9.524 19.92 9.64 19.92 9.64m-5.56-5.561l-8.522 8.52c-.577.578-.866.867-1.114 1.185a6.556 6.556 0 0 0-.749 1.211c-.173.364-.302.752-.56 1.526l-1.094 3.281m17.6-10.162L11.4 18.16c-.577.577-.866.866-1.184 1.114a6.554 6.554 0 0 1-1.211.749c-.364.173-.751.302-1.526.56l-3.281 1.094m0 0l-.802.268a1.06 1.06 0 0 1-1.342-1.342l.268-.802m1.876 1.876l-1.876-1.876" />
                                    </svg>

                                </a>

                            </p>
                              {{-- modal edit --}}
                    <div class="modal fade" id="edit" tabindex="-1"
                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content" style="border-radius: 15px">
                                <div class="modal-body">
                                    <div class="d-flex justify-content-between">
                                        <h5 class="modal-title" id="exampleModalLabel"
                                            style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                            Edit
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i class="fa-regular text-dark fa-circle-xmark"></i>
                                            </button>
                                    </div>
                                    <br>
                                    <form action=""
                                        method="POST">
                                        @csrf
                                        <div class="">
                                            <div class="col-sm-10">
                                                <textarea class="form-control"
                                                    value=""
                                                    name="nama_makanan" id="nama"
                                                    style="border-radius:10px; width:120%;"></textarea>
                                            </div>
                                        </div>
                                        <br>
                                        <button type="submit"
                                            class="btn btn-sm d-flex justify-content-end text-white"
                                            style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
  {{-- end modal edit --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        function confirmation_accept_course(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin ingin menerima kursus ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('form_terima_eksekusi_kursus' + num)
                                    .submit();
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

        function confirmation_tolak_course(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Apakah Anda yakin tidak ingin menerima kursus ini?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
                        instance, toast) {
                        instance.hide({
                            transitionOut: 'fadeOutUp',
                            onClosing: function(instance, toast, closedBy) {
                                document.getElementById('form_tolak_eksekusi_kursus' + num)
                                    .submit();
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

        let debounceTimer;

        $(document).ready(function() {
            $('#search-input').keyup(function() {
                var query = $(this).val(); // Ambil nilai dari input pencarian
                clearTimeout(debounceTimer);

                debounceTimer = setTimeout(function() {
                    get(1)
                }, 500);

                // Lakukan permintaan Ajax ke titik akhir pencarian hanya jika panjang query lebih dari 2 karakter
                if (query.length > 2) {
                    $.ajax({
                        url: '/admin/laporan-pengguna', // Ganti URL sesuai dengan titik akhir pencarian Anda
                        type: 'GET',
                        data: {
                            query: query
                        },
                        success: function(response) {
                            // Tampilkan hasil pencarian di dalam div #search-results
                            $('#search-results').html(response);
                        },
                        beforeSend: function() {
                            $('#loading').html(showLoading())
                        }
                    });
                } else {
                    // Kosongkan hasil pencarian jika panjang query kurang dari 3 karakter
                    $('#search-results').empty();
                }
            });
        });


        function showLoading() {
            return `<div class="d-flex justify-content-center" style="">
        <div class="spinner-border my-auto" role="status">
            <span class="visually-hidden">Loading...</span>
            </div></div>`

        }
    </script>

    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        const underline = document.getElementById("f");
        const buttonTab = document.getElementById("button-tab");
        const o = document.getElementById("pp");
        const a_tab = document.getElementById("a-tab");
        buttonTab.addEventListener("click", function() {
            tab3();
        });

        function tab3() {
            event.preventDefault();
            border1.style.display = "none";
            border2.style.display = "none";
            underline.style.display = "block";
            underline.removeAttribute('hidden');
            o.style.display = "none";
        }
        a_tab.addEventListener('click', function() {
            event.preventDefault();
            o.style.display = "block";
            underline.style.display = "none";
            border1.style.display = "none";
            border2.style.display = "none";
        });
        click1.addEventListener('click', function() {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            underline.style.display = "none";
            o.style.display = "none";
        });
        click2.addEventListener("click", function() {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            underline.style.display = "none";
            o.style.display = "none";
        });
    </script>
    </div>




    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>

    <!-- jQuery CDN -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
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

        function buttonAllert(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin memblookir pengguna tersebut?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('formBlokir' + num).submit();
                        }
                    ],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
                        function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }
                    ],
                ],
            });
        }

        function confirmation(num) {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda yakin ingin mengahpus laporan?',
                position: 'topCenter',
                buttons: [
                    ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
                        function(instance, toast) {
                            // Jika pengguna menekan tombol "Ya", kirim form
                            document.getElementById('deleteLaporan' + num).submit();
                        }
                    ],
                    ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
                        function(instance, toast) {
                            instance.hide({
                                transitionOut: 'fadeOut'
                            }, toast, 'button');
                        }
                    ],
                ],
            });
        }
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
        // $(document).ready(function() {
        //     $('#buttonModal').on('click', function() {
        //         var complaintId = $(this).data('complaint-id');

        //         $.ajax({
        //             url: '/show-reply-by/' + complaintId,
        //             type: 'GET',
        //             dataType: 'html',
        //             success: function(data) {
        //                 $('#replyData').html(data); // Memasukkan data balasan ke dalam modal
        //                 $('#repliesModal').modal('show'); // Menampilkan modal
        //             },
        //             error: function() {
        //                 // Tampilkan pesan error jika data balasan tidak berhasil dimuat
        //                 $('#replyData').html('<p>Failed to load replies.</p>');
        //                 $('#repliesModal').modal('show');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
