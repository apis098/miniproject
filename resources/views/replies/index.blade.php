@extends('layouts.navbar')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
        .table-rounded {
            border-collapse: separate;
            border-radius: 10px;
            border-color: black;

        }

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
        

        .modal-body {
            background-color: #F8DE22;
            border-color: #F8DE22;
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

        /* .btn-primary {
                    color: #5165ff;
                    background-color: #fffaff;
                    border-color: #fffaff;
                    padding: 12px;
                    font-weight: 700;
                    border-radius: 41px;
                    padding-right: 20px;
                    padding-left: 20px;
                } */
    </style>
    <div class="mt-3">
        <div class="Rectangle185" style="width: 1060px; height: 54px; left: 280px; top: 35px; position: absolute; background: #F7941E; border-radius: 14px"></div>


        <div class="Gambar" style="width: 105px; left: 390px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Gambar</div>
        <div class="Username" style="width: 131px; left: 651px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Username</div>
        <div class="Subjek" style="width: 85px; left: 972px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Subjek</div>
        <div class="Aksi" style="width: 54px; left: 1200px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Aksi</div>


    <div class="Rectangle187" style="width: 1060px; height: 129px; left: 280px; top: 109px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
    <img src="" alt="" class="rounded-circle flex-shrink-0" style="width: 72px; height: 72px; left: 398px; top: 137px; position: absolute; border: 0.50px black solid">
    <div class="Ferdiansyah" style="width: 132px; left: 651px; top: 158px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
    <div class="MasakanGosong" style="width: 183px; left: 939px; top: 158px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Kurang Bumbu</div>
    <div class="Rectangle7" style="width: 93px; height: 40px; left: 1180px; top: 149px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
    <div class="Detail" style="width: 61px; left: 1200px; top: 154px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</div>




    <div class="Rectangle188" style="width: 1060px; height: 129px; left: 280px; top: 258px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
    <div class="Rectangle190" style="width: 1060px; height: 129px; left: 280px; top: 407px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
    <div class="Rectangle192" style="width: 1060px; height: 129px; left: 280px; top: 556px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
    <div class="Rectangle194" style="width: 1060px; height: 129px; left: 280px; top: 705px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
    <div class="Rectangle196" style="width: 1060px; height: 129px; left: 280px; top: 854px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
    <img src="" alt="" class="rounded-circle flex-shrink-0" style="width: 72px; height: 72px; left: 398px; top: 286px; position: absolute; border: 0.50px black solid">
    <img src="" alt="" class="rounded-circle flex-shrink-0" style="width: 72px; height: 72px; left: 398px; top: 435px; position: absolute; border: 0.50px black solid">
    <img src="" alt="" class="rounded-circle flex-shrink-0" style="width: 72px; height: 72px; left: 398px; top: 584px; position: absolute; border: 0.50px black solid">
    <img src="" alt="" class="rounded-circle flex-shrink-0" style="width: 72px; height: 72px; left: 398px; top: 733px; position: absolute; border: 0.50px black solid">
    <img  src="" alt="" class="rounded-circle flex-shrink-0" style="width: 72px; height: 72px; left: 398px; top: 882px; position: absolute; border: 0.50px black solid">
    <div class="Ferdiansyah" style="width: 134px; left: 653px; top: 307px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
    <div class="Ferdiansyah" style="width: 134px; left: 653px; top: 456px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
    <div class="Ferdiansyah" style="width: 134px; left: 653px; top: 605px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
    <div class="Ferdiansyah" style="width: 134px; left: 653px; top: 754px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
    <div class="Ferdiansyah" style="width: 134px; left: 653px; top: 903px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
    <div class="MasakanGosong" style="width: 183px; left: 939px; top: 307px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Kurang Bumbu</div>
    <div class="MasakanGosong" style="width: 183px; left: 939px; top: 456px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Kurang Bumbu</div>
    <div class="MasakanGosong" style="width: 183px; left: 939px; top: 605px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Kurang Bumbu</div>
    <div class="MasakanGosong" style="width: 183px; left: 939px; top: 754px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Kurang Bumbu</div>
    <div class="MasakanGosong" style="width: 183px; left: 939px; top: 903px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Kurang Bumbu</div>
    <div class="Rectangle197" style="width: 93px; height: 40px; left: 1180px; top: 298px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
    <div class="Rectangle198" style="width: 93px; height: 40px; left: 1180px; top: 447px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
    <div class="Rectangle199" style="width: 93px; height: 40px; left: 1180px; top: 596px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
    <div class="Rectangle200" style="width: 93px; height: 40px; left: 1180px; top: 745px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
    <div class="Rectangle201" style="width: 93px; height: 40px; left: 1180px; top: 894px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 15px"></div>
    <div class="Detail" style="width: 61px; left: 1200px; top: 303px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</div>
    <div class="Detail" style="width: 61px; left: 1200px; top: 452px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</div>
    <div class="Detail" style="width: 61px; left: 1200px; top: 601px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</div>
    <div class="Detail" style="width: 61px; left: 1200px; top: 750px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</div>
    <div class="Detail" style="width: 61px; left: 1200px; top: 899px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Detail</div>
   
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
    {{-- <table class="table table-striped table-rounded mx-auto" id="table">
        <thead class="bg-secondary text-light">
            <tr>
                <th>NO</th>
                <th>Dari:</th>
                <th>Subjek</th>
                <th>Deskripsi</th>
                <th>Balasan</th>
                <th>detail</th>
            </tr>
        </thead>
        <tbody class="table-active border-light">
            @foreach ($data as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->complaint->user->name }}</td>
                    <td>{{ $row->complaint->subject }}</td>
                    <td>{{ $row->complaint->description }}</td>
                    <td>{{ $row->reply }}</td>
                    <td>
                        <div class="ms-1">
                            <button type="button" class="btn btn-outline-primary btn-sm rounded-5 edit-btn"
                                data-toggle="modal" data-target="#replyModal{{ $row->id }}"><i
                                    class="fa-solid fa-circle-info"></i></button>
                        </div>
                    </td>
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
                                        <span class="intro-1">{{ $row->complaint->subject }}</span>
                                        <div class="mt-2"> <span class="intro-2">Balasan yang anda kirim:</span> </div>
                                        <span class="intro-1">{{ $row->reply }}</span>
                                        <div class="mt-2"> <span class="intro-2">Jumlah like:</span> </div>
                                        <span class="intro-1">{{ $row->likes }} <i
                                                class="fa-solid fa-thumbs-up"></i></span>
                                        <form action="{{ route('ReplyDestroy.destroy', $row->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="mt-4 mb-3"> <button
                                                    class="btn btn-outline-dark btn-sm rounded-5">delete <i class="fa-solid fa-trash-can"></i></button> </div>
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
