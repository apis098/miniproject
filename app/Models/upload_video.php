<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class upload_video extends Model
{
    use HasFactory;
    protected $table = "upload_videos";
    protected $fillable = [
        "users_id",
        "deskripsi_video",
        "upload_video",
        'isPremium',
        'uuid',
        'favorite_count',
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
    public function favorite()
    {
        return $this->hasMany(favorite::class,'feed_id');
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
    public function checkLikeFeed(string $id) {
        return like_veed::where('users_id', $id)
        ->where('veed_id', $this->id)
        ->exists();
    }
    
}
