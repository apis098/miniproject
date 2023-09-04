<?php

namespace App\Http\Controllers;

use App\Models\like_comment_recipes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeCommentController extends Controller
{
    public function like_comment_recipe(string $id, string $id_resep) {
        $log = Auth::user();
        if ($log == false) {
            return redirect()->back()->with("error", "Anda harus login dulu sebelum menyukai komentar!");
        }
        $like = like_comment_recipes::query();
        $like->where("users_id", Auth::user()->id);
        $like->where("comment_id", $id);
        $count_like = $like->count();
        if ($count_like == 0) {
            # code...
            like_comment_recipes::create([
                "users_id" => Auth::user()->id,
                "comment_id" => $id,
                "recipe_id" => $id_resep
            ]);
            return redirect()->back()->with("success", "Sukses menyukai komentar!");
        } else {
            $like->delete();
            return redirect()->back()->with("success", "Sukses membatalkan menyukai komentar!");
        }
    }
    public function like_reply_comment_recipe(string $user, string $resep, string $comment) {

    }
}
