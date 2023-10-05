@extends('layouts.nav_koki')
@section('konten')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @push('style')
        @powerGridStyles
    @endpush



<div class="text-center mt-5" style="overflow-x:hidden">
    <div style="position: relative; display: inline-block;">
        @if ($userLogin->foto)
            <img src="{{ asset('storage/' . $userLogin->foto) }}" width="146px" height="144px"
                style="border-radius: 50%" alt="">
        @else
            <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px"
                style="border-radius: 50%" alt="">
        @endif
        <button type="submit" style="position: absolute;  right: 10px; top: 70%; background-color:#F7941E; border: none"
            class="btn btn-warning btn-sm text-light rounded-circle p-2" data-bs-toggle="modal"
            data-bs-target="#mymodal">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 48 48">
                <mask id="ipSEdit0">
                    <g fill="none" stroke="#fff" stroke-linejoin="round" stroke-width="4">
                        <path stroke-linecap="round" d="M7 42h36" />
                        <path fill="#fff" d="M11 26.72V34h7.317L39 13.308L31.695 6L11 26.72Z" />
                    </g>
                </mask>
                <path fill="currentColor" d="M0 0h48v48H0z" mask="url(#ipSEdit0)" />
            </svg>
        </button>
    </div>

<div class="mb-3 row mt-5">
    <label class="col-sm-1 col-form-label fw-bold mx-4">Nama</label>
    <div class="col-sm-10">
        <input type="text" id="nama" name="nama_paket" class="form-control "
            style=" width: 101%;  " placeholder="Masukkan Nama...">
    </div>
</div>
<div class="mb-3 row">
    <label class="col-sm-1 col-form-label fw-bold mx-4">Email </label>
    <div class="col-sm-10">
        <input type="email" id="harga" name="harga_paket" class="form-control "
            style=" width: 101%;  " placeholder="Masukkan Email...">
    </div>
</div>
<div class="mb-3 row">
    <label class="col-sm-1 col-form-label mx-4"> <strong style="margin-left: 13px;">Password</strong></label>
    <div class="col-sm-10">
        <input type="password" id="durasi" name="durasi_paket" class="form-control "
            style=" width: 101%;  " placeholder="Masukkan Password...">
    </div>
</div>

<button type="submit"
                          class="btn btn-sm d-flex float-end text-white mr-4"
                          style=" margin-left: 396px; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>

</div>
@endsection
