<?php

namespace App\Http\Controllers;


use App\Models\Favorite;
use App\Models\Footer;
use App\Models\Notifications;
use App\Models\reseps;
use App\Models\TopUpCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomChatController extends Controller
{
    public function index(){
        $userLogin = Auth::user();
        $footer = Footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
                ->where('status','belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
                $unreadNotificationCount = Notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        return view('roomchat.roomchat', compact('categorytopup','notification','footer','unreadNotificationCount','userLogin','favorite'));
    }
}
