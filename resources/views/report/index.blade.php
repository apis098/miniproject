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
      opacity: 1;
      margin-left: 5%;
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

    @media(min-width:992px) {
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

    @media(max-width:991px) {
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

    @media(max-width:768px) {
      .ull {
        display: flex;
        justify-content: center;
      }
    }
    .Judul {
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
    .Deskripsi::-webkit-scrollbar {
        width: 12px;
    }

    .Deskripsi::-webkit-scrollbar-track {
        -webkit-box-shadow: inset 0 0 6px rgba(247, 148, 31, 1);
        border-radius: 10px;
    }

    .Deskripsi::-webkit-scrollbar-thumb {
        border-radius: 10px;
        -webkit-box-shadow: inset 0 0 6px rgba(247, 148, 31, 1);
    }
    .button1{
        width: 100%;
    }
    .button2{
        width: 100%;
    }
    .button3{
        width: 100%;
    }
    @media (min-width:550px){
        .button1{
            width: 30%;
        }
        .button2{
            width: 30%;
        }
        .button3{
            width: 30%;
        }
    }
  </style>
  <div class="mx-lg-5 mx-xl-1" style="overflow-x:auto;">
    <div class="">
      <div class="my-5">

        <ul class="nav mb-3 ml-auto ull" id="pills-tab" role="tablist">
          <li class="nav-item tabs" role="presentation">
            <a href="#" class="nav-link active " id="button-resep" data-bs-toggle="tab" data-bs-target="#resep"
              type="button" role="tab" aria-controls="profile" aria-selected="false">
              <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                Resep
                @if ($statusResep > 0)
                  <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                  </svg>
                @endif
              </h5>
              <div id="border1" class="" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
              </div>
            </a>
          </li>
          <li class="nav-item tabs" role="presentation">
            <a href="#" class="nav-link" id="button-keluhan" data-bs-toggle="tab" data-bs-target="#keluhan"
              type="button" role="tab" aria-controls="keluhan" aria-selected="false">
              <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                Diskusi
                @if ($statusComplaint > 0)
                  <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                  </svg>
                @endif
              </h5>
              <div id="border2" class="" style="width: 100%; height: 80%; border: 1px #F7941E solid;" hidden>
              </div>
            </a>
          </li>
          <li class="nav-item tabs" role="presentation">
            <a href="#" class="nav-link" id="button-komentar" data-bs-toggle="tab" data-bs-target="#komentar"
              type="button" role="tab" aria-controls="komentar" aria-selected="false">
              <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                Komentar
                @if ($statusKomentar > 0)
                  <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                  </svg>
                @endif
              </h5>
              <div id="border3" class="" style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
              </div>
            </a>
          </li>
          <li class="nav-item tabs" role="presentation">
            <a href="#" class="nav-link" id="button-profile" data-bs-toggle="tab" data-bs-target="#profile"
              type="button" role="tab" aria-controls="profile" aria-selected="false">
              <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                Profile
                @if ($statusProfile > 0)
                  <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                  </svg>
                @endif
              </h5>
              <div id="border4" class=""
                style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;"></div>
            </a>
          </li>
          <li class="nav-item tabs" role="presentation">
            <a href="#" class="nav-link" id="button-feed" data-bs-toggle="tab" data-bs-target="#feed"
              type="button" role="tab" aria-controls="feed" aria-selected="false">
              <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                Feed
                @if ($statusVeed > 0)
                  <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                  </svg>
                @endif
              </h5>
              <div id="border5" class=""
                style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;"></div>
            </a>
          </li>
          <li class="nav-item tabs" role="presentation">
            <a href="#" class="nav-link" id="button-kursus" data-bs-toggle="tab" data-bs-target="#kursus"
              type="button" role="tab" aria-controls="kursus" aria-selected="false">
              <h5 class="text-dark" style="font-weight: 600; word-wrap: break-word;">
                Kursus
                @if ($statusCourse > 0)
                  <svg class="text-danger ms-1" xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                    viewBox="0 0 24 24">
                    <path fill="currentColor" d="M12 2C6.47 2 2 6.47 2 12s4.47 10 10 10s10-4.47 10-10S17.53 2 12 2z" />
                  </svg>
                @endif
              </h5>
              <div id="border6" class=""
                style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;"></div>
            </a>
          </li>
        </ul>
        <div class="tab-content mb-5 mx-3" id="pills-tabContent">
          <div class="tab-pane fade show active" id="resep" role="tabpanel" aria-labelledby="pills-home-tab"
            tabindex="0">
            <div class="search-2"> <i class='bx bxs-map'></i>
              <form action="#" method="GET">
                <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                  id="search-resep" class="p-3">
                <button type="submit" class="zoom-effects cari2"
                  style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                  Cari
                </button>
              </form>
            </div>
            {{-- start tab 1 --}}
            <div class="scrollbar" style="overflow-x:scroll;">
              <table id="table-resep" class="table-custom ml-auto" style="min-width:400px;">
                <thead>
                  <tr>
                    <th scope="col">Pelapor</th>
                    <th scope="col">User</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Melanggar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($reportResep as $row)
                    <div id="search-results">
                      <tr class="mt-5">
                        <td style="border-left:1px solid black;" class="mt">
                          {{ $row->userSender->name }}
                          @if ($row->userSender->isSuperUser == 'yes')
                              <i class="fa-regular text-primary fa-circle-check"></i>
                          @endif
                        </td>
                        <td>{{ $row->user->name }}
                        @if ($row->user->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check"></i>
                        @endif
                        </td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                        <td style="border-right:1px solid black;">
                          <button type="button" data-toggle="modal" data-target="#modalResep{{ $row->resep_id }}"
                            class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b
                              class="ms-2 me-2">Detail</b></button>
                        </td>
                      </tr>
                    </div>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($reportResep->count() == 0)
              <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                style="margin-top: 5em; margin-left:-5%;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada laporan</b></p>
              </div>
            @endif

            {{ $reportResep->links('vendor.pagination.defaultReportResep') }}
          </div>
          {{-- end --}}
          <div class="tab-pane fade" id="feedss" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
            <div class="search-2"> <i class='bx bxs-map'></i>
              <form action="#" method="GET">
                <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                  id="search-feed" class="p-3">
                <button type="submit" class="zoom-effects cari2"
                  style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                  Cari
                </button>
              </form>
            </div>
            {{-- start tab 1 --}}
            <div class="scrollbar" style="overflow-x:scroll;">

              <table id="table-feed" class="table-custom ml-auto" style="min-width: 400px;">
                <thead>
                  <tr>
                    <th scope="col">Pelapor</th>
                    <th scope="col">User</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Melanggar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach ($reportVeed as $row)
                    <div id="search-results">
                      <tr class="mt-5">
                        <td style="border-left:1px solid black;" class="mt">
                          {{ $row->userSender->name }}
                          @if ($row->userSender->isSuperUser == 'yes')
                              <i class="fa-regular text-primary fa-circle-check"></i>
                          @endif
                        </td>
                        <td>{{ $row->user->name }}
                        @if ($row->user->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check"></i>
                        @endif
                        </td>
                        <td>{{ $row->description }}</td>
                        <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                        <td style="border-right:1px solid black;">
                          <button type="button" data-toggle="modal" data-target="#modalFeed{{ $row->feed_id }}"
                            class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b
                              class="ms-2 me-2">Detail</b></button>
                        </td>
                      </tr>
                    </div>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($reportVeed->count() == 0)
              <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                style="margin-top: 5em; margin-left:-5%;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada laporan</b></p>
              </div>
            @endif

            {{ $reportVeed->links('vendor.pagination.defaultReportFeed') }}
          </div>
          {{-- end --}}
          <div class="tab-pane fade" id="keluhann" role="tabpanel" aria-labelledby="pills-profile-tab"
            tabindex="0">
            <div class="search-2"> <i class='bx bxs-map'></i>
              <form action="#" method="GET">
                <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                  id="search-keluhan" class="p-3">
                <button type="submit" class="zoom-effects cari2"
                  style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                  Cari
                </button>
              </form>
            </div>
            <div class="scrollbar" style="overflow-x:scroll;">

              <table id="table-keluhan" class="table-custom ml-auto" style="min-width: 400px;">
                <thead>
                  <tr>
                    <th scope="col">Pelapor</th>
                    <th scope="col">User</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Melanggar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reportComplaint as $row)
                    <tr class="mt-5">
                      <td style="border-left:1px solid black;" class="mt">
                        {{ $row->userSender->name }}
                        @if ($row->userSender->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check"></i>
                        @endif
                      </td>
                      <td>{{ $row->user->name }}
                      @if ($row->user->isSuperUser == 'yes')
                          <i class="fa-regular text-primary fa-circle-check"></i>
                      @endif
                      </td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                      <td style="border-right:1px solid black;">
                        <button type="button" data-toggle="modal"
                          data-target="#modalComplaint{{ $row->complaint_id }}"
                          class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b
                            class="ms-2 me-2">Detail</b></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($reportComplaint->count() == 0)
              <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                style="margin-top: 5em; margin-left:-5%;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada laporan</b></p>
              </div>
            @endif
            {{ $reportComplaint->links('vendor.pagination.defaultReportComplaint') }}
          </div>
          {{-- end --}}
          <div class="tab-pane fade" id="komentarr" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">
            <div class="search-2"> <i class='bx bxs-map'></i>
              <form action="#" method="GET">
                <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                  id="search-komentar" class="p-3">
                <button type="submit" class="zoom-effects cari2"
                  style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                  Cari
                </button>
              </form>
            </div>
            <div class="scrollbar" style="overflow-x:scroll;">

              <table id="table-komentar" class="table-custom ml-auto" style="min-width: 400px;">
                <thead>
                  <tr>
                    <th scope="col">Pelapor</th>
                    <th scope="col">User</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Melanggar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pagination as $row)
                    <tr class="mt-5">
                      <td style="border-left:1px solid black;" class="mt">
                        {{ $row->userSender->name }}
                        @if ($row->userSender->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check"></i>
                        @endif
                      </td>
                      <td>{{ $row->user->name }}
                      @if ($row->user->isSuperUser == 'yes')
                          <i class="fa-regular text-primary fa-circle-check"></i>
                      @endif
                      </td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                      <td style="border-right:1px solid black;">
                        <button type="button" data-toggle="modal" data-target="#modalKomentar{{ $row->id }}"
                          class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b
                            class="ms-2 me-2">Detail</b></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($pagination->count() == 0)
              <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                style="margin-top: 5em; margin-left:-5%;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada laporan</b></p>
              </div>
            @endif
            {{ $pagination->links('vendor.pagination.defaultReportComment') }}
            {{-- $allComments->links('vendor.pagination.defaultReportReply') --}}
          </div>
          {{-- end --}}
          <div class="tab-pane fade" id="profilee" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">
            <div class="search-2"> <i class='bx bxs-map'></i>
              <form action="#" method="GET">
                <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                  id="search-profile" class="p-3">
                <button type="submit" class="zoom-effects cari2"
                  style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                  Cari
                </button>
              </form>
            </div>
            <div class="scrollbar" style="overflow-x:scroll;">

              <table id="table-profile" class="table-custom ml-auto" style="min-width:400px;">
                <thead>
                  <tr>
                    <th scope="col">Pelapor</th>
                    <th scope="col">User</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Melanggar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reportProfile as $row)
                    <tr class="mt-5">
                      <td style="border-left:1px solid black;" class="mt">
                        {{ $row->userSender->name }}
                        @if ($row->userSender->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check"></i>
                        @endif
                      </td>
                      <td>{{ $row->user->name }}
                      @if ($row->user->isSuperUser == 'yes')
                          <i class="fa-regular text-primary fa-circle-check"></i>
                      @endif
                      </td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                      <td style="border-right:1px solid black;">
                        <button type="button" data-toggle="modal" data-target="#modalProfile{{ $row->profile_id }}"
                          class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b
                            class="ms-2 me-2">Detail</b></button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($reportProfile->count() == 0)
              <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                style="margin-top: 5em; margin-left:-5%;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada laporan</b></p>
              </div>
            @endif
            {{ $reportProfile->links('vendor.pagination.defaultReportProfile') }}
          </div>
          <div class="tab-pane fade" id="kursuss" role="tabpanel" aria-labelledby="pills-contact-tab"
            tabindex="0">
            <div class="search-2"> <i class='bx bxs-map'></i>
              <form action="#" method="GET">
                <input type="text" name="" style="text-align: left;" placeholder="Cari..." value=""
                  id="search-kursus" class="p-3">
                <button type="submit" class="zoom-effects cari2"
                  style="border-radius: 10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);color: white; font-size: 17px; font-family: Poppins; font-weight: 600; letter-spacing: 0.40px; word-wrap: break-word">
                  Cari
                </button>
              </form>
            </div>
            <div class="scrollbar" style="overflow-x:scroll;">

              <table id="table-kursus" class="table-custom ml-auto" style="min-width: 400px;">
                <thead>
                  <tr>
                    <th scope="col">Pelapor</th>
                    <th scope="col">User</th>
                    <th scope="col">Subjek</th>
                    <th scope="col">Melanggar</th>
                    <th scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($reportCourse as $row)
                    <tr class="mt-5">
                      <td style="border-left:1px solid black;" class="mt">
                        {{ $row->userSender->name }}
                        @if ($row->userSender->isSuperUser == 'yes')
                            <i class="fa-regular text-primary fa-circle-check"></i>
                        @endif
                      </td>
                      <td>{{ $row->user->name }}
                      @if ($row->user->isSuperUser == 'yes')
                          <i class="fa-regular text-primary fa-circle-check"></i>
                      @endif
                      </td>
                      <td>{{ $row->description }}</td>
                      <td>{{ $row->user->jumlah_pelanggaran }} Kali</td>
                      <td style="border-right:1px solid black;">
                        <button type="button" data-toggle="modal" data-target="#modalCourse{{ $row->id }}"
                          class="btn btn-light btn-sm rounded-3 text-light" style="background-color: #F7941E;"><b
                            class="ms-2 me-2">Detail</b></button>
                      </td>
                    </tr>
                    {{-- modal kursus --}}
                    <div class="modal fade bd-example-modal-xl rounded-5" id="modalCourse{{ $row->id }}"
                      tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true"
                      style="text-align: left;">
                      <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                          <div class="modal-body">
                            <section>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <i class="fa-regular text-dark fa-circle-xmark"></i>
                              </button>
                              <div class="container">
                                <div class="row">
                                  <div class="col-lg-8 col-12 my-3">
                                    <button type="button"class="btn"
                                      style=" background: #F7941E;color:white;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px;  color: white; font-size: 16px; font-family: Poppins; font-weight: 400; letter-spacing: 0.36px; word-wrap: break-word">
                                      @foreach ($row->course->jenis_kursus as $jenis_kursus)
                                        {{ $jenis_kursus->jenis_kursus }}
                                      @endforeach
                                    </button>
                                    <br>
                                    <br>
                                    <p
                                      style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; word-wrap: break-word">
                                      <b> {{ $row->course->nama_kursus }} </b>
                                    </p>
                                    <div class="my-3 mt-5">
                                      <h3 class="mb-3"
                                        style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        <b>Tentang kursus</b>
                                      </h3>

                                      <p>{{ $row->course->deskripsi_kursus }}</p>

                                    </div>
                                    <div class=" mt-3">
                                      <h3
                                        style=" color: black; font-size: 24px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                        <b>Lokasi kursus</b>
                                      </h3>
                                      <button type="button" class="btn mt-3"
                                        style=" border-radius: 12px; border: 1px black solid">
                                        <i class="fas fa-regular fa-location-dot"></i>
                                        {{ $row->course->nama_lokasi }}
                                      </button>
                                    </div>

                                  </div>
                                  <div class="col-lg-4 col-12  mb-4 my-5">
                                    <div class="bg-white shadow-sm py-5 border border-secondary text-center"
                                      style="border-radius: 20px; height:16rem;">
                                      <div class="d-flex justify-content-center">
                                          <div class="" style="max-width: 150px; min-width: 150px; max-height:150px; min-height:150px">
                                              <img src="{{ asset('storage/' . $row->course->foto_kursus) }}" alt=""
                                                style="object-fit: cover;max-width: 150px; min-width: 150px; max-height:150px; min-height:150px"
                                                class="img-fluid rounded-circle mb-3  shadow-sm">
                                          </div>
                                      </div>
                                      <h5 class="mb-0">
                                        <a href="#"
                                          style=" color: black; font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                          {{ $row->course->user->name }}
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
                    {{-- end modal --}}
                  @endforeach
                </tbody>
              </table>
            </div>
            @if ($reportCourse->count() == 0)
              <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                style="margin-top: 5em; margin-left:-5%;">
                <img src="{{ asset('images/data.png') }}" style="width: 15em">
                <p><b>Tidak ada laporan</b></p>
              </div>
            @endif
            {{ $reportCourse->links('vendor.pagination.defaultReportKursus') }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <script>
    let debounceTimer;

    $(document).ready(function() {
      $('#search-input').keyup(function() {
        var query = $(this).val(); // Ambil nilai dari input pencarian
        clearTimeout(debounceTimer);

        debounceTimer = setTimeout(function() {
          get(1)
        }, 500);

        // Lakukan permintaan Ajax ke titik akhir pencarian hanya jika panjang query lebih dari 2 karakter
        if (query.length > 2) {
          $.ajax({
            url: '/admin/laporan-pengguna', // Ganti URL sesuai dengan titik akhir pencarian Anda
            type: 'GET',
            data: {
              query: query
            },
            success: function(response) {
              // Tampilkan hasil pencarian di dalam div #search-results
              $('#search-results').html(response);
            },
            beforeSend: function() {
              $('#loading').html(showLoading())
            }
          });
        } else {
          // Kosongkan hasil pencarian jika panjang query kurang dari 3 karakter
          $('#search-results').empty();
        }
      });
    });


    function showLoading() {
      return `<div class="d-flex justify-content-center" style="">
        <div class="spinner-border my-auto" role="status">
            <span class="visually-hidden">Loading...</span>
            </div></div>`

    }
  </script>
  <script>
    $(document).ready(function() {
      $('#search-resep').on('input', function() {
        var value = $(this).val().toLowerCase();
        $('#table-resep').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).ready(function() {
      $('#search-keluhan').on('input', function() {
        var value = $(this).val().toLowerCase();
        $('#table-keluhan').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).ready(function() {
      $('#search-komentar').on('input', function() {
        var value = $(this).val().toLowerCase();
        $('#table-komentar').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).ready(function() {
      $('#search-profile').on('input', function() {
        var value = $(this).val().toLowerCase();
        $('#table-profile').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).ready(function() {
      $('#search-feed').on('input', function() {
        var value = $(this).val().toLowerCase();
        $('#table-feed').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
    $(document).ready(function() {
      $('#search-kursus').on('input', function() {
        var value = $(this).val().toLowerCase();
        $('#table-kursus').filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>
  </div>
  <!-- Modal Keluhan -->
  @foreach ($data as $row)
    @if ($row->complaint_id != null)
      <div class="modal fade" id="modalComplaint{{ $row->complaint_id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title text-dark fw-bolder ms-3 me-5" id="exampleModalLongTitle">Detail</h5>
              {{-- <p class="text-dark ms-5 mt-1 fw-bolder">pilih semua</p> --}}
              <button type="button" class="close text-dark" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>

            </div>
            <div class="modal-body d-flex align-items-center">
              @if ($row->user->foto)
                <img src="{{ asset('storage/' . $row->user->foto) }}" class="ms-2 me-5 img-fluid rounded-circle me-2"
                  style="max-width:106px" alt="">
              @else
                <img src="{{ asset('images/default.jpg') }}" class="ms-2 me-5 img-fluid rounded-circle me-2"
                  style="max-width:106px" alt="">
              @endif
              <a href="" class="card" style="box-shadow: none; border: none">
                <div style="justify-content: space-between;" class="mb-1 ">
                  <h6 class="fw-bolder modal-title mt-2 me-5 text-orange Judul">
                    {{ $row->complaint->subject }}</h6>
                    <div class="Deskripsi" style="max-height: 150px; overflow: auto">
                        <span class="text-secondary  me-3 " style="">{{ $row->complaint->description }}</span>
                    </div>
                </div>
              </a>
            </div>
            <div class="modal-footer">
              <form action="{{ route('Report.destroy', $row->id) }}" method="POST"
                id="deleteLaporan{{ $row->id }}">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmation({{ $row->id }})"
                  class="btn btn-outline-dark rounded-3" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b>Hapus
                    Laporan</b></button>
              </form>
              <button type="button" data-toggle="modal" data-target="#modalTerimalaporan{{ $row->id }}"
                data-dismiss="modal" class="btn btn-light text-light rounded-3"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                  class="ms-2 me-2">Terima Laporan</b></button>
              <form action="{{ route('block.user', $row->id) }}" method="POST" id="formBlokir{{ $row->id }}">
                @csrf
                @method('put')
                <button type="button" onclick="buttonAllert({{ $row->id }})"
                  id="buttonBlokir{{ $row->id }}"
                  style="background-color: #F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                  class="btn btn-light text-light rounded-3 me-2"><b>Blokir pengguna</b>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
  {{-- end Modal --}}
  {{-- modal proofile --}}
  @foreach ($data as $row)
    @if ($row->profile_id != null)
      <div class="modal fade" data-bs-backdrop="static" id="modalProfile{{ $row->profile_id }}" aria-hidden="true"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered profile-modal">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" style="font-family: Poppins;" id="exampleModalLabel"><b
                  class="ms-2">Detail</b></h1>
              <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close">
                <i class="fa-regular fa-circle-xmark"></i>
              </button>
            </div>
            <div class="modal-body">
                {{-- content 1  --}}
                <div class="row">
                    {{-- image --}}
                    <div class="col-12 col-sm-3 d-flex justify-content-center mb-2">
                        @if ($row->user->foto)
                            <img src="{{ asset('storage/' . $row->user->foto) }}" width="106px" height="104px"
                            style="border-radius: 50%;" id="profile-image">
                        @else
                            <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                            style="border-radius: 50%;" id="profile-image">
                        @endif
                    </div>
                    {{-- deskripsi --}}
                    <div class="col-12 col-sm-9 d-flex align-items-center">
                        <div style="width: 100%">
                            <input readonly type="text" value="{{ $row->user->name }}" name="name"
                                class="form-control form-control-sm">
                            <input readonly type="text" name="email" value="{{ $row->user->email }}"
                                class="form-control form-control-sm mt-3">
                        </div>
                    </div>
                </div>
                {{-- content 2  --}}
                <div class="row ">
                    <div class="col-12 col-sm-6 pl-sm-1">
                        <a href="{{ route('randomName.update', $row->id) }}"
                            class="btn btn-light text-light btn-sm rounded-3 text-light mt-2  "
                            style="border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%"
                            type="submit" id="saveProfileButton"><b class="ms-1 me-1">Berikan nama acak</b></a>
                    </div>
                    <div class="col-12 col-sm-6 pr-sm-1">
                        <a href="{{ route('blockContent.destroy', $row->id) }}"
                            class="btn btn-light text-light btn-sm rounded-3  mt-2 "
                            style="border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%"><b
                              class="ms-1 me-1 text-light">Hapus foto saat ini</b></a>
                    </div>
                </div>
              {{-- @method('put') --}}
              {{-- <div class="profile d-flex justify-content-center" style="">
                <div>
                    <a href="{{ route('blockContent.destroy', $row->id) }}"
                      class="btn btn-light text-light btn-sm rounded-3"
                      style="border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                        class="ms-1 me-1 text-light">Hapus foto saat ini</b></a>

                    <a href="{{ route('randomName.update', $row->id) }}"
                      class="btn btn-light text-light btn-sm rounded-3 text-light me-3"
                      style="border-radius: 9px; background-color: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                      type="submit" id="saveProfileButton"><b class="ms-1 me-1">Berikan nama acak</b></a>
                </div>

                <input type="file" id="fileInputA" name="profile_picture" style="display:none">

                @if ($row->user->foto)
                  <img src="{{ asset('storage/' . $row->user->foto) }}" width="106px" height="104px"
                    style="border-radius: 50%; margin-right:-28%;" id="profile-image">
                @else
                  <img src="{{ asset('images/default.jpg') }}" width="106px" height="104px"
                    style="border-radius: 50%; margin-right:-28%;" id="profile-image">
                @endif

                <div class="col-8" style="margin-left:35%;">
                  <input readonly type="text" value="{{ $row->user->name }}" name="name"
                    class="form-control form-control-sm">
                  <input readonly type="text" name="email" value="{{ $row->user->email }}"
                    class="form-control form-control-sm mt-3">
                </div>

              </div> --}}
            </div>

            <div class=" p-3 row mt-3 border-top" style="  margin-right: 0;margin-left: 0;">
                <div class="col-12  mt-1">
                    <form action="{{ route('block.user', $row->id) }}" method="POST" id="formBlokir{{ $row->id }}" style="width: 100%">
                      @csrf
                      @method('put')
                      <button type="button" onclick="buttonAllert({{ $row->id }})"
                        id="buttonBlokir{{ $row->id }}"
                        style="background-color: #F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);width:100%"
                        class="btn btn-light btn-sm text-light rounded-3 "><b>Blokir pengguna</b>
                      </button>
                    </form>
                </div>
                <div class="col-12 d-flex justify-content-center mt-1">
                    <form action="{{ route('Report.destroy', $row->id) }}" method="POST"
                      id="deleteLaporan{{ $row->id }}" style="width: 100%">
                      @csrf
                      @method('DELETE')
                      <button type="button" onclick="confirmation({{ $row->id }})"
                        class="btn btn-outline-dark btn-sm rounded-3 "
                        style="border-radius: 9px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width:100%">
                        <b class="">Hapus laporan</b>
                      </button>
                    </form>
                </div>

            </div>
          </div>
          <script>
            document.getElementById("fileInputA").addEventListener("change", function(event) {
              var input = event.target;
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  document.getElementById("profile-image").setAttribute("src", e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
              }
            });
          </script>
        </div>
      </div>
    @endif
  @endforeach
  {{-- akhir modal --}}
  {{-- modal komentar --}}
  @foreach ($allComments as $row)
    <div class="modal fade" id="modalKomentar{{ $row->id }}" tabindex="-1" role="dialog"
      aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="reportModal"
              style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
              Detail</h5>
            <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body row align-items-center col-12">
            <!-- Tambahkan kelas "align-items-center" -->
            <div class="col-12 col-sm-3 mt-2 mb-2 mb-sm-0   d-flex justify-content-center justify-content-sm-start align-items-center">
              @if ($row->user->foto)

                <img class="" src="{{ asset('storage/' . $row->user->foto) }}" width="100px" height="100px"
                  style="border-radius: 50%" alt="">
              @else
                <img class="" src="{{ asset('images/default.jpg') }}" width="100px" height="100px"
                  style="border-radius: 50%" alt="">
              @endif
              {{-- <div></div>
                                <span class="widget-49-pro-title fw-bolder"
                                    style="margin-left: 30px;">{{ $row->user->name }}</span><br>
                                <small class="text-secondary ms-2"><i>{{ $row->user->email }}</i></small> --}}
            </div>
            <div class="col-12 col-sm-9 pr-0">

              @if (!empty($row->replies->reply))
                <textarea readonly class="form-control" style="border-radius: 15px" name="description" rows="5">{{ $row->replies->reply }}</textarea>
              @elseif(!empty($row->reply_complaint->reply))
                <textarea readonly class="form-control" style="border-radius: 15px" name="description" rows="5">{{ $row->reply_complaint->reply }}</textarea>
              @elseif(!empty($row->comment_feed->komentar))
                <textarea readonly class="form-control" style="border-radius: 15px" name="description" rows="5">{{ $row->comment_feed->komentar }}</textarea>
              @elseif(!empty($row->reply_comment_feed->komentar))
                <textarea readonly class="form-control" style="border-radius: 15px" name="description" rows="5">{{ $row->reply_comment_feed->komentar }}</textarea>
              @elseif(!empty($row->replies_reply_comment_feed->komentar))
                <textarea readonly class="form-control" style="border-radius: 15px" name="description" rows="5">{{ $row->replies_reply_comment_feed->komentar }}</textarea>
              @elseif($row->comment_id != null)
                <textarea readonly class="form-control" style="border-radius: 15px" name="description" rows="5">{{ $row->comment->comment }}</textarea>
              @endif

            </div>
          </div>
          <div class="modal-footer  d-flex justify-content-start w-full " style="flex-wrap: wrap; width:100%;">
            <form action="{{ route('Report.destroy', $row->id) }}" class="button1" method="POST" style=""
              id="deleteLaporan{{ $row->id }}">
              @csrf
              @method('DELETE')
              <button type="button" onclick="confirmation({{ $row->id }})" class="btn btn-light text-black "
                style=" border-radius: 10px; border: 0.50px black solid; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width:100%"><b
                  class="ms-1 me-1">Hapus Laporan</b></button>
            </form>

            <button type="button" data-target="#modalTerimalaporan{{ $row->id }}" data-toggle="modal"
              data-dismiss="modal" class="btn btn-light text-light rounded-3 button1"
              style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); "><b class="">Terima
                Laporan</b></button>
            <form action="{{ route('block.user', $row->id) }}" method="POST" id="formBlokir{{ $row->id }} " style="" class="button1">
              @csrf
              @method('put')
              <button type="button" onclick="buttonAllert({{ $row->id }})" id="buttonBlokir{{ $row->id }}"
                style="background-color: #F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width:100%;"
                class="btn btn-light text-light rounded-3 me-0"><p style="font-size: 15px" class="fw-bold   mb-0">Blokir pengguna</p>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  @endforeach
  {{-- end Modal --}}
  {{-- Model Terima laporan --}}
  @foreach ($data as $row)
    @if ($row->id != null)
      <div class="modal fade" id="modalTerimalaporan{{ $row->id }}" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <form action="{{ route('blockContent.destroy', $row->id) }}" method="POST">
              @csrf
              @method('put')
              <div class="modal-header">
                <h5 class="modal-title" id="reportModal"
                  style=" color: black; font-size: 25px; font-family: Poppins; font-weight: 700; letter-spacing: 0.70px; word-wrap: break-word">
                  Kirim Peringatan</h5>
                <button type="button" class="close text-black" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body d-flex align-items-center col-12">
                <!-- Tambahkan kelas "align-items-center" -->
                <div class="col-3 mt-2  ms-3">
                  <img class="" src="{{ asset('images/default.jpg') }}" width="100px" height="100px"
                    style="border-radius: 50%" alt="">
                </div>
                <div class="col-md-8">
                  <div class="widget-49-meeting-info">

                  </div>
                  <textarea class="form-control" style="border-radius: 15px" name="alasan" rows="5" placeholder="Alasan"></textarea>
                </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-light text-light rounded-3"
                  style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                    class="ms-2 me-2">Kirim</b>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    @endif
  @endforeach
  {{-- End Modal Terima Laporan --}}
  {{-- Modal resep --}}
  @foreach ($data as $row)
    @if ($row->resep_id != null)
      <div class="modal fade bd-example-modal-xl rounded-5" id="modalResep{{ $row->resep_id }}" tabindex="-1"
        role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bolder">Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa-regular text-dark fa-circle-xmark"></i>
              </button>
            </div>
            <div class="modal-body">
              <section class="container">
                <div class="row mt-1">
                  <div class="col-lg-2 mt-3">
                    <img src="{{ asset('storage/' . $row->resep->foto_resep) }}" alt="{{ $row->resep->foto_resep }}"
                      width="197px" height="187px" style="border-radius: 50%; border:none;" class="p-2">
                  </div>
                  <div class="col-lg-8 mt-4 ms-3">
                    <div class="col-lg-4 mt-5 ml-3">
                      <h3 class="fw-bolder" style="font-weight: 600; word-warp: break-word;">
                        {{ $row->resep->nama_resep }}
                      </h3>
                      <span>Oleh {{ $row->user->name }}</span>
                    </div>
                    @if ($row->resep->kategori_resep)
                      @foreach ($row->resep->kategori_resep()->get() as $nk)
                        <button type="button" class="btn-edit p-2 ml-4 mr-2 mt-2">{{ $nk->nama_makanan }}</button>
                      @endforeach
                    @endif
                    @if ($row->resep->hari_resep)
                      @foreach ($row->resep->hari_resep()->get() as $hr)
                        <button type="button" class="btn-edit p-2">{{ $hr->nama }}</button>
                      @endforeach
                    @endif
                  </div>
                  <div class="mt-4 ml-3">
                    <div class="col-lg-6 mt-5 ml-5">
                      <div style="position: absolute; right: -500px; top: -200px;" class="d-flex">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mx-auto mb-5" style="margin-top: -20px;">
                  <div class="col-lg-4">
                    <h4 style="font-weight: 600; word-warp: break-word;">Durasi</h4>
                    <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
                      <div class="row my-1">
                        <div class="col-7 mt-1">
                          <span class=""
                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            @if ($row->resep->lama_memasak > 60)
                              {{ $row->resep->lama_memasak / 60 }} jam
                            @elseif($row->resep->lama_memasak <= 60)
                              {{ $row->resep->lama_memasak }} menit
                            @endif
                          </span> <br>
                        </div>
                        <div class="col-5 d-flex my-auto flex-row-reverse">
                          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24">
                            <path fill="currentColor"
                              d="M15 1H9v2h6V1zm-4 13h2V8h-2v6zm8.03-6.61l1.42-1.42c-.43-.51-.9-.99-1.41-1.41l-1.42 1.42A8.962 8.962 0 0 0 12 4c-4.97 0-9 4.03-9 9s4.02 9 9 9a8.994 8.994 0 0 0 7.03-14.61zM12 20c-3.87 0-7-3.13-7-7s3.13-7 7-7s7 3.13 7 7s-3.13 7-7 7z" />
                          </svg>

                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4 style="font-weight: 600; word-warp:break-word;">Pengeluaran</h4>
                    <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
                      <div class="row my-1">
                        <div class="col-7 mt-1">
                          <span class=""
                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            RP{{ number_format($row->resep->pengeluaran_memasak, 2, ',', '.') }}
                          </span> <br>
                        </div>
                        <div class="col-5 d-flex my-auto flex-row-reverse">
                          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 256 256">
                            <path fill="currentColor"
                              d="M128 88a40 40 0 1 0 40 40a40 40 0 0 0-40-40Zm0 64a24 24 0 1 1 24-24a24 24 0 0 1-24 24Zm112-96H16a8 8 0 0 0-8 8v128a8 8 0 0 0 8 8h224a8 8 0 0 0 8-8V64a8 8 0 0 0-8-8Zm-46.35 128H62.35A56.78 56.78 0 0 0 24 145.65v-35.3A56.78 56.78 0 0 0 62.35 72h131.3A56.78 56.78 0 0 0 232 110.35v35.3A56.78 56.78 0 0 0 193.65 184ZM232 93.37A40.81 40.81 0 0 1 210.63 72H232ZM45.37 72A40.81 40.81 0 0 1 24 93.37V72ZM24 162.63A40.81 40.81 0 0 1 45.37 184H24ZM210.63 184A40.81 40.81 0 0 1 232 162.63V184Z" />
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <h4 style="font-weight: 600; word-warp: break-word;">Porsi</h4>
                    <div class="card p-4" style="border-radius: 15px; border: 0.50px black solid">
                      <div class="row my-1">
                        <div class="col-7 mt-1">
                          <span class="]"
                            style="color: black; font-size: 21px; font-family: Poppins; font-weight: 400; word-wrap: break-word">
                            {{ $row->resep->porsi_orang }} Orang
                          </span> <br>
                        </div>
                        <div class="col-5 d-flex my-auto flex-row-reverse">
                          <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 32 32">
                            <g fill="currentColor">
                              <path
                                d="M6.82 20.575v3.834A12.475 12.475 0 0 0 16.5 29c4.324 0 8.136-2.196 10.38-5.533v-5.374C26.112 23.136 21.757 27 16.5 27c-4.354 0-8.089-2.65-9.68-6.425Zm18.21-10.199V8.654a3.32 3.32 0 0 1 .184-1.116A12.459 12.459 0 0 0 16.5 4a12.45 12.45 0 0 0-7.976 2.875l.005.061l.001.027v2.7A10.476 10.476 0 0 1 16.5 6c3.514 0 6.624 1.726 8.53 4.376Z" />
                              <path
                                d="M24.5 16.5a8 8 0 1 1-16 0a8 8 0 0 1 16 0Zm-8 7a7 7 0 1 0 0-14a7 7 0 0 0 0 14ZM29.99 7.94c0-.9-.73-1.63-1.63-1.63c-1.3 0-2.34 1.05-2.33 2.34v5.55c0 1.253.726 2.375 1.85 2.883V25.7c0 .52.42.94.94.94h.23c.52 0 .94-.42.94-.94V7.94ZM6.82 6.31a.68.68 0 0 0-.68.68v2.69c0 .2-.16.35-.35.35c-.2 0-.35-.16-.35-.35V7.02c0-.37-.29-.7-.66-.71c-.39-.01-.71.3-.71.68v2.69c0 .2-.16.35-.35.35c-.2 0-.35-.16-.35-.35V7.02c0-.37-.29-.7-.66-.71c-.39-.01-.71.3-.71.68v4.58c0 .902.437 1.707 1.109 2.209c.601.339.601 1.891.601 1.891v10.02c0 .52.42.94.94.94h.23c.52 0 .94-.42.94-.94V15.67s0-1.491.601-1.891A2.757 2.757 0 0 0 7.53 11.57V6.99a.72.72 0 0 0-.71-.68Z" />
                            </g>
                          </svg>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <style>
                </style>
                <div class="my-5">
                  <ul class="nav mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <a id="deskripsi{{ $row->resep_id }}" class="nav-link jiah garis mr-5" data-bs-toggle="pill"
                        href="#pills-desc{{ $row->resep_id }}" type="button" role="tab"
                        aria-controls="pills-home" aria-selected="true">
                        <h5 class="text-dark" style="font-weight: 600; word-warp: break-word;">
                          Deskripsi</h5>
                        {{-- <div id="borderDeskripsi" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
                                    </div> --}}
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a id="bahan{{ $row->resep_id }}" class="nav-link jiah mr-5" data-bs-toggle="pill"
                        href="#pills-bahan{{ $row->resep_id }}" type="button" role="tab"
                        aria-controls="pills-profile" aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-warp: break-word;">
                          Bahan</h5>
                        {{-- <div id="borderBahan" style="width: 100%; height: 100%; border: 1px #F7941E solid;" hidden>
                                    </div> --}}
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a id="alat{{ $row->resep_id }}" class="nav-link jiah mr-5" data-bs-toggle="pill"
                        href="#pills-alat{{ $row->resep_id }}" type="button" role="tab"
                        aria-controls="pills-footer" aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-wrap:break-word;">Alat
                          - Alat</h5>
                        {{-- <div id="borderAlat" style="width: 90%; height:100%;border:1px #F7941E solid; display:none;"
                                        class="mx-auto"></div> --}}
                      </a>
                    </li>
                    <li class="nav-item" role="presentation">
                      <a id="langkah{{ $row->resep_id }}" class="nav-link jiah mr-5" data-bs-toggle="pill"
                        href="#pills-langkah{{ $row->resep_id }}" type="button" role="tab"
                        aria-controls="pills-contact" aria-selected="false">
                        <h5 class="text-dark" style="font-weight: 600; word-warp:break-word;">
                          Langkah - Langkah</h5>
                        {{-- <div id="borderLangkah" style="width: 90%; height: 100%; border: 1px #F7941E solid; display: none;"
                                        class="mx-auto"></div> --}}
                      </a>
                    </li>
                    <script>
                      // Dapatkan semua elemen nav-link
                      var navLinks = document.querySelectorAll('.jiah');

                      // Tambahkan event listener untuk setiap elemen nav-link
                      navLinks.forEach(function(navLink) {
                        navLink.addEventListener('click', function() {
                          // Hapus kelas active dari semua elemen nav-link
                          navLinks.forEach(function(link) {
                            link.classList.remove('garis');
                          });

                          // Tambahkan kelas active pada elemen nav-link yang diklik
                          this.classList.add('garis');
                        });
                      });
                    </script>
                  </ul>
                  <div class="tab-content mb-5 mx-3" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-desc{{ $row->resep_id }}" role="tabpanel"
                      aria-labelledby="pills-home-tab" tabindex="0">
                      {{ $row->resep->deskripsi_resep }}
                    </div>
                    <div class="tab-pane fade" id="pills-bahan{{ $row->resep_id }}" role="tabpanel"
                      aria-labelledby="pills-profile-tab" tabindex="0">
                      <div class="row mt-5">
                        @foreach ($row->resep->bahan as $item_bahan)
                          <div class="col-lg-4">
                            <div class="card p-3"
                              style="width: 100%; height: 80%; border-radius: 15px; border: 0.50px black solid">
                              <div class="row my-1">
                                <div class="col-12 ">
                                  <span class="ms-3"
                                    style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                    {{ $item_bahan->nama_bahan }}
                                  </span> <br>
                                  <p class="ms-3">{{ $item_bahan->takaran_bahan }}
                                  </p>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                    <div class="tab-pane fade" id="pills-langkah{{ $row->resep_id }}" role="tabpanel"
                      aria-labelledby="pills-contact-tab" tabindex="0">
                      @foreach ($row->resep->langkah as $num => $item_langkah)
                        <div class="card-body d-flex flex-row">
                          <div class="d-flex flex-column" style="position: relative;">
                            <img src="{{ asset('storage/' . $item_langkah->foto_langkah) }}" class="mt-3"
                              alt="{{ $item_langkah->foto_langkah }}"
                              style="border-radius: 10px; border: 1px solid black;" width="160px" height="160px">
                            <button type="button"
                              style="background-color:#F7941E; width: 45px; height: 45px; position: absolute; top: 0; left: -30px;"
                              class="btn btn-light btn-sm text-light rounded-circle p-2 ml-2">
                              <span class="p-2 fw-bolder">{{ $num += 1 }}</span>
                            </button>
                          </div>
                          <div class="my-auto mx-4">
                            <p style="font-weight: 900;font-size:18px;">
                              {{ $item_langkah->judul_langkah }}</p>
                            {{ $item_langkah->deskripsi_langkah }}
                          </div>
                        </div>
                      @endforeach
                    </div>
                    <div class="tab-pane fade" id="pills-alat{{ $row->resep_id }}" role="tabpanel"
                      aria-labelledby="pills-footer-tab" tabindex="0">
                      <div class="row mt-5">
                        @foreach ($row->resep->alat as $num => $item_langkah)
                          <div class="col-lg-4">
                            <div class="card p-3"
                              style="width: 100%; height: 100%; border-radius: 15px; border: 0.50px black solid">
                              <div class="row my-1">
                                <div class="col-12 ">
                                  <span class="ms-3" class=""
                                    style="color: black; font-size: 21px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                                    {{ $item_langkah->nama_alat }}
                                  </span> <br>
                                </div>
                              </div>
                            </div>
                          </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                </div>
              </section>
            </div>
            <div class="modal-footer">
              <form action="{{ route('Report.destroy', $row->id) }}" method="POST"
                id="deleteLaporan{{ $row->id }}" class="button1">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmation({{ $row->id }})"
                  class="btn btn-outline-dark rounded-3" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%"><b>Hapus
                    Laporan</b></button>
              </form>
              <button type="button" data-toggle="modal" data-target="#modalTerimalaporan{{ $row->id }}"
                data-dismiss="modal" class="btn btn-light text-light rounded-3 button1"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                  class="">Terima Laporan</b></button>
              <form action="{{ route('block.user', $row->id) }}" method="POST" id="formBlokir{{ $row->id }}" class="button1">
                @csrf
                @method('put')
                <button type="button" onclick="buttonAllert({{ $row->id }})"
                  id="buttonBlokir{{ $row->id }}"
                  style="background-color: #F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width: 100%"
                  class="btn btn-light text-light rounded-3 "><p class="mb-0" style="font-size: 15px; font-weight: bold ">Blokir pengguna</p>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach
  {{-- end modal --}}
  @foreach ($data as $row)
    @if ($row->feed_id != null)
      {{-- modal feed --}}
      <div class="modal fade bd-example-modalrounded-5" id="modalFeed{{ $row->feed_id }}" tabindex="-1"
        role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title fw-bolder">Detail</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <i class="fa-regular text-dark fa-circle-xmark"></i>
              </button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="d-flex justify-content-center row">
                  <div class="col-md-12">
                    <div class="feed">
                      <div class="bg-white border ">
                        <div>
                          <div class="d-flex flex-row justify-content-between align-items-center p-2 border-bottom">
                            <div class="d-flex flex-row align-items-center feed-text px-2"><img class="rounded-circle"
                                src="{{ $row->user->foto ? asset('storage/' . $row->user->foto) : asset('images/default.jpg') }}"
                                width="45">
                              <div class="d-flex flex-column flex-wrap ml-2"><span
                                  class="font-weight-bold">{{ $row->user->name }}</span><span
                                  class="text-black-50 time">{{ \Carbon\Carbon::parse($row->feed->created_at)->locale('id_ID')->diffForHumans() }}</span>
                              </div>
                            </div>
                            <div class="feed-icon px-2"><i class="fa fa-ellipsis-v text-black-50"></i></div>
                          </div>
                        </div>
                        <div class="feed-image p-2 px-3">
                          {{-- <img class="img-fluid img-responsive" src="{{asset('images/dark-food.jpg')}}"> --}}
                          <style>
                            .video-container {
                              position: relative;
                              padding-bottom: 56.25%;
                              overflow: hidden;
                            }

                            .video {
                              position: absolute;
                              left: 0;
                              top: -10%;
                              width: 100%;
                              height: 100%;
                            }
                          </style>
                          <div class="video-container">
                            <video class="video" controls>
                              <source src="{{ asset('storage/' . $row->feed->upload_video) }}" type="video/mp4">
                            </video>
                          </div>
                        </div>
                        <div class="p-2 px-3" style="margin-top: -7%;">
                          <span>{{ $row->feed->deskripsi_video }}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <form action="{{ route('Report.destroy', $row->id) }}" method="POST" class="button1
                id="deleteLaporan{{ $row->id }}">
                @csrf
                @method('DELETE')
                <button type="button" onclick="confirmation({{ $row->id }})"
                  class="btn btn-outline-dark rounded-3" style="box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width:100%"><b>Hapus
                    Laporan</b></button>
              </form>
              <button type="button" data-toggle="modal" data-target="#modalTerimalaporan{{ $row->id }}"
                data-dismiss="modal" class="btn btn-light text-light rounded-3 button1"
                style=" background-color:#F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"><b
                  class="">Terima Laporan</b></button>
              <form action="{{ route('block.user', $row->id) }}" method="POST" id="formBlokir{{ $row->id }} " class="button1">
                @csrf
                @method('put')
                <button type="button" onclick="buttonAllert({{ $row->id }})"
                  id="buttonBlokir{{ $row->id }}"
                  style="background-color: #F7941E;box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); width:100%"
                  class="btn btn-light text-light rounded-3 "><p style="font-size: 15px; font-weight: bold; margin-bottom:0">Blokir pengguna</p>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    @endif
  @endforeach

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
                  <div class="text-center mt-4"> <img src="{{ asset('images/modal.png') }}" width="320"> </div>
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
                      <div class="mt-4 mb-3"> <button class="btn btn-outline-dark btn-sm rounded-5">delete <i
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

  <!-- jQuery CDN -->
  <script src="{{ asset('jquery/jquery-3.6.0.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.0.slim.js"
    integrity="sha256-7GO+jepT9gJe9LB4XFf8snVOjX3iYNb0FHYr5LI1N5c=" crossorigin="anonymous"></script>


  <script>
    function DeleteData() {
      iziToast.show({
        backgroundColor: 'red',
        title: '<i class="fa-regular fa-circle-question"></i>',
        titleColor: 'white',
        messageColor: 'white',
        message: 'Apakah Anda yakin ingin menghapus data ini?',
        position: 'topCenter',
        close: false,
        progressBarColor: 'white',
        buttons: [
          ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
            instance, toast) {
            instance.hide({
              transitionOut: 'fadeOutUp',
              onClosing: function(instance, toast, closedBy) {
                document.getElementById('delete-form').submit();
              }
            }, toast, 'buttonName');
          }, false], // true to focus
          ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>', function(
            instance, toast) {
            instance.hide({}, toast, 'buttonName');
          }]
        ],
        onOpening: function(instance, toast) {
          console.info('callback abriu!');
        },
        onClosing: function(instance, toast, closedBy) {
          console.info('closedBy: ' + closedBy); // tells if it was closed by 'drag' or 'button'
        }
      });
    }

    function buttonAllert(num) {
      iziToast.show({
        backgroundColor: 'red',
        title: '<i class="fa-regular fa-circle-question"></i>',
        titleColor: 'white',
        messageColor: 'white',
        message: 'Anda yakin ingin memblookir pengguna tersebut?',
        position: 'topCenter',
        close: false,
        progressBarColor: 'white',
        buttons: [
          ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
            function(instance, toast) {
              // Jika pengguna menekan tombol "Ya", kirim form
              document.getElementById('formBlokir' + num).submit();
            }
          ],
          ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
            function(instance, toast) {
              instance.hide({
                transitionOut: 'fadeOut'
              }, toast, 'button');
            }
          ],
        ],
      });
    }

    function confirmation(num) {
      iziToast.show({
        backgroundColor: 'red',
        title: '<i class="fa-regular fa-circle-question"></i>',
        titleColor: 'white',
        messageColor: 'white',
        message: 'Anda yakin ingin mengahpus laporan?',
        position: 'topCenter',
        close: false,
        progressBarColor: 'white',
        buttons: [
          ['<button class="text-dark" style="background-color:#ffffff">Ya</button>',
            function(instance, toast) {
              // Jika pengguna menekan tombol "Ya", kirim form
              document.getElementById('deleteLaporan' + num).submit();
            }
          ],
          ['<button class="text-dark" style="background-color:#ffffff">Tidak</button>',
            function(instance, toast) {
              instance.hide({
                transitionOut: 'fadeOut'
              }, toast, 'button');
            }
          ],
        ],
      });
    }
  </script>

  <script>
    document.addEventListener("DOMContentLoaded", function() {
      const favoriteForm = document.querySelectorAll(".favorite-form");

      favoriteForm.forEach(form1 => {
        form1.addEventListener("submit", async function(event) {
          event.preventDefault();

          const button1 = form1.querySelector(
            ".favorite-button"); // Menggunakan form1
          const svg1 = button1.querySelector("svg"); // Menggunakan button1

          const response = await fetch(form1.action, {
            method: "POST",
            headers: {
              "X-CSRF-Token": "{{ csrf_token() }}",
            },
          });

          if (response.ok) {
            const responseData1 = await response.json();
            if (responseData1.favorited) {
              // Reset button color and SVG here
              button1.style.backgroundColor = "#F7941E";
              svg1.style.color = "white";
              // Modify SVG appearance if needed
              document.getElementById("fav-count-" + responseData1.resep_id)
                .textContent = responseData1.favorite_count;
            } else {
              // Update button color and SVG here
              button1.style.backgroundColor = "white";
              svg1.style.color = "#F7941E";
              button1.style.borderColor = "#F7941E";
              document.getElementById("fav-count-" + responseData1.resep_id)
                .textContent = responseData1.favorite_count;
            }
          }
        });
      });
    });
  </script>
  <script>
    const resep = document.getElementById("button-resep");
    const keluhan = document.getElementById("button-keluhan");
    const border1 = document.getElementById("border1");
    const border2 = document.getElementById("border2");
    const komentar = document.getElementById("button-komentar");
    const border3 = document.getElementById("border3");
    const profile = document.getElementById("button-profile");
    const border4 = document.getElementById("border4");
    const border5 = document.getElementById("border5");
    const border6 = document.getElementById("border6");
    const kursus = document.getElementById("button-kursus");
    const feed = document.getElementById("button-feed");
    //
    const tabresep = $("#resep");
    const tabfeedss = $("#feedss");
    const tabkeluhan = $("#keluhann");
    const tabkomentar = $("#komentarr");
    const tabprofile = $("#profilee");
    const tabkursus = $("#kursuss");

    const urlParams = new URLSearchParams(window.location.search);
    const urlFeedExists = urlParams.has('report-feeds-page');
    const urlKeluhanExists = urlParams.has('report-complaint-page');
    const urlKomentarExists = urlParams.has('report-comments-page');
    const urlProfileExists = urlParams.has('report-profile-page');
    const urlKursusExists = urlParams.has('report-kursus-page');
    if (urlFeedExists) {
      tabresep.removeClass('show active');
      tabfeedss.addClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
      border5.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border6.style.display = "none";
    }
    if (urlKeluhanExists) {
      border2.removeAttribute('hidden');
      border2.style.display = "block";
      border1.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabkeluhan.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
    }
    if (urlKomentarExists) {
      border3.removeAttribute('hidden');
      border3.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabkomentar.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
    }
    if (urlProfileExists) {
      border4.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      border3.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabprofile.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabkursus.removeClass('show active');
    }
    if (urlKursusExists) {
      border6.style.display = "block";
      border2.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border1.style.display = "none";
      tabkursus.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
    }
    resep.addEventListener('click', function() {
      border1.style.display = "block";
      border2.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabresep.addClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
    });
    kursus.addEventListener('click', function() {
      border6.style.display = "block";
      border2.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border1.style.display = "none";
      tabkursus.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
    });
    keluhan.addEventListener("click", function() {
      border2.removeAttribute('hidden');
      border2.style.display = "block";
      border1.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabkeluhan.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
    });

    komentar.addEventListener("click", function() {
      border3.removeAttribute('hidden');
      border3.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      border4.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabkomentar.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
    });
    profile.addEventListener("click", function() {
      border4.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      border3.style.display = "none";
      border5.style.display = "none";
      border6.style.display = "none";
      tabprofile.addClass('show active');
      tabresep.removeClass('show active');
      tabfeedss.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabkursus.removeClass('show active');
    });
    feed.addEventListener("click", function() {
      border5.style.display = "block";
      border1.style.display = "none";
      border2.style.display = "none";
      border3.style.display = "none";
      border4.style.display = "none";
      border6.style.display = "none";
      tabfeedss.addClass('show active');
      tabresep.removeClass('show active');
      tabkeluhan.removeClass('show active');
      tabkomentar.removeClass('show active');
      tabprofile.removeClass('show active');
      tabkursus.removeClass('show active');
    });
  </script>
  <script>
    const deskripsi = document.getElementById("deskripsi");
    const langkah = document.getElementById("langkah");
    const borderDeskripsi = document.getElementById("borderDeskripsi");
    const borderLangkah = document.getElementById("borderLangkah");
    const bahan = document.getElementById("bahan");
    const borderBahan = document.getElementById("borderBahan");
    const alat = document.getElementById("alat");
    const borderAlat = document.getElementById("borderAlat");
    deskripsi.addEventListener('click', function() {
      borderDeskripsi.style.display = "block";
      borderLangkah.style.display = "none";
      borderBahan.style.display = "none";
      borderAlat.style.display = "none";
    });
    bahan.addEventListener("click", function() {
      borderBahan.removeAttribute('hidden');
      borderBahan.style.display = "block";
      borderDeskripsi.style.display = "none";
      borderLangkah.style.display = "none";
      borderAlat.style.display = "none";
    });

    langkah.addEventListener("click", function() {
      borderLangkah.style.display = "block";
      borderDeskripsi.style.display = "none";
      borderBahan.style.display = "none";
      borderAlat.style.display = "none";
    });
    alat.addEventListener("click", function() {
      borderAlat.style.display = "block";
      borderLangkah.style.display = "none";
      borderDeskripsi.style.display = "none";
      borderBahan.style.display = "none";
    });
  </script>

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
