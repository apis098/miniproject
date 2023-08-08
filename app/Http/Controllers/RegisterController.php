<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function actionregister(Request $request)
    {
       $this->validate($request,[
        'email' => 'required|email|unique:users,email',
        'name' => 'required',
        'password' => 'required',
        'copassword' => 'required|same:password',

    ],[
        'email.unique' => 'Data Email Sudah Ada/Terpakai!',
        'copassword.same' => 'Password tidak sama.',
        'copassword.required' => 'Password harus di isi.',
        'password.required' => 'Password tidak boleh kosong     .',
       ]);

        $user = User::create([
            'email' => $request->email,
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'role' => 'koki',

        ]);

        Session::flash('success_message', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('login');
    }
}
