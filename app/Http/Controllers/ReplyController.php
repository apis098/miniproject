<?php

namespace App\Http\Controllers;

use App\Models\complaint;
use App\Models\likes;
use App\Models\notifications;
use App\Models\Reply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Notification;

class ReplyController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $user= Auth::user();
        $userRole = $user->role;
        $data = Reply::where('user_id', $userId)->get();
        $title = "Balasan anda terhadap pengguna lain";
        if($userRole == 'admin'){
            return view('replies.index', compact('data', 'title'));
        }else{
            return view('replies.index_koki', compact('data', 'title'));
        }
  
    }
    public function show($id)
    {
        $data = complaint::findOrFail($id);
        $replies = $data->replies->sortByDesc('likes');
        $repliesCount = $replies->count();
        $userLogin = Auth::user();
        $notification = [];
        $unreadNotificationCount=[];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
        }
        $title = "Data balasan keluhan ";
        return view('replies.detail', compact('data', 'title', 'replies', 'repliesCount','userLogin','notification','unreadNotificationCount'));
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
            if(!auth()->user()->id){
            $notifications = new notifications([
                'notification_from' => auth()->user()->id,
                'complaint_id' => $complaint->id,
                'user_id' => $complaint->user->id,
                'reply_id' => $reply->id,
            ]);
            $complaint->notifications()->save($notifications);  
        }    
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