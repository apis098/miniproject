<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kursus;
use App\Models\notifications;
use App\Models\sessionCourses;
use App\Models\TopUpCategories;
use App\Models\UlasanKursus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class detail_kursusController extends Controller
{

    public function detailKursus(string $id){
        $detail_course = kursus::find($id);
        $idAdmin = User::where('role', 'admin')->first();
        $userLogin = Auth::user();
        // untuk user belum login
        $userLog = 1;
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $categorytopup  =  TopUpCategories::all();
        $admin = false;
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = notifications::where('user_id', auth()->user()->id)
            ->where('status','belum')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = footer::first();
        $detail_session_course = sessionCourses::where("course_id", $id)->get();
        $rata2_harga = $detail_session_course->avg("harga_sesi");
        $count_session = sessionCourses::where('course_id', $id)->count();
        $ulasan_kursus = UlasanKursus::where('course_id', $id)->where('parent_id', null)->get();
        return view('template.detail-kursus', compact("ulasan_kursus","count_session","rata2_harga",'detail_session_course','categorytopup','detail_course','idAdmin','messageCount','admin', 'footer', 'userLog', 'notification', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

}
