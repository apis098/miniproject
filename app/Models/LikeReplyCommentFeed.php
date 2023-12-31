<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReplyCommentFeed extends Model
{
    use HasFactory;
    protected $table = "like_reply_comment_veeds";
    protected $fillable = [
        "users_id",
        "reply_comment_veed_id",
        "veed_id"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function reply_comment_veed() {
        return $this->belongsTo(ReplyCommentFeed::class, "reply_comment_veed_id");
    }
    public function veed() {
        return $this->belongsTo(UploadVideo::class, "veed_id");
    }
}
