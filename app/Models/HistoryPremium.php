<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryPremium extends Model
{
    use HasFactory;
    protected $table = 'history_premiums';
    protected $fillable = [
        "users_id",
        "premiums_id",
        "reference",
        "merchant_ref",
        "total_amount",
        "status"
    ];
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function premium() {
        return $this->belongsTo(Premiums::class, 'premiums_id');
    }
}
