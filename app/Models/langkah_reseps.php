<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class langkah_reseps extends Model
{
    use HasFactory;
    protected $table = 'langkah_reseps';
    protected $fillable = [
        'resep_id',
        'foto_langkah',
        'deskripsi_langkah'
    ];

    public function resep()
    {
        return $this->belongsTo(reseps::class, 'resep_id');
    }
}
