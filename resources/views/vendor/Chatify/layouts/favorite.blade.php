<div class="favorite-list-item">
    @if($user)
        @if($user->foto == null)
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('/images/default.jpg');">
        </div>
        @else
        <div data-id="{{ $user->id }}" data-action="0" class="avatar av-m"
            style="background-image: url('/storage/{{ $user->foto }}');">
        </div>
        @endif
        <p>{{ strlen($user->name) > 5 ? substr($user->name,0,6).'..' : $user->name }}</p>
    @endif
</div>
