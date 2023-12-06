<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\reseps;
use App\Models\upload_video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Gd\Shapes\EllipseShape;

class FavoriteController extends Controller
{
    public function store($id)
    {
        $user = Auth::user();
        $resep = reseps::findOrFail($id);
        if ($user && !$resep->favorite()->where('user_id_from', auth()->user()->id)->exists()) {
            $data = new favorite();
            $data->user_id_from = auth()->user()->id;
            $data->resep_id = $resep->id;
            $data->user_id = $resep->user_id;
            $resep->increment('favorite_count');
            $data->save();
            return response()->json([
                'favorited' => true,
                'favorite_count' => $resep->favorite_count,
                'resep_id' => $resep->id,
            ]);
        }
        if ($user && $resep->favorite()->where('user_id_from', auth()->user()->id)->exists()) {
            $resep->favorite()->where('user_id_from', auth()->user()->id)->delete();
            $resep->decrement('favorite_count');
            $resep->save();
            return response()->json([
                'favorited' => false,
                'favorite_count' => $resep->favorite_count,
                'resep_id' => $resep->id,
            ]);
        }
        if (!$user) {
            return redirect()->route('login')->with(['error' => 'Silahkan login terlebih dahulu']);
        }
    }
    public function storeVeed($id){
        $user = Auth::user();
        $feed = upload_video::findOrFail($id);
        if($user && !$feed->favorite()->where('user_id_from', auth()->user()->id)->exists()){
            $favorite = new favorite();
            $favorite->user_id_from = auth()->user()->id;
            $favorite->user_id = $feed->users_id;
            $favorite->feed_id = $feed->id;
            $feed->increment('favorite_count');
            $favorite->save();
            return response()->json([
                'favorited' => true,
                'feed_id' => $id,
            ]);
        }
        if($user && $feed->favorite()->where('user_id_from',auth()->user()->id)->exists()){
            $feed->favorite()->where('user_id_from',auth()->user()->id)->delete();
            $feed->decrement('favorite_count');
            $feed->save();
            return response()->json([
                'favorited' => false,
                'feed_id' => $id,
            ]);
        }
        if(!$user){
            return redirect()->route('login')->with('error','Silahkan login terlebih dahulu');
        }
    }
    public function destroyFavorite(Request $request)
    {
        $selectedIds = $request->input('ids');

        if (!is_array($selectedIds)) {
            return response()->json(['message' => 'Invalid input.'], 400);
        }

        // Hapus data berdasarkan ID yang diterima dari permintaan
        $favorites = favorite::whereIn('id', $selectedIds)->get();

        // Iterasi melalui setiap data favorite untuk mengurangi favorite_count pada resep terkait
        foreach ($favorites as $favorite) {
            $resep = reseps::find($favorite->resep_id);
            if ($resep) {
                $resep->decrement('favorite_count');
            }
        }

        // Hapus data favorite setelah mengurangi favorite_count pada resep terkait
        favorite::whereIn('id', $selectedIds)->delete();

       return redirect()->back()->with('success','data favorite berhasil dihapus');
    }

}