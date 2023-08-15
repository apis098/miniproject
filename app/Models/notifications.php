<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'follower_id','like_id','complaint_id','notification_from','reply_id'];

    public function complaint()
    {
        return $this->belongsTo(complaint::class);
    }
    public function likes()
    {
        return $this->belongsTo(likes::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function sender()
    {
        return $this->belongsTo(User::class,'notification_from');
    }
    public function followers()
    {
        return $this->belongsTo(followers::class);
    }
    public function reply()
    {
        return $this->belongsTo(Reply::class);
    }
}
