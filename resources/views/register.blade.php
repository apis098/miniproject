<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - HummaCook</title>
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
        width: 50%;
        padding-bottom: 50%;
        position: absolute;
        top: 26%;
        left: 25%;

    }
    .circle2 {
    border-radius: 50%;
    border-style: solid;
    border-color: #ffffff;
    border-width: 2px;
    width: 60%;
    padding-bottom: 60%;
    position: absolute;
    top: 21%;
    left: 20%;
    }
        .image-42 {
            width: 100%;
            height: 80%;
            position: absolute;
            top: 8%;
            left: 10%;
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
            border-radius: 15px
           }


        .alert {
            margin-top: 10px;
        }

    </style>
</head>

<body>
    <div class="register-container">
        <div class="bg-image">
            <div class="humma-cook">HummaCook</div>
            <div class="circle"></div>
            <div class="circle2"></div>
            <img src="{{ asset('images/image 42.png') }}" class="image-42" alt="" srcset="">
        </div>
        <div class="content-container">
            <div style="color: black; font-size: 30px; font-family: Poppins; font-weight: 600; letter-spacing: 0.80px; word-wrap: break-word">Buat akun</div>
            <div style="width: 100%; color: black; font-size: 17px; font-family: Poppins; font-weight: 500; letter-spacing: 0.34px; word-wrap: break-word">Selamat datang di Hummacook </div>
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
                                        <div class="card my-3 col-3">
                                            <div class="card-body text-center">
                                                <svg
                                                width="50" height="100" viewBox="0 0 102 137" fill="none" id="svg-placeholder"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M56.6484 122.704H16.9945C15.4921 122.704 14.0512 121.986 12.9889 120.708C11.9265 119.429 11.3297 117.695 11.3297 115.887V20.4507C11.3297 18.6428 11.9265 16.9089 12.9889 15.6304C14.0512 14.352 15.4921 13.6338 16.9945 13.6338H45.3187V34.0845C45.3187 39.5084 47.1092 44.7101 50.2963 48.5454C53.4834 52.3806 57.806 54.5353 62.3133 54.5353H79.3078V68.1691C79.3078 69.977 79.9046 71.7109 80.967 72.9893C82.0293 74.2678 83.4702 74.986 84.9726 74.986C86.475 74.986 87.9159 74.2678 88.9783 72.9893C90.0406 71.7109 90.6375 69.977 90.6375 68.1691V47.7183C90.6375 47.7183 90.6375 47.7183 90.6375 47.3093C90.5785 46.6831 90.4645 46.0661 90.2976 45.4688V44.8552C90.0252 44.1543 89.6619 43.51 89.2213 42.9465L55.2322 2.04507C54.7639 1.51483 54.2285 1.07762 53.6461 0.749859C53.477 0.720957 53.3053 0.720957 53.1362 0.749859C52.5608 0.352715 51.9252 0.0977831 51.2668 0H16.9945C12.4873 0 8.16467 2.15462 4.97758 5.98988C1.79049 9.82513 0 15.0269 0 20.4507V115.887C0 121.311 1.79049 126.513 4.97758 130.348C8.16467 134.184 12.4873 136.338 16.9945 136.338H56.6484C58.1508 136.338 59.5917 135.62 60.6541 134.342C61.7164 133.063 62.3133 131.329 62.3133 129.521C62.3133 127.713 61.7164 125.979 60.6541 124.701C59.5917 123.423 58.1508 122.704 56.6484 122.704ZM56.6484 23.2457L71.3204 40.9014H62.3133C60.8108 40.9014 59.37 40.1832 58.3076 38.9048C57.2452 37.6264 56.6484 35.8925 56.6484 34.0845V23.2457ZM28.3242 40.9014C26.8218 40.9014 25.3809 41.6196 24.3186 42.8981C23.2562 44.1765 22.6594 45.9104 22.6594 47.7183C22.6594 49.5263 23.2562 51.2602 24.3186 52.5386C25.3809 53.817 26.8218 54.5353 28.3242 54.5353H33.9891C35.4915 54.5353 36.9323 53.817 37.9947 52.5386C39.0571 51.2602 39.6539 49.5263 39.6539 47.7183C39.6539 45.9104 39.0571 44.1765 37.9947 42.8981C36.9323 41.6196 35.4915 40.9014 33.9891 40.9014H28.3242ZM62.3133 68.1691H28.3242C26.8218 68.1691 25.3809 68.8873 24.3186 70.1657C23.2562 71.4441 22.6594 73.178 22.6594 74.986C22.6594 76.7939 23.2562 78.5278 24.3186 79.8063C25.3809 81.0847 26.8218 81.8029 28.3242 81.8029H62.3133C63.8157 81.8029 65.2565 81.0847 66.3189 79.8063C67.3813 78.5278 67.9781 76.7939 67.9781 74.986C67.9781 73.178 67.3813 71.4441 66.3189 70.1657C65.2565 68.8873 63.8157 68.1691 62.3133 68.1691ZM100.324 104.231L88.9947 90.5967C88.4559 89.9761 87.8206 89.4896 87.1253 89.1651C85.7461 88.4833 84.1992 88.4833 82.82 89.1651C82.1246 89.4896 81.4893 89.9761 80.9506 90.5967L69.6209 104.231C68.5542 105.514 67.9549 107.255 67.9549 109.071C67.9549 110.886 68.5542 112.627 69.6209 113.911C70.6876 115.194 72.1344 115.915 73.6429 115.915C75.1515 115.915 76.5983 115.194 77.665 113.911L79.3078 111.865V129.521C79.3078 131.329 79.9046 133.063 80.967 134.342C82.0293 135.62 83.4702 136.338 84.9726 136.338C86.475 136.338 87.9159 135.62 88.9783 134.342C90.0406 133.063 90.6375 131.329 90.6375 129.521V111.865L92.2803 113.911C92.8069 114.549 93.4334 115.057 94.1237 115.403C94.8141 115.749 95.5545 115.927 96.3023 115.927C97.0501 115.927 97.7906 115.749 98.4809 115.403C99.1712 115.057 99.7977 114.549 100.324 113.911C100.855 113.277 101.277 112.523 101.564 111.692C101.852 110.861 102 109.97 102 109.071C102 108.171 101.852 107.28 101.564 106.449C101.277 105.618 100.855 104.864 100.324 104.231ZM50.9836 109.071C52.486 109.071 53.9269 108.352 54.9892 107.074C56.0516 105.795 56.6484 104.062 56.6484 102.254C56.6484 100.446 56.0516 98.7117 54.9892 97.4333C53.9269 96.1549 52.486 95.4367 50.9836 95.4367H28.3242C26.8218 95.4367 25.3809 96.1549 24.3186 97.4333C23.2562 98.7117 22.6594 100.446 22.6594 102.254C22.6594 104.062 23.2562 105.795 24.3186 107.074C25.3809 108.352 26.8218 109.071 28.3242 109.071H50.9836Z"
                                                    fill="black" />
                                            </svg>
                                                <img src="" width="100" height="100" alt="" class="" id="profile-image">

                                            </div>
                                        </div>
                                        <div class="col-lg-7 my-auto mx-1">
                                                    <input name="profile_picture" id="profile_picture" class="form-control my-auto mx-1"
                                                         type="file" class="formFile">
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
                                        placeholder="Nama Pengguna..." required="" />
                                </div>

                                <!-- Email input -->
                                <div class="form-outline mb-3 ">
                                    <input type="email" id="email" @error('email') is-invalid @enderror
                                        name="email" class=" username form-control rounded-4" placeholder="Email..."
                                        required="" />
                                    @error('email')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-3">
                                    <input type="password" name="password" class=" username form-control rounded-4"
                                        placeholder="Kata Kunci..." required="">
                                </div>
                                <div class="form-outline mb-3">
                                    <input type="password" name="copassword" id="copassword" class=" username form-control rounded-4"
                                        placeholder="Konfirmasi Kata Sandi..." required="">
                                </div>
                                <br>
                                <!-- Submit button -->
                                <p>Sudah punya akun? <a href="{{ route('login') }}">Login</a>
                                    sekarang!</p>
                                    <!-- Login buttons -->
                                <button type="submit" class="button-buat rounded-4"> <b style="color:white">Buat</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
     <!-- Include jQuery -->
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

     <!-- Include Bootstrap JS (make sure the path is correct) -->
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
     <script>
        document.getElementById("profile_picture").addEventListener("change", function(event) {
            var input = event.target;
            var profileImage = document.getElementById("profile-image");
            var svgPlaceholder = document.getElementById("svg-placeholder");

            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    profileImage.setAttribute("src", e.target.result);
                    svgPlaceholder.style.display = "none"; // Hide the SVG placeholder
                };
                reader.readAsDataURL(input.files[0]);
            } else {
                profileImage.setAttribute("src", "");
                svgPlaceholder.style.display = "block"; // Show the SVG placeholder
            }
        });
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
