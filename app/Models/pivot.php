<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pivot extends Model
{
    use HasFactory;
    protected $table = 'pivot';
    protected $fillable = [
        'kategori_bahan_id',
        'reseps_id'
    ];
}
