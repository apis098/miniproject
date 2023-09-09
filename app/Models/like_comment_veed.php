<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class like_comment_veed extends Model
{
    use HasFactory;
    protected $table = "like_comment_veeds";
    protected $fillable = [
        "users_id",
        "comment_veed_id",
        "veed_id"
    ];
    public function user() {
        return $this->belongsTo(User::class, "users_id");
    }
    public function comment_veed() {
        return $this->belongsTo(comment_veed::class, "comment_veed_id");
    }
    public function veed() {
        return $this->belongsTo(upload_video::class, "veed_id");
    }
}
