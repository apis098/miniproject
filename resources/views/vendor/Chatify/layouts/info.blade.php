{{-- user info and avatar --}}
<div class="avatar av-l chatify-d-flex"></div>
<p class="info-name">{{ config('chatify.name') }}</p>
<div class="messenger-infoView-btns">
    <button type="button" style="background-color: #F7941E" class="btn btn-warning rounded-4 text-light delete-conversation"><p  class="mb-1 mt-1 fw-bolder">Hapus percakapan</p></button>
</div>
{{-- shared photos --}}
<div class="messenger-infoView-shared">
    <p class="messenger-title"><span>Media yang dibagikan</span></p>
    <div class="shared-photos-list"></div>
</div>
