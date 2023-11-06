<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class balasKomentar extends Model
{
    use HasFactory;
    protected $table = "reply_comments";
    protected $fillable = [
        "recipe_id",
        "complaint_id",
        "comment_recipe_id",
        "comment_complaint_id",
        "sender_comment_id",
        "recipient_comment_id",
        "parent_id",
        "comment",
        "status_reply"
    ];
    public function recipe() {
        return $this->belongsTo(reseps::class, "recipe_id");
    }
    public function complaint() {
        return $this->belongsTo(complaint::class, "complaint_id");
    }
    public function comment_recipe() {
        return $this->belongsTo(replyCommentRecipe::class, "comment_recipe_id");
    }
    public function comment_complaint() {
        return $this->belongsTo(replyComplaint::class, "comment_complaint_id");
    }
    public function sender_comment() {
        return $this->belongsTo(User::class, "sender_comment_id");
    }
    public function recipient_comment() {
        return $this->belongsTo(User::class, "recipient_comment_id");
    }
}
