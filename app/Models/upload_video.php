<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class upload_video extends Model
{
    use HasFactory;
    protected $table = "upload_videos";
    protected $fillable = [
        "users_id",
        "deskripsi_video",
        "upload_video",
        'isPremium'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "users_id");
    }
    public function comment_veed()
    {
        return $this->hasMany(comment_veed::class, "veed_id");
    }
    public function reply_comment_veed()
    {
        return $this->hasMany(reply_comment_veed::class);
    }
    public function like_veed()
    {
        return $this->hasMany(like_veed::class, "veed_id");
    }
    public function like_comment_veed() 
    {
        return $this->hasMany(like_comment_veed::class);
    }
    public function like_reply_comment_veed()
    {
        return $this->hasMany(like_reply_comment_veed::class);
    }
}
