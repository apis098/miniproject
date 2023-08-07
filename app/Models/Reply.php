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
        return $this->belongsTo(complaint::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
