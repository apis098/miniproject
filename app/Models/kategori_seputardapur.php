<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kategori_seputardapur extends Model
{
    use HasFactory;
    protected $table='kategori_seputardapurs';
    protected $fillable=[
      'nama_kategori'
    ];
    public function seputar_dapur(){
        return $this->hasMany(seputar_dapur::class);
    }
}
