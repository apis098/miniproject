@extends('template.nav')
@section('content')

<section class="text-align-center mt-5">

  <div class="row justify-content-center">
    <div class="col-md-3 " style="">
        <div class="card" style="width: 15rem; margin-left:50px;  border-radius: 10px">
        <div class="card-header text-white text-center" style="background-color: #F7941E;   border-top-right-radius: 10px;
        border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
            Rekomendasi Chef
        </div>
          <div class="card-body"  style="height: 400px;">
            <div class="d-flex mb-3">
              <a href="">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                  alt="Avatar" style="height: 40px" />
              </a>
              <div>
                <div class="bg-light rounded-3 px-3 py-1">
                  <a href="" class="text-dark mb-0">
                    <strong>Malcolm Dosh</strong>
                  </a>
                  <a href="" class="text-muted d-block">
                    <small>20 Resep</small>
                  </a>
                </div>
               
              </div>
            </div>
          </div>
        </div>
    </div>


    <div class="col-md-6">

        <div class="card ">
            <div class="card-body">
                <textarea name="deskripsi_resep" class="form-control" placeholder="Ketik apa yang anda pikirkan" id="floatingTextarea"
                rows="5"  required>{{ old('deskripsi_resep') }}</textarea>
     <br>
                  <a href="#" class="btn btn-light"
                  style="background-color: white; border: 0.50px black solid; border-radius: 10px;">
                  <span style="font-weight: 600; color: black;">Tambahkan Video</span>
            </a>
    
                  <a href="#" class="btn "
                  style="float:right; background: #F7941E; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25); border-radius: 10px">
                  <span style="font-weight: 600; color: white;">Kirim</span>
            </a>
    
            </div>
        </div>
        <div class="card mt-4" style="max-width: 42rem;">




         


       
          <!-- Data -->
          <div class="card-header" style="background-color: white">
           
          <div class="d-flex mb-1">
            <a href="">
              <img src="https://mdbcdn.b-cdn.net/img/new/avatars/18.webp" class="border rounded-circle me-2"
                alt="Avatar" style="height: 40px" />
            </a>
            <div  style="margin-top: 8px;">
              <a href="" class="text-dark ">
                <strong class="text-center" >Anna Doe</strong>
              </a>
              <a href="" class="text-muted d-block" style="float: right; margin-left: 390px">
                <small>10 hari yang lalu</small>
              </a>
            </div>
          </div>
        
        </div>
         
        <!-- Media -->
        <div class="bg-image hover-overlay ripple rounded-0" data-mdb-ripple-color="light">
          <img src="https://mdbcdn.b-cdn.net/img/new/standard/people/077.webp" class="w-100" />
          <a href="#!">
            <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
          </a>
        </div>
        <!-- Media -->
        <!-- Interactions -->
        <div class="card-body">
          <!-- Reactions -->
          <div class="d-flex justify-content-between mb-2">
            <div>
              <a href="">
                <i class="fas fa-thumbs-up text-primary"></i>
                <i class="fas fa-heart text-danger"></i>
                <span>124</span>
              </a>
            </div>
            {{-- <div>
              <a href="" class="text-muted"> 8 comments </a>
            </div> --}}
          </div>
          <!-- Reactions -->
  
          <!-- Buttons -->
        
          <!-- Buttons -->
  
          <!-- Comments -->
  
          <!-- Input -->
         
          <!-- Input -->
  
          <!-- Answers -->
  
          <!-- Single answer -->
        
  
          <!-- Single answer -->
          <div class="d-flex mb-3">
           
            <div>
              <div class="rounded-3 py-1">
                <a href="" class="text-dark mb-0">
                  <strong>Rhia Wallis Et tempora ad natus autem enim a distinctio
                    quaerat asperiores necessitatibus commodi dolorum
                    nam perferendis labore delectus, aliquid placeat
                    quia nisi magnam bagaimana jhdsahgdad kita mengaca ita aanm aki iitu makanya .</strong>
                </a>
                
              </div>
              {{-- <a href="" class="text-muted small ms-3 me-2"><strong>Like</strong></a>
              <a href="" class="text-muted small me-2"><strong>Reply</strong></a> --}}
            </div>
          </div>
  
          <!-- Single answer -->
        
  
          <!-- Single answer -->
        
  
          <!-- Answers -->
  
          <!-- Comments -->
        </div>
        </div>
    </div>

    
    <div class="col-md-3">
        <div class="card" style="width: 15rem; margin-left: 25px;  border-radius: 10px">
            <div class="card-header text-white text-center" style="background-color: #F7941E;   border-top-right-radius: 10px;
            border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                Diikuti
            </div>
          <div class="card-body" style="height: 500px;">
            <div class="d-flex mb-3">
              <a href="">
                <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                  alt="Avatar" style="height: 40px" />
              </a>
              <div>
                <div class="bg-light rounded-3 px-3 py-1">
                  <a href="" class="text-dark mb-0">
                    <strong>Resep baru siap di jiltod</strong>
                  </a>
                </div>
               
              </div>
            </div>
          </div>
        </div>
        
        <div class="card mt-5 mb-5" style="width: 15rem; margin-left: 25px;  border-radius: 10px">
            <div class="card-header text-white text-center" style="background-color: #F7941E;   border-top-right-radius: 10px;
            border-top-left-radius: 10px;  font-size: 20px; font-family: Poppins; font-weight: 600; word-wrap: break-word">
                Belum Dibaca
            </div>
            <div class="card-body" style="height: 500px;">
              <div class="d-flex mb-3">
                <a href="">
                  <img src="https://mdbcdn.b-cdn.net/img/new/avatars/8.webp" class="border rounded-circle me-2"
                    alt="Avatar" style="height: 40px" />
                </a>
                <div>
                    <div class="bg-light rounded-3 px-3 py-1">
                      <a href="" class="text-dark mb-0">
                        <strong>Bunda Rahma</strong>
                      </a>
                      <a href="" class="text-muted d-block">
                        <small>2 Pesan Baru</small>
                      </a>
                    </div>
                   
                  </div>
              </div>
            </div>
          </div>
    </div>

