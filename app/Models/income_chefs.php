<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income_chefs extends Model
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
    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function feed()
    {
        return $this->belongsTo(upload_video::class, "feed_id");
    }
    public function resep()
    {
        return $this->belongsTo(reseps::class, "resep_id");
    }
    public function course()
    {
        return $this->belongsTo(kursus::class, "course_id");
    }
}
