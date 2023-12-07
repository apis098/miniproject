<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\User;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $footer=Footer::all();
        $verifed_count = User::where('isSuperUser', 'no')->where('followers','>',10000)->where('role','koki')->count();
        return view('admin.footer',compact('footer','verifed_count'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Footer $footer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Footer $footer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Footer $footer)
    {
        $this->validate($request,[
         'facebook' => 'required',
         'youtube' => 'required',
         'twitter' => 'required',
         'instagram' => 'required',
         'kontak' => 'required',
         'telegram' => 'required',
         'email' => 'required',
         'lokasi' => 'required'
        ],[

        ]);
        $footer->update([
            'facebook'=>$request->facebook,
            'youtube'=>$request->youtube,
            'twitter'=>$request->twitter,
            'instagram'=>$request->instagram,
            'kontak'=>$request->kontak,
            'telegram'=>$request->telegram,
            'email'=>$request->email,
            'lokasi'=>$request->lokasi
         ]);
         return redirect()->back()->with(['success'=>'data berhasil di edit']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Footer $footer)
    {
        //
    }
}
