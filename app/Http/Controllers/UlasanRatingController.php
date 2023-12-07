<?php

namespace App\Http\Controllers;

use App\Models\Kursus;
use App\Models\UlasanKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Notifications;

class UlasanRatingController extends Controller
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
    public function store(Request $request, int $course, int $chef, int $user)
    {
      $rules = [
        'ulasan' => 'required|max:225',
        'rating' => 'nullable'
      ];
      $message = [
        'ulasan.required' => 'Ulasan wajib diisi!',
        'ulasan.max' => 'Ulasan maksimal berisi 225 karakter!',
      ];
      $validator  = Validator::make($request->all(), $rules, $message);
      if ($validator->fails()) {
        return redirect()->back()->with('error', $validator->errors()->first());
      }
      $rating = null;
      if ($request->rating != null) {
        $rating = $request->rating;
      }
      $ulasan = UlasanKursus::create([
        "course_id" => $course,
        "chef_id" => $chef,
        "user_id" => $user,
        "rating" => $rating,
        "ulasan" => $request->ulasan
      ]);
      $rate = UlasanKursus::where('course_id', $course)->sum('rating');
      $jumlah_rate = UlasanKursus::where('course_id', $course)->where('rating', '!=', 'null')->count();
      $hasil = intval($rate / $jumlah_rate);
      $result = $rate / $jumlah_rate;
      $edit_rating = Kursus::find($course);
      $edit_rating->rating = $hasil;
      $edit_rating->rating_asli = $result;
      $edit_rating->save();
      // create notification
      $create_notification = Notifications::create([
        'ulasan_id' => $ulasan->id,
        'user_id' => $ulasan->chef->id,
        'notification_from' => Auth::user()->id,
        'message' => 'Kursus anda telah diulas oleh murid anda!',
        'categories' => 'ulasan kursus',
      ]);
      $update = Notifications::find($create_notification->id);
      $update->route = '/status-baca/ulasan/'.$create_notification->id;
      $update->save();
      return redirect()->back()->with('success', 'Sukses memberikan ulasan pada kursus ini!');
    }

    public function storeBalasan(Request $request, int $course, int $user, int $parent) {
        $validasi = Validator::make($request->all(), [
            "ulasan" => "required|max:225"
        ], [
            "ulasan.required" => "Balasan tidak boleh kosong!",
            "ulasan.max" => "Balasan maksimal 225 karakter!",
        ]);
        if ($validasi->errors()->first()) {
            return redirect()->back()->with("error", $validasi->errors()->first());
        }
        $ulasan = UlasanKursus::create([
            "course_id" => $course,
            "user_id" => $user,
            "chef_teacher_id" => Auth::user()->id,
            "parent_id" => $parent,
            "ulasan" => $request->ulasan,
        ]);
        // create notification
        $notifikasi = Notifications::create([
          'user_id' => $user,
          'notification_from' => Auth::user()->id,
          'ulasan_id' => $ulasan->id,
          'message' => 'Ulasan anda telah dibalas oleh koki.',
        ]);
        $update = Notifications::findOrFail($notifikasi->id);
        $update->route = '/status-baca/ulasan/'.$notifikasi->id;
        $update->save();
        return redirect()->back()->with('success', 'Sukses membalas ulasan!');
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
        $review = UlasanKursus::find($id);
        $review->ulasan = $request->ulasan;
        $review->rating = $request->rating;
        $review->save();
        return redirect()->back()->with('success', 'Berhasil mengedit ulasan dan rating!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $review = UlasanKursus::find($id);
        $review->delete();
        return redirect()->back()->with('success', 'Data sukses terhapus!');
    }
}
