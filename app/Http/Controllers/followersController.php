<?php

namespace App\Http\Controllers;

use App\Models\followers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class followersController extends Controller
{
    public function index(){
        $user = User::all();
        // $statusFollow= $user->followers()->where('follower_id', auth()->user()->id)->count() > 0;
        return view('template.search-account',compact('user'));
    }
    public function store(Request $request,$id){
        $userfollowing = User::findOrFail($id);
        $userLogin = Auth::user();
        if($userLogin && !$userfollowing->followers()->where('follower_id',auth()->user()->id)->exists()){
            $follow = new followers([
                'user_id'=> $userfollowing->id,
                'follower_id'=> auth()->user()->id,
            ]);
            $userfollowing->increment('followers');
            $userfollowing->followers()->save($follow);
            return redirect()->back()->with('success','anda mengikuti pengguna dengan username');
        }
        else if($userLogin && $userfollowing->followers()->where('follower_id',auth()->user()->id)->exists()){
            $userfollowing->decrement('followers');
            $userfollowing->followers()->where('follower_id',auth()->user()->id)->delete();
            return redirect()->back()->with('success','anda batal mengikuti pengguna dengan username');
        }
        else{
            return redirect()->back()->with('error','Silahkan login terlebih dahulu');
        }
    }
}
