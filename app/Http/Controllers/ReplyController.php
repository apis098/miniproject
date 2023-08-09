<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\likes;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReplyController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $data = Reply::where('user_id', $userId)->get();
        $title = "Balasan anda terhadap pengguna lain";
        return view('replies.index', compact('data', 'title'));
    }
    public function show($id)
    {
        $data = complaint::findOrFail($id);
        $replies = $data->replies->sortByDesc('likes');
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
        if ($user) {
            $reply = new Reply([
                'user_id' => auth()->user()->id,
                'reply' => $request->reply,
            ]);

            $complaint->replies()->save($reply);
            return redirect()->back()->with('success', 'Balasan berhasil dikirim.');
        } else {
            return redirect()->back()->with('error', 'Silahkan login terlebih dahulu.');
        }
    }
    public function destroy($id)
    {
        $data = Reply::findOrFail($id);
        $data->delete();

        return redirect()->back()->with('success', 'Data has been deleted successfully.');
    }
}