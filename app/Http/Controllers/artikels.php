<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use App\Models\reseps;
use App\Models\seputar_dapur;
use App\Models\special_days;
use Illuminate\Http\Request;

class artikels extends Controller
{
    public function artikel_resep(string $id)
    {
        $show_resep = reseps::where('id', $id)->first();
        $show_tipsdasar = NULL;
        $show_seputardapur = NULL;
        return view('template.artikel', compact('show_resep', 'show_tipsdasar', 'show_seputardapur'));
    }
    public function artikel_seputardapur(string $id)
    {
        $show_seputardapur = seputar_dapur::find($id);
        $show_resep = NULL;
        $show_tipsdasar = NULL;
        return view('template.artikel', compact('show_seputardapur', 'show_resep', 'show_tipsdasar'));
    }
    public function artikel_tipsdasar(string $id)
    {
        $show_tipsdasar = basic_tips::find($id);
        $show_resep = NULL;
        $show_seputardapur = NULL;
        return view('template.artikel', compact('show_tipsdasar', 'show_resep', 'show_seputardapur'));
    }
}
