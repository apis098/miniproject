<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TopUpCategories extends Model
{
    use HasFactory;
    protected $table = "top_up_categories";
    protected $fillable = ['name','price','foto'];
}
