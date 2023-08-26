<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_reseps extends Model
{
    use HasFactory;
    protected $table = "kategori_reseps";
    protected $fillable = [
        "reseps_id",
        "kategori_reseps_id"
    ];
    public function resep() {
        return $this->belongsTo(resep::class, "reseps_id");
    }
    public function kategori_resep() {
        return $this->belongsTo(kategori_makanan::class, "kategori_reseps_id");
    }
}
