<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionsCourses extends Model
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
        return $this->belongsTo(Kursus::class, "course_id");
    }
    public function detail_sesi()
    {
        return $this->hasMany(DetailSessionCourses::class, "session_course_id");
    }
    public function DetailSesiDibeli()
    {
        return $this->hasMany(DetailSesiDibeli::class, "sesi_kursus_id");
    }
    public function selisihTanggal()
    {
        $timenow = Carbon::now();
        // format tanggal dan waktu
        $tanggal = Carbon::parse($this->tanggal);
        $waktu = Carbon::parse($this->waktu);
        $tanggalWaktu = $tanggal->setTime($waktu->hour, $waktu->minute);
        if ($timenow >= $tanggalWaktu) {
            return "Kadaluarsa";
        } else {
        return "Belum Kadaluarsa";
        }
    }
}
