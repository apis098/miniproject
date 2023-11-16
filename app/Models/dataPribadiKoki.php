<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dataPribadiKoki extends Model
{
    use HasFactory;
    protected $table = "data_pribadi_chefs";
    protected $fillable = [
        "chef_id",
        "name",
        "email",
        "number_handphone",
        "alamat",
        "foto_ktp",
        "foto_diri_ktp",
        "pilihan_bank",
        "nomer_rekening"
    ];
    public function chef() {
        return $this->belongsTo(User::class, "chef_id");
    }
    public function penarikan() {
        return $this->hasMany(penarikans::class, "data_id");
    }
}
