<?php

namespace App\Http\Controllers;

use App\Models\income_chefs;
use Illuminate\Http\Request;

class IncomeChefsController extends Controller
{
    public function pemasukan_koki($chef, $user, $status)
    {
        $pemasukan = 1000;
        $income = income_chefs::where('chef_id', $chef)
        ->where('user_id', $user)->where('status', $status)
        ->where('pemasukan', $pemasukan)
        ->exists();
        if (!$income) {
            income_chefs::create([
                "chef_id" => $chef,
                "user_id" => $user,
                "status" => $status,
                "pemasukan" => $pemasukan
            ]);
        }
        return response()->json([
            "success" => "true"
        ]);
    }
}
