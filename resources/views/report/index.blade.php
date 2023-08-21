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


<div class="Rectangle185" style="width: 1060px; height: 54px; left: 280px; top: 35px; position: absolute; background: #F7941E; border-radius: 14px"></div>

<div class="Pelapor" style="width: 96px; left: 350px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Pelapor</div>
<div class="User" style="width: 55px; left: 530px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">User</div>
<div class="Subjek" style="width: 85px; left: 700px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Subjek</div>
<div class="Repetisi" style="width: 102px; left: 900px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Repetisi</div>
<div class="Konfirmasi" style="width: 135px; left: 1105px; top: 44px; position: absolute; color: #F5F5F5; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">Konfirmasi</div>

<div class="Rectangle187" style="width: 1060px; height: 129px; left: 280px; top: 109px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
<div class="Ferdiansyah" style="width: 134px; left: 345px; top: 156px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ferdiansyah</div>
<div class="Ronaldo" style="width: 93px; height: 30px; left: 520px; top: 156px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
<div class="BerkataKotor" style="width: 140px; height: 30px; left: 695px; top: 156px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Berkata kotor</div>
<div class="Kali" style="width: 57px; height: 30px; left: 920px; top: 156px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">1 kali</div>
<div class="Rectangle198" style="width: 100px; height: 38px; left: 1060px; top: 152px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px"></div>
<div class="Rectangle199" style="width: 100px; height: 38px; left: 1180px; top: 152px; position: absolute; border-radius: 10px; border: 0.50px black solid"></div>
<div class="Terima" style="width: 76px; left: 1080px; top: 156px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Terima</div>
<div class="Tolak" style="width: 60px; left: 1205px; top: 156px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Tolak</div>





<div class="Rectangle200" style="width: 1060px; height: 129px; left: 280px; top: 258px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
<div class="Rectangle203" style="width: 1060px; height: 129px; left: 280px; top: 407px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
<div class="Rectangle206" style="width: 1060px; height: 129px; left: 280px; top: 556px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
<div class="Rectangle209" style="width: 1060px; height: 129px; left: 280px; top: 705px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
<div class="Rectangle212" style="width: 1060px; height: 129px; left: 280px; top: 854px; position: absolute; border-radius: 14px; border: 0.50px black solid"></div>
<div class="Ferdiansyah" style="width: 134px; left: 345px; top: 305px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ferdiansyah</div>
<div class="Ferdiansyah" style="width: 134px; left: 345px; top: 454px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ferdiansyah</div>
<div class="Ferdiansyah" style="width: 134px; left: 345px; top: 603px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ferdiansyah</div>
<div class="Ferdiansyah" style="width: 134px; left: 345px; top: 752px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ferdiansyah</div>
<div class="Ferdiansyah" style="width: 134px; left: 345px; top: 901px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ferdiansyah</div>
<div class="Ronaldo" style="width: 93px; height: 30px; left: 520px; top: 305px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
<div class="Ronaldo" style="width: 93px; height: 30px; left: 520px; top: 454px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
<div class="Ronaldo" style="width: 93px; height: 30px; left: 520px; top: 603px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
<div class="Ronaldo" style="width: 93px; height: 30px; left: 520px; top: 752px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
<div class="Ronaldo" style="width: 93px; height: 30px; left: 520px; top: 901px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Ronaldo</div>
<div class="BerkataKotor" style="width: 140px; height: 30px; left: 695px; top: 305px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Berkata kotor</div>
<div class="BerkataKotor" style="width: 140px; height: 30px; left: 695px; top: 454px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Berkata kotor</div>
<div class="BerkataKotor" style="width: 140px; height: 30px; left: 695px; top: 603px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Berkata kotor</div>
<div class="BerkataKotor" style="width: 140px; height: 30px; left: 695px; top: 752px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Berkata kotor</div>
<div class="BerkataKotor" style="width: 140px; height: 30px; left: 695px; top: 901px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">Berkata kotor</div>
<div class="Kali" style="width: 57px; height: 30px; left: 920px; top: 305px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">1 kali</div>
<div class="Kali" style="width: 57px; height: 30px; left: 920px; top: 454px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">1 kali</div>
<div class="Kali" style="width: 57px; height: 30px; left: 920px; top: 603px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">1 kali</div>
<div class="Kali" style="width: 57px; height: 30px; left: 920px; top: 752px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">1 kali</div>
<div class="Kali" style="width: 57px; height: 30px; left: 920px; top: 901px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.40px; word-wrap: break-word">1 kali</div>
<div class="Rectangle201" style="width: 100px; height: 38px; left: 1060px; top: 301px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px"></div>
<div class="Rectangle204" style="width: 100px; height: 38px; left: 1060px; top: 450px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px"></div>
<div class="Rectangle207" style="width: 100px; height: 38px; left: 1060px; top: 599px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px"></div>
<div class="Rectangle210" style="width: 100px; height: 38px; left: 1060px; top: 748px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px"></div>
<div class="Rectangle213" style="width: 100px; height: 38px; left: 1060px; top: 897px; position: absolute; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px"></div>
<div class="Rectangle202" style="width: 100px; height: 38px; left: 1180px; top: 301px; position: absolute; border-radius: 10px; border: 0.50px black solid"></div>
<div class="Rectangle205" style="width: 100px; height: 38px; left: 1180px; top: 450px; position: absolute; border-radius: 10px; border: 0.50px black solid"></div>
<div class="Rectangle208" style="width: 100px; height: 38px; left: 1180px; top: 599px; position: absolute; border-radius: 10px; border: 0.50px black solid"></div>
<div class="Rectangle211" style="width: 100px; height: 38px; left: 1180px; top: 748px; position: absolute; border-radius: 10px; border: 0.50px black solid"></div>
<div class="Rectangle214" style="width: 100px; height: 38px; left: 1180px; top: 897px; position: absolute; border-radius: 10px; border: 0.50px black solid"></div>
<div class="Terima" style="width: 76px; left: 1080px; top: 305px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Terima</div>
<div class="Terima" style="width: 76px; left: 1080px; top: 901px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Terima</div>
<div class="Terima" style="width: 76px; left: 1080px; top: 454px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Terima</div>
<div class="Terima" style="width: 76px; left: 1080px; top: 603px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Terima</div>
<div class="Terima" style="width: 76px; left: 1080px; top: 752px; position: absolute; color: white; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Terima</div>
<div class="Tolak" style="width: 60px; left: 1205px; top: 305px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Tolak</div>
<div class="Tolak" style="width: 60px; left: 1205px; top: 454px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Tolak</div>
<div class="Tolak" style="width: 60px; left: 1205px; top: 603px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Tolak</div>
<div class="Tolak" style="width: 60px; left: 1205px; top: 752px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Tolak</div>
<div class="Tolak" style="width: 60px; left: 1205px; top: 901px; position: absolute; color: black; font-size: 20px; font-family: Poppins; font-weight: 500; letter-spacing: 0.20px; word-wrap: break-word">Tolak</div>
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
                    @if($row->reply_id)
                    <td>{{$row->replies->reply}}</td>
                    @elseif($row->profile_id)
                        @if($row->user->foto)
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
                                        <span class="intro-1">p<i
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
