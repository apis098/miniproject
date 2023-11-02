<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailSessionCourses extends Model
{
    use HasFactory;
    protected $table = "detail_session_courses";
    protected $fillable = [
        "session_course_id",
        "detail_sesi",
        "lama_sesi",
        "informasi_lama_sesi",
    ];
    public function sesi_kursus()
    {
        $this->belongsTo(sessionCourses::class, "session_course_id");
    }
}
