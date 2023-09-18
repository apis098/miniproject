<div class="card">
    <a href="/daftar-transaksi">Daftar Transaksi</a>
    <div class="card-header">
        Merchant Ref : {{ $detail->merchant_ref }} <br>
        Payment Name : {{ $detail->payment_name }} <br>
        Amount : RP. {{ number_format($detail->amount, 2, ',', '.') }} <br>
        Status : {{ $detail->status }} <br>
        Expired Time : {{ date('d F Y, h:i:s A', $detail->expired_time) }} <br>
    </div>
    <div class="card-body">
        <div style="display: flex;">
            @foreach ($detail->instructions as $instruksi)
                <div class="card" style="border: 1px solid black">
                    Title : {{ $instruksi->title }} <br>
                    Steps : <br>
                    @foreach ($instruksi->steps as $no => $step)
                        {{ $no + 1 }}. {!! $step !!} <br>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
</div>
