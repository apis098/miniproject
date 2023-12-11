@extends('template.nav')
@section('content')


<!-- offer section -->



<!-- end offer section -->

<!-- about section -->


<!-- end about section -->

<style>
    /* CSS untuk Tampilan Desktop */
.image-container {
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
    width: 100%;
}

.image-container img {
    width: 100%;
    max-width: none;
}

/* CSS untuk Tampilan Mobile */
@media (max-width: 768px) {
    .image-container {
        position: relative;
        z-index: initial;
    }

    .image-container img {
        width: 110%; /* Sesuaikan sesuai kebutuhan */
        margin-top: -20%; /* Sesuaikan sesuai kebutuhan */
    }
}

 /* Tampilan mobile Kecil Sekali */
 @media (min-width:290px) and (max-width: 340px) {
    div.kanan {
        margin-left: -40px;
        margin-top: 30px;
    }

    input.bsar {
     margin-left: -18px;
    }

    textarea.bsar {
     margin-left: -18px;
    }
 }

 /* untuk tampilan mobile */
 @media (min-width: 350px) and (max-width: 860px) {
    div.kanan {
        margin-left: -40px;
        margin-top: 30px;
    }

    input.bsar {
     margin-left: -18px;
    }

    textarea.bsar {
     margin-left: -18px;
    }

    }

    @media (max-width: 884px) {
        input.bsar {
     margin-left: -18px;
    }

    textarea.bsar {
     margin-left: -18px;
    }
    }

     /* untuk tampilan ipad */
     @media (min-width: 760px) and (max-width: 1000px) {
        div.widt {
            margin-top: 80px;
        }
     }

     @media (min-width: 1024px) {
        div.widt {
            margin-top: 30px;
        }
     }

          /* untuk tampilan laptop */
          @media (min-width: 1210px) and (max-width: 4000px) {
            input.bsar {
     margin-left: -8px;
    }

    textarea.bsar {
     margin-left: -8px;
    }
}

@media(max-width:1200px) {
    .gambar_contoh {
        display: none;
    }
}
.subject {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;


    @supports (-webkit-line-clamp: 2) {
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: initial;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
    }
  }
.description {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;


    @supports (-webkit-line-clamp: 3) {
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: initial;
      display: -webkit-box;
      -webkit-line-clamp: 3;
      -webkit-box-orient: vertical;
    }
  }


</style>

<!-- book section -->
<section class="book_section layout_padding">
    <div class="mx-5">
        <div class="row">
            <div class="col-xl-6 col-lg-12">
                <div class="form_container">
                    <form action="{{ route('ComplaintUser.store') }}" method="POST">
                        @csrf
                        <div class="bsar">
                            <h1
                                style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold; color: #333;">
                                Apa keluhanmu saat memasak?
                            </h1>

                            <p class="text-secondary">kami akan berusaha mencarikan solusi.</p>
                        </div>
                        <div class="">
                            <input type="text" class="form-control" id="subject" name="subject"
                                placeholder="Keluhan" />
                        </div>
                        <div class="">
                            <textarea style="height:180px;" class="form-control" id="description" name="description" placeholder="Deskripsi"></textarea>
                        </div>
                        <div>
                            <button
                            style="background-color: #f39c12; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px;"
                                type="submit">
                                <b>Kirim</b>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-xl-6 col-lg-12">
                <div class="image-container">
                    <img src="{{ asset('images/home.png') }}" alt="Gambar Contoh" class="gambar_contoh"
                        style="margin-top: -15%;width:100%;height:auto;" width="auto" height="auto">
                </div>
            </div>

        </div>
    </div>
</section>
<!-- end book section -->
{{-- <div class="row ms-1 mb-4 me-1" style="margin-top: -4%;">
    <div class="ms-5 input-group">
        <div class="ms-1">
            <h3 class="fw-bold mx-5">Keluhan Pengguna</h3>
        </div>
        <div class="ms-auto me-5">
            {{ $complaints->links('vendor.pagination.default') }}
        </div>
    </div>
</div> --}}
<div class="mx-5 mb-5">
    <div class="row mb-5">
        <h3 class="fw-bold">Keluhan Pengguna</h3>
        @if ($complaints->count() == 0)
    <div class="d-flex flex-column h-100 justify-content-center align-items-center" style="margin-top: 5em">
        <img src="images/data.png" style="width: 15em">
        <p><b>Tidak ada keluhan</b></p>
    </div>
