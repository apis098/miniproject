<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <link rel="shortcut icon" href="images/favicon.png" type="">

  <title> HummaCook </title>

  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!--owl slider stylesheet -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
  <!-- nice select  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.min.css" integrity="sha512-CruCP+TD3yXzlvvijET8wV5WxxEh5H8P4cmz0RFbKK6FlZ2sYl3AEsKlLPHbniXKSrDdFewhbmBK5skbdsASbQ==" crossorigin="anonymous" />
  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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

.dropbtn {

  color: white;
  padding: 10px;
  border: none;
  cursor: pointer;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #1d1919;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
}

.dropdown-content a {
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  color: black;
}

.dropdown-content a:hover {
  background-color: #f1f1f146;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.login{
    display: inline-block;
  padding: 6px 22px;
  background-color: #ffbe33;
  color: #ffffff;
  border-radius: 45px;
  -webkit-transition: all 0.3s;
  transition: all 0.3s;
  border: none;
}
</style>


</head>

<body class="sub_page">

  <div class="hero_area">
    <div class="bg-box">
      <img src="images/hero-bg.jpg" alt="">
    </div>
    <!-- header section strats -->
    <header class="header_section">
        <div class="container">
        <div class="col-6">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="{{url('admin/index')}}">
              <span style="margin-left: -70px;">
                HummaCook
              </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  mx-auto ">
                  <li class="nav-item " style="margin-left: -140px; font-size:15px">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item dropdown" style="font-size: 15px">
                    <a class="nav-link dropbtn" href="{{route('menu')}}">Resep  <i class="fa-solid fa-chevron-down">  </i></a>
                    <div class="dropdown-content" style="font-size: 15px;">
                        @foreach ($bahan_masakan as $bm)
                            <a href="" class="dropdown-item text-white">{{ $bm->kategori_bahan }}</a>
                        @endforeach

                      </div>
                  </li>
                  <li class="nav-item dropdown" style="font-size: 15px">
                    <a class="nav-link dropbtn" href="#">Hari Khusus  <i class="fa-solid fa-chevron-down">  </i></a>
                    <div class="dropdown-content" style="font-size: 15px;">
                        @foreach ($hari_khusus as $bm)
                            <a href="" class="dropdown-item text-white">{{ $bm->name }}</a>
                        @endforeach

                      </div>
                  </li>
                  <li class="nav-item dropdown" style="font-size: 15px">
                    <a class="nav-link dropbtn" href="#">Tips Dasar  <i class="fa-solid fa-chevron-down">  </i></a>
                    <div class="dropdown-content" style="font-size: 15px;">
                        @foreach ($tips_dasar as $bm)
                            <a href="" class="dropdown-item text-white">{{ $bm->name }}</a>
                        @endforeach

                      </div>
                </li>
                <li class="nav-item dropdown" style="font-size: 15px">
                    <a class="nav-link dropbtn" href="#">Pengetahuan Dapur   <i class="fa-solid fa-chevron-down">  </i></a>
                    <div class="dropdown-content" style="font-size: 15px">
                        <a href="#" class="dropdown-item text-white">Bahan Masak</a>
                        <a href="#" class="dropdown-item text-white">Bumbu Dapur</a>
                        <a href="#" class="dropdown-item text-white">Peralaan Dapur</a>
                      </div>
                </li>
                <li class="nav-item dropdown" style="font-size: 15px">
                    <a class="nav-link dropbtn" href="#">Seputar Dapur  <i class="fa-solid fa-chevron-down">  </i></a>
                    <div class="dropdown-content" style="font-size: 15px">
                        <a href="#" class="dropdown-item text-white">Bahan Unik & Eksotis</a>
                        <a href="#" class="dropdown-item text-white">Serba - Serbi</a>
                        <a href="#" class="dropdown-item text-white">Tren Masakan</a>
                      </div>
                </li>
                <li class="nav-item active" style="font-size: 15px">
                    <a class="nav-link" href="{{ route('about') }}">Tentang</a>
                </li>
                  {{-- <li class="nav-item">
                    <a class="nav-link" href="{{route('login')}}">Login</a>
                  </li> --}}
                </ul>
            <div class="user_option">

                @if (Auth::check())
                <a href="{{route('actionlogout')}}" class="login">Logout</a>
                @else
                <a href="{{route('login')}}" class="login">Login</a>

                @endif
            </div>
          </div>
        </nav>
      </div>
      </div>
    </header>
    <!-- end header section -->
  </div>
  <!-- about section -->
@foreach ($about as $a)
<section class="about_section layout_padding">
  <div class="container  ">

    <div class="row">
      <div class="col-md-6 ">
        <div class="img-box">
          <img src="images/about-img.png" alt="">
        </div>
      </div>
      <div class="col-md-6">
        <div class="detail-box">
          <div class="heading_container">
            <h2>
              {{ $a->judul }}
            </h2>
          </div>
          <p>
            {{ $a->isi }}
          </p>
          <a href="">
          Baca Selengkapnya
          </a>
        </div>
      </div>
    </div>
  </div>
</section>
@endforeach


  <!-- end about section -->

  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <div class="row">
        <div class="col-md-4 footer-col">
          <div class="footer_contact">
            <h4>
              Contact
            </h4>
            <div class="contact_link_box">
              <a href="">
                <i class="fa fa-map-marker" aria-hidden="true"></i>
                <span>
                  Lokasi
                </span>
              </a>
              <a href="">
                <i class="fa fa-phone" aria-hidden="true"></i>
                <span>
                  Call +62 1234567890
                </span>
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  hummacook@gmail.com
                </span>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <div class="footer_detail">
            <a href="" class="footer-logo">
              HummaCook
            </a>
            <p>
              Tempat Dimana Anda Bisa Menemukan Resep-Resep Populer dan Mudah untuk Dimengerti
            </p>
            <div class="footer_social">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-linkedin" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-pinterest" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-4 footer-col">
          <h4>
            Opening Hours
          </h4>
          <p>
            Setiap Hari
          </p>
          <p>
            24 Jam
          </p>
        </div>
      </div>

    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- popper js -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- owl slider -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js">
  </script>
  <!-- isotope js -->
  <script src="https://unpkg.com/isotope-layout@3.0.4/dist/isotope.pkgd.min.js"></script>
  <!-- nice select -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>
  <!-- Google Map -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script>
  <!-- End Google Map -->

</body>

</html>
