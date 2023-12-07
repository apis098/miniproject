<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeFeed extends Model
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
        return $this->belongsTo(UploadVideo::class, "veed_id");
    }
}
