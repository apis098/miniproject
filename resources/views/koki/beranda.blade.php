@extends('layouts.nav_koki')
@section('konten')
    <style>
        .counter-card {
            border: 1px solid #ddd;
        }

        /* Custom CSS to make the chart fill the screen */
        .su {
            border-radius: 30px;
        }
    </style>
    <div style="overflow-x:hidden">
        <div class="content-header mx-5">
            <div class="d-flex mt-1">
                <div class="col-sm-6">
                    <h4>Selamat datang kembali {{ $koki->name }}</h4>
                    <p>Berikut Beberapa Rekapan Terbaru</p>
                </div>
                <div class="col-sm-6" style="margin-left: 36%;">
                    <div class="d-flex mt-4">
                        @if (Auth::check() && $notification != null)
                            {{-- dropdown notifikasi --}}
                            <a href="{{ url('/roomchat') }}" class="text-dark ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                        d="M128 24a104 104 0 0 0-91.82 152.88l-11.35 34.05a16 16 0 0 0 20.24 20.24l34.05-11.35A104 104 0 1 0 128 24ZM84 140a12 12 0 1 1 12-12a12 12 0 0 1-12 12Zm44 0a12 12 0 1 1 12-12a12 12 0 0 1-12 12Zm44 0a12 12 0 1 1 12-12a12 12 0 0 1-12 12Z" />
                                </svg>
                            </a>
                            @if ($messageCount > 0)
                                <span class="badge badge-danger rounded-pill mb-4 me-2"
                                    style="margin-left: -25px; margin-top: -5px">{{ $messageCount }}</span>
                            @endif

                            <a data-toggle="dropdown" class="text-dark ms-1 " href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M5 19q-.425 0-.713-.288T4 18q0-.425.288-.713T5 17h1v-7q0-2.075 1.25-3.688T10.5 4.2v-.7q0-.625.438-1.063T12 2q.625 0 1.063.438T13.5 3.5v.7q2 .5 3.25 2.113T18 10v7h1q.425 0 .713.288T20 18q0 .425-.288.713T19 19H5Zm7 3q-.825 0-1.413-.588T10 20h4q0 .825-.588 1.413T12 22Z" />
                                </svg>
                            </a>

                            <div class="text-light me-2">
                                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3" style="">
                                    @foreach ($notification as $row)
                                        @if ($row->sender->id != auth()->user()->id)
                                            <div class="dropdown-divider"></div>
                                            <div class="input-group">
                                                @if ($row->sender->foto)
                                                    <a href="#">
                                                        <img class="ms-2 mt-1 rounded-circle"
                                                            src="{{ asset('storage/' . $row->sender->foto) }}"
                                                            alt="profile image" style="max-width:35px">
                                                    </a>
                                                @else
                                                    <a href="#">
                                                        <img class="ms-2 mt-1 rounded-circle"
                                                            src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                            style="max-width:35px">
                                                    </a>
                                                @endif
                                                <p class="mt-2 text-orange">{{ $row->sender->name }}</p>
                                                @if ($row->reply_id != null && $row->complaint_id != null && $row->like_id == null)
                                                    <form action="{{ route('replies.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Membalas
                                                                keluhan anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->reply_id != null && $row->like_id != null)
                                                    <form action="{{ route('replies.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                komentar anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->reply_id_comment != null)
                                                    <form action="{{ route('replies.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Membalas
                                                                komentar anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->like_comment_recipes_id != null && $row->resep_id != null)
                                                    <form action="{{ route('resep.read.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                komentar anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->like_reply_comment_recipes_id != null && $row->resep_id != null)
                                                    <form action="{{ route('resep.read.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                komentar anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->reply_comment_id != null && $row->resep_id != null)
                                                    <form action="{{ route('resep.read.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Membalas
                                                                komentar anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->comment_id != null && $row->resep_id != null)
                                                    <form action="{{ route('resep.read.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Mengomentari
                                                                resep anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->like_reply_id != null && $row->complaint_id != null)
                                                    <form action="{{ route('replies.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                komentar anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->like_id != null && $row->resep_id != null)
                                                    <form action="{{ route('resep.like.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Menyukai
                                                                resep anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->follower_id == auth()->user()->id && $row->complaint_id != null)
                                                    <form action="{{ route('replies.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Memiliki
                                                                kesulitan memasak</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->follower_id == auth()->user()->id && $row->resep_id != null)
                                                    <form action="{{ route('resep.read.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Menambahkan
                                                                resep baru</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->profile_id != null)
                                                    <form action="{{ route('profile.blocked.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class="mt-1 ms-1 text-secondary">Foto profil
                                                                kamu telah diblokir</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->reply_id_report != null)
                                                    <form action="{{ route('blockedComent.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                            data-target="#modalAlasan{{ $row->id }}">
                                                            <small class="mt-1 ms-1 text-secondary">Komentar
                                                                kamu telah diblokir</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 mb-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            <input hidden type="text" value="{{ $row->complaint_id }}"
                                                                name="replies_id" id="replies_id" class="form-control">
                                                        </button>
                                                    </form>
                                                @elseif($row->follower_id != null && $row->complaint_id == null)
                                                    <form action="{{ route('follow.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class=" ms-1 text-secondary">Mengikuti
                                                                anda</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                        </button>
                                                        <input type="text" hidden name="follower_id" id="follower_id"
                                                            value="{{ $row->follower_id }}" class="form-control">
                                                    </form>
                                                @elseif($row->complaint_id_report != null)
                                                    <form action="{{ route('blockedComplaint.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                            data-target="#modalAlasan{{ $row->id }}">
                                                            <small class=" ms-1 text-secondary">Keluhan
                                                                anda telah diblokir</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                        </button>
                                                        <input type="text" hidden name="follower_id" id="follower_id"
                                                            value="{{ $row->follower_id }}" class="form-control">
                                                    </form>
                                                @elseif($row->resep_id_report != null)
                                                    <form action="{{ route('blockedRecipes.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="button" data-toggle="modal"
                                                            data-target="#modalAlasan{{ $row->id }}">
                                                            <small class=" ms-1 text-secondary">Resep
                                                                anda telah diblokir</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                            0
                                                        </button>
                                                        <input type="text" hidden name="follower_id" id="follower_id"
                                                            value="{{ $row->follower_id }}" class="form-control">
                                                    </form>
                                                @elseif($row->random_name != null)
                                                    <form action="{{ route('profile.blocked.notification', $row->id) }}"
                                                        method="POST">
                                                        @method('PUT')
                                                        @csrf
                                                        <button class="yuhu mt-2" type="submit">
                                                            <small class=" ms-2 text-secondary">Username kamu
                                                                diblokir</small>
                                                            @if ($row->status == 'belum')
                                                                <img class="ms-2 rounded-circle"
                                                                    src="{{ asset('images/badge.png') }}"
                                                                    alt="profile image" style="max-width:10px">
                                                            @endif
                                                        </button>
                                                        <input type="text" hidden name="follower_id" id="follower_id"
                                                            value="{{ $row->follower_id }}" class="form-control">
                                                    </form>
                                                @endif
                                            </div>
                                        @endif
                                    @endforeach
                                    @forelse ($notification as $row)
                                        <!-- Konten notifikasi -->
                                    @empty
                                        <div class="dropdown-divider"></div>
                                        <div class="text-center mt-2">
                                            <img src="{{ asset('images/nodata.png') }}" class="col-sm-6" alt="...">
                                        </div>
                                    @endforelse
                                    <div class="dropdown-divider"></div>
                                </div>
                            </div>
                            @if ($unreadNotificationCount > 0)
                                <span class="badge badge-danger rounded-pill mb-4 me-2"
                                    style="margin-left: -25px; margin-top: -5px">{{ $unreadNotificationCount }}</span>
                            @endif


                            {{-- dropdown profile & logout --}}
                            <div class="input-group dropdown">
                                <a data-toggle="dropdown" class="" href="#" style="margin-top: -20px">
                                    @if ($userLogin->foto)
                                        <img loading="lazy" class="mr-3 rounded-circle"
                                            src="{{ asset('storage/' . $userLogin->foto) }}" alt="profile image"
                                            width="50px" height="50px">
                                    @else
                                        <img loading="lazy" class="mr-3 rounded-circle"
                                            src="{{ asset('images/default.jpg') }}" alt="profile image"
                                            style="max-width:55px">
                                    @endif
                                </a>
                                @if (auth()->user()->role === 'koki')
                                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3 me-5 ms-auto"
                                        style="width: 255px; border-radius:13px;">
                                        <div class="input-group">
                                            <a href="/koki/beranda">
                                                @if ($userLogin->foto)
                                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                        src="{{ asset('storage/' . $userLogin->foto) }}"
                                                        alt="profile image" width="50px" height="50px">
                                                @else
                                                    <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                        src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                        style="max-width:40px">
                                                @endif
                                            </a>
                                            <p class="mt-2 text-orange"><b>{{ auth()->user()->name }}</b></p>
                                        </div>
                                        <div class="dropdown-divider"></div>
                                        <a href="/koki/index" class="dropdown-item text-orange" style="width: 230px">
                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M12 11q.825 0 1.413-.588Q14 9.825 14 9t-.587-1.413Q12.825 7 12 7q-.825 0-1.412.587Q10 8.175 10 9q0 .825.588 1.412Q11.175 11 12 11Zm0 2q-1.65 0-2.825-1.175Q8 10.65 8 9q0-1.65 1.175-2.825Q10.35 5 12 5q1.65 0 2.825 1.175Q16 7.35 16 9q0 1.65-1.175 2.825Q13.65 13 12 13Zm0 11q-2.475 0-4.662-.938q-2.188-.937-3.825-2.574Q1.875 18.85.938 16.663Q0 14.475 0 12t.938-4.663q.937-2.187 2.575-3.825Q5.15 1.875 7.338.938Q9.525 0 12 0t4.663.938q2.187.937 3.825 2.574q1.637 1.638 2.574 3.825Q24 9.525 24 12t-.938 4.663q-.937 2.187-2.574 3.825q-1.638 1.637-3.825 2.574Q14.475 24 12 24Zm0-2q1.8 0 3.375-.575T18.25 19.8q-.825-.925-2.425-1.612q-1.6-.688-3.825-.688t-3.825.688q-1.6.687-2.425 1.612q1.3 1.05 2.875 1.625T12 22Zm-7.7-3.6q1.2-1.3 3.225-2.1q2.025-.8 4.475-.8q2.45 0 4.463.8q2.012.8 3.212 2.1q1.1-1.325 1.713-2.95Q22 13.825 22 12q0-2.075-.788-3.887q-.787-1.813-2.15-3.175q-1.362-1.363-3.175-2.151Q14.075 2 12 2q-2.05 0-3.875.787q-1.825.788-3.187 2.151Q3.575 6.3 2.788 8.113Q2 9.925 2 12q0 1.825.6 3.463q.6 1.637 1.7 2.937Z" />
                                            </svg>
                                            Profil
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" data-toggle="modal" data-target="#favoriteModal"
                                            style="width: 230px;" class="dropdown-item text-orange">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" class="me-1"
                                                height="21" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M19 3H5v18l7-3l7 3V3zm-2 15l-5-2.18L7 18V5h10v13z" />
                                            </svg>
                                            Favorite
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('penawaran.prem') }}" style="width: 230px;"
                                            class="dropdown-item text-orange">
                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M14.005 2.003a8 8 0 0 1 3.292 15.293A8 8 0 1 1 6.711 6.71a8.003 8.003 0 0 1 7.294-4.707Zm-4 6a6 6 0 1 0 0 12a6 6 0 0 0 0-12Zm1 1v1h2v2h-4a.5.5 0 0 0-.09.992l.09.008h2a2.5 2.5 0 0 1 0 5v1h-2v-1h-2v-2h4a.5.5 0 0 0 .09-.992l-.09-.008h-2a2.5 2.5 0 0 1 0-5v-1h2Zm3-5A5.985 5.985 0 0 0 9.52 6.016a8 8 0 0 1 8.47 8.471a6 6 0 0 0-3.986-10.484Z" />
                                            </svg>
                                            Upgrade
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" style="width: 230px;" class="dropdown-item text-orange">
                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 256 256">
                                                <path fill="currentColor"
                                                    d="M196 140a16 16 0 1 1-16-16a16 16 0 0 1 16 16Zm40-32v80a32 32 0 0 1-32 32H60a32 32 0 0 1-32-32V68.92A32 32 0 0 1 60 36h132a12 12 0 0 1 0 24H60a8 8 0 0 0-8 8.26v.08A8.32 8.32 0 0 0 60.48 76H204a32 32 0 0 1 32 32Zm-24 0a8 8 0 0 0-8-8H60.48A33.72 33.72 0 0 1 52 98.92V188a8 8 0 0 0 8 8h144a8 8 0 0 0 8-8Z" />
                                            </svg>
                                            Top up
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" style="width: 230px;" class="dropdown-item text-orange">
                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8s8 3.58 8 8s-3.58 8-8 8zm-.22-13h-.06c-.4 0-.72.32-.72.72v4.72c0 .35.18.68.49.86l4.15 2.49c.34.2.78.1.98-.24a.71.71 0 0 0-.25-.99l-3.87-2.3V7.72c0-.4-.32-.72-.72-.72z" />
                                            </svg>
                                            Riwayat Top up
                                        </a>
                                        <div class="dropdown-divider"></div>
                                        <a href="{{ route('actionlogout') }}" style="width: 230px;"
                                            class="dropdown-item text-orange">
                                            <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20"
                                                height="20" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                                <path fill="currentColor"
                                                    d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z" />
                                            </svg>
                                            Keluar
                                        </a>
                                    </div>
                            </div>
                        @elseif (auth()->user()->role === 'admin')
                            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right mt-3 me-5 ms-auto"
                                style="width: 255px; border-radius:13px;">
                                <div class="input-group">
                                    <a href="#">
                                        @if ($userLogin->foto)
                                            <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                src="{{ asset('storage/' . $userLogin->foto) }}" alt="profile image"
                                                width="50px" height="50px">
                                        @else
                                            <img class="mr-3 ms-2 mb-1 rounded-circle"
                                                src="{{ asset('images/default.jpg') }}" alt="profile image"
                                                style="max-width:40px">
                                        @endif
                                    </a>
                                    <p class="mt-2 text-orange"><b>{{ auth()->user()->name }}</b></p>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a href="/admin/dashboard" class="dropdown-item text-orange" style="width: 230px">
                                    <svg style="vertical-align: top; margin-left: -5px" xmlns="http://www.w3.org/2000/svg"
                                        width="25" height="25" viewBox="0 0 36 36">
                                        <path fill="currentColor"
                                            d="m33.71 17.29l-15-15a1 1 0 0 0-1.41 0l-15 15a1 1 0 0 0 1.41 1.41L18 4.41l14.29 14.3a1 1 0 0 0 1.41-1.41Z"
                                            class="clr-i-outline clr-i-outline-path-1" />
                                        <path fill="currentColor"
                                            d="M28 32h-5V22H13v10H8V18l-2 2v12a2 2 0 0 0 2 2h7V24h6v10h7a2 2 0 0 0 2-2V19.76l-2-2Z"
                                            class="clr-i-outline clr-i-outline-path-2" />
                                        <path fill="none" d="M0 0h36v36H0z" />
                                    </svg>
                                    &nbsp; Dashboard
                                </a>

                                <div class="dropdown-divider"></div>
                                <a href="{{ route('actionlogout') }}" style="width: 230px;"
                                    class="dropdown-item text-orange">
                                    <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                            d="M6 2h9a2 2 0 0 1 2 2v2h-2V4H6v16h9v-2h2v2a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2z" />
                                        <path fill="currentColor"
                                            d="M16.09 15.59L17.5 17l5-5l-5-5l-1.41 1.41L18.67 11H9v2h9.67z" />
                                    </svg>
                                    Keluar
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                    </div>
                    @endif
                @else
                    <div class="ms-5">
                        <a href="{{ route('login') }}" class="btn rounded-5 text-white zoom-effects ms-5"
                            style=" border-radius: 15px; border: 0.50px white solid; font-family: Poppins;"><b
                                class="me-2 ms-2">Masuk</b></a>

                    </div>
                    @endif
                </div>
            </div>

        </div>

    </div>

    <!-- Sale & Revenue Start -->
    <div class=" container-fluid  px-4 su mx-4">
        <div class="row g-2 su">
            <div class="col-sm-3 col-lg-3 mx-3">
                <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card"
                    style="border: 1px solid #333;  width: 285px">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $koki->followers }}</h6>
                        <p class="mb-2" style="font-size: 14px; font-weight: bold;">Pengikut</p>
                    </div>
                    <i class="fas fa-user-circle fa-3x"></i>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3 ml-5">
                <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card ml-1"
                    style="border: 1px solid #333; width: 285px">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $jumlah_resep }}</h6>
                        <p class="mb-2" style="font-size: 14px; font-weight: bold;">Resep</p>
                    </div>
                    <i class="fas fa-book fa-3x"></i>
                </div>
            </div>
            <div class="col-sm-3 col-lg-3 ml-4">
                <div class="rounded-4 d-flex align-items-center justify-content-between p-4 counter-card ml-5"
                    style="border: 1px solid #333; width: 285px">
                    <div class="ms-1">
                        <h6 class="mb-0" style="font-size: 24px; font-weight: bold;">{{ $koki->like }}</h6>
                        <p class="mb-2" style="font-size: 14px; font-weight: bold;">Suka</p>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 20 20">
                        <path fill="currentColor"
                            d="M1.36 9.495v7.157h3.03l.153.018c2.813.656 4.677 1.129 5.606 1.422c1.234.389 1.694.484 2.531.54c.626.043 1.337-.198 1.661-.528c.179-.182.313-.556.366-1.136a.681.681 0 0 1 .406-.563c.249-.108.456-.284.629-.54c.16-.234.264-.67.283-1.301a.682.682 0 0 1 .339-.57c.582-.337.87-.717.93-1.163c.066-.493-.094-1.048-.513-1.68a.683.683 0 0 1 .176-.936c.401-.282.621-.674.676-1.23c.088-.886-.477-1.541-1.756-1.672a9.42 9.42 0 0 0-3.394.283a.68.68 0 0 1-.786-.95c.5-1.058.778-1.931.843-2.607c.085-.897-.122-1.547-.606-2.083c-.367-.406-.954-.638-1.174-.59c-.29.062-.479.23-.725.818c-.145.348-.215.644-.335 1.335c-.115.656-.178.952-.309 1.34c-.395 1.176-1.364 2.395-2.665 3.236a11.877 11.877 0 0 1-2.937 1.37a.676.676 0 0 1-.2.03H1.36Zm-.042 8.52c-.323.009-.613-.063-.856-.233c-.31-.217-.456-.559-.459-.953l.003-7.323c-.034-.39.081-.748.353-1.014c.255-.25.588-.368.94-.36h2.185A10.505 10.505 0 0 0 5.99 6.95c1.048-.678 1.82-1.65 2.115-2.526c.101-.302.155-.552.257-1.14c.138-.789.224-1.156.422-1.628c.41-.982.948-1.462 1.69-1.623c.73-.158 1.793.263 2.465 1.007c.745.824 1.074 1.855.952 3.129c-.052.548-.204 1.161-.454 1.844a10.509 10.509 0 0 1 2.578-.056c2.007.205 3.134 1.512 2.97 3.164c-.072.712-.33 1.317-.769 1.792c.369.711.516 1.414.424 2.1c-.106.79-.546 1.448-1.278 1.959c-.057.693-.216 1.246-.498 1.66a2.87 2.87 0 0 1-.851.834c-.108.684-.335 1.219-.706 1.595c-.615.626-1.714.999-2.718.931c-.953-.064-1.517-.18-2.847-.6c-.877-.277-2.693-.737-5.43-1.377H1.317Zm1.701-8.831a.68.68 0 0 1 .68-.682a.68.68 0 0 1 .678.682v7.678a.68.68 0 0 1-.679.681a.68.68 0 0 1-.679-.681V9.184Z" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-lg-12">
                <div class="mx-3" style="width: 920px;">
                    <div class="panel h-full w-full">
                        <div class="mb-3 flex items-center dark:text-white-light">
                            <h5 class="text-lg fw-bold">Diagram Pendapatan</h5>
                        </div>
                    </div>
                    <canvas id="myBarChart" style="border: 1px solid black; border-radius: 15px; width: 100%;"></canvas>
                </div>
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            var ctx = document.getElementById('myBarChart').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['January', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September',
                        'Oktober', 'November', 'Desember'
                    ],
                    datasets: [{
                        label: 'Total Pendapatan',
                        data: 10,
                        backgroundColor: 'orange',
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        },
                        x: {
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        </script>


        <!-- Widgets Start -->

        <div class="container-fluid pt-4 mr-5">
            <div class="ms-1" style="display: flex;">
                <h5 class="fw-bold" style="margin-bottom: 1;">Komentar Feed Terbaru</h5>
                <h5 class="fw-bold" style="margin-bottom: 1; margin-left: 270px;">Komentar Resep Terbaru</h5>
            </div>
            {{$komentar_feed->count() . " " . $komentar_resep->count()}}
            <div class="d-flex">
                <div class="col-lg-6">
                    <div class="card p-4 mt-2 mb-2"
                        style="width: 435px; height: 400px; border-radius: 15px; border: 1px black solid">
                        <div class="card-body ">
                            @if ($komentar_feed->count() == 0)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            @foreach ($komentar_feed as $commentFeed)
                            <div class="border-bottom py-3">
                                <a href="#" class="text-decoration-none d-flex text-dark">
                                    <img class="rounded-circle flex-shrink-0" src=""
                                        alt="" style="width: 40px; height: 40px;">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">Nama User</h6>
                                            <small>{{ \Carbon\Carbon::parse($commentFeed->created_at)->locale('id_ID')->diffForHumans() }}</small>

                                        </div>
                                        <span>
                                            Oleh Nama User
                                        </span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card p-4 mt-2 mb-2"
                        style="width: 435px; height: 400px; border-radius: 15px; border: 1px black solid">
                        <div class="card-body ">
                            @if ($komentar_resep->count() == 0)
                                <div class="d-flex flex-column h-100 justify-content-center align-items-center"
                                    style="margin-top: -3em">
                                    <img src="{{ asset('images/data.png') }}" style="width: 15em">
                                    <p><b>Tidak ada data</b></p>
                                </div>
                            @endif
                            @foreach ($komentar_resep as $commentRecipe)
                            <div class="border-bottom py-3">
                                <a href="#" class="text-decoration-none d-flex text-dark">
                                    <img class="rounded-circle flex-shrink-0" src=""
                                        alt="" style="width: 40px; height: 40px;">
                                    <div class="w-100 ms-3">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h6 class="mb-0">Nama User</h6>
                                            <small>{{ \Carbon\Carbon::parse($commentRecipe->created_at)->locale('id_ID')->diffForHumans() }}</small>

                                        </div>
                                        <span>
                                            Oleh Nama User
                                        </span>
                                    </div>
                                </a>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
