<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use Illuminate\Http\Request;

class notificationController extends Controller
{
    public function followNotification(Request $request,$id){

        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        $follower_id = $request->follower_id;
        return redirect()->route('show.profile',$follower_id);
    }
    public function repliesNotification(Request $request,$id){
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        $replies_id = $request->replies_id;
        return redirect()->route('ShowReplies.show',$replies_id);
    }
    public function recipesNotification($id){
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        $resepId = $notification->resep_id;
        return redirect('/artikel/'.$resepId.'/'.$notification->resep->nama_resep);
    }
    public function blockedProfile($id){
        $notificattion = notifications::findOrFail($id);
        $notificattion->status = 'sudah';
        $notificattion->save();
        return redirect('/koki/index');
    }
    public function blockedRecipes($id){
        $notificattion = notifications::findOrFail($id);
        $notificattion->status = 'sudah';
        $notificattion->save();
        return redirect()->back()->with('info','Resep kamu telah diblokir');
    }
    public function blockedComplaint($id){
        $notificattion = notifications::findOrFail($id);
        $notificattion->status = 'sudah';
        $notificattion->save();
        return redirect()->back();
    }
    public function blockedComent($id){
        $notificattion = notifications::findOrFail($id);
        $notificattion->status = 'sudah';
        $notificattion->save();
        return redirect()->back();
    }
    public function blockedFeed($id){
        $notification = notifications::findPrFail($id);
        $notification->status = 'sudah';
        $notification->save();
        return redirect()->back();
    }
    public function repliesBlocked($id){
        $notificattion = notifications::findOrFail($id);
        $notificattion->status = 'sudah';
        $notificattion->save();
        $id = $notificattion->replyBlocked->complaint_id;
        return redirect()->route('ShowReplies.show',$id);
    }
    public function likeResep($id){
        $notificattion = notifications::findOrFail($id);
        $notificattion->status = 'sudah';
        $notificattion->save();
        $resepId = $notificattion->resep->id;
        $resepName = $notificattion->resep->nama_resep;
        return redirect('/artikel/' . $resepId . '/' . $resepName);
    }
    public function shareVeed($id){
        $notification = notifications::findOrFail($id);
        $notification->status = 'sudah';
        $notification->save();  
        $uuid = $notification->veed->uuid;
        return redirect()->route('veed.index',$uuid);
    }
    // public function blockComplaint($id){
    //     $notificattion = notifications::findOrFail($id);
    //     $notificattion->status = 'sudah';
    //     $notificattion->save();
    //     return redirect()->back();
    // }
}
