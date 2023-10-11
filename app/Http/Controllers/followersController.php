<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
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
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
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
            if($userLogin){
                $user = User::where('status', 'aktif')
                ->where('name', 'like', '%' . $username . '%')
                ->where('role','koki')
                ->where('id','!=',auth()->user()->id)
                ->paginate(8);
            }else{
                $user = User::where('status', 'aktif')
                ->where('name', 'like', '%' . $username . '%')
                ->where('role','koki')
                ->paginate(8);
            }
        } else {
           if($userLogin){
            $user = User::where('status', 'aktif')
            ->where('role','koki')
            ->where('id','!=',auth()->user()->id)
            ->paginate(8);
           }else{
            $user = User::where('status', 'aktif')
            ->where('role','koki')
            ->paginate(8);
           }
        }
    
        return view('template.search-account', compact('messageCount','user','footer','notification', 'userLogin', 'unreadNotificationCount','favorite'));
    }
    
    public function show_profile($id){
        
        $user = User::findOrFail($id);
        $userLogin = Auth::user();
        $recipes = reseps::where('user_id', $id)->paginate(6);
        $notification = [];
        $footer= footer::first();
        $favorite = [];
        $unreadNotificationCount=[];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
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
        return view('template.profile-oranglain',compact('messageCount','recipes','user','footer','notification','userLogin','unreadNotificationCount','userLogin','favorite'));
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
            if(!$userLogin->followers()->where('follower_id',$userfollowing->id)->exists()){
                return response()->json([
                    'followed' => true,
                    'hisFollowing'=>false,
                ]);
            }else{
                return response()->json([
                    'followed' => true,
                    'hisFollowing'=>true,
                ]);
            }
        } else if ($userLogin && $userfollowing->followers()->where('follower_id', auth()->user()->id)->exists()) {
            $userfollowing->decrement('followers');
            $userfollowing->followers()->where('follower_id', auth()->user()->id)->delete();
            if(!$userLogin->followers()->where('follower_id',$userfollowing->id)->exists()){
                return response()->json([
                    'followed' => false,
                    'hisFollowing'=>false,
                ]);
            }else{
                return response()->json([
                    'followed' => false,
                    'hisFollowing'=>true,
                ]);
            }
        } else {
            return response()->json(['status' => 'error']);
        }
    }
 
}