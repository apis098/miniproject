<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paket_kursuses extends Model
{
    use HasFactory;
    protected $table = "paket_kursuses";
    protected $fillable = [
        "kursus_id",
        "waktu",
        "harga"
    ];
    public function kursus() {
        return $this->belongsTo(kursus::class, "kursus_id");
    }
}
