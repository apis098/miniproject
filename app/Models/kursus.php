<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kursus extends Model
{
    use HasFactory;
    protected $table = "kursuses";
    protected $fillable = [
        "users_id",
        "nama_kursus",
        "foto_kursus",
        "deskripsi_kursus",
        "nama_lokasi",
        "latitude",
        "longitude",
        "tipe_kursus",
        "jumlah_siswa",
        "status",
        "waktu_diterima"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function jenis_kursus() {
        return $this->hasMany(jenis_kursuses::class, 'id_kursus');
    }
    public function sesi()
    {
        return $this->hasMany(sessionCourses::class, "course_id");
    }
}
