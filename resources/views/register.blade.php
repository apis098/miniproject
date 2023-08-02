<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - HummaCook</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body
    style="background-image: url('{{ asset('images/bg.jpg') }}'); background-size: cover; background-position: center;">
    <!-- Section: Design Block -->
    <section class="text-center text-lg-start">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }

            .font-a {
                font-family: 'Dancing Script', cursive;
            }
        </style>
        <!-- Jumbotron -->
        <div class="container py-1" style="max-width: 65%; margin-top:0.5%;">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right rounded-5"
                        style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
                        <div class="card-body p-5 shadow-5 text-center">
                            <h2 class="fw-bold mb-5 font-a ">HummaCook <i class="fa-solid fa-utensils"></i><br></h2>
                            @if (session()->has('error'))
                                <script>
                                    alert("{{ session('error') }}")
                                </script>
                            @endif
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <form action="{{ route('actionregister') }}" method="post">
                                @csrf

                                <!-- Username input -->
                                <div class="form-outline mb-1">
                                    <input type="text" id="name" name="name" class="form-control mb-1"
                                        placeholder="Username..." required="" />
                                    <label class="form-label " for="name"><b>Username</b></label>
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
                                    <label class="form-label " for="email"><b>Email address</b></label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-1">
                                    <input type="password" name="password" class="form-control mb-1"
                                        placeholder="Password..." required="">
                                    <label class="form-label " for="password"><b>Password</b></label>
                                </div>
                                <div class="form-outline mb-1">
                                    <input type="password" name="copassword" id="copassword" class="form-control mb-1"
                                        placeholder="Confirm Password..." required="">
                                    <label class="form-label " for="copassword"><b>Confirm Password</b></label>
                                </div>
                                <!-- Submit button -->
                                <button type="submit" class="btn btn-outline-dark  mb-4 rounded-5"><b>Submit </b><i
                                        class="fa-solid fa-right-to-bracket"></i></button>
                                <!-- Register buttons -->
                                <p class="text-center">Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                    sekarang!</p>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <img src="{{ asset('images/bg2.jpg') }}" class="w-100 rounded-4 shadow-4" alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    {{-- <div class="container"><br>
        <div class="col-md-4 col-md-offset-4">
            <h2 class="text-center"><b>HummaCook</b></h3>
            <hr>

            @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">
                <b>Opps!</b> {{session('error')}}
            </div>
            @endif
            <form action="{{ route('actionlogin') }}" method="post">
            @csrf
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-block">Log In</button>
                <hr>
                <p class="text-center">Belum punya akun? <a href="{{route('register')}}">Register</a> sekarang!</p>
            </form>
        </div>
    </div> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"
        integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous">
    </script>
</body>

</html>


{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register User</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
</head>
<body>
    <div class="container"><br>
        <div class="col-md-6 col-md-offset-3">
            <h2 class="text-center">FORM REGISTER</h3>
            <hr>


            

            @if (session()->has('error'))

            <script>
                alert("{{ session('error') }}")
            </script>

            @endif


            @if (session('message'))
            <div class="alert alert-success">
                {{session('message')}}
            </div>
            @endif
            <form action="{{route('actionregister')}}" method="post">
            @csrf
                <div class="form-group">
                    <label><i class="fa fa-envelope"></i> Email</label>
                    <input type="email"  @error('email') is-invalid @enderror" name="email" class="form-control" placeholder="Email" required="">
                    @error('email')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
                </div>
                <div class="form-group">
                    <label><i class="fa fa-user"></i> Username</label>
                    <input type="text" name="name" class="form-control" placeholder="Username" required="">
                </div>
                <div class="form-group">
                    <label><i class="fa fa-key"></i> Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                </div>

                <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-user"></i> Register</button>
                <hr>
                <p class="text-center">Sudah punya akun silahkan <a href="{{route('login')}}">Login Disini!</a></p>
            </form>
        </div>
    </div>
</body>
</html> --}}
