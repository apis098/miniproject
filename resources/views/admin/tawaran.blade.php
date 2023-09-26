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
            border-top: 1px solid black;
            border-bottom: 1px solid black;
            border-left: none;
            border-right: none;
            top: 10px;
            overflow: hidden;
            font-weight: bolder;
        }

        .table-custom th {
            padding: 10px;
            width: 195px;
            background-color: #F7941E;
            margin-bottom: 50px;
            color: #fff;
        }

        .table-custom thead {
            margin-bottom: 50px;
        }

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

        .btn-edit {
            background: #F7941E;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            color: white;
            font-size: 18px;
            font-family: 'poppins';
            font-weight: 500;
            word-wrap: break-word;
            border: none;
            letter-spacing: 0.20px;
            margin-left: 210%;
        }

        .btn-hapus {
            width: 100%;
            height: 100%;
            background-color: white;
            font-size: 17px;
            font-family: 'Poppins';
            font-weight: 500;
            letter-spacing: 0.20px;
            word-wrap: break-word;
            color: black;
            border-radius: 10px;
            margin-left: 10px;
            border: 0.50px black solid;

        }

        .garis {
            border-bottom: #F7941E 2px solid;
        }

        @media (max-width: 768px) {
    /* Aturan CSS untuk layar dengan lebar maksimum 768px */
    .my-5 {
        margin: 0;
    }

    .ml-5 {
        margin-left: 0;
    }

    .mr-3 {
        margin-right: 0;
    }

    /* ... (aturan CSS lainnya) ... */

    /* Mengubah lebar input pada formulir */
    .form-control {
        width: 100%;
    }

    /* Mengatur margin pada tombol Hapus dan Tambah Paket */
    .btn-delete,
    .btn-add {
        margin-left: 0;
    }
}


    </style>

<div class=" d-flex justify-content-center ms-3" style="overflow-x:hidden;">
    <div class="my-5" style="margin-left: 15rem;">

      <div class="mb-3 row">
        <label class="col-sm-1 col-form-label fw-bold">Nama</label>
        <div class="col-sm-10">
            <input type="text" id="comment-veed1" name="commentVeed"
                class="form-control "
                style="  width: 61rem; margin-left: -30px"
                placeholder="Masukkan Nama Paket...">
        </div>
      </div>
      <!-- /.form group -->

      <!-- Color Picker -->
      <div class="mb-3 row">
        <label class="col-sm-1 col-form-label fw-bold">Harga </label>
        <div class="col-sm-10">
            <input type="text" id="comment-veed1" name="commentVeed"
            class="form-control "
            style="  width: 61rem; margin-left: -30px"
            placeholder="Masukkan Harga Paket...">
    </div>
        <!-- /.input group -->
      </div>
      <div class="mb-3 row">
        <label class="col-sm-1 col-form-label fw-bold">Durasi </label>
        <div class="col-sm-10">
            <input type="text" id="comment-veed1" name="commentVeed"
            class="form-control "
            style="  width: 61rem; margin-left: -30px"
            placeholder="Masukkan Durasi Aktif Paket...">
    </div>
        <!-- /.input group -->
      </div>



      <!-- /.form group -->

      <!-- time Picker -->
      {{-- <div class="d-flex">
        <div class="mb-3 row">
          <label class="col-sm-2 col-form-label fw-bold">Detail</label>
          <div class="col-sm-10">
          <div class="d-flex" id="timepicker" data-target-input="nearest">
            <input type="text" class="form-control" style="width: 250%;font-family:poppins; ">
            <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
              &nbsp  <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>
            </div>
        </div>
          <!-- /.input group -->
        </div>
        <!-- /.form group -->
      </div> --}}

      <div class="d-flex">
          <label class="col-form-label fw-bold ">Detail </label> &nbsp; &nbsp; &nbsp;
          <input type="text" id="comment-veed1" name="commentVeed"
              class="form-control me-2"
              style="  width: 55rem;"
              placeholder="Masukkan Detail Paket...">

          <button type="submit" class="btn text-light rounded-3"
              style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                  class="ms-2 me-2">Hapus</b>
          </button>
        </div>
        <button type="button" class="btn text-light rounded-3 mt-3 float-end"
        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
            class="ms-2 me-2">Tambah Paket</b>
    </button>
</div>
</div>
    <div class="d-flex justify-content-center" style="margin-top: -2%;">
        {{-- {!! $holidays->links('modern-pagination') !!} --}}
    </div>
    <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
    <!-- jQuery CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

@endsection
