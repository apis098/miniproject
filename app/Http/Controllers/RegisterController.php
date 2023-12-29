<?php

namespace App\Http\Controllers;

use App\Mail\SendEmailRegistrasi;
use App\Models\Tokens;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|unique:users,email',
            'name' => 'required',
            'password' => 'required',
            'copassword' => 'required|same:password',
            'profile_picture' => 'mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'email.unique' => 'Data Email Sudah Ada/Terpakai!',
            'copassword.same' => 'Password tidak sama.',
            'copassword.required' => 'Password harus di isi.',
            'password.required' => 'Password tidak boleh kosong.',
            'profile_picture.required' => 'Foto profil harus diunggah.',
            'profile_picture.image' => 'File yang diunggah harus berupa gambar.',
            'profile_picture.mimes' => 'Format gambar yang diizinkan: jpeg, png, jpg, gif.',
            'profile_picture.max' => 'Ukuran gambar maksimal 2MB.',
        ]);
        $token = uniqid();
        $expired_time = Carbon::now()->addMinutes(5);
        Mail::to($request->email)->send(new SendEmailRegistrasi($token, $expired_time));


        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'koki',
        ]);
        Tokens::create([
            'user_id' => $user->id,
            'token' => $token,
            'expired_time' => $expired_time
        ]);

        // Handle profile picture upload
        // Handle profile picture upload
        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');

            // Lakukan penyesuaian gambar (misalnya, memotong)
            $croppedImage = Image::make(public_path("storage/{$profilePicturePath}"))
                ->fit(576, 576); // Ubah ukuran sesuai kebutuhan

            // Simpan gambar yang telah diubah
            $croppedImage->save();

            $user->foto = $profilePicturePath;
            $user->save();
        }


        Session::flash('success_message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('auth-register/'.$request->email);
    }
    public function authregister($email)
    {
        return view('auth.AuthenticateRegister', compact('email'));
    }
    public function tokenregister(Request $request)
    {
        $user = User::where('email', $request->email)->where('status', 'nonaktif')->exists();
        if (!$user) {
            return redirect()->back()->with('error', 'Email tidak terdaftar!');
        }
        $pengguna = User::where('email', $request->email)->where('status', 'nonaktif')->first();
        $verified_token = Tokens::where('user_id', $pengguna->id)->first();
        $now_time = Carbon::now();
        $expired_time = Carbon::parse($verified_token->expired_time);
        if ($expired_time->gt($now_time)) {
            if ($request->token == $verified_token->token) {
                $up = User::findOrFail($pengguna->id);
                $up->status = "aktif";
                $up->save();
                return redirect('/login')->with('success', 'Anda telah berhasil register');
            } else {
                return redirect()->back()->with('error', 'Token tidak valid!');
            }
        } else {
            return redirect()->back()->with('error', 'Token kadaluarsa.');
        }
    }
}
