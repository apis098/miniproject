<!-- DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>404</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        <div class="col-lg-3"></div>
        <div class="col-lg-5 my-5">
            <div
                style="width: 370px; height: 370px; left: 550px; top: 94px; position: absolute; background: #F7941E; border-radius: 9999px">
            </div>
            <div
                style="width: 400px; height: 400px; left: 535px; top: 80px; position: absolute; border-radius: 9999px; border: 0.50px #F7941E solid">
            </div>
            <img class="mx-auto" src="{{ asset('images/404.png') }}" pxalt=""
                style="position: absolute; left: 373px; top: 52px;">
            <div
                style="left: 643px; top: 200px; position: absolute; color: black; font-size: 98px; font-family: Inter; font-weight: 700; word-wrap: break-word">
                404</div>
            <div
                style="left: 439px; top: 497px; position: absolute; color: black; font-size: 40px; font-family: Inter; font-weight: 600; word-wrap: break-word">
                Tidak ada halaman ditemukan</div>
        </div>
        <div class="col-lg-4"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous">
    </script>
</body>

</html>
-->
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* Gaya khusus jika diperlukan */
        .circle {
            width: 90%;
            padding-bottom: 90%;
            background: #F7941E;
            border-radius: 50%;
            position: relative;
        }

        .center-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .circle2 {
            border-radius: 50%;
            border-style: solid;
            border-color: #F7941E;
            border-width: 2px;
            width: 90%;
            padding-bottom: 90%;
            position: absolute;
            top: -15px;
            left: 2px;
        }

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-3 col-sm-12"></div>
            <div class="col-lg-5 col-md-6 col-sm-12 my-3 ">
                <div class="circle"></div>
                <div class="circle2"></div>
                <img class="mx-auto d-block " src="{{ asset('images/404.png') }}" alt="" style="position: absolute; top:-20px; left:-147px;">
                <div style="text-align: center; color: black; font-size: 10vw; font-family: poppins; font-weight: 700; position: absolute; top: 100px; left: 120px;">
                    404
                </div>
                <br>

                <div style="text-align: center; color: black; font-size: 35px; font-family: poppins; font-weight: 600;">
                    Halaman ini tidak ditemukan
                </div>

                <a href="{{route('home')}}" class="btn  btn-lg text-center" style="color:white;
                 background: rgba(247, 148, 30, 0.99); border-radius: 10px;margin-left: 35%;
                 position: relative">Kembali</a>
            </div>
            <div class="col-lg-4 col-md-3 col-sm-12"></div>
        </div>
    </div>

    <!-- Script Bootstrap JavaScript (Optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
