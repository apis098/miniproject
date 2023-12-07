<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    use HasFactory;
    protected $fillable = [
        'ulasan_id',
        'data_koki_id',
        'verifed_id',
        'penarikan_id',
        'gift_id',
        'top_up_id',
        'message',
        'route',
        'share_id',
        'veed_id',
        'like_comment_recipes_id',
        'categories',
        'like_reply_comment_recipes_id',
        'comment_id',
        'reply_comment_id',
        'reply_id_comment',
        'like_reply_id',
        'user_id',
        'follower_id',
        'like_id',
        'complaint_id',
        'veed_id_report',
        'notification_from',
        'alasan',
        'reply_id',
        'status',
        'reply_id_report',
        'complaint_id_report',
        'resep_id'
    ];
    public function ulasan() {
        return $this->belongsTo(UlasanKursus::class, 'ulasan_id');
    }
    public function kursus() {
        return $this->belongsTo(Kursus::class, 'kursus_id');
    }
    public function verifed() {
        return $this->belongsTo(User::class, 'verifed_id');
    }
    public function data_koki() {
        return $this->belongsTo(DataPribadiKoki::class, 'data_koki_id');
    }
    public function penarikan()
    {
        return $this->belongsTo(Penarikans::class, "penarikan_id");
    }
    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
    public function likes()
    {
        return $this->belongsTo(Likes::class);
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
        return $this->belongsTo(Followers::class);
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
        return $this->belongsTo(Reseps::class);
    }
    public function veed()
    {
        return $this->belongsTo(UploadVideo::class,'veed_id');
    }
}
