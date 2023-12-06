<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeReply extends Model
{
    use HasFactory;
    protected $fillable = ['reply_complaint_id', 'user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
