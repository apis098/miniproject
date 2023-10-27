<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\complaint;
use App\Models\favorite;
use App\Models\footer;
use App\Models\likes;
use App\Models\notifications;
use App\Models\Reply;
use App\Models\replyComplaint;
use App\Models\TopUpCategories;
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
        $footer = footer::first();
        $favorite = [];
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        // $balasanKomentar = [];
        // if($replies->isNotEmpty()){
        //     $balasanKomentar = $replies->first()->repliesComment->sortByDesc('likes');
        // }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $title = "Data balasan keluhan ";
        return view('replies.detail', compact('categorytopup','messageCount','data','footer', 'title', 'replies','repliesCount','userLogin','notification','unreadNotificationCount','favorite'));
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
            if($complaint->user_id != auth()->user()->id){
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
    public function replyComment(Request $request,$id){
        $request->validate([
            'reply_comment' => 'required|string',
        ]);
        $user = Auth::check();
        if($user){
            $comment = Reply::findOrFail($id);
            $reply = new replyComplaint();
            $reply->reply_id = $comment->id;
            $reply->complaint_id = $comment->complaint_id;
            $reply->user_id = $comment->user_id;
            $reply->user_id_sender = auth()->user()->id;
            $reply->reply = $request->reply_comment;
            $reply->save();
            if($comment->user_id != auth()->user()->id){
                $notifications = new notifications();
                $notifications->notification_from = auth()->user()->id;
                $notifications->user_id = $comment->user_id;
                $notifications->reply_id_comment = $comment->id;
                $notifications->save();
            }
            return redirect()->back()->with('success','Berhasil membalas komentar');
        }else{
            return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
        }
       
    }
    public function destroy(Request $request,$id)
    {
        $data = Reply::findOrFail($id);
        $data->delete();
        
        if(auth()->user()->role =="admin"){
            $notification = new notifications();
            $notification->user_id = $data->user_id;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('info','Komentar berhasil diblokir');
        }
        return redirect()->back()->with('info', 'Komentar berhasil dihapus');
    }
    public function destroyComment(Request $request,$id){
        $data = replyComplaint::findOrFail($id);
        $data->delete();

        if(auth()->user()->role == "admin"){
            $notification = new notifications();
            $notification->user_id = $data->user_id_sender;
            $notification->notification_from = auth()->user()->id;
            $notification->reply_id_report = 1;
            $notification->alasan = $request->alasan;
            $notification->save();
            return redirect()->back()->with('info','Komentar berhasil diblokir');
        }
        return redirect()->back()->with('info','komentar telah dihapus');
    }
}