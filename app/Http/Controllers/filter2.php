<?php

namespace App\Http\Controllers;

use App\Models\kategori_seputardapur;
use App\Models\kategori_tipsdasar;
use App\Models\seputar_dapur;
use Illuminate\Http\Request;

class filter2 extends Controller
{
    public function view_tipsdasar()
    {
       $kategori_td = kategori_tipsdasar::all(); 
       $kategori_tipsdasar = kategori_tipsdasar::all();
       return view('template.tips_dsr', compact('kategori_tipsdasar', 'kategori_td'));
    }
    public function filter_tipsdasar(Request $request)
    {
        $kategori_td = kategori_tipsdasar::all();
        $kategori_tipsdasar = kategori_tipsdasar::where('id', $request->tips)->get();
        return view('template.tips_dsr', compact('kategori_tipsdasar', 'kategori_td'));
    }
    public function view_seputardapur() 
    {
        $kategori_sd = seputar_dapur::all();
        $kategori_seputardapur = seputar_dapur::all();
        return view('template.seputar_dpr', compact('kategori_seputardapur', 'kategori_sd'));
    }
    public function filter_seputardapur(Request $request)
    {
        $kategori_sd = kategori_tipsdasar::all();
        $kategori_seputardapur = kategori_seputardapur::where('id', $request->dapur)->get();
        return view('template.seputar_dpr', compact('kategori_seputardapur', 'kategori_sd'));
    }
}
