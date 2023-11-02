<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sessionCourses extends Model
{
    use HasFactory;
    protected $table = "session_courses";
    protected $fillable = [
        "course_id",
        "judul_sesi",
        "lama_sesi",
        "informasi_lama_sesi",
        "harga_sesi",
        "tanggal",
        "waktu"
    ];
    public function kursus()
    {
        return $this->belongsTo(kursus::class, "course_id");
    }
    public function detail_sesi()
    {
        return $this->hasMany(detailSessionCourses::class, "session_course_id");
    }
    public function DetailSesiDibeli()
    {
        return $this->hasMany(DetailSesiDibeli::class, "sesi_kursus_id");
    }
}
