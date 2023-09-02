<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment_recipes;
use Illuminate\Support\Facades\Validator;

class komentar_resep extends Controller
{
    public function toComment(Request $request) 
    {
        $validasi = Validator::make($request->all(), [
            "users_id" => "required",
            "recipes_id" => "required",
            "komentar" => "required"
        ]);
        if ($validasi->fails()) {
            return redirect()->back()->with('error', $validasi->errors());
        }
        $users_id = $request->users_id;
        $recipes_id = $request->recipes_id;
        $komentar = $request->komentar;
        $c = comment_recipes::create([
            'users_id' => $users_id,
            'recipes_id' => $recipes_id,
            "comment" => $komentar
        ]);
        if ($c) {
            return redirect()->back()->with('success', 'Sukses memberikan komentar!');
        }
    }
}
 