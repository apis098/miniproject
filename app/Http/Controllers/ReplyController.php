<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\Reply;
use Illuminate\Http\Request;

class ReplyController extends Controller
{
    public function index(){
        $data = complaint::all();
        $title = "Data Keluhan Seputar Memasak";
        return view('replies.index',compact('data','title'));
    }
    public function show($id){
        $data = complaint::findOrFail($id);
        $replies = $data->replies;
        $title = "Data balasan keluhan ";
        return view('replies.detail',compact('data','title','replies'));
    }
    public function reply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string',
        ]);
        
        $complaint = complaint::findOrFail($id);

        $reply = new Reply([
            'user_id' => auth()->user()->id,
            'reply' => $request->reply,
        ]);

        $complaint->replies()->save($reply);
        
        return redirect()->route('ShowReplies.show', $id)->with('success', 'Balasan berhasil dikirim.');
    }
}
