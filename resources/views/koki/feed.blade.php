@extends('layouts.nav_koki')
@section('konten')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

  <style>
    .ellipsis-deskripsi{
      text-overflow: ellipsis!important;
      overflow: hidden!important;
      -webkit-line-clamp: 1!important;
      -webkit-box-orient: vertical!important;
      display: -webkit-box!important;
      word-break: break-word!important;
      transition: -webkit-line-clamp 0.5s ease-in-out;
    }
    .ellipsis-deskripsi:hover {
        -webkit-line-clamp: 5!important; /* Nilai saat di-hover */
    }
    /* Gaya untuk tombol "Cari" */
    .zoom-effects {
      margin-left: 10px;
      /* Tambahkan jarak antara input dan tombol */
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
      padding: 0px 15px;
      border-radius: 5px;
      width: 76%;
      height: 10%;
      border-radius: 15px;
      border: 0.50px black solid;
    }

    .search-1 {
      position: relative;
      width: 100%
    }

    .search-1 input {
      height: 45px;
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

    ::placeholder {
      color: #eee;
      opacity: 1
    }

    .search-2 {
      position: relative;
      width: 100%;
    }

    .search-2 input {
      height: 35px;
      border: none;
      border-radius: 15px;
      width: 100%;



    }

    .search-2 input:focus {
      border-color: none;
      box-shadow: none;
      outline: none
    }
    .search-2 i {
      position: absolute;
      top: 12px;
      left: -10px;
      font-size: 24px;
      color: #eee
    }
/* veed */
    .cari {
      position: absolute;
      top: -2px;
      border: none;
      height: 38px;
      background-color: #F7941E;
      color: #fff;
      margin-left: -6%;
      width: 90px;
      box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
      border-radius: 15px;
    }

    .cari2 {
      position: absolute;
      top: -2px;
      right: -6px;
      border: none;
      height: 38px;
      background-color: #F7941E;
      color: #fff;
      width: 60px;
      box-shadow: 0px 4px 4px rgba(74, 50, 50, 0.25);
      border-radius: 15px;
    }

    @media (min-width:320) and (max-width:768px) {
      .search-1 input {
        border-right: none;
        border-bottom: 1px solid #eee
      }

      .search-2 i {
        left: 4px
      }

      .search-2 input {
        padding-left: 1px
      }

      .search-2 button {
        height: 37px;
        left: 57%;
        width: 20px;
      }

      .cari2 {
        right: 16px;
      }
    }

    @media(max-width: 578px) {
      .tab {
        width: 50%;
        text-align: center;
      }
    }

    @media(max-width: 375px) {
      .btn-search {
        font-size: 10px;
      }
    }

    @media(max-width: 320px) {
      .tab a h5 {
        font-size: 16px;
      }

      .btn-search {
        font-size: 8px;
      }
    }
    @media(max-width: 578px) {
        .ul_feed li a h5{
            text-align: center;
        }
        .tab {
            width: 30%;
        }
        .ul_feed {
            display: flex;
            justify-content:center;
        }
    }
    @media(min-width: 579px) {
        .ul_feed {
            margin-left: 50px;
            margin-right: 50px;
        }
        .tab-content {
            margin-left: 50px;
            margin-right: 50px;
        }
    }
    @media(max-width: 578px){
      .tab-content {
            margin-left: 20px;
            margin-right: 20px;
        }
    }
    @media (min-width:426px) and (max-width: 1000px) {
    .feed-dibuat {
      font-size: 13pt;
    }

    .feed-disukai {
      font-size: 13pt;
    }

    .feed-favorit {
      font-size: 13pt;
    }
  }

  @media (min-width:321px) and (max-width: 425px) {
    .feed-dibuat {
      font-size: 12pt;
    }

    .feed-disukai {
      font-size: 12pt;
    }

    .feed-favorit {
      font-size: 12pt;
    }
  }

  @media (max-width:320px) {
    .feed-dibuat {
      font-size: 11pt;
    }

    .feed-disukai {
      font-size: 11pt;
    }

    .feed-favorit {
      font-size: 11pt;
    }
  }

  @media (min-width:1001px) {
    .inputan-search {
      height: 50px;
    }

    .button-search {
      height: 51px;
    }
  }
  @media (max-width:1000px) {
    .inputan-search {
      height: 43px;
    }

    .button-search {
      height: 44px;
    }
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
  <div>
    <div class="my-4 main">
      <ul class="nav mb-2 mt-3 ul_feed" id="pills-tab" role="tablist">
        <li class="tab" role="presentation">
          <a id="click1" class="nav-link  active " id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home"
            type="button" role="tab" aria-controls="pills-home" aria-selected="true">
            <h5 class="text-dark feed-dibuat" style="font-weight: 600; word-wrap: break-word;">Feed Dibuat</h5>
            <div id="border1" class="ms-1" style="width: 100%; height: 100%; border: 1px #F7941E solid;">
            </div>
          </a>
        </li>

        <li class="tab" role="presentation">
          <a id="c" class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">
            <h5 class="text-dark feed-disukai" style="font-weight: 600; word-wrap: break-word;">Feed Disukai</h5>
            <div id="bss" class="ms-" style="width: 100%;display:none; height: 100%; border: 1px #F7941E solid;">
            </div>
          </a>
        </li>

        <li class="tab" role="presentation">
          <a id="a-tab" class="nav-link pr-4" id="pills-footer-tab" data-bs-toggle="pill" data-bs-target="#pills-contact"
            type="button" role="tab" aria-controls="pills-contact" aria-selected="false">
            <h5 class="text-dark feed-favorit" style="font-weight: 600; word-wrap: break-word;">Feed Favorit</h5>
            <div id="ppss" style="width: 100%; height: 100%; display:none; border: 1px #F7941E solid;">
            </div>
          </a>
        </li>
      </ul>
      <script>
        let tab1 = document.getElementById("click1");
        let tab2 = document.getElementById("c");
        let tab3 = document.getElementById("a-tab");
        let garis_tab1 = document.getElementById("border1");
        let garis_tab2 = document.getElementById("bss");
        let garis_tab3 = document.getElementById("ppss");
        tab1.addEventListener("click", function() {
          garis_tab1.style.display = "block";
          garis_tab2.style.display = "none";
          garis_tab3.style.display = "none";
        });
        tab2.addEventListener("click", function() {
          garis_tab2.style.display = "block";
          garis_tab1.style.display = "none";
          garis_tab3.style.display = "none";
        });
        tab3.addEventListener("click", function() {
          garis_tab3.style.display = "block";
          garis_tab1.style.display = "none";
          garis_tab2.style.display = "none";
        });
      </script>



      <div class="tab-content mb-5" id="pills-tabContent">
        <div class="tab-pane fade show active ml-3 mr-4" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
          tabindex="0">
          <form action="">
            <div class="mt-1">
              <div class="search-1 inputan-search" style="border: 1px solid black;border-radius:15px;">

                <div class="search-2"> <i class='bx bxs-map'></i>
                  <form action="/admin/laporan-pengguna" method="GET">
                    <input type="text" class="search-feed-sendiri mt-1" id="search-resep" name="resep" autofocus
                      placeholder="Cari...">
                    <button type="submit" class="zoom-effects cari2 atas button-search"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                      </svg></button>
                  </form>
                </div>

              </div>
            </div>
          </form>


          @if ($data['feed_dibuat']->count() < 1)
            <div class="d-flex mt-5 flex-column h-100 justify-content-center align-items-center"
              style="margin-top: -3em; margin-right:15%;">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada postingan</b></p>
            </div>
          @endif

          {{-- start tab 1 --}}
          <div id="feed_dibuat_tab1">
            <div class="mt-4 col-12 p-0">
              <div class="row">
              @foreach ($data['feed_dibuat'] as $feed_buat)
              <div class="feed-sendiri col-lg-4 col-md-6 col-sm-12">
                <form hidden id="delete-data{{ $feed_buat->id }}" action="/hapus_feed/{{ $feed_buat->id }}"
                  method="post">
                  @csrf
                  @method('DELETE')
                </form>

                <div class="d-flex justify-content-evenly gap1 feed_dibuat_tab1">
                  <div class="card border-black p-0">

                      <div id="feed_buat{{ $feed_buat->id }}">
                      <div class="card-body p-2">
                      <a href="{{ route('veed.index', ['uuid' => $feed_buat->uuid]) }}" class="text-black fs-6">
                      <video src="{{ asset('storage/' . $feed_buat->upload_video) }}" style="width: 100%;"
                        class="rounded-4"></video>
                      <div style="width: auto;">
                        <div class="p-0">
                          <span class="ellipsis-deskripsi">{{ $feed_buat->deskripsi_video }}</span>
                        </div>

                      </div>
                      <style>

                        .border-black {
                            /* width: 150px;
                            height: 225px; */
                            border-radius: 15px;
                            border: 1px black solid;
                            overflow: hidden;
                        }
                        @media (min-width: 1024px) {
                          video.besar {
                            width: 100%;
                          }

                          div.tek {
                            max-width: 93%;
                          }

                          a.rigt {
                            margin-left: 40px;
                          }

                          button.swipe {
                            margin-right: 58px;
                          }

                          a.swipe {
                            margin-right: 58px;
                          }

                          div.search {
                            max-width: 95%;
                          }

                          div.kanans {
                            margin-left: 25px;
                          }
                        }

                        @media (min-width: 1210px) and (max-width: 4000px) {
                          button.swipe {
                            margin-right: 58px;
                          }

                          a.swipe {
                            margin-right: 58px;
                          }

                          div.search {
                            max-width: 95%;
                          }

                          div.kanans {
                            margin-left: 25px;
                          }
                        }
                      </style>

                      {{-- modal edit --}}
                      <div class="modal fade" id="edit{{ $feed_buat->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content" style="border-radius: 15px">
                            <div class="modal-body">
                              <div class="d-flex justify-content-between">
                                <h5 class="modal-title ml-2" id="exampleModalLabel"
                                  style=" color: black; font-size: 25px; font-family: Poppins; letter-spacing: 0.80px; word-wrap: break-word">
                                  Edit
                                </h5>
                                <button type="button" class="close mr-2" data-dismiss="modal" aria-label="Close"
                                  id="closeModalEdit{{ $feed_buat->id }}">
                                  <i class="fa-regular text-dark fa-circle-xmark"></i>
                                </button>
                              </div>
                              <br>
                              <form id="formUpdateFeed{{ $feed_buat->id }}"
                                action="{{ route('update.feed', $feed_buat->id) }}" method="POST">
                                @csrf
                                <div class="col">
                                  <textarea class="form-control" rows="5" value="" name="deskripsi_video"
                                    id="deskripsi_video{{ $feed_buat->id }}" style="border-radius:10px;">{{ $feed_buat->deskripsi_video }}</textarea>

                                  <button type="submit" onclick="buttonUpdateFeed({{ $feed_buat->id }})"
                                    class="btn btn-sm mt-3 float-end text-white rights"
                                    style=" background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px; padding: 4px 15px; font-size: 15px; font-family: Poppins; font-weight: 500; letter-spacing: 0.13px; word-wrap: break-word">Edit</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                      {{-- end modal edit --}}
                      </a>
                      </div>
                      <div class="card-footer d-flex justify-content-between" style="background-color: white; padding: 10px;">
                          <div class="col-lg-8 col-md-9 col-9 p-0">
                            <a type="button" class="text-dark" onclick="openModel()"
                              id="button-modal-komentar-feed" href="#"
                              data-bs-toggle="modal"data-bs-target="#exampleModal">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                  d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                              </svg>
                              <span style="vertical-align: middle;" class="me-1">{{ $feed_buat->countLikeFeed() }}</span>
                            </a>
                            <a type="button" class="text-dark" onclick="openModel()"
                              id="button-modal-komentar-feed" href="#"
                              data-bs-toggle="modal"data-bs-target="#exampleModal">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 16 16">
                                <path fill="currentColor"
                                  d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                              </svg>
                              <span style="vertical-align: middle;" class="me-1">{{ $feed_buat->countCommentFeed() }}</span>
                            </a>
                            <a class="text-dark" href="#" data-bs-toggle="modal"
                              data-bs-target="#bagikan">
                              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                  stroke-linejoin="round" stroke-width="32"
                                  d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                              </svg>
                              <span style="vertical-align: middle;" class="me-1">{{ $feed_buat->countShareFeed() }}</span>
                            </a>
                          </div>

                          <div class="col-lg-4 col-md-3 col-3 p-0" style="text-align: right;">
                            <a type="button" onclick="DeleteData({{ $feed_buat->id }})"
                              class="yuhu text-danger rounded-5">
                              <i class="fa-solid fa-trash me-1" style="font-size: 12pt; vertical-align: middle;"></i>
                            </a>
                            <a class="text-dark" style="" href="#"
                              data-toggle="modal" data-target="#edit{{ $feed_buat->id }}">
                              <svg class="kanan" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-width="1.5"
                                  d="m14.36 4.079l.927-.927a3.932 3.932 0 0 1 5.561 5.561l-.927.927m-5.56-5.561s.115 1.97 1.853 3.707C17.952 9.524 19.92 9.64 19.92 9.64m-5.56-5.561l-8.522 8.52c-.577.578-.866.867-1.114 1.185a6.556 6.556 0 0 0-.749 1.211c-.173.364-.302.752-.56 1.526l-1.094 3.281m17.6-10.162L11.4 18.16c-.577.577-.866.866-1.184 1.114a6.554 6.554 0 0 1-1.211.749c-.364.173-.751.302-1.526.56l-3.281 1.094m0 0l-.802.268a1.06 1.06 0 0 1-1.342-1.342l.268-.802m1.876 1.876l-1.876-1.876" />
                              </svg>

                            </a>
                          </div>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
              </div>

            </div>
          </div>
        </div>
        <script>
          $(document).ready(function() {
            $('.search-feed-sendiri').on('input', function() {
              var value = $(this).val().toLowerCase();
              $('.feed-sendiri').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
        </script>
        {{-- end --}}
        <div class="tab-pane fade ml-3 mr-4" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
          tabindex="0">

          <form action="">
            <div class="mt-1">
              <div class="search-1 inputan-search" style="border: 1px solid black;border-radius:15px;">

                <div class="search-2"> <i class='bx bxs-map'></i>
                  <form action="/admin/laporan-pengguna" method="GET">
                    <input type="text" id="search-resep" name="resep" autofocus placeholder="Cari..."
                      class="search-feed-disukai mt-1">
                    <button type="submit" class="zoom-effects cari2 atas button-search"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                      </svg></button>
                  </form>
                </div>

              </div>
            </div>
          </form>

          @if ($data['feed_disukai']->count() < 1)
            <div class="d-flex mt-5 flex-column h-100 justify-content-center align-items-center"
              style="margin-top: -3em; margin-right:15%;">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif
          {{-- start tab 2 --}}
          @foreach ($data['feed_disukai'] as $feed_suka)
            <div class="feed-disukai">
              <div class="mt-4 col-12">
              <form id="formUnlikeFeed{{ $feed_suka->id }}"
                action="{{ route('sukai.veed', [Auth::user()->id, $feed_suka->id]) }}" method="post">

              </form>
              <div class="mt-4" id="card_like_feed{{ $feed_suka->id }}">
                <div class="row">
                <a href="{{ route('veed.index', ['uuid' => $feed_suka->uuid]) }}" class="text-black fs-6">
                  <div class="card border-black col-lg-4 col-md-6 col-sm-12 p-0">
                    <div class="card-body p-2">
                    <video src="{{ asset('storage/' . $feed_suka->upload_video) }}" style="width: 100%;"
                      class="rounded-4"></video>

                    <div class="">
                      <span class="ellipsis-deskripsi"> {{ $feed_suka->deskripsi_video }}</span>
                    </div>
                  </div>
                  <div class="card-footer d-flex justify-content-between" style="background-color: white; padding: 10px;">
                  <div class="col-lg-8 col-md-9 col-9 p-0">
                    <a type="button" class="mr-1 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                      href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                        <path fill="currentColor"
                          d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                      </svg>
                      <span class="me-1" style="vertical-align: middle;">{{ $feed_suka->countLikeFeed() }}</span>
                    </a>
                    <a type="button" class="text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                      href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16">
                        <path fill="currentColor"
                          d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                      </svg>
                      <span style="vertical-align: middle;" class="me-1">{{ $feed_suka->countCommentFeed() }}</span>
                    </a>
                    <a class="my-auto text-dark" href="#" data-bs-toggle="modal"
                      data-bs-target="#bagikan">
                      <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                          stroke-width="32"
                          d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                      </svg>
                      <span style="vertical-align: middle;" class="me-1">{{ $feed_suka->countShareFeed() }}</span>
                    </a>
                  </div>
                  <div class="col-lg-4 col-md-3 col-3 p-0">
                    <button type="button" onclick="confirmationUnlikeFeed({{ $feed_suka->id }})"
                      class="yuhu text-danger rounded-5 float-end">
                      <i class="fa-solid fa-trash" style="font-size: 12pt; vertical-align: middle;"></i>
                    </button>
                  </div>
                  </div>
                  </div>
                </a>
                </div>
              </div>
              </div>
            </div>
          @endforeach

        </div>
        <script>
          $(document).ready(function() {
            $('.search-feed-disukai').on('input', function() {
              var value = $(this).val().toLowerCase();
              $('.feed-disukai').filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
              });
            });
          });
        </script>
        {{-- end --}}
        <div class="tab-pane fade ml-3 mr-4" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"
          tabindex="0">
          <form action="">
            <div class="mt-1">
              <div class="search-1 inputan-search" style="border: 1px solid black; border-radius:15px;">

                <div class="search-2"> <i class='bx bxs-map'></i>
                  <form action="/admin/laporan-pengguna" method="GET">
                    <input type="text" id="search-resep" name="resep" autofocus placeholder="Cari..."
                      class="search-feed-favorite mt-1">
                    <button type="submit" class="zoom-effects cari2 atas button-search"><svg
                        xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24">
                        <path fill="currentColor"
                          d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0 0 16 9.5A6.5 6.5 0 1 0 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5S14 7.01 14 9.5S11.99 14 9.5 14z" />
                      </svg></button>
                  </form>
                </div>

              </div>
            </div>
          </form>
          @if ($data['feed_favorite']->count() < 1)
            <div class="d-flex mt-5 flex-column h-100 justify-content-center align-items-center"
              style="margin-top: -3em; margin-right:15%;">
              <img src="{{ asset('images/data.png') }}" style="width: 15em">
              <p><b>Tidak ada data</b></p>
            </div>
          @endif
          @foreach ($data['feed_favorite'] as $feed_favorite)
            {{-- start tab 3 --}}
            <div class="feed-favorite">
              <div class="mt-4 col-12">
              <form id="formUnfavoriteFeed{{ $feed_favorite->id }}"
                action="{{ route('favorite.feed.store', $feed_favorite->id) }}" method="post"></form>
              <div class="mt-4" id="card_feed_favorite{{ $feed_favorite->id }}">
                <div class="row">
                  <a href="{{ route('veed.index', ['uuid' => $feed_favorite->uuid]) }}" class="text-dark fs-6">
                  <div class="card border-black col-lg-4 col-md-6 col-sm-12 p-0">
                    <div class="card-body p-2">
                    <video src="{{ asset('storage/' . $feed_favorite->upload_video) }}" style="width:100%;"
                      class="rounded-4"></video>
                    <div class="tek">
                      <span class="ellipsis-deskripsi">{{ $feed_favorite->deskripsi_video }}</span>
                    </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between" style="background-color: white; padding: 10px;">
                    <div class="col-lg-8 col-md-9 col-9 p-0">
                      <a type="button" class="mr-1 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                        href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512">
                          <path fill="currentColor"
                            d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                        </svg>
                        <span class="me-1" style="vertical-align: middle;">{{ $feed_favorite->countLikeFeed() }}</span>
                      </a>
                      <a type="button" class="ms-3 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                        href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                        <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 16 16">
                          <path fill="currentColor"
                            d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                        </svg>
                        <span class="me-1" style="vertical-align: middle;">{{ $feed_favorite->countCommentFeed() }}</span>
                      </a>
                      <a class="ml-3 mr-1 my-auto text-dark" href="#" data-bs-toggle="modal"
                        data-bs-target="#bagikan">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" viewBox="0 0 512 512">
                          <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="32"
                            d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                        </svg>
                        <span class="me-1" style="vertical-align: middle;">{{ $feed_favorite->countShareFeed() }}</span>
                      </a>
                    </div>

                      <div class="col-lg-4 col-md-3 col-3 p-0">
                      <button type="button" onclick="confirmationUnfavoriteFeed({{ $feed_favorite->id }})"
                        class="yuhu text-danger rounded-5 float-end">
                        <i class="fa-solid fa-trash" style="font-size: 12pt; vertical-align: middle;"></i>
                      </button>
                      </div>
                    </div>
                  </div>
                  </a>
                </div>
              </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
      {{-- end --}}
      <script>
        $(document).ready(function() {
          $('.search-feed-favorite').on('input', function() {
            var value = $(this).val().toLowerCase();
            $('.feed-favorite').filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
      </script>
    </div>
  </div>
  {{-- Modal untuk Feed --}}

  {{-- <style>
       @media (min-width: 1024px) {
                                    a.xx {
                                      margin-left: 380px;
                                    }
                 }
    </style> --}}

  <div class="modal" id="view">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12 col-lg-6" style="padding: 0;">
              <img src="{{ asset('img/3.jpg') }}" alt="Mobirise" style="height: 100%; width:100%">
            </div>
            <div class="col-md-12 col-lg-6 ">
              <!-- Data -->
              <div class="mt-3" style="background-color: white">
                <div class="d-flex mb-1 ml-2">
                  <div class="col-12">
                    {{-- @if ($item_video->user->foto)
                        <img src="{{ asset('storage/' . $item_video->user->foto) }}"
                            class="border rounded-circle me-2" alt="Avatar" style="height: 40px" />
                    @else --}}
                    <img src="{{ asset('images/default.jpg') }}" class="border rounded-circle me-2 " alt="Avatar"
                      style="height: 40px" />
                    {{-- @endif --}}
                    <a href="" class="text-dark ">
                      <strong class="text-center ">Sikukuntu</strong>
                    </a>
                    <button type="button" class="close mt-2 mr-2" data-dismiss="modal" aria-label="Close">
                      <i class="fa-regular text-dark fa-circle-xmark"></i>
                    </button>
                  </div>
                </div>
              </div>
              <hr style="background-color: black">
              <style>
                .vjs-big-play-button {
                  margin-left: 250px;
                  margin-top: 120px;
                }
              </style>
              <!-- Media -->
              <div class="" data-mdb-ripple-color="light">
                {{-- <video
                    @if ($item_video->isPremium === 'yes') class="video-js vjs-theme-city feed"
                    @else
                    class="video-js vjs-theme-city" @endif
                        id="my-video" controls preload="auto" width="615" height="315"
                        data-setup="{}">
                        <source src="{{ asset('storage/' . $item_video->upload_video) }}" type="video/mp4" />
                        <p class="vjs-no-js">
                            To view this video please enable JavaScript, and consider upgrading to a
                            web browser that
                            <a href="https://videojs.com/html5-video-support/" target="_blank">supports HTML5
                                video</a>
                        </p>
                </video> --}}
                <div class="d-flex mb-3 mt-3 row">
                  <a class="col-3 col-md-2 col-lg-2 d-flex justify-content-center" href="">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                      alt="Avatar" style="height: 50px" />
                  </a>
                  <div class="col-7 col-md-8 col-lg-8">
                    <div class=" rounded-3 py-1">
                      <strong class="text-dark me-2">Siapapun Itu Kocak</strong>
                      <br>
                      <div style="max-width: 100%; min-width: 5px;">
                        <span>Bagus Banget masakan apa ini sepertinya sangat enak untuk dikonsumsi
                          dan sangat menyehatan untuk badan kita teman temanku ya gaesya semua
                          marilah kita emot epep!!!!!!</span>
                      </div>
                      <div class="d-flex">
                        <small class="text-muted d-block me-3">1 hari yang lalu</small>
                        <small class="text-bold">Balas</small>
                      </div>
                    </div>

                  </div>
                  <div class="col-2">
                    <a type="button" class="mr-3 text-dark float-end" onclick="openModel()"
                      id="button-modal-komentar-feed" href="#"
                      data-bs-toggle="modal"data-bs-target="#exampleModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                        <path fill="currentColor"
                          d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="d-flex mb-3 mt-3 row">
                  <a class="col-3 col-md-2 col-lg-2 d-flex justify-content-center" href="">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                      alt="Avatar" style="height: 50px" />
                  </a>
                  <div class="col-7 col-md-8 col-lg-8">
                    <div class=" rounded-3 py-1">
                      <strong class="text-dark me-2">Siapapun Itu Kocak</strong>
                      <br>
                      <div style="max-width: 100%; min-width: 5px;">
                        <span>Bagus Banget masakan apa ini!!!!!!</span>
                      </div>
                      <div class="d-flex">
                        <small class="text-muted d-block me-3">1 hari yang lalu</small>
                        <small class="text-bold">Balas</small>
                      </div>
                    </div>

                  </div>
                  <div class="col-2">
                    <a type="button" class="mr-3 text-dark float-end" onclick="openModel()"
                      id="button-modal-komentar-feed" href="#"
                      data-bs-toggle="modal"data-bs-target="#exampleModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                        <path fill="currentColor"
                          d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                      </svg>
                    </a>
                  </div>
                </div>
                <div class="d-flex mb-3 mt-3 row">
                  <a class="col-3 col-md-2 col-lg-2 d-flex justify-content-center" href="">
                    <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                      alt="Avatar" style="height: 50px" />
                  </a>
                  <div class="col-7 col-md-8 col-lg-8">
                    <div class=" rounded-3 py-1">
                      <strong class="text-dark me-2">Siapapun Itu Kocak</strong>
                      <br>
                      <div style="max-width: 100%; min-width: 5px;">
                        <span>Bagus Banget masakan apa ini seperti sangat enak!!!</span>
                      </div>
                      <div class="d-flex">
                        <small class="text-muted d-block me-3">1 hari yang lalu</small>
                        <small class="text-bold">Balas</small>
                      </div>
                    </div>

                  </div>
                  <div class="col-2">
                    <a type="button" class="mr-3 text-dark float-end" onclick="openModel()"
                      id="button-modal-komentar-feed" href="#"
                      data-bs-toggle="modal"data-bs-target="#exampleModal">
                      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                        <path fill="currentColor"
                          d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                      </svg>
                    </a>
                  </div>
                </div>
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                </a>
              </div>
              <hr style="background-color: black">
              <p class="ml-3">
                <a type="button" class="mr-1 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                  href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 512 512">
                    <path fill="currentColor"
                      d="M323.8 34.8c-38.2-10.9-78.1 11.2-89 49.4l-5.7 20c-3.7 13-10.4 25-19.5 35l-51.3 56.4c-8.9 9.8-8.2 25 1.6 33.9s25 8.2 33.9-1.6l51.3-56.4c14.1-15.5 24.4-34 30.1-54.1l5.7-20c3.6-12.7 16.9-20.1 29.7-16.5s20.1 16.9 16.5 29.7l-5.7 20c-5.7 19.9-14.7 38.7-26.6 55.5c-5.2 7.3-5.8 16.9-1.7 24.9s12.3 13 21.3 13H448c8.8 0 16 7.2 16 16c0 6.8-4.3 12.7-10.4 15c-7.4 2.8-13 9-14.9 16.7s.1 15.8 5.3 21.7c2.5 2.8 4 6.5 4 10.6c0 7.8-5.6 14.3-13 15.7c-8.2 1.6-15.1 7.3-18 15.1s-1.6 16.7 3.6 23.3c2.1 2.7 3.4 6.1 3.4 9.9c0 6.7-4.2 12.6-10.2 14.9c-11.5 4.5-17.7 16.9-14.4 28.8c.4 1.3.6 2.8.6 4.3c0 8.8-7.2 16-16 16h-97.5c-12.6 0-25-3.7-35.5-10.7l-61.7-41.1c-11-7.4-25.9-4.4-33.3 6.7s-4.4 25.9 6.7 33.3l61.7 41.1c18.4 12.3 40 18.8 62.1 18.8H384c34.7 0 62.9-27.6 64-62c14.6-11.7 24-29.7 24-50c0-4.5-.5-8.8-1.3-13c15.4-11.7 25.3-30.2 25.3-51c0-6.5-1-12.8-2.8-18.7c11.6-11.7 18.8-27.7 18.8-45.4c0-35.3-28.6-64-64-64h-92.3c4.7-10.4 8.7-21.2 11.8-32.2l5.7-20c10.9-38.2-11.2-78.1-49.4-89zM32 192c-17.7 0-32 14.3-32 32v224c0 17.7 14.3 32 32 32h64c17.7 0 32-14.3 32-32V224c0-17.7-14.3-32-32-32H32z" />
                  </svg>
                </a>
                <a type="button" class="ms-3 text-dark" onclick="openModel()" id="button-modal-komentar-feed"
                  href="#" data-bs-toggle="modal"data-bs-target="#exampleModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 16 16">
                    <path fill="currentColor"
                      d="M1 4.5A2.5 2.5 0 0 1 3.5 2h9A2.5 2.5 0 0 1 15 4.5v5a2.5 2.5 0 0 1-2.5 2.5H8.688l-3.063 2.68A.98.98 0 0 1 4 13.942V12h-.5A2.5 2.5 0 0 1 1 9.5v-5ZM3.5 3A1.5 1.5 0 0 0 2 4.5v5A1.5 1.5 0 0 0 3.5 11H5v2.898L8.312 11H12.5A1.5 1.5 0 0 0 14 9.5v-5A1.5 1.5 0 0 0 12.5 3h-9Z" />
                  </svg>
                </a>
                <a class="ml-3 mr-1 my-auto text-dark" href="#" data-bs-toggle="modal"
                  data-bs-target="#bagikan">
                  <svg xmlns="http://www.w3.org/2000/svg" width="27" height="25" viewBox="0 0 512 512">
                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                      stroke-width="32"
                      d="m53.12 199.94l400-151.39a8 8 0 0 1 10.33 10.33l-151.39 400a8 8 0 0 1-15-.34l-67.4-166.09a16 16 0 0 0-10.11-10.11L53.46 215a8 8 0 0 1-.34-15.06ZM460 52L227 285" />
                  </svg>
                </a>


                <button type="button" onclick="confirmation_delete_comment_feed()"
                  class="yuhu mr-3 rounded-5 float-end">
                  <i class="fa-regular fa-xl fa-bookmark icons1"></i>
                </button>
              </p>
              <Strong class="my-auto ml-3">500 Suka</Strong>
              <small class="text-muted d-block ml-3 mt-1 mb-2">20 Agustus 2023</small>
              <hr style="background-color: black">
              <div class="d-flex mb-3 ml-3">
                <input type="text" name="commentVeed" width="500px" class="form-control rounded-3 me-3"
                  placeholder="Masukkan komentar...">

                <button type="submit"
                  style="height: 40px; margin-right: 20px;  background-color: #F7941E; border-radius:10px; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);"
                  class="btn  btn-sm text-light"><b class="me-3 ms-3">Kirim</b></button>

              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
  <!-- </div>
  </div> -->
  <!-- jQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
  <script>
    function confirmationUnfavoriteFeed(num) {
      iziToast.show({
        backgroundColor: '#F7941E',
        title: '<i class="fa-regular fa-circle-question"></i>',
        titleColor: 'white',
        messageColor: 'white',
        message: 'Apakah Anda yakin ingin menghapus data ini?',
        position: 'topCenter',
        buttons: [
          ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
            instance, toast) {
            instance.hide({
              transitionOut: 'fadeOutUp',
              onClosing: function(instance, toast, closedBy) {
                $.ajax({
                  url: $("#formUnfavoriteFeed" + num).attr("action"),
                  method: "POST",
                  headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                  },
                  success: function(response) {
                    $("#card_feed_favorite" + num).empty();
                  }
                });
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

    function confirmationUnlikeFeed(num) {
      iziToast.show({
        backgroundColor: '#F7941E',
        title: '<i class="fa-regular fa-circle-question"></i>',
        titleColor: 'white',
        messageColor: 'white',
        message: 'Apakah Anda yakin ingin menghapus data ini?',
        position: 'topCenter',
        buttons: [
          ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
            instance, toast) {
            instance.hide({
              transitionOut: 'fadeOutUp',
              onClosing: function(instance, toast, closedBy) {
                $.ajax({
                  url: $("#formUnlikeFeed" + num).attr("action"),
                  method: "POST",
                  headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                  },
                  success: function(response) {
                    if (response.success) {
                      $("#card_like_feed" + num).empty();
                    }
                  }
                });
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

    function DeleteData(num) {
      iziToast.show({
        backgroundColor: '#F7941E',
        title: '<i class="fa-regular fa-circle-question"></i>',
        titleColor: 'white',
        messageColor: 'white',
        message: 'Apakah Anda yakin ingin menghapus data ini?',
        position: 'topCenter',
        buttons: [
          ['<button class="text-dark" style="background-color:#ffffff">Ya</button>', function(
            instance, toast) {
            instance.hide({
              transitionOut: 'fadeOutUp',
              onClosing: function(instance, toast, closedBy) {
                $.ajax({
                  url: $("#delete-data" + num).attr("action"),
                  method: "POST",
                  headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                  },
                  success: function(response) {
                    if (response.success) {
                      $("#feed_buat" + num).empty();
                    }
                  }
                });
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

    function buttonUpdateFeed(num) {
      $("#formUpdateFeed" + num).off("submit");
      $("#formUpdateFeed" + num).submit(function(event) {
        event.preventDefault();
        let route = $("#formUpdateFeed" + num).attr("action");
        let data = $("#formUpdateFeed" + num).serialize();
        let deskripsi_video = $("#deskripsi_video" + num).val();
        $.ajax({
          url: route,
          method: "POST",
          headers: {
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
          },
          data: data,
          success: function success(response) {
            iziToast.show({
              backgroundColor: '#a1dfb0',
              title: '<i class="fa-regular fa-circle-question"></i>',
              titleColor: 'dark',
              messageColor: 'dark',
              message: response.message,
              position: 'topCenter',
              progressBarColor: 'dark',
            });
          }
        });
      });
    }
  </script>
  <script>
    $(document).ready(function() {
      $("#searchFeedDibuat").on("input", function() {
        let value = $(this).val();
        $("#feed_dibuat_tab1").filter(function() {
          console.log($(this).toggle($(this).text().indexOf(value) > -1));
        });
      });
    });
    $(document).ready(function() {
      $("#cariFeedDisukai").on("input", function() {
        let value = $(this).val();
        $(".feed_disukai_tab2").filter(function() {
          console.log($(this).toggle($(this).text().indexOf(value) > -1));
        });
      });
    });
    $(document).ready(function() {
      $("#cariFeedFavorite").on("input", function() {
        let value = $(this).val();
        $(".feed_favorite_tab3").filter(function() {
          console.log($(this).toggle($(this).text().indexOf(value) > -1));
        });
      });
    });
  </script>
@endsection
