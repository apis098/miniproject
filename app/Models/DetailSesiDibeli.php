<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSesiDibeli extends Model
{
    use HasFactory;
    protected $table = 'detail_sesi_dibeli';
    protected $fillable = [
        "transaksi_kursus_id",
        "sesi_kursus_id"
    ];
    public function transaksi_kursus()
    {
        return $this->belongsTo(TransaksiKursus::class, 'transaksi_kursus_id');
    }
    public function sesi_kursus()
    {
        return $this->belongsTo(sessionCourses::class, 'sesi_kursus_id');
    }
}
