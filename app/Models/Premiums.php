<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Premiums extends Model
{
    use HasFactory;
    protected $table = "premiums";
    protected $fillable = [
        "nama_paket",
        "harga_paket",
        "durasi_paket"
    ];
    public function user_premiums() {
        return $this->hasMany(HistoryPremium::class, 'premiums_id');
    }
    public function fitur_premiums() {
        return $this->hasMany(FiturPremiums::class, 'premiums_id');
    }
    public function detail_premium() {
        return $this->hasMany(DetailPremiums::class, "premium_id");
    }
}
