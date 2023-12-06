<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use App\Models\ChMessage;
use App\Models\complaint;
use App\Models\favorite;
use App\Models\footer;
use App\Models\kategori_makanan;
use App\Models\notifications;
use App\Models\reseps;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestingController extends Controller
{
    public function create(){
        $data = basic_tips::all();
        $title="Form input langkah langkah";
        return view('testing.create',compact('title','data'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text1.*' => 'required|string|max:255',
            'text3.*' => 'required|string|max:255',
            'photos.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Menambahkan validasi untuk foto
        ]);

        foreach ($validatedData['text1'] as $key => $name) {
            $photo = $validatedData['photos'][$key]->store('photos', 'public'); // Simpan foto ke dalam storage

            basic_tips::create([
                'kategori_id'=> 1,
                'userkoki_id'=>auth()->user()->id,
                'judul' => $name,
                'deskripsi' => $validatedData['text3'][$key],
                'foto' => $photo,
            ]);
        }

        return redirect()->route('Testing.create')->with('success', 'Data hari spesial berhasil disimpan.');
    }

    public function notification(){
        $data = notifications::where('user_id',auth()->user()->id)->get();
        // $data = $notif->where('user_id',auth()->user()->id);
        $title = "testing notification";
        return view('testing.notification',compact('data','title'));
    }
    public function voice_note(){
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
                ->where('status','belum')
                ->orderBy('created_at', 'desc')
                ->paginate(10);
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        return view('template.test', compact('messageCount', 'favorite_resep', 'recipes', 'categories_foods', 'top_users', 'real_reseps', 'userLogin', 'complaints', 'footer', 'notification', 'unreadNotificationCount', 'favorite', 'jumlah_resep', 'foto_resep'));
    }
}
