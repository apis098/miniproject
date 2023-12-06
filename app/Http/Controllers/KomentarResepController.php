<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\comment_recipes;
use App\Models\notifications;
use App\Models\replyCommentRecipe;
use App\Models\reseps;
use Illuminate\Support\Facades\Validator;

class KomentarResepController extends Controller
{
    public function toComment(Request $request, string $pengirim, string $penerima, string $recipe, string $comment = null)
    {
        $validasi = Validator::make($request->all(), [
            'komentar' => 'required|max:225'
        ], [
            'komentar.required' => 'Komentar wajib diisi!',
            'komentar.max' => 'Komentar maksimal berisi 225 karakter!'
        ]);
        if($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        }
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
            if(auth()->user()->foto) {
                $foto = 'storage/'.auth()->user()->foto;
            } else {
                $foto = 'images/default.jpg';
            }
            return response()->json([
                'success' => true,
                'message' => 'Sukses memberikan komentar!',
                'name' => auth()->user()->name,
                'foto' => $foto,
                'komentar' => $komentar,
                'id' => $c->id,
                'user' => $pengirim,
                'pengirim' => $c->user_pengirim->name,
            ]);
        }
    }
    public function reply_comment(Request $request,$id,$user){
        $validasi = Validator::make($request->all(), [
            'reply_comment' => 'required|max:225',
        ], [
            'reply_comment.required' => 'Komentar balasan harus diisi!',
            'reply_comment.max' => 'Komentar balasan maksimal berisi 225 karakter!'
        ]);
        if($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
        };
        $comment = comment_recipes::findOrFail($id);
        $reply = new replyCommentRecipe();
        $reply->users_id = auth()->user()->id;
        $reply->recipient_id = $user;
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
        if(auth()->user()->foto) {
            $foto = 'storage/'.auth()->user()->foto;
        } else {
            $foto = 'images/default.jpg';
        }
        return response()->json([
            'message' => 'Sukses membalas komentar.',
            'name' => auth()->user()->name,
            'foto' => $foto,
            'komentar' => $request->reply_comment,
            'id' => $reply->id,
            'user_id' => $reply->user->id,
            'user_name' => $reply->user->name,
            'user' => $user,
            'id2' => $id
        ]);
    }
    public function reply_reply_comment(Request $request,$id,$user){
        $comment = comment_recipes::findOrFail($id);
        $reply = new replyCommentRecipe();
        $reply->users_id = auth()->user()->id;
        $reply->recipient_id = $user;
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
        if(auth()->user()->foto) {
            $foto = 'storage/'.auth()->user()->foto;
        } else {
            $foto = 'images/default.jpg';
        }
        return response()->json([
            'message' => 'Sukses membalas komentar.',
            'name' => auth()->user()->name,
            'foto' => $foto,
            'komentar' => $request->reply_comment,
            'id' => $reply->id,
            'user_id' => $reply->user->id,
            'user_name' => $reply->user->name,
            'user' => $comment->user_penerima->id,
            'id2' => $id,
            'recipient' => $reply->recipient->name,
        ]);
    }
    public function delete_comment(string $id) {
        comment_recipes::where('id', $id)->delete();
        return response()->json([
            'message' => 'Sukses menghapus komentar!'
        ]);
    }
    public function delete_reply_comment(string $id) {
        replyCommentRecipe::where('id', $id)->delete();
        return response()->json([
            'message' => 'Sukses menghapus komentar!'
        ]);
    }
}
