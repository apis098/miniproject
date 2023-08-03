<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $edit_tentang = about::all();
        return view('admin.edit_tentang.edit-tentang', compact('edit_tentang'));
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
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(about $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, about $about)
    {
        $update = [
            'judul' => $request->judul,
            'isi' => $request->isi
        ];
        $about->update($update);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(about $about)
    {
        //
    }
}
