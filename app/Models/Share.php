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
        return $this->belongsTo(UploadVideo::class,'feed_id');
    }
    public function recipes(){
        return $this->belongsTo(Reseps::class,'resep_id');
    }
    public function complaint(){
        return $this->belongsTo(Complaint::class,'keluhan_id');
    }
}
