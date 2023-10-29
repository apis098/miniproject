<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RatingKursus extends Model
{
    use HasFactory;
    protected $table = "rating_kursuses";
    protected $fillable = [
        "course_id", 
        "user_id",
        "rating",
    ];
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
    public function course() {
        return $this->hasMany(kursus::class,"course_id");
    }
}
