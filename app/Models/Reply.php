<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = ['complaint_id', 'user_id', 'reply'];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
    // public function userSender(){

    // }
    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
    public function likes()
    {
        return $this->hasMany(Likes::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(ReplyComplaint::class);
    }
}
