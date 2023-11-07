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
        "tanggal_dimulai_kursus",
        "tanggal_berakhir_kursus",
        "rating",
        "rating_asli",
        "jumlah_favorite"
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
        $time = sessionCourses::where('course_id', $this->id)->sum('lama_sesi');

        if ($time >= 60) {
            $hasil = number_format($time/60, 1) .  " jam";
        } else {
            $hasil = $time . " menit";
        }
        return $hasil;
    }
    public function favorite()
    {
        return $this->hasMany(favorite::class, 'kursus_id');
    }
    public function report() {
        return $this->hasMany(Report::class, 'course_id');
    }
}

