<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like_veed extends Model
{
    use HasFactory;
    protected $table = "like_veeds";
    protected $fillable = [ 
        "users_id",
        "veed_id"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function veed() {
        return $this->belongsTo(upload_video::class, "veed_id");
    }
}
