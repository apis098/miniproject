<div style="background-color: #F7941E" class="radius-bawah">
@extends('template.nav')
@section('content')
    <style>
        .radius-bawah {
            border-bottom-left-radius: 30px;
            border-bottom-right-radius: 30px;
        }

        body {
            background: #f7f7f7;
            background: -webkit-linear-gradient(to right, #ffffff, #ffffff);
            background: linear-gradient(to right, #ffffff, #ffffff);
            min-height: 100vh;
            font-family: 'Poppins';
        }
        .font-poppins{
            font-family: 'Poppins';
        }
        .social-link {
            width: 30px;
            height: 30px;
            border: 1px solid #ddd;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #666;
            border-radius: 50%;
            transition: all 0.3s;
            font-size: 0.9rem;
        }

        .social-link:hover,
        .social-link:focus {
            background: #ddd;
            text-decoration: none;
            color: #555;
        }

        .search {
            background-color: #fff;
            padding: 4px;
            border-radius: 5px
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 34px;
            padding-right: 10px;
            border-right: 2px solid #eee
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-1 i {
            position: absolute;
            top: 12px;
            left: 5px;
            font-size: 24px;
            color: #eee
        }

        ::placeholder {
            color: #eee;
            opacity: 1
        }

        .search-2 {
            position: relative;
            width: 100%
        }

        .search-2 input {
            height: 45px;
            border: none;
            width: 100%;
            padding-left: 18px;
            padding-right: 100px
        }

        .search-2 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }
        /* button{
            background-color: #F7941E;
            border: none;
            height: 45px;
            width: 90px;
            color: #ffffff;
            position: absolute;
            right: 1px;
            top: 0px;
            border-radius: 15px
        } */
        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 24px;
            color: #eee
        }

        .search-2 button {
            position: absolute;
            right: 1px;
            top: 0px;
            border: none;
            height: 45px;
           background-color: #F7941E;
            color: #fff;
            width: 90px;
            border-radius: 4px
        }


        @media (max-width:800px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>
    <!-- food section -->

    {{-- <section class="food_section layout_padding">
        <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($user as $row)
              <tr>
                <th scope="row">{{$loop->iteration}}</th>
                <td>{{$row->name}}</td>
                <td>{{$row->email}}</td>
                <td>
                    <form action="{{route('Followers.store',$row->id)}}" method="POST">
                        @csrf
                        <input hidden value="{{$row->id}}" id="user_id" name="user_id" class="form-control rounded-5 mb-2" type="text">
                        <button type="submit" class="btn btn-outline-warning rounded-3">Ikuti</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
    </section> --}}
    <!-- For demo purpose -->

    <div class="container py-5" >
        <div class="row text-center text-white">
            <div class="col-lg-8 mx-auto">
                <h1 class=" font-poppins mb-5"><b>Temukan teman <br> memasak</b></h1>
                {{-- <p class="lead mb-0">Using Bootstrap 4 grid and utilities, create a nice team page.</p> --}}
                <form action="">
                    <div class="container">
                        <div class="search" style="border-radius: 15px;">
                            <div class="row">
                                {{-- <div class="col-md-6">
                                    <div class="search-1"> <i class='bx bx-search-alt'></i> <input type="text"
                                            placeholder="UX Designer"> </div>
                                </div> --}}
                                <div class="col-md-12">
                                    <div >
                                        <div class="search-2" > <i class='bx bxs-map'></i> <input type="text"
                                                placeholder="Cari Username"> <button class="zoom-effects" style="border-radius: 15px;">Cari</button> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                </p>
            </div>
        </div>
    </div><!-- End -->
</div>

<div class="ms-5 mt-5 input-group">
    <div class="ms-1">
        <h3 class="fw-bold">Hasil Pencarian</h3>
    </div>
    <div class="ms-auto me-5">
        <button class="btn btn-light text-light float-end me-5 zoom-effects" style="background-color: #F7941E; border-radius: 15px;"><b class="ms-3 me-3">Selanjutnya</b></button>
    </div>
</div>

    <div class="container mt-5">
        <div class="row text-center">

            <!-- Team item -->
            @foreach($user as $row)
                @if($row->role != "admin")
            <div class="col-xl-3 col-sm-6 mb-5" >
                <div class="bg-white shadow-sm py-4 px-4 border border-secondary" style="border-radius: 20px; height:25rem;"><img
                        src="https://bootstrapious.com/i/snippets/sn-team/teacher-4.jpg" alt="" width="100"
                        class="img-fluid rounded-circle mb-3 img-thumbnail shadow-sm">
                    <h5 class="mb-0">{{$row->name}}</h5> <span class="small text-muted">{{$row->email}}</span>
                        <div class="d-flex justify-content-center mt-3 me-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 256 256"><path fill="currentColor" d="M208 26H72a30 30 0 0 0-30 30v168a6 6 0 0 0 6 6h144a6 6 0 0 0 0-12H54v-2a18 18 0 0 1 18-18h136a6 6 0 0 0 6-6V32a6 6 0 0 0-6-6Zm-6 160H72a29.87 29.87 0 0 0-18 6V56a18 18 0 0 1 18-18h130Z"/></svg>
                            <p class="mt-2 ms-1">{{$row->resep->count()}} Resep</p>
                        </div>
                        <div class="d-flex justify-content-center mt-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" viewBox="0 0 20 20"><path fill="currentColor" d="M1.36 9.495v7.157h3.03l.153.018c2.813.656 4.677 1.129 5.606 1.422c1.234.389 1.694.484 2.531.54c.626.043 1.337-.198 1.661-.528c.179-.182.313-.556.366-1.136a.681.681 0 0 1 .406-.563c.249-.108.456-.284.629-.54c.16-.234.264-.67.283-1.301a.682.682 0 0 1 .339-.57c.582-.337.87-.717.93-1.163c.066-.493-.094-1.048-.513-1.68a.683.683 0 0 1 .176-.936c.401-.282.621-.674.676-1.23c.088-.886-.477-1.541-1.756-1.672a9.42 9.42 0 0 0-3.394.283a.68.68 0 0 1-.786-.95c.5-1.058.778-1.931.843-2.607c.085-.897-.122-1.547-.606-2.083c-.367-.406-.954-.638-1.174-.59c-.29.062-.479.23-.725.818c-.145.348-.215.644-.335 1.335c-.115.656-.178.952-.309 1.34c-.395 1.176-1.364 2.395-2.665 3.236a11.877 11.877 0 0 1-2.937 1.37a.676.676 0 0 1-.2.03H1.36Zm-.042 8.52c-.323.009-.613-.063-.856-.233c-.31-.217-.456-.559-.459-.953l.003-7.323c-.034-.39.081-.748.353-1.014c.255-.25.588-.368.94-.36h2.185A10.505 10.505 0 0 0 5.99 6.95c1.048-.678 1.82-1.65 2.115-2.526c.101-.302.155-.552.257-1.14c.138-.789.224-1.156.422-1.628c.41-.982.948-1.462 1.69-1.623c.73-.158 1.793.263 2.465 1.007c.745.824 1.074 1.855.952 3.129c-.052.548-.204 1.161-.454 1.844a10.509 10.509 0 0 1 2.578-.056c2.007.205 3.134 1.512 2.97 3.164c-.072.712-.33 1.317-.769 1.792c.369.711.516 1.414.424 2.1c-.106.79-.546 1.448-1.278 1.959c-.057.693-.216 1.246-.498 1.66a2.87 2.87 0 0 1-.851.834c-.108.684-.335 1.219-.706 1.595c-.615.626-1.714.999-2.718.931c-.953-.064-1.517-.18-2.847-.6c-.877-.277-2.693-.737-5.43-1.377H1.317Zm1.701-8.831a.68.68 0 0 1 .68-.682a.68.68 0 0 1 .678.682v7.678a.68.68 0 0 1-.679.681a.68.68 0 0 1-.679-.681V9.184Z"/></svg>
                            <p class="mt-2 ms-1">700 Suka</p>
                        </div>
                        <div class="justify-content-center">
                            <form action="{{route('Followers.store',$row->id)}}" method="POST">
                            @csrf
                                @if(!$row->followers()->where('follower_id', auth()->user()->id)->count() > 0)
                                <button type="submit" class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects" style="background-color: #F7941E; border-radius: 15px;"><b class="ms-3 me-3">Follow</b></button>
                                @else
                                <button type="submit" class="btn btn-light text-light float-center mt-3 mb-3 zoom-effects" style="background-color: #F7941E; border-radius: 15px;"><b class="ms-3 me-3">Unfollow</b></button>
                                @endif
                            </form>
                        </div>
                </div>
            </div><!-- End -->
                @endif
            @endforeach
            
        </div>
    </div>

    <!-- end food section -->
@endsection
