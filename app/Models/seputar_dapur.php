<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class seputar_dapur extends Model
{
    use HasFactory;
    protected $table='seputar_dapurs';
    protected $fillable=[
        'kategori_id',
        'userkoki_id',
        'judul',
        'foto',
        'isi'
    ];
    public function kategori_seputardapur(){
        return $this->belongsTo(kategori_seputardapur::class, 'kategori_id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'userkoki_id');
    }
}
