<?php

namespace Database\Seeders;

use App\Models\detail_premiums;
use App\Models\premiums;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenawaranPremiumSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $premiums1 = premiums::create([
            'nama_paket' => 'Premium Biasa',
            'harga_paket' => 12000,
            'durasi_paket' => 30,
        ]);
        $premiums2 = premiums::create([
            'nama_paket' => 'Premium Dasar',
            'harga_paket' => 24000,
            'durasi_paket' => 60,
        ]);
        $premiums3 = premiums::create([
            'nama_paket' => 'Premium Standar',
            'harga_paket' => 36000,
            'durasi_paket' => 90,
        ]);
        detail_premiums::create([
            'premium_id' => $premiums1->id,
            'detail' => 'Mengakses resep premium'
        ]);
        detail_premiums::create([
            'premium_id' => $premiums1->id,
            'detail' => 'Mengakses feed premium',
        ]);
        detail_premiums::create([
            'premium_id' => $premiums2->id,
            'detail' => 'Akses premium selama 1 bulan',
        ]);
        detail_premiums::create([
            'premium_id' => $premiums2->id,
            'detail' => 'Mengakses resep premium'
        ]);
        detail_premiums::create([
            'premium_id' => $premiums2->id,
            'detail' => 'Mengakses feed premium',
        ]);
        detail_premiums::create([
            'premium_id' => $premiums1->id,
            'detail' => 'Akses premium selama 1 bulan',
        ]);
        detail_premiums::create([
            'premium_id' => $premiums3->id,
            'detail' => 'Mengakses resep premium'
        ]);
        detail_premiums::create([
            'premium_id' => $premiums3->id,
            'detail' => 'Mengakses feed premium',
        ]);
        detail_premiums::create([
            'premium_id' => $premiums3->id,
            'detail' => 'Akses premium selama 1 bulan',
        ]);
    }
}
