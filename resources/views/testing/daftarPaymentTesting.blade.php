@foreach ($daftar_transaksi as $daftar)
    <div class="card" style="border: 1px solid black">
        <div class="card-header">
            Detail Pembeli : <br>
            @if ($daftar->user->foto)
                <img src="{{ asset('images/default-profile.png') }}" style="border-radius: 50%;" width="100px" height="100px" alt="default.jpg">
            @else
                <img src="{{ asset('storage/'.$daftar->user->foto) }}" width="100px" height="100px" style="border-radius: 50%;" alt="{{ $daftar->user->foto }}">
            @endif <br>
            Nama User : {{ $daftar->user->name }} <br>
            Email User : {{ $daftar->user->email }}
        </div>
        <div class="card-body">
            Detail Pembelian : <br>
            Kode Reference = {{ $daftar->reference }} <br>
            Kode Merchant Ref = {{ $daftar->merchant_ref }} <br>
            Total Amount = {{ $daftar->total_amount }} <br>
            Status = 
            @if ($daftar->status == 'unpaid')
                <p style="color: red;">{{ $daftar->status }}</p>
            @else
                <p style="color: green;">{{ $daftar->status }}</p>
            @endif
        </div>
    </div>
    <br>
@endforeach