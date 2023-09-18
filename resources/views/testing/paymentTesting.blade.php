<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="row">
        @foreach ($channel as $channel_pembayaran)
            <div class="col-lg-4 card" style="width: 250px">
                <form action="{{ route('request.pembayaran') }}" method="post">
                    @csrf
                    <input type="hidden" name="amount" value="{{ request()->price }}">
                    <input type="hidden" name="name_product" value="{{ request()->name_product }}">
                    <input type="hidden" name="method" value="{{ $channel_pembayaran->code }}">
                    <input type="hidden" name="name" value="{{ Auth::user()->name }}">
                    <input type="hidden" name="email" value="{{ Auth::user()->email }}">
                    <button type="submit">
                    <div class="card-header">
                        <img width="100%" height="100%" src="{{ $channel_pembayaran->icon_url }}"
                            alt="{{ $channel_pembayaran->icon_url }}"> <br>
                    </div>
                    <div class="card-body" style="font-size: 12px;">
                        Nama Merchand : {{ $channel_pembayaran->name }} <br>
                        Code Merchand : {{ $channel_pembayaran->code }} <br>
                    </div>
                    </button>
                </form>
            </div>
        @endforeach
    </div>
    RP {{ number_format(request()->price, 2, ',', '.') }}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
