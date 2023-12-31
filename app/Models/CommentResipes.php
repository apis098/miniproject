<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentResipes extends Model
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
        return $this->hasMany(LikeCommentRecips::class,'comment_id');
    }
    public function user_pengirim(){
        return $this->belongsTo(User::class,'pengirim_id');
    }
    public function user_penerima(){
        return $this->belongsTo(User::class, "penerima_id");
    }
    public function reply_comment_recipe() {
        return $this->hasMany(ReplyCommentRecipe::class,'comment_id');
    }
    public function replies_count(){
        return ReplyCommentRecipe::where('comment_id',$this->id)->where('recipe_id',$this->recipes_id)->count();
    }
}
