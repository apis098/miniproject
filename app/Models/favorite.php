<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class favorite extends Model
{
    use HasFactory;
    protected $fillable = ['resep_id','feed_id', 'user_id', 'user_id_from',];
    public function resep()
    {
        return $this->belongsTo(reseps::class);
    }
    public function veed()
    {
        return $this->belongsTo(upload_video::class,'feed_id');
    }
}
