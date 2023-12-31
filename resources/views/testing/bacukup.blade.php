                 {{-- <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="d-flex justify-content-between">
                    <div class=" mt-4">
                            @if (Auth::check() && $notification != null)
                          <!-- dropdown notifikasi -->
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
                            @endif
                        </div>

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
                </div> --}}



{{-- <script>
        $(document).ready(function() {
            $('#notification-button').click(function(e) {
                e.preventDefault();
                // const input_message = document.getElementById('message');
                // const more_input = document.getElementById('moreInput');
                const giftForm = document.getElementById('notification-form');
                const route = giftForm.getAttribute('action');
                var formData = $('#notification-form').serialize();
                $.ajax({
                    type: "POST",
                    url: route,
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            iziToast.show({
                                backgroundColor: '#a1dfb0',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                                progressBarColor: 'dark',
                            });
                        } else {
                            iziToast.show({
                                backgroundColor: '#f2a5a8',
                                title: '<i class="fa-solid fa-triangle-exclamation"></i>',
                                titleColor: 'dark',
                                messageColor: 'dark',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    }
                });
            });
        });
    </script> --}}
