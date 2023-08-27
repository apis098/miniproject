<?php

namespace App\Http\Controllers;

use App\Models\favorite;
use App\Models\reseps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class favoriteController extends Controller
{
    public function store($id){
        $user=Auth::user();
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
        if ($user && $resep->favorite()->where('user_id_from', auth()->user()->id)->exists()){
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
            return response()->json(['error' => 'User authentication required']);
        }
    }
    public function destroy(Request $request)
    {
        $selectedIds = $request->input('ids');

        if (!is_array($selectedIds)) {
            return response()->json(['message' => 'Invalid input.'], 400);
        }

        try {
            // Hapus data berdasarkan ID yang diterima dari permintaan
            favorite::whereIn('id', $selectedIds)->delete();

            return response()->json(['message' => 'Data berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
