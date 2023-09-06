<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_recipes extends Model
{
    use HasFactory;
    protected $table = "comment_recipes";
    protected $fillable = [
        "users_id",
        "recipes_id",
        "comment",
        'like',
    ];
    public function like() 
    {
        return $this->hasMany(like_comment_recipes::class,'comment_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'users_id');
    }
    public function reply_comment_recipe() {
        return $this->hasMany(replyCommentRecipe::class,'comment_id');
    }
}
