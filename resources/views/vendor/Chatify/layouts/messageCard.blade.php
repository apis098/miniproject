<?php
$seenIcon = (!!$seen ? 'check-double' : 'check');
$timeAndSeen = "<span data-time='$created_at' class='message-time'>
        ".($isSender ? "<span class='fas fa-$seenIcon' seen'></span>" : '' )." <span class='time'>$timeAgo</span>
    </span>";
?>

<div class="message-card @if($isSender) mc-sender @endif" data-id="{{ $id }}">
    {{-- Delete Message Button --}}
    @if ($isSender)
        <div class="actions">
            <i class="fas fa-trash delete-btn" data-id="{{ $id }}"></i>
        </div>
    @endif
    {{-- Card --}}
    <div class="message-card-content" style="background-color:{{$isSender ? "#F7941E":"rgba(255, 255, 255, 0.67"}}">
        @if (@$attachment->type != 'image' || $message)
            <div class="message">
                {!! ($message == null && $attachment != null && @$attachment->type != 'file') ? $attachment->title : nl2br($message) !!}
                {!! $timeAndSeen !!}
                {{-- If attachment is a file --}}
                @if(isset($attachment->file))
                    <?php
                    $videoExtensions = ['mp4', 'avi', 'mkv']; 
                    $mp3file = ['mp3'];
                    $fileExtension = pathinfo($attachment->file, PATHINFO_EXTENSION);
                    ?>
                    @if(in_array(strtolower($fileExtension), $videoExtensions))
                        <video class="video" controls width="370" height="210">
                            <source src="/storage/attachments/{{$attachment->file}}" type="video/mp4">
                        </video>
                        <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download @if(!$isSender) text-dark @endif">
                            <span class="fas fa-file"></span> {{$attachment->title}}</a>
                    @elseif(in_array(strtolower($fileExtension), $mp3file))
                      <audio style="margin-left:9%; margin-top:1%;"  controls>
                        <source src="/storage/attachments/{{$attachment->file}}" type="audio/mpeg">
                      </audio>
                      <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download @if(!$isSender) text-dark @endif">
                        <span class="fas fa-file"></span> {{$attachment->title}}</a>
                    @else
                        <a href="{{ route(config('chatify.attachments.download_route_name'), ['fileName'=>$attachment->file]) }}" class="file-download @if(!$isSender) text-dark @endif">
                        <span class="fas fa-file"></span> {{$attachment->title}}</a>
                    @endif
                @endif
            </div>
        @endif
        @if(@$attachment->type == 'image')
        <div class="image-wrapper" style="text-align: {{$isSender ? 'end' : 'start'}}; ">
            <div class="image-file chat-image" style="background-image: url('/storage/attachments/{{$attachment->file}}');">
                <div>{{ $attachment->title }}</div>
            </div>
            <div style="margin-bottom:5px" class=" @if(!$isSender) ms-3 @else me-3 text-light @endif mt-1">
                {!! $timeAndSeen !!}
            </div>
        </div>
        @endif
    </div>
</div>
