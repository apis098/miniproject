<?php

namespace App\Http\Controllers;

use App\Models\notifications;
use Illuminate\Http\Request;
use App\Models\UlasanKursus;

class notificationController extends Controller
{
    public function ulasan($id) {
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        $ulasan = UlasanKursus::findOrFail($notification->ulasan_id);
        return redirect('/detail_kursus/'.$ulasan->course_id);
    }
    public function kursus($id)
    {
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        return redirect('/koki/kursus');
    }
    public function verifed($id)
    {
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        return redirect('/koki/index');
    }
    public function dataKoki($id) {
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        return redirect('/koki/income-koki');
    }
    public function penarikan($id) {
        $notification = notifications::findOrFail($id);
        $notification->status = "sudah";
        $notification->save();
        return redirect('/koki/income-koki');
    }
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
    public function  donation($id){
        $notification = notifications::findOrFail($id);
        $notification->status = 'sudah';
        $notification->save();
        $uuid = $notification->veed->uuid;
        return redirect()->route('veed.index',$uuid);
    }
    public function top_up($id){
        $notification = notifications::findOrFail($id);
        $notification->status = 'sudah';
        $notification->save();
        return redirect('/koki/beranda');
    }
        public function update_all_status(){
            $notification = notifications::where('user_id',auth()->user()->id)->where('status','belum')->get();
            foreach ($notification as $row){
            $row->status = "sudah";
            $row->save();
            }
            // $read_notification = notifications::where('user_id',auth()->user()->id)->where('status','sudah')->get();
            // foreach($read_notification as $unread){
            //     $unread->delete();
            // }
            return response()->json([
                'success' => true,
            ]);
        }
}
