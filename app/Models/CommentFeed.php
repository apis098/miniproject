<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentFeed extends Model
{
    use HasFactory;
    protected $table = "comment_veeds";
    protected $fillable = [
        "pengirim_id",
        "penerima_id",
        "veed_id",
        "komentar"
    ];
    public function user_pengirim()
    {
        return $this->belongsTo(User::class, "pengirim_id");
    }
    public function user_penerima()
    {
        return $this->belongsTo(User::class, "penerima_id");
    }
    public function veed()
    {
        return $this->belongsTo(UploadVideo::class, "veed_id");
    }
    public function reply_comment_veed()
    {
        return $this->hasMany(ReplyCommentFeed::class, "comment_id");
    }
    public function like_comment_veed() {
        return $this->hasMany(LikeCommentFeed::class);
    }
    public function count_replies(){
        $replyCount = ReplyCommentFeed::where('comment_id',$this->id)->count();
        $data_replies_reply = ReplyCommentFeed::where('comment_id',$this->id)->first();
        $replies_reply_count = 0 ;
        if($data_replies_reply != null && $data_replies_reply->balasRepliesCommentsFeeds->count() > 0){
            $replies_reply_count = $data_replies_reply->balasRepliesCommentsFeeds->count();
        }
        return $replyCount + $replies_reply_count;
    }
    public function likeCommentVeed($user_id)
    {
        return LikeCommentFeed::where('users_id',$user_id)
        ->where('comment_veed_id',$this->id)
        ->exists();
    }
}
