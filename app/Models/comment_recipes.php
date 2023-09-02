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
        "comment"
    ];
}
