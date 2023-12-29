<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tokens extends Model
{
    use HasFactory;
    protected $table = "tokens";
    protected $fillable = [
        'user_id',
        'token',
        'expired_time'
    ];
    public function User() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
