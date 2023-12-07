<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penarikans extends Model
{
    use HasFactory;
    protected $table = "penarikans";
    protected $fillable = [
        "chef_id",
        "data_id",
        "nilai" ,
        'status'
    ];
    public function chef() {
        return $this->belongsTo(User::class, "chef_id");
    }
    public function data() {
        return $this->belongsTo(DataPribadiKoki::class, "data_id");
    }
    public function notification()
    {
        return $this->hasMany(Notifications::class, "penarikan_id");
    }
}
