<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class special_days extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description'];
    public function resep() {
        return $this->hasMany(reseps::class, 'specialday_id');
    }
}
