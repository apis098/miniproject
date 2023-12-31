<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeBalasReplyCommentFeeds extends Model
{
    use HasFactory;
    protected $table = "like_balas_replies_comments_feeds";
    protected $fillable = [
        "user_id",
        "reply_comment_feed_id",
        "feed_id",
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function reply_comment_feed()
    {
        return $this->belongsTo(ReplyCommentFeed::class, "reply_comment_feed_id");
    }
}
