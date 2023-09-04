<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReplyCommentRecipes extends Model
{
    use HasFactory;
    protected $table = "LikeReplyCommentRecipes";
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
        return $this->belongsTo(comment_recipes::class, "comment_id");
    }
}
