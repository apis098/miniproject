<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\likes;
use App\Models\Reply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class likeController extends Controller
{
    public function like(Request $request,$id)
    {
        $complaintId=$request->complaint_id;
        $replies = Reply::findOrFail($id);
        $user = Auth::user();
        if($user && !$replies->likes()->where('user_id', $request->user()->id)->exists()){
            $like = new likes([
                'user_id' => auth()->user()->id,
                'reply_id' => $request->reply_id,
            ]);
            $replies->increment('likes');
            $replies->likes()->save($like);
            return redirect()->route('ShowReplies.show', $complaintId)->with('success', 'anda memberi like komentar dari');
        }

        return redirect()->route('ShowReplies.show',$complaintId)->with('error', 'anda sudah memberi like komentar ini sebelumnya');
    }
}
