<?php

namespace App\Http\Controllers;

use App\Models\followers;
use App\Models\notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followersController extends Controller
{
    public function index(Request $request)
    {
        $userLogin = Auth::user();
        $username = $request->username;
        $notification = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)->get();
        }
        if($username != null){
            $user = User::where('name',$username)->get();
        }else{
            $user = User::all();
        }
        return view('template.search-account', compact('user', 'notification'));
    }
    public function show_profile($id){
        
        $user = User::findOrFail($id);
        $userLogin = Auth::user();
        $notification = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)->get();
        }
        return view('template.profile-oranglain',compact('user','notification'));
    }
    public function store(Request $request, $id)
    {
        $userfollowing = User::findOrFail($id);
        $userLogin = Auth::user();
        if ($userLogin && !$userfollowing->followers()->where('follower_id', auth()->user()->id)->exists()) {
            $follow = new followers([
                'user_id' => $userfollowing->id,
                'follower_id' => auth()->user()->id,
            ]);
            $userfollowing->increment('followers');
            $userfollowing->followers()->save($follow);
            $notifications = new notifications([
                'notification_from' => auth()->user()->id,
                'follower_id' => auth()->user()->id,
                'user_id' => $userfollowing->id,
            ]);
            $notifications->save();
            return redirect()->back()->with('success', 'anda mengikuti pengguna dengan username');
        } else if ($userLogin && $userfollowing->followers()->where('follower_id', auth()->user()->id)->exists()) {
            $userfollowing->decrement('followers');
            $userfollowing->followers()->where('follower_id', auth()->user()->id)->delete();
            return redirect()->back()->with('success', 'anda batal mengikuti pengguna dengan username');
        } else {
            return redirect()->back()->with('error', 'Silahkan login terlebih dahulu');
        }
    }
 
}