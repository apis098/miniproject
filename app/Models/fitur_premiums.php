<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fitur_premiums extends Model
{
    use HasFactory;
    protected $table = 'fitur_premiums';
    protected $fillable = [
        'premiums_id',
        'detail_fitur_premiums'
    ];
    public function premiums() {
        return $this->belongsTo(premiums::class, 'premiums_id');
    }
}
