<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function index(){
        $data = complaint::all();
        $title = "Data Keluhan Seputar Memasak";
        return view('replies.index',compact('data','title'));
    }
    public function show($id)
    {
        $data = complaint::findOrFail($id);
        $replies = $data->replies;
        $repliesCount = $replies->count();

        $title = "Data balasan keluhan ";
        return view('replies.detail', compact('data', 'title', 'replies', 'repliesCount'));
    }
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);
        
        $complaint = complaint::findOrFail($id);
        $user = Auth::user();
        if($user){
            $reply = new Reply([
                'user_id' => auth()->user()->id,
                'reply' => $request->reply,
            ]);
    
            $complaint->replies()->save($reply);
            return redirect()->route('ShowReplies.show', $id)->with('success', 'Balasan berhasil dikirim.');
        }
        else{
            return redirect()->route('ShowReplies.show',$id)->with('error','Silahkan login terlebih dahulu.');
        }
    }
}
