<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class basic_tips extends Model
{
    use HasFactory;
    protected $table ='basic_tips';
    protected $fillable = [
     'kategori_id',
     'userkoki_id',
     'judul',
     'foto',
     'deskripsi'
    ];
     public function user(){
        return $this->belongsTo(User::class,'userkoki_id');
     }
     public function kategori_tipsdasar(){
        return $this->belongsTo(kategori_tipsdasar::class,'kategori_id');
     }
}
