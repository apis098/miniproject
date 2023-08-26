<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hari_reseps extends Model
{
    use HasFactory;
    protected $table = "hari_reseps";
    protected $fillable = [
        "reseps_id",
        "hari_khusus_id"
    ];
    public function resep() {
        return $this->belongsTo(reseps::class, "reseps_id");
    }
    public function hari_khusus() {
        return $this->belongsTo(special_days::class, "hari_khusus_id");
    }
}
