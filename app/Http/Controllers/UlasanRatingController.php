<?php

namespace App\Http\Controllers;

use App\Models\UlasanKursus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        'ulasan.max' => 'Ulasan maksimal berisi 225 karakter!'
      ];
      $validator  = Validator::make($request->all(), $rules, $message);
      if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
      }
      UlasanKursus::create([
        "course_id" => $course,
        "chef_id" => $chef,
        "user_id" => $user,
        "rating" => $request->rating,
        "ulasan" => $request->ulasan
      ]);

      return redirect()->back()->with('success', 'Sukses memberikan ulasan pada kursus ini!');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}