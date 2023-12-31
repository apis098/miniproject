{{-- -------------------- Saved Messages -------------------- --}}
{{-- @if($get == 'saved')
    <table class="messenger-list-item" data-contact="{{ Auth::user()->id }}">
        <tr data-action="0">
           
            <td>
            <div class="saved-messages avatar av-m">
                <span class="far fa-bookmark"></span>
            </div>
            </td>
        
            <td>
                <p data-id="{{ Auth::user()->id }}" data-type="user">Pesan yang disimpan <span>You</span></p>
                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif --}}

{{-- -------------------- Contact list -------------------- --}}
@if($get == 'users' && !!$lastMessage)
<?php
$lastMessageBody = mb_convert_encoding($lastMessage->body, 'UTF-8', 'UTF-8');
$lastMessageBody = strlen($lastMessageBody) > 30 ? mb_substr($lastMessageBody, 0, 30, 'UTF-8').'..' : $lastMessageBody;
?>
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr class="teer" data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
        @if($user->foto == null)
            <div class="avatar av-m"
            style="background-image: url('/images/default.jpg');">
            </div>
        @else
            <div class="avatar av-m"
            style="background-image: url('/storage/{{ $user->foto }}');">
            </div>
        @endif
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $user->id }}" data-type="user">
            <small class="d-flex flex-row position-relative">
                {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
                @if($user->isSuperUser == "yes")
                    <i class=" ms-1 text-primary fa-regular fa-circle-check"></i>
                @endif
                <span class="contact-item-time position-absolute  end-0" style="right:0%;" data-time="{{$lastMessage->created_at}}">{{ \Carbon\Carbon::parse($lastMessage->created_at)->locale('id_ID')->diffForHumans() }}</span>
            </small>
            <span class="seenStatus mt-1"> {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}</span>
        </p>
        <span>
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->id
                ? '<span class="lastMessageIndicator">Anda :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            @if($lastMessage->attachment == null)
            {!!
                $lastMessageBody
            !!}
            @else
            <span class="fas fa-file"></span> File 
            @endif
        </span>
        {{-- New messages counter --}}
            
        </td>
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->id }}">
    <tr class="teer" data-action="0">
        {{-- Avatar side --}}
        <td>
            @if($user->foto == null)
            <div class="avatar av-m"
            style="background-image: url('/images/default.jpg');">
            </div>
        @else
            <div class="avatar av-m"
            style="background-image: url('/storage/{{ $user->foto }}');">
            </div>
        @endif
        </td>
        {{-- center side --}}
        <td>
            <p data-id="{{ $user->id }}" data-type="user">
                <small>
                    {{ strlen($user->name) > 12 ? trim(substr($user->name,0,12)).'..' : $user->name }}
                    @if($user->isSuperUser == "yes")
                        <i class="text-primary fa-regular fa-circle-check"></i>
                    @endif
                </small>
            </p>
        </td>

    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{$image}}')"></div>
@endif


