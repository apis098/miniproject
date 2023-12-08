<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - HummaCook</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: row-reverse;
        }

        .eye1 {
            position: absolute;
            right: 80px;
            top: 376px;
        }

        .eye2 {
            position: absolute;
            right: 80px;
            top: 428.5px;
        }

        .humma-cook {
            color: #ffffff;
            text-align: left;
            font: 500 30px'Dancing Script', sans-serif;
            position: absolute;
            left: 30px;
            top: 20px;
        }

        .register-container {
            flex: 1;
            display: flex;
            flex-direction:;
            align-items: center;
            justify-content: center;
            height: 100%;
            /* width: 100%; */
            position: relative;
            background-color: #ffffff;

        }

        .bg-image {
        background: #f7941e;
        height: 100vh;
        width: 50%; /* Adjust the width percentage as needed */
        position: relative;
        border-radius: 0 15px 15px 0;
        overflow: hidden;
        background-repeat: no-repeat;
        background-attachment: fixed;
        }

        .frame-47 {
        max-width: 100%;
        height: 80%;
        /* width: 80%; */
        position: absolute;
        top: 50%;
        left: 60%;
        transform: translate(-50%, -50%);
        }


        .content-container {
            padding: 20px;
            width: 45%
        }

        .username {
            width: 100%;
            height: 100%;
            border-radius: 15px;
            border: 0.50px black solid
        }

        .button-buat {
            width: 100%;
            height: 100%;
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            border: none;
        }


        .alert {
            margin-top: 10px;
        }

        .input-file {
            width: 100%;
            height: 100%;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 15px;
            border: 0.50px black solid
        }
        .form {
            position: relative;
            }

        .form .fa-search {

        position: absolute;
        top: 20px;
        left: 20px;
        color: #9ca3af;

        }

        .form span {

        position: absolute;
        right: 17px;
        top: 5px;
        padding: 2px;

        }

        .left-pan {
        padding-left: 7px;
        }

        .left-pan i {

        padding-left: 10px;
        }

        .form-input {

        height: 37px;
        border-radius: 10px;
        }
       /* Extra small devices (phones, 600px and down) */
       @media only screen and (max-width: 600px) {
            body {
                 font-size: 14px; /* Mengurangi ukuran font */
             }
             .deskripsi{
                display: none;
            }


          .content-container{
            text-align:center;
            margin-top:10px;
            width: fit-content

            }
            .bg-image {
                display: none

        }

        }

        @media only screen and (min-width: 601px) and (max-width: 992px) {
    /* Aturan CSS untuk perangkat berukuran sedang di sini */
    body {
        font-size: 16px; /* Mengubah ukuran font */
    }
    .content-container{
        text-align:center;
        margin-top:10%;
        width:70%;

    }
    .deskripsi{
        display: block;
    }
    .bg-image{
    display:none;

    }


    .frame-47 {
        display: block;

    }
    .card{
        align-items:center;
        margin-top: 10px;
    }


    }

     @media only screen and (min-width: 992px) {
    /* Aturan CSS untuk perangkat berukuran besar di sini */
    .register-container {
        width: 50%; /* Mengurangi lebar container */
    }
    .deskripsi{
        display: block;
    }
    .content-container{
        margin-top:10px;
        width:50%;

    }
    .bg-image{
       width: 70%;
       display: block;
    }

    .frame-47 {
        display: block;
        /* top: 14%;
        left: 12%; */

    }
}
::placeholder {
    color: #999999; /* Warna teks */
    font-style: italic; /* Gaya font */
    font-size: 13px; /* Ukuran font */
    /* Tambahkan properti CSS lainnya sesuai kebutuhan */
}
    </style>
</head>

