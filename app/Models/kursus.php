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
        "waktu_diterima",
        "tanggal_dimulai_kursus"
    ];
    public function income_chef()
    {
        return $this->hasMany(income_chefs::class, "course_id");
    }
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
    public function transaksi() {
        return $this->hasMany(TransaksiKursus::class, "course_id");
    }
    public function IsBuy(int $id) {
        return TransaksiKursus::where('user_id', $id)->where('course_id', $this->id)->where('status_transaksi', 'diterima')->exists();
    }

    public function ulasan() {
        return $this->hasMany(UlasanKursus::class, "course_id");
    }

    public function jumlah_sesi()
    {
        return sessionCourses::where('course_id', $this->id)->count();
    }
    public function total_ulasan()
    {
        return UlasanKursus::where('course_id', $this->id)->count();
    }
    public function total_murid()
    {
        return TransaksiKursus::where('course_id', $this->id)->where('status_transaksi', 'diterima')->count();
    }
    public function total_rating()
    {
        return UlasanKursus::where('course_id', $this->id)->where('rating', '!=', 'null')->count();
    }
    public function rate()
    {
        $rate = UlasanKursus::where('course_id', $this->id)->sum('rating');
        $jumlah_rate = UlasanKursus::where('course_id', $this->id)->where('rating', '!=', 'null')->count();
        if($rate <= 0) {
            return 0;
        } else {
            $hasil = $rate / $jumlah_rate;
            return $hasil;
        }
    }
    public function total_waktu_sesi()
    {
        $minute = sessionCourses::where('course_id', $this->id)->where('informasi_lama_sesi', 'menit')->sum('lama_sesi');
        $hours = sessionCourses::where('course_id', $this->id)->where('informasi_lama_sesi', 'jam')->sum('lama_sesi');
        $jam = $hours * 60;
        $total = $minute + $jam;
        if ($total >= 60) {
            $hasil = number_format($total/60, 1) .  " jam";
        } else {
            $hasil = $total . " menit";
        }
        return $hasil;
    }
}
