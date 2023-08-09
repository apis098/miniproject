<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <title> HummaCook </title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css"
        integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ=="
        crossorigin="anonymous" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <link href="{{ asset('css/style.css') }} " rel="stylesheet">
    <link href="{{ asset('style.css') }} " rel="stylesheet">

    <!-- Responsive CSS -->
    <link href="{{ asset('css/responsive/responsive.css') }}" rel="stylesheet">
    <style>
        .nav-link.active {
            background-color: #f39c12;
            color: #fff;
        }

        .nav-link {
            white-space: nowrap;
        }


        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown .dropbtn {

            border: none;
            outline: none;
            color: white;
            background-color: inherit;
            margin: 0;
            padding: 14px 16px;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #1d1919;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            z-index: 1;
        }

        .dropdown-content a {

            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;

        }

        .dropdown-content a:hover {
            background-color: #f1f1f146;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }

        .login {
            display: inline-block;
            padding: 6px 22px;
            background-color: #ffbe33;
            color: #ffffff;
            border-radius: 45px;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            border: none;
        }


        .dotted {
            border: 2px dotted #aaa;
            text-align: center;
            padding: 10px;
            width: 300px;
            height: auto;
            border-radius: 20px;
        }

        .black-border-button {


            border: 1px solid black;
            padding: 10px 15px;
            font-size: 14px;
            cursor: pointer;
        }
    </style>





</head>

<body>


    <!-- ****** Header Area Start ****** -->
    <header class="header_area">
        <div class="container">
            <div class="row">
                <!-- Logo Area Start -->
                <div class="col-12">
                    <div class="logo_area text-center">

                        <a href="{{ route('home') }}" class="yummy-logo">HummaCook Blog</a>
                    </div>
                </div>
            </div>
            <hr>


        </div>
    </header>
    <!-- ****** Header Area End ****** -->

    <!-- ****** Breadcumb Area Start ****** -->



    <!-- ****** Breadcumb Area End ****** -->

    <!-- ****** Single Blog Area Start ****** -->
    @if ($show_resep)
        <section class="single_blog_area section_padding_80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/' . $show_resep->foto_masakan) }}" width="100%"
                                        alt="">
                                    <h1>{{ $show_resep->nama_masakan }}</h1>
                                    @if ($show_resep->specialday)
                                        <button
                                            class="btn btn-light border rounded p-2 m-2">{{ $show_resep->specialday->name }}</button>
                                    @endif
                                    @if ($show_resep->tipsdasar)
                                        <button
                                            class="btn btn-light border rounded p-2 m-2">{{ $show_resep->tipsdasar->nama_kategori }}</button>
                                    @endif
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">

                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By <span
                                                        class="text-info">{{ $show_resep->user->name }}</span></a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">

                                                <a href="#">{{ $show_resep->created_at }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">

                                    <h2 class="post-headline"> </h2>
                                </a>
                                <p>
                                    {!! $show_resep->deskripsi_masakan !!}
                                </p>

                                <blockquote class="yummy-blockquote mt-30 mb-30">
                                    <h5 class="mb-30">
                                        Bahan - Bahan <br>
                                        @foreach ($show_resep->kategori_bahan as $item_bahan)
                                            <button
                                                class="btn btn-light border rounded p-2 m-2">{{ $item_bahan->kategori_bahan }}</button>
                                            <br>
                                        @endforeach
                                    </h5>
                                </blockquote>
                                <h4>Langkah - Langkah</h4>
                                <p>
                                    {!! $show_resep->langkah2_memasak !!}
                                </p>
                            </div>
                        </div>

                        <!-- Tags Area -->

                        {{-- <div class="tags-area">
                                <a href="#">Multipurpose</a>
                                <a href="#">Design</a>
                                <a href="#">Ideas</a>

                            </div> --}}

                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
    @endif
    @if ($show_tipsdasar)
        <section class="single_blog_area section_padding_80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/public/tipsdasar/' . $show_tipsdasar->foto) }}" width="100%"
                                        alt="">
                                    <h1>{{ $show_tipsdasar->judul }}</h1>
                                </div>
                                <!-- Post Content -->
                                <div class="post-content">
                                    <button class="btn btn-light p-2 m-2 border">{{ $show_tipsdasar->kategori_tipsdasar->nama_kategori }}</button>
                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By <span
                                                        class="text-info">{{ $show_tipsdasar->user->name }}</span></a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">

                                                <a href="#">{{ $show_tipsdasar->created_at }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">

                                    <h2 class="post-headline"> </h2>
                                </a>
                                <p>
                                    {!! $show_tipsdasar->deskripsi!!}
                                </p>
                            </div>
                        </div>

                        <!-- Tags Area -->

                        {{-- <div class="tags-area">
                                <a href="#">Multipurpose</a>
                                <a href="#">Design</a>
                                <a href="#">Ideas</a>

                            </div> --}}

                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
    @endif
    @if ($show_seputardapur)
        <section class="single_blog_area section_padding_80">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <!-- Single Post -->
                        <div class="col-10 col-sm-11">
                            <div class="single-post">
                                <!-- Post Thumb -->
                                <div class="post-thumb">
                                    <img src="{{ asset('storage/public/seputardapur/' . $show_seputardapur->foto) }}" width="100%"
                                        alt="">
                                    <h1>{{ $show_seputardapur->judul }}</h1>
                                </div>
                                <button type="submit" class="btn btn-light p-2 m-2">{{ $show_seputardapur->kategori_seputardapur->nama_kategori }}</button>
                                <!-- Post Content -->
                                <div class="post-content">

                                    <div class="post-meta d-flex">
                                        <div class="post-author-date-area d-flex">
                                            <!-- Post Author -->
                                            <div class="post-author">
                                                <a href="#">By <span
                                                        class="text-info">{{ $show_seputardapur->user->name }}</span></a>
                                            </div>
                                            <!-- Post Date -->
                                            <div class="post-date">

                                                <a href="#">{{ $show_seputardapur->created_at }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="#">

                                    <h2 class="post-headline"> </h2>
                                </a>
                                <p>
                                    {!! $show_seputardapur->isi !!}
                                </p>
                            </div>
                        </div>

                        <!-- Tags Area -->

                        {{-- <div class="tags-area">
                                <a href="#">Multipurpose</a>
                                <a href="#">Design</a>
                                <a href="#">Ideas</a>

                            </div> --}}

                    </div>
                </div>
            </div>
            </div>
            </div>
        </section>
    @endif
    <!-- ****** Single Blog Area End ****** -->

    <!-- ****** Footer Menu Area Start ****** -->
    <footer class="footer_area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="footer-content">
                        <!-- Logo Area Start -->
                        <div class="footer-logo-area text-center">

                            <a href="{{ route('home') }}" class="yummy-logo">HummaCook Blog</a>
                        </div>
                        <!-- Menu Area Start -->


                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Copywrite Text -->
                    <div class="copy_right_text text-center">

                        <p>Copyright @2023 All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="{{ route('home') }}"
                                target="_blank">HummaCook</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ****** Footer Menu Area End ****** -->

    <!-- Jquery-2.2.4 js -->
    <script src="js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="js/bootstrap/popper.min.js"></script>
    <!-- Bootstrap-4 js -->
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <!-- All Plugins JS -->
    <script src="js/others/plugins.js"></script>
    <!-- Active JS -->
    <script src="js/active.js"></script>
</body>

</html>
