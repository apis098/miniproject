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
        "lokasi_kursus",
        "tarif_per_jam",
        "jumlah_pelajaran",
        "tipe_kursus",
        "lama_kursus",
        "status"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
}
