<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment_recipes;
use App\Models\replyCommentRecipe;
use Illuminate\Support\Facades\Validator;

class komentar_resep extends Controller
{
    public function toComment(Request $request, string $user, string $recipe, string $comment = null)
    {
        $c = null;
        $komentar = $request->komentar;
        if ($comment != null) {
            $c = replyCommentRecipe::create([
                'users_id' => $user,
                'recipe_id' => $recipe,
                'comment_id' => $comment,
                'komentar' => $komentar
            ]);
        } else {
            $c = comment_recipes::create([
                'users_id' => $user,
                'recipes_id' => $recipe,
                "comment" => $komentar
            ]);
        }
        if ($c) {
            return redirect()->back()->with('success', 'Sukses memberikan komentar!');
        }
    }
    
}
