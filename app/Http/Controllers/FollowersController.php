<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\Favorite;
use App\Models\Followers;
use App\Models\Footer;
use App\Models\Kursus;
use App\Models\Notifications;
use App\Models\Reseps;
use App\Models\TopUpCategories;
use App\Models\UploadVideo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    public function index(Request $request)
    {
        $userLogin = Auth::user();
        $username = $request->username;
        $notification = [];
        $favorite = [];
        $footer = Footer::first();
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

            $unreadNotificationCount = Notifications::where('user_id', auth()->user()->id)
                ->where('status', 'belum')
                ->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
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

        return view('template.search-account', compact('categorytopup','messageCount','user','footer','notification', 'userLogin', 'unreadNotificationCount','favorite'));
    }

    public function show_profile($id){

        $user = User::findOrFail($id);
        $userLogin = Auth::user();
        $recipes = Reseps::where('user_id', $user->id)->take(6)->orderBy('created_at', 'asc')->get();
        $upload_video = UploadVideo::where('users_id', $user->id)->orderBy('created_at', 'asc')->take(6)->get();
        $notification = [];
        $footer= Footer::first();
        $favorite = [];
        $unreadNotificationCount=[];
        $categorytopup  =  TopUpCategories::all();
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = Notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
                $unreadNotificationCount = Notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = Favorite::where('user_id_from', auth()->user()->id)
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        }
        $courses = Kursus::where('users_id', $id)->take(6)->get();

        return view('template.profile-oranglain',compact('courses','categorytopup','upload_video','messageCount','recipes','user','footer','notification','userLogin','unreadNotificationCount','userLogin','favorite'));
    }
    public function store(Request $request, $id)
    {
        $userfollowing = User::findOrFail($id);
        $userLogin = Auth::user();
        if ($userLogin && !$userfollowing->followers()->where('follower_id', auth()->user()->id)->exists()) {
            $follow = new Followers([
                'user_id' => $userfollowing->id,
                'follower_id' => auth()->user()->id,
            ]);
            if($userfollowing->isSuperUser == "no" && $userfollowing->followers > 10000){
                $userfollowing->isSuperUser = "yes";
                $userfollowing->save();
            }
            $userfollowing->increment('followers');
            $userfollowing->followers()->save($follow);
            $notifications = new Notifications([
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
