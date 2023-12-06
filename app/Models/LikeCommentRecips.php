<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeCommentRecips extends Model
{
    use HasFactory;
    protected $table = "like_comment_recipes";
    protected $fillable = [
        "users_id",
        "comment_id",
        "recipe_id"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function comment() {
        return $this->belongsTo(comment_recipes::class, "comment_id");
    }
    public function resep() {
        return $this->belongsTo(reseps::class, "recipe_id");
    }
}
