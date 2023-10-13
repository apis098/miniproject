<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply_comment_veed extends Model
{
    use HasFactory;
    protected $table = "reply_comment_veeds";
    protected $fillable = [
        "users_id",
        "comment_id",
        "veed_id",
        "komentar"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function comment_veed() {
        return $this->belongsTo(comment_veed::class, "comment_id");
    }
    public function veed() {
        return $this->belongsTo(upload_video::class, "veed_id");
    }
    public function like_reply_comment_veed() {
        return $this->hasMany(like_reply_comment_veed::class);
    }
    public function likeReplyCommentVeed($user_id){
        return like_reply_comment_veed::where('users_id',$user_id)
        ->where('reply_comment_veed_id',$this->id)
        ->exists();
    }
}
