<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_tipsdasar extends Model
{
    use HasFactory;
    protected $table = 'kategori_tipsdasars';
    protected $fillable = [
        'nama_kategori'
    ];
}