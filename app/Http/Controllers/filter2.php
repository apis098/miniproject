<?php

namespace App\Http\Controllers;

use App\Models\kategori_bahan;
use App\Models\kategori_seputardapur;
use App\Models\kategori_tipsdasar;

use Illuminate\Http\Request;

class filter2 extends Controller
{
    public function view_tipsdasar()
    {
       $kategori_td = kategori_tipsdasar::all(); 
       $kategori_tipsdasar = kategori_tipsdasar::paginate(6);
       return view('template.tips_dsr', compact('kategori_tipsdasar', 'kategori_td'));
    }
    public function filter_tipsdasar(Request $request)
    {
        $kategori_td = kategori_tipsdasar::all();
        $kategori_tipsdasar = kategori_tipsdasar::where('id', $request->tips)->paginate(6);
        return view('template.tips_dsr', compact('kategori_tipsdasar', 'kategori_td'));
    }
    public function view_seputardapur() 
    {
        $kategori_sd = kategori_seputardapur::all();
        $kategori_seputardapur = kategori_seputardapur::paginate(6);
        return view('template.seputar_dpr', compact('kategori_seputardapur', 'kategori_sd'));
    }
    public function filter_seputardapur(Request $request)
    {
        $kategori_sd = kategori_seputardapur::all();
        $kategori_seputardapur = kategori_seputardapur::where('id', $request->dapur)->paginate(6);
        return view('template.seputar_dpr', compact('kategori_seputardapur', 'kategori_sd'));
    }
}
