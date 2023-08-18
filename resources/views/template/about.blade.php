@extends('template.nav')

@section('content')
    <!-- about section -->
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="detail-box">
                        <div class="heading_container">
                            <h2 style="font-family: 'Arial', sans-serif; font-size: 24px; font-weight: bold;">
                                Tentang Kami
                            </h2>
                        </div>
                        <p class="mt-4">
                             Selamat Datang di HummaCook! HummaCook adalah online
                            media portal yang menyajikan kumpulan aneka resep masakan
                            untuk menginspirasi para pehobi masak. Menyajikan resep-resep
                            rumahan yang mudah dibuat oleh semua orang, dan
                            bahan-bahan masakan yang mudah didapatkan. Resep-resep
                            ditulis oleh teman-teman food blogger seantero Nusantara yang
                            sudah berpengalaman di bidang masak memasak. Harapan
                            kami semua orang bisa memasak dengan mudah dan berhasil,
                            supaya dapat disajikan dengan sempurna untuk keluarga
                            tercinta. Semua resep di sini telah teruji dapur dan foto yang
                            ditampilkan adalah original/hasil aslinya. Terima Kasih.
                        </p>
                        {{-- <a href="">
                            Baca Selengkapnya
                        </a> --}}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="img-box">
                        <img src="{{ asset('images/tentang.png') }}" alt="" style="max-width: 100%; margin-top: -10%">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end about section -->
@endsection
