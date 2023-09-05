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
            width: 100%;
            padding-bottom: 100%;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-12"></div>
            <div class="col-lg-5 col-md-6 col-sm-12 my-5">
                <div class="circle"></div>
                <img class="mx-auto d-block center-content" src="{{ asset('images/404.png') }}" alt="">
                <div style="text-align: center; color: black; font-size: 4vw; font-family: Inter; font-weight: 700;">
                    404
                </div>
                <div style="text-align: center; color: black; font-size: 2vw; font-family: Inter; font-weight: 600;">
                    Tidak ada halaman ditemukan
                </div>
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
