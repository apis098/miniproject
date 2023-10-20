@extends('template.nav')
@section('content')
    <div class="container my-5">
        <div class="row">
            <div class="col-8">
                <div style="border: 1px solid black; border-radius: 15px;" class="p-2">
                    <a href="/daftar-transaksi">Daftar Transaksi</a>
                    <div class="">
                        <div class="d-flex flex-row">
                            <button type="button" class="rounded-circle"
                                style="background-color:#F7941E;border:none;width: 40px;height: 40px;">
                                <i style="color: white" class="fa-solid fa-dollar-sign"></i>
                            </button>
                            <h5 class="my-auto mx-2">Detail Transaksi</h5>
                            <span class="my-auto ml-auto">#{{ $detail->merchant_ref }}</span> <br>
                        </div>
                        Payment Name : {{ $detail->payment_name }} <br>
                        Amount : RP. {{ number_format($detail->amount, 2, ',', '.') }} <br>
                        Status : <span style="text-transform: uppercase;">{{ $detail_transaksi->status }}</span>
                        <br>
                        Expired Time : {{ date('d F Y, h:i:s A', $detail->expired_time) }} <br>
                    </div>
                    @if ($detail->payment_method === 'QRISC')
                        <img src="{{ $detail->qr_url }}" alt="">
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="accordion" style="border: 1px solid black; border-radius: 15px;" id="accordionExample">
                    <h2
                        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif; margin-left: 19px;">
                        Instruksi</h2>
                    @foreach ($detail->instructions as $no_urut => $instruksi)
                        <div class="accordion-item" style="border: none;">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $no_urut }}" aria-expanded="false"
                                    aria-controls="collapse{{ $no_urut }}">
                                    <span
                                        style="font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">{{ $instruksi->title }}</span>
                                </button>
                            </h2>
                            <div id="collapse{{ $no_urut }}" class="accordion-collapse collapse"
                                data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="">

                                        @foreach ($instruksi->steps as $no => $step)
                                            {{ $no + 1 }}. {!! $step !!} <br>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
