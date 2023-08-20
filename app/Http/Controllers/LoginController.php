<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {


        if (Auth::check()) {
            return redirect()->route('admin.index');
        }else{
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
            return redirect()->back()->with('error', 'Email atau Password Salah');
        }
    }
    
    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
