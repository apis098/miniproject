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

    public function actionlogin(Request $request)
    {

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'email tidak boleh kosong',
            'password.required' => 'password tidak boleh kosong'
        ]);
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect()->route('admin.index');
        }else{
            Session::flash('message', 'Email atau Password Salah');
            return redirect()->back();
        }
    }

    public function actionlogout()
    {
        Auth::logout();
        return redirect('/');
    }
}
