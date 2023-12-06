<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolsCooks extends Model
{
    use HasFactory;
    protected $table = "tools_cooks";
    protected $fillable = [
        "recipes_id",
        "nama_alat"
    ];
    public function recipe() {
        return $this->belongsTo(reseps::class, "recipes_id");
    }
}
