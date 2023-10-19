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
                <span class="ps-2">TopUp</span>
              </div>
              <h4 class="text-orange fw-bolder">Rp. {{number_format($detail_transaction->amount,2,',','.')}}</h4>
              <h4>#{{$detail_transaction->reference}}</h4>
                <div class="">
                    <div class="col-lg-4 badge text-center badge-light" style="background-color: rgb(241, 130, 19)">
                        <b class="text-light">Belum dibayar</b>
                    </div>
                </div>
              <div class="rounded d-flex mt-2" style="background-color: #f8f9fa;">
                <div class="p-2">Tenggat pembayaran:</div>
                <div class="ms-auto p-2">20 October 2023, 03:08:00 PM</div>
              </div>
              <p class="mt-2 font-italic">
                <i class="text-orange fa-solid fa-circle-info"></i> Silahkan lakukan pembayaran sebelum tenggat pembayaran,jika anda belum melakukan pembayaran pada tenggat yang ditentukan maka transaksi akan dianggap hangus.
              </p>
              <hr />
              {{-- <div class="pt-2">
                <div class="d-flex pb-2">
                  <div>
                    <p>
                      <b>Patient Balance <span class="text-success">$13.24</span></b>
                    </p>
                  </div>
                  <div class="ms-auto">
                    <p class="text-primary">
                      <i class="fas fa-plus-circle text-primary pe-1"></i>Add payment card
                    </p>
                  </div>
                </div>
                <p>
                  This is an estimate for the portion of your order (not covered by
                  insurance) due today . once insurance finalizes their review refunds
                  and/or balances will reconcile automatically.
                </p>
                <form class="pb-3">
                  <div class="d-flex flex-row pb-3">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel1"
                        value="" aria-label="..." checked />
                    </div>
                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                      <p class="mb-0">
                        <i class="fab fa-cc-visa fa-lg text-primary pe-2"></i>Visa Debit
                        Card
                      </p>
                      <div class="ms-auto">************3456</div>
                    </div>
                  </div>
  
                  <div class="d-flex flex-row">
                    <div class="d-flex align-items-center pe-2">
                      <input class="form-check-input" type="radio" name="radioNoLabel" id="radioNoLabel2"
                        value="" aria-label="..." />
                    </div>
                    <div class="rounded border d-flex w-100 p-3 align-items-center">
                      <p class="mb-0">
                        <i class="fab fa-cc-mastercard fa-lg text-dark pe-2"></i>Mastercard
                        Office
                      </p>
                      <div class="ms-auto">************1038</div>
                    </div>
                  </div>
                </form>
                <input type="button" value="Proceed to payment" class="btn btn-primary btn-block btn-lg" />
              </div> --}}
            </div>
  
            <div class="col-md-5 col-xl-4 offset-xl-1">
              <div class="py-1 d-flex justify-content-end">
               
              </div>
              <div class="rounded d-flex flex-column p-3" style="background-color: #f8f9fa;">
                <div class="p-2 me-3">
                  <h4 class="fw-bolder">Instruksi Pembayaran</h4>
                </div>
                @foreach($detail_transaction->instructions as $instruction)
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
