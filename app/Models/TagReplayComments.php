<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagReplayComments extends Model
{
    use HasFactory;
    protected $table = "tag_reply_comments";
    protected $fillable = [
        "reply_comment_id",
        "recipe_id",
        "user_id",
        "tag", 
        "isi"
    ];
    public function reply_comment() {
        return $this->belongsTo(replyComplaint::class, "reply_comment_id");
    }
    public function recipe() {
        return $this->belongsTo(reseps::class, "recipe_id");
    }
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
}
