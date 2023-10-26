<?php

namespace App\Http\Controllers;

use App\Models\income_chefs;
use App\Models\notifications;
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
    public function store(Request $request,$user_recipient,$feed_id){
        $check = Auth::check();
        if($check){
            $penerima = User::findOrFail($user_recipient);
            $user_sender = User::findOrFail(auth()->user()->id);
            if($request->input('moreInput') != null){
                if($user_sender->saldo < $request->input('moreInput')){
                    return response()->json([
                        'success' => false,
                        'message' => "Maaf saldo anda tidak mencukupi silahkan melakukan top Up terlebih dahulu",
                    ]);
                }elseif($request->input('moreInput') < 0){
                    return response()->json([
                        'success' => false,
                        'message' => "Silahkan masukkan format penulisan dengan benar!",
                    ]);
                }
                else{
                    $saldo_lama = $penerima->saldo_pemasukan;
                    $saldo_baru = $request->input('moreInput');
                    $penerima->saldo_pemasukan = $saldo_lama + $saldo_baru;
                    $penerima->save();
                    
                    $saldo_lama_pengirim = $user_sender->saldo;
                    $user_sender->saldo = $saldo_lama_pengirim - $saldo_baru;
                    $user_sender->save();

                    $income = new income_chefs();
                    $income->chef_id  = $user_recipient;
                    $income->user_id = auth()->user()->id;
                    $income->feed_id = $feed_id;
                    $income->status = "sawer";
                    $income->pemasukan = $saldo_baru;
                    $income->save();
                    
                     // mengirim notifikasi
                     $notification = new notifications();
                     $notification->notification_from = auth()->user()->id;
                     $notification->user_id = $user_recipient;
                     $notification->gift_id = 1;
                     if($request->input('message')!=null){
                        $notification->message = $request->input('message');
                     }
                     $notification->save();
                     return response()->json([
                        'success' => true,
                        'message' => "Terimakasih😊,anda telah memberikan donasi kepada ".$penerima->name,
                    ]);
                }
            }else{
                if($user_sender->saldo < $request->input('giftInput')){
                    return response()->json([
                        'success' => false,
                        'message' => "Maaf saldo anda tidak mencukupi silahkan melakukan top Up terlebih dahulu",
                    ]);
                }elseif($request->input('giftInput') < 0){
                    return response()->json([
                        'success' => false,
                        'message' => "Silahkan masukkan format penulisan dengan benar!",
                    ]);
                }
                else{
                    $saldo_lama = $penerima->saldo_pemasukan;
                    $saldo_baru = $request->input('giftInput');
                    $penerima->saldo_pemasukan = $saldo_lama + $saldo_baru;
                    $penerima->save();

                    $saldo_lama_pengirim =  $user_sender->saldo;
                    $user_sender->saldo = $saldo_lama_pengirim - $saldo_baru;
                    $user_sender->save();

                    $income = new income_chefs();
                    $income->chef_id  = $user_recipient;
                    $income->user_id = auth()->user()->id;
                    $income->feed_id = $feed_id;
                    $income->status = "sawer";
                    $income->pemasukan = $saldo_baru;
                    $income->save();

                    // mengirim notifikasi
                    $notification = new notifications();
                    $notification->notification_from = auth()->user()->id;
                    $notification->user_id = $user_recipient;
                    $notification->gift_id = 1;
                    if($request->input('message')!=null){
                       $notification->message = $request->input('message');
                    }
                    $notification->save();
                    return response()->json([
                        'success' => true,
                        'message' => "Terimakasih😊,anda telah memberikan donasi kepada ".$penerima->name,
                    ]);
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
