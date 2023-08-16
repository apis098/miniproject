<?php

namespace App\Http\Controllers;

use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\notifications;

class ResepsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userLogin = Auth::user();
        $notification = [];
        if ($userLogin) {
            $notification = notifications::where('user_id', auth()->user()->id)->get();
        }
        return view("koki.resep", compact('notification'));
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
    }
    /**
     * Display the specified resource.
     */
    public function show(reseps $reseps)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(reseps $reseps)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    }
}
