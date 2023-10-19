@extends('template.nav')
@section('content')
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Fira+Sans+Extra+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Heebo:wght@100;200;300;400;500;600;700;800;900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        :root {
            --font1: 'Heebo', sans-serif;
            --font2: 'Fira Sans Extra Condensed', sans-serif;
            --font3: 'Roboto', sans-serif
        }

        h2 {
            font-weight: 900
        }

        .container-fluid {
            max-width: 1200px
        }

        .card {
            box-shadow: 0 6px 10px rgba(0, 0, 0, .08), 0 0 6px rgba(0, 0, 0, .05);
            transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
        }


        .card h2 {
            font-size: 1rem
        }

        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 20px rgba(0, 0, 0, .12), 0 4px 8px rgba(0, 0, 0, .06)
        }

        .label-top {
            position: absolute;
            background-color: #8bc34a;
            color: #fff;
            top: 8px;
            right: 8px;
            padding: 5px 10px 5px 10px;
            font-size: .7rem;
            font-weight: 600;
            border-radius: 3px;
            text-transform: uppercase
        }

        .top-right {
            position: absolute;
            top: 24px;
            left: 24px;
            width: 90px;
            height: 90px;
            border-radius: 50%;
            font-size: 1rem;
            font-weight: 900;
            background: #ff5722;
            line-height: 90px;
            text-align: center;
            color: white
        }

        .top-right span {
            display: inline-block;
            vertical-align: middle
        }

        @media (max-width: 768px) {
            .card-img-top {
                max-height: 250px
            }
        }

        .bg-success {
            font-size: 1rem;
            background-color: #f7810a !important
        }


        @media (max-width: 576px) {
            .box-img {
                max-width: 200px
            }

            .thumb-sec {
                max-width: 200px
            }
        }

        @media (max-width: 370px) {
            .box .btn {
                padding: 5px 40px 5px 40px;
                font-size: 1rem
            }
        }
    </style>
    <main>
        <div class="container-fluid bg-trasparent  my-4 p-3" style="position: relative;">
            <div class="card-title">
                <h3 class="fw-bolder">Pilih metode pembayaran</h3>
                <small class="font-italic text-secondary">pilih salah satu metode pembayaran dibawah ini.</small>
            </div>
            <div class="row row-cols-1 row-cols-xs-2 row-cols-sm-2 row-cols-lg-4 g-3">
                @foreach ($channels as $channel)
                    @if ($channel->active)
                        <div class="col-12 col-md-4 col-lg-3 d-flex align-items-stretch">
                            <div class="card w-100">
                                <form action="{{route('topup.transaction')}}" method="POST">
                                    @csrf
                                    <div class="card-body shadow" style="min-height: 236px; padding: 1rem;">
                                        <div class="d-flex mb-2">
                                            <div class="mr-auto text-left pr-2 payment-name fw-bolder mb-3">{{$channel->name}}</div>
                                        </div>
                                        <div class="text-center">
                                            <img src="{{$channel->icon_url}}" alt="" class="img-fluid" style="height: 35px;">
                                        </div>
                                        <input type="hidden" id="method" name="method" value="{{$channel->code}}">
                                        <input type="hidden" id="price" name="price" value="{{request()->price}}">
                                        <p class="biaya mt-3 mb-0">Biaya Admin : Rp {{number_format($channel->fee_customer->flat, 2, ',', '.')}}</p>
                                        <p class="biaya">Kategori : {{$channel->group}}</p>
                                        <div class="text-end">
                                            <button type="submit" class="btn text-light follow-btn float-center zoom-effects"
                                            id="follow-button"
                                            style="background-color: #F7941E; border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25)"><b
                                                class="ms-3 me-3 text-status">Pilih</b></button>
                                        </div> 
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </main>
    
@endsection
