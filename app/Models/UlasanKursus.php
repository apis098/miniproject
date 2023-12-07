<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanKursus extends Model
{
    use HasFactory;
    protected $table = "ulasan_kursuses";
    protected $fillable = [
        "course_id", "user_id", "chef_id", "ulasan", 'rating', "chef_teacher_id", "parent_id"
    ];
    public function notification() {
        return $this->hasMany(Notifications::class, "ulasan_id");
    }
    public function course() {
        return $this->belongsTo(Kursus::class, "course_id");
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
    public function balasanChef(int $course, int $teacher) {
        return UlasanKursus::where("course_id", $course)->where("chef_teacher_id", $teacher)->where("parent_id", $this->id)->get();
    }
}
