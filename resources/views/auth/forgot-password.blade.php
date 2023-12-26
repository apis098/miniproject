<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="d-flex justify-content-center my-5">
        <div class="card text-center" style="width: 300px;">
            <div class="card-header h5 text-white" style="background-color:#f7941e">Forgot Password</div>
            <div class="card-body px-5">
            @foreach ($errors->all() as $item)
             <div class="alert alert-danger">
                {{ $item }}
             </div>
            @endforeach
            @if(session()->has('status'))
            <div class="alert alert-success">
                {{ session()->get('status') }}
            </div>
            @endif
                <p class="card-text py-2">
                    Enter your email address and we'll send you an email with instructions to reset your password.
                </p>
                <form action="{{ route('password.email') }}" method="POST">
                    @csrf
                    <div class="form-outline">
                        <input type="email" name="email" id="typeEmail" class="form-control my-3" placeholder="Email input" required/>
                    </div>
                    <button type="submit" class="btn btn-primary w-75" style="background-color: #f7941e;">Reset
                        password</button>
                </form>
                <div class="d-flex justify-content-between mt-4">
                    <a href="/login" style="text-decoration:none;color:black;">Login</a>
                    <a href="/register" style="text-decoration:none;color:black;">Register</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
