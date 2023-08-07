<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_bahan extends Model
{
    use HasFactory;
    protected $table = 'kategori_bahans';
    protected $fillable = [
        'kategori_bahan',
        'foto'
    ];
    public function resep() {
        return $this->belongsToMany(reseps::class, 'pivot');
    }
}
