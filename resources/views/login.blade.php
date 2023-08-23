<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - HummaCook</title>
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
          top: 312px;
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
            align-items: center;
            justify-content: center;
            height: 100%;
            position: relative;
            background-color: #ffffff;
        }

        .bg-image {
            background: #f7941e;
            flex: 1;
            height: 100vh;
            position: relative;
            border-radius: 0 15px 15px 0;
            overflow: hidden;
        }

        .circle {
            background: #ffffff;
            border-radius: 50%;
            width: 55%;
            padding-bottom: 55%;
            position: absolute;
            top: 27%;
            left: 23%;

        }

        .circle2 {
            border-radius: 50%;
            border-style: solid;
            border-color: #ffffff;
            border-width: 2px;
            width: 65%;
            padding-bottom: 65%;
            position: absolute;
            top: 22%;
            left: 18%;
        }

        .image-42 {
            width: 100%;
            height: 88%;
            position: absolute;
            top: 6%;
            left: 13%;
        }

        .icon-clutery {
            position: absolute;
            top: 22.8%;
            left: 65%;
            overflow: visible;
        }

        .icon-cooking-pot {
            width: 90%;
            height: 60%;
            position: static;
        }

        .group {
            width: 90%;
            height: 60%;
            position: static;
        }

        .vector5 {
            position: absolute;
            left: 50px;
            top: 20px;
            overflow: visible;
        }

        .group2 {
            width: 30%;
            height: 30%;
            position: static;
        }

        .vector6 {
            position: absolute;
            left: 19%;
            top: 18%;
            overflow: visible;
        }

        .vector7 {
            position: absolute;
            left: 19%;
            top: 18%;
            overflow: visible;
        }

        .group3 {
            position: absolute;
            left: 18.1%;
            top: 8.8%;
            overflow: visible;
        }

        .vector10 {
            position: absolute;
            left: 18%;
            top: 76%;
            overflow: visible;
        }

        .icon-location-food {
            position: absolute;
            left: 65%;
            top: 79.9%;
            overflow: visible;
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
            box-shadow: 0px 0.5px 0.5px rgba(0, 0, 0, 0.25);
            border-radius: 10px
        }


        .alert {
            margin-top: 10px;
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
            <div class="circle"></div>
            <div class="circle2"></div>
            <img src="{{ asset('images/image 42.png') }}" class="image-42" alt="" srcset="">
            <svg class="icon-clutery" width="11" height="12" viewBox="0 0 12 16" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M7.03955 55.1165H17.7073M17.7073 55.1165H28.375M17.7073 55.1165V37.337" stroke="white"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path
                    d="M46.1543 55.1165V26.6693C46.1543 26.6693 55.0441 23.1134 55.0441 16.0016C55.0441 9.75256 55.0441 0 55.0441 0"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M46.1543 14.2236V0" stroke="white" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M1.70607 23.1134C5.26169 30.6807 17.7076 37.337 17.7076 37.337C17.7076 37.337 30.1537 30.6807 33.7092 23.1134C37.5478 14.9439 33.7092 0 33.7092 0H1.70607C1.70607 0 -2.13259 14.9439 1.70607 23.1134Z"
                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" /> </svg>

                <div class="icon-cooking-pot">
                    <div class="group">
                        <svg class="vector5" width="80" height="80" viewBox="0 0 161 161" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 0H161V161H0V0Z" fill="white"
                                fill-opacity="0.01" />
                        </svg>

                        <div class="group2">
                            <svg class="vector6" width="88" height="85" viewBox="0 0 85 103" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M0.875 102.167H84.2917V33.489C84.2917 15.4768 65.6182 0.874985 42.5833 0.874985C19.5485 0.874985 0.875 15.4768 0.875 33.489V102.167Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <svg class="vector7" width="88" height="85" viewBox="0 0 85 103" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M84.2917 36.7551C84.2917 36.0293 84.2917 34.9406 84.2917 33.489C84.2917 15.4768 65.6182 0.874985 42.5833 0.874985C19.5485 0.874985 0.875 15.4768 0.875 33.489V36.7453L84.2917 36.7551Z"
                                    fill="#F7941E" stroke="white" stroke-width="2" stroke-linejoin="round" />
                            </svg>

                            <svg class="group3" width="100" height="130" viewBox="0 0 120 54" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 53.625H119.167" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M50.646 -1.52588e-05H68.521" stroke="white" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
                <svg class="vector10" width="80" height="80" viewBox="0 0 107 130" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M59.8738 71.2845L64.1227 67.02L81.7783 84.6614C81.779 84.6621 81.7797 84.6628 81.7804 84.6634C82.5232 85.4117 83.5029 85.7826 84.4737 85.7826C85.4522 85.7826 86.4352 85.4073 87.1803 84.6557C88.6666 83.1564 88.6584 80.737 87.1691 79.2461L87.1684 79.2454L63.5524 55.6504L62.844 54.9426L62.1372 55.652L53.259 64.5627L52.562 65.2623L53.2528 65.968L58.4507 71.2782L59.1591 72.0018L59.8738 71.2845ZM29.6738 21.9249L28.9785 21.2227L28.2681 21.9096C23.1038 26.9028 23.0233 35.1748 28.0937 40.2675C28.0948 40.2687 28.096 40.2699 28.0971 40.271L41.4517 53.9202L42.16 54.6442L42.8748 53.9267L51.4461 45.3241L52.1472 44.6204L51.4483 43.9146L29.6738 21.9249ZM26.1749 83.9438C26.1598 83.9328 26.1447 83.9226 26.1298 83.9129L64.2828 48.3495C64.3961 48.3953 64.524 48.4408 64.6631 48.477L64.6661 48.4778C69.1186 49.6233 74.7435 49.3 79.1355 44.9408C82.1273 41.9734 84.2895 38.0287 85.156 34.2181C86.0158 30.4364 85.6375 26.5612 83.196 23.9964L83.1861 23.9861L83.176 23.976C80.707 21.526 76.7817 21.1651 72.9545 22.0461C69.089 22.9359 65.0501 25.1405 62.0549 28.2368C57.8595 32.4051 57.6862 38.2491 58.8572 42.6941L58.8585 42.6988C58.8807 42.7813 58.9066 42.8592 58.9335 42.9312L22.7443 79.2527C21.2545 80.7479 21.2545 83.1652 22.7443 84.6604C23.4878 85.4065 24.4665 85.7826 25.4435 85.7826C25.4985 85.7826 25.567 85.7815 25.6353 85.7755C25.6686 85.7725 25.7235 85.7666 25.7871 85.7529L25.7886 85.7525C25.8287 85.7439 25.9876 85.7097 26.1531 85.5977C26.2455 85.5352 26.3973 85.4099 26.4994 85.1943C26.6135 84.9535 26.6198 84.6963 26.5542 84.4765C26.4965 84.2831 26.395 84.1538 26.3359 84.0883C26.2728 84.0183 26.2122 83.9709 26.1749 83.9438ZM106 1V103.565H16.8947C10.1765 103.565 4.63158 108.116 4.63158 114.222C4.63158 120.36 10.3406 125.348 16.8947 125.348H106V129H16.8947C8.06407 129 1 122.308 1 114.222V16.9565C1 8.15384 8.13301 1 16.8947 1H106Z"
                        stroke="white" stroke-width="2" />
                </svg>

                <svg class="icon-location-food" width="47" height="60" viewBox="0 0 78 97" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M58.9043 62.7296V61.7296H57.9043H49.2535V14.4761C49.2535 10.902 50.6733 7.4743 53.2006 4.94705C55.7278 2.4198 59.1555 1 62.7296 1H76.2057V53.0789V86.8564C76.2057 89.1507 75.2943 91.351 73.6719 92.9733C72.0496 94.5957 69.8493 95.5071 67.555 95.5071C65.2607 95.5071 63.0603 94.5957 61.438 92.9733C59.8157 91.351 58.9043 89.1507 58.9043 86.8564V62.7296ZM10.6507 48.2535V47.2535H9.65071C7.3564 47.2535 5.15606 46.3421 3.53373 44.7198C1.91141 43.0975 1 40.8971 1 38.6028V4.82535C1 3.81081 1.40303 2.83781 2.12042 2.12042C2.83781 1.40303 3.81081 1 4.82535 1C5.8399 1 6.8129 1.40303 7.53029 2.12042C8.24768 2.83781 8.65071 3.81081 8.65071 4.82535V24.1268V25.1268H9.65071H14.4761H15.4761V24.1268V4.82535C15.4761 3.81081 15.8791 2.83781 16.5965 2.12042C17.3139 1.40303 18.2869 1 19.3014 1C20.316 1 21.289 1.40303 22.0063 2.12042L22.7055 1.42126L22.0063 2.12042C22.7237 2.83781 23.1268 3.81081 23.1268 4.82535V24.1268V25.1268H24.1268H28.9521H29.9521V24.1268V4.82535C29.9521 3.81081 30.3552 2.83781 31.0725 2.12042C31.7899 1.40303 32.7629 1 33.7775 1C34.792 1 35.765 1.40303 36.4824 2.12042C37.1998 2.83781 37.6028 3.81081 37.6028 4.82535V38.6028C37.6028 40.8971 36.6914 43.0975 35.0691 44.7198C33.4468 46.3421 31.2464 47.2535 28.9521 47.2535H27.9521V48.2535V86.8564C27.9521 89.1507 27.0407 91.351 25.4184 92.9733C23.7961 94.5957 21.5957 95.5071 19.3014 95.5071C17.0071 95.5071 14.8068 94.5957 13.1844 92.9733C11.5621 91.351 10.6507 89.1507 10.6507 86.8564V48.2535Z"
                        stroke="white" stroke-width="2" />
                </svg>
        </div>
        <div class="content-container mx-5">
            <div
                style="color: black; font-size: 30px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word">
                Masuk</div>
            <div
                style="width: 100%; color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.34px; word-wrap: break-word;margin-bottom:3%">
                Selamat datang di <i style="font-family:Dancing Script; ">Hummacook</i> </div>
            <div class=" mb-3 ">

                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="email" id="email" name="email"
                            class="form-control username rounded-4 mb-1" placeholder="E-mail..." value="{{old('email')}}" />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" id="pass"
                            class="form-control username rounded-4 mb-1" placeholder="Kata Kunci..." value="{{old('password')}}">
                        <div class="input-group-append eye">
                            <!-- kita pasang onclick untuk merubah icon buka/tutup mata setiap diklik  -->
                            <span id="mybutton" onclick="change()">

                                <!-- icon mata bawaan bootstrap  -->
                                <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill"
                                    fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                    <path fill-rule="evenodd"
                                        d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                </svg>
                            </span>
                        </div>
                    </div>
                    <!-- Register buttons -->
                    <p>Belum punya akun? <a href="{{ route('register') }}">Register</a> sekarang!</p>
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
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-slash-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.79 12.912l-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z"/>
                                                                <path d="M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708l-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829z"/>
                                                                <path fill-rule="evenodd" d="M13.646 14.354l-12-12 .708-.708 12 12-.708.708z"/>
                                                                </svg>`;
            } else {

                //ubah form input password menjadi text
                document.getElementById('pass').type = 'password';

                //ubah icon mata terbuka menjadi tertutup
                document.getElementById('mybutton').innerHTML = `<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-eye-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                                <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                                                <path fill-rule="evenodd" d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                                                </svg>`;
            }
        }
    </script>
</body>

</html>
