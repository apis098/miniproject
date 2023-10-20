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
        "status",
        "pemasukan"
    ];
    public function chef()
    {
        return $this->belongsTo(User::class, 'chef_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
