<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment_veed extends Model
{
    use HasFactory;
    protected $table = "comment_veeds";
    protected $fillable = [
        "pengirim_id",
        "penerima_id",
        "veed_id",
        "komentar"
    ];
    public function user_pengirim()
    {
        return $this->belongsTo(User::class, "pengirim_id");
    }
    public function user_penerima()
    {
        return $this->belongsTo(User::class, "penerima_id");
    }
    public function veed()
    {
        return $this->belongsTo(upload_video::class, "veed_id");
    }
    public function reply_comment_veed()
    {
        return $this->hasMany(reply_comment_veed::class, "comment_id");
    }
    public function like_comment_veed() {
        return $this->hasMany(like_comment_veed::class);
    }
}
