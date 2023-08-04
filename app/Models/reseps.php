<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reseps extends Model
{
    use HasFactory;
    protected $table = 'reseps';
    protected $fillable = [
        'userkoki_id',
        'tipsdasar_id',
        'seputardapur_id',
        'specialday_id',
        'nama_masakan',
        'foto_masakan',
        'deskripsi_masakan',
        'bahan_masakan',
        'langkah2_memasak'
    ];
    public function user() {
        return $this->belongsTo(User::class, 'userkoki_id');
    }
    public function tipsdasar() {
        return $this->belongsTo(kategori_tipsdasar::class, 'tipsdasar_id');
    }
    public function seputardapur() {
        return $this->belongsTo(kategori_seputardapur::class, 'seputardapur_id');
    }
    public function specialday() {
        return $this->belongsTo(special_days::class, 'specialday_id');
    }
    public function kategori_bahan() {
        return $this->belongsToMany(kategori_bahan::class, 'pivot');
    }
}
