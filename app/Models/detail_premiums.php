<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_premiums extends Model
{
    use HasFactory;
    protected $table = "detail_premiums";
    protected $fillable = [
        "premium_id",
        "detail"
    ];
    public function premium() {
        return $this->belongsTo(premiums::class, "premium_id");
    }
}
