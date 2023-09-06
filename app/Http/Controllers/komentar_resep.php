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
        return redirect()->back()->with('success','Sukses menambahkan komentar');
    }
    public function reply_comment(Request $request,$id){
        $comment = comment_recipes::findOrFail($id);
        $reply = new replyCommentRecipe();
        $reply->users_id = auth()->user()->id;
        $reply->recipe_id = $comment->recipes_id;
        $reply->comment_id = $comment->id;
        $reply->komentar = $request->reply_comment;
        $reply->save();
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
