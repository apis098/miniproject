<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class special_days extends Model
{
    use HasFactory;
    protected $table = "special_days";
    protected $fillable = [
        'reseps_id',
        'nama'
    ];
    public function resep() {
        return $this->belongsTo(reseps::class, "reseps_id");
    }
}
