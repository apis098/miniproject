@extends('layouts.nav_koki')
@section('konten')
    <style>
        .pricing .pricing-item {
            border: 1px solid #0a0a0a;
            border-radius: 15px;
        }

        @media (max-width: 991px) {
            .pricing .pricing-item {
                margin-bottom: 30px;
            }
        }

        /* Animasi untuk kartu yang bergetar */
        .animated-card {
            transition: transform 0.2s;
            /* Efek transisi untuk perubahan transformasi */
        }

        .animated-card:hover {
            transform: translateY(-5px);
            /* Kartu akan bergerak ke atas saat di-hover */
        }

        .pricing .pricing-item .pricing-heading {
            padding: 20px 40px 30px 40px;
            background: #fafafa;
            border-bottom: 1px solid #a8a8a8;
            border-radius: 15px;
        }

        /* CSS untuk perubahan warna latar belakang saat card di-hover */
        .animated-card .pricing-heading {
            background-color: #ffffff;
            /* Warna latar belakang awal (putih) */
            transition: background-color 0.2s;
            /* Efek transisi untuk perubahan warna */
        }

        .animated-card:hover .pricing-heading {
            background-color: #f7941e;
            /* Warna latar belakang saat di-hover */
        }

        /* CSS untuk perubahan warna teks saat card di-hover */
        .animated-card .change-color {
            color: #000000;
            /* Warna teks awal (hitam) */
            transition: color 0.2s;
            /* Efek transisi untuk perubahan warna */
        }

        .animated-card:hover .change-color {
            color: #ffffff;
            /* Warna teks saat di-hover (putih) */
        }

        .pricing .pricing-item .pricing-heading .title h6 {
            text-transform: uppercase;
            font-weight: 400;
            line-height: 50px;
            border-bottom: 1px solid #050505;
        }

        .pricing .pricing-item .pricing-heading .price {
            margin-top: 28px;
        }

        .pricing .pricing-item .pricing-heading .price h2 {
            font-size: 3.625rem;
            font-weight: 400;
            margin-bottom: 0px;
        }

        .pricing .pricing-item .pricing-heading .price h2 span {
            font-size: 1.5625rem;
        }

        .pricing .pricing-item .pricing-body {
            padding: 45px 40px;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li {
            list-style: none;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li p span {
            margin-right: 15px;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li p span.available {
            color: #f7941e;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li p span.unavailable {
            color: #100f0f;
        }

        .pricing .pricing-item .pricing-body ul.feature-list li:not(:last-child) {
            margin-bottom: 15px;
        }

        .pricing .pricing-item .pricing-footer {
            padding-bottom: 40px;
        }

        .pricing .pricing-item.featured {
            border: none;
            box-shadow: 0px 0px 30px 0px rgba(11, 29, 66, 0.15);
        }

        .pricing .pricing-item.featured .pricing-heading {
            background: #f7941e;
            border-bottom: 1px solid #f7941e;
        }

        .pricing .pricing-item.featured .pricing-heading .title h6 {
            color: #fff;
            border-bottom: 1px solid #f7941e;
        }

        .pricing .pricing-item.featured .pricing-heading .price {
            margin-top: 28px;
        }

        .pricing .pricing-item.featured .pricing-heading .price h2 {
            color: #fff;
            font-size: 3.625rem;
            margin-bottom: 0px;
        }

        .pricing .pricing-item.featured .pricing-heading .price h2 span {
            font-size: 1.5625rem;
        }

        .pricing .pricing-item.featured .pricing-heading .price p {
            color: #fff;
        }

        .pricing.two .pricing-item {
            border: 1px solid #e5e5e5;
            overflow: hidden;
        }

        @media (max-width: 991px) {
            .pricing.two .pricing-item {
                margin-bottom: 30px;
            }
        }

        .pricing.two .pricing-item .pricing-heading {
            position: relative;
            margin-bottom: 10px;
        }

        .pricing.two .pricing-item .pricing-heading .title h6 {
            position: relative;
        }

        .pricing.two .pricing-item .pricing-heading .price {
            position: relative;
        }

        .pricing.two .pricing-item .pricing-heading:before {
            content: "";
            position: absolute;
            bottom: -25%;
            left: 0;
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 64px 500px 0 0;
            border-color: #fafafa transparent transparent transparent;
        }

        @media (max-width: 991px) {
            .pricing.two .pricing-item .pricing-heading:before {
                content: none;
            }
        }

        .pricing.two .pricing-item .pricing-body {
            padding: 70px 40px 45px;
        }

        .pricing.two .pricing-item .pricing-body ul.feature-list li p span.available {
            color: #f7941e;
        }

        .pricing.two .pricing-item.featured .pricing-heading:before {
            border-color: #f7941e transparent transparent transparent;
        }

        .beli {
            border: 1px solid #000000;
            margin-bottom: 40px;
            border-radius: 10px;
            text-align: center;
            width: 120px;

            /* Tambahkan properti berikut */
            margin-left: auto;
            margin-right: auto;
            display: block;
        }


        .beli:hover {
            background-color: #f7941e;
            color: #fff;
            border: 1px solid #f7941e;
        }
    </style>
    {{--
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
        margin-left: -70%;
    }

    .card {
        border: 1px solid #777;
        overflow: hidden;
        border-radius:10px;
    }

    .accordion-collapse {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-in-out;
        /* Animasi dengan efek slide */
    }
</style> --}}



    <div class="">
        <div class="my-4 ml-5">

            <a href="#" class="btn btn-light" data-toggle="modal" data-target="#judul"
                style="background-color: white; border: 0.50px black solid; border-radius: 10px; width: 95%">
                <div style="font-weight: 600; color: black;"> Tambahkan Judul Sesi</div>
            </a>


            {{-- <div class="card mt-2" style="width: 95%">
            <button class="accordion active"> <b>cara memanggang</b> <span>2 jam 10 menit</span> <br>    <span>Rp. 100.000,00</span>
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

        </div> --}}

            <div class="card mt-2" style="width: 95%; border-radius: 10px;  border: 1px solid #777">
                <div class="card-header" style="border-radius: 10px; border: 1px solid #777">
                    <div class="d-flex">
                        <div class="col-12">
                            <div class="float-start" style="font-size: 20px; margin-top: 1%">
                                <strong>Menanak Kucing</strong>
                            </div>
                            <div class="float-end">
                                <div class="d-flex justify-content-end">
                                    <span>
                                        <div class="me-2">2 jam 10 menit</div>
                                        <div>Rp. 100.000,00</div>
                                    </span>
                                    <button data-toggle="modal" data-target="#judulEdit" class=""
                                        style="border: none; top: 10%; background-color: transparent;">
                                        <svg width="25" height="40" viewBox="0 0 28 27" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                fill="#F7941E" />
                                            <path
                                                d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                fill="white" />
                                        </svg>

                                    </button>

                                    {{-- <svg xmlns="http://www.w3.org/2000/svg" width="2" height="15"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="3.5"
                                    d="m14.36 4.079l.927-.927a3.932 3.932 0 0 1 5.561 5.561l-.927.927m-5.56-5.561s.115 1.97 1.853 3.707C17.952 9.524 19.92 9.64 19.92 9.64m-5.56-5.561l-8.522 8.52c-.577.578-.866.867-1.114 1.185a6.556 6.556 0 0 0-.749 1.211c-.173.364-.302.752-.56 1.526l-1.094 3.281m17.6-10.162L11.4 18.16c-.577.577-.866.866-1.184 1.114a6.554 6.554 0 0 1-1.211.749c-.364.173-.751.302-1.526.56l-3.281 1.094m0 0l-.802.268a1.06 1.06 0 0 1-1.342-1.342l.268-.802m1.876 1.876l-1.876-1.876" />
                            </svg> --}}
                                    <button type="button " style="  border: none;"
                                        class="btn btn-md text-light rounded-circle p-1" data-bs-toggle="modal"
                                        data-bs-target="#mymodal">
                                        <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body" style="border-radius: 10px; ">
                    <div class="d-flex mb-2">
                        <div class="col-12">
                            1.1 <span class="ml-4">lorem ipsum von lenong</span>
                            <div class="float-end">
                                <div class="d-flex justify-content-end ">
                                    <span class="me-3">30 Menit</span>
                                    <a href="#" data-toggle="modal" data-target="#editSesi" class="p-1 mr-1"
                                        style="border: none; margin-top: -4%">
                                        <svg width="25" height="33" viewBox="0 0 28 26" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                fill="#F7941E" />
                                            <path
                                                d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                fill="white" />
                                        </svg>
                                    </a>
                                    <button type="button " style="  border: none; margin-top: -3%"
                                        class="btn btn-md text-light rounded-circle p-1" data-bs-toggle="modal"
                                        data-bs-target="#mymodal">
                                        <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="col-12">
                            1.1 <span class="ml-4">lorem ipsum von lenong</span>
                            <div class="float-end">
                                <div class="d-flex justify-content-end ">
                                    <span class="me-3">30 Menit</span>
                                    <a href="#" data-toggle="modal" data-target="#editSesi" class="p-1 mr-1"
                                        style="border: none; margin-top: -4%">
                                        <svg width="25" height="33" viewBox="0 0 28 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                fill="#F7941E" />
                                            <path
                                                d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                fill="white" />
                                        </svg>

                                    </a>

                                    <button type="button " style="  border: none; margin-top: -3%"
                                        class="btn btn-md text-light rounded-circle p-1" data-bs-toggle="modal"
                                        data-bs-target="#mymodal">
                                        <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="col-12">
                            1.1 <span class="ml-4">lorem ipsum von lenong</span>
                            <div class="float-end">
                                <div class="d-flex justify-content-end ">
                                    <span class="me-3">30 Menit</span>
                                    <a href="#" data-toggle="modal" data-target="#editSesi" class="p-1 mr-1"
                                        style="border: none; margin-top: -4%">
                                        <svg width="25" height="33" viewBox="0 0 28 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                fill="#F7941E" />
                                            <path
                                                d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                fill="white" />
                                        </svg>

                                    </a>

                                    <button type="button " style="  border: none; margin-top: -3%"
                                        class="btn btn-md text-light rounded-circle p-1" data-bs-toggle="modal"
                                        data-bs-target="#mymodal">
                                        <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex mb-2">
                        <div class="col-12">
                            1.1 <span class="ml-4">lorem ipsum von lenong</span>
                            <div class="float-end">
                                <div class="d-flex justify-content-end ">
                                    <span class="me-3">30 Menit</span>
                                    <a href="#" data-toggle="modal" data-target="#editSesi" class="p-1 mr-1"
                                        style="border: none; margin-top: -4%">
                                        <svg width="25" height="33" viewBox="0 0 28 25" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M27 12.5C27 19.4036 20.9558 25 13.5 25C6.04416 25 0 19.4036 0 12.5C0 5.59644 6.04416 0 13.5 0C20.9558 0 27 5.59644 27 12.5Z"
                                                fill="#F7941E" />
                                            <path
                                                d="M6.6652 19.2847L6.66785 19.2872C6.73814 19.3549 6.82173 19.4087 6.91382 19.4454C7.00591 19.4822 7.10468 19.5011 7.20445 19.5012C7.2884 19.5011 7.37177 19.4879 7.45124 19.462L11.7778 18.0581L20.0803 10.1166C20.5878 9.63111 20.873 8.97261 20.8729 8.28601C20.8729 7.5994 20.5877 6.94093 20.0801 6.45544C19.5725 5.96996 18.8841 5.69724 18.1663 5.69727C17.4485 5.6973 16.7601 5.97008 16.2525 6.4556L7.95005 14.3971L6.48249 18.5354C6.43626 18.6641 6.42888 18.8027 6.4612 18.9352C6.49351 19.0677 6.56422 19.1888 6.6652 19.2847ZM16.942 7.11502C17.2671 6.80638 17.7069 6.63355 18.165 6.63439C18.6231 6.63524 19.0621 6.80967 19.386 7.11951C19.71 7.42935 19.8923 7.84934 19.8932 8.28751C19.8941 8.72568 19.7134 9.14632 19.3907 9.45733L18.2989 10.5016L15.8501 8.15933L16.942 7.11502ZM8.80041 14.9026L15.1607 8.81875L17.6095 11.1611L11.2492 17.2448L7.54325 18.4473L8.80041 14.9026Z"
                                                fill="white" />
                                        </svg>

                                    </a>

                                    <button type="submit" style="  border: none; margin-top: -3%"
                                        class="btn btn-md text-light rounded-circle p-1" data-bs-toggle="modal"
                                        data-bs-target="#mymodal">
                                        <i class="fa-regular text-danger fa-circle-xmark fa-xl"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <a href="#" class="btn btn-light" data-toggle="modal" data-target="#Sesi"
                            style="background-color: #F7941E; border-radius: 10px; width: 100%">
                            <div style="font-weight: 600; color: white;"> Tambahkan Detail Sesi</div>
                        </a>
                    </div>
                </div>
            </div>






            {{-- modal Tambah Judul Sesi --}}
            <div class="modal fade" id="judul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title ml-2" id="exampleModalLabel"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Tambah
                                </h5>
                                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close"
                                    id="closeModalEdit">
                                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                                </button>
                            </div>
                            <form id="formUpdateFeed()" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <div class="col-sm-12">
                                        <form action="{{ route('upload.tawaran') }}" method="post"
                                            id="form-upload-tawaran">
                                            @csrf
                                            <div class=" d-flex mr-5" style="overflow-x:hidden;">
                                                <div class="ml-4">
                                                    <div class="mb-3 row ml-1">
                                                        <label class="col-sm-1 col-form-label fw-bold">Nama</label> &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="text" id="nama" name="nama_paket"
                                                                class="form-control"
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Nama Yang Sesuai...">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row ml-1 ">
                                                        <label class="col-sm-1 col-form-label fw-bold">Waktu </label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="time" id="harga" name="harga_paket"
                                                                class="form-control "
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row ml-1">
                                                        <label class="col-sm-1 col-form-label fw-bold">Harga </label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="number" id="durasi" name="durasi_paket"
                                                                class="form-control "
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Harga...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" onclick="buttonUpdateFeed"
                                    class="btn btn-sm d-flex justify-content-end text-white float-end"
                                    style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal Tambah Judul Sesi --}}


            {{-- modal Edit Judul Sesi --}}
            <div class="modal fade" id="judulEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title ml-2" id="exampleModalLabel"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Edit
                                </h5>
                                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close"
                                    id="closeModalEdit">
                                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                                </button>
                            </div>
                            <form id="formUpdateFeed()" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <div class="col-sm-12">
                                        <form action="{{ route('upload.tawaran') }}" method="post"
                                            id="form-upload-tawaran">
                                            @csrf
                                            <div class=" d-flex mr-5" style="overflow-x:hidden;">
                                                <div class="ml-4">
                                                    <div class="mb-3 row ml-1">
                                                        <label class="col-sm-1 col-form-label fw-bold">Nama</label> &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="text" id="nama" name="nama_paket"
                                                                class="form-control"
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Nama Yang Sesuai...">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row ml-1 ">
                                                        <label class="col-sm-1 col-form-label fw-bold">Waktu </label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="time" id="harga" name="harga_paket"
                                                                class="form-control "
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row ml-1">
                                                        <label class="col-sm-1 col-form-label fw-bold">Harga </label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="number" id="durasi" name="durasi_paket"
                                                                class="form-control "
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Harga...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" onclick="buttonUpdateFeed"
                                    class="btn btn-sm d-flex justify-content-end text-white float-end"
                                    style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal Edit Judul Sesi --}}

            {{-- modal Tambah Detail Sesi --}}
            <div class="modal fade" id="Sesi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title ml-2" id="exampleModalLabel"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Tambah
                                </h5>
                                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close"
                                    id="closeModalEdit">
                                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                                </button>
                            </div>
                            <form id="formUpdateFeed()" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <div class="col-sm-12">
                                        <form action="{{ route('upload.tawaran') }}" method="post"
                                            id="form-upload-tawaran">
                                            @csrf
                                            <div class=" d-flex mr-5" style="overflow-x:hidden;">
                                                <div class="ml-4">
                                                    <div class="mb-3 row ml-1">
                                                        <label class="col-sm-1 col-form-label fw-bold">Nama</label> &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="text" id="nama" name="nama_paket"
                                                                class="form-control"
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Nama Yang Sesuai...">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row ml-1 ">
                                                        <label class="col-sm-1 col-form-label fw-bold">Waktu </label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="time" id="harga" name="harga_paket"
                                                                class="form-control "
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" onclick="buttonUpdateFeed"
                                    class="btn btn-sm d-flex justify-content-end text-white float-end"
                                    style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal Tambah Detail Sesi --}}

            {{-- modal Edit Detail Sesi --}}
            <div class="modal fade" id="editSesi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="border-radius: 15px">
                        <div class="modal-body">
                            <div class="d-flex justify-content-between">
                                <h5 class="modal-title ml-2" id="exampleModalLabel"
                                    style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                    Edit
                                </h5>
                                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close"
                                    id="closeModalEdit">
                                    <i class="fa-regular text-dark fa-circle-xmark"></i>
                                </button>
                            </div>
                            <form id="formUpdateFeed()" action="" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="mt-4">
                                    <div class="col-sm-12">
                                        <form action="{{ route('upload.tawaran') }}" method="post"
                                            id="form-upload-tawaran">
                                            @csrf
                                            <div class=" d-flex mr-5" style="overflow-x:hidden;">
                                                <div class="ml-4">
                                                    <div class="mb-3 row ml-1">
                                                        <label class="col-sm-1 col-form-label fw-bold">Nama</label> &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="text" id="nama" name="nama_paket"
                                                                class="form-control"
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Nama Yang Sesuai...">
                                                        </div>
                                                    </div>
                                                    <div class="mb-3 row ml-1 ">
                                                        <label class="col-sm-1 col-form-label fw-bold">Waktu </label>
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        <div class="col-sm-10">
                                                            <input type="time" id="harga" name="harga_paket"
                                                                class="form-control "
                                                                style="  width: 37rem; margin-left:-15px "
                                                                placeholder="Masukkan Jumlah Waktu Dalam Menit...">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <br>
                                <button type="submit" onclick="buttonUpdateFeed"
                                    class="btn btn-sm d-flex justify-content-end text-white float-end"
                                    style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Oke</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end modal Edit Detail Sesi --}}



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
