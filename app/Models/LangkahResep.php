<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LangkahResep extends Model
{
    use HasFactory;
    protected $table = 'langkah_reseps';
    protected $fillable = [
        'resep_id',
        'foto_langkah',
        'judul_langkah',
        'deskripsi_langkah'
    ];

    public function resep()
    {
        return $this->belongsTo(Reseps::class, 'resep_id');
    }
}
