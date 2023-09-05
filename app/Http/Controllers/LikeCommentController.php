<?php

namespace App\Http\Controllers;

use App\Models\comment_recipes;
use App\Models\like_comment_recipes;
use App\Models\LikeReplyCommentRecipes;
use App\Models\notifications;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeCommentController extends Controller
{
    public function like_comment_recipe($id)
    {
        $comment = comment_recipes::findOrFail($id);
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
                "comment_id" => $comment->id,
                "recipe_id" => $comment->recipes_id,
            ]);
            if ($comment->users_id != auth()->user()->id){
                $notifications = new notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $comment->users_id;
                $notifications->save();
            }
            $comment->increment('likes');
            return response()->json([
                'liked' => true,
                'likes' => $comment->likes,
                'reply_id' => $comment->id,
            ]);
        } else {
            $comment->decrement('likes');
            $like->delete();
            return response()->json([
                'liked' => false,
                'likes' => $comment->likes,
                'reply_id' => $comment->id,
            ]);
        }
    }
    public function like_reply_comment_recipe(string $user, string $resep, string $comment) {
        $like = LikeReplyCommentRecipes::where('users_id', $user)->where('recipe_id', $resep)->where('comment_id', $comment)->count();
        if ($like == 0) {
            LikeReplyCommentRecipes::create([
                'users_id' => $user,
                'recipe_id' => $resep,
                'comment_id' => $comment
            ]);
            return redirect()->back()->with('success', 'Sukses menyukai komentar!');
        } else {
            $d = LikeReplyCommentRecipes::where('users_id', $user)->where('recipe_id', $resep)->where('comment_id', $comment)->delete();
            if ($d) {
                return redirect()->back()->with("success", "Sukses membatalkan menyukai komentar!");
            }
        }
        
    }
}
