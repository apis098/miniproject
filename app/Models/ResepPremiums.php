<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResepPremiums extends Model
{
    use HasFactory;
    protected $table = "resep_premiums";
    protected $fillable = [
        "users_id",
        "bulan",
        "reference", 
        "merchant_ref",
        "total_amount",
        "status"
    ];
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
    
}
