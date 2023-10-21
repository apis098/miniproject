<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Console\Input\Input;

class donationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request,$user_recipient)
    {
        $check = Auth::check();
        if($check){
            $penerima = User::findOrFail($user_recipient);
            $user_sender = User::findOrFail(auth()->user()->id);
            if($request->input('moreInput') != null){
                if($user_sender->saldo < $request->input('moreInput')){
                    return redirect()->back()->with('error','Maaf saldo anda tidak cukup, silahkan melakukan top up terlebih dahulu');
                }else{
                    $saldo_lama = $penerima->saldo_pemasukan;
                    $saldo_baru = $request->input('moreInput');
                    $penerima->saldo_pemasukan = $saldo_lama + $saldo_baru;
                    $penerima->save();
                    
                    $saldo_lama_pengirim = $user_sender->saldo;
                    $user_sender->saldo = $saldo_lama_pengirim - $saldo_baru;
                    $user_sender->save();
                    return redirect()->back()->with('success','Berhasil mengirim donasi');
                }
            }else{
                if($user_sender->saldo < $request->input('giftInput')){
                    return redirect()->back()->with('error','Maaf saldo anda tidak cukup, silahkan melakukan top up terlebih dahulu');
                }else{
                    $saldo_lama = $penerima->saldo_pemasukan;
                    $saldo_baru = $request->input('giftInput');
                    $penerima->saldo_pemasukan = $saldo_lama + $saldo_baru;
                    $penerima->save();

                    $saldo_lama_pengirim =  $user_sender->saldo;
                    $user_sender->saldo = $saldo_lama_pengirim - $saldo_baru;
                    $user_sender->save();
                    return redirect()->back()->with('success','Berhasil mengirim donasi');
                }
            }
        }else{
            return redirect()->route('login')->with('info','Silahkan login terlebih dahulu');
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
