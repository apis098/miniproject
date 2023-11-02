<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $fillable = ['resep_id','feed_id', 'kursus_id','user_id', 'user_id_from',];
    public function resep()
    {
        return $this->belongsTo(reseps::class, 'resep_id');
    }
    public function veed()
    {
        return $this->belongsTo(upload_video::class,'feed_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, "user_id");
    }
    public function sender()
    {
        return $this->belongsTo(User::class, "user_id_from");
    }
    public function kursus()
    {
        return $this->belongsTo(kursus::class, "kursus_id");
    }
}
