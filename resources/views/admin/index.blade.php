@extends('layouts.navbar')

@section('konten')
<br>
 <center> <h2>Selamat Datang <b>{{Auth::user()->name}}</b>, Anda Login sebagai <b>{{Auth::user()->role}}</b>.</h2> </center>
@endsection
