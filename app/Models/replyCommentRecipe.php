<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replyCommentRecipe extends Model
{
    use HasFactory;
    protected $table = "reply_comment_recipes";
    protected $fillable = [
        "users_id",
        "recipe_id",
        "comment_id",
        "likes",
        "komentar",
        "parent_id"
    ];

    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function recipe() {
        return $this->belongsTo(recipe::class, "recipe_id");
    }
    public function comment() {
        return $this->belongsTo(comment_recipes::class, "comment_id");
    }
    public function like() {
        return $this->hasMany(LikeReplyCommentRecipes::class, "comment_id");
    }
    public function toReply() {
        return $this->belongsTo(User::class, "parent_id");
    }

}