</div>


  </section>
  
  
    {{-- @foreach ($video_pembelajaran as $veed)
        <div class="">
            <div class="container mx-auto">
                <video width="100%" height="100%" class="mx-auto my-1" autoplay>
                    <source src="{{ asset('storage/' . $veed->upload_video) }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
            <div class="modal-komentar" hidden>
                <div class="card">
                    <div class="card-header">
                        @php
                            // mendapatkan total like veed
                            $countLikeVeed = \App\Models\like_veed::where('veed_id', $veed->id)->count();
                        @endphp
                        @if (Auth::user())
                            <form id="formCommentVeed" action="{{ route('komentar.veed', [Auth::user()->id, $veed->id]) }}"
                                method="post">
                                @csrf
                                <div class="mb-3">
                                    <label for="comment-veed" class="form-label">Komentar</label>
                                    <input type="text" name="commentVeed" id="comment-veed1" class="form-control"
                                        required>
                                </div>
                                <button type="submit" id="buttonCommentVeed" class="btn btn-primary">Kirim</button>
                            </form>
                            <div class="d-flex flex-row">
                                @php
                                    // mengecek apakah user sudah
                                    $isLikeVeed = \App\Models\like_veed::query()
                                        ->where('users_id', Auth::user()->id)
                                        ->where('veed_id', $veed->id)
                                        ->count();
                                @endphp
                                @if ($isLikeVeed == 0)
                                    <form id="formLikeVeed" action="/like/veed/{{ Auth::user()->id }}/{{ $veed->id }}"
                                        method="post">
                                        @csrf
                                        <button id="buttonLikeVeed" class="btn btn-light" type="submit">
                                            <i class="fa-regular fa-thumbs-up"></i>
                                        </button>
                                    </form>
                                @elseif($isLikeVeed == 1)
                                    <form id="formLikeVeed" action="/like/veed/{{ Auth::user()->id }}/{{ $veed->id }}"
                                        method="post">
                                        @csrf
                                        <button id="buttonLikeVeed" class="btn btn-light" type="submit">
                                            <i class="fa-solid fa-thumbs-up"></i>
                                        </button>
                                    </form>
                                @endif

                                <span class="my-auto">{{ $countLikeVeed }}</span>
                            </div>
                        @else
                            <form>
                                <div class="mb-3">
                                    <label for="comment-veed" class="form-label">Komentar</label>
                                    <input type="text" name="commentVeed" id="comment-veed" class="form-control"
                                        required>
                                </div>
                                <button type="button" onclick="harusLogin()" id="buttonCommentVeed"
                                    class="btn btn-primary">Kirim</button>
                            </form>
                            <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}" onclick="harusLogin()" width="15px"
                                height="15px" alt="">
                            {{ $countLikeVeed }}
                        @endif
                    </div>
                    <div class="card-body">
                        <div id="list-komentar-veed" class="overflow-auto" style="max-height: 400px;">
                            @foreach ($comment_veed->where('veed_id', $veed->id)->get() as $nomer => $item_comment)
                                <div class="media row mb-3 mx-auto d-flex">
                                    <div class="col-2">
                                        <img width="50px" height="50px" class="rounded-circle"
                                            src="{{ $item_comment->user->foto ? asset('storage/' . $item_comment->user->foto) : asset('images/default.jpg') }}"
                                            alt="{{ $item_comment->user->name }}">
                                    </div>
                                    <div class="media-body ml-3 col-10 border border-black rounded">
                                        <h5 class="mt-0">{{ $item_comment->user->name }}</h5>
                                        <small>{{ $item_comment->created_at->diffForHumans() }}</small>
                                        <p>{{ $item_comment->komentar }}</p>
                                        <div class="d-flex flex-row">
                                            @php
                                                // mendapatkan jumlah like tiap komentar
                                                $countLike = \App\Models\like_comment_veed::query()
                                                    ->where('comment_veed_id', $item_comment->id)
                                                    ->where('veed_id', $veed->id)
                                                    ->count();
                                            @endphp
                                            @if (Auth::user())
                                                @php
                                                    // mengecek apakah user sudah like atau belum, kalau nilainya 1 maka sudah like kalau 0 maka belum like
                                                    $isLike = \App\Models\like_comment_veed::query()
                                                        ->where('users_id', Auth::user()->id)
                                                        ->where('comment_veed_id', $item_comment->id)
                                                        ->where('veed_id', $veed->id)
                                                        ->count();
                                                @endphp
                                                @if ($isLike == 1)
                                                    <form
                                                        action="{{ route('like.komentar.veed', [Auth::user()->id, $item_comment->id, $veed->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-light">
                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @elseif($isLike == 0)
                                                    <form
                                                        action="{{ route('like.komentar.veed', [Auth::user()->id, $item_comment->id, $veed->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        <button type="submit" class="btn btn-light">
                                                            <i class="fa-regular fa-thumbs-up"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            @else
                                                <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                    onclick="harusLogin()" width="15px" height="15px" alt="">
                                            @endif
                                            <span class="mx-1 my-auto">
                                                {{ $countLike }}
                                            </span>
                                            <span class="my-auto ml-auto">
                                                <a class="btn btn-primary" data-bs-toggle="collapse"
                                                    href="#collapseExample{{ $nomer }}" role="button"
                                                    aria-expanded="false"
                                                    aria-controls="collapseExample{{ $nomer }}">
                                                    Balasan
                                                </a>
                                            </span>
                                        </div>
                                        <!-- Komentar Balasan Collapse Start -->
                                        <div class="collapse" id="collapseExample{{ $nomer }}">

                                            <div class="card card-body">
                                                @if (Auth::check())
                                                    <form
                                                        action="/balas/komentar/{{ Auth::user()->id }}/{{ $item_comment->id }}/{{ $veed->id }}"
                                                        method="POST">
                                                        @csrf
                                                        <label for="komentarBalasan" class="form-label">Komentar
                                                            Balasan</label>
                                                        <input type="text" name="komentarBalasan" class="form-control"
                                                            id="komentarBalasan" required>
                                                        <button type="submit" class="btn btn-primary my-2">Kirim</button>
                                                    </form>
                                                @else
                                                    <form action="">
                                                        @csrf
                                                        <label for="komentarBalasan" class="form-label">Komentar
                                                            Balasan</label>
                                                        <input type="text" name="komentarBalasan" class="form-control"
                                                            id="komentarBalasan" required>
                                                        <button type="button" onclick="harusLogin()"
                                                            class="btn btn-primary my-2">Kirim</button>
                                                    </form>
                                                @endif
                                                @php
                                                    // mengambil data balasan komentar veed
                                                    $reply_comments = App\Models\reply_comment_veed::query()
                                                        ->where('comment_id', $item_comment->id)
                                                        ->get();

                                                @endphp
                                                @foreach ($reply_comments as $reply_comment)
                                                    @php
                                                        if (Auth::check()) {
                                                            // memeriksa apakah balasan komentar veed sudah di like atau belum
                                                            $isLike2sd = App\Models\like_reply_comment_veed::query()
                                                                ->where('users_id', Auth::user()->id)
                                                                ->where('reply_comment_veed_id', $reply_comment->id)
                                                                ->where('veed_id', $veed->id)
                                                                ->exists();
                                                        }
                                                        $countLike2sd = App\Models\like_reply_comment_veed::query()
                                                            ->where('reply_comment_veed_id', $reply_comment->id)
                                                            ->where('veed_id', $veed->id)
                                                            ->count();
                                                    @endphp
                                                    <div class="card rounded border border-black row">
                                                        <div class="col-2">
                                                            <img width="50px" height="50px" class="rounded-circle"
                                                                src="{{ $reply_comment->user->foto ? asset('storage/' . $reply_comment->user->foto) : asset('images/default.jpg') }}"
                                                                alt="{{ $reply_comment->user->name }}">
                                                        </div>
                                                        <div class="col-10">
                                                            <span>{{ $reply_comment->user->name }}</span> <br>
                                                            <span>{{ $reply_comment->created_at->diffForHumans() }}</span>
                                                            <p>{{ $reply_comment->komentar }}</p>
                                                            @if (Auth::check())
                                                                @if ($isLike2sd)
                                                                    <form
                                                                        action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $veed->id }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-light">
                                                                            <i class="fa-solid fa-thumbs-up"></i>
                                                                        </button>
                                                                    </form>
                                                                @else
                                                                    <form
                                                                        action="/sukai/balasan/komentar/{{ Auth::user()->id }}/{{ $reply_comment->id }}/{{ $veed->id }}"
                                                                        method="post">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-light">
                                                                            <i class="fa-regular fa-thumbs-up"></i>
                                                                        </button>
                                                                    </form>
                                                                @endif
                                                            @else
                                                                <img src="{{ asset('images/🦆 icon _thumbs up_.svg') }}"
                                                                    onclick="harusLogin()" width="15px" height="15px"
                                                                    alt="">
                                                            @endif
                                                            {{ $countLike2sd }}
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="card-footer">
                        <!-- Footer Content Goes Here -->
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM="
    crossorigin="anonymous"></script>
    <script>
        $("document").ready(function() {
            // menambahkan komentar veed tanpa refresh
            $("#buttonCommentVeed").click(function(event) {
                event.preventDefault();
                var data = $("#formCommentVeed").serialize();
                $.ajax({
                    url: "{{ route('komentar.veed', [Auth::user()->id, $veed->id]) }}",
                    method: "POST",
                    data: data,
                    success: function success(response) {
                        if (response.success) {
                            iziToast.show({
                                backgroundColor: '#F7941E',
                                title: '<i class="fa-regular fa-circle-question"></i>',
                                titleColor: 'white',
                                messageColor: 'white',
                                message: response.message,
                                position: 'topCenter',
                            });
                        }
                    }
                });
            });
        });

        function harusLogin() {
            iziToast.show({
                backgroundColor: '#F7941E',
                title: '<i class="fa-regular fa-circle-question"></i>',
                titleColor: 'white',
                messageColor: 'white',
                message: 'Anda harus login terlebih dahulu!',
                position: 'topCenter',
            });
        }
    </script> --}}
@endsection
