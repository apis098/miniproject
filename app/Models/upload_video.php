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
        "judul_video",
        "deskripsi_video",
        "upload_video"
    ];
    public function user()
    {
        return $this->belongsTo(User::class, "users_id");
    }
}
