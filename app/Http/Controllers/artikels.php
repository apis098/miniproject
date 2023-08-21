<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use App\Models\reseps;
use App\Models\seputar_dapur;
use App\Models\special_days;
use Illuminate\Http\Request;

class artikels extends Controller
{
    public function artikel_resep(string $id, string $judul)
    {
        $show_resep = reseps::find($id);
        return view('template.artikel', compact('show_resep'));
    }
}
