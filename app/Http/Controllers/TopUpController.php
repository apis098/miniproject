<?php

namespace App\Http\Controllers;

use App\Models\ChMessage;
use App\Models\favorite;
use App\Models\footer;
use App\Models\notifications;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tripay = new TripayPaymentController();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function paymentsPage(){
        $userLogin = Auth::user();
        $notification = [];
        $favorite = [];
        $unreadNotificationCount = [];
        $admin = false;
        $messageCount = [];
        if ($userLogin) {
            $messageCount = ChMessage::where('to_id', auth()->user()->id)->where('seen', '0')->count();
        }
        if ($userLogin) {
            $id_user = Auth::user()->id;
            $id_admin = User::where("role", "admin")->first();
            if ($id_user == $id_admin->id) {
                $admin = true;
            }
            $notification = notifications::where('user_id', auth()->user()->id)
                ->orderBy('created_at', 'desc') // Urutkan notifikasi berdasarkan created_at terbaru
                ->paginate(10); // Paginasi notifikasi dengan 10 item per halaman
            $unreadNotificationCount = notifications::where('user_id', auth()->user()->id)->where('status', 'belum')->count();
            // jika user sudah login
            $userLog = 2;
        }
        if ($userLogin) {
            $favorite = favorite::where('user_id_from', auth()->user()->id)
                ->orderBy('created_at', 'desc')
                ->paginate(10);
        }
        $footer = footer::first();
        return view('tripay.paymentsMethod', compact('userLogin','footer', 'notification', 'favorite', 'unreadNotificationCount', 'messageCount'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $check = Auth::check();
        if($check){
          if($request->inputanLainya != null){
            $user = User::findOrFail(auth()->user()->id);
            $saldo_sebelumnya = $user->saldo;
            $saldo_baru = $request->inputanLainya;
            $user->saldo = $saldo_sebelumnya + $saldo_baru;
            $user->save();
            return redirect()->back()->with('success','Selamat transaksi anda berhasil!');
          }else{
            $user = User::findOrFail(auth()->user()->id);
            $saldo_sebelumnya = $user->saldo;
            $saldo_baru = $request->input('inputanTopUp');
            $user->saldo = $saldo_sebelumnya + $saldo_baru;
            $user->save();
            return redirect()->back()->with('success','Selamat transaksi anda berhasil!');
          }
        }else{
            return redirect()->route('login')->with('info','silahkan login terlebih dahulu');
        }
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
