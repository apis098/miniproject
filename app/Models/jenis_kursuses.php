<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenis_kursuses extends Model
{
    use HasFactory;
    protected $table = 'jenis_kursuses';
    protected $fillable = [
        'id_kursus',
        "jenis_kursus"
    ];
    public function kursus() {
        $this->belongsTo(kursus::class, 'id_kursus');
    }
}
