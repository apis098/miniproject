<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment_recipes;
use Illuminate\Support\Facades\Validator;

class komentar_resep extends Controller
{
    public function toComment(Request $request, string $user, string $recipe) 
    {
        $komentar = $request->komentar;
        $c = comment_recipes::create([
            'users_id' => $user,
            'recipes_id' => $recipe,
            "comment" => $komentar
        ]);
        if ($c) {
            return redirect()->back()->with('success', 'Sukses memberikan komentar!');
        }
    }
}
 