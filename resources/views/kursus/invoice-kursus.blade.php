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
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                        <div class="invoice-title">
                            <div class="mb-4">
                                <h2 class="mb-1">Invoice</h2>
                                <p class="mb-1 ">Pembuat kursus :</p>
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
                                    <span class="font-size-15 fw-bold">Alexandra daddario</span>
                                    <p class="mb-3">Alexandracantik@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-4">
                            <div class="col-sm-6">
                                <div class="">
                                    <h5 class="font-size-16 ">pembeli kursus</h5>
                                    <span class="font-size-15 fw-bold">Preston Miller</span>
                                    <p class="mb-1">PrestonMiller@armyspy.com</p>
                                </div>
                            </div>
                        </div>
                        <hr class="my-2">
                        <div class="py-2">
                            <div class="table-responsive">
                                <table class="table table-borderless align-middle table-nowrap table-centered mb-0">
                                    <thead>
                                        <tr>
                                            <th>tanggal</th>
                                            <th>Nama sesi</th>
                                            <th>Nama kursus</th>

                                            <th style="width: 120px;">Harga</th>
                                        </tr>
                                    </thead>
                                    @foreach ($transaksi_kursus as $detail_transaksiKursus)
                                     <tr>
                                        <td>{{ $detail_transaksiKursus->created_at }}</td>
                                        <td>{{ $detail_transaksiKursus->course->nama_kursus }}</td>
                                        <td>cara memanggang daging</td>
                                        <td>Rp. {{ $detail }}</td>

                                     </tr>
                                    @endforeach
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
