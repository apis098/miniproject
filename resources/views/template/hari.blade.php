@extends('template.nav')
@section('content')
    <!-- food section -->

    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Search Resep By Special Day
                </h2>
            </div>

            <form action="/hari" method="post">
                @csrf
                <select name="day" id="searchday" class="form-control">
                    <option value=""></option>
                    @foreach ($specialdays as $d)
                        <option value="{{ $d->id }}">{{ $d->name }}</option>
                    @endforeach

                </select>
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
            <br>

            <div class="filters-content">
                @foreach ($reseps as $item_r)
                <button type="button" class="btn btn-light border p-2 mx-2">{{ $item_r->name }}</button>
                @endforeach
                <div class="row grid">
                    @foreach ($reseps as $resep)
                        @foreach ($resep->resep as $r)
                            <div class="col-sm-6 col-lg-4 all pizza">
                                <div class="box">
                                    <div>
                                        <div class="">
                                            <img src="{{ asset('storage/' . $r->foto_masakan) }}" width="100%"
                                                height="50%" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <a href="{{ url('menu/'.$r->id) }} " class="text-white">  <h4>
                                                {{ $r->nama_masakan }}
                                            </h4>
                                            </a>
                                            by <span class="text-info">{{ $r->user->name }}</span>
                                            <br>
                                            <br>
                                            <div class="dotted">
                                            <div class="options">
                                                <h6>
                                                    @foreach ($r->kategori_bahan as $item_kb)
                                                        <button class="black-border-button">{{ $item_kb->kategori_bahan }}</button>
                                                    @endforeach
                                                    @if ($r->tipsdasar)
                                                        <button class="black-border-button">{{ $r->tipsdasar->nama_kategori }}</button>
                                                    @endif
                                                    <button class="black-border-button">{{ $r->specialday->name }}</button>
                                                </h6>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

        </div>
    </section>
    <!-- end food section -->
@endsection