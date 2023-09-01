<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\followers;
use App\Models\footer;
use App\Models\notifications;
use App\Models\reseps;
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
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
    
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        if ($username != null) {
            $user = User::where('status', 'aktif')
                ->where('name', 'like', '%' . $username . '%')
                ->paginate(6);
        } else {
            $user = User::where('status', 'aktif')->paginate(6);
        }
    
        return view('template.search-account', compact('user','footer','notification', 'userLogin', 'unreadNotificationCount','favorite'));
    }
    
    public function show_profile($id){
        
        $user = User::findOrFail($id);
        $userLogin = Auth::user();
        $recipes = reseps::where('user_id', $id)->paginate(6);
        $notification = [];
        $footer= footer::first();
        $unreadNotificationCount=[];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        return view('template.profile-oranglain',compact('recipes','user','footer','notification','userLogin','unreadNotificationCount','userLogin','favorite'));
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