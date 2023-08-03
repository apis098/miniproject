<?php

namespace App\Http\Controllers;
use App\Http\Requests\Storeseputar_dapurRequest;
use App\Http\Requests\Updateseputar_dapurRequest;
use App\Models\kategori_seputardapur;
use App\Models\seputar_dapur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeputarDapurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori_seputardapur = kategori_seputardapur::all();
        $seputar_dapur = seputar_dapur::all();
        return view('admin.seputar-dapur.seputardapur',compact('seputar_dapur', 'kategori_seputardapur'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    //     $kategori_seputardapur =kategori_seputardapur::all();
    //  return view('seputar-dapur.create',compact('kategori_seputardapur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
        'kategori_id' => 'required',
        'judul' => 'required',
        'foto' => 'required|image|mimes:png,jpg,jpeg,svg|max:2048',
        'isi' => 'required'
    ], [
        'kategori_id.required' => 'field ini harus di isi!',
        'judul.required' => 'field ini harus di isi!',
        'foto.required' => 'field ini harus di isi!',
        'isi.required' => 'field ini harus di isi!',
        'foto.image' => 'File harus berupa gambar (png, jpg, jpeg, svg)',
        'foto.max' => 'Ukuran file gambar tidak boleh lebih dari 2048 KB',
    ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/seputardapur', $foto->hashName());

        seputar_dapur::create([
            'kategori_id' => $request->kategori_id,
            'judul' => $request->judul,
            'foto' => $foto->hashName(),
            'isi' => $request->isi
        ]);

        return redirect()->route('seputar_dapur.index')->with('success', 'berhasil tambah data');
    }


    /**
     * Display the specified resource.
     */
    public function show(seputar_dapur $seputar_dapur)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(seputar_dapur $seputar_dapur)
    {
        $data =[
            'kategori_seputardapur'=>kategori_seputardapur::all(),
            'seputar_dapur'=>$seputar_dapur
            ];
            return view('admin.seputar-dapur.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, seputar_dapur $seputar_dapur)
    {
        $this->validate($request,[
            'kategori_id'=>'required',
            'judul'=>'required',
            'foto'=>'image|mimes:png,jpg,jpeg,svg|max:2048',
            'isi'=>'required'
        ],[
            'kategori_id.required'=> 'field ini harus di isi!',
            'judul.required'=> 'field ini harus di isi!',
            'isi.required'=> 'field ini harus di isi!',
        ]);
            //    upload foto
    if ($request->hasFile('foto')) {

        $foto = $request->file('foto');
        $foto->storeAs('public/seputardapur', $foto->hashName());
         Storage::delete('public/seputardapur/' . $seputar_dapur->foto);

       // create post
       $seputar_dapur->update([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'foto' => $foto->hashName(),
        'isi' => $request->isi
   ]);
  }  else{
    $seputar_dapur->update([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'isi' => $request->isi,
    ]);
   }
//    redirect ke index
   return redirect()->route('seputar_dapur.index',compact('request'))->with('success', 'Data Berhasil Diupdate');
  }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(seputar_dapur $seputar_dapur)
    {
       // Hapus file foto jika ada
      if ($seputar_dapur->foto) {
            // Hapus file dari direktori
          Storage::delete('public/seputardapur/'.$seputar_dapur->foto);

          // Hapus data seputar dapur dari database
          $seputar_dapur->delete();
          return redirect()->back()->with('info', 'Data Telah Di Hapus');
      }
    }
}
