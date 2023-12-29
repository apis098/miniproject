<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Hummacook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-center my-5">
        <div class="card" style="width: 28rem;">
            <div class="card-body mx-3">
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger">
                        {{ $item }}
                    </div>
                @endforeach
                @if (session()->has('status'))
                    <div class="alert alert-success">
                        {{ session()->get('status') }}
                    </div>
                @endif
                <h5>Lupa Password</h5>
                <p style="font-size: 14px;">
                    E-Mail verifikasi akan dikirim ke mailbox. <br>
                    Tolong cek E-Mail anda
                </p>
                <form action="{{ route('password.email') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <input style="border-radius: 15px;" type="email" name="email" id="email"
                            placeholder="Email" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary"
                        style="background-color: #f7941e;width:100%;border-radius:15px;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);border-color:#f7941e;">
                        <b>Konfirmasi</b>
                    </button>
                </form>
                <hr>
                <div class="row">
                    <div class="col-6">
                        <button type="button" style="width: 100%;border:1px solid black;border-radius:15px;" class="btn btn-light"><a style="color: black;" href="/login">Login</a></button>
                    </div>
                    <div class="col-6">
                        <button type="button" style="width: 100%;border:1px solid black;border-radius:15px;" class="btn btn-light"><a style="color: black;" href="/register">Register</a></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
