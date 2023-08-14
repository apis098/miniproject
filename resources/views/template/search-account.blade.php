@extends('template.nav')
@section('content')
    <!-- food section -->
    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Cari Akun Teman Anda
                </h2>
            </div>

            <form action="" method="post">
                @csrf
                <select name="tips" id="searchtips" class="form-control">
                    <option value=""></option>
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
            <br>

        </div>
    </section>

    <!-- end food section -->
@endsection
