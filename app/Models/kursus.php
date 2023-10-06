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
        "tarif_per_jam",
        "tipe_kursus",
        "jumlah_siswa",
        "status",
        "waktu_diterima"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function paket_kursus() {
        return $this->hasMany(paket_kursuses::class, "kursus_id");
    }
    public function jenis_kursus() {
        return $this->hasOne(jenis_kursuses::class, 'id_kursus');
    }
}
