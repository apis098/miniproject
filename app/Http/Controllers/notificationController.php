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
}
