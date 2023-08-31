<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class footer extends Model
{
    use HasFactory;
    protected $table="footers";
    protected $fillable=[
    'facebook',
    'youtube',
    'twitter',
    'instagram',
    'kontak',
    'telegram',
    'email',
    'lokasi'
    ];
}
