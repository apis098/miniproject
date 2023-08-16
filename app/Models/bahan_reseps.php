<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bahan_reseps extends Model
{
    use HasFactory;
    protected $table = 'bahan_reseps';
    protected $fillable = [
        'resep_id',
        'nama_bahan',
        'takaran_bahan'
    ];
    public function resep() {
        return $this->belongsTo(reseps::class, 'resep_id');
    }
}
