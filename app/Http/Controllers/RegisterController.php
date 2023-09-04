<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;


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

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'koki',
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
        return redirect('login');
    }
}
