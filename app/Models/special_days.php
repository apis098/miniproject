<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class special_days extends Model
{
    use HasFactory;
    protected $table = "special_days";
    protected $fillable = [
        'nama'
    ];
    public function resep() {
        return $this->belongsToMany(reseps::class, "hari_reseps", "hari_khusus_id")->withTimestamps();
    }
}
