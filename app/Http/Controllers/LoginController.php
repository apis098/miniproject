<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\complaint;
use App\Models\reseps;
use App\Models\notifications;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kategori_makanan;
use App\Models\User;
use Carbon\Carbon;
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
        $reseps = reseps::query();
        $real_reseps = $reseps->has("likes")->orderBy("likes", "desc")->take(3)->get();
        $real_reseps = $reseps->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->take(3)->get();
        $resep = reseps::query();
        $favorite_resep = $resep->has('favorite')->orderBy('favorite_count', 'desc')->take(3)->get();
        $favorite_resep = $resep->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->get();
        $top_users = User::has("followers")->orderBy("followers", "desc")->take(4)->get();
        $categories_foods = kategori_makanan::all();
        $recipes = reseps::whereDate('created_at', today())->take(3)->get();
        $userLogin = Auth::user();
        $jumlah_resep = reseps::all()->count();
        $foto_resep = reseps::take(5)->get();
        $footer = footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('template.home', compact('messageCount', 'favorite_resep', 'recipes', 'categories_foods', 'top_users', 'real_reseps', 'userLogin', 'complaints', 'footer', 'notification', 'unreadNotificationCount', 'favorite', 'jumlah_resep', 'foto_resep'));
    }

    public function kursus()
    {
        $userLogin = Auth::user();
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
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('template.kursus', compact('messageCount','notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));
    }

    public function keluhan()
    {
        $complaints = complaint::paginate(3);
        $real_reseps = reseps::has("likes")->orderBy("likes", "desc")->take(10)->paginate(6);
        $userLogin = Auth::user();
        $jumlah_resep = reseps::all()->count();
        $foto_resep = reseps::take(5)->get();
        $footer = footer::first();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
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

        return view('template.keluhan', compact('messageCount','real_reseps', 'userLogin', 'complaints', 'footer', 'notification', 'unreadNotificationCount', 'favorite', 'jumlah_resep', 'foto_resep'));
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
return view('template.kursus', compact('notification', 'footer', 'unreadNotificationCount', 'userLogin', 'favorite'));