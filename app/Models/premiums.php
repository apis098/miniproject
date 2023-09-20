<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class premiums extends Model
{
    use HasFactory;
    protected $table = "premiums";
    protected $fillable = [
        "name_premium",
        "price_premium",
        "information_premium",
        "timeInDays_premium"
    ];
    public function user_premiums() {
        return $this->hasMany(history_premiums::class, 'premiums_id');
    }
}
