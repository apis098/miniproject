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
}