<body>

    <div class="register-container">
        <div class="bg-image">
            <div class="humma-cook"><img src="{{asset('images/logo.png')}}" width="80%" alt="" srcset=""></div>
            <img src="{{ asset('images/frame 47.png') }}" class="frame-47" alt="" srcset="">
        </div>
        <div class="content-container mx-5">
            <div
                style="color: black; font-size: 28px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word">
                Buat akun</div>
            <div class="deskripsi"
                style="width: 100%; color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.34px; word-wrap: break-word">
                Silakan Register untuk mengakses fitur yang lebih banyak </div>
            <div class="">
                @if (session()->has('error'))
                    <script>
                        alert("{{ session('error') }}");
                    </script>
                @endif
                @if (session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif
                <form action="{{ route('actionregister') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="row">

                            <div class="card my-3 col-lg-4 col-12 ">
                                <div class="card-body text-center" style="margin-left:-4px" >
                                    <svg id="svg-placeholder" fill="none" xmlns="http://www.w3.org/2000/svg" class="mt-4 mb-4" width="50"
                                height="55" viewBox="0 0 22 25">
                                <path fill="currentColor"
                                    d="M5 21q-.825 0-1.413-.588T3 19v-6h2v6h6v2H5Zm8 0v-2h6v-6h2v6q0 .825-.588 1.413T19 21h-6Zm-7-4l3-4l2.25 3l3-4L18 17H6Zm-3-6V5q0-.825.588-1.413T5 3h6v2H5v6H3Zm16 0V5h-6V3h6q.825 0 1.413.588T21 5v6h-2Zm-3.5-1q-.65 0-1.075-.425T14 8.5q0-.65.425-1.075T15.5 7q.65 0 1.075.425T17 8.5q0 .65-.425 1.075T15.5 10Z" />
                            </svg>
                                    <img src="" style="display: none; margin-left: -13px" width="115" height="100"
                                        alt="" class="" id="profile-image">
                                </div>
                            </div>


                            <div class="col-lg-8 col-12 my-auto  ">
                                {{-- <input name="profile_picture" id="profile_picture" class="input-file my-auto mx-1"
                                                         type="file" class="formFile"> --}}
                                <div class="row ms-lg-3 mb-3 mb-lg-0"
                                    style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0.50px rgb(142, 136, 136) solid; height: 40x;">

                                    <button type="button" id="inputanfile" onclick="inputfilee()" class="col-4"
                                        style="background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px; border: 0px; padding: 9px 12px; right: 2px;">
                                        <div
                                            style="color: #EAEAEA; font-size: 10px; font-family: Poppins; font-weight: 600; word-wrap: break-word;">
                                            Pilih File</div>
                                        <input name="profile_picture" class="form-control my-auto mx-1"
                                            style="display: none;" type="file" id="inputan">
                                    </button>
                                    <div class="col-8 col-lg-6 mt-2" id="fileinfo"
                                        style="color: black; font-size: 10px; font-family: Poppins; font-weight: 600; word-wrap: break-word;">
                                        Tidak ada file terpilih</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @error('profile_picture')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                    @enderror
                    <!-- Username input -->
                    <div class="form-outline mb-3">
                        <input type="text" id="name" name="name" class=" username form-control rounded-4"
                            placeholder="Nama Pengguna..." required value="{{ old('name') }}" />
                    </div>

                    <!-- Email input -->
                    <div class="form-outline mb-3 ">
                        <input type="email" id="email" @error('email') is-invalid @enderror name="email"
                            class=" username form-control rounded-4" placeholder="Email..."
                            value="{{ old('email') }}" required />
                        @error('email')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <!-- Password input -->
                    <div class="form mb-3">
                        <input type="password" name="password" id="pass2"
                            class="form-control username rounded-4 form-input" placeholder="Password..." required>
                        <a id="mybutton2" onclick="change('pass2','mybutton2')"><span id="mybutton2" class="left-pan"><i
                                    class="fa-solid fa-eye"></i></span></a>
                    </div>
                    <div class="form mb-3">
                      <input type="password" name="copassword" id="pass"
                          class="form-control username rounded-4  form-input"  placeholder="Konfirmasi password..." required>
                      <a id="mybutton" onclick="change('pass','mybutton')"><span id="mybutton" class="left-pan"><i
                                  class="fa-solid fa-eye"></i></span></a>
                  </div>
                    <br>
                    <!-- Submit button -->
                    <p>Sudah punya akun?<a style="color: #f7941e;" href="{{ route('login') }}">Masuk</a>
                    </p>
                    <!-- Login buttons -->
                    <button type="submit" class="button-buat rounded-4"> <b style="color:white">Buat</b></button>
                </form>
            </div>
        </div>
      </div>

    <!-- Include jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS (make sure the path is correct) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function inputfilee() {
            // Simulasikan klik pada input file saat tombol "Pilih File" diklik
            document.getElementById('inputan').click();
        }

        document.getElementById('inputan').addEventListener('change', function(event) {
            const fileInput = event.target;
            const file = fileInput.files[0];

            const fileinfo = document.getElementById('fileinfo');
            const profileImage = document.getElementById('profile-image');
            const svgPlaceholder = document.getElementById('svg-placeholder');

            if (file) {
                fileinfo.textContent = file.name;
                // Menggunakan objek FileReader untuk membaca file gambar dan menampilkan pratinjau
                const reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.src = e.target.result;
                    svgPlaceholder.style.display = 'none'; // Hide the SVG placeholder
                    profileImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                fileinfo.textContent = 'Tidak ada file terpilih';
                profileImage.src = ''; // Clear the profile image source
                svgPlaceholder.style.display = 'block'; // Show the SVG placeholder
                profileImage.style.display = 'none'; // Hide the profile image
            }
        });


        function change(inputId, buttonId) {
    var input = document.getElementById(inputId);
    var button = document.getElementById(buttonId);

    if (input.type === "password") {
        input.type = "text";
        button.innerHTML = '<span class="left-pan"><i class="fa-solid fa-eye-slash"></i></span>';
    } else {
        input.type = "password";
        button.innerHTML = '<span class="left-pan"><i class="fa-solid fa-eye"></i></span>';
    }
}
    </script>

</body>

</html>



{{-- <form action="{{ route('actionregister') }}" method="post" enctype="multipart/form-data">
                                @csrf

                                <!-- Username input -->
                                <div class="form-outline mb-1">
                                    <input type="text" id="name" name="name" class="form-control mb-1"
                                        placeholder="Username..." required="" />
                                    <label class="form-label" for="name"><b>Username</b></label>
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-1">
                                    <input type="email" id="email" @error('email') is-invalid @enderror
                                        name="email" class="form-control mb-1" placeholder="Email..."
                                        required="" />
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                    <label class="form-label" for="email"><b>Email</b></label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-1">
                                    <input type="password" name="password" class="form-control mb-1"
                                        placeholder="Password..." required="">
                                    <label class="form-label" for="password"><b>Password</b></label>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="password" name="copassword" id="copassword" class="form-control mb-1"
                                        placeholder="Confirm Password..." required="">
                                    <label class="form-label" for="copassword"><b>Confirm Password</b></label>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="file" name="profile_picture" id="profile_picture"
                                        class="form-control mb-1" placeholder="Foto profil">
                                    <label class="form-label" for="profile_picture"><b>Foto profil</b></label>
                                </div>
                                @error('profile_picture')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-dark  mb-4 rounded-5"><b>Submit </b><i
                                        class="fa-solid fa-right-to-bracket"></i></button>
                                <!-- Register buttons -->
                                <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                    sekarang!</p>
                            </form> --}}
