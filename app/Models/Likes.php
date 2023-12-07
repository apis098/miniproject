<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likes extends Model
{
    use HasFactory;
    protected $fillable = ['reply_id', 'user_id','resep_id',];

    public function complaint()
    {
        return $this->belongsTo(Complaint::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function resep()
    {
        return $this->belongsTo(Reseps::class, "resep_id");
    }
}
