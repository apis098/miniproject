<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriMakanan extends Model
{
    use HasFactory;
    protected $table ="kategori_makanans";
    protected $fillable =[
        'nama_makanan'
    ];
    public function resep() {
        return $this->belongsToMany(Reseps::class, "kategori_reseps", "kategori_reseps_id")->withTimestamps();
    }
}
