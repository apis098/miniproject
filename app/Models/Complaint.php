<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'subject',
        'description',
        'status',
    ];

    // Relasi ke model User (jika menggunakan model User bawaan Laravel)
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function likes()
    {
        return $this->hasMany(likes::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }
    public function notifications()
    {
        return $this->hasMany(Notifications::class);
    }
}
