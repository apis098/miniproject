<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReplyCommentRecipes extends Model
{
    use HasFactory;
    protected $table = "like_reply_comment_recipes";
    protected $fillable = [
        "users_id",
        "recipe_id",
        "comment_id"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function recipe() {
        return $this->belongsTo(reseps::class, "recipe_id");
    }
    public function comment() {
        return $this->belongsTo(replyCommentRecipe::class, "comment_id");
    }
}
