<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Share extends Model
{
    use HasFactory;
    protected $table = "shares";
    protected $fillable = [
        "user_id",
        "sender_id",
        "feed_id",
        "resep_id",
        "keluhan_id"
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
    public function sender(){
        return $this->belongsTo(User::class,'sender_id');
    }
    public function feed(){
        return $this->belongsTo(upload_video::class,'feed_id');
    }
    public function recipes(){
        return $this->belongsTo(reseps::class,'resep_id');
    }
    public function complaint(){
        return $this->belongsTo(complaint::class,'keluhan_id');
    }
}
