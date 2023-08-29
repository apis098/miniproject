@extends('layouts.navbar')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
        .table-rounded thead th:first-child {
            border-top-left-radius: 10px;
        }

        .table-rounded thead th:last-child {
            border-top-right-radius: 10px;
        }

        .table-rounded tbody tr:last-child td:first-child {
            border-bottom-left-radius: 10px;
        }

        .table-rounded tbody tr:last-child td:last-child {
            border-bottom-right-radius: 10px;
        }

        .btn-group-vertical {
            display: flex;
            flex-direction: column;
        }

        .zoom-effects:hover {
            transform: scale(0.97);
        }

        .intro-1 {
            font-size: 20px
        }

        .close {
            color: #fff
        }

        .close:hover {
            color: #fff
        }

        .intro-2 {
            font-size: 13px
        }

        .ah {
            background-color: #fff;
        }

        .table-custom {
            text-align: center;
        }

        .table-custom {
            text-align: center;
            border-collapse: separate;
            border-spacing: 0px 15px;
        }

        .table-custom td {
            padding-top: 30px;
            padding-bottom: 30px;
            width: 195px;
            border-top: solid black;
            border-bottom: solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
        }

        .table-custom th {
            padding: 10px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom thead {
            margin-bottom: 50px;
        }

        /* .table-custom thead {
                        background: #F7941E;
                        margin-bottom: 10%;
                        color: white;
                    } */

        /* .table-custom tr:not(.thead) {
                    margin-top: 10px;
                    margin-bottom: 10px;
                    border: 2px solid black;
                } */

        .table-custom td:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom td:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .table-custom th:first-child {
            border-top-left-radius: 15px;
            border-bottom-left-radius: 15px;
        }

        .table-custom th:last-child {
            border-top-right-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        tr {
            padding: 30px;
        }

        .yuhu {
            background: none;
            color: inherit;
            border: none;
            padding: 0;
            font: inherit;
            cursor: pointer;
            outline: inherit;
        }
    </style>

    <div class=" d-flex justify-content-center ms-3">
        <div class="my-5 ml-5" style="margin-right: -15%;">
            <ul class="nav mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a id="click1" class="nav-link mr-5 active" id="pills-home-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                        aria-selected="true">
                        <h5 class="text-dark ms-2" style="font-weight: 600; word-wrap: break-word;">Laporan Resep</h5>
                        <div id="border1" class="ms-4" style="width: 70%; height: 100%; border: 1px #F7941E solid;"></div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <a id="c" class="nav-link mr-5" id="pills-profile-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Laporan keluhan</h5>
                        <div id="b" class="ms-3" style="width: 78%; height: 80%; border: 1px #F7941E solid;" hidden>
                        </div>
                    </a>
                </li>
                <li class="nav-item" role="presentation">
                    <button id="button-tab" class="nav-link mr-5 yuhu mt-2" id="pills-footer-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                        aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">Laporan komentar </h5>
                        <div id="f" class="ms-3" style="width: 80%; height: 100%; border: 1px #F7941E solid;" hidden></div>
                    </button>
                </li>
            </ul>
            <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
                    tabindex="0">
                    {{-- start tab 1 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mt-5">
                                <td style="border-left:solid black;" class="mt">Dummy</td>
                                <td>Koki</td>
                                <td>Berkata kasar</td>
                                <td>1 Kali</td>
                                <td style="border-right: solid black;">@mdo</td>
                            </tr>
                            <tr>
                                <td style="border-left:solid black;">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td style="border-right: solid black;">@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mt-5">
                                <td style="border-left:solid black;" class="mt">Dummy</td>
                                <td>Koki</td>
                                <td>Berkata kasar</td>
                                <td>1 Kali</td>
                                <td style="border-right: solid black;">@mdo</td>
                            </tr>
                            <tr>
                                <td style="border-left:solid black;">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td style="border-right: solid black;">@mdo</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
                    tabindex="0">
                    {{-- start tab 2 --}}
                    <table class="table-custom">
                        <thead>
                            <tr>
                                <th scope="col">Pelapor</th>
                                <th scope="col">User</th>
                                <th scope="col">Subjek</th>
                                <th scope="col">Repitisi</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="mt-5">
                                <td style="border-left:solid black;" class="mt">Dummy</td>
                                <td>Koki</td>
                                <td>Berkata kasar</td>
                                <td>1 Kali</td>
                                <td style="border-right: solid black;">@mdo</td>
                            </tr>
                            <tr>
                                <td style="border-left:solid black;">1</td>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>Otto</td>
                                <td style="border-right: solid black;">@dknsallk</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- end --}}
            </div>

        </div>
    </div>
    <script>
        const click1 = document.getElementById("click1");
        const click3 = document.getElementById("click3");
        const border1 = document.getElementById("border1");
        const border3 = document.getElementById("border3");
        const click2 = document.getElementById("c");
        const border2 = document.getElementById("b");
        const underline = document.getElementById("f");
        const buttonTab = document.getElementById("button-tab");
        buttonTab.addEventListener("click", function() {
            tab3();
        });

        function tab3() {
            event.preventDefault();
            border1.style.display = "none";
            border2.style.display = "none";
            underline.style.display = "block";
            underline.removeAttribute('hidden');
        }
        click1.addEventListener('click', function() {
            event.preventDefault();
            border1.style.display = "block";
            border2.style.display = "none";
            underline.style.display = "none";
            underline.addAttribute('hidden');
        });
        click2.addEventListener("click", function() {
            event.preventDefault();
            border2.removeAttribute('hidden');
            border2.style.display = "block";
            border1.style.display = "none";
            underline.style.display = "none";
            underline.addAttribute('hidden');
        });
    </script>
    </div>




    {{-- <div class=" mb-2 mt-1 mb-md-1">
        <label for="name" class="mb-1 ms-2 text-secondary">Tambah Data:</label>
        <div>
            <form method="POST" action="" class="d-flex align-items-center">
                @csrf
                <input type="text" class="form-control ms-1 mb-1 me-2 rounded-3" id="name" name="name"
                    aria-describedby="emailHelp" placeholder="Masukkan nama hari...">
                <input type="hidden" value="-" class="form-control" id="description" name="description"
                    placeholder="Masukkan Deskripsi...">
                <button type="submit" class="btn btn-primary btn-sm rounded-5 mb-1 zoom-effects d-flex align-items-center"
                    data-mdb-ripple-color="dark">
                    <i class="fa-regular fa-floppy-disk me-1"></i>
                    Submit
                </button>
            </form>
        </div>
    </div> --}}
    {{-- <table class="table table-striped table-rounded mx-auto mt-4" id="table">
        <thead class="bg-secondary text-light">
            <tr>

                <th>Pelapor:</th>
                <th>User</th>
                <th>Subjek</th>
                <th>Repetisi</th>
                <th>Konfirmasi</th>
            </tr>
        </thead>
        <tbody class="table-active border-light">
            @foreach ($data as $row)
                <tr>

                    <td>{{$row->userSender->name}}</td>
                    <td>{{$row->user->name}}</td>
                    @if ($row->reply_id)
                    <td>{{$row->replies->reply}}</td>
                    @elseif($row->profile_id)
                        @if ($row->user->foto)
                            <td>
                                <img src="{{asset('storage/'.$row->user->foto)}}" class="img-thumbnail" width="106px" height="104px" alt="halo">
                            </td>
                        @else
                            <td>
                                <img src="{{asset('images/default.jpg')}}" class="img-thumbnail" width="106px" height="104px" alt="halo">
                            </td>
                        @endif
                    @endif
                    <td>{{$row->user->jumlah_pelanggaran}} kali</td>
                    <td>
                        <div class="form-group">

                            <form action="{{ route('ReplyBlocked.destroy', $row->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <div class="ms-1">
                                    <button type="submit" class="btn btn-outline-primary btn-sm rounded-5 edit-btn">Terima laporan <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48"><g fill="currentColor"><path fill-rule="evenodd" d="M16 5h13l9 9v23a2 2 0 0 1-2 2H16a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm19 9l-6-6v5a1 1 0 0 0 1 1h5Zm-2.293 7.293a1 1 0 0 1 0 1.414L24 31.414l-4.707-4.707a1 1 0 0 1 1.414-1.414L24 28.586l7.293-7.293a1 1 0 0 1 1.414 0Z" clip-rule="evenodd"/><path d="M12 11h-2v27a5 5 0 0 0 5 5h19v-2H15a3 3 0 0 1-3-3V11Z"/></g></svg></button>
                                </div>
                            </form>
                            <form action="{{ route('Report.destroy', $row->id) }}" method="POST" class="d-inline-block">
                                @csrf
                                @method('DELETE')
                                <div class="ms-1">
                                    <button type="submit" class="btn btn-outline-danger btn-sm rounded-5 edit-btn">Tolak laporan <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M15 3v4a1 1 0 0 0 1 1h4"/><path d="M17 17h-6a2 2 0 0 1-2-2V9m0-4a2 2 0 0 1 2-2h4l5 5v7c0 .294-.063.572-.177.823"/><path d="M16 17v2a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2M3 3l18 18"/></g></svg></button>
                                </div>
                            </form>
                        </div>
                        {{-- <div class="ms-1">
                            <button type="submit" class="btn btn-outline-primary btn-sm rounded-5 edit-btn"
                                data-toggle="modal" data-target="#replyModal{{ $row->replies->id }}">Terima laporan <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48"><g fill="currentColor"><path fill-rule="evenodd" d="M16 5h13l9 9v23a2 2 0 0 1-2 2H16a2 2 0 0 1-2-2V7a2 2 0 0 1 2-2Zm19 9l-6-6v5a1 1 0 0 0 1 1h5Zm-2.293 7.293a1 1 0 0 1 0 1.414L24 31.414l-4.707-4.707a1 1 0 0 1 1.414-1.414L24 28.586l7.293-7.293a1 1 0 0 1 1.414 0Z" clip-rule="evenodd"/><path d="M12 11h-2v27a5 5 0 0 0 5 5h19v-2H15a3 3 0 0 1-3-3V11Z"/></g></svg></button>
                        </div> --}}
    {{--    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    @foreach ($data as $row)
        @if ($row->id != '')
            <div class="modal fade" id="replyModal{{ $row->id }}" data-backdrop="static" data-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg ">
                    <div class="modal-content rounded-5">
                        <div class="modal-body rounded-4">
                            <div class="text-right"> <i class="fa fa-close close" data-dismiss="modal"></i> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="text-center mt-4"> <img src="{{ asset('images/modal.png') }}"
                                            width="320"> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-white fw-semibold mt-4">
                                        <div class="mt-2"> <span class="intro-2">Judul keluhan:</span> </div>
                                        <span class="intro-1">d</span>
                                        <div class="mt-2"> <span class="intro-2">Balasan yang anda kirim:</span> </div>
                                        <span class="intro-1">p</span>
                                        <div class="mt-2"> <span class="intro-2">Jumlah like:</span> </div>
                                        <span class="intro-1">p<i class="fa-solid fa-thumbs-up"></i></span>
                                        <form action="{{ route('ReplyDestroy.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mt-4 mb-3"> <button
                                                    class="btn btn-outline-dark btn-sm rounded-5">delete <i
                                                        class="fa-solid fa-trash-can"></i></button> </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
    {{-- end modal edit --}}
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#search').on('input', function() {
                var value = $(this).val().toLowerCase();
                $('#table tbody tr').filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
        // $(document).ready(function() {
        //     $('#buttonModal').on('click', function() {
        //         var complaintId = $(this).data('complaint-id');

        //         $.ajax({
        //             url: '/show-reply-by/' + complaintId,
        //             type: 'GET',
        //             dataType: 'html',
        //             success: function(data) {
        //                 $('#replyData').html(data); // Memasukkan data balasan ke dalam modal
        //                 $('#repliesModal').modal('show'); // Menampilkan modal
        //             },
        //             error: function() {
        //                 // Tampilkan pesan error jika data balasan tidak berhasil dimuat
        //                 $('#replyData').html('<p>Failed to load replies.</p>');
        //                 $('#repliesModal').modal('show');
        //             }
        //         });
        //     });
        // });
    </script>
@endsection
