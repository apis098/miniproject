<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class replyComplaint extends Model
{
    use HasFactory;
    protected $fillable = ['reply_id', 'user_id', 'reply','likes','user_id_sender'];

    public function comment()
    {
        return $this->belongsTo(Reply::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function userSender()
    {
        return $this->belongsTo(User::class,'user_id_sender');
    }
    public function likes_reply()
    {
        return $this->hasMany(like_reply::class);
    }
    public function notifications()
    {
        return $this->hasMany(notifications::class);
    }
    public function tag_comment() {
        return $this->hasMany(tagReplyComments::class);
    }

}
