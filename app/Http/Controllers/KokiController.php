<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\notifications;
use App\Models\reseps;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class KokiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $resep_sendiri = reseps::where("user_id", Auth::user()->id)->get();
        $recipes = reseps::where("user_id", Auth::user()->id)->paginate(6);
        $userLogin = Auth::user();
        $notification = [];
        $unreadNotificationCount=[];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
                $unreadNotificationCount = notifications::where('user_id',auth()->user()->id)->where('status', 'belum')->count();
        }
        return view('koki.profile', compact('recipes','notification', 'resep_sendiri','unreadNotificationCount','userLogin'));
    }
    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('profile_picture')) {
            // Delete old profile picture if exists
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            // Upload new profile picture
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $user->foto = $profilePicturePath;
            $user->save();
        }


        return redirect()->back()->with('success', 'Sukses mengupdate foto profil');
    }
    public function deleteProfilePicture()
    {
        $user = Auth::user();

        if ($user->foto) {
            Storage::disk('public')->delete($user->foto);
            $user->foto = null;
            $user->save();
            return redirect()->back()->with('success', 'Foto profile telah dihapus');
        } else {
            return redirect()->back()->with('error', 'Tidak ada foto profile yang perlu dihapus ');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
