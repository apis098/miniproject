<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_makanan extends Model
{
    use HasFactory;
    protected $table ="kategori_makanans";
    protected $fillable =[
        'nama_makanan'
    ];
}