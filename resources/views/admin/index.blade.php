@extends('layouts.navbar')

@section('konten')
<div class="container">
    <img src="{{ asset('images/welcome2.jpg') }}" class="img-fluid" style="margin-top:-10%" alt="welcome">
</div>
{{-- <h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4> --}}
@endsection


