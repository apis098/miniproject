<?php

namespace App\Http\Controllers;

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