@endif

        @foreach ($complaints as $item)
            <div class="col-lg-4">
                <div class="card p-0 mt-4 mb-2" style=" border-radius: 15px; border: 1px black solid">
                    <div class="card-body ">
                        <div class="widget-49">
                            <div class="widget-49-title-wrapper">
                                <div class="widget-49-date-primary">
                                    <img class="widget-49-date-primary" style="border:1.5px black solid"
                                        src="{{ asset('images/default.jpg') }}"alt="">
                                </div>
                                <div class="widget-49-meeting-info">
                                    <span class="widget-49-pro-title fw-bolder">{{ $item->user->name }}</span>
                                    <small class="text-secondary"><i>{{ $item->user->email }}</i></small>
                                </div>
                            </div>
                            <div class="mt-3 ms-1">
                                <p>
                                    <b>
                                        <a class="subject" style="color: black;" href="/show-reply-by/{{ $item->id }}">
                                            {{ $item->subject }}
                                        </a>
                                    </b><br>

                                    <small class="description">
                                        {{ $item->description}}
                                    </small>

                                </p>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--  --}}
    </div>
</div>
{{ $complaints->links('vendor.pagination.default') }}
<style>
    .text-poppins {
        font-family: 'Poppins';
    }

    .card-margin {
        margin-bottom: 1.875rem;
        height: ;
    }

    .card {
        border: 0;
        box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
        -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #ffffff;
        background-clip: border-box;
        border: 1px solid #e6e4e9;
        border-radius: 8px;
    }

    .card .card-header.no-border {
        border: 0;
    }

    .card .card-header {
        background: none;
        padding: 0 0.9375rem;
        font-weight: 500;
        display: flex;
        align-items: center;
        min-height: 50px;
    }

    .card-header:first-child {
        border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
    }

    .widget-49 .widget-49-title-wrapper {
        display: flex;
        align-items: center;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-primary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #edf1fc;
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fcfcfd;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
        color: #dde1e9;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
        color: #dde1e9;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #e8faf8;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
        color: #17d1bd;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
        color: #17d1bd;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebf7ff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
        color: #36afff;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
        color: #36afff;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: floralwhite;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
        color: #FFC868;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
        color: #FFC868;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #feeeef;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
        color: #F95062;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
        color: #F95062;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #fefeff;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
        color: #f7f9fa;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
        color: #f7f9fa;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #ebedee;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
        color: #394856;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
        color: #394856;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        background-color: #f0fafb;
        width: 4rem;
        height: 4rem;
        border-radius: 50%;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
        color: #68CBD7;
        font-weight: 500;
        font-size: 1.5rem;
        line-height: 1;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
        color: #68CBD7;
        line-height: 1;
        font-size: 1rem;
        text-transform: uppercase;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
        display: flex;
        flex-direction: column;
        margin-left: 1rem;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
        color: #3c4142;
        font-size: 14px;
    }

    .widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
        color: #B1BAC5;
        font-size: 13px;
    }

    .widget-49 .widget-49-meeting-points {
        font-weight: 400;
        font-size: 13px;
        margin-top: .5rem;
        margin-left: -10%;
    }

    .widget-49 .widget-49-meeting-points .widget-49-meeting-item {
        display: list-item;
        color: #727686;
    }
</style>
{{-- <section class="content mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-md-4 mb2">
                        </div>
                    </div>
                    <div class="row">

                        @foreach ($complaints as $row)
                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                <div class="card text-dark card-has-bg click-col"
                                    style="background-image:url('https://source.unsplash.com/600x900/?food');">
                                    <img class="card-img d-none" src="https://source.unsplash.com/600x900/?food"
                                        alt="Creative Manner Design Lorem Ipsum Sit Amet Consectetur dipisi?">
                                    <table>
                                        <div class="card-img-overlay d-flex flex-column">
                                            <div class="card-body">
                                                <small class="card-meta mb-2 text-dark"><b></b></small>
                                                <h4 class="card-title mt-0 "><a class="text-dark"
                                                        href="{{ route('ShowReplies.show', $row->id) }}"><b>{{ $row->subject }}</b></a>
                                                </h4>
                                                <small class="card-meta mb-2 text-dark">{{ $row->description }}</small><br>
                                                <small><i class="far fa-clock"></i>
                                                    {{ $row->created_at->diffForHumans(['short' => false]) }}</small>
                                            </div>
                                            <div class="card-footer">
                                                <div class="media">
                                                    <img class="mr-3 rounded-circle"
                                                        src="{{ asset('images/default-profile2.png') }}"
                                                        alt="profile image" style="max-width:50px">
                                                    <div class="media-body">
                                                        <h6 class="my-0 text-dark d-block">{{ $row->user->name }}
                                                        </h6>
                                                        <small>{{ $row->user->email }}</small>
                                                    </div>
                                                    <div>
                                                        <a href="{{ route('ShowReplies.show', $row->id) }}"
                                                            class="btn btn-warning btn-sm text-light rounded-3"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="32"
                                                                height="32" viewBox="0 0 24 24">
                                                                <path fill="currentColor"
                                                                    d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                </div>
                            </div>
                            </table>
                    </div>
                </div>
                @endforeach
    </section> --}}
@endsection
