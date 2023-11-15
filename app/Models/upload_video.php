<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class upload_video extends Model
{
    use HasFactory;
    protected $table = "upload_videos";
    protected $fillable = [
        "users_id",
        "deskripsi_video",
        "upload_video",
        'isPremium',
        'uuid',
        'favorite_count',
    ];
    public function authenticatePrem()
    {
        $feed = upload_video::find($this->id);
        if($feed->isPremium === "yes") {
            if(Auth::check()) {
                if(Auth::user()->id === $feed->user->id) {
                    return 1;
                } elseif (Auth::user()->status_langganan === "sedang berlangganan") {
                    return 2;
                } elseif (Auth::user()->role === "admin") {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 200;
        }
    }
    public function user()
    {
        return $this->belongsTo(User::class, "users_id");
    }
    public function comment_veed()
    {
        return $this->hasMany(comment_veed::class, "veed_id");
    }
    public function reply_comment_veed()
    {
        return $this->hasMany(reply_comment_veed::class);
    }
    public function favorite()
    {
        return $this->hasMany(favorite::class,'feed_id');
    }
    public function like_veed()
    {
        return $this->hasMany(like_veed::class, "veed_id");
    }
    public function share_veed()
    {
        return $this->hasMany(Share::class,'feed_id');
    }
    public function like_comment_veed()
    {
        return $this->hasMany(like_comment_veed::class);
    }
    public function like_reply_comment_veed()
    {
        return $this->hasMany(like_reply_comment_veed::class);
    }
    public function checkLikeFeed(string $id) {
        return like_veed::where('users_id', $id)
        ->where('veed_id', $this->id)
        ->exists();
    }
    public function countLikeFeed()
    {
        return like_veed::where("veed_id", $this->id)->count();
    }
    public function countCommentFeed()
    {
        $comment = comment_veed::where("veed_id", $this->id)->count();
        $reply = reply_comment_veed::where('veed_id',$this->id)->count();
        $data_reply = reply_comment_veed::where('veed_id',$this->id)->first();
        $count_replies_reply = 0 ;
        if($data_reply != null && $data_reply->balasRepliesCommentsFeeds->count() > 0){
            $count_replies_reply = $data_reply->balasRepliesCommentsFeeds->count();
        }
        return $comment + $reply + $count_replies_reply;
    }
    public function countShareFeed()
    {
        return Share::where("feed_id", $this->id)->count();
    }
    public function AuthenticateFeedPremium($id, $feed)
    {
        $user = User::find($id);
        $video = upload_video::find($feed);
        if ($user->role === "admin") {
            return true;
        } else if ($user->role === "koki" && $user->status_langganan === "sedang berlangganan") {
            return true;
        } else if($video->user->id === $id) {
            return true;
        } else {
            return false;
        }
    }
    public function income_chefs()
    {
        return $this->hasMany(income_chefs::class, "feed_id");
    }
    public function incomes(){
        if(Auth::check()){
            return income_chefs::where('feed_id',$this->id)->where('chef_id',auth()->user()->id)->sum('pemasukan');
        }else{
            return false;
        }
    }
    public function like_count()
    {
        return like_veed::where("veed_id", $this->id)->count();
    }
}
