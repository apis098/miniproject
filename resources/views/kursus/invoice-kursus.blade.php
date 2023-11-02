<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hummacook-invoice Kursus</title>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
            margin-top: 20px;
            background-color: #fff;
        }
    </style>
</head>

<body>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css"
        integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
        <h2 style="background-color: #F7941E" class="mb-1">
            <div class="container">
            <span style="background-color: white;" class="px-4">Invoice</span>
            </div>
        </h2>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                        <div class="invoice-title mb-5">
                            <div class="mb-4">

                                <h3 class="mb-1" style="font-weight: 600;">Pembuat kursus : {{ $chef->name }}</h3>
                            </div>
                            <div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <span>EVT-E29406820690345</span>
                                    <p>PO: BP1015</p>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end">
                                    <h5 class="font-size-16 ">Profile pembuat kursus</h5>
                                    <span class="font-size-15 fw-bold">{{ $chef->name }}</span>
                                    <p class="mb-3">{{ $chef->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-12">
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                    <h5 class="font-size-16 ">Profile pengguna</h5>
                                    <span class="font-size-15 fw-bold">{{ $user->name }}</span>
                                    <p class="mb-1">{{ $user->email }}</p>
                                    </div>
                                    <div class="">
                                    <h5 class="font-size-16">Nama kursus</h5>
                                    <p class="mb-1">{{ $detail_transaksiKursus->course->nama_kursus }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="my-2" style="background-color: #F7941E;height:5px;width:100%;"></div>
                        <div class="py-2">
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>Tanggal Dibeli</th>
                                            <th>Nama sesi</th>
                                            <th>Tanggal Dimulai</th>
                                            <th style="width: 120px;">Harga</th>
                                        </tr>
                                    </thead>
                                    @foreach ($detail_sesiDibeli as $sesi_dibeli)

                                     <tr>
                                        <td>{{ $detail_transaksiKursus->created_at }}</td>
                                        <td>
                                             {{ $sesi_dibeli->judul_sesi }},
                                        </td>
                                        <td>{{ $sesi_dibeli->tanggal . " " . $sesi_dibeli->waktu }}</td>
                                        <td>Rp. {{ number_format($sesi_dibeli->harga_sesi, 2, ',', '.') }}</td>
                                     </tr>
                                     @endforeach
                                     <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td><span style="font-weight: 700;">Total</span> <br> Rp. {{ number_format($detail_sesiDibeli->sum('harga_sesi'), 2, ',', '.') }}</td>
                                     </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
</body>

</html>
