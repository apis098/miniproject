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
            <div class="card-header h5 text-white" style="background-color:#f7941e">Password Reset</div>
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
                <form action="{{ route('password.update') }}" method="POST">
                    @csrf
                    <input type="text" name="token" value="{{ request()->token }}" hidden id="">
                    <input type="email" name="email" id="" value="{{ request()->email }}" hidden>
                    <div class="form-outline">
                        <input type="password" name="password" id="typeEmail" class="form-control my-3" placeholder="Password" required/>
                        <input type="password" name="password_confirmation" id="" class="form-control my-3" placeholder="Password Confirmation" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-75" style="background-color: #f7941e;">Reset
                        password</button>
                </form>
                <div class="d-flex justify-content-between mt-4">
                    <a class="/login" style="text-decoration:none;color:black;" href="#">Login</a>
                    <a class="/register" style="text-decoration:none;color:black;" href="#">Register</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
