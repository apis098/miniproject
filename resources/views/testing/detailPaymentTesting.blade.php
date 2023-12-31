@extends('template.nav')
@section('content')
<style>
    .card{
        border:none;
        border-radius: 15px;
        box-shadow: 0 24px 39px rgba(0, 0, 0, .09), 0 0 6px rgba(0, 0, 0, .09);
        transition: .3s transform cubic-bezier(.155, 1.105, .295, 1.12), .3s box-shadow, .3s -webkit-transform cubic-bezier(.155, 1.105, .295, 1.12);
    }
</style>
<section>
    <div class="container py-5">
      <div class="card">
        <div class="card-body">
          <div class="row d-flex justify-content-center pb-5">
            <div class="col-md-7 col-xl-5 mb-4 mb-md-0">
              <div class="py-4 d-flex flex-row">
                <h5><i class="text-orange fa-solid fa-lg fa-file-invoice-dollar"></i> <b>Detail Transaksi</b> |</h5>
                <span class="ps-2">Langganan</span>
              </div>
              <div class="d-flex">
                <div class="">
              <h4 class="text-orange fw-bolder">Rp. {{number_format($detail->amount,2,',','.')}}</h4>
              <h5>#{{$detail->reference}}</h5>
                </div>
              @if ($detail->payment_name == "QRIS")
              <img class="ml-5" src="{{$detail->qr_url}}" width="100px" height="100px" alt="">
              @endif
              </div>
                <div class="">
                      @if($detail_transaksi->status == "paid")
                      <div class="col-lg-4 badge text-center badge-light" style="background-color: rgb(241, 130, 19)">
                        <b class="text-light">Sudah dibayar</b>
                      </div>
                      @elseif($detail_transaksi->status == "unpaid")
                      <div class="col-lg-4 badge text-center badge-dark">
                        <b class="text-light">Belum dibayar</b>
                      </div>
                      @elseif($detail_transaksi->status == "refund")
                      <div class="col-lg-4 badge text-center badge-dark">
                        <b class="text-light">Dikembalikan</b>
                      </div>
                      @elseif($detail_transaksi->status == "expired")
                      <div class="col-lg-4 badge text-center badge-dark">
                        <b class="text-light">Hangus</b>
                      </div>
                      @else
                      <div class="col-lg-4 badge text-center badge-dark">
                        <b class="text-light">Gagal</b>
                      </div>
                      @endif
                </div>
              @php
                 $expired_time  = $detail->expired_time;
                 $time_format = date('Y-m-d g:i A', $expired_time);
              @endphp
              <div class="rounded d-flex mt-2" style="background-color: #f8f9fa;">
                <div class="p-2">Tenggat pembayaran:</div>
                <div class="ms-auto p-2">{{$time_format}}</div>
              </div>
              <small class="mt-2 font-italic">
                <i class="text-orange fa-solid fa-circle-info"></i> Silahkan lakukan pembayaran sebelum tenggat pembayaran,jika anda belum melakukan pembayaran pada tenggat yang ditentukan maka transaksi akan dianggap hangus.
              </small>
              <hr />

            </div>

            <div class="col-md-5 col-xl-4 offset-xl-1">
              <div class="py-1 d-flex justify-content-end">

              </div>
              <div class="rounded d-flex flex-column p-3" style="background-color: #f8f9fa;">
                <div class="p-2 me-3">
                  <h4 class="fw-bolder">Instruksi Pembayaran</h4>
                </div>
                @foreach($detail->instructions as $instruction)
                    <a href="#" data-toggle="collapse" data-target="#internetBanking{{$loop->iteration}}" class="p-2 d-flex text-dark">
                    <div class="col-8 fs-6">{{$instruction->title}}</div>
                    <div class="ms-auto"><i class="fa-solid fa-chevron-down"></i></div>
                    </a>
                    <div class="collapse" id="internetBanking{{$loop->iteration}}">
                        <div class="card card-body">
                            <ul class="list-group list-group-flush">
                                @foreach($instruction->steps as $step)
                                    <li class="text-sm list-group-item p-0"><small>{{$loop->iteration}}. {!! $step !!}</small></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="border-top px-2 mx-2"></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
