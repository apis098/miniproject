<?php

namespace App\Http\Controllers;

use App\Models\basic_tips;
use App\Models\kategori_tipsdasar;
use App\Models\seputar_dapur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class basic_tips_controller extends Controller
{
    public function index()
    {
        $kategori_tipsdasar=kategori_tipsdasar::all();
        $basic_tips=basic_tips::all();
        $userkoki=User::all();
        return view('admin.basic_tips.tips_dasar',compact('kategori_tipsdasar','basic_tips','userkoki'));
    }
    public function create()
    {
        // return view('basic_tips.create', [
        //     "title" => "Tambah Data Tips Dasar"
        // ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'kategori_id' => 'required',
            'judul' => 'required',
            'foto' => 'required|image|mimes:png,jpg,jpeg,svg|max:20048',
            'deskripsi' => 'required'
        ], [
            'kategori_id.required' => 'field ini harus di isi!',
            'judul.required' => 'field ini harus di isi!',
            'foto.required' => 'field ini harus di isi!',
            'deskripsi.required' => 'field ini harus di isi!',
            'foto.image' => 'File harus berupa gambar (png, jpg, jpeg, svg)',
            'foto.max' => 'Ukuran file gambar tidak boleh lebih dari 20 MB',
        ]);

        $foto=$request->file('foto');
        $foto->storeAs('public/tipsdasar',$foto->hashName());

        basic_tips::create([
            'kategori_id'=>$request->kategori_id,
            'judul'=>$request->judul,
            'foto'=>$foto->hashName(),
            'deskripsi'=>$request->deskripsi,
        ]);
        return redirect()->back()->with('success', 'berhasil tambah data');
    }
    public function show(basic_tips $basic_tips)
    {
       //
    }

    public function edit(basic_tips $basic_tips)
    {
      $data=[
          'kategori_tipsdasar'=>kategori_tipsdasar::all(),
          'userkoki'=>User::all(),
          'basic_tips'=>basic_tips::all(),
    ];
    return view('admin.basic_tips.edit',$data);
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request,[
            'kategori_id'=>'required',
            'judul'=>'required',
            'foto'=>'image|mimes:png,jpg,jpeg,svg|max:2048',
            'deskripsi'=>'required'
        ],[
            'kategori_id.required'=> 'field ini harus di isi!',
            'judul.required'=> 'field ini harus di isi!',
            'isi.required'=> 'field ini harus di isi!',
        ]);
            //    upload foto
            $bt = basic_tips::find($id);
    if ($request->hasFile('foto')) {

        $foto = $request->file('foto');
        $foto->storeAs('public/tipsdasar', $foto->hashName());
         Storage::delete('public/tipsdasar/' . $bt->foto);

       // create post
       basic_tips::where('id', $id)->update([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'foto' => $foto->hashName(),
        'deskripsi' => $request->deskripsi
   ]);
  }  else{
    basic_tips::where('id', $id)->update([
        'kategori_id' => $request->kategori_id,
        'judul' => $request->judul,
        'deskripsi' => $request->deskripsi,
    ]);
   }
//    redirect ke index
   return redirect()->route('basic_tips.index',compact('request'))->with('success', 'Data Berhasil Diupdate');
  }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(basic_tips $basic_tips)
    {
        // dd($seputar_dapur->foto);
       // Hapus file foto jika ada
      if ($basic_tips->foto) {
            // Hapus file dari direktori
          Storage::delete('public/tipsdasar/'.$basic_tips->foto);

          // Hapus data seputar dapur dari database
          $basic_tips->delete();
          return redirect()->back()->with('info', 'Data Telah Di Hapus');
      }
    }
}
