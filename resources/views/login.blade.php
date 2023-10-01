<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - HummaCook</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@500&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"
        integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="iziToast.min.css">
    <script src="iziToast.min.js" typ="text/javascript"></script>
    <script src="iziToast.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="iziToast.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
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

        .eye {
            position: absolute;
            right: 80px;
            top: 305px;
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

        .alert {
            margin-top: 10px;
        }
        /* Extra small devices (phones, 600px and down) */
        @media only screen and (max-width: 600px) {
            body {
                 font-size: 14px; /* Mengurangi ukuran font */
             }


          .content-container{
            text-align:center;
            margin-top:40%;
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
        margin-top:23%;
        width: fit-content

    }
    .bg-image{
    display:none;

    }


    .frame-47 {
        display: block;

    }

    }

     @media only screen and (min-width: 992px) {
    /* Aturan CSS untuk perangkat berukuran besar di sini */
    .register-container {
        width: 50%; /* Mengurangi lebar container */
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

    </style>
</head>
@if ($errors->any())
    <script>
        iziToast.settings({
            position: 'topRight'
        });
        @foreach ($errors->all() as $error)
            iziToast.error({
                title: 'Error',
                message: '{{ $error }}',
            });
        @endforeach
    </script>
@endif
@if (session()->has('error'))
    <script>
        iziToast.settings({
            position: 'topRight'
        });
        iziToast.error({
            title: 'Error',
            message: '{{ session('error') }}',
        });
    </script>
@endif

<body>
    <div class="register-container">
        <div class="bg-image">
            <div class="humma-cook"> <i>HummaCook</i></div>
            <img src="{{ asset('images/frame 47.png') }}" class="frame-47" alt="" srcset="">
        </div>
        <div class="content-container mx-5">
            <div
                style="color: black; font-size: 28px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word">
                Masuk</div>
            <div
                style="width: 100%; color: black; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.34px; word-wrap: break-word;margin-bottom:3%">
                Selamat datang di <i style="font-family:Dancing Script; font-size: 18px">Hummacook</i> </div>
            <div class=" mb-3 ">

                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="email" id="email" name="email"
                            class="form-control username rounded-4 mb-1" placeholder="E-mail..."
                            value="{{ old('email') }}" />
                    </div>
                    <!-- Password input -->
                    <div class="form mb-3">
                        <input type="password" name="password" id="pass" class="form-control username rounded-4 form-input" placeholder="password...">
                        <a id="mybutton" onclick="change()"><span id="mybutton" class="left-pan"><i class="fa-solid fa-eye"></i></span></a>
                    </div>
                    <!-- Register buttons -->
                    <p>Belum punya akun? <a style="color: #f7941e;" href="{{ route('register') }}">Register</a> </p>
                    <!-- Submit button -->
                    <button type="submit" class="button-buat rounded-4"> <b style="color:white">Login</b></button>
                </form>

            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </section>
    <script>
        // membuat fungsi change
        function change() {

            // membuat variabel berisi tipe input dari id='pass', id='pass' adalah form input password
            var x = document.getElementById('pass').type;

            //membuat if kondisi, jika tipe x adalah password maka jalankan perintah di bawahnya
            if (x == 'password') {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'text';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<span id="mybutton" class="left-pan"><i class="fa-solid fa-eye-slash"></i></span>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<span id="mybutton" class="left-pan"><i class="fa-solid fa-eye"></i></span>`;
            }
        }
    </script>
</body>

</html>
