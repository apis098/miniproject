<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\Reseps;
use App\Models\UploadVideo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Gd\Shapes\EllipseShape;

class FavoriteController extends Controller
{
    public function store($id)
    {
        $user = Auth::user();
        $resep = Reseps::findOrFail($id);
        if ($user && !$resep->favorite()->where('user_id_from', auth()->user()->id)->exists()) {
            $data = new Favorite();
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
        $feed = UploadVideo::findOrFail($id);
        if($user && !$feed->favorite()->where('user_id_from', auth()->user()->id)->exists()){
            $favorite = new Favorite();
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
        // dd($selectedIds);
        if (!is_array($selectedIds)) {
            return response()->json(['message' => 'Invalid input.'], 400);
        }else{
            $favorites = Favorite::whereIn('id', $selectedIds)->get();
            // dd($favorites);
            foreach ($favorites as $favorite) {
                $hasil = Favorite::FindOrFail($favorite->id);
                $hasil->delete();

            };

        }

        // Hapus data berdasarkan ID yang diterima dari permintaan
        // $favorites = Favorite::whereIn('id', $selectedIds)->get();
        // dd($favorites);

        // Iterasi melalui setiap data favorite untuk mengurangi favorite_count pada resep terkait
        // foreach ($favorites as $favorite) {
        //     $resep = Reseps::find($favorite->resep_id);
        //     if ($resep) {
        //         $resep->decrement('favorite_count');
        //     }
        // }

        // Hapus data favorite setelah mengurangi favorite_count pada resep terkait

       return response()->json();
    }

}
