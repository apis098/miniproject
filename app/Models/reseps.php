<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reseps extends Model
{
    use HasFactory;
    protected $table = 'reseps';
    protected $fillable = [
        'user_id',
        'nama_resep',
        'foto_resep',
        'deskripsi_resep',
        'hari_khusus',
        'porsi_orang',
        'lama_memasak',
        'pengeluaran_memasak',
    ];
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function bahan() {
        return $this->hasMany(bahan_reseps::class, 'resep_id');
    }
    public function langkah() {
        return $this->hasMany(langkah_reseps::class, 'resep_id');
    }
    public function notifications() {
        return $this->hasMany(notifications::class);
    }
    public function likes()
    {
        return $this->hasMany(likes::class,'resep_id');
    }
}
