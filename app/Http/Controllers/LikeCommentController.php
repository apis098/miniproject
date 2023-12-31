<?php

namespace App\Http\Controllers;

use App\Models\CommentResipes;
use App\Models\LikeCommentRecips;
use App\Models\LikeReplyCommentRecipes;
use App\Models\Notifications;
use App\Models\ReplyCommentRecipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeCommentController extends Controller
{
    public function like_comment_recipe($id)
    {
        $comment = CommentResipes::findOrFail($id);
        $log = Auth::user();
        if ($log == false) {
            return redirect()->back()->with("error", "Anda harus login dulu sebelum menyukai komentar!");
        }
        $like = LikeCommentRecips::query();
        $like->where("users_id", Auth::user()->id);
        $like->where("comment_id", $id);
        $count_like = $like->count();
        if ($count_like == 0) {
            LikeCommentRecips::create([
                "users_id" => auth()->user()->id,
                "comment_id" => $comment->id,
                "recipe_id" => $comment->recipes_id,
            ]);
            if ($comment->users_id != auth()->user()->id){
                $notifications = new Notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $comment->users_id;
                $notifications->like_comment_recipes_id = 1;
                $notifications->resep_id = $comment->recipes_id;
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

    public function like_reply_comment($id){
        $comment = ReplyCommentRecipe::findOrFail($id);
        $user = Auth::user();
        if($user && !LikeReplyCommentRecipes::where('comment_id',$comment->id)->where('users_id', auth()->user()->id)->exists()){
            LikeReplyCommentRecipes::create([
                'users_id' => auth()->user()->id,
                'recipe_id' => $comment->recipe_id,
                'comment_id' => $comment->id
            ]);
            $comment->increment('likes');
            if ($comment->users_id != auth()->user()->id){
                $notifications = new Notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $comment->users_id;
                $notifications->like_reply_comment_recipes_id = 1;
                $notifications->resep_id = $comment->recipe_id;
                $notifications->save();
            }
            return response()->json([
                'liked' => true,
                'likes' => $comment->likes,
                'reply_id' => $comment->id,
                'like_count' => $comment->likes,
            ]);
        }elseif($user && LikeReplyCommentRecipes::where('comment_id',$comment->id)->where('users_id', auth()->user()->id)->exists()){
            $data = LikeReplyCommentRecipes::where('users_id', auth()->user()->id)->where('recipe_id', $comment->recipe_id)->where('comment_id', $comment->id)->delete();
            if($data){
                $comment->decrement('likes');
                return response()->json([
                    'liked' => false,
                    'likes' => $comment->likes,
                    'reply_id' => $comment->id,
                    'like_count' => $comment->likes,
                ]);
            }
        }else{
            return redirect()->route('login')->with('info','silahkan login terlebih dahulu');
        }
    }
}
