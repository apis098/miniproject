<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKursus extends Model
{
    use HasFactory;
    protected $table = "transaksi_kursuses";
    protected $fillable = [
        "course_id",
        "chef_id",
        "user_id",
        "status_transaksi",
        "tanggal_status_transaksi",
        "harga",
    ];
    public function course() {
        return $this->belongsTo(kursus::class, "course_id");
    }
    public function chef() {
        return $this->belongsTo(User::class, "chef_id");
    }
    public function user() {
        return $this->belongsTo(User::class, "user_id");
    }
    public function DetailSesiDibeli()
    {
        return $this->hasMany(DetailSesiDibeli::class, "transaksi_kursus_id");
    }
}
