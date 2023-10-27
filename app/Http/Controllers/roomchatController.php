<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\footer;
use App\Models\notifications;
use App\Models\reseps;
use App\Models\TopUpCategories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class roomchatController extends Controller
{
    public function index(){
        $userLogin = Auth::user();
        $footer = footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
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
        return view('roomchat.roomchat', compact('categorytopup','notification','footer','unreadNotificationCount','userLogin','favorite'));
    }
}
