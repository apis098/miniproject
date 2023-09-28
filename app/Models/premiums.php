<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class premiums extends Model
{
    use HasFactory;
    protected $table = "premiums";
    protected $fillable = [
        "nama_paket",
        "harga_paket",
        "durasi_paket"
    ];
    public function user_premiums() {
        return $this->hasMany(history_premiums::class, 'premiums_id');
    }
    public function fitur_premiums() {
        return $this->hasMany(fitur_premiums::class, 'premiums_id');
    }
    public function detail_premium() {
        return $this->hasMany(detail_premiums::class, "premium_id");
    }
}
