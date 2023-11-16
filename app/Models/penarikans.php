<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penarikans extends Model
{
    use HasFactory;
    protected $table = "penarikans";
    protected $fillable = [
        "chef_id",
        "data_id",
        "nilai"
    ];
    public function chef() {
        return $this->belongsTo(User::class, "chef_id");
    }
    public function data() {
        return $this->belongsTo(dataPribadiKoki::class, "data_id");
    }
}
