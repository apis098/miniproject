<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\notifications;
use App\Models\reseps;
use App\Models\upload_video;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

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
        $footer = footer::first();
        $notification = [];
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
        return view('koki.profile', compact('messageCount','recipes','notification','footer', 'resep_sendiri','unreadNotificationCount','userLogin','favorite'));
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
             // Lakukan penyesuaian gambar (misalnya, memotong)
            $croppedImage = Image::make(public_path("storage/{$profilePicturePath}"))
            ->fit(576, 576); // Ubah ukuran sesuai kebutuhan

              // Simpan gambar yang telah diubah
             $croppedImage->save();

            $user->foto = $profilePicturePath;
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

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
     * Memperlihatkan form untuk upload video pembelajaran oleh koki
     */
    public function upload_video() {
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
        return view("koki.upload-video", compact('userLogin','notification', 'favorite', 'footer', 'unreadNotificationCount'));
    }
    public function upload(Request $request)
    {
        $rules = [
            "deskripsi_video" => "required|max:400",
            "upload_video" => "required|mimes:mp4|max:50000"
        ];
        $messages = [
            "deskripsi_video.required" => "Deskripsi video harus diisi!",
            "deskripsi_video.max" => "Deskripsi video tidak boleh lebih dari 225 karakter!",
            "upload_video.required" => "Video harus diupload!",
            "upload_video.mimes" => "Video harus berekstensikan mp4!",
            "upload_video.max" => "Video tidak boleh melebihi 50MB!"
        ];
        $validasi = Validator::make($request->all(), $rules, $messages);
        if ($validasi->fails()) {
            return response()->json($validasi->errors()->first(), 422);
            //return redirect()->back()->with("error", $validasi->errors()->first());
        }
        $allUser = User::where("isSuperUser", "yes")->pluck('id')->toArray();
        $isPremium = "no";

        if (in_array(Auth::user()->id, $allUser)) {
            if ($request->isPremium == "yes") {
                $isPremium = "yes";
            } elseif ($request->isPremium == "no") {
                $isPremium = "no";
            }
        }

        $up = upload_video::create([
            "users_id" => Auth::user()->id,
            "deskripsi_video" => $request->deskripsi_video,
            "upload_video" => $request->file("upload_video")->store("video-user", "public"),
            "isPremium" => $isPremium
        ]);
        $video_pembelajaran = upload_video::latest()->get();
        if ($up) {
            return response()->json([
                "message" => "Sukses upload video!",
                "success" => true,
                "update" => $video_pembelajaran
            ]);
            //return redirect()->back()->with("success", "Sukses upload video");
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
