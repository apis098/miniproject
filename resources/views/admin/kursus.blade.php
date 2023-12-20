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
      transform: scale(1);
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
      width: 100%;
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
      width: 245px;
      background-color: #F7941E;
      margin-bottom: 50px;
      color: #fff;
    }

    .table-custom thead {
      margin-bottom: 50px;
      width: fit-content;
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
      border: 0.50px black solid
    }

    .garis {
      border-bottom: #F7941E 2px solid;
    }

    .fa-circle {}


    .search {
      background-color: #fff;
      padding: 4px;
      border-radius: 5px;
      width: 100%;
    }

    .search-1 {
      position: relative;
      width: 100%
    }

    .search-1 input {
      height: 45px;
      border: none;
      width: 100%;
      padding-left: 34px;
      padding-right: 10px;
      border-right: 2px solid #eee;
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
      font-size: 10px;
      color: #eee
    }

    ::placeholder {
      color: grey;
      opacity: 1
    }

    .search-2 {
      position: relative;
      width: 100%;
    }

    .search-2 input:focus {
      box-shadow: none;
    }


    .search-2 i {
      position: absolute;
      top: 12px;
      left: -10px;
      font-size: 14px;
      color: #eee
    }

    @media(min-width:991px) {
      .search-2 button {
        position: absolute;
        top: 0px;
        right: 0px;
        border: none;
        height: 45px;
        background-color: #F7941E;
        color: #fff;
        width: 90px;
      }

      .search-2 input {
        height: 45px;
        border: 0.50px black solid;
        width: 100%;
        border-radius: 15px;
        color: #000;

        text-align: center;
      }
    }

    @media(max-width:992px) {
      .search-2 button {
        position: absolute;
        top: 0px;
        right: 0px;
        border: none;
        height: 35px;
        background-color: #F7941E;
        color: #fff;
        width: 70px;
      }

      .search-2 input {
        height: 35px;
        border: 0.50px black solid;
        width: 100%;
        border-radius: 15px;
        color: #000;

        text-align: center;
      }
    }

    .scrollbar::-webkit-scrollbar-track {
      border-radius: 10px;
      background-color: #F5F5F5;
    }

    .scrollbar::-webkit-scrollbar {
      width: 8px;
      background-color: #F5F5F5;
      height: 5px;
    }

    .scrollbar::-webkit-scrollbar-thumb {
      border-radius: 10px;
      background-color: #F7941E;
    }

    @media(max-width:992px) {
      .modalfooterterima {
        display: flex;
        justify-content: center;
      }
    }

    @media(max-width:991px) {
        .imagesAlasan {
        display: none;
      }
    }
  </style>
  <script>
    $(document).ready(function() {
      $("#search-user").on("input", function() {
        let value = $(this).val().toLowerCase();
        $("#search-results").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
      });
    });
  </script>
  <div class="mx-3">
    <div class="search-1 mt-3" style="border-radius: 15px;">
      <div class="mt-2">
        <div class="search-2"> <i class='bx bxs-map'></i>
          <form action="#" method="GET">
            <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
              id="search-user">
            <button type="submit" class="zoom-effects cari2"
              style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
              Cari
            </button>
          </form>
        </div>
      </div>
    </div>
    <div class="scrollbar" style="overflow-x:scroll;">
      <table id="table-resep" class="table-custom ml-auto" style="min-width: 400px;">
        <thead>
          <tr>
            <th scope="col">Gambar</th>
            <th scope="col">Nama kursus</th>
            <th scope="col">Nama pengguna</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody id="search-results">
          @foreach ($all_course as $item)
            <tr class="mt-5">
              <td style="border-left:1px solid black;">
                <a href="#" data-toggle="modal" data-target="#modalKursus{{ $item->id }}" class="">
                  <img src="{{ asset('storage/' . $item->foto_kursus) }}"
                  class="card-img-top"
                  style="max-width:100%; object-fit: cover; max-height:120px; min-height:120px;  width:100%; border-top-left-radius:15px;
                 border-top-right-radius: 15px"
                  alt="Hollywood Sign on The Hill" />
                </a>
                <div class="modal fade bd-example-modal-xl rounded-5" id="modalKursus{{ $item->id }}" tabindex="-1"
                  role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true" style="text-align: left;">
                  <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                      <div class="modal-body">
                        <section>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="fa-regular text-dark fa-circle-xmark"></i>
                          </button>
                          <div class="container">
                            <div class="row">
                              <div class="col lg-6 my-3">
                                <button type="button"class="btn"
                                  style=" background: #F7941E;color:white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;  color: white; font-size: 16px; font-family: Poppins; font-weight: 400; letter-spacing: 0.36px; word-wrap: break-word">
                                  @foreach ($item->jenis_kursus as $jenis_kursus)
                                    {{ $jenis_kursus->jenis_kursus }}
                                  @endforeach
                                </button>
                                <br>
                                <br>
                                <p
                                  style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                                  <b> {{ $item->nama_kursus }} </b>
                                </p>
                                <div class="my-3 mt-5">
                                  <h3 class="mb-3"
                                    style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                    <b>Tentang kursus</b>
                                  </h3>

                                  <p class="ellipsis-name">{{ $item->deskripsi_kursus }}</p>

                                </div>
                                <div class=" mt-3">
                                  <h3
                                    style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                    <b>Lokasi kursus</b>
                                  </h3>
                                  <button type="button" class="btn mt-3"
                                    style=" border-radius: 12px; border: 1px black solid">
                                    <i class="fas fa-regular fa-location-dot"></i>
                                    {{ $item->nama_lokasi }}
                                  </button>
                                </div>

                              </div>
                              <div class="col-xl-3 col-sm-4 mb-4 my-5">
                                <div class="bg-white shadow-sm py-5 border border-secondary text-center"
                                  style="border-radius: 20px; height:16rem;">
                                  <img src="{{ asset('storage/' . $item->foto_kursus) }}" alt=""
                                  class="card-img-top mb-3"
                                  style="max-width:100%; object-fit: cover; max-height:120px; min-height:120px;  width:100%; border-top-left-radius:15px;
                                 border-top-right-radius: 15px">
                                  <h5 class="mb-0">
                                    <a href="#"
                                      style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                      <span class="ellipsis-name">{{ $item->user->name }}</span>
                                      @if ($item->user->isSuperUser == 'yes')
                                          <i class="fa-regular text-primary fa-circle-check ms-1"></i>
                                      @endif
                                    </a>
                                  </h5>

                                </div>
                              </div>
                            </div>
                        </section>
                      </div>
                    </div>


                  </div>
                </div>
              </td>
              <td>
                <p data-toggle="modal" data-target="#modalKursus{{ $item->id }}">
                {{ $item->nama_kursus }}
                </p>
              </td>
              <td>
                {{ $item->user->name }}
              </td>
              <td style="border-right:1px solid black;">
                <div class="d-flex justify-content-center">
                  <button type="button" class="btn mr-1"
                    style="border: 1px solid black;border-radius:15px;background-color:#F7941E;color:white;"
                    data-bs-toggle="modal" data-bs-target="#ModalTerima{{ $item->id }}">Terima</button>
                  <button type="button" class="btn ml-1"
                    style="border: 1px solid black;border-radius:15px;background-color:white;color:black;"
                    data-bs-target="#ModalTolak{{ $item->id }}" data-bs-toggle="modal">Tolak</button>
                </div>
              </td>
            </tr>
            <div class="modal" id="ModalTerima{{ $item->id }}" role="dialog"
              aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
              <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                  <form action="{{ route('eksekusi.kursus', ['diterima', $item->id]) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="modal-header">
                      <h5 class="modal-title" id="reportModal"
                        style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                        Peringatan</h5>
                      <button type="button" class="close text-black" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body row d-flex align-items-center col-12">
                      <!-- Tambahkan kelas "align-items-center" -->
                      <div class="col-lg-2 col-md-12 mt-2 text-center">
                        <img class="mr-3" src="{{ asset('image 94.png') }}" width="100px" height="100px"
                          style="border-radius: 50%" alt="">
                      </div>
                      <div class="col-lg-10 col-md-12">
                        <div class="widget-49-meeting-info">

                        </div>
                        <p class="ml-4">
                          Apakah anda yakin telah mengecek data kursus dengan benar?
                        </p>
                      </div>
                    </div>
                    <div class="modal-footer modalfooterterima">
                      <button type="submit" class="btn btn-light text-light rounded-3"
                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                          class="ms-2 me-2">Ya</b>
                      </button>
                      <button type="button" data-dismiss="modal" class="btn btn-light text-light rounded-3"
                        style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                          class="ms-2 me-2">Tidak</b>
                      </button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="modal" id="ModalTolak{{ $item->id }}">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="width: 100%;">
                        <div class="modal-header">
                            <h5 class="modal-title fw-bolder">Kirim alasan
                            </h5>
                            <button type="button" class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="text-align: right;">
                            <form
                                action={{ route('eksekusi.kursus', ['ditolak', $item->id]) }}" id="FormBlockReplyCommentRecipe{{$item->id}}"
                                method="post">
                                @csrf
                                @method('PATCH')
                                <input type="hidden" name="block_resep"
                                    value="yes">
                                <div class="row mb-3">
                                    <div
                                        class="col-lg-4 col-md-12 align-items-ceneter text-center">
                                        <img class="img-fluid imagesAlasan"
                                            src="{{ asset('images/alasan.png') }}"
                                            width="100%" alt="">
                                    </div>
                                    <div
                                        class="col-lg-8 col-md-12 align-items-center">
                                        <textarea name="alasan" class="form-control" style="border-radius: 15px;" id="AlasanBlockReplyCommentRecipe{{$item->id}}"
                                            placeholder="Alasan..." cols="5" rows="5"></textarea>
                                    </div>
                                </div>
                                <button type="submit" id="ButtonBlockReplyCommentRecipe{{$item->id}}" onclick="BlockReplyCommentRecipe({{$item->id}})"
                                    style="height: 40px; margin-right: 20px; margin-top: 12px; background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                                    class="btn  btn-sm text-light">
                                    <b class="me-3 ms-3">Kirim</b></button>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
          @endforeach
        </tbody>
      </table>
      {{ $all_course->links('vendor.pagination.default') }}
      @if ($all_course->count() == 0)
        <div class="d-flex flex-column justify-content-center align-items-center mt-5">
          <img src="{{ asset('images/data.png') }}" style="width: 15em">
          <p><b>Tidak ada kursus</b></p>
        </div>
      @endif
    </div>
  </div>
  <script>
    function limitName() {
      let elements = document.querySelectorAll('.ellipsis-name');

      elements.forEach(element => {
        let text = element.textContent.trim(); // Mengambil teks asli dari elemen
        let screenWidth = window.innerWidth;
        let maxLength;

        if (screenWidth <= 425) {
          maxLength = 5;
        } else if (screenWidth <= 767 && screenWidth >= 426) {
          maxLength = 10;
        } else {
          maxLength = 20;
        }

        let shortenedText = text.length > maxLength ? text.substr(0, maxLength) + '...' : text;
        element.textContent = shortenedText;
      });
    }

    document.addEventListener('readystatechange', () => {
      if (document.readyState === 'interactive') {
        limitName();
        window.addEventListener('resize', limitName);
      }
    });
  </script>
@endsection
