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
}
