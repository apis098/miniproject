{{-- @extends('layouts.navbar') --}}
@include('layouts.navbar')
@include('layouts.header')
@include('layouts.sidebar')
@section('konten')
<h4>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h4>
@endsection
@include('layouts.footer')

