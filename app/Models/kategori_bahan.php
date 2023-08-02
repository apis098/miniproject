<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_bahan extends Model
{
    use HasFactory;
    protected $table = 'kategori_bahans';
    protected $fillable = [
        'kategori_bahan'
    ];
    public function reseps()
    {
        return $this->belongsToMany(resep::class, 'pivot');
    }

}
