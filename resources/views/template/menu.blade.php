@extends('template.nav')
@section('content')
    <!-- food section -->
    <section class="food_section layout_padding">
        <div class="container">
            <div class="heading_container heading_center">
                <h2>
                    Search Resep By Ingredients
                </h2>
            </div>

            <form action="/menu" method="post">
                @csrf
                <select id="searchbahan" class="form-control" name="bahan[]" multiple="multiple">
                    <option value=""></option>
                    @foreach ($bahan_masakan as $item_bahan)
                        <option value="{{ $item_bahan->id }}">{{ $item_bahan->kategori_bahan }}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary btn-sm">Search</button>
            </form>
            <br>


            <div class="filters-content">
                @foreach ($reseps as $ir)
                    <button type="button" class="btn btn-light border p-2">
                        <img src="{{ asset('storage/' . $ir->foto) }}" alt="{{ $ir->foto }}" width="25px"
                            height="25px">
                        {{ $ir->kategori_bahan }}
                    </button>
                @endforeach
                <div class="row grid">
                    @php
                        // membuat resep berada di dalam koleksi
                        $uniqueResep = collect();
                    @endphp
                    @foreach ($reseps as $resep)
                        @foreach ($resep->resep as $r)
                            @php
                                // jika tidak ada id yang sama, maksudnya kan kalau sebelumnya data idnya resep bisa duplikat tapi kalau sampai duplikat maka ya continue kalau gak ada ya di push datanya.
                                if (!$uniqueResep->contains('id', $r->id)) {
                                    $uniqueResep->push($r);
                                } else {
                                    continue;
                                }
                            @endphp
                            <div class="col-sm-6 col-lg-4 all pizza">
                                <div class="box">
                                    <div>
                                        <div class="">
                                            <img src="{{ asset('storage/' . $r->foto_masakan) }}" width="100%"
                                                height="50%" alt="">
                                        </div>
                                        <div class="detail-box">
                                            <a href="{{ url('menu/' . $r->id) }} " class="text-white">
                                                <h4>
                                                    {{ $r->nama_masakan }}
                                                </h4>
                                            </a>
                                            by <span class="text-info">{{ $r->user->name }}</span>
                                            <br>
                                            <br>
                                            <div class="dotted">
                                                <div class="options">
                                                    <h6>
                                                        @foreach ($r->kategori_bahan as $kb)
                                                            <button
                                                                class="black-border-button  ">{{ $kb->kategori_bahan }}</button>
                                                        @endforeach
                                                        @if ($r->specialday)
                                                            <button
                                                                class="black-border-button  ">{{ $r->specialday->name }}</button>
                                                        @endif
                                                        @if ($r->tipsdasar)
                                                            <button
                                                                class="black-border-button   ">{{ $r->tipsdasar->nama_kategori }}</button>
                                                        @endif
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
            {{ $reseps->links() }}
        </div>
    </section>
    <!-- end food section -->
@endsection
