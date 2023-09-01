<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\complaint;
use App\Models\reseps;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\footer;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {


        if (Auth::check()) {
            return redirect()->route('admin.index');
        } else {
            return view('login');
        }
    }

    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'password.required' => 'Password tidak boleh kosong'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();

            if ($user->status == 'nonaktif') {
                Auth::logout();
                return redirect()->back()->with('error', 'Akun anda telah diblokir!');
            }

            if ($user->status == 'aktif') {
                if ($user->role == 'koki') {
                    return redirect()->route('koki.index');
                } else if ($user->role == 'admin') {
                    return redirect()->route('admin.index');
                }
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah')->withInput();
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function home()
    {
        $complaints = complaint::paginate(3, ['*'], 'complaint-page');
        $real_reseps = reseps::has("likes")->orderBy("likes", "desc")->take(10)->paginate(6);
        $userLogin = Auth::user();
        $footer = footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }

        return view('template.home', compact('real_reseps', 'userLogin', 'complaints','footer', 'notification', 'unreadNotificationCount', 'favorite'));
    }

    public function about()
    {
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $footer = footer::first();
        $unreadNotificationCount = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('template.about', compact('notification','footer','unreadNotificationCount', 'userLogin', 'favorite'));
    }
}
$userLogin = Auth::user();
$notification = [];
$favorite = [];
$footer = footer::first();
$unreadNotificationCount = [];
if ($userLogin) {
    $notification = notifications::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
        ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
    $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
}
if ($userLogin) {
    $favorite = favorite::where('user_id_from', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->paginate(10);
}
return view('template.about', compact('notification','footer','unreadNotificationCount', 'userLogin', 'favorite'));
