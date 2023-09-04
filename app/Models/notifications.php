<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class notifications extends Model
{
    use HasFactory;
    protected $fillable = ['like_reply_id','user_id', 'follower_id','like_id','complaint_id','notification_from','alasan','reply_id','status','reply_id_report','complaint_id_report','resep_id'];

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
    public function replyBlocked()
    {
        return $this->belongsTo(Reply::class,'reply_id_report');
    }
    public function resep()
    {
        return $this->belongsTo(reseps::class);
    }
}
