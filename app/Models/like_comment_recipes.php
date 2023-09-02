<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like_comment_recipes extends Model
{
    use HasFactory;
    protected $table = "like_comment_recipes";
    protected $fillable = [
        "users_id",
        "comment_id"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function comment() {
        return $this->belongsTo(comment_recipes::class, "comment_id");
    }
}
