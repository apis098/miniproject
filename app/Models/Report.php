<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = ['complaint_id', 'user_id','reply_id','user_id_sender','description','profile_id','comment_id','reply_comment_id'];

    public function complaint()
    {
        return $this->belongsTo(complaint::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resep(){
        return $this->belongsTo(reseps::class);
    }
    public function userSender()
{
    return $this->belongsTo(User::class, 'user_id_sender');
}
    public function replies()
    {
        return $this->belongsTo(Reply::class,'reply_id');
    }
    public function reply_complaint()
    {
        return $this->belongsTo(replyComplaint::class,'reply_id_complaint');
    }
}
