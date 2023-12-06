<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyCommentRecipe extends Model
{
    use HasFactory;
    protected $table = "reply_comment_recipes";
    protected $fillable = [
        "recipient_id",
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
    public function recipient() {
        return $this->belongsTo(User::class, "recipient_id");
    }
    public function recipe() {
        return $this->belongsTo(reseps::class, "recipe_id");
    }
    public function comment() {
        return $this->belongsTo(comment_recipes::class, "comment_id");
    }
    public function like() {
        return $this->hasMany(LikeReplyCommentRecipes::class, "comment_id");
    }
}
