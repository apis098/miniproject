@extends('layouts.nav_koki')
@section('konten')
    @push('style')
        @powerGridStyles
    @endpush
    <style>
       /* Gaya untuk tombol "Cari" */
            .zoom-effects {
                margin-left: 10px; /* Tambahkan jarak antara input dan tombol */
                /* Selain itu, Anda dapat menambahkan properti lain sesuai keinginan Anda */
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

        .garis {
            border-bottom: #F7941E 2px solid;
        }


        .search {
            background-color: #fff;
            padding: 0px 10px;
            border-radius: 5px;
            width: 250%;
        }

        .search-1 {
            position: relative;
            width: 100%
        }

        .search-1 input {
            height: 50px;
            border: none;
            width: 100%;
            padding-left: 25px;
            padding-right: 10px;
            border-right: 2px solid #eee
        }

        .search-1 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        .search-1 i {
            position: absolute;
            top: 12px;
            left: 5px;
            font-size: 24px;
            color: #eee
        }

        /* ::placeholder {
            color: #eee;
            opacity: 1
        } */

        /* Gaya untuk form pencarian */
        .search-2 {
            display: flex;
            align-items: center;
        }

        .search-2 input {
            height: 35px;
            border: none;
            width: 100%;
            padding-left: 15px;
            padding-right: 100px;


        }

        .search-2 input:focus {
            border-color: none;
            box-shadow: none;
            outline: none
        }

        /* button{
                background-color: #F7941E;
                border: none;
                height: 45px;
                width: 90px;
                color: #ffffff;
                position: absolute;
                right: 1px;
                top: 0px;
                border-radius: 15px
            } */
        .search-2 i {
            position: absolute;
            top: 12px;
            left: -10px;
            font-size: 24px;
            color: #eee
        }

        .search-2 button {
            position: absolute;
            right: 4px;
            top: -2px;
            border: none;
            height: 38px;
            background-color: #F7941E;
            color: #fff;
            width: 90px;
            border-radius: 4px
        }


        @media (max-width:800px) {
            .search-1 input {
                border-right: none;
                border-bottom: 1px solid #eee
            }

            .search-2 i {
                left: 4px
            }

            .search-2 input {
                padding-left: 34px
            }

            .search-2 button {
                height: 37px;
                top: 5px
            }
        }
    </style>

<div class="d-flex" style="margin-left: 20%;">
    <div class="my-3 ml-3" style="margin-right: -15%;">
        <form action="">
            <div class="container mt-1" style="margin-top: -35px; margin-left: -5px;">
                <div class="search" style="border-radius: 15px; border: 0.50px black solid;">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="search-2"> <i class='bx bxs-map'></i>
                                <form action="#" method="GET">
                                    <input type="text" name="profil" placeholder="Search For Something">
                                    <button type="submit" class="zoom-effects"
                                        style="border-radius: 15px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); margin-right: -17px">Cari</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tombol "Buat Resep" dipindahkan ke sini -->
            <button style="border-radius: 15px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                class="btn text-light mb-3">
                <span style="font-weight: 600">
                    <a href="/koki/resep" style="color: rgb(255, 255, 255);">Buat Resep</a>
                </span>
            </button>
        </form>
    </div>
</div>


    <!-- jQuery CDN -->
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
        integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
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
