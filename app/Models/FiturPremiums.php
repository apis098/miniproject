<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FiturPremiums extends Model
{
    use HasFactory;
    protected $table = 'fitur_premiums';
    protected $fillable = [
        'premiums_id',
        'detail_fitur_premiums'
    ];
    public function premiums() {
        return $this->belongsTo(Premiums::class, 'premiums_id');
    }
}
