<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\reseps;
use Illuminate\Http\Request;

class favoriteController extends Controller
{
    public function store($id){
        $resep = reseps::findOrFail($id);
        $data = new favorite();
        $data->user_id_from = auth()->user()->id;
        $data->resep_id = $resep->id;
        $data->user_id = $resep->user_id;
        $data->save();
        return redirect()->back()->with('success','berhasil menambahkan ke favorite');
    }
}
