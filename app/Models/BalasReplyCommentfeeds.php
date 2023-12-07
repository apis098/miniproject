<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BalasReplyCommentfeeds extends Model
{
    use HasFactory;
    protected $table = "balas_replies_comments_feeds";
    protected $fillable = [
        "pengirim_reply_comment_id",
        "pemilik_reply_comment_id",
        "reply_comment_id",
        "parent_id",
        "komentar"
    ];
    public function likeRepliesReply($user_id){
        return LikeBalasReplyCommentFeeds::where('user_id',$user_id)
        ->where('reply_comment_feed_id',$this->id)
        ->exists();
    }
    public function user_pengirim()
    {
        return $this->belongsTo(User::class, "pengirim_reply_comment_id");
    }
    public function user_pemilik()
    {
        return $this->belongsTo(User::class, "pemilik_reply_comment_id");
    }
    public function reply_comment()
    {
        return $this->belongsTo(ReplyCommentFeed::class, "reply_comment_id");
    }
    public function like_replies_comments_feeds()
    {
        return $this->hasMany(LikeBalasReplyCommentFeeds::class, "reply_comment_id");
    }
    public function isLikeRepliesCommentsFeeds(string $id)
    {
        return LikeBalasReplyCommentFeeds::where("user_id", $id)->where("reply_comment_id", $this->id)->exists();
    }
    public function countLikeRepliesCommentsFeeds(string $id)
    {
        return LikeBalasReplyCommentFeeds::where("user_id", $id)->where("reply_comment_id", $this->id)->count();
    }
}
