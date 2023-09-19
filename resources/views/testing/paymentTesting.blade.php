@extends('template.nav')
@section('content')
    <div class="container">
        <h1 class="mx-2"
            style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;">
            Metode Pembayaran
        </h1>
        <div class="row"> 
            @foreach ($channel as $num => $channel_pembayaran)
                <div class="col-lg-4 mx-2 my-2 card" style="max-width: 250px; max-height: 250px;">
                    <form action="{{ route('request.pembayaran') }}" method="post">
                        @csrf
                        <input type="hidden" name="amount" value="{{ request()->price }}">
                        <input type="hidden" name="name_product" value="{{ request()->name_product }}">
                        <input type="hidden" name="method" value="{{ $channel_pembayaran->code }}">
                        <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                        <button type="submit" id="request{{ $num }}" hidden></button>
                        <div onclick="requestTransaksi({{ $num }})" style="border-radius: 15px; border-color: black;">
                            <div class="card-header">
                                <img width="100%" height="80px" src="{{ $channel_pembayaran->icon_url }}"
                                    alt="{{ $channel_pembayaran->icon_url }}"> <br>
                            </div>
                            <div class="card-body" style="font-size: 12px;">
                                Nama Merchand : {{ $channel_pembayaran->name }} <br>
                                Code Merchand : {{ $channel_pembayaran->code }} <br>
                            </div>
                        </div>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
    <script>
        function requestTransaksi(num) {
            document.getElementById("request" + num).click();
        }
    </script>
@endsection
