<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_recipes extends Model
{
    use HasFactory;
    protected $table = "comment_recipes";
    protected $fillable = [
        "pengirim_id",
        "penerima_id",
        "recipes_id",
        "comment",
        'like',
    ];
    public function like()
    {
        return $this->hasMany(like_comment_recipes::class,'comment_id');
    }
    public function user_pengirim(){
        return $this->belongsTo(User::class,'pengirim_id');
    }
    public function user_penerima(){
        return $this->belongsTo(User::class, "penerima_id");
    }
    public function reply_comment_recipe() {
        return $this->hasMany(replyCommentRecipe::class,'comment_id');
    }
}
