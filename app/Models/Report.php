<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $fillable = [
    'course_id',
    'feed_id',
    'complaint_id',
    'user_id',
    'reply_id',
    'user_id_sender',
    'description',
    'profile_id',
    'comment_id',
    'reply_comment_id',
    'comment_feed_id',
    'reply_comment_feed_id',
    'replies_reply_comment_feed_id',
];  
    public function course() {
        return $this->belongsTo(Kursus::class, 'course_id');
    }
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
    public function comment_feed(){
        return $this->belongsTo(CommentFeed::class,'comment_feed_id');
    }
    public function reply_comment_feed(){
        return $this->belongsTo(ReplyCommentFeed::class,'reply_comment_feed_id');
    }
    public function replies_reply_comment_feed(){
        return $this->belongsTo(BalasReplyCommentfeeds::class,'replies_reply_comment_feed_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resep(){
        return $this->belongsTo(Reseps::class);
    }
    public function userSender()
{
    return $this->belongsTo(User::class, 'user_id_sender');
}
    public function replies()
    {
        return $this->belongsTo(Reply::class,'reply_id');
    }
    public function comment(){
        return $this->belongsTo(CommentResipes::class,'comment_id');
    }
    public function replyComment(){
        return $this->belongsTo(ReplyCommentRecipe::class,'reply_comment_id');
    }
    public function reply_complaint()
    {
        return $this->belongsTo(ReplyComplaint::class,'reply_id_complaint');
    }
    public function feed()
    {
        return $this->belongsTo(UploadVideo::class,'feed_id');
    }
}
