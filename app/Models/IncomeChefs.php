<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IncomeChefs extends Model
{
    use HasFactory;
    protected $table = "income_chefs";
    protected $fillable = [
        "chef_id",
        "user_id",
        "feed_id",
        "resep_id",
        "course_id",
        "status",
        "pemasukan",
        "status_penarikan"
    ];
    public function messageGift() {
        $notify =  Notifications::where('user_id', $this->chef_id)
        ->where('notification_from', $this->user_id)
        ->where('created_at', $this->created_at)
        ->first();
        return $notify->message;
    }
    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }
    public function notifications(){
        return $this->hasMany(Notifications::class,'gift_id');
    }
    // public function message_gift(){
    //     $notification = notifications::where('user_id', auth()->user()->id)
    //         ->where('route','/koki/income-koki')
    //         ->where('categories','gift')
    //         ->where('notification_from',$this->user_id)
    //         ->where('message',"!=",null)
    //         ->get();
    //         return $notification->message;

    // }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function feed()
    {
        return $this->belongsTo(UploadVideo::class, "feed_id");
    }
    public function resep()
    {
        return $this->belongsTo(Reseps::class, "resep_id");
    }
    public function course()
    {
        return $this->belongsTo(Kursus::class, "course_id");
    }
}
