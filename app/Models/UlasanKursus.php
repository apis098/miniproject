<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanKursus extends Model
{
    use HasFactory;
    protected $table = "ulasan_kursuses";
    protected $fillable = [
        "course_id", "user_id", "chef_id", "ulasan", 'rating', "chef_teacher_id"
    ];
    public function course() {
        return $this->belongsTo(kursus::class, "course_id");
    }
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
    public function chef() {
        return $this->belongsTo(User::class, "chef_id");
    }
    public function chef_teacher() {
        return $this->belongsTo(User::class, "chef_teacher_id");
    }
}
