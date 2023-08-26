<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\likes;
use App\Models\notifications;
use App\Models\Reply;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class likeController extends Controller
{
    public function like($id)
    {
        $replies = Reply::findOrFail($id);
        $complaintId = $replies->complaint_id;
        $user = Auth::user();
        if ($user && !$replies->likes()->where('user_id', auth()->user()->id)->exists()) {
            $like = new likes([
                'user_id' => auth()->user()->id,
                'reply_id' => $replies->id,
            ]);
            $replies->increment('likes');
            $replies->likes()->save($like);
            if (auth()->user()->id) {
                $notifications = new notifications([
                    'notification_from' => auth()->user()->id,
                    'like_id' => $like->id,
                    'user_id' => $replies->user->id,
                    'reply_id' => $replies->id,
                    'complaint_id' => $complaintId,
                ]);
                $replies->notifications()->save($notifications);
            }
            return response()->json([
                'liked' => true,
                'likes' => $replies->likes,
                'reply_id' => $replies->id,
            ]);
        }
        if ($user && $replies->likes()->where('user_id', auth()->user()->id)->exists()) {
            $replies->decrement('likes');
            $replies->likes()->where('user_id', auth()->user()->id)->delete();
            $replies->save();
            return response()->json([
                'liked' => false,
                'likes' => $replies->likes,
                'reply_id' => $replies->id,
            ]);

        }
        if (!$user) {
            return redirect()->route('login')->with('error', 'anda harus login terlebih dahulu');
        }
        // return redirect()->route('ShowReplies.show', $complaintId)->with('error', 'anda sudah memberi like komentar ini sebelumnya');
    }
    public function likeResep(Request $request, $id)
    {
        $resep = reseps::findOrFail($id);
        $user = Auth::user();
        if ($user && !$resep->likes()->where('user_id', auth()->user()->id)->exists()) {
            $like = new likes([
                'user_id' => auth()->user()->id,
                'resep_id' => $resep->id,
            ]);
            $resep->increment('likes');
            $resep->User()->increment('like');
            $like->save();
            if (auth()->user()->id) {
                $notifications = new notifications([
                    'notification_from' => auth()->user()->id,
                    'like_id' => $like->id,
                    'user_id' => $resep->user_id,
                    'resep_id' => $resep->id,
                ]);
                $notifications->save();
            }
            return response()->json([
                'liked' => true,
                'likes' => $resep->likes,
                'resep_id' => $resep->id,
            ]);
        }
        if ($user && $resep->likes()->where('user_id', auth()->user()->id)->exists()) {
            $resep->decrement('likes');
            $resep->User()->decrement('like');
            $resep->likes()->where('user_id', auth()->user()->id)->delete();
            // Simpan perubahan pada model $resep
            $resep->save();
            return response()->json([
                'liked' => false,
                'likes' => $resep->likes,
                'resep_id' => $resep->id,
            ]);
        }
        if (!$user) {
            return response()->json(['error' => 'User authentication required']);
        }
        // return redirect()->route('ShowReplies.show', $complaintId)->with('error', 'anda sudah memberi like komentar ini sebelumnya');
    }

    public function unlike(Request $request, $id)
    {
        $complaintId = $request->complaint_id;
        $replies = Reply::findOrFail($id);
        $user = Auth::user();

        if ($user && $replies->likes()->where('user_id', $request->user()->id)->exists()) {
            $replies->decrement('likes');
            $replies->likes()->where('user_id', $request->user()->id)->delete();
            return redirect()->route('ShowReplies.show', $complaintId)->with('success', 'anda membatalkan memberi like');
        }

        return redirect()->route('ShowReplies.show', $complaintId)->with('error', 'anda belum memberi like');
    }

}