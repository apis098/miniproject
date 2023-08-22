<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <title>Login - HummaCook</title>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
 <link rel="stylesheet" href="iziToast.min.css">
 <script src="iziToast.min.js" typ="text/javascript"></script>
 <script src="iziToast.min.js" type="text/javascript"></script>
 <link rel="stylesheet" href="iziToast.min.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/css/iziToast.min.css">
<script src="https://cdn.jsdelivr.net/npm/izitoast@1.4.0/dist/js/iziToast.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    body {
        font-family: 'Poppins', sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: row-reverse;
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
        width:  100%;
        height: 88%;
        position: absolute;
        top: 6%;
        left: 13%;
    }
      .icon-clutery {
        position: absolute;
        top: 15%;
        left: 10%;
        overflow: visible;
    }

    .content-container {
        display: flex;
        flex-direction: column;

        padding: 20px;
        width: 55%
    }
    .username{
        width: 100%;
        height: 100%;
        border-radius: 15px;
        border: 0.50px black solid
    }
       .button-buat{
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
@if(session()->has('error'))
<script>
   iziToast.settings({
       position: 'topRight'
   });
       iziToast.error({
           title: 'Error',
           message: '{{ session('error')}}',
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
        </div>
        <div class="content-container mb-3">
            <div style="color: black; font-size: 30px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word">Masuk</div>
            <div style="width: 100%; color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.34px; word-wrap: break-word;margin-bottom:3%" >Selamat datang di <i style="font-family:Dancing Script; ">Hummacook</i> </div>
            <div class=" mb-3 ">

                <form action="{{ route('actionlogin') }}" method="post">
                    @csrf
                    <!-- Email input -->
                    <div class="form-outline mb-3">
                        <input type="email" id="email" name="email" class="form-control username rounded-4 mb-1" placeholder="E-mail..." />
                    </div>
                    <!-- Password input -->
                    <div class="form-outline mb-3">
                        <input type="password" name="password" class="form-control username rounded-4 mb-1" placeholder="Kata Kunci...">
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
</body>
</html>



