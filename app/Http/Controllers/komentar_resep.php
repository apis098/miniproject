<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment_recipes;
use App\Models\notifications;
use App\Models\replyCommentRecipe;
use App\Models\reseps;
use Illuminate\Support\Facades\Validator;

class komentar_resep extends Controller
{
    public function toComment(Request $request, string $pengirim, string $penerima, string $recipe, string $comment = null)
    {
        $c = null;
        $komentar = $request->komentar;
        $resepData  = reseps::findOrFail($recipe);
        if ($comment != null) {
            $c = replyCommentRecipe::create([
                'pengirim_id' => $pengirim,
                'penerima_id' => $penerima,
                'recipe_id' => $recipe,
                'comment_id' => $comment,
                'komentar' => $komentar
            ]);
        } else {
            $c = comment_recipes::create([
                'pengirim_id' => $pengirim,
                'penerima_id' => $penerima,
                'recipes_id' => $recipe,
                "comment" => $komentar
            ]);
            if ($resepData->user_id != auth()->user()->id){
                $notifications = new notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $resepData->user_id;
                $notifications->comment_id = 1;
                $notifications->resep_id = $resepData->id;
                $notifications->save();
            }

        }
        if ($c) {
            return redirect()->back()->with('success', 'Sukses memberikan komentar!');
        }
        return redirect()->back()->with('success','Sukses menambahkan komentar');
    }
    public function reply_comment(Request $request,$id){
        $comment = comment_recipes::findOrFail($id);
        $reply = new replyCommentRecipe();
        $reply->users_id = auth()->user()->id;
        $reply->recipe_id = $comment->recipes_id;
        $reply->comment_id = $comment->id;
        $reply->komentar = $request->reply_comment;
        if ($request->has('parent_id')) {
            $reply->parent_id = $request->parent_id;
        }
        $reply->save();
        if ($comment->users_id != auth()->user()->id){
            $notifications = new notifications();
            $notifications->notification_from = auth()->user()->id;
            $notifications->user_id = $comment->users_id;
            $notifications->reply_comment_id = 1;
            $notifications->resep_id = $comment->recipes_id;
            $notifications->save();
        }
        return redirect()->back()->with('success','Sukses membalas komentar');
    }
    public function reply_reply_comment(Request $request,$id){
        $comment = comment_recipes::findOrFail($id);
        $reply = new replyCommentRecipe();
        $reply->users_id = auth()->user()->id;
        $reply->recipe_id = $comment->recipes_id;
        $reply->comment_id = $comment->id;
        $reply->komentar = $request->reply_comment;
            $reply->parent_id = $request->parent_id;
        $reply->save();
        if ($comment->users_id != auth()->user()->id){
            $notifications = new notifications();
            $notifications->notification_from = auth()->user()->id;
            $notifications->user_id = $comment->users_id;
            $notifications->reply_comment_id = 1;
            $notifications->resep_id = $comment->recipes_id;
            $notifications->save();
        }
        return redirect()->back()->with('success','Sukses membalas komentar');
    }
    public function delete_comment(string $id) {
        comment_recipes::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Sukses menghapus komentar!');
    }
    public function delete_reply_comment(string $id) {
        replyCommentRecipe::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Sukses menghapus komentar!');
    }
}
