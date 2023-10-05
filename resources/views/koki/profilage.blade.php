@extends('layouts.nav_koki')
@section('konten')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
    @push('style')
        @powerGridStyles
    @endpush



<div class="text-center mt-5">
    <div style="position: relative; display: inline-block;">
        @if ($userLogin->foto)
            <img src="{{ asset('storage/' . $userLogin->foto) }}" width="146px" height="144px"
                style="border-radius: 50%" alt="">
        @else
            <img src="{{ asset('images/default.jpg') }}" width="146px" height="144px"
                style="border-radius: 50%" alt="">
        @endif
        <button type="submit" style="position: absolute;  right: -2px; background-color:#F7941E; "
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
</div>



@endsection
