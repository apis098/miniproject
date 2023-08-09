<?php

namespace App\Http\Controllers;

use App\Models\kategori_seputardapur;
use App\Http\Requests\Storekategori_seputardapurRequest;
use App\Http\Requests\Updatekategori_seputardapurRequest;
use Illuminate\Http\Request;

class KategoriSeputardapurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $kategori_seputardapur=kategori_seputardapur::all();
      $title = "Data Seputar Dapur";
      return view('admin.kategori-seputardapur.kategoriseputardapur',compact('kategori_seputardapur', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //    return view('admin.kategori-seputardapur.kategoriseputardapur');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama_kategori'=> 'required',
        ],[
            'nama_kategori.required'=> 'field ini harus di isi!'
        ]);

         kategori_seputardapur::create([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect()->route('kategori_seputardapur.index',compact('request'))->with('info','berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(kategori_seputardapur $kategori_seputardapur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(kategori_seputardapur $kategori_seputardapur)
    {
        return view('admin.kategori-seputardapur.edit',compact('kategori_seputardapur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, kategori_seputardapur $kategori_seputardapur)
    {
        $this->validate($request,[
            'nama_kategori'=> 'required',
        ],[
            'nama_kategori.required'=> 'field ini harus di isi!'
        ]);

         $kategori_seputardapur->update([
            'nama_kategori'=>$request->nama_kategori
        ]);
        return redirect()->route('kategori_seputardapur.index')->with('success','berhasil edit data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(kategori_seputardapur $kategori_seputardapur)
    {
    //   Cek apakah ada seputar_dapur terkait dengan kategori ini
        if ($kategori_seputardapur->seputar_dapur->count() > 0) {
            return redirect()->back()->with('error', 'Error, karena masih ada data terkait.');
        }
            
        $kategori_seputardapur->delete();
        return redirect()->back()->with('info', 'Data Telah Di Hapus');
    }
}
